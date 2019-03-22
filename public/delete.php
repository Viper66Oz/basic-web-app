<?php
require "../config.php";
if (isset($_GET["id"])) {
    try {
        $connection = new PDO($dsn, $username, $password, $options);
        $id = $_GET["id"];
        $sql = "DELETE FROM works WHERE id = :id";
        $statement = $connection->prepare($sql);
        $statement->bindValue(':id', $id);
        $statement->execute();
        $success = "Item successfully removed";
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
};
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
<?php include "templates/header.php"; ?>
<h2>Remove an item</h2>
<?php if ($success) echo $success; ?>
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
    <a class="btn btn-danger" role="button" href="delete.php?id=<?php echo $row['id']; ?>">Remove item</a>
</p>
<hr>
<?php }; ?>
<?php include "templates/footer.php"; ?>