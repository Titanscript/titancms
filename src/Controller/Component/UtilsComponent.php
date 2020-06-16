<?php
declare(strict_types=1);

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;

/**
 * Utils component
 */
class UtilsComponent extends Component
{
    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    public function _urlBase(){
        return sprintf(
            "%s://%s/",

            $_SERVER('HTTP_HOST')
        );
    }

    public function urlBase() {
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
