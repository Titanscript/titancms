<h1 class="h3 mb-2 text-gray-800"><?= __('การจัดการหมวดหมู่บทความ') ?></h1>

<?= $this->Form->create($articleCategory) ?>
<?php $this->Form->setTemplates(
    ['inputContainer' => '<div class="form-group input {{type}}{{required}}">{{content}}</div>']
) ?>
<div class="card shadow mb-4">
    <div class="card-header py-3"><?= __('ข้อมูลหมวดหมู่บทความ') ?></div>
    <div class="card-body">
        <ul class="nav nav-pills">
            <li class="nav-item">
                <?= $this->Html->link(
                    __('ไทย'),
                    "#",
                    ['class' => 'nav-link active']
                ) ?>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">English</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">日本語</a>
            </li>
        </ul>
        <hr>

        <?php
        echo $this->Form->control('name', ['class' => 'form-control', 'label' => __('ชื่อหมวดหมู่'), 'type' => 'text']);
        echo $this->Form->control('slug', ['class' => 'form-control', 'type' => 'text']);
        echo $this->Form->control('description', ['class' => 'form-control', 'label' => __('รายละเอียด')]);
        echo $this->Form->control('parent_id', ['options' => $parentArticleCategories, 'empty' => __('ไม่จำเป็น'), 'class' => 'form-control']);
        ?>
    </div>
    <div class="card-footer">
        <?= $this->Form->button(__('บันทึก'), ['class' => 'btn btn-success']) ?>
        <?= $this->Html->link(__('ยกเลิก'), ['action' => 'index'], ['class' => 'btn btn-link text-muted']) ?>
    </div>
</div>
<?= $this->Form->end() ?>