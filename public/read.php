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
<?php include"templates/header.php"; ?>

<h2>Item List</h2>

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
</p>

<hr>
<?php };

?>
<!--
<form method="post">
    <input class="btn btn-outline-success" type="submit" name="submit" value="View All">
</form>
-->
<?php include"templates/footer.php"; ?>