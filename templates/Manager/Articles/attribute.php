<h1 class="h3 mb-2 text-gray-800"><?= __('การจัดการบทความ') ?></h1>

<div class="card shadow mb-4">
    <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
                <?= $this->Html->link(__('ข้อมูลบทความ'), ['action' => 'edit', $article->id], ['class' => 'nav-link']) ?>
            </li>
            <li class="nav-item">
                <?= $this->Html->link(
                    __('คุณลักษณะ'),
                    ['action' => 'attribute', $article->id],
                    ['class' => 'nav-link active']
                ) ?>
            </li>
        </ul>
    </div>
    <div class="card-body">
        <?= $this->Html->link(
            __('เพิ่มหัวข้อคุณลักษณะ'),
            ['action' => 'addAttributeHeader', $article->id],
            ['class' => 'btn btn-primary mb-3']
        ) ?>
        <?php
        foreach ($article->article_attribute_headers as $header): ?>
            <?php
            if ($header->name === 'images'): ?>
                <div class="card mb-3">
                    <div class="card-header"><?= __('คุณลักษณะ') ?>: <?= __('รูปภาพ') ?></div>
                    <div class="card-body">
                        <?= $this->Html->link(
                            __('เพิ่มรูปภาพ'),
                            ['action' => 'addAttributeImage', $article->id, $header->id],
                            ['class' => 'btn btn-primary mb-3']
                        ) ?>

                        <div class="table-responsive">
                            <table class="table table-sm table-bordered text-sm">
                                <thead>
                                <tr>
                                    <th><?= __('ชื่อ') ?></th>
                                    <th><?= __('รูปภาพ') ?></th>
                                    <th><?= __('เมนู') ?></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($header->article_attributes as $attribute): ?>
                                    <tr>
                                        <td><?= $attribute->name ?></td>
                                        <td><?= $this->Html->image($attribute->value, ['class' => 'img-fluid', 'style' => 'height: 100px']) ?></td>
                                        <td>
                                            <?= $this->Form->postLink(
                                                __('ลบรูปภาพ'),
                                                ['action' => 'deleteAttributeImage', $article->id, $attribute->id],
                                                ['class' => 'text-danger']
                                            ) ?>
                                        </td>
                                    </tr>
                                <?php
                                endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            <?php
            else: ?>
                <div class="card">
                    <div class="card-header"><?= __('คุณลักษณะ') ?>: <?= $header->name ?></div>
                    <div class="card-body">
                        <?= $this->Html->link(
                            __('เพิ่มคุณลักษณะ'),
                            ['action' => 'addAttribute', $article->id, $header->id],
                            ['class' => 'btn btn-primary']
                        ) ?>
                        <?= $this->Html->link(
                            __('แก้ไขหัวข้อ'),
                            ['action' => 'editAttributeHeader', $article->id, $header->id],
                            ['class' => 'btn btn-secondary']
                        ) ?>
                        <?= $this->Form->postLink(
                            __('ลบหัวข้อคุณลักษณะ'),
                            ['action' => 'deleteAttributeHeader', $article->id, $header->id],
                            ['class' => 'btn btn-link text-danger']
                        ) ?>

                        <div class="table-responsive mt-3">
                            <table class="table table-sm table-bordered text-sm">
                                <thead>
                                <tr>
                                    <th><?= __('ชื่อ') ?></th>
                                    <th><?= __('ค่า') ?></th>
                                    <th><?= __('เมนู') ?></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($header->article_attributes as $attribute): ?>
                                    <tr>
                                        <td><?= $attribute->name ?></td>
                                        <td><?= $attribute->value ?></td>
                                        <td>
                                            <?= $this->Html->link(
                                                __('แก้ไข'),
                                                ['action' => 'editAttribute', $article->id, $attribute->id],
                                                ['class' => 'mr-3']
                                            ) ?>
                                            <?= $this->Form->postLink(
                                                __('ลบ'),
                                                ['action' => 'deleteAttribute', $article->id, $attribute->id],
                                                ['class' => 'text-danger', 'confirm' => __('คุณต้องการลบข้อมูลนี้ใช่หรือไม่?')]
                                            ) ?>
                                        </td>
                                    </tr>
                                <?php
                                endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            <?php
            endif ?>
        <?php
        endforeach ?>
    </div>
</div>