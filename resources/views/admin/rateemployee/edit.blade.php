@extends('admin.layouts.index')
@section('content')
	<link type="text/css" rel="stylesheet" href="{!! asset('public/css/select2.css')!!}" />
<!--END TITLE & BREADCRUMB PAGE--><!--BEGIN CONTENT-->
<div class="page-content">
  <div class="row">
	 <div class="col-lg-12">
					<div class="panel panel-blue">
					   <div class="panel-heading">Edit Employee Details</div>
					   <div class="panel-body pan">
						  {{ Form::open(['method'=>'post','url'=>'updateemployee','files'=>'true','class'=>'form-horizontal','role'=>'form'])}}
						   {{ Form::hidden('id', $employeedetails['id'], array('name'=>'id')) }}
							 <div class="form-body pal">
								 <div class="form-group {{ $errors->has('firstname') ? 'has-error' : '' }}">
								   <label for="firstname" class="col-md-3 control-label">{{ trans('message.firstname')}}<span class='require'>*</span></label>
								   <div class="col-md-9">
									  <div class="input-icon"><i class="fa fa-user"></i>
									  {{ Form::text('firstname', $employeedetails['firstname'], array('class' => 'form-control','placeholder'=>trans('message.firstname'))) }}
										  <span class="text-danger">{{ $errors->first('firstname') }}</span>
									  </div>
								   </div>
								</div>
								<div class="form-group {{ $errors->has('lastname') ? 'has-error' : '' }}">
									<label for="name" class="col-md-3 control-label">{{ trans('message.lastname')}}<span class='require'>*</span></label>
									<div class="col-md-9">
									 <div class="input-icon"><i class="fa fa-user"></i>
									 {{ Form::text('lastname', $employeedetails['lastname'], array('class' => 'form-control','placeholder'=>trans('message.lastname'))) }}
										 <span class="text-danger">{{ $errors->first('lastname') }}</span>
									 </div>
									</div>
							 </div>
							 <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
								 <label for="name" class="col-md-3 control-label">{{ trans('message.email')}}<span class='require'>*</span></label>
								 <div class="col-md-9">
									<div class="input-icon"><i class="fa fa-user"></i>
									{{ Form::email('email', $employeedetails['email'], array('class' => 'form-control','placeholder'=>trans('message.email'))) }}
										<span class="text-danger">{{ $errors->first('email') }}</span>
									</div>
								 </div>
							</div>
							<div class="form-group {{ $errors->has('country') ? 'has-error' : '' }}">
								<label for="name" class="col-md-3 control-label">{{ trans('message.country')}}<span class='require'>*</span></label>
								<div class="col-md-9">
								 <div class="input-icon"><i class="fa fa-user"></i>
								 {{ Form::text('country', $employeedetails['country'], array('class' => 'form-control','placeholder'=>trans('message.country'))) }}
									 <span class="text-danger">{{ $errors->first('name') }}</span>
								 </div>
								</div>
						 </div>
						 <div class="form-group {{ $errors->has('state') ? 'has-error' : '' }}">
							 <label for="name" class="col-md-3 control-label">{{ trans('message.state')}}<span class='require'>*</span></label>
							 <div class="col-md-9">
								<div class="input-icon"><i class="fa fa-user"></i>
								{{ Form::text('state', $employeedetails['state'], array('class' => 'form-control','placeholder'=>trans('message.state'))) }}
									<span class="text-danger">{{ $errors->first('state') }}</span>
								</div>
							 </div>
						</div>
						<div class="form-group {{ $errors->has('city') ? 'has-error' : '' }}">
							<label for="name" class="col-md-3 control-label">{{ trans('message.city')}}<span class='require'>*</span></label>
							<div class="col-md-9">
							 <div class="input-icon"><i class="fa fa-user"></i>
							 {{ Form::text('city', $employeedetails['city'], array('class' => 'form-control','placeholder'=>trans('message.city'))) }}
								 <span class="text-danger">{{ $errors->first('city') }}</span>
							 </div>
							</div>
					 </div>
					 <div class="form-group {{ $errors->has('pro') ? 'has-error' : '' }}">
						 <label for="name" class="col-md-3 control-label">{{ trans('message.pro')}}<span class='require'>*</span></label>
						 <div class="col-md-9">
							<div class="input-icon"><i class="fa fa-user"></i>
							{{ Form::text('pro', $employeedetails['pro'], array('class' => 'form-control','placeholder'=>trans('message.pro'))) }}
								<span class="text-danger">{{ $errors->first('pro') }}</span>
							</div>
						 </div>
					</div>
					<div class="form-group {{ $errors->has('versus') ? 'has-error' : '' }}">
						<label for="name" class="col-md-3 control-label">{{ trans('message.versus')}}<span class='require'>*</span></label>
						<div class="col-md-9">
						 <div class="input-icon"><i class="fa fa-user"></i>
						 {{ Form::text('versus', $employeedetails['versus'], array('class' => 'form-control','placeholder'=>trans('message.versus'))) }}
							 <span class="text-danger">{{ $errors->first('versus') }}</span>
						 </div>
						</div>
				 </div>
				 <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
					 <label for="name" class="col-md-3 control-label">{{ trans('message.description')}}<span class='require'>*</span></label>
					 <div class="col-md-9">
						<div class="input-icon"><i class="fa fa-user"></i>
						{{ Form::textarea('description', $employeedetails['description'], array('rows' => 4, 'cols' => 54,'class' => 'form-control','placeholder'=>trans('message.description'))) }}
							<span class="text-danger">{{ $errors->first('description') }}</span>
						</div>
					 </div>
				</div>

							 </div>

							 <div class="form-actions">
								 <div class="col-md-offset-3 col-md-9">
									 <button type="submit" class="btn btn-primary">{{ trans('message.update') }}</button>&nbsp;
									 {!! link_to(URL::previous(), trans('message.cancel'), ['class' => 'btn btn-default']) !!}
								 </div>
							 </div>
						  {{ Form::close() }}
					   </div>
					</div>
				 </div>
				 </div>
	 </div>
               <!--END CONTENT-->
  @endsection
@push('scripts')
	<script src="{!! asset('public/js/select2.min.js') !!}"></script>
	<script type="text/javascript">//<![CDATA[
        $(function(){
            $("#bank_type_id").select2({closeOnSelect:false});
            $("#branch_head_category_designation_id").select2({closeOnSelect:false});
            $("#pincode_state_city_mapping_id").select2({closeOnSelect:false});
            $("#bank_type_idds").select2({closeOnSelect:false});
        });//]]>

	</script>
@endpush
