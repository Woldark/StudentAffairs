<?php
/**
 * Created by PhpStorm.
 * User: hatamiarash7
 * Date: 2018-02-11
 * Time: 18:07
 */

namespace app\Http\Composers;


use App\Category;
use App\Post;
use Illuminate\Contracts\View\View;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;

class BlogComposer
{
	public function compose(View $view)
	{
		$hotPosts = Post::where("confirm", 1)->orderBy("like", "desc")->take(5)->get();
		$mostVisitedPosts = Post::where("confirm", 1)->orderBy("seen", "desc")->take(5)->get();
		$newPosts = Post::where("confirm", 1)->orderBy("created_at", "desc")->take(5)->get();
		$categories = Category::orderBy("name")->get();
		OpenGraph::setDescription('برنامه نویس وب ، اندروید');
		OpenGraph::setTitle('آرش حاتمی');
		OpenGraph::setUrl('http://arash-hatami.ir');
		OpenGraph::addProperty('type', 'articles');
		TwitterCard::setTitle('آرش حاتمی');
		TwitterCard::setSite('@hatamiarash7');
		$view
			->with('hotPosts', $hotPosts)
			->with('mostVisitedPosts', $mostVisitedPosts)
			->with('newPosts', $newPosts)
			->with('categories', $categories);
	}
}