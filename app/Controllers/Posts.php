<?php

namespace App\Controllers;

use App\Models\BlogPostModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Posts extends BaseController
{
    public function index()
    {
        $model = model(BlogPostModel::class);

        $data = [
            'posts' => $model->paginate(6),
            'title' => 'All Blogs',
            'pager' => $model->pager
        ];

        return view('templates/header', $data)
            . view('posts/index')
            . view('templates/footer');
    }

    

    public function view($slug = null)
    {
        $model = model(BlogPostModel::class);

        $data['posts'] = $model->getPosts($slug);

        if (empty($data['posts'])) {
            throw new PageNotFoundException('Cannot find the posts item: ' . $slug);
        }

        $data['title'] = $data['posts']['title'];

        return view('templates/header', $data)
            . view('posts/view')
            . view('templates/footer');
    }

    public function create()
    {
        helper('form');

        // Checks whether the form is submitted.
        if (! $this->request->is('post')) {
            // The form is not submitted, so returns the form.
            return view('templates/header', ['title' => 'Create a new post'])
                . view('posts/create')
                . view('templates/footer');
        }

        $post = $this->request->getPost(['title', 'body', 'img_url', 'tags', 'author']);

        // Checks whether the submitted data passed the validation rules.
        if (! $this->validateData($post, [
            'title' => 'required|max_length[255]|min_length[3]',
            'body' => 'required|max_length[50000]|min_length[10]',
            'img_url' => 'required|max_length[5000]|min_length[3]',
            'tags' => 'required|max_length[5000]|min_length[3]',
            'author' => 'required|max_length[5000]|min_length[3]'
        ])) {
            // The validation fails, so returns the form.
            return view('templates/header', ['title' => 'Create a new post'])
                . view('posts/create')
                . view('templates/footer');
        }

        $model = model(BlogPostModel::class);

        $model->save([
            'title' => $post['title'],
            'slug' => url_title($post['title'], '-', true),
            'body' => $post['body'],
            'img_url' => $post['img_url'],
            'tags' => $post['tags'],
            'author' => $post['author']
        ]);

        return view('templates/header', ['title' => 'Create a posts item'])
            . view('posts/success')
            . view('templates/footer');
    }
}