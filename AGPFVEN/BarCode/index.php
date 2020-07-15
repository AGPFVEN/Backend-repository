<?php include("database/db.php") ?>

<?php include("includes/header.php")?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4">



            <div class="card card-body">

                <form action="save_excel.php" method="POST">
                    <div class="form-group">
                        <input type="file" name="file" class="form-control">
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<?php include("includes/footer.php")?>