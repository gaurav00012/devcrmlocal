<?php
use App\User;
?>

@extends('layouts.admin.main')
@section('heading')
Edit Client
@endsection

@section('content')
<div class="col-xs-6" style="display:flex;justify-content:flex-end">
    <a href="{!! url('admin/manage-client');!!}"  class="btn btn-primary pull-right">Back</a>
</div><br>
{!! Form::open(['url' => ['admin/update-client',$client->id],'method' => 'post']) !!}
    <div class="col-md-12" style="display:flex">
        <div class="col-md-6">
        <div class="form-group">
        <?php echo Form::label('company_name', 'Name'); ?>
        <?php echo Form::text('company_name',  user::find($client->user_id)->name,['class' => 'form-control','placeholder'=>'Enter Company name']);?>
        @if($errors->has('name'))
            <div class="error">{{ $errors->first('company_name') }}</div>
        @endif
        </div>
    </div>
        <div class="col-md-6">
            <div class="form-group">
            <?php echo Form::label('company_description', 'E-Mail'); ?>
            <?php echo Form::text('company_email', User::find($client->user_id)->email,['class' => 'form-control','placeholder'=>'Enter Company email','disabled'=>'disabled']);?>
            @if($errors->has('email'))
                <div class="error">{{ $errors->first('company_description') }}</div>
            @endif
            </div>
        </div>

    </div>
   
    <div class="col-md-12" style="display:flex">
    <div class="col-md-6">
        <div class="form-group">
        <?php echo Form::label('client_description', 'Description'); ?>
        <?php echo Form::textarea('client_description', $client->client_description,['class' => 'form-control','placeholder'=>'Enter Company description']);?>
        @if($errors->has('client_description'))
            <div class="error">{{ $errors->first('client_description') }}</div>
        @endif
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
        <?php echo Form::label('mailing_address', 'Mailing Address'); ?>
        <?php echo Form::textarea('mailing_address', $clientFormDetail->mailing_address,['class' => 'form-control','placeholder'=>'Enter Mailing Address']);?>
        @if($errors->has('mailing_address'))
            <div class="error">{{ $errors->first('mailing_address') }}</div>
        @endif
        </div>
    </div>
    </div>
    <div class="col-md-12" style="display:flex">
    <div class="col-md-6">
        <div class="form-group">
        <?php echo Form::label('about_business', 'About Business'); ?>
        <?php echo Form::textarea('about_business', $clientFormDetail->about_business,['class' => 'form-control','placeholder'=>'Enter Company description']);?>
        @if($errors->has('email'))
            <div class="error">{{ $errors->first('about_business') }}</div>
        @endif
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
        <?php echo Form::label('domain_name', 'Domain Name'); ?>
        <?php echo Form::text('domain_name', $clientFormDetail->domain_name,['class' => 'form-control','placeholder'=>'Enter Mailing Address']);?>
        @if($errors->has('email'))
            <div class="error">{{ $errors->first('domain_name') }}</div>
        @endif
        </div>
    </div>
    </div>
     <div class="col-md-12" style="display:flex">
    <div class="col-md-6">
        <div class="form-group">
        <?php echo Form::label('hosting_access', 'Hosting Access'); ?>
        <?php echo Form::text('hosting_access', $clientFormDetail->hosting_access,['class' => 'form-control','placeholder'=>'Enter Hosting Access']);?>
        @if($errors->has('hosting_access'))
            <div class="error">{{ $errors->first('hosting_access') }}</div>
        @endif
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
        <?php echo Form::label('hosting_email', 'Hosting Email'); ?>
        <?php echo Form::text('hosting_email', $clientFormDetail->hosting_email,['class' => 'form-control','placeholder'=>'Enter hosting Email']);?>
        @if($errors->has('hosting_email'))
            <div class="error">{{ $errors->first('hosting_email') }}</div>
        @endif
        </div>
    </div>

    </div>
    <div class="col-md-12" style="display:flex">
    <div class="col-md-6">
        <div class="form-group">
        <?php echo Form::label('content', 'Content'); ?>
        <?php echo Form::text('content', $clientFormDetail->content,['class' => 'form-control','placeholder'=>'Enter Content']);?>
        @if($errors->has('content'))
            <div class="error">{{ $errors->first('content') }}</div>
        @endif
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
        <?php echo Form::label('copy', 'Copy'); ?>
        <?php echo Form::text('copy', $clientFormDetail->copy,['class' => 'form-control','placeholder'=>'']);?>
        @if($errors->has('copy'))
            <div class="error">{{ $errors->first('copy') }}</div>
        @endif
        </div>
    </div>
   
    </div>
    <div class="col-md-12" style="display:flex">
    <div class="col-md-6">
        <div class="form-group">
        <?php echo Form::label('primary_goal', 'Primary Goal'); ?>
        <?php echo Form::text('primary_goal', $clientFormDetail->primary_goal,['class' => 'form-control','placeholder'=>'Enter Content']);?>
        @if($errors->has('content'))
            <div class="error">{{ $errors->first('content') }}</div>
        @endif
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
        <?php echo Form::label('target_geographic', 'Target Geographic'); ?>
        <?php echo Form::text('target_geographic', $clientFormDetail->target_geographic,['class' => 'form-control','placeholder'=>'']);?>
        @if($errors->has('target_geographic'))
            <div class="error">{{ $errors->first('target_geographic') }}</div>
        @endif
        </div>
    </div>
   
    </div>
    <div class="col-md-12" style="display:flex">
    <div class="col-md-6">
        <div class="form-group">
        <?php echo Form::label('target_audience', 'Target Audience'); ?>
        <?php echo Form::text('target_audience', $clientFormDetail->target_audience,['class' => 'form-control','placeholder'=>'']);?>
        @if($errors->has('content'))
            <div class="error">{{ $errors->first('content') }}</div>
        @endif
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
        <?php echo Form::label('describe_word_1', 'Describe one word 1'); ?>
        <?php echo Form::text('describe_word_1', $clientFormDetail->describe_word_1,['class' => 'form-control','placeholder'=>'']);?>
        @if($errors->has('describe_word_1'))
            <div class="error">{{ $errors->first('describe_word_1') }}</div>
        @endif
        </div>
    </div>
   
    </div>
     <div class="col-md-12" style="display:flex">
    <div class="col-md-6">
        <div class="form-group">
        <?php echo Form::label('describe_word_2', 'Describe one word 2'); ?>
        <?php echo Form::text('describe_word_2', $clientFormDetail->describe_word_2,['class' => 'form-control','placeholder'=>'']);?>
        @if($errors->has('content'))
            <div class="error">{{ $errors->first('content') }}</div>
        @endif
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
        <?php echo Form::label('describe_word_3', 'Describe one word 3'); ?>
        <?php echo Form::text('describe_word_3', $clientFormDetail->describe_word_3,['class' => 'form-control','placeholder'=>'']);?>
        @if($errors->has('describe_word_1'))
            <div class="error">{{ $errors->first('describe_word_1') }}</div>
        @endif
        </div>
    </div>
   
    </div>
    <div class="col-md-12" style="display:flex">
    <div class="col-md-6">
        <div class="form-group">
        <?php echo Form::label('company_colors', 'Company Colors'); ?>
        <?php echo Form::text('company_colors', $clientFormDetail->company_colors,['class' => 'form-control','placeholder'=>'']);?>
        @if($errors->has('company_colors'))
            <div class="error">{{ $errors->first('company_colors') }}</div>
        @endif
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
        <?php echo Form::label('navigation', 'Navigation'); ?>
        <?php echo Form::text('navigation', $clientFormDetail->navigation,['class' => 'form-control','placeholder'=>'']);?>
        @if($errors->has('navigation'))
            <div class="error">{{ $errors->first('navigation') }}</div>
        @endif
        </div>
    </div>
   
    </div>

    <div class="col-md-12" style="display:flex">
    <div class="col-md-6">
        <div class="form-group">
        <?php echo Form::label('reference', 'Reference'); ?>
        <?php echo Form::text('reference', $clientFormDetail->reference,['class' => 'form-control','placeholder'=>'']);?>
        @if($errors->has('reference'))
            <div class="error">{{ $errors->first('reference') }}</div>
        @endif
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
        <?php echo Form::label('competitors', 'Competitors'); ?>
        <?php echo Form::text('competitors', $clientFormDetail->competitors,['class' => 'form-control','placeholder'=>'']);?>
        @if($errors->has('competitors'))
            <div class="error">{{ $errors->first('competitors') }}</div>
        @endif
        </div>
    </div>
   
    </div>
    <div class="col-md-12" style="display:flex">
    <div class="col-md-6">
        <div class="form-group">
        <?php echo Form::label('additional_notes', 'Additional Notes'); ?>
        <?php echo Form::text('additional_notes', $clientFormDetail->additional_notes,['class' => 'form-control','placeholder'=>'']);?>
        @if($errors->has('additional_notes'))
            <div class="error">{{ $errors->first('additional_notes') }}</div>
        @endif
        </div>
    </div>

   
   
    </div>
       
        <div class="form-group">
            <?php echo Form::submit('Submit',['class'=>'btn btn-primary']);?>
        </div>
        {!! Form::close() !!}
        
@endsection
@section('vuejs')
<script  src="{{URL::asset('js/admin/user.js')}}"></script>
@endsection