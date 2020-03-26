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
  </div>
</nav>
  <div class="container-fluid">
  <form method="POST" action="{{route('bills.store')}}">
    @csrf
    <div class="row">
        <div class="col-6">
            <label for="">Serial</label>
            <input type="text" class="form-control" name="serial">
        </div>
        <div class="col-6">
        <label for="">Product</label>
            <select name="product_id" id="" class="form-control">
                <option value="" disabled selected>Select Product</option>
                @foreach($products as $product)
                <option value="{{$product->id}}">{{$product->name}}</option>
                @endforeach
            </select>
        </div>
    </div> <br>
    <div class="row">
        <div class="col-6">
            <label for="">Branch</label>
            <select name="branch_id" id="" class="form-control">
                <option value="" disabled selected>Select Branch</option>
                @foreach($branches as $branch)
                <option value="{{$branch->id}}">{{$branch->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-6">
            <label for="">Quantity</label>
            <input type="number" class="form-control" name="quantity">
        </div>
    </div> <br>

    <div class="row">
        
    </div>
  
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
          <th scope="col">Serial</th>
          <th>Product</th>
          <th>Branch</th>
          <th scope="col">Quantity</th>
          <th>Price</th>
          <th>Total</th>
          <th scope="col">Edit</th>
          <th scope="col">Delete</th>
          <th>Bill</th>
        </tr>
      </thead>
      <tbody>

        @foreach ($bills as $bill)
        <tr>
            <td>{{$bill->serial}}</td>
            <td>{{$bill->product->name}}</td>
            <td>{{$bill->branch->name}}</td>
            <td>{{$bill->quantity}}</td>
            <td>{{$bill->product->phone}}</td>
            <td>{{$bill->product->phone * $bill->quantity}}</td>
            <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#edit_bill{{$bill->id}}">Edit</button></td>
            <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete_bill{{$bill->id}}">Delete</button></td>
        <td><a href="{{route('bills.show',$bill->id)}}" class="btn btn-warning">Bill</a></td>
      
          </tr>
          <div class="modal fade" id="edit_bills{{$bill->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              <form method="POST" action="{{route('bills.update',$bill->id)}}">
                @csrf
                {{method_field('PATCH')}}
                <div class="modal-body">
                <label for="">Name</label>
                <input type="text" class="form-control" name="up_name" value="{{$bill->code}}">
                
                <label for="">Price</label>
                <input type="text" class="form-control" name="up_phone" value="{{$bill->product}}">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
              </div>
            </div>
          </div>      
        </form> 
       
        <div class="modal fade" id="delete_bill{{$bill->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <form method="POST" action="{{route('bills.destroy',$bill->id)}}">
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
