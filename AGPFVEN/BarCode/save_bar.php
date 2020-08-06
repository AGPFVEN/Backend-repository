<?php

include("db.php");

if(isset($_POST['save_bar']))
{
    
    $barcode = $_SESSION['n_cables'];
    $quantity =  $_SESSION['t_cables'];

    if(empty($_SESSION['n_cables']))
    {
        header("Location: index.php");
        $_SESSION['message'] = 'Enter a cable code';
        $_SESSION['message_type'] = 'warning';
        die("Query Failed");
    }
    if(empty($_SESSION['t_cables']))
    {
        header("Location: index.php");
        $_SESSION['message'] = 'Enter a cable quantity';
        $_SESSION['message_type'] = 'warning';
        die("Query Failed");
    }

    $query = "SELECT quantity FROM `cable` WHERE model = '$barcode'";

    //Accsess to quantity of barcode
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($result);

    if($row['quantity'] == NULL)
    { ?>
        <script>
            if (confirm('Are you sure you want to save <?php echo $barcode ?> into the database?')) {
                // Save it!
                console.log('Thing was saved to the database.');
            } else {
                // Do nothing!
                console.log('Thing was not saved to the database.');
            }
        </script>
        <?php
    }

    //Calculate new quantity
    $query_result = $row['quantity'] + $quantity;

    //Submiting new quantity
    $query = "UPDATE cable SET quantity = '$query_result' WHERE model = '$barcode'";
    $result = mysqli_query($connection, $query);
    
    //All is fine
    $color = "success";

    if(!$result)
    {
        $_SESSION['message'] = 'Query is not working';
        $color = 'alert';
        die("result didn't function");
    }

    session_unset();

    $_SESSION['message'] = 'Database Updated';
    $_SESSION['message_type'] = $color;

    header("Location: index.php");
}
else
{
    $_SESSION['message'] = 'There is not a post';
    $_SESSION['message_type'] = 'danger';

    header("Location: index.php");
}

?>