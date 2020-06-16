<?php

namespace App\Controller\Manager;

use Cake\Controller\Controller;

class AppController extends Controller
{
    /**
     * @throws \Exception
     */
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');

        $this->loadComponent('Authentication.Authentication');

        $this->viewBuilder()->setLayout('manager');
    }
}