<h1 class="h3 mb-2 text-gray-800"><?= __('Brands management') ?></h1>

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary"><?= __('Brand list') ?></h6>
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
                    <th><?= __('Manufacturer') ?></th>
                    <th><?= __('Brand') ?></th>
                    <th><?= __('Code') ?></th>
                    <th><?= __('Last modified') ?></th>
                    <th><?= __('Actions') ?></th>
                </tr>
                </thead>
                <tbody>
                <?php $order = 1 ?>
                <?php foreach ($brands as $brand): ?>
                    <tr>
                        <td><?= $order++ ?></td>
                        <td><?= $brand->has('brand_manufacturer') ? $brand->brand_manufacturer->name : '' ?></td>
                        <td><?= $brand->name ?></td>
                        <td><?= $brand->code ?></td>
                        <td><?= $this->Time->format($brand->modified) ?></td>
                        <td>
                            <?= $this->Html->link(
                                __('Edit'),
                                ['action' => 'edit', $brand->id],
                                ['class' => 'mr-3']
                            ) ?>
                            <?= $this->Form->postLink(
                                __('Delete'),
                                ['action' => 'delete', $brand->id],
                                ['class' => 'text-danger', 'confirm' => __('Do you want to deleted this data?')]
                            ) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>