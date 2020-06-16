<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PageAttribute Entity
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $value
 * @property string|null $ref_key
 * @property string|null $ref_table
 * @property int $page_attribute_header_id
 *
 * @property \App\Model\Entity\PageAttributeHeader $page_attribute_header
 */
class PageAttribute extends Entity
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
        'value' => true,
        'ref_key' => true,
        'ref_table' => true,
        'page_attribute_header_id' => true,
        'page_attribute_header' => true,
    ];
}
