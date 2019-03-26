<?php
require "../config.php";
require "common.php";
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
<?php include"templates/header.php"; ?>
<h2>Update and item</h2>
<?php foreach($result as $row) { ?>
<!--<p>
    ID:
    <?php echo escape($row['id']); ?><br>
    Item:<?php echo $row['item']; ?><br>
    Room:<?php echo $row['room']; ?><br>
    Make/Brand:<?php echo $row['makebrand']; ?><br>
    Model:<?php echo $row['model']; ?><br>
    Serial Number:<?php echo $row['serialnumber']; ?><br>
    Purchase Price:<?php echo $row['purchaseprice']; ?><br>
    Purchase Date:<?php echo $row['purchasedate']; ?><br>
    Purchase Place:<?php echo $row['purchaseplace']; ?><br>
    Receipt:<?php echo $row['receipt']; ?><br>
    Heirloom/Antique:<?php echo $row['heirloomantique']; ?><br>
    Picture:<?php echo $row['picture']; ?><br>
    Description:<?php echo $row['description']; ?><br>
    <a class="btn btn-outline-warning" href="update-work.php?id=<?php echo $row['id']; ?>">Update</a>
</p>-->
<div class="row">
    <div class="col-sm-4 alert alert-info" role="alert">
        ID: <?php echo escape($row['id']); ?>
    </div>
    <div class="col-sm-4 alert alert-success" role="alert">
        Item: <?php echo $row['item']; ?>
    </div>
    <div class="col-sm-4 alert alert-success" role="alert">
        Room: <?php echo $row['room']; ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-4 alert alert-success">
        Make/Brand: <?php echo $row['makebrand']; ?>
    </div>
    <div class="col-sm-4 alert alert-success">
        Model: <?php echo $row['model']; ?>
    </div>
    <div class="col-sm-4 alert alert-success">
        Serial Number: <?php echo $row['serialnumber']; ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-4 alert alert-success">
        Purchase Price: <?php echo $row['purchaseprice']; ?>
    </div>
    <div class="col-sm-4 alert alert-success">
        Purchase Date: <?php echo $row['purchasedate']; ?>
    </div>
    <div class="col-sm-4 alert alert-success">
        Place of Purchase: <?php echo $row['purchaseplace']; ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-4 alert alert-success">
        Receipt: <?php echo $row['receipt']; ?>
    </div>
    <div class="col-sm-4 alert alert-success">
        Heirloom/Antique: <?php echo $row['heirloomantique']; ?>
    </div>
    <div class="col-sm-4 alert alert-success">
        Picture: <img src="<?php echo $row['picture']; ?>">
    </div>
</div>
<div class="row">
    <div class="col alert alert-success">
        Description: <?php echo $row['description']; ?><a class="btn btn-warning float-right" href="update-work.php?id=<?php echo $row['id']; ?>">Update item</a>
    </div>
</div>
<hr>
<?php };
?>
<?php include "templates/footer.php"; ?>