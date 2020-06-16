<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProductCategory Entity
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string|null $code
 * @property int|null $parent_id
 * @property int|null $lft
 * @property int|null $rght
 * @property string|null $status
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property string|null $description
 *
 * @property \App\Model\Entity\ProductCategory $parent_product_category
 * @property \App\Model\Entity\ProductCategory[] $child_product_categories
 */
class ProductCategory extends Entity
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
        'slug' => true,
        'code' => true,
        'parent_id' => true,
        'lft' => true,
        'rght' => true,
        'status' => true,
        'created' => true,
        'modified' => true,
        'description' => true,
        'parent_product_category' => true,
        'child_product_categories' => true,
    ];
}
