@extends('layout.master')
@section('content')
    <div>
        <div>
            <a href="{{route('guardian.child.create')}}" class="btn btn-primary">Thêm con</a>
        </div>
        <div class="grid">
            <div class="w-50 justify-self-center ">
                @foreach($children as $child)
                    <div class="card">
                        <div class="card-body">
                            <a href="{{route('guardian.child.show',$child->id)}}">  {{$child->name}}</a>
                        </div>

                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
