<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class LoginController extends Controller
{


    public function index()
    {
        // Display the login view
        return view('login');
    }

    public function login()
    {
        $request = \Config\Services::request();

        // Get the submitted form data
        $username = $request->getVar('username');
        $password = $request->getVar('password');


        // Validate the form data
        $validationRules = [
            'username' => 'required',
            'password' => 'required'
        ];

        if (!$this->validate($validationRules)) {
            // Validation failed, redirect back to the login page with error messages
            return $this->response->setStatusCode(401, 'Unauthorized');
        }

        // Validate the user credentials
        $userModel = new UserModel();
        $user = $userModel->where('username', $username)->first();

        if ($user && password_verify($password, $user['password'])) {
           // Return success response with HTTP status code 200
            return $this->response->setStatusCode(200, 'Success');
        } else {
            // Return error response with HTTP status code 401
            return $this->response->setStatusCode(401, 'Unauthorized');
        }

    }

    public function register()
    {
        // Get the submitted form data
        //$username = $this->request->getPost('username');
        //$password = $this->request->getPost('password');

        // Hash the password
        echo $hashedPassword = password_hash("admin", PASSWORD_DEFAULT);

        // Create a new user record in the database
        // $userModel = new UserModel();
        // $userModel->insert([
        //     'username' => $username,
        //     'password' => $hashedPassword,
        //     'created_at' => Time::now(),
        //     'updated_at' => Time::now()
        // ]);

        // Handle the registration success
        // ...
    }
}
