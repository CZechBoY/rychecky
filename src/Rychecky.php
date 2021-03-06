<?php

/**
 * Třída, která obsahuje pár důležitých věcích pro běh webu (např. připojení k databázi)
 * @class Rychecky
 * @author Jakub Rychecký <jakub@rychecky.cz>
 */

namespace Rychecky;

use \PDO as PDO;

class Rychecky
{

    /**
     * Vytváří připojení k databázi.
     * @return \PDO
     */

    public static function connectDatabase(): PDO
    {
        // Údaje z .env
        $dsn = 'mysql:host=' . env('DB_HOST') . ';dbname=' . env('DB_NAME');

        $db = new PDO($dsn, env('DB_USER'), env('DB_PASSWORD'));
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->exec('SET NAMES utf8');

        return $db;
    }


    /**
     * Zobrazuje view pomocí Latte.
     * @param string $name Název view
     * @param array  $data Potřebná data v poli
     */

    public static function view(string $name, array $data): void
    {
        $latte = new \Latte\Engine;
        $latte->setTempDirectory('temp');

        $data['locale'] = Language::getLocale(); // Jazyk pro každý view

        $filepath = ROOT . '/views/' . $name . '.latte';
        $latte->render($filepath, $data);
    }


    /**
     * Poskytuje hodnotu akce z routingu, důležité zejména pro řadič.
     * @return string Hodnota akce
     */

    public static function action(): string
    {
        return preg_replace('/^(\/)/', '', $_SERVER['REQUEST_URI']);
    }


    /**
     * Poskytuje celou adresu (ulice, číslo popisné, PSČ, město).
     * @return string Celá adresa
     */

    public static function fullAddress(): string
    {
        return env('ADDR_STREET') . ' ' . env('ADDR_STREET_NUMBER') . ', ' . env('ADDR_ZIP') . ' ' . env('ADDR_CITY');
    }

}