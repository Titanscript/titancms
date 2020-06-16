<?php

namespace App\Controller\Manager;

use Cake\Datasource\ConnectionManager;
use Josbeir\Filesystem\FilesystemAwareTrait;

/**
 * Class MediasController
 *
 * @property \App\Model\Table\MediasTable $Medias
 * @package App\Controller\Manager
 */
class MediasController extends AppController
{
    use FilesystemAwareTrait;

    /**
     * index method
     */
    public function index()
    {
        $medias = $this->Medias->find();

        $this->set('medias', $medias);
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
        $media = $this->Medias->newEmptyEntity();

        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $fileEntity = $this->getFilesystem()->upload(
                $this->request->getData('image'),
                [
                    'formatter' => 'Entity',
                    'data' => $media
                ]
            );
            $fileEntity = $this->Medias->patchEntity($fileEntity, $data);
            $fileEntity->using_type = 'images';
            if ($this->Medias->save($fileEntity)) {
                $this->Flash->success(__('The data has been saved.'));

                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('The data could not be saved. Please try again.'));
        }

        $this->set('media', $media);
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
        $media = $this->Medias->get($id);

        if ($this->request->is(['post', 'put', 'patch'])) {
            $data = $this->request->getData();
            $media = $this->Medias->patchEntity($media, $data);

            if ($this->Medias->save($media)) {
                $this->Flash->success(__('The data has been saved.'));

                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('The data could not be saved. Please try again.'));
        }

        $this->set('media', $media);
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
        $media = $this->Medias->get($id);

        if ($this->getFilesystem()->delete($media)
            && $this->Medias->delete($media)
        ) {
            $this->Flash->success(__('The data has been deleted.'));
        } else {
            $this->Flash->error(__('The data could not be deleted. Please try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * eCatalogs method
     */
    public function eCatalogs()
    {
        $conn      = ConnectionManager::get('default');
        $eCatalogs = $conn->execute(
            "select pdf.id, pdf.title, pdf.modified, image.path
                    from medias as pdf
                    inner join link_tables on link_tables.pk_key = pdf.id 
                    inner join medias as image on image.id = link_tables.fk_key
                    where pdf.using_type = 'e_catalog'"
        )->fetchAll('assoc');

        $this->set('eCatalogs', $eCatalogs);
    }

    /**
     * eCatalogAdd method
     *
     * @return \Cake\Http\Response|null
     * @throws \Josbeir\Filesystem\Exception\FilesystemException
     * @throws \League\Flysystem\FileNotFoundException
     */
    public function eCatalogAdd()
    {
        $catalog = $this->Medias->newEmptyEntity();

        if ($this->request->is('post')) {
            $conn = ConnectionManager::get('default');
            $conn->begin();

            // save PDF
            $data                   = $this->request->getData();
            $fileEntity             = $this->getFilesystem()->upload(
                $this->request->getData('pdf'),
                [
                    'formatter' => 'Entity',
                    'data'      => $catalog,
                ]
            );
            $fileEntity             = $this->Medias->patchEntity($fileEntity, $data);
            $fileEntity->using_type = 'e_catalog';
            if (!$this->Medias->save($fileEntity)) {
                $this->Flash->error(__('The data could not be saved. Please try again.'));
                $conn->rollback();

                return $this->redirect(['action' => 'eCatalogAdd']);
            }

            // save Image
            $image                   = $this->Medias->newEmptyEntity();
            $imageEntity             = $this->getFilesystem()->upload(
                $this->request->getData('image'),
                [
                    'formatter' => 'Entity',
                    'data'      => $image,
                ]
            );
            $imageEntity->using_type = 'image_e_catalog';
            if (!$this->Medias->save($imageEntity)) {
                $this->Flash->error(__('The data could not be saved. Please try again.'));
                $conn->rollback();

                return $this->redirect(['action' => 'eCatalogAdd']);
            }

            // Link image and PDF
            $this->loadModel('LinkTables');
            $link = $this->LinkTables->newEntity(
                [
                    'pk_key'   => $fileEntity->id,
                    'pk_table' => 'Medias',
                    'fk_key'   => $imageEntity->id,
                    'fk_table' => 'Medias',
                ]
            );
            if ($this->LinkTables->save($link)) {
                $this->Flash->success(__('The data has been saved.'));
                $conn->commit();

                return $this->redirect(['action' => 'eCatalogs']);
            } else {
                $this->Flash->error(__('The data could not be saved. Please try again.'));
                $conn->rollback();

                return $this->redirect(['action' => 'eCatalogAdd']);
            }
        }

        $this->set('catalog', $catalog);
    }

    /**
     * eCatalogEdit method
     *
     * @param null $id
     *
     * @return \Cake\Http\Response|null
     */
    public function eCatalogEdit($id = null)
    {
        $catalog = $this->Medias->get($id);

        if ($this->request->is(['post', 'put', 'patch'])) {
            $catalog = $this->Medias->patchEntity($catalog, $this->request->getData());

            if ($this->Medias->save($catalog)) {
                $this->Flash->success(__('The data has been saved.'));

                return $this->redirect(['action' => 'eCatalogs']);
            }

            $this->Flash->error(__('The data could not be saved. Please try again.'));
        }

        $this->set('catalog', $catalog);
    }

    /**
     * eCatalogDelete method
     *
     * @param null $id
     *
     * @return \Cake\Http\Response|null
     * @throws \League\Flysystem\FileNotFoundException
     */
    public function eCatalogDelete($id = null)
    {
        $this->request->allowMethod(['delete', 'post']);
        $this->loadModel('LinkTables');

        $pdf   = $this->Medias->get($id);
        $link  = $this->LinkTables->find()->where(['pk_key' => $pdf->id]);
        $image = $this->Medias->get($link->fk_key);

        if ($this->getFilesystem()->delete($pdf)
            && $this->getFilesystem()->delete($image)
            && $this->Medias->delete($pdf)
            && $this->Medias->delete($image)
            && $this->LinkTables->delete($link)
        ) {
            $this->Flash->success(__('The data has been deleted.'));
        } else {
            $this->Flash->error(__('The data could not be deleted. Please try again.'));
        }

        return $this->redirect(['action' => 'eCatalogs']);
    }

    /**
     * imageHeaderSliders method
     */
    public function imageHeaderSliders()
    {
        $sliders = $this->Medias->find()
            ->where(['using_type' => 'image_header']);

        $this->set('sliders', $sliders);
    }

    /**
     * imageHeaderSliderAdd method
     *
     * @return \Cake\Http\Response|null
     * @throws \Josbeir\Filesystem\Exception\FilesystemException
     * @throws \League\Flysystem\FileNotFoundException
     */
    public function imageHeaderSliderAdd()
    {
        $slider = $this->Medias->newEmptyEntity();

        if ($this->request->is('post')) {
            $data                   = $this->request->getData();
            $fileEntity             = $this->getFilesystem()->upload(
                $this->request->getData('image'),
                [
                    'formatter' => 'Entity',
                    'data'      => $slider,
                ]
            );
            $fileEntity             = $this->Medias->patchEntity($fileEntity, $data);
            $fileEntity->using_type = 'image_header';

            if ($this->Medias->save($fileEntity)) {
                $this->Flash->success(__('The data has been saved.'));

                return $this->redirect(['action' => 'imageHeaderSliders']);
            }

            $this->Flash->error(__('The data could not be saved. Please try again.'));
        }

        $this->set('slider', $slider);
    }

    /**
     * imageHeaderSliderEdit method
     *
     * @param null $id
     *
     * @return \Cake\Http\Response|null
     */
    public function imageHeaderSliderEdit($id = null)
    {
        $slider = $this->Medias->get($id);

        if ($this->request->is(['post', 'put', 'patch'])) {
            $data   = $this->request->getData();
            $slider = $this->Medias->patchEntity($slider, $data);

            if ($this->Medias->save($slider)) {
                $this->Flash->success(__('The data has been save.'));

                return $this->redirect(['action' => 'imageHeaderSliders']);
            }

            $this->Flash->error(__('The data could not be saved. Please try again.'));
        }

        $this->set('slider', $slider);
    }

    /**
     * imageHeaderSliderDelete method
     *
     * @param null $id
     *
     * @return \Cake\Http\Response|null
     * @throws \League\Flysystem\FileNotFoundException
     */
    public function imageHeaderSliderDelete($id = null)
    {
        $this->request->allowMethod(['delete', 'data']);
        $slide = $this->Medias->get($id);

        if ($this->getFilesystem()->delete($slide) && $this->Medias->delete($slide)) {
            $this->Flash->success(__('The data has been deleted.'));
        } else {
            $this->Flash->error(__('The data could not be deleted. Please try again.'));
        }

        return $this->redirect(['action' => 'imageHeaderSliders']);
    }
}