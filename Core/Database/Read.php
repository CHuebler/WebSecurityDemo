<?php
  include_once($_SERVER['DOCUMENT_ROOT'] . "/Core/Database/Connection.php");
  $dbConnection = new DatabaseConnection("localhost", "root", "", "WebSecurity");

  $input = file_get_contents('php://input');

  $json = json_decode($input);
  if($json->query)
  {
    $queryResults = $dbConnection->executeQuery($json->query);

    $returnedHTML = "";

    if($queryResults->num_rows > 0)
    {
      while($row = $queryResults->fetch_assoc())
      {
        $returnedHTML = $returnedHTML . "<tr style=\"cursor:pointer;\"" .
        "onclick=\"window.location.href='/Employees/View?id="
        . $row["ID"] . "'\">"
        . "<td>" . $row["First Name"] . "</td>" . "<td>" . $row["Last Name"] . "</td>" . "</tr>";
      }
      echo $returnedHTML;
    }
    else{
      echo "No Results Found";
    }
  }
  else
  {
    echo "Opps, looks like we're missing some information.";
  }
?>
