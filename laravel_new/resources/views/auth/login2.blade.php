<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="{{ asset('styles.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <title>Document</title>
</head>
<body >
<div class="container" style="direction: rtl">
    <div class="row justify-content-center">

        <div class="col-md-7 mt-5">
            @if ($message=Session::get('faild'))
                <div class="alert alert-danger text-center" role="alert">
                   {{$message}}
                </div>
            @endif
            <div class="card mt-5">

                <div class="card-header text-center " >
                    <p class="mt-2" style="font-size: 20px">تسجيل الدخول</p>
                </div>
            </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-4">البريد الالكتروني</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" >
                                @error('email')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-4">كلمة المرور</label>
                            <div class="col-md-6">
                                <input id="myInput"  type="password" class="form-control @error('password') is-invalid @enderror" name="password" >
                                  <i class="far fa-eye" onclick="myFunction()" id="myInput" style="margin-left: 6px; cursor: pointer;position: absolute;margin-top: -30px"></i>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-4">نوع المستخدم </label>

                            <div class="col-md-6">

                                <select name="user_type" class="form-control">
                                    <option value="user">center</option>
                                    <option value="admin">admin</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                   تسجيل الدخول
                                </button>

                            </div>
                              <a href="{{route('forgot.password.from')}}" class="mr-4 mt-2"> نسيت كلمة المرور</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
</body>
</html>
