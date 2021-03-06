<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>TF Manager v4.0.0 - Login</title>

    <!-- Custom fonts for this template-->
    <?= $this->Html->css('../vendor/fontawesome-free/css/all.min.css') ?>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
          rel="stylesheet">

    <!-- Custom styles for this template-->
    <?= $this->Html->css(['sb-admin-2.min.css']) ?>
</head>

<body class="bg-gradient-primary">
<div class="container">
    <?= $this->Flash->render() ?>
    <?= $this->fetch('content') ?>
</div>

<?= $this->Html->script(
    [
        '../vendor/jquery/jquery.min.js',
        '../vendor/bootstrap/js/bootstrap.bundle.min.js',
        '../vendor/jquery-easing/jquery.easing.min.js',
        'sb-admin-2.min.js',
    ]
) ?>

</body>
</html>