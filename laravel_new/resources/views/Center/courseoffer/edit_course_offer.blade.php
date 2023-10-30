@extends('Center.layout')
@section('cen')


<form method="POST" action="{{route('update.courseoffer',$offer->id)}}" style="position:absolute;width:23%;right:40%;">
    @csrf
    <div class="form-group">
      <input type="text" class="form-control mt-3" name="name" value="{{$offer->name}}" placeholder="الاسم ">
    </div>

    <div class="form-group">
        <textarea  class="form-control mt-3" name="details" rows="3" placeholder="التفاصيل ">{{$offer->details}}</textarea>
      </div>

      <div class="form-group">
        <input type="number" class="form-control mt-3" name="count"value="{{$offer->count}}" placeholder="عدد الطلاب ">
      </div>

      <div class="form-group">
        <input type="date" class="form-control mt-3" name="sdate" value="{{$offer->sdate}}" placeholder="بداية الدورة ">
      </div>

      <div class="form-group">
        <input type="date" class="form-control mt-3" name="edate" value="{{$offer->edate}}"placeholder="نهاية الدورة">
      </div>

      <div class="form-group">
        <input type="number" class="form-control mt-3" name="price" value="{{$offer->price}}" placeholder="السعر">
      </div>
      <select name="trainer_id" class="form-control">
        <option value="">--المدرب    --</option>
        @foreach ($triner as $triner)
        <option value="{{$triner->id}}" {{$triner->id==$offer->trainer_id ? 'selected' : ''}}>{{$triner->first_name." "}}{{$triner->last_name}}</option>
        @endforeach
    </select>

        <button type="submit"  class="btn btn-primary">اضافة</button>

  </form>


@endsection
