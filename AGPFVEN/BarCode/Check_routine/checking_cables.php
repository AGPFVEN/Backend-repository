<?php include("database/db.php");

//Check if there is a POST
if(isset($_POST['Checking_cables']) AND $_POST['cable-name'] != NULL)
{
    //Check if you know the cable name
    if(isset($_SESSION['n_cables']) == TRUE  AND $_SESSION['n_cables'] == $_POST['cable-name'])
    {
        $_SESSION['t_cables'] += 1;

        $_SESSION['message'] = 'Your current order has been recalculated';
        $_SESSION['message_type'] = 'success';
    
        header("Location: index.php");
    }
    else
    { ?>
        <script>
            if (confirm('Are you sure you want to erase your current order and start a new one with <?php echo $_POST['cable-name'] ?> ?')) {
                // Save it!
                <?php

                    $_SESSION['n_cables'] = $_POST['cable-name'];
                    $_SESSION['t_cables'] = 1;
                
                ?>
            } else {
                // Do nothing!
                <?php

                    $_SESSION['message'] = 'Your order has been safeguarded';
                    $_SESSION['message_type'] = 'success';
                
                ?>
            }
        </script>

        <?php
    }
}
else
{
    $_SESSION['message'] = "The input is empty";
    $_SESSION['message_type'] = 'danger';

    header("Location: index.php");
}

?>