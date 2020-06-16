<h1 class="h3 mb-2 text-gray-800"><?= __('การจัดการหน้าเว็บไซต์') ?></h1>

<?= $this->Form->create($page) ?>
<?php $this->Form->setTemplates(
    ['inputContainer' => '<div class="form-group input {{type}}{{required}}">{{content}}</div>']
) ?>
<div class="card shadow mb-4">
    <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
                <?= $this->Html->link(__('ข้อมูลหน้าเว็บ'), ['action' => 'edit', $page->id], ['class' => 'nav-link active']) ?>
            </li>
            <li class="nav-item">
                <?= $this->Html->link(__('คุณลักษณะ'), ['action' => 'attribute', $page->id], ['class' => 'nav-link']) ?>
            </li>
        </ul>
    </div>
    <div class="card-body">
        <ul class="nav nav-pills">
            <li class="nav-item">
                <?= $this->Html->link(
                    __('ไทย'),
                    ['action' => 'edit', $page->id],
                    ['class' => $locale === 'th_TH' ? 'nav-link active' : 'nav-link']
                ) ?>
            </li>
            <li class="nav-item">
                <?= $this->Html->link(
                    __('English'),
                    ['action' => 'edit', $page->id, 'en_US'],
                    ['class' => $locale === 'en_US' ? 'nav-link active' : 'nav-link']
                ) ?>
            </li>
            <li class="nav-item">
                <?= $this->Html->link(
                    __('日本語'),
                    ['action' => 'edit', $page->id, 'ja_JP'],
                    ['class' => $locale === 'ja_JP' ? 'nav-link active' : 'nav-link']
                ) ?>
            </li>
        </ul>
        <hr>

        <?= $this->Form->control('title', ['class' => 'form-control', 'type' => 'text', 'label' => __('ชื่อ')]) ?>
        <?= $this->Form->control('slug', ['class' => 'form-control', 'type' => 'text']) ?>
        <?= $this->Form->control('intro', ['class' => 'form-control tiny-textarea', 'label' => __('เกรินนำ')]) ?>
        <?= $this->Form->control('body', ['class' => 'form-control tiny-textarea', 'label' => __('เนื้อหา')]) ?>
        <?= $this->Form->control(
            'status',
            [
                'class'   => 'form-control',
                'label'   => __('สถานะ'),
                'empty'   => false,
                'options' => [
                    'active'   => __('เผยแพร่'),
                    'inactive' => __('ไม่เผยแพร่'),
                ],
            ]
        ) ?>
    </div>
    <div class="card-footer">
        <?= $this->Form->button(__('บันทึก'), ['class' => 'btn btn-success']) ?>
        <?= $this->Html->link(__('ยกเลิก'), ['action' => 'index'], ['class' => 'btn btn-link text-muted']) ?>
    </div>
</div>
<?= $this->Form->end() ?>