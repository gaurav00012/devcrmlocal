@extends('layouts.admin.main')
@section('heading')
Edit Project for <b><?php echo $clientData['clientName']; ?></b>
@endsection

@section('content')
<div class="col-xs-6" style="display:flex;justify-content:flex-end">
    <a href="{!! url('admin/edit-save-project',$projectdetail->id);!!}"  class="btn btn-primary pull-right">Back</a>
</div><br>
{!! Form::open(['url' => ['/admin/edit-save-project',$projectdetail->id],'method' => 'post']) !!}
<div class="form-group">
        <?php //echo Form::label('project_name', 'Project Name', ['class' => 'form-control']); ?>
        <?php echo Form::text('project_name', $projectdetail->project_name,['class' => 'form-control','placeholder'=>'Enter project name']);?>
        @if($errors->has('project_name'))
            <div class="error">{{ $errors->first('project_name') }}</div>
        @endif
        </div>
        <div class="form-group">
        <?php //echo Form::label('project_description', 'Project Description', ['class' => 'form-control']); ?>
        <?php echo Form::textarea('project_description', $projectdetail->description,['class' => 'form-control','placeholder'=>'Enter project description']);?>
        @if($errors->has('project_description'))
            <div class="error">{{ $errors->first('project_description') }}</div>
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