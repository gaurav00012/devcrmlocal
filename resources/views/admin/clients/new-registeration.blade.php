@extends('layouts.admin.main')
@section('heading')
New Registerations
@endsection
@section('content')
<div class="modal" tabindex="-1" id="edit-task-modal" role="dialog">
 
</div>

<table class="table admin-client-table" id="client-table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Company Name</th>
            <th scope="col">Contact Person</th> 
            <th scope="col">Email</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
        	@foreach($newRegisterations as $key => $newRegisteration)
        		<tr>
        			<td>{{$key+1}}</td>
        			<td><a href="#" class="company_name" data-id="{{$newRegisteration->id}}">{{$newRegisteration->company_name}}</a></td>
        			<td>{{$newRegisteration->contact_person}}</td>
        			<td>{{$newRegisteration->email}}</td>
        			<td><a href="#" data-id="{{$newRegisteration->id}}" class="btn green-btn approve-client">Approve</a></td>
        		</tr>

        	@endforeach
           
        </tbody>
</table>

<div class="text-center" style="display:flex;justify-content: center;">
{{ $newRegisterations->links() }}
</div>
@endsection
@section('vuejs')
<script>
// 	var view_table = $("#client-table").DataTable({
//     pagingType: "full_numbers",
//   });

//   $(".dataTables_length").addClass("bs-select");

  
//   if ($("#client-table_length > label > select")[0])
//     $("#client-table_length > label > select").removeClass(
//       "custom-select-sm form-control form-control-sm"
//     );

	 var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
	$('.company_name').click(function(){
		let clientId = $(this).attr('data-id')
		
		$.ajax({
			url : '/admin/get-new-client',
		    method : 'POST',
		    dataType : 'text',
		    data : {
		      _token: CSRF_TOKEN,
		      clientid : clientId 
		      },
		    success:function(resp)
		    {
		      $("#edit-task-modal").html(resp);
    		$('#edit-task-modal').modal('show');
		    },
		});
	});

	$('.approve-client').click(function(){
		let clientId = $(this).attr('data-id');
		$.ajax({
			url : '/admin/approve-client',
		    method : 'POST',
		    dataType : 'text',
		    data : {
		      _token: CSRF_TOKEN,
		      clientid : clientId 
		      },
		    success:function(resp)
		    {
		      let jsonresp = JSON.parse(resp);
		      if(jsonresp.success === true)
		      {
		      	alert("Client Approved Successfully");
		      	location.reload();
		      } 
		    },
		});
	});
</script>
@endsection