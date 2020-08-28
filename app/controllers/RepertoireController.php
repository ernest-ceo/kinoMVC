<?php

class RepertoireController extends Controller
{
    public function IndexAction()
    {
        $content = './src/Views/Repertoire.php';
        $this->renderer->render('Main', $content);
    }

    public function getAllFilmShowsAction()
    {

    }
}