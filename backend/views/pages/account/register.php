<?php $view->component('start') ?>
<?php $view->component('navbar') ?>
<div class="content">
    <div class="content__left">
        <div class="content__header">Регистрация</div>
        <form class="content__form" method="post" enctype="multipart/form-data" action="/register">
            <div class="content__form-body">
                <div class="content__input">
                    <label for="name" class="content__label-name">Имя</label>
                    <input type="text" name="name" class="content__input-name" id="name">
                    <ul class="errors">
                        <?php if ($session->has('name')) { ?>
                            <? foreach ($session->getFlash('name') as $error) { ?>
                                <li class="erorr"><?php echo $error ?></li>
                            <?php } ?>
                        <?php } ?>
                    </ul>
                </div>
                <div class="content__input">
                    <label for="email" class="content__label-name">Почта</label>
                    <input type="email" name="email" class="content__input-email" id="email">
                    <ul class="errors">
                        <?php if ($session->has('email')) { ?>
                            <? foreach ($session->getFlash('email') as $error) { ?>
                                <li class="erorr"><?php echo $error ?></li>
                            <?php } ?>
                        <?php } ?>
                    </ul>
                </div>
                <div class="content__input">
                    <label for="password" class="content__label-password">Пароль</label>
                    <input type="password" name="password" class="content__input-password">
                    <ul class="errors">
                        <?php if ($session->has('password')) { ?>
                            <? foreach ($session->getFlash('password') as $error) { ?>
                                <li class="erorr"><?php echo $error ?></li>
                            <?php } ?>
                        <?php } ?>
                    </ul>
                </div>
                <div class="content__submit">
                    <button class="content__button">Зарегистрироваться</button>
                </div>
            </div>
        </form>
    </div>
    <div class="content__right">
        <div class="content__images">
            <img src="/uploads/les.jpg" class="content__image" alt="">
        </div>
        <p class="content__text">Делитесь своими впечатлениями c помощью фотографий</p>
    </div>
</div>
<?php $view->component('end') ?>