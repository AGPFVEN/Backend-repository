<?php

    include("database/db.php");
    include("includes/header.php");

?>

<form  method="POST" action="Create_routine/Intro_data_into_db.php" class="btn btn btn-lg btn-block">

    <!-- FSNKU Input -->
    <div class="tn btn-secondary btn-lg btn-block input-group mb-3">

        <div class="input-group-prepend input-group-prepend-lg">

            <span class="input-group-text" id="basic-addon1">FSNKU</span>
        
        </div>

        <input type="text"  name="FSNKU" class="form-control form-control-lg" placeholder="X000NHQDRZ" aria-label="Username" aria-describedby="basic-addon1">
    
    </div>

    <!-- ASIN Input -->
    <div class="tn btn-secondary btn-lg btn-block input-group mb-3">

        <div class="input-group-prepend input-group-prepend-lg">

            <span class="input-group-text" id="basic-addon1">ASIN</span>
        
        </div>

        <input type="text"  name="ASIN" class="form-control form-control-lg" placeholder="B00NFZ9SHS" aria-label="Username" aria-describedby="basic-addon1">
    
    </div>

    <!-- BIN Input -->
    <div class="tn btn-secondary btn-lg btn-block input-group mb-3">

        <div class="input-group-prepend input-group-prepend-lg">

            <span class="input-group-text" id="basic-addon1">BIN</span>
        
        </div>

        <input type="text"  name="BIN" class="form-control form-control-lg" placeholder="A002" aria-label="Username" aria-describedby="basic-addon1">
    
    </div>

    <!-- DESCRIPTION Input -->
    <div class="tn btn-secondary btn-lg btn-block input-group mb-3">

        <div class="input-group-prepend input-group-prepend-lg">

            <span class="input-group-text" id="basic-addon1">DESCRIPTION</span>
        
        </div>

        <textarea  name="DESCRIPTION" class="form-control form-control-lg" 
            placeholder="LC to SC Fiber Patch Cable Single Mode Duplex - 1m (3.28ft) - 9/125um OS1 / - Beyondtech PureOptics Cable Series" 
        aria-label="Username" aria-describedby="basic-addon1"></textarea>
        
    </div>

    <button type="submit" name="Modify" class="btn btn-primary btn-lg btn-block">Create new BIN</button>

</form>