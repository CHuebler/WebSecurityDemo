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

      <span class="title">Missing Function Level Access Control</span>
      <br>

      <div class="vulnDescription">
        <div class="standardFormat">
          <span class="subTitle">What is Missing Function Level Access Control?</span>
          <p>
            Missing Function Level Access Control (we will refer to it as level access for short)
            is when an application fails to properly validate what functionality the current user has
            access to. For example let's say you are viewing a user's profile on a website. You are of course
            able to see basic information about the user, but you would assume that only the owner of that account
            can modify the account information.
            <br><br>
            With a level access exploit, the application is essentially failing to validate what
            functions the user has access to, so when you are viewing that user's profile this exploit may,
            for example, show you the controls to update account information instead of checking
            that these are only displayed when it is the owner logged in.
          </p>
        </div>

        <div class="standardFormat">
          <span class="subTitle">Coding:</span>
          <p>
            Normally, we would have a small coding example, but the issue here is
            simply too large to show a corrected code base in a few lines.
          </p>
        </div>

        <div class="standardFormat">
          <span class="subTitle">How to abuse this vulnerability:</span>
          <p>
            This one is simple. Since Level Access is the displaying of UI tool and
            items that a user should not have access to, simply navigate to the View.php
            file viewing any user that you are not logged in to. Once on the page you will
            notice that the button to show all a user's info that should only be available to
            a logged in user viewing their own profile is actually exposed to everyone due to a
            lack of validation.
          </p>
        </div>

        <div class="standardFormat">
          <span class="subTitle">How to prevent this?</span>
          <p>
            Obviously, to prevent this type of error you need to validate what
            information can be retrieved every time it is accessed on the server.
            The reason I say that this has to be done on the server, is because users
            can view javascript so it cannot be hidden within. Due to this, data
            needs to be checked once retrieved from the database for rights (or even
            before it is retrieved).
          </p>
        </div>
      </div>
    </div>
    <?php include_once($_SERVER['DOCUMENT_ROOT'] . "/Core/Components/Footer.php"); ?>
  </body>
</html>
