<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('home');
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }

    public function uploadImage()
    {
        helper('form');

        if ($this->request->getMethod() === 'POST') {

            // Login check
            if (!session()->get('isLoggedIn')) {
                return redirect()->to('/login')
                    ->with('error', 'Please login first.');
            }

            $rules = [
                'profile_image' => [
                    'rules' => 'uploaded[profile_image]|is_image[profile_image]|max_size[profile_image,2048]',
                    'errors' => [
                        'uploaded' => 'Please select an image.',
                        'is_image' => 'Only image files are allowed.',
                        'max_size' => 'Image size must be less than 2MB.'
                    ]
                ]
            ];

            if (!$this->validate($rules)) {

                return view('upload_image', [
                    'validation' => $this->validator
                ]);
            }

            $file = $this->request->getFile('profile_image');

            if ($file->isValid() && !$file->hasMoved()) {

                $newName = $file->getRandomName();

                $file->move(FCPATH . 'uploads', $newName);

                $userId = session()->get('id');

                $model = new \App\Models\AdminModel();

                $model->update($userId, [
                    'profile_image' => $newName
                ]);

                return redirect()->to('/home')
                    ->with('success', 'Profile image uploaded successfully.');
            }

            return redirect()->back()
                ->with('error', 'Image upload failed.');
        }

        return view('upload_image');
    }
}
