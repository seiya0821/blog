<!doctype html>
<html lang = "ja">
    <head>
      <div class="container-fluid pr-0 pl-0">
       <ul class="navbar-nav mr-auto">
       <nav class="navbar navbar-expand-md navbar-dark bg-info mt-3 p-4">
         <a class="navbar-brand" href="/"><h2>Blog</h2></a>
            <div class="col-md-6">
              <form action= "/search" method= "get">
               {{ csrf_field() }}
                <div class="input-group">
                  <input type="text" name="search" value="@if (isset($search)) {{$search}} @endif" class="form-control" placeholder="検索ワードを入力してください">
                    <span class="input-group-prepend">
                    <button type="submit" class="btn btn-primary">Search</button>
                    </span>
                </div>  
              </form>
          </div>
          <div><a href="/create" class="btn btn-primary">New Create</a></div>
          @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
          @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
          @endif
        </ul>
                        
          @else
          <ul class="navbar-nav">          
            <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }} <span class="caret"></span>
              </a>

               <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
          @endguest  
  </nav>
                        
      </div>
      <meta charaset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  </head>
  <h5 div class="card-title"></h5>
  <body class="p-4">
    <a class="text-info" href="/"><h1>Index</h1></a>
  <ul class= "text-right">  
   <select onChange="location.href=value;">
     <option value="/">選択してください</option>
     <option value="./?sort=desc">new</option>
     <option value="./?sort=asc">old</option>
　 </select>
  </ul>
    @foreach ($articles as $article)
    <div class="card mb-2">
     <span class="border border-info">
      <div class="card-body">
        <h3 class="card-title">{{ $article->title }}</h3>
        <h6 class="card-subtitle mb-2 text-muted">{{ $article->updated_at }}</h6>
        <p class="card-text">{{ $article->body }}</p>
        <a href="/edit/{{ $article->id }}" class="card-link">edit</a>
        <a href="/delete/{{ $article->id }}" class="card-link">destroy</a>
      </div>
      </span>
    </div>
    @endforeach

    <div>
    {{ $articles->links() }}
    </div>
 
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  </body>
</html>