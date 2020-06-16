<div class="row justify-content-center">
    <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg-6 d-none d-lg-block">
                        <img src="https://picsum.photos/465/350" alt="">
                    </div>
                    <div class="col-lg-6">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Welcome Man!</h1>
                            </div>
                            <?= $this->Form->create(null, ['class' => 'user']) ?>
                                <div class="form-group">
                                    <input name="email" type="email" class="form-control form-control-user"
                                           id="exampleInputEmail" aria-describedby="emailHelp" placeholder="<?= __('กรุณาระบุอีเมล') ?>">
                                </div>
                                <div class="form-group">
                                    <input name="password" type="password" class="form-control form-control-user"
                                           id="exampleInputPassword" placeholder="<?= __('กรอกรหัสผ่าน') ?>">
                                </div>
                                <?= $this->Form->button(__('เข้าสู่ระบบ'), ['class' => 'btn btn-primary btn-user btn-block']) ?>
                            <?= $this->Form->end() ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>