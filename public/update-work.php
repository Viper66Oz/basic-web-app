<?php
require "../config.php";
require "common.php";


if (isset($_POST['submit'])) {
    try {
        $connection = new PDO($dsn, $username, $password, $options);
        $item =[
            "id"                => $_POST['id'],
            "item"              => $_POST['item'],
            "room"              => $_POST['room'],
            "makebrand"         => $_POST['makebrand'],
            "model"             => $_POST['model'],
            "serialnumber"      => $_POST['serialnumber'],
            "purchaseprice"     => $_POST['purchaseprice'],
            "purchasedate"      => $_POST['purchasedate'],
            "purchaseplace"     => $_POST['purchaseplace'],
            "receipt"           => $_POST['receipt'],
            "heirloomantique"   => $_POST['heirloomantique'],
            "description"       => $_POST['description'],
            "date"              => $_POST['date'],
        ];
        $sql = "UPDATE `works`
        SET id = :id,
        item = :item,
        room = :room,
        makebrand = :makebrand,
        model = :model,
        serialnumber = :serialnumber,
        purchaseprice = :purchaseprice,
        purchasedate = :purchasedate,
        purchaseplace = :purchaseplace,
        receipt = :receipt,
        heirloomantique = :heirloomantique,
        description = :description,
        date = :date
        WHERE id = :id";
        $statement = $connection->prepare($sql);
        $statement->execute($item);
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}


if (isset($_GET['id'])) {
    try {
        $connection = new PDO($dsn, $username, $password, $options);
        $id = $_GET['id'];
        $sql = "SELECT * FROM works WHERE id = :id";
        $statement = $connection->prepare($sql);
        $statement->bindValue(':id', $id);
        $statement->execute();
        $item = $statement->fetch(PDO::FETCH_ASSOC);
        
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
    
} else {
    echo "No id - something went wrong";
};
?>
<?php include "templates/header.php"; ?>
<?php if (isset($_POST['submit']) && $statement) : ?>
<p>Item successfully updated.</p>
<?php endif; ?>
<h2>Edit an item</h2>
<form method="post">
    <label for="id">ID</label>
    <input type="text" name="id" id="id" value="<?php echo escape($item['id']); ?>" >
    <label for="item">Item:</label>
    <input type="text" name="item" value="<?php echo escape($item['item']); ?>">
    <label for="item">Room:</label>
    <input type="text" name="room" value="<?php echo escape($item['room']); ?>">
    <label for="item">Make/Brand:</label>
    <input type="text" name="makebrand" value="<?php echo escape($item['makebrand']); ?>">
    <label for="item">Model:</label>
    <input type="text" name="model" value="<?php echo escape($item['model']); ?>">
    <label for="item">Serial Number:</label>
    <input type="text" name="serialnumber" value="<?php echo escape($item['serialnumber']); ?>">
    <label for="item">Purchase Price:</label>
    <input type="text" name="purchaseprice" value="<?php echo escape($item['purchaseprice']); ?>">
    <label for="item">Purchase Date:</label>
    <input type="text" name="purchasedate" value="<?php echo escape($item['purchasedate']); ?>">
    <label for="item">Place of Purchase:</label>
    <input type="text" name="purchaseplace" value="<?php echo escape($item['purchaseplace']); ?>">
    <label for="item">Receipt:</label>
    <input type="text" name="receipt" value="<?php echo escape($item['receipt']); ?>">
    <label for="item">Heirloom or Antique:</label>
    <input type="text" name="heirloomantique" value="<?php echo escape($item['heirloomantique']); ?>">
    <label for="item">Description:</label>
    <input type="text" name="description" value="<?php echo escape($item['description']); ?>">
    <label for="date">Work Date</label>
    <input type="text" name="date" id="date" value="<?php echo escape($item['date']); ?>">
    <input type="submit" name="submit" value="Update">
</form>
<?php include"templates/footer.php"; ?>