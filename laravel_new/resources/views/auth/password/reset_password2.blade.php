<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="{{ asset('styles.css') }}" rel="stylesheet">
    <title>اعادة تعيين  كلمة المرور</title>
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
                <div class="card-header" ><div style="margin-left: 40%">اعادة تعيين كلمة المرور</div></div>

                <div class="card-body">
                    <form  action="{{route('reset.password')}}" method="POST">
                        @csrf
                        <input type="hidden" name="user_type" value="{{$user_type}}">

                        <input type="hidden" name="token" value="{{$token}}">
                        <div class="row mb-3">
                            <label  class="col-md-4 col-form-label text-md-end">البريد الالكتروني</label>

                            <div class="col-md-6">
                                <input  name="email" type="email" class="form-control" value="{{$email ?? old('email')}}" readonly >
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end" >كلمة المرور الجديدة</label>
                            <div class="col-md-6">
                                <input  name="password" type="password" class="form-control" >
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end"  >تأكيد كلمة المرور </label>
                            <div class="col-md-6">
                                <input  name="confirm_password" type="password" class="form-control" >
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">حفظ
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
