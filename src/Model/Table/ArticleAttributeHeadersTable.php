<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ArticleAttributeHeaders Model
 *
 * @property \App\Model\Table\ArticlesTable&\Cake\ORM\Association\BelongsTo $Articles
 * @property \App\Model\Table\ArticleAttributesTable&\Cake\ORM\Association\HasMany $ArticleAttributes
 *
 * @method \App\Model\Entity\ArticleAttributeHeader newEmptyEntity()
 * @method \App\Model\Entity\ArticleAttributeHeader newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\ArticleAttributeHeader[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ArticleAttributeHeader get($primaryKey, $options = [])
 * @method \App\Model\Entity\ArticleAttributeHeader findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\ArticleAttributeHeader patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ArticleAttributeHeader[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\ArticleAttributeHeader|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ArticleAttributeHeader saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ArticleAttributeHeader[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ArticleAttributeHeader[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\ArticleAttributeHeader[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ArticleAttributeHeader[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ArticleAttributeHeadersTable extends Table
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

        $this->setTable('article_attribute_headers');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Articles', [
            'foreignKey' => 'article_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('ArticleAttributes', [
            'foreignKey' => 'article_attribute_header_id',
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
        $rules->add($rules->existsIn(['article_id'], 'Articles'));
        // $rules->add($rules->isUnique(['name']));

        return $rules;
    }
}
