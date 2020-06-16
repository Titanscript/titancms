<?php

declare(strict_types = 1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ArticleCategories Model
 *
 * @property \App\Model\Table\ArticleCategoriesTable&\Cake\ORM\Association\BelongsTo $ParentArticleCategories
 * @property \App\Model\Table\ArticleCategoriesTable&\Cake\ORM\Association\HasMany   $ChildArticleCategories
 *
 * @method \App\Model\Entity\ArticleCategory newEmptyEntity()
 * @method \App\Model\Entity\ArticleCategory newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\ArticleCategory[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ArticleCategory get($primaryKey, $options = [])
 * @method \App\Model\Entity\ArticleCategory findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\ArticleCategory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ArticleCategory[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\ArticleCategory|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ArticleCategory saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ArticleCategory[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ArticleCategory[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\ArticleCategory[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ArticleCategory[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 * @mixin \Cake\ORM\Behavior\TreeBehavior
 */
class ArticleCategoriesTable extends Table
{
    /**
     * Initialize method
     *
     * @param  array  $config  The configuration for the Table.
     *
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('article_categories');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Tree');
        $this->addBehavior(
            'Translate',
            [
                'fields'                 => ['name', 'slug', 'description'],
                'defaultLocale'          => 'th_TH',
                'allowEmptyTranslations' => true,
            ]
        );

        $this->belongsTo(
            'ParentArticleCategories',
            [
                'className'  => 'ArticleCategories',
                'foreignKey' => 'parent_id',
            ]
        );
        $this->hasMany(
            'ChildArticleCategories',
            [
                'className'  => 'ArticleCategories',
                'foreignKey' => 'parent_id',
            ]
        );
    }

    /**
     * Default validation rules.
     *
     * @param  \Cake\Validation\Validator  $validator  Validator instance.
     *
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('name')
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('slug')
            ->requirePresence('slug', 'create')
            ->notEmptyString('slug');

        $validator
            ->scalar('description')
            ->allowEmptyString('description');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param  \Cake\ORM\RulesChecker  $rules  The rules object to be modified.
     *
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['parent_id'], 'ParentArticleCategories'));

        return $rules;
    }
}
