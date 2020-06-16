<h1 class="h3 mb-2 text-gray-800"><?= __('กลุ่มผลิตภัณฑ์') ?></h1>

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary"><?= __('รายการกลุ่มผลิตภัณฑ์') ?></h6>
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
                    <th><?= __('Parent') ?></th>
                    <th><?= __('โค้ด') ?></th>
                    <th><?= __('กลุ่ม') ?></th>
                    <th><?= __('แก้ไขล่าสุด') ?></th>
                    <th><?= __('เมนู') ?></th>
                </tr>
                </thead>
                <tbody>
                <?php
                $order = 1 ?>
                <?php
                foreach ($groups as $group): ?>
                    <tr>
                        <td><?= $order++ ?></td>
                        <td>
                            <?= $group->has('parent_product_group') ? $group->parent_product_group->name : '' ?>
                        </td>
                        <td><?= h($group->code) ?></td>
                        <td><?= h($group->name) ?></td>
                        <td><?= $this->Time->format($group->modified) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(
                                __('แก้ไข'),
                                ['action' => 'edit', $group->id],
                                ['class' => 'mr-3']
                            ) ?>
                            <?= $this->Form->postLink(
                                __('ลบ'),
                                ['action' => 'delete', $group->id],
                                [
                                    'class'   => 'text-danger',
                                    'confirm' => __('คุณต้องการลบข้อมูลนี้ใช่หรือไม่?'),
                                ]
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
