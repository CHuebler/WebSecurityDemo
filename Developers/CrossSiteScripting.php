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

      <span class="title">Cross-Site Scripting (XSS)</span>
      <br>

      <div class="vulnDescription">
        <div class="standardFormat">
          <span class="subTitle">What is XSS?</span>
          <p>
            Cross-Site Scripting (known as XSS) is an attacker having the ability to execute scripts within a user's browser
            by submitting input to the web server that fails to properly validate or scrub the received data. What this means,
            is that an attacker, for example, will enter a search term that will then be displayed on the web-page (and located in the query string).
            If this user input is not validated before being displayed on the page, the attacker can then write javascript to execute their own script
            using the search function and then sharing that link. This will then cause anyone who clicks that link with the dangerous search term to
            then execute the attackers script when the page loads. This could
          </p>
        </div>

        <div class="standardFormat">
          <span class="subTitle">Incorrect Coding (Javascript):</span>
          <br>
          <code>
            //find the search term label and set it's value to our user's search input
            document.getElementById("searchTerm").innerHTML = "Searching for employees containing: " + document.getElementById("searchInput").value;
          </code>
          <p>
            This code example is a clear example of how an attacker could take advantage of an
            unvalidated search value. What this is doing, is directly taking a user's input and setting it
            to an html element's value. So, if a user entered the text "&ltscript&gtalert("hello!")&lt/script&gt"
            then that script would run when it was displayed on the screen.
          </p>
        </div>

        <div class="standardFormat">
          <span class="subTitle">How to abuse this vulnerability:</span>
          <p>
            To exploit this vulnerability, simply navigate to the employees page and
            enter any script into the search field and search for it. Notice that your script
            will execute.
          </p>
        </div>

        <div class="standardFormat">
          <span class="subTitle">Correct Coding (Javascript):</span>
          <br>
          <code>
            document.getElementById("searchTerm").innerHTML = "Searching for employees containing: " + escape(document.getElementById("searchInput").value);
          </code>
          <p>
            Looking at this new example, you will notice that we are escaping the user input now.
            This is not typically the "correct" way to resolve this but it is a way that will work.
            Let's take our input example from the previous example: "&ltscript&gtalert("hello!")&lt/script&gt"
            This will now display as: %3Cscript%3Ealert%28%27hello%21%27%29%3Cscript%3E
            <br><br>
            So why is this not the "right" way to do this? Well, technically it is preventing users from
            executing their own scripts but now users cannot search for those special characters. This type of
            data scrubbing should be handled on the server so you can search for the raw characters as needed but
            then return the results to be dispalyed as html encoded strings so they will properly display on the page
            and still not execute the attacking scripts.
          </p>
        </div>
      </div>
    </div>
    <?php include_once($_SERVER['DOCUMENT_ROOT'] . "/Core/Components/Footer.php"); ?>
  </body>
</html>
