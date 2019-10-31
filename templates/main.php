<section class="content__side">
    <h2 class="content__side-heading">Проекты</h2>

    <nav class="main-navigation">
        <ul class="main-navigation__list">
            <?php foreach($project_array as $value): ?>
                <?php if (isset($value)):?>
                    <li class="main-navigation__list-item">
                        <a class="main-navigation__list-item-link" href="#"><?=htmlspecialchars($value)?></a>
                        <span class="main-navigation__list-item-count"><?=count_task($task_array,$value)?></span>
                    </li>
                <?endif;?>
            <?endforeach;?>
        </ul>
    </nav>

    <a class="button button--transparent button--plus content__side-button"
       href="pages/form-project.html" target="project_add">Добавить проект</a>
</section>

<main class="content__main">
    <h2 class="content__main-heading">Список задач</h2>

    <form class="search-form" action="index.php" method="post" autocomplete="off">
        <input class="search-form__input" type="text" name="" value="" placeholder="Поиск по задачам">

        <input class="search-form__submit" type="submit" name="" value="Искать">
    </form>

    <div class="tasks-controls">
        <nav class="tasks-switch">
            <a href="/" class="tasks-switch__item tasks-switch__item--active">Все задачи</a>
            <a href="/" class="tasks-switch__item">Повестка дня</a>
            <a href="/" class="tasks-switch__item">Завтра</a>
            <a href="/" class="tasks-switch__item">Просроченные</a>
        </nav>

        <label class="checkbox">
            <!--добавить сюда атрибут "checked", если переменная $show_complete_tasks равна единице-->
            <input class="checkbox__input visually-hidden show_completed" <?php if ($show_complete_tasks) :?>checked <?php endif;?> type="checkbox">
            <span class="checkbox__text">Показывать выполненные</span>
        </label>
    </div>

    <table class="tasks">
        <!--Запускаю цикл foreach для того чтобы пробежать ассоциативный массив-->
        <?php foreach ($task_array as $task => $value):?>
            <!--Проверяю, если в ключе "Выполнена" значение выполнена, то добавляю класс task--completed-->
            <tr class="tasks__item task <?php if($value['is_complete']) :?>task--completed<?php endif;?>">
                <!--Проверяю отмечен ли чекбокс показывать выполненные задачи и выполнена ли задача(два
                одновременных условия). Если стоит чекбокс и задача выполнена, то задача показывается,
                если чекбокс не отмечен, задача скрыта)-->
                <?php if ($show_complete_tasks===0 and $value['is_complete']) continue;?>
                <td class="task__select">
                    <label class="checkbox task__checkbox">
                        <input class="checkbox__input visually-hidden task__checkbox" type="checkbox" value="1">
                        <!--вывожу название задачи-->
                        <span class="checkbox__text"><?=htmlspecialchars($value['task_name'])?></span>
                    </label>
                </td>

                <td class="task__file">
                    <a class="download-link" href="#">Home.psd</a>
                </td>
                <!--
                    Делаю проверку на NULL в ключе date_complete, если там NULL тогда выводить "не известно",
                в остальном выводить дату.
                isset вернет true если в переменно не NULL, false если NULL. Отрицанием !isset я получаю true
                и вывожу 'не известно'. В остальных случаях показывается дата.

                Но тут возникает вопрос,если в ключе 'date_complete' => 'null' - null записать в
                кавычках то ничего не работает. Если без кавычек, то работает.

                -->
                <td class="task__date"><?php if(isset($value['date_complete'])) {
                        echo (htmlspecialchars($value['date_complete']));
                    } else {
                        echo ('не известно');
                    };?>
                </td>
                <td class="task__controls"></td>
            </tr>
        <?endforeach;?>
    </table>
</main>
