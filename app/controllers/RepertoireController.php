<?php


class RepertoireController extends Controller
{
    const DEFAULT_METHOD = 'showByRange';
    private $options = array();

    public function __construct($db)
    {
        $this->model = new RepertoireModel($db);
        parent::__construct();
    }

    public function IndexAction()
    {
        $this->showByRange();
    }

    public function showByRange($range = 'day')
    {
        $range = $this->getActiveRange();
        $this->options['shows'] = $this->model->getFilmShowsByRange($range);
        $this->renderer->render('Main', 'Repertoire', $this->options);
        unset($this->options);
    }

    private function getActiveRange()
    {
        if(isset($_GET['id']))
        {
            if($_GET['id'] == 'day')
                return $_GET['id'];
            elseif($_GET['id'] == 'week')
                return $_GET['id'];
            elseif($_GET['id'] == 'month')
                return $_GET['id'];
            else
                return 'day';
        }
    }
}