<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PageAttributeHeaders Model
 *
 * @property \App\Model\Table\PagesTable&\Cake\ORM\Association\BelongsTo $Pages
 * @property \App\Model\Table\PageAttributesTable&\Cake\ORM\Association\HasMany $PageAttributes
 *
 * @method \App\Model\Entity\PageAttributeHeader newEmptyEntity()
 * @method \App\Model\Entity\PageAttributeHeader newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\PageAttributeHeader[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PageAttributeHeader get($primaryKey, $options = [])
 * @method \App\Model\Entity\PageAttributeHeader findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\PageAttributeHeader patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PageAttributeHeader[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\PageAttributeHeader|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PageAttributeHeader saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PageAttributeHeader[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\PageAttributeHeader[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\PageAttributeHeader[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\PageAttributeHeader[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class PageAttributeHeadersTable extends Table
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

        $this->setTable('page_attribute_headers');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Pages', [
            'foreignKey' => 'page_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('PageAttributes', [
            'foreignKey' => 'page_attribute_header_id',
        ]);
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
            ->scalar('name')
            ->maxLength('name', 45)
            ->allowEmptyString('name');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['page_id'], 'Pages'));

        return $rules;
    }
}
