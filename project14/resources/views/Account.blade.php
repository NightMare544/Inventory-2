<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
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
<table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Password</th>
          <th scope="col">Edit</th>
          <th scope="col">Delete</th>
          
         </tr>
         </thead>
         <tbody>
      @foreach ($users as $user)
        <tr>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->password}}</td>
        <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#edit_user{{$user->id}}">Edit</button></td>
        <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete_user{{$user->id}}">Delete</button></td>
        </tr>
        <div class="modal fade" id="edit_user{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <form method="POST" action="{{route('Account.update',$user->id)}}">
              @csrf
              {{method_field('PATCH')}}
              <div class="modal-body">
              <label for="">Name</label>
              <input type="text" class="form-control" name="up_name" value="{{$user->name}}">
              <label for="">Email/label>
              <input type="text" class="form-control" name="up_email" value="{{$user->email}}">
              <label for="">Password</label>
              <input type="text" class="form-control" name="up_password" value="{{$user->password}}">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>
        </div>      
      </form> 
        <div class="modal fade" id="delete_user{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <form method="POST" action="{{route('Account.destroy',$user->id)}}">
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