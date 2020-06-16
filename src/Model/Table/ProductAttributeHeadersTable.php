<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProductAttributeHeaders Model
 *
 * @property \App\Model\Table\ProductsTable&\Cake\ORM\Association\BelongsTo $Products
 * @property \App\Model\Table\ProductAttributesTable&\Cake\ORM\Association\HasMany $ProductAttributes
 *
 * @method \App\Model\Entity\ProductAttributeHeader newEmptyEntity()
 * @method \App\Model\Entity\ProductAttributeHeader newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\ProductAttributeHeader[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ProductAttributeHeader get($primaryKey, $options = [])
 * @method \App\Model\Entity\ProductAttributeHeader findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\ProductAttributeHeader patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ProductAttributeHeader[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\ProductAttributeHeader|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProductAttributeHeader saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProductAttributeHeader[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ProductAttributeHeader[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\ProductAttributeHeader[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ProductAttributeHeader[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ProductAttributeHeadersTable extends Table
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

        $this->setTable('product_attribute_headers');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Products', [
            'foreignKey' => 'product_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('ProductAttributes', [
            'dependent' => true,
            'cascadeCallbacks' => true,
            'foreignKey' => 'product_attribute_header_id',
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
            ->maxLength('name', 191)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

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
        $rules->add($rules->existsIn(['product_id'], 'Products'));
        // $rules->add($rules->isUnique(['name']));

        return $rules;
    }
}
