<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <a class="sidebar-brand d-flex align-items-center justify-content-center"
       href="<?= $this->Url->build('/manager') ?>">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">TF Manager <sup>4</sup></div>
    </a>

    <hr class="sidebar-divider my-0">

    <li class="nav-item">
        <a class="nav-link" href="<?= $this->Url->build('/manager') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span><?= __('Dashboard') ?></span>
        </a>
    </li>

    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        <?= __('Content management') ?>
    </div>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pages" aria-expanded="true"
           aria-controls="pages">
            <i class="fas fa-fw fa-file"></i>
            <span><?= __('Pages') ?></span>
        </a>
        <div id="pages" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header"><?= __('Pages Components:') ?></h6>
                <?= $this->Html->link(
                    __('Pages'),
                    ['controller' => 'Pages', 'action' => 'index'],
                    ['class' => 'collapse-item']
                ) ?>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#products" aria-expanded="true"
           aria-controls="products">
            <i class="fas fa-fw fa-boxes"></i>
            <span><?= __('Products') ?></span>
        </a>
        <div id="products" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header"><?= __('Products Components:') ?></h6>
                <?= $this->Html->link(
                    __('Products'),
                    ['controller' => 'Products', 'action' => 'index'],
                    ['class' => 'collapse-item']
                ) ?>
                <?= $this->Html->link(
                    __('Categories'),
                    ['controller' => 'ProductCategories', 'action' => 'index'],
                    ['class' => 'collapse-item']
                ) ?>
                <?= $this->Html->link(
                    __('Groups'),
                    ['controller' => 'ProductGroups', 'action' => 'index'],
                    ['class' => 'collapse-item']
                ) ?>
                <?= $this->Html->link(
                    __('Brands'),
                    ['controller' => 'Brands', 'action' => 'index'],
                    ['class' => 'collapse-item']
                ) ?>
                <?= $this->Html->link(
                    __('BrandManufacturers'),
                    ['controller' => 'BrandManufacturers', 'action' => 'index'],
                    ['class' => 'collapse-item']
                ) ?>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#blogs" aria-expanded="true"
           aria-controls="blogs">
            <i class="fas fa-fw fa-newspaper"></i>
            <span><?= __('Articles') ?></span>
        </a>
        <div id="blogs" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header"><?= __('Articles Components:') ?></h6>
                <?= $this->Html->link(
                    __('Articles'),
                    ['controller' => 'Articles', 'action' => 'index'],
                    ['class' => 'collapse-item']
                ) ?>
                <?= $this->Html->link(
                    __('Categories'),
                    ['controller' => 'ArticleCategories', 'action' => 'index'],
                    ['class' => 'collapse-item']
                ) ?>
            </div>
        </div>
    </li>

    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        <?= __('Medias') ?>
    </div>

    <li class="nav-item">
        <a class="nav-link" href="<?= $this->Url->build(['controller' => 'Medias', 'action' => 'index']) ?>">
            <i class="fas fa-fw fa-photo-video"></i>
            <span><?= __('Medias library') ?></span>
        </a>
        <a class="nav-link" href="<?= $this->Url->build(['controller' => 'Medias', 'action' => 'eCatalogs']) ?>">
            <i class="fas fa-file-pdf"></i>
            <span><?= __('e-Catalog') ?></span>
        </a>
        <a class="nav-link" href="<?= $this->Url->build(['controller' => 'Medias', 'action' => 'imageHeaderSliders']) ?>">
            <i class="fas fa-images"></i>
            <span><?= __('Image header sliders') ?></span>
        </a>
    </li>

    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        <?= __('Add-Ons') ?>
    </div>

    <li class="nav-item">
        <a class="nav-link" href="<?= $this->Url->build(['controller' => 'Clients', 'action' => 'index']) ?>">
            <i class="fas fa-fw fa-users"></i>
            <span><?= __('Clients management') ?></span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?= $this->Url->build(['controller' => 'Partners', 'action' => 'index']) ?>">
            <i class="fas fa-fw fa-handshake"></i>
            <span><?= __('Partners management') ?></span>
        </a>
    </li>

    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        <?= __('Settings') ?>
    </div>

    <li class="nav-item">
        <a class="nav-link" href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'index']) ?>">
            <i class="fas fa-fw fa-user-circle"></i>
            <span><?= __('Users management') ?></span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed"
           href="<?= $this->Url->build(['controller' => 'SiteSettings', 'action' => 'setting']) ?>"
           data-toggle="collapse" data-target="#setting" aria-expanded="true"
           aria-controls="setting">
            <i class="fas fa-fw fa-cogs"></i>
            <span><?= __('Site Settings') ?></span>
        </a>
        <div id="setting" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header"><?= __('Setting Components:') ?></h6>
                <?= $this->Html->link(
                    __('Site'),
                    ['controller' => 'SiteSettings', 'action' => 'site'],
                    ['class' => 'collapse-item']
                ) ?>
                <?= $this->Html->link(
                    __('Company'),
                    ['controller' => 'SiteSettings', 'action' => 'company'],
                    ['class' => 'collapse-item']
                ) ?>
                <?= $this->Html->link(
                    __('Social Network'),
                    ['controller' => 'SiteSettings', 'action' => 'socialNetwork'],
                    ['class' => 'collapse-item']
                ) ?>
                <?= $this->Html->link(
                    __('SEO'),
                    ['controller' => 'SiteSettings', 'action' => 'seo'],
                    ['class' => 'collapse-item']
                ) ?>
                <?= $this->Html->link(
                    __('OG tags'),
                    ['controller' => 'SiteSettings', 'action' => 'ogTags'],
                    ['class' => 'collapse-item']
                ) ?>
            </div>
        </div>
    </li>

    <hr class="sidebar-divider d-none d-md-block">

    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->