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
                           <div class="caption"><?php echo e(trans('message.employees')); ?> </div>
                           <div class="actions">
                              <a href="<?php echo e(url(key($listing))); ?>" class="btn btn-info btn-sm">
                                 <i class="fa fa-plus"></i>&nbsp;
                                <?php echo e(trans('message.addnewemplyee')); ?>

                              </a>&nbsp;
                           </div>
                        </div>
                           <?php echo $__env->make('admin.common.flash_mesage', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <div class="portlet-body pan">
                           <table id="table_id" class="table table-hover table-striped table-bordered table-advanced tablesorter display">
                              <thead>
                              <tr>
                                <th width="9%"><?php echo e(trans('message.id')); ?></th>
                                <th width="9%"><?php echo e(trans('message.avatar')); ?></th>
                                <th width="9%"><?php echo e(trans('message.firstname')); ?></th>
                                <th width="9%"><?php echo e(trans('message.lastname')); ?></th>
                                <th width="9%"><?php echo e(trans('message.email')); ?></th>
                                <th width="9%"><?php echo e(trans('message.contactno')); ?></th>
                                <th width="9%"><?php echo e(trans('message.country')); ?></th>
                                <th width="9%"><?php echo e(trans('message.state')); ?></th>
                                <th width="9%"><?php echo e(trans('message.city')); ?></th>
                                <th width="9%"><?php echo e(trans('message.startdate')); ?></th>
                                <th width="9%"><?php echo e(trans('message.enddate')); ?></th>
                                <th width="9%"><?php echo e(trans('message.courses')); ?></th>
                                <th width="9%"><?php echo e(trans('message.action')); ?></th>
                              </tr>
                              <tbody>
                              <?php $__currentLoopData = $employeedetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <tr id="hide_<?php echo e($row->id); ?>">
                                   <td><?php echo e($row->empid); ?></td>
                                   <td><img class="card-img-top" src="<?php echo e(url('storage/app/public/'.$row->avatar)); ?>" alt="<?php echo e($row->avatar); ?>" style="width: 100px;height: 85px;
"></td>
                                   <td><?php echo e($row->firstname); ?></td>
                                   <td><?php echo e($row->lastname); ?></td>
                                   <td><?php echo e($row->email); ?></td>
                                   <td><?php echo e($row->contactno); ?></td>
                                   <td><?php echo e($row->country); ?></td>
                                   <td><?php echo e($row->state); ?></td>
                                   <td><?php echo e($row->city); ?></td>
                                   <td><?php echo e($row->startdate); ?></td>
                                   <td><?php echo e($row->enddate); ?></td>
                                   <td> <?php  $courses = getCourseName($row->courses)  ?>  <?php echo e($courses); ?></td>
                                    <td>
                                       <a class="btn btn-default btn-xs edit" href="<?php echo e(URL::to('editemployee/'.\App\Helpers\Common::encodeParam($row->id) )); ?>" title="Edit Employee"> <i class="fa fa-edit"></i></a>
                                       <button type="button" class="btn btn-default btn-xs confirmDelete" data-siteurl ="<?php echo e(url('/')); ?>" data-tablename="employees" data-record-id="<?php echo e($row->id); ?>" data-record-title="Are you sure you want to delete this Employee Details ?" data-toggle="modal" data-target="modal-confirm" data-succuss="Employee deleted successfully">
                                          <i class="fa fa-trash-o "></i></button>
                                          <a class="btn btn-default btn-xs rate" target = "_blank" href="<?php echo e(URL::to('rateemployee/'.\App\Helpers\Common::encodeParam($row->id) )); ?>" title="Rate Employee"> <i class="fa fa-star checked"></i></a>
                                    </td>
                                 </tr>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </tbody>
                              </thead>
                           </table>
                        </div>
                        </div>
                        <div style="float:right;">
                           <?php echo e($employeedetails->links()); ?>

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
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>