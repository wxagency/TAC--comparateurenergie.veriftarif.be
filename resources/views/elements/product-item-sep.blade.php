<?php
    /*Just for your server-side code*/
    //header('Content-Type: text/html; charset=ISO-8859-1');
    header('Content-Type:text/html; charset=UTF-8');
?>
                        @php  
                        $parameters=Session::get('getParameters');
                        
                       
                        $product = $getdetails['product'];
                        $parameters = $getdetails['parameters'];
                        $supplier = $getdetails['supplier'];
                        $price = $getdetails['price'];
                        $count=DB::table('user_logs')->where('product_id',$product['id'])->count();
                        $tot_count=DB::table('user_logs')->count();
                        $choose=($count/$tot_count)*100;
                        
                        $p_type=$product['type'];
                        $activeStar=false;
                        $activeStarG=false;
                        $activeStarE=false;
                        
                        
                        
                           $discPromo=false;
                                                $discService=false;
                                                $discloyalty=false;
                                                if(Session::get('promo')=='true'){
                                                
                                                $discPromo=true;
                                                }else{
                                                
                                                
                                                $discPromo=false;
                                                }
                                                
                                                if(Session::get('domi')=='true'){
                                                $discService=true;
                                                
                                                }else{
                                                
                                                
                                                $discService=false;
                                                }
                                                if(Session::get('email')=='true'){
                                                
                                                $discloyalty=true;
                                                }else{
                                                
                                                
                                                $discloyalty=false;
                                                }
                        
                        @endphp
                        
                        
                           @php
                                                    
                                                    $ele_disc="0";
                                                    $gas_disc="0";
                                                    $all_disc="0";
                                                    $sl_disc="0";
                                                    $promo_disc="0";
                                                    $promo_discE="0";
                                                    $promo_discG="0";
                                                    $loyalty_disc="0";
                                                    $all_discTotal="0";
                                                    
                                                    $test_disc=0;
                                                    
                                                    foreach($price['breakdown']['discounts'] as $disc){
                                                    $test_disc=$test_disc+$disc['amount'];
                                                    }
                                                    
                                                foreach($price['breakdown']['discounts'] as $disc){
                                                    
                                                    if($disc['parameters']['fuel_type']=='electricity'){
                                                    
                                                            if($discPromo=='true' && $disc['parameters']['discount_type']=='promo'){
                                                                $ele_disc=$ele_disc+$disc['amount'];
                                                                $promo_disc=$promo_disc+$disc['amount'];
                                                                $promo_discE=$promo_discE+$disc['amount'];
                                                            }
                                                    
                                                            if($discService=='true' && $disc['parameters']['discount_type']=='servicelevel'){
                                                                $ele_disc=$ele_disc+$disc['amount'];
                                                                $sl_disc=$sl_disc+$disc['amount'];
                                                            }
                                                    
                                                            if($discloyalty==true && $disc['parameters']['discount_type']=='loyalty'){
                                                                $ele_disc=$ele_disc+$disc['amount'];
                                                                $loyalty_disc=$loyalty_disc+$disc['amount'];
                                                            }
                                                    }
                                                    
                                                    
                                                    if($disc['parameters']['fuel_type']=='gas'){
                                                    
                                                            if($discPromo=='true' && $disc['parameters']['discount_type']=='promo'){
                                                                $gas_disc=$gas_disc+$disc['amount'];
                                                                $promo_disc=$promo_disc+$disc['amount'];
                                                                $promo_discG=$promo_discG+$disc['amount'];
                                                            }
                                                            if($discService=='true' && $disc['parameters']['discount_type']=='servicelevel'){
                                                                $gas_disc=$gas_disc+$disc['amount'];
                                                                $sl_disc=$sl_disc+$disc['amount'];
                                                            }
                                                            if($discloyalty==true && $disc['parameters']['discount_type']=='loyalty'){
                                                                $gas_disc=$gas_disc+$disc['amount'];
                                                                $loyalty_disc=$loyalty_disc+$disc['amount'];
                                                            }
                                                    }
                                                    
                                                    if($disc['parameters']['fuel_type']=='all'){
                                                    
                                                            if($discPromo=='true' && $disc['parameters']['discount_type']=='promo'){
                                                                $all_disc=$all_disc+$disc['amount'];
                                                                $promo_disc=$promo_disc+$disc['amount'];
                                                            }
                                                            if($discService=='true' && $disc['parameters']['discount_type']=='servicelevel'){
                                                                $all_disc=$all_disc+$disc['amount'];
                                                                $sl_disc=$sl_disc+$disc['amount'];
                                                            }
                                                            if($discloyalty==true && $disc['parameters']['discount_type']=='loyalty'){
                                                                $all_disc=$all_disc+$disc['amount'];
                                                                $loyalty_disc=$loyalty_disc+$disc['amount'];
                                                            }
                                                    }
                                                     
                                                }
                                                  
                                            
                                                    
                                                @endphp
                        
                     
                       
                        <div class="@if($min==$product['id']) featured-sec @endif">
                          
                            @if($min==$product['id'])
                            <div class="row justify-content-end">
        
                                <div class="featured-text ">
                                    <p>@lang('home.This_cheap')</p>
                                </div>
                            
                            </div>
                            @endif
                             @php $excl="";  @endphp
                           @foreach($price['breakdown']['discounts'] as $disc)
                            @php
                            if($disc['parameters']['channel']=='exclusive_to_comparators'){
                            $excl='exclusive_to_comparators';
                            }
                            @endphp
                            @endforeach
                            
                          
                           
                        <div class="section-3-sec @if($min==$product['id']) featured @endif" id="{{$product['id']}}">
                            <div class="row section-3">
                                <div class="col-md-12 sec-3-head">
                                  <form action="{{url('confirmer')}}" method="get">
                                        {{csrf_field()}}
                                        <input type="hidden" name="pri_save" class="pri_save{{$si}}">
                                        <input type="hidden" name="pro_id" id="pro_id" value="{{$product['id']}}">
                                        <input type="hidden" name="supplier"  value="{{$supplier['name']}}">
                                        <input type="hidden" name="product"  value="{{$product['name']}}">
                                         <input type="hidden" name="pro_type"  value="{{$parameters['values']['comparison_type']}}">
                                        <input type="hidden" name="type" id="get_type" value="{{$parameters['values']['customer_group']}}">
                                        <input type="hidden" name="postalcode" id="get_postalcode" value="{{$parameters['values']['postal_code']}}">
                                        <input type="hidden" name="elect_day" id="" @if (isset($usage_elec_day)) value="{{$usage_elec_day}}" @endif>
                                        <input type="hidden" name="elect_night" @if (isset($usage_elec_night)) value="{{$usage_elec_night}}" @endif >
                                        <input type="hidden" name="gas_cons" @if (isset($usage_gas)) value="{{$usage_gas}}" @endif>
                                        @if($packType=='elecrticity')
                                        <input type="hidden" name="sub_url"  value="$product['underlying_products']['electricity']['subscribe_url']">
                                        @elseif($packType=='gas')
                                        <input type="hidden" name="sub_url"  value="$product['underlying_products']['gas']['subscribe_url']">
                                        @else
                                        <input type="hidden" name="sub_url"  value="{{$product['subscribe_url']}}">
                                        @endif
                                        <input type="hidden" name="from" value="pack" >
                                        <input type="hidden" name="pr_type" id="pr_type" value="dual">
                                        <div class="tool-sec-1">
                                           <button  data-id="{{$product['id']}}" type="submit" class="sec-head-btn">{{$supplier['name']}} - {{$product['name']}}</button> <div>  @if($supplier['greenpeace_rating'] > 0.75)<span class="tool-1-sec"><span class="exc" style="background-color: #147b13;" > @lang('home.greenest')<span class="tool-sec-tip" rel="tooltip" title="@lang('home.exc_greenest')"  ><i class="fas fa-info-circle"></i></span> </span></span> @endif  @if($min==$product['id']) <span class="tool-1-sec"><span class="exc" style="background-color: blue;" > @lang('home.cheapest') <span class="tool-sec-tip" rel="tooltip" title="@lang('home.exc_cheapest')"  ><i class="fas fa-info-circle"></i></span> </span></span> @endif  @if($excl=='exclusive_to_comparators')<span class="tool-1-sec"> <span class="exc"> @lang('home.exclusive') <span class="tool-sec-tip" rel="tooltip" title="@lang('home.exc_exclusive')"><i class="fas fa-info-circle"></i></span> </span></span><span class="tool-1-sec"> @endif  @if($product['contract_duration']=='4' || $product['contract_duration']=='5' && $product['pricing_type']=='fixed') <span class="exc"> @lang('home.most_sec') <span class="tool-sec-tip" rel="tooltip" title="@lang('home.exc_secure')"  ><i class="fas fa-info-circle"></i></span></span></span> @endif</div> 
                                        </div>
                                        
                                       
                                </form>
                                                    </div>
                            </div>
                            
                            <div class="row part">
                                <div class="col-md-3 col-sm-6 part-1">
                                    <img src="{{$supplier['logo']}}" alt="Tariefchecker">
                                    
                                </div>
                               <div  @if(Session::get('currentValue')) class="col-md-3 col-sm-6 part-2" @else class="col-md-5 col-sm-6 part-2" @endif >
                                     <!-- basic details section -->
                                    <ul>
                                        
                                        <!-- tarrif type -->
                                        <li><p style="text-transform: capitalize"><i class="fa fa-check"></i>@if($p_type=="pack" && $packType!="electricity" && $packType!="gas") @lang('home.Gas') + @lang('home.Electricity') @elseif($p_type=='gas' || $packType=="gas") @lang('home.Gas') @elseif($p_type=='electricity' || $packType=="electricity") @lang('home.Electricity') @else @endif</p>
                                        </li>

                                        <!-- tarrif type end -->

                                        <!-- duration -->

                                        <li>
                                            <p><i class="fa fa-check"></i>
                                        @if(Session::get('locale')=='nl') 
                                            @if($product['contract_duration']=='123') @lang('home.123year')@elseif($product['contract_duration']=='13') @lang('home.13year')@elseif($product['contract_duration']=='0') @lang('home.Undetermined')@else {{$product['contract_duration']}} @if($product['contract_duration']>1) @lang('home.Year')s @else @lang('home.Year') @endif
                                            @endif,

                                            @if($product['type']=='pack') 

                                                @if($product['underlying_products']['electricity']['pricing_type']!=$product['underlying_products']['gas']['pricing_type'])
                                                    Combinatie vast en variabel
                                                @else
                                                @if($product['underlying_products']['electricity']['pricing_type']=='fixed') @lang('home.fixed')  @else     @lang('home.variable')  @endif 

                                            @endif
                                            @else 

                                             @if($product['pricing_type']== 'fixed') @lang('home.fixed') @else @lang('home.variable') @endif
                                             @endif 


                                        @else
                                            @if($product['contract_duration']=='123') @lang('home.123year')@elseif($product['contract_duration']=='13') @lang('home.13year')@elseif($product['contract_duration']=='0') @lang('home.Undetermined')@else {{$product['contract_duration']}} @if($product['contract_duration']>1) @lang('home.Year')s @else @lang('home.Year') @endif @endif,
                                            @if($product['type']=='pack')
                                            @if($product['underlying_products']['electricity']['pricing_type']!=$product['underlying_products']['gas']['pricing_type'])
                                            Combinaison fixe et variable
                                            @else
                                            @if($product['underlying_products']['electricity']['pricing_type']=='fixed')  @lang('home.fixed') @else  @lang('home.variable') @endif
                                            @endif
                                            @else 
                                            @if($product['pricing_type']== 'fixed') @lang('home.rate') @lang('home.fixed') @else  @lang('home.variable') @endif @endif
                                        @endif
                                            </p>
                                        </li>
                                        <!-- duration end -->
                                        <!-- green % -->
                                        @if($product['type']=='electricity' || $product['type']=='pack')
                                            <li><p><i class="fa fa-check"></i>@if($product['origin']=='BE' &&  $product['green_percentage'] > 0)<img src="{{url('images/bel-flag.png')}}">@endif {{$product['green_percentage']}} % @lang('home.green')</p></li>
                                        @endif
                                        <!-- green % end -->
                                    </ul>
                                    <!-- basic details section ends -->
                                </div>
                                
                                 @if($product['type']=="pack")  
                                                                @php $all_discTotal=$all_disc;  @endphp
                                                                @else
                                                                
                                                                @php $all_discTotal=$all_disc; @endphp
                                                                
                                                                @endif
                                
                                
                         
                                
                                 @php  
                               
                                                        
                               $discAmount=($price['totals']['year']['excl_promo']/100)-($promo_disc+$sl_disc+$loyalty_disc);
                              
                               if($product['type']=='electricity'){
                               
                               $fixF=$price['breakdown']['electricity']['energy_cost']['fixed_fee']/100;
                               $cun=$price['breakdown']['electricity']['energy_cost']['single']/100+$price['breakdown']['electricity']['energy_cost']['day']/100+$price['breakdown']['electricity']['energy_cost']['night']/100+$price['breakdown']['electricity']['energy_cost']['excl_night']/100;
                                 
                               if($discAmount<=0){
                               
                               $discAmount=($price['totals']['year']['excl_promo']/100)-($fixF+$cun);
                               }
                               
                               }
                               
                               if($product['type']=='gas'){
                               
                               $fixF=$price['breakdown']['gas']['energy_cost']['fixed_fee']/100;
                               $cun=$price['breakdown']['gas']['energy_cost']['usage']/100;
                                 
                               if($discAmount<=0){
                               
                               $discAmount=($price['totals']['year']['excl_promo']/100)-($fixF+$cun);
                               }
                               
                               }
                               
                               if($product['type']=='pack'){
                               $discAmountG=0; $discAmountE=0;
                               
                               
                               $fixF=$price['breakdown']['gas']['energy_cost']['fixed_fee']/100;
                               $cun=$price['breakdown']['gas']['energy_cost']['usage']/100;
                                 
                               if((($price['totals']['year']['excl_promo']/100)-($ele_disc+$gas_disc+$sl_disc+$loyalty_disc))<=0){
                               
                               $discAmountE=($fixF+$cun);
                               $discAmount=($price['totals']['year']['excl_promo']/100)-($discAmountE+$discAmountG);
                               }
                               
                                $fixF=$price['breakdown']['electricity']['energy_cost']['fixed_fee']/100;
                               $cun=$price['breakdown']['electricity']['energy_cost']['single']/100+$price['breakdown']['electricity']['energy_cost']['day']/100+$price['breakdown']['electricity']['energy_cost']['night']/100+$price['breakdown']['electricity']['energy_cost']['excl_night']/100;
                                 
                               if((($price['totals']['year']['excl_promo']/100)-($ele_disc+$gas_disc+$sl_disc+$loyalty_disc))<=0){
                               
                               $discAmountG=($fixF+$cun);
                               $discAmount=($price['totals']['year']['excl_promo']/100)-($discAmountE+$discAmountG);
                               }
                               
                               
                               
                               
                               
                               }
                               
                              
                               
                               @endphp
                               
                                @if(Session::get('currentValue')) 
                                <div class="col-md-2 col-sm-6 part-3">
                                    @php $currentValue=Session::get('currentValue');  
                                    
                                   
                                    
                                    @endphp
                             
                                     @php 
                                        
                                        if(Session::get('cur_invoice_moth_year')=='year'){
                                        
                                        $invamount=(int)$currentValue;
                                        
                                        }else{
                                        $invamount=(int)$currentValue*12;
                                        }
                                        
                                         if((Session::get('promo')=='true' && $parameters['values']['promo_discount']['promo']=='promo') || (Session::get('domi')=='true' && $parameters['values']['promo_discount']['discount_serviceLevelPayment']=='domi') || (Session::get('email')=='true' && $parameters['values']['promo_discount']['discount_serviceLevelInvoicing']=='email')){
                                          $prc=number_format($invamount-($discAmount),2,',', '.');
                                         }else{
                                        $prc=number_format($invamount-($price['totals']['year']['excl_promo']/100),2,',', '.');
                                        }
                                        
                                        $sp_pricea=preg_split("/,/",$prc)
                                        @endphp
                                  
                                @if($prc>0)
                                    <ul @if(Session::get('currentValue'))    @else style="display:none;" @endif class="year_savings years">
                                        <li><p>@lang('home.Savings_Year')</p></li>
                                        
                                        <!--@php $prc=number_format($price['totals']['year']['excl_promo']/100,2,',', '.');  $sp_price=preg_split("/,/",$prc)  @endphp {{$sp_price[0]}}</b><sup>,{{$sp_price[1]}}</sup>-->
                                       
                                        <li><p class="euro" ><b>&#8364; <span class="price_savings">{{$sp_pricea[0]}}<sup>,{{$sp_pricea[1]}}</sup></span> </b></p></li>
                                    </ul>
                                    @else
                                    
                                    <ul @if(Session::get('currentValue'))    @else style="display:none;" @endif class="year_savings years">
                                        <li><p>@lang('home.Savings_Year')</p></li>
                                        
                                        <!--@php $prc=number_format($price['totals']['year']['excl_promo']/100,2,',', '.');  $sp_price=preg_split("/,/",$prc)  @endphp {{$sp_price[0]}}</b><sup>,{{$sp_price[1]}}</sup>-->
                                       
                                        <li><p class="euro" ><b>&#8364; <span class="price_savings">0<sup>,00</sup></span> </b></p></li>
                                    </ul>
                                    
                                @endif
                                
                                    
                                        @php 
                                                $currentValue=Session::get('currentValue');  
                                                
                                                if(Session::get('cur_invoice_moth_year')=='month'){
                                        
                                        $invamount=(int)$currentValue;
                                        
                                        }else{
                                        $invamount=(int)$currentValue/12;
                                        }
                                                 if((Session::get('promo')=='true' && $parameters['values']['promo_discount']['promo']=='promo') || (Session::get('domi')=='true' && $parameters['values']['promo_discount']['discount_serviceLevelPayment']=='domi') || (Session::get('email')=='true' && $parameters['values']['promo_discount']['discount_serviceLevelInvoicing']=='email')){
                                                  
                                                $prc=number_format($invamount-($discAmount),2,',', '.');
                                                }else{
                                                $prc=number_format($invamount-($price['totals']['month']['excl_promo']/100),2,',', '.');
                                                }
                                                $sp_pricem=preg_split("/,/",$prc)
                                        @endphp
                                    @if($prc>0)
                                    <ul  style="display:none;" class="month_savings month">
                                        <li><p>@lang('home.Savings_Month')</p></li>
                                      
                                        <li><p class="euro" ><b>&#8364; <span class="price_savings"> {{$sp_pricem[0]}}<sup>,{{$sp_pricem[1]}}</sup></span> </b></p></li>
                                    </ul>
                                    @else
                                    
                                    <ul  style="display:none;" class="month_savings month">
                                        <li><p>@lang('home.Savings_Month')</p></li>
                                      
                                        <li><p class="euro" ><b>&#8364; <span class="price_savings"> 0<sup>,00</sup></span> </b></p></li>
                                    </ul>
                                    
                                    @endif
                                    
                                    
                                </div>
                                @endif
                             <div class="col-md-2 col-sm-6 part-4 @if(Session::get('currentValue')) left-active   @else  @endif" >
                                     <ul>
                                        
                                         @if($p_type=='pack' && $packType=='electricity' )
                                          @php $per1=100-(($price['totals']['month']['incl_promo']/$price['totals']['month']['excl_promo'])*100) @endphp
                                         @endif
                                         
                                         @if($p_type=='electricity')
                                          @php $per1=100-(($price['totals']['month']['incl_promo']/$price['totals']['month']['excl_promo'])*100) @endphp
                                         @endif
                                         
                                         @if($p_type=='pack' && $packType=='gas' )
                                          @php $per1=100-(($price['totals']['month']['incl_promo']/$price['totals']['month']['excl_promo'])*100) @endphp
                                         @endif
                                         
                                         @if($p_type=='gas')
                                          @php $per1=100-(($price['totals']['month']['incl_promo']/$price['totals']['month']['excl_promo'])*100) @endphp
                                         @endif
                                         
                                         @if($p_type=='pack' && $packType!='electricity' && $packType!='gas')
                                           @php $per1=100-(($price['totals']['month']['incl_promo']/$price['totals']['month']['excl_promo'])*100) @endphp
                                         @endif
                                        
                                        <li>
                                            @if((Session::get('promo')=='true' && $parameters['values']['promo_discount']['promo']=='promo') || (Session::get('domi')=='true' && $parameters['values']['promo_discount']['discount_serviceLevelPayment']=='domi') || (Session::get('email')=='true' && $parameters['values']['promo_discount']['discount_serviceLevelInvoicing']=='email'))    
                                                 <p class="@if($per1!=0) red @endif years">@lang('home.All_in_costs_Year')</p>
                                                 <p class="@if($per1!=0) red @endif month" style="display:none;">@lang('home.All_in_costs_Month')</p>
                                            @else
                                                 <p class="years">@lang('home.All_in_costs_Year')</p>
                                                 <p class="month" style="display:none;">@lang('home.All_in_costs_Month')</p>
                                            @endif
                                        </li>
                                        
                                        @if($p_type=='pack' && $packType=='electricity' )
                                        
                                        <input type="hidden" value="{{number_format(($price['breakdown']['electricity']['energy_cost']['fixed_fee']+$price['breakdown']['electricity']['energy_cost']['certificates']+$price['breakdown']['electricity']['energy_cost']['single']+$price['breakdown']['electricity']['energy_cost']['day']+$price['breakdown']['electricity']['energy_cost']['night']+$price['breakdown']['electricity']['energy_cost']['excl_night']+$price['breakdown']['electricity']['distribution_and_transport']['distribution']+$price['breakdown']['electricity']['distribution_and_transport']['transport']+$price['breakdown']['electricity']['taxes']['tax'])/100,2)}}" class="get_year_val">
                                        <input type="hidden" value="{{number_format(($price['breakdown']['electricity']['energy_cost']['fixed_fee']+$price['breakdown']['electricity']['energy_cost']['certificates']+$price['breakdown']['electricity']['energy_cost']['single']+$price['breakdown']['electricity']['energy_cost']['day']+$price['breakdown']['electricity']['energy_cost']['night']+$price['breakdown']['electricity']['energy_cost']['excl_night']+$price['breakdown']['electricity']['distribution_and_transport']['distribution']+$price['breakdown']['electricity']['distribution_and_transport']['transport']+$price['breakdown']['electricity']['taxes']['tax'])/100,2)}}" class="get_month_val">
                                        @endif
                                        @if($p_type=='electricity')
                                        
                                        <input type="hidden" value="{{number_format(($price['breakdown']['electricity']['energy_cost']['fixed_fee']+$price['breakdown']['electricity']['energy_cost']['certificates']+$price['breakdown']['electricity']['energy_cost']['single']+$price['breakdown']['electricity']['energy_cost']['day']+$price['breakdown']['electricity']['energy_cost']['night']+$price['breakdown']['electricity']['energy_cost']['excl_night']+$price['breakdown']['electricity']['distribution_and_transport']['distribution']+$price['breakdown']['electricity']['distribution_and_transport']['transport']+$price['breakdown']['electricity']['taxes']['tax'])/100,2)}}" class="get_year_val">
                                        <input type="hidden" value="{{number_format(($price['breakdown']['electricity']['energy_cost']['fixed_fee']+$price['breakdown']['electricity']['energy_cost']['certificates']+$price['breakdown']['electricity']['energy_cost']['single']+$price['breakdown']['electricity']['energy_cost']['day']+$price['breakdown']['electricity']['energy_cost']['night']+$price['breakdown']['electricity']['energy_cost']['excl_night']+$price['breakdown']['electricity']['distribution_and_transport']['distribution']+$price['breakdown']['electricity']['distribution_and_transport']['transport']+$price['breakdown']['electricity']['taxes']['tax'])/100,2)}}" class="get_month_val">
                                        @endif
                                        @if($p_type=='gas')
                                        
                                        <input type="hidden" value="{{number_format(($price['breakdown']['gas']['energy_cost']['fixed_fee']+$price['breakdown']['gas']['energy_cost']['usage']+$price['breakdown']['gas']['distribution_and_transport']['distribution']+$price['breakdown']['gas']['distribution_and_transport']['transport']+$price['breakdown']['gas']['taxes']['tax'])/100,2)}}" class="get_year_val">
                                        <input type="hidden" value="{{number_format(($price['breakdown']['gas']['energy_cost']['fixed_fee']+$price['breakdown']['gas']['energy_cost']['usage']+$price['breakdown']['gas']['distribution_and_transport']['distribution']+$price['breakdown']['gas']['distribution_and_transport']['transport']+$price['breakdown']['gas']['taxes']['tax'])/100,2)}}" class="get_month_val">
                                        @endif
                                        
                                        @if($p_type=='pack')
                                        <input type="hidden" value="{{number_format($price['totals']['year']['incl_promo']/100,2)}}" class="get_year_val">
                                        <input type="hidden" value="{{number_format($price['totals']['month']['incl_promo']/100,2)}}" class="get_month_val">
                                        @endif
                                        
                                        @if($p_type=='pack' && $packType=='electricity' )
                                        @php $per1=100-((($discAmount/12)/$price['totals']['month']['excl_promo'])*100) @endphp
                                         
                                        <!--<li>-->
                                        <!--    <p class="@if($per1!=0) red @endif euro years ">aaa<b>&#8364; </i>@php $prc=number_format($price['breakdown']['electricity']['taxes']['tax']/100+$price['breakdown']['electricity']['distribution_and_transport']['transport']/100+$price['breakdown']['electricity']['distribution_and_transport']['distribution']/100+$price['breakdown']['electricity']['energy_cost']['certificates']/100+$price['breakdown']['electricity']['energy_cost']['single']/100+$price['breakdown']['electricity']['energy_cost']['day']/100+$price['breakdown']['electricity']['energy_cost']['night']/100+$price['breakdown']['electricity']['energy_cost']['excl_night']/100+$price['breakdown']['electricity']['energy_cost']['fixed_fee']/100,2,',', '.');  $sp_price=preg_split("/,/",$prc)  @endphp {{$sp_price[0]}}</b><sup>,{{$sp_price[1]}}</sup></p>-->
                                        <!--</li>-->
                                        <li>
                                            <p class="@if($per1!=0) red @endif euro years "><b>&#8364; </i>@php $prc=number_format($price['breakdown']['electricity']['taxes']['tax']/100+$price['breakdown']['electricity']['distribution_and_transport']['transport']/100+$price['breakdown']['electricity']['distribution_and_transport']['distribution']/100+$price['breakdown']['electricity']['energy_cost']['certificates']/100+$price['breakdown']['electricity']['energy_cost']['single']/100+$price['breakdown']['electricity']['energy_cost']['day']/100+$price['breakdown']['electricity']['energy_cost']['night']/100+$price['breakdown']['electricity']['energy_cost']['excl_night']/100+$price['breakdown']['electricity']['energy_cost']['fixed_fee']/100,2,',', '.');  $sp_price=preg_split("/,/",$prc)  @endphp {{$sp_price[0]}}</b><sup>,{{$sp_price[1]}}</sup></p><p class=" euro month"  style="display:none;"><b>&#8364;</i>@php $prc=number_format($price['totals']['month']['incl_promo']/100,2,',', '.');  $sp_price=preg_split("/,/",$prc)  @endphp {{$sp_price[0]}}</b><sup>,{{$sp_price[1]}}</sup></p>
                                        </li>
                                        <li>
                                           
                                            @if($per1!=0) <p class="strike years"> <strike> &#8364; </i>{{number_format($price['totals']['year']['excl_promo']/100,2,',', '.')}}</strike> <span class="disc">@php $per=100-(($discAmount/($price['totals']['year']['excl_promo']/100))*100) @endphp -{{number_format($per,2,',', '.')}}%</span></p><p class="strike month" style="display:none;"> <strike> &#8364;</i>{{number_format($price['totals']['month']['excl_promo']/100,2,',', '.')}}</strike> <span class="disc"> -{{number_format($per1, 2,',', '.')}}%</span></p>@endif

                                        </li>
                                         @endif
                                         
                                          @if($p_type=='electricity')
                                          @php $per1=100-((($discAmount/12)/($price['totals']['month']['excl_promo']/100))*100) @endphp
                                         
                                       
                                         
                                        
                                        
                                        @if((Session::get('promo')=='true' && $parameters['values']['promo_discount']['promo']=='promo') || (Session::get('domi')=='true' && $parameters['values']['promo_discount']['discount_serviceLevelPayment']=='domi') || (Session::get('email')=='true' && $parameters['values']['promo_discount']['discount_serviceLevelInvoicing']=='email'))
                                        
                                         <li>
                                            <p class="@if($per1!=0) red @endif euro years "><b>&#8364; </i>@php $prc=number_format($discAmount,2,',', '.'); $sp_price=preg_split("/,/",$prc)  @endphp {{$sp_price[0]}}</b><sup>,{{$sp_price[1]}}</sup></p> <p class="euro month" style="display:none;"><b>&#8364; </i>@php $prc=number_format(($discAmount/12),2,',', '.'); $sp_price=preg_split("/,/",$prc)  @endphp {{$sp_price[0]}}</b><sup>,{{$sp_price[1]}}</sup></p>
                                        </li>
                                        <li>
                                            @if($per1!=0) <p class="strike years"> <strike> &#8364; </i>{{number_format($price['totals']['year']['excl_promo']/100,2,',', '.')}}</strike> <span class="disc">@php $per=100-(($discAmount/($price['totals']['year']['excl_promo']/100))*100) @endphp -{{number_format($per,2,',', '.')}}%</span></p><p class="strike month" style="display:none;"> <strike> &#8364;</i>{{number_format($price['totals']['month']['excl_promo']/100,2,',', '.')}}</strike> <span class="disc">@php $per1=100-((($discAmount/12)/($price['totals']['month']['excl_promo']/100))*100) @endphp -{{number_format($per1, 2,',', '.')}}%</span></p>@endif

                                        </li>
                                        @else
                                         @php $per1=100-(round((round($discAmount)/12)*100/round($price['totals']['month']['excl_promo']))*100) @endphp
                                         <li>
                                            <p class=" euro years "><b>&#8364; </i>@php $prc=number_format($price['totals']['year']['excl_promo']/100,2,',', '.'); $sp_price=preg_split("/,/",$prc)  @endphp {{$sp_price[0]}}</b><sup>,{{$sp_price[1]}}</sup></p> <p class=" euro month" style="display:none;"><b>&#8364; </i>@php $prc=number_format($discAmount,2,',', '.'); $sp_price=preg_split("/,/",$prc)  @endphp {{$sp_price[0]}}</b><sup>,{{$sp_price[1]}}</sup></p>
                                        </li>
                                        
                                        @endif
                                        
                                        
                                        
                                         @endif
                                         
                                         @if($p_type=='pack' && $packType=='gas' )
                                           @php $per1=100-((($discAmount/12)/($price['totals']['month']['excl_promo']/100))*100) @endphp
                                        <li>
                                            <p class="@if($per1!=0) red @endif euro years "><b>&#8364; </i>@php $prc=number_format(($price['breakdown']['gas']['energy_cost']['fixed_fee']+$price['breakdown']['gas']['energy_cost']['usage']+$price['breakdown']['gas']['distribution_and_transport']['distribution']+$price['breakdown']['gas']['distribution_and_transport']['transport']+$price['breakdown']['gas']['taxes']['tax'])/100,2,',', '.'); $sp_price=preg_split("/,/",$prc)  @endphp {{$sp_price[0]}}</b><sup>,{{$sp_price[1]}}</sup></p> <p class="@if($per1!=0) red @endif euro month " style="display:none;"><b>&#8364; </i>@php $prc=number_format(($price['breakdown']['gas']['energy_cost']['fixed_fee']+$price['breakdown']['gas']['energy_cost']['usage']+$price['breakdown']['gas']['distribution_and_transport']['distribution']+$price['breakdown']['gas']['distribution_and_transport']['transport']+$price['breakdown']['gas']['taxes']['tax'])/100,2,',', '.'); $sp_price=preg_split("/,/",$prc)  @endphp {{$sp_price[0]}}</b><sup>,{{$sp_price[1]}}</sup></p>
                                        </li>
                                        <li>
                                          
                                            @if($per1!=0)<p class="strike years"> <strike> &#8364; </i>{{number_format($price['totals']['year']['excl_promo']/100,2,',', '.')}}</strike> <span class="disc">@php $per=100-(($discAmount/($price['totals']['year']['excl_promo']/100))*100) @endphp -{{number_format($per,2,',', '.')}}%</span></p><p class="strike month" style="display:none;"> <strike> &#8364;</i>{{number_format($price['totals']['month']['excl_promo']/100,2,',', '.')}}</strike> <span class="disc"> -{{number_format($per1, 2,',', '.')}}%</span></p>@endif

                                        </li>
                                         @endif
                                         
                                          @if($p_type=='gas')
                                          @php $per1=100-((($discAmount/12)/($price['totals']['month']['excl_promo']/100))*100) @endphp
                                         
                                       
                                          
                                        
                                         @if((Session::get('promo')=='true' && $parameters['values']['promo_discount']['promo']=='promo') || (Session::get('domi')=='true' && $parameters['values']['promo_discount']['discount_serviceLevelPayment']=='domi') || (Session::get('email')=='true' && $parameters['values']['promo_discount']['discount_serviceLevelInvoicing']=='email'))
                                        
                                        
                                         <li>
                                            <p class="@if($per1!=0) red @endif euro years "><b>&#8364; </i>@php $prc=number_format($discAmount,2,',', '.');  $sp_price=preg_split("/,/",$prc)  @endphp {{$sp_price[0]}}</b><sup>,{{$sp_price[1]}}</sup</p><p class=" euro month"  style="display:none;"><b>&#8364;</i>@php $prc=number_format(($discAmount/12),2,',', '.');  $sp_price=preg_split("/,/",$prc)  @endphp {{$sp_price[0]}}</b><sup>,{{$sp_price[1]}}</sup></p>
                                        </li>
                                        <li>
                                            @if($per1!=0) <p class="strike years"> <strike> &#8364;</i>{{number_format($price['totals']['year']['excl_promo']/100,2,',', '.')}}</strike> <span class="disc">@php $per=100-(($discAmount/($price['totals']['year']['excl_promo']/100))*100) @endphp -{{number_format($per,2,',', '.')}}%</span></p> <p class="strike month" style="display:none;"> <strike> &#8364;</i>{{number_format($price['totals']['month']['excl_promo']/100,2,',', '.')}}</strike> <span class="disc"> -{{number_format($per1, 2,',', '.')}}%</span></p>@endif

                                        </li>
                                        
                                        @else
                                         @php $per1=100-(round((round($discAmount)/12)*100/round($price['totals']['month']['excl_promo']))*100) @endphp
                                         <li>
                                            <p class=" euro years "><b>&#8364; </i>@php $prc=number_format($price['totals']['year']['excl_promo']/100,2,',', '.');  $sp_price=preg_split("/,/",$prc)  @endphp {{$sp_price[0]}}</b><sup>,{{$sp_price[1]}}</sup</p><p class=" euro month"  style="display:none;"><b>&#8364;</i>@php $prc=number_format(($discAmount/12),2,',', '.');  $sp_price=preg_split("/,/",$prc)  @endphp {{$sp_price[0]}}</b><sup>,{{$sp_price[1]}}</sup></p>
                                        </li>
                                        
                                        @endif
                                        
                                        
                                         @endif
                                         
                                         
                                         @if($p_type=='pack' && $packType!='electricity' && $packType!='gas')
                                         
                                            @php $per1=100-((($discAmount/12)/($price['totals']['month']['excl_promo']/100))*100) @endphp
                                        
                                        <!--<li>-->
                                        <!--    <p class="@if($per1!=0) red @endif euro years "><b>&#8364; </i>@php $prc=number_format($price['totals']['year']['incl_promo']/100,2,',', '.');  $sp_price=preg_split("/,/",$prc)  @endphp {{$sp_price[0]}}</b><sup>,{{$sp_price[1]}}</sup></p><p class="@if($per1!=0) red @endif euro month"  style="display:none;"><b>&#8364;</i>@php $prc=number_format($price['totals']['month']['incl_promo']/100,2,',', '.');  $sp_price=preg_split("/,/",$prc)  @endphp {{$sp_price[0]}}</b><sup>,{{$sp_price[1]}}</sup></p>-->
                                        <!--</li>-->
                                        
                                        
                                        @if((Session::get('promo')=='true' && $parameters['values']['promo_discount']['promo']=='promo') || (Session::get('domi')=='true' && $parameters['values']['promo_discount']['discount_serviceLevelPayment']=='domi') || (Session::get('email')=='true' && $parameters['values']['promo_discount']['discount_serviceLevelInvoicing']=='email'))
                                         <li>
                                             
                                            <p class="@if($per1!=0) red @endif euro years " ><b>&#8364; </i>@php $prc=number_format($discAmount,2,',', '.');  $sp_price=preg_split("/,/",$prc)  @endphp {{$sp_price[0]}}</b><sup>,{{$sp_price[1]}}</sup></p><p class=" euro month"  style="display:none;"><b>&#8364;</i>@php $prc=number_format(($discAmount/12),2,',', '.');  $sp_price=preg_split("/,/",$prc)  @endphp {{$sp_price[0]}}</b><sup>,{{$sp_price[1]}}</sup></p>
                                            </li>
                                        <li class="{{$parameters['values']['promo_discount']['promo']}}" >
                                            @if($per1!=0)<p class="strike years"> <strike> &#8364; </i>{{number_format($price['totals']['year']['excl_promo']/100,2,',', '.')}}</strike> <span class="disc">@php $per=100-(($discAmount/($price['totals']['year']['excl_promo']/100))*100) @endphp -{{number_format($per,2,',', '.')}}%</span></p><p class="strike month" style="display:none;"> <strike> &#8364;</i>{{number_format($price['totals']['month']['excl_promo']/100,2,',', '.')}}</strike> <span class="disc"> -{{number_format($per1, 2,',', '.')}}%</span></p>@endif

                                        </li>
                                       
                                        
                                        @else
                                         @php $per1=100-(round((round($discAmount)/12)*100/round($price['totals']['month']['excl_promo']))*100) @endphp
                                         <li>
                                             
                                            <p class=" euro years "><b>&#8364; </i>@php $prc=number_format($price['totals']['year']['excl_promo']/100,2,',', '.');  $sp_price=preg_split("/,/",$prc)  @endphp {{$sp_price[0]}}</b><sup>,{{$sp_price[1]}}</sup></p><p class=" euro month"  style="display:none;"><b>&#8364;</i>@php $prc=number_format(($discAmount/12),2,',', '.');  $sp_price=preg_split("/,/",$prc)  @endphp {{$sp_price[0]}}</b><sup>,{{$sp_price[1]}}</sup></p>
                                        </li>
                                        
                                        @endif
                                        
                                        @endif
                                        
                                        
                                    </ul>
                                </div>  
                             
                                <div class="col-md-2 col-sm-6 part-5">
                                  
                              
                                    
                                 
                                        @php $arr=Session::get('select-pro');   @endphp
                                    
                                
                              
                                         <form action="{{url('confirmer')}}" method="get">
                                        {{csrf_field()}}
                                        <input type="hidden" name="pri_save" class="pri_save{{$si}}">
                                        <input type="hidden" name="pro_id"  value="{{$product['id']}}">
                                        <input type="hidden" name="type"  value="{{$parameters['values']['customer_group']}}">
                                        <input type="hidden" name="postalcode"  value="{{$parameters['values']['postal_code']}}">
                                        <input type="hidden" name="elect_day" id="" @if (isset($usage_elec_day)) value="{{$usage_elec_day}}" @endif>
                                        <input type="hidden" name="elect_night" @if (isset($usage_elec_night)) value="{{$usage_elec_night}}" @endif >
                                        <input type="hidden" name="gas_cons" @if (isset($usage_gas)) value="{{$usage_gas}}" @endif>
                                        @if($parameters['values']['comparison_type']=='elecrticity')
                                        <input type="hidden" name="sub_url"  value="{{$product['subscribe_url']}}">
                                        <input type="hidden" name="pro_type"  value="electricity">
                                        @elseif($parameters['values']['comparison_type']=='gas')
                                        <input type="hidden" name="sub_url"  value="{{$product['subscribe_url']}}">
                                         <input type="hidden" name="pro_type"  value="gas">
                                        @else
                                        <input type="hidden" name="sub_url"  value="{{$product['subscribe_url']}}">
                                        @endif
                                         <input type="hidden" name="pr_type" id="pr_type" value="dual">
                                         <input type="hidden" name="pro_type"  value="{{$product['type']}}">
                                     
                                        <button id="choose{{$product['id']}}" data-id="{{$product['id']}}" type="submit" class="choose" rel="tooltip" title="@lang('home.To_Request')">@if(Session::get('selected_product')==$product['id']) <i class='fa fa-check' aria-hidden='true'></i>@lang('home.check_select') @else @lang('home.To_Request') @endif</button>
                                        @php
                                       
                                        $string = trans("home.Choose");
                                        $replace = ['{X}'];
                                        $info = [
                                        'X' => $product['popularity_score'],
                                        ];
                                       @endphp
                                       
                                        <p class="heart"><i class="fa fa-heart"></i>{{str_replace($replace, $info, $string)}}</p>
                                        </form>

                                  
                                    
                                    
                                    

<!--<button id="getchoose{{$product['id']}}" data-id="{{$product['id']}}" type="submit" class="choose getchoose sel{{$packType}}" rel="tooltip" data-supplier="{{$supplier['name']}}" data-product="{{$product['name']}}" data-type='{{$packType}}' title="@lang('home.choose_Kiezen')">@lang('home.Choose')</button>-->
<!--<p class="heart" style="color:green;"><i class="fa fa-heart"></i>{{$product['popularity_score']}}% @lang('home.Choose')</p>-->

                                   
                                </div>
                            </div>



                            <div class="row more-content more-contenta{{$product['id']}}">
                                <div class="col-md-12 more-tab">
                                    <div class="tab">
                                        <button class="tablinks active" onclick="openCity(event, 'pricing{{$product['id']}}')">@lang('home.PRICING')</button>
                                        <button class="tablinks" onclick="openCity(event, 'discount{{$product['id']}}')">@lang('home.Discounts')</button>
                                        <button class="tablinks" onclick="openCity(event, 'product-discription{{$product['id']}}')">@lang('home.Product_Description')</button>
                                        <button class="tablinks" onclick="openCity(event, 'contract-details{{$product['id']}}')">@lang('home.Contract_Details')</button>
                                    </div>
                                    @php
                                                    
                                                    $ele_disc="0";
                                                    $gas_disc="0";
                                                    foreach($price['breakdown']['discounts'] as $disc){
                                                    
                                                    if($disc['parameters']['fuel_type']=='electricity'){
                                                    
                                                    $ele_disc=$ele_disc+$disc['amount'];
                                                    }
                                                     if($disc['parameters']['fuel_type']=='gas'){
                                                    
                                                    $gas_disc=$gas_disc+$disc['amount'];
                                                    }
                                                     
                                                    }
                                                  
                                            
                                                    
                                                    @endphp
                                                    
                                   <div id="pricing{{$product['id']}}" class="tabcontent" style="display:block">
                                        <div class="row pricing-elec">

                                            @if($product['type']=='pack'||$product['type']=='electricity')
                                            <div @if($product['type']=='pack') class="col-md-4 col-lg-4 col-sm-12 elec-sec" @else class="col-md-6 col-lg-6 col-sm-12 elec-sec"  @endif >
                                                <div class="row elec-sec-head">
                                                    <div class="col-md-12 col-lg-12 col-sm-12 mt-3 ">
                                                        <h5><i class="fa fa-bolt"></i> @lang('home.Electricity')</h5>
                                                    </div>
                                                </div>
                                                <div class="row elec-sec-1">
                                                    <div class="col-md-12 col-lg-12 col-sm-12 mt-4">
                                                        <h6><b>@lang('home.Energy_Cost')</b></h6>
                                                    </div>
                                                </div>
                                                <div class="row energy-sec mt-1">
                                                    <div class="col-md-8 col-8 col-lg-8 energy ">
                                                        <ul>
                                                            <li>@lang('home.Fixed_cost')</li>
                                                            <li>@lang('home.Consumption')</li>
                                                            <li>@lang('home.Certificates')</li>
                                                            @if((Session::get('promo')=='true' && $parameters['values']['promo_discount']['promo']=='promo') || (Session::get('domi')=='true' && $parameters['values']['promo_discount']['discount_serviceLevelPayment']=='domi') || (Session::get('email')=='true' && $parameters['values']['promo_discount']['discount_serviceLevelInvoicing']=='email'))
                                                            @php
                                                            $activeStarE=false;
                                                            $fixF=$price['breakdown']['electricity']['energy_cost']['fixed_fee']/100;
                                                            $cun=$price['breakdown']['electricity']['energy_cost']['single']/100+$price['breakdown']['electricity']['energy_cost']['day']/100+$price['breakdown']['electricity']['energy_cost']['night']/100+$price['breakdown']['electricity']['energy_cost']['excl_night']/100;
                                                            $cer=$price['breakdown']['electricity']['energy_cost']['certificates']/100;
                                                            
                                                            if((($fixF+$cun+$cer)-($promo_discE))<=0){
                                                            $activeStarE=true;
                                                            
                                                            }
                                                            @endphp
                                                            <li>@lang('home.Discounts') @if($activeStarE==true) * @endif</li>
                                                            <!--<li>Service digitalisé</li>-->
                                                            <!--<li>getrouwheidskorting</li><br>-->
                                                            @else
                                                            <li>@lang('home.Discounts')</li>
                                                            @endif
                                                        </ul>
                                                    </div>
                                                    
                                                   
                                                    <div class="col-md-4 col-4 col-lg-4 energy-price red-color text-right">
                                                        <ul>
                                                            <li>&#8364; {{number_format($price['breakdown']['electricity']['energy_cost']['fixed_fee']/100,2,',', '.') }}</li>
                                                            <li >&#8364; {{number_format($price['breakdown']['electricity']['energy_cost']['single']/100+$price['breakdown']['electricity']['energy_cost']['day']/100+$price['breakdown']['electricity']['energy_cost']['night']/100+$price['breakdown']['electricity']['energy_cost']['excl_night']/100,2,',', '.') }}</li>
                                                            <li>&#8364;  {{number_format($price['breakdown']['electricity']['energy_cost']['certificates']/100,2,',', '.') }}</li>
                                                        @if((Session::get('promo')=='true' && $parameters['values']['promo_discount']['promo']=='promo') || (Session::get('domi')=='true' && $parameters['values']['promo_discount']['discount_serviceLevelPayment']=='domi') || (Session::get('email')=='true' && $parameters['values']['promo_discount']['discount_serviceLevelInvoicing']=='email'))
                                                            @php
                                                            $fixF=$price['breakdown']['electricity']['energy_cost']['fixed_fee']/100;
                                                            $cun=$price['breakdown']['electricity']['energy_cost']['single']/100+$price['breakdown']['electricity']['energy_cost']['day']/100+$price['breakdown']['electricity']['energy_cost']['night']/100+$price['breakdown']['electricity']['energy_cost']['excl_night']/100;
                                                            if((($price['totals']['year']['excl_promo']/100)-($ele_disc+$gas_disc+$sl_disc+$loyalty_disc))<=0){
                                                            $activeStar=true;
                                                            $ele_disc=$fixF+$cun;
                                                            }
                                                            
                                                            @endphp
                                                            <li class="red-text">- &#8364; {{number_format(($promo_discE),2,',', '.')}}</li>
                                                            <!--<li class="red-text">- &#8364; {{number_format($sl_disc,2,',', '.')}}</li>-->
                                                            <!--<li class="red-text">- &#8364; {{number_format($loyalty_disc,2,',', '.')}}</li><br>-->
                                                            @else
                                                            <li class="gray-text">- &#8364; 0,00</li>
                                                        @endif
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="row elec-sec-1">
                                                    <div class="col-md-12 col-lg-12 col-sm-12 mt-2">
                                                        <h6><b>@lang('home.Net_costs')</b></h6>
                                                    </div>
                                                </div>
                                                <div class="row net-sec mt-1">
                                                    <div class="col-md-8 col-8 col-lg-8 energy">
                                                        <ul>
                                                            <li>@lang('home.Distribution')</li>
                                                            <li>@lang('home.Transport')</li>
                                                        </ul>
                                                    </div> 
                                                    <div class="col-md-4 col-4 col-lg-4 energy-price text-right">
                                                        <ul>
                                                            <li>&#8364; {{number_format($price['breakdown']['electricity']['distribution_and_transport']['distribution']/100,2,',', '.')  }}</li>
                                                            <li>&#8364; {{number_format($price['breakdown']['electricity']['distribution_and_transport']['transport']/100,2,',', '.')  }}</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="row elec-sec-1">
                                                    <div class="col-md-12 col-lg-12 col-sm-12 mt-2">
                                                        <h6><b>@lang('home.Taxing')</b></h6>
                                                    </div>
                                                </div>
                                                <div class="row tax-sec mt-2">
                                                    <div class="col-md-8 col-8 col-lg-8 energy">
                                                        <ul>
                                                            <li>@lang('home.Taxing')</li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-4 col-4 col-lg-4 energy-price text-right">
                                                        <ul>
                                                            <li>&#8364; {{number_format($price['breakdown']['electricity']['taxes']['tax']/100,2,',', '.') }}</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="row total-sec mt-2">
                                                    <div class="col-md-8 col-8 col-lg-8 energy">
                                                        <ul>
                                                            <li><b>Total partiel E</b></li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-4 col-4 col-lg-4 energy-price text-right">
                                                        <ul>
                                                            <li><b>&#8364; {{number_format($price['breakdown']['electricity']['taxes']['tax']/100+$price['breakdown']['electricity']['distribution_and_transport']['transport']/100+$price['breakdown']['electricity']['distribution_and_transport']['distribution']/100+$price['breakdown']['electricity']['energy_cost']['certificates']/100+$price['breakdown']['electricity']['energy_cost']['single']/100+$price['breakdown']['electricity']['energy_cost']['day']/100+$price['breakdown']['electricity']['energy_cost']['night']/100+$price['breakdown']['electricity']['energy_cost']['excl_night']/100+$price['breakdown']['electricity']['energy_cost']['fixed_fee']/100,2,',', '.')  }}</b></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                            </div>
                                            @endif
                                            <!-- end of electricity -->

                                            <!-- gas-sec -->

                                            @if($product['type']=='pack'||$product['type']=='gas')
                                            <div @if($product['type']=='pack') class="col-md-4 col-lg-4 col-sm-12 gas-sec" @else class="col-md-6 col-lg-6 col-sm-12 gas-sec"  @endif>
                                                <div class="row elec-sec-head">
                                                    <div class="col-md-12 col-lg-12 col-sm-12 mt-3 ">
                                                        <h5><i class="fa fa-fire"></i> @lang('home.Gas')</h5>
                                                    </div>
                                                </div>
                                                <div class="row elec-sec-1">
                                                    <div class="col-md-12 col-lg-12 col-sm-12 mt-4">
                                                        <h6><b>@lang('home.Energy_Cost')</b></h6>
                                                    </div>
                                                </div>
                                                <div class="row energy-sec mt-1">
                                                    <div class="col-md-8 col-8 col-lg-8 energy ">
                                                        <ul>
                                                            <li>@lang('home.Fixed_cost')</li>
                                                            <li>@lang('home.Consumption')</li>
                                                            @if((Session::get('promo')=='true' && $parameters['values']['promo_discount']['promo']=='promo') || (Session::get('domi')=='true' && $parameters['values']['promo_discount']['discount_serviceLevelPayment']=='domi') || (Session::get('email')=='true' && $parameters['values']['promo_discount']['discount_serviceLevelInvoicing']=='email'))
                                                            @php
                                                            $activeStarG=false;
                                                            $fixF=$price['breakdown']['gas']['energy_cost']['fixed_fee']/100;
                                                            $cun=$price['breakdown']['gas']['energy_cost']['usage']/100;
                                                            if((($fixF+$cun)-($promo_discG))<=0){
                                                            
                                                           
                                                            $activeStarG=true;
                                                            }
                                                            
                                                            @endphp
                                                            <li>@lang('home.Discounts') @if($activeStarG==true) * @endif</li>
                                                            
                                                            <!--<li>Service digitalisé</li>-->
                                                            <!--<li>getrouwheidskorting</li><br>-->
                                                            @else
                                                             <li>@lang('home.Discounts')</li>
                                                            @endif
                                                        </ul>
                                                    </div>

                                                    <div class="col-md-4 col-4 col-lg-4 energy-price red-color text-right">
                                                        <ul>
                                                            <li>&#8364;</i> {{number_format($price['breakdown']['gas']['energy_cost']['fixed_fee']/100,2,',', '.')}}</li>
                                                            <li>&#8364; {{number_format($price['breakdown']['gas']['energy_cost']['usage']/100,2,',', '.')}}</li>
                                                               @if((Session::get('promo')=='true' && $parameters['values']['promo_discount']['promo']=='promo') || (Session::get('domi')=='true' && $parameters['values']['promo_discount']['discount_serviceLevelPayment']=='domi') || (Session::get('email')=='true' && $parameters['values']['promo_discount']['discount_serviceLevelInvoicing']=='email'))
                                                            
                                                            @php
                                                            $fixF=$price['breakdown']['gas']['energy_cost']['fixed_fee']/100;
                                                            $cun=$price['breakdown']['gas']['energy_cost']['usage']/100;
                                                            if((($price['totals']['year']['excl_promo']/100)-($ele_disc+$gas_disc+$sl_disc+$loyalty_disc))<=0){
                                                            
                                                            $gas_disc=$fixF+$cun;
                                                            $activeStar=true;
                                                            }
                                                            
                                                            @endphp
                                                            
                                                            <li class="red-text">- &#8364; @if(isset($promo_discG)){{number_format(($promo_discG),2,',', '.')}} @endif</li>
                                                            <!--<li class="red-text">- &#8364; {{number_format($sl_disc,2,',', '.')}}</li>-->
                                                            <!--<li class="red-text">- &#8364; {{number_format($loyalty_disc,2,',', '.')}}</li><br>-->
                                                            @else
                                                            <li class="gray-text">- &#8364; 0,00</li>
                                                            @endif
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="row elec-sec-1">
                                                    <div class="col-md-12 col-lg-12 col-sm-12 mt-2">
                                                        <h6><b>@lang('home.Net_costs')</b></h6>
                                                    </div>
                                                </div>
                                                <div class="row net-sec mt-1">
                                                    <div class="col-md-8 col-8 col-lg-8 energy">
                                                        <ul>
                                                            <li>@lang('home.Distribution')</li>
                                                            <li>@lang('home.Transport')</li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-4 col-4 col-lg-4 energy-price text-right">
                                                        <ul>
                                                            <li>&#8364; {{number_format($price['breakdown']['gas']['distribution_and_transport']['distribution']/100,2,',', '.') }}</li>
                                                            <li>&#8364; {{number_format($price['breakdown']['gas']['distribution_and_transport']['transport']/100,2,',', '.') }}</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="row elec-sec-1">
                                                    <div class="col-md-12 col-lg-12 col-sm-12 mt-2">
                                                        <h6><b>@lang('home.Taxing')</b></h6>
                                                    </div>
                                                </div>
                                                <div class="row tax-sec mt-2">
                                                    <div class="col-md-6 col-6 col-lg-6 energy">
                                                        <ul>
                                                            <li>@lang('home.Taxing')</li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-6 col-6 col-lg-6 energy-price text-right">
                                                        <ul>
                                                            <li>&#8364; {{number_format($price['breakdown']['gas']['taxes']['tax']/100,2,',', '.')}}</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="row total-sec mt-2">
                                                    <div class="col-md-6 col-6 col-lg-6 energy">
                                                        <ul>
                                                            <li><b>Total partiel G</b></li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-6 col-6 col-lg-6 energy-price text-right">
                                                        <ul>
                                                            <li><b>&#8364; {{number_format(($price['breakdown']['gas']['taxes']['tax']+$price['breakdown']['gas']['distribution_and_transport']['transport']+$price['breakdown']['gas']['distribution_and_transport']['distribution']+$price['breakdown']['gas']['energy_cost']['usage']+$price['breakdown']['gas']['energy_cost']['fixed_fee'])/100,2,',', '.')}}</b></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>                                            
                                            @endif

                                            <div @if($product['type']=='pack') class="col-md-4 col-lg-4 col-sm-12 total-sec" @else class="col-md-6 col-lg-6 col-sm-12 total-sec" @endif >
                                                <div class="row elec-sec-head">
                                                    <div class="col-md-12 col-lg-12 col-sm-12 mt-3 ">
                                                        <h5>@lang('home.Total')</h5>
                                                    </div>
                                                </div>
                                                
                                                @php
                                                        
                                                        if(isset($ele_disc)){
                                                        $eleD=$ele_disc;
                                                        }else{
                                                        $eleD=0;
                                                        
                                                        }
                                                        if(isset($gas_disc)){
                                                        $gasD=$gas_disc;
                                                        }else{
                                                        $gasD=0;
                                                        }
                                                        
                                                        if(isset($all_disc)){
                                                        $all_disc=$all_disc;
                                                        }else{
                                                        $all_disc=0;
                                                        }
                                                        
                                                        
                                                        @endphp
                                                        @if($product['type']=="pack")  
                                                                @php $all_discTotal=$all_disc;  @endphp
                                                                @else
                                                                
                                                               @php $all_discTotal=$all_disc; @endphp
                                                                
                                                                @endif 
                                                       
                                                <div class="total-bg mt-4">
                                                    
                                                    <!--total section-->
                                                    
                                                    <div class="total_sec_last">
                                                        
                                                            <div class="left_total">
                                                                @if($p_type=="pack" && $packType!="electricity" && $packType!="gas") @lang('home.Gas') + @lang('home.Electricity') @elseif($p_type=='gas' || $packType=="gas") @lang('home.Gas') @elseif($p_type=='electricity' || $packType=="electricity") @lang('home.Electricity') @else @endif
                                                            </div>
                                                            <div class="right_total">
                                                              &#8364; {{ number_format($price['totals']['year']['excl_promo']/100,2,',', '.') }}
                                                            </div>
                                                            
                                                            @if((Session::get('promo')=='true' && $parameters['values']['promo_discount']['promo']=='promo') || (Session::get('domi')=='true' && $parameters['values']['promo_discount']['discount_serviceLevelPayment']=='domi') || (Session::get('email')=='true' && $parameters['values']['promo_discount']['discount_serviceLevelInvoicing']=='email'))
                                                                
                                                            <div class="left_total">
                                                                Réductions de bienvenue
                                                            </div>
                                                            <div class="right_total red-text">
                                                              &#8364; -{{number_format(($promo_disc),2,',', '.')}}
                                                            </div>
                                                            @if($sl_disc>0)
                                                            <div class="left_total">
                                                                Service digitalisé
                                                            </div>
                                                            <div class="right_total red-text">
                                                               &#8364; -{{number_format($sl_disc,2,',', '.')}}
                                                            </div>
                                                            @endif
                                                            @if($loyalty_disc>0)
                                                            <div class="left_total">
                                                                Getrouwheidskorting
                                                            </div>
                                                            <div class="right_total red-text">
                                                              &#8364;  -{{number_format($loyalty_disc,2,',', '.')}}
                                                            </div>
                                                            @endif
                                                            <div class="left_total">
                                                                
                                                            </div>
                                                            <div class="right_total">
                                                                
                                                              &#8364;  {{ number_format(($price['totals']['year']['excl_promo']/100)-($eleD+$gasD+$all_discTotal),2,',', '.') }}
                                                            </div>
                                                            
                                                            
                                                            @else
                                                            
                                                            <div class="left_total">
                                                               
                                                            </div>
                                                            <div class="right_total">
                                                              &#8364;  {{ number_format(($price['totals']['year']['excl_promo']/100),2,',', '.') }}
                                                            </div>
                                                            
                                                            
                                                             @endif
                                                        </div>
                                                        
                                                    <!--total section-end-->
                                                    
                                                   <!--  <div class="row total-sec-1">
                                                        
                                                        <div class="col-md-8 col-8 col-lg-8 energy ">
                                                            <ul>
                                                                <li>@if($p_type=="pack" && $packType!="electricity" && $packType!="gas") @lang('home.Gas') + @lang('home.Electricity') @elseif($p_type=='gas' || $packType=="gas") @lang('home.Gas') @elseif($p_type=='electricity' || $packType=="electricity") @lang('home.Electricity') @else @endif</li>
                                                                 @if((Session::get('promo')=='true' && $parameters['values']['promo_discount']['promo']=='promo') || (Session::get('domi')=='true' && $parameters['values']['promo_discount']['discount_serviceLevelPayment']=='domi') || (Session::get('email')=='true' && $parameters['values']['promo_discount']['discount_serviceLevelInvoicing']=='email'))
                                                                <!--<li>@lang('home.Discounts')</li>-->
                                                          <!--       <li>Réductions de bienvenue</li>
                                                                <li>Service digitalisé</li>
                                                                <li>getrouwheidskorting</li>
                                                                @endif
                                                            </ul>
                                                        </div> -->
                                                        
                                                  <!--       @php
                                                        
                                                        if(isset($ele_disc)){
                                                        $eleD=$ele_disc;
                                                        }else{
                                                        $eleD=0;
                                                        
                                                        }
                                                        if(isset($gas_disc)){
                                                        $gasD=$gas_disc;
                                                        }else{
                                                        $gasD=0;
                                                        }
                                                        
                                                        if(isset($all_disc)){
                                                        $all_disc=$all_disc;
                                                        }else{
                                                        $all_disc=0;
                                                        }
                                                        
                                                        
                                                        @endphp -->
                                                        
                                                      
                                                       <!--  <div class="col-md-4 col-4 col-lg-4 energy-price second-red text-right">
                                                            <ul>
                                                                <li><b>&#8364; {{ number_format($price['totals']['year']['excl_promo']/100,2,',', '.') }}</b></li>
                                                                   @if((Session::get('promo')=='true' && $parameters['values']['promo_discount']['promo']=='promo') || (Session::get('domi')=='true' && $parameters['values']['promo_discount']['discount_serviceLevelPayment']=='domi') || (Session::get('email')=='true' && $parameters['values']['promo_discount']['discount_serviceLevelInvoicing']=='email'))
                                                                <li class="red-text"><b>- &#8364; {{number_format($eleD+$gasD,2,',', '.')}}</b></li>
                                                                @if($sl_disc>0) <li class="red-text">- &#8364; {{number_format($sl_disc,2,',', '.')}}</li>@endif
                                                                @if($loyalty_disc>0)<li class="red-text">- &#8364; {{number_format($loyalty_disc,2,',', '.')}}</li><br>@endif
                                                                
                                                                <li><b>&#8364; {{ number_format(($price['totals']['year']['excl_promo']/100)-($eleD+$gasD+$all_disc),2,',', '.') }}</b></li>
                                                                @else
                                                              
                                                                <li><b>&#8364; {{ number_format(($price['totals']['year']['excl_promo']/100),2,',', '.') }}</b></li>
                                                                
                                                                @endif
                                                            </ul>
                                                        </div>
                                                    </div> -->
                                                </div> 
                                                <div class="row elec-sec-1">
                                                    <div class="col-md-12 col-lg-12 col-sm-12 mt-2">
                                                        <h6><b>@lang('home.Unit_Prices')</b></h6>
                                                    </div>
                                                </div>
                                                <div class="row net-sec net-sec-1 mt-1">
                                                    <div class="col-md-6 col-8 energy">
                                                        <ul>
                                                           
                                                           @if(isset($price['breakdown']['electricity']['unit_cost']['energy_cost']))  <li>@lang('home.Electricity')</li> @endif
                                                           @if(isset($price['breakdown']['gas']['unit_cost']['energy_cost']))  <li>@lang('home.Gas')</li> @endif
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-6 col-4 energy-price text-right">
                                                        <ul>
                                                            @php
                                                            $totalElec=$parameters['values']['usage_single']+$parameters['values']['usage_day']+$parameters['values']['usage_night']+$parameters['values']['usage_excl_night'];
                                                            $totalgas=$parameters['values']['usage_gas'];
                                                            
                                                            @endphp
                                                            
                                                         @if($activeStar==true)
                                                         
                                                         
                                                         @if((Session::get('promo')=='true' && $parameters['values']['promo_discount']['promo']=='promo') || (Session::get('domi')=='true' && $parameters['values']['promo_discount']['discount_serviceLevelPayment']=='domi') || (Session::get('email')=='true' && $parameters['values']['promo_discount']['discount_serviceLevelInvoicing']=='email'))
                                                            
                                                            @if(isset($price['breakdown']['electricity']['unit_cost']['energy_cost']))
                                                            @if($totalElec>0)

                                                             <li>{{number_format(((($price['breakdown']['electricity']['energy_cost']['fixed_fee']/100)+($price['breakdown']['electricity']['energy_cost']['single']/100+$price['breakdown']['electricity']['energy_cost']['day']/100+$price['breakdown']['electricity']['energy_cost']['night']/100+$price['breakdown']['electricity']['energy_cost']['excl_night']/100)+($price['breakdown']['electricity']['energy_cost']['certificates']/100)-($promo_discE))/$totalElec)*100,2,',', '.')}} &#8364;c/kWh</li>

                                                             @else

                                                            0,00  &#8364;c/kWh

                                                            @endif
                                                             @endif


                                                             @if(isset($price['breakdown']['gas']['unit_cost']['energy_cost'])) <li>

                                                            @if($totalgas>0)
                                                            {{number_format(((($price['breakdown']['gas']['energy_cost']['fixed_fee']/100)+($price['breakdown']['gas']['energy_cost']['usage']/100)-($promo_discG))/$totalgas)*100,2,',', '.')}}

                                                            @else
                                                            0,00
                                                            @endif
                                                             &#8364;c/kWh</li> @endif

                                                            
                                                        @else
                                                           @if(isset($price['breakdown']['electricity']['unit_cost']['energy_cost'])) <li>{{number_format(((($price['breakdown']['electricity']['energy_cost']['fixed_fee']/100)+($price['breakdown']['electricity']['energy_cost']['single']/100+$price['breakdown']['electricity']['energy_cost']['day']/100+$price['breakdown']['electricity']['energy_cost']['night']/100+$price['breakdown']['electricity']['energy_cost']['excl_night']/100)+($price['breakdown']['electricity']['energy_cost']['certificates']/100))/$totalElec)*100,2,',', '.')}} &#8364;c/kWh</li>@endif
                                                            @if(isset($price['breakdown']['gas']['unit_cost']['energy_cost'])) <li>{{number_format(((($price['breakdown']['gas']['energy_cost']['fixed_fee']/100)+($price['breakdown']['gas']['energy_cost']['usage']/100))/$totalgas)*100,2,',', '.')}} &#8364;c/kWh</li> @endif
                                                        
                                                        @endif
                                                         
                                                         
                                                         @else
                                                            
                                                          @if((Session::get('promo')=='true' && $parameters['values']['promo_discount']['promo']=='promo') || (Session::get('domi')=='true' && $parameters['values']['promo_discount']['discount_serviceLevelPayment']=='domi') || (Session::get('email')=='true' && $parameters['values']['promo_discount']['discount_serviceLevelInvoicing']=='email'))
                                                             
                                                            @if($totalElec>0)
                                                           @php  $uPrice=(($price['breakdown']['electricity']['energy_cost']['fixed_fee']/100)+($price['breakdown']['electricity']['energy_cost']['single']/100+$price['breakdown']['electricity']['energy_cost']['day']/100+$price['breakdown']['electricity']['energy_cost']['night']/100+$price['breakdown']['electricity']['energy_cost']['excl_night']/100)+($price['breakdown']['electricity']['energy_cost']['certificates']/100)-($promo_discE))/$totalElec;   @endphp
                                                            @else
                                                           @php $uPrice=0; @endphp
                                                            @endif
                                                            
                                                            @if(isset($price['breakdown']['electricity']['unit_cost']['energy_cost'])) <li>{{number_format(($uPrice)*100,2,',', '.')}} &#8364;c/kWh</li>@endif
                                                            @if(isset($price['breakdown']['gas']['unit_cost']['energy_cost'])) <li>@if($totalgas>0) {{number_format(((($price['breakdown']['gas']['energy_cost']['fixed_fee']/100)+($price['breakdown']['gas']['energy_cost']['usage']/100)-($promo_discG))/$totalgas)*100,2,',', '.')}} @else {{number_format(0*100,2,',', '.')}}  @endif &#8364;c/kWh</li> @endif
                                                        @else
                                                            @if($totalElec>0)
                                                           @php  $uPrice=(($price['breakdown']['electricity']['energy_cost']['fixed_fee']/100)+($price['breakdown']['electricity']['energy_cost']['single']/100+$price['breakdown']['electricity']['energy_cost']['day']/100+$price['breakdown']['electricity']['energy_cost']['night']/100+$price['breakdown']['electricity']['energy_cost']['excl_night']/100)+($price['breakdown']['electricity']['energy_cost']['certificates']/100))/$totalElec;   @endphp
                                                            @else
                                                           @php $uPrice=0; @endphp
                                                            @endif
                                                        
                                                           @if(isset($price['breakdown']['electricity']['unit_cost']['energy_cost'])) <li>{{number_format(($uPrice)*100,2,',', '.')}} &#8364;c/kWh</li>@endif
                                                            @if(isset($price['breakdown']['gas']['unit_cost']['energy_cost'])) <li>@if($totalgas>0) {{number_format(((($price['breakdown']['gas']['energy_cost']['fixed_fee']/100)+($price['breakdown']['gas']['energy_cost']['usage']/100))/$totalgas)*100,2,',', '.')}} @else {{number_format(0*100,2,',', '.')}}  @endif &#8364;c/kWh</li> @endif
                                                        
                                                        @endif
                                                        
                                                        @endif
                                                        </ul>
                                                    </div>
                                                </div>
                                                 <div class="row elec-sec-1">
                                                    <div class="col-md-12 col-lg-12 col-sm-12 mt-2">
                                                        <h6><b>@lang('home.Documents')</b></h6>
                                                    </div>

                                                    <div class="net-sec net-sec-1 mt-1">
                                                    <div class="col-md-12 col-12 energy">
                                                        <ul>
                                                        @if($product['type']=='pack') 
                                                            <li><a href="{{$product['underlying_products']['electricity']['terms_url_dynamic']}}" target="_block"><img src="{{url('images/pdf-image.png')}}">&nbsp @lang('home.Tariff_card_Electricity')</a></li>
                                                            <li><a href="{{$product['underlying_products']['gas']['terms_url_dynamic']}}" target="_block"><img src="{{url('images/pdf-image.png')}}">&nbsp @lang('home.Tariff_card_Gas')</a></li>
                                                            
                                                        @elseif ($product['type']=='electricity')
                                                            <li><a href="{{$product['terms_url_dynamic']}}" target="_block"><img src="{{url('images/pdf-image.png')}}">&nbsp @lang('home.Tariff_card_Electricity')</a></li>
                                                            
                                                        @elseif ($product['type']=='gas')
                                                            <li><a href="{{$product['terms_url_dynamic']}}" target="_block"><img src="{{url('images/pdf-image.png')}}">&nbsp @lang('home.Tariff_card_Gas')</a></li>
                                                          
                                                        @else
                                                            
                                                        @endif
                                                    </ul>
                                                    </div>
                                                </div>

                                                   
                                                    
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 mt-4 text-right" >
                                            <form action="{{url('confirmer')}}" method="get">
                                        {{csrf_field()}}
                                        <input type="hidden" name="pri_save" class="pri_save{{$si}}">
                                        <input type="hidden" name="pro_id"  value="{{$product['id']}}">
                                        <input type="hidden" name="supplier"  value="{{$supplier['name']}}">
                                        <input type="hidden" name="product"  value="{{$product['name']}}">
                                         <input type="hidden" name="pro_type"  value="{{$parameters['values']['comparison_type']}}">
                                        <input type="hidden" name="type"  value="{{Session::get('customer_type')}}">
                                        <input type="hidden" name="postalcode"  value="{{Session::get('postal_code')}}">
                                        <input type="hidden" name="elect_day" id="" @if (isset($usage_elec_day)) value="{{$usage_elec_day}}" @endif>
                                        <input type="hidden" name="elect_night" @if (isset($usage_elec_night)) value="{{$usage_elec_night}}" @endif >
                                        <input type="hidden" name="gas_cons" @if (isset($usage_gas)) value="{{$usage_gas}}" @endif>
                                        @if($packType=='elecrticity')
                                        <input type="hidden" name="sub_url"  value="$product['underlying_products']['electricity']['subscribe_url']">
                                        @elseif($packType=='gas')
                                        <input type="hidden" name="sub_url"  value="$product['underlying_products']['gas']['subscribe_url']">
                                        @else
                                        <input type="hidden" name="sub_url"  value="{{$product['subscribe_url']}}">
                                        @endif
                                        <input type="hidden" name="from" value="pack" >
                                          <input type="hidden" name="pr_type" id="pr_type" value="">
                                        <button id="choose{{$product['id']}}" data-id="{{$product['id']}}" type="submit" class="choose1">@lang('home.To_Request')</button>
                                                          </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row section-last mt-4">
                                            <div class="col-md-8">

                                               
@php
Session::put('p_type',$p_type);
$string = trans("home.prices_text");
$replace = ['{X5}','{X2}','{X3}'];
$string1 = trans("home.prices_text_continuation");
$replace1 = ['{X6}'];

$time=strtotime($price['validity_period']['end']);
$date = new DateTime('now');
$modifiedDate=$date->modify('last day of this month');
$month=$date->format('d/m/Y');

$year=date("Y",$time);
$x1=trans('home.Electricity');
$customer_type=Session::get('customer_type');
$x2="";

if($p_type=='pack' || $p_type=='gas' || $p_type=='electricity' ){
            if($month=='january'){
            $x2=trans("home.1");
            }
            if($month=='february'){
            $x2=trans("home.2");
            }
            if($month=='march'){
            $x2=trans("home.3");
            }
            if($month=='april'){
            $x2=trans("home.4");
            }
            if($month=='may'){
            $x2=trans("home.5");
            }
            if($month=='june'){
            $x2=trans("home.6");
            }
            if($month=='july'){
            $x2=trans("home.7");
            }
            if($month=='august'){
            $x2=trans("home.8");
            }
            if($month=='september'){
            $x2=trans("home.9");
            }
            if($month=='october'){
            $x2=trans("home.10");
            }
            if($month=='november'){
            $x2=trans("home.11");
            }
            if($month=='december'){
            $x2=trans("home.12");
            }
}

if($customer_type=='residential'){
$x5=trans('home.x5_res');
$x6=trans('home.x6_res');
}
if($customer_type=='professional'){
$x5=trans('home.x5_pro');
$x6=trans('home.x6_pro');
}
$info = [
    'X5' => $x5,
    'X2'  => $x2,
    'X3'   => $month,
   
];
$info1 = [
    'X6'      => $x6,
];


@endphp
                                                
                                                <p>{!!str_replace($replace, $info, $string)!!} <a href="" class="disctab-active" onclick="openCity(event, 'discount{{$product['id']}}')">{{ ucfirst(trans('home.Discounts')) }}</a> {!!str_replace($replace1, $info1, $string1)!!}</p>
                                           
                                             @if((Session::get('promo')!='true' && $parameters['values']['promo_discount']['promo']=='promo') || (Session::get('domi')!='true' && $parameters['values']['promo_discount']['discount_serviceLevelPayment']=='domi') || (Session::get('email')!='true' && $parameters['values']['promo_discount']['discount_serviceLevelInvoicing']=='email'))
                                                 @if(Session::get('locale')=='nl')<button class="disc-activate">Op dit tarief zijn kortingen beschikbaar. Klik hier om ze te activeren.</button>@else <button class="disc-activate">Ce tarif contient des réductions supplémentaires. Cliquez pour les activer.</button> @endif
                                           
                                           @endif
                                            
                                            
                                            <br/>
                                            @if($activeStar==true)
                                            
                                          <p>*  Les réductions ne peuvent jamais dépasser la redevance fixe + les coûts de consommation. C’est pour cela que la valeur de la réduction dans cet aperçu est plus bas que la réduction complète dans l’aperçu des réductions.</p>  
                                            
                                            @endif
                                            
                                            </div>
                                        </div>
                                    </div>


                                      <div id="discount{{$product['id']}}" class="tabcontent">
                                       
                                        <div class="row discount">
                                            <div class="col-md-12 mt-4">
                                                @php $ab=array();  
                                             
                                                
                                                
                                                
                                                
                                                
                                                @endphp
                                                @foreach($price['breakdown']['discounts'] as $discounts)
                                                
                                               @php 
                                                array_push($ab,$discounts['validity_period']['end']);
                                               @endphp
                                                
                                                @endforeach
                                               
                                                <?php

$date_arr=$ab;

usort($date_arr, function($a, $b) {
    $dateTimestamp1 = strtotime($a);
    $dateTimestamp2 = strtotime($b);

    return $dateTimestamp1 < $dateTimestamp2 ? -1: 1;
});

// print_r(current($date_arr));



?>



                                                
                                                
                                                
                                                @if(isset($endDate)) {{$endDate}} @endif
                                                
                                                @php                                               
$string = trans("home.switch_to");
$replace = ['{SUPPLIER}','{PRODUCT}','{VALIDITYDATE}'];
$info = [
    'SUPPLIER' => $supplier['name'],
    'PRODUCT' => $product['name'],
   'VALIDITYDATE'=>Carbon\Carbon::parse(current($date_arr))->format('d/m/Y'),
   
];

@endphp
                                             @if($per1!=0)   
                                             <p>@php echo str_replace($replace, $info, $string); @endphp</p>
                                             @else
                                              <p>@lang('home.Currently_no_discount')</p>
                                             @endif
                                                <ul class="nav nav-tabs" id="myTab"  role="tablist">

                                                    @php  $disc_total="0"; $checkPlus=0; $i="0"; 
                                                    
                                                    
                                                    if($discPromo==true){
                                                    $filtered = collect($price['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['fuel_type']=='electricity' && $value['parameters']['discount_type']!='servicelevel' && $value['parameters']['discount_type']!='loyalty'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredE=$filtered->all();
                                                    }else{
                                                    
                                                    $filtered = collect($price['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['fuel_type']=='unknown' && $value['parameters']['discount_type']!='servicelevel' && $value['parameters']['discount_type']!='loyalty'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredE=$filtered->all();
                                                    
                                                    }
                                                    
                                                     if($discPromo==true){
                                                     $filtered = collect($price['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['fuel_type']=='gas' && $value['parameters']['discount_type']!='servicelevel' && $value['parameters']['discount_type']!='loyalty'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredG=$filtered->all();
                                                    
                                                    }else{
                                                    
                                                     $filtered = collect($price['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['fuel_type']=='unknown' && $value['parameters']['discount_type']!='servicelevel' && $value['parameters']['discount_type']!='loyalty'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredG=$filtered->all();
                                                    
                                                    
                                                    }
                                                    
                                                    if($discPromo==true){
                                                     $filtered = collect($price['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['fuel_type']=='all' && $value['parameters']['discount_type']!='servicelevel' && $value['parameters']['discount_type']!='loyalty'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredAll=$filtered->all();
                                                    
                                                    }else{
                                                    
                                                     $filtered = collect($price['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['fuel_type']=='unknown' && $value['parameters']['discount_type']!='servicelevel' && $value['parameters']['discount_type']!='loyalty'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredAll=$filtered->all();
                                                    
                                                    
                                                    }
                                                    
                                                    if($discService==true){
                                                    
                                                     $filtered = collect($price['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['discount_type']=='servicelevel'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredS=$filtered->all();
                                                    }else{
                                                    
                                                    $filtered = collect($price['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['discount_type']=='unknown'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredS=$filtered->all();
                                                    
                                                    
                                                    }
                                                    
                                                    if($discloyalty==true){
                                                    $filtered = collect($price['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['discount_type']=='loyalty'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredL=$filtered->all();
                                                    }else{
                                                    
                                                    $filtered = collect($price['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['discount_type']=='unknown'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredL=$filtered->all();
                                                    
                                                    
                                                    }
                                                    
                                                    
                                                    
                                                    
                                                    @endphp
                                                    
                                                    @php $checkPlus=count($filteredE)+count($filteredG)+count($filteredS)+count($filteredL)+count($filteredAll); @endphp
                                                 
                                                    
                                                    @foreach($filteredE as $discounts)
                                                    

                                                    @php
                                                    
                                                    
                                                    $disc_total=$disc_total+$discounts['amount']; $i++; @endphp
                                                   

                                                    <li class="nav-item">
                                                        <a class="nav-link @if($i==1) active @endif " id="home-tab{{$discounts['_id']}}" data-toggle="tab" href="#home{{$discounts['_id']}}{{$product['id']}}" role="tab" aria-controls="home" aria-selected="true">
                                                            <span class="main-sec">
                                                                <span class="main-sec-1">
<h5><b> 
@if($discounts['parameters']['unit']=='euro') 
&#8364; {{ number_format($discounts['amount'],2,',', '.')}}
@endif

@if($discounts['parameters']['unit']=='eurocent') 
&#8364; {{ number_format($discounts['amount'],2,',', '.')}}
@endif
@php $priceTot=$price['breakdown']['electricity']['energy_cost']['single']/100+$price['breakdown']['electricity']['energy_cost']['day']/100+$price['breakdown']['electricity']['energy_cost']['night']/100+$price['breakdown']['electricity']['energy_cost']['excl_night']/100;  @endphp

@if($discounts['parameters']['unit']=='pct')
&#8364; {{ number_format(($discounts['amount']),2,',', '.') }}
@endif</b></h5>


<p class="amt">@if($discounts['parameters']['value_type']=='fixed') @lang('home.fixed') @endif</p>

@if($discounts['parameters']['unit']=='eurocent')
<p class="amt">{{number_format($discounts['parameters']['value'],2,',', '.')}} €c/kWh </p>
@endif
@if($discounts['parameters']['unit']=='pct')
<p class="amt">{{$discounts['parameters']['value']*100}} % @lang('home.on_consumption')</p>
@endif
@if($discounts['parameters']['discount_type']=='servicelevel')
<p class="mode amt"><i class="fas fa-at"></i> Service digitalisé</p>
@elseif($discounts['parameters']['discount_type']=='loyalty')
<p class="mode amt"><img class="online_web" src="{{url('images/loyality.png')}}">Reductions de loyauté</p>
@else
<p class="mode amt">@if($discounts['parameters']['fuel_type']=='gas')<i class="fa fa-fire"></i> @else <i class="fa fa-bolt"></i> @endif @if($discounts['parameters']['fuel_type']=='gas') @lang('home.Gas') @else @lang('home.Electricity') @endif</p>

@endif
</span>
                                                            </span>
                                                        </a>
                                                    </li><span class="plus">@if($checkPlus> $i) + @endif</span>

                                                    @endforeach
                                                    
                                                    
                                                    
                                                    
                                                    @foreach($filteredG as $discounts)
                                                    

                                                    @php  $disc_total=$disc_total+$discounts['amount']; $i++;  @endphp
                                                   

                                                    <li class="nav-item">
                                                        <a class="nav-link @if($i==1) active @endif " id="home-tab{{$discounts['_id']}}" data-toggle="tab" href="#home{{$discounts['_id']}}{{$product['id']}}" role="tab" aria-controls="home" aria-selected="true">
                                                            <span class="main-sec">
                                                                <span class="main-sec-1">
<h5><b> 
@if($discounts['parameters']['unit']=='euro') 
&#8364; {{ number_format($discounts['amount'],2,',', '.')}}
@endif

@if($discounts['parameters']['unit']=='eurocent') 
&#8364; {{ number_format($discounts['amount'],2,',', '.')}}
@endif

@if($discounts['parameters']['unit']=='pct')
&#8364; {{ number_format(($discounts['amount']),2,',', '.') }}
@endif</b></h5>


<p class="amt">@if($discounts['parameters']['value_type']=='fixed') @lang('home.fixed') @endif</p>

@if($discounts['parameters']['unit']=='eurocent')
<p class="amt">{{number_format($discounts['parameters']['value'],2,',', '.')}} €c/kWh </p>
@endif
@if($discounts['parameters']['unit']=='pct')
<p class="amt">{{$discounts['parameters']['value']*100}} % @lang('home.on_consumption')</p>
@endif
@if($discounts['parameters']['discount_type']=='servicelevel')
<p class="mode amt"><i class="fas fa-at"></i> Service digitalisé</p>
@elseif($discounts['parameters']['discount_type']=='loyalty')
<p class="mode amt"><img class="online_web" src="{{url('images/loyality.png')}}">Reductions de loyauté</p>
@else
<p class="mode amt">@if($discounts['parameters']['fuel_type']=='gas')<i class="fa fa-fire"></i> @else <i class="fa fa-bolt"></i> @endif @if($discounts['parameters']['fuel_type']=='gas') @lang('home.Gas') @else @lang('home.Electricity') @endif</p>

@endif
</span>
                                                            </span>
                                                        </a>
                                                    </li><span class="plus">@if($checkPlus> $i) + @endif</span>

                                                    @endforeach
                                                    
                                                     @foreach($filteredAll as $discounts)
                                                    

                                                    @php  $disc_total=$disc_total+$discounts['amount']; $i++;  @endphp
                                                   

                                                    <li class="nav-item">
                                                        <a class="nav-link @if($i==1) active @endif " id="home-tab{{$discounts['_id']}}" data-toggle="tab" href="#home{{$discounts['_id']}}{{$product['id']}}" role="tab" aria-controls="home" aria-selected="true">
                                                            <span class="main-sec">
                                                                <span class="main-sec-1">
<h5><b> 
@if($discounts['parameters']['unit']=='euro') 
&#8364; {{ number_format($discounts['amount'],2,',', '.')}}
@endif

@if($discounts['parameters']['unit']=='eurocent') 
&#8364; {{ number_format($discounts['amount'],2,',', '.')}}
@endif

@if($discounts['parameters']['unit']=='pct')
&#8364; {{ number_format(($discounts['amount']),2,',', '.') }}
@endif</b></h5>


<p class="amt">@if($discounts['parameters']['value_type']=='fixed') @lang('home.fixed') @endif</p>

@if($discounts['parameters']['unit']=='eurocent')
<p class="amt">{{number_format($discounts['parameters']['value'],2,',', '.')}} €c/kWh </p>
@endif
@if($discounts['parameters']['unit']=='pct')
<p class="amt">{{$discounts['parameters']['value']*100}} % @lang('home.on_consumption')</p>
@endif
@if($discounts['parameters']['discount_type']=='servicelevel')
<p class="mode amt"><i class="fas fa-at"></i> Service digitalisé</p>
@elseif($discounts['parameters']['discount_type']=='loyalty')
<p class="mode amt"><img class="online_web" src="{{url('images/loyality.png')}}">Reductions de loyauté</p>
@else
<p class="mode amt">@if($discounts['parameters']['fuel_type']=='gas')<i class="fa fa-fire"></i> @else <i class="fa fa-bolt"></i> @endif @if($discounts['parameters']['fuel_type']=='gas') @lang('home.Gas') @else @lang('home.Electricity') @endif</p>

@endif
</span>
                                                            </span>
                                                        </a>
                                                    </li><span class="plus">@if($checkPlus> $i) + @endif</span>

                                                    @endforeach
                                                    
                                                    @foreach($filteredS as $discounts)
                                                    

                                                    @php  $disc_total=$disc_total+$discounts['amount']; $i++;  @endphp
                                                   

                                                    <li class="nav-item">
                                                        <a class="nav-link @if($i==1) active @endif " id="home-tab{{$discounts['_id']}}" data-toggle="tab" href="#home{{$discounts['_id']}}{{$product['id']}}" role="tab" aria-controls="home" aria-selected="true">
                                                            <span class="main-sec">
                                                                <span class="main-sec-1">
<h5><b> 
@if($discounts['parameters']['unit']=='euro') 
&#8364; {{ number_format($discounts['amount'],2,',', '.')}}
@endif

@if($discounts['parameters']['unit']=='eurocent') 
&#8364; {{ number_format($discounts['amount'],2,',', '.')}}
@endif

@if($discounts['parameters']['unit']=='pct')
&#8364; {{ number_format(($discounts['amount']),2,',', '.') }}
@endif</b></h5>


<p class="amt">@if($discounts['parameters']['value_type']=='fixed') @lang('home.fixed') @endif</p>

@if($discounts['parameters']['unit']=='eurocent')
<p class="amt">{{number_format($discounts['parameters']['value'],2,',', '.')}} €c/kWh </p>
@endif
@if($discounts['parameters']['unit']=='pct')
<p class="amt">{{$discounts['parameters']['value']*100}} % @lang('home.on_consumption')</p>
@endif
@if($discounts['parameters']['discount_type']=='servicelevel')
<p class="mode amt"><i class="fas fa-at"></i> Service digitalisé</p>
@elseif($discounts['parameters']['discount_type']=='loyalty')
<p class="mode amt"><img class="online_web" src="{{url('images/loyality.png')}}">Reductions de loyauté</p>
@else
<p class="mode amt">@if($discounts['parameters']['fuel_type']=='gas')<i class="fa fa-fire"></i> @else <i class="fa fa-bolt"></i> @endif @if($discounts['parameters']['fuel_type']=='gas') @lang('home.Gas') @else @lang('home.Electricity') @endif</p>

@endif
</span>
                                                            </span>
                                                        </a>
                                                    </li><span class="plus">@if($checkPlus> $i) + @endif</span>

                                                    @endforeach
                                                    
                                                    
                                                    @foreach($filteredL as $discounts)
                                                    

                                                    @php  $disc_total=$disc_total+$discounts['amount']; $i++;  @endphp
                                                   

                                                    <li class="nav-item">
                                                        <a class="nav-link @if($i==1) active @endif " id="home-tab{{$discounts['_id']}}" data-toggle="tab" href="#home{{$discounts['_id']}}{{$product['id']}}" role="tab" aria-controls="home" aria-selected="true">
                                                            <span class="main-sec">
                                                                <span class="main-sec-1">
<h5><b> 
@if($discounts['parameters']['unit']=='euro') 
&#8364; {{ number_format($discounts['amount'],2,',', '.')}}
@endif

@if($discounts['parameters']['unit']=='eurocent') 
&#8364; {{ number_format($discounts['amount'],2,',', '.')}}
@endif

@if($discounts['parameters']['unit']=='pct')
&#8364; {{ number_format(($discounts['amount']),2,',', '.') }}
@endif</b></h5>


<p class="amt">@if($discounts['parameters']['value_type']=='fixed') @lang('home.fixed') @endif</p>

@if($discounts['parameters']['unit']=='eurocent')
<p class="amt">{{number_format($discounts['parameters']['value'],2,',', '.')}} €c/kWh </p>
@endif
@if($discounts['parameters']['unit']=='pct')
<p class="amt">{{$discounts['parameters']['value']*100}} % @lang('home.on_consumption')</p>
@endif
@if($discounts['parameters']['discount_type']=='servicelevel')
<p class="mode amt"><i class="fas fa-at"></i> Service digitalisé</p>
@elseif($discounts['parameters']['discount_type']=='loyalty')
<p class="mode amt"><img class="online_web" src="{{url('images/loyality.png')}}">Reductions de loyauté</p>
@else
<p class="mode amt">@if($discounts['parameters']['fuel_type']=='gas')<i class="fa fa-fire"></i> @else <i class="fa fa-bolt"></i> @endif @if($discounts['parameters']['fuel_type']=='gas') @lang('home.Gas') @else @lang('home.Electricity') @endif</p>

@endif
</span>
                                                            </span>
                                                        </a>
                                                    </li><span class="plus">@if($checkPlus> $i) + @endif</span>

                                                    @endforeach

                                                   



@if($disc_total!=0)
                                                    <span class="plus">=</span>

                                                    <li class="nav-item">
                                                        <div class="nav-link lst" aria-controls="contact" aria-selected="false">
                                                            <span class="main-sec">
                                                                <span class="main-sec-1">
                                                                    <h5 class="dis-bold"><b>&#8364;</i>{{number_format($disc_total,2,',', '.')}}</b></h5>
                                                                    <p class="amt dis-amt">@lang('home.Total') @lang('home.Discounts')</p>
                                                                    <p class="mode amt"><i class="fa fa-bolt"></i> + <i class="fa fa-fire"></i></p>
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </li>
                                                    
                                                  @endif

                                                </ul>

                                                <div class="tab-content" id="myTabContent">
                                                    @php $disc="0";  @endphp
                                                    @foreach($filteredE as $discountss)
                                                    @php $disc=$disc+1;  @endphp

                                                    <div class="tab-pane fade show @if($disc=='1') active @endif" id="home{{$discountss['_id']}}{{$product['id']}}" role="tabpanel" aria-labelledby="home-tab">
                                                         <p><b>@php echo $discountss['name']; @endphp</b><br>@php echo $discountss['description']; @endphp</p>
                                                    </div>

                                                    @endforeach 
                                                    
                                                    @foreach($filteredG as $discountss)
                                                    @php $disc=$disc+1;  @endphp

                                                    <div class="tab-pane fade show @if($disc=='1') active @endif" id="home{{$discountss['_id']}}{{$product['id']}}" role="tabpanel" aria-labelledby="home-tab">
                                                         <p><b>@php echo $discountss['name']; @endphp</b><br>@php echo $discountss['description']; @endphp</p>
                                                    </div>

                                                    @endforeach
                                                    
                                                     @foreach($filteredAll as $discountss)
                                                    @php $disc=$disc+1;  @endphp

                                                    <div class="tab-pane fade show @if($disc=='1') active @endif" id="home{{$discountss['_id']}}{{$product['id']}}" role="tabpanel" aria-labelledby="home-tab">
                                                         <p><b>@php echo $discountss['name']; @endphp</b><br>@php echo $discountss['description']; @endphp</p>
                                                    </div>

                                                    @endforeach
                                                    
                                                    @foreach($filteredS as $discountss)
                                                    @php $disc=$disc+1;  @endphp

                                                    <div class="tab-pane fade show @if($disc=='1') active @endif" id="home{{$discountss['_id']}}{{$product['id']}}" role="tabpanel" aria-labelledby="home-tab">
                                                         <p><b>@php echo $discountss['name']; @endphp</b><br>@php echo $discountss['description']; @endphp</p>
                                                    </div>

                                                    @endforeach 
                                                    
                                                    @foreach($filteredL as $discountss)
                                                    @php $disc=$disc+1;  @endphp

                                                    <div class="tab-pane fade show @if($disc=='1') active @endif" id="home{{$discountss['_id']}}{{$product['id']}}" role="tabpanel" aria-labelledby="home-tab">
                                                         <p><b>@php echo $discountss['name']; @endphp</b><br>@php echo $discountss['description']; @endphp</p>
                                                    </div>

                                                    @endforeach 
                                                   


                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row dis-btn mt-3">
                                            <div class="col-md-12 text-right">
                                           
                                     <form action="{{url('confirmer')}}" method="get">
                                        {{csrf_field()}}
                                        <input type="hidden" name="pri_save" class="pri_save{{$si}}">
                                        <input type="hidden" name="pro_id"  value="{{$product['id']}}">
                                        <input type="hidden" name="supplier"  value="{{$supplier['name']}}">
                                        <input type="hidden" name="product"  value="{{$product['name']}}">
                                         <input type="hidden" name="pro_type"  value="{{$parameters['values']['comparison_type']}}">
                                        <input type="hidden" name="type"  value="{{$customer_type}}">
                                        <input type="hidden" name="postalcode"  value="{{Session::get('postal_code')}}">
                                        <input type="hidden" name="elect_day" id="" @if (isset($usage_elec_day)) value="{{$usage_elec_day}}" @endif>
                                        <input type="hidden" name="elect_night" @if (isset($usage_elec_night)) value="{{$usage_elec_night}}" @endif >
                                        <input type="hidden" name="gas_cons" @if (isset($usage_gas)) value="{{$usage_gas}}" @endif>
                                        @if($packType=='elecrticity')
                                        <input type="hidden" name="sub_url"  value="$product['underlying_products']['electricity']['subscribe_url']">
                                        @elseif($packType=='gas')
                                        <input type="hidden" name="sub_url"  value="$product['underlying_products']['gas']['subscribe_url']">
                                        @else
                                        <input type="hidden" name="sub_url"  value="{{$product['subscribe_url']}}">
                                        @endif
                                        <input type="hidden" name="from" value="pack" >
                                          <input type="hidden" name="pr_type" id="pr_type" value="">
                                        <button type="submit" class="choose1">@lang('home.To_Request')</button>
                                                          </form>
                                               
                                            </div>
                                        </div>
                                    </div>

                                    <div id="product-discription{{$product['id']}}" class="tabcontent">
                                        <div class="row product-tab mt-4 product-desc-sec">
                                            <div class="col-md-12">
                                                
                                                <h5>{{$supplier['name']}} - {{$product['name']}}:</h5>
                                                
                                                @php 
                                                
                                               
                                                $desc=explode("\n-",$product['description']);
                                                
                                                @endphp
                                    <ul class="mt-2">
                                        @foreach($desc as $descs)
                                   @if($descs)<li class="product-desc-i">@php echo $descs; @endphp</li>@endif
                                       @endforeach
                                           </ul>
                                            </div>
                                            
                                        </div>
                                        <div class="row product-tab-btn">
                                            <div class="col-md-12 text-right">
                                        <form action="{{url('confirmer')}}" method="post">
                                        {{csrf_field()}}
                                        <input type="hidden" name="pri_save" class="pri_save{{$si}}">
                                        <input type="hidden" name="pro_id"  value="{{$product['id']}}">
                                        <input type="hidden" name="supplier"  value="{{$supplier['name']}}">
                                        <input type="hidden" name="product" value="{{$product['name']}}">
                                         <input type="hidden" name="pro_type"  value="{{$parameters['values']['comparison_type']}}">
                                        <input type="hidden" name="type"  value="{{$parameters['values']['customer_group']}}">
                                        <input type="hidden" name="postalcode"  value="{{$parameters['values']['postal_code']}}">
                                        <input type="hidden" name="elect_day" id="" @if (isset($usage_elec_day)) value="{{$usage_elec_day}}" @endif>
                                        <input type="hidden" name="elect_night" @if (isset($usage_elec_night)) value="{{$usage_elec_night}}" @endif >
                                        <input type="hidden" name="gas_cons" @if (isset($usage_gas)) value="{{$usage_gas}}" @endif>
                                        @if($packType=='elecrticity')
                                        <input type="hidden" name="sub_url"  value="$product['underlying_products']['electricity']['subscribe_url']">
                                        @elseif($packType=='gas')
                                        <input type="hidden" name="sub_url"  value="$product['underlying_products']['gas']['subscribe_url']">
                                        @else
                                        <input type="hidden" name="sub_url"  value="{{$product['subscribe_url']}}">
                                        @endif
                                        <input type="hidden" name="from" value="pack" >
                                        <input type="hidden" name="pr_type" id="pr_type" value="dual">
                                        <button type="submit" class="choose1">@lang('home.To_Request')</button>
                                      </form>
                                            </div>
                                        </div>
                                    </div>




                                    <div id="contract-details{{$product['id']}}" class="tabcontent">
                                        <div class="row">
                                            <div class="col-md-12 col-lg-12 col-sm-12 hidden-sec">
                                                <h4>@lang('home.Contract_Details')</h4>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-lg-6 col-sm-6">
                                                <div class="duration-sec">
                                                    <h5>@lang('home.Duration')</h5>
                                                    <p class="year">{{$product['contract_duration']}} @lang('home.Year')</p>
                                                    <p class="dur-p">
                                                        @lang('home.After_the_first')
                                                    </p>
<!--                                                    <a class="more-info" href="#">@lang('home.More_info')</a>-->
                                                </div>
                                                <div class="price-type">
                                                    <div class="row ">
                                                        <div class="col-md-12">
                                                            <h5>@lang('home.Price_type')</h5>
                                                        </div>
                                                    </div>

                                                    <div class="pri-type-sec">
                                                    <div class="pri-type-1 pri-type">
                                                      <div class="pri-type-left-1 pri-type-left">
                                                          @if($product['type']=='pack')
                                                          <div><i class="fa fa-bolt"></i>  @lang('home.Electricity')</div>
                                                          @endif
                                                      </div>
                                                      <div class="pri-type-right-1 pri-type-right">
                                                          @if($product['type']=='pack')
                                                            <div>@if($product['underlying_products']['electricity']['pricing_type']=='fixed') @lang('home.fixed') @else @lang('home.variable') @endif</div>
                                                          @endif
                                                      </div>
                                                  </div>
                                                   @if($product['type']=='electricity' || $product['type']=='pack')
                                                  <div class="pri-type-2 pri-type">
                                                      <div class="pri-type-left-2 pri-type-left">
                                                          <div><i class="fa fa-plug"></i> @lang('home.Source_Power')</div>
                                                      </div>
                                                      <div class="pri-type-right-2 pri-type-right">
                                                          <div class=image-sec-pri>@if($product['origin']=='BE' && $product['green_percentage'] > 0 )<img src="{{url('images/bel-flag.png')}}">@endif {{$product['green_percentage']}}% @if($product['origin'] !='BE') @lang('home.green') @endif @if($product['green_percentage']>0 && $product['origin']=='BE') @lang('home.green_from_Belgium') @endif</div>
                                                      </div>
                                                  </div>
                                                  @endif
                                                  <div class="pri-type-3 pri-type">
                                                      <div class="pri-type-left-3 pri-type-left">
                                                          @if($product['type']=='pack')
                                                          <!--<li><i class="fa fa-fire"></i> @lang('home.Gas')</li>-->
                                                          <div><i class="fa fa-fire"></i> Aardgas</div>
                                                          @endif
                                                      </div>
                                                      <div class="pri-type-right-3 pri-type-right">
                                                          @if($product['type']=='pack')
                                                          <div>@if($product['underlying_products']['gas']['pricing_type']=='fixed') @lang('home.fixed') @else @lang('home.variable') @endif</div>
                                                          @endif
                                                      </div>
                                                  </div>
                                                  <div class="pri-type-4 pri-type">
                                                      <div class="pri-type-left-4 pri-type-left">
                                                          @if($product['type']=='electricity')
                                                              <div><i class="fa fa-bolt"></i> @lang('home.Electricity') </div>
                                                          @endif
                                                      </div>
                                                      <div class="pri-type-right-4 pri-type-right">
                                                          @if($product['type']=='electricity')
                                                              <div>@if($product['pricing_type']=='fixed') @lang('home.fixed') @else @lang('home.variable') @endif</div>
                                                          @endif
                                                      </div>
                                                  </div>
                                                  <div class="pri-type-5 pri-type">
                                                      <div class="pri-type-left-5 pri-type-left">
                                                          @if($product['type']=='gas')
                                                              <div><i class="fa fa-fire"></i> @lang('home.pricetab_gas')</div>
                                                          @endif
                                                      </div>
                                                      <div class="pri-type-right-5 pri-type-right">
                                                          @if($product['type']=='gas')
                                                              <div>@if($product['pricing_type']=='fixed') @lang('home.fixed') @else @lang('home.variable') @endif</div>
                                                          @endif
                                                      </div>
                                                  </div>
                                                </div>
                                                </div>
                                                <div class="contract-for">
                                                    <h5>@lang('home.Who_is_this')</h5>
                                                    @if($parameters['values']['customer_group'] == 'residential') 
                                                    
                                                                                                    @php                                               
if(Session::get('locale')=='fr'){

$string=$feature[2]['FR_description'];

}else{

$string=$feature[2]['NL_description'];


}

$replace = ['{duration}'];

$duration=$price['validity_period']['end'];

$info = [
    'duration' => $duration,
   
];

@endphp
                                                    
                                                    
                                                        <!--<p>{{str_replace($replace, $info, $string)}}</p>-->
                                                        <p>@lang('home.This_contract_residential_users_only') @lang('home.residential') </p>
                                                        <p>{{$product['tariff_description']}}</p>
                                                    @else
                                                        <p>@if(Session::get('locale')=='fr'){{$feature[3]['FR_description']}} @else (Session::get('locale')=='nl'){{$feature[3]['NL_description']}} @endif</p>
                                                    @endif
                                                    @if($product['customer_condition']=='EV' ) 
                                                        <p>@if(Session::get('locale')=='fr'){{$feature[5]['FR_description']}} @else (Session::get('locale')=='nl'){{$feature[5]['NL_description']}} @endif</p>
                                                    @elseif($product['customer_condition']=='PV' )
                                                        <p>@if(Session::get('locale')=='fr'){{$feature[6]['FR_description']}} @else (Session::get('locale')=='nl'){{$feature[6]['NL_description']}} @endif</p>
                                                    @elseif($product['customer_condition']=='CH' )
                                                        <p>@if(Session::get('locale')=='fr'){{$feature[7]['FR_description']}} @else (Session::get('locale')=='nl'){{$feature[7]['NL_description']}} @endif</p>
                                                     @elseif($product['customer_condition']=='COMP' )
                                                        <p>@if(Session::get('locale')=='fr'){{$feature[8]['FR_description']}} @else (Session::get('locale')=='nl'){{$feature[8]['NL_description']}} @endif</p>
                                                     @else
                                                        <p></p>
                                                    @endif
                                                </div>
                                                <div class="documents">
                                                    <h5>@lang('home.Documents')</h5>
                                                    <ul>
                                                        @if($product['type']=='pack') 
                                                            <li><a href="{{$product['underlying_products']['electricity']['terms_url_dynamic']}}" target="_block"><img src="{{url('images/pdf-image.png')}}" alt="Tariefchecker">&nbsp @lang('home.Tariff_card_Electricity')</a></li>
                                                            <li><a href="{{$product['underlying_products']['gas']['terms_url_dynamic']}}" target="_block"><img src="{{url('images/pdf-image.png')}}" alt="Tariefchecker">&nbsp @lang('home.Tariff_card_Gas')</a></li>
                                                            <li><a href="{{$product['terms_url']}}" target="_block"><img src="{{url('images/pdf-image.png')}}" alt="Tariefchecker">&nbsp @lang('home.Tariff_card_General_conditions')</a></li>
                                                        @elseif ($product['type']=='electricity')
                                                            <li><a href="{{$product['terms_url_dynamic']}}" target="_block"><img src="{{url('images/pdf-image.png')}}" alt="Tariefchecker">&nbsp @lang('home.Tariff_card_Electricity')</a></li>
                                                            <li><a href="{{$product['terms_url']}}" target="_block"><img src="{{url('images/pdf-image.png')}} alt="Tariefchecker"">&nbsp @lang('home.Tariff_card_General_conditions')</a></li>
                                                        @elseif ($product['type']=='gas')
                                                            <li><a href="{{$product['terms_url_dynamic']}}" target="_block"><img src="{{url('images/pdf-image.png')}}" alt="Tariefchecker">&nbsp @lang('home.Tariff_card_Gas')</a></li>
                                                            <li><a href="{{$product['terms_url']}}" target="_block"><img src="{{url('images/pdf-image.png')}}" alt="Tariefchecker">&nbsp @lang('home.Tariff_card_General_conditions')</a></li>
                                                        @else
                                                            <li><a href="{{$product['terms_url']}}" target="_block"><img src="{{url('images/pdf-image.png')}}" alt="Tariefchecker">&nbsp @lang('home.Tariff_card_General_conditions')</a></li>
                                                        @endif
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-lg-6 col-sm-6">
                                                <div class="particular">
                                                    <h5>@lang('home.Particular_Conditions')</h5>
                                                  @if($product['ff_pro_rata'] == 'Y')
                                                    
                                                    <ul class="parti">
                                                        <li class="info"><i class="fas fa-info-circle"></i></li>
                                                        
                                                        @if(Session::get('locale')=='fr')
                                                        <li> {{$feature[0]['FR_description']}} </li>
                                                        @else 
                                                        <li> {{$feature[0]['NL_description']}} </li>
                                                        @endif
                                                        
                                                    </ul>
                                                    
                                                     @else
                                                     
                                                     <ul class="parti">
                                                        <li class="info"><i class="fas fa-info-circle"></i></li>
                                                       
                                                        @if(Session::get('locale')=='fr')
                                                        <li> {{$feature[1]['FR_description']}} </li>
                                                        @else 
                                                        <li> {{$feature[1]['NL_description']}} </li>
                                                        @endif
                                                        
                                                    </ul>
                                                    
                                                    @endif
                                                    
                                                    
                                                    
                                                    
                                                  
                                                    <p>
                                                        @if(Session::get('locale')=='fr')
                                                            En principe, une redevance fixe vous sera chargée pro rata la durée de votre fourniture. Par exemple: si vous restez que 6 mois, la redevance fixe sera chargée pour la moitié.</br>

Certain fournisseurs appliquent une autre règle pour la première année de fourniture.</br>
En général il est râre que cela vaut la peine de changer de fournisseur en moins d’un an, mais si vous le souhaitez, tenez bien compte de cette règle. Plus d’info sur notre

                                                            <a class="parti-a" href="https://www.veriftarif.be/energie/faq" target="_blank">FAQ</a>
                                                        @else 
                                                            In principe wordt een vaste vergoeding pro rata de duurtijd van je leveringscontract aangerekend. Bijvoorbeeld: als je na 6 maanden vertrekt, wordt de vaste vergoeding voor de helft aangerekend.</br>

Sommige leveranciers passen een andere regel toe voor het eerste leveringsjaar.</br> 
In de praktijk is het zelden zinvol om binnen het eerste jaar opnieuw te veranderen, maar als de vaste vergoeding volledig wordt aangerekend hou je daar best rekening mee. Meer info in onze

                                                            <a class="parti-a" href="https://www.tariefchecker.be/energie/faq" target="_blank">FAQ</a>
                                                        @endif
                                                    
                                                    </p>
                                                    
                                                </div>
                                                <div class="service-limitations">
                                                    <h5>@lang('home.Service_limitations')</h5>
                                                    @if($product['service_level_payment'] == 'free' && $product['service_level_invoicing'] == 'free' && $product['service_level_contact'] == 'free')
                                                    <p>@if(Session::get('locale')=='fr'){{$service[0]['FR_description']}} @else (Session::get('locale')=='nl'){{$service[0]['NL_description']}}@endif </p>
                                                    @elseif($product['service_level_payment'] == 'domi' && $product['service_level_invoicing'] == 'free' && $product['service_level_contact'] == 'free')
                                                    <p>@if(Session::get('locale')=='fr'){{$service[1]['FR_description']}} @else (Session::get('locale')=='nl'){{$service[1]['NL_description']}} @endif</p>
                                                    @elseif($product['service_level_payment'] == 'prepaid')
                                                    <p>@if(Session::get('locale')=='fr'){{$service[2]['FR_description']}} @else (Session::get('locale')=='nl'){{$service[2]['NL_description']}} @endif</p>
                                                    @elseif($product['service_level_payment'] == 'free' && $product['service_level_invoicing'] == 'email' && $product['service_level_contact'] == 'free')
                                                    <p>@if(Session::get('locale')=='fr'){{$service[3]['FR_description']}} @else (Session::get('locale')=='nl'){{$service[3]['NL_description']}} @endif</p>
                                                    @elseif($product['service_level_payment'] == 'domi' && $product['service_level_invoicing'] == 'email' && $product['service_level_contact'] == 'free')
                                                    <p>@if(Session::get('locale')=='fr'){{$service[4]['FR_description']}} @else (Session::get('locale')=='nl'){{$service[4]['NL_description']}}@endif</p>
                                                    @elseif($product['service_level_payment'] == 'free' && $product['service_level_invoicing'] == 'free' && $product['service_level_contact'] == 'online')
                                                    <p>@if(Session::get('locale')=='fr'){{$service[5]['FR_description']}} @else (Session::get('locale')=='nl'){{$service[5]['NL_description']}}@endif</p>
                                                    @elseif($product['service_level_payment'] == 'domi' && $product['service_level_invoicing'] == 'free' && $product['service_level_contact'] == 'online')
                                                    <p>@if(Session::get('locale')=='fr'){{$service[6]['FR_description']}} @else (Session::get('locale')=='nl'){{$service[6]['NL_description']}}@endif</p>
                                                    @elseif($product['service_level_payment'] == 'free' && $product['service_level_invoicing'] == 'email' && $product['service_level_contact'] == 'online')
                                                    <p>@if(Session::get('locale')=='fr'){{$service[7]['FR_description']}} @else (Session::get('locale')=='nl'){{$service[7]['NL_description']}}@endif</p>
                                                    @else($product['service_level_payment'] == 'domi' && $product['service_level_invoicing'] == 'email' && $product['service_level_contact'] == 'online')
                                                    <p>@if(Session::get('locale')=='fr'){{$service[8]['FR_description']}} @else (Session::get('locale')=='nl'){{$service[8]['NL_description']}}@endif</p>
                                                    

                                                    @endif
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="request float-right">
                                                    
                                                  <form action="{{url('confirmer')}}" method="post">
                                        {{csrf_field()}}
                                        <input type="hidden" name="pri_save" class="pri_save{{$si}}">
                                        <input type="hidden" name="pro_id"  value="{{$product['id']}}">
                                        <input type="hidden" name="supplier"  value="{{$supplier['name']}}">
                                        <input type="hidden" name="product"  value="{{$product['name']}}">
                                         <input type="hidden" name="pro_type"  value="{{$parameters['values']['comparison_type']}}">
                                        <input type="hidden" name="type"  value="{{$parameters['values']['customer_group']}}">
                                        <input type="hidden" name="postalcode"  value="{{$parameters['values']['postal_code']}}">
                                        <input type="hidden" name="elect_day" id="" @if (isset($usage_elec_day)) value="{{$usage_elec_day}}" @endif>
                                        <input type="hidden" name="elect_night" @if (isset($usage_elec_night)) value="{{$usage_elec_night}}" @endif >
                                        <input type="hidden" name="gas_cons" @if (isset($usage_gas)) value="{{$usage_gas}}" @endif>
                                        @if($packType=='elecrticity')
                                        <input type="hidden" name="sub_url"  value="$product['underlying_products']['electricity']['subscribe_url']">
                                        @elseif($packType=='gas')
                                        <input type="hidden" name="sub_url"  value="$product['underlying_products']['gas']['subscribe_url']">
                                        @else
                                        <input type="hidden" name="sub_url"  value="{{$product['subscribe_url']}}">
                                        @endif
                                        <input type="hidden" name="from" value="pack" >
                                        <input type="hidden" name="pr_type" id="pr_type" value="dual">
                                        <button type="submit" class="choose1">@lang('home.To_Request')</button>
                                                          </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                    
                                    
                                </div>
                            </div>
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true"></div>

                            <div class="row part-last">
                                <div class="col-md-6 compare">
                                    <input type="checkbox"  class="compare myCheck{{$product['id']}}" name="compare" value="{{$product['id']}}"> @lang('home.Compare')<br>
                                </div>
                                <div class="col-md-6 sec-3-btn more-det " data-id="{{$product['id']}}">
                                     <button id="myButton1" data-supplier="{{$supplier['name']}}" data-uuid="{{$parameters['uuid']}}" data-product="{{$product['name']}}"  class="more-details more1 "><i class="fas fa-sort-down"></i> @lang('home.More_details')</button>
                                </div>
                            </div>

                        </div>
                        <!-- End of listing-1 -->
                        
                        </div>


  <script>
$(document).ready(function(){
    
     var a=$('#month').hasClass('active');
    var b=$('#year').hasClass('active');
    
      if(a==true) {
        $('.month').addClass("active");
        $('.years').removeClass("active");
        $('.month').css('display', 'block');
        $('.years').css('display', 'none');
    };

    if(b==true){
        $('.years').addClass("active");
        $('.month').removeClass("active");
        $('.years').css('display', 'block');
        $('.month').css('display', 'none');
    };
    
    
  $(".tool-tip-sec").click(function(){
      var id=$(this).data('id');
    $(".bulb"+id).toggleClass("see");
  });
  
    $(".disctab-active").click(function(event) {	
      event.preventDefault()
        $(".discountact").addClass('active')            
     });
});

});
</script>                    