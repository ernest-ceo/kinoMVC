<?php

class IndexController extends Controller
{
    public function IndexAction()
    {
        $this->renderer->render('Index');
    }
}