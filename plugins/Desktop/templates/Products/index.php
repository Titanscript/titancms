<!-- Breadcrumbs -->
<section class="g-bg-gray-light-v5 g-py-50">
    <div class="container">
        <div class="d-sm-flex text-center">
            <div class="align-self-center">
                <h2 class="h3 g-font-weight-300 w-100 g-mb-10 g-mb-0--md">สินค้า</h2>
            </div>

            <div class="align-self-center ml-auto">
                <ul class="u-list-inline">
                    <li class="list-inline-item g-mr-5">
                        <a class="u-link-v5 g-color-main g-color-primary--hover" href="/">หน้าหลัก</a>
                        <i class="g-color-gray-light-v2 g-ml-5">/</i>
                    </li>
                    <li class="list-inline-item g-mr-5">
                        <a class="u-link-v5 g-color-main g-color-primary--hover" href="/products">สินค้า</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- End Breadcrumbs -->

<!-- Products -->
<div class="container">
    <div class="row">
        <!-- Content -->
        <div class="col-md-9 order-md-2">
            <div class="g-pl-15--lg">
                <!-- Banner -->
                <div class="g-bg-size-cover g-bg-pos-center g-mt-30 g-py-40" style="background-image: url(https://picsum.photos/900/450);">
                    <div class="g-pos-rel g-z-index-1 g-pa-50">
                        <h2 class="g-color-white g-font-size-50 mb-3">รายการสินค้าทั้งหมด</h2>
                    </div>
                </div>
                <!-- End Banner -->

                <!-- Filters -->
                <div class="d-flex justify-content-end align-items-center g-brd-bottom g-brd-gray-light-v4 g-pt-40 g-pb-20">
                    <!-- Show -->
                    <h2 class="h6 align-middle d-inline-block g-font-weight-400 text-uppercase g-pos-rel g-top-1 mb-0">Show:</h2>

                    <!-- Secondary Button -->
                    <div class="d-inline-block btn-group g-line-height-1_2">
                        <button type="button" class="btn btn-secondary dropdown-toggle h6 align-middle g-brd-none g-color-gray-dark-v5 g-color-black--hover g-bg-transparent text-uppercase g-font-weight-300 g-font-size-12 g-pa-0 g-pl-10 g-ma-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            9
                        </button>
                        <div class="dropdown-menu rounded-0">
                            <a class="dropdown-item g-color-gray-dark-v4 g-font-weight-300" href="#">All</a>
                            <a class="dropdown-item g-color-gray-dark-v4 g-font-weight-300" href="#">5</a>
                            <a class="dropdown-item g-color-gray-dark-v4 g-font-weight-300" href="#">15</a>
                            <a class="dropdown-item g-color-gray-dark-v4 g-font-weight-300" href="#">20</a>
                            <a class="dropdown-item g-color-gray-dark-v4 g-font-weight-300" href="#">25</a>
                        </div>
                    </div>
                    <!-- End Show -->
                </div>
                <!-- End Filters -->

                <!-- Products -->
                <div class="row g-pt-30 g-mb-50">
                    <?php foreach ($products as $product): ?>
                    <div class="col-6 col-lg-4 g-mb-30">
                        <!-- Product -->
                        <a href="<?= $this->Url->build(['action' => 'view', $product->slug]) ?>">
                            <figure class="g-pos-rel g-mb-20">
                                <img class="img-fluid" src="<?= $product->image_url ?>" alt="Image Description">
                            </figure>
                        </a>

                        <div class="media">
                            <!-- Product Info -->
                            <div class="d-flex flex-column">
                                <h4 class="h5 g-color-black mb-1">
                                    <a class="u-link-v5 g-color-black g-color-primary--hover"
                                       href="<?= $this->Url->build(['action' => 'view', $product->slug]) ?>">
                                        <?= $product->name ?>
                                    </a>
                                </h4>
                                <a class="d-inline-block g-color-gray-dark-v5 g-font-size-13" href="#">
                                    <?= $product->subname ?>
                                </a>
                                <?php if (!empty($product->price)): ?>
                                <span class="d-block g-color-black g-font-size-17">
                                    <?= $this->Number->format($product->price) ?>
                                </span>
                                <?php endif ?>
                            </div>
                            <!-- End Product Info -->
                        </div>
                        <!-- End Product -->
                    </div>
                    <?php endforeach; ?>
                </div>
                <!-- End Products -->

                <hr class="g-mb-60">

                <!-- Pagination -->
                <nav class="g-mb-100" aria-label="Page Navigation">
                    <ul class="list-inline mb-0">
                        <?= $this->Paginator->prev('<i class="fa fa-angle-left"></i><span class="sr-only">Next</span>', ['escape' => false]) ?>

                        <?= $this->Paginator->numbers() ?>

                        <?= $this->Paginator->next('<i class="fa fa-angle-right"></i><span class="sr-only">Next</span>', ['escape' => false]) ?>

                        <li class="list-inline-item float-right">
                            <span class="u-pagination-v1__item-info g-color-gray-dark-v4 g-font-size-12 g-pa-5">หน้า <?= $this->Paginator->counter() ?></span>
                        </li>
                    </ul>
                </nav>
                <!-- End Pagination -->
            </div>
        </div>
        <!-- End Content -->

        <!-- Filters -->
        <div class="col-md-3 order-md-1 g-brd-right--lg g-brd-gray-light-v4 g-pt-40">
            <?= $this->cell('ProductFilter') ?>
        </div>
        <!-- End Filters -->
    </div>
</div>
<!-- End Products -->