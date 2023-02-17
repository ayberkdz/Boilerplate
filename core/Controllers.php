<?php

namespace Core;

class Controllers extends Bootstrap
{
    public function view(string $view, array $data = [])
    {
        return $this->view->show($view, $data);
    }
}
?>