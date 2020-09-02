<?php

class RepertoireController extends Controller
{
    public function IndexAction()
    {
        $this->renderer->render('Repertoire');
    }
}