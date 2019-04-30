<?php $__env->startSection('content'); ?>
   <link type="text/css" rel="stylesheet" href="<?php echo asset('public/vendors/DataTables/media/css/jquery.dataTables.css'); ?>" />
   <link type="text/css" rel="stylesheet" href="<?php echo asset('public/vendors/DataTables/extensions/TableTools/css/dataTables.tableTools.min.css'); ?>" />
   <link type="text/css" rel="stylesheet" href="<?php echo asset('public/vendors/DataTables/media/css/dataTables.bootstrap.css'); ?>" />
<!--END TITLE & BREADCRUMB PAGE--><!--BEGIN CONTENT-->
   <div class="page-content">
      <div class="row">
         <div class="col-lg-12">
            <div class="portlet box">
               <div class="portlet-body">
                  <div class="row mbm">
                     <div class="col-lg-12">
                        <div class="portlet portlet-white">
                        <div class="portlet-header pam mbn">
                           <div class="caption"> <?php echo e(trans('message.employees')); ?></div>
                           <div class="actions">
                              <a href="<?php echo e(url(key($listing))); ?>" class="btn btn-info btn-sm">
                                 <i class="fa fa-plus"></i>&nbsp;
                                 <?php echo e(trans('message.addnewemplyee')); ?>

                              </a>&nbsp;
                           </div>
                        </div>
                           <?php echo $__env->make('admin.common.flash_mesage', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                           <div class="panel panel-blue">
                              <div class="panel-heading"> <?php echo e(trans('message.EmployeeDetails')); ?> : <?php echo e($employeedetails['firstname']); ?>  <?php echo e($employeedetails['lastname']); ?></div>
                            </div>
                          <div style="margin-bottom: 70px;">
                              <div class="col-xs-4" style="margin-bottom: 10px;">
                                  <div class="row">
                                      <div class="col-xs-4" style="font-weight: bold;"><?php echo e(trans('message.firstname')); ?> : </div>
                                      <div class="col-xs-8" style="font-style: italic;"><?php echo e($employeedetails['firstname']); ?></div>
                                  </div>
                              </div>
                              <div class="col-xs-4" style="margin-bottom: 10px;">
                                  <div class="row">
                                      <div class="col-xs-4" style="font-weight: bold;"><?php echo e(trans('message.lastname')); ?> : </div>
                                      <div class="col-xs-8" style="font-style: italic;"><?php echo e($employeedetails['lastname']); ?></div>
                                  </div>
                              </div>
                              <div class="col-xs-4" style="margin-bottom: 10px;">
                                  <div class="row">
                                      <div class="col-xs-4" style="font-weight: bold;"><?php echo e(trans('message.email')); ?> : </div>
                                      <div class="col-xs-8" style="font-style: italic;"><?php echo e($employeedetails['email']); ?></div>
                                  </div>
                              </div>
                              <div class="col-xs-4" style="margin-bottom: 10px;">
                                  <div class="row">
                                      <div class="col-xs-4" style="font-weight: bold;"><?php echo e(trans('message.contactno')); ?> : </div>
                                      <div class="col-xs-8" style="font-style: italic;"><?php echo e($employeedetails['contactno']); ?></div>
                                  </div>
                              </div>
                              <div class="col-xs-4" style="margin-bottom: 10px;">
                                  <div class="row">
                                      <div class="col-xs-4" style="font-weight: bold;"><?php echo e(trans('message.country')); ?> : </div>
                                      <div class="col-xs-8" style="font-style: italic;"><?php echo e($employeedetails['country']); ?></div>
                                  </div>
                              </div>
                              <div class="col-xs-4" style="margin-bottom: 10px;">
                                  <div class="row">
                                      <div class="col-xs-4" style="font-weight: bold;"><?php echo e(trans('message.state')); ?> : </div>
                                      <div class="col-xs-8" style="font-style: italic;"><?php echo e($employeedetails['state']); ?></div>
                                  </div>
                              </div>
                              <div class="col-xs-4" style="margin-bottom: 10px;">
                                  <div class="row">
                                      <div class="col-xs-4" style="font-weight: bold;"><?php echo e(trans('message.city')); ?> : </div>
                                      <div class="col-xs-8" style="font-style: italic;"><?php echo e($employeedetails['city']); ?></div>
                                  </div>
                              </div>
                              <div class="col-xs-4" style="margin-bottom: 10px;">
                                  <div class="row">
                                      <div class="col-xs-4" style="font-weight: bold;"><?php echo e(trans('message.startdate')); ?> : </div>
                                      <div class="col-xs-8" style="font-style: italic;"><?php echo e($employeedetails['startdate']); ?></div>
                                  </div>
                              </div>
                              <div class="col-xs-4" style="margin-bottom: 10px;">
                                  <div class="row">
                                      <div class="col-xs-4" style="font-weight: bold;"><?php echo e(trans('message.enddate')); ?> : </div>
                                      <div class="col-xs-8" style="font-style: italic;"><?php echo e($employeedetails['enddate']); ?></div>
                                  </div>
                              </div>
                          </div>

                    <div class="portlet-body pan">
                      <img  class="card-img-top" src="<?php echo e(url('storage/app/public/'.$employeedetails['avatar'])); ?>" alt="<?php echo e($employeedetails['avatar']); ?>" style=" display: none; width: 100px;height: 85px;
">
                      <div class="form-group row">
                        <form method="POST" action="<?php echo e(route('ratingstoreemployee')); ?>" aria-label="<?php echo e(__('Store Rating')); ?>">
                            <?php echo e(csrf_field()); ?>

                            <input type="hidden" name="employee_id" value="<?php echo e($employeedetails->id); ?>"/>
                          <?php if(count($skills)>0): ?>
                            <?php $__currentLoopData = $skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <div style="padding-right: 12px;PADDING-LEFT: 15px;">
                                <div style="background-color: lightgray;height: 40px;padding-top: 11px; padding-left: 20px;"><?php echo e($row->skillname); ?> </div>
                                <div style="padding-left: 34px;padding-top: 10px;background-color: lightgoldenrodyellow; padding-bottom: 10px;">
                                  <?php if(count(@$row->subskills)): ?>
                                    <?php $__currentLoopData = $row->subskills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subskills): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                      <div style="display: block; margin-bottom: 20px;"><?php echo e($subskills->skill_name); ?>

                                          <span>

                                            <?php  $rating = getRating($employeedetails->id,$row->id,$subskills->id)  ?>
                                              <div class="my-rating jq-stars" data-id="<?php echo e($subskills->id); ?>" data-rating="<?php echo e($rating); ?>" ></div>
                                              <input type= "hidden" name="skill[<?php echo e($row->id); ?>][<?php echo e($subskills->id); ?>]" value="<?php echo e($rating); ?>" id="value<?php echo e($subskills->id); ?>"/>
                                        </span>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  <?php endif; ?>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          <?php endif; ?>
                          <div class="col-lg-12 col-sm-12 col-xs-12">
                              <br>
                              <span class="pull-right">
                                  <button class="btn btn-success" type="submit"><?php echo e(trans('message.update')); ?></button>
                              </span>
                          </div>
                        </form>
                            <div>

                            </div>
                        </div>
                        </div>
                        <div style="float:right;">
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!--END CONTENT-->
  <?php $__env->stopSection(); ?>
<!--LOADING SCRIPTS FOR PAGE-->
<?php $__env->startPush('scripts'); ?>
   <script src="<?php echo asset('public/js/jquery.dataTables.min.js'); ?>"></script>
   <script>
   $(function() {
     $(".my-rating").starRating({
         disableAfterRate: false,
         onHover: function(currentIndex, currentRating, $el){
           $('.live-rating').text(currentIndex);
         },
         onLeave: function(currentIndex, currentRating, $el){
         },
         callback: function(currentRating, $el){
           //window.alert($el);
           var id = '#value'+ $($el).attr('data-id');
           $(id).val(currentRating);
         }
       });
   });
   </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>