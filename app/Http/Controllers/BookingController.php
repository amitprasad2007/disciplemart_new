<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use App\Nodels\Setting;
use Auth;
use App\Models\User;
use Session;
use DB;
use RealRashid\SweetAlert\Facades\Alert;


class BookingController extends Controller
{
     public function transactions() {
        $bookings = DB::table('bookings')
                            ->where('txnid','!=','')    
                            ->orderBy('bookings.id','desc');                     
        $bookings = $bookings->get();
        $allbookings = array();
        foreach($bookings as $booking):
            $booking->courses = DB::table('booking_courses')->where('booking_id','=',$booking->booking_id)->get();
            $allbookings[] = $booking;
        endforeach;
        $bookings = $allbookings;
        return view('admin.bookings.transactions', compact('bookings'));
    }
    public function bookings() {
  		$bookings = DB::table('bookings')
                    ->orderBy('bookings.id','desc');                     
        $bookings = $bookings->get();
        $allbookings = array();
        foreach($bookings as $booking):
            $booking->courses = DB::table('booking_courses')->where('booking_id','=',$booking->booking_id)->get();
            $allbookings[] = $booking;
        endforeach;
        $bookings = $allbookings;
        return view('admin.bookings.index', compact('bookings'));
    }
     public function bookingDetails($id) {
        
        $booking = DB::table('bookings')->find($id);
        $booking->courses = DB::table('booking_courses')->where('booking_id','=',$booking->booking_id)->get();
        return view('admin.bookings.show', compact('booking'));
    }
    	
    	public function bookingUpdate(Request $request, $id)
    {
        $booking = DB::table('bookings')->find($id);
               
        if($request->all()) {
            $input = $request->all();
            dd($input);
            unset($input['_method'],$input['_token']);
			 DB::table('bookings')->where('id','=',$id)->update($input);
		
			$booking = DB::table('bookings')->where('id','=',$id)->first();
			
			if($input['is_delivered'] == 1)
			{
				if($booking->member_phone != '' && $booking->member_phone != NULL)
				{
					$sms_message = urlencode('Courier details for your booking #'.$booking->booking_id.' is '.$input['courier_details'].'');

					$handle = curl_init();
					 
					$url = 'http://t.onetouchsms.in/sendsms.jsp?user=demoac&password=demoac&mobiles='.$booking->member_phone.'&sms='.$sms_message.'&senderid=ONETCH';

					curl_setopt($handle, CURLOPT_URL, $url);

					curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
					 
					$output = curl_exec($handle);
					 
					curl_close($handle);
				}
			}
			
			if($input['is_delivered'] == 2)
			{
				if($booking->member_phone != '' && $booking->member_phone != NULL)
				{
					$sms_message = urlencode('Your booking #'.$booking->booking_id.' has been delivered successfully.');

					$handle = curl_init();
					 
					$url = 'http://t.onetouchsms.in/sendsms.jsp?user=demoac&password=demoac&mobiles='.$booking->member_phone.'&sms='.$sms_message.'&senderid=ONETCH';
					 

					curl_setopt($handle, CURLOPT_URL, $url);

					curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
					 
					$output = curl_exec($handle);
					 
					curl_close($handle);
				}
			}
			

            if(isset($input['status'])) {
                echo 'success';
            } else {
Alert::Html('Success', '<h2> Courier Details Updated Successfully </h2>','success');
                return redirect()->route('bookings.index');
            }    
        }   
    }
      public function ticketsChangeStatus($id) {
        
        $ticket = DB::table('support_tickets')->find($id);
        $status = $ticket->is_solved;

        if ($status == 0) {
            $ticketdata['is_solved'] = '1';
            $msg = 'Ticket solved';
            $alert = 'alert-success';
        } else {
            $ticketdata['is_solved'] = '0';
            $msg = 'Ticket waiting';
            $alert = 'alert-danger';
        }
        $tickets = DB::table('support_tickets')->update($ticketdata);
        //$tickets->save();

Alert::Html('Success', '<h2> Status Changed Successfully </h2>','success');
        return redirect('tickets');}

  public function tickets() {
        
        $tickets = DB::table('support_tickets')->select('support_tickets.*', 'users.name as member_name')
                ->where([['support_tickets.is_active', '=', 1], ['support_tickets.is_deleted', '=', 0], ['users.is_active', '=', 1], ['users.is_deleted', '=', 0]])
                ->leftJoin('users', 'users.id', '=', 'support_tickets.user_id')->orderBy('support_tickets.id','desc')->get();
        return view('admin.tickets', compact('tickets'));
    }
   
        public function requests() {
        
        $requests = DB::table('requests')->orderBy('requests.id','desc')->get();
        return view('admin.requests', compact('requests'));
    }


    public function settings(Request $request)
    {
        $settings = Setting::find($id=1);
               
        if($request->all()) {
            $input = $request->all();
            if (Input::hasFile('site_logo')) {         
                $file = Input::file('site_logo');
                $imageName = $file->getClientOriginalName();
                $file_ext = pathinfo($imageName, PATHINFO_EXTENSION);
                $image = time() . "." . $file_ext;
                $upload_image = $file->move('sitesettings', $image);
                $input['site_logo'] = $image;
                if ($settings->site_logo) {
                    unlink(public_path('sitesettings/' . $settings->site_logo));
                }
            }
            if (Input::hasFile('site_favicon')) {
                $file1 = Input::file('site_favicon');
                $imageName1 = $file1->getClientOriginalName();
                $file_ext1 = pathinfo($imageName1, PATHINFO_EXTENSION);
                $image1 = time() . "." . $file_ext1;
                $upload_image1 = $file1->move('sitesettings', $image1);
                $input['site_favicon'] = $image1;
                if ($settings->site_favicon) {
                    unlink(public_path('sitesettings/' . $settings->site_favicon));
                }
            }
                       
            $settings->update($input);
Alert::Html('Success', '<h2> Setting Updated Successfully </h2>','success');
            return redirect()->route('admin.settings');
        }   
        return view('admin.settings', compact('settings'));
    }   


    public function Keywords()
    {
        $keywords = DB::table('search_keywords')->simplePaginate(12);
        return view('admin.keywords.index', compact('keywords'));
    }
 
}
