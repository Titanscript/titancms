<?php
declare(strict_types=1);

namespace App\View\Cell;

use Cake\Core\Configure;
use Cake\View\Cell;

/**
 * BrandsFooterMenu cell
 */
class BrandsFooterMenuCell extends Cell
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
        $this->loadModel('Brands');
    }

    /**
     * Default display method.
     *
     * @return void
     */
    public function display()
    {
        $brands = $this->Brands->find();

        $this->set(compact('brands'));
    }
}
