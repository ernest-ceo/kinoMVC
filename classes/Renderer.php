<?php
declare(strict_types=1);

class Renderer
{
    public function render(string $viewName, string $content, array $data = null)
    {
        $options = $data;
        include 'src/Views/'.$viewName.'.php';
    }
}