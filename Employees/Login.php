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

    <div id="PageContent" class="textCentered">
      <h2>Employee Portal</h2>
      <form class="" action="/Employees/Authenticate.php" method="post">
        Email: <input type="text" name="email" value="">
        <br>
        Password: <input type="password" name="password" value="">
        <br>
        <button type="submit" name="login">Login</button>
      </form>

      <hr style="width:200px;">

      <button type="button" name="button" onclick="window.location='/Employees/Register.php'">Create New Employee</button>

    </div>

    <?php include_once($_SERVER['DOCUMENT_ROOT'] . "/Core/Components/Footer.php"); ?>
  </body>
</html>
