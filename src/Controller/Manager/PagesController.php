<?php

namespace App\Controller\Manager;

use Cake\I18n\I18n;

/**
 * Class PagesController
 *
 * @property \App\Model\Table\PagesTable $Pages
 * @package App\Controller\Manager
 */
class PagesController extends AppController
{
    public function dashboard()
    {
        // just page
    }

    /**
     * index method
     */
    public function index()
    {
        $pages      = $this->Pages->find();
        $statusList = ['active' => __('เผยแพร่'), 'inactive' => __('ไม่เผยแพร่')];

        $this->set(compact('pages', 'statusList'));
    }

    /**
     * add method
     *
     * @return \Cake\Http\Response|null
     */
    public function add()
    {
        $page = $this->Pages->newEmptyEntity();

        if ($this->request->is('post')) {
            $page         = $this->Pages->patchEntity($page, $this->request->getData());
            $page->status = 'inactive';

            if ($this->Pages->save($page)) {
                $this->Flash->success(__('The data has been saved.'));

                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('The data could not be saved. Please try again.'));
        }

        $this->set(compact('page'));
    }

    /**
     * edit method
     *
     * @param  null    $id
     * @param  string  $locale
     *
     * @return \Cake\Http\Response|null
     */
    public function edit($id = null, $locale = 'th_TH')
    {
        if ($locale !== 'th_TH') {
            $this->Pages->setLocale($locale);
        }

        $page = $this->Pages->get($id);

        if ($this->request->is(['post', 'put', 'patch'])) {
            $page = $this->Pages->patchEntity($page, $this->request->getData());

            if ($this->Pages->save($page)) {
                $this->Flash->success(__('บันทึกข้อมูลเรียบร้อย'));

                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('ไม่สามารถบันทึกข้อมูลได้กรุณาลองใหม่'));
        }

        $this->set(compact('page', 'locale'));
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
        $page = $this->Pages->get($id);

        if ($this->Pages->delete($page)) {
            $this->Flash->success(__('ลบข้อมูลเรียบร้อย'));
        } else {
            $this->Flash->error(__('ไม่สามารถลบข้อมูลได้ กรุณาลองใหม่'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * attribute method
     *
     * @param  null  $id
     */
    public function attribute($id = null)
    {
        $page = $this->Pages->get($id, ['contain' => ['PageAttributeHeaders', 'PageAttributeHeaders.PageAttributes']]);

        $this->set(compact('page'));
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
        $page            = $this->Pages->get($id, ['contain' => ['PageAttributeHeaders', 'PageAttributeHeaders.PageAttributes']]);
        $attributeHeader = $this->Pages->PageAttributeHeaders->newEmptyEntity();

        if ($this->request->is(['post', 'put', 'patch'])) {
            $data            = $this->request->getData();
            $attributeHeader = $this->Pages->PageAttributeHeaders->patchEntity($attributeHeader, $data);

            $attributeHeader->page_id = $id;
            $attributeHeader->name    = trim($attributeHeader->name);

            if ($this->Pages->PageAttributeHeaders->save($attributeHeader)) {
                $this->Flash->success(__('ข้อมูลบันทึกเรียบร้อย'));

                return $this->redirect(['action' => 'attribute', $id]);
            }

            $this->Flash->error(__('ไม่สามารถบันทึกข้อมูลได้ กรุณาลองใหม่'));
        }

        $this->set(compact('page', 'attributeHeader'));
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
        $page            = $this->Pages->get($id, ['contain' => ['PageAttributeHeaders', 'PageAttributeHeaders.PageAttributes']]);
        $attributeHeader = $this->Pages->PageAttributeHeaders->get($headerId);

        if ($this->request->is(['post', 'put', 'patch'])) {
            $data            = $this->request->getData();
            $data['name']    = trim($data['name']);
            $attributeHeader = $this->Pages->PageAttributeHeaders->patchEntity($attributeHeader, $data);

            if ($this->Pages->PageAttributeHeaders->save($attributeHeader)) {
                $this->Flash->success(__('บันทึกข้อมูลเรียบร้อย'));

                return $this->redirect(['action' => 'attribute', $id]);
            }

            $this->Flash->error(__('ไม่สามารถบันทึกข้อมูลได้ กรุณาลองใหม่'));
        }

        $this->set(compact('page', 'attributeHeader'));
    }

    /**
     * deleteAttributeHeader method
     *
     * @param  null  $id
     * @param  null  $headerId
     *
     * @return \Cake\Http\Response|null
     */
    public function deleteAttributeHeader($id = null, $headerId = null)
    {
        $this->request->allowMethod(['delete', 'post']);
        $header = $this->Pages->PageAttributeHeaders->get($headerId);

        if ($this->Pages->PageAttributeHeaders->delete($header)) {
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
        $page      = $this->Pages->get($id, ['contain' => ['PageAttributeHeaders', 'PageAttributeHeaders.PageAttributes']]);
        $attribute = $this->Pages->PageAttributeHeaders->PageAttributes->newEmptyEntity();

        if ($this->request->is(['post', 'put', 'patch'])) {
            $data         = $this->request->getData();
            $data['name'] = trim($data['name']);
            $attribute    = $this->Pages->PageAttributeHeaders->PageAttributes->patchEntity($attribute, $data);

            $attribute->page_attribute_header_id = $headerId;

            if ($this->Pages->PageAttributeHeaders->PageAttributes->save($attribute)) {
                $this->Flash->success(__('บันทึกข้อมูลเรียบร้อย'));

                return $this->redirect(['action' => 'attribute', $id]);
            }

            $this->Flash->error(__('ไม่สามารถบันทึกข้อมูลได้ กรุณาลองใหม่'));
        }

        $this->set(compact('page', 'attribute'));
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
        $page      = $this->Pages->get($id, ['contain' => ['PageAttributeHeaders', 'PageAttributeHeaders.PageAttributes']]);
        $attribute = $this->Pages->PageAttributeHeaders->PageAttributes->get($attrId);

        if ($this->request->is(['post', 'put', 'patch'])) {
            $data         = $this->request->getData();
            $data['name'] = trim($data['name']);
            $data['value'] = trim($data['value']);
            $attribute    = $this->Pages->PageAttributeHeaders->PageAttributes->patchEntity($attribute, $data);

            if ($this->Pages->PageAttributeHeaders->PageAttributes->save($attribute)) {
                $this->Flash->success(__('บันทึกข้อมูลเรียบร้อย'));

                return $this->redirect(['action' => 'attribute', $id]);
            }

            $this->Flash->error(__('ไม่สามารถบันทึกข้อมูลได้ กรุณาลองใหม่'));
        }

        $this->set(compact('page', 'attribute'));
    }

    public function deleteAttribute($id = null, $attrId = null)
    {
        $this->request->allowMethod(['delete', 'post']);
        $header = $this->Pages->PageAttributeHeaders->PageAttributes->get($attrId);

        if ($this->Pages->PageAttributeHeaders->PageAttributes->delete($header)) {
            $this->Flash->success(__('ลบข้อมูลเรียบร้อย'));
        } else {
            $this->Flash->error(__('ไม่สามารถลบข้อมูลได้ กรุณาลองใหม่'));
        }

        return $this->redirect(['action' => 'attribute', $id]);
    }
}