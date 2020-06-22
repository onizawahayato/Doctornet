@extends('layouts.admin')
@section('title', '症状編集')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>症状相談</h2>
                <div class="form-group row">
                    <label class="col-md-2" for="symptom_name">症状名</label>
                    <div class="col-md-10">
                        {{ $net_form->title }}
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2">性別</label>
                    <div class="col-md-10">
                       {{ $net_form->gender }}
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2" for="age">年齢</label>
                    <div class="col-md-10">
                        {{ $net_form->age }}
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2" for="body">本文</label>
                    <div class="col-md-10">
                        <textarea readonly class="form-control" name="body" rows="20">{{ $net_form->body }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2" for="image">画像</label>
                    <div class="col-md-10">
                    </div>
                </div>
            <form action="{{ action('Admin\Net1Controller@create') }}" method="post" enctype="multipart/form-data">

                
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
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">氏名</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">職業</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="profession" value="{{ old('profession') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="body">本文</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="body" rows="20">{{ old('body') }}</textarea>
                        </div>
                    </div>
                    {{ csrf_field() }}
                    <input type="hidden" name="symptom_id" value="{{ $net_form->id }}">
                    <input type="submit" class="btn btn-primary" value="更新">
                </form>    
                <div class="row mt-5">
                    <div class="col-md-4 mx-auto">
                        <h2>コメント</h2>
                        <ul class="list-group">
                            @if ($net_form->diagnosises != NULL)
                                @foreach ($net_form->diagnosises as $diagnosis)
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection