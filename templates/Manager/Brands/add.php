<h1 class="h3 mb-2 text-gray-800"><?= __('Brands management') ?></h1>

<?= $this->Form->create($brand) ?>
<?php $this->Form->setTemplates(
    ['inputContainer' => '<div class="form-group input {{type}}{{required}}">{{content}}</div>']
) ?>
<div class="card shadow mb-4">
    <div class="card-header py-3"><?= __('Brand information') ?></div>
    <div class="card-body">
        <?= $this->Form->control('brand_manufacturer_id', ['class' => 'form-control', 'empty' => __('Optional')]) ?>
        <?= $this->Form->control('name', ['class' => 'form-control']) ?>
        <?= $this->Form->control('code', ['class' => 'form-control']) ?>
        <?= $this->Form->control('description', ['class' => 'form-control']) ?>
    </div>
    <div class="card-footer">
        <?= $this->Form->button(__('Save'), ['class' => 'btn btn-success']) ?>
        <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-link text-muted']) ?>
    </div>
</div>
<?= $this->Form->end() ?>