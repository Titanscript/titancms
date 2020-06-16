<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * BrandManufacturers Model
 *
 * @property \App\Model\Table\BrandsTable&\Cake\ORM\Association\HasMany $Brands
 *
 * @method \App\Model\Entity\BrandManufacturer newEmptyEntity()
 * @method \App\Model\Entity\BrandManufacturer newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\BrandManufacturer[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\BrandManufacturer get($primaryKey, $options = [])
 * @method \App\Model\Entity\BrandManufacturer findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\BrandManufacturer patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\BrandManufacturer[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\BrandManufacturer|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BrandManufacturer saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BrandManufacturer[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\BrandManufacturer[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\BrandManufacturer[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\BrandManufacturer[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class BrandManufacturersTable extends Table
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

        $this->setTable('brand_manufacturers');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Brands', [
            'foreignKey' => 'brand_manufacturer_id',
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

        $validator
            ->scalar('code')
            ->maxLength('code', 45)
            ->allowEmptyString('code');

        $validator
            ->scalar('description')
            ->allowEmptyString('description');

        return $validator;
    }
}
