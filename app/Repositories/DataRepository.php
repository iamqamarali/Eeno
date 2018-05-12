<?php

namespace App\Repositories;

class DataRepository{

    public function getDesignPatterns()
    {
        return [
            'MVC (Model View Controller)',
            'Facade' ,
            'Chain of responsibilities',
            'Template',
            'Strategy',
            'Dependency Injection'
        ];
    }

    
}