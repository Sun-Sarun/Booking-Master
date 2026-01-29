SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;

-- 1. Account Table
CREATE TABLE `account` (
  `accountID` int(20) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) UNIQUE NULL, -- Increased length for emails
  `password` varchar(255) NULL,   -- Increased for hashed passwords
  `permission` varchar(20) NULL,
  PRIMARY KEY (`accountID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 2. Address Table
CREATE TABLE `address` (
  `addressID` int(20) NOT NULL AUTO_INCREMENT,
  `country` varchar(100) NULL,
  `province` varchar(100) NULL,
  `district` varchar(100) NULL,
  `street` varchar(100) DEFAULT NULL, 
  `houseNumber` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`addressID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 3. Spot Table
CREATE TABLE `spot` (
  `spotID` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NULL,
  `type` varchar(20) NULL,
  `status` varchar(20) NULL, -- Fixed quotes
  `phone` varchar(20) NULL,
  `addressID` int(20) NOT NULL,
  `detail` varchar(200) NULL,
  `price` decimal(10,2) NULL, -- Changed to Decimal for currency
  `discount` decimal(10,2) NULL, -- Fixed quotes and space
  `photo` varchar(200) NULL,
  PRIMARY KEY (`spotID`),
  CONSTRAINT `fk_spot_address` FOREIGN KEY (`addressID`) REFERENCES `address` (`addressID`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 4. UserInfo Table
CREATE TABLE `userinfo` (
  `userID` int(20) NOT NULL AUTO_INCREMENT,
  `accountID` int(20) UNIQUE, 
  `FName` varchar(50) NULL,
  `LName` varchar(50) NULL,
  `gender` varchar(20) NULL,
  `DOB` date NULL,
  `phone` varchar(20) NULL,
  `email` varchar(100) NULL,
  `createdDate` date NULL,
  `profile` varchar(200) NULL,
  `address` varchar(100) NULL,
  PRIMARY KEY (`userID`), -- Removed PaymentID redundancy
  CONSTRAINT `fk_user_account` FOREIGN KEY (`accountID`) REFERENCES `account` (`accountID`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 5. PaymentInfo Table
CREATE TABLE `paymentInfo` (
  `paymentID` int(20) NOT NULL AUTO_INCREMENT,
  `userID` int(20),
  `paymentType` varchar(20) NULL,
  `cardCode` varchar(50) NULL,
  `expireDate` date NULL,
  `cvv` varchar(20) NULL,
  PRIMARY KEY (`paymentID`),
  CONSTRAINT `fk_payment_user` FOREIGN KEY (`userID`) REFERENCES `userinfo` (`userID`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 6. Booking Table
CREATE TABLE `booking` (
  `bookingID` int(20) NOT NULL AUTO_INCREMENT,
  `accountID` int(20) NOT NULL,
  `spotID` int(20) NOT NULL,
  `purchaseDate` date NULL,
  `unit` int(20) NULL,
  `paymentID` int(20) NOT NULL, -- Matched data type with paymentInfo
  `checkinDate` date NULL,
  `checkoutDate` date NULL,
  `totalPrice` decimal(10,2) NOT NULL, -- Fixed quotes and type
  PRIMARY KEY (`bookingID`),
  CONSTRAINT `fk_booking_account` FOREIGN KEY (`accountID`) REFERENCES `account` (`accountID`) ON DELETE CASCADE,
  CONSTRAINT `fk_booking_spot` FOREIGN KEY (`spotID`) REFERENCES `spot` (`spotID`) ON DELETE CASCADE,
  CONSTRAINT `fk_booking_payment` FOREIGN KEY (`paymentID`) REFERENCES `paymentInfo` (`paymentID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

COMMIT;