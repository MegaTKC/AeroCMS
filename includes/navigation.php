<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">My Blog</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">

                <?php

                    $query = "SELECT * FROM categories LIMIT 5";
                    $result = mysqli_query($connection, $query);

                    while($row = mysqli_fetch_array($result))
                    {
                        $cat_id = $row['cat_id'];
                        $cat_title = $row['cat_title'];

                        $category_class = '';

                        $registration_class = '';

                        $contact_class = '';

                        $pageName = basename($_SERVER['PHP_SELF']);

                        $registration = 'registration.php';

                        $contact = 'contact.php';

                        if(isset($_GET['category']) && $_GET['category'] == $cat_id)
                        {
                            $category_class = 'active';
                        }
                        elseif ($pageName == $registration) 
                        {
                            $registration_class = 'active';
                        }

                        elseif ($pageName == $contact) 
                        {
                            $contact_class = 'active';
                        }
                ?>
                    <li class='<?php echo $category_class; ?>'>
                        <a href="category.php?category=<?php echo $cat_id; ?>"><?php echo $cat_title; ?></a>
                    </li>
            <?php   }

            ?>

                    
                    
                    <li>
                        <a href="admin">Administration Panel</a>
                    </li> 

                    <?php

                        if(isset($_SESSION['user_role']))
                        {
                            if(isset($_GET['p_id']))
                            {
                                $the_post_id = $_GET['p_id'];
                                echo "<li>
                                        <a href='admin/posts.php?source=edit_post&p_id=$the_post_id'>Edit Post</a>
                                     </li>";
                            }
                        }

                    ?>

                    <li class='<?php echo $registration_class; ?>'>
                        <a href="registration.php">Registration</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
