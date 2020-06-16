<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProductGroup Entity
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $code
 * @property int|null $parent_id
 * @property int|null $lft
 * @property int|null $rght
 * @property string|null $status
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\ParentProductGroup $parent_product_group
 * @property \App\Model\Entity\ChildProductGroup[] $child_product_groups
 * @property \App\Model\Entity\Product[] $products
 */
class ProductGroup extends Entity
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
        'code' => true,
        'parent_id' => true,
        'lft' => true,
        'rght' => true,
        'status' => true,
        'created' => true,
        'modified' => true,
        'parent_product_group' => true,
        'child_product_groups' => true,
        'products' => true,
    ];
}
