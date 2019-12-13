<!doctype html>
<html lang = "ja">
    <head>
      <div class="container-fluid pr-0 pl-0">
      <nav class="navbar navbar-expand-md navbar-dark bg-info mt-3 mb-3">
         <a class="navbar-brand" href="/"><h2>Blog</h2></a>
            <div class="col-md-6">
              <form action= "/search" method= "get">
                <div class="input-group">
                  <input type="search" name="search" class="form-control">
                    <span class="input-group-prepend">
                    <button type="submit" class="btn btn-primary">Search</button>
                    </span>
                </div>  
              </form>
          </div>
          <div><a href="/create" class="btn btn-primary">New Create</a></div>
       </nav>
      </div>
      <meta charaset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  </head>
  <body class="p-4">
    <a class="text-info" href="/"><h1>Index</h1></a>
  <ul class= "text-right">  
  <select onChange="location.href=value;">
    <option value="/">default</option>
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