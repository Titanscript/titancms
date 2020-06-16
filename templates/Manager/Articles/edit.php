<h1 class="h3 mb-2 text-gray-800"><?= __('การจัดการบทความ') ?></h1>

<?= $this->Form->create($article) ?>
<?php $this->Form->setTemplates(
    ['inputContainer' => '<div class="form-group input {{type}}{{required}}">{{content}}</div>']
) ?>
<div class="card shadow mb-4">
    <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
                <?= $this->Html->link(__('ข้อมูลบทความ'), ['action' => 'edit', $article->id], ['class' => 'nav-link active']) ?>
            </li>
            <li class="nav-item">
                <?= $this->Html->link(
                    __('คุณลักษณะ'), ['action' => 'attribute', $article->id], ['class' => 'nav-link']
                ) ?>
            </li>
        </ul>
    </div>
    <div class="card-body">
        <ul class="nav nav-pills">
            <li class="nav-item">
                <?= $this->Html->link(
                    __('ไทย'),
                    ['action' => 'edit', $article->id],
                    ['class' => $locale === 'th_TH' ? 'nav-link active' : 'nav-link']
                ) ?>
            </li>
            <li class="nav-item">
                <?= $this->Html->link(
                    __('English'),
                    ['action' => 'edit', $article->id, 'en_US'],
                    ['class' => $locale === 'en_US' ? 'nav-link active' : 'nav-link']
                ) ?>
            </li>
            <li class="nav-item">
                <?= $this->Html->link(
                    __('日本語'),
                    ['action' => 'edit', $article->id, 'ja_JP'],
                    ['class' => $locale === 'ja_JP' ? 'nav-link active' : 'nav-link']
                ) ?>
            </li>
        </ul>
        <hr>

        <?= $this->Form->control('title', ['class' => 'form-control', 'type' => 'text', 'label' => __('ชื่อเรื่อง')]) ?>
        <?= $this->Form->control('article_category_id', ['class' => 'form-control', 'label' => __('หมวดหมู่')]) ?>
        <?= $this->Form->control('intro', ['class' => 'form-control', 'label' => __('เกรินนำ')]) ?>
        <?= $this->Form->control('body', ['class' => 'form-control', 'label' => __('เนื้อหา')]) ?>
        <?= $this->Form->control('tags', ['class' => 'form-control']) ?>
    </div>
    <div class="card-footer">
        <?= $this->Form->button(__('บันทึก'), ['class' => 'btn btn-success']) ?>
        <?= $this->Html->link(__('ยกเลิก'), ['action' => 'index'], ['class' => 'btn btn-link text-muted']) ?>
    </div>
</div>
<?= $this->Form->end() ?>