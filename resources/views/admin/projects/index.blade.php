@extends('layouts.admin.main')
@section('heading')
Manage Projects
@endsection

@section('content')
<div class="row">
<div class="col-md-12" style="display:flex">
    <div class="col-md-6">
      <?php echo Form::select('size', $companyData, null, array('class' => 'form-control company-list'));?>
    </div>
    <div class="col-md-6">
    <?php echo Form::select('projects', array(''=>'Select Projects'), null, array('class' => 'form-control projects'));?>
    </div>

</div>
</div>



@endsection
@section('vuejs')

@endsection