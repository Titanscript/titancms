<h1 class="h3 mb-2 text-gray-800"><?= __('การจัดการลูกค้า') ?></h1>

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary"><?= __('รายการลูค้า') ?></h6>
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
                    <th><?= __('ลูกค้า') ?></th>
                    <th><?= __('โลโก้') ?></th>
                    <th><?= __('แก้ไขล่าสุด') ?></th>
                    <th><?= __('เมนู') ?></th>
                </tr>
                </thead>
                <tbody>
                <?php
                $order = 1 ?>
                <?php
                foreach ($clients as $client): ?>
                    <tr>
                        <td><?= $order++ ?></td>
                        <td><?= $client->name ?></td>
                        <td><?= $this->Html->image($client->media->path, ['style' => 'height: 50px', 'pathPrefix' => 'storage/']) ?></td>
                        <td><?= $this->Time->format($client->modified) ?></td>
                        <td>
                            <?= $this->Html->link(
                                __('แก้ไข'),
                                ['action' => 'edit', $client->id],
                                ['class' => 'mr-3']
                            ) ?>
                            <?= $this->Form->postLink(
                                __('ลบ'),
                                ['action' => 'delete', $client->id],
                                ['class' => 'text-danger', 'confirm' => __('คุณต้องการลบข้อมูลนี้ใช่หรือไม่?')]
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