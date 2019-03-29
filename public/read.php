<?php

    require "../config.php";
    
//  BEN: be sure to include the common file which contains the 'escape' funciton, otherwise you'll get a: "Uncaught Error: Call to undefined function escape" error

    require "common.php";

//    BEN: rather than having to load them on button click, let's just show the results on page load
// this will look nice once formatted

    try {
        $connection = new PDO($dsn, $username, $password, $options);
        $sql = "SELECT * FROM works";
        $statement = $connection->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }

?>
<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
<?php include"templates/header.php"; ?>
<div class="container">
    <h2>Item List</h2>
</div>
<?php foreach($result as $row) { ?>
<div class="container">
    <div class="row">
        <!--<div class="col-sm alert alert-info" role="alert">
        <strong>ID: </strong><?php echo escape($row['id']); ?>
        </div>-->
        <div class="col alert alert-success" role="alert">
            <strong>Item: </strong><?php echo $row['item']; ?>
        </div>
        <div class="col alert alert-success" role="alert">
            <strong>Room: </strong><?php echo $row['room']; ?>
        </div>
    </div>
    <div class="row">
        <div class="col alert alert-success">
            <strong>Make/Brand: </strong><?php echo $row['makebrand']; ?>
        </div>
        <div class="col alert alert-success">
            <strong>Model: </strong><?php echo $row['model']; ?>
        </div>
        <div class="col alert alert-success">
            <strong>Serial Number: </strong><?php echo $row['serialnumber']; ?>
        </div>
    </div>
    <div class="row">
        <div class="col alert alert-success">
            <strong>Purchase Price: </strong><?php echo $row['purchaseprice']; ?>
        </div>
        <div class="col alert alert-success">
            <strong>Purchase Date: </strong><?php echo $row['purchasedate']; ?>
        </div>
        <div class="col alert alert-success">
            <strong>Place of Purchase: </strong><?php echo $row['purchaseplace']; ?>
        </div>
    </div>
    <div class="row">
        <div class="col alert alert-success">
            <strong>Receipt: </strong><?php echo $row['receipt']; ?>
        </div>
        <div class="col alert alert-success">
            <strong>Heirloom/Antique: </strong><?php echo $row['heirloomantique']; ?>
        </div>
        <div class="col alert alert-success">
            <strong>Picture: </strong><img src="<?php echo $row['picture']; ?>">
        </div>
    </div>
    <div class="row">
        <div class="col alert alert-success">
            <strong>Description: </strong><?php echo $row['description']; ?>
        </div>
    </div>
    <hr>
</div>

<?php };
?>
<?php include"templates/footer.php"; ?>