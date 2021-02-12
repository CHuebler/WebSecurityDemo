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

      <span class="title">Security Misconfiguration</span>
      <br>

      <div class="vulnDescription">
        <div class="standardFormat">
          <span class="subTitle">What is Security Misconfiguration?</span>
          <p>
            Security Misconfiguration is pretty straight forward. It is the
            improper configuration of your web server or database server. This could range
            from many things, from using default settings, to not properly configuring the
            security settings. Below we will just discuss a simple example of how this application
            is not properly configured to prevent a random attack. There is no code example since
            it is all configuration based.
          </p>
        </div>

        <div class="standardFormat">
          <span class="subTitle">How is this application misconfigured?</span>
          <br>
          <p>
            If you look in our Connection.php file, you will see that we have our
            database server's username and password hard coded in the file. Besides
            this being horrendous practice in itself, what's important here is what they are.
            Notice that the username is 'root' and the password is empty. This is an example of
            our database server not being properly configred due to use keeping the default root
            account without at least updating the password. In this case, if an attacker gets our
            database server url, it is common to test default settings that should be updated. This will
            leave our root account exposed and will allow an attacker to do whatever they please with the database
            whether it be modifying content, taking a copy of the database or just outright deleting the entire thing.
            <br><br>
            As you can see, this expoloit would have a large effect, but can easily be protected against. Overall,
            the lesson here is to not leave any default accounts to their default settings and hide the server error messages
            so users do not gain information about the server.
          </p>
        </div>
      </div>
    </div>
    <?php include_once($_SERVER['DOCUMENT_ROOT'] . "/Core/Components/Footer.php"); ?>
  </body>
</html>
