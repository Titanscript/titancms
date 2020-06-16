<h1 class="h3 mb-2 text-gray-800"><?= __('จัดการบัญชีผู้ใช้') ?></h1>

<?= $this->Form->create() ?>
<?php $this->Form->setTemplates(
    ['inputContainer' => '<div class="form-group input {{type}}{{required}}">{{content}}</div>']
) ?>
<div class="card shadow mb-4">
    <div class="card-header py-3"><?= __('ข้อมูลบัญชีผู้ใช้') ?></div>
    <div class="card-body">
        <?= $this->Form->control('new_password', ['class' => 'form-control', 'type' => 'password', 'label' => __('รหัสผ่านใหม่')]) ?>
        <?= $this->Form->control('confirm_password', ['class' => 'form-control', 'type' => 'password', 'label' => __('ยืนยันรหัสผ่านใหม่อีกครั้ง')]) ?>
    </div>
    <div class="card-footer">
        <?= $this->Form->button(__('บันทึก'), ['class' => 'btn btn-success']) ?>
        <?= $this->Html->link(__('ยกเลิก'), ['action' => 'edit', $userId], ['class' => 'btn btn-link text-muted']) ?>
    </div>
</div>
<?= $this->Form->end() ?>