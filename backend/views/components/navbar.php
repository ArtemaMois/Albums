<div class="navbar">
    <div class="container">
        <div class="navbar__body">
            <ul class="navbar__menu">
                <a href="">
                    <li>Альбомы</li>
                </a>
                <a href="">
                    <li>Лента</li>
                </a>
            </ul>
            <?php if ($auth->check()) {  ?>
                <ul class="navbar__auth-list">
                    <a href="">
                        <li class="navbar__auth-link"><?php echo $auth->user()->email() ?></li>
                    </a>
                    <form action="/logout" method="POST" enctype="application/x-www-form-urlencoded">
                        <button type="submit" class="navbar__auth-button">Logout</button>
                    </form>
                </ul>
            <?php } else { ?>
                <ul class="navbar__guest-list">
                    <a href="/login">
                        <li class="navbar__auth-link">Вход</li>
                    </a>
                    <a href="/register">
                        <li class="navbar__auth-link">Регистрация</li>
                    </a>
                </ul>
            <?php } ?>
        </div>
    </div>
</div>