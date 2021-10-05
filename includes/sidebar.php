<div class="col-md-4">

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <form action="search.php" method="post">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control">
                                <span class="input-group-btn">
                                    <button name="submit" class="btn btn-default" type="submit">
                                        <span class="glyphicon glyphicon-search"></span>
                                    </button>
                                </span>
                        </div>
                        <!-- /.input-group -->
                    </form>
                </div>

                <!-- Login Form -->
                <div class="well">
                    
                    <?php if(isset($_SESSION['user_role'])): ?>

                        <h4>Logged in as <?php echo $_SESSION['username']; ?></h4>
                        <a href="includes/logout.php" class='btn btn-warning'>Logout</a>

                    <?php else: ?>

                        <h4>Login</h4>
                        <form action="includes/login.php" method="post">
                            <div class="form-group">
                                <input type="text" name="username" class="form-control" placeholder="Username">
                            </div>
                            <div class="input-group">
                                <input type="password" name="password" class="form-control" placeholder="Password">
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" type="submit" name="login">Login</button>
                                </span>
                            </div>
                            <!-- /.input-group -->
                        </form>

                    <?php endif; ?>

                    
                </div>

                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="list-unstyled">
                            <?php
                            
                                $query = "SELECT * FROM categories";
                                $result = mysqli_query($connection, $query);
                                while($row = mysqli_fetch_array($result))
                                {
                                   $cat_id = $row['cat_id'];
                                   $cat_title = $row['cat_title'];

                                   echo "<li><a href='category.php?category=$cat_id'>$cat_title</a>
                                   </li>";
                                }
                            
                            ?>
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <?php include("widget.php"); ?>

            </div>