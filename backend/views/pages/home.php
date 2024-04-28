<?php $view->component('start') ?>
<?php $view->component('navbar') ?>
    <h1>Hello <?php echo $auth->user()->email() ?>, you are in Albums app</h1>
<?php $view->component('end') ?>