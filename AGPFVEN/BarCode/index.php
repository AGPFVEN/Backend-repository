<?php include("database/db.php");

    include("includes/header.php");
?>

<div class="container p-4">
    <div class="row">

        <form action="check_inventory.php" id="first case" method="POST" class="btn btn btn-lg btn-block">
        
            <div class="input-group mb-3">

                <div class="input-group-prepend">
                    <button name="Checking_inventory" class="btn btn-outline-secondary" type="submit" id="button-addon1">Check BIN</button>
                </div>

                <input id="myInput" name="cable-name" type="text" class="form-control" placeholder="A189" aria-describedby="basic-addon1">
            
            </div>
        
        </form>

        <a href="new_BIN_inventory.php" class="btn btn-danger btn-lg btn-block">That's not my BIN</a>

    </div>
</div>              