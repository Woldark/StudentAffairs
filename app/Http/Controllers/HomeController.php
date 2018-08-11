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

    public function main()
    {
	    OpenGraph::setDescription('امور دانشجویی');
	    OpenGraph::setTitle('دانشگاه ملایر');
	    OpenGraph::setUrl('http://arash-hatami.ir');
	    OpenGraph::addProperty('type', 'articles');

	    TwitterCard::setTitle('دانشگاه ملایر');
	    TwitterCard::setSite('@hatamiarash7');

        return view('main.index');
    }
}
