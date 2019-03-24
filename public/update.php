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
<p>
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
</p>
<hr>
<?php };
?>
<?php include "templates/footer.php"; ?>