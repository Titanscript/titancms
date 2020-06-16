<!DOCTYPE html>
<html>

<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <?= $this->Html->meta('icon') ?>

    <title><?= $this->fetch('title') ?></title>

    <?= $this->Html->css(
        [
            '../vendor/bootstrap-4.5.0/css/bootstrap.min.css',
            'template-mobile.css',
        ]
    ); ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>

<body>
<main>
    <?= $this->element('header') ?>
    <?= $this->Flash->render() ?>
    <?= $this->fetch('content') ?>
    <?= $this->element('footer') ?>
</main>
<?= $this->Html->script(
    [
        '../vendor/bootstrap-4.5.0/js/bootstrap.min.js',
        'template-mobile.js',
    ]
) ?>
</body>

</html>