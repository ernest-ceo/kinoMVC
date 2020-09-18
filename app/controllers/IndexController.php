<?php

class IndexController extends Controller
{
    public function IndexAction()
    {
        if(isset($_SESSION['username'])) {
            echo $this->twig->render('Main.php', array(
                'welcome' => 'Witaj ' . $_SESSION['username'] . '!',
                'menu' => $this->menu,
                'content' => 'Index.php'
            ));
        } else {
            echo $this->twig->render('Main.php', array(
                'welcome' => 'Witaj!',
                'menu' => $this->menu,
                'url' => _BASE_URL_,
                'content' => 'Index.php'
            ));
        }
    }
}