<!-- Header -->
<header id="js-header" class="u-header u-header--static u-shadow-v19">
    <!-- Top Bar -->
    <div class="u-header__section g-brd-bottom g-brd-gray-light-v4 g-bg-black g-transition-0_3">
        <div class="container">
            <div class="row justify-content-between align-items-center g-mx-0--lg">
                <div class="col-sm-auto g-hidden-sm-down">
                    <!-- Social Icons -->
                    <ul class="list-inline g-py-14 mb-0">
                        <li class="list-inline-item">
                            <a class="g-color-white-opacity-0_8 g-color-primary--hover g-pa-3" href="#">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a class="g-color-white-opacity-0_8 g-color-primary--hover g-pa-3" href="#">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a class="g-color-white-opacity-0_8 g-color-primary--hover g-pa-3" href="#">
                                <i class="fab fa-tumblr"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a class="g-color-white-opacity-0_8 g-color-primary--hover g-pa-3" href="#">
                                <i class="fab fa-pinterest-p"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- End Social Icons -->
                </div>

                <div class="col-sm-auto g-hidden-sm-down g-color-white-opacity-0_6 g-font-weight-400 g-pl-15 g-pl-0--sm g-py-14">
                    <i class="icon-communication-163 u-line-icon-pro g-font-size-18 g-valign-middle g-color-white-opacity-0_8 g-mr-10 g-mt-minus-2"></i>
                    <?= $siteSettings['company_phone'] ?>
                </div>

                <div class="col-sm-auto g-pos-rel g-py-14">

                </div>

                <div class="col-sm-auto g-pr-15 g-pr-0--sm">
                    <!-- Search -->
                    <div class="d-inline-block g-valign-middle">
                        <div class="g-py-10 g-pl-15">
                            <a href="#" class="g-color-white-opacity-0_8 g-color-primary--hover g-font-size-17 g-text-underline--none--hover"
                               aria-haspopup="true"
                               aria-expanded="false"
                               data-dropdown-event="click"
                               aria-controls="searchform-1"
                               data-dropdown-target="#searchform-1"
                               data-dropdown-type="css-animation"
                               data-dropdown-duration="300"
                               data-dropdown-animation-in="fadeInUp"
                               data-dropdown-animation-out="fadeOutDown">
                                <i class="g-pos-rel g-top-3 icon-education-045 u-line-icon-pro"></i>
                            </a>
                        </div>

                        <!-- Search Form -->
                        <form id="searchform-1" class="u-searchform-v1 u-dropdown--css-animation u-dropdown--hidden u-shadow-v20 g-brd-around g-brd-gray-light-v4 g-bg-white g-right-0 rounded g-pa-10 1g-mt-8">
                            <div class="input-group">
                                <input class="form-control g-font-size-13" type="search" placeholder="<?= __('ค้นหาสินค้าได้ที่นี้...') ?>">
                                <div class="input-group-append p-0">
                                    <button class="btn u-btn-primary g-font-size-12 text-uppercase g-py-13 g-px-15" type="submit"><?= __('ค้นหา') ?></button>
                                </div>
                            </div>
                        </form>
                        <!-- End Search Form -->
                    </div>
                    <!-- End Search -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Top Bar -->

    <div class="u-header__section u-header__section--light g-bg-white g-transition-0_3 g-py-10">
        <nav class="js-mega-menu navbar navbar-expand-lg">
            <div class="container">
                <!-- Responsive Toggle Button -->
                <button class="navbar-toggler navbar-toggler-right btn g-line-height-1 g-brd-none g-pa-0 g-pos-abs g-top-3 g-right-0" type="button"
                        aria-label="Toggle navigation"
                        aria-expanded="false"
                        aria-controls="navBar"
                        data-toggle="collapse"
                        data-target="#navBar">
                <span class="hamburger hamburger--slider g-pr-0">
                  <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                  </span>
                </span>
                </button>
                <!-- End Responsive Toggle Button -->

                <!-- Logo -->
                <a class="navbar-brand" href="/">
                    <img src="<?= $this->Url->image('logo.png') ?>" style="width: 120px; height: auto" alt="Image Description">
                </a>
                <!-- End Logo -->

                <!-- Navigation -->
                <div id="navBar" class="collapse navbar-collapse align-items-center flex-sm-row g-pt-15 g-pt-0--lg">
                    <ul class="navbar-nav ml-auto">
                        <!-- Home -->
                        <li class="nav-item g-ml-10--lg">
                            <a class="nav-link text-uppercase g-color-primary--hover g-pl-5 g-pr-0 g-py-20" href="/">หน้าหลัก</a>
                        </li>
                        <!-- End Home -->

                        <?= $this->cell('MegaMenu') ?>

                        <!-- e-Catalog -->
                        <li class="nav-item g-ml-10--lg">
                            <?= $this->Html->link(
                                __('e-Catalog'),
                                ['controller' => 'Pages', 'action' => 'eCatalogs'],
                                ['class' => 'nav-link text-uppercase g-color-primary--hover g-pl-5 g-pr-0 g-py-20']
                            ) ?>
                        </li>
                        <!-- End e-Catalog -->
                        <!-- Blog -->
                        <li class="nav-item g-ml-10--lg">
                            <?= $this->Html->link(
                                'บล็อก',
                                ['controller' => 'Blogs', 'action' => 'index'],
                                ['class' => 'nav-link text-uppercase g-color-primary--hover g-pl-5 g-pr-0 g-py-20']
                            ) ?>
                        </li>
                        <!-- End Blog -->
                        <!-- Quotation -->
                        <li class="nav-item g-ml-10--lg">
                            <?= $this->Html->link(
                                'ขอใบเสนอราคา',
                                ['controller' => 'Pages', 'action' => 'quotation'],
                                ['class' => 'nav-link text-uppercase g-color-primary--hover g-pl-5 g-pr-0 g-py-20']
                            ) ?>
                        </li>
                        <!-- End Quotation -->
                        <!-- Contact us -->
                        <li class="nav-item g-ml-10--lg">
                            <?= $this->Html->link(
                                'ติดต่อเรา',
                                ['controller' => 'Pages', 'action' => 'contactUs'],
                                ['class' => 'nav-link text-uppercase g-color-primary--hover g-pl-5 g-pr-0 g-py-20']
                            ) ?>
                        </li>
                        <!-- End Contact us -->
                    </ul>
                </div>
                <!-- End Navigation -->
            </div>
        </nav>
    </div>
</header>
<!-- End Header -->