<?php
require_once 'session.php';
if(isset($_SESSION['username'])&&isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 0)
{
    return $menu = array(
        array(
            'url' => _BASE_URL_."index",
            'description' => "Strona główna",
        ),
        array(
            'url' => _BASE_URL_."repertoire",
            'description' => "Repertuar",
        ),
        array(
            'url' => _BASE_URL_."account",
            'description' => "Konto",
        ),
        array(
            'url' => _BASE_URL_."login/logout/1",
            'description' => "Wyloguj"
        )
    );
}
elseif(isset($_SESSION['username'])&&isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1)
{
    return $menu = array(
        array(
            'url' => _BASE_URL_."index",
            'description' => "Strona główna",
        ),
        array(
            'url' => _BASE_URL_."repertoire",
            'description' => "Repertuar",
        ),
        array(
            'url' => _BASE_URL_."account",
            'description' => "Konto",
        ),
        array(
            'url' => _BASE_URL_."shows",
            'description' => "Seanse",
        ),
        array(
            'url' => _BASE_URL_."users",
            'description' => "Użytkownicy",
        ),
        array(
            'url' => _BASE_URL_."login/logout/1",
            'description' => "Wyloguj"
        )
    );
}
elseif(!isset($_SESSION['username']))
{
    return $menu = array(
        array(
            'url' => _BASE_URL_."index",
            'description' => "Strona główna"
        ),
        array(
            'url' => _BASE_URL_."repertoire",
            'description' => "Repertuar",
        ),
        array(
            'url' => _BASE_URL_."login",
            'description' => "Zaloguj",
        ),
        array(
            'url' => _BASE_URL_."registration",
            'description' => "Zarejestruj",
        )
    );
}