<?php

if (isset($_POST['submit'])) {
    require "../config.php";
    require "common.php";
    
    try {
        $connection = new PDO($dsn, $username, $password, $options);
        $new_item = array(
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
            "picture"           => $_POST['picture'],
            "description"       => $_POST['description'],
        );
        
        //Ben's new sql statement to check that it works - it does, just a few typos
//        $sql = sprintf(
//            "INSERT INTO %s (%s) values (%s)",
//            "works",
//            implode(", ", array_keys($new_item)),
//            ":" . implode(", :", array_keys($new_item))
//            );
        
        //Shane's original code, but with extra underscores removed - needs to match exactly with code above and in form fields. 
        $sql = "INSERT INTO works (
                    item, 
                    room, 
                    makebrand, 
                    model, 
                    serialnumber, 
                    purchaseprice, 
                    purchasedate,
                    purchaseplace,
                    receipt, 
                    heirloomantique, 
                    picture, 
                    description
                ) VALUES (
                    :item, 
                    :room, 
                    :makebrand, 
                    :model, 
                    :serialnumber, 
                    :purchaseprice, 
                    :purchasedate, 
                    :purchaseplace, 
                    :receipt, 
                    :heirloomantique, 
                    :picture, 
                    :description
                )";
        $statement = $connection->prepare($sql);
        $statement->execute($new_item);
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}
?>
<?php include "templates/header.php"; ?>
<div class="container">
    <h2>Add Item</h2>
</div>
<div class="container">
    <form method="post" class="was-validated">
        <div class="form-group">
            <div class="form-row">
                <div class="col">
                    <label for="item">Item:</label>
                    <input type="text" class="form-control" name="item" id="item" required>
                </div>
                <div class="col">
                    <label for="room">Room:</label>
                    <input type="text" class="form-control" name="room" id="room" required>
                </div>
            </div>
            <br>
            <div class="form-row">
                <div class="col">
                    <label for="makebrand">Make/Brand:</label>
                    <input type="text" class="form-control" name="makebrand" id="makebrand" required>
                </div>
                <div class="col">
                    <label for="model">Model:</label>
                    <input type="text" class="form-control" name="model" id="model" required>
                </div>
                <div class="col">
                    <label for="serialnumber">Serial Number:</label>
                    <input type="text" class="form-control" name="serialnumber" id="serialnumber" required>
                </div>
            </div>
            <br>
            <div class="form-row">
                <div class="col">
                    <label for="purchaseprice">Purchase Price:</label>
                    <input type="number" class="form-control" name="purchaseprice" id="purchaseprice" required>
                </div>
                <div class="col">
                    <label for="purchasedate">Purchase Date:</label>
                    <input type="date" class="form-control" name="purchasedate" id="purchasedate" required>
                </div>
                <div class="col">
                    <label for="purchaseplace">Place of Purchase:</label>
                    <input type="text" class="form-control" name="purchaseplace" id="purchaseplace" required>
                </div>
            </div>
            <br>
            <div class="form-row">
                <div class="col">
                    <span>Receipt:</span>
                    <div class="form-check-inline">
                        <input class="form-check-input" type="radio" name="receipt" id="receipt-yes" value="yes">
                        <label class="form-check-label" for="receipt-yes">Yes</label>
                    </div>
                    <div class="form-check-inline">
                        <input class="form-check-input" type="radio" name="receipt" id="receipt-no" value="no" checked>
                        <label class="form-check-label" for="receipt-no">No</label>
                    </div>
                </div>
                <div class="col">
                    <span>Family heirloom or antique:</span>
                    <div class="form-check-inline">
                        <input class="form-check-input" type="radio" name="heirloomantique" id="antique-yes" value="yes">
                        <label class="form-check-label" for="antique-yes">Yes</label>
                    </div>
                    <div class="form-check-inline">
                        <input class="form-check-input" type="radio" name="heirloomantique" id="antique-no" value="no" checked>
                        <label class="form-check-label" for="antique-no">No</label>
                    </div>
                </div>
                <div class="col">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="picture" name="picture">
                        <label class="custom-file-label" for="picture">Upload a picture...</label>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <label for="description">Description</label>
                    <textarea class="form-control is-invalid" id="description" name="description" placeholder="Add a description to the text area"></textarea>
                </div>
            </div>
            <div class="form-row">
                <div class="col alert">
                    <input type="submit" value="Add Item" id="submit" name="submit" class="btn btn-outline-success">
                    <input type="reset" value="Clear Item" id="clear" class="btn btn-outline-warning">
                </div>
            </div>
        </div>
    </form>
</div>
<?php if (isset($_POST['submit']) && $statement) { ?>
<div class="container">
    <div class="alert alert-success" role="alert">Item successfully added.</div>
</div>
<?php } ?> 
<?php include "templates/footer.php"; ?>