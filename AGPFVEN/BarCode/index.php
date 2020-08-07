<?php include("db.php") ?>

<?php include("includes/header.php")?>

<div class="container p-4">
    <div class="row">

        <form action="Check_inventory" id="first case" method="POST">
        
            <div class="input-group mb-3">

                <div class="input-group-prepend">
                    <a href="check_inventory.php" class="btn btn-outline-secondary" type="button" id="button-addon1">Check BIN</a>
                </div>

                <input id="myInput" name="cable-name" type="text" class="form-control" placeholder="A189" aria-describedby="basic-addon1">
            
            </div>
        
        </form>

    </div>
</div>              