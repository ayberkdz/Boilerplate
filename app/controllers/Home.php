<?php
namespace Controllers;
use Core\Controller;
use Models\Post;
use Symfony\Component\HttpFoundation\Request;

class Home extends Controller
{
    public function index(Request $request)
    {
        if ($request->getMethod() === 'POST') {


            $this->validator->rule('required', ['content']);
            $this->validator->labels([
                'content' => 'içerik'
            ]);

            $upload = upload('image')->onlyImages();

            if($error = $upload->error()){
                $this->validator->error('image', $error);
            }
            
            if ($this->validator->validate()) {

                $small = $upload->rename('avatar')->resize(100)->prefix('small')->store('public/upload');
                $original = $upload->rename('avatar')->store('public/upload');

                $data = $this->validator->data();
                $data['user_id'] = auth()->getId();
                $data['image'] = json_encode([
                'small' => $small->getFile(),
                'original' => $original->getFile()
                ]);

                Post::create($data);
            }
        }
        $posts = Post::all();
        return $this->view('home', compact('posts'));
    }
}
?>