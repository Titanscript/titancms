<h1 class="h3 mb-2 text-gray-800"><?= __('การจัดการบทความ') ?></h1>

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary"><?= __('รายการบทความ') ?></h6>
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
                    <th><?= __('บทความ') ?></th>
                    <th><?= __('สถานะ') ?></th>
                    <th><?= __('แก้ไขล่าสุด') ?></th>
                    <th><?= __('เมนู') ?></th>
                </tr>
                </thead>
                <tbody>
                <?php $order = 1 ?>
                <?php foreach ($articles as $article): ?>
                    <tr>
                        <td><?= $order++ ?></td>
                        <td><?= $article->title ?></td>
                        <td><?= $article->status ?></td>
                        <td><?= $this->Time->format($article->modified) ?></td>
                        <td>
                            <?= $this->Html->link(
                                __('แก้ไข'),
                                ['action' => 'edit', $article->id],
                                ['class' => 'mr-3']
                            ) ?>
                            <?= $this->Form->postLink(
                                __('ลบ'),
                                ['action' => 'delete', $article->id],
                                ['class' => 'text-danger', 'confirm' => __('คุณต้องการลบข้อมูลนี้ใช่หรือไม่?')]
                            ) ?>
                        </td>
                    </tr>
                <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>