<?php

class IndexController extends Controller
{
    public function IndexAction()
    {
        $content = './src/Views/Index.php';
        $this->renderer->render('Main', $content);
    }
}