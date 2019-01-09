<div class="form-group">
    {!! Form::label('title', 'Title', ['class' => 'control-label']) !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('subtitle', 'Subtitle', ['class' => 'control-label']) !!}
    {!! Form::text('subtitle', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">

    <div class="form-group">
        {!! Form::label('categories', 'Categories', ['class' => 'control-label']) !!}
        @foreach($categories as $id => $name)
            {!! Form::checkbox("categories[]", $id) !!} {{$name}}
        @endforeach
    </div>
</div>

<div class="form-group">
    {!! Form::label('body', 'Title', ['class' => 'control-label']) !!}
    {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
</div>

{!! Form::submit('Submit', ['class' => 'btn btn-primary pull-right']) !!}
