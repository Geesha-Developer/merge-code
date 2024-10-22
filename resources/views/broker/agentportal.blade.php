@extends('layouts.broker.app')
@section('content')
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
 <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<style>
.tab {
    background: #616C77;
}

.tab button {
  background: #a5a5a5;
    float: left;
    border: none;
    cursor: pointer;
    transition: 0.3s;
    font-size: 15px;
    padding: 9px;
    border-radius: 6px;
    margin: 0 6px;
    font-weight: 500;
    border: 1px solid #ccc !important;
}

.tab button:hover {
  border: 1px solid #ccc !important;
    border-radius: 6px;
    background: #263544;
    color: #fff !important;
}
.tab button.active {
  border: 1px solid #ccc !important;
    border-radius: 6px;
    background: #263544;
    color: #fff !important;
}

.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}
select.broker-list {
  margin: 4px 11px;
    padding: 5px 13px;
    border-radius: 8px;;
}
.broker-menu {
    padding: 5px 0;
}
</style>
</head>
<body>
    

<section class="content">
<div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Agent Data</h2>
                </div>
            </div>
        </div>
<div class="tab d-flex" style="justify-content: space-between;align-items: center;">
  <div>
    <select class="broker-list">
        <option value="">
          Select Broker
        </option>
        @foreach($brokers as $broker)
          <option value="{{$broker->id}}">
              {{$broker->name}}
          </option>
        @endforeach
    </select>  
  </div>
  <div class="broker-menu" style="display:none"> 
    <button class="tablinks all-data" onclick="openCity(event, 'All')" id="defaultOpen">All</button>
    <button class="tablinks customer-data" onclick="openCity(event, 'Customer')">Customer</button>
    <button class="tablinks carrier-data" onclick="openCity(event, 'Carrier')">Carrier</button>
    <button class="tablinks shipper-data" onclick="openCity(event, 'Shipper')">Shipper</button>
    <button class="tablinks consignee-data" onclick="openCity(event, 'Consignee')">Consignee</button>
    <button class="tablinks load-data" onclick="openCity(event, 'Load')">Load</button>
  </div>
</div>
<div id="All" class="tabcontent">
  <div class="content">
      <div class="crud-list">
        <!-- Links for the creation and other actions goes here -->
      </div>
        <div class="table-responsive">
          <table class="load-table table table-bordered table-hover js-basic-example dataTable no-footer">
            <thead>
              <tr>
                <!-- <th><input type="checkbox" id="select-invoice"></th> -->
                <th>Load #</th>
                <th>W/O #</th>
                <th>Customer Refrence #</th>
                <th>Customer #</th>
                <th>Load Create Date</th>
                <th>Shipper Date</th>
                <th>Deliver date</th>
                <th>Carrier</th>
                <th>Pickup Location</th>
                <th>Unloading Location</th>
                <th>Actual Del Date</th>
                <th>Load Status</th>
                <th>Margin</th>
                <th>Aging</th>
                <th>CPR Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <!-- DataTables will populate this -->
            </tbody>
          </table>
        </div>
      <div>
    </div>
  </div>  
</div>
<div id="Customer" class="tabcontent">
  <div class="content">
    <div class="crud-list">
        <!-- Links for the creation and other actions goes here -->
      </div>
      <div class="table-responsive">
        <table class="customer-table table table-bordered table-hover js-basic-example dataTable no-footer">
          <thead>
            <tr>
              <!-- <th><input type="checkbox" id="select-invoice"></th> -->
              <th>#</th>
              <th>Customer Name</th>
              <th>Customer Address</th>
              <th>Customer Telephone</th>
              <th>Date Added</th>
              <th>Agent</th>
              <th>Team Leader</th>
              <th>Manager</th>
              <th>Total Credit Limit</th>
              <th>Credit Used</th>
              <th>Remaing Credit</th>
              <th>Approved Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
              <!-- DataTables will populate this -->
          </tbody>
        </table>
      </div>
  </div>
</div>
      
<div id="Carrier" class="tabcontent">
  <div class="content">
    <div class="crud-list">
        <!-- Links for the creation and other actions goes here -->
    </div>
    <div class="table-responsive">
      <table class="carrier-table table table-bordered table-hover js-basic-example dataTable no-footer">
        <thead>
          <tr>
            <!-- <th><input type="checkbox" id="select-invoice"></th> -->
            <th>Carrier ID</th>
            <th>Carrier Name</th>
            <th>MC No. / FF No.</th>
            <th>Address</th>
            <th>Phone No.</th>
            <th>Date Added</th>
            <th>Added By Agent</th>
            <th>Team Leader</th>
            <th>Team Manager</th>
            <!-- <th>Status</th> -->
                                                       
          </tr>
        </thead>
        <tbody>
            <!-- DataTables will populate this -->
        </tbody>
      </table>
    </div>
  </div>
</div>
<div id="Shipper" class="tabcontent">
  <div class="content">
    <div class="crud-list">
        <!-- Links for the creation and other actions goes here -->
    </div>
    <div class="table-responsive">
      <table class="shipper-table table table-bordered table-hover js-basic-example dataTable no-footer">
        <thead>
          <tr>
            <!-- <th><input type="checkbox" id="select-invoice"></th> -->
            <tr>
                <th>Sr No</th>
                <th>Shipper</th>
                <th>Address</th>
                <th>Telephone</th>
                <th>Status</th>
                <th>Date Added</th>
                <th>Agent</th>
                <th>Team Leader</th>
                <th>Manager</th>
            </tr>
          </tr>
        </thead>
        <tbody>
            <!-- DataTables will populate this -->
        </tbody>
      </table>
    </div>
  </div>
</div>
<div id="Consignee" class="tabcontent">
  <div class="content">
    <div class="crud-list">
        <!-- Links for the creation and other actions goes here -->
    </div>
    <div class="table-responsive">
      <table class="consignee-table table table-bordered table-hover js-basic-example dataTable no-footer">
        <thead>
          <tr>
            <th>Sr No</th>
            <th>Consignee</th>
            <th>Address</th>
            <th>Telephone</th>
            <th>Date Added</th>
            <th>Agent</th>
            <th>Team Leader</th>
            <th>Manager</th>
            <!-- <th>Comment / Notes</th>
            <th>Action</th> -->
          </tr>
        </thead>
        <tbody>
            <!-- DataTables will populate this -->
        </tbody>
      </table>
    </div>
  </div>
</div>

<div id="Load" class="tabcontent">
  <div class="content">
      <div class="crud-list">
        <!-- Links for the creation and other actions goes here -->
      </div>
        <div class="table-responsive">
          <table class="load-table table table-bordered table-hover js-basic-example dataTable no-footer">
            <thead>
              <tr>
                <!-- <th><input type="checkbox" id="select-invoice"></th> -->
                <th>Load #</th>
                <th>W/O #</th>
                <th>Customer Refrence #</th>
                <th>Customer #</th>
                <th>Load Create Date</th>
                <th>Shipper Date</th>
                <th>Deliver date</th>
                <th>Carrier</th>
                <th>Pickup Location</th>
                <th>Unloading Location</th>
                <th>Actual Del Date</th>
                <th>Load Status</th>
                <th>Margin</th>
                <th>Aging</th>
                <th>CPR Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <!-- DataTables will populate this -->
            </tbody>
          </table>
        </div>
      <div>
    </div>
  </div>  
</div>
</section>

<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
  // getLoadData();
}
// document.getElementById("defaultOpen").click();
$('.broker-list').on('change',function(){
  if($(this).val() == "")
  {
    $('.broker-menu').hide();
  }
  else{
    $('.broker-menu').show();
  }
});
/**
 * Data Table Loaders STarts from here
 */
$('.all-data').on('click',function(){
  destroyDataTableIfExists('load-table');
  getLoadData();
});
$('.customer-data').on('click',function(){
  destroyDataTableIfExists('customer-table');
  getCustomerData();
});
$('.load-data').on('click',function(){
  destroyDataTableIfExists('load-table');
  getLoadData();
});
$('.consignee-data').on('click',function(){
  // consignee-table
  destroyDataTableIfExists('consignee-table');
  getConsigneeData();
});
$('.shipper-data').on('click',function(){
  // consignee-table
  destroyDataTableIfExists('shipper-table');
  getShipperData();
});
$('.carrier-data').on('click',function(){
  destroyDataTableIfExists('carrier-table');
  getCarrierData();
})


function getCarrierData(){
  $('.carrier-table').DataTable({
    processing: true,
    serverSide: true,
    ajax: {
        url: '{{ route('carrier-agent.data') }}',
        type: 'GET',
        data: function(d) {
            d.id = $('.broker-list').val();
        }
    },
    columns: [
        { data: 'id', name: 'id' },
        { data: 'carrier_name', name: 'carrier_name' },
        { data: 'carrier_mc_ff_input', name: 'carrier_mc_ff_input' },
        {
            data: null, // Use `null` when combining multiple fields
            name: 'carrier_full_address', // Give a custom name for this combined field
            render: function (data, type, row) {
                return row.carrier_address_two + ', ' + 
                      row.carrier_city + ', ' + 
                      row.carrier_state + ', ' + 
                      row.carrier_country;
            }
        },
        { data: 'carrier_telephone', name: 'carrier_telephone' },
        { data: 'created_at', name: 'created_at' },
        { data: 'user_name', name: 'user_name' },
        { data: 'teamlead', name: 'teamlead'},
        { data: 'manager', name: 'manager'},
        
        
        // { data: 'load_carrier', name: 'load_carrier' },
        // { data: 'load_carrier', name: 'load_carrier' },
        // { data: 'load_carrier', name: 'load_carrier' },
        // { data: 'load_actual_delivery_date', name: 'load_actual_delivery_date' },
        // { data: 'load_status', name: 'load_status' },
        // { data: 'load_status', name: 'load_status' },
        // { data: 'load_status', name: 'load_status' },
        // { data: 'cpr_check', name: 'cpr_check' },
      //   { data: 'action', name: 'action', orderable: false, searchable: false,
      //     render: function(data, type, row) {
      //     return '';
      //     } 
      //  }
    ]
  });
}
function getShipperData(){
  $('.shipper-table').DataTable({
    processing: true,
    serverSide: true,
    ajax: {
        url: '{{ route('shipper-agent.data') }}',
        type: 'GET',
        data: function(d) {
            d.id = $('.broker-list').val();
        }
    },
    columns: [
        { data: 'id', name: 'id' },
        { data: 'shipper_name', name: 'shipper_name' },
        // { data: 'customer_refrence_number', name: 'customer_refrence_number' },
        {
              data: null,
              name: 'customer_address_combined',
              render: function (data, type, row) {
                  return row.shipper_address + ', ' +
                      row.shipper_city + ', ' +
                      row.shipper_state + ', ' +
                      row.shipper_country + ', ' +
                      row.shipper_zip;
              }
            },
        { data: 'shipper_telephone', name: 'shipper_telephone' },
        { data: 'shipper_status', name: 'shipper_status' },
        { data: 'created_at', name: 'created_at' },
        { data: 'user_name', name: 'user_name' },
        { data: 'user_teamleader', name: 'user_teamleader' },
        { data: 'user_manager', name: 'user_manager' },
        // { data: 'load_status', name: 'load_status' },
        // { data: 'load_status', name: 'load_status' },
        // { data: 'cpr_check', name: 'cpr_check' },
        // { data: 'action', name: 'action', orderable: false, searchable: false,
        //   render: function(data, type, row) {
        //   return '<a href="#' + row.id + '"><i class="fa fa-edit text-info" style="padding: 7px 0;font-size: 18px;"></i></a>';
        //   } 
        //  }
    ]
  });
}

function getConsigneeData(){
  $('.consignee-table').DataTable({
    processing: true,
    serverSide: true,
    ajax: {
        url: '{{ route('consginee.data') }}',
        type: 'GET',
        data: function(d) {
            d.id = $('.broker-list').val();
        }
    },
    columns: [
        { data: 'id', name: 'id' },
        { data: 'consignee_name', name: 'consignee_name' },
        {
              data: null,
              name: 'customer_address_combined',
              render: function (data, type, row) {
                  return row.consignee_address + ', ' +
                      row.consignee_city + ', ' +
                      row.consignee_state + ', ' +
                      row.consignee_country + ', ' +
                      row.consignee_zip;
              }
            },
            { data: 'consignee_telephone', name: 'consignee_telephone' },
        { data: 'created_at', name: 'created_at' },
        { data: 'user_name', name: 'user_name' },
        { data: 'user_teamleader', name: 'user_teamleader' },
        { data: 'user_manager', name: 'user_manager' },
        // { data: 'load_carrier', name: 'load_carrier' },
        // { data: 'load_carrier', name: 'load_carrier' },
        // { data: 'load_carrier', name: 'load_carrier' },
        // { data: 'load_actual_delivery_date', name: 'load_actual_delivery_date' },
        // { data: 'load_status', name: 'load_status' },
        // { data: 'load_status', name: 'load_status' },
        // { data: 'load_status', name: 'load_status' },
        // { data: 'cpr_check', name: 'cpr_check' },
        // { data: 'action', name: 'action', orderable: false, searchable: false,
        //   render: function(data, type, row) {
        //   return '<a href="#' + row.id + '"><i class="fa fa-edit text-info" style="padding: 7px 0;font-size: 18px;"></i></a>';
        //   } 
        //  }
    ]
  });
}
//function to get the load data for all
function getLoadData() {
  $('.load-table').DataTable({
    processing: true,
    serverSide: true,
    ajax: {
        url: '{{ route('loads.data') }}',
        type: 'GET',
        data: function(d) {
            d.id = $('.broker-list').val();
        }
    },
    columns: [
        { data: 'load_number', name: 'load_number' },
        { data: 'load_workorder', name: 'load_workorder' },
        { data: 'customer_refrence_number', name: 'customer_refrence_number' },
        { data: 'load_bill_to', name: 'load_bill_to' },
        { data: 'created_at', name: 'created_at' },
        { data: 'created_at', name: 'created_at' },
        { data: 'created_at', name: 'created_at' },
        { data: 'load_carrier', name: 'load_carrier' },
        { data: 'load_carrier', name: 'load_carrier' },
        { data: 'load_carrier', name: 'load_carrier' },
        { data: 'load_actual_delivery_date', name: 'load_actual_delivery_date' },
        { data: 'load_status', name: 'load_status' },
        { data: 'load_status', name: 'load_status' },
        { data: 'load_status', name: 'load_status' },
        { data: 'cpr_check', name: 'cpr_check' },
        { data: 'action', name: 'action', orderable: false, searchable: false,
          render: function(data, type, row) {
            return '<a href="/Broker/load/Edit/' + row.id + '"><i class="fa fa-edit text-info" style="padding: 7px 0;font-size: 18px;"></i></a>';
          } 
         }
    ]
  });
}

function destroyDataTableIfExists(tableClass) {
    if ($.fn.DataTable.isDataTable(`.${tableClass}`)) {
        $(`.${tableClass}`).DataTable().clear().destroy();
    }
}

function getCustomerData() {
    $('.customer-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '{{ route('customers.data') }}',
            type: 'GET',
            data: function(d) {
                d.id = $('.broker-list').val(); // Custom filter or parameters if needed
            }
        },
        columns: [
            { data: 'id', name: 'id' }, // Regular column
            { data: 'customer_name', name: 'customer_name' },
            // Concatenating address-related fields into one line
            {
                data: null,
                name: 'customer_address_combined',
                render: function (data, type, row) {
                    return row.customer_address + ', ' +
                        row.customer_city + ', ' +
                        row.customer_state + ', ' +
                        row.customer_country + ', ' +
                        row.customer_zip;
                }
            },
            { data: 'customer_telephone', name: 'customer_telephone' },
            {
                data: 'created_at',
                name: 'created_at',
                render: function (data, type, row) {
                    var formattedDate = new Date(data).toLocaleDateString('en-GB'); // Format as 'dd/mm/yyyy'
                    return formattedDate;
                }
            },
            { data: 'user_name', name: 'user_name' }, // User name column
            { data: 'user_teamleader', name: 'user_teamleader' },
            { data: 'user_manager', name: 'user_manager' },
            { data: 'user_adv_customer_credit_limit', name: 'user_adv_customer_credit_limit' },
            { data: 'credit_balance', name: 'credit_balance' },
            { data: 'user_remaining_credit', name: 'user_remaining_credit' },
            { data: 'approved_status', name: 'approved_status' },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false,
                render: function(data, type, row) {
                    return '<a href="/edit-customer/' + row.id + '" class="btn btn-sm btn-primary">Edit</a>';
                }
            }
        ]
    });
}


</script>
   
@endsection