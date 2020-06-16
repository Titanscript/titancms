<?php

namespace App\Controller\Ajax;

use Cake\Controller\Controller;

/**
 * Class AppController
 *
 * @package App\Controller\Ajax
 */
class AppController extends Controller
{
    /**
     * @throws \Exception
     */
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
    }
}