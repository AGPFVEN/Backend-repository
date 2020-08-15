<?php

    include("database/db.php");
    include("includes/header.php");

?>

<form  method="POST" action="Create_routine/Intro_data_into_db.php" class="btn btn btn-lg btn-block">

    
    <!-- Count of FSNKU -->
    <?php

        if(isset($_SESSION['count']))
        {
            if($_SESSION['count'] == 1)
            {
                $_POST["FSNKU"] = $_SESSION["FSNKU"];
            }
            if($_POST["FSNKU"] == $_SESSION["FSNKU"])
            {
                $_SESSION['count']++;
            }

            $asin = $_SESSION['ASIN'];
            $bin = $_SESSION['BIN'];
            $description = $_SESSION['DESCRIPTION'];
        }
        else
        {
            $_SESSION['count'] = 1;
        }

        $count = $_SESSION['count'];

        function exists($does_exists, $replace)
        {
            if(array_key_exists($does_exists ,$_POST))
            {
                echo ($_POST[$does_exists]);
            }
            else
            {
                echo ($replace);
            }
        }

    ?>


    <!-- ASIN Input -->
    <div class="tn btn-secondary btn-lg btn-block input-group mb-3">

        <div class="input-group-prepend input-group-prepend-lg">

            <span class="input-group-text" id="basic-addon1">ASIN</span>

        </div>

        <input type="text"  name="ASIN" class="form-control form-control-lg" placeholder=<?php exists('ASIN', 'B00NFZ86NU') ?> aria-label="Username" aria-describedby="basic-addon1">
    
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

    <input type="hidden" name="count" value="<?php echo $count ?>" />

    <!-- FSNKU Input -->
    <div class="tn btn-secondary btn-lg btn-block input-group mb-3">

        <div class="input-group-prepend input-group-prepend-lg">

            <span class="input-group-text" id="basic-addon1">FSNKU</span>
        
        </div>

        <input type="text"  name="FSNKU" class="form-control form-control-lg" placeholder="X000NHQDRZ" aria-label="Username" aria-describedby="basic-addon1">

        <div class="input-group-append">

            <span class="input-group-text" ><?php echo $count ?></span>

        </div>
    
    </div>

    <button type="submit" name="Insert_into_count"  value="Insert_count" class="btn btn-primary btn-lg btn-block">Add to count</button>

    <button type="submit" name="Insert_into_db"  value="Insert_db" class="btn btn-primary btn-lg btn-block">Create new BIN</button>

</form>