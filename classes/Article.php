<?php

class Article {

  /**
   * Unique identifier
   * @var integar
   */

  public $id;

    /**
   * The article title
   * @var string
   */
  public $title;

  /**
   * Article content
   * @var string
   */
  public $content;

  /**
   * Article publish date
   * @var string
   */
  public $published_at;

  /**
   * Get all the articles
   * 
   * @param object $conn Connection to the database
   * 
   * @return array An associative array of all the article records
   */
  
  public static function getAll ($conn) {
    $sql = "SELECT * FROM article ORDER BY published_at;";

    $results = $conn->query($sql);


    return $results->fetchAll(PDO::FETCH_ASSOC);
  }

/**
 * get article record based one id
 * 
 * @param object $conn Connection to the datebase
 * @param object integer $id the article ID
 * @param string $columns optionial list of columns for the select, defaults to *
 * 
 * @return mixed an object of this class, or null if not found
 */


  public static function getByID ($conn, $id, $columns = "*") {


  $sql = "SELECT $columns FROM article WHERE id = :id";

  $stmt = $conn->prepare($sql);

 
  $stmt->bindValue(":id", $id, PDO::PARAM_INT);

  $stmt->setFetchMode(PDO::FETCH_CLASS, "Article");

    if ($stmt->execute()) {
      return $stmt->fetch();
    }

  }
  }
