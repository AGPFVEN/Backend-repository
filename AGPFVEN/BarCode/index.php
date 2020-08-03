<?php include("db.php") ?>

<?php include("includes/header.php")?>

<div class="container p-4">
    <div class="row">

        <!-- Left -->
        <div class="col-md-4.5">

            <!--Notification-->
            <?php if(isset($_SESSION['message'])) 
            { ?>

                <div class="alert alert-<?=$_SESSION['message_type'];?> alert-dismissible fade show" role="alert">

                    <?= $_SESSION['message'] ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>
                
                <?php
            }?>

            <!-- Input TODO: ERASE BUTTON -->
            <div class="card card-body">
                <form id="secondary_form" action="checking_cables.php" method="POST">

                    <!-- Quantity -->
                    <div class="form-group">
                        <?php if(isset($_SESSION['n_cables']))
                        { ?>
                            <div class="alert alert-primary">
                                Your current order has <?php $_SESSION['n_cables']?> of <?php $_SESSION['t_cables']?> !
                            </div>

                            <?php
                        }
                        else
                        { ?>
                            <div class="alert alert-primary">
                                Start your new order scaning a barcode!
                            </div>

                            <?php
                                session_unset();
                        }   ?>
                    </div>

                    <!-- Input to enter cable name -->
                    <div class="form-group">
                        <Input id="myInput" name="cable-name" rows="2" class="form-control" placeholder="Cable type"></input>
                    </div>

                    <!-- Javascript to trigger at loaded -->
                    <script>
                        var input = document.getElementById('myQuantity');
                        input.focus();
                        input.select();
                    </script>

                    <!-- Add barcode -->
                    <div class="form-group">
                        <div>
                            <input id="myQuantity" type="submit" class="btn btn-primary btn-block" name="Checking_cables" value="Add Barcode to new order">
                        </div>
                    </div>

                </form>

                <form id="principal_form" action="save_bar.php" method="POST">
                    <!-- Button to go save_bar.php -->
                    <div>
                        <input id="myButton" type="submit" class="btn btn-success btn-block" name="save_bar" value="Save bar">
                    </div>
                </form>

            </div>

        </div>

        <!-- Right -->
        <div class="col-md-8">

            <table class="table table-bordered">
            
                <thead>
                    <tr>

                        <th scope="col"> id </th>
                        <th scope="col"> Cable Type </th>
                        <th scope="col"> Quantity </th>
                        <th scope="col"> Created_at </th>
                        <th scope="col"> Delete </th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $query = "SELECT * FROM cable";                                      #Seleccionar todo dentro de la base de datos
                    $result_tasks = mysqli_query($connection, $query);                   #Quary de MySQL (solicitud  a la base de datos)

                    while($row = mysqli_fetch_array($result_tasks))                      #while (Row va a ser un array, contiene todas las columnas y v)
                    { ?>                                                                 <!-- Row va a ser false si se acaban las filas -->

                        <tr>
                            <td> <?php echo $row['id'] ?></td>
                            <td> <?php echo $row['model'] ?></td>
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
</div>

<?php include("includes/footer.php")?>