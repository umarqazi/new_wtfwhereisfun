<?php
/**
 * @author adeel
 * @package
 * @copyright 2018 Techverx.com
 * @project new_wtfwhereisfun
 */


/**
 * Created by PhpStorm.
 * User: adeel
 * Date: 11/23/18
 * Time: 11:32 AM
 */

namespace App\Repositories;
use App\Dispute;
use App\DisputeReply;
use Illuminate\Support\Facades\Auth;


class TicketDisputeRepo
{
    protected $disputeRepo;

    public function store($request,$id)
    {
        $dispute = new Dispute;
        $dispute->user_id = $id;
        $dispute->event_id = $request['event_id'];
        $dispute->event_order_id = $request['order_id'];
        $dispute->subject = $request['subject'];
        $dispute->message = $request['message'];
        $dispute->seen_by_user = 1;
        $dispute->save();

        return $dispute;
    }

    public function getByUserId($id)
    {
       return  Dispute::where('user_id', $id)->get();
    }

    public function getById($id)
    {
        return  Dispute::find($id);
    }


    public function getByOrderId($id)
    {
       return  Dispute::where('event_order_id', $id)->get();
    }

    public function getVendorDisputes($eventIds){
        return Dispute::whereIn('event_id', $eventIds)->get();
    }

    public function closeDispute($dispute){
       $dispute = Dispute::find($dispute);
       $dispute->is_closed = 1;
       return $dispute->save();
    }

    public function reply($request)
    {
        $user = Auth::user();
        $disputeReply = new DisputeReply();
        $disputeReply->message = $request['reply'];
        $disputeReply->user_id = $user->id;
        $disputeReply->dispute_id = $request['dispute_id'];
        $disputeReply->save();
        return  $disputeReply;

    }

    public function getVendor($dispute)
    {
        return $dispute->event->vendor->email;
    }

    public function changeSeenStatus($user,$dispute_details){
        $dispute = Dispute::find($dispute_details->id);
        if($user->hasRole('vendor')){
            $dispute->seen_by_vendor = 1;
        }else{
            $dispute->seen_by_user = 1;
        }

        $dispute->update();
    }

    public function changeReplySeenStatus($dispute_id){
        $user = Auth::user();
        $dispute = Dispute::find($dispute_id);
        if($user->hasRole('vendor')){
            $dispute->seen_by_vendor = 1;
            $dispute->seen_by_user = 0;
        }else{
            $dispute->seen_by_user = 1;
            $dispute->seen_by_vendor = 0;
        }
        $dispute->update();
    }

}