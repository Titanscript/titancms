<h1 class="h3 mb-2 text-gray-800"><?= __('การจัดการบทความ') ?></h1>

<div class="card shadow mb-4">
    <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
                <?= $this->Html->link(__('ข้อมูลบทความ'), ['action' => 'edit', $article->id], ['class' => 'nav-link']) ?>
            </li>
            <li class="nav-item">
                <?= $this->Html->link(
                    __('คุณลักษณะ'), ['action' => 'attribute', $article->id], ['class' => 'nav-link active']
                ) ?>
            </li>
        </ul>
    </div>
    <div class="card-body">
        <h1 class="h3 mb-2 text-gray-800"><?= __('หัวข้อคุณลักษณะ: แก้ไข') ?></h1>
        <?= $this->Form->create($attribute) ?>
        <?php $this->Form->setTemplates(
            ['inputContainer' => '<div class="form-group input {{type}}{{required}}">{{content}}</div>']
        ) ?>
        <div class="row">
            <div class="col">
                <?= $this->Form->control('name', ['class' => 'form-control', 'label' => __('ชื่อหัวข้อ')]) ?>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <?= $this->Form->button(__('บันทึก'), ['class' => 'btn btn-success']) ?>
                <?= $this->Html->link(__('ยกเลิก'), ['action' => 'attribute', $article->id], ['class' => 'btn btn-link text-muted']) ?>
            </div>
        </div>
        <?= $this->Form->end() ?>
    </div>
</div>