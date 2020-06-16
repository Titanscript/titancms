<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Product Entity
 *
 * @property string $id
 * @property string|null $sku
 * @property string $name
 * @property string $slug
 * @property string|null $subname
 * @property string|null $description
 * @property string|null $unit_of_measure
 * @property string|null $price
 * @property string|null $pack_size
 * @property string|null $dimension_group
 * @property string|null $warrant_terms
 * @property string|null $status
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property int|null $product_category_id
 * @property int|null $product_group_id
 * @property int|null $brand_id
 *
 * @property \App\Model\Entity\ProductCategory $product_category
 * @property \App\Model\Entity\ProductGroup $product_group
 * @property \App\Model\Entity\Brand $brand
 * @property \App\Model\Entity\ProductAttributeHeader[] $product_attribute_headers
 */
class Product extends Entity
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
        'sku' => true,
        'name' => true,
        'slug' => true,
        'subname' => true,
        'description' => true,
        'unit_of_measure' => true,
        'price' => true,
        'pack_size' => true,
        'dimension_group' => true,
        'warrant_terms' => true,
        'status' => true,
        'created' => true,
        'modified' => true,
        'product_category_id' => true,
        'product_group_id' => true,
        'brand_id' => true,
        'product_category' => true,
        'product_group' => true,
        'brand' => true,
        'product_attribute_headers' => true,
    ];
}
