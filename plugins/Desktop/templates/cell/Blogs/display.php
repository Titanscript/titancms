<!-- News -->
<div class="container g-pt-100 g-pb-70">
    <div class="text-center mx-auto g-max-width-600 g-mb-50">
        <h2 class="g-color-black mb-4">Blog News</h2>
        <p class="lead">Keep in touch with the latest blogs &amp; news.</p>
    </div>

    <div class="row g-mx-minus-10">
        <?php foreach ($articles as $article) : ?>
            <div class="col-sm-6 col-md-4 g-px-10 g-mb-30">
                <!-- Blog Background Overlay Blocks -->
                <article class="u-block-hover">
                    <?php foreach ($article->article_attribute_headers as $header) : ?>
                        <a href="<?= $this->Url->build(['controller' => 'Blogs', 'action' => 'read', $article->slug]) ?>">
                            <div class="g-bg-cover g-bg-white-gradient-opacity-v1--after">
                                <?php foreach ($header->article_attributes as $attribute) : ?>
                                    <?= $this->Html->image($attribute->value, ['class' => 'd-flex align-items-end u-block-hover__main--mover-down', 'style' => 'height: 425px']) ?>
                                    <!-- <img class="d-flex align-items-end u-block-hover__main--mover-down" src="https://picsum.photos/650?random" alt="Image Description"> -->
                                <?php endforeach ?>
                            </div>
                        </a>
                    <?php endforeach ?>
                    <div class="u-block-hover__additional--partially-slide-up text-center g-z-index-1 mt-auto">
                        <div class="u-block-hover__visible g-pa-25">
                            <!-- <span class="d-block g-color-white-opacity-0_7 g-font-size-13 mb-2">{{tag}}</span> -->
                            <h2 class="h4 g-color-white g-font-weight-400 mb-3">
                                <a class="u-link-v5 g-color-white g-color-primary--hover g-cursor-pointer" href="<?= $this->Url->build(['controller' => 'Blogs', 'action' => 'read', $article->slug]) ?>"><?= $article->title ?></a>
                            </h2>

                            <span class="g-color-white-opacity-0_7 g-font-size-10 text-uppercase"><?= date('M d, yy', strtotime($article->created)) ?></span>
                        </div>

                        <a class="d-inline-block g-brd-bottom g-brd-white g-color-white g-font-weight-500 g-font-size-12 text-uppercase g-text-underline--none--hover g-mb-30" href="<?= $this->Url->build(['controller' => 'Blogs', 'action' => 'read', $article->slug]) ?>">
                            <?= __('Read more') ?>
                        </a>
                    </div>
                </article>
                <!-- End Blog Background Overlay Blocks -->
            </div>
        <?php endforeach ?>
    </div>
</div>