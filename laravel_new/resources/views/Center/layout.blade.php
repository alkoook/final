    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>
        
        .my_nav{
            background:whitesmoke;
        }
        .nav-link{
            color:black;
            font-size:25px;
            margin:2px;
            background:#f0f0f0;
            border-radius:10px;
            font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }
    </style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>لوحة التحكم</title>
    <link href="{{ asset('trainer.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Readex+Pro:wght@200&display=swap" rel="stylesheet">
</head>
<body style="direction: rtl;">
    <div class="my_nav">
        <ul class="nav" style="direction: rtl;height: 65px">
              <a class="nav-link " href="{{route('dash')}}" > الصفحة الرئيسية</a>
              <a class="nav-link " href="{{route('show.trainer')}}"> اضافة مدربين </a>
              <a class="nav-link " href="{{route('show.order')}}"> اضافة دورات </a>
              <a class="nav-link " href="{{route('show.user.order')}}"> طلبات التسجيل </a>
              <a class="nav-link " href="{{route('student.addandshowstudent')}}"> اضافة الطلاب </a>
              <a class="nav-link " href="{{route('logout')}}"style="color:red"> تسجيل الخروج  </a>
          </ul>
    
    @yield('cen')


</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>
