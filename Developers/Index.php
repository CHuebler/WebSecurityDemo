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
    <div id="PageContent" class="textCentered">
      <h1 class="title">Developer Training</h1>
      <img class="coverPhoto" src="Images/DevHomeCover.jpeg" alt="" />
      <div style="width:75%; margin:auto;">
        <p>
          Welcome to the developer section of this web application. The purpose of this web application is for users to learn about common
          web security vulnerabilities and to be able to execute them on this intentionally exposed application. You will find more than just an exposed
          application. The purpose of this website is not only to allow you to practice these common exploits, but to provide information on the most
          common web exploits, what poor code looks like, and what correct code looks like. Currently, we will only be focusing on the OWASP top 10 Application Security Risks.
        </p>
        <p>
          <a style="color:blue; cursor:pointer;" href="https://www.owasp.org/index.php/About_OWASP">What is OWASP?</a>
        </p>
        <p>
          OWASP is a not-for-profit charity group, that stands for Open Web Application Security Program. Basically it is a group that promotes safe application
          development and provides information on common and new issues. For more information see the link above.
        </p>
        <p>
          As mentioned before, this application is only focusing on explaining the top 10 application security issues that OWASP determined in their top 10 list in 2013.
          You will find each of them below. Simply click on a card and explore the issue.
        </p>
      </div>
      <div class="centerAlignItems">
        <a href="/Developers/Injection">
          <div class="card">
              <div class="subTitle">
                Injection
              </div>
              <i class="fa fa-plus-circle fa-4x" aria-hidden="true"></i>
              <br>
              Unvalidated data being used to manipulate SQL queries.
          </div>
        </a>
        <a href="/Developers/Authentication">
          <div class="card">
            <div class="subTitle">
              Authentication
            </div>
            <i class="fa fa-user fa-4x" aria-hidden="true"></i>
            <br>
            Exploiting insecure authentication systems to gain user information.
          </div>
        </a>
        <a href="/Developers/XSS">
          <div class="card">
            <div class="subTitle">
              XSS
            </div>
            <i class="fa fa-arrows-alt fa-4x" aria-hidden="true"></i>
            <br>
            Executing scripts within a website through unchecked received data.
          </div>
        </a>
        <a href="/Developers/DirectObject">
          <div class="card">
            <div class="subTitle">
              Insecure Objects
            </div>
            <i class="fa fa-first-order fa-4x" aria-hidden="true"></i>
            <br>
            Access control openings allowing files and keys on the server to be viewed.
          </div>
        </a>
        <a href="/Developers/SecurityConfiguation">
          <div class="card">
              <div class="subTitle">
                Misconfiguration
              </div>
              <i class="fa fa-cogs fa-4x" aria-hidden="true"></i>
              <br>
              Improper security settings leaving critical server locations exposed.
          </div>
        </a>
        <a href="/Developers/DataExposure">
          <div class="card">
              <div class="subTitle">
                Data Exposure
              </div>
              <i class="fa fa-file-text fa-4x" aria-hidden="true"></i>
              <br>
              Weakly protected data allowing attackers to retrieve sensitive data.
          </div>
        </a>
        <a href="/Developers/AccessControl">
          <div class="card">
              <div class="subTitle">
                Level Access
              </div>
              <i class="fa fa-level-up fa-4x" aria-hidden="true"></i>
              <br>
              A lack of rights validation leaving sensitive data exposed to false requets.
          </div>
        </a>
        <a href="/Developers/CSRF">
          <div class="card">
              <div class="subTitle">
                CSRF
              </div>
              <i class="fa fa-share fa-4x" aria-hidden="true"></i>
              <br>
              Gaining user session information to execute false requests from another site.
          </div>
        </a>
        <a href="/Developers/Components">
          <div class="card">
              <div class="subTitle">
                Vulnerable Components
              </div>
              <i class="fa fa-circle-o-notch fa-4x" aria-hidden="true"></i>
              <br>
              Using insecure and vulnerable javascript components that expose data.
          </div>
        </a>
        <a href="/Developers/Redirects">
          <div class="card">
              <div class="subTitle">
                Redirects
              </div>
              <i class="fa fa-sign-in fa-4x" aria-hidden="true"></i>
              <br>
              Using invalidated data to determine redirects and forwards.
          </div>
        </a>
      </div>
    </div>
    <?php include_once($_SERVER['DOCUMENT_ROOT'] . "/Core/Components/Footer.php"); ?>
  </body>
</html>
