@extends('admin.layouts.index')
@section('content')
   <link type="text/css" rel="stylesheet" href="{!! asset('public/vendors/DataTables/media/css/jquery.dataTables.css')!!}" />
   <link type="text/css" rel="stylesheet" href="{!! asset('public/vendors/DataTables/extensions/TableTools/css/dataTables.tableTools.min.css')!!}" />
   <link type="text/css" rel="stylesheet" href="{!! asset('public/vendors/DataTables/media/css/dataTables.bootstrap.css')!!}" />
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
                           <div class="caption">{{ trans('message.employees')}} </div>
                           <div class="actions">
                              <a href="{{ url(key($listing)) }}" class="btn btn-info btn-sm">
                                 <i class="fa fa-plus"></i>&nbsp;
                                {{ trans('message.addnewemplyee')}}
                              </a>&nbsp;
                           </div>
                        </div>
                           @include('admin.common.flash_mesage')
                        <div class="portlet-body pan">
                           <table id="table_id" class="table table-hover table-striped table-bordered table-advanced tablesorter display">
                              <thead>
                              <tr>
                                <th width="9%">{{ trans('message.id')}}</th>
                                <th width="9%">{{ trans('message.avatar')}}</th>
                                <th width="9%">{{ trans('message.firstname')}}</th>
                                <th width="9%">{{ trans('message.lastname')}}</th>
                                <th width="9%">{{ trans('message.email')}}</th>
                                <th width="9%">{{ trans('message.contactno')}}</th>
                                <th width="9%">{{ trans('message.country')}}</th>
                                <th width="9%">{{ trans('message.state')}}</th>
                                <th width="9%">{{ trans('message.city')}}</th>
                                <th width="9%">{{ trans('message.startdate')}}</th>
                                <th width="9%">{{ trans('message.enddate')}}</th>
                                <th width="9%">{{ trans('message.courses')}}</th>
                                <th width="9%">{{ trans('message.action')}}</th>
                              </tr>
                              <tbody>
                              @foreach($employeedetails as $row)
                                 <tr id="hide_{{ $row->id }}">
                                   <td>{{ $row->empid }}</td>
                                   <td><img class="card-img-top" src="{{url('storage/app/public/'.$row->avatar)}}" alt="{{$row->avatar}}" style="width: 100px;height: 85px;
"></td>
                                   <td>{{ $row->firstname }}</td>
                                   <td>{{ $row->lastname }}</td>
                                   <td>{{ $row->email }}</td>
                                   <td>{{ $row->contactno }}</td>
                                   <td>{{ $row->country }}</td>
                                   <td>{{ $row->state }}</td>
                                   <td>{{ $row->city }}</td>
                                   <td>{{ $row->startdate }}</td>
                                   <td>{{ $row->enddate }}</td>
                                   <td> @php $courses = getCourseName($row->courses) @endphp  {{ $courses }}</td>
                                    <td>
                                       <a class="btn btn-default btn-xs edit" href="{{ URL::to('editemployee/'.\App\Helpers\Common::encodeParam($row->id) ) }}" title="Edit Employee"> <i class="fa fa-edit"></i></a>
                                       <button type="button" class="btn btn-default btn-xs confirmDelete" data-siteurl ="{{ url('/')}}" data-tablename="employees" data-record-id="{{ $row->id }}" data-record-title="Are you sure you want to delete this Employee Details ?" data-toggle="modal" data-target="modal-confirm" data-succuss="Employee deleted successfully">
                                          <i class="fa fa-trash-o "></i></button>
                                          <a class="btn btn-default btn-xs rate" target = "_blank" href="{{ URL::to('rateemployee/'.\App\Helpers\Common::encodeParam($row->id) ) }}" title="Rate Employee"> <i class="fa fa-star checked"></i></a>
                                    </td>
                                 </tr>
                              @endforeach
                              </tbody>
                              </thead>
                           </table>
                        </div>
                        </div>
                        <div style="float:right;">
                           {{ $employeedetails->links() }}
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
   <script src="{!! asset('public/js/jquery.dataTables.min.js') !!}"></script>
@endpush
