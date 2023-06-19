<?php ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../../view/css/login.css">
        <title>Login</title>
    </head>
    <body>
        <section class="container">
            <div class="login">
                <div class="logo-teste">
                    <img src="../../view/img/spitfire-logo.png" class="img-logo">
                </div>

                <form class="login-form" method="post">
                    <h1 class="login-title">Fazer Login</h1>

                    <div class="textfield">
                        <label for="User-name" class="login-label">
                            <span>Nome de Usuario</span>
                            <input type="text" name="usuario" id="user-name" class="input">
                        </label>
                    </div>

                    <div class="textfield">
                        <label for="password" class="login-label">
                            <span>Senha</span>
                            <input type="password" name="senha" id="password" class="input">
                        </label>
                    </div>

                    <div class="form-btn">
                        <button type="button" class="login-btn" disabled>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                <path
                                    d="M438.6 278.6l-160 160C272.4 444.9 264.2 448 256 448s-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L338.8 288H32C14.33 288 .0016 273.7 .0016 256S14.33 224 32 224h306.8l-105.4-105.4c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l160 160C451.1 245.9 451.1 266.1 438.6 278.6z" />
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
        </section>
    <script src="../../view/js/login.js" async defer></script>
</body>
</html>