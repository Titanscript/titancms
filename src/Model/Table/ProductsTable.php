<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Products Model
 *
 * @property \App\Model\Table\ProductCategoriesTable&\Cake\ORM\Association\BelongsTo $ProductCategories
 * @property \App\Model\Table\ProductGroupsTable&\Cake\ORM\Association\BelongsTo $ProductGroups
 * @property \App\Model\Table\BrandsTable&\Cake\ORM\Association\BelongsTo $Brands
 * @property \App\Model\Table\ProductAttributeHeadersTable&\Cake\ORM\Association\HasMany $ProductAttributeHeaders
 *
 * @method \App\Model\Entity\Product newEmptyEntity()
 * @method \App\Model\Entity\Product newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Product[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Product get($primaryKey, $options = [])
 * @method \App\Model\Entity\Product findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Product patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Product[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Product|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Product saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Product[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Product[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Product[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Product[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ProductsTable extends Table
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

        $this->setTable('products');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('ProductCategories', [
            'foreignKey' => 'product_category_id',
        ]);
        $this->belongsTo('ProductGroups', [
            'foreignKey' => 'product_group_id',
        ]);
        $this->belongsTo('Brands', [
            'foreignKey' => 'brand_id',
        ]);
        $this->hasMany('ProductAttributeHeaders', [
            'foreignKey' => 'product_id',
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
            ->uuid('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('sku')
            ->maxLength('sku', 45)
            ->allowEmptyString('sku');

        $validator
            ->scalar('name')
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('slug')
            ->requirePresence('slug', 'create')
            ->notEmptyString('slug');

        $validator
            ->scalar('subname')
            ->allowEmptyString('subname');

        $validator
            ->scalar('description')
            ->allowEmptyString('description');

        $validator
            ->scalar('unit_of_measure')
            ->maxLength('unit_of_measure', 45)
            ->allowEmptyString('unit_of_measure');

        $validator
            ->decimal('price')
            ->allowEmptyString('price');

        $validator
            ->scalar('pack_size')
            ->maxLength('pack_size', 45)
            ->allowEmptyString('pack_size');

        $validator
            ->scalar('dimension_group')
            ->maxLength('dimension_group', 191)
            ->allowEmptyString('dimension_group');

        $validator
            ->scalar('warrant_terms')
            ->allowEmptyString('warrant_terms');

        $validator
            ->scalar('status')
            ->allowEmptyString('status');

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
        $rules->add($rules->existsIn(['product_category_id'], 'ProductCategories'));
        $rules->add($rules->existsIn(['product_group_id'], 'ProductGroups'));
        $rules->add($rules->existsIn(['brand_id'], 'Brands'));

        return $rules;
    }
}
