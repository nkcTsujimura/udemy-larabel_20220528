@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-body">新規メモ作成</div>
    {{--route("store")と書くと、自動でURLを作成してくれるらしい。--}}
    {{-- <form class="card-body" action="/store" method="POST"> --}}
    <form class="card-body" action="{{ route("store") }}" method="POST">
        @csrf
        <div class="form-group">
            <textarea class="form-control" name="content" rows="3" placeholder="ここにメモ　"></textarea>
        </div>

        @foreach($tags as $t)
            <div class="">
                <input class="form-check-input" type="checkbox" name="tags[]" id="{{ $t["id"] }}" value="{{ $t["id"]}}">
                <label class="form-check-label" for="{{ $t["id"]}}"">{{$t["name"]}}</label>
            </div>
        @endforeach




        <input type="text" class="form-control w-50 mb-3" name="new_tag" placeholder="add new tag name">

        <button type="submit" class="btn btn-primary">Primary</button>
    </form>
</div>


@endsection
