<h1 class="h3 mb-2 text-gray-800"><?= __('Users management') ?></h1>

<?= $this->Form->create($user) ?>
<?php $this->Form->setTemplates(
    ['inputContainer' => '<div class="form-group input {{type}}{{required}}">{{content}}</div>']
) ?>
<div class="card shadow mb-4">
    <div class="card-header py-3"><?= __('User information') ?></div>
    <div class="card-body">
        <?= $this->Form->control('full_name', ['class' => 'form-control']) ?>
        <?= $this->Form->control('username', ['class' => 'form-control']) ?>
        <?= $this->Form->control('email', ['class' => 'form-control']) ?>
        <?= $this->Form->control('role', ['class' => 'form-control', 'options' => ['admin' => __('Admin'), 'staff' => __('Staff')]]) ?>
    </div>
    <div class="card-footer">
        <?= $this->Form->button(__('Save'), ['class' => 'btn btn-success']) ?>
        <?= $this->Html->link(__('Change password'), ['action' => 'changePassword', $user->id], ['class' => 'btn btn-info']) ?>
        <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-link text-muted']) ?>
    </div>
</div>
<?= $this->Form->end() ?>