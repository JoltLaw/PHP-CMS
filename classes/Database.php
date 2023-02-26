<?php

/** 
 * database
 * 
 * a connection to the database
 */

class Database {

  /** get the database connection
   * 
   * @return PDD object connection to the database server
   */

  public function getConn() {
    $db_host = "localhost";
    $db_name = "cms";
    $db_user = "cms_www";
    $db_password = "Bizaboo#100";


    $dsn = "mysql:host=" . $db_host . ";dbname=" . $db_name . ";charset=utf8";
    try {
     $db = new PDO($dsn, $db_user, $db_password);
     $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     return $db;
    }
    catch (PDOException $e) {
      echo $e->getMessage();
      exit;
    }
  }

}