<?php

declare(strict_types = 1);

namespace App\Model\Entity;

use Cake\ORM\Behavior\Translate\TranslateTrait;
use Cake\ORM\Entity;

/**
 * ArticleCategory Entity
 *
 * @property int                                 $id
 * @property string                              $name
 * @property string                              $slug
 * @property int|null                            $parent_id
 * @property int|null                            $lft
 * @property int|null                            $rght
 * @property \Cake\I18n\FrozenTime|null          $created
 * @property \Cake\I18n\FrozenTime|null          $modified
 * @property string|null                         $description
 *
 * @property \App\Model\Entity\ArticleCategory   $parent_article_category
 * @property \App\Model\Entity\ArticleCategory[] $child_article_categories
 */
class ArticleCategory extends Entity
{
    use TranslateTrait;

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'name'                     => true,
        'slug'                     => true,
        'parent_id'                => true,
        'lft'                      => true,
        'rght'                     => true,
        'created'                  => true,
        'modified'                 => true,
        'description'              => true,
        'parent_article_category'  => true,
        'child_article_categories' => true,
        '_translations'            => true,
    ];
}
