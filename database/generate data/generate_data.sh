#!/bin/bash

# 1. User Input for records
read -p "How many records would you like to generate? " NUM_RECORDS

# Validate number
if ! [[ "$NUM_RECORDS" =~ ^[0-9]+$ ]] ; then
   echo "Error: Please enter a valid number."
   exit 1
fi

OUTPUT_FILE="trip_data_refresh.sql"
API_URL="https://randomuser.me/api/?results=$NUM_RECORDS&nat=us,gb,ca"

# Define the allowed Spot Types and Statuses
SPOT_TYPES=("Travel-Packages" "Luxury-Hotels" "Vehicle-Rental" "Tour-Guides" "Room-Rentals")
STATUS_OPTIONS=("available" "unavailable")

echo "Preparing SQL script with TRUNCATE logic..."

{
    echo "-- Fresh Data Seed"
    echo "SET SQL_MODE = 'NO_AUTO_VALUE_ON_ZERO';"
    echo "SET FOREIGN_KEY_CHECKS = 0;"
    
    echo "-- Resetting tables and auto-increment counters"
    echo "TRUNCATE TABLE paymentInfo;"
    echo "TRUNCATE TABLE userinfo;"
    echo "TRUNCATE TABLE spot;"
    echo "TRUNCATE TABLE address;"
    echo "TRUNCATE TABLE account;"
    
    echo "SET FOREIGN_KEY_CHECKS = 1;"
    echo "START TRANSACTION;"
} > $OUTPUT_FILE

echo "Fetching $NUM_RECORDS records from API..."
RAW_DATA=$(curl -s "$API_URL")

for i in $(seq 0 $((NUM_RECORDS-1))); do
    # Progress Calculation
    PERCENT=$(( (i + 1) * 100 / NUM_RECORDS ))
    
    # Random selection for Types and Status
    TYPE_INDEX=$(( RANDOM % 5 ))
    STATUS_INDEX=$(( RANDOM % 2 ))
    SELECTED_TYPE=${SPOT_TYPES[$TYPE_INDEX]}
    SELECTED_STATUS=${STATUS_OPTIONS[$STATUS_INDEX]}

    # Extract JSON fields
    EMAIL=$(echo "$RAW_DATA" | jq -r ".results[$i].email")
    PASS=$(echo "$RAW_DATA" | jq -r ".results[$i].login.password")
    FNAME=$(echo "$RAW_DATA" | jq -r ".results[$i].name.first" | sed "s/'/''/g")
    LNAME=$(echo "$RAW_DATA" | jq -r ".results[$i].name.last" | sed "s/'/''/g")
    GENDER=$(echo "$RAW_DATA" | jq -r ".results[$i].gender")
    DOB=$(echo "$RAW_DATA" | jq -r ".results[$i].dob.date" | cut -d'T' -f1)
    PHONE=$(echo "$RAW_DATA" | jq -r ".results[$i].phone")
    COUNTRY=$(echo "$RAW_DATA" | jq -r ".results[$i].location.country" | sed "s/'/''/g")
    PROVINCE=$(echo "$RAW_DATA" | jq -r ".results[$i].location.state" | sed "s/'/''/g")
    CITY=$(echo "$RAW_DATA" | jq -r ".results[$i].location.city" | sed "s/'/''/g")
    STREET=$(echo "$RAW_DATA" | jq -r ".results[$i].location.street.name" | sed "s/'/''/g")
    H_NUM=$(echo "$RAW_DATA" | jq -r ".results[$i].location.street.number")
    PIC=$(echo "$RAW_DATA" | jq -r ".results[$i].picture.large")

    # SQL Generation
    ID=$((i + 1))
    
    # 1. Account
    echo "INSERT INTO account (accountID, email, password, permission) VALUES ($ID, '$EMAIL', '$PASS', 'user');" >> $OUTPUT_FILE
    
    # 2. Address
    echo "INSERT INTO address (addressID, country, province, district, street, houseNumber) VALUES ($ID, '$COUNTRY', '$PROVINCE', '$CITY', '$STREET', '$H_NUM');" >> $OUTPUT_FILE
    
    # 3. UserInfo (Removed PaymentID and matched column order from tripBookingPOS.sql)
    echo "INSERT INTO userinfo (userID, accountID, FName, LName, gender, DOB, phone, email, createdDate, profile, address) VALUES ($ID, $ID, '$FNAME', '$LNAME', '$GENDER', '$DOB', '$PHONE', '$EMAIL', CURDATE(), '$PIC', '$STREET');" >> $OUTPUT_FILE
    
    # 4. PaymentInfo
    CARD="$((1000 + RANDOM % 8999)) $((1000 + RANDOM % 8999)) $((1000 + RANDOM % 8999))"
    echo "INSERT INTO paymentInfo (paymentID, userID, paymentType, cardCode, expireDate, cvv) VALUES ($ID, $ID, 'Visa', '$CARD', '2029-01-01', '$((100 + RANDOM % 899))');" >> $OUTPUT_FILE
    
    # 5. Spot (Updated to include status and discount from schema)
    PRICE=$((75 + RANDOM % 2000))
    echo "INSERT INTO spot (spotID, name, type, status, phone, addressID, detail, price, discount, photo) VALUES ($ID, '$SELECTED_TYPE Option $ID', '$SELECTED_TYPE', '$SELECTED_STATUS', '$PHONE', $ID, 'Premium $SELECTED_TYPE located in $CITY', $PRICE, 0.00, 'https://picsum.photos/seed/$i/800/600');" >> $OUTPUT_FILE
    
    # Visual Progress
    printf "\rGenerating: [%-50s] %d%%" $(printf '#%.0s' $(seq 1 $((PERCENT / 2)))) $PERCENT
done

echo -e "\nCOMMIT;" >> $OUTPUT_FILE
echo "Success! Script saved as $OUTPUT_FILE"