<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>لوحة التحكم</title>
    <link href="{{ asset('style.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Readex+Pro:wght@200&display=swap" rel="stylesheet">
</head>
<body style="direction: rtl">

    <div class="my_nav">
        <ul class="nav" style="direction: rtl;background-color: whitesmoke;height: 50px;top:0%">
            <li class="nav-item">
              <a class="nav-link " href="{{route('dashbord')}}"> الصفحة الرئيسية :</a>
            </li>


          </ul>
    </div>


       <div class="nav_c">
           <div class="c1">
            <img src="{{asset('img/Author.png')}}" alt="" class="img_nav"><br>
            <a href="{{route('admin.profile')}}" >الملف الشخصي</a><hr class="hr">
            <a href="{{route('create_admin')}}"> اضافة مشرف</a><hr class="hr">
            <a href="{{route('show_center')}}"> اضافة مركز</a><hr class="hr">
            <a href="{{route('subscription')}}"> اسعار الاشتراكات</a><hr class="hr">
            <a href="{{route('logout_admin')}}"> تسجيل الخروج</a><hr class="hr">

           </div>
           <div class="c2">
            @yield('content')
           </div>
       </div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
