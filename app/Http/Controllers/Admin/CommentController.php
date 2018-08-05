<?php
/**
 * Created by PhpStorm.
 * User: hatamiarash7
 * Date: 2018-02-11
 * Time: 17:10
 */

namespace app\Http\Controllers\Admin;


use App\Comment;

class CommentController
{
	public function index()
	{
		$comments = Comment::get();
		return view('admin.comments', compact("comments"));
	}

	public function delete($id)
	{
		$comment = Comment::where("id", $id)->firstOrFail();
		$comment->delete();
		$message = "پست " . $comment->name . " پاک شد";
		return redirect('management/comments')->with("message", $message);
	}

	public function confirm($id)
	{
		$comment = Comment::where("id", $id)->firstOrFail();
		$comment->confirm = 1;
		$comment->save();
		$message = "نظر " . $comment->name . " تایید شد";
		return redirect('management/comments')->with("message", $message);
	}

	public function confirm_all()
	{
		$comments = Comment::where("confirm", 0)->get();
		foreach ($comments as $comment) {
			$comment->confirm = 1;
			$comment->save();
		}
		$message = "تمام نظر ها تایید شدند";
		return redirect('management/comments')->with("message", $message);
	}
}