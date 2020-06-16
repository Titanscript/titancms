<!-- Breadcrumbs -->
<section class="g-bg-gray-light-v5 g-py-50">
    <div class="container">
        <div class="d-sm-flex text-center">
            <div class="align-self-center">
                <h2 class="h3 g-font-weight-300 w-100 g-mb-10 g-mb-0--md"><?= __('E-Catalogs') ?></h2>
            </div>

            <div class="align-self-center ml-auto">
                <ul class="u-list-inline">
                    <li class="list-inline-item g-mr-5">
                        <a class="u-link-v5 g-color-main g-color-primary--hover" href="#">Home</a>
                        <i class="g-color-gray-light-v2 g-ml-5">/</i>
                    </li>
                    <li class="list-inline-item g-mr-5">
                        <a class="u-link-v5 g-color-main g-color-primary--hover" href="#"><?= __('E-Catalogs') ?></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- End Breadcrumbs -->

<div class="container">
    <div class="row g-my-30">
        <?php foreach ($eCatalogs as $catalog): ?>
            <div class="col-6">
                <div class="card mb-3">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <a class="card-image" href="<?= $catalog['link_download'] ?>" target="_blank" alt="<?= $catalog['alt'] ?>">
                                <?= $this->Html->image($catalog['image_cover'], ['class' => 'img-fluid', 'pathPrefix' => __('storage/')]) ?>
                            </a>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><?= $catalog['title'] ?></h5>
                                <p class="card-text"><?= $catalog['description'] ?></p>
                                <p class="card-text"><small class="text-muted"><?= $this->Time->format($catalog['created']) ?></small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>