<h1 class="h3 mb-2 text-gray-800"><?= __('Pages management') ?></h1>

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary"><?= __('Pages list') ?></h6>
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
                    <th><?= __('Page') ?></th>
                    <th><?= __('Status') ?></th>
                    <th><?= __('Last modified') ?></th>
                    <th><?= __('Actions') ?></th>
                </tr>
                </thead>
                <tbody>
                <?php $order = 1 ?>
                <?php foreach ($pages as $page): ?>
                    <tr>
                        <td><?= $order++ ?></td>
                        <td><?= $page->name ?></td>
                        <td><?= $page->status ?></td>
                        <td><?= $this->Time->format($page->modified) ?></td>
                        <td>
                            <?= $this->Html->link(
                                __('Edit'),
                                ['action' => 'edit', $page->id],
                                ['class' => 'mr-3']
                            ) ?>
                            <?= $this->Form->postLink(
                                __('Delete'),
                                ['action' => 'delete', $page->id],
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