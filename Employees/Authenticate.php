<?php
  include_once($_SERVER['DOCUMENT_ROOT'] . "/Core/Database/Connection.php");
  $dbConnection = new DatabaseConnection("localhost", "root", "", "WebSecurity");

  if(isset($_POST['email']) && isset($_POST['password']))
  {
    $emailQuery = "SELECT * FROM Employees WHERE email='" . $_POST['email'] . "'";

    $emailResults = $dbConnection->executeQuery($emailQuery);

    if($emailResults->num_rows == 1)
    {
      $row = $emailResults->fetch_assoc();
      //check password
      if($row['Password'] == $_POST['password'])
      {
        if (session_status() == PHP_SESSION_ACTIVE)
        {
          session_destroy();
        }
        session_start();

        $_SESSION["ID"] = $row['ID'];

        header("location: /");
      }
      else
      {
          echo "Invalid Password.";
      }
    }
    else
    {
      echo "Invalid Email address.";
    }

  }
  else
  {
    echo "You seem to be missing some informaiont. :/";
  }
?>
