<?php $__env->startSection('content'); ?>
	<link type="text/css" rel="stylesheet" href="<?php echo asset('public/css/select2.css'); ?>" />
<!--END TITLE & BREADCRUMB PAGE--><!--BEGIN CONTENT-->
<div class="page-content">
  <div class="row">
	 <div class="col-lg-12">
					<div class="panel panel-blue">
						 <div class="panel-heading"><?php echo e(trans('message.editnewemplyee')); ?></div>
					   <div class="panel-body pan">
						  <?php echo e(Form::open(['method'=>'post','url'=>'updateemployee','files'=>'true','class'=>'form-horizontal','role'=>'form'])); ?>

						   <?php echo e(Form::hidden('id', $employeedetails['id'], array('name'=>'id'))); ?>

							 <div class="form-body pal">
								 <!-- For id section begin -->
								 <div class="form-group <?php echo e($errors->has('empid') ? 'has-error' : ''); ?>">
								   <label for="firstname" class="col-md-3 control-label"><?php echo e(trans('message.id')); ?></label>
								   <div class="col-md-9">
									  <div class="input-icon">
									  <?php echo e(Form::text('empid', @$employeedetails['empid'], array('class' => 'form-control','placeholder'=>trans('message.id')))); ?>

										  <span class="text-danger"><?php echo e($errors->first('firstname')); ?></span>
									  </div>
								   </div>
								</div>
								<!-- For id section end -->
								 <div class="form-group <?php echo e($errors->has('firstname') ? 'has-error' : ''); ?>">
								   <label for="firstname" class="col-md-3 control-label"><?php echo e(trans('message.firstname')); ?><span class='require'>*</span></label>
								   <div class="col-md-9">
									  <div class="input-icon"><i class="fa fa-user"></i>
									  <?php echo e(Form::text('firstname', $employeedetails['firstname'], array('class' => 'form-control','placeholder'=>trans('message.firstname')))); ?>

										  <span class="text-danger"><?php echo e($errors->first('firstname')); ?></span>
									  </div>
								   </div>
								</div>
								<div class="form-group <?php echo e($errors->has('lastname') ? 'has-error' : ''); ?>">
									<label for="name" class="col-md-3 control-label"><?php echo e(trans('message.lastname')); ?><span class='require'>*</span></label>
									<div class="col-md-9">
									 <div class="input-icon"><i class="fa fa-user"></i>
									 <?php echo e(Form::text('lastname', $employeedetails['lastname'], array('class' => 'form-control','placeholder'=>trans('message.lastname')))); ?>

										 <span class="text-danger"><?php echo e($errors->first('lastname')); ?></span>
									 </div>
									</div>
							 </div>
							 <div class="form-group <?php echo e($errors->has('email') ? 'has-error' : ''); ?>">
								 <label for="name" class="col-md-3 control-label"><?php echo e(trans('message.email')); ?><span class='require'>*</span></label>
								 <div class="col-md-9">
									<div class="input-icon"><i class="fa fa-user"></i>
									<?php echo e(Form::email('email', $employeedetails['email'], array('class' => 'form-control','placeholder'=>trans('message.email')))); ?>

										<span class="text-danger"><?php echo e($errors->first('email')); ?></span>
									</div>
								 </div>
							</div>
							<div class="form-group <?php echo e($errors->has('contactno') ? 'has-error' : ''); ?>">
								<label for="name" class="col-md-3 control-label"><?php echo e(trans('message.contactno')); ?><span class='require'>*</span></label>
								<div class="col-md-9">
								 <div class="input-icon"><i class="fa fa-user"></i>
								 <?php echo e(Form::text('contactno', $employeedetails['contactno'], array('class' => 'form-control','placeholder'=>trans('message.contactno')))); ?>

									 <span class="text-danger"><?php echo e($errors->first('contactno')); ?></span>
								 </div>
								</div>
						 </div>
							<div class="form-group <?php echo e($errors->has('country') ? 'has-error' : ''); ?>">
								<label for="name" class="col-md-3 control-label"><?php echo e(trans('message.country')); ?><span class='require'>*</span></label>
								<div class="col-md-9">
								 <div class="input-icon"><i class="fa fa-user"></i>
								 <?php echo e(Form::text('country', $employeedetails['country'], array('class' => 'form-control','placeholder'=>trans('message.country')))); ?>

									 <span class="text-danger"><?php echo e($errors->first('name')); ?></span>
								 </div>
								</div>
						 </div>
						 <div class="form-group <?php echo e($errors->has('state') ? 'has-error' : ''); ?>">
							 <label for="name" class="col-md-3 control-label"><?php echo e(trans('message.state')); ?><span class='require'>*</span></label>
							 <div class="col-md-9">
								<div class="input-icon"><i class="fa fa-user"></i>
								<?php echo e(Form::text('state', $employeedetails['state'], array('class' => 'form-control','placeholder'=>trans('message.state')))); ?>

									<span class="text-danger"><?php echo e($errors->first('state')); ?></span>
								</div>
							 </div>
						</div>
						<div class="form-group <?php echo e($errors->has('city') ? 'has-error' : ''); ?>">
							<label for="name" class="col-md-3 control-label"><?php echo e(trans('message.city')); ?><span class='require'>*</span></label>
							<div class="col-md-9">
							 <div class="input-icon"><i class="fa fa-user"></i>
							 <?php echo e(Form::text('city', $employeedetails['city'], array('class' => 'form-control','placeholder'=>trans('message.city')))); ?>

								 <span class="text-danger"><?php echo e($errors->first('city')); ?></span>
							 </div>
							</div>
					 </div>
					 <div class="form-group <?php echo e($errors->has('startdate') ? 'has-error' : ''); ?>">
						 	<label for="name" class="col-md-3 control-label"><?php echo e(trans('message.startdate')); ?><span class='require'>*</span></label>
							<div class="col-md-9">
									 <div class='input-group date' id='startdate' >
											 <input type='text' class="form-control" name="startdate" value="<?php echo e($employeedetails['startdate']); ?>" readonly=true />
											 <span class="input-group-addon">
													 <span class="glyphicon glyphicon-calendar"></span>
											 </span>
										 </div>
						 </div>
					 </div>
					 <div class="form-group <?php echo e($errors->has('enddate') ? 'has-error' : ''); ?>">
						 	<label for="name" class="col-md-3 control-label"><?php echo e(trans('message.enddate')); ?><span class='require'>*</span></label>
							<div class="col-md-9">
									 <div class='input-group date' id='enddate' >
											 <input type='text' class="form-control" name="enddate" value="<?php echo e($employeedetails['enddate']); ?>" readonly=true />
											 <span class="input-group-addon">
													 <span class="glyphicon glyphicon-calendar"></span>
											 </span>
										 </div>
						 </div>
					 </div>
					 <div class="form-group <?php echo e($errors->has('pro') ? 'has-error' : ''); ?>">
						 <label for="name" class="col-md-3 control-label"><?php echo e(trans('message.pro')); ?><span class='require'>*</span></label>
						 <div class="col-md-9">
							<div class="input-icon">
							<?php echo e(Form::textarea('pro', $employeedetails['pro'], array('class' => 'form-control','placeholder'=>trans('message.pro')))); ?>

								<span class="text-danger"><?php echo e($errors->first('pro')); ?></span>
							</div>
						 </div>
					</div>
					<div class="form-group <?php echo e($errors->has('versus') ? 'has-error' : ''); ?>">
						<label for="name" class="col-md-3 control-label"><?php echo e(trans('message.versus')); ?><span class='require'>*</span></label>
						<div class="col-md-9">
						 <div class="input-icon">
						 <?php echo e(Form::textarea('versus', $employeedetails['versus'], array('class' => 'form-control','placeholder'=>trans('message.versus')))); ?>

							 <span class="text-danger"><?php echo e($errors->first('versus')); ?></span>
						 </div>
						</div>
				 </div>
				 <div class="form-group <?php echo e($errors->has('description') ? 'has-error' : ''); ?>">
					 <label for="name" class="col-md-3 control-label"><?php echo e(trans('message.description')); ?><span class='require'>*</span></label>
					 <div class="col-md-9">
						<div class="input-icon">
						<?php echo e(Form::textarea('description', $employeedetails['description'], array('rows' => 4, 'cols' => 54,'class' => 'form-control','placeholder'=>trans('message.description')))); ?>

							<span class="text-danger"><?php echo e($errors->first('description')); ?></span>
						</div>
					 </div>
				</div>
				<div class="form-group <?php echo e($errors->has('courses') ? 'has-error' : ''); ?>">
					<label for="name" class="col-md-3 control-label"><?php echo e(trans('message.courses')); ?><span class='require'>*</span></label>
					<div class="col-md-9">
					 <div class="input-icon">
						 <?php echo Form::select('courses[]', $courses , json_decode($employeedetails['courses']), ['class' => 'form-control','multiple'=>true]); ?>

						 <span class="text-danger"><?php echo e($errors->first('description')); ?></span>
					 </div>
					</div>
			 </div>
						<div class="form-group <?php echo e($errors->has('avatar') ? 'has-error' : ''); ?>">
							<label for="name" class="col-md-3 control-label"><?php echo e(trans('message.avatar')); ?><span class='require'>*</span></label>
							<div class="col-md-9">
								<img class="card-img-top" src="<?php echo e(url('storage/app/public/'.$employeedetails['avatar'])); ?>" alt="<?php echo e($employeedetails['avatar']); ?>" style="width: 200px;height: 200px;
">							<?php echo e(Form::hidden('old_avatar', $employeedetails['avatar'], array('class' => 'form-control','placeholder'=>trans('message.state')))); ?>

							 <div class="input-icon">
								 <input type="file" class="form-control" name="profilepic"/>
								 <span class="text-danger"><?php echo e($errors->first('avatar')); ?></span>
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
               <!--END CONTENT-->
  <?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
	<script src="<?php echo asset('public/js/jquery.dataTables.min.js'); ?>" charset="utf-8"></script>
	<script src="<?php echo asset('public/js/dataTables.buttons.min.js'); ?>" charset="utf-8"></script>
	<script src="<?php echo asset('public/js/dataTables.bootstrap.min.js'); ?>" charset="utf-8"></script>
	<script src="<?php echo asset('public/js/jszip.min.js'); ?>" charset="utf-8"></script>
	<script src="<?php echo asset('public/js/buttons.html5.min.js'); ?>" charset="utf-8"></script>
	<script type="text/javascript">

$('#subskill').on('change', function() {
			var subskill =  $(this).find(":selected").val();
			if (window.location.search.indexOf('subskill') > -1)
					window.location.href = window.location.href.split('?')[0] + "?subskill="+ subskill;
			 else
					window.location.href = window.location.href.split('?')[0] + "?subskill="+ subskill;
			});
$(function () {
	$("#startdate").datepicker({ format: "yyyy-mm-dd" }).val();
	$("#enddate").datepicker({ format: "yyyy-mm-dd" }).val();
});
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>