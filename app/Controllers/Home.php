<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $model = model(BlogPostModel::class);

        $data = [
            'posts' => $model->paginate(5),
            'title' => 'WELCOME TO MY BLOGGER',
            'pager' => $model->pager
        ];

        return view('templates/header', $data)
            . view('welcome_message.php')
            . view('templates/footer');
    }
}
