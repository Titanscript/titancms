<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Article Entity
 *
 * @property string $id
 * @property string|null $title
 * @property string|null $slug
 * @property string|null $intro
 * @property string|null $body
 * @property string|null $status
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property int|null $article_categorie_id
 *
 * @property \App\Model\Entity\ArticleCategory $article_category
 * @property \App\Model\Entity\ArticleAttributeHeader[] $article_attribute_headers
 */
class Article extends Entity
{
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
        'title' => true,
        'slug' => true,
        'intro' => true,
        'body' => true,
        'status' => true,
        'created' => true,
        'modified' => true,
        'article_categorie_id' => true,
        'article_category' => true,
        'article_attribute_headers' => true,
    ];
}
