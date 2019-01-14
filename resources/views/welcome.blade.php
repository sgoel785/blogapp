@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading">Search</div>
                <div class="panel-body">
                    {!! Form::open(array('class' => 'timetabel')) !!}
                        <div class="form-group">
                            <label for="">Select Category</label>
                            <select class="form-control" name="category_id">
                                <option>Chose one</option>
                                @foreach ($categories as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Select User</label>
                            <select class="form-control" name="user_id">
                                <option>Chose one</option>
                                @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">From Date</label>
                            {!! Form::date('frm_date', \Carbon\Carbon::now()) !!}
                        </div>
                        <div class="form-group">
                            <label for="">To Date</label>
                            {!! Form::date('to_date', \Carbon\Carbon::now()) !!}
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="all_response">
                    @foreach ($posts as $p)
                    <hr>
                    <div class="text-center">
                        <p class="text-uppercase">
                        @foreach($p->categories as $c)
                            {{ $c->title }}
                        @endforeach
                        </p>
                        <h2>
                            <a href="{{ route('post.show', $p->id) }}">{{ $p->title }}</a>
                            <br><small>
                                {{ $p->subtitle }}
                            </small>
                        </h2>
                    </div>
                    <p>{!! nl2br(e($p->body)) !!}</p>
                    <div class="row">
                        <div class="col-md-2">
                            <p class="pull-right">Created by <b>{{ $p->user->name }}</b></p>
                        </div>
                        <div class="col-md-10">
                            <p class="pull-right">Created at <b>{{ $p->created_at->toFormattedDateString() }}</b></p>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="loader"></div>
                <div class="result_response">
                </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
