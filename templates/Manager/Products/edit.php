<h1 class="h3 mb-2 text-gray-800"><?= __('Products management') ?></h1>

<?= $this->Form->create($product) ?>
<?php $this->Form->setTemplates(
    ['inputContainer' => '<div class="form-group input {{type}}{{required}}">{{content}}</div>']
) ?>
<div class="card shadow mb-4">
    <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
                <?= $this->Html->link(__('Information'), ['action' => 'edit', $product->id], ['class' => 'nav-link active']) ?>
            </li>
            <li class="nav-item">
                <?= $this->Html->link(__('Attribute'), ['action' => 'attribute', $product->id], ['class' => 'nav-link']) ?>
            </li>
        </ul>
    </div>
    <div class="card-body">
        <?php
        echo $this->Form->control('sku', ['class' => 'form-control']);
        echo $this->Form->control('name', ['class' => 'form-control', 'type' => 'text']);
        echo $this->Form->control('subname', ['class' => 'form-control', 'type' => 'text']);
        echo $this->Form->control('description', ['class' => 'form-control']);
        echo $this->Form->control('unit_of_measure', ['class' => 'form-control']);
        echo $this->Form->control('price', ['class' => 'form-control', 'type' => 'number']);
        echo $this->Form->control('pack_size', ['class' => 'form-control']);
        echo $this->Form->control('dimension_group', ['class' => 'form-control']);
        echo $this->Form->control('warrant_terms', ['class' => 'form-control']);
        echo $this->Form->control('product_category_id', ['class' => 'form-control', 'empty' => __('Optional')]);
        echo $this->Form->control('product_group_id', ['class' => 'form-control', 'empty' => __('Optional')]);
        echo $this->Form->control('brand_id', ['class' => 'form-control', 'empty' => __('Optional')]);
        ?>
    </div>
    <div class="card-footer">
        <?= $this->Form->button(__('Save'), ['class' => 'btn btn-success']) ?>
        <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-link text-muted']) ?>
    </div>
</div>
<?= $this->Form->end() ?>