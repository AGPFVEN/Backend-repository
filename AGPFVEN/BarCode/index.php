<?php include("db.php") ?>

<?php include("includes/header.php")?>

<div class="container p-4">
    <div class="row">

        <!-- Left -->
        <div class="col-md-4">

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
                <form id="principa_form" action="save_bar.php" method="POST">

                    <div class="form-group">

                        <!-- Input to select action (substract or add) -->
                        <select class="custom-select" name="action" id="inputGroupSelect01">

                            <?php if(isset($_SESSION['remember_action']))                           ##Check if there was a previous session
                            { ?>                                                                    <!--Fill action-->

                                <option selected> <?php echo $_SESSION['remember_action'] ?> </option>
                                <option> <?php echo $_SESSION['remember_no_action'] ?> </option>

                                <?php

                                session_unset();
                            }
                            else
                            { ?>

                                <option selected>Chose...</option>
                                <option value="Add">Add</option>
                                <option value="Substract">Substract</option>

                                <?php
                            } 
                            
                            session_unset();?>
                            
                        </select>
                    </div>

                    <!-- Input to enter cable name -->
                    <div class="form-group">
                        <Input id="myInput" name="cable-name" rows="2" class="form-control" placeholder="Cable type"></input>
                    </div>

                    <!-- Input quantity -->
                    <div class="form-group">
                        <Input id="myQuantity" name="cable_quantity" rows="2" class="form-control" placeholder="Quantity"></input>
                    </div>

                    <!-- Javascript to trigger at loaded -->
                    <script>
                        var input = document.getElementById('myInput');
                        input.focus();
                        input.select();
                    </script>

                    <!-- Javascript to trigger input with enter -->
                    <script>
                        var input = document.getElementById("myInput");
                        input.addEventListener("keyup", function(event) 
                        {
                            if (event.keyCode === 13)
                            {
                                event.preventDefault();
                                document.getElementById("myBtn").click();
                            }
                        });
                    </script>

                    <!-- Button to go save_bar.php -->
                    <div>
                        <input id="myButton" type="submit" class="btn btn-success btn-block" name="save_bar" value="Save bar">
                    </div>

                </form>

            </div>

        </div>

        <!-- Right -->
        <div class="com-md-8">

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
                    $query = "SELECT * FROM cable";                                       #Seleccionar todo dentro de la base de datos
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