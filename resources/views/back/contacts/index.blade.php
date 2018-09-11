@extends('back.layout')

@section('stylesheets')
	<!-- iCheck -->
    <link href="{{ asset('adminlte/vendors/iCheck/skins/flat/green.css') }}" rel="stylesheet">
    <!-- Datatables -->
    <link href="{{ asset('adminlte/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('adminlte/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('adminlte/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('adminlte/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('adminlte/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}" rel="stylesheet">   
@endsection

@section('main')
<div class="right_col" role="main">
  <div class="">
	<div class="page-title">
	  <div class="title_left">
		<h3>Contacts / Enquiry Form</h3>
	  </div>
	  <div class="title_right">
		<div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
		  <div class="input-group">
		  {{--<input type="text" class="form-control" placeholder="Search for...">
			<span class="input-group-btn">
			  <button class="btn btn-default" type="button">Go!</button>
		  </span>--}} 
		  </div>
		</div>
	  </div>
	</div>

	<div class="clearfix"></div>

	<div class="row">
	  <div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
		  <div class="x_title">
			<h2>View all Contacts <small>Total no of contacts: {{$total}}</small></h2>
			<ul class="nav navbar-right panel_toolbox">
			  <li>
				@if (Session::has('message'))
					@component('back.alert-success')
						{{ Session::get('message') }}
					@endcomponent
				@endif
			  </li>
			</ul>	
			<div class="clearfix"></div>
		  </div>
		  <div class="x_content">
			<!--<p class="text-muted font-13 m-b-30">&nbsp;</p>-->
			<div class="table-responsive">
			<table id="datatable" class="table table-striped table-bordered">
				<thead>
					<tr>
						<th>User Name</th>
						<th>Email ID</th>
            <th>Phone No</th>
            <th>Message</th>
						<th>Create Date</th>
						<th class="text-center">Action</th>
					</tr>
				</thead>
				<tbody>
					@if($total > 0)
						@foreach($contacts as $contact)
						<tr>
							<td>{{ $contact->fname }}</td>
							<td>{{ $contact->email }}</td>
              <td>{{ $contact->phone }}</td>
              <td>{{ $contact->message }}</td>
							<td>{{ $contact->created_at->toFormattedDateString() }}</td>
							<td class="text-center">
								{{--<a href="{{ URL::to('admin/contacts/' . $contact->id . '/edit') }}" title="Edit contact"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>&nbsp;--}}

								<a href="javascript:delcontact({{$contact->id}});" title="Delete contact"><i class="fa fa-trash" aria-hidden="true"></i></a>
									
								<form action="{{url('admin/contacts', [$contact->id])}}" method="POST" id="frmDelContact_{{$contact->id}}">
									<input type="hidden" name="_method" value="DELETE">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<!--<input type="submit" class="btn btn-danger" value="Delete"/>-->
								</form>
							</td>
						</tr>
						@endforeach
					@else
					<tr>
						<td colspan="4">Records not found.</td>						
					</tr>
					@endif		
				</tbody>
			</table>
			</div>
		  </div>
		</div>
	  </div>
	</div>
  </div>
</div>
@endsection

@section('scripts')
	<script>
		function delcontact(cid){
			if(confirm("Are you sure want to delete this contact?")){
				document.getElementById("frmDelContact_" + cid).submit();
			}
		}
	</script>
    <!-- iCheck -->
    <script src="{{ asset('adminlte/vendors/iCheck/icheck.min.js') }}"></script>
    <!-- Datatables -->
    <script src="{{ asset('adminlte/vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('adminlte/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('adminlte/vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('adminlte/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('adminlte/vendors/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('adminlte/vendors/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('adminlte/vendors/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('adminlte/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') }}"></script>
    <script src="{{ asset('adminlte/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('adminlte/vendors/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('adminlte/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js') }}"></script>
    <script src="{{ asset('adminlte/vendors/datatables.net-scroller/js/datatables.scroller.min.js') }}"></script>
    <script src="{{ asset('adminlte/vendors/jszip/dist/jszip.min.js') }}"></script>
    <script src="{{ asset('adminlte/vendors/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('adminlte/vendors/pdfmake/build/vfs_fonts.js') }}"></script>
    <!-- Datatables -->
    <script>
      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#datatable-buttons").length) {
            $("#datatable-buttons").DataTable({
              dom: "Bfrtip",
              buttons: [
                {
                  extend: "copy",
                  className: "btn-sm"
                },
                {
                  extend: "csv",
                  className: "btn-sm"
                },
                {
                  extend: "excel",
                  className: "btn-sm"
                },
                {
                  extend: "pdfHtml5",
                  className: "btn-sm"
                },
                {
                  extend: "print",
                  className: "btn-sm"
                },
              ],
              responsive: true
            });
          }
        };

        TableManageButtons = function() {
          "use strict";
          return {
            init: function() {
              handleDataTableButtons();
            }
          };
        }();

        $('#datatable').dataTable();

        $('#datatable-keytable').DataTable({
          keys: true
        });

        $('#datatable-responsive').DataTable();

        $('#datatable-scroller').DataTable({
          ajax: "js/datatables/json/scroller-demo.json",
          deferRender: true,
          scrollY: 380,
          scrollCollapse: true,
          scroller: true
        });

        $('#datatable-fixed-header').DataTable({
          fixedHeader: true
        });

        var $datatable = $('#datatable-checkbox');

        $datatable.dataTable({
          'order': [[ 1, 'asc' ]],
          'columnDefs': [
            { orderable: false, targets: [0] }
          ]
        });
        $datatable.on('draw.dt', function() {
          $('input').iCheck({
            checkboxClass: 'icheckbox_flat-green'
          });
        });

        TableManageButtons.init();
      });
    </script>
    <!-- /Datatables -->
@endsection