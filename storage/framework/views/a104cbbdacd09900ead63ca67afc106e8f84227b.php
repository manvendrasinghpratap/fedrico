<?php $__env->startSection('content'); ?>
	<link type="text/css" rel="stylesheet" href="<?php echo asset('public/css/select2.css'); ?>" />
<!--END TITLE & BREADCRUMB PAGE--><!--BEGIN CONTENT-->
<div class="page-content">
  <div class="row">
	 <div class="col-lg-12">
					<div class="panel panel-blue">
					   <div class="panel-heading"><?php echo e(trans('message.editmainskill')); ?></div>
					   <div class="panel-body pan">
						  <?php echo e(Form::open(['method'=>'post','url'=>'updatemainskill','files'=>'true','class'=>'form-horizontal','role'=>'form'])); ?>

						   <?php echo e(Form::hidden('id', $skillDetails['id'], array('name'=>'id'))); ?>

							 <div class="form-body pal">
								 <div class="form-group <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
								   <label for="name" class="col-md-3 control-label"><?php echo e(trans('message.mainskillname')); ?> <span class='require'>*</span></label>
								   <div class="col-md-9">
									  <div class="input-icon"><i class="fa fa-user"></i>
									  <?php echo e(Form::text('name', $skillDetails['skillname'], array('class' => 'form-control','placeholder'=>trans('message.mainskillname'),'required'=>true))); ?>

										  <span class="text-danger"><?php echo e($errors->first('name')); ?></span>
									  </div>
								   </div>
								</div>
								<div class="form-group <?php echo e($errors->has('grouping_id') ? 'has-error' : ''); ?>">
									<label for="name" class="col-md-3 control-label"><?php echo e(trans('message.group')); ?><span class='require'>*</span></label>
									<div class="col-md-9">
									 <div class="input-icon">
										 <?php echo Form::select('grouping_id', $groupingArray , $skillDetails['grouping_id'], ['class' => 'form-control']); ?>

										 <span class="text-danger"><?php echo e($errors->first('grouping_id')); ?></span>
									 </div>
									</div>
							 </div>
							 </div>
							</div>
							 <div class="form-actions">
								 <div class="col-md-offset-3 col-md-9">
									 <button type="submit" class="btn btn-primary"><?php echo e(trans('message.update')); ?></button>&nbsp;
									 <?php echo link_to(URL::previous(), trans('message.cancel'), ['class' => 'btn btn-default']); ?>

								 </div>
							 </div>
						  <?php echo e(Form::close()); ?>

					   </div>
					</div>
				 </div>
				 </div>
	 </div>
  </div>
</div>
               <!--END CONTENT-->
  <?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
	<script src="<?php echo asset('public/js/select2.min.js'); ?>"></script>
	<script type="text/javascript">//<![CDATA[
        $(function(){
            $("#bank_type_id").select2({closeOnSelect:false});
            $("#branch_head_category_designation_id").select2({closeOnSelect:false});
            $("#pincode_state_city_mapping_id").select2({closeOnSelect:false});
            $("#bank_type_idds").select2({closeOnSelect:false});
        });//]]>

	</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>