<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from eliteadmin.themedesigner.in/demos/bt4/dark/form-basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 17 Feb 2020 20:36:27 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Elite Admin Template - The Ultimate Multipurpose admin template</title>
    <link href="{{asset('admin/assets/dist/css/style.min.css')}}" rel="stylesheet">

</head>

<body class="skin-default-dark fixed-layout">
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="page-wrapper">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                <div class="col-md-6"><h4 class="card-title">Blog</h4></div>
                <div class="col-md-6" style="text-align: right"> 
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>User</th>
                            <th>Title</th>
                            <th>Desciption</th>
                            <th>Edit</th>
                            <th>Delete</th>
                            
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($userblog as $userblog)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $userblog->name }}</td>
                            <td>{{ $userblog->title }}</td>                                
                            <td>{{ $userblog->description }}</td>
                            <td> <a href="" class="btn waves-effect waves-light btn-warning">Edit</a></td>
                            <td> <button onclick="BlogDelete('{{$userblog->id}}')" type="button" class="btn waves-effect waves-light btn-danger">Delete</button></td>                              
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
function BlogDelete(id) {
    swal({
        title: "Warning",
        text: "Are you sure?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        buttons: ["No", "Yes"],
    })
        .then((willDelete) => {
            if (willDelete) {
                // let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: "{{ route('blog.delete') }}",
                    data: { "_token": "{{ csrf_token() }}", id:id },
                    method: "POST",
                    success: function (data) {
                        if(data==="ok"){
                            swal("Success!", "Message deleted!", "success");
                            window.setTimeout(function(){location.reload()},2000)
                        }else{
                            swal("Error!", "Message didn't deleted!", "error");
                        }
                    },
                    error: function (x, sts) {
                        console.log("Error...");
                        console.log('no');
                    },
                });
            } else {
                swal("Cancelled!");
            }
        });
}
</script>

<!-- Mirrored from eliteadmin.themedesigner.in/demos/bt4/dark/form-basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 17 Feb 2020 20:36:28 GMT -->
</html>