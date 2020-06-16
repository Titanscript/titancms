<h1 class="h3 mb-2 text-gray-800"><?= __('การจัดการหมวดหมู่ผลิตภัณฑ์') ?></h1>

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary"><?= __('รายการหมวดหมู่ผลิตภัณฑ์') ?></h6>
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
                    <th><?= __('หมวดหมู่') ?></th>
                    <th><?= __('แก้ไขล่าสุด') ?></th>
                    <th><?= __('เมนู') ?></th>
                </tr>
                </thead>
                <tbody>
                <?php $order = 1 ?>
                <?php foreach ($categories as $category): ?>
                    <tr>
                        <td><?= $order++ ?></td>
                        <td>
                            <?= $category->has('parent_product_category') ? $category->parent_product_category->name : '' ?>
                        </td>
                        <td><?= h($category->code) ?></td>
                        <td><?= h($category->name) ?></td>
                        <td><?= $this->Time->format($category->modified) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(
                                __('แก้ไข'),
                                ['action' => 'edit', $category->id],
                                ['class' => 'mr-3']
                            ) ?>
                            <?= $this->Form->postLink(
                                __('ลบ'),
                                ['action' => 'delete', $category->id],
                                [
                                    'class'   => 'text-danger',
                                    'confirm' => __('คุณต้องการลบข้อมูลนี้ใช่หรือไม่?'),
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
