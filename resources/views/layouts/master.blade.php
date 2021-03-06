<!DOCTYPE html>
<html lang="en-us">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to Reddit!</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ action('PostsController@index') }}">Reddit.dev</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li><a href="/posts">Home</a></li>
              @if (Auth::check())
              <li><a href="{{ action('UsersController@show', Auth::id())}}">My Account</a></li>
              @endif
            </ul>
            <ul class="nav navbar-nav navbar-right">
        	    <form class="navbar-form navbar-left">
			        <div class="form-group">
			          <input type="text" class="form-control" placeholder="Search by title or content" name="search" method="post">
			        </div>
			        <button type="submit" class="btn btn-default">Submit</button>
			    </form>
              @if (Auth::check())
                    <li><a href="{{ action('PostsController@create') }}">Create Post</a></li>
                    <li><a href="{{ action('Auth\AuthController@getLogout') }}">Logout</a></li>
              @else
                    <li><a href="{{ action('Auth\AuthController@getLogin') }}">Login</a></li>
              @endif
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>
    <main class="container">
        @if (Session::has('successMessage'))
            <div class="alert alert-success">{{ session('successMessage') }}</div>
        @endif
        @if (Session::has('errorMessage'))
            <div class="alert alert-danger">{{ session('errorMessage') }}</div>
        @endif
        
        @yield('content')
    </main>

    <!-- minified jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</body>
</html>