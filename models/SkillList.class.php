<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SkillList
 *
 * @author jaCUBE
 */
class SkillList {

  public $type;
  
  public $skill_list = [];
  
  public function __construct(){
    $this->fetchSkillList();
    $this->prepareSkillType();
  }
  
  private function prepareSkillType(){
    if(!empty($_GET['type'])){
      $this->type = $_GET['type'];
    }else{
      $this->type = 'webdev';
    }
  }
  
  private function skillList(){
    if(LOCALE == 'cs'){
      return ['Webdev' => [], 'ICT' => [], 'Jazyky' => [], 'Ostatní' => []];
    }else{
      return ['Webdev' => [], 'ICT' => [], 'Languages' => [], 'Others' => []];
    }
  }
  
  
  private function fetchSkillList(){
    global $_DB;
    
    $this->skill_list = $this->skillList();
    
    $sql = '
      SELECT s.*
      FROM skill AS s
      WHERE s.locale = "'.LOCALE.'"
        AND s.visible = 1
      ORDER BY s.value DESC';
    
    $STH = $_DB->prepare($sql);
    $STH->setFetchMode(PDO::FETCH_CLASS, 'Skill');
    $STH->execute();
    
    while($skill = $STH->fetch()){ /* @var $skill Skill */
      $this->skill_list[$skill->type][] = $skill;
    }
  }
  
  
  public function countSkill($type){
    return (int) count($this->skill_list[$type]);
  }
  
  
  public function skillTypeUrl($type){
    return URL.'/skills/'.$this->skillTypePlainName($type);
  }
  
  
  public function skillTypePlainName($type){
    return Rychecky::makeCssName($type);
  }
  
  
  public function isSkillTypeSelected($type){
    return $this->type == $this->skillTypePlainName($type);
  }
  
}
