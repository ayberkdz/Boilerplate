<?php

namespace Controllers;

use Core\Controllers;
use Carbon\Carbon;
use Illuminate\Database\Capsule\Manager as Capsule;
use Models\Post;
use Models\User;
use Symfony\Component\HttpFoundation\Request;

class Home extends Controllers
{
    public function index(Request $request)
    {
        // if($request->getMethod() === 'POST') {
        //     $this->validator->rule('required', ['username', 'password','apassword'])
        //                     ->rule('equals', 'password', 'apassword');
        //     $this->validator->labels([
        //         'username' => 'Kullanıcı adı',
        //         'password' => 'Parola',
        //         'apassword' => 'Parola (Tekrar)',
        //     ]);
            
        //     if($this->validator->validate()) {
        //         print_r($this->validator->data());
        //     }
        //     else {
        //         print_r($this->validator->errors());
        //     }
        // }

        if ($request->getMethod() === 'POST') {
            $this->validator->rule('required', ['content']);
            $this->validator->labels([
                'content' => 'İçerik'
            ]);
            if($this->validator->validate()) {
                $data = $this->validator->data();
                $data['user_id'] = auth()->getId();
                Post::create($data);
            }
        }
        
        // $posts = Capsule::table('posts')
        //                 ->select('posts.*', 'users.name as user_name')
        //                 ->join('users', 'users.id', '=', 'user_id')
        //                 ->orderBy('posts.id', 'asc')
        //                 ->get();

        $users = User::find(1);
        $posts = $users->posts;
        
        return $this->view('home', compact('posts', 'users'));
    }

    public function dates()
    {
        echo Carbon::parse('2023-02-17 04:36:46')->add(1, 'year')->diffForHumans();
    }
}
?>