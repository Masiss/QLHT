@extends('layout.master')
@section('content')
    <div>
        <div>
            <a class="btn btn-primary active mt-5 ml-5" href="{{route('child.schedule.create')}}">Thêm lịch học</a>
            <div class="mx-3 my-5">
                <table class="table">
                    <thead>
                    <tr>
                        <th></th>
                        <th>Thứ 2</th>
                        <th>Thứ 3</th>
                        <th>Thứ 4</th>
                        <th>Thứ 5</th>
                        <th>Thứ 6</th>
                        <th>Thứ 6</th>
                    </tr>
                    </thead>
                    <tbody>
                    @for($i=1;$i<10;$i++)
                        <tr>
                            <td>Ca {{$i}}</td>
                            @foreach(\App\Enum\WeekDayEnum::cases() as $dayEnum)
                                <td>
                                    @if($schedules->where('week_day',$dayEnum->value)->where('shift',$i)->first())
                                        <a href="{{route('child.schedule.edit',$schedules->where('week_day',$dayEnum->value)->where('shift',$i)->first()->id)}}">
                                            {{$schedules->where('week_day',$dayEnum->value)->where('shift',$i)->first()->subject->name??""}}
                                        </a>
                                    @endif
                                </td>
                            @endforeach
                        </tr>
                    @endfor
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
