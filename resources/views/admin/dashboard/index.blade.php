
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="">

    <title>Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('css/dashboard.css')}}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="{{'https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js'}}"></script>
    <script src="{{'https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js'}}"></script>
    <![endif]-->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
</head>

<body>

<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Admin panel</a>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Настройки</a></li>
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>
                    <div class="dr-menu dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
            <form class="navbar-form navbar-right">
                <input type="text" class="form-control" placeholder="Search...">
            </form>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
                <li><a href="{{'/'}}">Главная страница</a></li>
                <li><a href="#">Аналитика</a></li>
                <li><a href="#">Експорт</a></li>
            </ul>
            <ul class="nav nav-sidebar">
                <li><a href="">Навигация</a></li>
                <li><a href="">Навигация снова</a></li>
                <li><a href="">Еще один нав</a></li>
                <li><a href="">Еще один элемент навигации</a></li>
                <li><a href="">Больше навигации</a></li>
            </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Никнейм</th>
                        <th>Email</th>
                        <th>Дата регистрации</th>
                        <th>Редактирование</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr class="{{ (bool)$user->is_block ? 'alert alert-danger' : ''}}">
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}
                    @if ($user->deleted_at)
                        <div class="badge badge-danger">dell</div>
                    @endif
                    @if ($user->is_admin == 1)
                        <div class="badge badge-success">A</div>

                    @endif
                            </td>
                            <td>{{ $user->email  }}</td>
                            <td>{{ $user->created_at }}</td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary">Доп. действия</button>
                                    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                        <span class="caret"></span>
                                        <span class="sr-only">Меню с переключением</span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="{{ route('admin.edit', ['id' => $user->id]) }}">Изменить</a></li>
                                @if(!$user->deleted_at)
                                        <li><a href="{{ route('admin.destroy', ['id' => $user->id]) }}">Удалить</a></li>
                                @else
                                        <li><a href="{{ route('admin.restore', ['id' => $user->id]) }}">Восстановить</a></li>
                                @endif
                                        <li><a href="{{ route('admin.block', ['id' => $user->id]) }}">{{ (bool)$user->is_block ? 'Розблокировать' : 'Заблокировать' }}</a></li>
                                        <li class="divider"></li>
                                        <li><a href="{{ route('admin.create') }}">Создать</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="{{'https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js'}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/docs.min.js')}}"></script>
</body>
</html>
