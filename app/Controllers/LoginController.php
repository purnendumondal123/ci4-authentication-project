<?php

namespace App\Controllers;

use App\Controllers\BaseController;
// use CodeIgniter\HTTP\ResponseInterface;
use App\Models\AdminModel;

class LoginController extends BaseController
{

    public function index()
    {
        $data = [];
        helper(['form']);

        if ($this->request->getMethod() == 'POST') {

            $rules = [
                'email' => 'required|min_length[6]|max_length[50]|valid_email',
                'password' => 'required|min_length[8]|max_length[255]',
            ];

            $errors = [
                'email' => [
                    'required' => 'Email must be required',
                    'min_length' => 'Your email is too short',
                    'max_length' => 'Your email exceeds maximum length',
                    'valid_email' => 'Please enter a valid email'
                ],
                'password' => [
                    'required' => 'Password is required',
                    'min_length' => 'Password is too short',
                    'max_length' => 'Password exceeds maximum length'
                ]
            ];

            if (!$this->validate($rules, $errors)) {

                $data['validation'] = $this->validator;
            } else {

                $model = new AdminModel();

                $admin = $model->where('email', $this->request->getVar('email'))->first();

                if (!$admin) {

                    $data['flash_message'] = 'Email not found';
                } elseif ($admin['is_active'] == 0) {

                    $data['flash_message'] = 'Please verify your email first';
                } elseif ($this->verifyMypassword($this->request->getVar('password'), $admin['password'])) {
                    $this->setUserSession($admin);
                    return redirect()->to('/home');
                } else {

                    $data['flash_message'] = 'Invalid Password';
                }
            }
        }

        return view('login', $data);
    }


    public function signup()
    {
        $data = [];
        helper('form');

        if ($this->request->getMethod() === 'POST') {

            $rules = [
                'firstname' => [
                    'rules' => 'required|min_length[3]|max_length[20]',
                    'errors' => [
                        'required' => 'The firstname field is required',
                        'min_length' => 'The firstname field must be at least 3 characters',
                        'max_length' => 'Your input cross maximum length',
                    ]
                ],
                'lastname' => 'required|min_length[3]|max_length[20]',
                'email' => 'required|min_length[8]|max_length[50]|valid_email',
                'password' => 'required|min_length[8]|max_length[50]',
                'conf-password' => [
                    'rules' => 'required|matches[password]',
                    'errors' => [
                        'required' => 'The confirm password field is required.',
                        'matches' => 'Your confirm password does not match'
                    ]
                ]
            ];

            if (! $this->validate($rules)) {

                $data['validation'] = $this->validator;

            } else {

                $model = new AdminModel();

                $email = $this->request->getPost('email');

                $existingUser = $model->where('email', $email)->first();

                $otp = random_int(100000, 999999);

                // Already verified account
                if ($existingUser && $existingUser['is_active'] == 1) {

                    $data['flash_message'] = 'Email already registered. Please login.';
                }

                // Existing account but OTP not verified
                elseif ($existingUser && $existingUser['is_active'] == 0) {

                    $model->update($existingUser['id'], [
                        'otp'        => $otp,
                        'otp_expiry' => date(
                            'Y-m-d H:i:s',
                            strtotime('+5 minutes')
                        )
                    ]);

                    $mail = \Config\Services::email();

                    $mail->setTo($email);
                    $mail->setSubject('Email Verification OTP');

                    $mail->setMessage("
                        <h2>Email Verification</h2>
                        <p>Your new OTP code:</p>
                        <h3>{$otp}</h3>
                        <p>This OTP is valid for 5 minutes.</p>
                    ");

                    if ($mail->send()) {

                        session()->set('verify_email', $email);

                        return redirect()->to('/verify-otp')->with('success','A new OTP has been sent to your email.');
                    }

                    $data['flash_message'] =
                        'Unable to send OTP email.';
                }

                // New user
                else {

                    $newData = [
                        'firstname'  => $this->request->getPost('firstname'),
                        'lastname'   => $this->request->getPost('lastname'),
                        'email'      => $email,
                        'password'   => $this->request->getPost('password'),
                        'otp'        => $otp,
                        'otp_expiry' => date(
                            'Y-m-d H:i:s',
                            strtotime('+5 minutes')
                        ),
                        'is_active'  => 0
                    ];

                    if ($model->save($newData)) {

                        $mail = \Config\Services::email();

                        $mail->setTo($email);
                        $mail->setSubject('Email Verification OTP');

                        $mail->setMessage("
                            <h2>Email Verification</h2>

                            <p>Hello {$newData['firstname']},</p>

                            <p>Your OTP Code:</p>

                            <h3>{$otp}</h3>

                            <p>This OTP is valid for 5 minutes.</p>

                            <p>Thank you.</p>
                        ");

                        if ($mail->send()) {

                            session()->set(
                                'verify_email',
                                $email
                            );

                            return redirect()
                                ->to('/verify-otp')
                                ->with(
                                    'success',
                                    'OTP has been sent to your email.'
                                );
                        }

                        $data['flash_message'] =
                            'Account created but OTP email could not be sent.';
                    } else {

                        $data['flash_message'] =
                            'Unable to create account.';
                    }
                }
            }
        }

        return view('signup', $data);

    }


    public function verifyOtp()
    {
        $data = [];

        $email = session()->get('verify_email');

        if (!$email) {
            return redirect()->to('/signup');
        }

        if ($this->request->getMethod() == 'POST') {

            $otp = $this->request->getPost('otp');

            $model = new AdminModel();

            $user = $model
                ->where('email', $email)
                ->where('otp', $otp)
                ->first();

            if (!$user) {

                $data['error'] = 'Invalid OTP';
            } elseif (strtotime($user['otp_expiry']) < time()) {

                $data['error'] = 'OTP Expired';
            } else {

                $model->update($user['id'], [
                    'is_active'       => 1,
                    'otp'             => null,
                    'otp_expiry'      => null,
                    'activation_date' => date('Y-m-d H:i:s')
                ]);

                session()->remove('verify_email');

                return redirect()->to('/')
                    ->with('success', 'Account Verified Successfully');
            }
        }

        return view('verify_otp', $data);
    }

    private function setUserSession($admin)
    {
        $data = [
            'id' => $admin['id'],
            'firstname' => $admin['firstname'],
            'lastname' => $admin['lastname'],
            'email' => $admin['email'],

            'isLoggedIn' => true,
        ];
        session()->set($data);
        return true;
    }

    private function verifyMypassword($enterpassword, $databasePassword)
    {
        return password_verify($enterpassword, $databasePassword);
    }


    public function dashboard()
    {
        return view('dashboard');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }



    public function forgot_password()
    {
        $data = [];
        helper('form');
        if ($this->request->getMethod() === 'POST') {

            $rules = [
                'email' => [
                    'rules' => 'required|valid_email',
                    'errors' => [
                        'required'    => 'Email field is required',
                        'valid_email' => 'Please enter a valid email address'
                    ]
                ]
            ];

            if (! $this->validate($rules)) {

                $data['validation'] = $this->validator;

            } else {

                $model = new AdminModel();

                $email = $this->request->getPost('email');

                $user = $model->where('email', $email)->first();

                if (! $user) {

                    $data['error_message'] =
                        'No account found with this email address.';

                } else {

                    $token = bin2hex(random_bytes(32));

                    $model->update($user['id'], [
                        'reset_token'        => $token,
                        'reset_token_expiry' => date(
                            'Y-m-d H:i:s',
                            strtotime('+30 minutes')
                        )
                    ]);

                    $resetLink = base_url(
                        'reset-password/' . $token
                    );

                    $mail = \Config\Services::email();

                    $mail->setTo($user['email']);
                    $mail->setSubject('Password Reset Request');

                    $mail->setMessage("
                        <h2>Password Reset</h2>

                        <p>Hello {$user['firstname']},</p>

                        <p>Click the button below to reset your password:</p>

                        <p>
                            <a href='{$resetLink}'>
                                Reset Password
                            </a>
                        </p>

                        <p>
                            This link will expire in 30 minutes.
                        </p>
                    ");

                    if ($mail->send()) {

                        $data['success_message'] =
                            'Password reset link has been sent to your email.';
                    } else {

                        $data['error_message'] =
                            'Unable to send reset email. Please try again.';
                    }
                }
            }
        }
        return view('forgot_password_view', $data);
    }

    public function resetPassword($token = null)
    {
        $data = [];

        $model = new AdminModel();

        $user = $model
            ->where('reset_token', $token)
            ->first();

        if (!$user) {

            return redirect()
                ->to('/forgot_password')
                ->with(
                    'error',
                    'Invalid password reset link.'
                );
        }

        if (
            strtotime($user['reset_token_expiry'])
            < time()
        ) {

            return redirect()
                ->to('/forgot_password')
                ->with(
                    'error',
                    'Password reset link has expired.'
                );
        }

        if ($this->request->getMethod() === 'POST') {

            $rules = [

                'password' => [
                    'rules' =>
                    'required|min_length[8]|max_length[50]',
                    'errors' => [
                        'required' =>
                        'Password field is required',
                        'min_length' =>
                        'Password must be at least 8 characters'
                    ]
                ],

                'confirm_password' => [
                    'rules' =>
                    'required|matches[password]',
                    'errors' => [
                        'required' =>
                        'Confirm Password field is required',
                        'matches' =>
                        'Passwords do not match'
                    ]
                ]
            ];

            if (! $this->validate($rules)) {

                $data['validation'] =
                    $this->validator;

            } else {

                $model->update($user['id'], [

                    'password' =>
                    $this->request->getPost('password'),

                    'reset_token' => null,
                    'reset_token_expiry' => null
                ]);

                return redirect()
                    ->to('/')
                    ->with(
                        'success',
                        'Password changed successfully. Please login.'
                    );
            }
        }

        return view(
            'reset_password_view',
            $data
        );
    }


    public function home()
    {
        return view('template/home');
    }
}
