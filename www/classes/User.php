<?php


/**
 * User
 * 
 * A person or entity that can log in to the site
 */
class User {

  //** a user unqiue int @var integar */
  public $id;

  //**a unique name tied to the users account@var string*/
  public $username;

  //** the password used for logging into an account @var string */
  
  
  public $password;

  /**
   * Authenticate a user crodentials;
   * 
   * @param object $conn Connection to the database;
   * @param string $username Username;
   * @param string $password Password;
   * 
   * @return boolean if true crodentials are correct, false otherwise;
   */
    public static function authenticate($conn, $username, $password) 
    {
      $sql = "SELECT * FROM user where username = :username";

      $stmt = $conn->prepare($sql);
      $stmt->bindValue(":username", $username, PDO::PARAM_STR);

      $stmt->setFetchMode(PDO::FETCH_CLASS, "User");

      $stmt->execute();

      

      if ($user = $stmt->fetch()) {
      return password_verify($password, $user->password);
      }
    }
}