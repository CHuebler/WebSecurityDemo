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
      <h2>Employee Account Creation</h2>
      <div id="successResponse" style="color:red;">

      </div>
      <div id="errorResponse" style="color:red;">

      </div>

      <!-- OUR FORM TO SUBMIT -->
      <form class="" action="/Core/Database/Insert.php" method="post">
        <h4>
        Login Information:
        </h4>
        Email:
        <input id="email" type="email" name="email" title="Email" value="" placeholder="Email" required>
        <br>
        Password:
        <input id="password" type="password" name="password" title="Password" value="" placeholder="Password" required>
        <h4>
        The following information will be used to create your profile:
        </h4>
        First Name:
        <input id="fname" type="text" name="firstname" title="First Name" value="" placeholder="First Name" required>
        <br>
        Last Name:
        <input id="lname" type="text" name="lastname" title="Last Name" value="" placeholder="Last Name" required>
        <br>
        <br>
        Social Security Number:
        <input id="ssn" type="text" name="ssn" title="Social Security Number" placeholder="555-55-5555" pattern="\d{3}-?\d{2}-?\d{4}" required>
        <br>
        <br>
        Current Salary:
        <input id="salary" type="number" name="salary" title="Salary" value="" placeholder="100" required>
        <br>
        <sub>For simplicity, simply enter salary in integer format.</sub>
        <br>
        <br>
        <input type="submit" value="Create Account">
      </form>

    </div>
    <?php include_once($_SERVER['DOCUMENT_ROOT'] . "/Core/Components/Footer.php"); ?>
  </body>
</html>
