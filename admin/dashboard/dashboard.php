<?php
session_start();
require_once '../config.php'; 

// 1. SECURITY: Only allow admins
if (!isset($_SESSION['accountID']) || $_SESSION['permission'] !== 'admin') {
    header("Location: ../login/index.php");
    exit();
}

$message = "";

// 2. DATABASE ACTIONS: Handle User Profile Updates
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['admin_update_user'])) {
    $targetUserID = mysqli_real_escape_string($conn, $_POST['targetUserID']);
    $targetAccID = mysqli_real_escape_string($conn, $_POST['targetAccountID']);
    
    $fName = mysqli_real_escape_string($conn, $_POST['fName']);
    $lName = mysqli_real_escape_string($conn, $_POST['lName']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    $sql1 = "UPDATE userinfo SET FName='$fName', LName='$lName', phone='$phone', address='$address' WHERE userID='$targetUserID'";
    $sql2 = "UPDATE account SET email='$email' WHERE accountID='$targetAccID'";

    if (mysqli_query($conn, $sql1) && mysqli_query($conn, $sql2)) {
        $message = "Record updated successfully.";
    }
}

// 3. FETCH GLOBAL STATS
$stats = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as count, SUM(totalPrice) as total FROM booking"));
$userCount = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as uCount FROM userinfo"))['uCount'];

// 4. FETCH DATA FOR LISTS
// Overview: All Bookings (Joined for details)
$allBookings = mysqli_query($conn, "SELECT b.*, s.name as spotName, u.FName, u.LName 
                                    FROM booking b 
                                    JOIN spot s ON b.spotID = s.spotID 
                                    JOIN userinfo u ON b.accountID = u.accountID 
                                    ORDER BY b.purchaseDate DESC");

// User Management: All Users
$usersResult = mysqli_query($conn, "SELECT u.*, a.email, a.permission 
                                   FROM userinfo u 
                                   JOIN account a ON u.accountID = a.accountID 
                                   ORDER BY u.createdDate DESC");

                                   
// --- 2. DATABASE ACTIONS: ADD NEW SPOT ---
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_new_spot'])) {
    // Address Table Fields
    $country = mysqli_real_escape_string($conn, $_POST['country']);
    $province = mysqli_real_escape_string($conn, $_POST['province']);
    $district = mysqli_real_escape_string($conn, $_POST['district']);
    $street = mysqli_real_escape_string($conn, $_POST['street']);
    $houseNumber = mysqli_real_escape_string($conn, $_POST['houseNumber']);
    
    // Insert into Address Table
    $addrSql = "INSERT INTO address (country, province, district, street, houseNumber) 
                VALUES ('$country', '$province', '$district', '$street', '$houseNumber')";
    
    if (mysqli_query($conn, $addrSql)) {
        $addressID = mysqli_insert_id($conn);

        // Spot Table Fields
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $type = mysqli_real_escape_string($conn, $_POST['type']);
        $status = mysqli_real_escape_string($conn, $_POST['status']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $detail = mysqli_real_escape_string($conn, $_POST['detail']);
        $price = mysqli_real_escape_string($conn, $_POST['price']);

        $spotSql = "INSERT INTO spot (name, type, status, phone, addressID, detail, price) 
                    VALUES ('$name', '$type', '$status', '$phone', '$addressID', '$detail', '$price')";
        
        if (mysqli_query($conn, $spotSql)) {
            $message = "Destination '$name' has been successfully listed.";
        }
    }
}

// --- FETCH ALL SPOTS FOR MANAGEMENT ---
$allSpots = mysqli_query($conn, "
    SELECT s.*, a.country, a.province, a.district 
    FROM spot s 
    LEFT JOIN address a ON s.addressID = a.addressID 
    ORDER BY s.spotID DESC
");


// --- 1. ACTION: DELETE SPOT ---
if (isset($_GET['delete_spot'])) {
    $sID = mysqli_real_escape_string($conn, $_GET['delete_spot']);
    $aID = mysqli_real_escape_string($conn, $_GET['addressID']);
    
    // Delete the spot first (Foreign Key constraint safety)
    $delSpot = "DELETE FROM spot WHERE spotID = '$sID'";
    if (mysqli_query($conn, $delSpot)) {
        // Delete the address associated with it
        mysqli_query($conn, "DELETE FROM address WHERE addressID = '$aID'");
        $message = "Spot #$sID and its address record have been removed.";
    }
}

// --- 2. ACTION: UPDATE SPOT ---

// --- FULL UPDATE LOGIC: SPOT + ADDRESS ---
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_spot_full'])) {
    $sID = mysqli_real_escape_string($conn, $_POST['spotID']);
    $aID = mysqli_real_escape_string($conn, $_POST['addressID']);
    
    // 1. Update Address Table
    $country = mysqli_real_escape_string($conn, $_POST['country']);
    $province = mysqli_real_escape_string($conn, $_POST['province']);
    $district = mysqli_real_escape_string($conn, $_POST['district']);
    $street = mysqli_real_escape_string($conn, $_POST['street']);
    $house = mysqli_real_escape_string($conn, $_POST['houseNumber']);

    $addrUpdate = "UPDATE address SET 
                    country='$country', province='$province', 
                    district='$district', street='$street', houseNumber='$house' 
                  WHERE addressID='$aID'";
    
    // 2. Update Spot Table
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);
    $type = mysqli_real_escape_string($conn, $_POST['type']);

    $spotUpdate = "UPDATE spot SET 
                    name='$name', price='$price', 
                    status='$status', type='$type' 
                   WHERE spotID='$sID'";

    if (mysqli_query($conn, $addrUpdate) && mysqli_query($conn, $spotUpdate)) {
        echo "<script>window.location.href='dashboard.php';</script>";
        exit();
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Master Admin | BookingMaster</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['Plus Jakarta Sans', 'sans-serif'] },
                    colors: { brand: '#3B82F6', dark: '#0F172A', slateBg: '#F8FAFC' }
                }
            }
        }
        function navigateTo(tabId, btn) {
            document.querySelectorAll('.tab-content').forEach(t => t.classList.add('hidden'));
            document.getElementById(tabId).classList.remove('hidden');
            document.querySelectorAll('.nav-btn').forEach(b => b.classList.remove('bg-brand', 'text-white'));
            btn.classList.add('bg-brand', 'text-white');
        }
    </script>
</head>
<body class="bg-slateBg font-sans text-slate-900">

    <div class="flex min-h-screen">
        <aside class="w-72 bg-dark text-slate-400 p-8 hidden lg:flex flex-col fixed h-full z-50">
            <div class="text-white text-2xl font-black mb-12 flex items-center gap-3 italic">
                <div class="bg-brand p-2 rounded-xl"><i class="bi bi-shield-check"></i></div> AdminHub
            </div>
            <nav class="flex-1 space-y-2">
                <button onclick="navigateTo('tab-overview', this)" class="nav-btn w-full flex items-center gap-4 px-5 py-3.5 rounded-2xl bg-brand text-white font-bold transition-all">
                    <i class="bi bi-grid"></i> Overview
                </button>
                <button onclick="navigateTo('tab-users', this)" class="nav-btn w-full flex items-center gap-4 px-5 py-3.5 rounded-2xl hover:bg-white/5 font-bold text-left transition-all">
                    <i class="bi bi-people"></i> Manage Users
                </button>
                <button onclick="navigateTo('tab-add-spot', this)" class="nav-btn w-full flex items-center gap-4 px-5 py-3.5 rounded-2xl hover:bg-white/5 font-bold text-left transition-all">
    <i class="bi bi-plus-circle-fill"></i><span>New Product</span>
</button>
<button onclick="navigateTo('tab-manage-spots', this)" class="nav-btn w-full flex items-center gap-4 px-5 py-3.5 rounded-2xl hover:bg-white/5 font-bold text-left transition-all">
    <i class="bi bi-collection-play-fill"></i> Manage Product
</button>
            </nav>
            <a href="../../home/index.php" class="text-slate-400 font-bold flex items-center gap-4 px-5 py-3.5 hover:bg-white/5 hover:text-white rounded-2xl transition-all">
    <i class="bi bi-house-door-fill"></i> Return Home
</a>
            <a href="../../profile/logout/index.php" class="text-red-400 font-bold flex items-center gap-4 px-5 py-3 hover:bg-red-500/10 rounded-xl">
                <i class="bi bi-power"></i> Logout
            </a>
        </aside>

        <main class="flex-1 ml-72 p-12">
            <?php if($message): ?>
                <div class="mb-8 p-4 bg-green-500 text-white rounded-2xl font-bold shadow-lg"><?= $message ?></div>
            <?php endif; ?>

            <div id="tab-overview" class="tab-content space-y-10">
                <div class="flex justify-between items-end">
                    <div>
                        <h1 class="text-4xl font-black">System Overview</h1>
                        <p class="text-slate-400">Manage all transactions and platform metrics.</p>
                    </div>
                </div>

                <div class="grid grid-cols-3 gap-6">
                    <div class="bg-white p-8 rounded-[2rem] border shadow-sm">
                        <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Total Bookings</p>
                        <h3 class="text-3xl font-black"><?= number_format($stats['count']) ?></h3>
                    </div>
                    <div class="bg-white p-8 rounded-[2rem] border shadow-sm">
                        <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Total Revenue</p>
                        <h3 class="text-3xl font-black text-brand">$<?= number_format($stats['total'] ?? 0, 2) ?></h3>
                    </div>
                    <div class="bg-white p-8 rounded-[2rem] border shadow-sm">
                        <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Active Users</p>
                        <h3 class="text-3xl font-black"><?= number_format($userCount) ?></h3>
                    </div>
                </div>

                <div class="bg-white rounded-[2.5rem] border shadow-sm overflow-hidden">
                    <div class="p-8 border-b flex justify-between items-center bg-slate-50/50">
                        <h2 class="text-xl font-extrabold">Recent Booking Records</h2>
                        <span class="text-xs font-black text-brand uppercase tracking-widest">Live Feed</span>
                    </div>
                    <table class="w-full text-left">
                        <thead class="bg-slate-50 text-[10px] font-black text-slate-400 uppercase tracking-widest">
                            <tr>
                                <th class="px-8 py-5">Booking ID</th>
                                <th class="px-8 py-5">Customer</th>
                                <th class="px-8 py-5">Spot</th>
                                <th class="px-8 py-5">Dates (In/Out)</th>
                                <th class="px-8 py-5 text-right">Price</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-50">
                            <?php while($b = mysqli_fetch_assoc($allBookings)): ?>
                            <tr class="hover:bg-slate-50 transition">
                                <td class="px-8 py-5 font-black text-slate-300">#BK-<?= $b['bookingID'] ?></td>
                                <td class="px-8 py-5 font-bold text-sm"><?= htmlspecialchars($b['FName'].' '.$b['LName']) ?></td>
                                <td class="px-8 py-5 font-semibold text-sm text-slate-500 italic"><?= htmlspecialchars($b['spotName']) ?></td>
                                <td class="px-8 py-5 text-xs font-bold text-slate-400">
                                    <?= date('M d', strtotime($b['checkinDate'])) ?> - <?= date('M d, Y', strtotime($b['checkoutDate'])) ?>
                                </td>
                                <td class="px-8 py-5 text-right font-black text-brand">$<?= number_format($b['totalPrice'], 2) ?></td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div id="tab-users" class="tab-content hidden space-y-8">
                <h1 class="text-4xl font-black italic">User Registry</h1>
                <div class="bg-white rounded-[2.5rem] border shadow-sm overflow-hidden">
                    <table class="w-full text-left">
                        <thead class="bg-slate-900 text-[10px] font-black text-slate-400 uppercase tracking-widest">
                            <tr>
                                <th class="px-8 py-5">Member</th>
                                <th class="px-8 py-5">Email & Phone</th>
                                <th class="px-8 py-5">Address</th>
                                <th class="px-8 py-5 text-center">Manage</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-50">
                            <?php while($u = mysqli_fetch_assoc($usersResult)): ?>
                            <tr class="hover:bg-slate-50 transition group">
                                <td class="px-8 py-5">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-xl bg-slate-100 flex items-center justify-center font-bold text-brand uppercase"><?= substr($u['FName'],0,1) ?></div>
                                        <p class="font-bold text-sm"><?= $u['FName'].' '.$u['LName'] ?></p>
                                    </div>
                                </td>
                                <td class="px-8 py-5">
                                    <p class="text-sm font-semibold"><?= $u['email'] ?></p>
                                    <p class="text-xs text-slate-400"><?= $u['phone'] ?></p>
                                </td>
                                <td class="px-8 py-5 text-xs text-slate-500"><?= $u['address'] ?: '---' ?></td>
                                <td class="px-8 py-5 text-center">
                                    <button onclick='openEditModal(<?= json_encode($u) ?>)' class="bg-slate-100 p-3 rounded-xl text-slate-400 hover:bg-brand hover:text-white transition">
                                        <i class="bi bi-pencil-fill"></i>
                                    </button>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
<div id="tab-add-spot" class="tab-content space-y-10 animate-in fade-in duration-500">
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-4xl font-black text-slate-900 tracking-tight">Add New Destination</h1>
            <p class="text-slate-400 font-medium">Create a new entry for the global travel registry.</p>
        </div>
        <div class="bg-brand/10 text-brand px-6 py-3 rounded-2xl font-bold flex items-center gap-2">
            <i class="bi bi-info-circle-fill"></i> System ID: Auto-Generated
        </div>
    </div>

    <form action="" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 xl:grid-cols-3 gap-8">
        
        <div class="xl:col-span-2 space-y-8">
            <div class="bg-white p-10 rounded-[3rem] border border-slate-100 shadow-sm space-y-8">
                <div class="flex items-center gap-4 border-b border-slate-50 pb-6">
                    <div class="h-10 w-10 bg-brand text-white rounded-xl flex items-center justify-center shadow-lg shadow-blue-500/20">
                        <i class="bi bi-geo-alt-fill"></i>
                    </div>
                    <h3 class="text-xl font-extrabold text-slate-800">Spot Information</h3>
                </div>

                <div class="space-y-6">
                    <div class="space-y-2">
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-4">Official Spot Name</label>
                        <input type="text" name="name" placeholder="e.g. Grand Continental Hotel" 
                               class="w-full bg-slate-50 border-none rounded-2xl p-5 font-bold focus:ring-4 focus:ring-brand/10 transition-all" required>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-4">Property Type</label>
                            <select name="type" class="w-full bg-slate-50 border-none rounded-2xl p-5 font-bold focus:ring-4 focus:ring-brand/10 transition-all">
                                <option value="Travel-Packages">Travel-Packages</option>
                                <option value="Luxury-Hotels">Luxury-Hotels</option>
                                <option value="Vehicle-Rental">Vehicle-Rental</option>
                                <option value="Room-Rentals">Room-Rentals</option>
                                <option value="Tour-Guides">Tour-Guides</option>
                            </select>
                        </div>
                        <div class="space-y-2">
                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-4">Base Price ($)</label>
                            <input type="number" step="0.01" name="price" placeholder="0.00" 
                                   class="w-full bg-slate-50 border-none rounded-2xl p-5 font-bold focus:ring-4 focus:ring-brand/10 transition-all" required>
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-4">About this Destination</label>
                        <textarea name="detail" rows="5" placeholder="Enter amenities, services, and unique selling points..." 
                                  class="w-full bg-slate-50 border-none rounded-2xl p-5 font-bold focus:ring-4 focus:ring-brand/10 transition-all"></textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="space-y-8">
            <div class="bg-dark text-white p-10 rounded-[3rem] shadow-2xl space-y-8">
                <div class="flex items-center gap-4 border-b border-white/10 pb-6">
                    <div class="h-10 w-10 bg-white/10 text-white rounded-xl flex items-center justify-center">
                        <i class="bi bi-map"></i>
                    </div>
                    <h3 class="text-xl font-extrabold italic">Location & Status</h3>
                </div>

                <div class="space-y-5">
                    <div class="grid grid-cols-2 gap-4">
                        <div class="space-y-2">
                            <label class="text-[10px] font-black text-slate-500 uppercase ml-2">House No.</label>
                            <input type="text" name="houseNumber" placeholder="12A" class="w-full bg-white/5 border-none rounded-xl p-4 font-bold text-sm focus:bg-white/10">
                        </div>
                        <div class="space-y-2">
                            <label class="text-[10px] font-black text-slate-500 uppercase ml-2">Street</label>
                            <input type="text" name="street" placeholder="Maple St." class="w-full bg-white/5 border-none rounded-xl p-4 font-bold text-sm focus:bg-white/10">
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label class="text-[10px] font-black text-slate-500 uppercase ml-2">District</label>
                        <input type="text" name="district" placeholder="Downtown District" class="w-full bg-white/5 border-none rounded-xl p-4 font-bold text-sm focus:bg-white/10">
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div class="space-y-2">
                            <label class="text-[10px] font-black text-slate-500 uppercase ml-2">Province</label>
                            <input type="text" name="province" placeholder="State" class="w-full bg-white/5 border-none rounded-xl p-4 font-bold text-sm focus:bg-white/10">
                        </div>
                        <div class="space-y-2">
                            <label class="text-[10px] font-black text-slate-500 uppercase ml-2">Country</label>
                            <input type="text" name="country" placeholder="Country" class="w-full bg-white/5 border-none rounded-xl p-4 font-bold text-sm focus:bg-white/10">
                        </div>
                    </div>

                    <div class="pt-6 border-t border-white/10 space-y-5">
                        <div class="space-y-2">
                            <label class="text-[10px] font-black text-slate-500 uppercase ml-2">Inquiry Phone</label>
                            <input type="text" name="phone" placeholder="+1 000 000 000" class="w-full bg-white/5 border-none rounded-xl p-4 font-bold text-sm focus:bg-white/10">
                        </div>
                        
                        <div class="space-y-2">
                            <label class="text-[10px] font-black text-slate-500 uppercase ml-2">Registry Status</label>
                            <select name="status" class="w-full bg-white/5 border-none rounded-xl p-4 font-bold text-sm focus:bg-white/10">
                                <option value="Available" class="text-dark">available</option>
                                <option value="Hidden" class="text-dark">unavailable</option>
                            </select>
                        </div>
                    </div>

                    <button type="submit" name="add_new_spot" 
                            class="w-full bg-brand text-white py-6 rounded-3xl font-black text-xs uppercase tracking-[0.2em] shadow-xl shadow-blue-500/20 hover:bg-blue-600 hover:-translate-y-1 transition-all mt-4">
                        Sync to Database
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
<div id="tab-manage-spots" class="tab-content hidden animate-in fade-in duration-500">
    
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-4xl font-black text-slate-900">Destination Inventory</h1>
            <p class="text-slate-400 font-medium">Control both property details and geographic locations.</p>
        </div>
        <div class="bg-white px-6 py-3 rounded-2xl border shadow-sm">
            <span class="text-xl font-black text-brand"><?= mysqli_num_rows($allSpots) ?></span>
            <span class="text-[10px] font-black text-slate-400 uppercase ml-2">Spots</span>
        </div>
    </div>

    <div class="bg-white rounded-[3rem] border border-slate-100 shadow-sm overflow-hidden">
        <table class="w-full text-left">
            <thead class="bg-slate-50 text-[10px] font-black text-slate-400 uppercase tracking-widest">
                <tr>
                    <th class="px-8 py-6">Spot & Category</th>
                    <th class="px-8 py-6">Location</th>
                    <th class="px-8 py-6">Price</th>
                    <th class="px-8 py-6 text-center">Manage</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-50">
                <?php mysqli_data_seek($allSpots, 0); while($s = mysqli_fetch_assoc($allSpots)): ?>
                <tr class="hover:bg-slate-50/50 transition-colors group">
                    <td class="px-8 py-6">
                        <p class="font-black text-slate-800"><?= htmlspecialchars($s['name']) ?></p>
                        <p class="text-[10px] font-bold text-slate-400 uppercase"><?= $s['type'] ?></p>
                    </td>
                    <td class="px-8 py-6">
                        <p class="text-sm font-bold text-slate-600"><?= $s['district'] ?>, <?= $s['province'] ?></p>
                        <p class="text-[10px] text-slate-400 font-black uppercase"><?= $s['country'] ?></p>
                    </td>
                    <td class="px-8 py-6 font-black text-brand">$<?= number_format($s['price'], 2) ?></td>
                   <td class="px-8 py-6 text-center">
    <div class="flex justify-center items-center gap-2">
        <button onclick='openEditSpotModal(<?= json_encode($s) ?>)' 
                class="w-10 h-10 bg-slate-100 rounded-xl text-slate-400 hover:bg-brand hover:text-white transition-all shadow-sm flex items-center justify-center">
            <i class="bi bi-pencil-square"></i>
        </button>

        <a href="?delete_spot=<?= $s['spotID'] ?>&addressID=<?= $s['addressID'] ?>" 
           onclick="return confirm('CRITICAL: This will permanently delete <?= htmlspecialchars($s['name']) ?>. Proceed?')"
           class="w-10 h-10 bg-red-50 rounded-xl text-red-400 hover:bg-red-500 hover:text-white transition-all shadow-sm flex items-center justify-center">
            <i class="bi bi-trash3-fill"></i>
        </a>
    </div>
</td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

  <div id="editSpotModal" class="fixed inset-0 z-[9999] hidden flex items-center justify-center p-4">
    <div class="absolute inset-0 bg-slate-900/80 backdrop-blur-md" onclick="closeSpotModal()"></div>
    
    <div class="relative bg-white w-full max-w-2xl rounded-[3rem] p-10 shadow-2xl overflow-y-auto max-h-[90vh] z-10">
        <h3 class="text-2xl font-black mb-6 italic text-slate-800 border-b pb-4">Edit Destination & Address</h3>
        
        <form action="" method="POST" class="space-y-6">
            <input type="hidden" name="spotID" id="edit_spotID">
            <input type="hidden" name="addressID" id="edit_addressID">
            
            <div class="grid grid-cols-2 gap-4">
                <div class="col-span-2">
                    <label class="text-[10px] font-black text-slate-400 uppercase ml-2">Spot Name</label>
                    <input type="text" name="name" id="edit_name" class="w-full bg-slate-50 rounded-2xl p-4 font-bold border-none">
                </div>
                <input type="text" name="type" id="edit_type" placeholder="Type" class="bg-slate-50 rounded-2xl p-4 font-bold border-none">
                <input type="number" step="0.01" name="price" id="edit_price" placeholder="Price" class="bg-slate-50 rounded-2xl p-4 font-bold border-none">
            </div>

            <div class="grid grid-cols-2 gap-4">
                <input type="text" name="houseNumber" id="edit_house" placeholder="House No." class="bg-slate-50 rounded-2xl p-4 font-bold border-none">
                <input type="text" name="street" id="edit_street" placeholder="Street" class="bg-slate-50 rounded-2xl p-4 font-bold border-none">
                <input type="text" name="district" id="edit_district" placeholder="District" class="bg-slate-50 rounded-2xl p-4 font-bold border-none">
                <input type="text" name="province" id="edit_province" placeholder="Province" class="bg-slate-50 rounded-2xl p-4 font-bold border-none text-sm">
                <input type="text" name="country" id="edit_country" placeholder="Country" class="col-span-2 bg-slate-50 rounded-2xl p-4 font-bold border-none">
            </div>

            <div class="flex flex-wrap md:flex-nowrap gap-3 pt-6 border-t border-slate-100">
                <button type="submit" name="update_spot_full" class="flex-1 bg-brand text-white py-4 rounded-2xl font-black text-xs uppercase tracking-widest shadow-lg shadow-blue-500/20 hover:bg-blue-600 transition-all">
                    Save Changes
                </button>

                <a id="modal_delete_link" href="#" 
                   onclick="return confirm('CRITICAL: Delete this destination permanently?')"
                   class="px-6 bg-red-50 text-red-500 py-4 rounded-2xl font-black text-xs uppercase tracking-widest hover:bg-red-500 hover:text-white transition-all flex items-center justify-center">
                   <i class="bi bi-trash3-fill"></i>
                </a>

                <button type="button" onclick="closeSpotModal()" class="px-8 bg-slate-100 text-slate-400 py-4 rounded-2xl font-black text-xs uppercase hover:bg-slate-200 transition-all">
                    Cancel
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function openEditSpotModal(spot) {
        document.getElementById('edit_spotID').value = spot.spotID;
        document.getElementById('edit_addressID').value = spot.addressID;
        document.getElementById('edit_name').value = spot.name;
        document.getElementById('edit_price').value = spot.price;
        document.getElementById('edit_type').value = spot.type;
        document.getElementById('edit_house').value = spot.houseNumber || '';
        document.getElementById('edit_street').value = spot.street || '';
        document.getElementById('edit_district').value = spot.district || '';
        document.getElementById('edit_province').value = spot.province || '';
        document.getElementById('edit_country').value = spot.country || '';
        
        // Update the delete link with current spot data
        const deleteBtn = document.getElementById('modal_delete_link');
        deleteBtn.href = `?delete_spot=${spot.spotID}&addressID=${spot.addressID}`;
        
        document.getElementById('editSpotModal').classList.remove('hidden');
    }

    function closeSpotModal() {
        document.getElementById('editSpotModal').classList.add('hidden');
    }
</script>
        </main>
    </div>

    <div id="editUserModal" class="fixed inset-0 bg-dark/80 backdrop-blur-sm z-[100] hidden flex items-center justify-center p-6">
        <div class="bg-white w-full max-w-2xl rounded-[3rem] p-12 shadow-2xl relative">
            <button onclick="closeEditModal()" class="absolute top-10 right-10 text-slate-300 hover:text-red-500 transition-all"><i class="bi bi-x-circle-fill text-3xl"></i></button>
            <h3 class="text-3xl font-black mb-8 italic underline decoration-brand">Edit User Record</h3>
            <form action="" method="POST" class="space-y-6">
                <input type="hidden" name="targetUserID" id="modal_userID">
                <input type="hidden" name="targetAccountID" id="modal_accID">
                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <label class="text-[10px] font-black text-slate-400 uppercase ml-2 tracking-widest">First Name</label>
                        <input type="text" name="fName" id="modal_fName" class="w-full bg-slate-50 rounded-2xl p-4 font-bold border-none focus:ring-2 focus:ring-brand">
                    </div>
                    <div>
                        <label class="text-[10px] font-black text-slate-400 uppercase ml-2 tracking-widest">Last Name</label>
                        <input type="text" name="lName" id="modal_lName" class="w-full bg-slate-50 rounded-2xl p-4 font-bold border-none focus:ring-2 focus:ring-brand">
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <label class="text-[10px] font-black text-slate-400 uppercase ml-2 tracking-widest">Email</label>
                        <input type="email" name="email" id="modal_email" class="w-full bg-slate-50 rounded-2xl p-4 font-bold border-none focus:ring-2 focus:ring-brand">
                    </div>
                    <div>
                        <label class="text-[10px] font-black text-slate-400 uppercase ml-2 tracking-widest">Phone</label>
                        <input type="text" name="phone" id="modal_phone" class="w-full bg-slate-50 rounded-2xl p-4 font-bold border-none focus:ring-2 focus:ring-brand">
                    </div>
                </div>
                <div>
                    <label class="text-[10px] font-black text-slate-400 uppercase ml-2 tracking-widest">Address</label>
                    <textarea name="address" id="modal_address" rows="3" class="w-full bg-slate-50 rounded-2xl p-4 font-bold border-none focus:ring-2 focus:ring-brand"></textarea>
                </div>
                <button type="submit" name="admin_update_user" class="w-full bg-brand text-white py-5 rounded-2xl font-black text-xs uppercase tracking-widest shadow-lg hover:bg-blue-600 transition-all">Save All Changes</button>
            </form>
        </div>
    </div>

    <script>
        function openEditModal(user) {
            document.getElementById('modal_userID').value = user.userID;
            document.getElementById('modal_accID').value = user.accountID;
            document.getElementById('modal_fName').value = user.FName;
            document.getElementById('modal_lName').value = user.LName;
            document.getElementById('modal_phone').value = user.phone;
            document.getElementById('modal_email').value = user.email;
            document.getElementById('modal_address').value = user.address;
            document.getElementById('editUserModal').classList.remove('hidden');
        }
        function closeEditModal() { document.getElementById('editUserModal').classList.add('hidden'); }
        
    </script>
</body>
</html>