@extends('layouts.accounts.app')
@section('content')
@if(session('success'))
<div class="alert alert-success" id="successMessage">
    {{ session('success') }}
</div>
@endif
@if(session('error'))
<div class="alert alert-danger" id="errorMessage">
    <script>
        alert("{{ session('error') }}");
    </script>
    {{ session('error') }}
</div>
@endif
<style>
        .table>:not(caption)>*>* {
        background-color: unset !important;
    }
</style>
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <h2><b>Status Data</b></h2>
        </div>

        <div class="container-fluid">
            <!-- Tab buttons -->
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="all-tab" data-bs-toggle="tab" href="#all" role="tab"
                        aria-controls="all" aria-selected="true" style="font-size: 15px;color: #000;font-weight:500">All
                        Loads Status</a>
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
                    <a class="nav-link" id="invoiced-tab" data-bs-toggle="tab" href="#invoiced" role="tab"
                        aria-controls="invoiced" aria-selected="false"
                        style="font-size: 15px;color: #000;font-weight:500">Invoiced</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="paid-tab" data-bs-toggle="tab" href="#paid" role="tab" aria-controls="paid"
                        aria-selected="false" style="font-size: 15px;color: #000;font-weight:500">Invoice / Paid</a>
                </li>
            </ul>

            <!-- Tab content -->
            <div class="tab-content" id="myTabContent">

                <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="delivered-tab">
                    <!-- Delivered data table -->
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover js-basic-example dataTable no-footer">
                            <thead>
                               
                                    <th style="background: #555555;">Sr No</th>
                                    <th style="background: #555555;">Load #</th>
                                    <th style="background: #555555;">W/O #</th>
                                    <th style="background: #555555;">Customer Name</th>
                                    <th style="background: #555555;">Agent</th>
                                    <th style="background: #555555;">Office</th>
                                    <th style="background: #555555;">Team Leader</th>
                                    <th style="background: #555555;">Manager</th>
                                    <th style="background: #555555;">Load Creation Date</th>
                                    <th style="background: #555555;">Shipper Date</th>
                                    <th style="background: #555555;">Delivered Date</th>
                                    <th style="background: #555555;">Actual Del Date</th>
                                    <th style="background: #555555;">Carrier</th>
                                    <th style="background: #555555;">Pickup Location</th>
                                    <th style="background: #555555;">Unloading Location</th>
                                    <th style="background: #555555;">Equipment Type</th>
                                    <th style="background: #555555;">Load Status</th>
                                    <th style="background: #555555;">Aging</th>
                                    <th style="background: #555555;">Action</th>
         
                            </thead>
                            <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach($status as $s)
                                <tr>
                                    <td class="dynamic-data" style="padding: 7px 10px; vertical-align: middle;">{{ $i++ }}</td>
                                    

                                    <td class="dynamic-data" style="padding: 7px 10px; vertical-align: middle;">
                                        <a style="color: rgb(10 185 90) !important;font-weight: 700;" href="{{ route('accounting.load.edit', $s->id) }}">{{ $s->load_number }}</a>
                                    </td>
                                    <td class="dynamic-data" style="padding: 7px 10px; vertical-align: middle;">{{ $s->load_workorder }}</td>
                                    <td class="dynamic-data" style="padding: 7px 10px; vertical-align: middle;">{{ $s->load_bill_to }}</td>
                                    <td class="dynamic-data" style="padding: 7px 10px; vertical-align: middle;">{{ $s->user->name }}</td>
                                    <td class="dynamic-data" style="padding: 7px 10px; vertical-align: middle;">{{ $s->user->office }}</td>
                                    <td class="dynamic-data" style="padding: 7px 10px; vertical-align: middle;">{{ $s->user->team_lead }}</td>
                                    <td class="dynamic-data" style="padding: 7px 10px; vertical-align: middle;">{{ $s->user->manager }}</td>
                                    <td class="dynamic-data" style="padding: 7px 10px; vertical-align: middle;">{{ \Carbon\Carbon::parse($s->created_at)->format('Y-m-d') }}</td>
                                    @php
                                        $shipper_appointment = json_decode($s->load_shipper_appointment, true);
                                        $consignee_appointment = json_decode($s->load_consignee_appointment, true);
                                    @endphp
                                    <td class="dynamic-data" style="padding: 7px 10px; vertical-align: middle;">
                                        {{ isset($shipper_appointment[0]['appointment']) ? \Carbon\Carbon::parse($shipper_appointment[0]['appointment'])->format('Y-m-d') : '' }}
                                    </td>
                                    <td class="dynamic-data" style="padding: 7px 10px; vertical-align: middle;">
                                        {{ $consignee_appointment[0]['appointment'] ?? '' }}
                                    </td>
                                    <td class="dynamic-data" style="padding: 7px 10px; vertical-align: middle;">
                                        {{ $s->load_actual_delivery_date }}
                                    </td>
                                    <td class="dynamic-data" style="padding: 7px 10px; vertical-align: middle;">
                                        {{ $s->load_carrier }}
                                    </td>
                                    @php
                                        $shipper_location = json_decode($s->load_shipper_location, true);
                                        $consignee_location = json_decode($s->load_consignee_location, true);
                                    @endphp
                                    <td class="dynamic-data" style="padding: 7px 10px; vertical-align: middle;">
                                        {{ $shipper_location[0]['location'] ?? '' }}
                                    </td>
                                    <td class="dynamic-data" style="padding: 7px 10px; vertical-align: middle;">
                                        {{ $consignee_location[0]['location'] ?? '' }}
                                    </td>
                                    <td class="dynamic-data" style="padding: 7px 10px; vertical-align: middle;">
                                        {{ $s->load_status }}
                                    </td>
                                    <td class="dynamic-data" style="padding: 7px 10px; vertical-align: middle; ">{{ $s->load_equipment_type }}</td>
                                    @php
                                        $deliveredDate = \Carbon\Carbon::parse($s->created_at);
                                        $currentDate = \Carbon\Carbon::now();
                                        $differenceInDays = $deliveredDate->diffInDays($currentDate);
                                    @endphp
                                    <td class="dynamic-data" style="padding: 7px 10px; vertical-align: middle;">  
                                            {{ $differenceInDays }} days
                                    </td>
                                    <td class="dynamic-data">
                                        <a href="{{ route('accounting.load.edit', ['id' => $s->id]) }}" title="Edit Load" style="color:#0DCAF0; text-align:center; display: block; font-size: 18px;">
                                            <i class="far fa-edit"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>


                <div class="tab-pane fade" id="delivered" role="tabpanel" aria-labelledby="delivered-tab">
                    <!-- Delivered data table -->
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover js-basic-example dataTable no-footer">
                            <thead>
                                <tr>
                                    <th style="background: #555555;">Sr No</th>
                                    <th style="background: #555555;">Load #</th>
                                    <th style="background: #555555;">W/O #</th>
                                    <th style="background: #555555;">Customer Name</th>
                                    <th style="background: #555555;">Agent</th>
                                    <th style="background: #555555;">Office</th>
                                    <th style="background: #555555;">Team Leader</th>
                                    <th style="background: #555555;">Manager</th>
                                    <th style="background: #555555;">Load Creation Date</th>
                                    <th style="background: #555555;">Shipper Date</th>
                                    <th style="background: #555555;">Delivered Date</th>
                                    <th style="background: #555555;">Actual Del Date</th>
                                    <th style="background: #555555;">Carrier</th>
                                    <th style="background: #555555;">Pickup Location</th>
                                    <th style="background: #555555;">Unloading Location</th>
                                    <th style="background: #555555;">Load Status</th>
                                    <th style="background: #555555;">Aging</th>
                                    <th style="background: #555555;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $i = 1;
                                @endphp
                                @foreach($status as $s)
                                @if($s->load_status == 'Delivered')
                                <tr>
                                    <td class="dynamic-data" style="padding: 7px 10px !important; vertical-align: middle !important;">{{ $i++ }}
                                    </td>
                                    <td class="dynamic-data" style="padding: 7px 10px !important; vertical-align: middle !important;">
                                        <a style="color: rgb(10 185 90) !important;font-weight: 700;" href="{{ route('accounting.load.edit', $s->id) }}">{{ $s->load_number }}
                                        </a>
                                    </td>
                                    <td class="dynamic-data" style="padding: 7px 10px !important; vertical-align: middle !important;">{{ $s->load_workorder }}</td>
                                    <td class="dynamic-data" style="padding: 7px 10px !important; vertical-align: middle !important;">{{ $s->load_bill_to }}</td>
                                    <td class="dynamic-data" style="padding: 7px 10px !important; vertical-align: middle !important;">{{ $s->user->name }}</td>
                                    <td class="dynamic-data" style="padding: 7px 10px !important; vertical-align: middle !important;">{{ $s->user->office }}</td>
                                    <td class="dynamic-data" style="padding: 7px 10px !important; vertical-align: middle !important;">{{ $s->user->team_lead }}</td>
                                    <td class="dynamic-data" style="padding: 7px 10px !important; vertical-align: middle !important;">{{ $s->user->manager }}</td>
                                    <td class="dynamic-data" style="padding: 7px 10px !important; vertical-align: middle !important;">{{ $s->created_at }}</td>
                                        @php
                                            $shipper_appointment = json_decode($s->load_shipper_appointment,true);
                                        @endphp
                                        <td class="dynamic-data" style="padding: 7px 10px !important; vertical-align: middle !important;">
                                            {{ isset($shipper_appointment[0]['appointment']) ? \Carbon\Carbon::parse($shipper_appointment[0]['appointment'])->format('y-m-d') : '' }}
                                        </td>

                                
                                        @php
                                            $consignee_appointment = json_decode($s->load_consignee_appointment,true);
                                        @endphp

                                    <td class="dynamic-data" style="padding: 7px 10px !important; vertical-align: middle !important;">
                                        {{ $consignee_appointment[0]['appointment'] ?? '' }}</td>
                                    <td class="dynamic-data" style="padding: 7px 10px !important; vertical-align: middle !important;">
                                        {{ $s->load_actual_delivery_date }}</td>
                                        <td class="dynamic-data" style="padding: 7px 10px !important; vertical-align: middle !important;">{{ $s->load_carrier }}</td>

                                        @php
                                            $shipper_location = json_decode($s->load_shipper_location, true); 
                                        @endphp
                                        <td class="dynamic-data"
                                            style="padding: 7px 10px !important; vertical-align: middle !important;">
                                            {{ $shipper_location[0]['location'] ?? '' }}
                                        </td>
                                        @php
                                            $consignee_loaction = json_decode($s->load_consignee_location, true);
                                        @endphp
                                        
                                        <td class="dynamic-data"
                                            style="padding: 7px 10px !important; vertical-align: middle !important;">
                                            {{ $consignee_loaction[0]['location'] ?? '' }}

                                        </td>
                                    <td class="dynamic-data" style="padding: 7px 10px !important; vertical-align: middle !important;">
                                        {{ $s->load_status }}</td>
                                        <td class="dynamic-data" style="padding: 7px 10px !important; vertical-align: middle !important;">
                                                            @php
                                                            $deliveredDate = \Carbon\Carbon::parse($s->created_at);
                                                            $currentDate = \Carbon\Carbon::now();
                                                            $differenceInDays = $deliveredDate->diffInDays($currentDate);
                                                            @endphp
                                                            {{ $differenceInDays }} days
                                                        </td>
                                                        <td class="dynamic-data">
                                        <a href="{{ route('accounting.load.edit', ['id' => $s->id]) }}" title="Edit Load" style="color:#0DCAF0;text-align:center;display: block; font-size: 17px;">
                                            <i class="far fa-edit"></i>
                                        </a>
                                    </td>

                                    <!-- <td style="padding: 7px 10px !important; vertical-align: middle !important;"><button class="btn btn-sm btn-danger">Delete</button></td> -->
                                </tr>
                                @endif

                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="tab-pane fade" id="completed" role="tabpanel" aria-labelledby="completed-tab">
                    <!-- Completed data table -->
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover js-basic-example dataTable no-footer">
                            <thead>
                                <tr>
                                    <th style="background: #555555;">Sr No</th>
                                    <th style="background: #555555;">Load #</th>
                                    <th style="background: #555555;">W/O #</th>
                                    <th style="background: #555555;">Customer Name</th>
                                    <th style="background: #555555;">Agent</th>
                                    <th style="background: #555555;">Office</th>
                                    <th style="background: #555555;">Team Leader</th>
                                    <th style="background: #555555;">Manager</th>
                                    <th style="background: #555555;">Load Creation Date</th>
                                    <th style="background: #555555;">Shipper Date</th>
                                    <th style="background: #555555;">Delivered Date</th>
                                    <th style="background: #555555;">Actual Del Date</th>
                                    <th style="background: #555555;">Carrier</th>
                                    <th style="background: #555555;">Pickup Location</th>
                                    <th style="background: #555555;">Unloading Location</th>
                                    <th style="background: #555555;">Load Status</th>
                                    <th style="background: #555555;">Aging</th>
                                    <th style="background: #555555;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $i = 1;
                                @endphp
                                @foreach($status as $s)
                                @if($s->load_status == 'Completed')
                                <tr>
                                    <td class="dynamic-data" style="padding: 7px 10px !important; vertical-align: middle !important;">{{ $i++ }}
                                    </td>
                                    <td class="dynamic-data" style="padding: 7px 10px !important; vertical-align: middle !important;">
                                        <a style="color: rgb(10 185 90) !important;font-weight: 700;" href="{{ route('accounting.load.edit', $s->id) }}">{{ $s->load_number }}
                                        </a>
                                    </td>
                                    <td class="dynamic-data" style="padding: 7px 10px !important; vertical-align: middle !important;">{{ $s->load_workorder }}</td>
                                    <td class="dynamic-data" style="padding: 7px 10px !important; vertical-align: middle !important;">{{ $s->load_bill_to }}</td>
                                    <td class="dynamic-data" style="padding: 7px 10px !important; vertical-align: middle !important;">{{ $s->user->name }}</td>
                                    <td class="dynamic-data" style="padding: 7px 10px !important; vertical-align: middle !important;">{{ $s->user->office }}</td>
                                    <td class="dynamic-data" style="padding: 7px 10px !important; vertical-align: middle !important;">{{ $s->user->team_lead }}</td>
                                    <td class="dynamic-data" style="padding: 7px 10px !important; vertical-align: middle !important;">{{ $s->user->manager }}</td>
                                    <td class="dynamic-data" style="padding: 7px 10px !important; vertical-align: middle !important;">{{ $s->created_at }}</td>
                                        @php
                                            $shipper_appointment = json_decode($s->load_shipper_appointment,true);
                                        @endphp
                                        <td class="dynamic-data" style="padding: 7px 10px !important; vertical-align: middle !important;">
                                            {{ isset($shipper_appointment[0]['appointment']) ? \Carbon\Carbon::parse($shipper_appointment[0]['appointment'])->format('y-m-d') : '' }}
                                        </td>

                                
                                        @php
                                            $consignee_appointment = json_decode($s->load_consignee_appointment,true);
                                        @endphp

                                    <td class="dynamic-data" style="padding: 7px 10px !important; vertical-align: middle !important;">
                                        {{ $consignee_appointment[0]['appointment'] ?? '' }}</td>
                                    <td class="dynamic-data" style="padding: 7px 10px !important; vertical-align: middle !important;">
                                        {{ $s->load_actual_delivery_date }}</td>
                                        <td class="dynamic-data" style="padding: 7px 10px !important; vertical-align: middle !important;">{{ $s->load_carrier }}</td>

                                        @php
                                            $shipper_location = json_decode($s->load_shipper_location, true); 
                                        @endphp
                                        <td class="dynamic-data"
                                            style="padding: 7px 10px !important; vertical-align: middle !important;">
                                            {{ $shipper_location[0]['location'] ?? '' }}
                                        </td>
                                        @php
                                            $consignee_loaction = json_decode($s->load_consignee_location, true);
                                        @endphp
                                        
                                        <td class="dynamic-data"
                                            style="padding: 7px 10px !important; vertical-align: middle !important;">
                                            {{ $consignee_loaction[0]['location'] ?? '' }}

                                        </td>
                                    <td class="dynamic-data" style="padding: 7px 10px !important; vertical-align: middle !important;">
                                        {{ $s->load_status }}</td>
                                        <td class="dynamic-data" style="padding: 7px 10px !important; vertical-align: middle !important;">
                                                            @php
                                                            $deliveredDate = \Carbon\Carbon::parse($s->created_at);
                                                            $currentDate = \Carbon\Carbon::now();
                                                            $differenceInDays = $deliveredDate->diffInDays($currentDate);
                                                            @endphp
                                                            {{ $differenceInDays }} days
                                                        </td>
                                                        <td class="dynamic-data">
                                        <a href="{{ route('accounting.load.edit', ['id' => $s->id]) }}" title="Edit Load" style="color:#0DCAF0;text-align:center;display: block; font-size: 17px;">
                                            <i class="far fa-edit"></i>
                                        </a>
                                    </td>

                                    <!-- <td style="padding: 7px 10px !important; vertical-align: middle !important;"><button class="btn btn-sm btn-danger">Delete</button></td> -->
                                </tr>
                                @endif

                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="tab-pane fade" id="invoiced" role="tabpanel" aria-labelledby="invoiced-tab">
                    <!-- Invoiced data table -->
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover js-basic-example dataTable no-footer">
                            <thead>
                                <tr>
                                    <th style="background: #555555;">Sr No</th>
                                    <th style="background: #555555;">Load #</th>
                                    <th style="background: #555555;">W/O #</th>
                                    <th style="background: #555555;">Customer Name</th>
                                    <th style="background: #555555;">Invoice #</th>
                                    <th style="background: #555555;">Invoice Date</th>
                                    <th style="background: #555555;">Agent</th>
                                    <th style="background: #555555;">Office</th>
                                    <th style="background: #555555;">Team Leader</th>
                                    <th style="background: #555555;">Manager</th>
                                    <th style="background: #555555;">Load Creation Date</th>
                                    <th style="background: #555555;">Shipper Date</th>
                                    <th style="background: #555555;">Delivered Date</th>
                                    <th style="background: #555555;">Actual Del Date</th>
                                    <th style="background: #555555;">Carrier</th>
                                    <th style="background: #555555;">Pickup Location</th>
                                    <th style="background: #555555;">Unloading Location</th>
                                    <th style="background: #555555;">Load Status</th>
                                    <th style="background: #555555;">Aging</th>
                                    <th style="background: #555555;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $i = 1;
                                @endphp
                                @foreach($status as $s)
                                @if($s->invoice_status == 'Paid' && $s->invoice_number)
                                <tr>
                                    <td class="dynamic-data" style="padding: 7px 10px !important; vertical-align: middle !important;">{{ $i++ }}
                                    </td>
                                    <td class="dynamic-data" style="padding: 7px 10px !important; vertical-align: middle !important;">
                                        <a style="color: rgb(10 185 90) !important;font-weight: 700;" href="{{ route('accounting.load.edit', $s->id) }}">{{ $s->load_number }}
                                        </a>
                                    </td>
                                    <td class="dynamic-data" style="padding: 7px 10px !important; vertical-align: middle !important;">{{ $s->load_workorder }}</td>
                                    <td class="dynamic-data" style="padding: 7px 10px !important; vertical-align: middle !important;">{{ $s->load_bill_to }}</td>
                                    <td class="dynamic-data" style="padding: 7px 10px !important; vertical-align: middle !important;">{{ $s->invoice_number }}</td>
                                    <td class="dynamic-data" style="padding: 7px 10px !important; vertical-align: middle !important;">{{ date('d-m-Y', strtotime($s->invoice_date)) }}</td>
                                    <td class="dynamic-data" style="padding: 7px 10px !important; vertical-align: middle !important;">{{ $s->user->name }}</td>
                                    <td class="dynamic-data" style="padding: 7px 10px !important; vertical-align: middle !important;">{{ $s->user->office }}</td>
                                    <td class="dynamic-data" style="padding: 7px 10px !important; vertical-align: middle !important;">{{ $s->user->team_lead }}</td>
                                    <td class="dynamic-data" style="padding: 7px 10px !important; vertical-align: middle !important;">{{ $s->user->manager }}</td>
                                    <td class="dynamic-data" style="padding: 7px 10px !important; vertical-align: middle !important;">{{ $s->created_at }}</td>
                                        @php
                                            $shipper_appointment = json_decode($s->load_shipper_appointment,true);
                                        @endphp
                                        <td class="dynamic-data" style="padding: 7px 10px !important; vertical-align: middle !important;">
                                            {{ isset($shipper_appointment[0]['appointment']) ? \Carbon\Carbon::parse($shipper_appointment[0]['appointment'])->format('y-m-d') : '' }}
                                        </td>

                                
                                        @php
                                            $consignee_appointment = json_decode($s->load_consignee_appointment,true);
                                        @endphp

                                    <td class="dynamic-data" style="padding: 7px 10px !important; vertical-align: middle !important;">
                                        {{ $consignee_appointment[0]['appointment'] ?? '' }}</td>
                                    <td class="dynamic-data" style="padding: 7px 10px !important; vertical-align: middle !important;">
                                        {{ $s->load_actual_delivery_date }}</td>
                                        <td class="dynamic-data" style="padding: 7px 10px !important; vertical-align: middle !important;">{{ $s->load_carrier }}</td>

                                        @php
                                            $shipper_location = json_decode($s->load_shipper_location, true); 
                                        @endphp
                                        <td class="dynamic-data"
                                            style="padding: 7px 10px !important; vertical-align: middle !important;">
                                            {{ $shipper_location[0]['location'] ?? '' }}
                                        </td>
                                        @php
                                            $consignee_loaction = json_decode($s->load_consignee_location, true);
                                        @endphp
                                        
                                        <td class="dynamic-data"
                                            style="padding: 7px 10px !important; vertical-align: middle !important;">
                                            {{ $consignee_loaction[0]['location'] ?? '' }}

                                        </td>
                                    <td class="dynamic-data" style="padding: 7px 10px !important; vertical-align: middle !important;">
                                    @if($s->invoice_status)    
                                        Invoiced
                                    @endif</td>
                                        <td class="dynamic-data" style="padding: 7px 10px !important; vertical-align: middle !important;">
                                                            @php
                                                            $deliveredDate = \Carbon\Carbon::parse($s->created_at);
                                                            $currentDate = \Carbon\Carbon::now();
                                                            $differenceInDays = $deliveredDate->diffInDays($currentDate);
                                                            @endphp
                                                            {{ $differenceInDays }} days
                                                        </td>
                                                        <td class="dynamic-data">
                                        <a href="{{ route('accounting.load.edit', ['id' => $s->id]) }}" title="Edit Load" style="color:#0DCAF0;text-align:center;display: block; font-size: 17px;">
                                            <i class="far fa-edit"></i>
                                        </a>
                                    </td>

                                    <!-- <td style="padding: 7px 10px !important; vertical-align: middle !important;"><button class="btn btn-sm btn-danger">Delete</button></td> -->
                                </tr>
                                @endif

                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="tab-pane fade" id="paid" role="tabpanel" aria-labelledby="paid-tab">
                    <!-- Paid data table -->
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover js-basic-example dataTable no-footer">
                            <thead>
                                <tr>
                                    <th style="background: #555555;">Sr No</th>
                                    <th style="background: #555555;">Load #</th>
                                    <th style="background: #555555;">W/O #</th>
                                    <th style="background: #555555;">Customer Name</th>
                                    <th style="background: #555555;">Invoice #</th>
                                    <th style="background: #555555;">Invoice Date</th>
                                    <th style="background: #555555;">Agent</th>
                                    <th style="background: #555555;">Office</th>
                                    <th style="background: #555555;">Team Leader</th>
                                    <th style="background: #555555;">Manager</th>
                                    <th style="background: #555555;">Load Creation Date</th>
                                    <th style="background: #555555;">Shipper Date</th>
                                    <th style="background: #555555;">Delivered Date</th>
                                    <th style="background: #555555;">Actual Del Date</th>
                                    <th style="background: #555555;">Carrier</th>
                                    <th style="background: #555555;">Pickup Location</th>
                                    <th style="background: #555555;">Unloading Location</th>
                                    <th style="background: #555555;">Load Status</th>
                                    <th style="background: #555555;">Aging</th>
                                    <th style="background: #555555;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $i = 1;
                                @endphp
                                @foreach($status as $s)
                                @if($s->invoice_status == 'Paid Record' && $s->invoice_number)
                                <tr>
                                    <td class="dynamic-data" style="padding: 7px 10px !important; vertical-align: middle !important;">{{ $i++ }}
                                    </td>
                                    <td class="dynamic-data" style="padding: 7px 10px !important; vertical-align: middle !important;">
                                        <a style="color: rgb(10 185 90) !important;font-weight: 700;" href="{{ route('accounting.load.edit', $s->id) }}">{{ $s->load_number }}
                                        </a>
                                    </td>
                                    <td class="dynamic-data" style="padding: 7px 10px !important; vertical-align: middle !important;">{{ $s->load_workorder }}</td>
                                    <td class="dynamic-data" style="padding: 7px 10px !important; vertical-align: middle !important;">{{ $s->load_bill_to }}</td>
                                    <td class="dynamic-data" style="padding: 7px 10px !important; vertical-align: middle !important;">{{ $s->invoice_number }}</td>
                                    <td class="dynamic-data" style="padding: 7px 10px !important; vertical-align: middle !important;">{{ date('d-m-Y', strtotime($s->invoice_date)) }}</td>
                                    <td class="dynamic-data" style="padding: 7px 10px !important; vertical-align: middle !important;">{{ $s->user->name }}</td>
                                    <td class="dynamic-data" style="padding: 7px 10px !important; vertical-align: middle !important;">{{ $s->user->office }}</td>
                                    <td class="dynamic-data" style="padding: 7px 10px !important; vertical-align: middle !important;">{{ $s->user->team_lead }}</td>
                                    <td class="dynamic-data" style="padding: 7px 10px !important; vertical-align: middle !important;">{{ $s->user->manager }}</td>
                                    <td class="dynamic-data" style="padding: 7px 10px !important; vertical-align: middle !important;">{{ $s->created_at }}</td>
                                        @php
                                            $shipper_appointment = json_decode($s->load_shipper_appointment,true);
                                        @endphp
                                        <td class="dynamic-data" style="padding: 7px 10px !important; vertical-align: middle !important;">
                                            {{ isset($shipper_appointment[0]['appointment']) ? \Carbon\Carbon::parse($shipper_appointment[0]['appointment'])->format('y-m-d') : '' }}
                                        </td>

                                
                                        @php
                                            $consignee_appointment = json_decode($s->load_consignee_appointment,true);
                                        @endphp

                                    <td class="dynamic-data" style="padding: 7px 10px !important; vertical-align: middle !important;">
                                        {{ $consignee_appointment[0]['appointment'] ?? '' }}</td>
                                    <td class="dynamic-data" style="padding: 7px 10px !important; vertical-align: middle !important;">
                                        {{ $s->load_actual_delivery_date }}</td>
                                        <td class="dynamic-data" style="padding: 7px 10px !important; vertical-align: middle !important;">{{ $s->load_carrier }}</td>

                                        @php
                                            $shipper_location = json_decode($s->load_shipper_location, true); 
                                        @endphp
                                        <td class="dynamic-data"
                                            style="padding: 7px 10px !important; vertical-align: middle !important;">
                                            {{ $shipper_location[0]['location'] ?? '' }}
                                        </td>
                                        @php
                                            $consignee_loaction = json_decode($s->load_consignee_location, true);
                                        @endphp
                                        
                                        <td class="dynamic-data"
                                            style="padding: 7px 10px !important; vertical-align: middle !important;">
                                            {{ $consignee_loaction[0]['location'] ?? '' }}

                                        </td>
                                    <td class="dynamic-data" style="padding: 7px 10px !important; vertical-align: middle !important;">
                                    @if($s->invoice_status)    
                                        Invoiced / Paid
                                    @endif
                                    </td>
                                        <td class="dynamic-data" style="padding: 7px 10px !important; vertical-align: middle !important;">
                                                            @php
                                                            $deliveredDate = \Carbon\Carbon::parse($s->created_at);
                                                            $currentDate = \Carbon\Carbon::now();
                                                            $differenceInDays = $deliveredDate->diffInDays($currentDate);
                                                            @endphp
                                                            {{ $differenceInDays }} days
                                                        </td>
                                                        <td class="dynamic-data">
                                        <a href="{{ route('accounting.load.edit', ['id' => $s->id]) }}" title="Edit Load" style="color:#0DCAF0;text-align:center;display: block; font-size: 17px;">
                                            <i class="far fa-edit"></i>
                                        </a>
                                    </td>

                                    <!-- <td style="padding: 7px 10px !important; vertical-align: middle !important;"><button class="btn btn-sm btn-danger">Delete</button></td> -->
                                </tr>
                                @endif

                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> 
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap JavaScript library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js">
</script>

<!-- 
<script>
    $(document).ready(function () {
        // Initialize Bootstrap tabs
        var tabTriggerEl = document.getElementById('myTab');
        var tab = new bootstrap.Tab(tabTriggerEl);
        tab.show();
    });
</script>

<script>
    // Wait for the document to be fully loaded
    document.addEventListener("DOMContentLoaded", function () {
        // Get all anchor tags in the document
        var anchorTags = document.querySelectorAll("a");

        // Loop through each anchor tag
        anchorTags.forEach(function (anchor) {
            // Set text decoration to unset
            anchor.style.textDecoration = "unset";
        });
    });
</script> -->

<script>
  $(document).ready(function () {
    // Get the last active tab from localStorage
    var activeTab = localStorage.getItem('activeTab');

    // If there is an active tab stored, activate it
    if (activeTab) {
      $('.nav-tabs a[href="' + activeTab + '"]').tab('show');
    } else {
      // Activate the first tab by default
      $('.nav-tabs a:first').tab('show');
    }

    // Save the active tab to localStorage when a tab is clicked
    $('.nav-tabs a').on('click', function () {
      var tabId = $(this).attr('href');
      localStorage.setItem('activeTab', tabId);
    });
  });
</script>
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
@endsection