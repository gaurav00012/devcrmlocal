<?php
use App\TaskTimelog;
use App\User;
use App\MasterTask;
use App\MasterProject;
?>

@extends('layouts.admin.main')
@section('heading')
Dashboard
@endsection

@section('content')
<div class="row">
            <div class="col-md-4 stretch-card grid-margin">
              <div class="card bg-gradient-danger card-img-holder text-white">
                <div class="card-body">
                  
                  <h4 class="font-weight-normal mb-3">Weekly Sales <i class="mdi mdi-chart-line mdi-24px float-right"></i>
                  </h4>
                  <h2 class="mb-5">$ 15,0000</h2>
                  <h6 class="card-text">Increased by 60%</h6>
                </div>
              </div>
            </div>
            <div class="col-md-4 stretch-card grid-margin">
              <div class="card bg-gradient-info card-img-holder text-white">
                <div class="card-body">
                  
                  <h4 class="font-weight-normal mb-3">Weekly Orders <i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
                  </h4>
                  <h2 class="mb-5">45,6334</h2>
                  <h6 class="card-text">Decreased by 10%</h6>
                </div>
              </div>
            </div>
            <div class="col-md-4 stretch-card grid-margin">
              <div class="card bg-gradient-success card-img-holder text-white">
                <div class="card-body">
                  
                  <h4 class="font-weight-normal mb-3">Visitors Online <i class="mdi mdi-diamond mdi-24px float-right"></i>
                  </h4>
                  <h2 class="mb-5">95,5741</h2>
                  <h6 class="card-text">Increased by 5%</h6>
                </div>
              </div>
            </div>

            <div class="col-md-12">
              <h3>Team Timelog</h3>
              <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Task</th>
      <th scope="col">Project</th>
      <th scope="col">Start Time</th>
      <th scope="col">End Time</th>
   
    </tr>
  </thead>
  <tbody>
      <?php foreach($teamMemberId as $mkey => $member){ ?>
      <?php $getTimeLog = TaskTimelog::where('user_id','=',$member)->get(); ?>
      <?php foreach($getTimeLog as $taskey => $task){ ?>
        <tr>
          <td>{{++$taskey}}</td>
          <td>{{User::find($member)->name}}</td>
          <td>{{MasterTask::find($task->task_id)->task_name}}</td>
          <td>{{MasterProject::find(MasterTask::find($task->task_id)->project_id)->project_name}}</td>
          <td>{{$task->start_time}}</td>
          <td>{{$task->end_time}}</td>
        </tr>
      <?php } ?>  
      <?php } ?>



  
  </tbody>
</table>
            </div>
          </div>

@endsection
