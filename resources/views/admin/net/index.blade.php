@extends('layouts.admin')
@section('Symptom name', '症状相談')

@section('content')
    <div class="container">
        <div class="row">
            <h2>症状相談</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a href="{{ action('Admin\NetController@add') }}" role="button" class="btn btn-primary">新規作成</a>
            </div>
            <div class="col-md-8">
                <form action="{{ action('Admin\NetController@index') }}" method="get">
                    <div class="form-group row">
                        <label class="col-md-2">症状名</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="cond_Symptom name" value="{{ $cond_Symptom name }}">
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
                                <th width="20%">症状名</th>
                                <th width="50%">本文</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $news)
                                <tr>
                                    <th>{{ $net->id }}</th>
                                    <td>{{ \Str::limit($net->Symptom name, 100) }}</td>
                                    <td>{{ \Str::limit($net->body, 250) }}</td>
                                    <td>
                                        <div>
                                            <a href="{{ action('Admin\NetController@edit', ['id' => $net->id]) }}">編集</a>
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