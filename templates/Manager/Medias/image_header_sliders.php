<h1 class="h3 mb-2 text-gray-800"><?= __('Image header sliders management') ?></h1>

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary"><?= __('Slider list') ?></h6>
        <a href="<?= $this->Url->build(['action' => 'imageHeaderSliderAdd']) ?>">
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
                    <th><?= __('Description') ?></th>
                    <th><?= __('Actions') ?></th>
                </tr>
                </thead>
                <tbody>
                <?php $order = 1 ?>
                <?php foreach ($sliders as $slider): ?>
                    <tr>
                        <td><?= $order++ ?></td>
                        <td><?= $this->Html->image($slider->path, ['style' => 'height: 100px', 'pathPrefix' => 'storage/']) ?></td>
                        <td><?= $slider->title ?></td>
                        <td><?= $slider->description ?></td>
                        <td>
                            <?= $this->Html->link(
                                __('Edit'),
                                ['action' => 'imageHeaderSliderEdit', $slider->id],
                                ['class' => 'mr-3']
                            ) ?>
                            <?= $this->Form->postLink(
                                __('Delete'),
                                ['action' => 'imageHeaderSliderDelete', $slider->id],
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