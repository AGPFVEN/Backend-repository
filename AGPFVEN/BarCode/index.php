<?php include("db.php") ?>

<?php include("includes/header.php")?>

<div class="container p-4">
    <div class="row">

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
                <form action="save_bar.php" method="POST">

                    <div class="form-group">
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
                            } ?>
                            
                        </select>
                    </div>

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