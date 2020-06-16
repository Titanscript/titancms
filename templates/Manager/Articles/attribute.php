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
        <?= $this->Html->link(
            __('New attribute header'),
            ['action' => 'addAttributeHeader', $article->id],
            ['class' => 'btn btn-primary mb-3']
        ) ?>
        <?php foreach ($article->article_attribute_headers as $header): ?>
            <?php if ($header->name === 'images'): ?>
                <div class="card mb-3">
                    <div class="card-header"><?= $header->name ?></div>
                    <div class="card-body">
                        <?= $this->Html->link(
                            __('New image'), ['action' => 'addAttributeImage', $article->id, $header->id],
                            ['class' => 'btn btn-primary mb-3']
                        ) ?>

                        <div class="table-responsive">
                            <table class="table table-sm table-bordered text-sm">
                                <thead>
                                <tr>
                                    <th><?= __('Name') ?></th>
                                    <th><?= __('Image') ?></th>
                                    <th><?= __('Action') ?></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($header->article_attributes as $attribute): ?>
                                    <tr>
                                        <td><?= $attribute->name ?></td>
                                        <td><?= $this->Html->image($attribute->value, ['class' => 'img-fluid', 'style' => 'height: 100px']) ?></td>
                                        <td>
                                            <?= $this->Form->postLink(
                                                __('Delete'),
                                                ['action' => 'deleteAttributeImage', $article->id, $attribute->id],
                                                ['class' => 'text-danger']
                                            ) ?>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <div class="card">
                    <div class="card-header"><?= $header->name ?></div>
                    <div class="card-body">
                        <?= $this->Html->link(
                            __('New attribute'), ['action' => 'addAttribute', $article->id, $header->id],
                            ['class' => 'btn btn-primary']
                        ) ?>
                        <?= $this->Form->postLink(
                            __('Remove attribute header'),
                            ['action' => 'deleteAttributeHeader', $article->id, $header->id],
                            ['class' => 'btn btn-danger']
                        ) ?>

                        <div class="table-responsive mt-3">
                            <table class="table table-sm table-bordered text-sm">
                                <thead>
                                <tr>
                                    <th><?= __('Name') ?></th>
                                    <th><?= __('Value') ?></th>
                                    <th><?= __('Action') ?></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($header->article_attributes as $attribute): ?>
                                    <tr>
                                        <td><?= $attribute->name ?></td>
                                        <td><?= $attribute->value ?></td>
                                        <td>
                                            <?= $this->Html->link(
                                                __('Edit'),
                                                ['action' => 'editAttribute', $article->id, $attribute->id],
                                                ['class' => 'mr-3']
                                            ) ?>
                                            <?= $this->Form->postLink(
                                                __('Delete'),
                                                ['action' => 'deleteAttribute', $article->id, $attribute->id],
                                                ['class' => 'text-danger']
                                            ) ?>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            <?php endif ?>
        <?php endforeach ?>
    </div>
</div>