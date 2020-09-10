<?php

//namespace app\controllers;
//use app\controllers\Controller;
//use app\models\RepertoireModel;

class RepertoireController1 extends Controller
{
    private $options = array();
    private $range;
    const DEFAULT_METHOD = 'showByRange';

    public function __construct($db)
    {
        $this->model = new RepertoireModel($db);
        parent::__construct($db);
    }

    public function IndexAction()
    {
        $this->showByRange();
    }

    public function showByRange($range = 'day')
    {
        $this->getActiveRange();
        $this->getOptionsToPass();
        $this->options['shows'] = $this->model->getFilmShowsByRange($this->range);
        $this->renderer->render('Main', 'Repertoire', $this->options);
        unset($this->options);
    }

    private function getActiveRange()
    {
        if(isset($_GET['id']))
        {
            if($_GET['id'] == 'day')
                $this->range = 'day';
            elseif($_GET['id'] == 'week')
                $this->range = 'week';
            elseif($_GET['id'] == 'month')
                $this->range = 'month';
            else
                $this->range = 'day';
        }
    }

    private function getOptionsToPass()
    {
        if(isset($_GET['id']))
        {
            switch($_GET['id'])
            {
                case 'day':
                    $this->options['filter'] = array(
                        'showResult1' => 'repertoire/showByRange/week',
                        'showResult2' => 'repertoire/showByRange/week',
                        'resultRangeName1' => 'Najbliższy tydzień',
                        'resultRangeName2' => 'Najbliższy miesiąc'
                    );
                    break;
                case 'week':
                    $this->options['filter'] = array(
                        'showResult1' => 'repertoire/showByRange/day',
                        'showResult2' => 'repertoire/showByRange/month',
                        'resultRangeName1' => 'Dzisiaj',
                        'resultRangeName2' => 'Najbliższy miesiąc'
                    );
                    break;
                case 'month':
                    $this->options['filter'] = array(
                        'showResult1' => 'repertoire/showByRange/day',
                        'showResult2' => 'repertoire/showByRange/week',
                        'resultRangeName1' => 'Dzisiaj',
                        'resultRangeName2' => 'Najbliższy tydzień'
                    );
                    break;
                default:
                    $this->options['filter'] = array(
                        'showResult1' => 'repertoire/showByRange/week',
                        'showResult2' => 'repertoire/showByRange/week',
                        'resultRangeName1' => 'Najbliższy tydzień',
                        'resultRangeName2' => 'Najbliższy miesiąc'
                    );
                    break;
            }
        } else {
            $this->options['filter'] = array(
                'showResult1' => 'repertoire/showByRange/week',
                'showResult2' => 'repertoire/showByRange/week',
                'resultRangeName1' => 'Najbliższy tydzień',
                'resultRangeName2' => 'Najbliższy miesiąc'
            );
        }
    }
}