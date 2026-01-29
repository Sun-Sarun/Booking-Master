<?php
session_start();
// 1. Database Connection
require_once '../admin/config.php';

// 2. SECURITY CHECK: Ensure user is logged in and cart isn't empty
if (!isset($_SESSION['accountID']) || empty($_SESSION['cart'])) {
    header("Location: ../profile/login/index.php?error=session_expired");
    exit();
}

$accountID = $_SESSION['accountID'];
$order_processed = false;
$order_id = "BM-" . strtoupper(uniqid()); // Generate a unique reference ID

// 3. DATABASE LOGIC: Process the 'booking' table insertion
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conn->begin_transaction(); // Use transaction for data integrity

    try {
        // FETCH PAYMENT ID: Link accountID to userID to find the correct paymentID
        $payQuery = "SELECT p.paymentID FROM paymentInfo p
                     JOIN userinfo u ON p.userID = u.userID 
                     WHERE u.accountID = ?";
        
        $payStmt = $conn->prepare($payQuery);
        $payStmt->bind_param("i", $accountID);
        $payStmt->execute();
        $payResult = $payStmt->get_result();
        $payData = $payResult->fetch_assoc();
        
        $paymentID = $payData['paymentID'] ?? null; 
        
        if (!$paymentID) {
            throw new Exception("Payment method not found. Please update your billing info in the dashboard.");
        }

        $purchaseDate = date('Y-m-d');

        // Loop through cart items and insert into booking table
        foreach ($_SESSION['cart'] as $spotID => $item) {
            // FIX: Ensure keys match productDetail.php ('quantity' and 'checkinDate')
            $checkin = $item['checkinDate'];
            $checkout = $item['checkoutDate'];
            $unit = (int)$item['quantity'];
            
            // FIX: Remove currency symbols and commas before calculation to prevent $0.00 total
            $cleanPrice = str_replace(['$', ','], '', $item['price']);
            $totalPrice = (float)$cleanPrice * $unit;

            // Updated SQL to include checkoutDate as per the tripBookingPOS.sql schema
            $insertSQL = "INSERT INTO booking (accountID, spotID, paymentID, purchaseDate, checkinDate, checkoutDate, unit, totalPrice) 
                          VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            
            $stmt = $conn->prepare($insertSQL);
            // "d" is used for the decimal totalPrice parameter
            $stmt->bind_param("iiisssid", $accountID, $spotID, $paymentID, $purchaseDate, $checkin, $checkout, $unit, $totalPrice);
            
            if (!$stmt->execute()) {
                throw new Exception("Failed to record booking for spot ID: $spotID");
            }
        }

        // Commit transaction and clear cart
        $conn->commit();
        unset($_SESSION['cart']);
        $order_processed = true;

    } catch (Exception $e) {
        $conn->rollback();
        $error_message = $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmed | BookingMaster</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['Plus Jakarta Sans', 'sans-serif'] },
                    colors: { brand: '#3B82F6', dark: '#0F172A' }
                }
            }
        }
    </script>
</head>
<body class="bg-slate-50 flex items-center justify-center min-h-screen p-6">

    <div class="max-w-xl w-full bg-white p-12 rounded-[3.5rem] shadow-2xl text-center border border-slate-100 animate-in zoom-in duration-500">
        
        <?php if ($order_processed): ?>
            <div class="w-24 h-24 bg-green-100 text-green-500 rounded-full flex items-center justify-center mx-auto mb-8">
                <i class="bi bi-check-lg text-5xl"></i>
            </div>
            <h1 class="text-4xl font-black text-dark mb-4 tracking-tight">Booking Confirmed!</h1>
            <p class="text-slate-500 mb-8 text-lg font-medium leading-relaxed">
                Pack your bags! Your trip reference is <span class="text-brand font-bold"><?= $order_id ?></span>. 
                You can view your itinerary in the dashboard.
            </p>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <a href="../index.php" class="bg-brand text-white py-4 rounded-2xl font-bold hover:bg-blue-600 transition shadow-lg shadow-blue-100 flex items-center justify-center gap-2">
                    <i class="bi bi-house-door"></i> Return Home
                </a>
                <a href="userDashboard.php" class="bg-dark text-white py-4 rounded-2xl font-bold hover:bg-slate-800 transition shadow-lg flex items-center justify-center gap-2">
                    <i class="bi bi-grid-1x2"></i> My Dashboard
                </a>
            </div>

        <?php else: ?>
            <div class="w-24 h-24 bg-red-100 text-red-500 rounded-full flex items-center justify-center mx-auto mb-8">
                <i class="bi bi-exclamation-triangle text-5xl"></i>
            </div>
            <h1 class="text-3xl font-black text-dark mb-4">Transaction Failed</h1>
            <p class="text-slate-500 mb-8"><?= htmlspecialchars($error_message ?? "An unexpected error occurred.") ?></p>
            
            <a href="cart.php" class="inline-block bg-slate-100 text-slate-600 px-10 py-4 rounded-2xl font-bold hover:bg-slate-200 transition">
                Return to Cart
            </a>
        <?php endif; ?>

    </div>

</body>
</html>