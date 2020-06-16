<!-- Footer -->
<footer class="g-bg-main-light-v1">
    <!-- Content -->
    <div class="g-brd-bottom g-brd-secondary-light-v1">
        <div class="container g-pt-100">
            <div class="row justify-content-start g-mb-30 g-mb-0--md">
                <?= $this->cell('ProductCategoryFooterMenu') ?>
                <?= $this->cell('BrandsFooterMenu') ?>

                <div class="col-sm-5 col-md-3 ml-auto g-mb-30 g-mb-0--sm">
                    <h2 class="h5 g-color-gray-light-v3 mb-4">ติดต่อ</h2>

                    <!-- Links -->
                    <ul class="list-unstyled g-color-gray-dark-v5 g-font-size-13">
                        <li class="media my-3">
                            <i class="d-flex mt-1 mr-3 icon-hotel-restaurant-235 u-line-icon-pro"></i>
                            <div class="media-body">
                                <?= nl2br($siteSettings['company_address']) ?>
                            </div>
                        </li>
                        <li class="media my-3">
                            <i class="d-flex mt-1 mr-3 icon-communication-062 u-line-icon-pro"></i>
                            <div class="media-body">
                                <?= $siteSettings['company_email'] ?>
                            </div>
                        </li>
                        <li class="media my-3">
                            <i class="d-flex mt-1 mr-3 icon-communication-033 u-line-icon-pro"></i>
                            <div class="media-body">
                                <?= $siteSettings['company_phone'] ?>
                            </div>
                        </li>
                    </ul>
                    <!-- End Links -->
                </div>
            </div>

            <!-- Secondary Content -->
            <div class="row">
                <div class="col-md-4 g-mb-50">
                    <h2 class="h5 g-color-gray-light-v3 mb-4">ลิงค์</h2>

                    <!-- Links -->
                    <ul class="list-unstyled g-font-size-13 mb-0">
                        <li class="g-mb-10">
                            <a class="u-link-v5 g-color-gray-dark-v5 g-color-primary--hover"
                               href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'about']) ?>">
                                <?= __('About') ?>
                            </a>
                        </li>
                    </ul>
                    <!-- End Links -->
                </div>

                <div class="col-6 col-md-3 offset-lg-1 g-mb-30">

                </div>

                <div class="col-6 col-md-3 ml-auto g-mb-30">
                    <h2 class="h5 g-color-gray-light-v3 mb-4">Follow Us On:</h2>

                    <!-- Social Icons -->
                    <ul class="list-inline mb-50">
                        <li class="list-inline-item g-mr-2">
                            <a class="u-icon-v1 u-icon-slide-up--hover g-color-gray-dark-v4 g-color-white--hover g-bg-facebook--hover rounded" href="#">
                                <i class="g-font-size-18 g-line-height-1 u-icon__elem-regular fa fa-facebook"></i>
                                <i class="g-color-white g-font-size-18 g-line-height-0_8 u-icon__elem-hover fa fa-facebook"></i>
                            </a>
                        </li>
                        <li class="list-inline-item g-mx-2">
                            <a class="u-icon-v1 u-icon-slide-up--hover g-color-gray-dark-v4 g-color-white--hover g-bg-twitter--hover rounded" href="#">
                                <i class="g-font-size-18 g-line-height-1 u-icon__elem-regular fa fa-twitter"></i>
                                <i class="g-color-white g-font-size-18 g-line-height-0_8 u-icon__elem-hover fa fa-twitter"></i>
                            </a>
                        </li>
                        <li class="list-inline-item g-mx-2">
                            <a class="u-icon-v1 u-icon-slide-up--hover g-color-gray-dark-v4 g-color-white--hover g-bg-instagram--hover rounded" href="#">
                                <i class="g-font-size-18 g-line-height-1 u-icon__elem-regular fa fa-instagram"></i>
                                <i class="g-color-white g-font-size-18 g-line-height-0_8 u-icon__elem-hover fa fa-instagram"></i>
                            </a>
                        </li>
                        <li class="list-inline-item g-mx-2">
                            <a class="u-icon-v1 u-icon-slide-up--hover g-color-gray-dark-v4 g-color-white--hover g-bg-linkedin--hover rounded" href="#">
                                <i class="g-font-size-18 g-line-height-1 u-icon__elem-regular fa fa-linkedin"></i>
                                <i class="g-color-white g-font-size-18 g-line-height-0_8 u-icon__elem-hover fa fa-linkedin"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- End Social Icons -->
                </div>
            </div>
            <!-- End Secondary Content -->
        </div>
    </div>
    <!-- End Content -->

    <!-- Copyright -->
    <div class="container g-pt-30 g-pb-10">
        <div class="row justify-content-between align-items-center">
            <div class="col-md-6 g-mb-20">
                <p class="g-font-size-13 mb-0"><?= date('Y') ?> &copy; TITA engineering. All Rights Reserved.</p>
            </div>
        </div>
    </div>
    <!-- End Copyright -->
</footer>
<!-- End Footer -->

<!-- Go To Top -->
<a class="js-go-to u-go-to-v2" href="#"
   data-type="fixed"
   data-position='{
           "bottom": 15,
           "right": 15
         }'
   data-offset-top="400"
   data-compensation="#js-header"
   data-show-effect="zoomIn">
    <i class="hs-icon hs-icon-arrow-top"></i>
</a>
<!-- End Go To Top -->