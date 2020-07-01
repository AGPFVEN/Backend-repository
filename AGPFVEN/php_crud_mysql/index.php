<?php include("db.php") ?>

<?php include("includes/header.php")?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4">

            <!--Comprobar si el mensaje exiate con php, el mensaje va a existir si hemos hecho un quary antes-->
            <?php if(isset($_SESSION['message'])) 
            { ?>

                <!--Así puedes meter código html entre php-->
                <div class="alert alert-<?=$_SESSION['message_type'];?> alert-dismissible fade show" role="alert">

                    <?= $_SESSION['message'] ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>

                <!-- Borra los datos que hay dentro de session -->
                <?php session_unset(); 
            } ?>

            <div class="card card-body">

                <form action="save_task.php" method="POST">

                    <div class="form-group">
                        <input type="text" name="title" class="form-control" placeholder="Task title" autofocus>
                    </div>

                    <div class="form-group">
                        <textarea name="description" rows="2" class="form-control"
                            placeholder="Task Description"></textarea>
                    </div>

                    <input type="submit" class="btn btn-success btn-block" name="save_task" value="Save Task">
                </form>

            </div>
        </div>

        <div class="com-md-8">

            <table class="table table-bordered">

                <thead>
                    <tr>
                        <th> Title </th>
                        <th> Description </th>
                        <th> Created At</th>
                        <th> Actions</th>
                    </tr>
                </thead>
                
                <tbody>
                    <?php
                    $query = "SELECT * FROM task";                                       #Seleccionar todo dentro de la base de datos
                    $result_tasks = mysqli_query($connection, $query);                   #Quary de MySQL (solicitud  a la base de datos)

                    while($row = mysqli_fetch_array($result_tasks))                      #while (Row va a ser un array, contiene todas las columnas y v)
                    { ?>                                                                 <!-- Row va a ser false si se acaban las filas -->

                        <tr>
                            <td> <?php echo $row['title'] ?></td>
                            <td> <?php echo $row['description'] ?></td>
                            <td> <?php echo $row['created_at'] ?></td>
                            <td> </td>
                        </tr>

                    <?php } ?>

                </tbody>

            </table>

        </div>
    </div>
</div>

<?php include("includes/footer.php")?>