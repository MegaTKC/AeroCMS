<!-- Form for Update Categories -->
<form action="" method="post">
    <div class="form-group">
        <label for="cat_title">Edit Category</label>

        <?php
        // Catching GET request for updating categories
            if (isset($_GET['edit'])) 
            {
                $the_edit_id = mysqli_real_escape_string($connection, trim($_GET['edit']));

                $query = "SELECT * FROM categories WHERE cat_id = {$the_edit_id}";
                $result = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_array($result)) 
                {
                    $cat_id = $row['cat_id'];
                    $cat_title = $row['cat_title'];
        ?>

        <input type="text" name="cat_title" value="<?php  if(isset($cat_title)) {echo $cat_title;}?>" class="form-control" placeholder="Category">

        <?php                                   
                }
            }
        ?>

        <?php
        // Code for Updating Categories
            if(isset($_POST['update']))
            {
                if(isset($_SESSION['user_role']))
                {
                    if($_SESSION['user_role'] == 'Admin')
                    {
                        $cat_title = mysqli_real_escape_string($connection, trim($_POST['cat_title']));

                        $query = "UPDATE categories SET cat_title = '{$cat_title}' WHERE cat_id = $cat_id";
                        $result = mysqli_query($connection, $query);

                        if(!$result)
                        {
                            die("Query failed " . mysqli_error($connection));
                        }
                    }
                }
                
            }
                                    
        ?>                                
    </div>
    <div class="form-group">
        <input type="submit" name="update" class="btn btn-warning" value="Update Category">
    </div>
</form>