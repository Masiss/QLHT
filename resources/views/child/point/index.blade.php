@extends('layout.master')
@section('content')
    <div>
        <div>
            <div>
                <a href="{{route('child.point.create')}}" class="btn btn-primary">Nhập điểm</a>
            </div>
            <div class="mx-5 my-3">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Môn</th>
                        <th>KTTX</th>
                        <th>15p</th>
                        <th>1T</th>
                        <th>Cuối kì</th>
                        <th></th>
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
                            <td><a href="{{route('child.point.edit',$point->subject_id)}}">Cập nhật</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
