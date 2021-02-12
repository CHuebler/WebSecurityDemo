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

      <span class="title">Broken Authentication and Session Management</span>
      <br>

      <div class="vulnDescription">
        <div class="standardFormat">
          <span class="subTitle">What is Broken Authentication/Session Management?</span>
          <p>
            Weak authentication systems can have catastrophic impacts if they are exploited to their full potential.
            This exploit can happen through a couple routes. Some authentication exploits mainly happen through exposed data
            from the query string (URL) or some other visible area. So what can be exposed? Some incredibly poor authentication systems
            will place a session token id or some other form of validation in the url and pass that around, or use url rewriting to allow
            attackers to enter attack attempts right in the url.
            <br><br>
            For example, the url might look something like: http://www.SomeWebDomain.com/Account?sessionid=axdb-12as-1234-abcd
            <br><br>
            Let's look at what could happen if session id's or keys are released in a URL like above. This in itself makes the website pages
            un-shareable. By this, I mean that if someone copies and pastes a URL to someone else they have now shared their session id.
            With the session id, someone could simply attach the session id on their machine, or even just use the url to gain access to
            the previous user's session. With access to a users session, you are now essentially logged in as them.
          </p>
        </div>

        <div class="standardFormat">
          <span class="subTitle">Incorrect Coding (PHP):</span>
          <br>
          <code>
            if(isset($_GET['sessionid'])){
              session_write_close();
              session_id($_GET['sessionid']);
              session_start();
            }
          </code>
          <p>
            As you can see, this is wrongly forming the url with the session id and starting the session based off of it.
          </p>
        </div>

        <div class="standardFormat">
          <span class="subTitle">How to abuse this vulnerability:</span>
          <p>
            In the front facing web app,if you log into an account and navigate
            to the account page you will notice the session
            id being passed in the query string within the URL.
            <br><br>
            With that URL that contains the session ID, if you open a new tab to
            the web app in "private" mode it will start as a new instance. From there,
            paste the url in that private window and you will notice that you are
            suddenly logged in with the other user's session.
          </p>
        </div>

        <div class="standardFormat">
          <span class="subTitle">Correct Coding (PHP):</span>
          <br>
          <code>
            session_start();
          </code>
          <p>
            Notice how this example is using the PHP library session management to avoid any
            exposure through custom session management. This really is not an issue today as much
            as it was in the past due to session and authentication management becoming more built in
            to langauges. In PHP, the session start will automatically generate a new session id if needed
            or resume an existing one without having to remebmer the user's previous session id.
          </p>
        </div>
      </div>
    </div>
    <?php include_once($_SERVER['DOCUMENT_ROOT'] . "/Core/Components/Footer.php"); ?>
  </body>
</html>
