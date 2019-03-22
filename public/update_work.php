<?php
require "../config.php";
if (isset($_POST['submit'])) {
    try {
        $connection = new PDO($dsn, $username, $password, $options);
        $works =[
            "id"                => $POST['id'],
            "item"              => $POST['item'],
            "room"              => $POST['room'],
            "makebrand"         => $POST['makebrand'],
            "model"             => $POST['model'],
            "serialnumber"      => $POST['serialnumber'],
            "purchaseprice"     => $POST['purchaseprice'],
            "purchasedate"      => $POST['purchasedate'],
            "purchaseplace"     => $POST['purchaseplace'],
            "receipt"           => $POST['receipt'],
            "heirloomantique"   => $POST['heirloomantique'],
            "picture"           => $POST['picture'],
            "description"       => $POST['description'],
            "date"              => $POST['date'],
        ];
        $sql = "UPDATE 'works
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
        picture = :picture,
        description = :description,
        date : date
        WHERE id = :id";
        $statement = $connection->prepare($sql);
        $statement->execute($works);
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
        $statement->bindValue('id', $id);
        $statement->execute();
        $works = $statement->fetch(PDO::FETCH_ASSOC);
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
} else {
    echo"No id - something went wrong":
};
?>
<?php include "templates/header.php"; ?>
<?php if (isset($_POST['submit']) && $statement) : ?>
<p>Item successfully updated.</p>
<?php endif; ?>
<h2>Edit an item</h2>
<form method="post">
    <label for="id">ID</label>
    <input type="text" name="id" id="id" value="<?php echo escape($works['id']); ?>" >
    <label for="item">Item:</label>
    <input type="text" name="item" value="<?php echo escape($works['item']); ?>">
    <label for="item">Room:</label>
    <input type="text" name="room" value="<?php echo escape($works['room']); ?>">
    <label for="item">Make/Brand:</label>
    <input type="text" name="makebrand" value="<?php echo escape($works['makebrand']); ?>">
    <label for="item">Model:</label>
    <input type="text" name="model" value="<?php echo escape($works['model']); ?>">
    <label for="item">Serial Number:</label>
    <input type="text" name="serialnumber" value="<?php echo escape($works['serialnumber']); ?>">
    <label for="item">Purchase Price:</label>
    <input type="text" name="purchaseprice" value="<?php echo escape($works['purchaseprice']); ?>">
    <label for="item">Purchase Date:</label>
    <input type="text" name="purchasedate" value="<?php echo escape($works['purchasedate']); ?>">
    <label for="item">Place of Purchase:</label>
    <input type="text" name="purchaseplace" value="<?php echo escape($works['purchaseplace']); ?>">
    <label for="item">Receipt:</label>
    <input type="text" name="receipt" value="<?php echo escape($works['receipt']); ?>">
    <label for="item">Heirloom or Antique:</label>
    <input type="text" name="heirloomantique" value="<?php echo escape($works['heirloomantique']); ?>">
    <label for="item">Description:</label>
    <input type="text" name="description" value="<?php echo escape($works['description']); ?>">
    <label for="date">Work Date</label>
    <input type="text" name="date" id="date" value="<?php echo escape($works['date']); ?>">
    <input type="submit" name="submit" value="Update">
</form>
<?php include"templates/footer.php"; ?>