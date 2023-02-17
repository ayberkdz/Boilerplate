<?php

namespace Controllers;
use Core\Controllers;
use \Symfony\Component\HttpFoundation\Request;


class Auth extends Controllers
{
    public function login(Request $request)
    {
        if($request->isMethod('POST')) {
            $this->validator->rule('required', ['name', 'password']);
            if ($this->validator->validate()) {
                $user = auth()->login($this->validator->data());
                if ($user) {
                    header('Location: http://localhost/Core/');
                    return;
                } elseif(!$user) {
                    $this->validator->error('error','Kullanıcı adı veya şifre hatalı');
                }
            }
        }
        return $this->view('auth.login');
    }

    public function register(Request $request)
    {
        if($request->isMethod('POST')) {
            $this->validator->rule('required', ['name', 'password']);
            if ($this->validator->validate()) {

                $data = $this->validator->data();

                if(auth()->exist($data['name'])) {
                    $this->validator->error('error', sprintf('%s daha önceden kapılmış.', $data['name']));
                }
                else {
                    $user = auth()->register($data());
                if ($user) {
                    header('Location: http://localhost/Core/');
                    return;
                } else {
                    $this->validator->error('error','Sorun oldu');
                }
                }

                
            }
        }
        return $this->view('auth.register');
    }

    public function logout()
    {
        auth()->logout();
        header('Location: http://localhost/Core/');
    }
}
?>