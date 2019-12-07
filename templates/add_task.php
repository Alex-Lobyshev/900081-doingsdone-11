
        <div class="content">
            <section class="content__side">
                <h2 class="content__side-heading">Проекты</h2>

                <nav class="main-navigation">
                    <ul class="main-navigation__list">
                        <?php
                        foreach($project_array as $key => $value): ?>
                            <li class="main-navigation__list-item">
                                <a class="main-navigation__list-item-link" href="index.php?cat_id=<?=htmlspecialchars($value['id'])?>"><?=htmlspecialchars($value['name'])?></a>
                                <span class="main-navigation__list-item-count"></span>
                            </li>
                        <?endforeach;?>
                    </ul>
                </nav>

                <a class="button button--transparent button--plus content__side-button" href="form-project.html">Добавить проект</a>
            </section>

            <main class="content__main">
                <h2 class="content__main-heading">Добавление задачи</h2>

                <form class="form"  action="add.php" method="post" autocomplete="off" enctype="multipart/form-data">
                    <div class="form__row">
                        <label class="form__label" for="name_task">Название <sup>*</sup></label>

                        <input class="form__input" type="text" name="name_task" id="name_task" value="" placeholder="Введите название">
                    </div>

                    <div class="form__row">
                        <label class="form__label" for="project">Проект <sup>*</sup></label>


                        <select class="form__input form__input--select" name="project" id="project">
                            <option value="">Выберите категорию</option>
                            <?php foreach($project_array as $key => $value): ?>
                                <option value="<?=$value['id']?>"><?=htmlspecialchars($value['name'])?></option>
                            <?endforeach;?>
                        </select>
                    </div>

                    <div class="form__row">
                        <label class="form__label" for="date">Дата выполнения</label>

                        <input class="form__input form__input--date" type="text" name="date" id="date" value="" placeholder="Введите дату в формате ГГГГ-ММ-ДД">
                    </div>

                    <div class="form__row">
                        <label class="form__label" for="file">Файл</label>

                        <div class="form__input-file">
                            <input class="visually-hidden" type="file" name="file" id="file" value="">

                            <label class="button button--transparent" for="file">
                                <span>Выберите файл</span>
                            </label>
                        </div>
                    </div>

                    <div class="form__row form__row--controls">
                        <input class="button" type="submit" name="" value="Добавить">
                    </div>
                </form>
            </main>
        </div>
    </div>
</div>
