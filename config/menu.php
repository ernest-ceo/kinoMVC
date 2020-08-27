<?php
require_once 'session.php';
if(isset($_SESSION['username'])&&!isset($_SESSION['isAdmin']))
{
    $menu = [
        "index.php" => "Strona główna",
        "repertuar.php" => "Repertuar",
        "konto.php" => "Konto",
    ];
}
elseif(isset($_SESSION['username'])&&isset($_SESSION['isAdmin']))
{
    $menu = [
        "index.php" => "Strona główna",
        "repertuar.php" => "Repertuar",
        "konto.php" => "Konto",
        "seanse.php" => "Seanse",
        "uzytkownicy.php" => "Użytkownicy"
    ];
}
elseif(!isset($_SESSION['username']))
{
    $menu = [
        "index.php" => "Strona główna",
        "repertuar.php" => "Repertuar",
        "zaloguj.php" => "Zaloguj",
        "zarejestruj.php" => "Zarejestruj"
    ];
}