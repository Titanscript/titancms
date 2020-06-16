<?php

namespace App\Controller;


use Cake\Datasource\ConnectionManager;

/**
 * Class PagesController
 *
 * @property \Cake\Datasource\RepositoryInterface|null SiteSettings
 * @package App\Controller
 */
class PagesController extends AppController
{
    public function home()
    {
        // just page no code
    }

    public function about()
    {
        // just page no code
    }

    public function contactUs()
    {
        if ($this->request->is('post')) {
            // send email
        }
    }

    public function quotation()
    {
        if ($this->request->is('post')) {
            // send email
        }
    }

    public function eCatalogs()
    {
        $conn      = ConnectionManager::get('default');
        $eCatalogs = $conn->execute(
            "select pdf.id, pdf.title, pdf.path, pdf.alt, pdf.description, pdf.created, image.path as image_cover
                    from medias as pdf
                    inner join link_tables on link_tables.pk_key = pdf.id 
                    inner join medias as image on image.id = link_tables.fk_key
                    where pdf.using_type = 'e_catalog'"
        )->fetchAll('assoc');

        foreach ($eCatalogs as &$catalog) {
            $catalog['link_download'] = 'storage/' . $catalog['path'];
        }

        $this->set('eCatalogs', $eCatalogs);
    }

    public function search()
    {
        $keyword = $this->request->getQuery('w');
    }
}
