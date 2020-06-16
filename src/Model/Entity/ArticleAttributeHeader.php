<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ArticleAttributeHeader Entity
 *
 * @property int $id
 * @property string $name
 * @property string $article_id
 *
 * @property \App\Model\Entity\Article $article
 * @property \App\Model\Entity\ArticleAttribute[] $article_attributes
 */
class ArticleAttributeHeader extends Entity
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
        'name' => true,
        'article_id' => true,
        'article' => true,
        'article_attributes' => true,
    ];
}
