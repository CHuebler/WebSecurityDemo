<?php
  class DatabaseConnection
  {
      // Single MySql Object
      public $_mysql = null;

      //information to connect to MySql
      private $_host;
      private $_user;
      private $_password;
      private $_database;

      // Constructor
      function __construct($host, $user, $password, $database) {
        $this->_host = $host;
        $this->_user = $user;
        $this->_password = $password;
        $this->_database = $database;

        $this->createMysqlConnection();
     }

     // Destructor
     function __destruct() {
       $this->closeMysqlConnection();
     }

     function createMysqlConnection() {
       $this->_mysql = new mysqli($this->_host, $this->_user, $this->_password, $this->_database);
       if ($this->_mysql->connect_errno) {
           echo "Failed to connect to MySQL: (" . $this->_mysql->connect_errno . ") " . $this->_mysql->connect_error;
       }
     }

     function closeMysqlConnection() {
       mysqli_close($this->_mysql);
     }

     function executeQuery($query) {
       if(mysqli_multi_query($this->_mysql,$query))
       {
       $result=mysqli_store_result($this->_mysql);
       return $result;
        }
        else{
          return false;
        }
       /*
       if (mysqli_multi_query($this->_mysql,$query))
        {
        do
          {
          // Store first result set
          if ($result=mysqli_store_result($this->_mysql)) {
            // Free result set
            mysqli_free_result($result);
            }
          }
        while (mysqli_next_result($this->_mysql));
        }
        else{
         return $this->_mysql->query($query);
        }
        */
     }

  }
?>
