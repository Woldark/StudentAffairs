<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use app\Libraries\JDF;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
	public function index()
	{
		$categories = Category::get();
		return view('admin.categories', compact("categories"));
	}

	public function show($id)
	{
		$category = Category::where("id", $id)->firstOrFail();
		return view('admin.category', compact("category"));
	}

	public function create()
	{
		return view('admin.category_create');
	}

	public function post(Request $request)
	{
		$name = $request->get('name');
		$type = $request->get('type');

		$jdf = new JDF();

		$category = new Category();
		$category->name = $name;
		$category->type = $type;
		$category->create_date = $jdf->getTimestamp();
		$category->save();

		return redirect('management/categories');
	}

	public function edit($id)
	{
		$category = Category::where("id", $id)->firstOrFail();
		return view('admin.category_edit')->withCategory($category);
	}

	public function save(Request $request)
	{
		$name = $request->get('name');
		$type = $request->get('type');
		$id = $request->get('id');

		$category = Category::where("id", $id)->firstOrFail();
		$category->name = $name;
		$category->type = $type;
		$category->save();

		return redirect('management/categories');
	}

	public function delete($id)
	{
		$category = Category::where("id", $id)->firstOrFail();
		$category->delete();

		$message = "دسته بندی " . $category->title . " پاک شد";
		return redirect('management/categories')->with("message", $message);
	}
}
