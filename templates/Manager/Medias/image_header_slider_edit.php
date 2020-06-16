<h1 class="h3 mb-2 text-gray-800"><?= __('Image header sliders management') ?></h1>
<?= $this->Form->create($slider) ?>
<?php $this->Form->setTemplates(
    ['inputContainer' => '<div class="form-group input {{type}}{{required}}">{{content}}</div>']
) ?>
<div class="card shadow mb-4">
    <div class="card-header py-3"><?= __('Image header slider information') ?></div>
    <div class="card-body">
        <?= $this->Form->control('title', ['class' => 'form-control']) ?>
        <?= $this->Form->control('description', ['class' => 'form-control']) ?>
        <?= $this->Form->control('alt', ['class' => 'form-control']) ?>

        <h6><?= __('Remark') ?></h6>
        <p><?= __('Only update information of image. Can not edit image or change image. You must deleted this record and create new.') ?></p>
    </div>
    <div class="card-footer">
        <?= $this->Form->button(__('Save'), ['class' => 'btn btn-success']) ?>
        <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-link text-muted']) ?>
    </div>
</div>
<?= $this->Form->end() ?>