<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: rgb(238, 173, 119);
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    form {
      background: white;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      width: 350px;
    }
    h2 {
      text-align: center;
      margin-bottom: 20px;
      color: black;
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
      border: 1px solid lightgrey;
      border-radius: 5px;
    }
    button {
      width: 100%;
      background-color: darkorange;
      color: white;
      padding: 10px;
      border: none;
      border-radius: 5px;
      font-size: 16px;
      cursor: pointer;
    }
    button:hover {
      background-color: orangered;
    }
  </style>
</head>
<body>

  <form action="login.php" method="post">
    <h2>Login</h2>

    <label for="username">Username</label>
    <input type="text" id="username" name="username" placeholder="Enter your username" required>
    
    <label for="password">Password</label>
    <input type="password" id="password" name="password" placeholder="Enter your password" required>

    <button type="submit" name="login">Login</button>
  </form>
  <?php
  $conn = mysqli_connect("localhost", "root", "Harshureena@123", "customers");


if (!$conn) {
   die("Connection failed: " . mysqli_connect_error());
}
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql="select * from customers where username='$username' and password='$password'";
    $result = mysqli_query($conn, $sql);
  }
if(!$result)
{
  die("Query failed: " . mysqli_error($conn));
}
if (mysqli_num_rows($result) > 0) {
  echo"Login successful! Welcome, $username.";
}
else
{
  echo "Invalid username or password. Please try again.";
}

?>

</body>
</html>