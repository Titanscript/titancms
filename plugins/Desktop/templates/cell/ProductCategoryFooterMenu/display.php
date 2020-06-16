<div class="col-md-5 g-mb-30">
    <h2 class="h5 g-color-gray-light-v3 mb-4">สินค้า</h2>

    <div class="row">
        <div class="col-6 g-mb-20">
            <ul class="list-unstyled g-font-size-13 mb-0">
                <?php $order = 0 ?>
                <?php foreach ($categories as $category): ?>
                    <li class="g-my-10">
                        <?= $this->Html->link(
                                $category->name,
                                [''],
                                ['class' => 'u-link-v5 g-color-gray-dark-v5 g-color-primary--hover']
                        ) ?>
                    </li>
                    <?php $order++ ?>
                    <?php if ($order === 5): ?>
                        </ul>
                    </div>
                    <div class="col-6 g-mb-20">
                        <ul class="list-unstyled g-font-size-13 mb-0">
                    <?php endif ?>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>