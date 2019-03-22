<?php

if (isset($_POST['submit'])) {
    require "../config.php";
    try {
        $connection = new PDO($dsn, $username, $password, $otions);
        $new_work = array(
            "item" => $_POST['item'],
            "room" => $_POST['room'],
            "make_brand" => $_POST['make_brand'],
            "model" => $_POST['model'],
            "serial_number" => $_POST['serial_number'],
            "purchase_price" => $_POST['purchase_price'],
            "purchase_date" => $_POST['purchase_date'],
            "receipt" => $_POST['receipr'],
            "heirloom_antique" => $_POST['heirloom_antique'],
            "picture" => $_POST['picture'],
            "description" => $_POST['description'],
        );
        $sql = "INSERT INTO works (item, room, make_brand, model, serial_number, purchase_price, purchase_date, receipt, heirloom_antique, picture, description) VALUES (:item, :room, :make_brand, :model, :serial_number, :purchase_price, :purchase_date, :receipt, :heirloom_antique, :picture, :description)";
        $statement = $connection->prepare($sql);
        $statement->execute($new-work);
        }catch(PDOException $error) {
        echo $sql . "<br>" . $error->getmessage();
    }
}
?>
<?php include "templates/header.php"; ?>
<?php if (isset($_POST['submit']) && $statement) { ?>
<p>Item successfully added.</p>
<?php } ?>
<form method="post" class="was-validated">
    <div class="form-group">
        <!--<div class="form-row">
            <div class="col">
                <label for="username">Username:</label>
                <input type="text" class="form-control" name="username" id="username" required minlength="5" maxlength="15">
                <small id="usernameHelp" class="form-text text-muted">Password must be 5-15 characters long and only contain letters. No spaces or special characters.
                </small>
            </div>
            <div class="col">
                <label for="password">Password:</label>
                <input type="password" class="form-control" name="password" id="password" required minlength="8" maxlength="15">
                <small id="passwordHelp" class="form-text text-muted">Password must be 8-15 characters long and only contain letters. No spaces or special characters.
                </small>
            </div>
        </div>-->
        <br>
        <div class="form-row">
            <div class="col">
                <label for="item">Item:</label>
                <input type="text" class="form-control" name="item" id="item" required>
            </div>
            <div class="col">
                <label for="room">Room:</label>
                <input type="text" class="form-control" name="room" id="room">
            </div>
        </div>
        <br>
        <div class="form-row">
            <div class="col">
                <label for="make">Make/Brand:</label>
                <input type="text" class="form-control" name="make" id="make">
            </div>
            <div class="col">
                <label for="model">Model:</label>
                <input type="text" class="form-control" name="model" id="model">
            </div>
            <div class="col">
                <label for="serial-number">Serial Number:</label>
                <input type="text" class="form-control" name="serial-number" id="serial-number">
            </div>
        </div>
        <br>
        <div class="form-row">
            <div class="col">
                <label for="price">Purchase Price:</label>
                <input type="number" class="form-control" name="price" id="price">
            </div>
            <div class="col">
                <label for="date">Purchase Date:</label>
                <input type="date" class="form-control" name="date" id="date">
            </div>
            <div class="col">
                <label for="place">Place of Purchase:</label>
                <input type="text" class="form-control" name="place" id="place">
            </div>
        </div>
        <br>
        <div class="form-row">
            <div class="col">
                <span>Receipt:</span>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="receipt-yes" id="receipt-yes" value="yes">
                    <label class="form-check-label" for="receipt-yes">Yes</label>
                </div>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="receipt-no" id="receipt-no" value="no">
                    <label class="form-check-label" for="receipt-no">No</label>
                </div>
            </div>
            <div class="col">
                <span>Family heirloom or antique:</span>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="antique-yes" id="antique-yes" value="yes">
                    <label class="form-check-label" for="antique-yes">Yes</label>
                </div>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="antique-no" id="antique-no" value="no">
                    <label class="form-check-label" for="antique-no">No</label>
                </div>
            </div>
            <div class="col">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="picture">
                    <label class="custom-file-label" for="picture">Upload a picture...</label>
                </div>
            </div>
        </div>
        <br>
        <label for="description">Description</label>
        <textarea class="form-control is-invalid" id="description" placeholder="Add a description to the text area"></textarea>
        <br>
        <input type="submit" value="Add Item" id="submit" class="btn btn-outline-success">
        <input type="reset" value="Clear Item" id="clear" class="btn btn-outline-warning">
    </div>
</form>
<?php include "templates/footer.php"; ?>