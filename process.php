<?php
$user_name = htmlspecialchars($_POST['username']);
$email = htmlspecialchars($_POST['email']);
$pass = htmlspecialchars(md5($_POST['password']));

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "internship";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$query = "INSERT into `users`(`name`, `email`, `password`) VALUES ('$user_name', '$email', '$pass')";
$result = mysqli_query($conn, $query);

if (empty($user_name) || empty($pass) || empty($email)) {
    die('Please fill all required fields!');
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die('Your mail is not valid!');
}

$conn->close();

if ($result) {
    header("Location: login.php");
} else {
    echo "Something went wrong";
}
