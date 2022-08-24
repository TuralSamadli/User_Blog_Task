<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
        <form method="POST" action="#" class="form pt-3">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon22"><i class="ti-email"></i></span>
                    </div>
                    <input type="email" name="email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="basic-addon22">
                </div>
            </div>
            <div class="form-group">
                <label>Password</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon33"><i class="ti-lock"></i></span>
                    </div>
                    <input type="password" name="password"  class="form-control" placeholder="Password" aria-label="Password" aria-describedby="basic-addon33">
                </div>
            </div>
            <button type="submit" class="btn btn-success mr-2">Submit</button>
            <button type="submit" class="btn btn-dark">Cancel</button>
        </form>
        
        
        
</body>
</html>