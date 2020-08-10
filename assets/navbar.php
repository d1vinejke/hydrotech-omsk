<nav class="navbar navbar-light navbar-expand-md navigation-clean-button">
    <a class="navbar-brand logo" href="/">Hydrotech <span>Omsk</span></a>
    <button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navcol-1">
        <ul class="nav navbar-nav mr-auto">
            <li class="nav-item" role="presentation"><a class="nav-link" href="/">Главная</a></li>
            <li class="nav-item" role="presentation"><a class="nav-link" href="../about.php">О предприятии</a></li>
            <li class="nav-item" role="presentation"><a class="nav-link" href="#">Опросные листы</a></li>
            <li class="nav-item" role="presentation"><a class="nav-link" href="#">Объявления</a></li>
            <li class="nav-item" role="presentation"><a class="nav-link" href="#">Вакансии</a></li>
            <li class="nav-item" role="presentation"><a class="nav-link" href="#">Контакты</a></li>
            <li class="dropdown nav-item">
                <a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#">Дополнительное меню </a>
                <div class="dropdown-menu" role="menu">
                    <a class="dropdown-item" role="presentation" href="#">Тест 1</a>
                    <a class="dropdown-item" role="presentation" href="#">Тест 2</a>
                    <a class="dropdown-item" role="presentation" href="#">Тест 3</a>
                </div>
            </li>
        </ul>
        <?php
        if(!($_SESSION['logged_user'])){
            echo '<span class="navbar-text actions">';
            echo '    <a class="login btn btn-light action-button" href="login.php">Войти</a>';
            echo '</span>';
        }
        else{
            echo '<span><a class="btn btn-danger" href="/admin">Админка</a> <a class="btn btn-outline-primary action-button" href="logout.php">Выйти</a></span>';
        }
        ?>
    </div>
</nav>