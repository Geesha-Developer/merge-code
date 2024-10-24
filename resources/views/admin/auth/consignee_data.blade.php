@extends('layouts.admin.app')
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
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
<<<<<<< HEAD
            <h2><b>Consignee Data</b>  </h2>
=======
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2><strong>Consignee</strong> Data </h2>

                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i
                            class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <!-- <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i
                            class="zmdi zmdi-arrow-right"></i></button>
                </div> -->
            </div>
>>>>>>> old-repo/master
        </div>

        <div class="container-fluid p-0">
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
<<<<<<< HEAD
                          
=======
>>>>>>> old-repo/master
                            <div class="table-responsive">
                                <table class="table table-bordered table-responsive dataTable no-footer">
                                    <thead>
                                        <tr>
                                            <th style="color: #fff !important;">Sr No.</th>
                                            <th style="color: #fff !important;">Broker Name</th>
                                            <th style="color: #fff !important;">Consignee Name</th>
                                            <th style="color: #fff !important;">Consignee Address</th>
                                            <th style="color: #fff !important;">Consignee Contact Email</th>
                                            <th style="color: #fff !important;">Consignee Telephone</th>
                                            <th style="color: #fff !important;">Consignee Hours</th>
                                            <th style="color: #fff !important;">Consignee Appointments</th>
                                            <th style="color: #fff !important;">Consignee Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach($consignee as $consignees)
                                        <tr>
<<<<<<< HEAD
                                            <td class="dynamic-data" style="padding: 9px 10px !important; vertical-align: middle !important;">{{ $i++ }}</td>
                                            <td class="dynamic-data" style="padding: 9px 10px !important; vertical-align: middle !important;">{{ $consignees->user->name }}</td>
                                            <td class="dynamic-data" style="padding: 9px 10px !important; vertical-align: middle !important;">{{ $consignees->consignee_name }}</td>
                                            <td class="dynamic-data" style="padding: 9px 10px !important; vertical-align: middle !important;">{{ $consignees->consignee_address }}</td>
                                            <td class="dynamic-data" style="padding: 9px 10px !important; vertical-align: middle !important;">{{ $consignees->consignee_contact_email }}</td>
                                            <td class="dynamic-data" style="padding: 9px 10px !important; vertical-align: middle !important;">{{ $consignees->consignee_telephone }}</td>
                                            <td class="dynamic-data" style="padding: 9px 10px !important; vertical-align: middle !important;">{{ $consignees->consignee_hours }}</td>
                                            <td class="dynamic-data" style="padding: 9px 10px !important; vertical-align: middle !important;">{{ $consignees->consignee_appointments }}</td>
                                            <td class="dynamic-data" style="padding: 9px 10px !important; vertical-align: middle !important;">{{ $consignees->consignee_status }}</td>
=======
                                            <td style="padding: 9px 10px !important; vertical-align: middle !important;">{{ $i++ }}</td>
                                            <td style="padding: 9px 10px !important; vertical-align: middle !important;">{{ $consignees->user->name }}</td>
                                            <td style="padding: 9px 10px !important; vertical-align: middle !important;">{{ $consignees->consignee_name }}</td>
                                            <td style="padding: 9px 10px !important; vertical-align: middle !important;">{{ $consignees->consignee_address }}</td>
                                            <td style="padding: 9px 10px !important; vertical-align: middle !important;">{{ $consignees->consignee_contact_email }}</td>
                                            <td style="padding: 9px 10px !important; vertical-align: middle !important;">{{ $consignees->consignee_telephone }}</td>
                                            <td style="padding: 9px 10px !important; vertical-align: middle !important;">{{ $consignees->consignee_hours }}</td>
                                            <td style="padding: 9px 10px !important; vertical-align: middle !important;">{{ $consignees->consignee_appointments }}</td>
                                            <td style="padding: 9px 10px !important; vertical-align: middle !important;">{{ $consignees->consignee_status }}</td>
>>>>>>> old-repo/master

                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection
