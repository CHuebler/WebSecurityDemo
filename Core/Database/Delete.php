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

        $dbConnection = new DatabaseConnection("localhost", "root", "", "WebSecurity");

        $query = "DELETE FROM `Employees` WHERE `ID`=" . $_SESSION['ID'];

        $dbConnection->executeQuery($query);

        session_destroy();

        echo "Your account has been DELETED!";
      ?>
    </div>
    <?php include_once($_SERVER['DOCUMENT_ROOT'] . "/Core/Components/Footer.php"); ?>
  </body>
</html>
