<h1 class="h3 mb-2 text-gray-800"><?= __('Articles management') ?></h1>

<div class="card shadow mb-4">
    <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
                <?= $this->Html->link(__('Information'), ['action' => 'edit', $article->id], ['class' => 'nav-link']) ?>
            </li>
            <li class="nav-item">
                <?= $this->Html->link(
                    __('Attribute'), ['action' => 'attribute', $article->id], ['class' => 'nav-link active']
                ) ?>
            </li>
        </ul>
    </div>
    <div class="card-body">
        <h1 class="h3 mb-2 text-gray-800"><?= __('Attribute: New') ?></h1>
        <?= $this->Form->create($attribute, ['type' => 'file']) ?>
        <?php $this->Form->setTemplates(
            ['inputContainer' => '<div class="form-group input {{type}}{{required}}">{{content}}</div>']
        ) ?>
        <div class="row">
            <div class="col">
                <?= $this->Form->control('name', ['class' => 'form-control']) ?>
                <?= $this->Form->control('image', ['class' => 'form-control-file', 'type' => 'file']) ?>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <?= $this->Form->button(__('Save'), ['class' => 'btn btn-success']) ?>
                <?= $this->Html->link(
                    __('Back'), ['action' => 'attribute', $article->id], ['class' => 'btn btn-link text-muted']
                ) ?>
            </div>
        </div>
        <?= $this->Form->end() ?>
    </div>
</div>