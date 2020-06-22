@extends('layouts.admin')
@section('title', 'コメントの一覧')

@section('content')
    <div class="container">
        <div class="row">
            <h2>コメント一覧</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a href="{{ action('Admin\Net1Controller@add') }}" role="button" class="btn btn-primary">新規作成</a>
            </div>
            <div class="col-md-8">
                <form action="{{ action('Admin\Net1Controller@index') }}" method="get">
                    <div class="form-group row">
                        <label class="col-md-2">可能性の高い原因病名</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="cond_title" value="{{ $cond_title }}">
                        </div>
                        <div class="col-md-2">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="検索">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="list-news col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="10%">ID</th>
                                <th width="20%">可能性の高い原因病名</th>
                                <th width="20%">氏名</th>
                                <th width="20%">職業</th>
                                <th width="20%">本文</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $net1)
                                <tr>
                                    <th>{{ $net1->id }}</th>
                                    <td>{{ \Str::limit($net1->title, 100) }}</td>
                                    <td>{{ \Str::limit($net1->name, 100) }}</td>
                                    <td>{{ \Str::limit($net1->profession, 100) }}</td>
                                    <td>{{ \Str::limit($net1->body, 250) }}</td>
                                    <td>
                                        <div>
                                            <a href="{{ action('Admin\Net1Controller@edit', ['id' => $net1->id]) }}">編集</a>
                                        </div>
                                        <div>
                                            <a href="{{ action('Admin\Net1Controller@delete', ['id' => $net1->id]) }}">削除</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection