<?php
namespace App\Controllers;

class UserController extends \BaseController {
    public function getIndex() {
        //$users = \UserModel::all();
        //$users = \UserModel::paginate(10);
        $users = \UserModel::simplePaginate(10);
        foreach ($users as $user) {
            echo "<p>{$user['name']}---------------{$user['age']}</p>";
        }
        
        echo $users->links();
        
        $paginator = \Paginator::make($users->toArray(), count($user), 5);
        var_dump($paginator);
    }
    
    public function getTest() {
        echo "Test";
    }
}