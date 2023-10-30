@extends('Center.layout')

@section('cen')


<div class="cont">
    <table class="table mt-3" id="t">
    <thead class="thead-dark " >
      <tr>
        <th scope="col">الرقم التسلسلي</th>
        <th scope="col">الاسم </th>
        <th scope="col">التفاصيل </th>
        <th scope="col">العدد</th>
        <th scope="col">البداية</th>
        <th scope="col">النهاية</th>
        <th scope="col">المدرب</th>
        <th scope="col">السعر</th>
        <th></th>

      </tr>
    </thead>
    <tbody>
        @php
            $f=0;
        @endphp
        @foreach ($data as $d)
      <tr>

        <td>{{$f=$f+1}}</td>
        <td>{{$d->name}}</td>
        <td>{{$d->details}}</td>
        <td>{{$d->count}}</td>
        <td>{{$d->sdate}}</td>
        <td>{{$d->edate}}</td>
        <td>{{$d->trainer->first_name.' '}}{{$d->trainer->last_name}}</td>
        <td>{{$d->price}}</td>
        <td>
            <div class="row">

            <div class="col-lg">
                <a class="btn btn-success" href="{{route('edit.courseoffer',$d->id)}}" style="width: 80px">تعديل</a>
            </div>
            <div class="col-lg">
                <a class="btn btn-danger" href="{{route('delete.course.offer',$d->id)}}" style="width: 80px">حذف </a>
            </div>
            @endforeach
        </td>

      </tr>

    </tbody>
  </table>


    <form method="POST" action="{{route('create.course')}}" style="position:absolute;width:20%;right:1%;">
        @csrf
        <div class="form-group">
          <input type="text" class="form-control mt-3" name="name"
          @if(empty($order))
            value=""
        @else
            value="{{$order->name}}"
        @endif
          placeholder="الاسم ">
        </div>

        <div class="form-group">
            <textarea  class="form-control mt-3" name="details" rows="3" placeholder="التفاصيل ">
                @if(empty($order))

            @else
                {{$order->details}}
            @endif</textarea>
          </div>

          <div class="form-group">
            <input type="number" class="form-control mt-3" name="count" placeholder=" عدد الطلاب المسموحة">
          </div>

          <div class="form-group">
            <input type="date" class="form-control mt-3" name="sdate" placeholder="بداية الدورة ">
          </div>

          <div class="form-group">
            <input type="date" class="form-control mt-3" name="edate" placeholder="نهاية الدورة">
          </div>

          <div class="form-group">
            <input type="number" class="form-control mt-3" name="price" placeholder="السعر">
          </div>
          <select name="trainer_id" class="form-control">
            <option value="">--المدرب    --</option>
            @foreach ($triner as $triner)
            <option value="{{$triner->id}}">{{$triner->first_name." "}}{{$triner->last_name}}</option>
            @endforeach
        </select>

            <button type="submit"  class="btn btn-primary">اضافة</button>

      </form>


</div>


@endsection
