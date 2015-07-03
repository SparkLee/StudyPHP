<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

    public function getIndex() {
        $data_test = array(
                'name' => 'li',
                'age' => 2,
        );
        $rules = array(
                'name' => 'required|min:2',
                'age' => 'required',
                'email' => 'required|email',
        );
        $validator = Validator::make($data_test, $rules);
        if ($validator->fails()) {
            $messages = $validator->message();
            var_dump($messages);
        }
        
        return "Hello World";
    }
    
	public function showWelcome()
	{
		return View::make('hello');
	}

}
