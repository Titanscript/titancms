<?php
declare(strict_types=1);

namespace App\Controller\Manager;

/**
 * ArticleCategories Controller
 *
 * @property \App\Model\Table\ArticleCategoriesTable $ArticleCategories
 *
 * @method \App\Model\Entity\ArticleCategory[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ArticleCategoriesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $articleCategories = $this->ArticleCategories->find()->contain(['ParentArticleCategories']);

        $this->set(compact('articleCategories'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $articleCategory = $this->ArticleCategories->newEmptyEntity();
        if ($this->request->is('post')) {
            $articleCategory = $this->ArticleCategories->patchEntity($articleCategory, $this->request->getData());

            if ($this->ArticleCategories->save($articleCategory)) {
                $this->Flash->success(__('บันทึกข้อมูลเรียบร้อย'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('ไม่สามารถบันทึกข้อมูลได้ กรุณาลองใหม่'));
        }

        $parentArticleCategories = $this->ArticleCategories->ParentArticleCategories->find('list');

        $this->set(compact('articleCategory', 'parentArticleCategories'));
    }

    /**
     * Edit method
     *
     * @param  string|null  $id  Article Category id.
     * @param  string       $locale
     *
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     */
    public function edit($id = null, $locale = 'th_TH')
    {
        if ($locale !== 'th_TH') {
            $this->ArticleCategories->setLocale($locale);
        }

        $articleCategory = $this->ArticleCategories->get($id);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $articleCategory = $this->ArticleCategories->patchEntity($articleCategory, $this->request->getData());

            if ($this->ArticleCategories->save($articleCategory)) {
                $this->Flash->success(__('บันทึกข้อมูลเรียบร้อย'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('ไม่สามารถบันทึกข้อมูลได้ กรุณาลองใหม่'));
        }

        $parentArticleCategories = $this->ArticleCategories->ParentArticleCategories->find('list');

        $this->set(compact('articleCategory', 'parentArticleCategories', 'locale'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Article Category id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $articleCategory = $this->ArticleCategories->get($id);

        if ($this->ArticleCategories->delete($articleCategory)) {
            $this->Flash->success(__('ลบข้อมูลเรียบร้อย'));
        } else {
            $this->Flash->error(__('ไม่สามารถลบข้อมูลได้ กรุณาลองใหม่'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
