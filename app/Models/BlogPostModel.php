<?php namespace App\Models;

use CodeIgniter\Model;

class BlogPostModel extends Model
{
    protected $table = 'posts';
    protected $allowedFields = ['title', 'slug', 'body', 'img_url', 'tags', 'author', 'created_at'];
    
    public function getPosts($slug = false)
    {
        if ($slug === false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }
}
