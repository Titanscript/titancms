<section class="container g-py-100">
    <div class="text-center mx-auto g-max-width-600 g-mb-50">
        <h2 class="g-color-black mb-4"><?= __('Products') ?></h2>
        <p class="lead">
            We want to create a range of beautiful, practical and modern outerwear that doesn't cost the earth – but let's you still live life in style.
        </p>
    </div>

    <div class="row g-mx-minus-10 g-mb-50">
        <?php foreach ($categories as $category): ?>
        <div class="col-md-6 col-lg-4 g-px-10">
            <article class="media g-brd-around g-brd-gray-light-v4 g-bg-white rounded g-pa-10 g-mb-20">
                <div class="g-max-width-100 g-mr-15">
                    <?= $this->Html->image($category->image, ['class' => 'd-flex w-100', 'alt' => '']) ?>
                </div>
                <div class="media-body align-self-center">
                    <h4 class="h5 g-mb-0">
                        <?= $this->Html->link($category->name, ['action' => ''], ['class' => 'g-color-black g-color-primary--hover g-text-underline--none--hover']) ?>
                    </h4>
                    <a class="d-inline-block g-color-gray-dark-v5 g-font-size-13 g-mb-0"
                       href="<?= $this->Url->build('') ?>">
                        <?= $category->description ?>
                    </a>
                </div>
            </article>
        </div>
        <?php endforeach ?>
    </div>
</section>