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
  <form method="POST" action="{{route('branch.store')}}">
    @csrf
    <div class="row">
        <div class="col-6">
            <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">Name</span>
                </div>
                <input type="text" name="name" class="form-control">
              </div>
              <h1> </h1>
        </div>
      <div class="col-6">
        <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text">Phone</span>
            </div>
            <input type="text" name="phone" class="form-control">
          </div>
      </div>
    </div> <br>
    <select class="form-control" name="store_id">
      @foreach ($stores as $store)
      <option value="{{$store->id}}">{{$store->name}}</option>
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
          <th scope="col">Phone</th>
          <th>Store</th>
          <th scope="col">Edit</th>
          <th scope="col">Delete</th>
          
        </tr>
      </thead>
      <tbody>
        @foreach ($branchs as $branch)
        <tr>
          <td>{{$branch->name}}</td>
          <td>{{$branch->phone}}</td>
        <td>{{$branch->store->name}}</td>
        <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#edit_branch{{$branch->id}}">Edit</button></td>
        <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete_branch{{$branch->id}}">Delet</button></td>
          </tr>
          <div class="modal fade" id="edit_branch{{$branch->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              <form method="POST" action="{{route('branch.update',$branch->id)}}">
                @csrf
                {{method_field('PATCH')}}
                <div class="modal-body">
                <label for="">Name</label>
                <input type="text" class="form-control" name="up_name" value="{{$branch->name}}">
                
                <label for="">Phone</label>
                <input type="text" class="form-control" name="up_phone" value="{{$branch->phone}}">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
              </div>
            </div>
          </div>      
        </form> 
        <div class="modal fade" id="delete_branch{{$branch->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <form method="POST" action="{{route('branch.destroy',$branch->id)}}">
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