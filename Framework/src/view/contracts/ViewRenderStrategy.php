<?php

namespace Framework\View\Contracts;

use Framework\View\View;


interface ViewRenderStrategy{

    public function render(View $view);

}