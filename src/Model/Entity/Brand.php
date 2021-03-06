<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Brand Entity
 *
 * @property int $id
 * @property string $name
 * @property string|null $code
 * @property string|null $description
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property int|null $brand_manufacturer_id
 *
 * @property \App\Model\Entity\BrandManufacturer $brand_manufacturer
 * @property \App\Model\Entity\Product[] $products
 */
class Brand extends Entity
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
        'description' => true,
        'created' => true,
        'modified' => true,
        'brand_manufacturer_id' => true,
        'brand_manufacturer' => true,
        'products' => true,
    ];
}
