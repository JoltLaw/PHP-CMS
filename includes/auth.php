<?php 
session_start();

/**
 * return user authentication status
 * 
 * @return boolean true if user is logged in, otherwise false
 */

function isLoggedIn () {
  return isset($_SESSION["is_logged_in"]) && $_SESSION["is_logged_in"];
}

?>



