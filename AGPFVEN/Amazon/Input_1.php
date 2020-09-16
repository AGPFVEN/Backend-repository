<?php

    //Includes
    include("includes/header.php");

?>

<form action="AGPFVEN-AMAZON.php" method="POST" class="btn btn btn-lg btn-block">

    <div class="input-group mb-3">

        <div class="input-group-prepend">
            <button name="Check_location" class="btn btn-outline-secondary" type="submit" id="button-addon1">Check Location</button>
        </div>

        <input id="myInput" name="Location" type="text" class="form-control" placeholder="Ex: USA, California" aria-describedby="basic-addon1">

    </div>

</form>