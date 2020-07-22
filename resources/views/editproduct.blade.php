<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <style>
        body{
            background-color:lavender;
        }
    </style>
   </head>
<body>
<div class="container shadow-lg p-3 mb-5 mt-5 rounded bg-light" >
    <form method="post" enctype="multipart/form-data" action="{{route('product.update',$product->id)}}">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-12">
                <font size="5"><b><center>Products</center></b></font>
                <div class="form-group">
                    <b><label>Enter Product Name</label></b>
                    <input type="text" class="form-control" name="product_name" placeholder="Enter Product Name" value="{{$product->product_name}}" required>
                </div>
                <br>
                <div class="form-group">
                    <b><label>Enter Product Price</label></b>
                    <input type="text" class="form-control" name="product_price" placeholder="Enter Product Price" value="{{$product->product_price}}" required>
                </div>
                <br>
                <div class="form-group">
                    <b><label>Enter Product Description</label></b>
                    <input type="text" class="form-control" name="product_description" placeholder="Enter Product Description"  value="{{$product->product_description}}"required>
                </div>
                <div class="form-group">
                    <b><label>Select Product image</label></b>
                    <input type="file" class="form-control" name="product_image" required>
                    <img src="{{asset('uploads/product/'.$product->product_image)}}" width="100" height="100">
                </div>


                <br>

                <div class="form-group">
                    <b><label>Select Category</label></b>
                    <?php $cate=\App\Category::all()?>

                    <select name="category" id="category" class="form-control" onchange="disable()">
                        @foreach($cate as $value)
                            <option value="{{$value->id}}">{{$value->category_name}}</option>
                        @endforeach
                    </select>

                </div>

                <br>
                <button type="submit" name="submit" class="btn btn-primary" > Submit</button>
            </div>
        </div>
    </form>
</div>
</body>
</html>
