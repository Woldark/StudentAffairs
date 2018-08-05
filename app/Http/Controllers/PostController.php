<?php

namespace App\Http\Controllers;

use App\Post;
use App\Quote;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\TwitterCard;

class PostController extends Controller
{
	public function index()
	{
		$posts = Post::where("confirm", 1)->get();

		$quote = Quote::inRandomOrder()->first();

		OpenGraph::setDescription('برنامه نویس وب ، اندروید');
		OpenGraph::setTitle('آرش حاتمی');
		OpenGraph::setUrl('http://arash-hatami.ir');
		OpenGraph::addProperty('type', 'articles');
		TwitterCard::setTitle('آرش حاتمی');
		TwitterCard::setSite('@hatamiarash7');

		return view('blog.index', compact("posts", "quote"));
	}

	public function show($slug)
	{
		$post = Post::where("slug", $slug)->firstOrFail();
		$post->seen = $post->seen + 1;
		$post->save();

		$quote = Quote::inRandomOrder()->first();

		SEOMeta::setTitle($post->title);
		OpenGraph::setDescription('برنامه نویس وب ، اندروید');
		OpenGraph::setTitle('آرش حاتمی');
		OpenGraph::setUrl('http://arash-hatami.ir');
		OpenGraph::addProperty('type', 'articles');
		TwitterCard::setTitle('آرش حاتمی');
		TwitterCard::setSite('@hatamiarash7');

		return view('blog.post', compact("post", "quote"));
	}
}
