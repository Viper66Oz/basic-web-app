<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
<!doctype html>
<html lang="en">
<head>
    <title>Basic Web Application - Shane Jenkins u3118500</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/stylesheet.css">
</head>
<body>
    <div class="container text-center">
        <h1>Welcome to your Inventory Application</h1>
        <br>
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <a href="#" class="navbar-brand">Hi, <?php echo htmlspecialchars($_SESSION["username"]); ?>.</a>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarMenu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarMenu">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a href="create.php" class="nav-link">Add</a></li>
                    <li class="nav-item"><a href="read.php" class="nav-link">Find</a></li>
                    <li class="nav-item"><a href="update.php" class="nav-link">Update</a></li>
                    <li class="nav-item"><a href="delete.php" class="nav-link">Delete</a></li>
                    <li class="nav-item"><a href="reset.php" class="nav-link">Reset Password</a></li>
                    <li class="nav-item"><a href="logout.php" class="nav-link">Log out</a></li>
                </ul>
            </div>
        </nav>
    </div>
    <br>