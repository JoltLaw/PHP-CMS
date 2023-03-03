<?php

// authenticate that the user is logged in.

class Auth {
/**
 * return user authentication status
 * 
 * @return boolean true if user is logged in, otherwise false
 */

public static function isLoggedIn(){
  return isset($_SESSION["is_logged_in"]) && $_SESSION["is_logged_in"];
}

/**
 * require the user to be logged in, stopping whith an unauthorised message if not
 * 
 * @return void
 */
public static function requireLogin() 
{
  if(!static::isLoggedIn()) {
    die("unauthorised");
  }

}

//**Log in using the session @return void*/

public static function login() {
  session_regenerate_id(true);

  $_SESSION["is_logged_in"] = true;
}

/**
 * log out using the session
 * @return void
 */

public static function logout() {
  $_SESSION = [];

if (ini_get("session.use_cookies")) {
  $params = session_get_cookie_params();
  setcookie(session_name(), '', time() - 42000,
      $params["path"], $params["domain"],
      $params["secure"], $params["httponly"]
  );
}

session_destroy();
}
 }
