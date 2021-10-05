<?php ob_start(); ?>
<?php session_start(); ?>
<?php include("db.php"); ?>

<?php

if(isset($_POST['login']))
{
   $username = mysqli_real_escape_string($connection, trim($_POST['username']));
   $password = mysqli_real_escape_string($connection, trim($_POST['password']));

   $query = "SELECT * FROM users WHERE username = '$username'";
   $result = mysqli_query($connection, $query);

   if(!$result)
   {
        die("Query failed " . mysqli_error($connection));
   }

   while($row = mysqli_fetch_array($result))
   {
      $db_user_id          = $row['user_id'];
      $db_username         = $row['username'];
      $db_password         = $row['password'];
      $db_user_firstname   = $row['user_firstname'];
      $db_user_lastname    = $row['user_lastname'];
      $db_user_role        = $row['user_role'];
   }

   //$password = crypt($password, $db_password);

   if(password_verify($password, $db_password))
   {
        $_SESSION['user_id']         = $db_user_id;
        $_SESSION['username']        = $db_username;
        $_SESSION['password']        = $db_password;
        $_SESSION['user_firstname']  = $db_user_firstname;
        $_SESSION['user_lastname']   = $db_user_lastname;
        $_SESSION['user_role']       = $db_user_role;

        header("Location: ../admin/index.php");
   }
   else
   {
        header("Location: ../index.php");
   }
}

?>