@extends('layouts.admin.main')
@section('heading')
Add Client
@endsection

@section('content')
<div class="col-xs-6" style="display:flex;justify-content:flex-end">
    <a href="{!! url('admin/manage-client');!!}"  class="btn btn-primary pull-right">Back</a>
</div><br>
{!! Form::open(['url' => '/admin/add-client','method' => 'post']) !!}
        <div class="form-group">
        <?php //echo Form::label('company_name', 'Company Name', ['class' => 'form-control']); ?>
        <?php echo Form::text('client_name', '',['class' => 'form-control','placeholder'=>'Enter Client name']);?>
        @if($errors->has('client_name'))
            <div class="error">{{ $errors->first('client_name') }}</div>
        @endif
        </div>
        <div class="form-group">
        <?php //echo Form::label('company_name', 'Company Name', ['class' => 'form-control']); ?>
        <?php echo Form::text('client_email', '',['class' => 'form-control','placeholder'=>'Enter client email']);?>
        @if($errors->has('client_email'))
            <div class="error">{{ $errors->first('client_email') }}</div>
        @endif
        </div>
        <div class="form-group">
        <?php //echo Form::label('company_description', 'Company Description', ['class' => 'form-control']); ?>
        <?php echo Form::textarea('client_description', '',['class' => 'form-control','placeholder'=>'Enter client description']);?>
        @if($errors->has('client_description'))
            <div class="error">{{ $errors->first('client_description') }}</div>
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