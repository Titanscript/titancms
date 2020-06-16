<h1 class="h3 mb-2 text-gray-800"><?= __('การจัดการหมวดหมู่ผลิตภัณฑ์') ?></h1>

<?= $this->Form->create($category, ['type' => 'file']) ?>
<?php $this->Form->setTemplates(
    ['inputContainer' => '<div class="form-group input {{type}}{{required}}">{{content}}</div>']
) ?>
<div class="card shadow mb-4">
    <div class="card-header py-3"><?= __('ข้อมูลหมวดหมู่ผลิตภัณฑ์') ?></div>
    <div class="card-body">
        <?php
        echo $this->Form->control('name', ['class' => 'form-control', 'type' => 'text', 'label' => __('ชื่อ')]);
        echo $this->Form->control('code', ['class' => 'form-control', 'type' => 'text', 'label' => __('โค้ด')]);
        echo $this->Form->control('description', ['class' => 'form-control', 'label' => __('รายละเอียด')]);
        echo $this->Form->control(
            'parent_id', ['options' => $parentProductCategories, 'empty' => __('ไม่จำเป็น'), 'class' => 'form-control']
        );
        echo $this->Form->control('image', ['class' => 'form-control-file', 'type' => 'file', 'label' => __('รูปภาพ')]);
        ?>
    </div>
    <div class="card-footer">
        <?= $this->Form->button(__('บันทึก'), ['class' => 'btn btn-success']) ?>
        <?= $this->Html->link(__('ยกเลิก'), ['action' => 'index'], ['class' => 'btn btn-link text-muted']) ?>
    </div>
</div>
<?= $this->Form->end() ?>