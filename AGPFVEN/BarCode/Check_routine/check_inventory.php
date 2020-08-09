<?php include("../database/db.php") ?>

<?php include("../includes/header.php")?>

<?php if(isset($_POST['Checking_inventory']))
{ 
$Bin = $_POST['cable-name'];
            
?>

    <div class="container p-4">
        <div class="row">

            <!-- Up -->
            <div class="col-lg">

                <table class="table table-bordered">
                    
                    <thead>
                        <tr>

                            <th scope="col"> id </th>
                            <th scope="col"> FSNKU </th>
                            <th scope="col"> ASIN </th>
                            <th scope="col"> BIN </th>
                            <th scope="col"> Description </th>
                            <th scope="col"> Quantity </th>
                            <th scope="col"> Created_at </th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $query = "SELECT * FROM cable WHERE BIN = '$Bin'";                       #Seleccionar todo dentro de la base de datos
                        $result_tasks = mysqli_query($connection, $query);                   #Quary de MySQL (solicitud  a la base de datos)

                        while($row = mysqli_fetch_array($result_tasks))                      #while (Row va a ser un array, contiene todas las columnas y v)
                        { ?>                                                                 <!-- Row va a ser false si se acaban las filas -->

                            <tr>
                                <td> <?php echo $row['id'] ?></td>
                                <td> <?php echo $row['FSNKU'] ?></td>
                                <td> <?php echo $row['ASIN'] ?></td>
                                <td> <?php echo $row['BIN'] ?></td>
                                <td> <?php echo $row['DESCRIPTION'] ?></td>
                                <td> <?php echo $row['quantity'] ?></td>
                                <td> <?php echo $row['created_at'] ?></td>
                                <td> 

                                    <form method="POST" action="save_bar.php">
                                        
                                        <input type="hidden" name="save_bar" value="Save bar" />

                                        <input type="hidden" name="cable-name" value="<?php echo $row['model'] ?>" />

                                        <input type="hidden" name="action" value="Substract" />

                                        <a onclick="this.parentNode.submit();" class = "btn btn-danger">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>

                                    </form>

                                </td>
                            </tr>

                            <?php 
                        } ?>

                    </tbody>
                    
                </table>

            </div>

        </div>

        <?php
        if(isset($_SESSION['FSNKU']))
        {

        }
        else
        { ?>

            <!-- Down -->
            <div class="row">

                <form method="POST" action="Check_routine/operation.php" class="btn btn btn-lg btn-block">

                    <input type="hidden" name="FSNKU" value="<?php echo $row['FSNKU'] ?>" />

                    <button type="submit" class="btn btn-success btn-lg btn-block">That's my BIN</button>

                    <a href="../index.php" type="submit" class="btn btn-danger btn-lg btn-block">That's not my BIN</a>

                </form>

            </div>
         <?php 
        }?>
    </div>
    <?php    
} ?>