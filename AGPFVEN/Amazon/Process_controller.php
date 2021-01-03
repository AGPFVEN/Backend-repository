<?php

    //Includes
    include("includes/header.php");
    include("includes/db.php");
  
    $query = "SELECT is_cero FROM `die_process` WHERE id = 1";
    $test_var = mysqli_fetch_array(mysqli_query($connection, $query));

?>

<div class="container p-4">
    <div class="row">

        <form action="kill_process.php" id="first case" method="POST" class="btn btn btn-lg btn-block">

            <div class="input-group-prepend">
                <button name="Checking_inventory" class="btn btn-primary btn-lg btn-block" type="submit" id="button-addon1">
                
                    <?php
                    
                        if(intval($test_var[0]) === 0)
                        {
                            print("Kill process");
                        }
                        else
                        {
                            print("Resume process");
                        }
                    
                    ?>
                
                </button>
            </div>
        
        </form>

    </div>
</div>