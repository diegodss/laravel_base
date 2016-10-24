@extends('layouts.app')
@yield('main-content')
@section('main-content')

@include('layouts.boxtop')
@include('alerts.errors')
{!! Form::open(['url' => 'usuario']) !!}
{{ Form::hidden('usuario_registra', Auth::user()->id) }}
<div class="row">
    <div class="col-xs-6">
        <div class="form-group">
            {!! Form::label('name', 'Nombre:') !!}
            {!! Form::text('name',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('email', 'Correo eletronico:') !!}
            {!! Form::text('email',null,['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="col-xs-6">
        <div class="form-group">
            {!! Form::label('Role', 'Role:') !!}
            {!! Form::select('id_role',$role, 'default', array('id'=>'id_role', 'class'=>'form-control') ) !!}
        </div>
        <div class="form-group">
            {!! Form::label('active_directory', 'Validar en Active Directory:') !!}
            {!! Form::select('active_directory',$active_directory, 'default', array('id'=>'active_directory', 'class'=>'form-control') ) !!}
        </div>
        <div class="form-group" id="lblPassword">
            {!! Form::label('password', 'Password:') !!}
            {{ Form::password('password', array('class' => 'form-control')) }}
        </div>
        <div class="form-group" id="lblactive_directory_users">
            {!! Form::label('active_directory_user', 'Usuario Active Directory:') !!}
            {!! Form::text('active_directory_user',null,['class'=>'form-control']) !!}
        </div>
    </div>
</div>
<div class="form-group">
    {!! Form::submit('Guardar', ['class' => 'btn btn-success']) !!}
    <a href="{{ URL::previous() }}" class="btn btn-primary">Volver</a>
</div>
@include('layouts.boxbottom')
<h4>{{ trans('message.permiso_especifico_usuario') }} </h4>
@include('layouts.boxtop')
<div class="form-group">
    <table class="table table-bordered">
        <tr>
            <td><b>Modulo</b></td>
            <td align="center"><b>visualizar</b></td>
            <td align="center"><b>Crear</b></td>
            <td align="center"><b>editar</b></td>
            <td align="center"><b>eliminar</b></td>
        </tr>
        @foreach ($usuarioMenuPermiso as $menuItem)
        @if ($menuItem->id_menu_parent == 0 )
        <?php $bgColor = "#EEEEEE"; ?>
        @else
        <?php $bgColor = ""; ?>
        @endif
        <tr bgcolor="<?php echo $bgColor; ?>">
            <td> {!! Form::hidden('id_menu[]'.$menuItem->id_menu,$menuItem->id_menu,['class'=>'form-control']) !!}
                {{ $menuItem->nombre_menu }}</td>
            <td align="center">{!! Form::checkbox('visualizar' .$menuItem->id_menu, '1', $menuItem->visualizar, ['class'=>'form-control_none', 'id'=>'visualizar'.$menuItem->id_menu]) !!}</td>
            <td align="center">{!! Form::checkbox('agregar' .$menuItem->id_menu, '1', $menuItem->agregar, ['class'=>'form-control_none', 'id'=>'agregar'.$menuItem->id_menu]) !!}</td>
            <td align="center">{!! Form::checkbox('editar'  .$menuItem->id_menu, '1', $menuItem->editar, ['class'=>'form-control_none', 'id'=>'editar'.$menuItem->id_menu]) !!}</td>
            <td align="center">{!! Form::checkbox('eliminar'.$menuItem->id_menu, '1', $menuItem->eliminar, ['class'=>'form-control_none', 'id'=>'eliminar'.$menuItem->id_menu]) !!}</td>
        </tr>
        @endforeach
    </table>
</div>
<div class="form-group">
    {!! Form::submit('Guardar', ['class' => 'btn btn-success']) !!}
    <a href="{{ URL::previous() }}" class="btn btn-primary">Volver</a>
</div>
{!! Form::close() !!}
@include('layouts.boxbottom')
@include('usuario.js')
@endsection