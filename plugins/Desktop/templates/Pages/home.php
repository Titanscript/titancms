<div class="g-brd-bottom g-brd-gray-light-v4">
    <div class="container g-py-30">
        <div class="row justify-content-center">
            <div class="col-md-3 mx-auto g-py-15">
                <!-- Media -->
                <div class="media g-px-50--lg">
                    <i class="d-flex g-color-black g-font-size-30 g-pos-rel g-top-3 mr-4 fab fa-line"></i>
                    <div class="media-body">
                        <a class="d-block g-color-text g-color-primary--hover g-text-underline--none--hover g-py-5" href="<?= $siteSettings['social_line_official_url'] ?>" target="_blank">
                            <span class="d-block g-font-weight-500 g-font-size-default text-uppercase">LINE official account</span>
                            <span class="d-block g-color-gray-dark-v4"><?= $siteSettings['social_line_official_account'] ?></span>
                        </a>
                    </div>
                </div>
                <!-- End Media -->
            </div>

            <div class="col-md-3 mx-auto g-brd-x--md g-brd-gray-light-v3 g-py-15">
                <!-- Media -->
                <div class="media g-px-50--lg">
                    <i class="d-flex g-color-black g-font-size-30 g-pos-rel g-top-3 mr-4 fab fa-facebook-square"></i>
                    <div class="media-body">
                        <a class="d-block g-color-text g-color-primary--hover g-text-underline--none--hover g-py-5" href="<?= $siteSettings['social_facebook_url'] ?>" target="_blank">
                            <span class="d-block g-font-weight-500 g-font-size-default text-uppercase">Facebook</span>
                            <span class="d-block g-color-gray-dark-v4"><?= $siteSettings['social_facebook_account'] ?></span>
                        </a>
                    </div>
                </div>
                <!-- End Media -->
            </div>

            <div class="col-md-3 mx-auto g-brd-x--md g-brd-gray-light-v3 g-py-15">
                <!-- Media -->
                <div class="media g-px-50--lg">
                    <i class="d-flex g-color-black g-font-size-30 g-pos-rel g-top-3 mr-4 icon-electronics-042 u-line-icon-pro"></i>
                    <div class="media-body">
                        <span class="d-block g-font-weight-500 g-font-size-default text-uppercase">เบอร์โทรศัพท์ติดต่อ</span>
                        <span class="d-block g-color-gray-dark-v4">
                            <?= $siteSettings['company_phone'] ?>
                        </span>
                    </div>
                </div>
                <!-- End Media -->
            </div>

            <!-- Media -->
            <div class="col-md-3 mx-auto g-py-15">
                <div class="media g-px-50--lg">
                    <i class="d-flex g-color-black g-font-size-30 g-pos-rel g-top-3 mr-4 icon-communication-061 u-line-icon-pro"></i>
                    <div class="media-body text-left">
                        <span class="d-block g-font-weight-500 g-font-size-default text-uppercase">อีเมล</span>
                        <span class="d-block g-color-gray-dark-v4"><?= $siteSettings['company_email'] ?></span>
                    </div>
                </div>
                <!-- End Media -->
            </div>
        </div>
    </div>
</div>

<?= $this->cell('ProductCategories') ?>

<?= $this->cell('Client') ?>

<section class="g-flex-centered g-height-500 g-bg-img-hero g-py-30 g-bg-lightblue">
    <div class="container">
        <div class="row">
            <div class="col-md-6 align-self-center g-py-20">
                <h2 class="h4 text-uppercase g-letter-spacing-1 g-mb-20"><?= $siteSettings['company_name'] ?></h2>
                <p class="lead mb-0 g-line-height-2">
                    <?= $siteSettings['company_about'] ?>
                </p>
            </div>

            <div class="col-md-6 align-self-center g-py-20">
                <img class="w-100" src="https://picsum.photos/400/270" alt="Iamge Description">
            </div>
        </div>
    </div>
</section>

<?= $this->cell('Blogs') ?>