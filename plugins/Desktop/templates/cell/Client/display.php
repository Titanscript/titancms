<div class="container g-mb-50">
    <div class="row">
        <div class="col">
            <div class="row text-center g-mx-0--sm">
                <?php foreach ($clients as $client): ?>
                <div class="col-lg-2 col-md-6 g-px-0--sm">
                    <div class="g-brd-around g-brd-gray-light-v4 g-py-50 g-px-30 g-ml-minus-1 g-mb-minus-1">
                        <img class="mx-auto g-width-120 u-block-hover__main--grayscale g-opacity-0_3 g-opacity-1--hover g-cursor-pointer" src="<?= $client->image_url ?>" alt="Image Description">
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>