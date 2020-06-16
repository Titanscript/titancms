<?php

namespace App\Controller\Manager;

use Cake\Core\Configure;
use Josbeir\Filesystem\FilesystemAwareTrait;

/**
 * Class PartnersController
 *
 * @property \App\Model\Table\PartnersTable           $Partners
 * @property \App\Controller\Component\UtilsComponent $Utils
 * @package App\Controller\Manager
 */
class PartnersController extends AppController
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
        $partners = $this->Partners->find()->contain('Medias');

        $this->set(compact('partners'));
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
        $partner = $this->Partners->newEmptyEntity();

        if ($this->request->is('post')) {
            // add media data
            $media                  = $this->Partners->Medias->newEmptyEntity();
            $fileEntity             = $this->getFilesystem()->upload(
                $this->request->getData('image'),
                [
                    'formatter' => 'Entity',
                    'data'      => $media,
                ]
            );
            $fileEntity->using_type = 'client_image';
            $this->Partners->Medias->save($fileEntity);
            // end add media data

            // save client
            $partner            = $this->Partners->patchEntity($partner, $this->request->getData());
            $partner->media_id  = $fileEntity->id;

            if ($this->Partners->save($partner)) {
                $this->Flash->success(__('The data has been saved.'));

                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('The data could not be saved. Please try again.'));
        }

        $this->set(compact('partner'));
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
        $partner = $this->Partners->get($id);

        if ($this->request->is(['post', 'put', 'patch'])) {
            $partner = $this->Partners->patchEntity($partner, $this->request->getData());

            if ($this->Partners->save($partner)) {
                $this->Flash->success(__('The data has been saved.'));

                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('The data could not be saved. Please try again.'));
        }

        $this->set(compact('partner'));
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
        $this->request->allowMethod(['deleted' => 'post']);
        $partner = $this->Partners->get($id);
        $media   = $this->Partners->Medias->get($partner->media_id);

        if ($this->Partners->delete($partner)
            && $this->getFilesystem()->delete($media)
            && $this->Partners->Medias->delete($media)
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
        $partner            = $this->Partners->get($id);
        $media              = $this->Partners->Medias->get($partner->media_id);

        if ($this->Partners->save($partner)
            && $this->getFilesystem()->delete($media)
            && $this->Partners->Medias->delete($media)
        ) {
            $this->Flash->success(__('The data has been saved.'));
        } else {
            $this->Flash->error(__('The data could not be saved. Please try again.'));
        }

        return $this->redirect(['action' => 'edit', $id]);
    }
}