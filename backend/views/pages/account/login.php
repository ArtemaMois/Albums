<?php $view->component('start') ?>
<?php $view->component('navbar') ?>
<div class="content">
    <div class="content__left">
        <div class="content__header">Вход</div>
        <form class="content__form" method="post" enctype="multipart/form-data" action="/login">
            <div class="content__form-body">
                <div class="content__input">
                    <label for="email" class="content__label-name">Почта</label>
                    <input type="email" name="email" class="content__input-email" id="email">
                    <ul class="errors">
                    </ul>
                </div>
                <div class="content__input">
                    <label for="password" class="content__label-password">Пароль</label>
                    <input type="password" name="password" class="content__input-password">
                    <ul class="errors">
                    </ul>
                </div>
                <div class="content__submit">
                    <button class="content__button">Войти</button>
                </div>
            </div>
        </form>
        <p class="login__error">
            <?php if ($session->has('login')) { ?>
                <li class="erorr"><?php echo $session->getFlash('login') ?></li>
            <?php } ?>
        </p>
    </div>
    <div class="content__right">
        <div class="content__images">
            <img src="/uploads/les.jpg" class="content__image" alt="">
        </div>
        <p class="content__text">Делитесь своими впечатлениями c помощью фотографий</p>
    </div>
</div>
<?php $view->component('end') ?>