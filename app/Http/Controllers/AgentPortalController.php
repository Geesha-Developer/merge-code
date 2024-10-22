<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;

/* Model Import*/
use App\Models\customer;
use App\Models\External;
use App\Models\Shipper;
use App\Models\Consignee;
use App\Models\Load;
use App\Models\User;
class AgentPortalController extends Controller
{
    //

    public function agentPortal(){
        $user = auth()->user();
        
        if(!$user){
            $user = Auth::guard('teamlead')->user();  
        }
        $usersData = User::where('team_lead',$user->id)->get(); 
        return view('broker.agentportal')->with([
            'brokers' => $usersData,
            'user' => $user,
        ]);
    }

    public function getExternalData(Request $request)
    {
        $userId = $request->id;
    
        // Fetch the external entries with their associated users
        $carrierNames = External::where('user_id', $userId)
                        ->with('user') // Eager load the user relationship
                        ->get();
    
        return DataTables::of($carrierNames)
            // Add action column with edit button
            ->addColumn('action', function($carrier) {
                return '<a href="'.route('carriers.edit', $carrier->id).'" class="btn btn-sm btn-primary">Edit</a>';
            })
    
            // Add user name column (name from the related user)
            ->addColumn('user_name', function($carrier) {
                return $carrier->user ? $carrier->user->name : 'N/A'; // Return user's name or 'N/A'
            })
            ->addColumn('teamlead', function($carrier) {
                return $carrier->user ? $carrier->user->team_lead : 'N/A'; // Return user's name or 'N/A'
            })
            ->addColumn('manager', function($carrier) {
                return $carrier->user ? $carrier->user->manager : 'N/A'; // Return user's name or 'N/A'
            })
            
            ->make(true); // Return the DataTables response
    }
    
    // public function getConsignee(Request $request){
    //     $userId = $request->id;
    //      $allConsignees = Consignee::where('user_id', $userId)->get();
    //      return DataTables::of($allConsignees)
    //         ->addColumn('action', function($allConsignees) {
    //             return '<a href="'.route('users.edit', $allConsignees->id).'" class="btn btn-sm btn-primary">Edit</a>';
    //         })
    //         ->make(true);
    // }
    public function getCustomerData(Request $request)
    {
        $userId = $request->id;
    
        // Fetch the customers where user_id matches, and eager load the 'user' relationship
        $customerData = customer::where('user_id', $userId)
                        ->with('user') // Eager load the user relationship
                        ->get();
    
        return DataTables::of($customerData)
            // Add the user name column
            ->addColumn('user_name', function($customer) {
                return $customer->user ? $customer->user->name : 'N/A'; // Return user name or 'N/A' if no user is found
            })
            ->addColumn('user_manager', function($customer) {
                return $customer->user ? $customer->user->manager : 'N/A';
            })
            ->addColumn('user_teamleader', function($customer) {
                return $customer->user ? $customer->user->team_lead : 'N/A';
            })
            ->addColumn('user_adv_customer_credit_limit', function($customer) {
                return $customer->user ? $customer->user->adv_customer_credit_limit : 'N/A';
            })
            ->addColumn('user_remaining_credit', function($customer) {
                return $customer->user ? $customer->user->remaining_credit : 'N/A';
            })
            ->addColumn('credit_balance', function($customer) {
                $creditLimit = $customer->user ? $customer->user->adv_customer_credit_limit : 0; // Default to 0 if no user
                $remainingCredit = $customer->user ? $customer->user->remaining_credit : 0; // Default to 0 if no user
                $balance = $creditLimit - $remainingCredit;
    
                return $balance >= 0 ? $balance : 'N/A'; // Return balance or 'N/A' if negative
            })
            ->addColumn('approved_status', function($customer) {
                return $customer->user ? $customer->user->status : 'N/A';
            })
            // ->addColumn('action', function($customer) {
            //     return '<a href="/edit-customer/' + row.id + '" class="btn btn-sm btn-primary">Edit</a>';
            // })
            ->make(true);
    }
    


    public function getShipperData(Request $request){
        $userId = $request->id;
        $shipperData = Shipper::where('user_id',$userId)->with('user')->get();
        return DataTables::of($shipperData)
        ->addColumn('user_name', function($shipper) {
            return $shipper->user ? $shipper->user->name : 'N/A'; // Return user name or 'N/A' if no user is found
        })
        ->addColumn('user_manager', function($shipper) {
            return $shipper->user ? $shipper->user->manager : 'N/A';
        })
        ->addColumn('user_teamleader', function($shipper) {
            return $shipper->user ? $shipper->user->team_lead : 'N/A';
        })
            // ->addColumn('action', function($shipperData) {
            //     return '<a href="'.route('shipper.edit', $shipperData->id).'" class="btn btn-sm btn-primary">Edit</a>';
            // })
            ->make(true);
    }


    public function getLoadData(Request $request) {
        $userId = $request->id;
    
        // Retrieve the loads for the given user ID and order by id descending
        $loads = Load::where('user_id', $userId)->orderBy('id', 'desc')->get();
    
        return DataTables::of($loads)
            // ->addColumn('action', function($load) {
            //     // Use route helper to create the edit URL
            //     return '<a href="'.route('loads.edit', $load->id).'" class="btn btn-sm btn-primary">Edit</a>';
            // })
            ->make(true);
    }
    


    public function getConsigneeData(Request $request){
        $userId = $request->id;
        $consignee = Consignee::where('user_id', $userId)->with('user')->get();
        return DataTables::of($consignee)
            // ->addColumn('action', function($consignee) {
            //     return '<a href="'.route('consignees.edit', $consignee->id).'" class="btn btn-sm btn-primary">Edit</a>';
            // })
        ->addColumn('user_name', function($consignee) {
        return $consignee->user ? $consignee->user->name : 'N/A'; // Return user name or 'N/A' if no user is found
        })
        ->addColumn('user_manager', function($consignee) {
            return $consignee->user ? $consignee->user->manager : 'N/A';
        })
        ->addColumn('user_teamleader', function($consignee) {
            return $consignee->user ? $consignee->user->team_lead : 'N/A';
        })
            ->make(true);
    }

}
