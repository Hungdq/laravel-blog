<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <link href="/public/css/blog.css" rel="stylesheet">
</head>

<body>

    <div class="container">
        @include ('layouts.header')
        
        @include ('layouts.nav')
        
        @include ('layouts.banner')  
        
        @if ($flash = session('message'))
            <div class="alert alert-success" role="alert">
                {{ $flash }}
            </div>
        @endif
    </div>

    <main role="main" class="container">
        <div class="row">
            <div class="col-md-8 blog-main">
                @yield ('content')
                
            </div><!-- /.blog-main -->

            @include ('layouts.sidebar')
            

        </div><!-- /.row -->

    </main><!-- /.container -->

    @include ('layouts.footer')

</body>
</html>
