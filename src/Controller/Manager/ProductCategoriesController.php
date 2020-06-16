<?php

namespace App\Controller\Manager;

use Cake\Core\Configure;
use Josbeir\Filesystem\FilesystemAwareTrait;

/**
 * Class ProductCategoriesController
 *
 * @property \App\Model\Table\ProductCategoriesTable   $ProductCategories
 * @property \App\Model\Table\LinkTablesTable          $LinkTables
 * @property \App\Model\Table\MediasTable              $Medias
 * @property \App\Controller\Component\UtilsComponent  $Utils
 *
 * @package App\Controller\Manager
 */
class ProductCategoriesController extends AppController
{
    use FilesystemAwareTrait;

    /**
     * initialize method
     *
     * @throws \Exception
     */
    public function initialize(): void
    {
        parent::initialize();

        $this->loadModel('Medias');
        $this->loadModel('LinkTables');
        $this->loadComponent('Utils');
    }

    /**
     * index method
     */
    public function index()
    {
        $categories = $this->ProductCategories->find()
            ->where(['ProductCategories.status !=' => 'deleted'])
            ->contain(['ParentProductCategories']);

        $this->set(compact('categories'));
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
        $category = $this->ProductCategories->newEmptyEntity();

        if ($this->request->is('post')) {
            $data             = $this->request->getData();
            $category         = $this->ProductCategories->patchEntity($category, $data);
            $category->status = 'active';
            $category->slug   = preg_replace('/[^A-Za-z0-9ก-๙\-]/u', '-', str_replace('&', '-and-', $category->name));

            if ($this->ProductCategories->save($category)) {
                if (isset($data['image']) && !$data['image']->getError()) {
                    // add media data
                    $media                  = $this->Medias->newEmptyEntity();
                    $fileEntity             = $this->getFilesystem()->upload(
                        $data['image'],
                        [
                            'formatter' => 'Entity',
                            'data'      => $media,
                        ]
                    );
                    $fileEntity->using_type = 'product_category_image';
                    $this->Medias->save($fileEntity);
                    // end add media data

                    // add link tables
                    $linkTable = $this->LinkTables->newEntity(
                        [
                            'pk_key'   => $fileEntity->id,
                            'pk_table' => 'Medias',
                            'fk_key'   => $category->id,
                            'fk_table' => 'ProductCategories',
                        ]
                    );
                    $this->LinkTables->save($linkTable);
                }

                $this->Flash->success(__('The data has been saved.'));

                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('The data could not be saved. Please try again.'));
        }

        $parentProductCategories = $this->ProductCategories->ParentProductCategories->find('list')->where(
            ['status' => 'active']
        );

        $this->set(compact('category', 'parentProductCategories'));
    }

    /**
     * edit method
     *
     * @param null $id
     *
     * @return \Cake\Http\Response|null
     * @throws \Josbeir\Filesystem\Exception\FilesystemException
     * @throws \League\Flysystem\FileNotFoundException
     */
    public function edit($id = null)
    {
        $category        = $this->ProductCategories->get($id);
        $link            = $this->LinkTables->find()
            ->where(
                [
                    'fk_table' => 'ProductCategories',
                    'pk_table' => 'Medias',
                    'fk_key'   => $category->id,
                ]
            )
            ->first();

        if ($link) {
            $media           = $this->Medias->get($link->pk_key);
            $fullBase        = $this->Utils->urlBase().Configure::read('App.storageBaseUrl');
            $category->image = $fullBase.$media->path;
        }

        if ($this->request->is(['post', 'put', 'patch'])) {
            $data = $this->request->getData();

            $category       = $this->ProductCategories->patchEntity($category, $data);
            $category->slug = preg_replace('/[^A-Za-z0-9ก-๙\-]/u', '-', str_replace('&', '-and-', $category->name));

            if ($this->ProductCategories->save($category)) {
                if (isset($data['image']) && !$data['image']->getError()) {
                    // add media data
                    $media                  = $this->Medias->newEmptyEntity();
                    $fileEntity             = $this->getFilesystem()->upload(
                        $data['image'],
                        [
                            'formatter' => 'Entity',
                            'data'      => $media,
                        ]
                    );
                    $fileEntity->using_type = 'product_category_image';
                    $this->Medias->save($fileEntity);
                    // end add media data

                    // add link tables
                    $linkTable = $this->LinkTables->newEntity(
                        [
                            'pk_key'   => $fileEntity->id,
                            'pk_table' => 'Medias',
                            'fk_key'   => $category->id,
                            'fk_table' => 'ProductCategories',
                        ]
                    );
                    $this->LinkTables->save($linkTable);
                }

                $this->Flash->success(__('The data has been saved.'));

                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('The data could not be saved. Please try again.'));
        }

        $parentProductCategories = $this->ProductCategories->ParentProductCategories->find('list')->where(
            ['status' => 'active']
        );

        $this->set(compact('category', 'parentProductCategories'));
    }

    /**
     * delete method
     *
     * @param null $id
     *
     * @return \Cake\Http\Response|null
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['delete', 'post']);
        $category         = $this->ProductCategories->get($id);
        $category->status = 'deleted';

        if ($this->ProductCategories->save($category)) {
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
        $category = $this->ProductCategories->get($id);
        $link     = $this->LinkTables->find()
            ->where(
                [
                    'fk_table' => 'ProductCategories',
                    'pk_table' => 'Medias',
                    'fk_key'   => $category->id,
                ]
            )
            ->first();
        $media    = $this->Medias->get($link->pk_key);

        if ($this->getFilesystem()->delete($media) && $this->Medias->delete($media)) {
            $this->Flash->success(__('The data has been saved.'));
        } else {
            $this->Flash->error(__('The data could not be saved. Please try again.'));
        }

        return $this->redirect(['action' => 'edit', $id]);
    }
}