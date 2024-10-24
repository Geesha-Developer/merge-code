@extends('layouts.broker.app')
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
    .form-group {
       font-family: 'poppins' !important;
    }
    .modal .card-header h3 {
        font-size: 15px !important;
        text-align: left;
        margin-left: 21px;
        font-weight: 700;
    }

    .modal .modal-header .close {
        color: #000;
        text-shadow: none;
        padding: 0 5px;
        font-size: 32px;
        top: 26px;
    }

    .modal .modal-title {
        font-size: 15px;
        text-align: left;
        font-weight: 700;
    }

    .modal-content .modal-header .modal-title {
        margin-top: 19px !important;
    }
</style>
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <h2>MC Check </h2>
        </div>
        <div class="container-fluid">
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 p-0">
                    <div class="card">
                        <div class="body">
                            <div class="table-responsive">
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#exampleModal">ADD MC</button>
                                <table class="table table-bordered table-hover js-basic-example dataTable">

                                    <thead>
                                        <tr>
                                            <th>MC NO</th>
                                            <th>DOT</th>
                                            <th>Carrier Name</th>
                                            <th>Added By Agent</th>
                                            <th>Added Date</th>
                                            <th>MC Check</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($mc as $m)
                                        <tr>
                                            <td class="dynamic-data">{{ $m->carrier_mc_ff_input }}</td>
                                            <td class="dynamic-data">{{ $m->carrier_dot }}</td>
                                            <td class="dynamic-data">{{ $m->carrier_name }}</td>
                                            <td class="dynamic-data">{{ $m->user->name }}</td>
                                            <td class="dynamic-data">{{ $m->created_at }}</td>
                                            @if($m->mc_check == "Approved")
                                            <td class="dynamic-data" style="color:green;">Approved</td>
                                            @else
                                            <td class="dynamic-data" style="color:red;">Not Approved</td>
                                            @endif
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
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close mt-0" data-dismiss="modal" style="color: #000;">&times;</button>
            </div>
            <form method="POST" action="{{ route('mc.check.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card-header">
                    <h3 class="card-title">Add MC Check</h3>
                </div>
                <div class="card-body text-left">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Dispatcher Name <code>*</code></label>
                                <input type="text" name="dispatcher_name" class="form-control" value="{{ Auth::user()->name ? strtoupper(Auth::user()->name) : 'Profile' }}" readonly required style="width: 100%;">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>MC Number <code>*</code></label>
                                <input type="number" name="mc_number" class="form-control" required style="width: 100%;">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Carrier Name<code>*</code></label>
                                <input type="text" name="carrier_name" class="form-control" required style="width: 100%;">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Carrier Email<code>*</code></label>
                                <input type="email" name="carrier_email" class="form-control" required style="width: 100%;">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Contact Number<code>*</code></label>
                                <input type="number" name="contact_number" class="form-control" required style="width: 100%;">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Commodity Type <code>*</code></label>
                                <input type="text" name="commodity_type" class="form-control select2" required style="width: 100%;height:30px;padding: 0px 0 0 10px;">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Commodity Name <code>*</code></label>
                                <input type="text" name="commodity_name" class="form-control select2" required style="width: 100%;height:30px;padding: 0px 0 0 10px;">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Commodity Value <code>*</code></label>
                                <input type="number" name="commodity_value" class="form-control select2" required style="width: 100%;height:30px;padding: 0px 0 0 10px;">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Equipment Type<code>*</code></label>
                                <select class="form-control select2" name="load_equipment_type" id="load_equipment_type" style="width: 100%;" required>
                                    <option value="">Select Equipment </option>
                                    <option value="Container Trailer">Container Trailer</option>
                                    <option value="22' VAN">22' VAN</option>
                                    <option value="48' Reefer">48' Reefer</option>
                                    <option value="53' Reefer">53' Reefer</option>
                                    <option value="53' VAN">53' VAN</option>
                                    <option value="Air Freight">Air Freight</option>
                                    <option value="Anhydros Ammonia">Anhydros Ammonia</option>
                                    <option value="Animal Carrier">Animal Carrier</option>
                                    <option value="Any Equipment">Any Equipment</option>
                                    <option value="Searching Services only">Any Equipment (Searching Services only)</option>
                                    <option value="Auto Carrier">Auto Carrier</option>
                                    <option value="B-Train/Supertrain">B-Train/Supertrain</option>
                                    <option value="Canada Only">B-Train/Supertrain(Canada Only)</option>
                                    <option value="Beam">Beam</option>
                                    <option value="Belly Dump">Belly Dump</option>
                                    <option value="Blanket Wrap Van">Blanket Wrap Van</option>
                                    <option value="Boat Hauling Trailer">Boat Hauling Trailer</option>
                                    <option value="Cargo Van (1 Ton)">Cargo Van (1 Ton)</option>
                                    <option value="Cargo Vans (1 Ton capacity)">Cargo Vans (1 Ton capacity)</option>
                                    <option value="Cargo/Small/Sprinter Van">Cargo/Small/Sprinter Van</option>
                                    <option value="Conestoga">Conestoga</option>
                                    <option value="Convertible Hopper">Convertible Hopper</option>
                                    <option value="Conveyor Belt">Conveyor Belt</option>
                                    <option value="Crane Truck">Crane Truck</option>
                                    <option value="Curtain Siders">Curtain Siders</option>
                                    <option value="Curtain Van">Curtain Van</option>
                                    <option value="Double Drop">Double Drop</option>
                                    <option value="Double Drop Extendable">Double Drop Extendable</option>
                                    <option value="Drive Away">Drive Away</option>
                                    <option value="Dump Trucks">Dump Trucks</option>
                                    <option value="End Dump">End Dump</option>
                                    <option value="Flat Intermodal">Flat Intermodal</option>
                                    <option value="Flat with Traps">Flat with Traps</option>
                                    <option value="FlatBed">FlatBed</option>
                                    <option value="FlatBed - Air-ride">FlatBed - Air-ride</option>
                                    <option value="Flatbed Blanket Wrapped">Flatbed Blanket Wrapped</option>
                                    <option value="Flatbed Intermodal">Flatbed Intermodal</option>
                                    <option value="Flatbed or Step Deck">Flatbed or Step Deck</option>
                                    <option value="Flatbed or Van">Flatbed or Van</option>
                                    <option value="Flatbed or Vented Van">Flatbed or Vented Van</option>
                                    <option value="Flatbed Over-Dimension Loads">Flatbed Over-Dimension Loads</option>
                                    <option value="Flatbed With Sides">Flatbed With Sides</option>
                                    <option value="Flatbed, Step Deck or Van">Flatbed, Step Deck or Van</option>
                                    <option value="Flatbed, Van or Reefer">Flatbed, Van or Reefer</option>
                                    <option value="Flatbed, Vented Van or Reefer">Flatbed, Vented Van or Reefer</option>
                                    <option value="Haul and Tow Unit">Haul and Tow Unit</option>
                                    <option value="Hazardous Material Load">Hazardous Material Load</option>
                                    <option value="Hopper Bottom">Hopper Bottom</option>
                                    <option value="Hot Shot">Hot Shot</option>
                                    <option value="Labour">Labour</option>
                                    <option value="Landoll Flatbed">Landoll Flatbed</option>
                                    <option value="Live Bottom Trailer">Live BottomTrailer</option>
                                    <option value="Load-Out">Load-Out</option>
                                    <option value="Load-Out are empty trailers you load and haul">Load-Out are empty trailers you load and haul</option>
                                    <option value="Lowboy">Lowboy</option>
                                    <option value="Lowboy Over-Dimension Loads">Lowboy Over-Dimension Loads</option>
                                    <option value="Maxi or Double Flat Trailers">Maxi or Double Flat Trailers</option>
                                    <option value="Mobile Home">Mobile Home</option>
                                    <option value="Moving Van">Moving Van</option>
                                    <option value="Multi-Axle Heavy Hauler">Multi-Axle Heavy Hauler</option>
                                    <option value="Ocean Freight">Ocean Freight</option>
                                    <option value="Open Top">Open Top</option>
                                    <option value="Open Top Van">Open Top Van</option>
                                    <option value="Pneumatic">Pneumatic</option>
                                    <option value="Power Only">Power Only</option>
                                    <option value="Power Only (Tow-Away)">Power Only (Tow-Away)</option>
                                    <option value="Rail">Rail</option>
                                    <option value="Reefer Pallet Exchange">Reefer Pallet Exchange</option>
                                    <option value="Refrigerated (Reefer)">Refrigerated (Reefer)</option>
                                    <option value="Refrigerated Carrier with Plant Decking">Refrigerated Carrier with Plant Decking</option>
                                    <option value="Refrigerated Intermodal">Refrigerated Intermodal</option>
                                    <option value="Removable Goose Neck">Removable Goose Neck</option>
                                    <option value="Multi-Axle Heavy Haulers">Removable Goose Neck &amp; Multi-Axle Heavy Haulers</option>
                                    <option value="GN Extendable">RGN Extendable</option>
                                    <option value="Roll Top Conestoga">Roll Top Conestoga</option>
                                    <option value="Roller Bed">Roller Bed</option>
                                    <option value="Specialized Trailers">Specialized Trailers</option>
                                    <option value="Step Deck">Step Deck</option>
                                    <option value="Step Deck Conestoga">Step Deck Conestoga</option>
                                    <option value="Step Deck Extendable">Step Deck Extendable</option>
                                    <option value="Step Deck or Flat">Step Deck or Flat</option>
                                    <option value="Step Deck or Removable Gooseneck">Step Deck or Removable Gooseneck</option>
                                    <option value="Step Deck Over-Dimension Loads">Step Deck Over-Dimension Loads</option>
                                    <option value="Step Deck with Loading Ramps">Step Deck with Loading Ramps</option>
                                    <option value="Straight Van">Straight Van</option>
                                    <option value="Stretch Trailer or Ext. Flat">Stretch Trailer or Ext. Flat</option>
                                    <option value="Stretch Trailer or Extendable Flatbed">Stretch Trailer or Extendable Flatbed</option>
                                    <option value="Supplies">Supplies</option>
                                    <option value="Tandem Van">Tandem Van</option>
                                    <option value="Tanker">Tanker</option>
                                    <option value="Tanker (Food grade, liquid, bulk, etc.)">Tanker (Food grade, liquid, bulk, etc.)</option>
                                    <option value="Team Driver Needed">Team Driver Needed</option>
                                    <option value="Tridem">Tridem</option>
                                    <option value="Two 24 or 28 Foot Flatbeds">Two 24 or 28 Foot Flatbeds</option>
                                    <option value="Unspecified Specialized Trailers">Unspecified Specialized Trailers</option>
                                    <option value="Van">Van</option>
                                    <option value="Van - Air-Ride">Van - Air-Ride</option>
                                    <option value="Van Intermodal">Van Intermodal</option>
                                    <option value="Van or Flatbed">Van or Flatbed</option>
                                    <option value="Van or Reefer">Van or Reefer</option>
                                    <option value="Van Pallet Exchange">Van Pallet Exchange</option>
                                    <option value="Van with Liftgate">Van with Liftgate</option>
                                    <option value="Van, Reefer or Double Drop">Van, Reefer or Double Drop</option>
                                    <option value="Vented Insulated Van">Vented Insulated Van</option>
                                    <option value="Vented Insulated Van or Refrigerated">Vented Insulated Van or Refrigerated</option>
                                    <option value="Vented Van">Vented Van</option>
                                    <option value="Vented Van or Refrigerated">Vented Van or Refrigerated</option>
                                    <option value="Walking Floor">Walking Floor</option>
                                    <option value="BOX Truck">BOX Truck</option>
                                    <option value="Reefer Container">Reefer Container</option>
                                    <option value="Tandem">Tandem</option>
                                    <option value="B Train">B Train</option>
                                    <option value="Flatbed with Tarps">Flatbed with Tarps</option>
                                    <option value="Flatbed with straps">Flatbed with straps</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>MC Purpose<code>*</code></label>
                                <input type="text" name="mc_purpose" class="form-control" required style="width: 100%;">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Commodity Value Proof <code>*</code></label>
                                <input class="form-control" type="file" id="myFile" name="commodity_file">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer mt-4">
                        <input type="submit" class="btn btn-info" value="Add">
                        <input type="button" class="btn btn-danger" data-dismiss="modal" value="Cancel">
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        // Inject CSS dynamically via JavaScript
        var style = '<style>' +
                        'tbody tr.highlight-row {' +
                            'background-color: #aae900 !important;' +
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
<div class="modal" id="exception">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Raise Exception</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form method="POST">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Reason for Exception <code>*</code></label>
                            <textarea required style="width: 100%;border: 1px solid #ced4da;"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Ops Manager's Comments <code>*</code></label>
                            <textarea required style="width: 100%;border: 1px solid #ced4da;"></textarea>
                        </div>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">Raise Exception</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
