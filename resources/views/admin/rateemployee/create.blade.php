@extends('admin.layouts.index')
@section('content')
	<link type="text/css" rel="stylesheet" href="{!! asset('public/css/select2.css')!!}" />
<!--END TITLE & BREADCRUMB PAGE--><!--BEGIN CONTENT-->
<div class="page-content">
  <div class="row">
	 <div class="col-lg-12">
					<div class="panel panel-blue">
					   <div class="panel-heading">Add New Employee</div>
					   <div class="panel-body pan">
						  {{ Form::open(['method'=>'post','url'=>'addemployee','files'=>'true','class'=>'form-horizontal','role'=>'form'])}}
							 <div class="form-body pal">
								 <div class="form-group {{ $errors->has('firstname') ? 'has-error' : '' }}">
								   <label for="firstname" class="col-md-3 control-label">{{ trans('message.firstname')}}<span class='require'>*</span></label>
								   <div class="col-md-9">
									  <div class="input-icon"><i class="fa fa-user"></i>
									  {{ Form::text('firstname', '', array('class' => 'form-control','placeholder'=>trans('message.firstname'))) }}
										  <span class="text-danger">{{ $errors->first('firstname') }}</span>
									  </div>
								   </div>
								</div>
								<div class="form-group {{ $errors->has('lastname') ? 'has-error' : '' }}">
									<label for="name" class="col-md-3 control-label">{{ trans('message.lastname')}}<span class='require'>*</span></label>
									<div class="col-md-9">
									 <div class="input-icon"><i class="fa fa-user"></i>
									 {{ Form::text('lastname', '', array('class' => 'form-control','placeholder'=>trans('message.lastname'))) }}
										 <span class="text-danger">{{ $errors->first('lastname') }}</span>
									 </div>
									</div>
							 </div>
							 <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
								 <label for="name" class="col-md-3 control-label">{{ trans('message.email')}}<span class='require'>*</span></label>
								 <div class="col-md-9">
									<div class="input-icon"><i class="fa fa-user"></i>
									{{ Form::email('email', '', array('class' => 'form-control','placeholder'=>trans('message.email'))) }}
										<span class="text-danger">{{ $errors->first('email') }}</span>
									</div>
								 </div>
							</div>
							<div class="form-group {{ $errors->has('country') ? 'has-error' : '' }}">
								<label for="name" class="col-md-3 control-label">{{ trans('message.country')}}<span class='require'>*</span></label>
								<div class="col-md-9">
								 <div class="input-icon"><i class="fa fa-user"></i>
								 {{ Form::text('country', '', array('class' => 'form-control','placeholder'=>trans('message.country'))) }}
									 <span class="text-danger">{{ $errors->first('name') }}</span>
								 </div>
								</div>
						 </div>
						 <div class="form-group {{ $errors->has('state') ? 'has-error' : '' }}">
							 <label for="name" class="col-md-3 control-label">{{ trans('message.state')}}<span class='require'>*</span></label>
							 <div class="col-md-9">
								<div class="input-icon"><i class="fa fa-user"></i>
								{{ Form::text('state', '', array('class' => 'form-control','placeholder'=>trans('message.state'))) }}
									<span class="text-danger">{{ $errors->first('state') }}</span>
								</div>
							 </div>
						</div>
						<div class="form-group {{ $errors->has('city') ? 'has-error' : '' }}">
							<label for="name" class="col-md-3 control-label">{{ trans('message.city')}}<span class='require'>*</span></label>
							<div class="col-md-9">
							 <div class="input-icon"><i class="fa fa-user"></i>
							 {{ Form::text('city', '', array('class' => 'form-control','placeholder'=>trans('message.city'))) }}
								 <span class="text-danger">{{ $errors->first('city') }}</span>
							 </div>
							</div>
					 </div>
					 <div class="form-group {{ $errors->has('pro') ? 'has-error' : '' }}">
						 <label for="name" class="col-md-3 control-label">{{ trans('message.pro')}}<span class='require'>*</span></label>
						 <div class="col-md-9">
							<div class="input-icon"><i class="fa fa-user"></i>
							{{ Form::text('pro', '', array('class' => 'form-control','placeholder'=>trans('message.pro'))) }}
								<span class="text-danger">{{ $errors->first('pro') }}</span>
							</div>
						 </div>
					</div>
					<div class="form-group {{ $errors->has('versus') ? 'has-error' : '' }}">
						<label for="name" class="col-md-3 control-label">{{ trans('message.versus')}}<span class='require'>*</span></label>
						<div class="col-md-9">
						 <div class="input-icon"><i class="fa fa-user"></i>
						 {{ Form::text('versus', '', array('class' => 'form-control','placeholder'=>trans('message.versus'))) }}
							 <span class="text-danger">{{ $errors->first('versus') }}</span>
						 </div>
						</div>
				 </div>
				 <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
					 <label for="name" class="col-md-3 control-label">{{ trans('message.description')}}<span class='require'>*</span></label>
					 <div class="col-md-9">
						<div class="input-icon"><i class="fa fa-user"></i>
						{{ Form::textarea('description', '', array('rows' => 4, 'cols' => 54,'class' => 'form-control','placeholder'=>trans('message.description'))) }}
							<span class="text-danger">{{ $errors->first('description') }}</span>
						</div>
					 </div>
				</div>

							 </div>
							 <div class="form-actions">
								 <div class="col-md-offset-3 col-md-9">
									 <button type="submit" class="btn btn-primary">{{ trans('message.submit') }}</button>&nbsp;
									 <button type="reset" class="btn btn-green">{{ trans('message.reset') }}</button>
									  {!! link_to(URL::previous(), trans('message.cancel'), ['class' => 'btn btn-default']) !!}
								 </div>
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
