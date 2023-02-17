<?php

namespace Core;

use Aura\Session\SessionFactory;
use Models\User;

class Auth
{
    public $segment;
    private static $instance;

    public static function getInstance()
    {
        if(!isset(self::$instance)) {
            self::$instance = new Auth();
        }
        return self::$instance;
    }
    public function __construct()
    {
        $session_factory = new SessionFactory;
        $session = $session_factory->newInstance($_COOKIE);
        
        $this->segment = $session->getSegment('Core\Auth');
    }

    public function login($data)
    {
        $user =  User::where('name', $data['name'])->where('password', $data['password'])->first();
        if ($user) {
            $this->create($user);
            return $user;
        }

        return false;
    }

    public function create($data)
    {
        $this->segment->set('login', true);
        $this->segment->set('name', $data->name);
        $this->segment->set('id', $data->id);
    }

    public function exist($name)
    {
        return User::where('name', $name)->first();
    }

    public function register($data)
    {
        $user = User::create($data);
        if ($user){
            $this->create($user);
            return $user;
        }
    }

    public function logout()
    {
        $this->segment->clear();
    }

    public function isLoggedIn()
    {
        return $this->segment->get('login');
    }

    public function getId()
    {
        return $this->segment->get('id');
    }

    public function getName()
    {
        return $this->segment->get('name');
    }

    public function guard()
    {
        return $this;
    }

    public function check()
    {
        return $this->segment->get('login');
    }

    public function guest()
    {
        return ! $this->segment->get('login');
    }
}
?>