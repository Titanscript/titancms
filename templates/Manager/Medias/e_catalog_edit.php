<h1 class="h3 mb-2 text-gray-800"><?= __('การจัดการ e-Catalogs') ?></h1>

<?= $this->Form->create($catalog, ['type' => 'file']) ?>
<?php $this->Form->setTemplates(
    ['inputContainer' => '<div class="form-group input {{type}}{{required}}">{{content}}</div>']
) ?>
<div class="card shadow mb-4">
    <div class="card-header py-3"><?= __('ข้อมูล e-Catalogs') ?></div>
    <div class="card-body">
        <?= $this->Form->control('title', ['class' => 'form-control', 'label' => __('หัวข้อ')]) ?>
        <?= $this->Form->control('description', ['class' => 'form-control', 'label' => __('รายละเอียด')]) ?>
        <?= $this->Form->control('alt', ['class' => 'form-control']) ?>

        <h6><?= __('หมายเหตุ') ?></h6>
        <p><?= __('อัปเดตข้อมูลเกี่ยวกับสื่อเท่านั้น ไม่สามารถแก้ไขภาพหรือเปลี่ยนภาพได้ คุณต้องลบบันทึกนี้และสร้างใหม่') ?></p>
    </div>
    <div class="card-footer">
        <?= $this->Form->button(__('บันทึก'), ['class' => 'btn btn-success']) ?>
        <?= $this->Html->link(__('ยกเลิก'), ['action' => 'index'], ['class' => 'btn btn-link text-muted']) ?>
    </div>
</div>
<?= $this->Form->end() ?>