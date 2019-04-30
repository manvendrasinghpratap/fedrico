@extends('admin.layouts.index')
@section('content')
	<link type="text/css" rel="stylesheet" href="{!! asset('public/css/select2.css')!!}" />
<!--END TITLE & BREADCRUMB PAGE--><!--BEGIN CONTENT-->
<div class="page-content">
  <div class="row">
	 <div class="col-lg-12">
					<div class="panel panel-blue">
					   <div class="panel-heading">{{ trans('message.downloadsamplecsv')}}</div>
						  @include('admin.common.flash_mesage')
					   <div class="panel-body pan">
						  {{ Form::open(['method'=>'post','url'=>'uploademployeecsv','files'=>'true','class'=>'form-horizontal','role'=>'form'])}}
							 <div class="form-body pal">
										<div class="form-group {{ $errors->has('avatar') ? 'has-error' : '' }}">
											<div class="col-md-9">
											 <div class="input-icon">
												<a class="btn btn-green" href="{{url('storage/app/public/sampleuploademplyoeedetails.csv')}}" alt="">{{ trans('message.downloadsamplecsvfile')}}</a>
												 <span class="text-danger">{{ $errors->first('uploadcsvfile') }}</span>
											 </div>
											</div>
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
