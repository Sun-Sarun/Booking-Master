<?php
// Include your existing connection file
require_once '../config.php';

// 1. Collect and sanitize input from POST
$folder      = "../../database/imgs/";
$name        = $_POST['name'] ?? '';
$type        = $_POST['type'] ?? '';
$phone       = $_POST['phone'] ?? '';
$houseNumber = $_POST['houseNumber'] ?? '';
$district    = $_POST['district'] ?? '';
$province    = $_POST['province'] ?? '';
$country     = $_POST['country'] ?? '';
$description = $_POST['description'] ?? '';
$price       = $_POST['price'] ?? 0;
$img         = 'default.png';

// 2. Image Upload Logic
if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
    $temp_name = $_FILES['image']['tmp_name'];
    // Generate unique name to prevent overwriting
    $file_name = time() . "_" . basename($_FILES['image']['name']);
    $target_path = $folder . $file_name;

    if (move_uploaded_file($temp_name, $target_path)) {
        $img = $file_name;
    }
}

try {
    // Start transaction to ensure both tables update or neither does
    $pdo->beginTransaction();

    // 3. Insert Address first (Required for Foreign Key)
    $sqlAddr = "INSERT INTO `address` (`country`, `province`, `district`, `houseNumber`) 
                VALUES (?, ?, ?, ?)";
    $stmtAddr = $pdo->prepare($sqlAddr);
    $stmtAddr->execute([$country, $province, $district, $houseNumber]);
    
    // Capture the auto-generated addressID
    $addressID = $pdo->lastInsertId();

    // 4. Insert Spot using the addressID from step 3
    $sqlSpot = "INSERT INTO `spot` (`name`, `type`, `phone`, `addressID`, `detail`, `price`, `photo`) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmtSpot = $pdo->prepare($sqlSpot);
    $stmtSpot->execute([$name, $type, $phone, $addressID, $description, $price, $img]);

    // Commit the changes to the database
    $pdo->commit();
    echo "New spot and address created successfully!";

} catch (Exception $e) {
    // If anything fails, undo everything
    $pdo->rollBack();
    echo "Transaction failed: " . $e->getMessage();
}
?>