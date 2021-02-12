<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>World Employment Inc.</title>

    <!-- CSS -->
    <?php include_once($_SERVER['DOCUMENT_ROOT'] . "/Core/Components/CoreStyles.php"); ?>

    <!-- Javascript -->
    <?php include_once($_SERVER['DOCUMENT_ROOT'] . "/Core/Components/CoreJavascript.php"); ?>
  </head>
  <body>
    <?php include_once($_SERVER['DOCUMENT_ROOT'] . "/Core/Components/Header.php"); ?>
    <div id="PageContent">
      <?php
        include_once($_SERVER['DOCUMENT_ROOT'] . "/Core/Database/Connection.php");

        if(isset($_POST['email']) && isset($_POST['password']) && isset($_POST['firstName']) &&
         isset($_POST['lastName']) && isset($_POST['ssn']) && isset($_POST['salary']))
        {
          $dbConnection = new DatabaseConnection("localhost", "root", "", "WebSecurity");

          $query = "UPDATE `Employees` SET `First Name`='" . $_POST['firstName'] .
            "', `Last Name`='" . $_POST['lastName'] .
            "', `Password`='" . $_POST['password'] .
            "', `Email`='" . $_POST['email'] .
            "', `SSN`='" . $_POST['ssn'] .
            "', `Salary`='" . $_POST['salary'] .
            "' WHERE `ID`=" . $_SESSION['ID'];

            $dbConnection->executeQuery($query);

            echo "Your account has been updated!";
        }
        else{
          echo "Looks like something went wrong.";
        }
      ?>
    </div>
    <?php include_once($_SERVER['DOCUMENT_ROOT'] . "/Core/Components/Footer.php"); ?>
  </body>
</html>
