<section class="g-bg-gray-light-v5 g-py-50">
    <div class="container">
        <div class="d-sm-flex text-center">
            <div class="align-self-center">
                <h2 class="h3 g-font-weight-300 w-100 g-mb-10 g-mb-0--md">บล็อก</h2>
            </div>

            <div class="align-self-center ml-auto">
                <ul class="u-list-inline">
                    <li class="list-inline-item g-mr-5">
                        <a class="u-link-v5 g-color-main g-color-primary--hover" href="/">หน้าหลัก</a>
                        <i class="g-color-gray-light-v2 g-ml-5">/</i>
                    </li>
                    <li class="list-inline-item g-mr-5">
                        <a class="u-link-v5 g-color-main g-color-primary--hover" href="/blogs">บล็อก</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<div class="container g-pt-100 g-pb-20">
    <div class="row justify-content-between">
        <div class="col-lg-9 g-mb-80">
            <div class="g-pr-20--lg">
                <?php foreach ($blogs as $blog): ?>
                    <article class="g-mb-100">
                        <div class="g-mb-30">
                            <div class="media g-mb-25">
                                <div class="media-body">
                                    <span class="d-block g-color-gray-dark-v4 g-font-size-12"><?= $this->Time->format($blog->created) ?></span>
                                </div>
                            </div>

                            <img class="img-fluid w-100 g-mb-25" src="https://picsum.photos/740/380" alt="Image Description">

                            <h2 class="h4 g-color-black g-font-weight-600 mb-3">
                                <a class="u-link-v5 g-color-black g-color-primary--hover"
                                   href="<?= $this->Url->build(['controller' => 'Blogs', 'action' => 'read', $blog->slug]) ?>">
                                    <?= $blog->title ?>
                                </a>
                            </h2>
                            <p class="g-color-gray-dark-v4 g-line-height-1_8">
                                <?= $blog->intro ?>
                            </p>
                            <a class="g-font-size-13" href="<?= $this->Url->build(['controller' => 'Blogs', 'action' => 'read', $blog->slug]) ?>">อ่านต่อ...</a>
                        </div>
                    </article>
                <?php endforeach ?>


                <!-- Pagination -->
                <nav id="stickyblock-end" class="text-center" aria-label="Page Navigation">
                    <ul class="list-inline">
                        <li class="list-inline-item float-left g-hidden-xs-down">
                            <a class="u-pagination-v1__item u-pagination-v1-4 g-brd-gray-light-v3 g-brd-primary--hover g-rounded-50 g-pa-7-16" href="#" aria-label="Previous">
                    <span aria-hidden="true">
                      <i class="fa fa-angle-left g-mr-5"></i> Previous
                    </span>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a class="u-pagination-v1__item u-pagination-v1-4 u-pagination-v1-4--active g-rounded-50 g-pa-7-14" href="#">1</a>
                        </li>
                        <li class="list-inline-item">
                            <a class="u-pagination-v1__item u-pagination-v1-4 g-rounded-50 g-pa-7-14" href="#">2</a>
                        </li>
                        <li class="list-inline-item float-right g-hidden-xs-down">
                            <a class="u-pagination-v1__item u-pagination-v1-4 g-brd-gray-light-v3 g-brd-primary--hover g-rounded-50 g-pa-7-16" href="#" aria-label="Next">
                    <span aria-hidden="true">
                      Next <i class="fa fa-angle-right g-ml-5"></i>
                    </span>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- End Pagination -->
            </div>
        </div>

        <div class="col-lg-3 g-brd-left--lg g-brd-gray-light-v4 g-mb-80">
            <div class="g-pl-20--lg">
                <!-- Links -->
                <div class="g-mb-50">
                    <h3 class="h5 g-color-black g-font-weight-600 mb-4"><?= __('Categories') ?></h3>
                    <ul class="list-unstyled g-font-size-13 mb-0">
                        <li><a class="d-block u-link-v5 g-color-gray-dark-v4 rounded g-px-20 g-py-8" href="#"><i class="mr-2 fa fa-angle-right"></i> People</a>
                        </li>
                        <li><a class="d-block u-link-v5 g-color-gray-dark-v4 rounded g-px-20 g-py-8" href="#"><i class="mr-2 fa fa-angle-right"></i> News Publications</a>
                        </li>
                        <li><a class="d-block u-link-v5 g-color-gray-dark-v4 rounded g-px-20 g-py-8" href="#"><i class="mr-2 fa fa-angle-right"></i> Marketing &amp; IT</a>
                        </li>
                        <li><a class="d-block u-link-v5 g-color-gray-dark-v4 rounded g-px-20 g-py-8" href="#"><i class="mr-2 fa fa-angle-right"></i> Business Strategy</a>
                        </li>
                        <li><a class="d-block active u-link-v5 g-color-black g-bg-gray-light-v5 g-font-weight-600 g-rounded-50 g-px-20 g-py-8" href="#"><i class="mr-2 fa fa-angle-right"></i> Untold Stories</a>
                        </li>
                    </ul>
                </div>
                <!-- End Links -->

                <hr class="g-brd-gray-light-v4 g-mt-50 mb-0">

                <div id="stickyblock-start" class="js-sticky-block g-sticky-block--lg g-pt-50" data-start-point="#stickyblock-start" data-end-point="#stickyblock-end">
                    <!-- Tags -->
                    <div class="g-mb-40">
                        <h3 class="h5 g-color-black g-font-weight-600 mb-4">Tags</h3>
                        <ul class="u-list-inline mb-0">
                            <li class="list-inline-item g-mb-10">
                                <a class="u-tags-v1 g-color-gray-dark-v4 g-color-white--hover g-bg-gray-light-v5 g-bg-primary--hover g-font-size-12 g-rounded-50 g-py-4 g-px-15" href="#">Design</a>
                            </li>
                            <li class="list-inline-item g-mb-10">
                                <a class="u-tags-v1 g-color-gray-dark-v4 g-color-white--hover g-bg-gray-light-v5 g-bg-primary--hover g-font-size-12 g-rounded-50 g-py-4 g-px-15" href="#">Art</a>
                            </li>
                            <li class="list-inline-item g-mb-10">
                                <a class="u-tags-v1 g-color-gray-dark-v4 g-color-white--hover g-bg-gray-light-v5 g-bg-primary--hover g-font-size-12 g-rounded-50 g-py-4 g-px-15" href="#">Graphic</a>
                            </li>
                            <li class="list-inline-item g-mb-10">
                                <a class="u-tags-v1 g-color-gray-dark-v4 g-color-white--hover g-bg-gray-light-v5 g-bg-primary--hover g-font-size-12 g-rounded-50 g-py-4 g-px-15" href="#">Front End Development</a>
                            </li>
                            <li class="list-inline-item g-mb-10">
                                <a class="u-tags-v1 g-color-gray-dark-v4 g-color-white--hover g-bg-gray-light-v5 g-bg-primary--hover g-font-size-12 g-rounded-50 g-py-4 g-px-15" href="#">CSS</a>
                            </li>
                            <li class="list-inline-item g-mb-10">
                                <a class="u-tags-v1 g-color-gray-dark-v4 g-color-white--hover g-bg-gray-light-v5 g-bg-primary--hover g-font-size-12 g-rounded-50 g-py-4 g-px-15" href="#">HTML</a>
                            </li>
                            <li class="list-inline-item g-mb-10">
                                <a class="u-tags-v1 g-color-gray-dark-v4 g-color-white--hover g-bg-gray-light-v5 g-bg-primary--hover g-font-size-12 g-rounded-50 g-py-4 g-px-15" href="#">Sass</a>
                            </li>
                        </ul>
                    </div>
                    <!-- End Tags -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Blog Minimal Blocks -->