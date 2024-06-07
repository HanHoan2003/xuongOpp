<?php

namespace Hp\XuongOop\Commons;

use eftec\bladeone\BladeOne;

class Controller
{
    protected function renderViewClient($view, $data = [])
    {
        $templatePath = __DIR__ . '/../Views/Client';
        $compiledPath = __DIR__ . '/../Views/Complies';
        $blade = new BladeOne($templatePath, $compiledPath);

        //render ra view and truyen bien tu controller ra view

        echo $blade->run($view, $data);
    }

    protected function renderViewAdmin($view, $data = [])
    {
        $templatePath = __DIR__ . '/../Views/Admin';
        $compiledPath = __DIR__ . '/../Views/Complies';
        $blade = new BladeOne($templatePath, $compiledPath);

        //render ra view and truyen bien tu controller ra view

        echo $blade->run($view, $data);
    }
}
