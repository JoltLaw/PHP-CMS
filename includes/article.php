<?php

/**
 * get article record based one id
 * 
 * @param object $conn Connection to the datebase
 * @param object integer $id the article ID
 * @param string $columns optionial list of columns for the select, defaults to *
 * 
 * @return mixed an assositive array containing article with that ID, or null if not found
 */


function getArticle ($conn, $id, $columns = "*") {

  $sql = "SELECT $columns FROM article WHERE id = :id";

  $stmt = $conn->prepare($sql);

 
  $stmt->bindValue(":id", $id, PDO::PARAM_INT);

    if ($stmt->execute()) {
      return $stmt->fetch(PDO::FETCH_ASSOC);
    }

  }



/**
 * 
 * @param string $title Title, required.
 * @param string $content Content, required.
 * @param string $published_at Published date and time, yyyy-mm-dd hh:mm:ss if not blank.
 * 
 * @return array An Array of validation errors messages.
 */

function validateArticle($title, $content, $published_at) {
  $errors = [];
  $title = "";
  $content = "";
  $published_at = "";

  $title = $_POST["title"];
  $content = $_POST["content"];
  $published_at = $_POST["published_at"];


  if($title == "") {
    $errors[] = "Title is required";
  }
  
  if($content == "") {
    $errors[] = "Content is required";
  }

  if ($published_at != "") {
    $date_time = date_create_from_format("Y-m-d H:i:s", $published_at);

    if($date_time === false) {
      $errors[] = "Invalid date, and or time";
    } else {
      $date_errors = date_get_last_errors();

      if($date_errors["warning_count"] > 0) {
        $errors[] = "Invalid time";
      }
    }
  }

  return $errors;
}

?>