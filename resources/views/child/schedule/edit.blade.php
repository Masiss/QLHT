@extends('layout.master')
@section('content')
    <div>
        <div class="grid grid-cols-4 gap-4 my-5">
            <div class="col-start-2 col-span-2">
                <form action="{{route('child.schedule.update',$schedule->id)}}" method="POST">
                    @csrf
                    @method('put')
                    <h2 class="h2">Sửa lịch học</h2>
                    <div class="form-floating mb-3">
                        <select class="form-control" name="week_day">
                            @foreach(\App\Enum\WeekDayEnum::cases() as $dayEnum)
                                <option
                                    value="{{$dayEnum->value}}" {{$dayEnum->value==$schedule->week_day?"selected":""}}>{{$dayEnum->toVNese()}}</option>
                            @endforeach
                        </select>
                        <label for="subject_id" class="form-label">Thứ</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-control" name="shift">
                            @for($i=1;$i<=10;$i++)
                                <option value="{{$i}}" {{$schedule->shift==$i?"selected":""}}>Ca {{$i}}</option>
                            @endfor
                        </select>
                        <label for="shift" class="form-label">Ca</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-control" name="subject_id">
                            @foreach($subjects as $subject)
                                <option
                                    value="{{$subject->id}}" {{$schedule->subject->id==$subject->id?"selected":""}}>{{$subject->name}}</option>
                            @endforeach
                        </select>
                        <label for="subject_id" class="form-label">Môn</label>
                    </div>

                    <div class="form-floating mb-3">
                        <button class="btn btn-primary" type="submit">Cập nhật</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
@endsection
