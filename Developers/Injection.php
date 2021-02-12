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

      <span class="title">Injection</span>
      <br>

      <div class="vulnDescription">
        <div class="standardFormat">
          <span class="subTitle">What is Injection?</span>
          <p>
            Injection is when a server accepts raw user input without any checking, and
            then uses that data to build up queries for SQL or similar technologies. This type
            of flaw allows an attacker to execute scripts on the server through their user input,
             which can cause heavy problems for databases, or even the entire web server.
          </p>
        </div>

        <div class="standardFormat">
          <span class="subTitle">Incorrect Coding (PHP):</span>
          <br>
          <code>
            //Get the submitted email from the user form.
            $submittedEmail = $_POST("email");

            //Connect to the database and store the connection.
            $mysql = new mysqli("localhost", "user", "password", "MyDatabase");

            //Create the query and run it.
            $mysql->query("SELECT * from Employees where Email = " . $submittedEmail);
          </code>
          <p>
            As you can see, this SQL query is built to select employees based on
            an email submitted by the user. The problem with the way this is implemented,
            is that this string is not managed in any way, so a user can type an email
             address in the form along with other SQL they would like to execute.
          </p>
        </div>

        <div class="standardFormat">
          <span class="subTitle">How to abuse this vulnerability:</span>
          <p>
            The front end application has this error whenever the database is accessed.
            <br>
            <br>
            Specifically though, it would be easiest to use this exploit from the employee creation form.
            The reason for this, is that although reading the code is easier for the viewing an employee based on
            their email, it is more steps to recreate. Here we will look at taking the steps to
            exploit the broken user creation system and how entering certain values when creating
            your user can destroy the database.
            <br><br>
            The overall sql for creating a user looks something like this:
            <br><br>
            INSERT INTO `Employees` (`First Name`, `Last Name`, `SSN`, `Salary`, `Email`, `Password`) VALUES ('chris','h','123121234','100000','chris@email.com','password')
            <br><br>
            Since the last item added into the query for creating an account happens to be the password,
            simply add a ";" to the end of your password and follow it with a query. For example, you could do:
            <br>
            <br>
            "password'); TRUNCATE TABLE `Employees`;#"
            <br>
            <br>
            This will create your user with the password of password, but then completely drop and empty
            the employee table, thus deleting all accounts created.
          </p>
        </div>

        <div class="standardFormat">
          <span class="subTitle">Correct Coding (PHP):</span>
          <br>
          <code>
            //Get the submitted email from the user form.
            $submittedEmail = $_POST("email");

            //Connect to the database and store the connection.
            $mysql = new mysqli("localhost", "user", "password", "MyDatabase");

            //prepare our SQL Query
            $prepQuery = $mysqli->prepare("SELECT * from Employees where Email=?");

            // Bind parameters to the query marker
            $prepQuery->bind_param("s", $submittedEmail);

            // execute query
            $prepQuery->execute();
          </code>
          <p>
            So what is different and what is it doing? As you can see, this query is
            now going through a "prepare" process, which modifies the query to be what is called
            a "parameterized query". Basically, what this does is tell the
            query engine that the bound variables are simply variables and they are values within
            the query, and do not contain sections of other queries. This limits the scope to one
            query and will not allow the user to execute their own sql outside of the server's configured set.
          </p>
        </div>
      </div>
    </div>
    <?php include_once($_SERVER['DOCUMENT_ROOT'] . "/Core/Components/Footer.php"); ?>
  </body>
</html>
