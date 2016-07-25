<?php

use App\Order;
use App\Article;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
	$orders 	= Order::orderBy('created_at', 'desc')->get();
	$articles 	= Article::orderBy('article_name', 'asc')->get();
	
    return view('orders', [
		'orders' 	=> $orders,
		'articles' 	=> $articles
	  ]);
});

/**
* Add new order
*/
Route::post('/order', function (Request $request) {
  $validator = Validator::make($request->all(), [
		'order_time' => 'required|date_format:H:i',
		'payment_cash' => 'boolean',
		//'customer_name ' => 'required',
  ]);

  if ($validator->fails()) {
    return redirect('/')
      ->withInput()
      ->withErrors($validator);
  }

  $order = new Order;
  $order->order_date 		= $request->order_date;
  $order->order_time 		= $request->order_time;
  $order->customer_name 	= $request->customer_name;
  $order->article_amount 	= $request->article_amount;
  $order->article_id 		= $request->article_id;
  $order->payment_cash 		= (int) $request->payment_cash;
  $order->save();

  return redirect('/');
});