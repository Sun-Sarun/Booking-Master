<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookingMaster</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/vendor.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&family=Open+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
     <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: Poppins, sans-serif;
           
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .form-box {
            background: #fff;
            padding: 30px 35px;
            width: 100%;
            max-width: 450px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        }

        h1 {
            text-align: center;
            margin-bottom: 25px;
            color: #333;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            font-weight: 600;
            display: block;
            margin-bottom: 6px;
            color: #444;
        }

        input, select {
            width: 100%;
            padding: 10px 12px;
            border-radius: 6px;
            border: 1px solid #ccc;
            outline: none;
            font-size: 15px;
        }

        input:focus, select:focus {
            border-color: #4f46e5;
            box-shadow: 0 0 5px rgba(79,70,229,0.4);
        }

        .btn-submit {
            width: 100%;
            padding: 12px;
            border: none;
            background: #4f46e5;
            color: #fff;
            font-size: 16px;
            border-radius: 6px;
            cursor: pointer;
            transition: 0.3s;
            margin-top: 10px;
        }

        .btn-submit:hover {
            background: #4338ca;
        }
    </style>
</head>
<body>
 <header class="main-header">
   <a class="logo" href="#"><img src="../imgs/bookingMasterLogoCroped.png" alt="logo" width=30%>BookingMaster</a> 
        <div class="booking-container">
        <form action="process_booking.php" method="POST">
            <input type="text" name="destination" placeholder="Where to?" required>
            <button type="submit" name="search">Search Now</button>
        </form>
        <a href="#">Sign In/Register</a>
    </div>
</header>

<div class="form-box">
    <h1>Profile</h1>

    <form method="post" action="added_product.php" enctype="multipart/form-data">
                <div class="form-group">
            <label>Picture</label>
            <input type="file" name="files" required>
        </div>
        <div class="form-group">
            <table>    
            <tr>
            <label>First Name</label>
            <input type="text" name="txtname" placeholder="Enter menu name" required>
    </tr>
    <tr>
            <label>Last Name</label>
            <input type="text" name="txtname" placeholder="Enter menu name" required>
    </tr>
    </table>
        </div>

         <div class="form-group">
            <label>Gender</label>
            <input type="text" name="txtname" placeholder="Enter menu name" required>
        </div>
         <div class="form-group">
            <label>BirthDate</label>
            <input type="text" name="txtname" placeholder="Enter menu name" required>
        </div>
         <div class="form-group">
            <label>Phone</label>
            <input type="text" name="txtname" placeholder="Enter menu name" required>
        </div>
         <div class="form-group">
            <label>Email</label>
            <input type="text" name="txtname" placeholder="Enter menu name" required>
        </div>

         <div class="form-group">
            <label>Address</label>
            <input type="text" name="txtname" placeholder="Enter menu name" required>
        </div>


        <div class="form-group">
            <label>Size</label>
            <select name="txtsize" required>
                <option value="">-- Select Size --</option>
                <option>Regular</option>
                <option>Large</option>
                <option>Small</option>
                <option>Grand</option>
            </select>
        </div>

        <div class="form-group">
            <label>Price</label>
            <input type="text" name="txtprice" placeholder="Enter price" required>
        </div>

        <div class="form-group">
            <label>Point</label>
            <input type="text" name="txtpoint" placeholder="Enter point" required>
        </div>

        <button type="submit" name="btnadd" class="btn-submit">
            Update
        </button>

    </form>
</div>



<footer class="main-header">
    <div class="logo">MyBrand</div>
    <nav class="nav-links">
        <a href="#">Home</a>
        <a href="#">Services</a>
        <a href="#">Portfolio</a>
        <a href="#">Contact</a>
    </nav>
</footer>
</body>
</html>