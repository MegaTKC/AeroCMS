<table class="table table-responsive table-hover table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
            <th>Role</th>
            <th>User Image</th>
            <th>Give user Admin Perms</th>
            <th>Give user Subscriber Perms</th>
            <th>Edit User</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>

    <?php //Showing all posts

        $query = "SELECT * FROM users";
        $result = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_array($result)) 
        {
            $user_id            = $row['user_id'];
            $username           = $row['username'];
            $password           = $row['password'];
            $user_firstname     = $row['user_firstname'];
            $user_lastname      = $row['user_lastname'];
            $user_email         = $row['user_email'];
            $user_image         = $row['user_image'];
            $user_role          = $row['user_role'];
            
            

            echo "<tr>";
            echo "<td>$user_id</td>";
            echo "<td>$username</td>";
            echo "<td>$user_firstname</td>";
            echo "<td>$user_lastname</td>";
            echo "<td>$user_email</td>";

            // $query = "SELECT * FROM posts WHERE post_id = $comment_post_id";
            // $result_show = mysqli_query($connection, $query);

            // while($row = mysqli_fetch_array($result_show))
            // {
            //     $post_id = $row['post_id'];
            //     $post_title = $row['post_title'];

            //     echo "<td><a class='btn btn-primary' href='../post.php?p_id=$post_id'>$post_title</a></td>";
            // }

            


            echo "<td>$user_role</td>";
            echo "<td><img class='img-responsive' width='200' src='../images/$user_image'></td>";
            echo "<td><a class='btn btn-success' href='users.php?change_to_admin=$user_id'>Change To Admin</a></td>";
            echo "<td><a class='btn btn-warning' href='users.php?change_to_subscriber=$user_id'>Change To Subscriber</a></td>";
            echo "<td><a class='btn btn-primary' href='users.php?source=edit_user&edit_user=$user_id'>Edit</a></td>";
            echo "<td><a class='btn btn-danger' href='users.php?delete=$user_id'>Delete</a></td>";
            echo "</tr>";
        }
    ?>
    

        
    

        
    </tbody>
</table>

<?php

if (isset($_GET['delete'])) 
{
    
    if(isset($_SESSION['user_role']))
    {
        if($_SESSION['user_role'] == 'Admin')
        {
            $delete_user_id = mysqli_real_escape_string($connection, trim($_GET['delete']));

            $query = "DELETE FROM users WHERE user_id = $delete_user_id LIMIT 1";
            $delete_result = mysqli_query($connection, $query);

            confirmQuery($delete_result);

            header("Location: users.php");
        }
    }
        
        
            
        

        

    

}

if (isset($_GET['change_to_admin'])) 
{
    if(isset($_SESSION['user_role']))
    {
        if($_SESSION['user_role'] == 'Admin')
        {
            $change_to_admin = mysqli_real_escape_string($connection, trim($_GET['change_to_admin']));

            $query = "UPDATE users SET user_role = 'Admin' WHERE user_id = $change_to_admin LIMIT 1";
            $change_to_admin_query = mysqli_query($connection, $query);

            confirmQuery($change_to_admin_query);

            header("Location: users.php");
        }
    }

    
}

if(isset($_GET['change_to_subscriber']))
{
    if(isset($_SESSION['user_role']))
    {
        if($_SESSION['user_role'] == 'Admin')
        {
            $change_to_subscriber = mysqli_real_escape_string($connection, trim($_GET['change_to_subscriber']));

            $query = "UPDATE users SET user_role = 'Subscriber' WHERE user_id = $change_to_subscriber LIMIT 1";
            $change_to_subscriber_query = mysqli_query($connection, $query);

            confirmQuery($change_to_subscriber_query);

            header("Location: users.php");
        }
    }
    
}

?>
