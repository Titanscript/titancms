<h1 class="h3 mb-2 text-gray-800"><?= __('Users management') ?></h1>

<?= $this->Form->create() ?>
<?php $this->Form->setTemplates(
    ['inputContainer' => '<div class="form-group input {{type}}{{required}}">{{content}}</div>']
) ?>
<div class="card shadow mb-4">
    <div class="card-header py-3"><?= __('User information') ?></div>
    <div class="card-body">
        <?= $this->Form->control('new_password', ['class' => 'form-control', 'type' => 'password']) ?>
        <?= $this->Form->control('confirm_password', ['class' => 'form-control', 'type' => 'password']) ?>
    </div>
    <div class="card-footer">
        <?= $this->Form->button(__('Save'), ['class' => 'btn btn-success']) ?>
        <?= $this->Html->link(__('Cancel'), ['action' => 'edit', $userId], ['class' => 'btn btn-link text-muted']) ?>
    </div>
</div>
<?= $this->Form->end() ?>