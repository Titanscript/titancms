<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ArticleAttributes Model
 *
 * @property \App\Model\Table\ArticleAttributeHeadersTable&\Cake\ORM\Association\BelongsTo $ArticleAttributeHeaders
 *
 * @method \App\Model\Entity\ArticleAttribute newEmptyEntity()
 * @method \App\Model\Entity\ArticleAttribute newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\ArticleAttribute[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ArticleAttribute get($primaryKey, $options = [])
 * @method \App\Model\Entity\ArticleAttribute findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\ArticleAttribute patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ArticleAttribute[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\ArticleAttribute|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ArticleAttribute saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ArticleAttribute[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ArticleAttribute[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\ArticleAttribute[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ArticleAttribute[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ArticleAttributesTable extends Table
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

        $this->setTable('article_attributes');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('ArticleAttributeHeaders', [
            'foreignKey' => 'article_attribute_header_id',
            'joinType' => 'INNER',
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
            ->scalar('value')
            ->requirePresence('value', 'create')
            ->notEmptyString('value');

        $validator
            ->scalar('ref_key')
            ->maxLength('ref_key', 36)
            ->allowEmptyString('ref_key');

        $validator
            ->scalar('ref_table')
            ->maxLength('ref_table', 45)
            ->allowEmptyString('ref_table');

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
        $rules->add($rules->existsIn(['article_attribute_header_id'], 'ArticleAttributeHeaders'));

        return $rules;
    }
}
