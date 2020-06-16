<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PageAttributeHeader Entity
 *
 * @property int $id
 * @property string|null $name
 * @property string $page_id
 *
 * @property \App\Model\Entity\Page $page
 * @property \App\Model\Entity\PageAttribute[] $page_attributes
 */
class PageAttributeHeader extends Entity
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
        'page_id' => true,
        'page' => true,
        'page_attributes' => true,
    ];
}
