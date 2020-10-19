@extends('layouts.admin.main')
@section('heading')
Edit Client
@endsection

@section('content')
<div class="col-xs-6" style="display:flex;justify-content:flex-end">
    <a href="{!! url('admin/manage-client');!!}"  class="btn btn-primary pull-right">Back</a>
</div><br>
{!! Form::open(['url' => ['admin/update-client',$client->id],'method' => 'post']) !!}
        <div class="form-group">
        <?php //echo Form::label('company_name', 'Company Name', ['class' => 'form-control']); ?>
        <?php echo Form::text('company_name',  $client->company_name,['class' => 'form-control','placeholder'=>'Enter Company name']);?>
        @if($errors->has('name'))
            <div class="error">{{ $errors->first('company_name') }}</div>
        @endif
        </div>
        <div class="form-group">
        <?php //echo Form::label('company_description', 'Company Description', ['class' => 'form-control']); ?>
        <?php echo Form::textarea('company_description', $client->description,['class' => 'form-control','placeholder'=>'Enter Company description']);?>
        @if($errors->has('email'))
            <div class="error">{{ $errors->first('company_description') }}</div>
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