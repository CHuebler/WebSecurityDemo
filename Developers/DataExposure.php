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
    <?php include_once($_SERVER['DOCUMENT_ROOT'] . "/Core/Components/DevHeader.php"); ?>
    <div id="PageContent">
      <br>
      <i class="fa fa-plus-circle fa-4x" aria-hidden="true"></i>

      <span class="title">Sensitive Data Exposure</span>
      <br>

      <div class="vulnDescription">
        <div class="standardFormat">
          <span class="subTitle">What is Sensitive Data Exposure?</span>
          <p>
            Sensitive Data Exposure (usually just called Data Exposure) is when a web application
            fails to properly secure information that is sensitive to the user. This can include anything from
            credit card numbrs, to privately marked information, to session ids, or even tax information. Data exposure
            is typically a result of another vulnerability, such as a broken authentication system allowing other users
            to see a different user's private information.
          </p>
        </div>

        <div class="standardFormat">
          <span class="subTitle">Incorrect Coding (PHP):</span>
          <br>
          <code>
            $row = $queryResults->fetch_assoc();

            $firstName = $row['First Name'];
            $lastName = $row['Last Name'];
            $email = $row['Email'];
            $ssn = $row['SSN'];
            $salary = $row['Salary'];
          </code>
          <p>
            As mentioned in the Direct Object exploit, this is used in the View.php
            file, where the user is not being validated before sending back all user data.
            This issue has now lead to a proble where all the user's data is accessable on
            a javascript object.
          </p>
        </div>

        <div class="standardFormat">
          <span class="subTitle">How to abuse this vulnerability:</span>
          <p>
            Navigate to the view.php file of a specific user. Open the browser debug
            console. <br><br>Enter in the console: window.employeeInfo <br><br>
            You will notice that the javascript object used to display the data on
            the page contains all the user's data and can be openly viewed.
          </p>
        </div>

        <div class="standardFormat">
          <span class="subTitle">Correct Coding (PHP):</span>
          <br>
          <code>
            $row = $queryResults->fetch_assoc();

            $firstName = $row['First Name'];
            $lastName = $row['Last Name'];
            $email = $row['Email'];
            //validate the found user is the user accessing the info.
            if($_SESSION['ID'] == $row['ID'])
            {
              $ssn = $row['SSN'];
              $salary = $row['Salary'];
            }
          </code>
          <p>
            By not sending data the doesn't match the proper user, the javascript
            object will not have all the user data and will not allow this data to
            be accessed by the browser or be displayed on the screen.
          </p>
        </div>
      </div>
    </div>
    <?php include_once($_SERVER['DOCUMENT_ROOT'] . "/Core/Components/Footer.php"); ?>
  </body>
</html>
