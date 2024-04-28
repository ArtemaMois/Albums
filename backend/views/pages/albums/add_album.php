<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Новый альбом</title>
    <link rel="stylesheet" href="/assets/css/pages/albums/add.css">
    <link rel="stylesheet" href="/assets/css/components/navbar.css">
    <link rel="stylesheet" href="/assets/css/components/sidebar.css">
    <link rel="stylesheet" href="/assets/css/components/footer.css">
</head>

<body>
    <main>

        <?php $view->component('navbar'); ?>
        <div class="container">
            <div class="content">
                <div class="add-album__content">
                    <p class="add-album__header">Новый альбом</p>
                    <form action="/albums/add" method="post" class="add-album__form" enctype="multipart/form-data">
                        <div class="add-album__field">
                            <label for="name" class="add-album__name-label">Название</label>
                            <input type="text" class="add-album__name-input" name="name" placeholder="Название альбома" id="name">
                            <?php if ($session->has('name')) { ?>
                                <ul>
                                    <? foreach ($session->getFlash('name') as $error) { ?>
                                        <li class="erorr"><?php echo $error ?></li>
                                    <?php } ?>
                                </ul>
                            <?php } ?>
                        </div>
                        <div class="add-album__field">
                            <label for="description" class="add-album__description-label">Описание</label>
                            <textarea name="description" class="add-album__description-input" id="description" cols="40" rows="10" placeholder="Описание"></textarea>
                            <?php if ($session->has('description')) { ?>
                                <ul>
                                    <? foreach ($session->getFlash('description') as $error) { ?>
                                        <li class="erorr"><?php echo $error ?></li>
                                    <?php } ?>
                                </ul>
                            <?php } ?>
                        </div>
                        <button type="submit" class="add-album__submit">
                            <p class="add-album__submit">Добавить</p>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <?php $view->component('footer'); ?>
    </main>
</body>

</html>