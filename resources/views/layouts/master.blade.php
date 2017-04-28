<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title>Reddit</title>
</head>
<body>
    @yield('uppercase')
    @yield('increment')
    @if(session()->has('errorMessage'))
    <div class="alert alert-danger">{{ session('errorMessage') }}</div> 
    @endif
    @if(session()->has('successMessage'))
    <div class="alert alert-success">{{ session('successMessage') }}</div> 
    @endif
    @yield('content')
    @yield('add')
</body>
</html>