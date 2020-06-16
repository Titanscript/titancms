<?php
declare(strict_types=1);

namespace App\View\Cell;

use Cake\View\Cell;

/**
 * Blogs cell
 */
class BlogsCell extends Cell
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
        $articles = $this->Articles->find()
            ->where(['status' => 'active'])
            ->contain(['ArticleCategories', 'ArticleAttributeHeaders', 'ArticleAttributeHeaders.ArticleAttributes']);

        $this->set(compact('articles'));
    }
}
