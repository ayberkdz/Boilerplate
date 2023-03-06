<?php
namespace Controllers;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;

class API
{
    public function posts(Response $response)
    {
        $posts = db('posts')->get();

        $response->setStatusCode(200);
        $response->headers->set('Content-Type', 'application/json');
        $response->setContent($posts);
        $response->send();

        // return redirect(site_url())->with('işlem başarili')->send();
    }
}
?>