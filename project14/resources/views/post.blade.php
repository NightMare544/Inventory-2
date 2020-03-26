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
      <a class="nav-item nav-link" href="{{route('bills.index')}}">Bills</a>
      <a class="nav-item nav-link" href="{{route('Account.index')}}">Account</a>
    </div>
  </div>
</nav>
  <div class="container-fluid">
  <form method="POST" action="{{route('product.store')}}">
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
      <div class="col-6">
        <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text">Price</span>
            </div>
            <input type="text" name="phone" class="form-control">
          </div>
      </div>
    </div> <br>
    <select class="form-control" name="category_id">
      @foreach ($categorys as $category)
      <option value="{{$category->id}}">{{$category->name}}</option>
      @endforeach
      </select>
    <div class="row">
        <div class="col-2 offset-6">
            <button type="submit" class="btn btn-primary btn-block">Save</button>
        </div>
    </div>
  </form>
  
    <br>
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Name</th>
          <th scope="col">price</th>
          <th>Category</th>
          <th scope="col">Edit</th>
          <th scope="col">Delete</th>
          <th>Bill</th>
        </tr>
      </thead>
      <tbody>

        @foreach ($products as $product)
        <tr>
          <td>{{$product->name}}</td>
          <td>{{$product->phone}}</td>
        <td>{{$product->category->name}}</td>
        <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#edit_product{{$product->id}}">Edit</button></td>
        <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete_product{{$product->id}}">Delete</button></td>
        <td><a href="{{route('bills.index',$product->id)}}" class="btn btn-warning">Bill</a></td>
      
          </tr>
          <div class="modal fade" id="edit_product{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              <form method="POST" action="{{route('product.update',$product->id)}}">
                @csrf
                {{method_field('PATCH')}}
                <div class="modal-body">
                <label for="">Name</label>
                <input type="text" class="form-control" name="up_name" value="{{$product->name}}">
                
                <label for="">Price</label>
                <input type="text" class="form-control" name="up_phone" value="{{$product->phone}}">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
              </div>
            </div>
          </div>      
        </form> 
       
        <div class="modal fade" id="delete_product{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <form method="POST" action="{{route('product.destroy',$product->id)}}">
              @csrf
              {{method_field('DELETE')}}
              <div class="modal-body">
                <h3>Are You Sure?</h3>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Yes</button>
              </div>
            </div>
          </div>
        </div>            
        </form>
          @endforeach
      </tbody>
    </table>
  <script src="{{asset('js/app.js')}}"></script>
</body>
</html>
