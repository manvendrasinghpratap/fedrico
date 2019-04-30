@extends('admin.layouts.index')
@section('content')
	<link type="text/css" rel="stylesheet" href="{!! asset('public/css/select2.css')!!}" />
<!--END TITLE & BREADCRUMB PAGE--><!--BEGIN CONTENT-->
<div class="page-content">
  <div class="row">
	 <div class="col-lg-12">
					<div class="panel panel-blue">
					   <div class="panel-heading">{{ trans('message.uploadcsv')}}</div> 
						  @include('admin.common.flash_mesage')
					   <div class="panel-body pan">
						  {{ Form::open(['method'=>'post','url'=>'uploademployeecsv','files'=>'true','class'=>'form-horizontal','role'=>'form'])}}
							 <div class="form-body pal">
										<div class="form-group {{ $errors->has('avatar') ? 'has-error' : '' }}">
											<label for="name" class="col-md-3 control-label">{{ trans('message.uploadcsvfile')}}<span class='require'>*</span></label>
											<div class="col-md-9">
											 <div class="input-icon">
												 <input type="file" class="form-control" name="uploadcsvfile"/>
												 <span class="text-danger">{{ $errors->first('uploadcsvfile') }}</span>
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
