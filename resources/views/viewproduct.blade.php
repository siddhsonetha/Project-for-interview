<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>


    <style>
        body{
            background-color:lavender;
        }
    </style>


</head>
<script>
    $(function () {
        $('#example1').DataTable()
        $('#example2').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
        })
    })
</script>



<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <center><h1>
            Products
        </h1></center>
<hr>
    </section>
@csrf
    <div class="box">
        <div class="box-header">
            <div class="ml-5">You Can Add All From Here :-
            <a href="{{ route('product.create')}}" class="btn btn-primary ml-5"><b>Add New Product</b></a>
            <a href="{{ route('category.create')}}" class="btn btn-primary ml-5"> Add New Category</a>

            <a href="{{route('export')}}" class="btn btn-success ml-5"> <b>Export Product Data To Excel</b></a>

        </div><hr>

        <!-- /.box-header -->
        <div class="box-body table-responsive ">
            <table id="example1" class="table table-bordered table-striped ">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th>Image</th>

                    <th>Action</th>
                </tr>
                </thead>
                <tbody>

                @foreach($Product as $value)
                    <tr>
{{--                        <td><input type="checkbox" name="exp[]" value="{{$value->id}}"></td>--}}

                        <td>{{ $value->id}}</td>
                        <td>{{ $value->product_name }}</td>
                        <td>{{ $value->product_description }}</td>
                        <td>{{$value->category['category_name']}}</td>
                        <td> <img src="{{asset('uploads/product/'.$value->product_image)}}" width="100" height="100"></td>

                        <td>
                            <form action="{{route('product.destroy',$value->id)}}"  method="post"enctype="multipart/form-data">
                                @csrf
                                @method('DELETE')
                                <a class="btn btn-danger" href="{{route('product.edit',$value->id)}}">Edit</a>
                                <button class="btn btn-danger" href="">Delete<i class="fa fa-remove"></i></button>

                            </form>
                        </td>


                    </tr>
                @endforeach

                </tbody>

            </table>

        </div>
        <!-- /.box-body -->
    </div></form>
    <!-- /.box -->
</div>
<!-- /.col -->

<!-- /.row -->
<!-- /.content -->
