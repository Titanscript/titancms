<h1 class="h3 mb-2 text-gray-800"><?= __('Articles management') ?></h1>

<?= $this->Form->create($article) ?>
<?php $this->Form->setTemplates(
    ['inputContainer' => '<div class="form-group input {{type}}{{required}}">{{content}}</div>']
) ?>
<div class="card shadow mb-4">
    <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
                <a class="nav-link active" href="#"><?= __('Information') ?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true"><?= __('Attribute') ?></a>
            </li>
        </ul>
    </div>
    <div class="card-body">
        <?= $this->Form->control('title', ['class' => 'form-control', 'type' => 'text']) ?>
        <?= $this->Form->control('article_category_id', ['class' => 'form-control']) ?>
        <?= $this->Form->control('intro', ['class' => 'form-control']) ?>
        <?= $this->Form->control('body', ['class' => 'form-control']) ?>
        <?= $this->Form->control('tags', ['class' => 'form-control']) ?>
    </div>
    <div class="card-footer">
        <?= $this->Form->button(__('Save'), ['class' => 'btn btn-success']) ?>
        <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-link text-muted']) ?>
    </div>
</div>
<?= $this->Form->end() ?>