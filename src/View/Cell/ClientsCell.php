<?php
declare(strict_types=1);

namespace App\View\Cell;

use Cake\View\Cell;

/**
 * Clients cell
 */
class ClientsCell extends Cell
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
        $this->loadModel('Clients');
    }

    /**
     * Default display method.
     *
     * @return void
     */
    public function display()
    {
        $clients = $this->Clients->find()->contain('Medias');

        $this->set(compact('clients'));

        $this->set('clients', $clients);
    }
}
