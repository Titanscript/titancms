<?php

namespace App\Controller;

use Cake\I18n\I18n;
use Cake\Utility\Hash;
use Cake\Mailer\Mailer;

/**
 * Class PagesController
 *
 * @property \App\Model\Table\PagesTable $Pages
 * @package App\Controller
 */
class
PagesController extends AppController
{
    /**
     * initialize method
     * @throws \Exception
     */
    public function initialize(): void
    {
        parent::initialize();

        $this->set('menuActive', '');
    }

    /**
     * home method
     */
    public function home()
    {
        // just page no code
        $this->set('menuActive', 'home');
    }

    /**
     * changeLanguage method
     *
     * @param  string  $lang
     *
     * @return \Cake\Http\Response|null
     */
    public function changeLanguage($lang = 'th_TH')
    {
        I18n::setLocale($lang);

        setcookie('locale', $lang, time() + (86400 * 30), "/");

        if (!empty($this->request->getQuery('ref'))) {
            return $this->redirect($this->request->getQuery('ref'));
        } else {
            return $this->redirect('/');
        }
    }

    public function testSendEmail($recever = null)
    {
        if (!is_null($recever)) {
            $mailer = new Mailer('default');
            $mailer->setFrom(['test-send-email@titanscript.com' => 'Test send mail'])
            ->setTo($recever)
            ->setSubject('Test send email')
            ->deliver('Test send email. Do not reply.');
        }
    }
}
