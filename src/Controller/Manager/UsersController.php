<?php

namespace App\Controller\Manager;

/**
 * Class UsersController
 *
 * @property \App\Model\Table\UsersTable                                  $Users
 * @property \Authentication\Controller\Component\AuthenticationComponent $Authentication
 * @package App\Controller\Manager
 */
class UsersController extends AppController
{
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);

        $this->Authentication->allowUnauthenticated(['login']);
    }

    /**
     * index method
     */
    public function index()
    {
        $users = $this->Users->find();
        $this->set(compact('users'));
    }

    /**
     * add method
     *
     * @return \Cake\Http\Response|null
     */
    public function add()
    {
        $user = $this->Users->newEmptyEntity();

        if ($this->request->is('post')) {
            $data = $this->request->getData();

            if ($data['new_password'] === $data['confirm_password']) {
                $user                = $this->Users->patchEntity($user, $data);
                $user->password      = $data['new_password'];
                $user->is_superadmin = 0;

                if ($this->Users->save($user)) {
                    $this->Flash->success(__('The data has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }

                $this->Flash->error(__('The data could not be saved. Please try again.'));
            } else {
                $this->Flash->error(__('The password dose not matched. Please try again.'));
            }
        }

        $this->set(compact('user'));
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
        $user = $this->Users->get($id);

        if ($this->request->is(['post', 'put', 'patch'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());

            if ($this->Users->save($user)) {
                $this->Flash->success(__('The data has been saved.'));

                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('The data could not be saved. Please try again.'));
        }

        $this->set(compact('user'));
    }

    /**
     * delete method
     *
     * @param null $id
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['delete', 'post']);
        $user = $this->Users->get($id);

        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The data has been deleted.'));
        } else {
            $this->Flash->error(__('The data could not be deleted. Please try again.'));
        }

        $this->redirect(['action' => 'index']);
    }

    /**
     * changePassword method
     *
     * @param null $id
     *
     * @return \Cake\Http\Response|null
     */
    public function changePassword($id = null)
    {
        if ($this->request->is(['post', 'put', 'patch'])) {
            $data = $this->request->getData();

            if ($data['new_password'] === $data['confirm_password']) {
                $user           = $this->Users->get($id);
                $user->password = $data['new_password'];

                if ($this->Users->save($user)) {
                    $this->Flash->success(__('The data has been saved.'));

                    return $this->redirect(['action' => 'edit', $id]);
                }

                $this->Flash->error(__('The data could not be saved. Please try again.'));
            }
        }

        $this->set('userId', $id);
    }

    /**
     * login method
     *
     * @return \Cake\Http\Response|null
     */
    public function login()
    {
        $this->viewBuilder()->setLayout('login');

        $result = $this->Authentication->getResult();
        // If the user is logged in send them away.
        if ($result->isValid()) {
            $target = $this->Authentication->getLoginRedirect() ?? '/manager';

            return $this->redirect($target);
        }
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error('Invalid username or password');
        }
    }

    /**
     * logout method
     *
     * @return \Cake\Http\Response|null
     */
    public function logout()
    {
        $this->Authentication->logout();

        return $this->redirect(['controller' => 'Users', 'action' => 'login']);
    }
}