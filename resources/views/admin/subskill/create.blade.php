@extends('admin.layouts.index')
@section('content')
	<link type="text/css" rel="stylesheet" href="{!! asset('public/css/select2.css')!!}" />
<!--END TITLE & BREADCRUMB PAGE--><!--BEGIN CONTENT-->
<div class="page-content">
  <div class="row">
	 <div class="col-lg-12">
					<div class="panel panel-blue">
					   <div class="panel-heading">{{trans('message.addnewsubskill')}} </div>
					   <div class="panel-body pan">
						  {{ Form::open(['method'=>'post','url'=>'subskillstore','files'=>'true','class'=>'form-horizontal','role'=>'form'])}}
							 <div class="form-body pal">
								<div class="form-group">
									<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
										<label for="name" class="col-md-3 control-label">{{ trans('message.mainskillname')}}<span class='require'>*</span></label>
												<div class="col-md-5">
													<select id="skill_id" class="form-control" name="skill_id">
														@foreach($skillArray as $key=>$value)
															<option value="{{$value['id']}}">{{$value['skillname']}}</option>
														@endforeach

													</select>
												</div>
									</div>
								</div>
								 <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
								   <label for="name" class="col-md-3 control-label">{{ trans('message.subskillname')}}<span class='require'>*</span></label>
								   <div class="col-md-9">
									  <div class="input-icon"><i class="fa fa-user"></i>
									  {{ Form::text('name', '', array('class' => 'form-control','placeholder'=> trans('message.subskillname'),'required'=>true)) }}
										  <span class="text-danger">{{ $errors->first('name') }}</span>
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
