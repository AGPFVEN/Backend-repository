<?php include("db.php") ?>

<?php include("includes/header.php")?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4">
            <!--Comprobar si el mensaje exiate con php, el mensaje va a existir si hemos hecho un quary antes-->
            <?php if(isset($_SESSION['message'])) { ?>
            <!--Así puedes meter código html entre php-->
            <div class="alert alert-<?=$_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['message'] ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php session_unset(); } ?>
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
        </table>
        </div>
    </div>
</div>

<?php include("includes/footer.php")?>