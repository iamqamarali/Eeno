<?php

namespace Framework\View;

use Framework\View\View;
use Framework\View\Contracts\ViewRenderStrategy;

class PhpRenderStrategy implements ViewRenderStrategy{


    public function render(View $view)
    {
        extract($view->variables());

        ob_start();
        require $view->path() ;

        $view->setContent( ob_get_contents() );
        ob_end_clean();

        return $view->content();   
    }

}