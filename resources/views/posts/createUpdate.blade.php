@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-2 pull-right">
                {!! Html::link(route('post.create'), 'Crear', array('class' => 'btn btn-info btn-md pull-right')) !!}
            </div>
            <div class="col-md-2 pull-left">
                {!! Html::link(route('post.index'), 'Inicio', array('class' => 'btn btn-info btn-md pull-left')) !!}
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Home</div>

                    @if($errors->has())
                        <div class='alert alert-danger'>
                            @foreach ($errors->all('<p>:message</p>') as $message)
                                {!! $message !!}
                            @endforeach
                        </div>
                    @endif

                    @if (Session::has('message'))
                        <div class="alert alert-success">{{ Session::get('message') }}</div>
                    @endif

                    <div class="panel-body">
                        @if(isset($post))
                            {!! Form::model($post, ['route' => ['post.update', $post->id], 'method' => 'patch']) !!}
                        @else
                            {!! Form::open(['route' => 'post.store']) !!}
                        @endif

                        <div class="form-group">
                            {!! Form::text('title', null, ["class" => "form-control"]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::textarea('body', null,
                                    ['class'=>'form-control', 'placeholder'=>'Body'])
                            !!}
                        </div>

                        <div class="form-group">
                            {!! Form::submit('Send', ["class" => "btn btn-success btn-block"]) !!}
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection