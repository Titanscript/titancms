<?php

namespace App\Controller\Manager;

use Cake\Core\Configure;
use Josbeir\Filesystem\FilesystemAwareTrait;

/**
 * Class ClientsController
 *
 * @property \App\Model\Table\ClientsTable            $Clients
 * @property \App\Model\Table\MediasTable             $Medias
 * @property \App\Controller\Component\UtilsComponent $Utils
 * @package App\Controller\Manager
 */
class ClientsController extends AppController
{
    use FilesystemAwareTrait;

    /**
     * @throws \Exception
     */
    public function initialize(): void
    {
        parent::initialize();

        $this->loadModel('Medias');
        $this->loadComponent('Utils');
    }

    public function index()
    {
        $clients = $this->Clients->find()->contain('Medias');

        $this->set(compact('clients'));
    }

    /**
     * add method
     *
     * @return \Cake\Http\Response|null
     * @throws \Josbeir\Filesystem\Exception\FilesystemException
     * @throws \League\Flysystem\FileNotFoundException
     */
    public function add()
    {
        $client = $this->Clients->newEmptyEntity();

        if ($this->request->is('post')) {
            // add media data
            $media                  = $this->Medias->newEmptyEntity();
            $fileEntity             = $this->getFilesystem()->upload(
                $this->request->getData('image'),
                [
                    'formatter' => 'Entity',
                    'data'      => $media,
                ]
            );
            $fileEntity->using_type = 'client_image';
            $this->Medias->save($fileEntity);
            // end add media data

            // save client
            $client            = $this->Clients->patchEntity($client, $this->request->getData());
            $client->media_id  = $fileEntity->id;

            if ($this->Clients->save($client)) {
                $this->Flash->success(__('The data has been saved.'));

                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('The data could not be saved. Please try again.'));
        }

        $this->set(compact('client'));
    }

    /**
     * edit method
     *
     * @param null $id
     *
     * @return \Cake\Http\Response|null
     */
    public function edit($id = null)
    {
        $client = $this->Clients->get($id);

        if ($this->request->is(['post', 'put', 'patch'])) {
            $client = $this->Clients->patchEntity($client, $this->request->getData());

            if ($this->Clients->save($client)) {
                $this->Flash->success(__('The data has been saved.'));

                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('The data could not be saved. Please try again.'));
        }

        $this->set(compact('client'));
    }

    /**
     * delete method
     *
     * @param null $id
     *
     * @return \Cake\Http\Response|null
     * @throws \League\Flysystem\FileNotFoundException
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['delete', 'post']);
        $client = $this->Clients->get($id);
        $media  = $this->Medias->get($client->media_id);

        if ($this->Clients->delete($client)
            && $this->getFilesystem()->delete($media)
            && $this->Medias->delete($media)
        ) {
            $this->Flash->success(__('The data has been deleted.'));
        } else {
            $this->Flash->error(__('The data could not be deleted. Please try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * deleteImage method
     *
     * @param null $id
     *
     * @return \Cake\Http\Response|null
     * @throws \League\Flysystem\FileNotFoundException
     */
    public function deleteImage($id = null)
    {
        $this->request->allowMethod(['deleted', 'post']);
        $client            = $this->Clients->get($id);
        $media             = $this->Medias->get($client->media_id);

        if ($this->Clients->save($client)
            && $this->getFilesystem()->delete($media)
            && $this->Medias->delete($media)
        ) {
            $this->Flash->success(__('The data has been saved.'));
        } else {
            $this->Flash->error(__('The data could not be saved. Please try again.'));
        }

        return $this->redirect(['action' => 'edit', $id]);
    }
}