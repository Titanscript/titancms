<?php


namespace App\Controller\Manager;

use Cake\Utility\Inflector;

/**
 * Class SiteSettingsController
 *
 * @property \App\Model\Table\SiteSettingsTable $SiteSettings
 * @package App\Controller\Manager
 */
class SiteSettingsController extends AppController
{
    public function site()
    {
        $settings = $this->SiteSettings->find()
            ->where(['key_field like' => 'site_%'])
            ->orderAsc('key_field');

        $fieldsText = [];
        foreach ($settings as $setting) {
            $fieldsText[$setting->id] = Inflector::humanize($setting->key_field);
        }

        if ($this->request->is(['post', 'put', 'patch'])) {
            $settings = $this->SiteSettings->patchEntities($settings, $this->request->getData());

            if ($this->SiteSettings->saveMany($settings)) {
                $this->Flash->success(__('The setting value has been saved.'));

                return $this->redirect(['action' => 'site']);
            }

            $this->Flash->error(__('The setting value could not be saved.'));
        }

        $this->set(compact('settings', 'fieldsText'));
    }

    /**
     * company method
     *
     * @return \Cake\Http\Response|null
     * @throws \Exception
     */
    public function company()
    {
        $settings = $this->SiteSettings->find()
            ->where(['key_field like' => 'company_%'])
            ->orderAsc('key_field');

        $fieldsText = [];
        foreach ($settings as $setting) {
            $fieldsText[$setting->id] = Inflector::humanize($setting->key_field);
        }

        if ($this->request->is(['post', 'put', 'patch'])) {
            $settings = $this->SiteSettings->patchEntities($settings, $this->request->getData());

            if ($this->SiteSettings->saveMany($settings)) {
                $this->Flash->success(__('The setting value has been saved.'));

                return $this->redirect(['action' => 'company']);
            }

            $this->Flash->error(__('The setting value could not be saved.'));
        }

        $this->set(compact('settings', 'fieldsText'));
    }

    public function socialNetwork()
    {
        $settings = $this->SiteSettings->find()
            ->where(['key_field like' => 'social_%']);

        $fieldsText = [];
        foreach ($settings as $setting) {
            $fieldsText[$setting->id] = Inflector::humanize($setting->key_field);
        }

        if ($this->request->is(['post', 'put', 'patch'])) {
            $settings = $this->SiteSettings->patchEntities($settings, $this->request->getData());

            if ($this->SiteSettings->saveMany($settings)) {
                $this->Flash->success(__('The setting value has been saved.'));

                return $this->redirect(['action' => 'socialNetwork']);
            }

            $this->Flash->error(__('The setting value could not be saved.'));
        }

        $this->set(compact('settings', 'fieldsText'));
    }

    public function seo()
    {
        $settings = $this->SiteSettings->find()
            ->where(['key_field like' => 'seo_%']);

        $fieldsText = [];
        foreach ($settings as $setting) {
            $fieldsText[$setting->id] = Inflector::humanize($setting->key_field);
        }

        if ($this->request->is(['post', 'put', 'patch'])) {
            $settings = $this->SiteSettings->patchEntities($settings, $this->request->getData());

            if ($this->SiteSettings->saveMany($settings)) {
                $this->Flash->success(__('The setting value has been saved.'));

                return $this->redirect(['action' => 'seo']);
            }

            $this->Flash->error(__('The setting value could not be saved.'));
        }

        $this->set(compact('settings', 'fieldsText'));
    }

    public function ogTags()
    {
        $settings = $this->SiteSettings->find()
            ->where(['key_field like' => 'og_%']);

        $fieldsText = [];
        foreach ($settings as $setting) {
            $fieldsText[$setting->id] = Inflector::humanize($setting->key_field);
        }

        if ($this->request->is(['post', 'put', 'patch'])) {
            $settings = $this->SiteSettings->patchEntities($settings, $this->request->getData());

            if ($this->SiteSettings->saveMany($settings)) {
                $this->Flash->success(__('The setting value has been saved.'));

                return $this->redirect(['action' => 'seo']);
            }

            $this->Flash->error(__('The setting value could not be saved.'));
        }

        $this->set(compact('settings', 'fieldsText'));
    }
}