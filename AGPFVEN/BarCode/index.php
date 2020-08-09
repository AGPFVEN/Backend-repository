<?php include("database/db.php") ?>

<?php include("includes/header.php")?>

<div class="container p-4">
    <div class="row">

        <form action="Check_routine/check_inventory.php" id="first case" method="POST" class="btn btn btn-lg btn-block">
        
            <div class="input-group mb-3">

                <div class="input-group-prepend">
                    <button name="Checking_inventory" class="btn btn-outline-secondary" type="submit" id="button-addon1">Check BIN</button>
                </div>

                <input id="myInput" name="cable-name" type="text" class="form-control" placeholder="A189" aria-describedby="basic-addon1">
            
            </div>
        
        </form>

    </div>
</div>              