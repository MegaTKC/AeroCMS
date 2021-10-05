<table class="table table-responsive table-hover table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Author</th>
            <th>Comment</th>
            <th>Email</th>
            <th>Status</th>
            <th>In Response To</th>
            <th>Date</th>
            <th>Approve</th>
            <th>Unapprove</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>

    <?php //Showing all posts

        $query = "SELECT * FROM comments";
        $result = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_array($result)) 
        {
            $comment_id         = $row['comment_id'];
            $comment_post_id    = $row['comment_post_id'];
            $comment_author     = $row['comment_author'];
            $comment_email      = $row['comment_email'];
            $comment_content    = $row['comment_content'];
            $comment_status     = $row['comment_status'];
            $comment_date       = $row['comment_date'];
            

            echo "<tr>";
            echo "<td>$comment_id</td>";
            echo "<td>$comment_author</td>";
            echo "<td>$comment_content</td>";

            // $query = "SELECT * FROM categories WHERE cat_id = $post_category_id";
            // $select_categories = mysqli_query($connection, $query);
            // while($row = mysqli_fetch_array($select_categories))
            // {
            //     $cat_id = $row['cat_id'];
            //     $cat_title = $row['cat_title'];

            //     echo "<td>$cat_title</td>";
            // }
            

            



            echo "<td>$comment_email";
            echo "<td>$comment_status</td>";

            $query = "SELECT * FROM posts WHERE post_id = $comment_post_id";
            $result_show = mysqli_query($connection, $query);

            while($row = mysqli_fetch_array($result_show))
            {
                $post_id = $row['post_id'];
                $post_title = $row['post_title'];

                echo "<td><a class='btn btn-primary' href='../post.php?p_id=$post_id'>$post_title</a></td>";
            }

            


            echo "<td>$comment_date</td>";
            echo "<td><a class='btn btn-success' href='comments.php?approve=$comment_id'>Approve</a></td>";
            echo "<td><a class='btn btn-warning' href='comments.php?unapprove=$comment_id'>Unapprove</a></td>";
            echo "<td><a class='btn btn-danger' href='comments.php?delete=$comment_id'>Delete</a></td>";
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
            $delete_comment_id = mysqli_real_escape_string($connection, trim($_GET['delete']));

            $query = "DELETE FROM comments WHERE comment_id = $delete_comment_id LIMIT 1";
            $result = mysqli_query($connection, $query);

            confirmQuery($result);

            header("Location: comments.php");
        }
    }
   


}

if (isset($_GET['approve'])) 
{
    if(isset($_SESSION['user_role']))
    {
        if($_SESSION['user_role'] == 'Admin')
        {
            $the_approve_id = mysqli_real_escape_string($connection, trim($_GET['approve']));

            $query = "UPDATE comments SET comment_status = 'approved' WHERE comment_id = $the_approve_id LIMIT 1";
            $approve_comment_query = mysqli_query($connection, $query);

            confirmQuery($approve_comment_query);

            header("Location: comments.php");
        }
    }
    
}

if(isset($_GET['unapprove']))
{
    if(isset($_SESSION['user_role']))
    {
        if($_SESSION['user_role'] == 'Admin')
        {
            $the_unapprove_id = mysqli_real_escape_string($connection, trim($_GET['unapprove']));

            $query = "UPDATE comments SET comment_status = 'unaproved' WHERE comment_id = $the_unapprove_id LIMIT 1";
            $unapprove_comment_query = mysqli_query($connection, $query);

            confirmQuery($unapprove_comment_query);

            header("Location: comments.php");
        }
    }
    
}

?>