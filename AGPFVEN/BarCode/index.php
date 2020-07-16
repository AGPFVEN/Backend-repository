<?php include("db.php") ?>

<?php include("includes/header.php")?>

<div class="container p-4">
    <div class="row">

        <div class="col-md-4">

            <div class="card card-body">

                <form action="save_bar.php" method="POST">

                    <div class="form-group">
                        <textarea name="cable-name" rows="2" class="form-control" placeholder="Task Description"></textarea>
                    </div>

                    <input type="submit" class="btn btn-success btn-block" name="save_bar" value="Save bar">

                </form>

            </div>

        </div>

        <!-- <div class="com-md-8">

            <table class="table-dark">
            
                <thead>

                    <th> Cable Type </th>
                    <th> Description </th>

                </thead>

                <tbody>

                    

                </tbody>
            
            </table>

        </div> -->

    </div>
</div>

<?php include("includes/footer.php")?>