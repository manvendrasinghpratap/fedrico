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
                           <div class="caption"> {{ trans('message.employees')}}</div>
                           <div class="actions">
                              <a href="{{ url(key($listing)) }}" class="btn btn-info btn-sm">
                                 <i class="fa fa-plus"></i>&nbsp;
                                 {{ trans('message.addnewemplyee')}}
                              </a>&nbsp;
                           </div>
                        </div>
                           @include('admin.common.flash_mesage')
                           <div class="panel panel-blue">
                              <div class="panel-heading"> {{ trans('message.EmployeeDetails')}} : {{$employeedetails['firstname']}}  {{$employeedetails['lastname']}}</div>
                            </div>
                          <div style="margin-bottom: 70px;">
                              <div class="col-xs-4" style="margin-bottom: 10px;">
                                  <div class="row">
                                      <div class="col-xs-4" style="font-weight: bold;">{{ trans('message.firstname')}} : </div>
                                      <div class="col-xs-8" style="font-style: italic;">{{$employeedetails['firstname']}}</div>
                                  </div>
                              </div>
                              <div class="col-xs-4" style="margin-bottom: 10px;">
                                  <div class="row">
                                      <div class="col-xs-4" style="font-weight: bold;">{{ trans('message.lastname')}} : </div>
                                      <div class="col-xs-8" style="font-style: italic;">{{$employeedetails['lastname']}}</div>
                                  </div>
                              </div>
                              <div class="col-xs-4" style="margin-bottom: 10px;">
                                  <div class="row">
                                      <div class="col-xs-4" style="font-weight: bold;">{{ trans('message.email')}} : </div>
                                      <div class="col-xs-8" style="font-style: italic;">{{$employeedetails['email']}}</div>
                                  </div>
                              </div>
                              <div class="col-xs-4" style="margin-bottom: 10px;">
                                  <div class="row">
                                      <div class="col-xs-4" style="font-weight: bold;">{{ trans('message.contactno')}} : </div>
                                      <div class="col-xs-8" style="font-style: italic;">{{$employeedetails['contactno']}}</div>
                                  </div>
                              </div>
                              <div class="col-xs-4" style="margin-bottom: 10px;">
                                  <div class="row">
                                      <div class="col-xs-4" style="font-weight: bold;">{{ trans('message.country')}} : </div>
                                      <div class="col-xs-8" style="font-style: italic;">{{$employeedetails['country']}}</div>
                                  </div>
                              </div>
                              <div class="col-xs-4" style="margin-bottom: 10px;">
                                  <div class="row">
                                      <div class="col-xs-4" style="font-weight: bold;">{{ trans('message.state')}} : </div>
                                      <div class="col-xs-8" style="font-style: italic;">{{$employeedetails['state']}}</div>
                                  </div>
                              </div>
                              <div class="col-xs-4" style="margin-bottom: 10px;">
                                  <div class="row">
                                      <div class="col-xs-4" style="font-weight: bold;">{{ trans('message.city')}} : </div>
                                      <div class="col-xs-8" style="font-style: italic;">{{$employeedetails['city']}}</div>
                                  </div>
                              </div>
                              <div class="col-xs-4" style="margin-bottom: 10px;">
                                  <div class="row">
                                      <div class="col-xs-4" style="font-weight: bold;">{{ trans('message.startdate')}} : </div>
                                      <div class="col-xs-8" style="font-style: italic;">{{$employeedetails['startdate']}}</div>
                                  </div>
                              </div>
                              <div class="col-xs-4" style="margin-bottom: 10px;">
                                  <div class="row">
                                      <div class="col-xs-4" style="font-weight: bold;">{{ trans('message.enddate')}} : </div>
                                      <div class="col-xs-8" style="font-style: italic;">{{$employeedetails['enddate']}}</div>
                                  </div>
                              </div>
                          </div>

                    <div class="portlet-body pan">
                      <img  class="card-img-top" src="{{url('storage/app/public/'.$employeedetails['avatar'])}}" alt="{{$employeedetails['avatar']}}" style=" display: none; width: 100px;height: 85px;
">
                      <div class="form-group row">
                        <form method="POST" action="{{ route('ratingstoreemployee') }}" aria-label="{{ __('Store Rating') }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="employee_id" value="{{ $employeedetails->id}}"/>
                          @if(count($skills)>0)
                            @foreach($skills as $row)
                              <div style="padding-right: 12px;PADDING-LEFT: 15px;">
                                <div style="background-color: lightgray;height: 40px;padding-top: 11px; padding-left: 20px;">{{$row->skillname }} </div>
                                <div style="padding-left: 34px;padding-top: 10px;background-color: lightgoldenrodyellow; padding-bottom: 10px;">
                                  @if(count(@$row->subskills))
                                    @foreach($row->subskills as $subskills)
                                      <div style="display: block; margin-bottom: 20px;">{{$subskills->skill_name}}
                                          <span>

                                            @php $rating = getRating($employeedetails->id,$row->id,$subskills->id) @endphp
                                              <div class="my-rating jq-stars" data-id="{{$subskills->id}}" data-rating="{{$rating}}" ></div>
                                              <input type= "hidden" name="skill[{{$row->id}}][{{$subskills->id}}]" value="{{$rating}}" id="value{{$subskills->id}}"/>
                                        </span>
                                    </div>
                                    @endforeach
                                  @endif
                                </div>
                            </div>
                            @endforeach
                          @endif
                          <div class="col-lg-12 col-sm-12 col-xs-12">
                              <br>
                              <span class="pull-right">
                                  <button class="btn btn-success" type="submit">{{trans('message.update')}}</button>
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
  @endsection
<!--LOADING SCRIPTS FOR PAGE-->
@push('scripts')
   <script src="{!! asset('public/js/jquery.dataTables.min.js') !!}"></script>
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
@endpush
