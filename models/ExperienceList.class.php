<?php

/**
 * @author Jakub Rychecký <jakub@rychecky.cz>
 * 
 * @class Certificate
 * @brief Stahuje a zpracovává seznam zkušeností.
 */

class ExperienceList {
  
  /**
   * @brief Seznam zkušeností
   * @var Experience $experience_list
   */
  public $experience_list = [];
  
  
  
  
  
  
  
  
  
  
  
  /**
   * @brief Konstruktor, stahuje seznam zkušeností.
   * @return void
   */
  
  public function __construct(){
    $this->fetchExperienceList(); // Stahuje seznam zkušeností
  }
  
  
  
  
  
  /**
   * @brief Stahuje a zpracovává seznam zkušeností.
   * @return void
   */
  
  private function fetchExperienceList(){
    global $_DB;    
    
    $sql = '
      SELECT e.*
      FROM experience AS e
      WHERE e.locale = "'.LOCALE.'"
        AND e.visible = 1
      ORDER BY e.date_start DESC'; // SQL pro stažení seznamu zkušeností
    
    $STH = $_DB->prepare($sql);
    $STH->setFetchMode(PDO::FETCH_CLASS, 'Experience'); // Do objektů zkušeností
    $STH->execute();
    
    while($e = $STH->fetch()){ /* @var $e Experience */ // Procházení jednotlivých zkušeností...
      $this->experience_list[] = $e; // Uložení zkušenosti do pole
    }
  }
  
  
}