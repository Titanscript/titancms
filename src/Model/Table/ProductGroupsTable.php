<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProductGroups Model
 *
 * @property \App\Model\Table\ProductGroupsTable&\Cake\ORM\Association\BelongsTo $ParentProductGroups
 * @property \App\Model\Table\ProductGroupsTable&\Cake\ORM\Association\HasMany $ChildProductGroups
 * @property \App\Model\Table\ProductsTable&\Cake\ORM\Association\HasMany $Products
 *
 * @method \App\Model\Entity\ProductGroup newEmptyEntity()
 * @method \App\Model\Entity\ProductGroup newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\ProductGroup[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ProductGroup get($primaryKey, $options = [])
 * @method \App\Model\Entity\ProductGroup findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\ProductGroup patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ProductGroup[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\ProductGroup|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProductGroup saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProductGroup[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ProductGroup[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\ProductGroup[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ProductGroup[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 * @mixin \Cake\ORM\Behavior\TreeBehavior
 */
class ProductGroupsTable extends Table
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

        $this->setTable('product_groups');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Tree');

        $this->belongsTo('ParentProductGroups', [
            'className' => 'ProductGroups',
            'foreignKey' => 'parent_id',
        ]);
        $this->hasMany('ChildProductGroups', [
            'className' => 'ProductGroups',
            'foreignKey' => 'parent_id',
        ]);
        $this->hasMany('Products', [
            'foreignKey' => 'product_group_id',
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

        $validator
            ->scalar('code')
            ->maxLength('code', 45)
            ->allowEmptyString('code');

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
        $rules->add($rules->existsIn(['parent_id'], 'ParentProductGroups'));

        return $rules;
    }
}
