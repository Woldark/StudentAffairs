<?php

namespace App\Http\Controllers;

use App\Image;
use App\Post;
use App\Quote;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;

class BlogController extends Controller
{
	public function index()
	{
		$posts = Post::where("confirm", 1)->paginate(10);

		$quote = Quote::inRandomOrder()->first();

		OpenGraph::setDescription('برنامه نویس وب ، اندروید');
		OpenGraph::setTitle('آرش حاتمی');
		OpenGraph::setUrl('http://arash-hatami.ir');
		OpenGraph::addProperty('type', 'articles');
		TwitterCard::setTitle('آرش حاتمی');
		TwitterCard::setSite('@hatamiarash7');

		return view('blog.index', compact("posts", "quote"));
	}

	public function gallery()
	{
		$images = Image::get();
		return view('blog.gallery', compact("images"));
	}
}
