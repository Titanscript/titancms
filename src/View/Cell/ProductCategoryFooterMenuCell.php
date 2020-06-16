<?php
declare(strict_types=1);

namespace App\View\Cell;

use Cake\Core\Configure;
use Cake\View\Cell;

/**
 * ProductCategoryFooterMenu cell
 */
class ProductCategoryFooterMenuCell extends Cell
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
        $this->loadModel('ProductCategories');
        $this->loadModel('LinkTables');
        $this->loadModel('Medias');
    }

    /**
     * Default display method.
     *
     * @return void
     */
    public function display()
    {
        $categories = $this->ProductCategories->find()->where(['status' => 'active', 'parent_id is null']);

        foreach ($categories as $category) {
            $link            = $this->LinkTables->find()
                ->where(
                    [
                        'fk_table' => 'ProductCategories',
                        'pk_table' => 'Medias',
                        'fk_key'   => $category->id,
                    ]
                )
                ->first();

            if ($link) {
                $media           = $this->Medias->get($link->pk_key);
                $fullBase        = $this->_urlBase().Configure::read('App.storageBaseUrl');
                $category->image = $fullBase.$media->path;
            }
        }

        $this->set(compact('categories'));
    }

    private function _urlBase() {
        $pageURL = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http';
        $pageURL .= "://";
        if ($_SERVER["SERVER_PORT"] != "80") {
            $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"]."/";
        } else {
            $pageURL .= $_SERVER["SERVER_NAME"]."/";
        }
        return $pageURL;
    }
}
