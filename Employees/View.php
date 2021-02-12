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
        $firstName;
        $lastName;
        $ssn;
        $email;
        $salary;
        //GETTING THE EMPLOYEE VIEW INFORMATION IS POSSIBLE
        if(isset($_GET["id"])){
          include_once($_SERVER['DOCUMENT_ROOT'] . "/Core/Database/Connection.php");
          $dbConnection = new DatabaseConnection("localhost", "root", "", "WebSecurity");

          $employeeQuery = "SELECT * FROM Employees WHERE ID = " . $_GET['id'];

          $queryResults = $dbConnection->executeQuery($employeeQuery);

          if($queryResults->num_rows == 1)
          {
            $row = $queryResults->fetch_assoc();

            $firstName = $row['First Name'];
            $lastName = $row['Last Name'];
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
      <h1>Employee Information: </h1>
      <span class="bold">First Name:</span> <span id="firstName"></span>
      <br>
      <span class="bold">Last Name:</span> <span id="lastName"></span>
      <br>
      <span class="bold">Email:</span> <span id="email"></span>
      <br>
      <br>
      You are currently viewing as a visitor, would you like to view all of your information?
      <br>
      Note: This information below is not avaliable to other users.
      <br>
      <button id="showButton" type="button" name="ShowContentButton" onclick="DisplayOwnerInfo()">View All Content</button>
      <div id="hiddenContentArea" style="display:none;">
        <br>
        <span class="bold">Salary:</span> <span id="salary"></span>
        <br>
        <span class="bold">Social Security Number:</span> <span id="ssn"></span>
      </div>
      <!-- Page Javascript that will run if everything somehow works. -->
      <script type="text/javascript">
        function RenderPageEvent() {
          window.employeeInfo = {
            firstName : '<?php echo $firstName ?>',
            lastName : '<?php echo $lastName ?>',
            email : '<?php echo $email ?>',
            salary : '<?php echo $salary ?>',
            ssn : '<?php echo $ssn ?>'
          }

          document.getElementById("firstName").innerHTML =
            window.GetSafeString(window.employeeInfo.firstName);
          document.getElementById("lastName").innerHTML =
            window.GetSafeString(window.employeeInfo.lastName);
          document.getElementById("email").innerHTML =
            window.GetSafeString(window.employeeInfo.email);
          document.getElementById("salary").innerHTML =
            window.GetSafeString(window.employeeInfo.salary);
          document.getElementById("ssn").innerHTML =
            window.GetSafeString(window.employeeInfo.ssn);
        }

        function DisplayOwnerInfo(){
          document.getElementById("hiddenContentArea").style.display = "block";
          document.getElementById("showButton").style.display = "none";
        }
      </script>
    </div>
    <?php include_once($_SERVER['DOCUMENT_ROOT'] . "/Core/Components/Footer.php"); ?>
  </body>
</html>
