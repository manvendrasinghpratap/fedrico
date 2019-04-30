@extends('admin.layouts.index')
@section('content')
   <div class="page-content">
      <div id="tab-general">
         <div id="sum_box" class="row mbl">
            <div class="col-sm-6 col-md-6">
               <div class="panel profit db mbm">
                  <div class="panel-body">
                     <p class="icon"><i class="icon fa fa-user"></i></p>
                     <h4 class="value"><span data-counter="" data-start="10" data-end="20" data-step="1" data-duration="0"></span><span>{{ $totalEmployee }}</span></h4>
                     <p class="description">totale tecnici</p>
                     <div class="progress progress-sm mbn">
                        <div role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 10%;" class="progress-bar progress-bar-success"><span class="sr-only">80% Complete (success)</span></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection
