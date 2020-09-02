<?php
declare(strict_types=1);

class Renderer
{
    public function render(string $viewName)
    {
        include 'src/Views/'.$viewName.'.php';
    }
}