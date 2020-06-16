<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * LinkTables Model
 *
 * @method \App\Model\Entity\LinkTable newEmptyEntity()
 * @method \App\Model\Entity\LinkTable newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\LinkTable[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\LinkTable get($primaryKey, $options = [])
 * @method \App\Model\Entity\LinkTable findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\LinkTable patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\LinkTable[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\LinkTable|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\LinkTable saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\LinkTable[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\LinkTable[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\LinkTable[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\LinkTable[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class LinkTablesTable extends Table
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

        $this->setTable('link_tables');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
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
            ->scalar('pk_key')
            ->maxLength('pk_key', 36)
            ->allowEmptyString('pk_key');

        $validator
            ->scalar('pk_table')
            ->maxLength('pk_table', 45)
            ->allowEmptyString('pk_table');

        $validator
            ->scalar('fk_key')
            ->maxLength('fk_key', 36)
            ->allowEmptyString('fk_key');

        $validator
            ->scalar('fk_table')
            ->maxLength('fk_table', 45)
            ->allowEmptyString('fk_table');

        return $validator;
    }
}
