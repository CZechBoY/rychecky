<?php

/**
 * Stahuje a zpracovává typy dovedností a jejich počty v databázi.
 * @author Jakub Rychecký <jakub@rychecky.cz>
 * @class SkillListType
 */

class SkillListType
{

    /**
     * Stahuje počet jednotlivých typů dovedností v databázi.
     * @param PDO $db Připojení k databázi (DI)
     * @return integer[] Počet typů dovedností v databázi (typ => počet)
     */

    public static function fetchSkillTypeStats(PDO $db): array
    {
        $skill_stats = self::skillList(); // Seznam typů dovedností pro správné řazení

        $sql = '
      SELECT s.type, COUNT(*) AS count
      FROM skill AS s
      WHERE s.locale = :locale
      GROUP BY s.type'; // SQL dotaz pro spočítání typů dovedností

        $STH = $db->prepare($sql);
        $STH->execute([
            'locale' => Language::getLocale(),
        ]);

        while ($row = $STH->fetch()) { // Procházení stažených řádků...
            $skill_stats[$row['type']] = $row['count']; // Typ dovednosti => počet
        }

        return $skill_stats;
    }

    /**
     * Poskytuje řazený seznam typů dovedností v poli dle jazyka.
     * @return string[] Seznam typů dovedností
     */

    public static function skillList(): array
    {
        if (Language::getLocale() === 'cs') {
            $skill_type_list = ['Webdev', 'ICT', 'Jazyky', 'Ostatní']; // Seřazený český seznam
        } else {
            $skill_type_list = ['Webdev', 'ICT', 'Languages', 'Others']; // Anglický
        }

        return array_combine($skill_type_list, $skill_type_list); // Vytváří klíče shodné s hodnotami
    }
}
