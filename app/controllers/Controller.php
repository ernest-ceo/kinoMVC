<?php

class Controller
{
    public static function CreateView($viewName)
    {
        include_once './src/Views/'.$viewName.'.php';
        // var_dump($viewName);
    }

    public function run()
    {
        // $pageNameToShow = $this->getPageNameToShow();
    }
}