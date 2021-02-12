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

      <span class="title">Insecure Direct Object References</span>
      <br>

      <div class="vulnDescription">
        <div class="standardFormat">
          <span class="subTitle">What is Insecure Direct Object References?</span>
          <p>
            Insecure Direct Object Reference vulnerabilities have to do with there not being
            proper security on what a user can access. For example say that there is no validation
            before a sql statement that retrieves user information. This means that any user can make
            that request and there is no checking that the user has rights to pull the data for that
            specific user. This is giving a direct reference to the user objects in the database due to no validation, hence
            the exploit. (Side note: notice how this is similar to the broken authentication system. This is an example of how
            one exploit can be used to execute others)
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
            The above code is in our View.php file, where all the data on a user
            is retrieved so what is needed can be displayed. The issue with this,
            is all of that data is still sent back to the user, so even users who
            do not have access to all of the data will received it and have it
            stored in the javascript (discussed further in exposed data error).
          </p>
        </div>

        <div class="standardFormat">
          <span class="subTitle">How to abuse this vulnerability:</span>
          <p>
            There are not really any steps to abuse this since it is just data that
            is wrongfully accessable. Head to the view.php file by going through the
            employee section and you will be able to see data that is supposed to be
            secured through user validation. See Data Exposure for more information
            on this data.
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
            Notice how now we are checking if the user accessing this data is the
            user that would allowed to see all of their own data. This is very
            basic validation that would prevent that data leaving the server and
            being viewed by unauthorized users, thus not giving all users direct
            object references.
          </p>
        </div>
      </div>
    </div>
    <?php include_once($_SERVER['DOCUMENT_ROOT'] . "/Core/Components/Footer.php"); ?>
  </body>
</html>
