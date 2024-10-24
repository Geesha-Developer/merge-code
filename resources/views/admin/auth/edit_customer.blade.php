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
            <h2><b>Edit Customer</b></h2>
=======
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2><b>Edit Customer</b></h2>
                </div>
            </div>
>>>>>>> old-repo/master
        </div>

        <div class="container-fluid p-0">
            <!-- Multi Column -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <form method="POST" action="{{ route('update.customer', $customer->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="body">
                                <div class="row clearfix">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="customer_name">Customer Name<code>*</code></label>
                                            <input type="text" class="form-control" id="customer_name"
                                                name="customer_name" value="{{ $customer->customer_name }}" required>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="customer_address">MC# /FF#</label>
                                            <input type="text" class="form-control" id="customer_address"
                                                name="customer_address"
                                                value="{{ $customer->customer_mc_ff }} {{ $customer->customer_mc_ff_input }}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="customer_address">Customer Address <code>*</code></label>
                                            <input type="text" class="form-control" id="customer_address"
                                                name="customer_address" value="{{ $customer->customer_address }}"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="customer_country">Country <code>*</code></label>
                                            <input type="text" class="form-control" id="customer_country"
                                                name="customer_country" value="{{ $customer->customer_country }}"
                                                required>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="customer_state">State <code>*</code></label>
                                            <input type="text" class="form-control" id="customer_state"
                                                name="customer_state" value="{{ $customer->customer_state }}" required>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="customer_city">City<code>*</code></label>
                                            <input type="text" class="form-control" id="customer_city"
                                                name="customer_city" value="{{ $customer->customer_city }}" required>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="customer_zip">Zip<code>*</code></label>
                                            <input type="text" class="form-control" id="customer_zip"
                                                name="customer_zip" value="{{ $customer->customer_zip }}" required>
                                        </div>
                                    </div>

                                    

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="status">Status<code>*</code></label>
                                            <!-- <input type="text" class="form-control" id="status" name="status" value="{{ $customer->status }}" required readonly> -->
                                             <select type="text" class="form-control" id="status" name="status" required>
                                                <option value="">Please Select Status</option>
                                                <option value="Approved">Approved</option>
                                                <option value="Not Approved">Not Approved</option>
                                             </select>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="customer_telephone">Customer Telephone<code>*</code></label>
                                            <input type="text" class="form-control" id="customer_telephone"
                                                name="customer_telephone" value="{{ $customer->customer_telephone }}"
                                                required>
                                        </div>
                                    </div>
<<<<<<< HEAD
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Approved Credit Limits</label>
                                            <input class="form-control" type="number" value="{{ $customer->approved_limit }}" name="approved_limit" style="width: 100%;height:30px !important;padding: 0px 0 0 10px; ">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="adv_customer_credit_limit">Add Credit Limit <code>*</code></label>
=======

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="adv_customer_credit_limit">Credit Limit <code>*</code></label>
>>>>>>> old-repo/master
                                            <input type="text" class="form-control" id="adv_customer_credit_limit"
                                                name="adv_customer_credit_limit"
                                                value="{{ $customer->adv_customer_credit_limit }}" required>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
<<<<<<< HEAD
                                            <label for="remaining_credit">Remaining Limit <code>*</code></label>
                                            <input type="text" class="form-control" id="remaining_credit"
                                                name="remaining_credit"
                                                value="{{ $customer->remaining_credit }}" required readonly>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="used_amount">Used Amount <code>*</code></label>
                                            <input type="text" class="form-control" id="used_amount"
                                                name="used_amount"
                                                value="" readonly>
                                        </div>
                                    </div>





                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Assign Broker <code>*</code></label>
                                            <select class="form-control" required name="user_id" id="user_id">
=======
                                            <label>Assign Broker <code>*</code></label>
                                            <select class="form-control select2" required name="user_id" id="user_id">
>>>>>>> old-repo/master
                                                <option class="hiddenOption" disabled>Select Broker</option>
                                                @foreach($users as $user)
                                                <option value="{{ $user->id }}"
                                                    {{ $user->id == $customer->user_id ? 'selected' : '' }}>
                                                    {{ $user->name }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Commenter's Name<code>*</code></label>
<<<<<<< HEAD
                                            <select class="form-control" required name="commenter_name[]"
=======
                                            <select
                                                style="font-family: 'Poppins', sans-serif;font-weight: 400;font-size: 9px;line-height: 0.2em;color: #666;width: 100%;padding: 0px 0 0 10px;"
                                                class="form-control select2" required name="commenter_name[]"
>>>>>>> old-repo/master
                                                id="commenter_name">
                                                @if($customer->commenter_name)
                                                @else
                                                <option value="Please Select">Please Select</option>
                                                @endif
                                                <option value="Adam Smith">Adam Smith</option>
                                                <option value="Amren">Amren</option>
                                            </select>
                                        </div>
                                    </div>
<<<<<<< HEAD
                                    
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Comment</label>
                                            <textarea name="comment_notes[]" class="form-control" cols="60" rows="5">{{ is_array($customer->comment_notes) ? implode("\n", json_decode($customer->comment_notes, true)) : $customer->comment_notes }}</textarea>
                                        </div>
                                    </div>

=======
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Comment</label>
                                            <textarea name="comment_notes[]" class="form-control" cols="60"
                                                rows="5">{{ $customer->comment_notes }}</textarea>
                                        </div>
                                    </div>
>>>>>>> old-repo/master
                                    <div id="commentFields">
                                        <!-- Initial comment fields here -->
                                    </div>
                                </div>
                                <div class="text-center mt-4">
                                    <button type="submit" class="btn btn-info">Update</button>
                                    <a class="btn btn-danger" href="https://crmcargoconvoy.co/broker_data">Cancel</a>
                                </div>
                            </div>
                    </div>
                    </form>


                </div>
            </div>
            </form>
        </div>
    </div>
    </div>
    </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#addComment').click(function () {
            var html = '<div class="col-md-12">';
            html += '<div class="form-group">';
            html += '<label>Commenter\'s Name</label>';
            html +=
<<<<<<< HEAD
                '<select style="font-family: \'Poppins\', sans-serif;font-weight: 400;font-size: 9px;line-height: 0.2em;color: #666;width: 100%;height:30px;padding: 0px 0 0 10px;" class="form-control" required name="commenter_name[]" id="commenter_name">';
=======
                '<select style="font-family: \'Poppins\', sans-serif;font-weight: 400;font-size: 9px;line-height: 0.2em;color: #666;width: 100%;height:30px;padding: 0px 0 0 10px;" class="form-control select2" required name="commenter_name[]" id="commenter_name">';
>>>>>>> old-repo/master
            html += '<option value="Please Select">Please Select</option>';
            html += '<option value="Adam Smith">Adam Smith</option>';
            html += '<option value="Amren">Amren</option>';
            html += '</select>';
            html += '</div>';
            html += '</div>';
            html += '<div class="col-md-12">';
            html += '<div class="form-group">';
            html += '<label>Comment</label>';
            html +=
                '<textarea name="comment_notes[]" class="form-control" cols="60" rows="5"></textarea>';
            html += '</div>';
            html += '</div>';

            $('#commentFields').append(html);
        });
    });
</script>

<<<<<<< HEAD
<script>
$(document).ready(function() {
    // Get the original remaining credit and credit limit
    let originalRemainingCredit = parseFloat($('#remaining_credit').val());
    let originalCreditLimit = parseFloat($('#adv_customer_credit_limit').val());

    // Function to update used amount
    function updateUsedAmount() {
        let newCreditLimit = parseFloat($('#adv_customer_credit_limit').val());
        let updatedRemainingCredit = parseFloat($('#remaining_credit').val());

        // Calculate the used amount
        let usedAmount = newCreditLimit - updatedRemainingCredit;

        // Update the used amount field
        $('#used_amount').val(usedAmount.toFixed(2));
    }

    // Listen for changes in the credit limit input
    $('#adv_customer_credit_limit').on('input', function() {
        // Get the new credit limit value entered by the user
        let newCreditLimit = parseFloat($(this).val());

        // If the entered value is not a number, set it to 0
        if (isNaN(newCreditLimit)) {
            newCreditLimit = 0;
        }

        // Calculate the new remaining credit
        let updatedRemainingCredit = originalRemainingCredit + (newCreditLimit - originalCreditLimit);

        // Update the remaining credit field
        $('#remaining_credit').val(updatedRemainingCredit.toFixed(2));

        // Update the used amount
        updateUsedAmount();
    });

    // Initial calculation of the used amount on page load
    updateUsedAmount();
});
</script>


=======
>>>>>>> old-repo/master
@endsection