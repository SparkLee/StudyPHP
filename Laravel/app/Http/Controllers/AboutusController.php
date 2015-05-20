<?php namespace App\Http\Controllers;

class AboutusController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Aboutus Controller
	|--------------------------------------------------------------------------
	|
	| 关于我们单页的控制器
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest');
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('aboutus');
	}

}
