<?php
namespace App\Controller\Ajax;

class MediasController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
    }

    /**
     * updateOrderIndex method
     * ajax request
     *
     * @return bolean
     */
    public function updateOrderIndex()
    {
        $respond = false;
        $data    = $this->request->getData();

        if ($this->request->is('post')) {
            $media = $this->Medias->get($data['media_id']);

            $media->order_index = $data['order_index'];

            if ($this->Medias->save($media)) {
                $respond = true;
            }
        }

        $this->set('respond', $respond);
        $this->viewBuilder()->setOption('serialize', ['respond']);
    }
}
