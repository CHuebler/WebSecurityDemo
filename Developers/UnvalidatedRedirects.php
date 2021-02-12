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

      <span class="title">Unvalidated Redirects and Forwards</span>
      <br>

      <div class="vulnDescription">
        <div class="standardFormat">
          <span class="subTitle">What is Unvalidated Redirects and Forwards?</span>
          <p>
            When you are browsing a website, you are navigated through many pages quite frequently.
            Sometimes, these redirects are based off of user submitted data or current user information
            that is accessable via the url. By manipulating these requests in vulnerable areas, there could be
            many issues created. One example, if by modifying the url to unexpected values an attacker may be able
            to trick the system into navigating them to a page that would not normally be accessable. There could also
            be a case where an attacker is able to use submitted data that would effect where other users are redirected to
            and could redirect them to malicious websites that would compromise their security.
          </p>
        </div>

        <div class="standardFormat">
          <span class="subTitle">Incorrect Coding (PHP):</span>
          <br>
          <code>
            $redirectURL = "/Employees";
            if(isset($_GET["redirect"]))
            {
              $redirectURL = $_GET["redirect"];
            }
            echo "&lta href='" . $redirectURL . "'&gtReturn to Employee Portal&lt/a&gt";
          </code>
          <p>
            When a user creates an account, (located on our insert.php file) there
            is a page that tells the user created their account (and shows the sql for your learning).
            Below all that is a link to return to the page, however this web app has an
            optional query string parameter to set that link for future development so it
            is possible to send the user to a specific location on the web app to help improve
            their experience. However these redirect links are unvalidated, so an attacker can
            create a bad redirect and use that to trick users into visiting harmful sites through
            our legitimate site.
          </p>
        </div>

        <div class="standardFormat">
          <span class="subTitle">How to abuse this vulnerability:</span>
          <p>
            To set your own website as the link on the page, you will first have to navigate to
            the insert.php file through either by going to http://localhost/Core/Database/Insert.php or
            creating an account and hitting hte page normally.
            <br><br>
            Next, you will need to modify this URL before it gets shared to cause an attack.
            To set the URL to an invalid location, you need to set the query string value redirect.
            Let's force the user to go to google instead of back to the web app home page.
            The URL to share should now be http://localhost/Core/Database/Insert.php?redirect=http://google.com
            <br><br>
            Navigate to the link with the new url and you will see that when you click the link you will now
            be redirected to google instead of our web application page. This URL can now be
            shared with others and trick users into wrongfully navigating to a different domain.
          </p>
        </div>

        <div class="standardFormat">
          <span class="subTitle">Correct Coding (PHP):</span>
          <br>
          <code>
            $redirectURL = "/Employees";
            if(isset($_GET["redirect"]))
            {
              //Confirm that our redirect url is in our localhost domain and not an outside source
              if(substr( $_GET["redirect"], 0, 16 ) === "http://localhost")
              {
                $redirectURL = $_GET["redirect"];
              }
            }
            echo "&lta href='" . $redirectURL . "'&gtReturn to Employee Portal&lt/a&gt";
          </code>
          <p>
            To prevent this type of attack, any url that can be maniuplated by the user
            should be validated. In the case above, we are simply validating that the
            submitted url on the query string is in our domain and that it is not to an
            address out of our area.
          </p>
        </div>
      </div>
    </div>
    <?php include_once($_SERVER['DOCUMENT_ROOT'] . "/Core/Components/Footer.php"); ?>
  </body>
</html>
