@extends('layout.master')
@section('content')
    <div>
        <div>
            <div>
                <h2 class="h2">{{$child->name}}</h2>
                <div>
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
                                    <td>{{$schedules->where('week_day',$dayEnum->value)->where('shift',$i)->first()->subject->name??""}}</td>
                                @endforeach
                            </tr>
                        @endfor
                        </tbody>
                    </table>
                </div>
                <div class="my-[5vw]">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Môn</th>
                            <th>KTTX</th>
                            <th>15p</th>
                            <th>1t</th>
                            <th>Cuối kì</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($points as $point)
                            <tr>
                                <td>{{$point->subject->name}}</td>
                                <td>{{$point->daily}}</td>
                                <td>{{$point->weekly}}</td>
                                <td>{{$point->midSem}}</td>
                                <td>{{$point->endSem}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div>
                    <div>
                        <div class="grid grid-cols-4 gap-4  justify-content-center">
                            @foreach($assignments as $assignment)
                                <div class="card col-start-2 col-span-2 w-auto">
                                    <h2 class="h5 mx-3 mt-3">{{$assignment->description}}</h2>
                                    <div class="card-body">
                                        <div class="w-auto">
                                            <div>
                                                {{$assignment->created_at}}
                                            </div>
                                            <div class="">
                                                {{$assignment->is_complete?"Đã hoàn thành":"Chưa xong"}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
