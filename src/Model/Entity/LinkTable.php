<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * LinkTable Entity
 *
 * @property int $id
 * @property string|null $pk_key
 * @property string|null $pk_table
 * @property string|null $fk_key
 * @property string|null $fk_table
 */
class LinkTable extends Entity
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
        'pk_key' => true,
        'pk_table' => true,
        'fk_key' => true,
        'fk_table' => true,
    ];
}
