<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use app\Libraries\JDF;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
	public function index()
	{
		$posts = Post::get();
		return view('admin.posts')->withPosts($posts);
	}

	public function show($id)
	{
		$post = Post::where("id", $id)->firstOrFail();
		return view('admin.post')->withPost($post);
	}

	public function create()
	{
		$categories = Category::get();
		return view('admin.post_create')
			->withCategories($categories);
	}

	public function post(Request $request)
	{
		$title = $request->get('title');
		$body = $request->get('body');
		$user = $request->get('user');
		$tags = $request->get('tags');
		$category = $request->get('category');
		$slug = $request->get('slug');

		$jdf = new JDF();

		$post = new Post();
		$post->user_id = $user;
		$post->category_id = $category;
		$post->title = $title;
		$post->body = $body;
		if ($slug == "")
			$post->slug = str_slug($title, '-', 'fa');
		else
			$post->slug = $slug;
		$post->tags = $tags;
		$post->create_date = $jdf->getTimestamp();

		$tags = explode('-', $tags);
		$tags_id = "";
		foreach ($tags as $tag) {
			$counter = 0;
			$all_tags = Tag::get();
			foreach ($all_tags as $save_tag) {
				if ($save_tag->title == $tag) {
					$tags_id .= $save_tag->id . '-';
					$save_tag->count += 1;
					$save_tag->save();
					$counter++;
				}
			}
			if ($counter == 0) {
				$new = new Tag();
				$new->title = $tag;
				$new->save();
				$tags_id .= $new->id . '-';
			}
		}
		$post->tags_id = rtrim(ltrim($tags_id, '-'), '-');
		$post->save();
		$message = "پست " . $post->title . " ثبت شد";
		return redirect('management/posts')->with("message", $message);
	}

	public function edit($id)
	{
		$post = Post::where("id", $id)->firstOrFail();
		return view('admin.post_edit')->withPost($post);
	}

	public function save(Request $request)
	{
		$id = $request->get('id');
		$title = $request->get('title');
		$body = $request->get('body');

		$post = Post::where("id", $id)->firstOrFail();
		$post->title = $title;
		$post->body = $body;
		$post->slug = str_slug($title, '-', 'fa');
		$post->save();

		return redirect('post/' . $post->slug);
	}

	public function delete($id)
	{
		$post = Post::where("id", $id)->firstOrFail();
		$post->delete();
		$message = "پست " . $post->title . " پاک شد";
		return redirect('management/posts')->with("message", $message);
	}

	public function confirm($id)
	{
		$post = Post::where("id", $id)->firstOrFail();
		$post->confirm = 1;
		$post->save();
		$message = "پست " . $post->title . " تایید شد";
		return redirect('management/posts')->with("message", $message);
	}

	public function confirm_all()
	{
		$posts = Post::where("confirm", 0)->get();
		foreach ($posts as $post) {
			$post->confirm = 1;
			$post->save();
		}
		$message = "تمام پست ها تایید شدند";
		return redirect('management/posts')->with("message", $message);
	}
}
