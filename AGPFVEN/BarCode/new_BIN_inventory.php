<?php

    include("database/db.php");
    include("includes/header.php");

    function exists($does_exists)
    {
        if(isset($_SESSION[$does_exists]))
        {
            ?> value= <?php echo ($_SESSION[$does_exists]);
        }
    }
?>

<form  method="POST" action="Create_routine/Intro_data_into_db.php" class="btn btn btn-lg btn-block">

    
    <!-- Count of FSNKU -->
    <?php

        if(!isset($_SESSION['count']))
        {
            $_SESSION['count'] = 1;
        }

        $count = $_SESSION['count'];
    ?>

    <!-- ASIN Input -->
    <div class="tn btn-secondary btn-lg btn-block input-group mb-3">

        <div class="input-group-prepend input-group-prepend-lg">

            <span class="input-group-text" id="basic-addon1">ASIN</span>

        </div>

        <!-- Make changes, on everything -->
        <input type="text"  name="ASIN" class="form-control form-control-lg" placeholder="B00NFZ86NU" <?php exists('ASIN') ?> aria-label="Username" aria-describedby="basic-addon1">
    
    </div>

    <!-- BIN Input -->
    <div class="tn btn-secondary btn-lg btn-block input-group mb-3">

        <div class="input-group-prepend input-group-prepend-lg">

            <span class="input-group-text" id="basic-addon1">BIN</span>
        
        </div>

        <input type="text"  name="BIN" class="form-control form-control-lg" placeholder="A002" <?php exists('BIN') ?> aria-label="Username" aria-describedby="basic-addon1">
    
    </div>

    <!-- DESCRIPTION Input -->
    <div class="tn btn-secondary btn-lg btn-block input-group mb-3">

        <div class="input-group-prepend input-group-prepend-lg">

            <span class="input-group-text" id="basic-addon1">DESCRIPTION</span>
        
        </div>

        <textarea  name="DESCRIPTION" class="form-control form-control-lg" 
            placeholder="LC to SC Fiber Patch Cable Single Mode Duplex - 1m (3.28ft) - 9/125um OS1 / - Beyondtech PureOptics Cable Series" 
            aria-label="Username" aria-describedby="basic-addon1"><?php 
            if(isset($_SESSION['DESCRIPTION']))
            {
                echo ($_SESSION['DESCRIPTION']);
            } 
        ?></textarea>
        
    </div>

    <!--Notification-->
    <?php if(isset($_SESSION['message'])) 
    { ?>
        <div class="row">
        
            <div class="btn btn btn-lg btn-block alert alert-<?=$_SESSION['message_type'];?> alert-dismissible fade show" role="alert">

                <?= $_SESSION['message'] ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
        
        </div>
        <?php
    }?>

    <input type="hidden" name="count" value="<?php echo $count ?>" />

    <?php 
        if(isset($_SESSION['FSNKU']))
        { 

            $FSNKU_THIS = $_SESSION['FSNKU']; ?>
            <input type="hidden" name='saved_FSNKU' value="<?php echo $FSNKU_THIS ?>" />
        
        <?php }
    ?>

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