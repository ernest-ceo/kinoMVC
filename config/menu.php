<?php
require_once 'session.php';
if(isset($_SESSION['username'])&&isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 0)
{
    $menu = [
        _BASE_URL_."index" => "Strona główna",
        _BASE_URL_."repertoire" => "Repertuar",
        _BASE_URL_."account" => "Konto",
    ];
}
elseif(isset($_SESSION['username'])&&isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1)
{
    $menu = [
        _BASE_URL_."index" => "Strona główna",
        _BASE_URL_."repertoire" => "Repertuar",
        _BASE_URL_."account" => "Konto",
        _BASE_URL_."shows" => "Seanse",
        _BASE_URL_."users" => "Użytkownicy"
    ];
}
elseif(!isset($_SESSION['username']))
{
    $menu = [
        _BASE_URL_."index" => "Strona główna",
        _BASE_URL_."repertoire" => "Repertuar",
        _BASE_URL_."login" => "Zaloguj",
        _BASE_URL_."registration" => "Zarejestruj"
    ];
}