<section class="new-project">
    <div class="new-project__container container">
        <div class="new-project__window">
            <h2 class="new-project__title">Создание нового проекта</h2>
            <p class="new-project__text">
                Перед тем как начать новый проект, важно уделить время и заполнить основную информацию о нём.
            </p>
            <form action="#" method="post">
                <input type="text" name="name" id="name-project" placeholder="Название проекта" class="new-project__input-name">
                <h3 class="new-project__title-3">Описание</h3>
                <p class="new-project__text">
                    Кратко опишите свой проект до 40 символов.
                    Это описание будет помещено в правый угол, а более детально вы сможете описать при оформлении страницы мода.
                </p>
                <textarea name="description" id="new-project__textarea" placeholder="Расскажите о вашем проекте" cols="30" rows="10" class="new-project__textarea"></textarea>
                <h3 class="new-project__title-3">Видимость</h3>
                <p class="new-project__text">
                    <span>Публичный проект:</span> Открыт для всех, привлекает внимание и участников. <br>
                    <span>Приватный проект:</span> Ограниченный доступ, больше приватности.
                </p>
                <select name="new-project__select" id="new-project__select" class="new-project__select">
                    <option value="">Публичный</option>
                    <option value="">Приватный</option>
                </select>
                <div class="new-project__div-submit">
                    <input type="submit" value="Создать проект" class="new-project__submit">
                </div>
            </form>
            <div class="new-project__close">
                <div class="new-project__close-png"></div>
            </div>
        </div>
    </div>
</section>