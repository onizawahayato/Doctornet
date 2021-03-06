@extends('layouts.admin')

@section('Symptom name', '症状相談')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>症状相談</h2>
                <form action="{{ action('Admin\NetController@create') }}" method="post" enctype="multipart/form-data">

                   @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2" for="symptom_name">症状名</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="symptom_name" value="{{ old('symptom_name') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">性別</label>
                        <div class="col-md-10">
                            <input type="radio" class="" name="gender" value="man"><b>男性</b>
                            <input type="radio" class="" name="gender" value="woman"><b>女性</b>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">年齢</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="age" value="{{ old('age')}}">
                        </div>
                  　</div>
                    <div class="form-group row">
                        <label class="col-md-2" for="body">本文</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="body" rows="20">{{ old('body') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="title">画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                        </div>
                    </div>
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="更新">
                </form>
            </div>
        </div>
    </div>
@endsection


