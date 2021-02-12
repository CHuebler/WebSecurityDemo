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

      <span class="title">Known Vulnerable Components</span>
      <br>

      <div class="vulnDescription">
        <div class="standardFormat">
          <span class="subTitle">What is Known Vulnerable Components?</span>
          <p>
            This one might be slightly obvious. The OWASP committee has put using
            components with known vulnerabilites  on this list because there are insecure
            components that people do use in their applications and thus opens their site
            to attacks. A good example would be this website's authentication system or any of the
            other areas with exploits that are discussed in the other sections. Using these components
            in your own web applications would CLEARLY result in having an insecure application.
            <br><br>
            Obviously there is no code example to use here since this is not code related, but component related.
          </p>
        </div>

      </div>
    </div>
    <?php include_once($_SERVER['DOCUMENT_ROOT'] . "/Core/Components/Footer.php"); ?>
  </body>
</html>
