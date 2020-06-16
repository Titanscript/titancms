<h1 class="h3 mb-2 text-gray-800"><?= __('Partners management') ?></h1>

<?= $this->Form->create($partner, ['type' => 'file']) ?>
<?php $this->Form->setTemplates(
    ['inputContainer' => '<div class="form-group input {{type}}{{required}}">{{content}}</div>']
) ?>
<div class="card shadow mb-4">
    <div class="card-header py-3"><?= __('Partners information') ?></div>
    <div class="card-body">
        <?= $this->Form->control('name', ['class' => 'form-control']) ?>
        <?php if (empty($partner->image_url)): ?>
            <?= $this->Form->control('image', ['class' => 'form-control']) ?>
        <?php else: ?>
            <?= $this->Html->image($partner->media->path, ['style' => 'height: 100px', 'pathPrefix' => 'storage/']) ?>
        <?php endif ?>
        <?= $this->Html->link(__('Delete'), ['action' => 'deleteImage', $partner->id], ['class' => 'btn btn-danger']) ?>
    </div>
    <div class="card-footer">
        <?= $this->Form->button(__('Save'), ['class' => 'btn btn-success']) ?>
        <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-link text-muted']) ?>
    </div>
</div>
<?= $this->Form->end() ?>