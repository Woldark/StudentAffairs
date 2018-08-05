<?php

namespace App\Http\Controllers;

use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\TwitterCard;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function coming_soon()
    {
	    OpenGraph::setDescription('برنامه نویس وب ، اندروید');
	    OpenGraph::setTitle('آرش حاتمی');
	    OpenGraph::setUrl('http://arash-hatami.ir');
	    OpenGraph::addProperty('type', 'articles');

	    TwitterCard::setTitle('آرش حاتمی');
	    TwitterCard::setSite('@hatamiarash7');

        return view('coming_soon.index');
    }
}
