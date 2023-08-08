@extends('layout.master')
@section('content')
    <div class="grid grid-cols-4">
        <div class="col-start-2 col-span-2">
            <form action="{{route('child.point.update',$point->subject_id)}}" method="POST">
                @csrf
                @method('PUT')
                <h2 class="h2">Cập nhật điểm</h2>
                <div class="form-floating mb-3">
                    <input class="form-control" value="{{$point->subject->name}}" disabled/>
                    <label for="subject_id" class="form-label">Môn</label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" name="daily" value="{{$point->daily}}"/>
                    <label for="daily" class="form-label">KTTX</label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" name="weekly" value="{{$point->weekly}}"/>
                    <label for="weekly" class="form-label">15p</label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" name="midSem" value="{{$point->midSem}}"/>
                    <label for="midSem" class="form-label">1t</label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" name="endSem" value="{{$point->endSem}}"/>
                    <label for="endSem" class="form-label">Cuối kì</label>
                </div>
                <div class="form-floating mb-3">
                    <button class="btn btn-primary" type="submit">Cập nhật</button>
                </div>

            </form>

        </div>
    </div>
@endsection
