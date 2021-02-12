<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>World Employment Inc.</title>

    <!-- CSS -->
    <?php include_once($_SERVER['DOCUMENT_ROOT'] . "/Core/Components/CoreStyles.php"); ?>
    <style media="screen">
      table, th, td {
        border: 1px solid black;
      }
    </style>

    <!-- Javascript -->
    <?php include_once($_SERVER['DOCUMENT_ROOT'] . "/Core/Components/CoreJavascript.php"); ?>
  </head>
  <body>
    <?php include_once($_SERVER['DOCUMENT_ROOT'] . "/Core/Components/Header.php"); ?>

    <div id="PageContent" class="textCentered">
      <h2>Current Employees</h2>
      <?php
      if (!isset($_SESSION['ID'])) {
        echo "<button onclick=\"window.location='/Employees/Login.php'\">Ready to Login?</button>";
        echo "<br>";

        echo "<button onclick=\"window.location='/Employees/Register.php'\">Register a new employee account!</button>";
        echo "<br>";
        echo "<br>";
      }
      ?>

      <?php
        echo "<input id=\"searchInput\" style=\"width:64%;\" type=\"search\" name=\"search\" value=\"";
        if(isset($_GET['search']))
        {
          echo $_GET['search'];
        }
        echo  "\" placeholder=\"Filter Employees\" onkeydown = \"if (event.keyCode == 13)
                          document.getElementById('searchButton').click();\">";

       ?>
      <button id="searchButton" type="button" name="button" style="width:10%" onClick="filterResults();">Search</button>

      <br>
      <p id="searchTerm">

      </p>
      <br>

      <script type="text/javascript">
        function filterResults(){
          var searchTerm = document.getElementById("searchInput").value.toUpperCase();

          document.getElementById("searchTerm").innerHTML = "Searching for employees containing: " +
            document.getElementById("searchInput").value;

          table = document.getElementById("employeeTable");
          trs = table.getElementsByTagName("tr");

          for (i = 0; i < trs.length; i++) {
            firstNameTD = trs[i].getElementsByTagName("td")[0];
            lastNameTD = trs[i].getElementsByTagName("td")[1];
            if (firstNameTD && lastNameTD) {
              if (firstNameTD.innerHTML.toUpperCase().indexOf(searchTerm) > -1 ||
              lastNameTD.innerHTML.toUpperCase().indexOf(searchTerm) > -1)
              {
                trs[i].style.display = "";
              }
              else
              {
                trs[i].style.display = "none";
              }
            }
          }
        }
      </script>

      <table id="employeeTable" style="width:75%; margin:auto;">
        <tr>
          <th>Firstname</th>
          <th>Lastname</th>
        </tr>
      </table>

      <script type="text/javascript">
        var callback = function(data) {
          document.getElementById("employeeTable").innerHTML += data;
          filterResults();
        };
        //var query = "query=" + encodeURI("SELECT * FROM Employees");
        var params = {
          "query": "SELECT * FROM Employees"
        }
        window.RequestManager.ExecuteRequest("/Core/Database/Read.php", JSON.stringify(params), true, callback);
      </script>
    </div>

    <?php include_once($_SERVER['DOCUMENT_ROOT'] . "/Core/Components/Footer.php"); ?>
  </body>
</html>
