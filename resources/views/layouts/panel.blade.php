<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="/">Главная</a>
        </div>
        <ul class="nav navbar-nav">
            <li>
                {{ link_to_route('admin.group.index', 'Группы', [], []) }}
            </li>
            <li>
                {{ link_to_route('admin.question.index', 'Вопросы', [], []) }}
            </li>
            <li>
                {{ link_to_route('admin.test.index', 'Тесты', [], []) }}
            </li>
            <li>
                {{ link_to_route('admin.result.index', 'Результаты', [], []) }}
            </li>
        </ul>
    </div>
</nav>
