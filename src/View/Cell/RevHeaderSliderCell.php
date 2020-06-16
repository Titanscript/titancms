<?php
declare(strict_types=1);

namespace App\View\Cell;

use Cake\View\Cell;

/**
 * RevHeaderSlider cell
 */
class RevHeaderSliderCell extends Cell
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
        $this->loadModel('Medias');
    }

    /**
     * Default display method.
     *
     * @return void
     */
    public function display()
    {
        $sliders = $this->Medias->find()
            ->where(['using_type' => 'image_header'])
            ->orderAsc('order_index');

        $this->set('sliders', $sliders);
    }
}
