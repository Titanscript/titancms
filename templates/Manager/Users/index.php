<h1 class="h3 mb-2 text-gray-800"><?= __('Users management') ?></h1>

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary"><?= __('User list') ?></h6>
        <a href="<?= $this->Url->build(['action' => 'add']) ?>">
            <i class="fas fa-plus fa-sm fa-fw text-primary"></i> <?= __('Add') ?>
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>#</th>
                    <th><?= __('Username') ?></th>
                    <th><?= __('e-Mail') ?></th>
                    <th><?= __('Full name') ?></th>
                    <th><?= __('Role') ?></th>
                    <th><?= __('Last modified') ?></th>
                    <th><?= __('Actions') ?></th>
                </tr>
                </thead>
                <tbody>
                <?php $order = 1 ?>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= $order++ ?></td>
                        <td><?= $user->username ?></td>
                        <td><?= $user->email ?></td>
                        <td><?= h($user->full_name) ?></td>
                        <td><?= $user->role ?></td>
                        <td><?= $this->Time->format($user->modified) ?></td>
                        <td>
                            <?= $this->Html->link(
                                __('Edit'),
                                ['action' => 'edit', $user->id],
                                ['class' => 'mr-3']
                            ) ?>
                            <?= $this->Html->link(
                                __('Delete'),
                                ['action' => 'delete', $user->id],
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