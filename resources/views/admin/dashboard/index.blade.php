
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="">

    <title>Dashboard Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ URL::asset('css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ URL::asset('css/dashboard.css')}}" rel="stylesheet">

    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="{{'https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js'}}"></script>
    <script src="{{'https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js'}}"></script>
    <![endif]-->
</head>

<body>
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Admin panel</a>
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
                        <!-- <th>Права доступа</th> -->
                        <th>Редактирование</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr class="user{{ (bool)$user->is_block ? ' text-danger' : '' }}">
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}
                                @if ($user->is_admin == 1)
                                    <div class="badge badge-light">A</div>
                                @endif    
                            </td>
                            <td>{{ $user->email  }}</td>
                            <td>{{ $user->created_at }}</td>
                            <td><a  class="btn btn-danger" 
                                    href="{{ route('admin.destroy', $user->id) }}">Удалить</a>
                                <a href="{{ route('admin.edit', $user->id) }}"
                                   class="btn btn-primary">Изменить</a>    
                            </td>
                                                            
                                    
                               <!--  <div class="btn-group">
                                    <button type="button" class="btn btn-danger">Действие</button>
                                    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
                                        <span class="caret"></span>
                                        <span class="sr-only">Меню с переключением</span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="{{ route('admin.edit', ['id' => $user->id]) }}">Изменить</a></li>
                                        <li><a href="{{ route('admin.destroy', ['id' => $user->id]) }}">Удалить</a></li>
                                        <li><a href="{{ route('admin.block', ['id' => $user->id]) }}">{{ (bool)$user->is_block ? 'Рaзблокировать' : 'Заблокировать' }}</a></li>
                                        <li class="divider"></li>
                                        <li><a href="{{ route('admin.create') }}">Создать</a></li>
                                    </ul>
                                </div> -->
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
<script src="{{URL::asset('js/bootstrap.min.js')}}"></script>
<script src="{{URL::asset('js/docs.min.js')}}"></script>
</body>
</html>
