@extends('admin.layouts.index')
@section('content')
	<link type="text/css" rel="stylesheet" href="{!! asset('public/css/select2.css')!!}" />
<!--END TITLE & BREADCRUMB PAGE--><!--BEGIN CONTENT-->
<div class="page-content">
  <div class="row">
	 <div class="col-lg-12">
					<div class="panel panel-blue">
					   <div class="panel-heading">{{ trans('message.addmainskills')}} </div>
					   <div class="panel-body pan">
						  {{ Form::open(['method'=>'post','url'=>'store','files'=>'true','class'=>'form-horizontal','role'=>'form'])}}
							 <div class="form-body pal">
								 <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
								   <label for="name" class="col-md-3 control-label">{{ trans('message.mainskillname')}}<span class='require'>*</span></label>
								   <div class="col-md-9">
									  <div class="input-icon"><i class="fa fa-user"></i>
									  {{ Form::text('name', '', array('class' => 'form-control','placeholder'=> trans('message.mainskillname'),'required'=>true)) }}
										  <span class="text-danger">{{ $errors->first('name') }}</span>
									  </div>
								   </div>
								</div>
								<div class="form-group {{ $errors->has('grouping_id') ? 'has-error' : '' }}">
									<label for="name" class="col-md-3 control-label">{{ trans('message.group')}}<span class='require'>*</span></label>
									<div class="col-md-9">
									 <div class="input-icon">
										 {!!Form::select('grouping_id', $groupingArray , null, ['class' => 'form-control'])!!}
										 <span class="text-danger">{{ $errors->first('grouping_id') }}</span>
									 </div>
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
