<?php
/**
 * Created by PhpStorm.
 * User: hatamiarash7
 * Date: 2018-02-11
 * Time: 17:10
 */

namespace app\Http\Controllers\Admin;


use app\Libraries\JDF;
use App\Quote;
use Illuminate\Http\Request;

class QuoteController
{
	public function index()
	{
		$quotes = Quote::get();
		return view('admin.quotes', compact("quotes"));
	}

	public function create()
	{
		return view('admin.quote_create');
	}

	public function post(Request $request)
	{
		$body = $request->get('body');
		$author = $request->get('author');

		$jdf = new JDF();

		$quote = new Quote();
		$quote->quote = '" ' . $body . ' "';
		$quote->author = $author;
		$quote->create_date = $jdf->getTimestamp();
		$quote->save();

		$message = "نقل قول " . $author . " ثبت شد";
		return redirect('management/quotes')->with("message", $message);
	}

	public function delete($id)
	{
		$quote = Quote::where("id", $id)->first();
		$quote->delete();
		$message = "نقل قول " . $quote->author . " پاک شد";
		return redirect('management/quotes')->with("message", $message);
	}

    public function edit($id)
    {
        $qoute = Quote::where("id", $id)->firstOrFail();
        return view('admin.quote_edit')->withQoute($qoute);
    }
}