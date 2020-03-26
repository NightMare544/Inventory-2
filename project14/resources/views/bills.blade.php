<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrefour</title>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    <link rel="stylesheet" href="{{asset('css/bills.css')}}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <!------ Include the above in your HEAD tag ---------->
</head>
<body>

<div class="container-fluid pt-5">
    <div class="row">
    
        <div class="well col-8 offset-2">
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <address>
                        <br>
                        <label class="d-inline"> location :</label>
                        
                            <label class="mt-3 d-inline ">{{$bills->branch->name}}</label>
                        
                        <br>
                        <p>
                        <label >Date : </label>
                        <label for="">{{$bills->created_at}}</label>
                        </p>
                     <p>
                     <label for="">Serial Number :</label>
                        <label for="">{{$bills->serial}}</label>
                      </div></em>
                    </p>
                    
            </div>
            <div class="text-center">
                    <h1 >Receipt</h1>
                </div>
            <div class="row">
                <div class="text-center">
                    
                </div>
                </span>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th class="text-center">Price</th>
                            <th class="text-center">Total</th>
                             </tr>
                            </thead>
                             <tbody>
                              <tr>
                            <td class="col-md-12"><em> {{$bills->product->name}}</em></h4></td>
                            <td class="col-md-1" style="text-align: center"> {{$bills->quantity}} </td>
                            <td class="col-md-1 text-center">{{$bills->product->phone}}</td>
                            <td class="col-md-1 text-center">{{$bills->quantity * $bills->product->phone}}</td>
                            </tr>
                            <tr>
                            <td class="col-md-9"><em>
                            </td >
                            <td>   </td>
                            <td class="text-right">
                            <p>
                                <strong>Subtotal: </strong>
                            </p>
                            <p>
                                <strong>Tax: </strong>
                            </p></td>
                            <td class="text-center">
                            <p>
                                <strong>{{$bills->quantity * $bills->product->phone}}$</strong>
                            </p>
                            <p>
                                <strong>{{($bills->quantity * $bills->product->phone) * 0.14}}$</strong>
                            </p></td>
                        </tr>
                        <tr>
                                <td></td>
                                <td></td>
                            <td colspan="2" class="text-center text-danger text-right"><h4><strong>Total: </strong><strong>{{$bills->quantity * $bills->product->phone + ($bills->quantity * $bills->product->phone) * 0.12}}$</strong></h4>   </td>
                            
                        </tr>
                    </tbody>
                    
                </table>
                <a href="{{route('paymantlogo.index')}}" button type="button" class="btn btn-success btn-lg btn-block" >
                    Pay Now   <span class="glyphicon glyphicon-chevron-right" ></span>
                </button></td></a>
            </div>
        </div>
    </div>
    
    <div class="container" id="box">
	<div class="row">
    <div class="col-6 offset-6">
    <a href="{{route('welcome.index')}}"><button type="submit" class="btn btn-primary ">Save</button></a>
    <button class="btn btn-primary hidden-print" onclick="myFunction()"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Print</button> 
    </div>
        
	</div>
</div>

    <script src="{{asset('js/bills.js')}}"></script>
</body>
</html>