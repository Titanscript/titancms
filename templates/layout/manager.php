<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="noindex, noindex, nosnippet, noarchive"/>
    <meta name="googlebot" content="oindex, noindex, nosnippet, noarchive"/>

    <title>TF Manager v4.0.0 - Blank</title>

    <!-- Custom fonts for this template-->
    <?= $this->Html->css('../vendor/fontawesome-free/css/all.min.css') ?>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
          rel="stylesheet">

    <!-- Custom styles for this template-->
    <?= $this->Html->css(
        [
            'sb-admin-2.min.css',
            '../vendor/datatables/dataTables.bootstrap4.min.css',
        ]
    ) ?>

    <script src="https://cdn.tiny.cloud/1/bvnlupt3vht1dcefvaprv6xe845v0nrzcy4dts275miq86vn/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
</head>

<body id="pate-top">
<div id="wrapper">
    <?= $this->element('side_nav') ?>
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <?= $this->element('topbar') ?>

            <!-- Begin Page Content -->
            <div class="container-fluid">
                <?= $this->Flash->render() ?>
                <?= $this->fetch('content') ?>
            </div>
            <!-- /.container-fluid -->
        </div>
    </div>
</div>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><?= __('Ready to Leave?') ?></h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body"><?= __(
                    'Select "Logout" below if you are ready to end your current session.'
                ) ?></div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal"><?= __('Cancel') ?></button>
                <?= $this->Html->link(
                    __('Logout'),
                    ['controller' => 'Users', 'action' => 'logout'],
                    ['class' => 'btn btn-primary']
                ) ?>
            </div>
        </div>
    </div>
</div>

<?= $this->Html->script(
    [
        '../vendor/jquery/jquery.min.js',
        '../vendor/bootstrap/js/bootstrap.bundle.min.js',
        '../vendor/jquery-easing/jquery.easing.min.js',
        'sb-admin-2.min.js',
        '../vendor/datatables/jquery.dataTables.min.js',
        '../vendor/datatables/dataTables.bootstrap4.min.js',
        'manager.js',
    ]
) ?>
</body>
</html>