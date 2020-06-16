<h1 class="h3 mb-2 text-gray-800"><?= __('การจัดการผลิตภัณฑ์') ?></h1>

<?= $this->Form->create($product) ?>
<?php $this->Form->setTemplates(
    ['inputContainer' => '<div class="form-group input {{type}}{{required}}">{{content}}</div>']
) ?>
<div class="card shadow mb-4">
    <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
                <a class="nav-link active" href="#"><?= __('ข้อมูลผลิตภัณฑ์') ?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true"><?= __('คุณลักษณะ') ?></a>
            </li>
        </ul>
    </div>
    <div class="card-body">
        <?php
        echo $this->Form->control('sku', ['class' => 'form-control']);
        echo $this->Form->control('name', ['class' => 'form-control', 'type' => 'text', 'label' => __('ชื่อ')]);
        echo $this->Form->control('subname', ['class' => 'form-control', 'type' => 'text']);
        echo $this->Form->control('description', ['class' => 'form-control', 'label' => __('รายละเอียด')]);
        echo $this->Form->control('unit_of_measure', ['class' => 'form-control', 'label' => __('หน่วยนับ')]);
        echo $this->Form->control('price', ['class' => 'form-control', 'type' => 'number', __('ราคา')]);
        echo $this->Form->control('pack_size', ['class' => 'form-control']);
        echo $this->Form->control('dimension_group', ['class' => 'form-control']);
        echo $this->Form->control('warrant_terms', ['class' => 'form-control']);
        echo $this->Form->control('product_category_id', ['class' => 'form-control', 'empty' => __('ไม่จำเป็น'), 'label' => __('หมวดหมู่')]);
        echo $this->Form->control('product_group_id', ['class' => 'form-control', 'empty' => __('ไม่จำเป็น'), 'label' => __('กลุ่ม')]);
        echo $this->Form->control('brand_id', ['class' => 'form-control', 'empty' => __('ไม่จำเป็น'), 'label' => __('แบรนด์')]);
        ?>
    </div>
    <div class="card-footer">
        <?= $this->Form->button(__('บันทึก'), ['class' => 'btn btn-success']) ?>
        <?= $this->Html->link(__('ยกเลิก'), ['action' => 'index'], ['class' => 'btn btn-link text-muted']) ?>
    </div>
</div>
<?= $this->Form->end() ?>