<?php

namespace App\Controller\Manager;

/**
 * Class BrandsController
 *
 * @property \App\Model\Table\BrandsTable $Brands
 * @package App\Controller\Manager
 */
class BrandsController extends AppController
{
    /**
     * index method
     */
    public function index()
    {
        $brands = $this->Brands->find();

        $this->set(compact('brands'));
    }

    /**
     * add method
     *
     * @return \Cake\Http\Response|null
     */
    public function add()
    {
        $brand = $this->Brands->newEmptyEntity();

        if ($this->request->is('post')) {
            $brand = $this->Brands->patchEntity($brand, $this->request->getData());

            if ($this->Brands->save($brand)) {
                $this->Flash->success(__('The data has been saved.'));

                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('The data could not be saved. Please try again.'));
        }

        $brandManufacturers = $this->Brands->BrandManufacturers->find('list');

        $this->set(compact('brand', 'brandManufacturers'));
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
        $brand = $this->Brands->get($id);

        if ($this->request->is(['post', 'put', 'patch'])) {
            $brand = $this->Brands->patchEntity($brand, $this->request->getData());

            if ($this->Brands->save($brand)) {
                $this->Flash->success(__('The data has been saved.'));

                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('Th data could not be saved. Please try again.'));
        }
        $brandManufacturers = $this->Brands->BrandManufacturers->find('list');

        $this->set(compact('brand', 'brandManufacturers'));
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
        $brand = $this->Brands->get($id);

        if ($this->Brands->delete($brand)) {
            $this->Flash->success(__('The data has been deleted.'));
        } else {
            $this->Flash->error(__('The data could not be deleted. Please try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}