<?php

class ShowsController extends Controller
{
    public function IndexAction()
    {
        $content = './src/Views/Shows.php';
        $this->renderer->render('Main', $content);
    }
}