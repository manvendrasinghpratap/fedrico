@extends('admin.layouts.index')
@section('content')
	<link type="text/css" rel="stylesheet" href="{!! asset('public/css/select2.css')!!}" />
<!--END TITLE & BREADCRUMB PAGE--><!--BEGIN CONTENT-->
<div class="page-content">
  <div class="row">
	 <div class="col-lg-12">
					<div class="panel panel-blue">
					   <div class="panel-heading">{{trans('message.editgroup')}}</div>
					   <div class="panel-body pan">
						  {{ Form::open(['method'=>'post','url'=>'updategroup','files'=>'true','class'=>'form-horizontal','role'=>'form'])}}
						   {{ Form::hidden('id', $groupDetails['id'], array('name'=>'id')) }}
							 <div class="form-body pal">
								 <div class="form-group {{ $errors->has('groupname') ? 'has-error' : '' }}">
								   <label for="name" class="col-md-3 control-label">{{ trans('message.groupname')}} <span class='require'>*</span></label>
								   <div class="col-md-9">
									  <div class="input-icon"><i class="fa fa-user"></i>
									  {{ Form::text('groupname', $groupDetails['groupname'], array('class' => 'form-control','placeholder'=>trans('message.groupname'),'required'=>true)) }}
										  <span class="text-danger">{{ $errors->first('groupname') }}</span>
									  </div>
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
