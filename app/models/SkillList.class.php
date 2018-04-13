<?php

/**
 * Stahuje a zpracovává seznam dovedností.
 * @author Jakub Rychecký <jakub@rychecky.cz>
 * @class SkillList
 */

class SkillList {

	/**
	 * Stahuje seznam dovedností dle typu dovednosti.
	 * @param string $type Typ dovedností
	 * @return Skill[] Dovednosti daného typu
	 */
  
  static function fetchSkillListByType($type){
    $skill_list = []; // Seznam dovedností

    $sql = '
      SELECT s.*
      FROM skill AS s
      WHERE s.type = :type
        AND s.locale = :locale
        AND s.visible = 1
      ORDER BY s.value DESC'; // Stahuje seznam dovedností daného typu
    
    $STH = db()->prepare($sql);
		$STH->bindParam(':locale', Language::getLocale());
    $STH->bindParam(':type', $type);
    $STH->setFetchMode(PDO::FETCH_CLASS, 'Skill');
    $STH->execute();
    
    while($skill = $STH->fetch()){ /* @var $skill Skill */ // Prochází jednotlivé dovednosti...
      $skill_list[] = $skill; // Uloží dovednost do pole
    }

    return $skill_list;
  }
  
}