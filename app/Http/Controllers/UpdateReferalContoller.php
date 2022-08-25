<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Admin\ShippingCharge;
use App\Models\User;
use App\Models\MlmUser;
use App\Models\Cart;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;

class UpdateReferalContoller extends Controller
{
   public function updateReferal()
   {
	   $unique_id = MlmUser::orderBy('id', 'asc')->limit(5)->offset(6)->get()->toArray();
	   //echo '<pre>'; print_r($unique_id);
	   $j = 9; // where you want yo start
	   for($i=0; $i<=count($unique_id); $i++)
	  {
		  //$get = User::where('id',$unique_id[$i]['id'])->get();
		   $nextNumber = 'MLM000000' . $j;
		   $j++;
		  
		  $up = MlmUser::where('id',$unique_id[$i]['id'])->update(['member_id' => $nextNumber]);
	  }
   }
}