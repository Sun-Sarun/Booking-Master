#!/bin/bash

# Prompt user for input
read -p "How many faces would you like to download? " count

# Validate that input is a positive integer
if ! [[ "$count" =~ ^[0-9]+$ ]] || [ "$count" -le 0 ]; then
    echo "Error: Please enter a valid positive number."
    exit 1
fi

# Create a directory to store images
output_dir="downloaded_faces"
mkdir -p "$output_dir"

echo "Starting download of $count images to /$output_dir..."

for ((i=1; i<=count; i++))
do
    # Generate a timestamp for a unique filename
    timestamp=$(date +"%Y%m%d_%H%M%S")
    filename="${output_dir}/face_${timestamp}_${i}.jpg"
    
    echo "[$i/$count] Downloading to $filename..."
    
    # Use curl with a common User-Agent to avoid being blocked
    curl -L "https://thispersondoesnotexist.com/" \
         -H "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64)" \
         -o "$filename" --silent

    # Small pause to be respectful to the server
    sleep 1
done

echo "Success! All images are saved in the '$output_dir' folder."
