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
                           <div class="caption"><?php echo e(trans('message.subskills')); ?></div>
                           <div class="actions">
                              <a href="<?php echo e(url(key($listing))); ?>" class="btn btn-info btn-sm">
                                 <i class="fa fa-plus"></i>&nbsp;
                                <?php echo e(trans('message.addnewsubskill')); ?>

                              </a>&nbsp;
                           </div>
                        </div>
                           <?php echo $__env->make('admin.common.flash_mesage', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <div class="portlet-body pan">
                           <table id="table_id" class="table table-hover table-striped table-bordered table-advanced tablesorter display">
                              <thead>
                              <tr>
                                <th width="9%"><?php echo e(trans('message.mainskillname')); ?></th>
                                 <th width="9%"><?php echo e(trans('message.subskillname')); ?></th>
                                 <th width="9%"><?php echo e(trans('message.action')); ?></th>
                              </tr>
                              <tbody>
                              <?php $__currentLoopData = $skillDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <tr id="hide_<?php echo e($row->id); ?>">
                                   <td><?php echo e($row->skillname->skillname); ?></td>
                                    <td><?php echo e($row->skill_name); ?></td>
                                    <td>
                                       <a class="btn btn-default btn-xs edit" href="<?php echo e(URL::to('editSubskill/'.\App\Helpers\Common::encodeParam($row->id) )); ?>" title="Edit Sub Skill"> <i class="fa fa-edit"></i></a>
                                       <button type="button" class="btn btn-default btn-xs confirmDelete" data-siteurl ="<?php echo e(url('/')); ?>" data-tablename="subskills" data-record-id="<?php echo e($row->id); ?>" data-record-title="Are you sure you want to delete this Sub Skill ?" data-toggle="modal" data-target="modal-confirm" data-succuss="Sub Skill deleted successfully">
                                          <i class="fa fa-trash-o "></i></button>
                                    </td>
                                 </tr>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </tbody>
                              </thead>
                           </table>
                        </div>
                        </div>
                        <div style="float:right;">
                           <?php echo e($skillDetails->links()); ?>

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