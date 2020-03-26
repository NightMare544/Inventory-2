<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="{{route('welcome.index')}}">Carrefour</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link active" href="{{route('product.index')}}">Product <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="{{route('category.index')}}">Category</a>
      <a class="nav-item nav-link" href="{{route('store.index')}}">Store</a>
      <a class="nav-item nav-link" href="{{route('branch.index')}}">Branch</a> 
      <a class="nav-item nav-link" href="{{route('Account.index')}}">Account</a>
    </div>
    </nav>
    <div class="container-fluid">
        <form method="POST" action="{{route('store.store')}}">
          @csrf
          <div class="row">
              <div class="col-6">
                  <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Name</span>
                      </div>
                      <input type="text" name="name" class="form-control">
                    </div>
              </div>
          </div> <br>
          <div class="row">
              <div class="col-2 offset-6">
                  <button type="submit" class="btn btn-primary btn-block">Save</button>
              </div>
          </div>
    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Name</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($stores as $store)
            <tr>
            <td>{{$store->name}}</td>
          </tr>
          @endforeach
      <script src="{{asset('js/app.js')}}"></script>
</body>
</html>