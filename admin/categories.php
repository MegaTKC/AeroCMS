<?php include("includes/header.php"); ?>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include("includes/navigation.php"); ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to the Admin Panel,
                            <small><?php echo $_SESSION['username']; ?>!</small>
                        </h1>
                        <div class="col-xs-6">
                        
                        <?php
                            // Code to add categories
                            insertCategories()
                        ?>
                            <!-- Form for Add Categories -->
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="cat_title">Add Category</label>
                                    <input type="text" name="cat_title" class="form-control" placeholder="Category">
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="submit" class="btn btn-primary" value="Add Category">
                                </div>
                            </form>

                            <?php
                                // Including update_categories.php file here
                                if(isset($_GET['edit']))
                                {
                                    $cat_id = $_GET['edit'];

                                    include("includes/update_categories.php");
                                }

                            ?>

                        </div>

                        <div class="col-xs-6">
                            <table class="table table-responsive table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Category Title</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                <?php
                                    // Code to display categories
                                    showAllCategories();
                                ?>

                                <?php
                                // Code to delete categories
                                deleteCategories();
                                
                                ?>

                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php include("includes/footer.php"); ?>
