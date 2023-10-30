<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="{{ asset('styles.css') }}" rel="stylesheet">
    <title>نسيت  كلمة المرور</title>
</head>
<body >

<div class="container" style="direction: rtl">
    <div class="row justify-content-center">
        <div class="col-md-7 mt-5">
            @if ($message=Session::get('successfilly'))
            <div class="alert alert-danger text-center" role="alert">
               {{$message}}
            </div>
            @endif
            <div class="card mt-5">
                <div class="card-header" ><div style="margin-left: 40%">استراد كلمة المرور</div></div>

                <div class="card-body">
                    <form  action="{{route('forgot.password.link')}}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <label  class="col-md-4 col-form-label text-md-end">البريد الالكتروني</label>

                            <div class="col-md-6">
                                <input id="email" name="email" type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" >
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end" >نوع المستخدم </label>

                            <div class="col-md-6">

                                <select name="user_type" class="form-control">
                                    <option value="center">center</option>
                                    <option value="admin">admin</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">ارسال
                                </button>

                            </div>
                              <a href="{{route('show-login')}}" class="mr-4 mt-2">الصفحة الرئيسية</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
