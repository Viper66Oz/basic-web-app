<?php
require "../config.php";
require "common.php";
if (isset($_GET["id"])) {
    try {
        $connection = new PDO($dsn, $username, $password, $options);
        $id = $_GET["id"];
        $sql = "DELETE FROM works WHERE id = :id";
        $statement = $connection->prepare($sql);
        $statement->bindValue(':id', $id);
        $statement->execute();
        $success = "<div class='container'>
                        <div class='row'>
                            <div class='col alert alert-success'>Item successfully deleted</div>
                        </div>
                    </div>";
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
<div class="container">
    <h2>Delete an item</h2>
</div>
<?php foreach($result as $row) { ?>
<div class="container">
    <div class="row">
        <!--<div class="col-sm-4 alert alert-info" role="alert">
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
        <div class="col-10 alert alert-success">
            <strong>Description: </strong><?php echo $row['description']; ?>
        </div>
        <div class="col-2 alert">
            <a class="btn btn-danger float-right" role="button" href="delete.php?id=<?php echo $row['id']; ?>">Delete item</a>
        </div>
    </div>
    <hr>
</div>
<?php }; ?>
<?php if ($success) echo $success; ?>
<?php include "templates/footer.php"; ?>