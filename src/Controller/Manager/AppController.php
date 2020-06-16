<?php

namespace App\Controller\Manager;

use Cake\Controller\Controller;
use Cake\I18n\I18n;

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

        I18n::setLocale('th_TH');
    }
}