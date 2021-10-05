<?php

    function insertCategories() // insert categories
    {
        global $connection;

        if(isset($_POST['submit']))
        {
            $cat_title = mysqli_real_escape_string($connection, trim($_POST['cat_title']));
    
            if($cat_title == "" || empty($cat_title))
            {
                echo "<p class='text-danger'>Please enter category!</p>";
            }
            else
            {
                $query = "INSERT INTO categories(cat_title) VALUES('$cat_title')";
                $result = mysqli_query($connection, $query);

                echo "<p class='text-success'>Recored added succeessfuly.</p>";

                if(!$result)
                {
                    die("Query failed! " . mysqli_error($connection));
                }
            }
        }
    }

    function showAllCategories() // Show all categories
    {
        global $connection;

        $query = "SELECT * FROM categories";
        $result = mysqli_query($connection, $query);

        while($row = mysqli_fetch_array($result))
        {
            $cat_id      = $row['cat_id'];
            $cat_title   = $row['cat_title'];

            echo "<tr>";
            echo "<td>$cat_id</td>";
            echo "<td>$cat_title</td>";
            echo "<td><a class='btn btn-danger' href='categories.php?delete=$cat_id '>Delete</a></td>";
            echo "<td><a class='btn btn-warning' href='categories.php?edit=$cat_id '>Edit</a></td>";
            echo "</tr>";
        }
    }

    function deleteCategories() // Delete categories functions
    {
        global $connection;

        if(isset($_GET['delete']))
        {
            if(isset($_SESSION['user_role']))
            {
                if($_SESSION['user_role'] == 'Admin')
                {
                    $the_delete_cat_id = mysqli_real_escape_string($connection, trim($_GET['delete']));

                    $query = "DELETE FROM categories WHERE cat_id = {$the_delete_cat_id} LIMIT 1";
                    $result = mysqli_query($connection, $query);

                    header("Location: categories.php");
                }
            }
            
        }
    }

    function confirmQuery($result) // Confirm query
    {
        global $connection;
        if (!$result) 
        {
            die("Query failed! " . mysqli_error($connection));
        }
    }

    function user_online()
    {
        if(isset($_GET['onlineusers']))
        {
            global $connection;

            if(!$connection)
            {
                session_start();
                include("../includes/db.php");

                $session = session_id();
                $time = time();
                $time_out_in_seconds = 05;
                $time_out = $time - $time_out_in_seconds;
    
                $query = "SELECT * FROM users_online WHERE session = '$session'";
                $send_query = mysqli_query($connection, $query);
    
                $count = mysqli_num_rows($send_query);
    
                if($count == NULL)
                {
                    mysqli_query($connection, "INSERT INTO users_online(session, time) VALUES('$session', '$time')");
                }
                else
                {
                    mysqli_query($connection, "UPDATE users_online SET time = '$time' WHERE session = '$session'");
                }
    
                $users_online_query = mysqli_query($connection, "SELECT * FROM users_online WHERE time > '$time_out'");
                echo $count_user = mysqli_num_rows($users_online_query);
            }
        }
    }

    user_online();

    function escape($string)
    {
        global $connection;
        return mysqli_real_escape_string($connection, trim($string));
    }

    // Created function for display chart data
    function recordCount($table)
    {
        global $connection;
        $query = "SELECT * FROM " . $table;
        $select_all_posts = mysqli_query($connection, $query);

        $result = mysqli_num_rows($select_all_posts);

        confirmQuery($result);

        return $result;
    }

    // Created function for display various statuss and user_role
    function checkStatus($table_name, $column_name, $status)
    {
        global $connection;

        $query = "SELECT * FROM $table_name WHERE $column_name = '$status'";
        $select_all__published_posts = mysqli_query($connection, $query);
        return mysqli_num_rows($select_all__published_posts);

    }

    function is_admin($username = "")
    {
        global $connection;

        $query = "SELECT user_role FROM users WHERE username = '$username'";

        $result = mysqli_query($connection, $query);

        confirmQuery($result);

        $row = mysqli_fetch_array($result);

        if($row['user_role'] == 'Admin')
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    //Duplicate Username function
    function username_exists($username)
    {
        global $connection;

        $query = "SELECT username FROM users WHERE username = '$username'";
        $result = mysqli_query($connection, $query);

        confirmQuery($result);

        if(mysqli_num_rows($result) > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

?>
