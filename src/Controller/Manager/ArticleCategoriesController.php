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
            $articleCategory->slug = preg_replace('/[^A-Za-z0-9ก-๙\-]/u', '-',str_replace('&', '-and-', $articleCategory->name));

            if ($this->ArticleCategories->save($articleCategory)) {
                $this->Flash->success(__('The data has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The data could not be saved. Please, try again.'));
        }

        $parentArticleCategories = $this->ArticleCategories->ParentArticleCategories->find('list');

        $this->set(compact('articleCategory', 'parentArticleCategories'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Article Category id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $articleCategory = $this->ArticleCategories->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $articleCategory = $this->ArticleCategories->patchEntity($articleCategory, $this->request->getData());
            $articleCategory->slug = preg_replace('/[^A-Za-z0-9ก-๙\-]/u', '-',str_replace('&', '-and-', $articleCategory->name));

            if ($this->ArticleCategories->save($articleCategory)) {
                $this->Flash->success(__('The data has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The data could not be saved. Please, try again.'));
        }

        $parentArticleCategories = $this->ArticleCategories->ParentArticleCategories->find('list');

        $this->set(compact('articleCategory', 'parentArticleCategories'));
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
            $this->Flash->success(__('The data has been deleted.'));
        } else {
            $this->Flash->error(__('The data could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
