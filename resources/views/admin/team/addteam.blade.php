@extends('layouts.admin.main')
@section('heading')
Add Team Member
@endsection

@section('content')
<div class="col-xs-6" style="display:flex;justify-content:flex-end">
    <a href="{!! url('admin/manage-team');!!}"  class="btn btn-primary pull-right">Back</a>
</div><br>
{!! Form::open(['url' => '/admin/add-team','method' => 'post']) !!}
        <div class="form-group">
        <?php echo Form::label('name', 'Name', ['class' => 'form-control']); ?>
        <?php echo Form::text('name', '',['class' => 'form-control ']);?>
        @if($errors->has('name'))
            <div class="error">{{ $errors->first('name') }}</div>
        @endif
        </div>
        <div class="form-group">
        <?php echo Form::label('email', 'E-Mail Address', ['class' => 'form-control']); ?>
        <?php echo Form::text('email', '',['class' => 'form-control']);?>
        @if($errors->has('email'))
            <div class="error">{{ $errors->first('email') }}</div>
        @endif
        </div>
        <div class="form-group">
        <?php echo Form::label('password', 'Enter Password', ['class' => 'form-control']); ?>
        <?php echo Form::text('password', '',['class' => 'form-control']);?>
        @if($errors->has('password'))
            <div class="error">{{ $errors->first('password') }}</div>
        @endif
        </div>
        <div class="form-group">
            <?php echo Form::submit('Submit',['class'=>'btn btn-primary']);?>
        </div>
        {!! Form::close() !!}
        
@endsection
@section('vuejs')
<script  src="{{URL::asset('js/admin/user.js')}}"></script>
@endsection