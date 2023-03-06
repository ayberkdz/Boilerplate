<?php
namespace Controllers;
use Core\Controller;
use \Symfony\Component\HttpFoundation\Request;

class Auth extends Controller
{
    public function login(Request $request)
    {
        if($request->isMethod('POST')) {
            $this->validator->rule('required', ['name', 'password']);

            if($this->validator->validate()) {
                $user = auth()->login($this->validator->data());

                if($user) {
                    return redirect()->send();
                }
                else {
                    $this->validator->error('error', 'Kullanıcı adı veya şifre hatalıdır.');
                }
            }
        }
        return $this->view('auth.login');
    }

    public function register(Request $request)
    {
        if($request->isMethod('POST')) {
            $this->validator->rule('required', ['name', 'password']);

            if($this->validator->validate()) {
                $data = $this->validator->data();
                if(auth()->exists($data['name'])) {
                    $this->validator->error('error', sprintf('%s kullanıcı adı dolu.', $data['name']));
                }
                else {
                    $user = auth()->register($this->validator->data());
                    if($user) {
                        return redirect()->send();
                    }
                    else {
                        $this->validator->error('error', 'Bir sorun oluştu.');
                    }
                }
            }
        }
        return $this->view('auth.register');
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->send();
    }
}
?>