@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-body">
        メモ編集
        <form class="card-body" action="{{ route("destroy") }}" method="POST">
            @csrf
            <input type="hidden" name="memo_id" value="{{$edit_memo[0]["id"]}}">
            <button type="submit" class="btn btn-primary">Destroy</button>
        </form>

    </div>
    {{--route("store")と書くと、自動でURLを作成してくれるらしい。--}}
    {{-- <form class="card-body" action="/store" method="POST"> --}}
    <form class="card-body" action="{{ route("update") }}" method="POST">
        @csrf

        <input type="hidden" name="memo_id" value="{{$edit_memo[0]["id"]}}">
        <div class="form-group">
            <textarea class="form-control" name="content" rows="3" placeholder="ここにメモ　">{{$edit_memo[0]["content"]}}</textarea>
        </div>

        @foreach($tags as $t)
            <div class="">
                <input class="form-check-input" type="checkbox" name="tags[]" id="{{ $t["id"] }}" value="{{ $t["id"]}}" {{in_array($t["id"], $include_tags) ? "checked":""}}>
                <label class="form-check-label" for="{{ $t["id"]}}"">{{$t["name"]}}</label>
            </div>
        @endforeach

        <input type="text" class="form-control w-50 mb-3" name="new_tag" placeholder="add new tag name">

        <button type="submit" class="btn btn-primary">Primary</button>
    </form>
</div>


@endsection
