<?php

namespace Eeno\View\Contracts;

use Eeno\View\View;


interface ViewRenderStrategy{

    public function render(View $view);

}