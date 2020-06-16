<h1 class="h3 mb-2 text-gray-800"><?= __('Article categories management') ?></h1>

<?= $this->Form->create($articleCategory) ?>
<?php $this->Form->setTemplates(
    ['inputContainer' => '<div class="form-group input {{type}}{{required}}">{{content}}</div>']
) ?>
<div class="card shadow mb-4">
    <div class="card-header py-3"><?= __('Article category information') ?></div>
    <div class="card-body">
        <?php
        echo $this->Form->control('name', ['class' => 'form-control', 'type' => 'text']);
        echo $this->Form->control('description', ['class' => 'form-control']);
        echo $this->Form->control('parent_id', ['options' => $parentArticleCategories, 'empty' => __('Optional'), 'class' => 'form-control']);
        ?>
    </div>
    <div class="card-footer">
        <?= $this->Form->button(__('Save'), ['class' => 'btn btn-success']) ?>
        <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-link text-muted']) ?>
    </div>
</div>
<?= $this->Form->end() ?>