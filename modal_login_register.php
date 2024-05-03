<section class="login">
    <div class="login__container container" id="login__container">
        <div class="login__window">
            <div class="login__close">
                <div class="login__close-cross"></div>
            </div>
            <h1 class="login__title">
                Войти
            </h1>
            <form action="login_submit.php" method="post" class="login__form" id="loginForm">
                <div class="login__form-inputs-text">
                    <div class="login__form-input-text-inner-flex">
                        <input class="login__form-input-text" type="text" name="mail" id="mail" placeholder="Почта">
                        <div class="login__form-input-text-convert"></div>
                    </div>
                    <div class="login__form-input-text-inner-flex">
                        <input class="login__form-input-text" type="password" name="pass" id="pass_log"
                               placeholder="Пароль">
                        <div class="login__form-input-text-lock"></div>
                        <div class="login__form-input-text-eye" id="eye_pass_log"></div>
                        <div class="login__form-input-text-eye-c" id="eye_c_pass_log"></div>
                    </div>
                </div>
                <div class="login__remembering-password">
                    <div class="login__remember-checkbox-flex">
                        <input type="checkbox" name="remember_me" id="remember_me" class="login__remember-checkbox">
                        <p class="login__remember-text" id="rememberMe">Запомнить меня</p>
                    </div>
                    <p class="login__green-link"><a href="#">Забыли пароль?</a></p>
                </div>
                <a href="#">
                    <div class="login__button-enter-border">
                        <input class="login__button-enter" type="submit" value="Войти">
                    </div>
                </a>
                <div class="login__register-flex">
                    <p class="login__register-text">Нет аккаунта?</p>
                    <p class="login__green-link" id="get_register"><a href="#">Регистрация</a></p>
                </div>
            </form>
        </div>
    </div>
</section>
<section class="login">
    <div class="login__container container" id="register__container">
        <div class="login__window">
            <div class="login__close">
                <div class="login__close-cross"></div>
            </div>
            <h1 class="login__register-title">
                Зарегистрироваться
            </h1>
            <form action="register__submit.php" method="post" class="login__form">
                <div class="login__form-inputs-text">
                    <div class="login__form-input-text-inner-flex">
                        <input class="login__form-input-text" type="text" name="mail" id="mail_reg"
                               placeholder="Почта">
                        <div class="login__form-input-text-convert"></div>
                    </div>
                    <div class="login__form-input-text-inner-flex">
                        <input class="login__form-input-text" type="text" name="name" id="name"
                               placeholder="Никнейм">
                        <div class="login__form-input-text-nick"></div>
                    </div>
                    <div class="login__form-input-text-inner-flex">
                        <input class="login__form-input-text" type="password" name="pass" id="pass_reg"
                               placeholder="Пароль">
                        <div class="login__form-input-text-lock"></div>
                        <div class="login__form-input-text-eye" id="eye_pass_reg"></div>
                        <div class="login__form-input-text-eye-c" id="eye_c_pass_reg"></div>
                    </div>
                    <div class="login__form-input-text-inner-flex">
                        <input class="login__form-input-text" type="password" name="pass-confirm"
                               id="pass_reg_confirm"
                               placeholder="Подтверждение пароля">
                        <div class="login__form-input-text-lock"></div>
                        <div class="login__form-input-text-eye" id="eye_pass_reg_confirm"></div>
                        <div class="login__form-input-text-eye-c" id="eye_c_pass_reg_confirm"></div>
                    </div>
                </div>
                <div class="login__button-enter-border">
                    <input type="submit" id="register" name="register" class="login__button-enter"
                           value="Зарегистрироваться">
                </div>
                <div class="login__register-flex">
                    <p class="login__register-text">Уже есть аккаунт?</p>
                    <p class="login__green-link" id="get_login"><a href="#">Войти</a></p>
                </div>
            </form>
        </div>
    </div>
</section>