<?php


class Bootstrap
{
    private $request;
    public $controller;

    public function __construct($request)
    {
        $this->request=$request;
        $this->controller = $this->getController();
        return $this->controller;
    }

    private function getController()
    {
        if(isset($this->request['controller']))
        {
            if(class_exists($this->request['controller']))
            {
                $classParents = class_parents($this->request['controller']);
                if(in_array('Controller', $classParents))
                     return $this->request['controller'];
                else
                    die('Podana strona nie istnieje');
            }
        } else {
            die('Podany kontroler nie istnieje');
        }
    }
}