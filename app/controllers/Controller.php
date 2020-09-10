<?php

//namespace app\controllers;

abstract class Controller
{
    public $renderer;
    protected $model;
    protected $errors;
    public $className;
    public $action;
    public $id;
    const DEFAULT_METHOD = 'IndexAction';

    public function __construct($db = null)
    {
        $this->renderer = new Renderer();
        $this->className = $this->getNameOfTheClass();
        $this->action = $this->getAction();
        $this->id = $this->getId();
        $this->run();
    }

    protected function getAction()
    {
        if(isset($_GET['action']) && $_GET['action'] != '' && $_GET['action'] != null)
        {
            $actionName = ($_GET['action']);
            
            if(method_exists($this->className, $actionName))
                return $this->action = $actionName;
            else
                die('404');
        }
        else {
            return self::DEFAULT_METHOD;
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
        if(isset($_POST['id']) && $_POST['id'] != '')
            return $this->id = $_POST['id'];
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