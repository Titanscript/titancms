<h1 class="h3 mb-2 text-gray-800"><?= __('Product groups management') ?></h1>

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary"><?= __('Product group list') ?></h6>
        <a href="<?= $this->Url->build(['action' => 'add']) ?>">
            <i class="fas fa-plus fa-sm fa-fw text-primary"></i> <?= __('Add') ?>
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable">
                <thead>
                <tr>
                    <th>#</th>
                    <th><?= __('Parent') ?></th>
                    <th><?= __('Group') ?></th>
                    <th><?= __('Code') ?></th>
                    <th><?= __('Last modified') ?></th>
                    <th><?= __('Actions') ?></th>
                </tr>
                </thead>
                <tbody>
                <?php $order = 1 ?>
                <?php foreach ($groups as $group): ?>
                    <tr>
                        <td><?= $order++ ?></td>
                        <td>
                            <?= $group->has('parent_product_group') ? $group->parent_product_group->name : '' ?>
                        </td>
                        <td><?= h($group->name) ?></td>
                        <td><?= h($group->code) ?></td>
                        <td><?= $this->Time->format($group->modified) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(
                                __('Edit'),
                                ['action' => 'edit', $group->id],
                                ['class' => 'mr-3']
                            ) ?>
                            <?= $this->Form->postLink(
                                __('Delete'),
                                ['action' => 'delete', $group->id],
                                [
                                    'class'   => 'text-danger',
                                    'confirm' => __('Are you sure you want to delete this data?'),
                                ]
                            ) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
