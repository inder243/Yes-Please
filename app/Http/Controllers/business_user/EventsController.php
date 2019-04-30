<?php

namespace App\Http\Controllers\business_user;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\YpBusinessUsers;
use App\Models\YpVerificationBusinessUsers;
use App\Models\YpBusinessUsercategories;
use App\Models\YpBusinessCategories;
use App\Models\YpBusinessSubCategories;
use App\Models\YpBusinessHashtags;
use App\Models\Yphashtag;
use App\Models\YpBusinessDetails;
use App\Models\YpBusinessUserHashtags;
use App\Models\YpBusinessUsersQuotes;
use App\Models\YpFormQuestions;
use App\Models\YpBusinessSelectedServices;
use App\Models\YpBusinessUserTransactions;
use App\Models\YpBusinessUserCcDetails;
use App\Models\YpCampaignCategory;
use App\Models\YpCampaignDetail;
use App\Models\YpCampaignImpression;
use App\Models\YpCampaignClick;
use App\Models\YpBusinessUserEvents;
use App\Http\Traits\BusinessUserProSettingsTrait;

use File;
use Illuminate\Support\Facades\DB;
use Session;

class EventsController extends Controller
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
    /**
     * show dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    use BusinessUserProSettingsTrait;

    public function listEvents(Request $request)
    {
       
       $b_id = Auth::id();
       $getEvents =  YpBusinessUserEvents::select('id','title','from_date','to_date','from_time','to_time')->where('b_id',$b_id)->get();
        $eventsJson = array();
        foreach ($getEvents as $event) {
            $eventsJson[] = array(
                'id' => $event->id,
                'title' => $event->title,
                'start'=>$event->from_date.' '.$event->from_time,
                'end' => $event->to_date.' '.$event->to_time,
            );
        }

         return response()->json($eventsJson);
        
    }
    //function thet will render events 
    public function getEvents(Request $request)
    {
        return view('/business/event_dashboard');
    }

    public function saveEvent(Request $request)
    {
        //save event
        $b_id = Auth::id();
        YpBusinessUserEvents::create([
            'title' => $request->title,
            'from_date' => $request->datefrom,
            'to_date'  => $request->dateto,
            'from_time' => $request->timefrom,
            'to_time' => $request->timeto,
            'type'   => 2,
            'b_id'     => $b_id,
                    
        ]);
        
        return redirect('business_user/events');
        
    }

    public function updateEvent(Request $request)
    {
        //update event

        $updateDetails = [
            'title' => $request->title,
            'from_date' => $request->datefrom,
            'to_date'  => $request->dateto,
            'from_time' => $request->timefrom,
            'to_time' => $request->timeto,
        ];

        YpBusinessUserEvents::where('id', $request->event_id)
            ->update($updateDetails);
        return redirect('business_user/events');
    }

    

}
