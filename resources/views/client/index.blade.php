@extends('layouts.admin.main')
@section('heading')
Task List
@endsection
@section('content')
<table class="table table-striped" id="task-table">
    <thead>
      <tr>
      <th hidden>position</th>
      <th>#</th>
        <th>Task Name</th>
        <th>Due Date</th>
        <!-- <th>Task Progress</th>
        <th>Priority</th> -->
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
       @foreach ($tasks as $key => $projectask)
      <tr data-index="{{$projectask->task_id}}" data-position="{{$projectask->position}}">
	  <td hidden>{{$projectask->position}}</td>
          <td>{{$key+1}}</td>
        <td>{{$projectask->task_name}}</td>
        <td>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $projectask->due_date)->format('Y-m-d') }}</td>
        <!-- <td>{{$projectask->task_progress}}</td>
         <td>{{$projectask->task_progress}}</td> -->
          <td><a href="javascript:void(0)" data-taskid={{$projectask->task_id}}  class="btn green-btn edit-task">Edit</a> </td>
      </tr>
     @endforeach
    </tbody>
  </table>

@endsection