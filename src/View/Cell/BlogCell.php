<?php
declare(strict_types=1);

namespace App\View\Cell;

use Cake\Utility\Hash;
use Cake\View\Cell;

/**
 * Blog cell
 */
class BlogCell extends Cell
{
    /**
     * List of valid options that can be passed into this
     * cell's constructor.
     *
     * @var array
     */
    protected $_validCellOptions = [];

    /**
     * Initialization logic run at the end of object construction.
     *
     * @return void
     */
    public function initialize(): void
    {
        $this->loadModel('Articles');
    }

    /**
     * Default display method.
     *
     * @return void
     */
    public function display()
    {
        $rawArticles = $this->Articles->find()
            ->where(['status' => 'active'])
            ->order(['Articles.created' => 'desc'])
            ->contain(['ArticleCategories', 'ArticleAttributeHeaders', 'ArticleAttributeHeaders.ArticleAttributes'])
            ->limit(3);

        $articles = [];

        // image_1 for image article
        $reg = 'article_attribute_headers.0[name=images].article_attributes.0[name=image_1].value';

        foreach ($rawArticles as $article) {
            $result = Hash::check($article->toArray(), $reg);
            if ($result) {
                $imageUrl = Hash::extract($article->toArray(), $reg)[0];
            } else {
                $imageUrl = 'https://via.placeholder.com/';
            }
            $data = [
                'title'            => $article->title,
                'slug'             => $article->slug,
                'image_url' => $imageUrl,
                'created'          => $article->createdm,
            ];

            array_push($articles, $data);
        }

        $this->set(compact('articles'));
    }
}
