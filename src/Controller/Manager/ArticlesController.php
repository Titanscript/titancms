<?php

declare(strict_types = 1);

namespace App\Controller\Manager;

use Cake\Core\Configure;
use Cake\Utility\Hash;
use Josbeir\Filesystem\FilesystemAwareTrait;

/**
 * Class ArticlesController
 *
 * @property \App\Model\Table\ArticlesTable $Articles
 * @package App\Controller\Manager
 */
class ArticlesController extends AppController
{
    use FilesystemAwareTrait;

    /**
     * index method
     */
    public function index()
    {
        $articles   = $this->Articles->find();
        $statusList = ['active' => __('เผยแพร่'), 'inactive' => __('ไม่เผยแพร่')];

        $this->set(compact('articles', 'statusList'));
    }

    /**
     * add method
     *
     * @return \Cake\Http\Response|null
     */
    public function add()
    {
        $article = $this->Articles->newEmptyEntity();

        if ($this->request->is('post')) {
            $article         = $this->Articles->patchEntity($article, $this->request->getData());
            $article->status = 'active';

            if ($this->Articles->save($article)) {
                $attributeHeader = $this->Articles->ArticleAttributeHeaders->newEntity(
                    [
                        'name'       => 'images',
                        'article_id' => $article->id,
                    ]
                );
                $this->Articles->ArticleAttributeHeaders->save($attributeHeader);

                // TODO: implement tags module here

                $this->Flash->success(__('บันทึกข้อมูลเรียบร้อย'));

                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('ไม่สามารถบันทึกข้อมูลได้ กรุณาลองใหม่'));
        }

        $articleCategories = $this->Articles->ArticleCategories->find('list');

        $this->set(compact('article', 'articleCategories'));
    }

    /**
     * edit method
     *
     * @param  null    $id
     *
     * @param  string  $locale
     *
     * @return \Cake\Http\Response|null
     */
    public function edit($id = null, $locale = 'th_TH')
    {
        if ($locale !== 'th_TH') {
            $this->Articles->setLocale($locale);
        }

        $article = $this->Articles->get($id);

        if ($this->request->is(['post', 'put', 'patch'])) {
            $article = $this->Articles->patchEntity($article, $this->request->getData());

            if ($this->Articles->save($article)) {
                // TODO: implement tags module here

                $this->Flash->success(__('บันทึกข้อมูลเรียบร้อย'));

                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('ไม่สามารถบันทึกข้อมูลได้ กรุณาลองใหม่'));
        }

        $articleCategories = $this->Articles->ArticleCategories->find('list');

        $this->set(compact('article', 'articleCategories', 'locale'));
    }

    /**
     * attribute method
     *
     * @param  null  $id
     */
    public function attribute($id = null)
    {
        $article = $this->Articles->get(
            $id,
            ['contain' => ['ArticleAttributeHeaders', 'ArticleAttributeHeaders.ArticleAttributes']]
        );

        $this->set('article', $article);
    }

    /**
     * addAttributeHeader method
     *
     * @param  null  $id
     *
     * @return \Cake\Http\Response|null
     */
    public function addAttributeHeader($id = null)
    {
        $article         = $this->Articles->get(
            $id,
            [
                'contain' => [
                    'ArticleAttributeHeaders',
                    'ArticleAttributeHeaders.ArticleAttributes',
                ],
            ]
        );
        $attributeHeader = $this->Articles->ArticleAttributeHeaders->newEmptyEntity();

        if ($this->request->is('post')) {
            $data            = $this->request->getData();
            $attributeHeader = $this->Articles->ArticleAttributeHeaders->patchEntity($attributeHeader, $data);

            $attributeHeader->article_id = $id;

            if ($this->Articles->ArticleAttributeHeaders->save($attributeHeader)) {
                $this->Flash->success(__('บันทึกข้อมูลเรียบร้อย'));

                return $this->redirect(['action' => 'attribute', $id]);
            }

            $this->Flash->error(__('ไม่สามารถบันทึกข้อมูลได้ กรุณาลองใหม่'));
        }

        $this->set(compact('article', 'attributeHeader'));
    }

    /**
     * editAttributeHeader method
     *
     * @param  null  $id
     * @param  null  $headerId
     *
     * @return \Cake\Http\Response|null
     */
    public function editAttributeHeader($id = null, $headerId = null)
    {
        $article         = $this->Articles->get(
            $id,
            [
                'contain' => [
                    'ArticleAttributeHeaders',
                    'ArticleAttributeHeaders.ArticleAttributes',
                ],
            ]
        );
        $attributeHeader = $this->Articles->ArticleAttributeHeaders->get($headerId);

        if ($this->request->is(['post', 'put', 'patch'])) {
            $data            = $this->request->getData();
            $attributeHeader = $this->Articles->ArticleAttributeHeaders->patchEntity($attributeHeader, $data);

            if ($this->Articles->ArticleAttributeHeaders->save($attributeHeader)) {
                $this->Flash->success(__('บันทึกข้อมูลเรียบร้อย'));

                return $this->redirect(['action' => 'attribute', $id]);
            }

            $this->Flash->error(__('ไม่สามารถบันทึกข้อมูลได้ กรุณาลองใหม่'));
        }

        $this->set(compact('article', 'attributeHeader'));
    }

    /**
     * deletedAttributeHeader method
     *
     * @param  null  $id
     * @param  null  $headerId
     *
     * @return \Cake\Http\Response|null
     */
    public function deleteAttributeHeader($id = null, $headerId = null)
    {
        $this->request->allowMethod(['delete', 'post']);
        $header = $this->Articles->ArticleAttributeHeaders->get($headerId);
        // $header = $this->Articles->ArticleAttributeHeaders->ArticleAttributes->get($headerId);

        if ($this->Articles->ArticleAttributeHeaders->delete($header)) {
            $this->Flash->success(__('ลบข้อมูลเรียบร้อย'));
        } else {
            $this->Flash->error(__('ไม่สามารถลบข้อมูลได้ กรุณาลองใหม่'));
        }

        return $this->redirect(['action' => 'attribute', $id]);
    }

    /**
     * addAttribute method
     *
     * @param  null  $id
     * @param  null  $headerId
     *
     * @return \Cake\Http\Response|null
     */
    public function addAttribute($id = null, $headerId = null)
    {
        $article   = $this->Articles->get($id, ['contain' => ['ArticleAttributeHeaders', 'ArticleAttributeHeaders.ArticleAttributes']]);
        $attribute = $this->Articles->ArticleAttributeHeaders->ArticleAttributes->newEmptyEntity();

        if ($this->request->is('post')) {
            $data = $this->request->getData();

            $attribute                              = $this->Articles->ArticleAttributeHeaders->ArticleAttributes->patchEntity($attribute, $data);
            $attribute->article_attribute_header_id = $headerId;

            if ($this->Articles->ArticleAttributeHeaders->ArticleAttributes->save($attribute)) {
                $this->Flash->success(__('บันทึกข้อมูลเรียบร้อย'));

                return $this->redirect(['action' => 'attribute', $id]);
            }

            $this->Flash->error(__('ไม่สามารถบันทึกข้อมูลได้ กรุณาลองใหม่'));
        }

        $this->set(compact('article', 'attribute'));
    }

    /**
     * editAttribute method
     *
     * @param  null  $id
     * @param  null  $attrId
     *
     * @return \Cake\Http\Response|null
     */
    public function editAttribute($id = null, $attrId = null)
    {
        $article = $this->Articles->get($id, ['contain' => ['ArticleAttributeHeaders', 'ArticleAttributeHeaders.ArticleAttributes']]);

        $attribute = $this->Articles->ArticleAttributeHeaders->ArticleAttributes->get($attrId);

        if ($this->request->is(['post', 'put', 'patch'])) {
            $data      = $this->request->getData();
            $attribute = $this->Articles->ArticleAttributeHeaders->ArticleAttributes->patchEntity($attribute, $data);

            if ($this->Articles->ArticleAttributeHeaders->ArticleAttributes->save($attribute)) {
                $this->Flash->success(__('บันทึกข้อมูลเรียบร้อย'));

                return $this->redirect(['action' => 'attribute', $id]);
            }

            $this->Flash->error(__('ไม่สามารถบันทึกข้อมูลได้ กรุณาลองใหม่'));
        }

        $this->set(compact('article', 'attribute'));
    }

    /**
     * deleteAttribute method
     *
     * @param  null  $id
     * @param  null  $attrId
     *
     * @return \Cake\Http\Response|null
     */
    public function deleteAttribute($id = null, $attrId = null)
    {
        $this->request->allowMethod(['delete', 'post']);
        $attribute = $this->Articles->ArticleAttributeHeaders->ArticleAttributes->get($attrId);

        if ($this->Articles->ArticleAttributeHeaders->ArticleAttributes->delete($attribute)) {
            $this->Flash->success(__('ลบข้อมูลเรียบร้อย'));
        } else {
            $this->Flash->error(__('ไม่สามารถลบข้อมูลได้ กรุณาลองใหม่'));
        }

        return $this->redirect(['action' => 'attribute', $id]);
    }

    /**
     * addAttributeImage method
     *
     * @param  null  $id
     * @param  null  $headerId
     *
     * @return \Cake\Http\Response|null
     * @throws \Josbeir\Filesystem\Exception\FilesystemException
     * @throws \League\Flysystem\FileNotFoundException
     */
    public function addAttributeImage($id = null, $headerId = null)
    {
        $article   = $this->Articles->get($id, ['contain' => ['ArticleAttributeHeaders', 'ArticleAttributeHeaders.ArticleAttributes']]);
        $attribute = $this->Articles->ArticleAttributeHeaders->ArticleAttributes->newEmptyEntity();

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
            $fileEntity->using_type = 'article_image';
            $this->Medias->save($fileEntity);
            // end add media data

            $fullBase  = $this->Utils->urlBase() . Configure::read('App.storageBaseUrl');
            $data      = $this->request->getData();
            $attribute = $this->Articles->ArticleAttributeHeaders->ArticleAttributes->patchEntity($attribute, $data);

            $attribute->article_attribute_header_id = $headerId;
            $attribute->value                       = $fullBase . $fileEntity->getPath();
            $attribute->ref_table                   = 'Medias';
            $attribute->ref_key                     = $fileEntity->id;

            if ($this->Articles->ArticleAttributeHeaders->ArticleAttributes->save($attribute)) {
                $this->Flash->success(__('บันทึกข้อมูลเรียบร้อย'));

                return $this->redirect(['action' => 'attribute', $id]);
            }

            $this->Flash->error(__('ไม่สามารถบันทึกข้อมูลได้ กรุณาลองใหม่'));
        }

        $this->set(compact('article', 'attribute'));
    }

    /**
     * deleteAttributeImage method
     *
     * @param  null  $id
     * @param  null  $attrId
     *
     * @return \Cake\Http\Response|null
     * @throws \League\Flysystem\FileNotFoundException
     */
    public function deleteAttributeImage($id = null, $attrId = null)
    {
        $this->request->allowMethod(['delete', 'post']);
        $this->loadModel('Medias');
        $attr  = $this->Articles->ArticleAttributeHeaders->ArticleAttributes->get($attrId);
        $media = $this->Medias->get($attr->ref_key);

        if (
            $this->Articles->ArticleAttributeHeaders->ArticleAttributes->delete($attr)
            && $this->getFilesystem()->delete($media)
            && $this->Medias->delete($media)
        ) {
            $this->Flash->success(__('ลบข้อมูลเรียบร้อย'));
        } else {
            $this->Flash->error(__('ไม่สามารถลบข้อมูลได้ กรุณาลองใหม่'));
        }

        return $this->redirect(['action' => 'attribute', $id]);
    }

    /**
     * delete method
     *
     * @param  null  $id
     *
     * @return \Cake\Http\Response|null
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['delete', 'post']);
        $article = $this->Articles->get($id);

        if ($this->Articles->delete($article)) {
            $this->Flash->success(__('ลบข้อมูลเรียบร้อย'));
        } else {
            $this->Flash->error(__('ไม่สามารถลบข้อมูลได้ กรุณาลองใหม่'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
