@extends('layouts.admin')
@section('title', 'コメントの編集')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>コメントの編集</h2>
                <form action="{{ action('Admin\Net1Controller@update') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2" for="title">可能性の高い原因病名</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="title" value="{{ $net1_form->title }}">
                        </div>
                    </div>
                    <div class="form-group row">
                    　　<label class="col-md-2" for="name">氏名</label>
                    　　<div class="col-md-10">
                         　　<input type="text" class="form-control" name="name" value="{{ $net1_form->name }}">
                     　 </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="profession">職業</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="profession" value="{{ $net1_form->profession }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="body">本文</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="body" rows="20">{{ $net1_form->body }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="image">画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                            <div class="form-text text-info">
                                設定中: {{ $net1_form->image_path }}
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="remove" value="true">画像を削除
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $net1_form->id }}">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="更新">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection