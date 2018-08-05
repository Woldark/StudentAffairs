<?php

namespace App\Http\Controllers;

use App\Comment;
use app\Libraries\JDF;
use Illuminate\Http\Request;

class CommentController extends Controller
{
	public function create(Request $request)
	{
		$post_id = $request->get('post_id');
		$name = $request->get('name');
		$email = $request->get('email');
		$website = $request->get('website');
		$body = $request->get('body');

		$jdf = new JDF();

		$comment = new Comment();
		$comment->post_id = $post_id;
		$comment->name = $name;
		$comment->email = $email;
		$comment->website = $website;
		$comment->body = $body;
		$comment->create_date = $jdf->getTimestamp();
		$comment->save();

		$message = "با تشکر ، نظر شما ثبت شد و پس از تایید نشان داده خواهد شد";
		return back()->with("message", $message);
	}
}
