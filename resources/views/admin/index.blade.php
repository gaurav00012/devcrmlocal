<?php
use App\Task;
use App\User;
use App\MasterTask;
use App\MasterProject;
use App\TaskTimelog;
use App\Clients;
?>

@extends('layouts.admin.main')
@section('heading')
Dashboard
@endsection

@section('content')

<div class="modal" tabindex="-1" id="edit-task-modal" role="dialog">
 
</div>

<div class="row">
            <!-- <div class="col-md-4 stretch-card grid-margin">
              <div class="card bg-gradient-danger card-img-holder text-white">
                <div class="card-body">
                  
                  <h4 class="font-weight-normal mb-3">Weekly Sales <i class="mdi mdi-chart-line mdi-24px float-right"></i>
                  </h4>
                  <h2 class="mb-5">$ 15,0000</h2>
                  <h6 class="card-text">Increased by 60%</h6>
                </div>
              </div>
            </div> -->
            <!-- <div class="col-md-4 stretch-card grid-margin">
              <div class="card bg-gradient-info card-img-holder text-white">
                <div class="card-body">
                  
                  <h4 class="font-weight-normal mb-3">Weekly Orders <i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
                  </h4>
                  <h2 class="mb-5">45,6334</h2>
                  <h6 class="card-text">Decreased by 10%</h6>
                </div>
              </div>
            </div> -->
            <!-- <div class="col-md-4 stretch-card grid-margin">
              <div class="card bg-gradient-success card-img-holder text-white">
                <div class="card-body">
                  
                  <h4 class="font-weight-normal mb-3">Visitors Online <i class="mdi mdi-diamond mdi-24px float-right"></i>
                  </h4>
                  <h2 class="mb-5">95,5741</h2>
                  <h6 class="card-text">Increased by 5%</h6>
                </div>
              </div>
            </div> -->
            <div class="col-md-12">
            <figure class="highcharts-figure">
    <div id="container"></div>
    <p class="highcharts-description">
      
    </p>
</figure>

            </div>
            <div class="col-md-12">
            <div class="col-md-6" style="display:flex">
            <form id="get-team-graph-data" method="get" style="display:flex;flex-direction: inherit;">
              <select name="time-log-group" id="time-log-group" onchange="this.form.submit()">
                <option value="">Select Timelog</option>
                <option value="group-by-user" @if($time_log == 'group-by-user') selected @endif >Group By User</option>
                <option value="group-by-project" @if($time_log == 'group-by-project') selected @endif>Group By Projects</option>
              </select>
              <select name="time-log-by-week" id="time-log-by-week">
                <option value="">Select Days</option>
                <option value="get-last-seven-days" @if($teamDataByWeek == 'get-last-seven-days') selected @endif>Last Seven Days</option>
                <option value="get-last-30-days" @if($teamDataByWeek == 'get-last-30-days') selected @endif>Last 30 Days</option>
                <option value="custom-dates" @if($teamDataByWeek == 'custom-dates') selected @endif>By Date</option>
              </select>
              <input type="text" class="form-control" name="duedate" id="datepicker" placeholder="select Due Date" <?php if($teamDataByWeek != 'custom-dates'){ ?> style="display:none"<?php } ?>>
            </form>
            </div> 
              <h3>Team Timelog</h3>
        @if(!empty($usersTimeLogArray) && $time_log == 'group-by-user')  
        <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Member</th>
      <th scope="col">Total Duration</th>
    </tr>
  </thead>
  <tbody>
  @php  
  $count = 1;
  @endphp
  
  @foreach($usersTimeLogArray as $timeLogArrayKey => $timeLogArray)
    <tr>
      <td>{{$count}}</td>
      <td><a href="javascript:void(0)" data-user-id={{$timeLogArrayKey}} class="team-member-id">{{User::find($timeLogArrayKey)->name}}</td>
      <td>{{$timeLogArray}}</td>
    </tr>
    @php  
  $count++;
  @endphp
  @endforeach
  
  </tbody>
  </table>
  @elseif($time_log == 'group-by-project')
   
  @else    
  <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Task</th>
      <th scope="col">Project</th>
      <th scope="col">Company</th>
      <th scope="col">Start Time</th>
      <th scope="col">End Time</th>
      <th scope="col">Duration Time</th>
   
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
          <td>{{User::find(Clients::find(MasterTask::find($task->task_id)->company_id)->user_id)->name}}</td>
          <td>{{$task->start_time}}</td>
          <td>{{$task->end_time}}</td>
          <?php 
          $date_a = new DateTime($task->end_time);
         $date_b = new DateTime($task->start_time);

         $interval = date_diff($date_a,$date_b);
         ?>
          <td>{{$interval->format('%H:%I:%S')}}</td>
        </tr>
      <?php } ?>  
      <?php } ?>



  
  </tbody>
</table>
@endif
            </div>
          </div>

@endsection
<?php 
$nameUserTimeLogArray = array();
foreach($usersTimeLogArray as $userKey => $userdata)
{
  $nameUserTimeLogArray[User::find($userKey)->name] = $userdata;
}
?> 
@section('customjs')
<script>
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  $('#datepicker').daterangepicker({
       // singleDatePicker: true,
       
        format: 'mm-dd-yyyy',
  });
  
  $('#time-log-by-week').change(function(event){
    let timeLogValue = $(this).val();
    $('#datepicker').hide();
    if(timeLogValue == 'custom-dates')
    {
      $('#datepicker').show();
    }
    else{
      $('#get-team-graph-data').submit();
    }  
  });

  $('.applyBtn').click(function(){
    $('#get-team-graph-data').submit();
  });


$('.team-member-id').click(function(){
  let teamMemberId = $(this).attr('data-user-id');
  $.ajax({
  url : '/admin/get-team-member-project-detail',
  method : 'POST',
  dataType : 'text',
  data : {
    _token: CSRF_TOKEN,
    teamMemberId : teamMemberId 
    },
  success:function(resp)
  {
    $("#edit-task-modal").html(resp);
    $('#edit-task-modal').modal('show');
  },
 });
  $("#get-project-details").html('sdksjdsd');
  $('#get-project-details').modal('show');
});  
@if(!empty($usersTimeLogArray)) 


let teamMemberName = [];
let hourSpendbyMember = [];
//let actualDuplicateCount = [];

var jsArray = JSON.parse('<?php echo json_encode($nameUserTimeLogArray); ?>');
for(var i in jsArray){
  
  teamMemberName.push(i);
  hourSpendbyMember.push(jsArray[i]);
  // criticalityColors.push(getRandomColor());
}
console.log(jsArray);
Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Time Logs'
    },
    // subtitle: {
    //     text: 'Source: <a href="https://en.wikipedia.org/wiki/World_population">Wikipedia.org</a>'
    // },
    xAxis: {
        categories: teamMemberName,
        title: {
            text: null
        }
    },
    yAxis: {
        min: 0,
        title: {
          //  text: 'Population (millions)',
          //  align: 'high'
        },
        labels: {
            //overflow: 'justify'
        }
    },
    tooltip: {
    //    valueSuffix: ' millions'
    },
    // plotOptions: {
    //     bar: {
    //         dataLabels: {
    //            // enabled: true
    //         }
    //     }
    // },
    // legend: {
    //     // layout: 'vertical',
    //     // align: 'right',
    //     // verticalAlign: 'top',
    //     // x: -40,
    //     // y: 80,
    //     floating: true,
    //     borderWidth: 1,
    //     // backgroundColor:
    //     //     Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
    //     shadow: true
    // },
    // credits: {
    //     enabled: false
    // },
    series: [{
       // name: 'Total time spent '+hourSpendbyMember,
        data: hourSpendbyMember
    }]
});
@else
Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Time Logs'
    },
    // subtitle: {
    //     text: 'Source: <a href="https://en.wikipedia.org/wiki/World_population">Wikipedia.org</a>'
    // },
    xAxis: {
        categories: ['Mobile Application Developemt in l', 'Mobile Application'],
        title: {
            text: null
        }
    },
    yAxis: {
        min: 0,
        title: {
          //  text: 'Population (millions)',
          //  align: 'high'
        },
        labels: {
            overflow: 'justify'
        }
    },
    tooltip: {
        //valueSuffix: ' millions'
    },
    plotOptions: {
        bar: {
            dataLabels: {
                enabled: false
            }
        }
    },
    // legend: {
    //     layout: 'vertical',
    //     align: 'right',
    //     verticalAlign: 'top',
    //     x: -40,
    //     y: 80,
    //     floating: true,
    //     borderWidth: 1,
    //     backgroundColor:
    //         Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
    //     shadow: true
    // },
    credits: {
        enabled: false
    },
    series: [{
        //name: 'Year 1800',
        data: [3, 4]
    },]
});
@endif
</script>
@endsection
