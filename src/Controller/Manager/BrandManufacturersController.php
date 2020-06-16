<?php

declare(strict_types = 1);

namespace App\Controller\Manager;

/**
 * Class BranManufacturersController
 *
 * @property \App\Model\Table\BrandManufacturersTable $BrandManufacturers
 * @package App\Controller\Manager
 */
class BrandManufacturersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $brandManufacturers = $this->BrandManufacturers->find();

        $this->set(compact('brandManufacturers'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $brandManufacturer = $this->BrandManufacturers->newEmptyEntity();

        if ($this->request->is('post')) {
            $brandManufacturer = $this->BrandManufacturers->patchEntity($brandManufacturer, $this->request->getData());

            if ($this->BrandManufacturers->save($brandManufacturer)) {
                $this->Flash->success(__('The data has been saved.'));

                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('The data could not be saved. Please, try again.'));
        }
        $this->set(compact('brandManufacturer'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Bran Manufacturer id.
     *
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $brandManufacturer = $this->BrandManufacturers->get($id);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $brandManufacturer = $this->BrandManufacturers->patchEntity($brandManufacturer, $this->request->getData());

            if ($this->BrandManufacturers->save($brandManufacturer)) {
                $this->Flash->success(__('The data has been saved.'));

                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('The data could not be saved. Please, try again.'));
        }
        $this->set(compact('brandManufacturer'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Bran Manufacturer id.
     *
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $branManufacturer = $this->BrandManufacturers->get($id);

        if ($this->BrandManufacturers->delete($branManufacturer)) {
            $this->Flash->success(__('The data has been deleted.'));
        } else {
            $this->Flash->error(__('The data could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
