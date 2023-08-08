@extends('layout.master')
@section('content')
    <div>
        <div>
            <div>
                <form action="{{route('child.point.store')}}" method="POST">
                    @csrf
                    @method('post')
                    <h2 class="h2">Thêm điểm</h2>
                    <div class="form-floating mb-3">
                        <select class="form-control" name="subject_id">
                            @foreach($subjects as $subject)
                                <option value="{{$subject->id}}">{{$subject->name}}</option>
                            @endforeach
                        </select>
                        <label for="subject_id" class="form-label">Môn</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" name="daily"/>
                        <label for="daily" class="form-label">KTTX</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" name="weekly"/>
                        <label for="weekly" class="form-label">15p</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" name="midSem"/>
                        <label for="midSem" class="form-label">1t</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" name="endSem"/>
                        <label for="endSem" class="form-label">Cuối kì</label>
                    </div>
                    <div class="form-floating mb-3">
                        <button class="btn btn-primary" type="submit">Thêm</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
