<?php

namespace App\Http\Controllers;

use Eeno\Http\Controller;

use Eeno\Support\Facade\Response;
use App\Models\User;
use App\Repositories\DataRepository;
use Eeno\Http\Request;

class PagesController extends Controller{

    public function index(Request $request)
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