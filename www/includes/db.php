<?php


/**
 * Get the database connection
 * 
 * @return object connection to MySQL server
 */
$db = new Database(DB_HOST, DB_NAME, DB_USER, DB_PASS);
return $db->getConn();