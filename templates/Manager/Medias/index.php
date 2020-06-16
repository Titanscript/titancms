<h1 class="h3 mb-2 text-gray-800"><?= __('การจัดการคลังสื่อ') ?></h1>

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary"><?= __('รายการสื่อ') ?></h6>
        <a href="<?= $this->Url->build(['action' => 'add']) ?>">
            <i class="fas fa-plus fa-sm fa-fw text-primary"></i> <?= __('เพิ่ม') ?>
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable">
                <thead>
                <tr>
                    <th>#</th>
                    <th><?= __('สื่อ') ?></th>
                    <th><?= __('รายละเอียด') ?></th>
                    <th><?= __('แก้ไขล่าสุด') ?></th>
                    <th><?= __('เมนู') ?></th>
                </tr>
                </thead>
                <tbody>
                <?php
                $order = 1 ?>
                <?php
                foreach ($medias as $media): ?>
                    <tr>
                        <td><?= $order++ ?></td>
                        <td>
                            <?= $this->Html->image(
                                $media->path,
                                ['style' => 'height: 100px', 'pathPrefix' => 'storage/']
                            ) ?>
                        </td>
                        <td>
                            File name: <?= $media->filename ?><br/>
                            Path: <?= $media->path ?><br/>
                            description: <?= $media->descirption ?><br/>
                            alt: <?= $media->alt ?><br/>
                        </td>
                        <td><?= $this->Time->format($media->modified) ?></td>
                        <td>
                            <?= $this->Html->link(
                                __('แก้ไข'),
                                ['action' => 'edit', $media->id],
                                ['class' => 'mr-3']
                            ) ?>
                            <?= $this->Form->postLink(
                                __('ลบ'),
                                ['action' => 'delete', $media->id],
                                ['class' => 'text-danger']
                            ) ?>
                        </td>
                    </tr>
                <?php
                endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>