<?php

abstract class Controller
{
    public $renderer;
    public $db;
    public $className;
    public $action;
    public $id;

    public function __construct($db)
    {
        $this->renderer = new Renderer();
        $this->db = $db;
        $this->className = $this->getNameOfTheClass();
        $this->action = $this->getAction();
        $this->id = $this->getId();
        $this->run();
    }

    protected function getAction()
    {
        if(isset($_GET['action']) && $_GET['action'] != '' && $_GET['action'] != null)
        {
            $actionName = ucfirst($_GET['action']).'Action';
            
            if(method_exists($this->className, $actionName))
                return $this->action = $actionName;
            else
                die('404');
        } else {
            return $this->action = 'IndexAction';
        }
    }

    public function getNameOfTheClass()
    {
        return static::class;
    }

    protected function getId()
    {
        if(isset($_GET['id']) && $_GET['id'] != '')
            return $this->id = $_GET['id'];
        else
            return $this->id = null;
    }

    public function run()
    {
        $methodName = $this->action;
        if(!is_null($this->id))
            $this->$methodName($this->id);
        else
            $this->$methodName();
    }
}