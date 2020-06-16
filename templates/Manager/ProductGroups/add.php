<h1 class="h3 mb-2 text-gray-800"><?= __('กลุ่มผลิตภัณฑ์') ?></h1>

<?= $this->Form->create($group) ?>
<?php $this->Form->setTemplates(
    ['inputContainer' => '<div class="form-group input {{type}}{{required}}">{{content}}</div>']
) ?>
<div class="card shadow mb-4">
    <div class="card-header py-3"><?= __('ข้อมูลกลุ่มผลิตภัณฑ์') ?></div>
    <div class="card-body">
        <?php
        echo $this->Form->control('name', ['class' => 'form-control', 'type' => 'text', 'label' => __('กลุ่ม')]);
        echo $this->Form->control('code', ['class' => 'form-control', 'type' => 'text', 'label' => __('โค้ด')]);
        echo $this->Form->control('parent_id', ['options' => $parentProductGroups, 'empty' => __('Optional'), 'class' => 'form-control']);
        ?>
    </div>
    <div class="card-footer">
        <?= $this->Form->button(__('บันทึก'), ['class' => 'btn btn-success']) ?>
        <?= $this->Html->link(__('ยกเลิก'), ['action' => 'index'], ['class' => 'btn btn-link text-muted']) ?>
    </div>
</div>
<?= $this->Form->end() ?>