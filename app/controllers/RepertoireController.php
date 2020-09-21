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

        $shows = $this->model->getFilmShowsByRange($range);
        if(isset($_SESSION['username'])) {
            $welcome = 'Witaj ' . $_SESSION['username'] . '!';
        } else {
            $welcome = 'Witaj!';
        }
        if($_SESSION['banned'] == 1 OR !isset($_SESSION['username'])) {
            $content = 'Repertoire.php';
        } else {
            $content = 'RepertoireLogged.php';
        }

            echo $this->twig->render('Main.php', array(
                'welcome' => $welcome,
                'menu' => $this->menu,
                'url' => _BASE_URL_,
                'content' => $content,
                'shows' => $shows
            ));
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