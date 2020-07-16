<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
//use App\Http\Controllers\Controller;
use App\ {
   Http\Controllers\Controller,
   Repositories\CardRepository,
   Http\Controllers\Traits\Indexable,

   //too bad...
   Myclass\MyClass,

   //or - trait - $this->action  
   Http\Controllers\Traits\MyTrait, 

};

class CardController extends Controller
{
    use Indexable;
    use MyTrait;
    //...and other traits...

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    //protected $repository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(CardRepository $repository)
    {
        //$this->middleware('auth');
        $this->repository = $repository;
        $this->namespace = 'front';

        //too bad...
        //$myclass = new MyClass('too bad');
        //$this->title = $myclass->myMethod();

        //my Provider - myclass
        $getClass = app()->make('myclass');
        $this->title = $getClass->myMethod();

        //or - trait - $this->action
        //$this->action = 'my Trait';
        //$this->title = $this->myMethod();
    }

    /**
     * Show front-home-page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    /*
    public function index(Request $request)
    {
        $cards = $this->repository->getData($request);

        return view('front.index', compact('cards')); //['cards' => $cards]
    }
    */
}
