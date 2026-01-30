<?php

$conn = mysqli_connect("localhost", "root", "Harshureena@123", "customers");


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $email    = $_POST['email'];
    $phone    = $_POST['phone'];
    $address  = $_POST['address'];
    $password = $_POST['password'];

    
    $sql = "INSERT INTO customers (username, email, phone, address, password) 
            VALUES ('$username', '$email', '$phone', '$address', '$password')";

    if (mysqli_query($conn, $sql)) {
        header("location :submission.php");
        exit();
    } else {
        echo "<p>Error: " . mysqli_error($conn) . "</p>";
    }
}

mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration Form</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #eead77;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    form {
      background: #fff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      width: 350px;
    }
    h2 {
      text-align: center;
      margin-bottom: 20px;
      color: #333;
    }
    label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
    }
    input, select {
      width: 100%;
      padding: 8px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
    button {
      width: 100%;
      background-color: #ff9430;
      color: white;
      padding: 10px;
      border: none;
      border-radius: 5px;
      font-size: 16px;
      cursor: pointer;
    }
    button:hover {
      background-color: #f9713f;
    }
  </style>

  <form action="registration.php" method="POST">
    <h2>Registration Form</h2>

    <label for="username">User Name</label>
    <input type="text" id="username" name="username" placeholder="Enter your name" required><br>

    <label for="email">Email</label>
    <input type="email" id="email" name="email" placeholder="Enter your email" required><br>

    <label for="phone">Phone Number</label>
    <input type="text" id="phone" name="phone" placeholder="Enter your phone number" required><br>

    <label for="address">Address</label>
    <input type="text" id="address" name="address" placeholder="Enter your address" required><br>

    <label for="password">Password</label>
    <input type="password" id="password" name="password" placeholder="Enter your password" required><br>
    
    <button type="submit" name="register">Register</button>
    
  </form>



     
   </body>
</html>
