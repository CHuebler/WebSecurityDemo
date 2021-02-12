<style>
  /***** Header Area *****/
  #PageHeader{
    margin:0;
    padding:0;
    display: -webkit-flex;
    display: flex;
    -webkit-justify-content: space-between;
    justify-content: space-between;
    background-color:#f2f2f2;
    border-bottom:1px solid black;
    font-family:"Palatino Linotype", "Book Antiqua", Palatino, serif;
  }

  #CompanyIcon{
    font-weight:bold;
    font-size:large;
  }

  #PageHeader > div{
    margin:10px;
    padding:0;
    vertical-align:bottom;
    display: -webkit-flex;
    display: flex;
    -webkit-justify-content: space-between;
    justify-content: space-between;
  }

  #PageHeader > div > a{
    margin-left:10px;
    margin-right:10px;
  }

  .headerLinkContent{

  }

  .headerLinkContent:hover{
    text-decoration:underline;
  }

  .headerLinkContent:hover{

  }
</style>

<header id="PageHeader">
  <div>
    <a href="/">
      <span id="CompanyIcon">World Employment Inc.</span>
    </a>
  </div>
  <div>
    <a href="/Employees">
      <div class="headerLinkContent">
        Employees
      </div>
    </a>
  </div>
  <div id="AccountArea">
    <?php
      session_start();
      if (!isset($_SESSION['ID'])) {
        echo "<a href=\"/Employees/Login.php\">Login </a>";
      }
      else {
        echo "<a href=\"/Employees/Account.php?sessionid=" . session_id() . "\">Account</a>";
        echo "<a href=\"/Employees/Logout.php\">Logout</a>";
      }
     ?>

  </div>
</header>
