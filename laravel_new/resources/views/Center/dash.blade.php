@extends('Center.layout')
@section('cen')
    
   <div class="row" style="position: relative;right:70px;">

    @php

    foreach ($cor as $s)
{
           
      echo ' <div  class="col-lg-2 col-md-6 m-5" style="height:150px;text-align:center;border-radius:12px;
      color:white;font-size:24px;background:#86112e">
            '.$s->name.'<br>
            .'.$s->details.'<br>
            عدد الطلاب  '.$std->where('course_id',$s->id)->count().'
            <br>
            <a href="http://localhost:8000/sho/std/sourse/'.$s->id.'"style="color:gold;text-decoration:none;margin-top:10px;">اضغط للتفاصيل...</a>
    </div>';
}
    @endphp
</div>


@endsection
