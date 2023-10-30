@extends('Center.layout')
@section('cen')
<div style="position:absolute;background:#ff0f0f;color:white;font-size:50px;
top:200px;right:400px;font-family:Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
border-radius:20px">    
    للأسف لقد انتهى التسجيل على هذه الدورة
</div>
<button style="width:100px;height:50px;background:#0e0eff;border-radius:10px;
position: absolute;top:300px;right:650px;
">
    <a href="http://localhost:8000/show/order" style="
    color:white;text-decoration:none;font-size:24px;font-famile:'snap ITC';font-weight:bolder;
    ">Back</a></button>
    {{-- <p style="font-size:24px;font-weight:bolder;position:absolute;top:370px;right:600px;">للتسجيل على دورة أخرى</p>
    <button style="width:100px;height:50px;background:#0eff0e;border-radius:10px;
    position: absolute;top:420px;right:650px;
    ">
        <a href="http://localhost:8000/add.and.show.student" style="
        color:white;text-decoration:none;font-size:24px;font-famile:'snap ITC';font-weight:bolder;
        ">Back</a></button> --}}
@endsection