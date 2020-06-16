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

        <div class="col-lg-3 g-brd-left--lg g-brd-gray-light-v4 g-mb-80">
            <div class="g-pl-20--lg">
                <?= $this->cell('BlogsFilter') ?>
            </div>
        </div>
    </div>
</div>
<!-- End Blog Minimal Blocks -->