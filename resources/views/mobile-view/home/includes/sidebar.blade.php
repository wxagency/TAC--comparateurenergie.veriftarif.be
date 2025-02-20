<div class="data-sec" data-target="el-1">
    <a data-toggle="modal" data-target="#exampleModal1" class="data_sec_link" style="cursor: pointer;"></a> 
    <h2>@lang('home.Your_Data')</h2>
    <div class="row">
        <div class="col-6">
            <div class="type">
                @php $getParameters=Session::get('getParameters');   @endphp
                <span class="icon"><img src="{{url('images/home.svg')}}"></span>
                <span class="icon_content">
                    <p>@lang('home.Type')</p>
                    <h6 style="text-transform: capitalize">@if($getParameters['parameters']['values']['customer_group']=='residential') @lang('home.residential') @else @lang('home.Professional') @endif</h6>
                </span>
            </div>
        </div>
        <div class="col-6">
            <div class="type">
                <span class="icon"><img src="{{url('images/location.svg')}}"></span>
                <span class="icon_content">
                    <p>@lang('home.Postal_Code')</p>
                    <h6>{{$getParameters['parameters']['values']['postal_code']}}</h6>
                </span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
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
    </div>
    <div class="col-6"></div>
       </div>
        

       
        
      
    <div class="row">
        <div class="col-6">
   @if($getParameters['parameters']['values']['includeG']==1)
            <div class="type">
                <span class="icon"><i class="fas fa-fire"></i></span>
                <span class="icon_content">
                    <p>@lang('home.Gas')</p>
                    <h6><strong>{{round($getParameters['parameters']['values']['usage_gas'])}}</strong> <span class="light-font">kWh/@lang('home.Year')</span> </h6>
                </span>
            </div>
            @endif
    </div>
        <div class="col-6">
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
                                                <li class="nav-item">
                                                    <a class="nav-link @if($getParameters['parameters']['values']['customer_group']=='residential') active @endif" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">@lang('home.Private')</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link @if($getParameters['parameters']['values']['customer_group']=='professional') active @endif" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">@lang('home.Professional')</a>
                                                </li>
                                            </ul>

                                            <div class="tab-content" id="pills-tabContent">

                                                <!--Private tab start-->             

                                                <div class="tab-pane fade show fade show @if($getParameters['parameters']['values']['customer_group']=='residential') active @endif" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                                    <div class="Tabsection1">
                                                        <div class="row">  	
                                                            <div class="col-md-12">
                                                                <form action="{{route('find-packages')}}" method="post" id="tabform1" class="tabform1">
                                                                    {{csrf_field()}}
                                                                    
                                                                     @php $getParameters=Session::get('getParameters');   @endphp
                                                                    <div class="row">
                                                                        
                                                                        <div class="col-lg-12 col-md-12 col-sm-12 top-checkboxs">
                                                                            <div class="checkbox-sec">
                                                                                <label class="container-1">
                                                                                    <input aria-label="first_res" type="checkbox" @if($getParameters['parameters']['values']['first_residence']) ==1) checked @ @endif id="first_res" name="first_res" value="true">
                                                                                    <span class="checkmark"></span>
                                                                                </label>
                                                                            <p> @lang('home.Primary_home')</p>
                                                                            </div>
                                                                        </div> 
                                                                       <div class="col-md-6">
                                                                        <div class="form-group por">  
                                            <label> @lang('home.Postal_Code') <span style="color:red;">*</span></label>
                                            <input type="text" class="po required" name="postal" required="required" value="{{$getParameters['parameters']['values']['postal_code']}}" autocomplete="off" id="postId" ><br>
                                            
                                        </div>
                                                                            <div style="color:red;" id="calculationMessage"></div>
                                                                         <p class="po-error-msg" style="color:red;display:none;" >@lang('home.invalid_post')</p>
                                                                    </div>
                                                                        <div id="sub-po" class="col-md-12">
                                        <input type="hidden" value="{{$getParameters['parameters']['values']['municipality']}}" class="mun"> 
                                   
                                    </div>
                                                                            <!--<div class="col-md-12">-->
                                                                            <!--    <div class="form-group">-->
                                                                            <!--        <label> @lang('home.Family_Size') </label>-->
                                                                            <!--        <select id = "dropList" name="family_size">-->
                                                                            <!--            @if($getParameters['parameters']['values']['residents'])-->
                                                                            <!--            <option value ="{{$getParameters['parameters']['values']['residents']}}">{{$getParameters['parameters']['values']['residents']}}</option>-->
                                                                            <!--            @endif-->
                                                                            <!--            <option value = "1">1</option>-->
                                                                            <!--            <option value = "2">2</option>-->
                                                                            <!--            <option value = "3">3</option>-->
                                                                            <!--            <option value = "4">4</option>-->
                                                                            <!--            <option value = "5">5+</option>-->
                                                                            <!--        </select><br>-->
                                                                            <!--    </div>-->
                                                                            <!--</div>-->
                                                                        
                                                                   
                                                                        <div class="col-lg-12 col-md-12 col-sm-12">
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
                    <label>Niveau d’isolation</label> 
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
         
                        
               <div class="col-lg-12 col-sm-12" >
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                       
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
                   
            </div>
        </div>
        <div class="col-lg-12 col-sm-12 ">
            <div class="row double" @if($getParameters['parameters']['values']['meter_type']=='double')   @else  style="display:none;"  @endif>
               <div class="col-md-6">
                    <div class="form-group consuption_day_elec1r">    
                        <label> @lang('home.Consumption_Day') <span style="color:red;">*</span></label>
                        <input type="number" id="consuption_day_elec1" @if($getParameters['parameters']['values']['usage_day']==0) value="" @else value="{{$getParameters['parameters']['values']['usage_day']}}" @endif class="consuption_day_elec1 @if($getParameters['parameters']['values']['meter_type']=='double')  @else required @endif" autocomplete="off" min="0" name="consuption_day_elec1" ><br>
                    </div>
                </div> 
                <div class="col-md-6">
                    <div class="form-group consuption_night_elec1r">    
                        <label> @lang('home.Consumption_Night') <span style="color:red;">*</span></label>
                        <input type="number" id="consuption_night_elec1" @if($getParameters['parameters']['values']['usage_night']==0) value="" @else value="{{$getParameters['parameters']['values']['usage_night']}}" @endif class="consuption_night_elec1 @if($getParameters['parameters']['values']['meter_type']=='double')  @else required @endif" autocomplete="off" min="0" name="consuption_night_elec1" ><br>
                    </div>
                </div>    
            </div>
            
             <div class="row single" @if($getParameters['parameters']['values']['meter_type']=='single')   @else  style="display:none;"  @endif>
               <div class="col-md-12">
                    <div class="form-group consuption1r">    
                        <label> @lang('home.Consumption') <span style="color:red;">*</span></label>
                        <input type="number" id="consuption1" @if($getParameters['parameters']['values']['usage_single']==0) value="" @else value="{{$getParameters['parameters']['values']['usage_single']}}" @endif class="consuption1 " autocomplete="off" min="0" name="consuption1" ><br>
                    </div>
                </div> 
                   
            </div>
             
              <div class="row single_excl_night" @if($getParameters['parameters']['values']['meter_type']=='single_excl_night')   @else  style="display:none;"  @endif>
                  
                <div class="col-md-6">
                    <div class="form-group consuption1ser">    
                        <label> @lang('home.Consumption') <span style="color:red;">*</span></label>
                        <input type="number" id="consuption1" @if($getParameters['parameters']['values']['usage_single']==0) value="" @else value="{{$getParameters['parameters']['values']['usage_single']}}" @endif class="consuption1se required" autocomplete="off" min="0" name="consuption1se" ><br>
                    </div>
                </div>
              
                <div class="col-md-6">
                    <div class="form-group consuption_excl_nightser">    
                        <label> @lang('home.Consumption_excl_Night') <span style="color:red;">*</span></label>
                        <input type="number" id="consuption_excl_night" @if($getParameters['parameters']['values']['usage_excl_night']==0) value="" @else value="{{$getParameters['parameters']['values']['usage_excl_night']}}" @endif class="consuption_excl_nightse required" autocomplete="off" min="0" name="consuption_excl_nightse" ><br>
                    </div>
                </div>    
            </div>
            
            <div class="row double_excl_night" @if($getParameters['parameters']['values']['meter_type']=='double_excl_night')   @else  style="display:none;"  @endif>
                  
                 <div class="col-md-6">
                    <div class="form-group consuption_day_elec1der">    
                        <label> @lang('home.Consumption_Day') <span style="color:red;">*</span></label>
                        <input type="number" id="consuption_day_elec1" @if($getParameters['parameters']['values']['usage_day']==0) value="" @else value="{{$getParameters['parameters']['values']['usage_day']}}" @endif class="consuption_day_elec1de required" autocomplete="off" min="0" name="consuption_day_elec1de" ><br>
                    </div>
                </div> 
                <div class="col-md-6">
                    <div class="form-group consuption_night_elec1der">    
                        <label> @lang('home.Consumption_Night') <span style="color:red;">*</span></label>
                        <input type="number" id="consuption_night_elec1" @if($getParameters['parameters']['values']['usage_night']==0) value="" @else value="{{$getParameters['parameters']['values']['usage_night']}}" @endif class="consuption_night_elec1de required" autocomplete="off" min="0" name="consuption_night_elec1de" ><br>
                    </div>
                </div> 
              
                <div class="col-md-12">
                    <div class="form-group consuption_excl_nightder">    
                        <label> @lang('home.Consumption_excl_Night') <span style="color:red;">*</span></label>
                        <input type="number" id="consuption_excl_night" @if($getParameters['parameters']['values']['usage_excl_night']==0) value="" @else value="{{$getParameters['parameters']['values']['usage_excl_night']}}" @endif class="consuption_excl_nightde required" autocomplete="off" min="0" name="consuption_excl_nightde" ><br>
                    </div>
                </div>    
            </div> 
        </div>
                                                           
        <div class="col-lg-12 col-sm-12 radiobtn1-show" >
            <div class="row">
               <div class="col-md-12">
                    <div class="field-wrapper">
                      <label for="@lang('home.Current_Tariff')">@lang('home.Current_Tariff')</label>
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



           <div class="col-md-12">
                <div class="field-wrapper second-field-sec">
                  <label for="@lang('home.Capacity')">@lang('home.Capacity')</label>
                 <select name="capacity_decen_pro" class="capacity_decen_pro" > 
                         
                        @if($getParameters['parameters']['values']['decentralise_production']==true)
                        <option value ="{{$getParameters['parameters']['values']['capacity_decentalise']}}">{{$getParameters['parameters']['values']['capacity_decentalise']}}</option>
                        @else
                        <option value="" selected="selected">@lang('home.Capacity')</option>
                        <!-- <option value = "0">@lang('home.Capacity')</option> -->
                     
                        
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
                                                                        
        <div class="col-md-12 gas-sel" @if($getParameters['parameters']['values']['includeG']==1)   @else  style="display:none;"  @endif>
                        <div class="form-group consumtion_gas1r">  
                            <label> @lang('home.Consumption') <span style="color:red;">*</span></label>
                            <input type="number" class="@if($getParameters['parameters']['values']['usage_gas']!=-1) required @endif"  value="@if($getParameters['parameters']['values']['usage_gas']!=-1){{$getParameters['parameters']['values']['usage_gas']}}@endif" autocomplete="off" id="consumtion_gas1" name="consumtion_gas1" value=""><br>
                        </div>
                    </div>
         <div class="col-md-12 gas-sel" @if($getParameters['parameters']['values']['includeG']==1)   @else  style="display:none;"  @endif>
                        <div class="field-wrapper third-field-sec">
                          <label for="@lang('home.Current_Tariff')">@lang('home.Current_Tariff')</label>
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

        <div class="col-md-12">
           <div class="form-group">  
                <label> @lang('home.Email') </label>
                <input type="email" autocomplete="on" class="email" name="email" value="{{$getParameters['parameters']['values']['email']}}"><br>
            </div>
        </div>
                                                                        
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="form-group calculate">
            <div id="submit1_msg" style="display:none;color:red;" class="alert alert-danger">
            Vul alstublieft het formulier in
            </div>
                <input type="submit" id="submit1"   disabled="disabled" value="@lang('home.Calculate')">
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
                                                                
        <form action="{{route('change-data-prefosional')}}" id="tabform2" method="post" class="tabform1">
                                    {{csrf_field()}}
            <div class="row">
                <div class="col-md-12">
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
                                    <div class="form-group">
                                        <label> @lang('home.Meter_Type') <span style="color:red;">*</span></label>
                                       
                                            
                                             <select id = "dropList" class="meterp required" name="meter_type1" required="">
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
                        <input type="number" id="consuption_day_elec1" @if($getParameters['parameters']['values']['usage_day']==0) value="" @else value="{{$getParameters['parameters']['values']['usage_day']}}" @endif class="consuption_day_elec1p @if($getParameters['parameters']['values']['meter_type']=='double')  @else required @endif" autocomplete="off" min="0" name="consuption_day_elec1" ><br>
                    </div>
                </div> 
                <div class="col-md-6">
                    <div class="form-group consuption_night_elec1rp">    
                        <label> @lang('home.Consumption_Night') <span style="color:red;">*</span></label>
                        <input type="number" id="consuption_night_elec1" @if($getParameters['parameters']['values']['usage_night']==0) value="" @else value="{{$getParameters['parameters']['values']['usage_night']}}" @endif class="consuption_night_elec1p @if($getParameters['parameters']['values']['meter_type']=='double')  @else required @endif" autocomplete="off" min="0" name="consuption_night_elec1" ><br>
                    </div>
                </div>    
            </div>
                            
                            
                            
                      <div class="row single" @if($getParameters['parameters']['values']['meter_type']=='single')   @else  style="display:none;"  @endif>
               <div class="col-md-12">
                    <div class="form-group consuption1rp">    
                        <label> @lang('home.Consumption') <span style="color:red;">*</span></label>
                        <input type="number" id="consuption1" @if($getParameters['parameters']['values']['usage_single']==0) value="" @else value="{{$getParameters['parameters']['values']['usage_single']}}" @endif class="consuption1p required @if($getParameters['parameters']['values']['meter_type']=='single') required @endif" autocomplete="off" min="0" name="consuption1" ><br>
                    </div>
                </div> 
                   
            </div>
             
              <div class="row single_excl_night" @if($getParameters['parameters']['values']['meter_type']=='single_excl_night')   @else  style="display:none;"  @endif>
                  
                <div class="col-md-6">
                    <div class="form-group consuption1serp">    
                        <label> @lang('home.Consumption') <span style="color:red;">*</span></label>
                        <input type="number" id="consuption1" @if($getParameters['parameters']['values']['usage_single']==0) value="" @else value="{{$getParameters['parameters']['values']['usage_single']}}" @endif class="consuption1sep required" autocomplete="off" min="0" name="consuption1se" ><br>
                    </div>
                </div>
              
                <div class="col-md-6">
                    <div class="form-group consuption_excl_nightserp">    
                        <label> @lang('home.Consumption_Night') <span style="color:red;">*</span></label>
                        <input type="number" id="consuption_excl_night" @if($getParameters['parameters']['values']['usage_excl_night']==0) value="" @else value="{{$getParameters['parameters']['values']['usage_excl_night']}}" @endif class="consuption_excl_nightsep required" autocomplete="off" min="0" name="consuption_excl_nightse" ><br>
                    </div>
                </div>    
            </div>
                            
                <div class="row double_excl_night" @if($getParameters['parameters']['values']['meter_type']=='double_excl_night')   @else  style="display:none;"  @endif>
                  
                 <div class="col-md-6">
                    <div class="form-group consuption_day_elec1derp">    
                        <label> @lang('home.Consumption_Day') <span style="color:red;">*</span></label>
                        <input type="number" id="consuption_day_elec1" @if($getParameters['parameters']['values']['usage_day']==0) value="" @else value="{{$getParameters['parameters']['values']['usage_day']}}" @endif class="consuption_day_elec1dep required" autocomplete="off" min="0" name="consuption_day_elec1de" ><br>
                    </div>
                </div> 
                <div class="col-md-6">
                    <div class="form-group consuption_night_elec1derp">    
                        <label> @lang('home.Consumption_Night') <span style="color:red;">*</span></label>
                        <input type="number" id="consuption_night_elec1" @if($getParameters['parameters']['values']['usage_night']==0) value="" @else value="{{$getParameters['parameters']['values']['usage_night']}}" @endif class="consuption_night_elec1dep required" autocomplete="off" min="0" name="consuption_night_elec1de" ><br>
                    </div>
                </div> 
              
                <div class="col-md-12">
                    <div class="form-group consuption_excl_nightderp">    
                        <label> @lang('home.Consumption_Night') <span style="color:red;">*</span></label>
                        <input type="number" id="consuption_excl_night" @if($getParameters['parameters']['values']['usage_excl_night']==0) value="" @else value="{{$getParameters['parameters']['values']['usage_excl_night']}}" @endif class="consuption_excl_nightdep required" autocomplete="off" min="0" name="consuption_excl_nightde" ><br>
                    </div>
                </div>    
            </div>
                        </div>
                        
                          <div class="col-md-12">
                    <div class="field-wrapper">
                      <label for="state">@lang('home.Current_Tariff')</label>
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
                <p>Decentralised production?</p>
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
            <input aria-label="gas"  type="checkbox" @if($getParameters['parameters']['values']['usage_gas']!=-1) checked else  @endif id="gas_p" name="gasp" value="true">
            <span class="checkmark"></span>
        </label>
        <p>Gas</p>
    </div> 
</div>
                                                                    
<div class="col-md-12 gas-sel-p" id="pro-gas" @if($getParameters['parameters']['values']['includeG']==1)   @else  style="display:none;"  @endif>
    <div class="form-group consumtion_gas1r">  
        <label> @lang('home.Consumption') <span style="color:red;">*</span></label>
            <input type="number" class="consumtion_gas1p @if($getParameters['parameters']['values']['usage_gas']!=-1) required @endif" value="@if($getParameters['parameters']['values']['usage_gas']!=-1){{$getParameters['parameters']['values']['usage_gas']}}@endif" autocomplete="off" id="consumtion_gas1" name="consumtion_gas1" value=""><br>
    </div>
</div>
                                                                        
<div class="col-md-12 gas-sel-p" @if($getParameters['parameters']['values']['includeG']==1)   @else  style="display:none;"  @endif>
    <div class="field-wrapper">
      <label for="@lang('home.Current_Tariff')">@lang('home.Current_Tariff')</label>
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
                                                
                                                    
                                                    <!-- </div>
                                            </div>
                                            </div> -->
                                                    
                                                </div>
                                            </div>
                                            </section>
                                        </div>
                                        <div class="loading_section_sec" style="display: none;">
                                             <i class="fas fa-spinner fa-spin fa-3x"></i>
                                         </div>
                                    </div>
                                </div>
                        </div>
                    <!-- <span class="change-sec-btn">Change</span> -->
                </div>
            </div>
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
