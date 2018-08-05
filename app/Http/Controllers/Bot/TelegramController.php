<?php

namespace App\Http\Controllers\Bot;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Telegram\Bot\Laravel\Facades\Telegram;

class TelegramController extends Controller
{
	public function info()
	{
		$response = Telegram::getMe();
		return $response;
	}

	public function set_web_hook()
	{
		$url = 'http://arash-hatami.ir/' . config('telegram.bot_token') . '/webhook';
		Telegram::setWebhook($url);
	}

	public function web_hook(Request $request)
	{
		$update = Telegram::commandsHandler(true);
		return 'ok';
	}
}
