<?php

namespace App\Controller;

/**
 * Class BlogsController
 *
 * @property \App\Model\Table\ArticlesTable $Articles
 * @package App\Controller
 */
class BlogsController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();

        $this->loadModel('Articles');
    }

    public function index()
    {
        $blogs = $this->Articles->find()
            ->where(['status' => 'active'])
            ->contain(['ArticleCategories']);

        $blogs = $this->paginate($blogs);

        $this->set(compact('blogs'));
    }

    public function read($slug = null)
    {
        $blog = $this->Articles->find()
            ->where([
                'status' => 'active',
                'slug' => $slug
            ])
            ->contain(['ArticleCategories'])
            ->first();

        $this->set(compact('blog'));
    }

    public function category($slug = null)
    {
        $blogs = $this->Articles->find()
            ->where(['status' => 'active', 'slug' => $slug])
            ->contain(['ArticleCategories']);

        $blogs = $this->paginate($blogs);

        $this->set(compact('blogs'));
    }
}