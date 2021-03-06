@extends('admin.layouts.index')
@section('content')
<link type="text/css" rel="stylesheet" href="{!! asset('public/css/select2.css')!!}" />
<div class="page-content">
  <div class="row">
	 <div class="col-lg-12">
					<div class="panel panel-blue">
					   <div class="panel-heading">Assign Assets to Employee</div>
					   <div class="panel-body pan">
						  {{ Form::open(['method'=>'post','url'=>'storeAssets','files'=>'true','class'=>'form-horizontal','role'=>'form'])}}
						  {{ Form::hidden('user_id', @$userDetails['user_id'], array('name'=>'user_id')) }}
							 <div class="form-body pal">
								 <div class="form-group {{ $errors->has('service_group_id') ? 'has-error' : '' }}">
								   <label for="name" class="col-md-2 control-label">Employee Name <span class='require'>*</span></label>
								   <div class="col-md-9">
									  <div class="input-icon">
									   {{ Form::text('name', @$userDetails['username'], array('class' => 'form-control','placeholder'=>"Company Assets  Name", 'require' => true,'readonly'=>true)) }}
										  <span class="text-danger">{{ $errors->first('name') }}</span>
									  </div>
								   </div>
								</div>
								 <div class="form-group ">
									 <label for="name" class="col-md-2 control-label">Company Assets <span class='require'>*</span></label>

									 <div class="col-md-9">
										 <table id="table_id" class="table table-hover table-striped table-bordered table-advanced tablesorter display">
											 <thead>
												 <th></th>
												 <th>Assets Name</th>
												 <th>Assets Cost</th>
											 </thead>
											 @php 
											 $sum = 0;
											 @endphp
											 @foreach($companyAssetdetails as $companyAssetdetail)
											 @php ($checkboxStatus = false)
												 @if(in_array($companyAssetdetail['id'],$selectedUSerAssets))
														 @php ($checkboxStatus = true) 
														 @php ($sum += $companyAssetdetail['cost'])
														
												 @endif  
												 <tr>
													 <td>{{ Form::checkbox('asset_ids[]', $companyAssetdetail['id'], $checkboxStatus, ['class' => 'field','cost'=>$companyAssetdetail['cost']]) }}</td>
													 <td>{{ $companyAssetdetail['name'] }}</td>
													 <td>{{ $companyAssetdetail['cost'] }}</td>
												 </tr>
											 @endforeach
										 </table>
									 </div>
								 </div>
								 <div class="form-group {{ $errors->has('service_group_id') ? 'has-error' : '' }}">
									 <label for="name" class="col-md-2 control-label">Total Assets Cost Assign to Employee <span class='require'>*</span></label>
									 <div class="col-md-9">
										 <div class="input-icon">
											 {{ Form::text('assetsCost',$sum, array('id'=>'assetsCost','class' => 'form-control','placeholder'=>"Total Assets Cost Assign to Employee",'maxlength'=>6)) }}
										 </div>
									 </div>
								 </div>
							 </div>
							</div>
							 <div class="form-actions">
								<div class="col-md-offset-3 col-md-9"><button type="submit" class="btn btn-primary">{{ trans('message.submit') }}</button>&nbsp;
								<button type="reset" class="btn btn-green">{{ trans('message.reset') }}</button></div>
							 </div>
						  {{ Form::close() }}
					   </div>
					</div>
				 </div>
				 </div>
	 </div>
  </div>
</div>
               <!--END CONTENT-->
  @endsection

@push('scripts')
	<script>
		$(document).ready(function() {
		function recalculate() {
		var cost = 0;

		$("input[type=checkbox]:checked").each(function() {
            cost += parseInt($(this).attr("cost"));
		});
		$("#assetsCost").val(cost);
		}

		$("input[type=checkbox]").change(function() {
		recalculate();
		});
		});
	</script>
	<script src="{!! asset('public/js/select2.min.js') !!}"></script>
	<script type="text/javascript">//<![CDATA[
        $(function(){
            $("#service_group_id").select2({closeOnSelect:false});
        });//]]>

	</script>
@endpush