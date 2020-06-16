<h1 class="h3 mb-2 text-gray-800"><?= __('การจัดการหน้าเว็บไซต์') ?></h1>

<?= $this->Form->create($page) ?>
<?php $this->Form->setTemplates(
    ['inputContainer' => '<div class="form-group input {{type}}{{required}}">{{content}}</div>']
) ?>
<div class="card shadow mb-4">
    <div class="card-header py-3"><?= __('ข้อมูลหน้าเว็บ') ?></div>
    <div class="card-body">
        <ul class="nav nav-pills">
            <li class="nav-item">
                <?= $this->Html->link(
                    __('ไทย'),
                    "#",
                    ['class' => 'nav-link active']
                ) ?>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">English</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">日本語</a>
            </li>
        </ul>
        <hr>

        <?= $this->Form->control('title', ['class' => 'form-control', 'type' => 'text', 'label' => __('ชื่อ')]) ?>
        <?= $this->Form->control('slug', ['class' => 'form-control', 'type' => 'text']) ?>
        <?= $this->Form->control('intro', ['class' => 'form-control tiny-textarea', 'label' => __('เกรินนำ')]) ?>
        <?= $this->Form->control('body', ['class' => 'form-control tiny-textarea', 'label' => __('เนื้อหา')]) ?>
    </div>
    <div class="card-footer">
        <?= $this->Form->button(__('บันทึก'), ['class' => 'btn btn-success']) ?>
        <?= $this->Html->link(__('ยกเลิก'), ['action' => 'index'], ['class' => 'btn btn-link text-muted']) ?>
    </div>
</div>
<?= $this->Form->end() ?>