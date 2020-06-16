<?php


namespace App\Controller\Manager;

/**
 * Class ProductGroupsController
 *
 * @property \App\Model\Table\ProductGroupsTable $ProductGroups
 * @package App\Controller\Manager
 */
class ProductGroupsController extends AppController
{
    /**
     * index method
     */
    public function index()
    {
        $groups = $this->ProductGroups->find()->where(['status' => 'active']);

        $this->set(compact('groups'));
    }

    /**
     * add method
     *
     * @return \Cake\Http\Response|null
     */
    public function add()
    {
        $group = $this->ProductGroups->newEmptyEntity();

        if ($this->request->is('post')) {
            $group = $this->ProductGroups->patchEntity($group, $this->request->getData());
            $group->status = 'active';

            if ($this->ProductGroups->save($group)) {
                $this->Flash->success(__('The data has been saved.'));

                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('The data could not be saved. Please try again.'));
        }

        $parentProductGroups = $this->ProductGroups->ParentProductGroups->find('list')->where(['status' => 'active']);

        $this->set(compact('group', 'parentProductGroups'));
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
        $group = $this->ProductGroups->get($id);

        if ($this->request->is('post')) {
            $group = $this->ProductGroups->patchEntity($group, $this->request->getData());

            if ($this->ProductGroups->save($group)) {
                $this->Flash->success(__('The data has been saved.'));

                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('The data could not be saved. Please try again.'));
        }

        $parentProductGroups = $this->ProductGroups->ParentProductGroups->find('list')->where(['status' => 'active']);

        $this->set(compact('group', 'parentProductGroups'));
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
        $group = $this->ProductGroups->get($id);
        $group->status = 'deleted';

        if ($this->ProductGroups->save($group)) {
            $this->Flash->success(__('The data has been deleted.'));
        } else {
            $this->Flash->error(__('The data could not be deleted. Please try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}