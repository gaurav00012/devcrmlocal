<?php
use App\Task;
use App\User;
use App\MasterTask;
use App\MasterProject;
use App\TaskTimelog;
?>

@extends('layouts.admin.main')
@section('heading')
Dashboard
@endsection

@section('content')
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
            <form method="get">
              <select name="time-log-group" id="time-log-group" onchange="this.form.submit()">
                <option value="">Select Timelog</option>
                <option value="group-by-user" @if($timeLogs = 'group-by-user') selected @endif >Group By User</option>
                <option value="group-by-project" @if($timeLogs = 'group-by-project') selected @endif>Group By Projects</option>
              </select>
            </form>
              <h3>Team Timelog</h3>
        @if(!empty($usersTimeLogArray))  
        <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Member</th>
      <th scope="col">Total Duration</th>
    </tr>
  </thead>
  <tbody>
  @foreach($usersTimeLogArray as $timeLogArrayKey => $timeLogArray)
    <tr>
      <td>1</td>
      <td>{{$timeLogArrayKey}}</td>
      <td>{{$timeLogArray}}</td>
    </tr>
  @endforeach
  </tbody>
  </table>
        @else    
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
@endif
            </div>
          </div>

@endsection
@section('customjs')
<script>
@if(!empty($usersTimeLogArray))  

let teamMemberName = [];
let hourSpendbyMember = [];
//let actualDuplicateCount = [];

var jsArray = JSON.parse('<?php echo json_encode($usersTimeLogArray); ?>');
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
    legend: {
        // layout: 'vertical',
        // align: 'right',
        // verticalAlign: 'top',
        // x: -40,
        // y: 80,
        floating: true,
        borderWidth: 1,
        // backgroundColor:
        //     Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
        shadow: true
    },
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
       // categories: ['Africa', 'America', 'Asia', 'Europe', 'Oceania'],
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
        valueSuffix: ' millions'
    },
    plotOptions: {
        bar: {
            dataLabels: {
                enabled: true
            }
        }
    },
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'top',
        x: -40,
        y: 80,
        floating: true,
        borderWidth: 1,
        backgroundColor:
            Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
        shadow: true
    },
    credits: {
        enabled: false
    },
    series: [{
        name: 'Year 1800',
        data: [107, 31, 635, 203, 2]
    }, {
        name: 'Year 1900',
        data: [133, 156, 947, 408, 6]
    }, {
        name: 'Year 2000',
        data: [814, 841, 3714, 727, 31]
    }, {
        name: 'Year 2016',
        data: [1216, 1001, 4436, 738, 40]
    }]
});
@endif
</script>
@endsection
