<!-- Links -->
<div class="g-mb-50">
    <h3 class="h5 g-color-black g-font-weight-600 mb-4"><?= __('Categories') ?></h3>
    <ul class="list-unstyled g-font-size-13 mb-0">
        <?php foreach ($categories as $category): ?>
        <li>
            <a class="d-block u-link-v5 g-color-gray-dark-v4 rounded g-px-20 g-py-8"
               href="<?= $this->Url->build(['action' => 'category', $category->slug]) ?>">
                <i class="mr-2 fa fa-angle-right"></i> <?= $category->name ?>
            </a>
        </li>
        <?php endforeach ?>
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