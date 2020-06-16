<?php

declare(strict_types = 1);

namespace App\View\Cell;

use Cake\ORM\Query;
use Cake\View\Cell;

/**
 * ProductFillter cell
 */
class ProductFilterCell extends Cell
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
        $this->loadModel('Products');
        $this->loadModel('ProductCategories');
        $this->loadModel('Brands');
    }

    /**
     * Default display method.
     *
     * @return void
     */
    public function display()
    {
        $categories = $this->ProductCategories->find();
        $categories->select(['total_products' => $categories->func()->count('Products.id')])
            ->where(['ProductCategories.status' => 'active'])
            ->leftJoinWith('Products')
            ->group(['ProductCategories.id'])
            ->enableAutoFields(true);

        $this->set(compact('categories'));
    }
}
