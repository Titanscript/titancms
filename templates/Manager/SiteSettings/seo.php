<h3 class="h3 mb-2 text-gray-800"><?= __('การตั้งค่าเว็บไซต์') ?> - <?= __('SEO') ?></h3>

<div class="row">
    <div class="col-12 col-lg-6">
        <?= $this->Form->create() ?>
        <?php $this->Form->setTemplates(
            ['inputContainer' => '<div class="form-group {{type}}{{required}}">{{content}}</div>']
        ) ?>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"><?= __('ข้อมูลการตั้งค่า') ?></h6>
            </div>
            <div class="card-body">
                <?php foreach ($settings as $setting): ?>
                    <?= $this->Form->control("{$setting->id}.id", ['type' => 'hidden', 'value' => $setting->id]) ?>
                    <?= $this->Form->control("{$setting->id}.key_field", ['type' => 'hidden', 'value' => $setting->key_field]) ?>
                    <?= $this->Form->control("{$setting->id}.value_field", ['class' => 'form-control', 'label' => $fieldsText[$setting->id], 'value' => $setting->value_field]) ?>
                <?php endforeach ?>
            </div>
            <div class="card-footer d-flex justify-content-between">
                <?= $this->Form->button(__('บันทึก'), ['class' => 'btn btn-primary']) ?>
                <?= $this->Html->link(__('ยกเลิก'), ['action' => 'site'], ['class' => 'btn btn-link text-muted']) ?>
            </div>
        </div>
        <?= $this->Form->end() ?>
    </div>
    <div class="col-12 col-lg-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"><?= __('ช่วยเหลือ') ?></h6>
            </div>
            <div class="card-body">
                <h6>SEO Title is:</h6>
                <ul>
                    <li><b>SERPs</b> – here is the place where the user decides to click or not to click</li>
                    <li><b>Web-browser tabs</b> – the visibility in this place is especially important when users have about a million open tabs in their browser (yes, you are not alone)</li>
                    <li>The title is keyword-stuffed - please <b>do not stuff your titles with a million keywords</b></li>
                    <li>length under 70 characters long</li>
                </ul>

                <h6>SEO Description is:</h6>
                <ul>
                    <li><b>SERPs</b> – meta description occupies the largest part of a SERP snippet</li>
                    <li><b>Description length</b> the safest way is still stick to <b>~300 characters</b> and keep an eye on the latest findings on this subject.</li>
                    <li>Remember that search engines bold query's keywords in the descriptions. Such bolded words draw users' attention. So, optimizing your meta description for target keywords is still quite important.</li>
                </ul>
            </div>
        </div>
    </div>
</div>
