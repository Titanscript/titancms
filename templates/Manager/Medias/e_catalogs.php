<h1 class="h3 mb-2 text-gray-800"><?= __('e-Catalogs management') ?></h1>

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary"><?= __('Slider list') ?></h6>
        <a href="<?= $this->Url->build(['action' => 'eCatalogAdd']) ?>">
            <i class="fas fa-plus fa-sm fa-fw text-primary"></i> <?= __('Add') ?>
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable">
                <thead>
                <tr>
                    <th>#</th>
                    <th><?= __('Image') ?></th>
                    <th><?= __('Title') ?></th>
                    <th><?= __('Last modified') ?></th>
                    <th><?= __('Action') ?></th>
                </tr>
                </thead>
                <tbody>
                <?php $order = 1 ?>
                <?php foreach ($eCatalogs as $catalog): ?>
                    <tr>
                        <td><?= $order++ ?></td>
                        <td><?= $this->Html->image(
                                $catalog['path'], ['style' => 'height: 100px', 'pathPrefix' => 'storage/']
                            ) ?></td>
                        <td><?= $catalog['title'] ?></td>
                        <td><?= $this->Time->format($catalog['modified']) ?></td>
                        <td>
                            <?= $this->Html->link(
                                __('Edit'),
                                ['action' => 'eCatalogEdit', $catalog['id']],
                                ['class' => 'mr-3']
                            ) ?>
                            <?= $this->Form->postLink(
                                __('Delete'),
                                ['action' => 'eCatalogDelete', $catalog['id']],
                                ['class' => 'text-danger']
                            ) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>