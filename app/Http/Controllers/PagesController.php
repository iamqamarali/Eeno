<?php

namespace App\Http\Controllers;

use Framework\Http\Controller;

use Framework\Http\Request;
use Framework\Support\Facade\Response;
use Framework\View\View;
use App\Models\User;
use App\Repositories\DataRepository;

class PagesController extends Controller{

    public function index()
    {   
        $user = new User([
            'name' => 'Qamar Ali',
            'email' => 'qamar.ali9898@gmail.com',
            'phone_no' => '090078601'
        ]);

        $dataRepo = new DataRepository();

        return Response::view('index')
                        ->with('user' , $user)
                        ->with('designPatterns' , $dataRepo->getDesignPatterns() );
    } 

    public function about()
    {
        $user = new User([
            'name' => 'Qamar Ali',
            'email' => 'qamar.ali9898@gmail.com',
            'phone_no' => '090078601'
        ]);
        
        return Response::view('about')
                        ->with('user' , $user);
    }

}