@extends('layouts.broker.app')
@section('content')
<style>
<<<<<<< HEAD
    .table>:not(caption)>*>* {
        background-color: unset !important;
    }
=======
>>>>>>> old-repo/master
.chart {
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    border-radius: 10px;
    background: #f1f3f4;
    padding: 14px 14px;
    height: 340px;
}
</style>

<section class="content">
    <div class="body_scroll">
        <div class="block-header">
<<<<<<< HEAD
           <h2>Broker Dashboard</h2>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
            <ul class="nav nav-tabs mb-2" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="dashboard-tab" data-bs-toggle="tab" href="#dashboard" role="tab"
                        aria-controls="dashboard" aria-selected="true"
                        style="font-size: 15px;color: #000;font-weight:500">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="all-tab" data-bs-toggle="tab" href="#all" role="tab"
                        aria-controls="all" aria-selected="false"
                        style="font-size: 15px;color: #000;font-weight:500">All</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="open-tab" data-bs-toggle="tab" href="#open" role="tab"
                        aria-controls="open" aria-selected="false"
                        style="font-size: 15px;color: #000;font-weight:500">Open</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="delivered-tab" data-bs-toggle="tab" href="#delivered" role="tab"
                        aria-controls="delivered" aria-selected="false"
                        style="font-size: 15px;color: #000;font-weight:500">Delivered</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="completed-tab" data-bs-toggle="tab" href="#completed" role="tab"
                        aria-controls="completed" aria-selected="false"
                        style="font-size: 15px;color: #000;font-weight:500">Completed</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="invoice-tab" data-bs-toggle="tab" href="#invoice" role="tab"
                        aria-controls="invoice" aria-selected="false"
                        style="font-size: 15px;color: #000;font-weight:500">Invoiced</a>
                </li>
            </ul>

                <div class="tab-content col-12" id="myTabContent">
                    <div class="tab-pane fade show active" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                        
=======
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Broker Dashboard</h2>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <ul class="nav nav-tabs mb-2" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a Class="nav-link active" id="dashboard-tab" data-bs-toggle="tab" href="#dashboard" role="tab"
                            aria-controls="carriers" aria-selected="true"
                            style="font-size: 15px;color: #000;font-weight:500">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="all-tab" data-bs-toggle="tab" href="#all" role="tab"
                            aria-controls="carriers" aria-selected="true"
                            style="font-size: 15px;color: #000;font-weight:500">All</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="open-tab" data-bs-toggle="tab" href="#open" role="tab"
                            aria-controls="carriers" aria-selected="true"
                            style="font-size: 15px;color: #000;font-weight:500">Open</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="delivered-tab" data-bs-toggle="tab" href="#delivered" role="tab"
                            aria-controls="carriers" aria-selected="true"
                            style="font-size: 15px;color: #000;font-weight:500">Delivered</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="completed-tab" data-bs-toggle="tab" href="#completed" role="tab"
                            aria-controls="customers" aria-selected="false"
                            style="font-size: 15px;color: #000;font-weight:500">Completed</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="invoice-tab" data-bs-toggle="tab" href="#invoice" role="tab"
                            aria-controls="customers" aria-selected="false"
                            style="font-size: 15px;color: #000;font-weight:500">Invoice</a>
                    </li>
                </ul>

                <div class="tab-content col-12" id="myTabContent">
                    <div class="tab-pane fade show active" id="dashboard" ole="tabpanel"
                        aria-labelledby="customers-tab">
>>>>>>> old-repo/master
                        <div class="row dynamic-data">
                            <div class="col-lg-4 col-md-4">
                                <div class="card">
                                    @php
                                    $userLoads = \App\Models\Load::where('user_id', auth()->id())
                                    ->count();
                                    @endphp

                                    <div class="body xl-purple">
                                        <p class="mb-0 ">Total Load</p>
                                        <h4 class="mt-0 mb-0">{{ $userLoads }}</h4>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="card">
                                    @php
                                    $userLoadStatusCount = \App\Models\Load::where('user_id', auth()->id())
                                    ->where('load_status', 'Open')
                                    ->count();
                                    @endphp
                                    <div class="body xl-blue">

                                        <p class="mb-0">Open Loads</p>
                                        <h4 class="mt-0 mb-0">{{ $userLoadStatusCount }}</h4>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="card">
                                    @php
                                    $completedLoad = \App\Models\Load::where('user_id', auth()->id())
                                    ->where('load_status', 'Completed')
                                    ->count();
                                    @endphp

                                    <div class="body xl-green">
                                        <p class="mb-0 ">Completed Loads</p>
                                        <h4 class="mt-0 mb-0">{{ $completedLoad }}</h4>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix dynamic-data">
                            <div class="col-lg-12 col-md-12">
                                <div class="card">
                                    <div class="header" style="background: #c7c7c6;">
                                        <h2 style="color: #000;"><b>Broker Chart</b></h2>
                                    </div>
                                    <div class="body">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="chart">
                                                        <canvas id="totalLoadsChart"></canvas>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="chart">
                                                        <canvas id="openLoadsChart"></canvas>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                     <div class="chart">
                                                         <canvas id="completedLoadsChart"></canvas>
                                                     </div>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
<<<<<<< HEAD
                    <div class="tab-pane fade" id="all" role="tabpanel" aria-labelledby="all-tab">
                        <div class="table-responsive">
                            <table id="dataTable" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sr No</th>
                                        <th>Load #</th>
                                        <th>W/O #</th>
                                        <th>Customer #</th>
                                        <th>Load Create Date</th>
                                        <th>Shipper Date</th>
                                        <th>Del Date</th>
                                        <th>Carrier</th>
                                        <th>Pickup Location</th>
                                        <th>Unloading Location</th>

                                        <!-- <th>Status & RC</th> -->
                                        <!-- <th>PDF View</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $i=1;
                                    @endphp
                                    @foreach($load as $loads)
                                    <tr>
                                        <td class="dynamic-data">{{ $i++ }}</td>
                                        <td class="dynamic-data">{{ $loads->load_number }}</td>
                                        <td class="dynamic-data">{{ $loads->load_workorder }}</td>
                                        <td class="dynamic-data">{{ $loads->load_bill_to }}</td>
                                        <td class="dynamic-data">{{ $loads->created_at->format('Y-m-d') }}</td>
                                        @php
                                    $shipper_appointment =
                                    json_decode($loads->load_shipper_appointment,true);
                                    @endphp
                                    <td class="dynamic-data">{{ isset($shipper_appointment[0]['appointment']) ? \Carbon\Carbon::parse($shipper_appointment[0]['appointment'])->format('m-d-Y') : '' }}</td>
                                    @php
                                    $consignee_appointment =
                                    json_decode($loads->load_consignee_appointment,true);
                                    @endphp
                                    <td class="dynamic-data"> {{ isset($consignee_appointment[0]['appointment']) ? \Carbon\Carbon::parse($consignee_appointment[0]['appointment'])->format('m-d-Y') : '' }}                                    <td class="dynamic-data">{{ $loads->load_carrier }}</td>
                                    @php
                                    $shipper_location = json_decode($loads->load_shipper_location, true);
                                    $first_shipper_location = reset($shipper_location);
                                    @endphp
                                    <td class="dynamic-data">{{ $first_shipper_location['location'] ?? '' }}</td>
                                    @php
                                    $consignee_location =
                                    json_decode($loads->load_consignee_location, true);
                                    $last_consignee_location = end($consignee_location);
                                    @endphp

                                    <td class="dynamic-data"
                                        style="padding: 7px 10px !important; vertical-align: middle !important;">
                                        {{ $last_consignee_location['location'] ?? '' }}
                                    </td>
                                </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="open" role="tabpanel" aria-labelledby="open-tab">
                      <div class="table-responsive">
                        <table id="dataTableOpen" class="table table-bordered table-striped display">
=======
                    <div class="tab-pane fade" id="all" ole="tabpanel" aria-labelledby="customers-tab">
                        <table id="dataTable" class="table table-bordered table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
                                    <th>Sr No</th>
                                    <th>Load #</th>
                                    <th>W/O #</th>
                                    <th>Customer #</th>
                                    <th>Load Create Date</th>
                                    <th>Shipper Date</th>
                                    <th>Del Date</th>
                                    <th>Carrier</th>
                                    <th>Pickup Location</th>
                                    <th>Unloading Location</th>

                                    <!-- <th>Status & RC</th> -->
                                    <!-- <th>PDF View</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $i=1;
                                @endphp
                                @foreach($load as $loads)
                                <tr>
                                    <td class="dynamic-data">{{ $i++ }}</td>
                                    <td class="dynamic-data">{{ $loads->load_number }}</td>
                                    <td class="dynamic-data">{{ $loads->load_workorder }}</td>
                                    <td class="dynamic-data">{{ $loads->load_bill_to }}</td>
                                    <td class="dynamic-data">{{ $loads->created_at->format('Y-m-d') }}</td>
                                    <td class="dynamic-data">{{ $loads->load_shipper_appointment }}</td>
                                    <td class="dynamic-data">{{ $loads->load_consignee_appointment }}</td>
                                    <td class="dynamic-data">{{ $loads->load_carrier }}</td>
                                    <td class="dynamic-data">{{ $loads->load_shipper_location }}</td>
                                    <td class="dynamic-data">{{ $loads->load_consignee }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="open" ole="tabpanel" aria-labelledby="customers-tab">
                        <table id="dataTableOpen" class="table table-bordered table-hover js-basic-example dataTable">
>>>>>>> old-repo/master
                            <thead>
                                <tr>
                                    <th>Sr No</th>
                                    <th>Load#</th>
                                    <th>W/O#</th>
                                    <th>Customer#</th>
                                    <th>Load Create Date</th>
                                    <th>Shipper Date</th>
                                    <th>Del Date</th>
                                    <th>Carrier</th>
                                    <th>Pickup Location</th>
                                    <th>Unloading Location</th>
<<<<<<< HEAD
=======
                                    <th>Final Del</th>
>>>>>>> old-repo/master
                                    <th>Load Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $i=1;
                                @endphp
                                @foreach($load as $loads)
                                @if($loads->load_status == 'Open')
                                <tr>
                                    <td class="dynamic-data">{{ $i++ }}</td>
                                    <td class="dynamic-data">{{ $loads->load_number }}</td>
                                    <td class="dynamic-data">{{ $loads->load_workorder }}</td>
                                    <td class="dynamic-data">{{ $loads->load_bill_to }}</td>
                                    <td class="dynamic-data">{{ $loads->created_at->format('Y-m-d') }}</td>
<<<<<<< HEAD
                                    @php
                                $shipper_appointment =
                                json_decode($loads->load_shipper_appointment,true);
                                @endphp
                                <td class="dynamic-data">{{ isset($shipper_appointment[0]['appointment']) ? \Carbon\Carbon::parse($shipper_appointment[0]['appointment'])->format('m-d-Y') : '' }}</td>
                                @php
                                $consignee_appointment =
                                json_decode($loads->load_consignee_appointment,true);
                                @endphp
                                <td class="dynamic-data"> {{ isset($consignee_appointment[0]['appointment']) ? \Carbon\Carbon::parse($consignee_appointment[0]['appointment'])->format('m-d-Y') : '' }}                                    <td class="dynamic-data">{{ $loads->load_carrier }}</td>
                                @php
                                $shipper_location = json_decode($loads->load_shipper_location, true);
                                $first_shipper_location = reset($shipper_location);
                                @endphp
                                <td class="dynamic-data">{{ $first_shipper_location['location'] ?? '' }}</td>
                                @php
                                $consignee_location =
                                json_decode($loads->load_consignee_location, true);
                                $last_consignee_location = end($consignee_location);
                                @endphp

                                <td class="dynamic-data"
                                    style="padding: 7px 10px !important; vertical-align: middle !important;">
                                    {{ $last_consignee_location['location'] ?? '' }}
                                </td>
                                <td class="dynamic-data">{{ $loads->load_status }}</td>
=======
                                    <td class="dynamic-data">{{ $loads->load_shipper_appointment }}</td>
                                    <td class="dynamic-data">{{ $loads->load_consignee_appointment }}</td>
                                    <td class="dynamic-data">{{ $loads->load_carrier }}</td>
                                    <td class="dynamic-data">{{ $loads->load_shipper_location }}</td>
                                    <td class="dynamic-data">{{ $loads->load_consignee }}</td>
                                    <td class="dynamic-data">{{ $loads->load_consignee_1 }}</td>
                                    <td class="dynamic-data">{{ $loads->load_status }}</td>
>>>>>>> old-repo/master
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
<<<<<<< HEAD
                     </div>
                    </div>
                    <div class="tab-pane fade" id="delivered" role="tabpanel" aria-labelledby="delivered-tab">
                        <div class="table-responsive">
                            <table id="dataTableDelivered" class="table table-bordered table-striped display">
                                <thead>
                                    <tr>
                                        <th>Sr No</th>
                                        <th>Load #</th>
                                        <th>W/O #</th>
                                        <th>Carrier</th>
                                        <th>Shipper Date</th>
                                        <th>Load Create Date</th>
                                        <th>Del Date</th>
                                        <th>Customer #</th>
                                        <th>Pickup Location</th>
                                        <th>Unloading Location</th>
                                        <th>Final Del</th>
                                        <th>Load Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $i=1;
                                    @endphp
                                    @foreach($load as $loads)
                                    @if($loads->load_status == 'Delivered')
                                    <tr>
                                        <td class="dynamic-data">{{ $i++ }}</td>
                                        <td class="dynamic-data">{{ $loads->load_number }}</td>
                                        <td class="dynamic-data">{{ $loads->load_workorder }}</td>
                                        <td class="dynamic-data">{{ $loads->load_bill_to }}</td>
                                        <td class="dynamic-data">{{ $loads->created_at->format('Y-m-d') }}</td>
                                        @php
                                    $shipper_appointment =
                                    json_decode($loads->load_shipper_appointment,true);
                                    @endphp
                                    <td class="dynamic-data">{{ isset($shipper_appointment[0]['appointment']) ? \Carbon\Carbon::parse($shipper_appointment[0]['appointment'])->format('m-d-Y') : '' }}</td>
                                    @php
                                    $consignee_appointment =
                                    json_decode($loads->load_consignee_appointment,true);
                                    @endphp
                                    <td class="dynamic-data"> {{ isset($consignee_appointment[0]['appointment']) ? \Carbon\Carbon::parse($consignee_appointment[0]['appointment'])->format('m-d-Y') : '' }}                                    <td class="dynamic-data">{{ $loads->load_carrier }}</td>
                                    @php
                                    $shipper_location = json_decode($loads->load_shipper_location, true);
                                    $first_shipper_location = reset($shipper_location);
                                    @endphp
                                    <td class="dynamic-data">{{ $first_shipper_location['location'] ?? '' }}</td>
                                    @php
                                    $consignee_location =
                                    json_decode($loads->load_consignee_location, true);
                                    $last_consignee_location = end($consignee_location);
                                    @endphp

                                    <td class="dynamic-data"
                                        style="padding: 7px 10px !important; vertical-align: middle !important;">
                                        {{ $last_consignee_location['location'] ?? '' }}
                                    </td>
                                    <td class="dynamic-data">{{ \Carbon\Carbon::parse($loads->load_actual_delivery_date)->format('m-d-Y') }}</td>
                                    <td class="dynamic-data">{{ $loads->load_status }}</td>
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="completed" role="tabpanel" aria-labelledby="completed-tab">
                        <div class="table-responsive">
                            <table id="dataTableDelivered" class="table table-bordered table-striped display">
                                <thead>
                                    <tr>
                                        <th>Sr No</th>
                                        <th>Load #</th>
                                        <th>W/O #</th>
                                        <th>Carrier</th>
                                        <th>Shipper Date</th>
                                        <th>Load Create Date</th>
                                        <th>Del Date</th>
                                        <th>Customer #</th>
                                        <th>Pickup Location</th>
                                        <th>Unloading Location</th>
                                        <th>Final Del</th>
                                        <th>Load Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $i=1;
                                    @endphp
                                    @foreach($load as $loads)
                                    @if($loads->load_status == 'Completed')
                                    <tr>
                                        <td class="dynamic-data">{{ $i++ }}</td>
                                        <td class="dynamic-data">{{ $loads->load_number }}</td>
                                        <td class="dynamic-data">{{ $loads->load_workorder }}</td>
                                        <td class="dynamic-data">{{ $loads->load_bill_to }}</td>
                                        <td class="dynamic-data">{{ $loads->created_at->format('Y-m-d') }}</td>
                                        @php
                                    $shipper_appointment =
                                    json_decode($loads->load_shipper_appointment,true);
                                    @endphp
                                    <td class="dynamic-data">{{ isset($shipper_appointment[0]['appointment']) ? \Carbon\Carbon::parse($shipper_appointment[0]['appointment'])->format('m-d-Y') : '' }}</td>
                                    @php
                                    $consignee_appointment =
                                    json_decode($loads->load_consignee_appointment,true);
                                    @endphp
                                    <td class="dynamic-data"> {{ isset($consignee_appointment[0]['appointment']) ? \Carbon\Carbon::parse($consignee_appointment[0]['appointment'])->format('m-d-Y') : '' }}                                    <td class="dynamic-data">{{ $loads->load_carrier }}</td>
                                    @php
                                    $shipper_location = json_decode($loads->load_shipper_location, true);
                                    $first_shipper_location = reset($shipper_location);
                                    @endphp
                                    <td class="dynamic-data">{{ $first_shipper_location['location'] ?? '' }}</td>
                                    @php
                                    $consignee_location =
                                    json_decode($loads->load_consignee_location, true);
                                    $last_consignee_location = end($consignee_location);
                                    @endphp

                                    <td class="dynamic-data"
                                        style="padding: 7px 10px !important; vertical-align: middle !important;">
                                        {{ $last_consignee_location['location'] ?? '' }}
                                    </td>
                                    <td class="dynamic-data">{{ \Carbon\Carbon::parse($loads->load_actual_delivery_date)->format('m-d-Y') }}</td>
                                    <td class="dynamic-data">{{ $loads->load_status }}</td>
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="invoice" role="tabpanel" aria-labelledby="invoice-tab">
                         <div class="table-responsive">
                             <table id="dataTableDelivered" class="table table-bordered table-striped display">
                                 <thead>
                                     <tr>
                                         <th>Sr No</th>
                                         <th>Load #</th>
                                         <th>W/O #</th>
                                         <th>Carrier</th>
                                         <th>Shipper Date</th>
                                         <th>Load Create Date</th>
                                         <th>Del Date</th>
                                         <th>Customer #</th>
                                         <th>Pickup Location</th>
                                         <th>Unloading Location</th>
                                         <th>Final Del</th>
                                         <th>Load Status</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     @php
                                     $i=1;
                                     @endphp
                                     @foreach($load as $loads)
                                     @if($loads->invoice_status == 'Paid')
                                     <tr>
                                         <td class="dynamic-data">{{ $i++ }}</td>
                                         <td class="dynamic-data">{{ $loads->load_number }}</td>
                                         <td class="dynamic-data">{{ $loads->load_workorder }}</td>
                                         <td class="dynamic-data">{{ $loads->load_bill_to }}</td>
                                         <td class="dynamic-data">{{ $loads->created_at->format('Y-m-d') }}</td>
                                         @php
                                     $shipper_appointment =
                                     json_decode($loads->load_shipper_appointment,true);
                                     @endphp
                                     <td class="dynamic-data">{{ isset($shipper_appointment[0]['appointment']) ? \Carbon\Carbon::parse($shipper_appointment[0]['appointment'])->format('m-d-Y') : '' }}</td>
                                     @php
                                     $consignee_appointment =
                                     json_decode($loads->load_consignee_appointment,true);
                                     @endphp
                                     <td class="dynamic-data"> {{ isset($consignee_appointment[0]['appointment']) ? \Carbon\Carbon::parse($consignee_appointment[0]['appointment'])->format('m-d-Y') : '' }}                                    <td class="dynamic-data">{{ $loads->load_carrier }}</td>
                                     @php
                                     $shipper_location = json_decode($loads->load_shipper_location, true);
                                     $first_shipper_location = reset($shipper_location);
                                     @endphp
                                     <td class="dynamic-data">{{ $first_shipper_location['location'] ?? '' }}</td>
                                     @php
                                     $consignee_location =
                                     json_decode($loads->load_consignee_location, true);
                                     $last_consignee_location = end($consignee_location);
                                     @endphp
 
                                     <td class="dynamic-data"
                                         style="padding: 7px 10px !important; vertical-align: middle !important;">
                                         {{ $last_consignee_location['location'] ?? '' }}
                                     </td>
                                     <td class="dynamic-data">{{ \Carbon\Carbon::parse($loads->load_actual_delivery_date)->format('m-d-Y') }}</td>
                                     @if($loads->load_status)
                                     <td class="dynamic-data">Invoived</td>
                                     @endif
                                     </tr>
                                     @endif
                                     @endforeach
                                 </tbody>
                             </table>
                         </div>
=======
                    </div>
                    <div class="tab-pane fade" id="delivered" ole="tabpanel" aria-labelledby="customers-tab">
                        <table id="dataTableDelivered" class="table table-bordered table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
                                    <th>Sr No</th>
                                    <th>Load #</th>
                                    <th>W/O #</th>
                                    <th>Carrier</th>
                                    <th>Shipper Date</th>
                                    <th>Load Create Date</th>
                                    <th>Del Date</th>
                                    <th>Customer #</th>
                                    <th>Pickup Location</th>
                                    <th>Unloading Location</th>
                                    <th>Final Del</th>
                                    <th>Load Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $i=1;
                                @endphp
                                @foreach($load as $loads)
                                @if($loads->load_status == 'Deliverd')
                                <tr>
                                    <td class="dynamic-data">{{ $i++ }}</td>
                                    <td class="dynamic-data">{{ $loads->load_number }}</td>
                                    <td class="dynamic-data">{{ $loads->load_workorder }}</td>
                                    <td class="dynamic-data">{{ $loads->load_carrier }}</td>
                                    <td class="dynamic-data">{{ $loads->load_shipper_appointment }}</td>
                                    <td class="dynamic-data">{{ $loads->created_at->format('Y-m-d') }}</td>
                                    <td class="dynamic-data">{{ $loads->load_consignee_appointment }}</td>
                                    <td class="dynamic-data">{{ $loads->load_bill_to }}</td>
                                    <td class="dynamic-data">{{ $loads->load_shipper_location }}</td>
                                    <td class="dynamic-data">{{ $loads->load_consignee }}</td>
                                    <td class="dynamic-data">{{ $loads->load_consignee_1 }}</td>
                                    <td class="dynamic-data">{{ $loads->load_status }}</td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="completed" ole="tabpanel" aria-labelledby="customers-tab">
                        <table id="dataTableDelivered" class="table table-bordered table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
                                    <th>Sr No</th>
                                    <th>Load #</th>
                                    <th>W/O #</th>
                                    <th>Carrier</th>
                                    <th>Shipper Date</th>
                                    <th>Load Create Date</th>
                                    <th>Del Date</th>
                                    <th>Customer #</th>
                                    <th>Pickup Location</th>
                                    <th>Unloading Location</th>
                                    <th>Final Del</th>
                                    <th>Load Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $i=1;
                                @endphp
                                @foreach($load as $loads)
                                @if($loads->load_status == 'Completed')
                                <tr>
                                    <td class="dynamic-data">{{ $i++ }}</td>
                                    <td class="dynamic-data">{{ $loads->load_number }}</td>
                                    <td class="dynamic-data">{{ $loads->load_workorder }}</td>
                                    <td class="dynamic-data">{{ $loads->load_carrier }}</td>
                                    <td class="dynamic-data">{{ $loads->load_shipper_appointment }}</td>
                                    <td class="dynamic-data">{{ $loads->created_at->format('Y-m-d') }}</td>
                                    <td class="dynamic-data">{{ $loads->load_consignee_appointment }}</td>
                                    <td class="dynamic-data">{{ $loads->load_bill_to }}</td>
                                    <td class="dynamic-data">{{ $loads->load_shipper_location }}</td>
                                    <td class="dynamic-data">{{ $loads->load_consignee }}</td>
                                    <td class="dynamic-data">{{ $loads->load_consignee_1 }}</td>
                                    <td class="dynamic-data">{{ $loads->load_status }}</td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="invoice" ole="tabpanel" aria-labelledby="customers-tab">
                        <table id="dataTableDelivered" class="table table-bordered table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
                                    <th>Sr No</th>
                                    <th>Load #</th>
                                    <th>W/O #</th>
                                    <th>Carrier</th>
                                    <th>Shipper Date</th>
                                    <th>Load Create Date</th>
                                    <th>Del Date</th>
                                    <th>Customer #</th>
                                    <th>Pickup Location</th>
                                    <th>Unloading Location</th>
                                    <th>Final Del</th>
                                    <th>Load Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $i=1;
                                @endphp
                                @foreach($load as $loads)
                                @if($loads->invoice_status == 'Paid Record')
                                <tr>
                                    <td class="dynamic-data">{{ $i++ }}</td>
                                    <td class="dynamic-data">{{ $loads->load_number }}</td>
                                    <td class="dynamic-data">{{ $loads->load_workorder }}</td>
                                    <td class="dynamic-data">{{ $loads->load_carrier }}</td>
                                    <td class="dynamic-data">{{ $loads->load_shipper_appointment }}</td>
                                    <td class="dynamic-data">{{ $loads->created_at->format('Y-m-d') }}</td>
                                    <td class="dynamic-data">{{ $loads->load_consignee_appointment }}</td>
                                    <td class="dynamic-data">{{ $loads->load_bill_to }}</td>
                                    <td class="dynamic-data">{{ $loads->load_shipper_location }}</td>
                                    <td class="dynamic-data">{{ $loads->load_consignee }}</td>
                                    <td class="dynamic-data">{{ $loads->load_consignee_1 }}</td>
                                    <td class="dynamic-data">{{ $loads->load_status }}</td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
>>>>>>> old-repo/master
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<<<<<<< HEAD

=======
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script>
    $(document).ready(function() {
    // Check if script is running
    console.log("Document is ready");

    // Inject CSS dynamically via JavaScript
    var style = '<style>' +
                    'tbody tr.highlight-row {' +
                        'background-color: #CAF1EB !important;' +
                    '}' +
                '</style>';
    $('head').append(style); // Append the style to the head

    // Check if tbody exists
    console.log($('tbody'));

    // Event delegation to target the first <td> in each row
    $('tbody').on('click', 'td', function() {
        console.log("A cell was clicked"); // Check if click event is triggered

        // Remove the highlight from any previously selected row
        $('tbody tr').removeClass('highlight-row');

        // Add highlight to the clicked row
        $(this).closest('tr').addClass('highlight-row');
        console.log($(this).closest('tr')); // Log the row that was clicked
    });
});
</script>
>>>>>>> old-repo/master
<script>
    function renderCharts() {
        fetch('/fetch-load-data')
            .then(response => response.json())
            .then(data => {
                const labels = ['Open Loads', 'Completed Loads'];
                const openLoadsData = data.openLoadsCount;
                const completedLoadsData = data.completedLoadsCount;

                new Chart(document.getElementById('totalLoadsChart'), {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Total Loads',
                            backgroundColor: [
                                'rgba(70, 182, 254, 0.5)',
                                'rgba(4, 190, 91, 0.5)',
                            ],
                            data: [openLoadsData + completedLoadsData, 1],
                        }]
                    },
                    options: {
                        responsive: true,
                        legend: {
                            display: false
                        },
                        title: {
                            display: true,
                            text: 'Total Loads'
                        },
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });
                new Chart(document.getElementById('openLoadsChart'), {
                    type: 'pie',
                    data: {
                        labels: labels,
                        datasets: [{
                            backgroundColor: [
                                'rgba(70, 182, 254, 0.5)',
                                'rgba(4, 190, 91, 0.5)',
                            ],
                            data: [openLoadsData, completedLoadsData],
                        }]
                    },
                    options: {
                        responsive: true,
                        title: {
                            display: true,
                            text: 'Open Loads vs Completed Loads'
                        }
                    }
                });

                new Chart(document.getElementById('completedLoadsChart'), {
                    type: 'pie',
                    data: {
                        labels: labels,
                        datasets: [{
                            backgroundColor: [
                                'rgba(70, 182, 254, 0.5)',
                                'rgba(4, 190, 91, 0.5)',
                            ],
                            data: [completedLoadsData, openLoadsData],
                        }]
                    },
                    options: {
                        responsive: true,
                        title: {
                            display: true,
                            text: 'Completed Loads vs Open Loads'
                        }
                    }
                });
            });
    }

    renderCharts();
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<<<<<<< HEAD
<!-- <script>
=======
<script>
>>>>>>> old-repo/master
    document.addEventListener('DOMContentLoaded', function () {
        // Retrieve the last active tab from local storage
        var lastActiveTab = localStorage.getItem('lastActiveTab');

        // If a last active tab is found, set it as active
        if (lastActiveTab) {
            $('#myTab a[href="' + lastActiveTab + '"]').tab('show');
        }

        // Store the active tab in local storage when a tab is clicked
        $('a[data-bs-toggle="tab"]').on('shown.bs.tab', function (e) {
            var targetTab = e.target.getAttribute('href');
            localStorage.setItem('lastActiveTab', targetTab);
        });

        // Initialize DataTables for both tables
        $('#dataTableOpen').DataTable();
        $('#dataTableDelivered').DataTable();
    });
<<<<<<< HEAD
</script> -->


<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Function to activate the last active tab or default to the first tab
        function activateTab() {
            // Get the active tab from localStorage
            var activeTab = localStorage.getItem('activeTab');

            // Remove 'active' and 'show' classes from all tabs and content panes
            document.querySelectorAll('.nav-link').forEach(function (tab) {
                tab.classList.remove('active');
            });
            document.querySelectorAll('.tab-pane').forEach(function (pane) {
                pane.classList.remove('active', 'show');
            });
            
            if (activeTab) {
                // Activate the last active tab if available
                var selectedTab = document.querySelector(`#myTab a[href="${activeTab}"]`);
                if (selectedTab) {
                    selectedTab.classList.add('active');
                    document.querySelector(activeTab).classList.add('active', 'show');
                }
            } else {
                // Default to the first tab if no active tab is stored
                var defaultTab = document.querySelector('#myTab .nav-link');
                if (defaultTab) {
                    defaultTab.classList.add('active');
                    document.querySelector(defaultTab.getAttribute('href')).classList.add('active', 'show');
                }
            }
        }

        // Store the clicked tab in localStorage
        document.querySelectorAll('.nav-link').forEach(function (tab) {
            tab.addEventListener('click', function () {
                localStorage.setItem('activeTab', this.getAttribute('href'));
            });
        });

        // Activate the last active tab or default tab on page load
        activateTab();
    });
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Inject CSS dynamically via JavaScript
        var style = '<style>' +
                        'tbody tr.highlight-row {' +
                            'background-color: #CAF1EB !important;' +
                        '}' +
                    '</style>';
        $('head').append(style); // Append the style to the head

        // Event delegation to target the first <td> in each row
        $('tbody').on('click', 'td', function() {
            // Remove the highlight from any previously selected row
            $('tbody tr').removeClass('highlight-row');
            
            // Add highlight to the clicked row
            $(this).closest('tr').addClass('highlight-row');
        });
    });
</script>
<script>
=======
</script>

>>>>>>> old-repo/master
@endsection