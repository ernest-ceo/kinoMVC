<?php

//namespace app\controllers;

abstract class Controller
{
    public $renderer;
    protected $model;
    protected $errors;
    public $className;
    public $action;
    protected $id;
    protected $id2;
    const DEFAULT_METHOD = 'IndexAction';

    public function __construct($db = null)
    {
        $this->renderer = new Renderer();
        $this->className = $this->getNameOfTheClass();
        $this->action = $this->getAction();
        $this->id = $this->getId();
        $this->id2 = $this->getId2();
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

    protected function getId2()
    {
        if(isset($_GET['id2']) && $_GET['id2'] != '')
            return $this->id2 = $_GET['id2'];
        if(isset($_POST['id2']) && $_POST['id2'] != '')
            return $this->id2 = $_POST['id2'];
        else
            return $this->id2 = null;
    }

    public function run()
    {
        $methodName = $this->action;
        if(!is_null($this->id2) && !is_null($this->id)) {
            $this->$methodName($this->id, $this->id2);
        } elseif(!is_null($this->id)) {
            $this->$methodName($this->id);
        } else {
            $this->$methodName();
        }
    }

    protected function isAdmin()
    {
        if(isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1)
            return true;
        return false;
    }

    protected function isLoggedIn()
    {
        if(isset($_SESSION['username']) && $_SESSION['username'] != '')
            return true;
        return false;
    }

    protected function auth()
    {
        if(!$this->isLoggedIn()) {
            header('location: '._BASE_URL_.'index');
            die();
        }
    }

    protected function adminAuth()
    {
        if(!$this->isAdmin()) {
            header('location: '._BASE_URL_.'index');
            die();
        }
    }
}