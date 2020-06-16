<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SiteSettings Model
 *
 * @method \App\Model\Entity\SiteSetting newEmptyEntity()
 * @method \App\Model\Entity\SiteSetting newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\SiteSetting[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SiteSetting get($primaryKey, $options = [])
 * @method \App\Model\Entity\SiteSetting findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\SiteSetting patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SiteSetting[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\SiteSetting|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SiteSetting saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SiteSetting[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\SiteSetting[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\SiteSetting[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\SiteSetting[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SiteSettingsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('site_settings');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('key_field')
            ->maxLength('key_field', 191)
            ->allowEmptyString('key_field');

        $validator
            ->scalar('value_field')
            ->allowEmptyString('value_field');

        return $validator;
    }
}
