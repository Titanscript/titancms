<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Medias Model
 *
 * @property \App\Model\Table\ClientsTable&\Cake\ORM\Association\HasMany $Clients
 * @property \App\Model\Table\PartnersTable&\Cake\ORM\Association\HasMany $Partners
 *
 * @method \App\Model\Entity\Media newEmptyEntity()
 * @method \App\Model\Entity\Media newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Media[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Media get($primaryKey, $options = [])
 * @method \App\Model\Entity\Media findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Media patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Media[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Media|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Media saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Media[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Media[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Media[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Media[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class MediasTable extends Table
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

        $this->setTable('medias');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Clients', [
            'foreignKey' => 'media_id',
        ]);
        $this->hasMany('Partners', [
            'foreignKey' => 'media_id',
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
            ->scalar('path')
            ->allowEmptyString('path');

        $validator
            ->scalar('filename')
            ->allowEmptyFile('filename');

        $validator
            ->integer('size')
            ->allowEmptyString('size');

        $validator
            ->scalar('mime')
            ->maxLength('mime', 45)
            ->allowEmptyString('mime');

        $validator
            ->scalar('hash')
            ->maxLength('hash', 45)
            ->allowEmptyString('hash');

        $validator
            ->scalar('meta')
            ->maxLength('meta', 45)
            ->allowEmptyString('meta');

        $validator
            ->scalar('using_type')
            ->maxLength('using_type', 45)
            ->allowEmptyString('using_type');

        $validator
            ->scalar('alt')
            ->maxLength('alt', 45)
            ->allowEmptyString('alt');

        $validator
            ->scalar('title')
            ->maxLength('title', 45)
            ->allowEmptyString('title');

        $validator
            ->scalar('description')
            ->allowEmptyString('description');

        return $validator;
    }
}
