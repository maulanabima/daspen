<?php

namespace App\Controllers;
use App\Models\UserModel;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\HTTP\RedirectResponse;
use Psr\Log\LoggerInterface;

class Auth extends BaseController
{
    public function viewRegister(): string
    {
        helper(['form']);
        $data = [
            'title' => 'Register'
        ];
        return view('pages/auth/register', $data);
    }

    public function register()
    {
        helper(['form']);

        $rules = [
        'name'          => 'required|min_length[3]|max_length[20]',
        'email'         => 'required|min_length[6]|max_length[50]|valid_email|is_unique[users.email]',
        'password'      => 'required|min_length[6]|max_length[200]',
        'confpassword'  => 'matches[password]',
        ];
        
        if($this->validate($rules))
        {
            $model = new UserModel();
            $data = [
                'name' => $this->request->getVar('name'),
                'email'=> $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
            ];
            $model->save($data);
            return redirect()->to('/login');
            }else{
                $data['validation'] = $this->validator;
                return view('pages/auth/register', $data);
        }
    }

    public function viewLogin(): string
    {
        $data = [
            'title' => 'Login'
        ];
        return view('pages/auth/login', $data);
    }

    public function login()
    {
    helper(['form']);
    $session    = session();
    $model      = new UserModel();
    $email      = $this->request->getVar('email');
    $password   = $this->request->getVar('password');
    $data = $model->where('email', $email)->first();
    if($data){
        $pass = $data['password'];
        $verify_pass = password_verify($password, $pass);
        if($verify_pass){
            $ses_data = [
                'id'            => $data['id'],
                'name'          => $data['name'],
                'email'         => $data['email'],
                'logged_in'     => TRUE
            ];
            $session->set($ses_data);
            return redirect()->to('/dashboard');
        }else{
            $session->setFlashdata('msg', 'Wrong Password');
            return redirect()->to('/login');
        }
    }else{
        $session->setFlashdata('msg', 'Email not Found');
        return redirect()->to('/login');
    }
}
}
 