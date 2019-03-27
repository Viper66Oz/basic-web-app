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
        description = :description
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
    <h2>Update selected item</h2>
    <form method="post" class="was-validated">
        <div class="form-group">
            <div class="form-row">
                <div class="col-sm id-hide">
                    <label for="id">ID:</label>
                    <input type="text" class="form-control" name="id" id="id" value="<?php echo escape($item['id']); ?>" readonly>
                </div>
                <div class="col-sm">
                    <label for="item">Item:</label>
                    <input type="text" class="form-control" name="item" value="<?php echo escape($item['item']); ?>" required>
                </div>
                <div class="col-sm">
                    <label for="item">Room:</label>
                    <input type="text" class="form-control" name="room" value="<?php echo escape($item['room']); ?>" required>
                </div>
            </div>
            <br>
            <div class="form-row">
                <div class="col-sm">
                    <label for="item">Make/Brand:</label>
                    <input type="text" class="form-control" name="makebrand" value="<?php echo escape($item['makebrand']); ?>" required>
                </div>
                <div class="col-sm">
                    <label for="item">Model:</label>
                    <input type="text" class="form-control" name="model" value="<?php echo escape($item['model']); ?>" required>
                </div>
                <div class="col-sm">
                    <label for="item">Serial Number:</label>
                    <input type="text" class="form-control" name="serialnumber" value="<?php echo escape($item['serialnumber']); ?>" required>
                </div>
            </div>
            <br>
            <div class="form-row">
                <div class="col-sm">
                    <label for="item">Purchase Price:</label>
                    <input type="number" class="form-control" name="purchaseprice" value="<?php echo escape($item['purchaseprice']); ?>" required>
                </div>
                <div class="col-sm">
                    <label for="item">Purchase Date:</label>
                    <input type="date" class="form-control" name="purchasedate" value="<?php echo escape($item['purchasedate']); ?>" required>
                </div>
                <div class="col-sm">
                    <label for="item">Place of Purchase:</label>
                    <input type="text" class="form-control" name="purchaseplace" value="<?php echo escape($item['purchaseplace']); ?>" required>
                </div>
            </div>
            <br>
            <div class="form-row">
                <div class="col-sm">
                    <span>Receipt:</span>
                    <div class="form-check-inline">
                        <!--BEN: New radio button logic to return correct value. You can correct spacing in CSS-->
                        <input class="form-check-input" type="radio" name="receipt" id="receipt-yes" value="yes" required <?php echo ($item[ 'receipt']=='yes' ) ? 'checked' : ''; ?>>
                        <label class="form-check-label inline-spacer" for="receipt-yes">Yes</label>
                        <input class="form-check-input" type="radio" name="receipt" id="receipt-No" value="no" required <?php echo ($item[ 'receipt']=='no' ) ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="receipt-yes">No</label>
                        <!--<input class="form-check-input" type="radio" name="receipt" id="receipt-yes" value="<?php echo escape($item['receipt']); ?>" required>
                        <label class="form-check-label" for="receipt-yes">Yes</label>-->
                    </div>
                    <!--<div class="form-check-inline">
                        <input class="form-check-input" type="radio" name="receipt" id="receipt-no" value="<?php echo escape($item['receipt']); ?>" required>
                        <label class="form-check-label" for="receipt-no">No</label>
                    </div>-->
                </div>
                <div class="col-sm">
                    <span>Family heirloom or antique:</span>
                    <div class="form-check-inline">
                        <!--<input class="form-check-input" type="radio" name="heirloomantique" id="antique-yes" value="<?php //echo escape($item['heirloomantique']); ?>" required>-->
                        <input class="form-check-input" type="radio" name="heirloomantique" id="antique-yes" value="yes" required <?php echo ($item[ 'heirloomantique']=='yes' ) ? 'checked' : ''; ?>>
                        <label class="form-check-label inline-spacer" for="antique-yes">Yes</label>
                        <input class="form-check-input" type="radio" name="heirloomantique" id="antique-no" value="no" required <?php echo ($item[ 'heirloomantique']=='no' ) ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="antique-no">No</label>
                    </div>
                    <!--<div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="heirloomantique" id="antique-no" value="<?php echo escape($item['heirloomantique']); ?>" required>
                    <label class="form-check-label" for="antique-no">No</label>
                </div>-->
                </div>
                <div class="col-sm">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="picture" value="<?php echo escape($item['picture']); ?>">
                        <label class="custom-file-label" for="picture">Upload a picture...</label>
                    </div>
                </div>
            </div>
            <br>
            <div class="form-row">
                <div class="col-sm">
                    <label for="item">Description:</label>
                    <input type="text" class="form-control" name="description" value="<?php echo escape($item['description']); ?>">
                </div>
            </div>
            <br>
            <div class="form-row">
                <div class="col-sm">
                    <input type="submit" name="submit" value="Update item" class="btn btn-warning">
                </div>
            </div>
        </div>
    </form>
    <hr>
    <?php if (isset($_POST['submit']) && $statement) : ?>
    <div class="row">
        <div class="col-sm alert alert-success">
            Item successfully updated.
        </div>
    </div>
    <?php endif; ?>
    <?php include"templates/footer.php"; ?>