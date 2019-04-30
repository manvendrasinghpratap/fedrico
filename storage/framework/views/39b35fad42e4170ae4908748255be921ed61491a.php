<?php $__env->startSection('content'); ?>
  <link type="text/css" rel="stylesheet" href="<?php echo asset('public/vendors/DataTables/media/css/jquery.dataTables.css'); ?>" />
  <link type="text/css" rel="stylesheet" href="<?php echo asset('public/vendors/DataTables/extensions/TableTools/css/dataTables.tableTools.min.css'); ?>" />
  <link type="text/css" rel="stylesheet" href="<?php echo asset('public/vendors/DataTables/media/css/dataTables.bootstrap.css'); ?>" />

  <style>
    .exportExcel {
      padding: 5px;
      border: 1px solid grey;
      margin: 5px;
      cursor: pointer;
    }
    .dt-buttons{
      padding-top: 10px;
    }
  </style>
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
                           <div class="caption">   <?php echo e(trans('message.Detail Report')); ?>  </div>
                           <div class="actions">
                             <select id="subskill" class="form-control" name="subskill" style="width: 250px;" >
                               <option value="" >--<?php echo e(trans('message.select')); ?>--</option>
                                   <?php $__currentLoopData = $getAllSubskills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                       <option <?php if(isset($subskill) && (!empty($subskill))): ?> <?php if($subskill==$key): ?> selected=true  <?php endif; ?> <?php endif; ?> value="<?php echo e($key); ?>" ><?php echo e($value); ?></option>
                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                               </select>
                           </div>
                        </div>
                           <?php echo $__env->make('admin.common.flash_mesage', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <div class="portlet-body pan" style="overflow-x:auto;">

                           <table id="example" class="display table table-hover table-striped table-bordered table-advanced tablesorter display" cellspacing="0" width="100%">
                              <thead>
                              <tr>
                                <th width="9%"><?php echo e(trans('message.id')); ?></th>
                                <th width="9%" class='notexport'><?php echo e(trans('message.avatar')); ?></th>
                                <th width="5%"><?php echo e(trans('message.firstname')); ?></th>
                                <th width="5%"><?php echo e(trans('message.lastname')); ?></th>
                                <?php $__currentLoopData = $groupArray; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <th ><?php echo e($value['averagegroupName']); ?> </th>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php $__currentLoopData = $mainSkillArray; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <th width="5%"><?php echo e($value); ?> </th>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php if(isset($subskill) && (!empty($subskill))): ?>
                                <th><?php echo e($skill_name['skill_name']); ?></th>
                                <?php endif; ?>
                                <th><?php echo e(trans('message.email')); ?></th>
                                <th width="5%"><?php echo e(trans('message.contactno')); ?></th>
                                <th width="5%"><?php echo e(trans('message.country')); ?></th>
                                <th width="5%"><?php echo e(trans('message.state')); ?></th>
                                <th><?php echo e(trans('message.city')); ?></th>
                                <th><?php echo e(trans('message.startdate')); ?></th>
                                <th><?php echo e(trans('message.enddate')); ?></th>
                                <th><?php echo e(trans('message.courses')); ?></th>
                              </tr>
                            </thead>
                              <tbody>
                              <?php $__currentLoopData = $employeedetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <tr id="hide_<?php echo e($row->id); ?>">
                                   <td><?php echo e($row->empid); ?></td>
                                   <td><img class="card-img-top" src="<?php echo e(url('storage/app/public/'.$row->avatar)); ?>" alt="<?php echo e($row->avatar); ?>" style="width: 100px;height: 85px;
"></td>
                                   <td><?php echo e($row->firstname); ?></td>
                                   <td><?php echo e($row->lastname); ?></td>

                                   <?php  $avg = 0; $counter = 1; ?>
                                   <?php $__currentLoopData = $groupArray; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                   <td ><?php  $kk = getAverageRating($row->id,$value['skillsIds'])  ?> <?php echo e($kk); ?> </td>
                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                   <?php  $avg = 0; $counter = 1; ?>
                                   <?php $__currentLoopData = $mainSkillArray; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                     <?php  $rating = getTotalRating($row->id,$key)  ?>
                                   <td><?php echo e($rating); ?></td>
                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                   <?php if(isset($subskill) && (!empty($subskill))): ?>
                                   <th width="5%"><?php  $rating = getSubSkillRating($row->id,$subskill)  ?> <?php echo e($rating); ?></th>
                                   <?php endif; ?>
                                   <td><?php echo e($row->email); ?></td>
                                   <td><?php echo e($row->contactno); ?></td>
                                   <td><?php echo e($row->country); ?></td>
                                   <td><?php echo e($row->state); ?></td>
                                   <td><?php echo e($row->city); ?></td>
                                   <td><?php echo e($row->startdate); ?></td>
                                   <td><?php echo e($row->enddate); ?></td>
                                   <td> <?php  $courses = getCourseName($row->courses)  ?>  <?php echo e($courses); ?></td>
                                 </tr>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </tbody>
                           </table>
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
      <!--<script src="https://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js" charset="utf-8"></script>
      <script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js" charset="utf-8"></script>
      <script src="https://cdn.datatables.net/1.10.9/js/dataTables.bootstrap.min.js" charset="utf-8"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js" charset="utf-8"></script>
      <script src="https://cdn.datatables.net/buttons/1.2.1/js/buttons.html5.min.js" charset="utf-8"></script>-->
      <script src="<?php echo asset('public/js/jquery.dataTables.min.js'); ?>" charset="utf-8"></script>
      <script src="<?php echo asset('public/js/dataTables.buttons.min.js'); ?>" charset="utf-8"></script>
      <script src="<?php echo asset('public/js/dataTables.bootstrap.min.js'); ?>" charset="utf-8"></script>
      <script src="<?php echo asset('public/js/jszip.min.js'); ?>" charset="utf-8"></script>
      <script src="<?php echo asset('public/js/buttons.html5.min.js'); ?>" charset="utf-8"></script>
      <script type="text/javascript">
        $(document).ready(function() {
      var table = $('#example').DataTable({
        dom: 'Bfrtip',
        "info":             "Showings _START_ to _END_ of _TOTAL_ entriesd",
        "oLanguage": {
        "sSearch": "Ricerca:",
        "sInfo": "Ci sono un totale di _TOTAL_ risultati (_START_ di _END_)",
        "sInfoFiltered": " - Nessun risultato trovato",
        "sInfoEmpty": "Nessun risultato trovato",
        "sEmptyTable": "No data available in table",
        "sZeroRecords": "Nessun risultato trovato",
        "oPaginate": {
        "sFirst": "Prima Pagina", // This is the link to the first page
        "sPrevious": "Precedente", // This is the link to the previous page
        "sNext": "Successiva", // This is the link to the next page
        "sLast": "Ultima Pagina" // This is the link to the last page
        },
    },
        buttons: [
        {

          extend: 'excel',
          text: 'Esportazione excel',
          className: 'exportExcel',
          filename: 'Export excel',
          exportOptions: {
            stripHtml: false,
          columns: ':not(.notexport)',
            modifier: {
              page: 'all'
            }
          }
        },
]
      });

    });
    $('#subskill').on('change', function() {
          var subskill =  $(this).find(":selected").val();
          if (window.location.search.indexOf('subskill') > -1)
              window.location.href = window.location.href.split('?')[0] + "?subskill="+ subskill;
           else
              window.location.href = window.location.href.split('?')[0] + "?subskill="+ subskill;
          });
      </script>
    <?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>