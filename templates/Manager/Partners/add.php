<h1 class="h3 mb-2 text-gray-800"><?= __('การจัดการพันธมิตร') ?></h1>

<?= $this->Form->create($partner, ['type' => 'file']) ?>
<?php
$this->Form->setTemplates(
    ['inputContainer' => '<div class="form-group input {{type}}{{required}}">{{content}}</div>']
) ?>
<div class="card shadow mb-4">
    <div class="card-header py-3"><?= __('ข้อมูลพันธมิตร') ?></div>
    <div class="card-body">
        <?= $this->Form->control('name', ['class' => 'form-control', 'label' => __('ชื่อ')]) ?>
        <?= $this->Form->control('image', ['class' => 'form-control-file', 'type' => 'file', 'label' => __('โลโก้')]) ?>
    </div>
    <div class="card-footer">
        <?= $this->Form->button(__('บันทึก'), ['class' => 'btn btn-success']) ?>
        <?= $this->Html->link(__('ยกเลิก'), ['action' => 'index'], ['class' => 'btn btn-link text-muted']) ?>
    </div>
</div>
<?= $this->Form->end() ?>