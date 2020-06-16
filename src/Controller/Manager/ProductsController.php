<?php

namespace App\Controller\Manager;

use Cake\Core\Configure;
use Josbeir\Filesystem\FilesystemAwareTrait;

/**
 * Class ProductsController
 *
 * @property \App\Model\Table\ProductsTable           $Products
 * @property \App\Controller\Component\UtilsComponent $Utils
 * @package App\Controller\Manager
 */
class ProductsController extends AppController
{
    use FilesystemAwareTrait;

    /**
     * index method
     */
    public function index()
    {
        $products = $this->Products->find()
            ->where(['Products.status !=' => 'deleted'])
            ->contain(['ProductCategories', 'ProductGroups', 'Brands']);

        $this->set(compact('products'));
    }

    /**
     * add method
     *
     * @return \Cake\Http\Response|null
     */
    public function add()
    {
        $product = $this->Products->newEmptyEntity();

        if ($this->request->is('post')) {
            $product = $this->Products->patchEntity($product, $this->request->getData());

            $product->status = 'active';
            $product->slug   = preg_replace('/[^A-Za-z0-9ก-๙\-]/u', '-', str_replace('&', '-and-', $product->name));

            if ($this->Products->save($product)) {
                // auto create attribute header for images.
                $attributeHeader = $this->Products->ProductAttributeHeaders->newEntity([
                    'name' => 'images',
                    'product_id' => $product->id
                ]);
                $this->Products->ProductAttributeHeaders->save($attributeHeader);
                // end auto create attribute header for images.

                $this->Flash->success(__('The data has been saved.'));

                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('The data could not be saved. Please try again.'));
        }

        $productCategories = $this->Products->ProductCategories->find('list')->where(['status' => 'active']);
        $productGroups     = $this->Products->ProductGroups->find('list')->where(['status' => 'active']);
        $brands            = $this->Products->Brands->find('list');

        $this->set(compact('product', 'productCategories', 'productGroups', 'brands'));
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
        $product = $this->Products->get($id);

        if ($this->request->is(['post'])) {
            $product = $this->Products->patchEntity($product, $this->request->getData());

            $product->slug = preg_replace('/[^A-Za-z0-9ก-๙\-]/u', '-', str_replace('&', '-and-', $product->name));

            if ($this->Products->save($product)) {
                $this->Flash->success(__('The data has been saved.'));

                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('The data could not be saved. Please try again.'));
        }

        $productCategories = $this->Products->ProductCategories->find('list')->where(['status' => 'active']);
        $productGroups     = $this->Products->ProductGroups->find('list')->where(['status' => 'active']);
        $brands            = $this->Products->Brands->find('list');

        $this->set(compact('product', 'productCategories', 'productGroups', 'brands'));
    }

    /**
     * attribute method
     *
     * @param null $id
     */
    public function attribute($id = null)
    {
        $product = $this->Products->get(
            $id, ['contain' => ['ProductAttributeHeaders', 'ProductAttributeHeaders.ProductAttributes']]
        );

        $this->set(compact('product'));
    }

    /**
     * addAttributeHeader method
     *
     * @param null $id
     *
     * @return \Cake\Http\Response|null
     */
    public function addAttributeHeader($id = null)
    {
        $product         = $this->Products->get(
            $id, ['contain' => ['ProductAttributeHeaders', 'ProductAttributeHeaders.ProductAttributes']]
        );
        $attributeHeader = $this->Products->ProductAttributeHeaders->newEmptyEntity();

        if ($this->request->is('post')) {
            $data            = $this->request->getData();
            $attributeHeader = $this->Products->ProductAttributeHeaders->patchEntity($attributeHeader, $data);

            $attributeHeader->product_id = $id;

            if ($this->Products->ProductAttributeHeaders->save($attributeHeader)) {
                $this->Flash->success(__('The data has been saved.'));

                return $this->redirect(['action' => 'attribute', $id]);
            }

            $this->Flash->error(__('The data could not be saved. Please try again.'));
        }

        $this->set(compact('product', 'attributeHeader'));
    }

    /**
     * editAttributeHeader method
     *
     * @param null $id
     * @param null $headerId
     *
     * @return \Cake\Http\Response|null
     */
    public function editAttributeHeader($id = null, $headerId = null)
    {
        $product         = $this->Products->get(
            $id, ['contain' => ['ProductAttributeHeaders', 'ProductAttributeHeaders.ProductAttributes']]
        );
        $attributeHeader = $this->Products->ProductAttributeHeaders->get($headerId);

        if ($this->request->is(['post', 'put', 'patch'])) {
            $data            = $this->request->getData();
            $attributeHeader = $this->Products->ProductAttributeHeaders->patchEntity($attributeHeader, $data);

            if ($this->Products->ProductAttributeHeaders->save($attributeHeader)) {
                $this->Flash->success(__('The data has been saved.'));

                return $this->redirect(['action' => 'attribute', $id]);
            }

            $this->Flash->error(__('The data could not be saved. Please try again.'));
        }

        $this->set(compact('product', 'attributeHeader'));
    }

    /**
     * deleteAttributeHeader method
     *
     * @param null $id
     * @param null $headerId
     *
     * @return \Cake\Http\Response|null
     */
    public function deleteAttributeHeader($id = null, $headerId = null)
    {
        $this->request->allowMethod(['delete', 'post']);
        $header = $this->Products->ProductAttributeHeaders->get($headerId);

        if ($this->Products->ProductAttributeHeaders->delete($header)) {
            $this->Flash->success(__('The data has been deleted.'));
        } else {
            $this->Flash->error(__('The data could not be deleted. Please try again.'));
        }

        return $this->redirect(['action' => 'attribute', $id]);
    }

    /**
     * addAttribute method
     *
     * @param null $id
     * @param null $headerId
     *
     * @return \Cake\Http\Response|null
     */
    public function addAttribute($id = null, $headerId = null)
    {
        $product   = $this->Products->get(
            $id, ['contain' => ['ProductAttributeHeaders', 'ProductAttributeHeaders.ProductAttributes']]
        );
        $attribute = $this->Products->ProductAttributeHeaders->ProductAttributes->newEmptyEntity();

        if ($this->request->is('post')) {
            $data = $this->request->getData();

            $attribute = $this->Products->ProductAttributeHeaders->ProductAttributes->patchEntity($attribute, $data);
            $attribute->product_attribute_header_id = $headerId;

            if ($this->Products->ProductAttributeHeaders->ProductAttributes->save($attribute)) {
                $this->Flash->success(__('The data has been saved.'));

                return $this->redirect(['action' => 'attribute', $id]);
            }

            $this->Flash->error(__('The data could not be saved. Please try again.'));
        }

        $this->set(compact('product', 'attribute'));
    }

    /**
     * editAttribute method
     *
     * @param null $id
     * @param null $attrId
     *
     * @return \Cake\Http\Response|null
     */
    public function editAttribute($id = null, $attrId = null)
    {
        $product   = $this->Products->get(
            $id, ['contain' => ['ProductAttributeHeaders', 'ProductAttributeHeaders.ProductAttributes']]
        );
        $attribute = $this->Products->ProductAttributeHeaders->ProductAttributes->get($attrId);

        if ($this->request->is(['post', 'put', 'patch'])) {
            $data      = $this->request->getData();
            $attribute = $this->Products->ProductAttributeHeaders->ProductAttributes->patchEntity($attribute, $data);

            if ($this->Products->ProductAttributeHeaders->ProductAttributes->save($attribute)) {
                $this->Flash->success(__('The data has been saved.'));

                return $this->redirect(['action' => 'attribute', $id]);
            }

            $this->Flash->error(__('The data could not be saved. Please try again.'));
        }

        $this->set(compact('product', 'attribute'));
    }

    /**
     * deleteAttribute method
     *
     * @param null $id
     * @param null $attrId
     *
     * @return \Cake\Http\Response|null
     */
    public function deleteAttribute($id = null, $attrId = null)
    {
        $this->request->allowMethod(['delete', 'post']);
        $attribute = $this->Products->ProductAttributeHeaders->ProductAttributes->get($attrId);

        if ($this->Products->ProductAttributeHeaders->ProductAttributes->delete($attribute)) {
            $this->Flash->success(__('The data has been deleted.'));
        } else {
            $this->Flash->error(__('The data could not be deleted. Please try again.'));
        }

        return $this->redirect(['action' => 'attribute', $id]);
    }

    /**
     * addAttributeImage method
     *
     * @param null $id
     * @param null $headerId
     *
     * @return \Cake\Http\Response|null
     * @throws \Josbeir\Filesystem\Exception\FilesystemException
     * @throws \League\Flysystem\FileNotFoundException
     */
    public function addAttributeImage($id = null, $headerId = null)
    {
        $product   = $this->Products->get(
            $id, ['contain' => ['ProductAttributeHeaders', 'ProductAttributeHeaders.ProductAttributes']]
        );
        $attribute = $this->Products->ProductAttributeHeaders->ProductAttributes->newEmptyEntity();

        if ($this->request->is('post')) {
            // add media data
            $this->loadModel('Medias');
            $this->loadComponent('Utils');

            $fileEntity             = $this->getFilesystem()->upload(
                $this->request->getData('image'),
                [
                    'formatter' => 'Entity',
                    'data'      => $this->Medias->newEmptyEntity(),
                ]
            );
            $fileEntity->using_type = 'product_image';
            $this->Medias->save($fileEntity);
            // end add media data

            $fullBase  = $this->Utils->urlBase().Configure::read('App.storageBaseUrl');
            $data      = $this->request->getData();
            $attribute = $this->Products->ProductAttributeHeaders->ProductAttributes->patchEntity($attribute, $data);

            $attribute->product_attribute_header_id = $headerId;
            $attribute->value                       = $fullBase.$fileEntity->getPath();
            $attribute->ref_table                   = 'Medias';
            $attribute->ref_key                     = $fileEntity->id;

            if ($this->Products->ProductAttributeHeaders->ProductAttributes->save($attribute)) {
                $this->Flash->success(__('The data has been saved.'));

                return $this->redirect(['action' => 'attribute', $id]);
            }

            $this->Flash->error(__('The data could not be saved. Please try again.'));
        }

        $this->set(compact('product', 'attribute'));
    }

    /**
     * deleteAttributeImage method
     *
     * @param null $id
     * @param null $attrId
     *
     * @return \Cake\Http\Response|null
     * @throws \League\Flysystem\FileNotFoundException
     */
    public function deleteAttributeImage($id = null, $attrId = null)
    {
        $this->request->allowMethod(['delete', 'post']);
        $this->loadModel('Medias');
        $attr  = $this->Products->ProductAttributeHeaders->ProductAttributes->get($attrId);
        $media = $this->Medias->get($attr->ref_key);

        if ($this->Products->ProductAttributeHeaders->ProductAttributes->delete($attr)
            && $this->getFilesystem()->delete($media)
            && $this->Medias->delete($media)
        ) {
            $this->Flash->success(__('The data has been deleted.'));
        } else {
            $this->Flash->error(__('The data could not be deleted. Please try again.'));
        }

        return $this->redirect(['action' => 'attribute', $id]);
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

        $product         = $this->Products->get($id);
        $product->status = 'deleted';

        if ($this->Products->save($product)) {
            $this->Flash->success(__('The data has been deleted.'));
        } else {
            $this->Flash->error(__('The data could not be deleted. Please try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}