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
  <body onload="RenderPageEvent()">
    <?php include_once($_SERVER['DOCUMENT_ROOT'] . "/Core/Components/Header.php"); ?>
    <div id="PageContent">
      <?php
        if(isset($_GET['sessionid'])){
          session_write_close();
          session_id($_GET['sessionid']);
          session_start();

        }

        $firstName;
        $lastName;
        $ssn;
        $email;
        $salary;
        //GETTING THE EMPLOYEE VIEW INFORMATION IS POSSIBLE
        if(isset($_SESSION['ID'])){
          include_once($_SERVER['DOCUMENT_ROOT'] . "/Core/Database/Connection.php");
          $dbConnection = new DatabaseConnection("localhost", "root", "", "WebSecurity");

          $employeeQuery = "SELECT * FROM Employees WHERE ID = " . $_SESSION['ID'];

          $queryResults = $dbConnection->executeQuery($employeeQuery);

          if($queryResults->num_rows == 1)
          {
            $row = $queryResults->fetch_assoc();

            $firstName = $row['First Name'];
            $lastName = $row['Last Name'];
            $password = $row['Password'];
            $email = $row['Email'];
            $ssn = $row['SSN'];
            $salary = $row['Salary'];
          }
          else{
            header("Location: /PageNotFound.php");
          }
        }
        else
        {
          header("Location: /PageNotFound.php");
        }
      ?>

      <!-- Page content if all the account info is there. -->
      <h1>Welcome! <br>
          Here is your account information: </h1>
      <form class="" action="/Core/Database/Edit.php" method="post">
        <label for="firstName" class="bold">First Name:</label> <input id="firstName" name="firstName"/>
        <br>
        <label for="lastName" class="bold">Last Name:</label> <input id="lastName" name="lastName"/>
        <br>
        <label for="password" class="bold">Password:</label> <input id="password" name="password"/>
        <br>
        <label for="email" class="bold">Email:</label> <input id="email" name="email"/>
        <br>
        <label for="salary" class="bold">Salary:</label> <input id="salary" name="salary"/>
        <br>
        <label for="ssn" class="bold">Social Security Number:</label> <input id="ssn" name="ssn"/>
        <br>
        <input type="submit" value="Update">
      </form>
      <hr style="width:35%;">
      <form class="" action="/Core/Database/Delete.php" method="post">
          <input type="submit" name="" value="Delete Account">
      </form>
      <!-- Page Javascript that will run if everything somehow works. -->
      <script type="text/javascript">
        function RenderPageEvent() {
          window.employeeInfo = {
            firstName : '<?php echo $firstName ?>',
            lastName : '<?php echo $lastName ?>',
            password : '<?php echo $password ?>',
            email : '<?php echo $email ?>',
            salary : '<?php echo $salary ?>',
            ssn : '<?php echo $ssn ?>'
          }

          document.getElementById("firstName").value =
            window.GetSafeString(window.employeeInfo.firstName);
          document.getElementById("lastName").value =
            window.GetSafeString(window.employeeInfo.lastName);
          document.getElementById("password").value =
            window.GetSafeString(window.employeeInfo.password);
          document.getElementById("email").value =
            window.GetSafeString(window.employeeInfo.email);
          document.getElementById("salary").value =
            window.GetSafeString(window.employeeInfo.salary);
          document.getElementById("ssn").value =
            window.GetSafeString(window.employeeInfo.ssn);
        }
      </script>
    </div>
    <?php include_once($_SERVER['DOCUMENT_ROOT'] . "/Core/Components/Footer.php"); ?>
  </body>
</html>
