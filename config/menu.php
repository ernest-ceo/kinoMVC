<?php
require_once 'session.php';
if(isset($_SESSION['username'])&&!isset($_SESSION['isAdmin']))
{
    $menu = [
        "index" => "Strona główna",
        "repertoire" => "Repertuar",
        "account" => "Konto",
    ];
}
elseif(isset($_SESSION['username'])&&isset($_SESSION['isAdmin']))
{
    $menu = [
        "index" => "Strona główna",
        "repertoire" => "Repertuar",
        "account" => "Konto",
        "shows" => "Seanse",
        "users" => "Użytkownicy"
    ];
}
elseif(!isset($_SESSION['username']))
{
    $menu = [
        "index" => "Strona główna",
        "repertoire" => "Repertuar",
        "login" => "Zaloguj",
        "registration" => "Zarejestruj"
    ];
}