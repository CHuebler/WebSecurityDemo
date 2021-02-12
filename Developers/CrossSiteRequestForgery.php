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

      <span class="title">Cross-Site Request Forgery</span>
      <br>

      <div class="vulnDescription">
        <div class="standardFormat">
          <span class="subTitle">What is Cross-Site Request Forgery (CSRF)?</span>
          <p>
            CSRF is when an attacker is able to force a user to send a request along with data.
            This data can range from anything stored the user has access to, to cookie information such as session information.
            With this forced request getting sent out, the attacker is able to have users
            send their needed information to where they choose, most likely a location to collect as much user information as possible.
          </p>
        </div>

        <div class="standardFormat">
          <span class="subTitle">Incorrect Coding:</span>
          <p>
            Open the Database delete.php file. You will notice that this file simply
            checks to see if the user has an active session that holds a user id. If it does
            then the user is deleted from the database and all session data is cleared. This
            is an issue because there is no validation that the user intended to execute this
            request and is not protected so anyone can simply navigate to this file.
            <br><br>
            So why is this a problem as long as a user does not navigate to this page?
          </p>
        </div>

        <div class="standardFormat">
          <span class="subTitle">How to abuse this vulnerability:</span>
          <p>
            An attacker can easily trick a user to unintentially navigate and make a
            request to this page which is where the request forgery comes into play.
            An attacker simply has to have their own web page that a user will visit.
            On this page, the attacker can place an image tag that has its source set
            to this delete page.
            <br><br>
            ex: &ltimg src="localhost/database/delete.php"/&gt
            <br><br>
            With this on the page, a user who navigates to this page will then unknowingly
            send a request to the delete file trying to retrieve an "image". This gets the
            attacker to send a forged request with the users session, if they have one, and
            have the user delete their own account on the web app.
          </p>
        </div>

        <div class="standardFormat">
          <span class="subTitle">Correct Coding:</span>
          <p>
            To prevent this, the web app would have to be created with a method to
            determine that the user actually requested this action. For example, when
            a user requests to delete their account from the account page, a token could be
            generated and then when they send a request to delete their account they have to
            include the token on the request so it can be confirm that the user requested to
            delete their account on the account management page and it is not a fake request.
          </p>
        </div>
      </div>
    </div>
    <?php include_once($_SERVER['DOCUMENT_ROOT'] . "/Core/Components/Footer.php"); ?>
  </body>
</html>
