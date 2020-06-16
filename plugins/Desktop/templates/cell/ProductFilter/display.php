<div class="g-pr-15--lg g-pt-60">
    <!-- Categories -->
    <div class="g-mb-30">
        <h3 class="h5 mb-3">Categories</h3>

        <ul class="list-unstyled">
            <?php foreach ($categories as $category): ?>
                <li class="my-3">
                    <a class="d-block u-link-v5 g-color-gray-dark-v4 g-color-primary--hover"
                       href="<?= $this->Url->build(['action' => 'category', $category->slug]) ?>">
                        <?= $category->name ?>
                        <span class="float-right g-font-size-12"><?= $category->total_products ?></span>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <!-- End Categories -->
</div>