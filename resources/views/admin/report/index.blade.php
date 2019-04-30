@extends('admin.layouts.index')
@section('content')
  <link type="text/css" rel="stylesheet" href="{!! asset('public/vendors/DataTables/media/css/jquery.dataTables.css')!!}" />
  <link type="text/css" rel="stylesheet" href="{!! asset('public/vendors/DataTables/extensions/TableTools/css/dataTables.tableTools.min.css')!!}" />
  <link type="text/css" rel="stylesheet" href="{!! asset('public/vendors/DataTables/media/css/dataTables.bootstrap.css')!!}" />

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
                           <div class="caption">   {{ trans('message.Detail Report')}}  </div>
                           <div class="actions">
                             <select id="subskill" class="form-control" name="subskill" style="width: 250px;" >
                               <option value="" >--{{ trans('message.select')}}--</option>
                                   @foreach($getAllSubskills as $key=>$value)
                                       <option @if(isset($subskill) && (!empty($subskill))) @if($subskill==$key) selected=true  @endif @endif value="{{$key}}" >{{$value}}</option>
                                   @endforeach
                               </select>
                           </div>
                        </div>
                           @include('admin.common.flash_mesage')
                        <div class="portlet-body pan" style="overflow-x:auto;">

                           <table id="example" class="display table table-hover table-striped table-bordered table-advanced tablesorter display" cellspacing="0" width="100%">
                              <thead>
                              <tr>
                                <th width="9%">{{ trans('message.id')}}</th>
                                <th width="9%" class='notexport'>{{ trans('message.avatar')}}</th>
                                <th width="5%">{{ trans('message.firstname')}}</th>
                                <th width="5%">{{ trans('message.lastname')}}</th>
                                @foreach($groupArray as $key=>$value)
                                <th >{{ $value['averagegroupName']}} </th>
                                @endforeach
                                @foreach($mainSkillArray as $key=>$value)
                                <th width="5%">{{ $value}} </th>
                                @endforeach
                                @if(isset($subskill) && (!empty($subskill)))
                                <th>{{ $skill_name['skill_name']}}</th>
                                @endif
                                <th>{{ trans('message.email')}}</th>
                                <th width="5%">{{ trans('message.contactno')}}</th>
                                <th width="5%">{{ trans('message.country')}}</th>
                                <th width="5%">{{ trans('message.state')}}</th>
                                <th>{{ trans('message.city')}}</th>
                                <th>{{ trans('message.startdate')}}</th>
                                <th>{{ trans('message.enddate')}}</th>
                                <th>{{ trans('message.courses')}}</th>
                              </tr>
                            </thead>
                              <tbody>
                              @foreach($employeedetails as $row)
                                 <tr id="hide_{{ $row->id }}">
                                   <td>{{ $row->empid }}</td>
                                   <td><img class="card-img-top" src="{{url('storage/app/public/'.$row->avatar)}}" alt="{{$row->avatar}}" style="width: 100px;height: 85px;
"></td>
                                   <td>{{ $row->firstname }}</td>
                                   <td>{{ $row->lastname }}</td>

                                   @php $avg = 0; $counter = 1;@endphp
                                   @foreach($groupArray as $key=>$value)
                                   <td >@php $kk = getAverageRating($row->id,$value['skillsIds']) @endphp {{ $kk}} </td>
                                   @endforeach
                                   @php $avg = 0; $counter = 1;@endphp
                                   @foreach($mainSkillArray as $key=>$value)
                                     @php $rating = getTotalRating($row->id,$key) @endphp
                                   <td>{{ $rating}}</td>
                                   @endforeach
                                   @if(isset($subskill) && (!empty($subskill)))
                                   <th width="5%">@php $rating = getSubSkillRating($row->id,$subskill) @endphp {{ $rating}}</th>
                                   @endif
                                   <td>{{ $row->email }}</td>
                                   <td>{{ $row->contactno }}</td>
                                   <td>{{ $row->country }}</td>
                                   <td>{{ $row->state }}</td>
                                   <td>{{ $row->city }}</td>
                                   <td>{{ $row->startdate }}</td>
                                   <td>{{ $row->enddate }}</td>
                                   <td> @php $courses = getCourseName($row->courses) @endphp  {{ $courses }}</td>
                                 </tr>
                              @endforeach
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
  @endsection
<!--LOADING SCRIPTS FOR PAGE-->
    @push('scripts')
      <!--<script src="https://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js" charset="utf-8"></script>
      <script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js" charset="utf-8"></script>
      <script src="https://cdn.datatables.net/1.10.9/js/dataTables.bootstrap.min.js" charset="utf-8"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js" charset="utf-8"></script>
      <script src="https://cdn.datatables.net/buttons/1.2.1/js/buttons.html5.min.js" charset="utf-8"></script>-->
      <script src="{!! asset('public/js/jquery.dataTables.min.js')!!}" charset="utf-8"></script>
      <script src="{!! asset('public/js/dataTables.buttons.min.js')!!}" charset="utf-8"></script>
      <script src="{!! asset('public/js/dataTables.bootstrap.min.js')!!}" charset="utf-8"></script>
      <script src="{!! asset('public/js/jszip.min.js')!!}" charset="utf-8"></script>
      <script src="{!! asset('public/js/buttons.html5.min.js')!!}" charset="utf-8"></script>
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
    @endpush
