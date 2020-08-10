<?php
    
    include("database/db.php");

    include("includes/header.php");

    if(isset($_POST['cable-name']))
    {
        $Bin = $_POST['cable-name'];

        echo("funooiubjkbkj");
    }
    else
    {
        $Bin = $_SESSION['BIN'];

        echo("noooo funooiubjkbkj");

    } ?>

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
                                <td> <?php echo $row['FSNKU']; $FSNKU = $row['FSNKU'] ?></td>
                                <td> <?php echo $row['ASIN'] ?></td>
                                <td> <?php echo $row['BIN']; $BIN = $row['BIN'] ?></td>
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
        if(isset($_SESSION['BIN']))
        { ?>
            <form method="POST" action="Check_routine/operation.php" class="btn btn btn-lg btn-block">

                <input type="hidden" name="BIN" value="<?php echo $BIN ?>" />

                <input type="hidden" name="FSNKU" value="<?php echo $FSNKU ?>" />
            
                <div class="input-group btn-block">
                
                    <input type="text" name="Check_operation_input" class="form-control" placeholder="<?php echo $_SESSION["FSNKU"] ?>" ></input>
                    
                    <div class="input-group-prepend">
                        <span class="input-group-text"> x<?php echo $_SESSION['count'] ?> </span>
                    </div>

                    <button class="btn btn-dark" name="Check_operations_2" type="submit">Add</button>
                
                </div>
            </form>
                
            <button type="submit" name="Modify" class="btn btn-success btn-lg btn-block">That's my BIN</button>

            <button type="submit" class="btn btn-danger btn-lg btn-block">ERROR</button>

            <?php
        }
        else
        { ?>

            <!-- Down -->
            <div class="row">

                <form method="POST" action="Check_routine/operation.php" class="btn btn btn-lg btn-block">

                    <input type="hidden" name="BIN" value="<?php echo $BIN ?>" />

                    <input type="hidden" name="FSNKU" value="<?php echo $FSNKU ?>" />

                    <button type="submit" name="Check_operations" class="btn btn-success btn-lg btn-block">That's my BIN</button>

                    <button type="submit" class="btn btn-danger btn-lg btn-block">That's not my BIN</button>

                </form> 
            </div>
        <?php 
        }?>
    </div>
    <?php    //} 
?>