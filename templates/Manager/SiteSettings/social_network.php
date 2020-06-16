<h3 class="h3 mb-2 text-gray-800"><?= __('Site settings') ?> - <?= __('Social network') ?></h3>

<div class="row">
    <div class="col-12 col-lg-6">
        <?= $this->Form->create() ?>
        <?php $this->Form->setTemplates(
            ['inputContainer' => '<div class="form-group {{type}}{{required}}">{{content}}</div>']
        ) ?>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"><?= __('Settings information') ?></h6>
            </div>
            <div class="card-body">
                <?php foreach ($settings as $setting): ?>
                    <?= $this->Form->control("{$setting->id}.id", ['type' => 'hidden', 'value' => $setting->id]) ?>
                    <?= $this->Form->control("{$setting->id}.key_field", ['type' => 'hidden', 'value' => $setting->key_field]) ?>
                    <?= $this->Form->control("{$setting->id}.value_field", ['class' => 'form-control', 'label' => $fieldsText[$setting->id], 'value' => $setting->value_field]) ?>
                <?php endforeach ?>
            </div>
            <div class="card-footer d-flex justify-content-between">
                <?= $this->Form->button(__('Save'), ['class' => 'btn btn-primary']) ?>
                <?= $this->Html->link(__('Cancel'), ['action' => 'site'], ['class' => 'btn btn-link text-muted']) ?>
            </div>
        </div>
        <?= $this->Form->end() ?>
    </div>
</div>
