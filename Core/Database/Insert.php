<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>World Employment Inc.</title>
  </head>
  <body>
    <?php
      include_once($_SERVER['DOCUMENT_ROOT'] . "/Core/Database/Connection.php");
      $dbConnection = new DatabaseConnection("localhost", "root", "", "WebSecurity");

      if(isset($_POST['email']) && isset($_POST['password']) && isset($_POST['firstname']) &&
       isset($_POST['lastname']) && isset($_POST['ssn']) && isset($_POST['salary']))
      {
        $emailQuery = "SELECT * from Employees where email='" . $_POST['email'] . "'";
        $emailResults = $dbConnection->executeQuery($emailQuery);
        if($emailResults->num_rows == 0)
        {
          $query = "INSERT INTO `Employees` (`First Name`, `Last Name`, `SSN`, `Salary`, `Email`, `Password`)
                    VALUES ('" . $_POST['firstname'] . "','" . $_POST['lastname'] . "','" . $_POST['ssn'] . "','"
                     . $_POST['salary'] . "','" . $_POST['email'] . "','" . $_POST['password'] . "')";
          echo "The SQL you generated is:<br><br> " . $query;
          $queryResult = $dbConnection->executeQuery($query);
        }
        else
        {
          echo "Sorry, it looks like that email address has already been used. :(";
        }

      }
      else
      {
        echo "Sorry, it looks like we were missing some information to create your account.";
      }
      echo "<br><br>";

      $redirectURL = "/Employees";
      if(isset($_GET["redirect"]))
      {
        $redirectURL = $_GET["redirect"];
      }
      echo "<a href='" . $redirectURL . "'>Return to Employee Portal</a>";
    ?>
  </body>
</html>
