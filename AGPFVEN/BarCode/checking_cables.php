<?php include("db.php");

if(isset($_POST['Checking_cables']))
{
    if($_SESSION['n_cables'] == NULL)
    {
        $_SESSION['n_cables'] = $_POST['cable-name'];
        $_SESSION['t_cables'] = 1;
    }

    echo $_SESSION['n_cables'];
    echo '                   ';
    echo $_SESSION['t_cables'];






    $_SESSION['message'] = 'Your current order has been recalculated';
    $_SESSION['message_type'] = 'success';

    header("Location: index.php");
}
else
{
    $_SESSION['message'] = 'There is not a post';
    $_SESSION['message_type'] = 'danger';

    header("Location: index.php");
}

?>