<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\DealsMail;
use Session;
use Toastr;
use Redirect;

class EmailController extends Controller
{
    public function index()
    {   
        //
    }
    
    public function dealsMail(Request $request)
    {
        $to = $request->recipient;
        Mail::to($to)->send( new DealsMail($to));
        $cat=Session::get('customer_type');
        $postal_code=Session::get('postal_code');


        $parameters = Session::get('getParameters');
        // active campaig updating



            $activeQueries['uuid']=$parameters['parameters']['uuid'];
            $activeQueries['customer_group']=$parameters['parameters']['values']['customer_group'];
            $activeQueries['region']=$parameters['parameters']['values']['region'];
            $activeQueries['usage_single']=Session::get('usage_single');
            $activeQueries['usage_day']=Session::get('usage_day');
            $activeQueries['usage_night']=Session::get('usage_night');
            $activeQueries['usage_excl_night']=Session::get('usage_excl_night');
            $activeQueries['usage_gas']=Session::get('usage_gas');
            
                
                $activeQueries['meter_type']=$parameters['parameters']['values']['meter_type'];
           
            
            $activeQueries['comparison_type']=Session::get('comparison_type');
            $activeQueries['email']=$to;
            $activeQueries['postalcode']=Session::get('postal_code');
            $activeQueries['url']=Session::get('actual_link');
            $activeQueries['locale']=Session::get('locale');
        
           

        try{ 


       $client = new \GuzzleHttp\Client(); 
                  $request = $client->post('https://api.tariefchecker.be/api/change-data-sync', [
                      'headers' => [
                          'Accept' => 'application/json',
                          'Content-type' => 'application/x-www-form-urlencoded',
                          'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiMWFmMjVkYWNmZTNiM2I0MmZjOTJkMTU5MjIxY2RjNjNkY2MxMzEwZWU3NDJlM2YzNmRiOWZiMDZhZmMwNGMyNTgyNzEzNjRhYjU5Y2VkZGQiLCJpYXQiOjE2NDMyODY2MjcsIm5iZiI6MTY0MzI4NjYyNywiZXhwIjoyMjc0NDM4NjI3LCJzdWIiOiI1Iiwic2NvcGVzIjpbXX0.rmiDd2sM0kduf6CPed5rjbqPL4Fui-MDdOKViiPn49pcJEukW_kA2ByuJfHNUIe9rctIXsovX1T8kgeer6TxgQkGCvruO98zcGklVv470en8ul6NzOCMmaemX4cJj4XQYlcI1_-z6tnHqtbbc7_-TyvezidDGslhMAMmtREicgrubnp9VGyl6YtE_pXHedruJ7PxYsc2_Gqu-osdFOdEW6hxN3uPlpKbuHgrf9DvJr8B3PSDQLPl49Q9HzrL-vPgayZTpNFINpCw1QBKk_ooWo861UZQ_cE33TdNfXyoJ5WnXQ-AjvtInfw7C9skq57C9X4NmfsllWCacNn9IYNs4uocuFo259TbRXNuooHsWTDTty4kalcp3LD7G0exCTTDC3_QsEoZI6694ct8Fi0gOJ05thoS5grKIfKyFkRqu1eOS2wMdNs-6KZXwVQ6fv1sJE-VjdIKXoj-r6wo_FPSceB599yz22gwVQLnDQJAvu0OahSyU8DG3VMH__ItYBuTI0uOTJZerwaRwmnTkSWbWczA4c8AEb1H_W-G4Yblh4D9y_ZOW7FvvFj53dCX83mzUyBN3HahqzD8ZX0IvZXolZHLxluIOlFoR9HiLNzTZFrJSzWru39AjNmbaK8-AAydGlF606uGglo76ES7D7dOvDa5lgUjYzRvby8jDpRSkzY'
                      ],
                      'query' => $activeQueries 
                  ]);
        

        }catch (\Exception $e) {
        
        
        $response = ['status' => false, 'message' => $e->getMessage()];
        }
        
       
        $cat='pack';
        Toastr::success('Email Sent Successfully', 'Updated');
        //return redirect('apercu/'.$cat.'/'.$postal_code);
        return Redirect::back();
        
        
       // return redirect()->route('basic-data');
    }
}
