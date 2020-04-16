@extends('layouts.admin.main')
@section('heading')
Add Task
@endsection

@section('content')
<div id="add-task">
<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">

</div>
<p></p>

</div>
@endsection
@section('vuejs')
<!--         -->

<script>

  var view_table = $("#task-table").DataTable({
    pagingType: "full_numbers",
    //columns: columns_operation,
  });

  $(".dataTables_length").addClass("bs-select");

  //To remove unwanted class from pagination drop-down
  if ($("#task-table_length > label > select")[0])
    $("#task-table_length > label > select").removeClass(
      "custom-select-sm form-control form-control-sm"
    );
 $('#task-table tbody').sortable();
</script>
@endsection
