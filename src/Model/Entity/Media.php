<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;
use Josbeir\Filesystem\FileEntityInterface;

/**
 * Media Entity
 *
 * @property string $id
 * @property string|null $path
 * @property string|null $filename
 * @property int|null $size
 * @property string|null $mime
 * @property string|null $hash
 * @property string|null $meta
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property string|null $using_type
 * @property string|null $alt
 * @property string|null $title
 * @property string|null $description
 *
 * @property \App\Model\Entity\Client[] $clients
 * @property \App\Model\Entity\Partner[] $partners
 */
class Media extends Entity implements FileEntityInterface
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
        'path' => true,
        'filename' => true,
        'size' => true,
        'mime' => true,
        'hash' => true,
        'meta' => true,
        'created' => true,
        'modified' => true,
        'using_type' => true,
        'alt' => true,
        'title' => true,
        'description' => true,
        'clients' => true,
        'partners' => true,
    ];

    public function getPath() : string
    {
        return $this->path;
    }

    public function setPath(string $path) : FileEntityInterface
    {
        $this->set('path', $path);

        return $this;
    }
}
