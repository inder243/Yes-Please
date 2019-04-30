<?php

namespace App\Http\Controllers\business_user;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\YpBusinessUsers;
use App\Models\YpBusinessMembers;
use App\Models\YpBusinessCategories;
use App\Models\YpBusinessProductPromote;
use App\Models\YpBusinessUserCategories;
use File;
use Illuminate\Support\Facades\DB;
use Session;
use Redirect;

class BusinessMembersController extends Controller
{
  /**
  * Create a new controller instance.
  *
  * @return void
  */
  public function __construct()
  {
    $this->middleware('auth:business_user');
  }


  /******
  **fn to show members page
  *******/
  public function getMembers(){
    $b_id            = Auth::user()->id;

    $get_allmembers = YpBusinessMembers::where('business_id',$b_id)->get()->toArray();

    return view('business.members.members')->with(['all_members'=>$get_allmembers]);

  }/**fn ends here**/

  /******
  **fn to save members
  *******/
  public function saveMembers(Request $request){

    $business_user_id   = Auth::user()->business_userid;
    $b_id               = Auth::user()->id;

    if(isset($_POST)){

      if(isset($request->name)){
        $name   = $request->name;
      }else{
        $name   = '';
      }

      if(isset($request->phone)){
        $phone   = $request->phone;
      }else{
        $phone   = '';
      }

      if(isset($request->email)){
        $email   = $request->email;
      }else{
        $email   = '';
      }

      if(isset($request->notes)){
        $notes   = $request->notes;
      }else{
        $notes   = '';
      }
      
      $added_date = date("d/m/Y");

      if(isset($request->membrId)){

        $member_id = $request->membrId;
        $update_member = array('name' => $name,'phone' => $phone,'email'=>$email,'notes'=>$notes);
        $updateMember = YpBusinessMembers::where(['business_id'=>$b_id,'member_id'=>$member_id])->update($update_member);

        if($updateMember){
          return response()->json(['success'=>'1','message'=>'Successfully updated']);
        }else{
          return response()->json(['success'=>'0','message'=>'Please try again!']);
        }

      }else{
        /***create product id***/
        $member_id = str_shuffle(rand(1,1000).strtotime("now"));

        $YpBusinessMembers              = new YpBusinessMembers;
        $YpBusinessMembers->member_id   = $member_id;
        $YpBusinessMembers->business_id = $b_id;
        $YpBusinessMembers->name        = $name;
        $YpBusinessMembers->phone       = $phone;
        $YpBusinessMembers->email       = $email;
        $YpBusinessMembers->notes       = $notes;
        $YpBusinessMembers->added_date  = $added_date;
        $YpBusinessMembers->save();

        return response()->json(['success'=>'1','message'=>'Success']);
      }
      

    }/****isset post ends**/

  }/**fn ends here**/

  /*****
  **fn to get members for edit member
  *****/
  public function getEditMembers(Request $request){
    $b_id               = Auth::user()->id;
    if(isset($_POST)){
      $member_id = $request->member_id;

      $get_members = YpBusinessMembers::where(['member_id'=>$member_id,'business_id'=>$b_id])->first();

      if(!empty($get_members)){
        $name = $get_members->name;
        $phone = $get_members->phone;
        $email = $get_members->email;
        $notes = $get_members->notes;

        return response()->json(['success'=>'1','message'=>'Success','name'=>$name,'phone'=>$phone,'email'=>$email,'notes'=>$notes]);

      }else{
         return response()->json(['success'=>'2','message'=>'No member Found']); 
      }
      
    }/***isset ends***/
  }/***get member ends here**/

}