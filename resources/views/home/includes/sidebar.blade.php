<div class="col-md-3 col-lg-3 col-sm-3 data-side">
    <div class="data-sec" data-target="el-1">   
    <a data-toggle="modal" data-target="#exampleModal1" class="data_sec_link" style="cursor: pointer;"></a>      
        <h2>@lang('home.Your_Data')</h2>
             <div class="type">
                <span class="icon"><i class="fa fa-home"></i></span>
                <span class="icon_content">
                    <p>@lang('home.Type')</p>
                    
                   
                    
                     @php $getParameters=Session::get('getParameters');   @endphp
                 
                    <h6 style="text-transform: capitalize">@if($getParameters['parameters']['values']['customer_group']=='residential') @lang('home.residential') @else @lang('home.Professional') @endif</h6>
                </span>
            </div>
            <div class="type">
                <span class="icon"><i class="fa fa-map-marker-alt"></i></span>
                <span class="icon_content">
                    <p>@lang('home.Postal_Code')</p>
                   
                    <h6>{{$getParameters['parameters']['values']['postal_code']}}</h6>
                </span>
            </div>
            
            @if($getParameters['parameters']['values']['includeE']==1)
            @if($getParameters['parameters']['values']['meter_type']=='single' || $getParameters['parameters']['values']['meter_type']=='single_excl_night')
            <div class="type">
                <span class="icon"><i class="fa fa-bolt"></i></span>
                <span class="icon_content">
                    <p>@lang('home.Electricity')</p>
                    <h6><strong>{{round($getParameters['parameters']['values']['usage_single'])}}</strong> <span class="light-font"> kWh/@lang('home.Year') </span></h6>
                </span>
                
            </div>
            @endif
            @if($getParameters['parameters']['values']['meter_type']=='double' || $getParameters['parameters']['values']['meter_type']=='double_excl_night')
            <div class="type">
                <span class="icon"><i class="fa fa-sun"></i></span>
                <span class="icon_content">
                    <p>@lang('home.Electricity') @lang('home.day')</p>
                    <h6><strong>{{round($getParameters['parameters']['values']['usage_day'])}}</strong> <span class="light-font"> kWh/@lang('home.Year') </span></h6>
                </span>
            </div>
            @endif
             @if($getParameters['parameters']['values']['meter_type']=='double' || $getParameters['parameters']['values']['meter_type']=='double_excl_night')
            <div class="type">
                <span class="icon"><i class="fa fa-moon"></i></i></span>
                <span class="icon_content">
                    <p>@lang('home.Electricity') @lang('home.night')</p>
                    <h6><strong>{{round($getParameters['parameters']['values']['usage_night'])}}</strong> <span class="light-font"> kWh/@lang('home.Year') </span></h6>
                </span>
            </div>
            @endif
            @if($getParameters['parameters']['values']['meter_type']=='single_excl_night' || $getParameters['parameters']['values']['meter_type']=='double_excl_night')
            <div class="type">
                <span class="icon"><i class="fa fa-bolt"></i></span>
                <span class="icon_content">
                    <p>@lang('home.Electricity') @lang('home.excl_night')</p>
                    <h6><strong>{{round($getParameters['parameters']['values']['usage_excl_night'])}}</strong> <span class="light-font"> kWh/@lang('home.Year') </span></h6>
                </span>
            </div>
            @endif
            
            @endif
            @if($getParameters['parameters']['values']['includeG']==1)
            <div class="type">
                <span class="icon"><i class="fas fa-fire"></i></span>
                <span class="icon_content">
                    <p>@lang('home.Gas')</p>
                    <h6><strong>{{round($getParameters['parameters']['values']['usage_gas'])}}</strong> <span class="light-font">kWh/@lang('home.Year')</span> </h6>
                </span>
            </div>
            @endif
           

        <div class="button-change">
            <button type="button" class="btn btn-primary change-sec-btn" data-toggle="modal" data-target="#exampleModal1" rel="tooltip" title="@lang('home.change_data_change')">
               @lang('home.change')
           </button>
            <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-center" id="exampleModalLabel">@lang('home.Change_your_data')</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <section id="tabs" class="twotabs">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 ">
                                        <div class="Maintabs">
                                            <ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
                                                <li class="nav-item  nav-link-1">
                                                    <a class="nav-link @if($getParameters['parameters']['values']['customer_group']=='residential') active @endif" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">@lang('home.Private')</a>
                                                </li>
                                                <li class="nav-item nav-link-2">
                                                    <a class="nav-link @if($getParameters['parameters']['values']['customer_group']=='professional') active @endif" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">@lang('home.Professional')</a>
                                                </li>
                                            </ul>

                                            <div class="tab-content" id="pills-tabContent">

                                                <!--Private tab start-->             

    <div class="tab-pane fade show @if($getParameters['parameters']['values']['customer_group']=='residential') active @endif" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
        <div class="Tabsection1">
            <div class="row">   
                <div class="col-md-12">
                    <form action="{{route('find-packages')}}" method="post" class="tabform1" id="tabform1" onsubmit="return myFunctionCalculate()">
                        {{csrf_field()}}
                        <input type="hidden" name="customer_type" value="RES">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 top-checkboxs">
                                <div class="checkbox-sec">
                                    
                                    <label class="container-1">
                                        <input aria-label="first_res" type="checkbox" @if($getParameters['parameters']['values']['first_residence']) ==1) checked  @endif id="first_res" name="first_res" value="1">
                                        <span class="checkmark"></span>
                                    </label>
                                    <!--<input type="checkbox" @if($getParameters['parameters']['values']['first_residence']) ==1) checked  @endif id="first_res" name="first_res" value="1">-->
                                    <p> @lang('home.Primary_home')</p>
                                </div>
                            </div> 
                                    <div class="col-md-6">
                                        <div class="form-group por">  
                                            <label> @lang('home.Postal_Code') <span style="color:red;">*</span></label>
                                            <input type="text" class="po required" name="postal" required="required" value="{{$getParameters['parameters']['values']['postal_code']}}" autocomplete="off" id="postId" ><br>
                                            <img class="po-loader" src="{{url('images/progress.gif')}}"  style="display:none;width: 194px;height: 5px;">
                                        </div>
                                            <!--<div style="color:red;" id="calculationMessage"></div>-->
                                         <p class="po-error-msg" style="color:red;display:none;" >@lang('home.invalid_post')</p>
                                    </div>
                                    <div class="col-md-6" style="display:none;">
                                        <div class="form-group">
                                            <label> @lang('home.Family_Size') </label>
                                            <select id = "dropList" name="family_size">
                                                @if($getParameters['parameters']['values']['residents'])
                                                 <option value ="{{$getParameters['parameters']['values']['residents']}}">{{$getParameters['parameters']['values']['residents']}}</option>
                                                @endif
                                                <option value = "1">1</option>
                                                <option value = "2">2</option>
                                                <option value = "3">3</option>
                                                <option value = "4">4</option>
                                                <option value = "5">5+</option>
                                            </select><br>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                   <div id="sub-po" class="col-md-12">
                                        <input type="hidden" value="{{$getParameters['parameters']['values']['municipality']}}" class="mun"> 
                                   
                                    </div>
                                </div>
                            </div>

                            

                             


                            <div class="col-lg-12 col-md-12 col-sm-12 top-checkboxs">
                                <div class="checkbox-sec">
                                    <label class="container-1">
                                        <input aria-label="Electricity" type="checkbox" @if($getParameters['parameters']['values']['includeE'])==1) checked @endif id="electricity" name="electricity" value="true">
                                        <span class="checkmark"></span>
                                    </label>
                                    <p style="text-transform: capitalize;">@lang('home.Electricity')</p>
                                </div>
                            </div> 
                            
             @php 
             if(Session::get('isolation_level') && Session::get('residence') && Session::get('building_type') && Session::get('heating_system')){
             
             $button=1;
             
             }else{
             
             $button=0;
             }
             
             @endphp
             
                                                                        
              <div id="elec-pri" class="col-lg-12 col-sm-12" @if($getParameters['parameters']['values']['includeE'])==1 )  @else style="display:none;" @endif>
                        <div class="radio1 col-lg-12 col-sm-12" id="radios">
                            <div class="row">
                                @if(session::get('group1')=="know_consuption" || session::get('group1')=="")
                                <div class="col-lg-6 col-sm-6">
                                    <label class="container-2">@lang('home.I_know_my')
                                        <input name="group1" id="know" class="radiobtn1" data-button="{{$button}}" value="know_consuption" type="radio"  checked  />
                                        <span class="checkmark-1"></span>
                                    </label>
                                </div>
                                @else
                                
                                <div class="col-lg-6 col-sm-6">
                                    <label class="container-2">@lang('home.I_know_my') 
                                        <input name="group1" id="know" class="radiobtn1" data-button="{{$button}}" value="know_consuption" type="radio"  />
                                        <span class="checkmark-1"></span>
                                    </label>
                                </div>
                                
                                @endif
                                 @if(session::get('group1')=="estimate_consuption")
                                <div class="col-lg-6 col-sm-6">
                                    <label class="container-2">@lang('home.Estimate_my')
                                        <input name="group1" id="estimate" class="radiobtn2" data-button="{{$button}}" type="radio" value="estimate_consuption" @if(session::get('group1')=='estimate_consuption') checked @endif />
                                        <span class="checkmark-1"></span>
                                    </label>
                                </div>
                                @else
                                <div class="col-lg-6 col-sm-6">
                                    <label class="container-2">@lang('home.Estimate_my')
                                        <input name="group1" id="estimate" class="radiobtn2" data-button="{{$button}}" type="radio" value="estimate_consuption"/>
                                        <span class="checkmark-1"></span>
                                    </label>
                                </div>
                                
                                @endif
                            </div>
                        </div>
                        
        <div class="col-lg-12 col-sm-12" >
            <div class="row">
        <div class="col-lg-12 col-sm-12 estim @if(session::get('group1')=='know_consuption') radiobtn2-show @else  @endif" style="display:none"  >
            <div class="row">
                
                 
                <div class="col-md-6">
                    <div class="form-group">
                    <label>Nombre d’habitants</label>    
                        <select id = "dropList" class="esti estiresidence" name="residence">
                            
                            
                            
                            
                           @if(Session::get('residence'))<option value = "{{Session::get('residence')}}">@if(Session::get('residence')=='2 or less') 2 ou moins @elseif(Session::get('residence')=='3-4 people')  3-4 habitants   @else 5 ou plus @endif</option>@else
                           <option value = "3-4 people">3-4 habitants</option>
                            @endif
                           
                            <option value = "2 or less">2 ou moins</option>
                            <option value = "3-4 people">3-4 habitants</option>
                            <option value = "5 or more">5 ou plus</option>
                            
                            
                            
                        </select><br>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">   
                    <label>Type de bâtiment</label> 
                        <select id = "dropList" class="esti building_type" name="building_type">
                          
                             @if(Session::get('building_type'))<option value = "{{Session::get('building_type')}}"> @if(Session::get('building_type')=="Appartement") Appartement @endif
                           @if(Session::get('building_type')=="lesser200") Maison < 200 m² @endif
                          
                           @if(Session::get('building_type')=="greater200") Maison > 200 m² @endif</option>@else
                            <option value = "lesser200">Maison < 200 m²</option>
                            @endif
                           
                            <option value = "Appartement">Appartement</option>
                             <option value = "lesser200">Maison < 200 m²</option>
                            
                            <option value = "greater200">Maison > 200 m²</option>
                          
                        </select><br>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">   
                    <label>Niveau d'isolation</label> 
                        <select id = "dropList" class="esti isolation_level" name="isolation_level">
                          
                            @if(Session::get('isolation_level'))<option value = "{{Session::get('isolation_level')}}"> @if(Session::get('isolation_level')=="more than 15 years old, not isolated") Ancienne construction/peu isolé @endif
                           @if(Session::get('isolation_level')=="less then 15 years old, or re-isolated") Construit ou réisolé moins de 15 an @endif
                           @if(Session::get('isolation_level')=="Passive house") Maison passive ou fort isolé @endif</option>@else
                            <option value = "more than 15 years old, not isolated">Ancienne construction/peu isolé</option>
                            @endif
                            <option value = "more than 15 years old, not isolated">Ancienne construction/peu isolé</option>
                             <option value = "less then 15 years old, or re-isolated">Construit ou réisolé moins de 15 an</option>
                            <option value = "Passive house">Maison passive ou fort isolé</option>
                           
                            
                           
                        </select><br>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">   
                    <label>Système de chauffage</label> 
                        <select id = "dropList" class="esti heating_system" name="heating_system">
                          
                             @if(Session::get('heating_system'))<option value = "{{Session::get('heating_system')}}"> @if(Session::get('heating_system')=="CH on gas") Chauffage centrale au gaz @endif
                           @if(Session::get('heating_system')=="CH on oil") Chauffage centrale au mazout @endif
                           @if(Session::get('heating_system')=="heatpump") Pompe à chaleur @endif
                           @if(Session::get('heating_system')=="communal heating") Chauffage commin (bloc d'appartements) @endif</option>@else
                            <!--<option value = "">Verwarming</option>-->
                            @endif
                            <option value = "CH on gas">Chauffage centrale au gaz</option>
                            <option value = "CH on oil">Chauffage centrale au mazout</option>
                            <option value = "heatpump">Pompe à chaleur</option>
                             <option value = "communal heating">Chauffage commin (bloc d'appartements)</option>
                        </select><br>
                    </div>
                </div>
                
                
                
            </div>
        </div>
            </div>
            <img class="ec-loader" src="{{url('images/progress.gif')}}"  style="display:none;width: 100%;height: 15px;">
            <div class="row" id="meter-details">
                <div class="col-md-12">
                    <div class="form-group meterr">
                       
                        <label> @lang('home.Meter_Type') <span style="color:red;">*</span> </label>

                        <select id = "dropList resident-meter" class="meter required" name="meter_type1" required="">
                     @if($getParameters['parameters']['values']['meter_type']) 
                     <option value = "{{$getParameters['parameters']['values']['meter_type']}}">
                         @if($getParameters['parameters']['values']['meter_type']=="double") @lang('home.double_meter') @endif
                          @if($getParameters['parameters']['values']['meter_type']=="single") @lang('home.single_meter') @endif
                           @if($getParameters['parameters']['values']['meter_type']=="single_excl_night") @lang('home.single_meter') + @lang('home.excl_night') @endif
                            @if($getParameters['parameters']['values']['meter_type']=="double_excl_night") @lang('home.double_meter') + @lang('home.excl_night') @endif
                         </option>
                     <option value = "single">@lang('home.single_meter')</option>
                     <option value = "double">@lang('home.double_meter')</option>
                     <option value = "single_excl_night">@lang('home.single_meter') + @lang('home.excl_night')</option> 
                     
                     <option value = "double_excl_night">@lang('home.double_meter') + @lang('home.excl_night')</option>
                     @else
                     <option value = "">@lang('home.Meter_Type')</option>
                     <option value = "single">@lang('home.single_meter')</option>
                     <option value = "double">@lang('home.double_meter')</option>
                     <option value = "single_excl_night">@lang('home.single_meter') + @lang('home.excl_night')</option> 
                     
                     <option value = "double_excl_night">@lang('home.double_meter') + @lang('home.excl_night')</option>
                     @endif
                  
                        </select><br>
                    </div>
                </div>

                <div class="col-lg-12 col-sm-12 ">
            <div class="row double" @if($getParameters['parameters']['values']['meter_type']=='double')   @else  style="display:none;"  @endif>
               <div class="col-md-6">
                    <div class="form-group consuption_day_elec1r">    
                        <label> @lang('home.Consumption_Day') <span style="color:red;">*</span></label>
                        <input type="number" min="0" id="consuption_day_elec1" @if($getParameters['parameters']['values']['usage_day']==-1) value="0" @else value="{{$getParameters['parameters']['values']['usage_day']}}" @endif class="consuption_day_elec1" autocomplete="off" min="0" name="consuption_day_elec1" ><br>
                    </div>
                </div> 
                <div class="col-md-6">
                    <div class="form-group consuption_night_elec1r">    
                        <label> @lang('home.Consumption_Night') <span style="color:red;">*</span></label>
                        <input type="number" min="0" id="consuption_night_elec1" @if($getParameters['parameters']['values']['usage_night']==-1) value="0" @else value="{{$getParameters['parameters']['values']['usage_night']}}" @endif class="consuption_night_elec1" autocomplete="off" min="0" name="consuption_night_elec1" ><br>
                    </div>
                </div>    
            </div>
            
             <div class="row single" @if($getParameters['parameters']['values']['meter_type']=='single')   @else  style="display:none;"  @endif>
               <div class="col-md-12">
                    <div class="form-group consuption1r">    
                        <label> @lang('home.Consumption_single') <span style="color:red;">*</span></label>
                        <input type="number" min="0" id="consuption1" @if($getParameters['parameters']['values']['usage_single']==-1) value="0" @else value="{{$getParameters['parameters']['values']['usage_single']}}" @endif class="consuption1 " autocomplete="off" min="0" name="consuption1" ><br>
                    </div>
                </div> 
                   
            </div>
             
              <div class="row single_excl_night" @if($getParameters['parameters']['values']['meter_type']=='single_excl_night')   @else  style="display:none;"  @endif>
                  
                <div class="col-md-6">
                    <div class="form-group consuption1ser">    
                        <label> @lang('home.Consumption_single') <span style="color:red;">*</span></label>
                        <input type="number" min="0" id="consuption1" @if($getParameters['parameters']['values']['usage_single']==-1) value="0" @else value="{{$getParameters['parameters']['values']['usage_single']}}" @endif class="consuption1se required" autocomplete="off" min="0" name="consuption1se" ><br>
                    </div>
                </div>
              
                <div class="col-md-6">
                    <div class="form-group consuption_excl_nightser">    
                        <label> @lang('home.Consumption_excl_Night') <span style="color:red;">*</span></label>
                        <input type="number" min="0" id="consuption_excl_night" @if($getParameters['parameters']['values']['usage_excl_night']==-1) value="0" @else value="{{$getParameters['parameters']['values']['usage_excl_night']}}" @endif class="consuption_excl_nightse required" autocomplete="off" min="0" name="consuption_excl_nightse" ><br>
                    </div>
                </div>    
            </div>
            
            <div class="row double_excl_night" @if($getParameters['parameters']['values']['meter_type']=='double_excl_night')   @else  style="display:none;"  @endif>
                  
                 <div class="col-md-6">
                    <div class="form-group consuption_day_elec1der">    
                        <label> @lang('home.Consumption_Day') <span style="color:red;">*</span></label>
                        <input type="number" min="0" id="consuption_day_elec1" @if($getParameters['parameters']['values']['usage_day']==-1) value="0" @else value="{{$getParameters['parameters']['values']['usage_day']}}" @endif class="consuption_day_elec1de required" autocomplete="off" min="0" name="consuption_day_elec1de" ><br>
                    </div>
                </div> 
                <div class="col-md-6">
                    <div class="form-group consuption_night_elec1der">    
                        <label> @lang('home.Consumption_Night') <span style="color:red;">*</span></label>
                        <input type="number" min="0" id="consuption_night_elec1" @if($getParameters['parameters']['values']['usage_night']==-1) value="0" @else value="{{$getParameters['parameters']['values']['usage_night']}}" @endif class="consuption_night_elec1de required" autocomplete="off" min="0" name="consuption_night_elec1de" ><br>
                    </div>
                </div> 
              
                <div class="col-md-12">
                    <div class="form-group consuption_excl_nightder">    
                        <label> @lang('home.Consumption_excl_Night') <span style="color:red;">*</span></label>
                        <input type="number" min="0" id="consuption_excl_night" @if($getParameters['parameters']['values']['usage_excl_night']==-1) value="0" @else value="{{$getParameters['parameters']['values']['usage_excl_night']}}" @endif class="consuption_excl_nightde required" autocomplete="off" min="0" name="consuption_excl_nightde" ><br>
                    </div>
                </div>    
            </div> 
        </div>
                   
            </div>
        </div>
         
        
       
                                                           
    
                <div class="col-md-12">
                    <div class="form-group">
                      <label>@lang('home.Current_Tariff')</label>
                      <select name="current_tariff_elec_1" @if($getParameters['parameters']['values']['current_supplier_name_electricity'] == null) id="supplier_res_e" @endif class="elec-supply"> 
                           
                            <option value ="">@lang('home.Current_Tariff')</option>
                           
                            @php 
                            $suppliers = [];
                            foreach($all_suppliers as $all_supplier){
                            $suppliers[] = $all_supplier['supplier']['name'];
                            }
                            sort($suppliers);
                            
                            @endphp
                            
                            @foreach($suppliers as $supplier)
                            <option @if($getParameters['parameters']['values']['current_supplier_name_electricity'] == $supplier) selected @endif value ="{{$supplier}}">{{$supplier}}</option>
                            @endforeach 
                      </select>
                    </div>
                </div>
    


         <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="checkbox-sec">
                <label class="container-1">
                <input aria-label="dec_pro"  type="checkbox"  @if($getParameters['parameters']['values']['decentralise_production']==true && $getParameters['parameters']['values']['capacity_decentalise']!="") checked else  @endif  id="dec_pro" name="dec_pro" value="true">
                <span class="checkmark"></span>
                </label>
                <p>@lang('home.Decentralised_production')</p>
            </div>       
        </div>



            <div id="dec_pro_data" class="col-md-12" @if($getParameters['parameters']['values']['decentralise_production']==true)  @else  style="display:none;" @endif>
                <div class="form-group second-field-sec">
                  <label>@lang('home.Capacity')</label>
                  <select name="capacity_decen_pro" class="capacity_decen_pro" > 
                         
                        @if($getParameters['parameters']['values']['decentralise_production']==true)
                        <option value ="{{$getParameters['parameters']['values']['capacity_decentalise']}}">{{$getParameters['parameters']['values']['capacity_decentalise']}}</option>
                        @else
                        <option value="" selected="selected">@lang('home.Capacity')</option>
                        @endif
                        <option value = "1">1</option>
                        <option value = "2">2</option>
                        <option value = "3">3</option>
                        <option value = "4">4</option>
                        <option value = "5">5</option>
                        <option value = "6">6</option>
                        <option value = "7">7</option>
                        <option value = "8">8</option>
                        <option value = "9">9</option>
                        <option value = "10">10</option>
                  </select>
                </div>
            </div>
        
        </div>
        
       

        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="checkbox-sec checkbox_gas">
                <label class="container-1">
                <input aria-label="gas"  type="checkbox" @if($getParameters['parameters']['values']['includeG']==1) checked else  @endif id="gas" name="gas" value="true">
                <span class="checkmark"></span>
                </label>
                <p>@lang('home.Gas')</p>
            </div>       
        </div>
        
        <div class="row" style="display: contents;">
            <div class="col-md-12">  
                <div class="row">                                                          
                    <div class="col-md-6 gas-sel" @if($getParameters['parameters']['values']['includeG']==1)   @else  style="display:none;"  @endif>
                        <div class="form-group consumtion_gas1r">  
                            <label> @lang('home.Consumption_single') <span style="color:red;">*</span></label>
                            <input type="number" min="0" class="@if($getParameters['parameters']['values']['usage_gas']!=-1) required @endif" value="@if($getParameters['parameters']['values']['usage_gas']!=-1){{$getParameters['parameters']['values']['usage_gas']}}@endif" autocomplete="off" id="consumtion_gas1" name="consumtion_gas1" value=""><br>
                        </div>
                    </div>


                       
                    <div class="col-md-6 gas-sel"  @if($getParameters['parameters']['values']['includeG']==1)  @else  style="display:none;"  @endif >
                        <div class="form-group third-field-sec">
                          <label>@lang('home.Current_Tariff')</label>
                          <select name="current_tariff_gas" id="supplier_res_g" class="gas-supply"> 
                                
                                <option value ="">@lang('home.Current_Tariff')</option>
        
                                @php 
                                $suppliers = [];
                                foreach($all_suppliers as $all_supplier){
                                $suppliers[] = $all_supplier['supplier']['name'];
                                }
                                sort($suppliers);
                                
                                @endphp
                            
                                @foreach($suppliers as $supplier)
                                <option @if($getParameters['parameters']['values']['current_supplier_name_gas'] == $supplier) selected @endif value ="{{$supplier}}">{{$supplier}}</option>
                                @endforeach
                          </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                   
           
       

        <div class="col-md-12">
            <div class="form-group">  
                <label> @lang('home.Email') </label>
                <input type="email" autocomplete="on" class="email" name="email" value="{{$getParameters['parameters']['values']['email']}}"><br>
            </div>
           
            <p id="error_email" style="color: red;"></p>
        </div>
                                                                        
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="form-group calculate">
            <div id="submit1_msg" style="display:none;color:red;" class="alert alert-danger">
            @lang('home.request_page_submit_error')
            </div>
                <input type="submit" id="submit1"   disabled="disabled" value="@lang('home.Calculate')">
            </div>
            <div>
            </div>
        </div>

                                                                        
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

                                                <!--Private tab end-->               


<div class="tab-pane fade @if($getParameters['parameters']['values']['customer_group']=='professional')show active @endif" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                               
    <div class="Tabsection2">
        <div class="row">   
            <div class="col-md-12">
                             
                <form action="{{route('change-data-prefosional')}}" id="tabform2" method="post" onsubmit="return myFunctionCalculate1()">
                    {{csrf_field()}}
                     <input type="hidden" name="customer_type" value="PRO">
                    <div class="row">
                        <div class="col-md-12 por">
                            <div class="form-group public_sec">  
                                <label> @lang('home.Postal_Code') <span style="color:red;">*</span></label>
                                <input type="text" autocomplete="off" class="po" id="post_pr" required="required"  value="{{$getParameters['parameters']['values']['postal_code']}}"  name="postal"><br>
                            </div>
                            <div style="color:red;" id="calculationResult"></div>
                            <p class="po-error-msg" style="color:red;display:none;" >@lang('home.invalid_post')</p>
                        </div>
                        <div id="" class="col-md-12 sub-po">
                            <input type="hidden" value="{{$getParameters['parameters']['values']['municipality']}}" class="mun"> 
                        </div>




                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="checkbox-sec">
                                <label class="container-1">
                                    <input aria-label="Electricity professional" class="electricity_pr1p" type="checkbox" @if($getParameters['parameters']['values']['includeE']==1) checked else  @endif id="electricity_pr1" value="true" name="electricity_pr1p">
                                    <span class="checkmark"></span>
                                </label>
                                <p>@lang('home.Electricity')</p>
                            </div>
                            
                        </div> 
                        
                        <div id="pro-ele" @if($getParameters['parameters']['values']['includeE']==0) style="display: none;" @endif >
                        
                        <div class="col-lg-12 col-sm-12" >
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group meterr">
                                        <label> @lang('home.Meter_Type') <span style="color:red;">*</span></label>
                                       
                                            
                                            <select id = "dropList resident-meter" class="meter required" name="meter_type1" required="">
                     @if($getParameters['parameters']['values']['meter_type']) 
                     <option value = "{{$getParameters['parameters']['values']['meter_type']}}">
                         @if($getParameters['parameters']['values']['meter_type']=="double") @lang('home.double_meter') @endif
                          @if($getParameters['parameters']['values']['meter_type']=="single") @lang('home.single_meter') @endif
                           @if($getParameters['parameters']['values']['meter_type']=="single_excl_night") @lang('home.single_meter') + @lang('home.excl_night') @endif
                            @if($getParameters['parameters']['values']['meter_type']=="double_excl_night") @lang('home.double_meter') + @lang('home.excl_night') @endif
                         </option>
                     <option value = "single">@lang('home.single_meter')</option>
                     <option value = "double">@lang('home.double_meter')</option>
                     <option value = "single_excl_night">@lang('home.single_meter') + @lang('home.excl_night')</option> 
                     
                     <option value = "double_excl_night">@lang('home.double_meter') + @lang('home.excl_night')</option>
                     @else
                     <option value = "">@lang('home.Meter_Type')</option>
                     <option value = "single">@lang('home.single_meter')</option>
                     <option value = "double">@lang('home.double_meter')</option>
                     <option value = "single_excl_night">@lang('home.single_meter') + @lang('home.excl_night')</option> 
                     
                     <option value = "double_excl_night">@lang('home.double_meter') + @lang('home.excl_night')</option>
                     @endif
                  
                        </select><br>
                                    </div>
                                </div>
                                   
                            </div>
                        </div>
                       <div class="col-lg-12 col-sm-12 ">
                           
                           
            <div class="row double" @if($getParameters['parameters']['values']['meter_type']=='double')   @else  style="display:none;"  @endif>
               <div class="col-md-6">
                    <div class="form-group consuption_day_elec1rp">    
                        <label> @lang('home.Consumption_Day') <span style="color:red;">*</span></label>
                        <input type="number" id="consuption_day_elec1" @if($getParameters['parameters']['values']['usage_day']==0) value="0" @else value="{{$getParameters['parameters']['values']['usage_day']}}" @endif class="consuption_day_elec1p" autocomplete="off" min="0" name="consuption_day_elec1" ><br>
                    </div>
                </div> 
                <div class="col-md-6">
                    <div class="form-group consuption_night_elec1rp">    
                        <label> @lang('home.Consumption_Night') <span style="color:red;">*</span></label>
                        <input type="number" id="consuption_night_elec1" @if($getParameters['parameters']['values']['usage_night']==0) value="0" @else value="{{$getParameters['parameters']['values']['usage_night']}}" @endif class="consuption_night_elec1p" autocomplete="off" min="0" name="consuption_night_elec1" ><br>
                    </div>
                </div>    
            </div>
                            
                            
                            
                      <div class="row single" @if($getParameters['parameters']['values']['meter_type']=='single')   @else  style="display:none;"  @endif>
               <div class="col-md-12">
                    <div class="form-group consuption1rp">    
                        <label> @lang('home.Consumption') <span style="color:red;">*</span></label>
                        <input type="number" id="consuption1" @if($getParameters['parameters']['values']['usage_single']==0) value="0" @else value="{{$getParameters['parameters']['values']['usage_single']}}" @endif class="consuption1p required @if($getParameters['parameters']['values']['meter_type']=='single') required @endif" autocomplete="off" min="0" name="consuption1" ><br>
                    </div>
                </div> 
                   
            </div>
             
              <div class="row single_excl_night" @if($getParameters['parameters']['values']['meter_type']=='single_excl_night')   @else  style="display:none;"  @endif>
                  
                <div class="col-md-6">
                    <div class="form-group consuption1serp">    
                        <label> @lang('home.Consumption') <span style="color:red;">*</span></label>
                        <input type="number" id="consuption1" @if($getParameters['parameters']['values']['usage_single']==0) value="0" @else value="{{$getParameters['parameters']['values']['usage_single']}}" @endif class="consuption1sep required" autocomplete="off" min="0" name="consuption1se" ><br>
                    </div>
                </div>
              
                <div class="col-md-6">
                    <div class="form-group consuption_excl_nightserp">    
                        <label> @lang('home.Consumption_excl_Night') <span style="color:red;">*</span></label>
                        <input type="number" id="consuption_excl_night" @if($getParameters['parameters']['values']['usage_excl_night']==0) value="0" @else value="{{$getParameters['parameters']['values']['usage_excl_night']}}" @endif class="consuption_excl_nightsep required" autocomplete="off" min="0" name="consuption_excl_nightse" ><br>
                    </div>
                </div>    
            </div>
                            
                <div class="row double_excl_night" @if($getParameters['parameters']['values']['meter_type']=='double_excl_night')   @else  style="display:none;"  @endif>
                  
                 <div class="col-md-6">
                    <div class="form-group consuption_day_elec1derp">    
                        <label> @lang('home.Consumption_Day') <span style="color:red;">*</span></label>
                        <input type="number" id="consuption_day_elec1" @if($getParameters['parameters']['values']['usage_day']==0) value="0" @else value="{{$getParameters['parameters']['values']['usage_day']}}" @endif class="consuption_day_elec1dep required" autocomplete="off" min="0" name="consuption_day_elec1de" ><br>
                    </div>
                </div> 
                <div class="col-md-6">
                    <div class="form-group consuption_night_elec1derp">    
                        <label> @lang('home.Consumption_Night') <span style="color:red;">*</span></label>
                        <input type="number" id="consuption_night_elec1" @if($getParameters['parameters']['values']['usage_night']==0) value="0" @else value="{{$getParameters['parameters']['values']['usage_night']}}" @endif class="consuption_night_elec1dep required" autocomplete="off" min="0" name="consuption_night_elec1de" ><br>
                    </div>
                </div> 
              
                <div class="col-md-12">
                    <div class="form-group consuption_excl_nightderp">    
                        <label> @lang('home.Consumption_excl_Night') <span style="color:red;">*</span></label>
                        <input type="number" id="consuption_excl_night" @if($getParameters['parameters']['values']['usage_excl_night']==0) value="0" @else value="{{$getParameters['parameters']['values']['usage_excl_night']}}" @endif class="consuption_excl_nightdep required" autocomplete="off" min="0" name="consuption_excl_nightde" ><br>
                    </div>
                </div>    
            </div>
                        </div>
                        
         <div class="col-md-12">
                    <div class="form-group">
                      <label>@lang('home.Current_Tariff')</label>
                      <select name="current_tariff_elec_1" @if($getParameters['parameters']['values']['current_supplier_name_electricity'] == null) id="supplier_prof_e" @endif class="elec-supply"> 
                      
                            <option value ="">@lang('home.Current_Tariff')</option>
                           
                            @php 
                            $suppliers = [];
                            foreach($all_suppliers as $all_supplier){
                            $suppliers[] = $all_supplier['supplier']['name'];
                            }
                            sort($suppliers);
                            
                            @endphp
                            
                            @foreach($suppliers as $supplier)
                            <option @if($getParameters['parameters']['values']['current_supplier_name_electricity'] == $supplier) selected @endif value ="{{$supplier}}">{{$supplier}}</option>
                            @endforeach 
                      </select>
                    </div>
                </div>




          <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="checkbox-sec">
                <label class="container-1">
                <input aria-label="dec_pro" id="dec_pro1" name="dec_pro" type="checkbox"  @if($getParameters['parameters']['values']['decentralise_production']==true) checked @endif  id="dec_pro" name="dec_pro" value="true">
                <span class="checkmark"></span>
                </label>
                <p>@lang('home.Decentralised_production')</p>
            </div>       
        </div>



            <div class="col-md-12" id="dec_pro_data1"  @if($getParameters['parameters']['values']['decentralise_production']==true)  @else  style="display:none;" @endif>
                <div class="form-group">
                  <label>@lang('home.Capacity')</label>
                  <select  name="capacity_decen_pro" class="capacity_decen_pro11"> 
                       
                        @if($getParameters['parameters']['values']['decentralise_production']==true)
                        <option value ="{{$getParameters['parameters']['values']['capacity_decentalise']}}">{{$getParameters['parameters']['values']['capacity_decentalise']}}</option>
                        @else
                        <option selected="selected" value="">@lang('home.Capacity')</option>
                        
                        @endif
                        <option value = "1">1</option>
                        <option value = "2">2</option>
                        <option value = "3">3</option>
                        <option value = "4">4</option>
                        <option value = "5">5</option>
                         <option value = "6">6</option>
                        <option value = "7">7</option>
                        <option value = "8">8</option>
                        <option value = "9">9</option>
                        <option value = "10">10</option>
                  </select>
                </div>
            </div> 
                        
                        </div>
                        
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="checkbox-sec">
                <label class="container-1">
                <input aria-label="gas"  type="checkbox" @if($getParameters['parameters']['values']['includeG']==1) checked else  @endif id="gas_p" name="gasp" value="true">
                <span class="checkmark"></span>
                </label>
                <p>@lang('home.Gas')</p>
            </div>       
        </div>
        
        
                                                                        
            <div class="col-md-6 gas-sel-p" @if($getParameters['parameters']['values']['includeG']==1)   @else  style="display:none;"  @endif>
                <div class="form-group consumtion_gas1r">  
                    <label> @lang('home.Consumption_single') <span style="color:red;">*</span></label>
                    <input type="number" class="consumtion_gas1p @if($getParameters['parameters']['values']['usage_gas']!=-1) required @endif" value="@if($getParameters['parameters']['values']['usage_gas']!=-1){{$getParameters['parameters']['values']['usage_gas']}}@endif" autocomplete="off" id="consumtion_gas1" name="consumtion_gas1" value=""><br>
                </div>
            </div>
        
            <div class="col-md-6 gas-sel-p" @if($getParameters['parameters']['values']['includeG']==1)   @else  style="display:none;"  @endif>
                <div class="form-group">
                  <label>@lang('home.Current_Tariff')</label>
                  <select name="current_tariff_gas" id="supplier_prof_g" class="gas-supply"> 
                        <option value ="">@lang('home.Current_Tariff')</option>

                        @php 
                        $suppliers = [];
                        foreach($all_suppliers as $all_supplier){
                        $suppliers[] = $all_supplier['supplier']['name'];
                        }
                        sort($suppliers);
                        
                        @endphp
                    
                        @foreach($suppliers as $supplier)
                        <option @if($getParameters['parameters']['values']['current_supplier_name_gas'] == $supplier) selected @endif value ="{{$supplier}}">{{$supplier}}</option>
                        @endforeach
                  
                  </select>
                </div>
            </div>
                        
                        
                        
                         <div class="col-md-12">
                            <div class="form-group">  
                                <label> @lang('home.Email') </label>
                                <input type="email" autocomplete="on" id="email" name="email" value="{{$getParameters['parameters']['values']['email']}}"><br>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group calculate">
                                
                                <div id="submit_pr_msg" style="display:none;color:red;" class="alert alert-danger">
                                Vul alstublieft het formulier in
                                </div>
                                <input type="submit" id="submit_pr" value="@lang('home.Calculate')">
                            </div>
                        </div>
                                        
                                    </div>
                                </form>
                            </div>
                        </div>
                     </div>
                 </div>
              </div>
            </section>
             <div class="loading_section_sec" style="display: none;">
             <i class="fa fa-spinner fa-spin fa-3x"></i>
             </div>
        </div>
     </div>
 </div>
</div>
        
</div>
</div>
<div class="section_2_sidebar" data-target='el-2'>
<h4 class="filter-head">@lang('home.Filter_the_results')</h4>   
           @if($getParameters['parameters']['values']['usage_single']>0 && $getParameters['parameters']['values']['usage_gas']>0 && $getParameters['parameters']['values']['usage_excl_night']==0)
                <div class="filter-sec">  
                    <h6>@lang('home.Display_Results')</h6>
                    <div class="tab-1" id="tab-1">
                        <button class="btn bundle b-1-sec @if(!Session::get('seperate')) active @endif"> @lang('home.Bundle')</button>
                        <button class="btn seperate b-2-sec @if(Session::get('seperate')) active @endif" id="sep" data-sep="{{Session::get('seperate')}}"> @lang('home.separately')</button> 
                     
                    </div>
                </div>
             @endif
              @if($getParameters['parameters']['values']['usage_day']>0 && $getParameters['parameters']['values']['usage_night']>0 && $getParameters['parameters']['values']['usage_gas']>0 && $getParameters['parameters']['values']['usage_excl_night']==0)
                <div class="filter-sec">  
                    <h6>@lang('home.Display_Results')</h6>
                    <div class="tab-1" id="tab-1">
                        <button class="btn bundle b-1-sec @if(!Session::get('seperate')) active @endif"> @lang('home.Bundle')</button>
                        <button class="btn seperate b-2-sec @if(Session::get('seperate')) active @endif" id="sep" data-sep="{{Session::get('seperate')}}"> @lang('home.separately')</button> 
                    </div>
                </div>
             @endif
              @if($getParameters['parameters']['values']['usage_day']>0 && $getParameters['parameters']['values']['usage_night']>0 && $getParameters['parameters']['values']['usage_excl_night']>0 && $getParameters['parameters']['values']['usage_gas']>0)
                <div class="filter-sec">  
                    <h6>@lang('home.Display_Results')</h6>
                    <div class="tab-1" id="tab-1">
                       <button class="btn bundle b-1-sec @if(!Session::get('seperate')) active @endif"> @lang('home.Bundle')</button>
                        <button class="btn seperate b-2-sec @if(Session::get('seperate')) active @endif" id="sep" data-sep="{{Session::get('seperate')}}"> @lang('home.separately')</button> 
                    </div>
                </div>
             @endif
             
             @if($getParameters['parameters']['values']['usage_single']>0 && $getParameters['parameters']['values']['usage_excl_night']>0 && $getParameters['parameters']['values']['usage_gas']>0)
            
                <div class="filter-sec">  
                    <h6>@lang('home.Display_Results')</h6>
                    <div class="tab-1" id="tab-1">
                         <button class="btn bundle b-1-sec @if(!Session::get('seperate')) active @endif"> @lang('home.Bundle')</button>
                        <button class="btn seperate b-2-sec @if(Session::get('seperate')) active @endif" id="sep" data-sep="{{Session::get('seperate')}}"> @lang('home.separately')</button> 
                    </div>
                </div>
            
             @endif
             
              
               
                <div class="cost-sec">  
                    <h6>@lang('home.Cost_per')</h6>
                    <div class="tab-2" id="tab-2">
                        <button class="btn2 btnyear active" data-for="year" id="years"> @lang('home.filter_year')</button>
                        <button class="btn2 btnmonth" data-for="month" id="month"> @lang('home.Month')</button>
                        
                    </div>
                </div>
              <div class="widget">
                    <h6>@lang('home.Estimated_Savings')</h6>
                  <div class="savings_per_year_sidebar">
                    <div class="savings_input_select">
                        <input aria-label="Current Invoice" class="saving-per-year" type="number" value="{{Session::get('currentValue')}}" min="0" name="currentInvoice" id="cur_invoice" placeholder="@lang('home.Current_invoice')">
                         <select aria-label="Year or month" name="cur_invoice_moth_year" id="cur_invoice_moth_year">
                             @if(Session::get('cur_invoice_moth_year')=='year')
                             <option value="year">@lang('home.Year')</option>
                             <option value="month">@lang('home.Month')</option>
                             @else
                            <option value="month">@lang('home.Month')</option>
                            <option value="year">@lang('home.Year')</option>
                            @endif
                        </select>
                        <!--<img id="ajax-loader"  src="{{url('images/circle.gif')}}" >-->
                    </div>
                    <div class="savings_button">
                        <img id="ajax-loader"   src="{{url('images/progress.gif')}}" >
                        <!--<button id="save-update">@lang('home.update')</button>                        -->
                    </div>
                </div>
             </div>

                <div class="widget">
                    <h6>{{ ucfirst(trans('home.Discounts')) }}</h6>
                    <form action="">
                        <ul>
                             @if(Session::get('promo')=='true')
                             <li><label for="muhRadio1"><input type="checkbox" checked style="cursor: pointer;" class="disc"  name="disc" value="promo"/>@lang('home.For_commercial')</label></li>
                            @else
                            <li><label for="muhRadio1"><input type="checkbox" id="promo-check" style="cursor: pointer;" class="disc"  name="disc" value="promo"/>@lang('home.For_commercial')</label></li>
                             @endif
                             
                            @if(Session::get('locale')=='nl')
                             @if(Session::get('domi')=='true')
                            <li><label for="muhRadio2"><input type="checkbox" checked style="cursor: pointer;" class="disc" name="disc" value="domi"/>Digitale dienstverlening</label></li>
                            @else
                            <li><label for="muhRadio2"><input type="checkbox" style="cursor: pointer;" class="disc" name="disc" value="domi"/>Digitale dienstverlening</label></li>
                            @endif
                            @else
                            @if(Session::get('domi')=='true')
                            <li><label for="muhRadio2"><input type="checkbox" checked style="cursor: pointer;" class="disc" name="disc" value="domi"/>Service digitalisé</label></li>
                            @else
                            <li><label for="muhRadio2"><input type="checkbox" style="cursor: pointer;" class="disc" name="disc" value="domi"/>Service digitalisé</label></li>
                            @endif
                            
                            @endif
                            
                            @if(Session::get('email')=='true')
                            <li><label for="muhRadio3"><input type="checkbox" checked style="cursor: pointer;" class="disc" name="disc" value="email"/>@lang('home.For_digital_invoicing')</label></li>
                            @else
                            <li><label for="muhRadio3"><input type="checkbox" style="cursor: pointer;" class="disc" name="disc" value="email"/>@lang('home.For_digital_invoicing')</label></li>
                            @endif
                        </ul>
                        
                    </form>
                </div>


                <div class="widget">
                    <h6>@lang('home.Serviced_level')</h6>
                    <form action="">
                        <ul>
                            <li><label for="muhRadio1"><input type="checkbox" style="cursor: pointer;" class="ser_lim" name="ser_lim" value="none"/>@lang('home.full')</label></li>
                            <li><label for="muhRadio1"><input type="checkbox" style="cursor: pointer;" class="ser_lim" name="ser_lim" value="domi"/>@lang('home.Automated_payment')</label></li>
                            <li><label for="muhRadio2"><input type="checkbox" style="cursor: pointer;" class="ser_lim" name="ser_lim" value="email"/>@lang('home.Digital_invoicing')</label></li>
                            <li><label for="muhRadio3"><input type="checkbox" style="cursor: pointer;" class="ser_lim" name="ser_lim" value="online"/>@lang('home.Digital_communication')</label></li>
                        </ul>
                    </form>
                </div>
                
                <div class="widget contarct-sec-ad">
                    <h6>@lang('home.Contract_duration')</h6>
                    <form action="">
                        <ul>
                            <li><label for="muhRadio1"><input type="checkbox" style="cursor: pointer;"  class="duration" name="year" data-value="1" value="1"/> 1 @lang('home.Year') </label></li>
                            <li><label for="muhRadio2"><input type="checkbox" style="cursor: pointer;" class="duration" name="year" data-value="2" value="2"/> 2 @lang('home.Year') </label></li>
                            <li><label for="muhRadio3"><input type="checkbox" style="cursor: pointer;" class="duration" name="year" data-value="3" value="3"/> 3 @lang('home.Year')</label></li>
                            <li><label for="muhRadio4"><input type="checkbox" style="cursor: pointer;" class="duration" name="year" data-value="4" value="4"/> 4 @lang('home.Year')</label></li>
                            <li><label for="muhRadio4"><input type="checkbox" style="cursor: pointer;" class="duration" name="year" data-value="5" value="5"/> 5 @lang('home.Year')</label></li>
                            <li><label for="muhRadio5"><input type="checkbox" style="cursor: pointer;" class="duration" name="year" data-value="indefinite" value="indefinite"/> @lang('home.Indefinitely')</label></li>
                        </ul>
                    </form>
                </div>
                <div class="widget">
                    <h6>@lang('home.Rate_type')</h6>
                    <form action="">
                        <ul>
                            <li><label for="muhRadio6"><input type="checkbox" style="cursor: pointer;" class="price_type" name="price_type" value="fixed"/>@lang('home.Fixed_price')</label></li>
                            <li><label for="muhRadio7"><input type="checkbox" style="cursor: pointer;" class="price_type" name="price_type" value="variable"/>@lang('home.Variable_price')</label></li>
                            <li><label for="muhRadio8"><input type="checkbox" style="cursor: pointer;" class="price_type" name="price_type" value="combinatioin"/>@lang('home.combinatioin_of_both')</label></li>
                        </ul>
                    </form>
                </div>
                
                

                <div class="widget">
                    <h6>@lang('home.Green_power')</h6>
                    <form action="">
                        <ul>
                            <li><label for="muhRadio1"><input type="checkbox" style="cursor: pointer;" class="green" name="green" value="100"/> @lang('home.Yes') </label></li>
                            <li><label for="muhRadio2"><input type="checkbox" style="cursor: pointer;" class="green" name="green" value="50"/>@lang('home.Yes_and_Belgian') </label></li>
                            <li><label for="muhRadio3"><input type="checkbox" style="cursor: pointer;" class="green" name="green" value="0"/>@lang('home.No')</label></li>
                        </ul>
                    </form>
                </div>
               <!--  <div class="widget">
                    <h6>@lang('home.Greenpeace_green')</h6>
                    <form action="">
                        <ul>
                            <li><label for="muhRadio1"><input type="checkbox" style="cursor: pointer;" class="green_score" name="green_score" value="0.5"/> @lang('home.At_least') 10/20 </label></li>
                            <li><label for="muhRadio2"><input type="checkbox" style="cursor: pointer;" class="green_score" name="green_score" value="0.75"/> @lang('home.At_least') 15/20 </label></li>
                            <li><label for="muhRadio3"><input type="checkbox" style="cursor: pointer;" class="green_score" name="green_score" value="1"/> @lang('home.At_least') 20/20</label></li>
                        </ul>
                    </form> 
                </div> -->
            </div>
        </div>




            <script type="text/javascript">
                $(".form-group").on("click", function(event) {
                  event.stopPropagation();
                  $(".form-group>label").addClass("label_colors");
                });
                // $(".form-group").click(function(){
                //   $(".form-group>label").addClass("label_colors");
                // });
               


                $(function () 
{
  var onClass = "on";
  var showClass = "show";

  $("input, select")
    .bind("checkval", function () 
    {
      var label = $(this).prev("label");
        
      if (this.value !== "")
        label.addClass(showClass);
        
      else
        label.removeClass(showClass);
    })
    .on("keyup", function () 
    {
      $(this).trigger("checkval");
    })
    .on("focus", function () 
    {
      $(this).prev("label").addClass(onClass);
    })
    .on("blur", function () 
    {
        $(this).prev("label").removeClass(onClass);
    })
    .trigger("checkval");
    
  $("select")
    .on("change", function ()
    {
      var $this = $(this);
      
      if ($this.val() == "")
        $this.addClass("watermark");
      
      else
        $this.removeClass("watermark");
        
      $this.trigger("checkval");
    })
    .change();
});
            </script>



            <script>
            $(document).ready(function(){
                
                
                // meter
                
                  var meterType=$('.meter').val(); 
                   
                  
                  if(meterType=='single'){
                       
                         $('.single').show();
                         $('.double').hide();
                         $('.single_excl_night').hide();
                         $('.double_excl_night').hide();

                //         $(".consuption1").attr("required",true);
                //         $(".consuption1").addClass("required");
                        
                //         $(".consuption_day_elec1").removeAttr('required');
                //         $(".consuption_day_elec1se").removeAttr('required');
                //         $(".consuption_day_elec1de").removeAttr('required');
                //         $(".consuption_night_elec1").removeAttr('required');
                //         $(".consuption_night_elec1se").removeAttr('required');
                //         $(".consuption_night_elec1de").removeAttr('required');

                //         $(".consuption_excl_night").removeAttr('required');
                //         $(".consuption_excl_nightse").removeAttr('required');
                //         $(".consuption_excl_nightde").removeAttr('required');

                //         $(".consuption1se").removeAttr('required');
                //         $(".consuption1de").removeAttr('required');

                        
                //         $(".consuption1se").removeAttr('required');
                //         $(".consuption1de").removeAttr('required');
                        
                //         // 
                        
                //          $(".consuption_day_elec1").removeClass('required');
                //         $(".consuption_day_elec1se").removeClass('required');
                //         $(".consuption_day_elec1de").removeClass('required');
                //         $(".consuption_night_elec1").removeClass('required');
                //         $(".consuption_night_elec1se").removeClass('required');
                //         $(".consuption_night_elec1de").removeClass('required');

                //         $(".consuption_excl_night").removeClass('required');
                //         $(".consuption_excl_nightse").removeClass('required');
                //         $(".consuption_excl_nightde").removeClass('required');

                //         $(".consuption1se").removeClass('required');
                //         $(".consuption1de").removeClass('required');

                        
                //         $(".consuption1se").removeClass('required');
                //         $(".consuption1de").removeClass('required');
                      
                   }
                  if(meterType=='double'){
                       
                        $('.double').show();
                        $('.single').hide();
                        $('.single_excl_night').hide();
                        $('.double_excl_night').hide();

                //         $(".consuption_day_elec1").attr("required","required");
                //         $(".consuption_night_elec1").attr("required","required");
                        
                //         $(".consuption_day_elec1").addClass("required");
                //         $(".consuption_night_elec1").addClass("required");
                        
                //         $(".consuption_day_elec1se").removeAttr('required');
                //         $(".consuption_day_elec1de").removeAttr('required');

                //         $(".consuption_night_elec1se").removeAttr('required');
                //         $(".consuption_night_elec1de").removeAttr('required');

                //         $(".consuption_excl_night").removeAttr('required');
                //         $(".consuption_excl_nightse").removeAttr('required');
                //         $(".consuption_excl_nightde").removeAttr('required');

                                              
                //         $(".consuption_excl_night").removeAttr('required');
                //         $(".consuption_excl_nightse").removeAttr('required');
                //         $(".consuption_excl_nightde").removeAttr('required');
                //         $(".consuption1").removeAttr('required');
                //         $(".consuption1se").removeAttr('required');
                //         $(".consuption1de").removeAttr('required');
                        
                //         // 
                        
                        
                        
                //         $(".consuption_day_elec1se").removeClass('required');
                //         $(".consuption_day_elec1de").removeClass('required');

                //         $(".consuption_night_elec1se").removeClass('required');
                //         $(".consuption_night_elec1de").removeClass('required');

                //         $(".consuption_excl_night").removeClass('required');
                //         $(".consuption_excl_nightse").removeClass('required');
                //         $(".consuption_excl_nightde").removeClass('required');

                                              
                //         $(".consuption_excl_night").removeClass('required');
                //         $(".consuption_excl_nightse").removeClass('required');
                //         $(".consuption_excl_nightde").removeClass('required');
                //         $(".consuption1").removeClass('required');
                //         $(".consuption1se").removeClass('required');
                //         $(".consuption1de").removeClass('required');
                  }
                  if(meterType=='double_excl_night'){
                       
                        $('.double').hide();
                        $('.single').hide();
                        $('.double_excl_night').show();
                        $('.single_excl_night').hide();
                        
                //         $(".consuption_day_elec1de").attr("required","required");
                //         $(".consuption_night_elec1de").attr("required","required");
                //         $(".consuption1de").attr("required","required");
                        
                //         $(".consuption_day_elec1de").addClass("required");
                //         $(".consuption_night_elec1de").addClass("required");
                //         $(".consuption1de").addClass("required");
                        

                //         $(".consuption_day_elec1").removeAttr('required');
                //         $(".consuption_night_elec1").removeAttr("required"); 
                        
                //         $(".consuption_day_elec1se").removeAttr('required');
                        
                //         $(".consuption_night_elec1").removeAttr('required');
                //         $(".consuption_night_elec1se").removeAttr('required');
                        
                //         $(".consuption_excl_night").removeAttr('required');
                //         $(".consuption1").removeAttr('required');
                //         $(".consuption1se").removeAttr('required');
                        
                //         // 
                        
                //         $(".consuption_day_elec1").removeClass('required');
                //         $(".consuption_night_elec1").removeClass("required"); 
                        
                //         $(".consuption_day_elec1se").removeClass('required');
                        
                //         $(".consuption_night_elec1").removeClass('required');
                //         $(".consuption_night_elec1se").removeClass('required');
                        
                //         $(".consuption_excl_night").removeClass('required');
                //         $(".consuption1").removeClass('required');
                //         $(".consuption1se").removeClass('required');
                        
                  }
                   
                    if(meterType=='single_excl_night'){
                       
                        $('.double').hide();
                        $('.single').hide();
                        $('.single_excl_night').show();
                        $('.double_excl_night').hide();
                        
                //         $(".consuption1se").attr("required","required");
                //         $(".consuption_excl_nightse").attr("required","required");
                        
                //         $(".consuption1se").addClass("required");
                //         $(".consuption_excl_nightse").addClass("required");
                        
                        
                //         $(".consuption_day_elec1").removeAttr('required');
                //         $(".consuption_day_elec1se").removeAttr('required');
                //         $(".consuption_day_elec1de").removeAttr('required');

                //         $(".consuption_night_elec1").removeAttr('required'); 
                //         $(".consuption_night_elec1se").removeAttr('required');
                //         $(".consuption_night_elec1de").removeAttr('required');
                //         $(".consuption_excl_night").removeAttr('required'); 
                        
                //         $(".consuption_excl_nightde").removeAttr('required'); 
                //         $(".consuption1").removeAttr('required');
                        
                //         $(".consuption1de").removeAttr('required');
                //         // 
                        
                //         $(".consuption_day_elec1").removeClass('required');
                //         $(".consuption_day_elec1se").removeClass('required');
                //         $(".consuption_day_elec1de").removeClass('required');

                //         $(".consuption_night_elec1").removeClass('required'); 
                //         $(".consuption_night_elec1se").removeClass('required');
                //         $(".consuption_night_elec1de").removeClass('required');
                //         $(".consuption_excl_night").removeClass('required'); 
                        
                //         $(".consuption_excl_nightde").removeClass('required'); 
                //         $(".consuption1").removeClass('required');
                        
                //         $(".consuption1de").removeClass('required');
                        
                        
                  }
                
                // end meter
                
                
                

                 var gas = $("input[name='gas']:checked").val();
                 var electricity = $("input[name='electricity']:checked").val();
                
                            if($('#gas').prop("checked") != true || $('#electricity').prop("checked") != true){
                            $("#submit1").attr('disabled', 'disabled'); 
                            }
                            if(gas!=''||electricity!=''){
                                    $("#submit1").attr('disabled', false); 
                            }else{
                                    $("#submit1").attr('disabled', true); 
                            }

                            if(gas=="true"){   
                            $(".meter").attr("required",false);                     
                            $("#consumtion_gas1").attr("required","required"); 
                            }

                            if(!gas){                        
                            $("#consumtion_gas1").removeAttr('required'); 

                            }  

                            if(electricity=="true"){  
                            $(".meter").attr("required",true);                      
                            // $("#consuption_day_elec1").attr("required","required");
                            // $("#consuption_night_elec1").attr("required","required");                        
                            }

                            if(!electricity){
                            // $("#consuption_day_elec1").removeAttr('required');
                            // $("#consuption_night_elec1").removeAttr('required');
                            }
                
                
            $('#electricity').change(function(){  
                    var electricity = $("input[name='electricity']:checked").val();              
                    if(electricity!=""){   
                        $(".meter").attr("required",true);
                        $('#elec-pri').show();
                    //   $("#consuption_day_elec1").attr("required","required");
                    //   $("#consuption_night_elec1").attr("required","required");
                       
                      
                        
                    //     $(".consuption_day_elec1").addClass("required");
                    //     $(".consuption_night_elec1").addClass("required");
                        
                    //     $(".consuption_day_elec1se").removeAttr('required');
                    //     $(".consuption_day_elec1de").removeAttr('required');

                    //     $(".consuption_night_elec1se").removeAttr('required');
                    //     $(".consuption_night_elec1de").removeAttr('required');

                    //     $(".consuption_excl_night").removeAttr('required');
                    //     $(".consuption_excl_nightse").removeAttr('required');
                    //     $(".consuption_excl_nightde").removeAttr('required');

                                              
                    //     $(".consuption_excl_night").removeAttr('required');
                    //     $(".consuption_excl_nightse").removeAttr('required');
                    //     $(".consuption_excl_nightde").removeAttr('required');
                    //     $(".consuption1").removeAttr('required');
                    //     $(".consuption1se").removeAttr('required');
                    //     $(".consuption1de").removeAttr('required');
                        
                    //     // 
                        
                        
                    //     $(".consuption_day_elec1").removeAttr('required');
                    //     $(".consuption_day_elec1").removeClass('required');
                    //     $(".consuption_day_elec1se").removeClass('required');
                    //     $(".consuption_day_elec1de").removeClass('required');

                    //     $(".consuption_night_elec1se").removeClass('required');
                    //     $(".consuption_night_elec1de").removeClass('required');

                    //     $(".consuption_excl_night").removeClass('required');
                    //     $(".consuption_excl_nightse").removeClass('required');
                    //     $(".consuption_excl_nightde").removeClass('required');

                                              
                    //     $(".consuption_excl_night").removeClass('required');
                    //     $(".consuption_excl_nightse").removeClass('required');
                    //     $(".consuption_excl_nightde").removeClass('required');
                    //     $(".consuption1").removeClass('required');
                    //     $(".consuption1se").removeClass('required');
                    //     $(".consuption1de").removeClass('required');
                    }
                    
                    if(typeof electricity==="undefined"){          
                        
                        // $("#consuption_day_elec1").removeAttr('required');
                        // $("#consuption_night_elec1").removeAttr('required');
                        
                        // $(".consuption_day_elec1").removeClass("required");
                        // $(".consuption_night_elec1").removeClass("required");
                        
                        // $(".consuption_day_elec1se").removeAttr('required');
                        // $(".consuption_day_elec1de").removeAttr('required');

                        // $(".consuption_night_elec1se").removeAttr('required');
                        // $(".consuption_night_elec1de").removeAttr('required');

                        // $(".consuption_excl_night").removeAttr('required');
                        // $(".consuption_excl_nightse").removeAttr('required');
                        // $(".consuption_excl_nightde").removeAttr('required');
                        // $(".consuption_day_elec1").removeAttr('required');
                        // $(".consuption_day_elec1").removeClass('required');

                                              
                        // $(".consuption_excl_night").removeAttr('required');
                        // $(".consuption_excl_nightse").removeAttr('required');
                        // $(".consuption_excl_nightde").removeAttr('required');
                        // $(".consuption1").removeAttr('required');
                        // $(".consuption1se").removeAttr('required');
                        // $(".consuption1de").removeAttr('required');
                        
                        // // 
                        
                        
                        
                        // $(".consuption_day_elec1se").removeClass('required');
                        // $(".consuption_day_elec1de").removeClass('required');

                        // $(".consuption_night_elec1se").removeClass('required');
                        // $(".consuption_night_elec1de").removeClass('required');

                        // $(".consuption_excl_night").removeClass('required');
                        // $(".consuption_excl_nightse").removeClass('required');
                        // $(".consuption_excl_nightde").removeClass('required');

                                              
                        // $(".consuption_excl_night").removeClass('required');
                        // $(".consuption_excl_nightse").removeClass('required');
                        // $(".consuption_excl_nightde").removeClass('required');
                        // $(".consuption1").removeClass('required');
                        // $(".consuption1se").removeClass('required');
                        // $(".consuption1de").removeClass('required');
                        
                        
                        $(".meter").attr("required",false); 
                        
                         $('#elec-pri').hide();
                        
                    } 
            });
            
                
            $(document).on('click','#gas', function(){
                    var gas = $("input[name='gas']:checked").val(); 
                    console.log('gas',$(this).is(':checked'));
                        if($(this).is(':checked')){  
                            $('.gas-sel').show();
                           $("#consumtion_gas1").attr("required","required");
                           $("#select-gSupplier").attr("required","required");
                        }                    
                        else{     
                             $('.gas-sel').hide();
                           $("#consumtion_gas1").removeAttr('required');
                           $("#select-gSupplier").removeAttr('required');
                        }
            });

            $(document).on('click','#gas_p', function(){
                    var gas = $("input[name='gas']:checked").val(); 
                    console.log('gas',$(this).is(':checked'));
                        if($(this).is(':checked')){  
                            $('.gas-sel-p').show();
                           $(".consumtion_gas1p").attr("required","required");
                           $("#supplier_prof_g").attr("required","required");
                        }                    
                        else{     
                             $('.gas-sel-p').hide();
                           $(".consumtion_gas1p").removeAttr('required');
                           $("#supplier_prof_g").removeAttr('required');
                        }
            });
            
            //  $('#gas_p').click(function(){
            //         var gas = $("input[name='gas']:checked").val();                
            //             if(gas!=""){  
            //                 $('.gas-sel').show();
            //               $("#consumtion_gas1").attr("required","required");
            //             }                    
            //             if(!gas){     
            //                  $('.gas-sel').hide();
            //               $("#consumtion_gas1").removeAttr('required');
            //             }
            // });
                
            $('#know').click(function(){
                    
                    $(".meter").attr("required","required");
                    $(".meter_type2").removeAttr('required');
                    var know = $("input[name='group1']:checked").val();                
                    if(know=="know_consuption"){                        
                        $("#consuption_day_elec2").removeAttr('required');
                        $("#consuption_night_elec2").removeAttr('required');                        
                        $("#consuption_day_elec1").attr("required","required");
                        $("#consuption_night_elec1").attr("required","required");                        
                    }
                    
                    if(know!="know_consuption"){                        
                       $("#consuption_day_elec1").removeAttr('required');
                       $("#consuption_night_elec1").removeAttr('required');                        
                        
                    }                   
                    
            });
                
            $('#knowpr').click(function(){
                    
                        $(".meter_pr_1").attr("required","required");
                        $(".meter_pr_2").removeAttr('required');
                        var know = $("input[name='group1_pr']:checked").val(); 
                    if(know=="know"){                        
                       $("#consuption_day_elecpr2").removeAttr('required');
                       $("#consuption_night_elecpr2").removeAttr('required');
                       $("#consuption_excl_nightpr2").removeAttr('required');
                       $("#consuptionpr2").removeAttr("required");                        
                       $("#consuption_day_elecpr1").attr("required","required");
                       $("#consuption_night_elecpr1").attr("required","required");
                        
                    }
                    
                    if(know!="know"){                        
                       $("#consuption_day_elecpr1").removeAttr('required');
                       $("#consuption_night_elecpr1").removeAttr('required'); 
                    }
                    
                    
            });
                
            $('#estimate').click(function(){
                    
                     $(".meter_type2").attr("required","required");
                     $(".meter").removeAttr('required');                    
                     var know = $("input[name='group1']:checked").val();                
                    if(know=="estimate_consuption"){                        
                       $("#consuption_day_elec1").removeAttr('required');
                       $("#consuption_night_elec1").removeAttr('required');                        
                       $("#consuption_day_elec2").attr("required","required");
                       $("#consuption_night_elec2").attr("required","required");                        
                    }
                    
                    if(know!="estimate_consuption"){                        
                       $("#consuption_day_elec2").removeAttr('required');
                       $("#consuption_night_elec2").removeAttr('required');
                    } 
            });
                
            $('#estimatepr').click(function(){

                     $(".meter_pr_2").attr("required","required");
                     $(".meter_pr_1").removeAttr('required');                    
                     var know = $("input[name='group1_pr']:checked").val();                
                     if(know=="estimate"){                        
                       $("#consuption_day_elecpr1").removeAttr('required');
                       $("#consuption_night_elecpr1").removeAttr('required');
                       $("#consuption_excl_nightpr1").removeAttr('required');
                       $("#consuptionpr1").removeAttr("required");                        
                       $("#consuption_day_elecpr2").attr("required","required");
                       $("#consuption_night_elecpr2").attr("required","required");                        
                     }
                    
                    if(know!="estimate"){                        
                       $("#consuption_day_elecpr2").removeAttr('required');
                       $("#consuption_night_elecpr2").removeAttr('required');
                       $("#consuptionpr1").removeAttr("required");
                       $("#consuption_excl_nightpr1").removeAttr('required');                       
                        
                    }                    
                    
            });
                
               
            $('#electricity_pr1').change(function(){                    
                    
                    var electricity = $("input[name='electricity_pr1']:checked").val();
                    var gas = $("input[name='gas3']:checked").val();                
                    if(electricity!=""){
                        
                        $('#pro-ele').show();
                        $(".meter_pr_1").attr("required","required");
                      $("#consuption_day_elec1").attr("required","required");
                      $("#consuption_night_elec1").attr("required","required");
                        
                    }                    
                    if(!electricity){
                        $('#pro-ele').hide();
                      $(".meter_pr_1").removeAttr('required');
                      $("#consuption_day_elecpr1").removeAttr('required');
                      $("#consuption_night_elecpr1").removeAttr('required');                       
                        
                    }                    
                    if(gas=="" && electricity=="" ){
                    $("#submit_pr").attr('disabled','disabled'); 
                    }else{
                    $("#submit_pr").removeAttr('disabled');
                    }
                    
            }); 
            
             $('.electricity_pr1p').change(function(){                    
                    
                    var electricity = $("input[name='electricity_pr1p']:checked").val();
                    var gas = $("input[name='gasp']:checked").val();                
                    if(electricity!=""){
                        
                        $('#pro-ele').show();
                        $(".meter_pr_1").attr("required","required");
                      $("#consuption_day_elec1").attr("required","required");
                      $("#consuption_night_elec1").attr("required","required");
                        
                    }                    
                    if(!electricity){
                        $('#pro-ele').hide();
                      $(".meter_pr_1").removeAttr('required');
                      $("#consuption_day_elecpr1").removeAttr('required');
                      $("#consuption_night_elecpr1").removeAttr('required');                       
                        
                    }                    
                    if(gas=="" && electricity=="" ){
                    $("#submit_pr").attr('disabled','disabled'); 
                    }else{
                    $("#submit_pr").removeAttr('disabled');
                    }
                    
            });

            $('#gas3').change(function(){                  
                    
                  var gas = $("input[name='gas3']:checked").val();
                  var electricity = $("input[name='electricity_pr1']:checked").val();                
                        if(gas!=""){ 
                            $('#pro-gas').show();
                          $(".gas_cons_pr").attr("required","required");                        
                        }                    
                        if(!gas){ 
                            $('#pro-gas').hide();
                          $(".gas_cons_pr").removeAttr('required');
                        }
                      if(gas=="" && electricity=="" ){                      
                        $("#submit_pr").attr('disabled',true);                     
                      }else{
                           $("#submit_pr").removeAttr('disabled');
                      } 
            });                
                
            $('#cur_invoice').keyup(function(event){
                
                        // var keycode = (event.keyCode ? event.keyCode : event.which);
                        // if(keycode == '13'){
                            
                            var currentValue=$('#cur_invoice').val();
                              var cur_invoice_moth_year=$('#cur_invoice_moth_year').val();
                            
                         
                          
                                
                                
                               
                                
                                
        var po = $('#po').val();

        var year = [];
        $.each($("input[name='year']:checked"), function() {
            year.push($(this).val());
        });

        var price_type = [];
        $.each($("input[name='price_type']:checked"), function() {
            price_type.push($(this).val());
        });

        var green = [];
        $.each($("input[name='green']:checked"), function() {
            green.push($(this).val());
        });

        var green_score = [];
        $.each($("input[name='green_score']:checked"), function() {
            green_score.push($(this).val());
        });

        var ser_lim = [];
        $.each($("input[name='ser_lim']:checked"), function() {
            ser_lim.push($(this).val());
        });

        var disc = [];
        $.each($("input[name='disc']:checked"), function() {
            disc.push($(this).val());
        });



        $.ajax({
            url: '/get-data',
            type: 'GET',
            data: {
                'year': year,
                'po': po,
                'price_type': price_type,
                'green': green,
                'green_score': green_score,
                'ser_lim': ser_lim,
                'disc': disc,
                'currentValue':currentValue,
                'cur_invoice_moth_year':cur_invoice_moth_year
            },
            beforeSend: function() {

                // $("#main-data").hide();
                $("#ajax-loader").show();

            },
            complete: function() {

                // $("#main-data").show();
                $("#ajax-loader").hide();

            },
            success: function(data) {
                $('#packages').html(data);
                var count = $('.count').val();
                $('.tot_count').html(count);
                $('#Tpages').html(count);
                var pages = Math.ceil(count / 7);
                $('#totalPages').val(pages);
                $('#currentPage').val(1);

                if (pages == 1 || pages == 0) {
                    $('#hideload').hide();
                } else {
                    $('#hideload').show();
                }
                
               
            },
            error: function(e) {


            }
        });
                                
                                
                            
                            
                          
                        // }
                    
                    // var inv_price=$(this).val();                   
                    // var es=$('#es').val();                    
                    // if(es=='month'){                        
                    //         $('.month_savings').css('display','block');
                    //         $('.year_savings').css('display','none');
                    //         var inputs = $(".get_month_val");
                    //         for(var i = 0; i < inputs.length; i++){
                    //         var s=i+1;
                    //         var save=inv_price-$(inputs[i]).val();
                    //         var sepNum=save.toLocaleString('de-DE');
                    //         $('.save_val_month'+s).html(sepNum);
                    //         var num = (inv_price-$(inputs[i]).val()/100).toFixed(2);
                    //         $('.pri_save'+s).val(sepNum);                           
                    //         }
                    // }                    
                    // if(es=='year'){ 
                    //         $('.year_savings').css('display','block');
                    //         $('.month_savings').css('display','none');
                    //         var inputs = $(".get_year_val");
                    //         for(var i =0 ; i < inputs.length; i++){
                    //         var s=i+1;
                    //         var save=inv_price-$(inputs[i]).val();
                    //         var sepNum=save.toLocaleString('de-DE');
                    //         $('.save_val_year'+s).html(sepNum);
                    //         var num = (inv_price-$(inputs[i]).val()/100).toFixed(2);
                    //         $('.pri_save'+s).val(sepNum);                           
                    //         }                       
                    // }                    
                    // if(inv_price==""){                        
                    //         $('.month_savings').css('display','none');
                    //         $('.year_savings').css('display','none');                        
                    //  }                    
        });  
                
        $('.meter').change(function(){                    
                    
                   var meterType=$(this).val(); 
                   
                   
                   if(meterType=='single'){
                       
                        $('.single').show();
                        $('.double').hide();
                        $('.single_excl_night').hide();
                        $('.double_excl_night').hide();

                        // $(".consuption1").attr("required",true);
                        // $(".consuption1").addClass("required");
                        
                        
                        // $(".consuption_day_elec1").removeAttr('required');
                        // $(".consuption_day_elec1se").removeAttr('required');
                        // $(".consuption_day_elec1de").removeAttr('required');
                        // $(".consuption_night_elec1").removeAttr('required');
                        // $(".consuption_night_elec1se").removeAttr('required');
                        // $(".consuption_night_elec1de").removeAttr('required');

                        // $(".consuption_excl_night").removeAttr('required');
                        // $(".consuption_excl_nightse").removeAttr('required');
                        // $(".consuption_excl_nightde").removeAttr('required');

                        // $(".consuption1se").removeAttr('required');
                        // $(".consuption1de").removeAttr('required');

                        
                        // $(".consuption1se").removeAttr('required');
                        // $(".consuption1de").removeAttr('required');
                        
                        // 
                        
                        //  $(".consuption_day_elec1").removeClass('required');
                        // $(".consuption_day_elec1se").removeClass('required');
                        // $(".consuption_day_elec1de").removeClass('required');
                        // $(".consuption_night_elec1").removeClass('required');
                        // $(".consuption_night_elec1se").removeClass('required');
                        // $(".consuption_night_elec1de").removeClass('required');

                        // $(".consuption_excl_night").removeClass('required');
                        // $(".consuption_excl_nightse").removeClass('required');
                        // $(".consuption_excl_nightde").removeClass('required');

                        // $(".consuption1se").removeClass('required');
                        // $(".consuption1de").removeClass('required');

                        
                        // $(".consuption1se").removeClass('required');
                        // $(".consuption1de").removeClass('required');
                      
                   }
                   if(meterType=='double'){
                       
                        $('.double').show();
                        $('.single').hide();
                        $('.single_excl_night').hide();
                        $('.double_excl_night').hide();

                        // $(".consuption_day_elec1").attr("required","required");
                        // $(".consuption_night_elec1").attr("required","required");
                        
                        //  $(".consuption_day_elec1").addClass("required");
                        // $(".consuption_night_elec1").addClass("required");
                        
                        
                        
                        // $(".consuption_day_elec1se").removeAttr('required');
                        // $(".consuption_day_elec1de").removeAttr('required');

                        // $(".consuption_night_elec1se").removeAttr('required');
                        // $(".consuption_night_elec1de").removeAttr('required');

                        // $(".consuption_excl_night").removeAttr('required');
                        // $(".consuption_excl_nightse").removeAttr('required');
                        // $(".consuption_excl_nightde").removeAttr('required');

                                              
                        // $(".consuption_excl_night").removeAttr('required');
                        // $(".consuption_excl_nightse").removeAttr('required');
                        // $(".consuption_excl_nightde").removeAttr('required');
                        // $(".consuption1").removeAttr('required');
                        // $(".consuption1se").removeAttr('required');
                        // $(".consuption1de").removeAttr('required');
                        
                        // // 
                        
                        
                        
                        // $(".consuption_day_elec1se").removeClass('required');
                        // $(".consuption_day_elec1de").removeClass('required');

                        // $(".consuption_night_elec1se").removeClass('required');
                        // $(".consuption_night_elec1de").removeClass('required');

                        // $(".consuption_excl_night").removeClass('required');
                        // $(".consuption_excl_nightse").removeClass('required');
                        // $(".consuption_excl_nightde").removeClass('required');

                                              
                        // $(".consuption_excl_night").removeClass('required');
                        // $(".consuption_excl_nightse").removeClass('required');
                        // $(".consuption_excl_nightde").removeClass('required');
                        // $(".consuption1").removeClass('required');
                        // $(".consuption1se").removeClass('required');
                        // $(".consuption1de").removeClass('required');
                   }
                   if(meterType=='double_excl_night'){
                       
                        $('.double').hide();
                        $('.single').hide();
                        $('.double_excl_night').show();
                        $('.single_excl_night').hide();
                        
                //         $(".consuption_day_elec1de").attr("required","required");
                //         $(".consuption_night_elec1de").attr("required","required");
                //         $(".consuption1de").attr("required","required");
                        
                //          $(".consuption_day_elec1de").addClass("required");
                //         $(".consuption_night_elec1de").addClass("required");
                //         $(".consuption1de").addClass("required");
                        
                        
                        

                //         $(".consuption_day_elec1").removeAttr('required');
                //         $(".consuption_night_elec1").removeAttr("required"); 
                        
                //         $(".consuption_day_elec1se").removeAttr('required');
                        
                //         $(".consuption_night_elec1").removeAttr('required');
                //         $(".consuption_night_elec1se").removeAttr('required');
                        
                //         $(".consuption_excl_night").removeAttr('required');
                //         $(".consuption1").removeAttr('required');
                //         $(".consuption1se").removeAttr('required');
                        
                //         // 
                        
                //         $(".consuption_day_elec1").removeClass('required');
                //         $(".consuption_night_elec1").removeClass("required"); 
                        
                //         $(".consuption_day_elec1se").removeClass('required');
                        
                //         $(".consuption_night_elec1").removeClass('required');
                //         $(".consuption_night_elec1se").removeClass('required');
                        
                //         $(".consuption_excl_night").removeClass('required');
                //         $(".consuption1").removeClass('required');
                //         $(".consuption1se").removeClass('required');
                        
                   }
                   
                    if(meterType=='single_excl_night'){
                       
                        $('.double').hide();
                        $('.single').hide();
                        $('.single_excl_night').show();
                        $('.double_excl_night').hide();
                        
                //         $(".consuption1se").attr("required","required");
                //         $(".consuption_excl_nightse").attr("required","required");
                        
                //          $(".consuption1se").addClass("required");
                //         $(".consuption_excl_nightse").addClass("required");
                        
                        
                //         $(".consuption_day_elec1").removeAttr('required');
                //         $(".consuption_day_elec1se").removeAttr('required');
                //         $(".consuption_day_elec1de").removeAttr('required');

                //         $(".consuption_night_elec1").removeAttr('required'); 
                //         $(".consuption_night_elec1se").removeAttr('required');
                //         $(".consuption_night_elec1de").removeAttr('required');
                //         $(".consuption_excl_night").removeAttr('required'); 
                        
                //         $(".consuption_excl_nightde").removeAttr('required'); 
                //         $(".consuption1").removeAttr('required');
                        
                //         $(".consuption1de").removeAttr('required');
                //         // 
                        
                //         $(".consuption_day_elec1").removeClass('required');
                //         $(".consuption_day_elec1se").removeClass('required');
                //         $(".consuption_day_elec1de").removeClass('required');

                //         $(".consuption_night_elec1").removeClass('required'); 
                //         $(".consuption_night_elec1se").removeClass('required');
                //         $(".consuption_night_elec1de").removeClass('required');
                //         $(".consuption_excl_night").removeClass('required'); 
                        
                //         $(".consuption_excl_nightde").removeClass('required'); 
                //         $(".consuption1").removeClass('required');
                        
                //         $(".consuption1de").removeClass('required');
                        
                        
                   }
                    
            });
            
            
              $('.meterp').change(function(){                    
                    
                   var meterType=$(this).val(); 
                   
                   
                   if(meterType=='single'){
                       
                        $('.single').show();
                        $('.double').hide();
                        $('.single_excl_night').hide();
                        $('.double_excl_night').hide();

                        // $(".consuption1").attr("required",true);
                        // $(".consuption1").addClass("required");
                        
                        
                        // $(".consuption_day_elec1").removeAttr('required');
                        // $(".consuption_day_elec1se").removeAttr('required');
                        // $(".consuption_day_elec1de").removeAttr('required');
                        // $(".consuption_night_elec1").removeAttr('required');
                        // $(".consuption_night_elec1se").removeAttr('required');
                        // $(".consuption_night_elec1de").removeAttr('required');

                        // $(".consuption_excl_night").removeAttr('required');
                        // $(".consuption_excl_nightse").removeAttr('required');
                        // $(".consuption_excl_nightde").removeAttr('required');

                        // $(".consuption1se").removeAttr('required');
                        // $(".consuption1de").removeAttr('required');

                        
                        // $(".consuption1se").removeAttr('required');
                        // $(".consuption1de").removeAttr('required');
                        
                        // 
                        
                        //  $(".consuption_day_elec1").removeClass('required');
                        // $(".consuption_day_elec1se").removeClass('required');
                        // $(".consuption_day_elec1de").removeClass('required');
                        // $(".consuption_night_elec1").removeClass('required');
                        // $(".consuption_night_elec1se").removeClass('required');
                        // $(".consuption_night_elec1de").removeClass('required');

                        // $(".consuption_excl_night").removeClass('required');
                        // $(".consuption_excl_nightse").removeClass('required');
                        // $(".consuption_excl_nightde").removeClass('required');

                        // $(".consuption1se").removeClass('required');
                        // $(".consuption1de").removeClass('required');

                        
                        // $(".consuption1se").removeClass('required');
                        // $(".consuption1de").removeClass('required');
                      
                   }
                   if(meterType=='double'){
                       
                        $('.double').show();
                        $('.single').hide();
                        $('.single_excl_night').hide();
                        $('.double_excl_night').hide();

                        // $(".consuption_day_elec1").attr("required","required");
                        // $(".consuption_night_elec1").attr("required","required");
                        
                        //  $(".consuption_day_elec1").addClass("required");
                        // $(".consuption_night_elec1").addClass("required");
                        
                        
                        
                        // $(".consuption_day_elec1se").removeAttr('required');
                        // $(".consuption_day_elec1de").removeAttr('required');

                        // $(".consuption_night_elec1se").removeAttr('required');
                        // $(".consuption_night_elec1de").removeAttr('required');

                        // $(".consuption_excl_night").removeAttr('required');
                        // $(".consuption_excl_nightse").removeAttr('required');
                        // $(".consuption_excl_nightde").removeAttr('required');

                                              
                        // $(".consuption_excl_night").removeAttr('required');
                        // $(".consuption_excl_nightse").removeAttr('required');
                        // $(".consuption_excl_nightde").removeAttr('required');
                        // $(".consuption1").removeAttr('required');
                        // $(".consuption1se").removeAttr('required');
                        // $(".consuption1de").removeAttr('required');
                        
                        // // 
                        
                        
                        
                        // $(".consuption_day_elec1se").removeClass('required');
                        // $(".consuption_day_elec1de").removeClass('required');

                        // $(".consuption_night_elec1se").removeClass('required');
                        // $(".consuption_night_elec1de").removeClass('required');

                        // $(".consuption_excl_night").removeClass('required');
                        // $(".consuption_excl_nightse").removeClass('required');
                        // $(".consuption_excl_nightde").removeClass('required');

                                              
                        // $(".consuption_excl_night").removeClass('required');
                        // $(".consuption_excl_nightse").removeClass('required');
                        // $(".consuption_excl_nightde").removeClass('required');
                        // $(".consuption1").removeClass('required');
                        // $(".consuption1se").removeClass('required');
                        // $(".consuption1de").removeClass('required');
                   }
                   if(meterType=='double_excl_night'){
                       
                        $('.double').hide();
                        $('.single').hide();
                        $('.double_excl_night').show();
                        $('.single_excl_night').hide();
                        
                //         $(".consuption_day_elec1de").attr("required","required");
                //         $(".consuption_night_elec1de").attr("required","required");
                //         $(".consuption1de").attr("required","required");
                        
                //          $(".consuption_day_elec1de").addClass("required");
                //         $(".consuption_night_elec1de").addClass("required");
                //         $(".consuption1de").addClass("required");
                        
                        
                        

                //         $(".consuption_day_elec1").removeAttr('required');
                //         $(".consuption_night_elec1").removeAttr("required"); 
                        
                //         $(".consuption_day_elec1se").removeAttr('required');
                        
                //         $(".consuption_night_elec1").removeAttr('required');
                //         $(".consuption_night_elec1se").removeAttr('required');
                        
                //         $(".consuption_excl_night").removeAttr('required');
                //         $(".consuption1").removeAttr('required');
                //         $(".consuption1se").removeAttr('required');
                        
                //         // 
                        
                //         $(".consuption_day_elec1").removeClass('required');
                //         $(".consuption_night_elec1").removeClass("required"); 
                        
                //         $(".consuption_day_elec1se").removeClass('required');
                        
                //         $(".consuption_night_elec1").removeClass('required');
                //         $(".consuption_night_elec1se").removeClass('required');
                        
                //         $(".consuption_excl_night").removeClass('required');
                //         $(".consuption1").removeClass('required');
                //         $(".consuption1se").removeClass('required');
                        
                //   }
                   
                //     if(meterType=='single_excl_night'){
                       
                //         $('.double').hide();
                //         $('.single').hide();
                //         $('.single_excl_night').show();
                //         $('.double_excl_night').hide();
                        
                //         $(".consuption1se").attr("required","required");
                //         $(".consuption_excl_nightse").attr("required","required");
                        
                //          $(".consuption1se").addClass("required");
                //         $(".consuption_excl_nightse").addClass("required");
                        
                        
                //         $(".consuption_day_elec1").removeAttr('required');
                //         $(".consuption_day_elec1se").removeAttr('required');
                //         $(".consuption_day_elec1de").removeAttr('required');

                //         $(".consuption_night_elec1").removeAttr('required'); 
                //         $(".consuption_night_elec1se").removeAttr('required');
                //         $(".consuption_night_elec1de").removeAttr('required');
                //         $(".consuption_excl_night").removeAttr('required'); 
                        
                //         $(".consuption_excl_nightde").removeAttr('required'); 
                //         $(".consuption1").removeAttr('required');
                        
                //         $(".consuption1de").removeAttr('required');
                //         // 
                        
                //         $(".consuption_day_elec1").removeClass('required');
                //         $(".consuption_day_elec1se").removeClass('required');
                //         $(".consuption_day_elec1de").removeClass('required');

                //         $(".consuption_night_elec1").removeClass('required'); 
                //         $(".consuption_night_elec1se").removeClass('required');
                //         $(".consuption_night_elec1de").removeClass('required');
                //         $(".consuption_excl_night").removeClass('required'); 
                        
                //         $(".consuption_excl_nightde").removeClass('required'); 
                //         $(".consuption1").removeClass('required');
                        
                //         $(".consuption1de").removeClass('required');
                        
                        
                   }
                    
            });
                
                
            $('.meter_pr_1').change(function(){                    
                    
                   var meterType=$(this).val(); 
                   if(meterType=='single'){
                      
                        $('.single_pr1').show();
                        $('.double_pr1').hide();
                        $('.excl_night_pr1').hide();

                        $("#consuption_day_elecpr1").removeAttr('required');
                        $("#consuption_night_elecpr1").removeAttr('required');

                        $("#consuption_excl_nightpr1").removeAttr('required');
                        $("#consuptionpr1").attr("required","required");
                      
                   }
                   if(meterType=='double'){
                       
                        $('.double_pr1').show();
                        $('.single_pr1').hide();
                        $('.excl_night_pr1').hide();

                        $("#consuption_day_elecpr1").attr("required","required");
                        $("#consuption_night_elecpr1").attr("required","required");                      
                        $("#consuption_excl_nightpr1").removeAttr('required');
                        $("#consuptionpr1").removeAttr('required');
                   }
                   if(meterType=='excl_night'){
                       
                        $('.double_pr1').hide();
                        $('.single_pr1').hide();
                        $('.excl_night_pr1').show();

                        $("#consuption_day_elecpr1").removeAttr('required');
                        $("#consuption_night_elecpr1").removeAttr('required');                      
                        $("#consuption_excl_nightpr1").attr("required","required"); 
                        $("#consuptionpr1").removeAttr('required');
                   }
                    
            }); 
                
            $('.meter_type2').change(function(){                    
                    
                   var meterType=$(this).val(); 
                   if(meterType=='single'){                      
                    $('.single_pr2').show();
                    $('.double_pr2').hide();
                    $('.excl_night_pr2').hide();
                    $("#consuption_day_elec2").removeAttr('required');
                    $("#consuption_night_elec2").removeAttr('required');
                    $("#consuption_excl_night2").removeAttr('required');
                    $("#consuption2").attr("required","required");
                      
                   }
                   if(meterType=='double'){
                       
                    $('.double_pr2').show();
                    $('.single_pr2').hide();
                    $('.excl_night_pr2').hide();
                    $("#consuption_day_elec2").attr("required","required");
                    $("#consuption_night_elec2").attr("required","required");                      
                    $("#consuption_excl_night2").removeAttr('required');
                    $("#consuption2").removeAttr('required');
                   }
                   if(meterType=='excl_night'){
                       
                    $('.double_pr2').hide();
                    $('.single_pr2').hide();
                    $('.excl_night_pr2').show();
                    $("#consuption_day_elec2").removeAttr('required');
                    $("#consuption_night_elec2").removeAttr('required');                      
                    $("#consuption_excl_night2").attr("required","required"); 
                    $("#consuption2").removeAttr('required');
                   }
                    
            });                
                
            $('.meter_pr_2').change(function(){                    
                    
                   var meterType=$(this).val(); 
                   if(meterType=='single'){                      
                    $('.single_pr2').show();
                    $('.double_pr2').hide();
                    $('.excl_night_pr2').hide();
                    $("#consuption_day_elecpr2").removeAttr('required');
                    $("#consuption_night_elecpr2").removeAttr('required');
                    $("#consuption_excl_nightpr2").removeAttr('required');
                    $("#consuptionpr2").attr("required","required");
                      
                   }
                   if(meterType=='double'){
                       
                    $('.double_pr2').show();
                    $('.single_pr2').hide();
                    $('.excl_night_pr2').hide();
                    $("#consuption_day_elecpr2").attr("required","required");
                    $("#consuption_night_elecpr2").attr("required","required");                      
                    $("#consuption_excl_nightpr2").removeAttr('required');
                    $("#consuptionpr2").removeAttr('required');

                   }
                   if(meterType=='excl_night'){                       
                    $('.double_pr2').hide();
                    $('.single_pr2').hide();
                    $('.excl_night_pr2').show();
                    $("#consuption_day_elecpr2").removeAttr('required');
                    $("#consuption_night_elecpr2").removeAttr('required');                      
                    $("#consuption_excl_nightpr2").attr("required","required"); 
                    $("#consuptionpr2").removeAttr('required');
                   }
                    
            }); 
                
            $(".widget").click(function(){                      
                    }).find('li').click(function(e){                     
                         var chk=$(this).hasClass("active-bold");
                             if(chk==true){
                                 $(this).removeClass('active-bold');
                             }else{ 
                                 $(this).addClass('active-bold');
                             }                     
            });


           
                
    });    
                
           
    
    jQuery(document).ready(function() { 
        
        
  // municipality check
        
          var po=$('.po').val();
          var mun=$('.mun').val();
          
          
         
            $('.po-error-msg').hide(); 
            $('.po-load').show();
            $.ajax({
                url: '{{url('check-po')}}',
                type: 'GET',
                data: {'po':po,'mun':mun},
                beforeSend: function() {

                // $("#main-data").hide();
                $('.po-error-msg').hide();
                 $(".po-loader").show();
                 

            },
            complete: function() {
                $(".po-loader").hide();
                // $("#main-data").show();
                // $("#ajax-loader").hide();

            },
                success: function(data) {                    
                  //  console.log(data['available']);                
              if(data['available']=='false'){                  
                    if(po==""){
                    $('.po-error-msg').hide(); 
                    $('#submit1').prop('disabled', false);
                    }else{

                    $('.po-error-msg').show();
                    $('#submit1').prop('disabled', true);
                    $('#submit_pr').prop('disabled', true);                
                    }

                    $('#sub-po').html('');
                    $('.sub-po').html('');
              }else{
                    if(data['sub']=='true'){                         
                        $('#sub-po').html(data['sub_po']); 
                        $('.sub-po').html(data['sub_po']);
                    }else{   
                        $('#sub-po').html('');                      
                    }
                        $('.po-error-msg').hide();
                        $('#submit1').prop('disabled', false);
                        $('#submit_pr').prop('disabled', false);                   
              }
                
                $('.po-load').hide();
                },
                error: function(e) {
                // console.log(e.message);
                }
            });
        
        // municipality -check end
        
        
        $('#dec_pro').on('change', function() {
        var val = this.checked ? this.value : '';
      
         if(val){
          $('#dec_pro_data').show(); 
            }else{
                
                $('#dec_pro_data').hide();
                $('.capacity_decen_pro').val("0");
                
            }
        });
        
        $('#dec_pro1').on('change', function() {
        var val = this.checked ? this.value : '';
      
         if(val){
          $('#dec_pro_data1').show(); 
            }else{
                
                $('#dec_pro_data1').hide();
                $('.capacity_decen_pro1').val("0");
                
            }
        });
        
        // $('#dec_pro').change(function(){
            
        //     var dec_pro = $("input[id='dec_pro']:checked").val();
        //     alert(dec_pro);
            
        //     if(dec_pro=='true'){
        //   $('#dec_pro_data').show(); 
        //     }else{
                
        //         $('#dec_pro_data').hide();  
        //     }
            
        // });

      $('.po').keyup(function(event){        
            var po=$(this).val();
            $('.po-error-msg').hide(); 
            $('.po-load').show();
            $.ajax({
                url: '{{url('check-po')}}',
                type: 'GET',
                data: {'po':po},
                beforeSend: function() {

                // $("#main-data").hide();
                $('.po-error-msg').hide();
                 $(".po-loader").show();
                 

            },
            complete: function() {
                $(".po-loader").hide();
                // $("#main-data").show();
                // $("#ajax-loader").hide();

            },
                success: function(data) {                    
                  //  console.log(data['available']);                
              if(data['available']=='false'){                  
                    if(po==""){
                    $('.po-error-msg').hide(); 
                    $('#submit1').prop('disabled', false);
                    }else{

                    $('.po-error-msg').show();
                    $('#submit1').prop('disabled', true);
                    $('#submit_pr').prop('disabled', true);                
                    }

                    $('#sub-po').html('');
                    $('.sub-po').html('');
              }else{
                    if(data['sub']=='true'){                         
                        $('#sub-po').html(data['sub_po']); 
                        $('.sub-po').html(data['sub_po']);
                    }else{   
                        $('#sub-po').html('');  
                        $('.sub-po').html('');
                    }
                        $('.po-error-msg').hide();
                        $('#submit1').prop('disabled', false);
                        $('#submit_pr').prop('disabled', false);                   
              }
                
                $('.po-load').hide();
                },
                error: function(e) {
                // console.log(e.message);
                }
            });  
        
        
         }); 

       $("[rel=tooltip]").tooltip({ placement: 'top'});
       
       
       
       $('#submit_pr').click(function(e){

        //   $('.required').each(function(e) {
        //   if($(this).val() == '') {
        //   $(this).css('background-color' , 'rgb(245, 158, 158)');
        //   e.preventDefault();
          
        //               }
        //   });
           
           var electricity = $("input[name='electricity_pr1p']:checked").val();
           var gas = $("input[name='gasp']:checked").val();
           
           
             var postalcode=$('.po').val();
            
            
            var includeE=$('#electricity_pr1p').val();
            
            var meterType=$('.meterp').val();
            
            var single=$('.consuption1p').val();
            
            var day=$('.consuption_day_elec1p').val();
            var night=$('.consuption_night_elec1p').val();
            
            var single_excl=$('.consuption1sep').val();
            var excl_night_single=$('.consuption_excl_nightsep').val();
            
            
            var day_excl=$('.consuption_day_elec1dep').val();
            var night_excl=$('.consuption_night_elec1dep').val();
            var excl_night_double=$('.consuption_excl_nightdep').val();
            
            var includeG=$('#gas_p').val();
            var gas_cunsum=$('#consumtion_gas1p').val();
            
        //         var electricity = $("input[name='electricity']:checked").val();
        //   var gas = $("input[name='gas']:checked").val();  
            
            // .required-red
            
            if(!postalcode){
                
                $('.por').addClass('required-red');
                e.preventDefault();
            }
            
            
            if(electricity=='true'){
                
                // if(!meterType && includeE=='true'){
                    
                //     $('.meterr').addClass('required-red');
                //          e.preventDefault();
                    
                //     }
                    
                    if(meterType=='single' && electricity=='true'){
                        
                        if(!single){
                            
                             $('.consuption1rp').addClass('required-red');
                            e.preventDefault();
                            
                        }
                        
                    }
                   
                    if(meterType=='double' && electricity=='true'){
                        
                        if(!day){
                            
                             $('.consuption_day_elec1rp').addClass('required-red');
                            e.preventDefault();
                            
                        }
                        if(!night){
                            
                             $('.consuption_night_elec1rp').addClass('required-red');
                            e.preventDefault();
                            
                        }
                        
                    }
                    
                    if(meterType=='single_excl_night'  && electricity=='true'){
                        
                        if(!single_excl){
                            
                             $('.consuption1serp').addClass('required-red');
                            e.preventDefault();
                            
                        }
                        if(!excl_night_single){
                            
                             $('.consuption_excl_nightserp').addClass('required-red');
                            e.preventDefault();
                            
                        }
                        
                    }
                    
                     if(meterType=='double_excl_night'  && electricity=='true'){
                        
                        if(!day_excl){
                            
                             $('.consuption_day_elec1derp').addClass('required-red');
                            e.preventDefault();
                            
                        }
                        if(!night_excl){
                            
                             $('.consuption_night_elec1derp').addClass('required-red');
                            e.preventDefault();
                            
                        }
                        if(!excl_night_double){
                            
                             $('.consuption_excl_nightderp').addClass('required-red');
                            e.preventDefault();
                            
                        }
                        
                    }
                
                
                
            }
            
           
            if(gas=='true'){
                
                if(!gas_cuns=="" && gas=='true'){
                    $('.consumtion_gas1rp').addClass('required-red');
                            e.preventDefault();
                    
                }
                
                
                
            }
           
        //   if(electricity!='electricity'){
               
        //       $(".meter").removeAttr('required');
        //       $(".consuption_day_elec1").removeAttr('required');
        //       $(".consuption_night_elec1").removeAttr('required');
        //       $(".consuption1").removeAttr('required');
        //       $(".consuption1se").removeAttr('required');
        //       $(".consuption_day_elec1de").removeAttr('required');
        //       $(".consuption_night_elec1de").removeAttr('required');
        //       $(".consuption_excl_nightse").removeAttr('required');
        //       $(".consuption_excl_nightde").removeAttr('required');
        //       $(".consuption_excl_nightde").removeAttr('required');
        //       $(".consuption_excl_nightde").removeAttr('required');
              
        //       $(".consuption_day_elec1").removeAttr('required');
              
        //       $(".consuption_day_elec1").removeClass('required');
        //       $(".consuption_night_elec1").removeClass('required');
        //       $(".consuption1").removeClass('required');
        //       $(".consuption1se").removeClass('required');
        //       $(".consuption_day_elec1de").removeClass('required');
        //       $(".consuption_night_elec1de").removeClass('required');
        //       $(".consuption_excl_nightse").removeClass('required');
        //       $(".consuption_excl_nightde").removeClass('required');
        //       $(".consuption_excl_nightde").removeClass('required');
        //       $(".consuption_excl_nightde").removeClass('required');

        //   }else{
        //     $(".meter").attr("required","required");
        //   }
           
        //   var po=$('.po').val();
           
        //   if(!po){               
        //      $(".po").attr("required","required");
        //   }       
          
        });


        $('#submit1').click(function(e){
            
            
            var postalcode=$('.po').val();
            
            
            var includeE=$('#electricity').val();
            
            var meterType=$('.meter').val();
            
            var single=$('.consuption1 ').val();
            
            var day=$('.consuption_day_elec1').val();
            var night=$('.consuption_night_elec1').val();
            
            var single_excl=$('.consuption1se').val();
            var excl_night_single=$('.consuption_excl_nightse').val();
            
            
            var day_excl=$('.consuption_day_elec1de').val();
            var night_excl=$('.consuption_night_elec1de').val();
            var excl_night_double=$('.consuption_excl_nightde').val();
            
            var includeG=$('#gas').val();
            var gas_cunsum=$('#consumtion_gas1').val();
            
                var electricity = $("input[name='electricity']:checked").val();
          var gas = $("input[name='gas']:checked").val();  
            
            // .required-red
            
            if(!postalcode){
                
                $('.por').addClass('required-red');
                e.preventDefault();
            }
            
            
            if(electricity=='true'){
                
                // if(!meterType && includeE=='true'){
                    
                //     $('.meterr').addClass('required-red');
                //          e.preventDefault();
                    
                //     }
                   
                    if(meterType=='single' && electricity=='true'){
                        
                        if(!single){
                            
                             $('.consuption1r').addClass('required-red');
                            e.preventDefault();
                            
                        }
                        
                    }
                   
                    if(meterType=='double' && electricity=='true'){
                        
                        if(!day){
                            
                             $('.consuption_day_elec1r').addClass('required-red');
                            e.preventDefault();
                            
                        }
                        if(!night){
                            
                             $('.consuption_night_elec1r').addClass('required-red');
                            e.preventDefault();
                            
                        }
                        
                    }
                    
                    if(meterType=='single_excl_night'  && electricity=='true'){
                        
                        if(!single_excl){
                            
                             $('.consuption1ser').addClass('required-red');
                            e.preventDefault();
                            
                        }
                        if(!excl_night_single){
                            
                             $('.consuption_excl_nightser').addClass('required-red');
                            e.preventDefault();
                            
                        }
                        
                    }
                    
                     if(meterType=='double_excl_night'  && electricity=='true'){
                        
                        if(!day_excl){
                            
                             $('.consuption_day_elec1der').addClass('required-red');
                            e.preventDefault();
                            
                        }
                        if(!night_excl){
                            
                             $('.consuption_night_elec1der').addClass('required-red');
                            e.preventDefault();
                            
                        }
                        if(!excl_night_double){
                            
                             $('.consuption_excl_nightder').addClass('required-red');
                            e.preventDefault();
                            
                        }
                        
                    }
                
                
                
            }
            
           
            if(gas==true){
                
                if(!gas_cuns=="" && gas==true){
                    $('.consumtion_gas1r').addClass('required-red');
                            e.preventDefault();
                    
                }
                
                
                
            }
           
            
            
           
            
            

           
        //   $('.required').each(function(e) {
        //   if($(this).val() == '') {
        //   $(this).css('background-color' , 'rgb(245, 158, 158)');
        //   e.preventDefault();
          
        //               }
        //   });
        //   var electricity = $("input[name='electricity']:checked").val();
        //   var gas = $("input[name='gas']:checked").val();           
        //   if(electricity!='electricity'){
               
        //       $(".meter").removeAttr('required'); 
        //       $(".consuption_day_elec1").removeAttr('required');
        //       $(".consuption_night_elec1").removeAttr('required');
        //       $(".consuption1").removeAttr('required');
        //       $(".consuption1se").removeAttr('required');
        //       $(".consuption_day_elec1de").removeAttr('required');
        //       $(".consuption_night_elec1de").removeAttr('required');
        //       $(".consuption_excl_nightde").removeAttr('required');
        //       $(".consuption_excl_nightde").removeAttr('required');
        //       $(".consuption_excl_nightde").removeAttr('required');

        //   }else{
        //     $(".meter").attr("required","required");
        //   }
        //   var po=$('.po').val();
        //   var email=$('.email').val();
        //   if(po==""){
               
        //      $(".po").attr("required","required");   
               
        //   }       
          
         });
       
       
       
    
    });
    </script>
    
    
    
     <script type="text/javascript">
       // var form = document.getElementById('tabform1'); // form has to have ID: <form id="formID">
//form.noValidate = true;
//form.addEventListener('submit', function(event) { // listen for form submitting
      //  if (!event.target.checkValidity()) {
       //     event.preventDefault(); // dismiss the default functionality
           // alert('Please, fill the form'); // error message
       //    $('#submit1_msg').show();
      //  }
   // }, false);


    </script>
     <script type="text/javascript">
//         var form = document.getElementById('tabform2'); // form has to have ID: <form id="formID">
// form.noValidate = true;
// form.addEventListener('submit', function(event) { // listen for form submitting
//         if (!event.target.checkValidity()) {
//             event.preventDefault(); // dismiss the default functionality
//             //alert('Please, fill the form'); // error message 
//              $('#submit_pr_msg').show();
//         }
//     }, false);


    </script>
    
    <script>
    function myFunctionCalculate() {
      var x,text;
      x = document.getElementById("postId").value;
      
      if (x == "") {
        text = "Postcode is verplicht";
        document.getElementById("calculationMessage").innerHTML = text;
        document.getElementById("calculationMessage").style.display = "block";
        return false;
      }  
      
    }
    var input = document.getElementById('postId');
    var div = document.getElementById('calculationMessage');
    input.addEventListener('keypress', function() {
    	div.style.display = "none";
    });
    
    </script>
    
    <script>
    
    function myFunctionCalculate1() {
        var y,text;
        y = document.getElementById("post_pr").value;
        if (y == "") {
        text = "Postcode is verplicht";
        document.getElementById("calculationResult").innerHTML = text;
        document.getElementById("calculationResult").style.display = "block";
        return false;
      } 
    }
    
    var input = document.getElementById('post_pr');
    var div = document.getElementById('calculationResult');
    input.addEventListener('keypress', function() {
    	div.style.display = "none";
    });
    $('.modal').on('shown.bs.modal', function (e) {
  $('html').addClass('freezePage'); 
  $('body').addClass('freezePage');
});
$('.modal').on('hidden.bs.modal', function (e) {
  $('html').removeClass('freezePage');
  $('body').removeClass('freezePage');
});

    $(document).on('change','#supplier_res_e', function(){ 
            var esupply = $(this).val();
            console.log(esupply);
            if ($(this).hasClass('watermark') == false) {
                 $('#supplier_res_g').removeClass('watermark').val(esupply);
                
            }
    });
    $(document).on('change','#supplier_prof_e', function(){ 
            var supplyp = $(this).val();
            console.log(supplyp);
            if ($(this).hasClass('watermark') == false) {
                 $('#supplier_prof_g').removeClass('watermark').val(supplyp);
                
            }
    });
    
    // reset to default values
    // $(document).on('click','#reset', function(){ 
    //         $(':input','#tabform1')
    //         .not(':button, :submit, :reset, :hidden')
    //         .val('')
    //         .removeAttr('selected');
            
    //         $('.consuption1r').show();
    //         $('.single').show();
    //         document.getElementById("consuption1").defaultValue = 3500;
    //         document.getElementById("consumtion_gas1").defaultValue = 25000;
    //         document.getElementById("resident-meter").defaultValue = 'Enkelvoudig';
    //         // $("#resident-meter option[selected]").removeAttr("selected");
    //         $('.double').hide();
    //         $('#sub-po').hide();
    //         $('.double_excl_night').hide();
    //         $('.single_excl_night').hide();
            
    //         // return this.defaultValue;
    // });
    
    // $(document).on('click','#reset', function(){        
            
    //         $.ajax({
    //             url: '{{url('')}}',
    //             type: 'GET',
    //             data: {'po':po},
    //             success: function(data) {                    
    //               //  console.log(data['available']);                
    //             }
    //             error: function(e) {
    //                  console.log(e.message);
    //             }
    //         });  
        
        
    //      }); 

    // jQuery(document).ready(function() {
    //     $('#promo').click(function() {
    //         $.ajax({
    //         url: '/discount-active',
    //         type: 'GET',
    //         data: {
    //             'year': year,
    //             'po': po,
    //             'price_type': price_type,
    //             'green': green,
    //             'green_score': green_score,
    //             'ser_lim': ser_lim,
    //             'disc': promo,
    //             'refresh': '1'
    //         },
    //         beforeSend: function() {

    //             $("#main-data").hide();
    //             $("#loading").show();

    //         },
    //         complete: function() {

    //             $("#main-data").show();
    //             $("#loading").hide();

    //         },
    //         success: function(data) {
    //             alert('sucess');
    //             // $('#seperated').css('display', 'none');
    //             // $('#pro-select').html("");
    //             // $('.bundle').addClass("active");
    //             // $('.seperate').removeClass("active");
    //             // $('#pills-home').addClass("active");
    //             // $("#pills-home-tab").addClass('active');
    //             // $('#packages').html(data);
    //             // var count = $('.count').val();
    //             // $('.tot_count').html(count);
    //             // $('#Tpages').html(count);
    //             // var pages = Math.ceil(count / 7);
    //             // $('#totalPages').val(pages);
    //             // $('#currentPage').val(1);
    //             // if (pages == 1 || pages == 0) {
    //             //     $('#hideload').hide();
    //             // } else {
    //             //     $('#hideload').show();
    //             // }
    //             // $('.sec-hide').show();
    //             // $('.sec-show').hide();

    //             // console.log(data);
    //         },
    //         error: function(e) {
    //             //   console.log(e.message);
    //         }
    //     });
    //     });
    // });
    
    
    </script>
    