<?php


namespace App\Controller\Manager;

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

    }

    public function index()
    {
        $pages = $this->Pages->find();

        $this->set(compact('pages'));
    }

    public function add()
    {
        $page = $this->Pages->newEmptyEntity();

        if ($this->request->is('post')) {
            $page = $this->Pages->patchEntity($page, $this->request->getData());
            $page->status = 'inactive';

            if ($this->Pages->save($page)) {
                $this->Flash->success(__('The data has been saved.'));

                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('The data could not be saved. Please try again.'));
        }

        $this->set(compact('page'));
    }

    public function edit($id = null)
    {
        $page = $this->Pages->get($id);

        if ($this->request->is(['post', 'put', 'patch'])) {
            $page = $this->Pages->patchEntity($page, $this->request->getData());

            if ($this->Pages->save($page)) {
                $this->Flash->success(__('The data has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The could not be saved. Please try again.'));
        }

        $this->set(compact('page'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['delete', 'post']);
        $page = $this->Pages->get($id);

        if ($this->Pages->delete($page)) {
            $this->Flash->success(__('The data has been deleted.'));
        } else {
            $this->Flash->error(__('The data could not be deleted. Please try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}