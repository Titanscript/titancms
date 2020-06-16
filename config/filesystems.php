<?php
return [
    'Filesystem' => [
        'default' => [
            'adapter' => 'Local', // default
            'adapterArguments' => [ WWW_ROOT . 'storage' ],
            'entityClass' => 'App\Model\Entity\Media'
        ]
    ]
];