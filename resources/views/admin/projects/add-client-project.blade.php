@extends('layouts.admin.main')
@section('heading')
Add Project for <b><?php echo $clientData['clientName']; ?></b>
@endsection

@section('content')
<div class="col-xs-6" style="display:flex;justify-content:flex-end">
    <a href="{!! url('admin/add-project');!!}"  class="btn btn-primary pull-right">Back</a>
</div><br>
<div class="row">
<div class="col-md-6"> 
{!! Form::open(['method' => 'post']) !!}
<div class="form-group">
        <?php echo Form::label('project_name', 'Project Name', ['class' => '']); ?>
        <?php echo Form::text('project_name', '',['class' => 'form-control','placeholder'=>'Enter project name']);?>
        @if($errors->has('project_name'))
            <div class="error">{{ $errors->first('project_name') }}</div>
        @endif
        </div>
        <div class="form-group">
        <?php echo Form::label('project_description', 'Project Description', ['class' => '']); ?>
        <?php echo Form::textarea('project_description', '',['class' => 'form-control','placeholder'=>'Enter project description']);?>
        @if($errors->has('project_description'))
            <div class="error">{{ $errors->first('project_description') }}</div>
        @endif
        </div>
       
        <div class="form-group">
            <?php echo Form::submit('Submit',['class'=>'btn btn-primary']);?>
        </div>
        {!! Form::close() !!}
        </div></div>
@endsection
@section('vuejs')
<script  src="{{URL::asset('js/admin/user.js')}}"></script>
@endsection