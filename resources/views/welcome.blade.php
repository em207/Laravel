<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Jeux de Mots</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>


<nav class="navbar navbar-default" role="navigation">
    <div class="navbar-header" >
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    </div>
    <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-left">
            <li><a href="/"><img src="https://upload.wikimedia.org/wikipedia/fr/thumb/a/a1/JDM_jeu_principal.png/220px-JDM_jeu_principal.png" height="30" width="156" /></a></li>
        </ul>
    </div>
</nav>


<home errors="{{$errors->default->first('reason')}}"></home>
<!-- JavaScript -->
<script src="/js/app.js"></script>
<script>
    const app = new Vue({
        el: 'home',
        components: {
            "home": Home
        }
    });
</script>
</body>
</html>
