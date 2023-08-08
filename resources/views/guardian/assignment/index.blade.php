@extends('layout.master')
@section('content')
    <div>
        <div>
            <div>
                <div class="grid grid-cols-4 gap-4  justify-content-center">
                    @foreach($assignments as $assignment)
                        <div class="card col-start-2 col-span-2 w-auto">
                            <h2 class="h2">{{$assignment->description}}</h2>
                            <div class="card-body">
                                <div class="w-auto">
                                    <div>
                                        {{$assignment->created_at}}
                                    </div>
                                    <div class="">
                                        {{$assignment->is_complete?"Đã hoàn thành":"Chưa xong"}}
                                    </div>
                                </div>
                                <div class="flex align-content-right float-right w-auto">
                                    @if(!$assignment->is_complete)
                                        <form action="{{route('child.assignment.update',$assignment->id)}}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit">Cập nhật</button>
                                        </form>
                                    @endif
                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection
