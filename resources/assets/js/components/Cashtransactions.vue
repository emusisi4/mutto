

<template>

    <div>




<!-- general component access -->
<div  v-if="gencomponentaccessCahtransactions > 0 "> 
 <div class="bethapa-table-header"></div>

        <!-- the HGeaders -->
        <br>
    <div class="row">
      <!-- v-if="allowedtoviewcollectionsccount > 0 " -->
            <div class="col-lg-3 col-3" v-if="allowedtoviewcollectionsccount > 0 "  >

            <!-- small box -->
            <div class="small-box bg-pnne">
              <div class="inner">
                <h3>COLLECTIONS ACCOUNT</h3>
      <div >
   <h5>   <b> Available Cash : {{currencydetails}} {{formatPrice(collectionsaccountcurrentbalance) }}</b> </h5>
      </div>
        
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer"> <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

                  
                  
              
                     <div class="col-lg-3 col-3">
                         <div class="small-box bg-pnne">
                             <div class="inner">
                        <h3><b>TODAYS COLLECTIONS </b><sup style="font-size: 20px;"></sup></h3>
                         <h5>   <b> Available Cash : {{ (currencydetails) }} {{formatPrice(todayscashintotal)}}</b></h5>
                             </div> 
                         
                             <div class="icon"><i class="ion ion-stats-bars"></i>
                             </div> 
                             <a href="#" class="small-box-footer"> <i class="fas fa-arrow-circle-right"></i></a>
                             </div>
                             </div>


                              <div class="col-lg-3 col-3">
                                  
                                  <div class="small-box bg-pnne">
                                      <div class="inner">
                                        <h3><b>TODAYS CREDITS </b><sup style="font-size: 20px;"></sup></h3>
                                      
                                      <h5> <b>{{ (currencydetails) }} {{formatPrice(todayscashouttotal)}}</b></h5></div> 
                                      <div class="icon"><i class="ion ion-person-add"></i></div>
                                       <a href="#" class="small-box-footer"> <i class="fas fa-arrow-circle-right"></i></a>
                                       </div>
                                       </div> 
                                       <div class="col-lg-3 col-3">
                                           <div class="small-box bg-pnne">
                                               <div class="inner">
                                                  <h3><b>EXPENSES </b><sup style="font-size: 20px;"></sup></h3>
                                               <h5>   <b> Available Cash : {{ (currencydetails) }} {{formatPrice(todaysexpensestotal)}}</b></h5>
                                               </div> 
                                               <div class="icon"><i class="ion ion-pie-graph"></i>
                                               </div> 
                                               <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                               </div>
                                               </div>
                                                      
                                                      
                                            
                                            
                                            
                                     


      </div>
    
 <div class="bethapa-table-header"></div>
   
        <!-- end of Headers -->

        <!-- Start of the -->
 <div class="bethapa-component-header" >Cash Transactions </div>        
<div class="col-12 col-sm-12 col-lg-12">
            <div class="card card-primary card-outline card-tabs">
              <div class="card-header p-0 pt-1 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                  <li class="nav-item" v-if="branchcashOutSettings > 0 " >
                    <a class="nav-link active" id="custom-tabs-two-home-tab"
                     data-toggle="pill" href="#custom-tabs-two-home" role="tab"
                     @click="loadBranchcashouttransactions()" aria-controls="custom-tabs-two-home" aria-selected="true">BRANCH CASH-OUT</a>
                  </li>
<!--  -->


                  <li class="nav-item" v-if="branchcashInSettings > 0 " > 
                    <a class="nav-link" id="custom-tabs-two-profile-tab"
                     data-toggle="pill" href="#custom-tabs-two-profile" role="tab"
                     @click="loadBranchcashintransactions()" aria-controls="custom-tabs-two-profile" aria-selected="false">BRANCH CASH-IN</a>
                  </li>

 

                  <li class="nav-item" v-if="branchpayoutaccessSettings > 0 " >
                    <a class="nav-link" id="custom-tabs-two-messages-tab"
                    @click="loadBranchpayouts()" data-toggle="pill" href="#custom-tabs-two-messages" role="tab" 
                    aria-controls="custom-tabs-two-messages" aria-selected="false">BRANCH PAYOUT</a>
                  </li>
                 
                  <li class="nav-item" v-if="branchexpensesaccessSetting > 0 ">
                    <a class="nav-link" id="custom-tabs-two-settings-tab" data-toggle="pill"
                     href="#custom-tabs-two-settings" role="tab" @click="loadbranchExpenses()"
                     aria-controls="custom-tabs-two-settings" aria-selected="false">BRANCH EXPENSES</a>
                  </li>
<!--  -->
<!-- v-if="cashcreditaccessSetting > 0 " -->
      <li class="nav-item" v-if="shopbalancingaccessSettings > 0 ">
                    <a class="nav-link" id="custom-tabs-two-intermidiary-tab" data-toggle="pill"
                     href="#custom-tabs-two-intermidiary" role="tab" @click="loadintermShopbalancingrecords()" 
                     aria-controls="custom-tabs-two-three" aria-selected="false">INTERMIDIARY BALANCING</a>
                  </li>



                   <li class="nav-item" v-if="shopbalancingaccessSettings > 0 ">
                    <a class="nav-link" id="custom-tabs-two-three-tab" data-toggle="pill"
                     href="#custom-tabs-two-three" role="tab" @click="loadShopbalancingrecords()" 
                     aria-controls="custom-tabs-two-three" aria-selected="false">SHOP BALANCING</a>
                  </li>

           

<!-- -->
                    <li class="nav-item"  v-if="cashcollectionaccessSetting > 0 " >
                    <a class="nav-link" id="custom-tabs-two-four-tab" data-toggle="pill"
                     href="#custom-tabs-two-four" role="tab" @click="loadAdmincashin()" 
                     aria-controls="custom-tabs-two-four" aria-selected="false">CASH COLLECTION </a>
                  </li>


                     <li class="nav-item" v-if="cashcreditaccessSetting > 0 "  >
                    <a class="nav-link" id="custom-tabs-two-five-tab" data-toggle="pill"  @click="loadAdmincashout()"
                    href="#custom-tabs-two-five" role="tab" aria-controls="custom-tabs-two-four" aria-selected="false">CASH CREDIT</a>
                  </li>

                   <li class="nav-item"   v-if="fishdebitaccessSetting > 0 ">
                    <a class="nav-link" id="custom-tabs-two-six-tab" data-toggle="pill"  @click="loadfishcollectionrecords()"
                    href="#custom-tabs-two-six" role="tab" aria-controls="custom-tabs-two-four" aria-selected="false">FISH COLLECTION</a>
                  </li>
                   <li class="nav-item"  v-if="fishcreditaccessSetting > 0 " >
                    <a class="nav-link" id="custom-tabs-two-seven-tab" data-toggle="pill"  @click="loadfishcreditsrecords()"
                    href="#custom-tabs-two-seven" role="tab" aria-controls="custom-tabs-two-four" aria-selected="false">FISH CREDIT</a>
                  </li>

                </ul>
              </div>
              <div>



      <div class="tab-content" id="custom-tabs-two-tabContent"  >
                  
                  <!-- tab one start -->
                 <div class="tab-pane fade show active" id="custom-tabs-two-home" role="tabpanel" v-if="branchcashOutSettings > 0 " aria-labelledby="custom-tabs-two-home-tab"> 
               
                 <div class="bethapa-table-header">
                      CASH-OUT DETAILS 
                      <!-- <button type="button" v-if="allowedtoaddpauout > 0 " class="add-newm" @click="newBranchmodal" >Add New </button>  -->
                     </div>





                      <table class="table  table-striped">
                  <thead>
                    <tr>
                     <th>#</th>
                      <th>DATE</th>
                      <th>BRANCH</th>
                     
                      <th>DESTINATION </th>
                      
                      <th>AMOUNT {{ (currencydetails) }} </th>
                      <th>ASKED BY</th>
                        <th>APPROVED</th>
                         <th>USER - APPROVED</th>
                         <th>STATUS</th>
                         <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>

                    <tr v-for="couttans in shopcashoutrecords.data" :key="couttans.id">
                      
                    <td>{{couttans.id}}</td>
                       <td>{{(couttans.transferdate)}}</td>
                       <td> <template v-if="couttans.branch_name">	{{couttans.branch_name.branchname}}</template></td>
                       <td> <template v-if="couttans.branch_namefrom">	{{couttans.branch_namefrom.branchname}}</template></td>
                       <td> {{ (currencydetails) }}  {{formatPrice(couttans.amount)}}</td>
                       <td> <template v-if="couttans.cerated_userdetails">	{{couttans.cerated_userdetails.name}}</template></td>
                       <td>{{(couttans.comptime)}}</td>
                       <td> <template v-if="couttans.approved_userdetails">	{{couttans.approved_userdetails.name}}</template></td>
                       <td> <template v-if="couttans.status_name">	{{couttans.status_name.name}}</template></td>
                       <td>
                       <button v-show="couttans.status < 1" type="button"   class="btn  bg-gradient-secondary btn-xs"  @click="confirmCashintransfer(couttans.id)"> Confirm</button>
                       <!-- <button v-show="couttans.status === 1" type="button"   class="btn  bg-gradient-success btn-xs"  > Confirmed </button> -->
                     <div v-if="deletecashcredit > 0">  
                       <button type="button"  class="btn  bg-gradient-danger btn-xs fas fa-trash-alt" @click="deletemadeexpense(couttans.id)"> Delete </button>

                       </div>
                    
                   

                       </td>
                  
                
                      
                         
                                


               
                              
                               
                    </tr>
              
                     
                  </tbody>
              
 
                                   </table>
    <div class="card-footer">
                <ul class="pagination pagination-sm m-0 float-right">
                   <pagination :data="shopcashoutrecords" @pagination-change-page="paginationResultsBranches"></pagination>
                </ul>
              </div>
                     
                 
                    </div>
 
 <!-- tab one end -->


<!-- Modal add menu -->
<div class="modal fade" id="addnewBranchmodal">
        <div class="modal-dialog modal-dialog-centered modal-xl">
        <div  class="modal-content">
            <div  class="modal-header">
                <h4  v-show="!editmode"    class="modal-title">ADD NEW RECORD</h4> 
                <h4  v-show="editmode" class="modal-title" >UPDATE RECORD</h4> 
                <button  type="button" data-dismiss="modal" aria-label="Close" class="close"><span  aria-hidden="true">×</span></button></div> 
                 <form class="form-horizontal" @submit.prevent="editmode ? updateBranch():createBranch()"> 

                    <div  class="modal-body">
                  <div class="form-group  row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">BRANCH NAME</label>
                    <div class="col-sm-6">
                  <input v-model="form.branchname" type="text" name="branchname"
                      class="form-control" :class="{ 'is-invalid': form.errors.has('branchname') }">
                    <has-error :form="form" field="branchname"></has-error>
                                  </div>
                   
      
                
                  </div>


               <div class="form-group  row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">LOCATION</label>
                    <div class="col-sm-6">
                  <input v-model="form.location" type="text" name="location"
                      class="form-control" :class="{ 'is-invalid': form.errors.has('location') }">
                    <has-error :form="form" field="location"></has-error>
                                  </div>    
                  </div>
                

                   <div class="form-group  row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">CONTACT</label>
                    <div class="col-sm-6">
                  <input v-model="form.contact" type="text" name="contact"
                      class="form-control" :class="{ 'is-invalid': form.errors.has('contact') }">
                    <has-error :form="form" field="contact"></has-error>
                                  </div>    
                  </div>
                
                
                 <div class="form-group  row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">OPENNING BALANCE</label>
                    <div class="col-sm-6">
                  <input v-model="form.openningbalance" type="number" name="openningbalance"
                      class="form-control" :class="{ 'is-invalid': form.errors.has('openningbalance') }">
                    <has-error :form="form" field="openningbalance"></has-error>
                                  </div>
                   
      
                  </div>
                 
                    </div>


                  <div  class="modal-footer">
                    <button  v-show="!editmode" type="submit" class="btn btn-primary btn-sm">Create</button> 
                      <button v-show="editmode" type="submit" class="btn btn-success btn-sm" >Update</button>
                        <button  type="button" data-dismiss="modal" class="btn btn-danger btn-sm">Close</button >
                        </div>
                 </form>
                       </div>
                          </div>
                </div>
                

      <!-- End of Modal for -->
<!--  -->
                  <div class="tab-pane fade" id="custom-tabs-two-profile" role="tabpanel" aria-labelledby="custom-tabs-two-profile-tab">
                   
                   
    <!-- tab one start -->
                  <div class="tab-pane fade show active" id="custom-tabs-two-home" role="tabpanel" aria-labelledby="custom-tabs-two-home-tab">
                 
                  <div class="bethapa-table-header">
                      CASH-IN TRANSACTION  DETAILS 
                      <!-- <button type="button" v-if="allowedtoaddpauout > 0 " class="add-newm" @click="newBranchmodal" >Add New </button>  -->
                     </div>





                      <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                       <th>#</th>
                      
                      <th>DATE</th>
                      <th>BRANCH</th>
                     
                      <th>FROM </th>
                      
                      <th>AMOUNT</th>
                      <th>USER INITIATED</th>
                        <th>APPROVED</th>
                         <th>USER - APPROVED</th>
                         <th>STATUS</th>
                         <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>

                   <tr v-for="cinshopt in shopcintransferrecords.data" :key="cinshopt.id">
                       <td>{{cinshopt.id}}</td>
                       <td>{{(cinshopt.transferdate)}}</td>
                       <td>   <template v-if="cinshopt.branch_name">	{{cinshopt.branch_name.branchname}}</template></td>
                       <td> <template v-if="cinshopt.branch_namefrom">	{{cinshopt.branch_namefrom.branchname}}</template></td>
                       <td>{{ (currencydetails) }}  {{formatPrice(cinshopt.amount)}}</td>
                       <td> <template v-if="cinshopt.cerated_userdetails">	{{cinshopt.cerated_userdetails.name}}</template></td>
                       <td>{{(cinshopt.comptime)}}</td>
                       <td> <template v-if="cinshopt.approved_userdetails">	{{cinshopt.approved_userdetails.name}}</template></td>
                       <td> <template v-if="cinshopt.status_name">	{{cinshopt.status_name.name}}</template></td>
                     <td>
                       <button v-show="cinshopt.status < 1" type="button"   class="btn  bg-gradient-secondary btn-xs"  @click="confirmCashouttransfer(cinshopt.id)"> Confirm  credit </button>
                       <button v-show="cinshopt.status === 1" type="button"   class="btn  bg-gradient-success btn-xs"  > Confirmed  </button>
                   

                       </td>
                  
                     
                    </tr>
              
                     
                  </tbody>
              
 
                                   </table>
    <div class="card-footer">
                <ul class="pagination pagination-sm m-0 float-right">
                   <pagination :data="shopcashoutrecords" @pagination-change-page="paginationResultsBranches"></pagination>
                </ul>
              </div>
                     
                 
                    </div>
 
 <!-- tab one end -->


<!-- Modal add menu -->
<div class="modal fade" id="addnewBranchmodal">
        <div class="modal-dialog modal-dialog-centered modal-xl">
        <div  class="modal-content">
            <div  class="modal-header">
                <h4  v-show="!editmode"    class="modal-title">ADD NEW RECORD</h4> 
                <h4  v-show="editmode" class="modal-title" >UPDATE RECORD</h4> 
                <button  type="button" data-dismiss="modal" aria-label="Close" class="close"><span  aria-hidden="true">×</span></button></div> 
                 <form class="form-horizontal" @submit.prevent="editmode ? updateBranch():createBranch()"> 

                    <div  class="modal-body">
                  <div class="form-group  row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">BRANCH NAME</label>
                    <div class="col-sm-6">
                  <input v-model="form.branchname" type="text" name="branchname"
                      class="form-control" :class="{ 'is-invalid': form.errors.has('branchname') }">
                    <has-error :form="form" field="branchname"></has-error>
                                  </div>
                   
      
                
                  </div>


               <div class="form-group  row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">LOCATION</label>
                    <div class="col-sm-6">
                  <input v-model="form.location" type="text" name="location"
                      class="form-control" :class="{ 'is-invalid': form.errors.has('location') }">
                    <has-error :form="form" field="location"></has-error>
                                  </div>    
                  </div>
                

                   <div class="form-group  row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">CONTACT</label>
                    <div class="col-sm-6">
                  <input v-model="form.contact" type="text" name="contact"
                      class="form-control" :class="{ 'is-invalid': form.errors.has('contact') }">
                    <has-error :form="form" field="contact"></has-error>
                                  </div>    
                  </div>
                
                
                 <div class="form-group  row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">OPENNING BALANCE</label>
                    <div class="col-sm-6">
                  <input v-model="form.openningbalance" type="number" name="openningbalance"
                      class="form-control" :class="{ 'is-invalid': form.errors.has('openningbalance') }">
                    <has-error :form="form" field="openningbalance"></has-error>
                                  </div>
                   
      
                  </div>
                 
                    </div>


                  <div  class="modal-footer">
                    <button  v-show="!editmode" type="submit" class="btn btn-primary btn-sm">Create</button> 
                      <button v-show="editmode" type="submit" class="btn btn-success btn-sm" >Update</button>
                        <button  type="button" data-dismiss="modal" class="btn btn-danger btn-sm">Close</button >
                        </div>
                 </form>
                       </div>
                          </div>
                </div>
                  </div>
<!-- mmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm -->

                  <div class="tab-pane fade" id="custom-tabs-two-messages" role="tabpanel" aria-labelledby="custom-tabs-two-messages-tab">
             

 <form @submit.prevent="SaveRoletoaddmainmenu()">
                  
                  
                    <!-- <div class="form-group">
                  <label>Choose Role</label>
                    <select name ="mainmemurolerrtrrr" v-model="form.mainmemurolerrtrrr" id ="mainmemurolerrtrrr" v-on:change="myClickEventformainmenuas"  :class="{'is-invalid': form.errors.has('mainmemurolerrtrrr')}">
                    <option value=" ">  </option>
                    <option v-for='data in roleslist' v-bind:value='data.id'>{{ data.id }} - {{ data.rolename }}</option>

                    </select>
                       <input type="text" name="inone" value="forsubmenuazccess" hidden class="form-control">

                                <has-error :form="form" field="mainmemurolerrtrrr"></has-error>

                             
                             

                                
                                </div> -->
                                  <button type="submit" id="submit" hidden="hidden" name= "submit" ref="myBtnmainmen" class="btn btn-primary btn-sm">Saveit</button>
                                </form>

              <div class="bethapa-table-header">
                    BRANCH PAYOUT DETAILS
                      <!-- <button type="button"  class="add-newm" @click="newBranchpayoutbranch" >Add New </button> -->
                        <button type="button" v-if="allowedtoaddpauout > 0" class="add-newm" @click="newBranchpayoutbranch" >Pay Ticket / Slip</button>
                     </div>
        
                    
                    
              <table class="table table-striped">
                  <thead>
                    <tr>
                   
                   <th>#</th>
                       <th>TICKETING BRANCH</th>
                      <th>TICKET DATE</th>
                     
                      
                      <th>PAYING BRANCH</th>
                     
                      <th>AMOUNT PAID</th>
                        <th>DATE PAID</th>
                      <th>USER</th>
                    
                      <th>TRANSACTION</th>
                       <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>

                                       <tr v-for="allpayoutrecords in branchpayoutrecords.data" :key="allpayoutrecords.id">
                    
                 <td>{{allpayoutrecords.receiptno}}</td>
                 <td>    <template v-if="allpayoutrecords.expense_typeconnect">	{{allpayoutrecords.expense_typeconnect.branchname}}</template></td>

                 <td>{{allpayoutrecords.datemade}}</td>

                 <td>    <template v-if="allpayoutrecords.expense_category">	{{allpayoutrecords.expense_category.branchname}}</template></td>
                                              
                                                
                 <td>{{ (currencydetails) }}  {{formatPrice(allpayoutrecords.amount)}}</td>
                 <td>{{allpayoutrecords.datepaid}}</td>
                 <td>    <template v-if="allpayoutrecords.paying_userdetails">	{{allpayoutrecords.paying_userdetails.name}}</template></td>
                
                 <td>{{allpayoutrecords.created_at}}</td>
                           
                <td>
                            <button type="button" v-if="allowedtoeditpayout > 0 "   class="btn  bg-gradient-secondary btn-xs fas fa-edit"  @click="editPayout(allpayoutrecords)">Edit</button>
                             <button type="button" v-if="allowedtodeletepayout > 0 " class="btn  bg-gradient-danger btn-xs fas fa-trash-alt" @click="deletepayout(allpayoutrecords.id)"> DEl </button>




                             
                              </td>



               
                              
                               
                    </tr>
              
                     
                  </tbody>
              
 
                                   </table>
   
   
                      <div class="card-footer">
                <ul class="pagination pagination-sm m-0 float-right">
                   <pagination :data="allowedrolecomponentsObject" @pagination-change-page="paginationroleAuthorisedsubmenues"></pagination>
                </ul>
              </div>
                     
                 
                    </div>
 
 <!-- tab one end -->


<!-- Modal add menu -->
<div class="modal fade" id="addnewpayoutbranch">
        <div class="modal-dialog modal-dialog-top modal-lg">
        <div  class="modal-content">
            <div  class="modal-header">
                <h4  v-show="!editmode"    class="modal-title">New Payout Registration</h4> 
                <h4  v-show="editmode" class="modal-title" >UPDATE RECORD</h4> 
                <button  type="button" data-dismiss="modal" aria-label="Close" class="close"><span  aria-hidden="true">×</span></button></div> 
                 <form class="form-horizontal" @submit.prevent="editmode ? updatepayout():createNewpayout()"> 

                    <div  class="modal-body">
              
              
                 
                 <div class="form-group row">

                            <label class="col-sm-2 col-form-label">ReceiptNo   </label>
                              <div class="col-sm-6">
                          <input v-model="form.receiptno" type="text" name="receiptno"
        class="form-control" :class="{ 'is-invalid': form.errors.has('receiptno') }">
      <has-error :form="form" field="receiptno"></has-error>

                              </div>

                        </div>
                
                      
               
                    
          

                           <div class="form-group row">

                            <label class="col-sm-2 col-form-label">Amount </label>
                              <div class="col-sm-6">
                                 <input v-model="form.amount" type="text" name="amount"
        class="form-control" :class="{ 'is-invalid': form.errors.has('amount') }">
      <has-error :form="form" field="amount"></has-error>
                              </div>

                        </div>
                
                      
               
   <div class="form-group row">

                            <label class="col-sm-2 col-form-label">Branch </label>
                              <div class="col-sm-6">
                             <select name ="branch" v-model="form.branch" id ="branch" v-on:click="loadDatarecords()" class="form-control" :class="{'is-invalid': form.errors.has('branch')}">
<option value=""> Branch of origin </option>
<option v-for='data in brancheslist' v-bind:value='data.branchno'>{{ data.branchno }} - {{ data.branchname }}</option>

</select>
            <has-error :form="form" field="branch"></has-error>
                              </div>

                        </div>
                
                        <div class="form-group row">

                            <label class="col-sm-2 col-form-label">Receipt date </label>
                              <div class="col-sm-6">
                               <input v-model="form.datemade" type="date" name="datemade"
        class="form-control" :class="{ 'is-invalid': form.errors.has('datemade') }">
      <has-error :form="form" field="datemade"></has-error>
                              </div>

                        </div>
                
                      
                
                 
                 </div>
                 
                  <div  class="modal-footer">
                    <button  v-show="!editmode" type="submit" class="btn btn-primary btn-sm">Create</button> 
                      <button v-show="editmode" type="submit" class="btn btn-success btn-sm" >Update</button>
                        <button  type="button" data-dismiss="modal" class="btn btn-danger btn-sm">Close</button >
                        </div>
                 </form>
                       </div>
                          </div>
                
                    
                    
                    
              
              
              
                  </div>

                  <!-- mmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm -->



<!-- mmmmmmmmmmmmmmmmmmmmmmmmmmm -->
                  <div class="tab-pane fade" id="custom-tabs-two-settings" role="tabpanel" aria-labelledby="custom-tabs-two-settings-tab">
                    
                    
              
 <form @submit.prevent="SaveRoletoaddmainmenu()">
                  
                  
                    <!-- <div class="form-group">
                  <label>Choose Role</label>
                    <select name ="mainmemurolerrtrrr" v-model="form.mainmemurolerrtrrr" id ="mainmemurolerrtrrr" v-on:change="myClickEventformainmenuas"  :class="{'is-invalid': form.errors.has('mainmemurolerrtrrr')}">
                    <option value=" ">  </option>
                    <option v-for='data in roleslist' v-bind:value='data.id'>{{ data.id }} - {{ data.rolename }}</option>

                    </select>
                       <input type="text" name="inone" value="forsubmenuazccess" hidden class="form-control">

                                <has-error :form="form" field="mainmemurolerrtrrr"></has-error>

                             
                             

                                
                                </div> -->
                                  <button type="submit" id="submit" hidden="hidden" name= "submit" ref="myBtnmainmen" class="btn btn-primary btn-sm">Saveit</button>
                                </form>

              <div class="bethapa-table-header">
                    BRANCH DAILY EXPENSES
                      <!-- <button type="button"  class="add-newm" @click="newBranchpayoutbranch" >Add New </button> -->
                        <button type="button" v-if="allowedtoaddnewexpensereccord > 0" class="add-newm" @click="newbranchExpense" >REQUEST EXPENSE</button>
                     </div>
        
                    
                    
             <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
               <th>#</th>
                      <th> DATE</th>
                      <th>BRANCH</th>
                      <th>EXPENSE</th>
                       <th>DESCRIPTION</th>
                             
                      <th>AMOUNT({{currencydetails}})</th>
                      <th>STATUS</th>
                       <th></th>
                    </tr>
                  </thead>
                  <tbody>
           
                    <tr>

                                       <tr v-for="alldayexpense in datarecordsbranchexpensesrecords.data" :key="alldayexpense.id">
                    
                    <td>{{alldayexpense.id}}</td>
                  
                    <td>{{alldayexpense.datemade}}</td>
                           <td>    <template v-if="alldayexpense.branch_name">	{{alldayexpense.branch_name.branchname}}</template></td>
                            <td>    <template v-if="alldayexpense.expense_name">	{{alldayexpense.expense_name.expensename}}</template></td>
                          <td>{{alldayexpense.description}}</td>
                       
                               <td> {{formatPrice((alldayexpense.amount))}}</td>
                              <td> <div v-if="((alldayexpense.approvalstate))== 0">
                                <span class="cell" style="color:maroon ;">  
   
                    <span style="font-size:1.0em;" center >  Pending </span></span>
                              </div>
                              <div v-if="((alldayexpense.approvalstate))== 1">
                                <span class="cell" style="color:green ;">  
   
                    <span style="font-size:1.0em;" center >  Approved </span></span>
                              </div>
                              
                              </td>
                       
                
                <td>
                  <div v-if="alldayexpense.approvalstate == 0" >
      <button type="button" v-if="allowedtoeditexpenserecord > 0 "   class="btn  bg-gradient-secondary btn-xs fas fa-edit"  @click="editBranchexpenserecord(alldayexpense)">Edit</button>
      <button type="button" v-if="allowedtodeleteexpenserecord > 0 " class="btn  bg-gradient-danger btn-xs fas fa-trash-alt" @click="deleteBranchexpenserecord(alldayexpense.id)"> DEl </button>



</div>
                             
                              </td>



               
                              
                               
                    </tr>
              
                     
                  </tbody>
              
 
                                   </table>
   
   
                      <div class="card-footer">
                <ul class="pagination pagination-sm m-0 float-right">
                   <pagination :data="allowedrolecomponentsObject" @pagination-change-page="paginationroleAuthorisedsubmenues"></pagination>
                </ul>
              </div>
                     
                 
                    </div>
 
 <!-- tab one end -->


<!-- Modal add menu -->
<div class="modal fade" id="addnewexpensebybranch">
        <div class="modal-dialog modal-dialog-top modal-lg">
        <div  class="modal-content">
            <div  class="modal-header">
                <h4  v-show="!editmode"    class="modal-title">New Expense Request FORM</h4> 
                <h4  v-show="editmode" class="modal-title" >UPDATE RECORD</h4> 
                <button  type="button" data-dismiss="modal" aria-label="Close" class="close"><span  aria-hidden="true">×</span></button></div> 
                 <form class="form-horizontal" @submit.prevent="editmode ? updateexpenserecord():createNewexpensebranch()"> 

                    <div  class="modal-body">
              
              
                 
                 <div class="form-group row">

                            <label class="col-sm-2 col-form-label">Expense Name   </label>
                              <div class="col-sm-6">
                        <select name ="expense" v-model="form.expense" id ="expense" class="form-control" :class="{'is-invalid': form.errors.has('expense')}">
<option value=" ">  </option>
<option v-for='data in expenseslist' v-bind:value='data.expenseno'>{{ data.expensename }}</option>

</select>
            <has-error :form="form" field="expense"></has-error>

                              </div>

                        </div>
                
                      
               
                    
          

                           <div class="form-group row">

                            <label class="col-sm-2 col-form-label">Branch </label>
                              <div class="col-sm-6">
                              <select name ="branch" v-model="form.branch" id ="branch" v-on:click="loadDatarecords()" class="form-control" :class="{'is-invalid': form.errors.has('branch')}">
<option value=" ">  </option>
<option v-for='data in mybrancheslist' v-bind:value='data.branchno'>{{ data.branchno }} - {{ data.branchname }}</option>

</select>
            <has-error :form="form" field="branch"></has-error>
                              </div>

                        </div>
                
                      
               
   <div class="form-group row">

                            <label class="col-sm-2 col-form-label">Amount </label>
                              <div class="col-sm-6">
                              <input v-model="form.amount" type="number" name="amount"
       class="form-control" :class="{ 'is-invalid': form.errors.has('amount') }">
      <has-error :form="form" field="amount"></has-error>
                              </div>

                        </div>
                
                        <div class="form-group row">

                            <label class="col-sm-2 col-form-label">Expense Date </label>
                              <div class="col-sm-6">
                                 <input v-model="form.datemade" type="date" name="datemade"
       class="form-control" :class="{ 'is-invalid': form.errors.has('datemade') }">
      <has-error :form="form" field="datemade"></has-error>
                              </div>

                        </div>

                          <div class="form-group row">

                            <label class="col-sm-2 col-form-label">Description </label>
                              <div class="col-sm-6">
                                 <textarea v-model="form.description" name="description" rows="5" cols="30" class="form-control" :class="{ 'is-invalid': form.errors.has('description') }"></textarea>
                 
                <has-error :form="form" field="description"></has-error>
      <has-error :form="form" field="datemade"></has-error>
                              </div>

                        </div>
                
                        
                
                 
                 </div>
                 
                  <div  class="modal-footer">
                    <button  v-show="!editmode" type="submit" class="btn btn-primary btn-sm">Create</button> 
                      <button v-show="editmode" type="submit" class="btn btn-success btn-sm" >Update</button>
                        <button  type="button" data-dismiss="modal" class="btn btn-danger btn-sm">Close</button >
                        </div>
                 </form>
                       </div>
                          </div>
                
                    
                    
                    
                    
                        </div>

<!-- mmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm -->
                   <div class="tab-pane fade" id="custom-tabs-two-intermidiary" role="tabpanel" aria-labelledby="custom-tabs-two-intermidiary-tab">
                  
                  
                   <!-- <form @submit.prevent="SaveRoletoaddcomponent()">
                  
                  
                    <div class="form-group">
                  <label>Role</label>
                    <select name ="mycpmponentto" v-model="form.mycpmponentto" id ="mycpmponentto" v-on:change="myClickEventroletoaddcomponent"  :class="{'is-invalid': form.errors.has('mycpmponentto')}">
                    <option value=" ">  </option>
                    <option v-for='data in roleslist' v-bind:value='data.id'>{{ data.id }} - {{ data.rolename }}</option>

                    </select>
                       <input type="text" name="inone" value="roletoaddcomponent" hidden
                    class="form-control">

                                <has-error :form="form" field="mycpmponentto"></has-error>

                             
                             

                                
                                </div>
                                  <button type="submit" id="submit" hidden="hidden" name= "submit" ref="myBtnroledd" class="btn btn-primary btn-sm">Saveit</button>
                                </form> -->

              <div class="bethapa-table-header">
                   
       
                    SHOP INTERMIDIARY BALANCING   
                     
                     <button type="button"  class="add-newm" @click="newintermidiaryshopbalancing" >CHECK NOW </button>
                     </div>


             <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                   
                    <th>#</th>
                       <th>DATE</th>
                        <th>USER</th>
                      <th>BRANCH</th>
                     
                      <th>OPENNING</th>
                      <th v-if=" soccergameproduct > 0  ">S-SALES  ({{currencydetails }})</th>
                      <th v-if=" soccergameproduct > 0  "> S-PAYOUT  ({{currencydetails }})</th>
                      <th v-if=" virtualgameproduct > 0  ">V-SALES  ({{currencydetails }})</th>
                      <th v-if=" virtualgameproduct > 0  ">V- CANCELLED  ({{currencydetails }})</th>
                      <th v-if=" virtualgameproduct > 0  ">V-REDEEMED ({{currencydetails }})</th>
                      <th v-if=" virtualgameproduct > 0  ">V-PROFIT ({{currencydetails }})</th>
                      <th v-if=" fishgameproduct > 0  ">FISH SALES ({{currencydetails }})</th>
                      <th v-if=" fishgameproduct > 0  ">FISH PAYOUT ({{currencydetails }})</th>
                      <th v-if=" fishgameproduct > 0  ">FISH INCOME ({{currencydetails }})</th>
                      <th>CASH-IN ({{currencydetails }})</th>
                      <th>CASH-OUT ({{currencydetails }})</th>
                      
                      
                      <th>AMOUNT TO COLLECT ({{currencydetails}})</th>
                     
                    
                    </tr>
                  </thead>
                  <tbody>
                    <tr>

                  <tr v-for="shobalrecs in intermshopbalancingdatarecords.data" :key="shobalrecs.id">
                      
                  <td>{{shobalrecs.id}}</td>
                     <td>{{shobalrecs.datedone}}</td>
                      <td>   <template v-if="shobalrecs.userbalancing_branch">	{{shobalrecs.userbalancing_branch.name}}</template></td>
                    
                       <td>    <template v-if="shobalrecs.branchin_balance">	{{shobalrecs.branchin_balance.branchname}}</template></td>
                         
                               <td>{{formatPrice(shobalrecs.opbalance)}}</td>
                               <td v-if=" soccergameproduct > 0  "> {{formatPrice(shobalrecs.scsales)}}</td>
                       <td v-if=" soccergameproduct > 0  ">{{formatPrice(shobalrecs.scpayout)}}</td>
                       <td v-if=" virtualgameproduct > 0  ">{{formatPrice(shobalrecs.vsales)}}</td>
                       <td v-if=" virtualgameproduct > 0  ">{{formatPrice(shobalrecs.vcan)}}</td>
                       <td v-if=" virtualgameproduct > 0  ">{{formatPrice(shobalrecs.vpay)}}</td>
                       
                    <td v-if=" virtualgameproduct > 0  ">{{formatPrice((shobalrecs.vprof))}}</td>

                    <td v-if=" fishgameproduct > 0  ">{{formatPrice((shobalrecs.fishsales*shobalrecs.multiplier))}}</td>
                    <td v-if=" fishgameproduct > 0  ">{{formatPrice((shobalrecs.fishpayout)*shobalrecs.multiplier)}}</td>
                    <td v-if=" fishgameproduct > 0  ">{{formatPrice((shobalrecs.fishincome))}}  </td>

<!-- ({{ ((( ((shobalrecs.fishpayout*500) /(shobalrecs.fishsales*500) | round))))*100}}%) -->

                     <td >{{formatPrice((shobalrecs.cashin))}}</td>
                     <td >{{formatPrice((shobalrecs.cashout))}}</td>
                   <td>{{formatPrice((shobalrecs.collection))}}  </td>
          
                          

                        
                    </tr>
              
                     
                  </tbody>
              
 
                                   </table>
   
   
                      <div class="card-footer">
                <ul class="pagination pagination-sm m-0 float-right">
                   <pagination :data="allowedrolecomponentsObject" @pagination-change-page="paginationroleAuthorisedcomponents"></pagination>
                </ul>
              </div>
                     
                 
                    </div>
 
 <!-- tab one end -->
<!-- mmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm -->
                   <div class="tab-pane fade" id="custom-tabs-two-three" role="tabpanel" aria-labelledby="custom-tabs-two-three-tab">
                  
                  
                   <!-- <form @submit.prevent="SaveRoletoaddcomponent()">
                  
                  
                    <div class="form-group">
                  <label>Role</label>
                    <select name ="mycpmponentto" v-model="form.mycpmponentto" id ="mycpmponentto" v-on:change="myClickEventroletoaddcomponent"  :class="{'is-invalid': form.errors.has('mycpmponentto')}">
                    <option value=" ">  </option>
                    <option v-for='data in roleslist' v-bind:value='data.id'>{{ data.id }} - {{ data.rolename }}</option>

                    </select>
                       <input type="text" name="inone" value="roletoaddcomponent" hidden
                    class="form-control">

                                <has-error :form="form" field="mycpmponentto"></has-error>

                             
                             

                                
                                </div>
                                  <button type="submit" id="submit" hidden="hidden" name= "submit" ref="myBtnroledd" class="btn btn-primary btn-sm">Saveit</button>
                                </form> -->

              <div class="bethapa-table-header">
                   
       
                     BRANCH BALANCING RECORD   
                     
                     <button type="button"  class="add-newm" @click="newshopbal" >BALANCE NOW </button>
                     </div>


             <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                   
                    <th>#</th>
                       <th>DATE</th>
                        <th>USER</th>
                      <th>BRANCH</th>
                     
                      <th>OPENNING</th>
                      <th v-if=" soccergameproduct > 0  ">S-SALES ({{currencydetails }})</th>
                      <th v-if=" soccergameproduct > 0  "> S-PAYOUT ({{currencydetails }})</th>
                      <th v-if=" virtualgameproduct > 0  ">V-SALES ({{currencydetails }})</th>
                      <th v-if=" virtualgameproduct > 0  ">V- CANCELLED ({{currencydetails }})</th>
                      <th v-if=" virtualgameproduct > 0  ">V-REDEEMED ({{currencydetails }})</th>
                      <th v-if=" virtualgameproduct > 0  ">V-PROFIT ({{currencydetails }})</th>
                      <th v-if=" fishgameproduct > 0  ">FISH SALES ({{currencydetails }})</th>
                      <th v-if=" fishgameproduct > 0  ">FISH PAYOUT ({{currencydetails }})</th>
                      <th v-if=" fishgameproduct > 0  ">FISH INCOME ({{currencydetails }})</th>
                      <th>CASH-IN ({{currencydetails }})</th>
                      <th>CASH-OUT ({{currencydetails }})</th>
                      <th>EXPENSES  ({{currencydetails }})</th>
                      
                      <th>CLOSING  ({{currencydetails }})</th>
                       <th>SHORTAGE ({{currencydetails }}) </th>
                     <th >  </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>

                  <tr v-for="shobalrecs in shopbalancingdatarecords.data" :key="shobalrecs.id">
                      
                  <td>{{shobalrecs.id}}</td>
                     <td>{{shobalrecs.datedone}}</td>
                      <td>   <template v-if="shobalrecs.userbalancing_branch">	{{shobalrecs.userbalancing_branch.name}}</template></td>
                    
                       <td>    <template v-if="shobalrecs.branchin_balance">	{{shobalrecs.branchin_balance.branchname}}</template></td>
                         
                               <td>{{formatPrice(shobalrecs.opbalance)}}</td>
                               <td v-if=" soccergameproduct > 0  "> {{formatPrice(shobalrecs.scsales)}}</td>
                       <td v-if=" soccergameproduct > 0  ">{{formatPrice(shobalrecs.scpayout)}}</td>
                       <td v-if=" virtualgameproduct > 0  ">{{formatPrice(shobalrecs.vsales)}}</td>
                       <td v-if=" virtualgameproduct > 0  ">{{formatPrice(shobalrecs.vcan)}}</td>
                       <td v-if=" virtualgameproduct > 0  ">{{formatPrice(shobalrecs.vpay)}}</td>
                       
                    <td v-if=" virtualgameproduct > 0  ">{{formatPrice((shobalrecs.vprof))}}</td>

                    <td v-if=" fishgameproduct > 0  ">{{formatPrice((shobalrecs.fishsales)*shobalrecs.multiplier)}}</td>
                    <td v-if=" fishgameproduct > 0  ">{{formatPrice((shobalrecs.fishpayout)*shobalrecs.multiplier)}}</td>
                    <td v-if=" fishgameproduct > 0  ">{{formatPrice((shobalrecs.fishincome))}}  </td>

<!-- ({{ ((( ((shobalrecs.fishpayout*500) /(shobalrecs.fishsales*500) | round))))*100}}%) -->

                     <td >{{formatPrice((shobalrecs.cashin))}}</td>
                     <td >{{formatPrice((shobalrecs.cashout))}}</td>
                     <td >{{((shobalrecs.expenses))}}</td>
                     <td >{{formatPrice((shobalrecs.clcash))}}</td>
                          

                            <td>
                              <div v-if="((shobalrecs.clcash)-(shobalrecs.reportedcash)) > 0">
                                <span class="cell" style="color:maroon ;">  
   
                    <span style="font-size:1.0em;" center >  {{formatPrice((shobalrecs.clcash)-(shobalrecs.reportedcash))}} </span></span>
                              </div>
                               <div v-if="((shobalrecs.clcash)-(shobalrecs.reportedcash)) < 1">
                                <span class="cell" style="color:green ;">  
   
                    <span style="font-size:1.0em;" center >  {{formatPrice((shobalrecs.clcash)-(shobalrecs.reportedcash))}} </span></span>
                              </div>
                             </td>
                         
                         
                    
                       <td>
                             <button type="button"   class="btn  bg-gradient-info btn-xs fas fa-eye" @focus="checkAccess()"  @click="editModal(shobalrecs)"> View </button>
                            <button type="button" v-if="allowedtodeleteshopBalancingRecord > 0" class="btn  bg-gradient-danger btn-xs fas fa-trash-alt"  @click="deleteShopbalancingrecord(shobalrecs.id)"> Delete </button>
                 
                      </td>
                    </tr>
              
                     
                  </tbody>
              
 
                                   </table>
   
   
                      <div class="card-footer">
                <ul class="pagination pagination-sm m-0 float-right">
                   <pagination :data="allowedrolecomponentsObject" @pagination-change-page="paginationroleAuthorisedcomponents"></pagination>
                </ul>
              </div>
                     
                 
                    </div>
 
 <!-- tab one end -->


<!-- Modal add menu -->
<div class="modal fade" id="addnewintermidiarybalancing">
        <div class="modal-dialog modal-dialog-top modal-xl">
        <div  class="modal-content">
            <div  class="modal-header">
                <h4  v-show="!editmode"    class="modal-title">INTERMIDIARY SHOP BALANCING</h4> 
                <h4  v-show="editmode" class="modal-title" >UPDATE RECORD</h4> 
                <button  type="button" data-dismiss="modal" aria-label="Close" class="close"><span  aria-hidden="true">×</span></button></div> 
   <form class="form-horizontal" @submit.prevent="editmode ? updatebranchpayout():createshopintermidiarybalancing()"> 

                    <div  class="modal-body">
              
            <form @submit.prevent="Saveintermidiarybalancing()">  


                   <div class="form-group row">

                            <label class="col-sm-2 col-form-label">Date </label>
                              <div class="col-sm-6">
                            <input v-model="form.datedone" type="date" name="datedone"
                     class="form-control" :class="{ 'is-invalid': form.errors.has('datedone') }">
                       <has-error :form="form" field="datedone"></has-error>
                              </div>
                 
                        </div>

                    
          

                           <div class="form-group row">

                            <label class="col-sm-2 col-form-label">Branch </label>
                              <div class="col-sm-6">
                          <select name ="branchnametobalance" v-model="form.branchnametobalance" id ="branchnametobalance" v-on:change="myClickEventsavennn" class="form-control" :class="{'is-invalid': form.errors.has('branchnametobalance')}">
                    <option value=" ">  </option>
                    <option v-for='data in mybrancheslist' v-bind:value='data.id'>{{ data.id }} - {{ data.branchname }}</option>
                 
                    </select>
                    <button type="submit" id="submit" hidden="hidden" name= "submit" ref="btnForshopbalancing" class="btn btn-primary btn-sm">Saveit</button>
                    <has-error :form="form" field="branchnametobalance"></has-error>
                              </div>

                        </div>
                
                      
                <div class="form-group">
                         <label><b>BRANCH &nbsp; : </b></label>
                    
                      <span class="cell" style="color:maroon ;">  
   
                   <span style="font-size:1.0em;" right > <b> {{ (shopbalancngname) }}  </b></span></span>
                    <label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;OPENNING     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    
                  <span class="cell" style="color:maroon ;">  
   
                   <span style="font-size:1.5em;" center > {{ (currencydetails) }} {{formatPrice(shopopenningbalance)}}  </span></span> 
                      <label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;CASH-IN  &nbsp;     : 
                        &nbsp;&nbsp;&nbsp;</label>
                    
                     <span class="cell" style="color:maroon ;">  
   
                    <span style="font-size:1.5em;" center > {{ (currencydetails) }}  {{ formatPrice(totaldayscashin) }}  </span></span>
                    <hr>
                  </div>
 
   <div class="form-group">
                       
                   <label> CASH-OUT     &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    : &nbsp;&nbsp;</label>
                    
                     <span class="cell" style="color:maroon ;">  
   
                    <span style="font-size:1.5em;" center > {{ (currencydetails) }} {{ formatPrice(totalcashout) }}  </span></span>

                        <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;EXPENSES     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    
                      <span class="cell" style="color:maroon ;">  
   
                      <span style="font-size:1.5em;" center > {{ (currencydetails) }}  {{ formatPrice(totalexpenses) }}  </span></span> 

                          <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
                          PAYOUT      &nbsp;    : &nbsp;&nbsp;&nbsp;</label>
                    
                     <span class="cell" style="color:maroon ;">  
   
                    <span style="font-size:1.5em;" center > {{currencydetails}} {{ (totalpayout) }}  </span></span>
                    <hr>
                  </div>








                  </form>

<div v-if=" soccergameproduct > 0  ">
  <div class ="bethapa-table-header">SOCCER DETAILS</div>
                
                  <div class="form-group row">

                            <label class="col-sm-2 col-form-label">Sales </label>
                              <div class="col-sm-6">
                            <input v-model="form.scsales" type="text" name="scsales"
            class="form-control" :class="{ 'is-invalid': form.errors.has('scsales') }">
          <has-error :form="form" field="scsales"></has-error>
                              </div>
                 
                        </div>
                      
                      
  <div class="form-group row">

                            <label class="col-sm-2 col-form-label">Tickets </label>
                              <div class="col-sm-6">
                            <input v-model="form.sctkts" type="text" name="sctkts"
        class="form-control" :class="{ 'is-invalid': form.errors.has('sctkts') }">
      <has-error :form="form" field="sctkts"></has-error>
                              </div>
                 
                        </div>


                    </div>

<!-- end of soccer -->

<div v-if=" virtualgameproduct > 0  ">

<div class ="bethapa-table-header">VIRTUAL DETAILS</div>
                       
 <div class="form-group row">

                            <label class="col-sm-2 col-form-label">SALES </label>
                              <div class="col-sm-6">
                             <input v-model="form.vsales" type="text" name="vsales"
        class="form-control" :class="{ 'is-invalid': form.errors.has('vsales') }">
      <has-error :form="form" field="vsales"></has-error>
                              </div>
                 
                        </div>
                         <div class="form-group row">

                            <label class="col-sm-2 col-form-label">Cancelled </label>
                              <div class="col-sm-6">
                          <input v-model="form.vcan" type="text" name="vcan"
        class="form-control" :class="{ 'is-invalid': form.errors.has('vcan') }">
      <has-error :form="form" field="vcan"></has-error>
                              </div>
                 
                        </div>


   <div class="form-group row">

                            <label class="col-sm-2 col-form-label">Redeemed / Payout </label>
                              <div class="col-sm-6">
                              <input v-model="form.vpay" type="text" name="vpay"
        class="form-control" :class="{ 'is-invalid': form.errors.has('vpay') }">
      <has-error :form="form" field="vpay"></has-error>
                              </div>
                 
                        </div>


                          <div class="form-group row">

                            <label class="col-sm-2 col-form-label">Tickets </label>
                              <div class="col-sm-6">
                         <input v-model="form.vtkts" type="number" name="vtkts"
        class="form-control" :class="{ 'is-invalid': form.errors.has('vtkts') }">
      <has-error :form="form" field="vtkts"></has-error>
                              </div>
                 
                        </div>

</div> 
<!-- end of virtual -->

<div v-if=" fishgameproduct > 0  ">


<div class ="bethapa-table-header">Fish Hunting Details {{fishmachinestotal}} </div>

 
 <div v-if=" fishmachinestotal == 1">
 <div class ="bethapa-table-miniheader">Machine one</div>
 <div class="form-group row">

                            <label class="col-sm-2 col-form-label">Openning Code </label>
                              <div class="col-sm-6">

         <b>  {{(machineoneopenningcode)}} </b>
                              </div>
                 
                        </div>
                         <div class="form-group row">

                            <label class="col-sm-2 col-form-label">Current Code </label>
                              <div class="col-sm-6">


                                
      <input v-model="form.machineonecurrentcode" type="number"  readonly 
      class="form-control" name="machineonecurrentcode" id="machineonecurrentcode" 
      :class="{ 'is-invalid': form.errors.has('machineonecurrentcode') }">
      <has-error :form="form" field="machineonecurrentcode"></has-error>
                              </div>
                 
                        </div>




   <div class="form-group row">

                            <label class="col-sm-2 col-form-label">Sales </label>
                              <div class="col-sm-6">
                                 <input :value="form.machineonesales" @keyup="updatemachineoneSales" @keypress="updatemachineoneSales" 
                                  type="number" class="form-control" :class="{ 'is-invalid': form.errors.has('machineonesales') }" name="machineonesales
                                  " id="machineonesales" >
                              
      <has-error :form="form" field="machineonesales"></has-error>
                              </div>
                 
                        </div>


                          <div class="form-group row">

                            <label class="col-sm-2 col-form-label">Payout </label>
                              <div class="col-sm-6">


                       <input :value="form.machineonepayout" @keyup="updatemachineonePayout" @keypress="updatemachineonePayout"
                        type="number" step="any" class="form-control"  
                        :class="{ 'is-invalid': form.errors.has('machineonesales') }" name="machineonepayout" id="machineonepayout" placeholder="Rate">
      <has-error :form="form" field="machineonepayout"></has-error>
                              </div>
                 
                        </div>
   

<!-- <div id="el">
 
  <input :value="form.machineonepayout" @change="updatemachineonePayout" type="number" step="any" class="form-control" name="machineonepayout" id="machineonepayout" placeholder="Rate">
  <input v-model="form.machineonecurrentcode" type="number" step="any" class="form-control" name="machineonecurrentcode" id="machineonecurrentcode" placeholder="Total Price">
</div> -->
 </div>

<!-- end of machine 2 -->

<div v-if=" fishmachinestotal == 2  ">
  <div class ="bethapa-table-miniheader">Machine one</div>
 <div class="form-group row">

                            <label class="col-sm-2 col-form-label">Openning Code </label>
                              <div class="col-sm-6">
                             <input v-model="form.machineoneopenningcode" readonly type="text" name="machineoneopenningcode"
        class="form-control" :class="{ 'is-invalid': form.errors.has('machineoneopenningcode') }">
      <has-error :form="form" field="machineoneopenningcode"></has-error>
                              </div>
                 
                        </div>
                         <div class="form-group row">

                            <label class="col-sm-2 col-form-label">Current Code </label>
                              <div class="col-sm-6">
                          <input v-model="form.machineonecurrentcode" type="text" name="machineonecurrentcode"
        class="form-control" :class="{ 'is-invalid': form.errors.has('machineonecurrentcode') }">
      <has-error :form="form" field="machineonecurrentcode"></has-error>
                              </div>
                 
                        </div>


   <div class="form-group row">

                            <label class="col-sm-2 col-form-label">Sales </label>
                              <div class="col-sm-6">
                              <input v-model="form.vpay" type="text" name="machineonesales"
        class="form-control" :class="{ 'is-invalid': form.errors.has('machineonesales') }">
      <has-error :form="form" field="machineonesales"></has-error>
                              </div>
                 
                        </div>


                          <div class="form-group row">

                            <label class="col-sm-2 col-form-label">Payout </label>
                              <div class="col-sm-6">
                         <input v-model="form.machineonepayout" type="number" name="machineonepayout"
        class="form-control" :class="{ 'is-invalid': form.errors.has('machineonepayout') }">
      <has-error :form="form" field="machineonepayout"></has-error>
                              </div>
                 
                        </div>
     <div class="form-group row">

                            <label class="col-sm-2 col-form-label">Float </label>
                              <div class="col-sm-6">
                         <input v-model="form.machineonefloat" type="number" name="machineonefloat"
        class="form-control" :class="{ 'is-invalid': form.errors.has('machineonefloat') }">
      <has-error :form="form" field="machineonefloat"></has-error>
                              </div>
                 
                        </div>

                        <!-- end of machine 1 -->
 <div class ="bethapa-table-miniheader">Machine Two</div>
 <div class="form-group row">

                            <label class="col-sm-2 col-form-label">Openning Code </label>
                              <div class="col-sm-6">
                             <input v-model="form.machinetwoopenningcode" readonly type="number" name="machinetwoopenningcode"
        class="form-control" :class="{ 'is-invalid': form.errors.has('machinetwoopenningcode') }">
      <has-error :form="form" field="machinetwoopenningcode"></has-error>
                              </div>
                 
                        </div>
                         <div class="form-group row">

                            <label class="col-sm-2 col-form-label">Current Code </label>
                              <div class="col-sm-6">
                          <input v-model="form.machinetwocurrentcode" type="text" name="machinetwocurrentcode"
        class="form-control" :class="{ 'is-invalid': form.errors.has('machinetwocurrentcode') }">
      <has-error :form="form" field="machinetwocurrentcode"></has-error>
                              </div>
                 
                        </div>


   <div class="form-group row">

                            <label class="col-sm-2 col-form-label">Sales </label>
                              <div class="col-sm-6">
                              <input v-model="form.machinetwosales" type="text" name="machinetwosales"
        class="form-control" :class="{ 'is-invalid': form.errors.has('machinetwosales') }">
      <has-error :form="form" field="machinetwosales"></has-error>
                              </div>
                 
                        </div>


                          <div class="form-group row">

                            <label class="col-sm-2 col-form-label">Payout </label>
                              <div class="col-sm-6">
                         <input v-model="form.machinetwopayout" type="number" name="machinetwopayout"
        class="form-control" :class="{ 'is-invalid': form.errors.has('machinetwopayout') }">
      <has-error :form="form" field="machinetwopayout"></has-error>
                              </div>
                 
                        </div>
  


 </div>

<!-- end of machine 2-->


                    

                    </div>

<!-- if fish product exists end -->
                  




                
                 
                 </div>
                 
                  <div  class="modal-footer">
                    <div  v-if="branchbalancedforthisdate < 1" >
                    <button  v-show="!editmode" type="submit" class="btn btn-primary btn-sm">Create</button> 
                    </div>
                      <button v-show="editmode" type="submit" class="btn btn-success btn-sm" >Update</button>
                        <button  type="button" data-dismiss="modal" class="btn btn-danger btn-sm">Close</button >
                        </div>
                 </form>
                       </div>
                          </div>
</div>






<!-- jjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj -->





<div class="modal fade" id="addnewshopbalancingrecord">
        <div class="modal-dialog modal-dialog-top modal-xl">
        <div  class="modal-content">
            <div  class="modal-header">
                <h4  v-show="!editmode"    class="modal-title">Shop Balancing</h4> 
                <h4  v-show="editmode" class="modal-title" >UPDATE RECORD</h4> 
                <button  type="button" data-dismiss="modal" aria-label="Close" class="close"><span  aria-hidden="true">×</span></button></div> 
   <form class="form-horizontal" @submit.prevent="editmode ? updatebranchpayout():createBalancingrecord()"> 

                    <div  class="modal-body">
              
            <form @submit.prevent="SaveRecordbranch()">  


                   <div class="form-group row">

                            <label class="col-sm-2 col-form-label">Date </label>
                              <div class="col-sm-6">
                            <input v-model="form.datedone" type="date" name="datedone"
                     class="form-control" :class="{ 'is-invalid': form.errors.has('datedone') }">
                       <has-error :form="form" field="datedone"></has-error>
                              </div>
                 
                        </div>

                    
          

                           <div class="form-group row">

                            <label class="col-sm-2 col-form-label">Branch </label>
                              <div class="col-sm-6">
                          <select name ="branchnametobalance" v-model="form.branchnametobalance" id ="branchnametobalance" v-on:change="myClickEventsavennn" class="form-control" :class="{'is-invalid': form.errors.has('branchnametobalance')}">
                    <option value=" ">  </option>
                    <option v-for='data in mybrancheslist' v-bind:value='data.id'>{{ data.id }} - {{ data.branchname }}</option>
                 
                    </select>
                    <button type="submit" id="submit" hidden="hidden" name= "submit" ref="btnForshopbalancing" class="btn btn-primary btn-sm">Saveit</button>
                    <has-error :form="form" field="branchnametobalance"></has-error>
                              </div>

                        </div>
                
                      
                <div class="form-group">
                         <label><b>BRANCH &nbsp; : </b></label>
                    
                      <span class="cell" style="color:maroon ;">  
   
                   <span style="font-size:1.0em;" right > <b> {{ (shopbalancngname) }}  </b></span></span>
                    <label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;OPENNING     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    
                  <span class="cell" style="color:maroon ;">  
   
                   <span style="font-size:1.5em;" center > {{ (currencydetails) }} {{formatPrice(shopopenningbalance)}}  </span></span> 
                      <label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;CASH-IN  &nbsp;     : 
                        &nbsp;&nbsp;&nbsp;</label>
                    
                     <span class="cell" style="color:maroon ;">  
   
                    <span style="font-size:1.5em;" center > {{ (currencydetails) }}  {{ formatPrice(totaldayscashin) }}  </span></span>
                    <hr>
                  </div>
 
   <div class="form-group">
                       
                   <label> CASH-OUT     &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    : &nbsp;&nbsp;</label>
                    
                     <span class="cell" style="color:maroon ;">  
   
                    <span style="font-size:1.5em;" center > {{ (currencydetails) }} {{ formatPrice(totalcashout) }}  </span></span>

                        <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;EXPENSES     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    
                      <span class="cell" style="color:maroon ;">  
   
                      <span style="font-size:1.5em;" center > {{ (currencydetails) }}  {{ formatPrice(totalexpenses) }}  </span></span> 

                          <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
                          PAYOUT      &nbsp;    : &nbsp;&nbsp;&nbsp;</label>
                    
                     <span class="cell" style="color:maroon ;">  
   
                    <span style="font-size:1.5em;" center > {{currencydetails}} {{ (totalpayout) }}  </span></span>
                    <hr>
                  </div>








                  </form>

<div v-if=" soccergameproduct > 0  ">
  <div class ="bethapa-table-header">SOCCER DETAILS</div>
                
                  <div class="form-group row">

                            <label class="col-sm-2 col-form-label">Sales </label>
                              <div class="col-sm-6">
                            <input v-model="form.scsales" type="text" name="scsales"
            class="form-control" :class="{ 'is-invalid': form.errors.has('scsales') }">
          <has-error :form="form" field="scsales"></has-error>
                              </div>
                 
                        </div>
                      
                      
  <div class="form-group row">

                            <label class="col-sm-2 col-form-label">Tickets </label>
                              <div class="col-sm-6">
                            <input v-model="form.sctkts" type="text" name="sctkts"
        class="form-control" :class="{ 'is-invalid': form.errors.has('sctkts') }">
      <has-error :form="form" field="sctkts"></has-error>
                              </div>
                 
                        </div>


                    </div>

<!-- end of soccer -->

<div v-if=" virtualgameproduct > 0  ">

<div class ="bethapa-table-header">VIRTUAL DETAILS</div>
                       
 <div class="form-group row">

                            <label class="col-sm-2 col-form-label">SALES </label>
                              <div class="col-sm-6">
                             <input v-model="form.vsales" type="text" name="vsales"
        class="form-control" :class="{ 'is-invalid': form.errors.has('vsales') }">
      <has-error :form="form" field="vsales"></has-error>
                              </div>
                 
                        </div>
                         <div class="form-group row">

                            <label class="col-sm-2 col-form-label">Cancelled </label>
                              <div class="col-sm-6">
                          <input v-model="form.vcan" type="text" name="vcan"
        class="form-control" :class="{ 'is-invalid': form.errors.has('vcan') }">
      <has-error :form="form" field="vcan"></has-error>
                              </div>
                 
                        </div>


   <div class="form-group row">

                            <label class="col-sm-2 col-form-label">Redeemed / Payout </label>
                              <div class="col-sm-6">
                              <input v-model="form.vpay" type="text" name="vpay"
        class="form-control" :class="{ 'is-invalid': form.errors.has('vpay') }">
      <has-error :form="form" field="vpay"></has-error>
                              </div>
                 
                        </div>


                          <div class="form-group row">

                            <label class="col-sm-2 col-form-label">Tickets </label>
                              <div class="col-sm-6">
                         <input v-model="form.vtkts" type="number" name="vtkts"
        class="form-control" :class="{ 'is-invalid': form.errors.has('vtkts') }">
      <has-error :form="form" field="vtkts"></has-error>
                              </div>
                 
                        </div>

</div> 
<!-- end of virtual -->

<div v-if=" fishgameproduct > 0  ">


<div class ="bethapa-table-header">Fish Hunting Details {{fishmachinestotal}} </div>

 
 <div v-if=" fishmachinestotal == 1">
 <div class ="bethapa-table-miniheader">Machine one</div>
 <div class="form-group row">

                            <label class="col-sm-2 col-form-label">Openning Code </label>
                              <div class="col-sm-6">

         <b>  {{(machineoneopenningcode)}} </b>
                              </div>
                 
                        </div>
                         <div class="form-group row">

                            <label class="col-sm-2 col-form-label">Current Code </label>
                              <div class="col-sm-6">


                                
      <input v-model="form.machineonecurrentcode" type="number"  readonly 
      class="form-control" name="machineonecurrentcode" id="machineonecurrentcode" 
      :class="{ 'is-invalid': form.errors.has('machineonecurrentcode') }">
      <has-error :form="form" field="machineonecurrentcode"></has-error>
                              </div>
                 
                        </div>




   <div class="form-group row">

                            <label class="col-sm-2 col-form-label">Sales </label>
                              <div class="col-sm-6">
                                 <input :value="form.machineonesales" @keyup="updatemachineoneSales" @keypress="updatemachineoneSales" 
                                  type="number" class="form-control" :class="{ 'is-invalid': form.errors.has('machineonesales') }" name="machineonesales
                                  " id="machineonesales" >
                              
      <has-error :form="form" field="machineonesales"></has-error>
                              </div>
                 
                        </div>


                          <div class="form-group row">

                            <label class="col-sm-2 col-form-label">Payout </label>
                              <div class="col-sm-6">


                       <input :value="form.machineonepayout" @keyup="updatemachineonePayout" @keypress="updatemachineonePayout"
                        type="number" step="any" class="form-control"  
                        :class="{ 'is-invalid': form.errors.has('machineonesales') }" name="machineonepayout" id="machineonepayout" placeholder="Rate">
      <has-error :form="form" field="machineonepayout"></has-error>
                              </div>
                 
                        </div>
     <div class="form-group row">

                            <label class="col-sm-2 col-form-label">Float </label>
                              <div class="col-sm-6">
                         <input v-model="form.machineonefloat" type="number" name="machineonefloat"
        class="form-control" :class="{ 'is-invalid': form.errors.has('machineonefloat') }">
      <has-error :form="form" field="machineonefloat"></has-error>
                              </div>
                 
                        </div>

<!-- <div id="el">
 
  <input :value="form.machineonepayout" @change="updatemachineonePayout" type="number" step="any" class="form-control" name="machineonepayout" id="machineonepayout" placeholder="Rate">
  <input v-model="form.machineonecurrentcode" type="number" step="any" class="form-control" name="machineonecurrentcode" id="machineonecurrentcode" placeholder="Total Price">
</div> -->
 </div>

<!-- end of machine 2 -->

<div v-if=" fishmachinestotal == 2  ">
  <div class ="bethapa-table-miniheader">Machine one</div>
 <div class="form-group row">

                            <label class="col-sm-2 col-form-label">Openning Code </label>
                              <div class="col-sm-6">
                             <input v-model="form.machineoneopenningcode" readonly type="text" name="machineoneopenningcode"
        class="form-control" :class="{ 'is-invalid': form.errors.has('machineoneopenningcode') }">
      <has-error :form="form" field="machineoneopenningcode"></has-error>
                              </div>
                 
                        </div>
                         <div class="form-group row">

                            <label class="col-sm-2 col-form-label">Current Code </label>
                              <div class="col-sm-6">
                          <input v-model="form.machineonecurrentcode" type="text" name="machineonecurrentcode"
        class="form-control" :class="{ 'is-invalid': form.errors.has('machineonecurrentcode') }">
      <has-error :form="form" field="machineonecurrentcode"></has-error>
                              </div>
                 
                        </div>


   <div class="form-group row">

                            <label class="col-sm-2 col-form-label">Sales </label>
                              <div class="col-sm-6">
                              <input v-model="form.vpay" type="text" name="machineonesales"
        class="form-control" :class="{ 'is-invalid': form.errors.has('machineonesales') }">
      <has-error :form="form" field="machineonesales"></has-error>
                              </div>
                 
                        </div>


                          <div class="form-group row">

                            <label class="col-sm-2 col-form-label">Payout </label>
                              <div class="col-sm-6">
                         <input v-model="form.machineonepayout" type="number" name="machineonepayout"
        class="form-control" :class="{ 'is-invalid': form.errors.has('machineonepayout') }">
      <has-error :form="form" field="machineonepayout"></has-error>
                              </div>
                 
                        </div>
     <div class="form-group row">

                            <label class="col-sm-2 col-form-label">Float </label>
                              <div class="col-sm-6">
                         <input v-model="form.machineonefloat" type="number" name="machineonefloat"
        class="form-control" :class="{ 'is-invalid': form.errors.has('machineonefloat') }">
      <has-error :form="form" field="machineonefloat"></has-error>
                              </div>
                 
                        </div>

                        <!-- end of machine 1 -->
 <div class ="bethapa-table-miniheader">Machine Two</div>
 <div class="form-group row">

                            <label class="col-sm-2 col-form-label">Openning Code </label>
                              <div class="col-sm-6">
                             <input v-model="form.machinetwoopenningcode" readonly type="number" name="machinetwoopenningcode"
        class="form-control" :class="{ 'is-invalid': form.errors.has('machinetwoopenningcode') }">
      <has-error :form="form" field="machinetwoopenningcode"></has-error>
                              </div>
                 
                        </div>
                         <div class="form-group row">

                            <label class="col-sm-2 col-form-label">Current Code </label>
                              <div class="col-sm-6">
                          <input v-model="form.machinetwocurrentcode" type="text" name="machinetwocurrentcode"
        class="form-control" :class="{ 'is-invalid': form.errors.has('machinetwocurrentcode') }">
      <has-error :form="form" field="machinetwocurrentcode"></has-error>
                              </div>
                 
                        </div>


   <div class="form-group row">

                            <label class="col-sm-2 col-form-label">Sales </label>
                              <div class="col-sm-6">
                              <input v-model="form.machinetwosales" type="text" name="machinetwosales"
        class="form-control" :class="{ 'is-invalid': form.errors.has('machinetwosales') }">
      <has-error :form="form" field="machinetwosales"></has-error>
                              </div>
                 
                        </div>


                          <div class="form-group row">

                            <label class="col-sm-2 col-form-label">Payout </label>
                              <div class="col-sm-6">
                         <input v-model="form.machinetwopayout" type="number" name="machinetwopayout"
        class="form-control" :class="{ 'is-invalid': form.errors.has('machinetwopayout') }">
      <has-error :form="form" field="machinetwopayout"></has-error>
                              </div>
                 
                        </div>
     <div class="form-group row">

                            <label class="col-sm-2 col-form-label">Float </label>
                              <div class="col-sm-6">
                         <input v-model="form.machonetwofloat" type="number" name="machonetwofloat"
        class="form-control" :class="{ 'is-invalid': form.errors.has('machonetwofloat') }">
      <has-error :form="form" field="machonetwofloat"></has-error>
                              </div>
                 
                        </div>


 </div>

<!-- end of machine 2-->


                    

                    </div>

<!-- if fish product exists end -->



















                        <div class ="bethapa-table-header">Shop Details</div>


  <div class="form-group row">

                            <label class="col-sm-2 col-form-label">Cash at Hand </label>
                              <div class="col-sm-6">
                             <input v-model="form.reportedcash" type="text" name="reportedcash"
        class="form-control" :class="{ 'is-invalid': form.errors.has('reportedcash') }">
      <has-error :form="form" field="reportedcash"></has-error>
                              </div>
                 
                        </div>


                          <div class="form-group row">

                            <label class="col-sm-2 col-form-label">Comment </label>
                              <div class="col-sm-6">
                         <textarea v-model="form.bio" type="text" name="bio"
        class="form-control" :class="{ 'is-invalid': form.errors.has('bio') }"></textarea>
      <has-error :form="form" field="bio"></has-error>
                              </div>
                 
                        </div>




                
                 
                 </div>
                 
                  <div  class="modal-footer">
                    <div  v-if="branchbalancedforthisdate < 1" >
                    <button  v-show="!editmode" type="submit" class="btn btn-primary btn-sm">Create</button> 
                    </div>
                      <button v-show="editmode" type="submit" class="btn btn-success btn-sm" >Update</button>
                        <button  type="button" data-dismiss="modal" class="btn btn-danger btn-sm">Close</button >
                        </div>
                 </form>
                       </div>
                          </div>


                          
                

 </div>
<!-- End od pane -->
                    <div class="tab-pane fade" id="custom-tabs-two-four" role="tabpanel" aria-labelledby="custom-tabs-two-four-tab">
                                                     
            <!-- <form @submit.prevent="SaveRoletoaddformcomponent()">
                  
                  
                    <div class="form-group">
                  <label>Role</label>
                    <select name ="roletoallow" v-model="form.roletoallow" id ="roletoallow"   :class="{'is-invalid': form.errors.has('roletoallow')}">
                    <option value=" ">  </option>
                    <option v-for='data in roleslist' v-bind:value='data.id'>{{ data.id }} - {{ data.rolename }}</option>

                    </select>
                    

                                <has-error :form="form" field="roletoallow"></has-error>


                     <label>Component</label>
                    <select name ="componentto" v-model="form.componentto" id ="componentto"   :class="{'is-invalid': form.errors.has('componentto')}">
                    <option value=" ">  </option>
                    <option v-for='data in componentslist' v-bind:value='data.sysname'> ({{ data.sysname }}) - {{ data.componentname }}</option>

                    </select>
                    

                                <has-error :form="form" field="componentto"></has-error>
                       <button type="submit" id="submit" name= "submit" ref="myBtn" class="btn btn-info btn-sm">Proceed</button>
                                    </div>
                                </form> -->
                  
                       <div class="bethapa-table-header">
                    CASH COLLECTION DETAILS <button v-if="allowedtoaddnewcashcollection > 0" type="button" class="add-newm" @click="newCashcollection" >Make COllection </button>
                     </div>


                      <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                     <th>#</th>
                      
                      <th>DATE</th>
                      <th>BRANCH</th>
                     
                      <th>FROM </th>
                      
                      <th>AMOUNT  ({{currencydetails }})</th>
                      <th>USER INITIATED</th>
                        <th>APPROVED</th>
                         <th>USER - APPROVED</th>
                         <th>STATUS</th>
                     <th >  </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>

                              <tr v-for="alladmincashcollection in admincashindatarecords.data" :key="alladmincashcollection.id">
                      
                 
                  
                
                      
                         
                             <td>{{alladmincashcollection.id}}</td>
                       <td>{{(alladmincashcollection.transferdate)}}</td>
                       <td>   <template v-if="alladmincashcollection.branch_name">	{{alladmincashcollection.branch_name.branchname}}</template></td>
                       <td> <template v-if="alladmincashcollection.branch_namefrom">	{{alladmincashcollection.branch_namefrom.branchname}}</template></td>
                       <td> {{formatPrice(alladmincashcollection.amount)}}</td>
                       <td> <template v-if="alladmincashcollection.cerated_userdetails">	{{alladmincashcollection.cerated_userdetails.name}}</template></td>
                       <td>{{(alladmincashcollection.comptime)}}</td>
                       <td> <template v-if="alladmincashcollection.approved_userdetails">	{{alladmincashcollection.approved_userdetails.name}}</template></td>
                       <td> <template v-if="alladmincashcollection.status_name">	{{alladmincashcollection.status_name.name}}</template></td>
                           
                        <td>
                          
      <button type="button" v-if="allowedtoeditadmincashcollection > 0 "   class="btn  bg-gradient-secondary btn-xs fas fa-edit"  @click="editBranchexpenserecord(alladmincashcollection)">Edit</button>
      <button type="button" v-if="allowedtodeleteadmincashcollection > 0 " class="btn  bg-gradient-danger btn-xs fas fa-trash-alt" @click="deleteBranchexpenserecord(alladmincashcollection.id)"> DEl </button>




                             
                              </td>

               
                              
                               
                    </tr>
              
                     
                  </tbody>
              
 
                                   </table>
   
   
                      <div class="card-footer">
                <ul class="pagination pagination-sm m-0 float-right">
                   <pagination :data="allowedrolecomponentfeaturesObject" @pagination-change-page="paginationroleAuthorisedcomponentsfeature"></pagination>
                </ul>
              </div>
                     
                 
                    </div>
 
 <!-- tab one end -->


<!-- Modal add menu -->
<div class="modal fade" id="addnewcashcollection">
        <div class="modal-dialog modal-dialog-top modal-lg">
        <div  class="modal-content">
            <div  class="modal-header">
                <h4  v-show="!editmode"    class="modal-title">CASH  COLLECTION</h4> 
                <h4  v-show="editmode" class="modal-title" >UPDATE RECORD</h4> 
                <button  type="button" data-dismiss="modal" aria-label="Close" class="close"><span  aria-hidden="true">×</span></button></div> 
                 <form class="form-horizontal" @submit.prevent="editmode ? updatebranchpayout():CreateNewcashcollection()"> 

                    <div  class="modal-body">
              
              
               <form @submit.prevent="SavetheCollectionbranch()">
  
  
   <div class="form-group">


                
  
  
                   <div class="form-group">
                         <label><b>BRANCH&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b></label>
                    
                      <span class="cell" style="color:maroon ;">  
   
                   <span style="font-size:1.0em;" right > <b> {{ (shopbalancngname) }}  </b></span></span>
                 
                    <hr>
                       <label><b>B/F &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b></label>
                    
                      <span class="cell" style="color:maroon ;">  
   
                   <span style="font-size:1.0em;" right > <b> {{currencydetails}} {{ formatPrice(shopopenningbalancecacollectpoint) }}   </b></span></span>
                 
                    <hr>
                  </div>

                    
                   

                   
                          </div>




<div class ="bethapa-table-header">COLLECTION</div>
                  
   <div class="form-group row">
                   <label class="col-sm-2 col-form-label">Branch </label>
                              <div class="col-sm-6">
                        <select name ="branchnametobalance" v-model="form.branchnametobalance" id ="branchnametobalance" v-on:change="myClickEventdddd" class="form-control" :class="{'is-invalid': form.errors.has('branchnametobalance')}">
                    <option value=" ">  </option>
                    <option v-for='data in brancheslist' v-bind:value='data.branchno'>{{ data.branchno }} - {{ data.branchname }}</option>

                    </select>
                    <button type="submit" id="submit" hidden="hidden" name= "submit" ref="myBtn89" class="btn btn-primary btn-sm">Saveit</button>

                                <has-error :form="form" field="branchnametobalance"></has-error>
                              </div>

                        </div>
  
  
  
  
  
               
 
</form>

                                  
                 <div class="form-group row">
                   <label class="col-sm-2 col-form-label">Date </label>
                              <div class="col-sm-6">
                           <input v-model="form.transferdate" type="date" name="transferdate"
                     class="form-control form-control-sm" :class="{ 'is-invalid': form.errors.has('transferdate') }">
                       <has-error :form="form" field="transferdate"></has-error>
                              </div>

                        </div>
  
                      
               <div class="form-group row">
                   <label class="col-sm-2 col-form-label">Amount </label>
                              <div class="col-sm-6">
                          <input v-model="form.amount" type="number" name="amount"
        class="form-control form-control-sm" :class="{ 'is-invalid': form.errors.has('amount') }">
      <has-error :form="form" field="amount"></has-error>
                              </div>

                        </div>
  <div class="form-group row">
                   <label class="col-sm-2 col-form-label">Comment </label>
                              <div class="col-sm-6">
                          <textarea v-model="form.description" type="text" name="description"
        class="form-control form-control-sm" :class="{ 'is-invalid': form.errors.has('description') }"></textarea>
      <has-error :form="form" field="description"></has-error>
                              </div>

                        </div>
                      
                      
                
                 
                 </div>
                 
                  <div  class="modal-footer">
                    <button  v-show="!editmode" type="submit" class="btn btn-primary btn-sm">Create</button> 
                      <button v-show="editmode" type="submit" class="btn btn-success btn-sm" >Update</button>
                        <button  type="button" data-dismiss="modal" class="btn btn-danger btn-sm">Close</button >
                        </div>
                 </form>
                       </div>
                          </div>
                
                  
                  
                  
                  </div>

<!-- End of pane -->

                <div class="tab-pane fade" id="custom-tabs-two-five" role="tabpanel" aria-labelledby="custom-tabs-two-five-tab">
                     
                <!-- <form @submit.prevent="SaveRoletoaddformcomponent()">
                  
                  
                    <div class="form-group">
                  <label>Role</label>
                    <select name ="roletoallow" v-model="form.roletoallow" id ="roletoallow"   :class="{'is-invalid': form.errors.has('roletoallow')}">
                    <option value=" ">  </option>
                    <option v-for='data in roleslist' v-bind:value='data.id'>{{ data.id }} - {{ data.rolename }}</option>

                    </select>
                    

                                <has-error :form="form" field="roletoallow"></has-error>


                     <label>Component</label>
                    <select name ="componentto" v-model="form.componentto" id ="componentto"   :class="{'is-invalid': form.errors.has('componentto')}">
                    <option value=" ">  </option>
                    <option v-for='data in componentslist' v-bind:value='data.sysname'> ({{ data.sysname }}) - {{ data.componentname }}</option>

                    </select>
                    

                                <has-error :form="form" field="componentto"></has-error>
                       <button type="submit" id="submit" name= "submit" ref="myBtn" class="btn btn-info btn-sm">Proceed</button>
                                    </div>
                                </form> -->
                  
                       <div class="bethapa-table-header">
                    CASH CREDIT DETAILS <button v-if="allowedtoaddnewcashcredit > 0" type="button" class="add-newm" @click="newCashcredit" >Make Credit </button>
                     </div>


                      <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                   <th>#</th>
                      
                      <th>DATE</th>
                      <th>BRANCH</th>
                     
                      <th>DESTINATION </th>
                      
                      <th>AMOUNT  ({{currencydetails }})</th>
                      <th>ASKED BY</th>
                        <th>APPROVED</th>
                         <th>USER - APPROVED</th>
                         <th>STATUS</th>
                     <th >  </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>

                              <tr v-for="alladmincashouts in admincashoutrecords.data" :key="alladmincashouts.id">
                      
                 
                  
                
                      
                         
                             <td>{{alladmincashouts.id}}</td>
                       <td>{{(alladmincashouts.transferdate)}}</td>
                       <td>   <template v-if="alladmincashouts.branch_name">	{{alladmincashouts.branch_name.branchname}}</template></td>
                       <td> <template v-if="alladmincashouts.branch_namefrom">	{{alladmincashouts.branch_namefrom.branchname}}</template></td>
                       <td> {{formatPrice(alladmincashouts.amount)}}</td>
                       <td> <template v-if="alladmincashouts.cerated_userdetails">	{{alladmincashouts.cerated_userdetails.name}}</template></td>
                       <td>{{(alladmincashouts.comptime)}}</td>
                       <td> <template v-if="alladmincashouts.approved_userdetails">	{{alladmincashouts.approved_userdetails.name}}</template></td>
                       <td> <template v-if="alladmincashouts.status_name">	{{alladmincashouts.status_name.name}}</template></td>
                           
                        <td>
                          
      <button type="button" v-if="allowedtoeditadmincashcredit > 0 "   class="btn  bg-gradient-secondary btn-xs fas fa-edit"  @click="editcashcredit(alladmincashouts)">Edit</button>
      <button type="button" v-if="allowedtodeleteadmincashcredit> 0 " class="btn  bg-gradient-danger btn-xs fas fa-trash-alt" @click="deletecashcredit(alladmincashouts.id)"> DEl </button>




                             
                              </td>

               
                              
                               
                    </tr>
              
                     
                  </tbody>
              
 
                                   </table>
   
   
                      <div class="card-footer">
                <ul class="pagination pagination-sm m-0 float-right">
                   <pagination :data="allowedrolecomponentfeaturesObject" @pagination-change-page="paginationroleAuthorisedcomponentsfeature"></pagination>
                </ul>
              </div>
                     
                 
                    </div>
 
 <!-- tab one end -->


<!-- Modal add menu -->
<div class="modal fade" id="addnewcashcredit">
        <div class="modal-dialog modal-dialog-top modal-lg">
        <div  class="modal-content">
            <div  class="modal-header">
                <h4  v-show="!editmode"    class="modal-title">Credit Cash</h4> 
                <h4  v-show="editmode" class="modal-title" >UPDATE RECORD</h4> 
                <button  type="button" data-dismiss="modal" aria-label="Close" class="close"><span  aria-hidden="true">×</span></button></div> 
                 <form class="form-horizontal" @submit.prevent="editmode ? updatebranchpayout():CreateNewcashcredit()"> 

                    <div  class="modal-body">
              
              
               <form @submit.prevent="SavetheCollectionbranch()">
  
  
   <div class="form-group">


                
  
  
                   <div class="form-group">
                         <label><b>BRANCH&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b></label>
                    
                      <span class="cell" style="color:maroon ;">  
   
                   <span style="font-size:1.0em;" right > <b> {{ (shopbalancngname) }}  </b></span></span>
                 
                    <hr>
                       <label><b>B/F &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b></label>
                    
                      <span class="cell" style="color:maroon ;">  
   
                   <span style="font-size:1.0em;" right > <b> {{currencydetails}} {{ formatPrice(shopopenningbalancecacollectpoint) }}   </b></span></span>
                 
                    <hr>
                  </div>

                    
                   

                   
                          </div>




<div class ="bethapa-table-header">Credit Details</div>
                  
   <div class="form-group row">
                   <label class="col-sm-2 col-form-label">Branch </label>
                              <div class="col-sm-6">
                        <select name ="branchnametobalance" v-model="form.branchnametobalance" id ="branchnametobalance" v-on:change="myClickEventdddd" class="form-control" :class="{'is-invalid': form.errors.has('branchnametobalance')}">
                    <option value=" ">  </option>
                    <option v-for='data in brancheslist' v-bind:value='data.branchno'>{{ data.branchno }} - {{ data.branchname }}</option>

                    </select>
                    <button type="submit" id="submit" hidden="hidden" name= "submit" ref="myBtn89" class="btn btn-primary btn-sm">Saveit</button>

                                <has-error :form="form" field="branchnametobalance"></has-error>
                              </div>

                        </div>
  
  
  
  
  
               
 
</form>

                                  
                 <div class="form-group row">
                   <label class="col-sm-2 col-form-label">Date </label>
                              <div class="col-sm-6">
                           <input v-model="form.transferdate" type="date" name="transferdate"
                     class="form-control form-control-sm" :class="{ 'is-invalid': form.errors.has('transferdate') }">
                       <has-error :form="form" field="transferdate"></has-error>
                              </div>

                        </div>
  
                      
               <div class="form-group row">
                   <label class="col-sm-2 col-form-label">Amount </label>
                              <div class="col-sm-6">
                          <input v-model="form.amount" type="number" name="amount"
        class="form-control form-control-sm" :class="{ 'is-invalid': form.errors.has('amount') }">
      <has-error :form="form" field="amount"></has-error>
                              </div>

                        </div>
  <div class="form-group row">
                   <label class="col-sm-2 col-form-label">Comment </label>
                              <div class="col-sm-6">
                          <textarea v-model="form.description" type="text" name="description"
        class="form-control form-control-sm" :class="{ 'is-invalid': form.errors.has('description') }"></textarea>
      <has-error :form="form" field="description"></has-error>
                              </div>

                        </div>
                      
                      
                
                 
                 </div>
                 
                  <div  class="modal-footer">
                    <button  v-show="!editmode" type="submit" class="btn btn-primary btn-sm">Create</button> 
                      <button v-show="editmode" type="submit" class="btn btn-success btn-sm" >Update</button>
                        <button  type="button" data-dismiss="modal" class="btn btn-danger btn-sm">Close</button >
                        </div>
                 </form>
                       </div>
                          </div>
                      





















                  </div>




  <div class="tab-pane fade" id="custom-tabs-two-six" role="tabpanel" aria-labelledby="custom-tabs-two-six-tab">

    <!-- <form @submit.prevent="SaveRoletoaddformcomponent()">
                  
                  
                    <div class="form-group">
                  <label>Role</label>
                    <select name ="roletoallow" v-model="form.roletoallow" id ="roletoallow"   :class="{'is-invalid': form.errors.has('roletoallow')}">
                    <option value=" ">  </option>
                    <option v-for='data in roleslist' v-bind:value='data.id'>{{ data.id }} - {{ data.rolename }}</option>

                    </select>
                    

                                <has-error :form="form" field="roletoallow"></has-error>


                     <label>Component</label>
                    <select name ="componentto" v-model="form.componentto" id ="componentto"   :class="{'is-invalid': form.errors.has('componentto')}">
                    <option value=" ">  </option>
                    <option v-for='data in componentslist' v-bind:value='data.sysname'> ({{ data.sysname }}) - {{ data.componentname }}</option>

                    </select>
                    

                                <has-error :form="form" field="componentto"></has-error>
                       <button type="submit" id="submit" name= "submit" ref="myBtn" class="btn btn-info btn-sm">Proceed</button>
                                    </div>
                                </form> -->
                  
                       <div class="bethapa-table-header">
                         <!-- v-if="allowedtoaddnewcashcollection > 0" -->
                    Fish COLLECTION DETAILS <button  type="button" class="add-newm" @click="newCashcollection" >Collect / Debit Cash </button>
                     </div>


                   <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                       <th>#</th>
                      
                      <th>DATE</th>
                      <th>BRANCH</th>
                     
                      <th>FROM </th>
                      
                      <th>AMOUNT  ({{currencydetails }})</th>
                      <th>USER INITIATED</th>
                        <th>APPROVED</th>
                         <th>USER - APPROVED</th>
                         <th>STATUS</th>
                         <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>

                   <tr v-for="fishcoll in fishcollectionrecords.data" :key="fishcoll.id">
                       <td>{{fishcoll.id}}</td>
                       <td>{{(fishcoll.transferdate)}}</td>
                       <td>   <template v-if="fishcoll.branch_name">	{{fishcoll.branch_name.branchname}}</template></td>
                       <td> <template v-if="fishcoll.branch_namefrom">	{{fishcoll.branch_namefrom.branchname}}</template></td>
                       <td> {{formatPrice(fishcoll.amount)}}</td>
                       <td> <template v-if="fishcoll.cerated_userdetails">	{{fishcoll.cerated_userdetails.name}}</template></td>
                       <td>{{(fishcoll.comptime)}}</td>
                       <td> <template v-if="fishcoll.approved_userdetails">	{{fishcoll.approved_userdetails.name}}</template></td>
                       <td> <template v-if="fishcoll.status_name">	{{fishcoll.status_name.name}}</template></td>
                     <td>
                       <button v-show="fishcoll.status < 1" type="button"   class="btn  bg-gradient-secondary btn-xs"  @click="confirmFishcashin(fishcoll.id)"> Confirm Collection </button>
                       <!-- <button v-show="fishcoll.status === 1" type="button"   class="btn  bg-gradient-success btn-xs"  > Confirmed  </button> -->
                       <div v-if="allowedtodeletecollection > 0">
                           <button type="button"  class="btn  bg-gradient-danger btn-xs fas fa-trash-alt" @click="deletecashcollection(fishcoll.id)"> Delete Collection </button>
                       </div>
                       <!-- <button type="button"  v-show="fishcoll.status < 1"   class="btn  bg-gradient-secondary btn-xs fas fa-edit"  @click="editfishcollection(fishcollectionrecords)">Edit</button>
                             <button type="button"  v-show="fishcoll.status < 1" class="btn  bg-gradient-danger btn-xs fas fa-trash-alt" @click="deletecashcollection(fishcollectionrecords.id)"> DEl </button> -->



                       </td>
                  
                     
                    </tr>
              
                     
                  </tbody>
              
 
                                   </table>
    <div class="card-footer">
                <ul class="pagination pagination-sm m-0 float-right">
                   <pagination :data="shopcashoutrecords" @pagination-change-page="paginationResultsBranches"></pagination>
                </ul>
              </div>
                 
                    </div>
 
 <!-- tab one end -->


<!-- Modal add menu -->
<div class="modal fade" id="addnewcashcollection">
        <div class="modal-dialog modal-dialog-top modal-lg">
        <div  class="modal-content">
            <div  class="modal-header">
                <h4  v-show="!editmode"    class="modal-title">CASH  COLLECTION</h4> 
                <h4  v-show="editmode" class="modal-title" >UPDATE RECORD</h4> 
                <button  type="button" data-dismiss="modal" aria-label="Close" class="close"><span  aria-hidden="true">×</span></button></div> 
                 <form class="form-horizontal" @submit.prevent="editmode ? updatebranchpayout():CreateNewcashcollection()"> 

                    <div  class="modal-body">
              
              
               <form @submit.prevent="SavetheCollectionbranch()">
  
  
   <div class="form-group">


                
  
  
                   <div class="form-group">
                         <label><b>BRANCH&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b></label>
                    
                      <span class="cell" style="color:maroon ;">  
   
                   <span style="font-size:1.0em;" right > <b> {{ (shopbalancngname) }}  </b></span></span>
                 
                    <hr>
                       <label><b>B/F &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b></label>
                    
                      <span class="cell" style="color:maroon ;">  
   
                   <span style="font-size:1.0em;" right > <b> {{currencydetails}} {{ formatPrice(shopopenningbalancecacollectpoint) }}   </b></span></span>
                 
                    <hr>
                  </div>

                    
                   

                   
                          </div>




<div class ="bethapa-table-header">COLLECTION</div>
                  
   <div class="form-group row">
                   <label class="col-sm-2 col-form-label">Branch </label>
                              <div class="col-sm-6">
                        <select name ="branchnametobalance" v-model="form.branchnametobalance" id ="branchnametobalance" v-on:change="myClickEventdddd" class="form-control" :class="{'is-invalid': form.errors.has('branchnametobalance')}">
                    <option value=" ">  </option>
                    <option v-for='data in brancheslist' v-bind:value='data.branchno'>{{ data.branchno }} - {{ data.branchname }}</option>

                    </select>
                    <button type="submit" id="submit" hidden="hidden" name= "submit" ref="myBtn89" class="btn btn-primary btn-sm">Saveit</button>

                                <has-error :form="form" field="branchnametobalance"></has-error>
                              </div>

                        </div>
  
  
  
  
  
               
 
</form>

                                  
                 <div class="form-group row">
                   <label class="col-sm-2 col-form-label">Date </label>
                              <div class="col-sm-6">
                           <input v-model="form.transferdate" type="date" name="transferdate"
                     class="form-control form-control-sm" :class="{ 'is-invalid': form.errors.has('transferdate') }">
                       <has-error :form="form" field="transferdate"></has-error>
                              </div>

                        </div>
  
                      
               <div class="form-group row">
                   <label class="col-sm-2 col-form-label">Amount </label>
                              <div class="col-sm-6">
                          <input v-model="form.amount" type="number" name="amount"
        class="form-control form-control-sm" :class="{ 'is-invalid': form.errors.has('amount') }">
      <has-error :form="form" field="amount"></has-error>
                              </div>

                        </div>
  <div class="form-group row">
                   <label class="col-sm-2 col-form-label">Comment </label>
                              <div class="col-sm-6">
                          <textarea v-model="form.description" type="text" name="description"
        class="form-control form-control-sm" :class="{ 'is-invalid': form.errors.has('description') }"></textarea>
      <has-error :form="form" field="description"></has-error>
                              </div>

                        </div>
                      
                      
                
                 
                 </div>
                 
                  <div  class="modal-footer">
                    <button  v-show="!editmode" type="submit" class="btn btn-primary btn-sm">Create</button> 
                      <button v-show="editmode" type="submit" class="btn btn-success btn-sm" >Update</button>
                        <button  type="button" data-dismiss="modal" class="btn btn-danger btn-sm">Close</button >
                        </div>
                 </form>
                       </div>
                          </div>
                <!-- mmmm -->
                  </div>

<!-- end of tabb -->
                    <div class="tab-pane fade" id="custom-tabs-two-seven" role="tabpanel" aria-labelledby="custom-tabs-two-seven-tab">
                    
                    
  <!-- <form @submit.prevent="SaveRoletoaddformcomponent()">
                  
                  
                    <div class="form-group">
                  <label>Role</label>
                    <select name ="roletoallow" v-model="form.roletoallow" id ="roletoallow"   :class="{'is-invalid': form.errors.has('roletoallow')}">
                    <option value=" ">  </option>
                    <option v-for='data in roleslist' v-bind:value='data.id'>{{ data.id }} - {{ data.rolename }}</option>

                    </select>
                    

                                <has-error :form="form" field="roletoallow"></has-error>


                     <label>Component</label>
                    <select name ="componentto" v-model="form.componentto" id ="componentto"   :class="{'is-invalid': form.errors.has('componentto')}">
                    <option value=" ">  </option>
                    <option v-for='data in componentslist' v-bind:value='data.sysname'> ({{ data.sysname }}) - {{ data.componentname }}</option>

                    </select>
                    

                                <has-error :form="form" field="componentto"></has-error>
                       <button type="submit" id="submit" name= "submit" ref="myBtn" class="btn btn-info btn-sm">Proceed</button>
                                    </div>
                                </form> -->
                  
                       <div class="bethapa-table-header">
                         <!-- v-if="allowedtoaddnewcashcollection > 0" -->
                    FISH CASH CREDIT DETAILS
                     <!-- <button  type="button" class="add-newm" @click="newCashcreditfish" >Credit / Give Cash</button> -->
                    <button type="button" class="add-newm" @click="newCashcredit" >Make Credit </button>
                     </div>


                      <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                       <th>#</th>
                      
                      <th>DATE</th>
                      <th>BRANCH</th>
                     
                      <th>FROM </th>
                      
                      <th>AMOUNT  ({{currencydetails }})</th>
                      <th>USER INITIATED</th>
                        <th>APPROVED</th>
                         <th>USER - APPROVED</th>
                         <th>STATUS</th>
                         <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>

                   <tr v-for="cinshopt in fishcashcreditrecords.data" :key="cinshopt.id">
                       <td>{{cinshopt.id}}</td>
                       <td>{{(cinshopt.transferdate)}}</td>
                       <td>   <template v-if="cinshopt.branch_name">	{{cinshopt.branch_name.branchname}}</template></td>
                       <td> <template v-if="cinshopt.branch_namefrom">	{{cinshopt.branch_namefrom.branchname}}</template></td>
                       <td> {{formatPrice(cinshopt.amount)}}</td>
                       <td> <template v-if="cinshopt.cerated_userdetails">	{{cinshopt.cerated_userdetails.name}}</template></td>
                       <td>{{(cinshopt.comptime)}}</td>
                       <td> <template v-if="cinshopt.approved_userdetails">	{{cinshopt.approved_userdetails.name}}</template></td>
                       <td> <template v-if="cinshopt.status_name">	{{cinshopt.status_name.name}}</template></td>
                     <td>
                       <button v-show="cinshopt.status < 1" type="button"   class="btn  bg-gradient-secondary btn-xs"  @click="confirmCashouttransfer(cinshopt.id)"> Confirm Fish Credit </button>
                       <!-- <button v-show="cinshopt.status === 1" type="button"   class="btn  bg-gradient-success btn-xs"  > Confirmed  </button> -->
                       <div v-if="allowedtodeletecredit > 0">
                        <button type="button"  class="btn  bg-gradient-danger btn-xs fas fa-trash-alt" @click="deletecashcreditcollection(cinshopt.id)"> Delete Credit </button>
                       </div>

                       </td>
                  
                     
                    </tr>
              
                     
                  </tbody>
              
 
                                   </table>
                
    <div class="card-footer">
                <ul class="pagination pagination-sm m-0 float-right">
                   <pagination :data="shopcashoutrecords" @pagination-change-page="paginationResultsBranches"></pagination>
                </ul>
              </div>
                 
                    </div>
 
 <!-- tab one end -->


<!-- Modal add menu -->
<div class="modal fade" id="addnewcashCreditfish">
        <div class="modal-dialog modal-dialog-top modal-lg">
        <div  class="modal-content">
            <div  class="modal-header">
                <h4  v-show="!editmode"    class="modal-title">CREDIT BRANCH WITH FISH</h4> 
                <h4  v-show="editmode" class="modal-title" >UPDATE RECORD</h4> 
                <button  type="button" data-dismiss="modal" aria-label="Close" class="close"><span  aria-hidden="true">×</span></button></div> 
                 <form class="form-horizontal" @submit.prevent="editmode ? updatebranchpayout():CreateNewcashcreditfish()"> 

                    <div  class="modal-body">
              
              
               <form @submit.prevent="SavetheCollectionbranch()">
  
  
   <div class="form-group">


                
  
  
                   <div class="form-group">
                         <label><b>BRANCH&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b></label>
                    
                      <span class="cell" style="color:maroon ;">  
   
                   <span style="font-size:1.0em;" right > <b> {{ (shopbalancngname) }}  </b></span></span>
                 
                    <hr>
                       <label><b>B/F &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b></label>
                    
                      <span class="cell" style="color:maroon ;">  
   
                   <span style="font-size:1.0em;" right > <b> {{currencydetails}} {{ formatPrice(shopopenningbalancecacollectpoint) }}   </b></span></span>
                 
                    <hr>
                  </div>

                    
                   

                   
                          </div>




<div class ="bethapa-table-header">COLLECTION</div>
                  
   <div class="form-group row">
                   <label class="col-sm-2 col-form-label">Branch </label>
                              <div class="col-sm-6">
                        <select name ="branchnametobalance" v-model="form.branchnametobalance" id ="branchnametobalance" v-on:change="myClickEventdddd" class="form-control" :class="{'is-invalid': form.errors.has('branchnametobalance')}">
                    <option value=" ">  </option>
                    <option v-for='data in brancheslist' v-bind:value='data.branchno'>{{ data.branchno }} - {{ data.branchname }}</option>

                    </select>
                    <button type="submit" id="submit" hidden="hidden" name= "submit" ref="myBtn89" class="btn btn-primary btn-sm">Saveit</button>

                                <has-error :form="form" field="branchnametobalance"></has-error>
                              </div>

                        </div>
  
  
  
  
  
               
 
</form>

                                  
                 <div class="form-group row">
                   <label class="col-sm-2 col-form-label">Date </label>
                              <div class="col-sm-6">
                           <input v-model="form.transferdate" type="date" name="transferdate"
                     class="form-control form-control-sm" :class="{ 'is-invalid': form.errors.has('transferdate') }">
                       <has-error :form="form" field="transferdate"></has-error>
                              </div>

                        </div>
  
                      
               <div class="form-group row">
                   <label class="col-sm-2 col-form-label">Amount </label>
                              <div class="col-sm-6">
                          <input v-model="form.amount" type="number" name="amount"
        class="form-control form-control-sm" :class="{ 'is-invalid': form.errors.has('amount') }">
      <has-error :form="form" field="amount"></has-error>
                              </div>

                        </div>
  <div class="form-group row">
                   <label class="col-sm-2 col-form-label">Comment </label>
                              <div class="col-sm-6">
                          <textarea v-model="form.description" type="text" name="description"
        class="form-control form-control-sm" :class="{ 'is-invalid': form.errors.has('description') }"></textarea>
      <has-error :form="form" field="description"></has-error>
                              </div>

                        </div>
                      
                      
                
                 
                 </div>
                 
                  <div  class="modal-footer">
                    <button  v-show="!editmode" type="submit" class="btn btn-primary btn-sm">Create</button> 
                      <button v-show="editmode" type="submit" class="btn btn-success btn-sm" >Update</button>
                        <button  type="button" data-dismiss="modal" class="btn btn-danger btn-sm">Close</button >
                        </div>
                 </form>
                       </div>
                          </div>
                <!-- mmmm -->








                  </div>

  <div class="tab-pane fade" id="custom-tabs-two-eight" role="tabpanel" aria-labelledby="custom-tabs-two-eight-tab">
                     Eight  is. 
                  </div>








                </div>
              </div>
              <!-- /.card -->
            </div>
          </div>



<!-- All modals container  -->



               
<!-- No Modals Beyond -->


          <!-- end of the body -->
 </div>

<!-- closure of allowed -->
<!--   if not authorised -->

<div  v-if="gencomponentaccessCahtransactions < 1 "> 

   <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 mt-4">
                <h3> Access Denied. Contact Administrator for more Details </h3>
                <svg id="c72640af-2824-4ace-a782-4df73f48977c" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="600" height="100%" viewBox="0 0 1143.14 862.91"><defs><linearGradient id="969f2d34-5bff-4fc3-8c31-c6509eddc389" x1="551.46" y1="688.44" x2="551.46" y2="150.11" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="gray" stop-opacity="0.25"/><stop offset="0.54" stop-color="gray" stop-opacity="0.12"/><stop offset="1" stop-color="gray" stop-opacity="0.1"/></linearGradient><linearGradient id="488cd128-ff9c-494f-bd41-35fb6c1caf21" x1="1059.46" y1="856.62" x2="1059.46" y2="468.94" xlink:href="#969f2d34-5bff-4fc3-8c31-c6509eddc389"/><linearGradient id="ccb18d0b-874b-442a-b8cb-57bcf76cdeb5" x1="814.74" y1="881.34" x2="814.74" y2="496.8" gradientTransform="matrix(-1, -0.04, -0.04, 1, 1070.86, 21.29)" xlink:href="#969f2d34-5bff-4fc3-8c31-c6509eddc389"/></defs><title>content</title><ellipse cx="1023.75" cy="834.07" rx="100.11" ry="24.73" fill="#6c63ff" opacity="0.1"/><ellipse cx="140.04" cy="838.19" rx="100.11" ry="24.73" fill="#6c63ff" opacity="0.1"/><path d="M713.17,251.41s-14.07-5.71-58.81,14.82S604,284.14,592.44,281s-18-3.88-30.46-21c0,0-8.76-47.48-17.23-54.84s-44.5,4.19-44.5,4.19-43.19,9.91-51.42-47.81c0,0,5.84-43.51-2.11-56.86,0,0,16,6.93,42.54-4.25s47.69,12,47.69,12,6.68,17.3,6,27.61,3.53,14.18,16.17,9.2c0,0,6.2-8.83-2.59-23.42s-15.06-25.47-12.6-36.8,9.5-27,32.16-34.9,53.44-9.38,68.22-15.53,18.35-10.15,18.35-10.15S653.55,37.58,675,76.19s7.77,55.38,7.77,55.38-11.4,27.16-61.7,25c0,0-48.47,1.77-22,22.33,0,0,16.93-3.45,42.23-11.49s43.57,25.15,48.1,48.25S713.17,251.41,713.17,251.41Z" transform="translate(-28.43 -18.54)" fill="#6c63ff"/><path d="M648,57.75l.27-.07c1.94,7.37-19.73,37-38.24,60.53l-.22-.17C635.94,84.83,649.51,63.42,648,57.75Z" transform="translate(-28.43 -18.54)" fill="#444053"/><path d="M610.2,117.55l.11.3c-14.79,18.81-33.39,41.25-48.28,57.87-1.42,1.59-2.83,3.25-4.19,4.95l-.42-.35c1.36-1.7,2.78-3.37,4.2-5C576.5,158.75,595.42,136.35,610.2,117.55Z" transform="translate(-28.43 -18.54)" fill="#444053"/><path d="M557.78,179.88l.29.5c-27.1,33.83-28.89,86.36-29,86.82l-5.72-6.6C523.47,260.14,530.49,213.94,557.78,179.88Z" transform="translate(-28.43 -18.54)" fill="#444053"/><path d="M681.74,233.06s-32-16.61-56.85-10.65-81-21.06-81-21.06-23.81-9.68-28.59-20.7c0,0-16.33-17.26-17.26-26.2s-16.83-31.4-27.2-32.27" transform="translate(-28.43 -18.54)" fill="none" stroke="#444053" stroke-miterlimit="10"/><path d="M677.12,249.05S661,238.21,662.9,225.58" transform="translate(-28.43 -18.54)" fill="none" stroke="#444053" stroke-miterlimit="10"/><path d="M652.43,263.06s-23-8.36-25.32-41.11" transform="translate(-28.43 -18.54)" fill="none" stroke="#444053" stroke-miterlimit="10"/><path d="M615.3,271.54s-22-18.25-14.69-50.13" transform="translate(-28.43 -18.54)" fill="none" stroke="#444053" stroke-miterlimit="10"/><path d="M570.68,262.62s-14.65-30.71-1.62-50.69" transform="translate(-28.43 -18.54)" fill="none" stroke="#444053" stroke-miterlimit="10"/><path d="M682.12,212.82s-16.65,5.28-13.08,14" transform="translate(-28.43 -18.54)" fill="none" stroke="#444053" stroke-miterlimit="10"/><path d="M662,182.61s-22.27,7.07-22.8,38.57" transform="translate(-28.43 -18.54)" fill="none" stroke="#444053" stroke-miterlimit="10"/><path d="M631,175.34s-20.26,25-18.77,47.75" transform="translate(-28.43 -18.54)" fill="none" stroke="#444053" stroke-miterlimit="10"/><path d="M595.48,185.15s-20.13,19.24-17.56,29.95" transform="translate(-28.43 -18.54)" fill="none" stroke="#444053" stroke-miterlimit="10"/><path d="M583.34,178.35s-18.88,3.39-21.52-2.81" transform="translate(-28.43 -18.54)" fill="none" stroke="#444053" stroke-miterlimit="10"/><path d="M558.81,155.56s9.54,12.63,12,9.8" transform="translate(-28.43 -18.54)" fill="none" stroke="#444053" stroke-miterlimit="10"/><path d="M653.36,147.57S605.78,151,595,136.68" transform="translate(-28.43 -18.54)" fill="none" stroke="#444053" stroke-miterlimit="10"/><path d="M548.8,91.91s22.33,47.93,38.54,54" transform="translate(-28.43 -18.54)" fill="none" stroke="#444053" stroke-miterlimit="10"/><path d="M572.22,69.08s13.72,44.09,30.71,57.85" transform="translate(-28.43 -18.54)" fill="none" stroke="#444053" stroke-miterlimit="10"/><path d="M673.39,111.19s-36.19,15.53-57.92-.18" transform="translate(-28.43 -18.54)" fill="none" stroke="#444053" stroke-miterlimit="10" stroke-width="0.75"/><path d="M604.46,59.68s8.27,32.41,19.41,40.24" transform="translate(-28.43 -18.54)" fill="none" stroke="#444053" stroke-miterlimit="10" stroke-width="0.75"/><path d="M667.92,74.89s-20.33,7.7-27.93,1.8" transform="translate(-28.43 -18.54)" fill="none" stroke="#444053" stroke-miterlimit="10" stroke-width="0.75"/><path d="M541.39,166.15s0,28.25-7.69,30.26" transform="translate(-28.43 -18.54)" fill="none" stroke="#444053" stroke-miterlimit="10"/><path d="M478.52,202.75s30.54,2.62,44.63-13.14" transform="translate(-28.43 -18.54)" fill="none" stroke="#444053" stroke-miterlimit="10"/><path d="M533.51,132.78s-7.39,28.65-27.78,36.37" transform="translate(-28.43 -18.54)" fill="none" stroke="#444053" stroke-miterlimit="10"/><path d="M460.2,172.57s21.62,7.52,40.21-11.62" transform="translate(-28.43 -18.54)" fill="none" stroke="#444053" stroke-miterlimit="10"/><path d="M509.47,108.15s-2,24.33-15.27,35.72" transform="translate(-28.43 -18.54)" fill="none" stroke="#444053" stroke-miterlimit="10"/><path d="M461,135.49s17.94.13,22.14-5.72" transform="translate(-28.43 -18.54)" fill="none" stroke="#444053" stroke-miterlimit="10"/><path d="M620.4,156c-71.4,11.91-142.91,5.5-211.75-3.38s-137.52-20.22-209.07-18c-46,1.44-97.17,10.48-129,38.22-30.62,26.69-35,63.18-34.71,96.18.22,24.82,2.55,50.53,19.36,70.49,11.67,13.85,29.51,23.91,43,36.72,47,44.58,33.67,113.64,3.91,172.12-14,27.44-31.11,54.37-40.5,82.5S51.32,689.28,69,712.57c17.54,23.09,51.09,36.39,86,43.52,70.89,14.47,149.57,7,225.67-3.39,168.44-23.11,335-60.49,501.08-97.8,61.47-13.8,123.21-27.68,182.35-48,32.84-11.26,66.25-25.43,87.28-47.84,26.69-28.45,26.93-67.72.56-91.54-44.24-40-143.21-32.48-177.6-78-18.94-25-11.23-58.62,3.24-88.17,31-63.4,91.75-125.65,83-189.36-6-43.76-48.38-80.4-104.68-90.53-59-10.61-134.41,7.11-167.78,50.62C753.76,117,683.44,145.5,620.4,156Z" transform="translate(-28.43 -18.54)" fill="#6c63ff" opacity="0.1"/><rect x="76.29" y="150.11" width="950.33" height="538.33" rx="12.49" ry="12.49" fill="url(#969f2d34-5bff-4fc3-8c31-c6509eddc389)"/><rect x="77.8" y="157.68" width="947.42" height="528.97" rx="12.49" ry="12.49" fill="#fff"/><rect x="77.8" y="157.68" width="947.42" height="528.97" rx="12.49" ry="12.49" fill="#fff"/><rect x="77.8" y="157.68" width="947.42" height="528.97" rx="12.49" ry="12.49" fill="#5a5773" opacity="0.04"/><path d="M1048.84,170.15H111a4.81,4.81,0,0,0-4.81,4.81V195.3h947.42V175A4.81,4.81,0,0,0,1048.84,170.15Z" transform="translate(-28.43 -18.54)" fill="#5a5773"/><g id="83eb5f8b-b68b-4721-b047-6100bc74156f" data-name="buttons"><circle cx="96.72" cy="164.18" r="6.5" fill="#fff"/><circle cx="114.22" cy="164.18" r="6.5" fill="#fff"/><circle cx="131.72" cy="164.18" r="6.5" fill="#fff"/></g><rect x="141.22" y="293.86" width="790" height="392.78" rx="10.19" ry="10.19" fill="#fff"/><rect x="107.72" y="203.45" width="227.24" height="23.85" rx="3.86" ry="3.86" fill="#5a5773" opacity="0.2"/><rect x="536.22" y="339.45" width="227.24" height="23.85" rx="3.86" ry="3.86" fill="#6c63ff" opacity="0.2"/><rect x="536.22" y="406.23" width="354.83" height="23.85" rx="3.86" ry="3.86" fill="#6c63ff" opacity="0.2"/><rect x="536.22" y="445.23" width="354.83" height="23.85" rx="3.86" ry="3.86" fill="#6c63ff" opacity="0.2"/><rect x="536.22" y="484.23" width="354.83" height="23.85" rx="3.86" ry="3.86" fill="#6c63ff" opacity="0.2"/><rect x="536.22" y="523.23" width="354.83" height="23.85" rx="3.86" ry="3.86" fill="#6c63ff" opacity="0.2"/><rect x="184.05" y="566.23" width="707" height="23.85" rx="3.86" ry="3.86" fill="#6c63ff" opacity="0.2"/><rect x="184.05" y="605.23" width="707" height="23.85" rx="3.86" ry="3.86" fill="#6c63ff" opacity="0.2"/><rect x="184.05" y="644.23" width="707" height="23.85" rx="3.86" ry="3.86" fill="#6c63ff" opacity="0.2"/><path d="M757.73,678.54s5.93,7.75-2.74,19.46-15.81,21.59-12.92,28.89c0,0,13.07-21.74,23.72-22S769.44,691.61,757.73,678.54Z" transform="translate(-28.43 -18.54)" fill="#6c63ff"/><path d="M757.73,678.54a9.6,9.6,0,0,1,1.21,2.43c10.39,12.2,15.92,23.59,5.94,23.87-9.3.27-20.46,16.9-23.13,21.09a7.72,7.72,0,0,0,.32,1s13.07-21.74,23.72-22S769.44,691.61,757.73,678.54Z" transform="translate(-28.43 -18.54)" opacity="0.1"/><path d="M768.75,688.42c0,2.73-.3,4.94-.68,4.94s-.68-2.21-.68-4.94.38-1.44.76-1.44S768.75,685.69,768.75,688.42Z" transform="translate(-28.43 -18.54)" fill="#ffd037"/><path d="M772.54,691.68c-2.4,1.3-4.49,2.09-4.67,1.76s1.62-1.66,4-3,1.45-.36,1.63,0S774.93,690.37,772.54,691.68Z" transform="translate(-28.43 -18.54)" fill="#ffd037"/><path d="M726.41,678.54s-5.93,7.75,2.73,19.46,15.82,21.59,12.93,28.89c0,0-13.08-21.74-23.72-22S714.7,691.61,726.41,678.54Z" transform="translate(-28.43 -18.54)" fill="#6c63ff"/><path d="M726.41,678.54a9.39,9.39,0,0,0-1.22,2.43c-10.38,12.2-15.91,23.59-5.93,23.87,9.3.27,20.45,16.9,23.12,21.09a7.68,7.68,0,0,1-.31,1s-13.08-21.74-23.72-22S714.7,691.61,726.41,678.54Z" transform="translate(-28.43 -18.54)" opacity="0.1"/><path d="M715.38,688.42c0,2.73.31,4.94.69,4.94s.68-2.21.68-4.94S716.37,687,716,687,715.38,685.69,715.38,688.42Z" transform="translate(-28.43 -18.54)" fill="#ffd037"/><path d="M711.6,691.68c2.4,1.3,4.49,2.09,4.67,1.76s-1.62-1.66-4-3-1.45-.36-1.63,0S709.2,690.37,711.6,691.68Z" transform="translate(-28.43 -18.54)" fill="#ffd037"/><ellipse cx="713.64" cy="758.15" rx="62" ry="9.51" fill="#6c63ff" opacity="0.1"/><path d="M774,716.44l-.3,2.42-.41,3.42-.18,1.43-.41,3.42-.18,1.43-.42,3.41-4.74,38.9c-.43,3.47-6.1,6.18-13,6.18H729.74c-6.85,0-12.51-2.71-12.93-6.18L712.05,732l-.41-3.41-.18-1.43-.42-3.42-.17-1.43-.42-3.42-.3-2.42c-.23-2,2.84-3.62,6.71-3.62h50.42C771.15,712.82,774.22,714.47,774,716.44Z" transform="translate(-28.43 -18.54)" fill="#65617d"/><polygon points="745.25 700.32 744.84 703.74 682.44 703.74 682.02 700.32 745.25 700.32" fill="#9d9cb5"/><polygon points="744.66 705.16 744.25 708.58 683.03 708.58 682.61 705.16 744.66 705.16" fill="#9d9cb5"/><polygon points="744.07 710.01 743.65 713.43 683.62 713.43 683.21 710.01 744.07 710.01" fill="#9d9cb5"/><rect x="184.05" y="326.22" width="302" height="221.54" rx="8.5" ry="8.5" fill="#6c63ff" opacity="0.2"/><path d="M1153.48,591.15c.38-1-2.44-6.72-2.44-7s-2.91-3.45-2.91-5.22-3.85-5.6-3.85-5.6-5.17-2.14-5.73-6.81-6.19-4.75-6.2-4.75h0s0-.42,0-1.07a14.72,14.72,0,0,0-.69-5.45,5.49,5.49,0,0,0-3.19-2.71s-.57-3.64-1.69-4.76a5.35,5.35,0,0,1-1.32-5c.57-1.76-.75-6.24-3.47-6.9s-5.83-1.68-5.83-1.68l-.75.13-.37-.13a15.59,15.59,0,0,1-2,.25,2.47,2.47,0,0,1-1.59-.52c-.94-1-8.55-3-10-3s-5.45-1.87-5.45-1.87-2.82-2.14-4-3.08-3.23-4.35-3.54-4.87l0-.07h0l0,0a17.25,17.25,0,0,1-.85-2.45h0a22.06,22.06,0,0,0,3.49-4.81c.1-.18.19-.36.28-.55a2.1,2.1,0,0,0,.61-.09l.25-.1a4.06,4.06,0,0,0,2-2.38h0a6.32,6.32,0,0,0,.18-.62c0-.07,0-.14,0-.21l.09-.42a2,2,0,0,1,0-.24l.06-.42,0-.24c0-.18,0-.35.07-.53h0a18.7,18.7,0,0,1,.29-2v0h0c.56-2.53,2.09-4.67,3.16-7h0c.15-.33.3-.67.43-1s.26-.75.37-1.13l.09-.35c.07-.28.13-.56.19-.84s0-.25.07-.38q.09-.57.15-1.17a14.46,14.46,0,0,0-1-6.55c-.7-1.75-1.75-3.33-2.46-5.08-1.08-2.65-1.37-5.66-2.68-8.19a9.75,9.75,0,0,0-11.7-4.76c-2,.76-3.82,2.23-5.89,2.89-2.78.89-5.74.22-8.62-.17s-6-.44-8.36,1.44c-2.66,2.16-3.38,6.22-5.88,8.59-1,1-2.35,1.63-3.46,2.55a5.65,5.65,0,0,0-1.74,2.38l-.06.19a1.83,1.83,0,0,0-.06.25,2.33,2.33,0,0,0-.05.28,1.11,1.11,0,0,0,0,.19,2.09,2.09,0,0,0,0,.5h0a3.81,3.81,0,0,0,.07.47l0,.13c0,.13.07.26.12.39s0,.05,0,.07.11.29.17.43l.09.21c0,.06,0,.12.08.17a12.44,12.44,0,0,1,.87,2.17,2.41,2.41,0,0,1-.09,1.43,4.22,4.22,0,0,1-1,1.37,19.35,19.35,0,0,0-4.24,6.79q-.17.44-.3.87v0l.13,0a5.68,5.68,0,0,0,.82.17,4,4,0,0,0,.47,0,7.32,7.32,0,0,0,1.92-.14l.48-.12a10.87,10.87,0,0,0,1.9-.69c0,.19,0,.38,0,.57s0,.21,0,.32a22.18,22.18,0,0,0,12.33,19.84c0,.2.05.4.08.6l.06.51-.25-.24s-1.69-.84-3.29,1.58a10.62,10.62,0,0,1-4.6,3.55s-17.1,2.7-17.76,4.94l-8,.47s-2.82.37-3.1,6.25-1.78,6.43-1.78,6.43-3.29,5.79-3,8.77a4.89,4.89,0,0,1-2.54,4.48l-.37,5.32s-3.1-.47-4,3.17a12.65,12.65,0,0,1-2.34,5.31s-5.17,4.3-5.45,7.93l-3.2,2s-7.42-1.68-9.11-4.66c0,0-.2-.2-.52-.49l0-.07v0c-1.11-1-3.46-3.24-3.1-2.73a2.25,2.25,0,0,1,.15,1.5l-.55-.61-1.48-1.64s-12-11.24-19-12.13h0c-.09-.18-.55-2-1.75-.85a9.8,9.8,0,0,0-.07,14.37l11.24,10.49.29.21,2.41,3.1c-.41,1-.75,1.92-1,2.78l0,.09-.18.54a1.21,1.21,0,0,0-.05.18c-.06.18-.11.35-.16.52l-.09.3c0,.06,0,.12,0,.18-.27.94-.44,1.66-.52,2.06l-.63-.2.61.27,0,.09c0,.13,0,.2,0,.2l.58.25c3.29,1.43,19.71,8.64,20.55,9.73s7.14,4.76,12.78,1.77,6.85-7.55,6.85-7.55,5.45-7.56,5.64-8.68,4.41-2.42,4.41-2.42.38,12.49-1.78,17.07-6.2,24.81-6.2,24.81a2.86,2.86,0,0,1,.8,0l-.24,1.17a2.72,2.72,0,0,1,1,0c-.3,2.3-2,13-2,13s-.56,4.85-1.5,6.53-1,10.45-1,10.45l-1.51,6.34s.2.44.57,1.09v0a16.23,16.23,0,0,0,4.32,5.59,11.06,11.06,0,0,1-.76,2.9,10.2,10.2,0,0,0-.75,4.48s-1.59,7.18-1.41,9.23-1,7.09-1,7.09l-1.69,16.23s-1.12,14.08-.56,17.91a34.37,34.37,0,0,1-.38,9s1.13,11.1.85,12.31-1.69,6.44-.85,9.33.38,10.82.38,10.82.56,10.45,1.22,13.81a23.64,23.64,0,0,1-.19,7.65s-.66,7.18-.94,7.18-2.72,4.94,2.25,9.79,1.89,4.1,1.89,4.1-4-2-3.48,2.06c.44,3.81,1.06,2.82,1.12,2.71l-.94,3.07.66.09-.54.65a14.05,14.05,0,0,1-1.9,2,4.07,4.07,0,0,0-1.22,2.7s-6.95,7.56-13.43,11.38c-3.41,2-6.35,3.71-7.63,5.13-1.16,1.26-1,2.28,1.43,3.08,5.07,1.68,14,2.52,20.38.37a23.84,23.84,0,0,0,10-6.43s4-2.06,8-1.31,11.84-4.38,11.84-4.38l-.15-1.32-.41-3.82a3,3,0,0,1-.66-2.32,12,12,0,0,0-.33-3.36c-.07-.37-.14-.74-.21-1.08l.72-.14s-.93-4.75.76-5.69,1.21-13.15,1.21-13.15-2.15-2.8-3.28-3.26-.1-6.26.1-7,1.69-15.21,1.69-15.21-.57-4.56.18-6.52-.94-9.52-.94-9.52a1.74,1.74,0,0,1,.47-2.05c1-1.12.66-11.1.66-11.1s-.09-5-.09-6.35,1.12-6.06,2.16-7.64.37-6.53.37-6.53v0l.06-.37c0-.14,0-.32.08-.53l.08-.5a72.67,72.67,0,0,1,1.84-8.1c1.22-3.91,2.63-10.81,2.63-10.81l8.73-22.78.1-.27s4,7.46,4,14.37c0,0,1,8.3.76,10.54S1065,728,1065,728s1.22,15.11,1.22,15.76,1.51,12.31,2.45,14.09-.94,7.18-1.51,7.74.19,14.27.19,14.27-1.41,10.82-1.69,13.06-1.41,10.82-.47,14.18.56,3.82.56,3.82,3.39,3.46,1.41,3.74a5.17,5.17,0,0,0-3.76,6.8,89.61,89.61,0,0,0,4.14,10l1.56-.33,0,1.11.11,5.56s.66,5.31.28,6.53c-.27.88-.65,5.06-.83,7.25-.07.8-.11,1.33-.11,1.33s0,4.94,10.43,3.45,12.3-5.6,12.3-5.6l.08-.51c.15-.94.49-2.94.77-4.06.37-1.49-3-8.21-3-8.21s-.56-4.57-1.5-5.59a5,5,0,0,1-.76-2c-.08-.38-.16-.77-.22-1.15a6.78,6.78,0,0,1,.7.12s-.57-3.26,1.6-4.29,1.59-3.17,1.31-4.1.84-6.16.84-6.16a3,3,0,0,1,.75-3c1.32-1.31,2.35-10.45,2.35-10.45l.19-35.26s.66-6.25-.09-8.77-1.5-7.37-.47-8.68.09-7.36.09-7.36,0-12.78,1.41-16,.94-23.23.94-23.23l.37-13.15s3.07-2.9,2.35-18c3.27-.21,7-.33,7.52.13,1,.84,7.7,5.13,11.65,2.42a52.29,52.29,0,0,0,4.69-3.63l-1.66-28c1,1.56,1.66,2.59,1.66,2.59,0-3.91,11.09-16.6,11.09-16.6s10.33-13.34,12.58-14.92,6.67-10,6.67-10a40.59,40.59,0,0,1,2.26-4.66C1156.49,596.65,1153.11,592.17,1153.48,591.15Zm-24.23,9.79c-2.82.28-8.74,6.72-8.83,8.12a5.76,5.76,0,0,1-1.25,2.5c0-.56-.09-1.13-.14-1.71-.66-8.25-1.38-18.29-1-19.26.56-1.68.37-9.24.37-9.24h0l.11-.15c1.89,5.86,7.77,12.76,7.77,12.76s1,3,2.26,3.07S1129.25,600.94,1129.25,600.94Z" transform="translate(-28.43 -18.54)" fill="url(#488cd128-ff9c-494f-bd41-35fb6c1caf21)"/><path d="M978.65,598.81s3.43-18,14.44-18l8.06,16.57-5.37,3.7S984.11,601.4,978.65,598.81Z" transform="translate(-28.43 -18.54)" fill="#65617d"/><path d="M1001.15,597.33l-5.37,3.7s-8.21.26-14.08-1.18a16.24,16.24,0,0,1-3.05-1l.06-.29,0-.06a40,40,0,0,1,2.08-6.6c.34-.81.72-1.64,1.14-2.47,1.61-3.1,3.88-6.15,7-7.65a9.49,9.49,0,0,1,3.67-1h.49l.18.37,2.72,5.6Z" transform="translate(-28.43 -18.54)" opacity="0.1"/><path d="M1092.61,671.94s11.57-1.11,12.59-.27,7.59,5.09,11.47,2.4,1.3-12,1.3-12.4-.37-13.61-.37-13.61l-6.94-9.35-8.7-16.38-17.78-1.76.46,26-.09,13.33Z" transform="translate(-28.43 -18.54)" fill="#65617d"/><path d="M1092.61,671.94s11.57-1.11,12.59-.27,7.59,5.09,11.47,2.4,1.3-12,1.3-12.4-.37-13.61-.37-13.61l-6.94-9.35-8.7-16.38-17.78-1.76.46,26-.09,13.33Z" transform="translate(-28.43 -18.54)" opacity="0.1"/><path d="M990.78,580.3s-.93,11.29-8,11.48c0,0-2-1.2-4.68-3.21-6.18-4.63-16-13.52-13.28-21.79,3.89-11.85,22.77,10,22.77,10l1.46,1.63Z" transform="translate(-28.43 -18.54)" fill="#fbbebe"/><path d="M990.78,580.3s-.93,11.29-8,11.48c0,0-2-1.2-4.68-3.21l-.6-.77a9.21,9.21,0,0,0,3.86,1,5.21,5.21,0,0,0,5-3.17,40,40,0,0,0,2-4.49,14,14,0,0,0,.71-2.77Z" transform="translate(-28.43 -18.54)" opacity="0.1"/><path d="M987.72,600.76l-1.58-2-5.33-6.86-2.71-3.51a9.13,9.13,0,0,0,3.85,1,5.18,5.18,0,0,0,5-3.17,39.18,39.18,0,0,0,1.95-4.48c.88-2.5.86-3.78.55-4.22s2,1.68,3.06,2.72l0,0,.51.48.19.38L996,586.5a1.45,1.45,0,0,1,0,.23C996.2,588.43,997.1,599.22,987.72,600.76Z" transform="translate(-28.43 -18.54)" fill="#e7effd"/><path d="M1043.18,839s-7.78,5.1-11.67,4.35a14,14,0,0,0-7.87,1.3,23.36,23.36,0,0,1-9.81,6.39c-6.3,2.13-15.09,1.29-20.09-.37-2.36-.79-2.55-1.81-1.41-3.06s4.16-3.09,7.52-5.09c6.39-3.8,13.24-11.29,13.24-11.29a4,4,0,0,1,1.2-2.69,13.8,13.8,0,0,0,1.87-2c1-1.17,1.93-2.4,1.93-2.4L1041,825s.39,1.65.7,3.34a12.08,12.08,0,0,1,.32,3.33,3,3,0,0,0,.65,2.31l.41,3.78Z" transform="translate(-28.43 -18.54)" fill="#65617d"/><path d="M1091,845.42c-.27,1.11-.61,3.09-.76,4,0,.31-.07.51-.07.51s-1.85,4.07-12.13,5.55-10.27-3.42-10.27-3.42l.1-1.33c.18-2.16.55-6.31.82-7.19.37-1.2-.27-6.48-.27-6.48l-.11-5.52-.08-3.83,17-1.76a32.8,32.8,0,0,0,.55,3.79,4.87,4.87,0,0,0,.75,2c.92,1,1.48,5.55,1.48,5.55S1091.4,843.94,1091,845.42Z" transform="translate(-28.43 -18.54)" fill="#65617d"/><path d="M1041,825s.39,1.65.7,3.34c-2.47.45-13.27,2.32-16,1-3.06-1.48-9.63-2.31-9.63-2.31l.11-.38c1-1.17,1.93-2.4,1.93-2.4Z" transform="translate(-28.43 -18.54)" opacity="0.1"/><path d="M1085.84,829.77c-4.31-.73-13.78,1-17.5,1.8l-.08-3.83,17-1.76A32.8,32.8,0,0,0,1085.84,829.77Z" transform="translate(-28.43 -18.54)" opacity="0.1"/><path d="M1095.47,689.44l-.36,13s.46,19.9-.93,23-1.39,15.83-1.39,15.83.93,6-.09,7.31-.28,6.11.46,8.61.09,8.7.09,8.7l-.18,35s-1,9.07-2.32,10.37a3.05,3.05,0,0,0-.74,3s-1.11,5.18-.83,6.11.83,3.05-1.29,4.07-1.58,4.26-1.58,4.26c-5.09-1.21-19.53,2-19.53,2a88.58,88.58,0,0,1-4.08-9.91,5.13,5.13,0,0,1,3.71-6.76c1.94-.27-1.39-3.7-1.39-3.7s.37-.46-.56-3.8.19-11.85.47-14.07,1.66-13,1.66-13-.74-13.61-.18-14.16,2.4-5.93,1.48-7.68-2.41-13.33-2.41-14-1.2-15.65-1.2-15.65-1.11-10.46-.83-12.68-.75-10.46-.75-10.46c0-6.85-4-14.26-4-14.26l-.1.27L1050,713.6s-1.39,6.85-2.59,10.74a70.55,70.55,0,0,0-1.81,8l-.08.5-.08.52-.06.37v0s.64,4.9-.38,6.48a23.11,23.11,0,0,0-2.12,7.59c0,1.3.09,6.3.09,6.3s.37,9.9-.65,11a1.73,1.73,0,0,0-.46,2s1.66,7.5.92,9.44-.18,6.48-.18,6.48-1.48,14.35-1.67,15.09-1.2,6.48-.09,6.94,3.24,3.24,3.24,3.24.46,12.13-1.2,13.05-.75,5.65-.75,5.65-13.42,2.59-16.47,1.11-9.63-2.31-9.63-2.31l.92-3c-.06.11-.67,1.1-1.1-2.69-.47-4,3.42-2,3.42-2s3.06.74-1.85-4.07-2.5-9.72-2.22-9.72.92-7.13.92-7.13a23.57,23.57,0,0,0,.19-7.59c-.65-3.33-1.2-13.7-1.2-13.7s.46-7.87-.38-10.74.56-8,.84-9.26-.84-12.22-.84-12.22a34.27,34.27,0,0,0,.38-9c-.56-3.8.55-17.78.55-17.78l1.67-16.1s1.2-5,1-7,1.39-9.16,1.39-9.16a10.16,10.16,0,0,1,.74-4.45c.93-1.85,1.3-8,1.3-8l8.89-20.36,4.35-18,58.78-.56s.21,1.56.57,4.39.86,7,1.42,12.19c.51,4.7,1.07,10.23,1.62,16.38C1099.18,685.92,1095.47,689.44,1095.47,689.44Z" transform="translate(-28.43 -18.54)" fill="#3f3d56"/><path d="M1090,527.35,1076.31,542s-17.58-7-15.73-9.45c.71-.93.6-3.87.19-7.11-.65-5.13-2-11-2-11s30.73-5,28.13.18a8.52,8.52,0,0,0-.19,6.15A23.29,23.29,0,0,0,1090,527.35Z" transform="translate(-28.43 -18.54)" fill="#fbbebe"/><path d="M1086.86,514.57c-.94,1.9-1.39,2.08-.8,4.12-4,4.31-9.13,9-15.49,9a21.92,21.92,0,0,1-9.8-2.3c-.65-5.13-2-11-2-11S1089.46,509.39,1086.86,514.57Z" transform="translate(-28.43 -18.54)" opacity="0.1"/><path d="M1092.61,505.13a22,22,0,0,1-44.07,0c0-.11,0-.21,0-.32a22,22,0,0,1,44.06.32Z" transform="translate(-28.43 -18.54)" fill="#fbbebe"/><path d="M1095.8,650.48c-2.92,0-12.64.1-23.5.28h-.13l-3.59.06h-.11c-12.88.2-25.57-2.31-30.67-1.84-10.83,1,3.89-10,3.89-10a90.83,90.83,0,0,0,24.67,2.49l3.12-.16c9.84-.56,19.73-1.48,24.9-3C1094.74,641.15,1095.24,645.31,1095.8,650.48Z" transform="translate(-28.43 -18.54)" opacity="0.1"/><path d="M1095.8,649.92c-2.92,0-12.64.11-23.5.28h-.13l-3.59.06h-.11c-12.88.21-25.57-2.31-30.67-1.83-10.83,1,3.89-10,3.89-10a90.37,90.37,0,0,0,24.67,2.49l3.12-.16c9.84-.55,19.73-1.48,24.9-3C1094.74,640.59,1095.24,644.75,1095.8,649.92Z" transform="translate(-28.43 -18.54)" fill="#5f5d7e"/><path d="M1064.65,533.46l-17,8-13.15,101.64s7.78-3.52,12.22-1.3,18.14.19,18.14.19,10-.56,11.48.56,18.89-4.63,18.89-4.63,3.15-7,.74-8.15.74-12,.74-12l-1.48-73.32-3-9.44-8-4.82-8.14,6.48-3.89.56Z" transform="translate(-28.43 -18.54)" opacity="0.1"/><path d="M1064.65,532.35l-17,8L1034.47,642s7.78-3.52,12.22-1.3,18.14.19,18.14.19,10-.56,11.48.55,18.89-4.62,18.89-4.62,3.15-7,.74-8.15.74-12,.74-12l-1.48-73.32-3-9.44-8-4.82-8.14,6.48-3.89.56Z" transform="translate(-28.43 -18.54)" fill="#e7effd"/><path d="M1064.37,537.07s4.91,5.83,4.82,7-.28,4.08-.28,4.08l-3.7,7.49s-2,9.35-2,11.3-3.24,18.79-3.24,18.79L1056,611.68l-4.91,34,5,8.61,5.93-5,7.87-60.54,1.66-11.94s1.76-21.48,1.76-23.7a75.45,75.45,0,0,0-1-8.05s1.21-5.56,6.21-6.85-.38-.28-.38-.28l-2.86-2.31-2.5,1S1065.85,534.48,1064.37,537.07Z" transform="translate(-28.43 -18.54)" opacity="0.1"/><path d="M1063.82,536.51s4.9,5.83,4.81,7-.28,4.07-.28,4.07l-3.7,7.5s-2,9.35-2,11.29-3.24,18.79-3.24,18.79l-3.88,25.92-4.91,34,5,8.61,5.92-5,7.87-60.54,1.67-11.94s1.76-21.48,1.76-23.7a75.73,75.73,0,0,0-1-8.06s1.2-5.55,6.2-6.85-.37-.27-.37-.27l-2.87-2.32-2.5,1S1065.3,533.92,1063.82,536.51Z" transform="translate(-28.43 -18.54)" fill="#6c63ff"/><path d="M1060.58,526.79s-.74.56-.93,4.26-2.78,12-2.78,12,9.63-6.66,14.44-5.92Z" transform="translate(-28.43 -18.54)" opacity="0.1"/><path d="M1060.58,525.68s-.74.56-.93,4.26-2.78,12-2.78,12,9.63-6.66,14.44-5.92Z" transform="translate(-28.43 -18.54)" fill="#e7effd"/><path d="M1086.87,523.83l-15.18,13.33s12.77,7.59,14.44,9.44,3.33-18.14,3.33-18.14Z" transform="translate(-28.43 -18.54)" opacity="0.1"/><path d="M1087.42,522.72l-15.18,13.33s12.78,7.59,14.44,9.44,3.33-18.14,3.33-18.14Z" transform="translate(-28.43 -18.54)" fill="#e7effd"/><path d="M1061.13,526.79s-1.66-.83-3.24,1.58a10.45,10.45,0,0,1-4.53,3.51s-16.85,2.69-17.5,4.91l-7.87.46s-2.78.37-3,6.21-1.76,6.38-1.76,6.38-3.24,5.74-3,8.7a4.87,4.87,0,0,1-2.5,4.45l11.57,30.08s.37,12.41-1.76,16.94-6.11,24.63-6.11,24.63,1.67-.37,1.57.74-2,13.24-2,13.24-.56,4.81-1.48,6.48-1,10.36-1,10.36l-1.48,6.3s3.51,7.87,8.88,6.76S1041,656.39,1041,656.39l6.2-22.68,4.82-22.4,1.39-15.18,2.22-33.61,3.24-22.21S1062.43,528.37,1061.13,526.79Z" transform="translate(-28.43 -18.54)" opacity="0.1"/><path d="M1060.58,525.68s-1.67-.83-3.24,1.58a10.51,10.51,0,0,1-4.54,3.51s-16.85,2.69-17.5,4.91l-7.86.46s-2.78.37-3.06,6.2-1.76,6.39-1.76,6.39-3.24,5.74-3,8.7a4.85,4.85,0,0,1-2.5,4.45L1028.73,592s.37,12.41-1.76,16.94-6.11,24.63-6.11,24.63,1.67-.37,1.58.74-2,13.23-2,13.23-.55,4.82-1.48,6.48-1,10.37-1,10.37l-1.48,6.3s3.52,7.87,8.89,6.75,15.09-22.12,15.09-22.12l6.2-22.68,4.81-22.4L1052.8,595l2.22-33.61,3.24-22.21S1061.87,527.26,1060.58,525.68Z" transform="translate(-28.43 -18.54)" fill="#65617d"/><path d="M1001.15,597.33l-5.37,3.7s-8.21.26-14.08-1.18l-3-1.33-.6-.26.62.2a12.26,12.26,0,0,0,7.41.26c7.6-2.56,6.76-15.1,6.46-17.94,0-.29-.05-.47-.06-.54v0l0,.07a5,5,0,0,0,.35.49l.34.36h0L996,586.5a1.45,1.45,0,0,1,0,.23Z" transform="translate(-28.43 -18.54)" opacity="0.1"/><path d="M1019.75,561.14l-2.59.74-.37,5.27s-3-.46-3.89,3.15a12.71,12.71,0,0,1-2.31,5.28s-5.09,4.26-5.37,7.87l-3.15,1.94s-7.31-1.67-9-4.63c0,0,3.34,23.88-14.44,18,0,0,19.9,8.7,20.83,9.91s7,4.72,12.59,1.76,6.76-7.5,6.76-7.5,5.37-7.5,5.55-8.61,4.35-2.41,4.35-2.41l8-19.25Z" transform="translate(-28.43 -18.54)" fill="#65617d"/><path d="M1084.74,534.94l2.68-12.22s1.21,4,2.41,4.91l4,3s4,1.85,5.37,1.85,8.89,2,9.81,3,4.63.28,4.63.28,3.05,1,5.74,1.67,4,5.09,3.42,6.85a5.35,5.35,0,0,0,1.3,5c1.11,1.11,1.67,4.72,1.67,4.72a5.42,5.42,0,0,1,3.14,2.68c.93,2,.65,6.48.65,6.48l-13.79,19.44s.18,7.5-.37,9.17,1.94,30,1.94,30l2.87,48.69a50.51,50.51,0,0,1-4.63,3.61c-.83.37-1.66-17.22-1.66-17.86s-21.39-32-21.39-32-2.87-4.63-2.87-5.65-2.68-10.37-2.68-10.37l-4.07-18Z" transform="translate(-28.43 -18.54)" opacity="0.1"/><path d="M1130.69,562.11c0,.64,0,1.06,0,1.06l-13.78,19.42v0s.19,7.5-.37,9.17c-.32,1,.38,10.93,1,19.11.47,5.9.9,10.88.9,10.88l1.22,20.65,1.65,28a50.51,50.51,0,0,1-4.63,3.61c-.83.37-1.66-17.22-1.66-17.87s-21.39-32-21.39-32-2.87-4.63-2.87-5.65-2.68-10.37-2.68-10.37l-4.07-18,1.85-55.17,1.57-12.22s2.32,4,3.52,4.9l4,3.06s4,1.85,5.37,1.85,8.89,2,9.81,3,4.63.28,4.63.28,3.06,1,5.74,1.67,4,5.09,3.42,6.85a5.36,5.36,0,0,0,1.3,5c1.11,1.11,1.67,4.72,1.67,4.72a5.42,5.42,0,0,1,3.14,2.68A15,15,0,0,1,1130.69,562.11Z" transform="translate(-28.43 -18.54)" fill="#65617d"/><path d="M1017.53,808.76c.46,0,19.9.74,19.53,3.89S1017.53,808.76,1017.53,808.76Z" transform="translate(-28.43 -18.54)" opacity="0.1"/><path d="M1021.88,814s13.05,2.13,9.63,4.07S1021.88,814,1021.88,814Z" transform="translate(-28.43 -18.54)" opacity="0.1"/><path d="M1070.39,806.73s21.66,1.85,18.42,4.25-10.92,2.78-11.29,2.87S1070.39,806.73,1070.39,806.73Z" transform="translate(-28.43 -18.54)" opacity="0.1"/><path d="M1067.8,816.26s12,2,12.4,4.35S1067.8,816.26,1067.8,816.26Z" transform="translate(-28.43 -18.54)" opacity="0.1"/><path d="M1074.46,760.53s11,2.59,11.67,4.35Z" transform="translate(-28.43 -18.54)" opacity="0.1"/><path d="M1032,768.49s-5.74,1.67-.18,5S1032,768.49,1032,768.49Z" transform="translate(-28.43 -18.54)" opacity="0.1"/><path d="M1057.43,679.53c.65,0,10.74-3.33,14.26-1.85a23.45,23.45,0,0,0,7.86,1.48Z" transform="translate(-28.43 -18.54)" opacity="0.1"/><path d="M1058.73,690.08l-.1.92L1050,713.6s-1.39,6.85-2.59,10.74a70.55,70.55,0,0,0-1.81,8l7.64-47.37Z" transform="translate(-28.43 -18.54)" opacity="0.1"/><path d="M1072.17,650.2l-3.59.06h-.11l-2.11-9.33,3.12-.17Z" transform="translate(-28.43 -18.54)" fill="#3f3d56"/><path d="M1115.84,638.9l-2.3,1.9-7.7,6.33s-20.82,11.11-26.56.56c-5.06-9.3,18.55-15.94,24.24-17.39l1.21-.29Z" transform="translate(-28.43 -18.54)" fill="#fbbebe"/><path d="M1026.88,547.9s4.07,1.85,5,4.44S1026.88,547.9,1026.88,547.9Z" transform="translate(-28.43 -18.54)" opacity="0.1"/><path d="M1014.29,575.67s-5.92,7.22-3.52,10S1014.29,575.67,1014.29,575.67Z" transform="translate(-28.43 -18.54)" opacity="0.1"/><path d="M1120.19,552s-5.55.56-5.74,5.37Z" transform="translate(-28.43 -18.54)" opacity="0.1"/><path d="M1068.72,627.88c.56-.56,13.33-19.44,16.3-17.77Z" transform="translate(-28.43 -18.54)" opacity="0.1"/><path d="M1092.61,505.13a22,22,0,0,1-2.61,10.4l-.16,0c-1.4-.3-2.13-1.92-3.19-2.94a4.33,4.33,0,0,0-5-.7,5.08,5.08,0,0,0-2.46,4.75c-.7-3-.48-6.12-1.17-9.09s-2.76-6-5.6-6c-1.22,0-2.65.45-3.53-.47-.53-.55-.64-1.42-1-2.09-2-3.29-8.2-1.63-10.72.06s-5.45,4.37-8.58,5.81a22,22,0,0,1,44.06.32Z" transform="translate(-28.43 -18.54)" opacity="0.1"/><path d="M1067.85,498.38c.4.67.51,1.54,1,2.1.88.91,2.31.44,3.53.46,2.84.05,4.92,3.06,5.6,6s.47,6.12,1.18,9.08a5,5,0,0,1,2.45-4.74,4.35,4.35,0,0,1,5,.69c1.06,1,1.79,2.65,3.19,2.94s2.74-1.05,3.24-2.52a38.58,38.58,0,0,0,.8-4.61c.63-2.88,2.52-5.25,3.56-8a14.51,14.51,0,0,0-.09-10.34c-.7-1.74-1.73-3.3-2.43-5-1.07-2.63-1.35-5.61-2.65-8.12a9.6,9.6,0,0,0-11.53-4.74c-2,.76-3.76,2.22-5.8,2.88-2.74.88-5.66.22-8.49-.18s-6-.43-8.24,1.43c-2.62,2.15-3.34,6.18-5.8,8.53-1,1-2.32,1.62-3.41,2.53a4.7,4.7,0,0,0-1.91,3.76c.17,1.92,2,3.66,1.35,5.44a4.22,4.22,0,0,1-1,1.35,19.38,19.38,0,0,0-4.48,7.63c5,1.54,10.32-3.92,14.19-6.5C1059.65,496.76,1065.82,495.1,1067.85,498.38Z" transform="translate(-28.43 -18.54)" fill="#7c5c5c"/><path d="M1115.84,638.9l-2.3,1.9c-2-3.39-10.38-10.15-10.38-10.15l.36-.35,1.21-.29Z" transform="translate(-28.43 -18.54)" opacity="0.1"/><path d="M1118.06,635.47s-.82,2.06-1.68,3.84-1.79,3.4-1.83,2.09c-.1-2.6-10.83-11.3-10.83-11.3l1.45-1.42,1.69-1.64Z" transform="translate(-28.43 -18.54)" fill="#e7effd"/><path d="M1118.43,621.77l1.22,20.65c-2.88-4.47-10.77-15.93-15.84-15.56l12.31-14.16a16.5,16.5,0,0,0,1.41-1.81C1118,616.79,1118.43,621.77,1118.43,621.77Z" transform="translate(-28.43 -18.54)" opacity="0.1"/><path d="M1118.06,635.47s-.82,2.06-1.68,3.84c-3.23-4.42-7.66-9.65-11.21-10.63l1.69-1.64Z" transform="translate(-28.43 -18.54)" opacity="0.1"/><path d="M1127.32,560.58l3.33,2.59s5.56.1,6.11,4.72,5.65,6.76,5.65,6.76,3.79,3.8,3.79,5.56,2.87,4.9,2.87,5.18,2.78,5.92,2.41,6.94,3,5.46,1.94,7.13a42.87,42.87,0,0,0-2.22,4.63s-4.35,8.33-6.57,9.9-12.4,14.82-12.4,14.82-10.93,12.58-10.93,16.47c0,0-10.64-17.77-16.94-17.31l12.31-14.16s2.13-2.32,2.23-3.7,5.92-7.78,8.7-8.06c0,0,.46-3.79-.74-3.89s-2.22-3-2.22-3-8.15-9.63-8.24-15.74S1127.32,560.58,1127.32,560.58Z" transform="translate(-28.43 -18.54)" fill="#65617d"/><path d="M1132.23,569.37s-7.78,5.74-6.11,7.6S1132.23,569.37,1132.23,569.37Z" transform="translate(-28.43 -18.54)" opacity="0.1"/><path d="M1132.6,593.07s14.44-4.63,15.92,0Z" transform="translate(-28.43 -18.54)" opacity="0.1"/><path d="M1043.18,839s-7.78,5.1-11.67,4.35a14,14,0,0,0-7.87,1.3,23.36,23.36,0,0,1-9.81,6.39c-6.3,2.13-15.09,1.29-20.09-.37-2.36-.79-2.55-1.81-1.41-3.06,5.43,1.08,17.58,3.23,20.85,1.67a86.78,86.78,0,0,0,10.37-6.48s8-1.11,9.07-1.11c.79,0,6.94-2.54,10.41-4Z" transform="translate(-28.43 -18.54)" opacity="0.1"/><path d="M1090.27,849.45c0,.31-.07.51-.07.51s-1.85,4.07-12.13,5.55-10.27-3.42-10.27-3.42l.1-1.33C1071.15,852,1078.25,853.37,1090.27,849.45Z" transform="translate(-28.43 -18.54)" opacity="0.1"/><path d="M1030.72,568.26s0,21.11-1.8,23.19S1030.72,568.26,1030.72,568.26Z" transform="translate(-28.43 -18.54)" opacity="0.1"/><path d="M1114.17,575.07l2.69,7.54S1117.92,575.21,1114.17,575.07Z" transform="translate(-28.43 -18.54)" opacity="0.1"/><g opacity="0.1"><path d="M1048.72,494.15c.68-1.73-1.1-3.44-1.33-5.3a3.41,3.41,0,0,0-.3,1.67c.12,1.41,1.16,2.72,1.43,4A2.28,2.28,0,0,0,1048.72,494.15Z" transform="translate(-28.43 -18.54)"/><path d="M1079.44,514.09c-.66-2.92-.46-6-1.14-8.93s-2.76-6-5.6-6c-1.22,0-2.65.44-3.53-.47-.54-.55-.64-1.42-1-2.1-2-3.28-8.2-1.61-10.73.07-3.78,2.51-9,7.78-13.84,6.58-.23.56-.45,1.13-.63,1.72,5,1.54,10.32-3.92,14.19-6.5,2.53-1.68,8.7-3.34,10.73-.06.4.67.51,1.54,1,2.1.88.91,2.31.44,3.53.46,2.84.05,4.92,3.06,5.6,6s.47,6.12,1.18,9.08A5,5,0,0,1,1079.44,514.09Z" transform="translate(-28.43 -18.54)"/><path d="M1093.36,510.62c-.5,1.47-1.82,2.82-3.25,2.52s-2.12-1.92-3.18-2.94a4.36,4.36,0,0,0-5-.7,5.06,5.06,0,0,0-2.46,4.49,4.83,4.83,0,0,1,2.18-2.68,4.35,4.35,0,0,1,5,.69c1.06,1,1.79,2.65,3.19,2.94s2.74-1.05,3.24-2.52a11.81,11.81,0,0,0,.51-2.66A6.42,6.42,0,0,1,1093.36,510.62Z" transform="translate(-28.43 -18.54)"/><path d="M1097.72,498c-1,2.74-2.93,5.11-3.56,8-.12.58-.2,1.18-.27,1.78.64-2.88,2.51-5.24,3.55-8a13.89,13.89,0,0,0,.85-3.84A14,14,0,0,1,1097.72,498Z" transform="translate(-28.43 -18.54)"/></g><circle cx="935.51" cy="546.26" r="0.23" fill="#e6e8ec"/><rect x="849.12" y="551.42" width="181.18" height="208.22" rx="6.61" ry="6.61" fill="#fff"/><rect x="849.12" y="551.42" width="181.18" height="208.22" rx="6.61" ry="6.61" fill="#5a5773" opacity="0.1"/><rect x="858.36" y="562.04" width="162.7" height="186.98" rx="6.61" ry="6.61" fill="#fff"/><rect x="882.03" y="599.54" width="111.62" height="38.52" rx="6.03" ry="6.03" fill="#6c63ff"/><rect x="886.13" y="652.15" width="103.43" height="7.86" fill="#6c63ff"/><rect x="868.55" y="668.74" width="142.32" height="7.86" fill="#6c63ff"/><rect x="868.55" y="686.2" width="142.32" height="7.86" fill="#6c63ff"/><rect x="868.55" y="703.66" width="142.32" height="7.86" fill="#6c63ff"/><rect y="482.59" width="426.61" height="208.22" rx="6.61" ry="6.61" fill="#fff"/><rect y="482.59" width="426.61" height="208.22" rx="6.61" ry="6.61" fill="#5a5773" opacity="0.1"/><rect x="21.76" y="493.21" width="383.08" height="186.98" rx="6.61" ry="6.61" fill="#fff"/><rect x="77.51" y="530.72" width="262.81" height="38.52" rx="6.03" ry="6.03" fill="#6c63ff"/><rect x="87.15" y="583.32" width="243.53" height="7.86" fill="#6c63ff"/><rect x="45.75" y="599.91" width="335.1" height="7.86" fill="#6c63ff"/><rect x="45.75" y="617.37" width="335.1" height="7.86" fill="#6c63ff"/><rect x="45.75" y="634.83" width="335.1" height="7.86" fill="#6c63ff"/><path d="M132.7,859.18c1.19-4.34,2-8.16,2-8.16a17,17,0,0,1,2.22-8.27l0-1.2h0l.34-8.81a29.33,29.33,0,0,0-2-4.7c-1.48-2.83.5-12.92.5-12.92s6.43-14.07,5.35-23.2,13.62-39.83,13.62-39.83a39.48,39.48,0,0,0-.92-9,6.9,6.9,0,0,1-.1-1.87,1.77,1.77,0,0,1,0-.23v.07c.43-6,5.59-17,5.59-17l.19-21.4s-2.54-12.72,3-29.45c1.95-5.84,3.23-10.52,4.07-14.14.1-.41.19-.8.27-1.18-10.08-1.94-17.78-3.52-17.78-3.52s6.83-24.38,11-28.53,7.83-17.57,7.83-17.57,2.74-17.3-.4-22.5-3.28-14-3.28-14-7.42-5.83-8.28-8.32-2.23-8.1-2.12-11,1.17-5.5.91-7.05,2.51-7.29,1.34-10.11a7.74,7.74,0,0,1-.4-2.69s0,0,0-.08v0a37.42,37.42,0,0,1,.95-7.19,20.4,20.4,0,0,1,7.7-3.74l.19-.66.5-1.71a8.33,8.33,0,0,1,.76-.42l.05-.63.16-2.49L165,510c-2-9.86,11.12-10.81,11.12-10.81a6.87,6.87,0,0,1,3.81-3.1c2.66-.82-.12,14.71-1.39,15.66-1,.71-4,5.5-5.45,7.85h0l-.24.39a5.4,5.4,0,0,1,.58.65l-.63,3.37-.1.51a14,14,0,0,1,1.95,3.63s-2.49,2.52-2.12,5.46a17.59,17.59,0,0,1-1,6.73c.14-.15,1.89-1.9,3.55-1.4s6.28,2.09,6.28,2.09,3.47.75,3.12,1.51,2.23,4.24,2.23,4.24l9.73-8.53c.11-.27.21-.53.31-.8a22.35,22.35,0,0,0,1-3.87,20.92,20.92,0,0,1-3-1.07,6.53,6.53,0,0,1-2.54-1.76c-.9-1.16-1-2.7-1.35-4.11-.64-2.76-2.14-5.26-3.19-7.91a25.29,25.29,0,0,1-1.34-14,9.32,9.32,0,0,1,1.6-4c1.62-2.05,4.43-2.8,6.52-4.4s3.49-4.13,5.89-5.3c2.18-1.06,4.77-.82,7.16-.34A38.26,38.26,0,0,1,220.55,496c1.34.87,2.81,1.87,4.4,1.64a6.07,6.07,0,0,0,3.3-2.23.74.74,0,0,1,0-.14l.11-.11a16.49,16.49,0,0,1,1.18,7.08c0,.37,0,.75-.08,1.12,0,.13,0,.26,0,.39a1.82,1.82,0,0,0,0,.33h0a1.65,1.65,0,0,0,.06.49,3.51,3.51,0,0,0,.83,1.31,7.15,7.15,0,0,1,.72,1.07c0-.13-.07-.26-.11-.39a5.58,5.58,0,0,1,.86,3,2.93,2.93,0,0,1-.79,2.09,9.29,9.29,0,0,1-1.58,1.18,17.95,17.95,0,0,1-9.28,18.29c-.12.26-.24.53-.35.8a22.36,22.36,0,0,0-2.1,10.17c0,.25,0,.5.08.75s.23.27.33.41h0s15.5.75,19.28-2.42,8.9,8.43,8.9,8.43,5.52,1.29,6.67.26,7.64.14,7.64.14a14,14,0,0,1,9.82-3.17,28.69,28.69,0,0,1,7.27-3.68h0l.18-.06h0a7.84,7.84,0,0,1,3.51-.31s7.87-6,10.22-9.31S305,517.69,305,517.63l.07-.6.19-1.82a6.12,6.12,0,0,0,.94.12l.24-.63a34.33,34.33,0,0,1,2.45-5.08s.09-2.31-.56-2.91.63-9,.63-9,7.49-15.8,13.18-3.57c0,0,11.34,8.21,1.22,16.87,0,0-4,1.74-4.57,3.21-.4,1-1.83,3.62-2.79,5.39l-.43.79.11.1-.2,1.5-.08.59c1.79,1.11,3,2.19,2.67,3a17,17,0,0,0-1.27,4.11S302.66,546,300.64,553.19c0,0-37.06,20.14-49,21.22l1.65,10.84a86.42,86.42,0,0,1,.14,8.79c-.25,2.3.94,12.81.94,12.81s1.47,15.46,3.14,17.68,1,11.44,1,11.44a77.91,77.91,0,0,0,1.88,13.16c1.52,5.91,0,13.09,0,13.09s5.51,14.07-8.59,4.13c0,0-7.08-.71-15.24-1.3,0,.26,0,.54,0,.81,0,1.06-.05,2.2-.08,3.4-.2,7.93-.57,18.85-1.25,27.1-1.2,14.59-6.76,43.33-6.76,43.33l-.56,14.52a19.24,19.24,0,0,1,.26,4.17,27,27,0,0,1-4.47,14.39l-1.49,9.65s-2.85,6.28-3.05,10.09a4.54,4.54,0,0,0,.08.93,7.42,7.42,0,0,1,.07,1.49c0,4.4-3.08,14.82-3.08,14.82s-.57,10.61-2.18,11.16c-1.38.48,1.58,6.19,2.46,7.83a1.63,1.63,0,0,0,.07-.3l.19.32a7.54,7.54,0,0,1,.39,2.71,3.87,3.87,0,0,1-1.91,3.66c-3.09,1.73-4.77,3.2-2.23,3.92a28.23,28.23,0,0,1,2.78.69l.15-.35a1.71,1.71,0,0,1,1,1.9,7.77,7.77,0,0,1-1.09,3.56,38.76,38.76,0,0,1-4.6,7.68l-1.22-.18a6.1,6.1,0,0,0,.66,1.33,5.08,5.08,0,0,0,1.74,1.67,5.56,5.56,0,0,0,2.14.82,6.17,6.17,0,0,1,4.42,2.37c1.5,2.11,2.39,4.94-.84,7.27l-11.51,3.48s-19.64,1.79-18.44-2.55,2-8.16,2-8.16a17.35,17.35,0,0,1,1.88-7.72,10.32,10.32,0,0,1,.74-1.12l-.69-.1S191,839.89,189.12,838c-.42-.45-.51-.78-.4-1-.17-.53.33-.82,1-1,0,.12.09.25.13.38a9.65,9.65,0,0,1,1.9-.13s.83-5.05-1.16-7a1.9,1.9,0,0,1-.34-1.52,7.79,7.79,0,0,1,.29-2.06.75.75,0,0,0,.07.12c1.22-4.56,5-11.74,5-11.74s.33-4.61-.87-6.51,1.13-25.06,1.13-25.06-.05-11.24,1.58-16.41-1.31-11.45-1.31-11.45,0-.12.05-.33a.41.41,0,0,0,0-.09s.1-.69.26-1.76l0,.11c.44-3,1.25-8.31,1.79-10.79.77-3.51.63-20.46.63-20.46L196.28,714l-5.57,12.26-6,16.4s-2.81,3.4-3,7c0,.18,0,.35,0,.53a8.32,8.32,0,0,1,0,1.11,9.92,9.92,0,0,1-1.88,5.85s-1.73,7.79-4,9.7-2.45,5.76-2.45,5.76-3.14,11.28-4.49,13.23c-1.13,1.64-1.37,6.27-1.41,7.69h0c0,.26,0,.41,0,.41s-.53,4.06-.65,7.48c0,.42,0,.83,0,1.21a.22.22,0,0,1,0-.08,11.59,11.59,0,0,0,.22,2.77s0,.11,0,.17l0-.58a29.09,29.09,0,0,1,.55,7.12c-.09,4.09-.9,8.91-3.49,11.66-4.48,4.76-7.15,4-7.15,4s1.83,6.23,4.32,7.56a1.59,1.59,0,0,1,.27.18c0-.12,0-.24.07-.35a3,3,0,0,1,.66,2.32c.08,2.71-1.8,7-3.5,9a5,5,0,0,1-2.19,1.18,3.77,3.77,0,0,0,.39.26,7.85,7.85,0,0,0,.86.44,4.25,4.25,0,0,0,1.28.39,6.08,6.08,0,0,1,4.42,2.37c1.5,2.1,2.39,4.93-.84,7.26l-11.51,3.48S131.49,863.52,132.7,859.18Z" transform="translate(-28.43 -18.54)" fill="url(#ccb18d0b-874b-442a-b8cb-57bcf76cdeb5)"/><path d="M207.05,869.31l11.15-3.49c3.13-2.34,2.27-5.17.82-7.28a5.84,5.84,0,0,0-4.27-2.35,5.22,5.22,0,0,1-2.08-.83A5,5,0,0,1,211,853.7a8.2,8.2,0,0,1-1.09-4.3s-11.94-4-15.38-.59A9,9,0,0,0,193,850.9a18,18,0,0,0-1.84,7.72s-.76,3.81-1.93,8.16S207.05,869.31,207.05,869.31Z" transform="translate(-28.43 -18.54)" fill="#2d293d"/><path d="M153.44,861.82l11.15-3.49c3.13-2.34,2.27-5.17.82-7.27a5.84,5.84,0,0,0-4.28-2.36,3.93,3.93,0,0,1-1.24-.38,7.86,7.86,0,0,1-.83-.45c-3-1.81-2.77-6-2.77-6s-11.94-4-15.38-.59a8.84,8.84,0,0,0-1.22,1.52,17.45,17.45,0,0,0-2.16,8.29s-.77,3.82-1.93,8.16S153.44,861.82,153.44,861.82Z" transform="translate(-28.43 -18.54)" fill="#2d293d"/><path d="M194.52,848.81A9,9,0,0,0,193,850.9h0l18,2.79a8.2,8.2,0,0,1-1.09-4.3S198,845.4,194.52,848.81Z" transform="translate(-28.43 -18.54)" opacity="0.1"/><path d="M139.69,842.84l-.13,3.39c2.64,4.75,16.29,4.26,20.33,2.09a7.86,7.86,0,0,1-.83-.45c-3-1.81-2.77-6-2.77-6s-11.94-4-15.38-.59A8.84,8.84,0,0,0,139.69,842.84Z" transform="translate(-28.43 -18.54)" opacity="0.1"/><path d="M138.1,828.16a31.07,31.07,0,0,1,2,4.7L139.61,845c2.88,5.2,18.94,4.12,21.2,1.44s4.84-9.83,2.43-11.15-4.18-7.56-4.18-7.56,2.59.72,6.94-4,3.53-15.73,2.85-18.37.45-11.38.45-11.38.08-6.16,1.39-8.11,4.36-13.23,4.36-13.23.14-3.85,2.37-5.76,3.92-9.71,3.92-9.71a10.06,10.06,0,0,0,1.79-6.55c-.31-3.86,2.92-7.9,2.92-7.9l5.87-16.4,5.4-12.27,2.49,7.33s.12,16.95-.63,20.46-2,12.86-2,12.86,2.84,6.27,1.26,11.45-1.56,16.41-1.56,16.41-2.28,23.17-1.12,25.06.83,6.5.83,6.5-6.82,13.29-4.9,15.22,1.12,7,1.12,7-4.3-.17-2.53,1.75S193,849.68,193,849.68l18.51,2.87a39.17,39.17,0,0,0,4.46-7.69c2.68-5.59-.26-5.09-2.71-5.8s-.83-2.19,2.16-3.92,1.46-5.95,1.46-5.95-4.17-7.71-2.6-8.26,2.12-11.16,2.12-11.16,3.56-12.5,2.92-15.91,2.91-11.44,2.91-11.44l1.44-9.64a26.63,26.63,0,0,0,4.09-18.17l.58-14.92S233.78,711,235,696.36c.76-9.34,1.14-22.11,1.31-30.08.1-4.48.14-7.44.14-7.44l-66.17-9.48a54.61,54.61,0,0,1-1.59,9.82c-.81,3.63-2.06,8.31-4,14.15-5.42,16.73-3,29.45-3,29.45l-.21,21.4s-6.4,14.08-5.35,19.05a40.64,40.64,0,0,1,.88,9S142.77,782.91,143.81,792s-5.21,23.21-5.21,23.21S136.67,825.33,138.1,828.16Z" transform="translate(-28.43 -18.54)" fill="#575988"/><path d="M179.17,749.5,159.05,746S170.06,758.16,179.17,749.5Z" transform="translate(-28.43 -18.54)" opacity="0.05"/><path d="M162.73,726.39s-1,7.12,3.31,10C166,736.37,158.25,734.84,162.73,726.39Z" transform="translate(-28.43 -18.54)" opacity="0.1"/><path d="M164.85,703.67s16.37,14.57,22.56,13.66S164.85,703.67,164.85,703.67Z" transform="translate(-28.43 -18.54)" opacity="0.1"/><path d="M204,757s12.73,3.42,12.92,8.58S204,757,204,757Z" transform="translate(-28.43 -18.54)" opacity="0.1"/><path d="M198.69,821s18,4.08,12.78,6.19-13.77,3.63-13.77,3.63S191.84,830.92,198.69,821Z" transform="translate(-28.43 -18.54)" opacity="0.05"/><g opacity="0.05"><path d="M215,831a3.6,3.6,0,0,0,1.76-2.56l.17.33s1.54,4.21-1.46,6c-.34.19-.66.39-1,.58-.53-.12-1.11-.22-1.66-.38C210.37,834.22,212,832.74,215,831Z" transform="translate(-28.43 -18.54)"/><path d="M191.66,828.88c-.48-.48-.41-1.66,0-3.17a8.59,8.59,0,0,1,.86,4.5A3.5,3.5,0,0,0,191.66,828.88Z" transform="translate(-28.43 -18.54)"/><path d="M197.4,752.48a20.92,20.92,0,0,1,1,5.71,21.81,21.81,0,0,0-1.26-3.94S197.25,753.56,197.4,752.48Z" transform="translate(-28.43 -18.54)"/><path d="M156.17,742.81a7.34,7.34,0,0,1-.11-1.69c.19,1.16.31,2.23.38,3.17C156.36,743.81,156.27,743.32,156.17,742.81Z" transform="translate(-28.43 -18.54)"/><path d="M195.73,807.17a10.19,10.19,0,0,1-.32-3.43,11.57,11.57,0,0,1,.72,4.34A4.23,4.23,0,0,0,195.73,807.17Z" transform="translate(-28.43 -18.54)"/><path d="M190.81,836a60.4,60.4,0,0,1,1.75,9.53l18.51,2.87a38.76,38.76,0,0,0,4.47-7.69c.24-.49.42-.93.58-1.33,1.09.55,1.49,1.73-.11,5.05a39.23,39.23,0,0,1-4.46,7.68L193,849.26s-1-9.74-2.79-11.65C189.38,836.66,190,836.23,190.81,836Z" transform="translate(-28.43 -18.54)"/><path d="M216.44,809.35s-.56,10.61-2.12,11.16h0c-.71-1.79-1.17-3.47-.47-3.72,1.56-.56,2.13-11.16,2.13-11.16s3.56-12.49,2.92-15.91,2.9-11.43,2.9-11.43l1.45-9.65a26.63,26.63,0,0,0,4.09-18.17l.57-14.92s5.42-28.74,6.6-43.33c.75-9.34,1.13-22.11,1.31-30.08,0-1.44.06-2.72.08-3.8l.53.08s0,3-.14,7.43c-.17,8-.55,20.75-1.31,30.09-1.18,14.58-6.59,43.33-6.59,43.33l-.58,14.91a26.66,26.66,0,0,1-4.08,18.17L222.27,782s-3.55,8-2.91,11.44S216.44,809.35,216.44,809.35Z" transform="translate(-28.43 -18.54)"/><path d="M160.35,842.31a18,18,0,0,0,3.22-7.19c1.83,1.78-.6,8.35-2.75,10.9s-18.32,3.76-21.2-1.43l.11-2.93C143.73,845.94,158.21,844.85,160.35,842.31Z" transform="translate(-28.43 -18.54)"/><path d="M137.64,824a31.07,31.07,0,0,1,2,4.7l-.09,2.15a33.59,33.59,0,0,0-1.42-3.14,9.27,9.27,0,0,1-.52-3.83Z" transform="translate(-28.43 -18.54)"/><path d="M160,827.32a30.07,30.07,0,0,1-1.38-3.71s2.59.71,6.93-4.05c3.16-3.47,3.59-10.22,3.33-14.66.68,2.65,1.49,13.61-2.85,18.37C163.17,826.39,161.08,827.16,160,827.32Z" transform="translate(-28.43 -18.54)"/><path d="M169.31,793.52a82.23,82.23,0,0,0-.66,9.11,13,13,0,0,0-.26-1.44c-.67-2.65.44-11.38.44-11.38s.09-6.16,1.39-8.11,4.36-13.23,4.36-13.23.15-3.84,2.38-5.76,3.92-9.71,3.92-9.71a10.12,10.12,0,0,0,1.79-6.55c-.31-3.86,2.92-7.9,2.92-7.9l5.87-16.4,5.4-12.27,2.49,7.34s0,.9,0,2.34l-2-6-5.4,12.26-5.87,16.41s-3.23,4-2.92,7.9a10.06,10.06,0,0,1-1.79,6.55s-1.69,7.79-3.92,9.7-2.37,5.76-2.37,5.76-3.06,11.28-4.36,13.24S169.31,793.52,169.31,793.52Z" transform="translate(-28.43 -18.54)"/></g><path d="M167.28,510.1l.94,5.66-.16,2.5-.12,1.84,6.39.91.77-1.3h0c1.42-2.35,4.36-7.14,5.29-7.86,1.22-.95,3.94-16.48,1.36-15.66a6.75,6.75,0,0,0-3.7,3.1S165.39,500.25,167.28,510.1Z" transform="translate(-28.43 -18.54)" fill="#ffcdd3"/><path d="M167.94,520.1l6.39.91.77-1.3h0a5.67,5.67,0,0,0-7-1.44Z" transform="translate(-28.43 -18.54)" opacity="0.1"/><path d="M166.2,523.08l8.39,2.29.22-1.26.61-3.37a5.83,5.83,0,0,0-8.15-1.43l-.48,1.71Z" transform="translate(-28.43 -18.54)" fill="#dce6f2"/><path d="M303.74,516l8.84,5.2s.37-.71.89-1.68c.93-1.77,2.31-4.43,2.7-5.39.59-1.47,4.43-3.22,4.43-3.22,9.81-8.67-1.16-16.86-1.16-16.86-5.5-12.23-12.76,3.58-12.76,3.58s-1.25,8.43-.62,9,.54,2.91.54,2.91a34,34,0,0,0-2.38,5.08C303.91,515.45,303.74,516,303.74,516Z" transform="translate(-28.43 -18.54)" fill="#ffcdd3"/><path d="M303.74,516l8.84,5.2s.37-.71.89-1.68c-1.24-1.11-5.62-5-7.11-4.84a10.73,10.73,0,0,1-2.14,0C303.91,515.45,303.74,516,303.74,516Z" transform="translate(-28.43 -18.54)" opacity="0.1"/><path d="M302.71,518.67l10,5.39.28-2.18.2-1.5s-5.68-5.26-7.42-5.14a9.44,9.44,0,0,1-2.66-.11l-.18,1.82Z" transform="translate(-28.43 -18.54)" fill="#dce6f2"/><path d="M190.45,548.34s44.07,6.7,35.9,3.7c-5.69-2.1-7.84-5.85-8.16-9.93a23.22,23.22,0,0,1,2-10.18,44.62,44.62,0,0,1,4.27-7.84s-33.12-19.91-27-2.73a27.14,27.14,0,0,1,1.61,8.09,22.8,22.8,0,0,1-1.18,8.08A24.2,24.2,0,0,1,190.45,548.34Z" transform="translate(-28.43 -18.54)" fill="#ffcdd3"/><path d="M197.5,521.36a27.14,27.14,0,0,1,1.61,8.09c3.08,2.79,6.58,2.75,11.07,2.92,3.45.14,7.23,1.12,10-.44a44.62,44.62,0,0,1,4.27-7.84S191.38,504.18,197.5,521.36Z" transform="translate(-28.43 -18.54)" opacity="0.1"/><circle cx="183.01" cy="496.73" r="18.31" fill="#ffcdd3"/><path d="M190.45,548.34s44.07,6.7,35.9,3.7c-5.69-2.1-7.84-5.85-8.16-9.93-2.11-2.47-6.47-4.36-9.28-5.39a13.33,13.33,0,0,0-8-.44,11,11,0,0,0-3,1.25A24.2,24.2,0,0,1,190.45,548.34Z" transform="translate(-28.43 -18.54)" opacity="0.1"/><path d="M166.2,523.08l8.39,2.29.22-1.26a7.47,7.47,0,0,0-8-3.09Z" transform="translate(-28.43 -18.54)" opacity="0.1"/><path d="M302.71,518.67l10,5.39.28-2.18A75.72,75.72,0,0,0,302.89,517Z" transform="translate(-28.43 -18.54)" opacity="0.1"/><path d="M168.65,659.18c17,3.37,41.3,7.83,45.21,6.8,3.25-.85,13.5-.35,22.41.3.1-4.48.14-7.44.14-7.44l-66.17-9.48A54.61,54.61,0,0,1,168.65,659.18Z" transform="translate(-28.43 -18.54)" opacity="0.1"/><path d="M151.72,654.5s56.06,11.86,62.19,10.25,37.15,1.58,37.15,1.58c13.63,9.92,8.32-4.14,8.32-4.14s1.51-7.18,0-13.09a80,80,0,0,1-1.81-13.16s.67-9.22-.94-11.43-3-17.68-3-17.68-1.13-10.51-.89-12.81-.12-8.79-.12-8.79l-1.59-10.84c11.59-1.09,47.48-21.27,47.48-21.27,2-7.16,15.69-23.58,15.69-23.58a17.76,17.76,0,0,1,1.24-4.11c1-2.42-12.63-7.87-12.63-7.87S292,529.77,289.76,533.07s-9.91,9.32-9.91,9.32a7.51,7.51,0,0,0-3.4.31l-.18,0h0a27.47,27.47,0,0,0-7,3.69,13.4,13.4,0,0,0-9.52,3.17s-6.27-1.16-7.38-.13-6.46-.25-6.46-.25-5-11.58-8.61-8.41-18.67,2.44-18.67,2.44c-1.89-2.74-6.69-4.83-9.69-5.93a13.25,13.25,0,0,0-8-.44,10.39,10.39,0,0,0-3.23,1.41l-9.44,8.56s-2.49-3.48-2.15-4.24-3-1.5-3-1.5-4.41-1.56-6.08-2.08-3.3,1.24-3.44,1.4a17.78,17.78,0,0,0,1-6.73c-.35-2.94,2.05-5.47,2.05-5.47-4.87-13.43-17.44-2.82-17.44-2.82s-1.67,7.17-.54,10-1.56,8.56-1.32,10.11-.77,4.13-.88,7.05,1.21,8.52,2,11,8,8.32,8,8.32.13,8.78,3.16,14,.37,22.5.37,22.5-3.6,13.41-7.61,17.57S151.72,654.5,151.72,654.5Z" transform="translate(-28.43 -18.54)" fill="#656691"/><path d="M237.88,556.48s1.89-5,3.44-5.41a35.43,35.43,0,0,0,4.54-1.83l-.92-1.93s-5.84,1.37-6.82,3S237.88,556.48,237.88,556.48Z" transform="translate(-28.43 -18.54)" opacity="0.1"/><path d="M269.22,546.45c.25,1.55,13.88,3.46,13.88,3.46l-6.65-7.21h0l-.17,0h0A27.47,27.47,0,0,0,269.22,546.45Z" transform="translate(-28.43 -18.54)" opacity="0.1"/><circle cx="281.2" cy="508.32" r="1.23" fill="#575988"/><circle cx="279.53" cy="510.72" r="1.23" fill="#575988"/><circle cx="277.9" cy="512.93" r="1.23" fill="#575988"/><circle cx="276.2" cy="515.33" r="1.23" fill="#575988"/><circle cx="131.25" cy="509.62" r="1" fill="#575988"/><circle cx="131.01" cy="511.88" r="1" fill="#575988"/><circle cx="130.78" cy="514.14" r="1" fill="#575988"/><path d="M236.2,598.15c.15-.17-36.2,42.27-62.14,15.94C174.06,614.09,216.36,621.49,236.2,598.15Z" transform="translate(-28.43 -18.54)" opacity="0.1"/><path d="M255.24,621.68s-20.77-.23-23.17,5.65l-.24,6.21a4,4,0,0,0,3.86.15c2.14-1.05,14.92-6.94,19.23-3.7Z" transform="translate(-28.43 -18.54)" opacity="0.1"/><path d="M254.85,621.66s-19.85-.22-22.15,5.39l-.23,5.92a3.8,3.8,0,0,0,3.69.14c2-1,14.27-6.61,18.39-3.53Z" transform="translate(-28.43 -18.54)" fill="#656691"/><path d="M245.65,576.2a67.4,67.4,0,0,1-8.57,13.49A54.07,54.07,0,0,1,224,601.37S245.19,579,245.65,576.2Z" transform="translate(-28.43 -18.54)" opacity="0.1"/><path d="M253.36,552.36s-4,14.81-13.15,19.54Z" transform="translate(-28.43 -18.54)" opacity="0.1"/><path d="M258.61,554.07c.1-.27,2.62,11.94-12.21,18.07C246.4,572.14,252.67,570.27,258.61,554.07Z" transform="translate(-28.43 -18.54)" opacity="0.1"/><path d="M168.42,540.57c.23,0-7.37,4.45-9.47,6.56C159,547.13,164.05,540.09,168.42,540.57Z" transform="translate(-28.43 -18.54)" opacity="0.1"/><path d="M215.75,532.05a3.93,3.93,0,0,1-1.53,2.42,3.77,3.77,0,0,1-1.74.31c-5.59.14-11.41.16-16.48-2.19a6.22,6.22,0,0,1-2.45-1.76c-.88-1.16-1-2.69-1.31-4.11-.62-2.76-2.07-5.25-3.08-7.9a26,26,0,0,1-1.27-14,9.37,9.37,0,0,1,1.55-4c1.56-2.05,4.29-2.8,6.31-4.41s3.38-4.13,5.72-5.31c2.1-1.06,4.61-.83,6.92-.34a36.32,36.32,0,0,1,12.7,5.33c1.29.87,2.71,1.86,4.25,1.63a5.92,5.92,0,0,0,3.26-2.3,17,17,0,0,1,1.06,8,3.45,3.45,0,0,0,0,1.2,3.65,3.65,0,0,0,.8,1.31c1.31,1.65,2.08,4.21.66,5.77-.62.68-1.55,1-2.15,1.73-1.08,1.24-.81,3.1-.85,4.75a2.5,2.5,0,0,1-.46,1.61,2.39,2.39,0,0,1-2.28.45,6.22,6.22,0,0,0-2.4-.32,4,4,0,0,0-2.15,1.52C218.12,524.58,217,528.15,215.75,532.05Z" transform="translate(-28.43 -18.54)" fill="#2d293d"/><g opacity="0.1"><path d="M193,529.39a6.14,6.14,0,0,0,2.45,1.77c5.07,2.35,10.89,2.32,16.48,2.19a3.65,3.65,0,0,0,1.74-.32,3.88,3.88,0,0,0,1.53-2.41c1.23-3.91,2.37-7.47,5.08-10.65a4,4,0,0,1,2.15-1.53,6.42,6.42,0,0,1,2.4.32,2.36,2.36,0,0,0,2.28-.45,2.46,2.46,0,0,0,.46-1.6c0-1.65-.23-3.51.85-4.76.6-.69,1.53-1,2.15-1.72a3.62,3.62,0,0,0,.49-3.66c.92,1.59,1.27,3.6.07,4.91-.62.68-1.54,1-2.15,1.73-1.08,1.24-.8,3.1-.84,4.75a2.45,2.45,0,0,1-.47,1.61,2.38,2.38,0,0,1-2.28.45,6.17,6.17,0,0,0-2.39-.32,4,4,0,0,0-2.16,1.53c-2.7,3.17-3.84,6.74-5.08,10.64a2.89,2.89,0,0,1-3.26,2.74c-5.59.13-11.41.15-16.49-2.2a6.26,6.26,0,0,1-2.45-1.76,4.8,4.8,0,0,1-.73-1.51A1.84,1.84,0,0,0,193,529.39Z" transform="translate(-28.43 -18.54)"/><path d="M229.62,504.1a2.47,2.47,0,0,1-.52-1,3.45,3.45,0,0,1,0-1.2,17.05,17.05,0,0,0-.6-6.66l.1-.11a16.87,16.87,0,0,1,1.07,8A5.43,5.43,0,0,0,229.62,504.1Z" transform="translate(-28.43 -18.54)"/></g><path d="M218.58,543.27s-23,2.15-24.9-1.37" transform="translate(-28.43 -18.54)" opacity="0.1"/><path d="M174.51,532.1s-12.71-.47-15.68,4.18" transform="translate(-28.43 -18.54)" opacity="0.1"/></svg>
            </div>
        </div>
    </div>

</div>
<!----   End of not Authorised --->








          

    </div>
</template>
<script src="plugins/select2/js/select2.full.min.js"></script>

<script>
    export default {
      
         data(){
           
        return {
             country: 0,

                countries: [],
                roleslist: [],
                typeslist:[],
                branchbalancedforthisdate : null,
                collectionsaccountcurrentbalance:null,
                currencydetails:null,
                shopopenningpalance:null,
                todayscashintotal:null,
                todayscashouttotal:null,
                todaysexpensestotal:null,
                todayspayouttotal:null,
                shopbalancngname: null,
                todayscashintotal:null,
                shopopenningbalance:null,
                shopopenningbalancecacollectpoint:null,
                 totalcashout: null,
              totalexpenses: null,
              totalpayout:null,
              totaldayscashin:null,
                totalcashin:null,
                cashinforcollectiontotal:null,
            ///////////////////////////////////
          brancheslist: [],
          mybrancheslist:[],
       
       
         gencomponentaccessCahtransactions:'',
         branchcashOutSettings:'',
           
         branchcashInSettings:'',
         branchpayoutaccessSettings:'',
         branchexpensesaccessSetting:'',
         submenuaccessSettings:'',
         shopbalancingaccessSettings:'',
         cashcollectionaccessSetting:'',
         cashcreditaccessSetting:'',
         fishcreditaccessSetting:'',
         fishdebitaccessSetting:'',
         /// fish macines
         fishmachinestotal:'',
         machineoneopenningcode:'',
         fishgameproduct:'',
         virtualgameproduct:'',
         soccergameproduct:'',
     ///    

       
       ////////////////////////////////////////////////////////////////////////////////////
          myValue: '',
          myOptions: [], // or [{id: key, text: value}, {id: key, text: value}]
          editmode: false,
          shopcashoutrecords : {},
          shopcintransferrecords:{},
          fishcollectionrecords:{},
          fishcashcreditrecords:{},
            allowedtoviewcollectionsccount:{},
          datarecordsSubmenusauthorised:{},
          allowedrolecomponentsObject :{},
          shopbalancingdatarecords :{},
           intermshopbalancingdatarecords :{},
           datarecordsbranchexpensesrecords :{},
          admincashindatarecords:{},
          admincashoutrecords:{},
          branchpayoutrecords:{},
          allowedrolecomponentfeaturesObject : {},
          allowedtoaddmainmenuaccess:{},
          allowedtoaddsubmenuaccess:{},
          allowedtorevokesubmenuaccess:{},
          allowedtorevokecomponentaccess:{},
          allowedtogivecomponentaccess:{},
          allowedtoaddshopBalancingRecord:{},
          allowedtodeleteshopBalancingRecord:{},
          allowedtoviewshopBalancingRecord:{},
          allowedtodeletepayout:{},
          allowedtoaddpauout:{},
          allowedtodeletepayout:{},
          allowedtoeditpayout:{},
          allowedtoeditexpenserecord:{},
          allowedtoeditadmincashcollection:{},
           allowedtoeditadmincashcredit:{},
           allowedtoaddnewcashcredit:{},
            allowedtodeleteadmincashcredit:{},
          allowedtodeleteadmincashcollection:{},
          allowedtoaddnewcashcollection:{},
           allowedtodeletecollection:{},
              allowedtodeletecredit:{},
          allowedtodeleteexpenserecord:{},
          allowedtoaddnewexpensereccord:{},



         // brancheslist:{},
          componentslist:{},
          submenulist:{},
          mainmenulist:{},
          formfeatures:{},
expenseslist:{},

          form: new Form({
                /// Users Form
 machineonesales: 0,
        machineonepayout: 0,
        machineonecurrentcode: 0,
                id: '',
                name:'',
                email:'',
                rolename:'',
                machineoneopenningcode:'',
                type:'',
branchnametobalance:'',
transferdate:'',
////////////////////////////////////////////////////////Branches
branchname: '',
openningbalance:'',
contact:'', 
location:'',
expense:'',
description:'',
///
 receiptno : '',
                                    branch : '',
                                    datemade : '',
                                    amount : ''

                

            })
            }
         },

methods:{

 updatemachineoneSales(event) {
        this.form.machineonesales = event.target.value
        this.form.machineonecurrentcode = this.form.machineonesales - this.form.machineonepayout
      },
      updatemachineonePayout(event) {
        this.form.machineonepayout = event.target.value
        this.form.machineonecurrentcode = this.form.machineonesales - this.form.machineonepayout
      },

getRoles: function(){ axios.get('/api/getRoles').then(function (response) { this.roleslist = response.data;}.bind(this));},
getUsertypes: function(){ axios.get('/api/getUsertypes').then(function (response) { this.typeslist = response.data;}.bind(this));},


    formatPrice(value) {
        let val = (value/1).toFixed(0).replace('.', ',')
        return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")
    },
    /// submiting the balancing record date and branch
myClickEventroletoaddcomponent($event) { const elem = this.$refs.myBtnroledd
            elem.click()
        },



myClickEventsavennn($event) { const elem = this.$refs.btnForshopbalancing
            elem.click()
        },


///////////////////////////////////////// collection Branch

SavetheCollectionbranch (){

   axios.get("api/cashindetails").then(({ data }) => (this.admincashindatarecords = data));
  this.form.post('api/brachtocollectorcredit');
 //axios.get("api/branchtobalance").then(({ data }) => (this.clcash = data));
 // axios.get("api/branchalreadybalanced").then(({ data }) => (this.branchbalancedforthisdate = data));
  //axios.get("api/pendingcashin").then(({ data }) => (this.pendingtransfer = data));
  // axios.get("api/getbranchopenningb").then(({ data }) => (this.shopopenningbalance = data));
 // axios.get("api/getbranchnamebalancing").then(({ data }) => (this.shopbalancngname = data));
   axios.get("api/getbranchnametocollectfrom").then(({ data }) => (this.shopbalancngname = data));
// axios.get("api/getbranchopenningb").then(({ data }) => (this.shopopenningbalance = data));
   
     //    axios.get("api/getdaypayoutbranch").then(({ data }) => (this.totalpayout = data));
         

/////////
       axios.get("api/getdaycashoutbranch").then(({ data }) => (this.totalcashout = data));
     
      axios.get("api/getdayexpensesbranch").then(({ data }) => (this.totalexpenses = data));
     axios.get("api/gettodayscashout").then(({ data }) => (this.totalcashout = data));   
     axios.get("api/gettodayexpenses").then(({ data }) => (this.totalexpenses = data)); 
     axios.get("api/gettodayspayout").then(({ data }) => (this.totalpayout = data));
     axios.get("api/gettodaycashin").then(({ data }) => (this.cashinforcollectiontotal = data));
     axios.get("api/getbranchopenningbalancefortoday").then(({ data }) => (this.shopopenningbalancecacollectpoint = data));
            



        }, 
        SavetheCreditbranch (){

  axios.get("api/cashoutfromoffice").then(({ data }) => (this.admincashoutrecords = data));
  this.form.post('api/brachtocollectorcredit');
 //axios.get("api/branchtobalance").then(({ data }) => (this.clcash = data));
 // axios.get("api/branchalreadybalanced").then(({ data }) => (this.branchbalancedforthisdate = data));
  //axios.get("api/pendingcashin").then(({ data }) => (this.pendingtransfer = data));
  // axios.get("api/getbranchopenningb").then(({ data }) => (this.shopopenningbalance = data));
 // axios.get("api/getbranchnamebalancing").then(({ data }) => (this.shopbalancngname = data));
   axios.get("api/getbranchnametocollectfrom").then(({ data }) => (this.shopbalancngname = data));
// axios.get("api/getbranchopenningb").then(({ data }) => (this.shopopenningbalance = data));
   
     //    axios.get("api/getdaypayoutbranch").then(({ data }) => (this.totalpayout = data));
         

/////////
       axios.get("api/getdaycashoutbranch").then(({ data }) => (this.totalcashout = data));
     
      axios.get("api/getdayexpensesbranch").then(({ data }) => (this.totalexpenses = data));
     axios.get("api/gettodayscashout").then(({ data }) => (this.totalcashout = data));   
     axios.get("api/gettodayexpenses").then(({ data }) => (this.totalexpenses = data)); 
     axios.get("api/gettodayspayout").then(({ data }) => (this.totalpayout = data));
     axios.get("api/gettodaycashin").then(({ data }) => (this.cashinforcollectiontotal = data));
     axios.get("api/getbranchopenningbalancefortoday").then(({ data }) => (this.shopopenningbalancecacollectpoint = data));
            



        }, 








myClickEventdddd($event) { const elem = this.$refs.myBtn89
            elem.click()
        },








myClickEventforsubmenus($event) { const elem = this.$refs.myBtnsubmenus
            elem.click()
        },

myClickEventformainmenuas($event) { const elem = this.$refs.myBtnmainmen
            elem.click()
        },

  myClickEvent($event) { const elem = this.$refs.myBtn
            elem.click()
        },
         myClickEvent2($event) { const elem = this.$refs.myBtn2
            elem.click()
        },

SaveRoletoaddmainmenu (){ 
    this.form.post('api/roletoaddmainmenu');
      axios.get("api/payouts").then(({ data }) => (this.branchpayoutrecords = data));
            },

SaveRoletoaddsubment (){ 
    this.form.post('api/roletoaddsumenu');
     axios.get("api/authorisedsubmenus").then(({ data }) => (this.datarecordsSubmenusauthorised = data));
            },

  SaveRoletoaddcomponent (){ 
    this.form.post('api/roletobalance');
     axios.get("api/authorisedcomponents").then(({ data }) => (this.allowedrolecomponentsObject = data));
     
 
            },

              SaveRoletoaddformcomponent (){ 
    this.form.post('api/saveroleformcomponent');
     axios.get("api/authorisedformcomponents").then(({ data }) => (this.allowedrolecomponentfeaturesObject = data));
 
            },




paginationroleAuthorisedsubmenues(page = 1) {
                        axios.get('api/authorisedsubmenus?page=' + page)
                          .then(response => {
                            this.datarecordsSubmenusauthorised = response.data;
                          });
                      },

                      paginationroleAuthorisedmainmenus(page = 1) {
                        axios.get('api/authorisedmainmenus?page=' + page)
                          .then(response => {
                            this.branchpayoutrecords = response.data;
                          });
                      },



paginationroleAuthorisedcomponents(page = 1) {
                        axios.get('api/authorisedcomponents?page=' + page)
                          .then(response => {
                            this.allowedrolecomponentsObject = response.data;
                          });
                      },


paginationroleAuthorisedcomponentsfeature(page = 1) {
                        axios.get('api/shopcashoutdetails?page=' + page)
                          .then(response => {
                            this.allowedrolecomponentfeaturesObject = response.data;
                          });
                      },



   paginationResultsBranches(page = 1) {
                        axios.get('api/shopcashoutdetails?page=' + page)
                          .then(response => {
                            this.shopcashoutrecords = response.data;
                          });
                      },


      

loadintermShopbalancingrecords(){
       axios.get("api/currentintermbalancingrecords").then(({ data }) => (this.intermshopbalancingdatarecords = data));
  axios.get("api/currentintermbalancingrecords").then(({ data }) => (this.allowedtodeleteshopBalancingRecord = data));
       /// FISHING
       // fish macine product in the branch
        axios.get("api/fishgameproduct").then(({ data }) => (this.fishgameproduct = data));
        axios.get("api/virtualgameproduct").then(({ data }) => (this.virtualgameproduct = data));
        axios.get("api/soccergameproduct").then(({ data }) => (this.soccergameproduct = data));
       
 /// checking for the Number of fish macines

         axios.get("api/fishmachinestotal").then(({ data }) => (this.fishmachinestotal = data));
          axios.get("api/machineoneopenningcode").then(({ data }) => (this.machineoneopenningcode = data));



  }, 


loadShopbalancingrecords(){
       axios.get("api/currentbalancingrecords").then(({ data }) => (this.shopbalancingdatarecords = data));
  axios.get("api/allowedtodeleteshopBalancingRecord").then(({ data }) => (this.allowedtodeleteshopBalancingRecord = data));
       /// FISHING
       // fish macine product in the branch
        axios.get("api/fishgameproduct").then(({ data }) => (this.fishgameproduct = data));
        axios.get("api/virtualgameproduct").then(({ data }) => (this.virtualgameproduct = data));
        axios.get("api/soccergameproduct").then(({ data }) => (this.soccergameproduct = data));
       
 /// checking for the Number of fish macines

         axios.get("api/fishmachinestotal").then(({ data }) => (this.fishmachinestotal = data));
          axios.get("api/machineoneopenningcode").then(({ data }) => (this.machineoneopenningcode = data));



  },









 loadfishcreditsrecords(){
 axios.get("api/cashoutfromofficeforfish").then(({ data }) => (this.fishcashcreditrecords = data));
     //  this.getRoles();
     //  this.getUsertypes();
     axios.get("api/shopopenningpalance").then(({ data }) => (this.shopopenningpalance = data));
     axios.get("api/todayscashintotal").then(({ data }) => (this.todayscashintotal = data));
     axios.get("api/todayscashouttotal").then(({ data }) => (this.todayscashouttotal = data));
     axios.get("api/todaysexpensestotal").then(({ data }) => (this.todaysexpensestotal = data));
     axios.get("api/todayspayouttotal").then(({ data }) => (this.todayspayouttotal = data));
 },


 loadfishcollectionrecords(){
 axios.get("api/fishcollections").then(({ data }) => (this.fishcollectionrecords = data));
     //  this.getRoles();
     //  this.getUsertypes();
     axios.get("api/shopopenningpalance").then(({ data }) => (this.shopopenningpalance = data));
     axios.get("api/todayscashintotal").then(({ data }) => (this.todayscashintotal = data));
     axios.get("api/todayscashouttotal").then(({ data }) => (this.todayscashouttotal = data));
     axios.get("api/todaysexpensestotal").then(({ data }) => (this.todaysexpensestotal = data));
     axios.get("api/todayspayouttotal").then(({ data }) => (this.todayspayouttotal = data));
 },

  loadBranchcashintransactions(){
       
       axios.get("api/cashindetails").then(({ data }) => (this.shopcintransferrecords = data));
     //  this.getRoles();
     //  this.getUsertypes();
     axios.get("api/shopopenningpalance").then(({ data }) => (this.shopopenningpalance = data));
     axios.get("api/todayscashintotal").then(({ data }) => (this.todayscashintotal = data));
     axios.get("api/todayscashouttotal").then(({ data }) => (this.todayscashouttotal = data));
     axios.get("api/todaysexpensestotal").then(({ data }) => (this.todaysexpensestotal = data));
     axios.get("api/todayspayouttotal").then(({ data }) => (this.todayspayouttotal = data));
    








        this.checkBranchescomponentfeatures();
        axios.get("api/gencomponentaccessCahtransactions").then(({ data }) => (this.gencomponentaccessCahtransactions = data));
        axios.get("api/branchcashOutSettings").then(({ data }) => (this.branchcashOutSettings = data));
        axios.get("api/branchcashInSettings").then(({ data }) => (this.branchcashInSettings = data));
        axios.get("api/submenuaccessSettings").then(({ data }) => (this.submenuaccessSettings = data));
        axios.get("api/shopbalancingaccessSettings").then(({ data }) => (this.shopbalancingaccessSettings = data));
        axios.get("api/branchpayoutaccessSettings").then(({ data }) => (this.branchpayoutaccessSettings = data));
        axios.get("api/branchexpensesaccessSetting").then(({ data }) => (this.branchexpensesaccessSetting = data));
        

        axios.get("api/fishcreditaccessSetting").then(({ data }) => (this.fishcreditaccessSetting = data));
        axios.get("api/fishdebitaccessSetting").then(({ data }) => (this.fishdebitaccessSetting = data));
        axios.get("api/cashcreditaccessSetting").then(({ data }) => (this.cashcreditaccessSetting = data));
        axios.get("api/cashcollectionaccessSetting").then(({ data }) => (this.cashcollectionaccessSetting = data));
        axios.get("api/getcurrencydetails").then(({ data }) => (this.currencydetails = data));
         axios.get('/api/branchDetails').then(function (response) { this.brancheslist = response.data;}.bind(this));
         axios.get('/api/mybranch').then(function (response) { this.mybrancheslist = response.data;}.bind(this));


  },
  loadBranchcashouttransactions(){
      
       axios.get("api/shopcashoutdetails").then(({ data }) => (this.shopcashoutrecords = data));
     //  this.getRoles();
     //  this.getUsertypes();
        this.checkBranchescomponentfeatures();
        axios.get("api/gencomponentaccessCahtransactions").then(({ data }) => (this.gencomponentaccessCahtransactions = data));
        axios.get("api/branchcashOutSettings").then(({ data }) => (this.branchcashOutSettings = data));
        axios.get("api/branchcashInSettings").then(({ data }) => (this.branchcashInSettings = data));
        axios.get("api/submenuaccessSettings").then(({ data }) => (this.submenuaccessSettings = data));
        axios.get("api/shopbalancingaccessSettings").then(({ data }) => (this.shopbalancingaccessSettings = data));
        axios.get("api/branchpayoutaccessSettings").then(({ data }) => (this.branchpayoutaccessSettings = data));
        axios.get("api/branchexpensesaccessSetting").then(({ data }) => (this.branchexpensesaccessSetting = data));
        axios.get("api/cashcollectionaccessSetting").then(({ data }) => (this.cashcollectionaccessSetting = data));
        axios.get("api/cashcreditaccessSetting").then(({ data }) => (this.cashcreditaccessSetting = data));
        axios.get("api/getcurrencydetails").then(({ data }) => (this.currencydetails = data));
        axios.get('/api/branchDetails').then(function (response) { this.brancheslist = response.data;}.bind(this));
        axios.get('/api/mybranch').then(function (response) { this.mybrancheslist = response.data;}.bind(this));
        axios.get("api/shopopenningpalance").then(({ data }) => (this.shopopenningpalance = data));
         axios.get("api/fishcreditaccessSetting").then(({ data }) => (this.fishcreditaccessSetting = data));
        axios.get("api/fishdebitaccessSetting").then(({ data }) => (this.fishdebitaccessSetting = data));
        ///////////////
     axios.get("api/shopopenningpalance").then(({ data }) => (this.shopopenningpalance = data));
     axios.get("api/todayscashintotal").then(({ data }) => (this.todayscashintotal = data));
     axios.get("api/todayscashouttotal").then(({ data }) => (this.todayscashouttotal = data));
     axios.get("api/todaysexpensestotal").then(({ data }) => (this.todaysexpensestotal = data));
     axios.get("api/todayspayouttotal").then(({ data }) => (this.todayspayouttotal = data));

  },

loadbranchExpenses(){
        axios.get("api/makeexpense").then(({ data }) => (this.datarecordsbranchexpensesrecords = data));
          axios.get("api/getExpensestomake").then(({ data }) => (this.expenseslist = data));
           
       
       
              axios.get("api/geteditbranchexpenserecord").then(({ data }) => (this.allowedtoeditexpenserecord = data));
              axios.get("api/deletebranchexpenserecord").then(({ data }) => (this.allowedtodeleteexpenserecord = data));
              axios.get("api/getAddnewexpenserecord").then(({ data }) => (this.allowedtoaddnewexpensereccord = data));
              
    axios.get("api/gencomponentaccessCahtransactions").then(({ data }) => (this.gencomponentaccessCahtransactions = data));
        axios.get("api/branchcashOutSettings").then(({ data }) => (this.branchcashOutSettings = data));
        axios.get("api/branchcashInSettings").then(({ data }) => (this.branchcashInSettings = data));
        axios.get("api/submenuaccessSettings").then(({ data }) => (this.submenuaccessSettings = data));
        axios.get("api/shopbalancingaccessSettings").then(({ data }) => (this.shopbalancingaccessSettings = data));
        axios.get("api/branchpayoutaccessSettings").then(({ data }) => (this.branchpayoutaccessSettings = data));
        axios.get("api/cashcollectionaccessSetting").then(({ data }) => (this.cashcollectionaccessSetting = data));
        axios.get("api/cashcreditaccessSetting").then(({ data }) => (this.cashcreditaccessSetting = data));
        axios.get("api/branchexpensesaccessSetting").then(({ data }) => (this.branchexpensesaccessSetting = data));
         axios.get("api/fishcreditaccessSetting").then(({ data }) => (this.fishcreditaccessSetting = data));
        axios.get("api/fishdebitaccessSetting").then(({ data }) => (this.fishdebitaccessSetting = data));
  
this.checkSubmenuaccessfeatures();
  },

loadBranchpayouts(){
     this.checkMainmenuaccessfeatures();
axios.get("api/payouts").then(({ data }) => (this.branchpayoutrecords = data));
          
        axios.get("api/getMainmenues").then(({ data }) => (this.mainmenulist = data));

      axios.get("api/gencomponentaccessCahtransactions").then(({ data }) => (this.gencomponentaccessCahtransactions = data));
        axios.get("api/branchcashOutSettings").then(({ data }) => (this.branchcashOutSettings = data));
        
        axios.get("api/branchcashInSettings").then(({ data }) => (this.branchcashInSettings = data));
        axios.get("api/submenuaccessSettings").then(({ data }) => (this.submenuaccessSettings = data));
        axios.get("api/shopbalancingaccessSettings").then(({ data }) => (this.shopbalancingaccessSettings = data));
        axios.get("api/branchpayoutaccessSettings").then(({ data }) => (this.branchpayoutaccessSettings = data));
        axios.get("api/branchexpensesaccessSetting").then(({ data }) => (this.branchexpensesaccessSetting = data));
        axios.get("api/cashcollectionaccessSetting").then(({ data }) => (this.cashcollectionaccessSetting = data));
        axios.get("api/cashcreditaccessSetting").then(({ data }) => (this.cashcreditaccessSetting = data));
         axios.get("api/fishcreditaccessSetting").then(({ data }) => (this.fishcreditaccessSetting = data));
        axios.get("api/fishdebitaccessSetting").then(({ data }) => (this.fishdebitaccessSetting = data));


  },
  loadcomponentsAllowedfortherole(){
        axios.get("api/authorisedcomponents").then(({ data }) => (this.allowedrolecomponentsObject = data));
        
        axios.get("api/getlistofcomponents").then(({ data }) => (this.componentslist = data));
      //  this.getRoles();
      //  this.getUsertypes();
    axios.get("api/gencomponentaccessCahtransactions").then(({ data }) => (this.gencomponentaccessCahtransactions = data));
        axios.get("api/branchcashOutSettings").then(({ data }) => (this.branchcashOutSettings = data));
        axios.get("api/branchcashInSettings").then(({ data }) => (this.branchcashInSettings = data));
        axios.get("api/submenuaccessSettings").then(({ data }) => (this.submenuaccessSettings = data));
        axios.get("api/shopbalancingaccessSettings").then(({ data }) => (this.shopbalancingaccessSettings = data));
        axios.get("api/branchpayoutaccessSettings").then(({ data }) => (this.branchpayoutaccessSettings = data));
        axios.get("api/cashcollectionaccessSetting").then(({ data }) => (this.cashcollectionaccessSetting = data));
        axios.get("api/branchexpensesaccessSetting").then(({ data }) => (this.branchexpensesaccessSetting = data));
        axios.get("api/cashcreditaccessSetting").then(({ data }) => (this.cashcreditaccessSetting = data));
         axios.get("api/fishcreditaccessSetting").then(({ data }) => (this.fishcreditaccessSetting = data));
        axios.get("api/fishdebitaccessSetting").then(({ data }) => (this.fishdebitaccessSetting = data));
     this.checkComponentaccessfeatures();
  

  },


 loadAdmincashout(){
     axios.get("api/cashoutfromoffice").then(({ data }) => (this.admincashoutrecords = data));
          axios.get("api/getaddnewcashcredit").then(({ data }) => (this.allowedtoaddnewcashcredit = data));                   
       axios.get("api/geteditcashcredit").then(({ data }) => (this.allowedtoeditadmincashcredit = data));
       axios.get("api/getdeletecashcredit").then(({ data }) => (this.allowedtodeleteadmincashcredit = data));
     
  this.SavetheCreditbranch();

  },

   loadAdmincashin(){
      axios.get("api/cashindetails").then(({ data }) => (this.admincashindatarecords = data));
    
              axios.get("api/allowedtodeletecredit").then(({ data }) => (this.allowedtodeletecredit = data));   
               axios.get("api/allowedtodeletecollection").then(({ data }) => (this.allowedtodeletecollection = data));   
          axios.get("api/getaddnewcashcollection").then(({ data }) => (this.allowedtoaddnewcashcollection = data));                   
       axios.get("api/geteditcashcollection").then(({ data }) => (this.allowedtoeditadmincashcollection = data));
       axios.get("api/getdeletecashcollection").then(({ data }) => (this.allowedtodeleteadmincashcollection = data));
     
  this.SavetheCollectionbranch();

  },

newbranchExpense(){
        this.editmode = false;
        this.form.clear();
        this.form.reset();
     
     $('#addnewexpensebybranch').modal('show');
            },
newBranchpayoutbranch(){
        this.editmode = false;
        this.form.clear();
        this.form.reset();
     
     $('#addnewpayoutbranch').modal('show');
            },
newsubmenuaccess(){
        this.editmode = false;
        this.form.clear();
        this.form.reset();
     
     $('#addnewaccesstosubmenu').modal('show');
            },
                    


 newintermidiaryshopbalancing(){
        this.editmode = false;
        this.form.clear();
        this.form.reset();
     
     $('#addnewintermidiarybalancing').modal('show');
            },
 newshopbal(){
        this.editmode = false;
        this.form.clear();
        this.form.reset();
     
     $('#addnewshopbalancingrecord').modal('show');
            },
 newcomponentadd(){
        this.editmode = false;
        this.form.clear();
        this.form.reset();
     
     $('#addnewComponenttotheRole').modal('show');
            },

newCashcredit(){
        this.editmode = false;
        this.form.clear();
        this.form.reset();
     
     $('#addnewcashcredit').modal('show');
            },
 
newCashcreditfish(){
        this.editmode = false;
        this.form.clear();
        this.form.reset();
     
     $('#addnewcashCreditfish').modal('show');
            },           
newCashcollection(){
        this.editmode = false;
        this.form.clear();
        this.form.reset();
     
     $('#addnewcashcollection').modal('show');
            },
            
     newBranchmodal(){
        this.editmode = false;
        this.form.clear();
        this.form.reset();
     
     $('#addnewBranchmodal').modal('show');
            },
   editPayout(branchpayoutrecords){
                this.editmode = true;
                 this.form.clear();
        this.form.reset();
        this.form.fill(branchpayoutrecords);

$('#addnewpayoutbranch').modal('show');
            },
             editfishcollection(fishcollectionrecords){
                this.editmode = true;
                 this.form.clear();
        this.form.reset();
        this.form.fill(fishcollectionrecords);

$('#addnewcashcollection').modal('show');
            },

 editBranchexpenserecord(branchpayoutrecords){
                this.editmode = true;
                 this.form.clear();
        this.form.reset();
        this.form.fill(branchpayoutrecords);

$('#addnewexpensebybranch').modal('show');
            },

deletecashcreditcollection(id){
   Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes'
}).then((result) => {

/// send request ti
if (result.isConfirmed) {
  this.form.delete('api/deletecashcreditcollection/'+id).then(()=>{
  
                        Swal.fire(
                          'Deleted!',
                          'Your file has been deleted.',
                          'success'
                        )
  axios.get("api/cashoutfromofficeforfish").then(({ data }) => (this.fishcashcreditrecords = data));

  }).catch(()=>{
     Swal.fire({  
         icon: 'error',
        title: 'Failed',
       text: "Transaction was Not successfull. Contact the Administrator for More Assistance",});

  });


}                  



})

            },
deletecashcollection(id){
   Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes'
}).then((result) => {

/// send request ti
if (result.isConfirmed) {
  this.form.delete('api/deletecashincollection/'+id).then(()=>{
  
                        Swal.fire(
                          'Deleted!',
                          'Your file has been deleted.',
                          'success'
                        )
 axios.get("api/fishcollections").then(({ data }) => (this.fishcollectionrecords = data));

  }).catch(()=>{
     Swal.fire({  
         icon: 'error',
        title: 'Failed',
       text: "Transaction was Not successfull. Contact the Administrator for More Assistance",});

  });


}                  



})

            },
////////////////////////////////////////////////////////////////////////////////////////////////
 newAdmincashcollectionmodal(){
        this.editmode = false;
        this.form.clear();
        this.form.reset();
     
     $('#addnewcashcollection').modal('show');
            },
   editcashcollection(admincashindatarecords){
                this.editmode = true;
                 this.form.clear();
        this.form.reset();
        this.form.fill(admincashindatarecords);

$('#addnewcashcollection').modal('show');
            },

//    deletecashcollection(id){
//    Swal.fire({
//   title: 'Are you sure?',
//   text: "You won't be able to revert this!",
//   icon: 'warning',
//   showCancelButton: true,
//   confirmButtonColor: '#3085d6',
//   cancelButtonColor: '#d33',
//   confirmButtonText: 'Yes'
// }).then((result) => {

// /// send request ti
// if (result.isConfirmed) {
//   this.form.delete('api/cashindetails/'+id).then(()=>{
  
//                         Swal.fire(
//                           'Deleted!',
//                           'Your Record has been deleted.',
//                           'success'
//                         )
                   
//      axios.get("api/cashindetails").then(({ data }) => (this.admincashindatarecords = data));
//      axios.get("api/shopopenningpalance").then(({ data }) => (this.shopopenningpalance = data));
//      axios.get("api/todayscashintotal").then(({ data }) => (this.todayscashintotal = data));
//      axios.get("api/todayscashouttotal").then(({ data }) => (this.todayscashouttotal = data));
//      axios.get("api/todaysexpensestotal").then(({ data }) => (this.todaysexpensestotal = data));
//      axios.get("api/todayspayouttotal").then(({ data }) => (this.todayspayouttotal = data));

//   }).catch(()=>{
//      Swal.fire({  
//          icon: 'error',
//         title: 'Failed',
//        text: "Transaction was Not successfull. Contact the Administrator for More Assistance",});

//   });


// }                  



// })

//             },
///////////////////////

balancescheck(){
       axios.get("api/getWalletlist").then(({ data }) => (this.walletlist = data));
       axios.get("api/capitalaccountcurrentbalance").then(({ data }) => (this.capitalaccountcurrentbalance = data));
    axios.get("api/pettycashaccountcurrentbalance").then(({ data }) => (this.pettycashaccountcurrentbalance = data));
    axios.get("api/bankaccountcurrentbalance").then(({ data }) => (this.bankaccountcurrentbalance = data));
    axios.get("api/collectionsaccountcurrentbalance").then(({ data }) => (this.collectionsaccountcurrentbalance = data));
    ////
     axios.get("api/allowedtoviewcapitalaccount").then(({ data }) => (this.allowedtoviewcapitalaccount = data));
       axios.get("api/allowedtoviewpettycashaccount").then(({ data }) => (this.allowedtoviewpettycashaccount = data));
        axios.get("api/allowedtoviewbankaccount").then(({ data }) => (this.allowedtoviewbankaccount = data));
         axios.get("api/allowedtoviewcollectionsccount").then(({ data }) => (this.allowedtoviewcollectionsccount = data));
         axios.get("api/allowedtodeletecredit").then(({ data }) => (this.allowedtodeletecredit = data));   
               axios.get("api/allowedtodeletecollection").then(({ data }) => (this.allowedtodeletecollection = data));       

  },



   editcashcredit(admincashoutrecords){
                this.editmode = true;
                 this.form.clear();
        this.form.reset();
        this.form.fill(admincashoutrecords);

$('#addnewcashcredit').modal('show');
            },

   deletecashcredit(id){
   Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes'
}).then((result) => {

/// send request ti
if (result.isConfirmed) {
  this.form.delete('api/cashoutfromoffice/'+id).then(()=>{
  
                        Swal.fire(
                          'Deleted!',
                          'Your Record has been deleted.',
                          'success'
                        )
                   
     axios.get("api/cashoutfromoffice").then(({ data }) => (this.admincashoutrecords = data));
     axios.get("api/shopopenningpalance").then(({ data }) => (this.shopopenningpalance = data));
     axios.get("api/todayscashintotal").then(({ data }) => (this.todayscashintotal = data));
     axios.get("api/todayscashouttotal").then(({ data }) => (this.todayscashouttotal = data));
     axios.get("api/todaysexpensestotal").then(({ data }) => (this.todaysexpensestotal = data));
     axios.get("api/todayspayouttotal").then(({ data }) => (this.todayspayouttotal = data));

  }).catch(()=>{
     Swal.fire({  
         icon: 'error',
        title: 'Failed',
       text: "Transaction was Not successfull. Contact the Administrator for More Assistance",});

  });


}                  



})

            },





































////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            deleteBranchexpenserecord(id){
   Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes'
}).then((result) => {

/// send request ti
if (result.isConfirmed) {
  this.form.delete('api/makeexpense/'+id).then(()=>{
  
                        Swal.fire(
                          'Deleted!',
                          'Your file has been deleted.',
                          'success'
                        )
                   
 axios.get("api/makeexpense").then(({ data }) => (this.datarecordsbranchexpensesrecords = data));
  axios.get("api/shopopenningpalance").then(({ data }) => (this.shopopenningpalance = data));
     axios.get("api/todayscashintotal").then(({ data }) => (this.todayscashintotal = data));
     axios.get("api/todayscashouttotal").then(({ data }) => (this.todayscashouttotal = data));
     axios.get("api/todaysexpensestotal").then(({ data }) => (this.todaysexpensestotal = data));
     axios.get("api/todayspayouttotal").then(({ data }) => (this.todayspayouttotal = data));

  }).catch(()=>{
     Swal.fire({  
         icon: 'error',
        title: 'Failed',
       text: "Transaction was Not successfull. Contact the Administrator for More Assistance",});

  });


}                  



})

            },
           

deleteShopbalancingrecord(id){
   Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes'
}).then((result) => {

/// send request ti
if (result.isConfirmed) {
  this.form.delete('api/currentbalancingrecords/'+id).then(()=>{
  
                        Swal.fire(
                          'Deleted!',
                          'Record has been deleted.',
                          'success'
                        )
                   
 axios.get("api/currentbalancingrecords").then(({ data }) => (this.shopbalancingdatarecords = data));
  axios.get("api/shopopenningpalance").then(({ data }) => (this.shopopenningpalance = data));
     axios.get("api/todayscashintotal").then(({ data }) => (this.todayscashintotal = data));
     axios.get("api/todayscashouttotal").then(({ data }) => (this.todayscashouttotal = data));
     axios.get("api/todaysexpensestotal").then(({ data }) => (this.todaysexpensestotal = data));
     axios.get("api/todayspayouttotal").then(({ data }) => (this.todayspayouttotal = data));

  }).catch(()=>{
     Swal.fire({  
         icon: 'error',
        title: 'Failed',
       text: "Transaction was Not successfull. Contact the Administrator for More Assistance",});

  });


}                  



})

            },
deletepayout(id){
   Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes'
}).then((result) => {

/// send request ti
if (result.isConfirmed) {
  this.form.delete('api/payouts/'+id).then(()=>{
  
                        Swal.fire(
                          'Deleted!',
                          'Your file has been deleted.',
                          'success'
                        )
                   
 axios.get("api/payouts").then(({ data }) => (this.branchpayoutrecords = data));
  axios.get("api/shopopenningpalance").then(({ data }) => (this.shopopenningpalance = data));
     axios.get("api/todayscashintotal").then(({ data }) => (this.todayscashintotal = data));
     axios.get("api/todayscashouttotal").then(({ data }) => (this.todayscashouttotal = data));
     axios.get("api/todaysexpensestotal").then(({ data }) => (this.todaysexpensestotal = data));
     axios.get("api/todayspayouttotal").then(({ data }) => (this.todayspayouttotal = data));

  }).catch(()=>{
     Swal.fire({  
         icon: 'error',
        title: 'Failed',
       text: "Transaction was Not successfull. Contact the Administrator for More Assistance",});

  });


}                  



})

            },
           

    createBranch(){
      this.$Progress.start();
        this.form.post('api/branches')
        .then(()=>{

         
    $('#addnewBranchmodal').modal('hide');
    Fire.$emit('AfterAction');
  Toast.fire({
  icon: 'success',
  title: 'Record added successfully'
});
        this.$Progress.finish();

        })
        .catch(()=>{
          
        })
         
    }, // end of create

 Saveintermidiarybalancing (){

  
this.form.post('api/branchintermidiarybalance');
          axios.get("api/branchtobalance").then(({ data }) => (this.clcash = data));
          axios.get("api/branchalreadybalanced").then(({ data }) => (this.branchbalancedforthisdate = data));
         // axios.get("api/pendingcashin").then(({ data }) => (this.pendingtransfer = data));
          axios.get("api/getbranchopenningb").then(({ data }) => (this.shopopenningbalance = data));
          axios.get("api/getbranchnamebalancing").then(({ data }) => (this.shopbalancngname = data));
         
          axios.get("api/getdaycashoutbranch").then(({ data }) => (this.totalcashout = data));
          axios.get("api/getdayexpensesbranch").then(({ data }) => (this.totalexpenses = data));
          axios.get("api/getdaypayoutbranch").then(({ data }) => (this.totalpayout = data));
          axios.get("api/getdaycashinbranch").then(({ data }) => (this.totaldayscashin = data));
axios.get("api/machineoneopenningcode").then(({ data }) => (this.machineoneopenningcode = data));
axios.get("api/fishgameproduct").then(({ data }) => (this.fishgameproduct = data));
 axios.get("api/fishmachinestotal").then(({ data }) => (this.fishmachinestotal = data));
axios.get("api/virtualgameproduct").then(({ data }) => (this.virtualgameproduct = data));
        axios.get("api/soccergameproduct").then(({ data }) => (this.soccergameproduct = data));

            },

  SaveRecordbranch (){

  
this.form.post('api/branchtobalance');
          axios.get("api/branchtobalance").then(({ data }) => (this.clcash = data));
          axios.get("api/branchalreadybalanced").then(({ data }) => (this.branchbalancedforthisdate = data));
         // axios.get("api/pendingcashin").then(({ data }) => (this.pendingtransfer = data));
          axios.get("api/getbranchopenningb").then(({ data }) => (this.shopopenningbalance = data));
          axios.get("api/getbranchnamebalancing").then(({ data }) => (this.shopbalancngname = data));
         
          axios.get("api/getdaycashoutbranch").then(({ data }) => (this.totalcashout = data));
          axios.get("api/getdayexpensesbranch").then(({ data }) => (this.totalexpenses = data));
          axios.get("api/getdaypayoutbranch").then(({ data }) => (this.totalpayout = data));
          axios.get("api/getdaycashinbranch").then(({ data }) => (this.totaldayscashin = data));
axios.get("api/machineoneopenningcode").then(({ data }) => (this.machineoneopenningcode = data));
axios.get("api/fishgameproduct").then(({ data }) => (this.fishgameproduct = data));
 axios.get("api/fishmachinestotal").then(({ data }) => (this.fishmachinestotal = data));
axios.get("api/virtualgameproduct").then(({ data }) => (this.virtualgameproduct = data));
        axios.get("api/soccergameproduct").then(({ data }) => (this.soccergameproduct = data));

            },


updateexpenserecord(){
    this.$Progress.start();
          
this.form.put('api/makeexpense/'+this.form.id)
  .then(()=> {
    // on success
   $('#addnewexpensebybranch').modal('show');
    this.form.reset();
  
    Swal.fire(
        'Update!',
        'Record has been updated.',
        'success'
      )
      this.$Progress.finish();
  axios.get("api/makeexpense").then(({ data }) => (this.datarecordsbranchexpensesrecords = data));
  axios.get("api/shopopenningpalance").then(({ data }) => (this.shopopenningpalance = data));
     axios.get("api/todayscashintotal").then(({ data }) => (this.todayscashintotal = data));
     axios.get("api/todayscashouttotal").then(({ data }) => (this.todayscashouttotal = data));
     axios.get("api/todaysexpensestotal").then(({ data }) => (this.todaysexpensestotal = data));
     axios.get("api/todayspayouttotal").then(({ data }) => (this.todayspayouttotal = data));





 

  })


  .catch(()=>{
 this.$Progress.fail();
   Swal.fire({  
         icon: 'error',
        title: 'Failed',
       text: "Transaction was Not successfull. Contact the Administrator for More Assistance",});
  
  
  });
   },

   updatepayout(){
    this.$Progress.start();
          
this.form.put('api/payouts/'+this.form.id)
  .then(()=> {
    // on success
   $('#addnewpayoutbranch').modal('hide');
  
    Swal.fire(
        'Update!',
        'Record has been updated.',
        'success'
      )
      this.$Progress.finish();
      axios.get("api/payouts").then(({ data }) => (this.branchpayoutrecords = data));
  axios.get("api/shopopenningpalance").then(({ data }) => (this.shopopenningpalance = data));
     axios.get("api/todayscashintotal").then(({ data }) => (this.todayscashintotal = data));
     axios.get("api/todayscashouttotal").then(({ data }) => (this.todayscashouttotal = data));
     axios.get("api/todaysexpensestotal").then(({ data }) => (this.todaysexpensestotal = data));
     axios.get("api/todayspayouttotal").then(({ data }) => (this.todayspayouttotal = data));





 

  })


  .catch(()=>{
 this.$Progress.fail();
   Swal.fire({  
         icon: 'error',
        title: 'Failed',
       text: "Transaction was Not successfull. Contact the Administrator for More Assistance",});
  
  
  });
   },// end of update

deleteBranch(id){
   Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes'
}).then((result) => {

/// send request ti
if (result.isConfirmed) {
  this.form.delete('api/branches/'+id).then(()=>{
  
                        Swal.fire(
                          'Deleted!',
                          'Your file has been deleted.',
                          'success'
                        )
                   
 axios.get("api/shopcashoutdetails").then(({ data }) => (this.shopcashoutrecords = data));

  }).catch(()=>{
     Swal.fire({  
         icon: 'error',
        title: 'Failed',
       text: "Transaction was Not successfull. Contact the Administrator for More Assistance",});

  });


}                  



})

            },// End of delrte function


confirmFishcashout(id){
   Swal.fire({
  title: 'CASH-IN CONFIRMATION',
  text: "You won't be able to revert this",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes'
}).then((result) => {

/// send request ti
if (result.isConfirmed) {
  this.form.delete('api/approvecashout/'+id).then(()=>{
  
                        Swal.fire(
                          'Transfer Confirmed!',
                          'Transfer Done.',
                          'success'
                        )
                   
   axios.get("api/cashindetails").then(({ data }) => (this.shopcintransferrecords = data));
    axios.get("api/cashoutfromofficeforfish").then(({ data }) => (this.fishcashcreditrecords = data));
  }).catch(()=>{
     Swal.fire({  
         icon: 'error',
        title: 'Failed',
       text: "Transaction was Not successfull. Contact the Administrator for More Assistance",});

  });


}                  



})

            },
confirmFishcashin(id){
   Swal.fire({
  title: 'Fish Cash-In Confirmation',
  text: "You won't be able to revert this",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes'
}).then((result) => {

/// send request ti
if (result.isConfirmed) {
  this.form.delete('api/approvefishcashin/'+id).then(()=>{
  
                        Swal.fire(
                          'Cashout Confirmed!',
                          'Your file has been deleted.',
                          'success'
                        )
                   
    axios.get("api/fishcollections").then(({ data }) => (this.fishcollectionrecords = data));

  }).catch(()=>{
     Swal.fire({  
         icon: 'error',
        title: 'Failed',
       text: "Transaction was Not successfull. Contact the Administrator for More Assistance",});

  });


}                  



})

            },




confirmCashouttransfer(id){
   Swal.fire({
  title: 'CASH-IN CONFIRMATION',
  text: "You won't be able to revert this",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes'
}).then((result) => {

/// send request ti
if (result.isConfirmed) {
  this.form.delete('api/approvecashout/'+id).then(()=>{
  
                        Swal.fire(
                          'Transfer Confirmed!',
                          'Transfer Done.',
                          'success'
                        )
                   
   axios.get("api/cashindetails").then(({ data }) => (this.shopcintransferrecords = data));
axios.get("api/cashoutfromofficeforfish").then(({ data }) => (this.fishcashcreditrecords = data));
  }).catch(()=>{
     Swal.fire({  
         icon: 'error',
        title: 'Failed',
       text: "Transaction was Not successfull. Contact the Administrator for More Assistance",});

  });


}                  



})

            },

confirmCashintransfer(id){
   Swal.fire({
  title: 'CASH-OUT CONFIRMATION !',
  text: "You won't be able to revert this",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes'
}).then((result) => {

/// send request ti
if (result.isConfirmed) {
  this.form.delete('api/approvecashin/'+id).then(()=>{
  
                        Swal.fire(
                          'Cashout Confirmed!',
                          'Your file has been deleted.',
                          'success'
                        )
                   
   axios.get("api/shopcashoutdetails").then(({ data }) => (this.shopcashoutrecords = data));

  }).catch(()=>{
     Swal.fire({  
         icon: 'error',
        title: 'Failed',
       text: "Transaction was Not successfull. Contact the Administrator for More Assistance",});

  });


}                  



})

            },

























////////////////////////////////////////////////////////
  
         

   CreateNewcashcredit(){
      this.$Progress.start();
        this.form.post('api/makecashcredit')
        .then(()=>{

         
    $('#addnewcashcredit').modal('hide');
  //  Fire.$emit('AfterAction');
 axios.get("api/cashindetails").then(({ data }) => (this.admincashindatarecords = data));
  axios.get("api/fishcollections").then(({ data }) => (this.fishcollectionrecords = data));
  axios.get("api/cashoutfromofficeforfish").then(({ data }) => (this.fishcashcreditrecords = data));
  Toast.fire({
  icon: 'success',
  title: 'Component Feature Authorised'
});
        this.$Progress.finish();

        })
        .catch(()=>{
          
        })
         
    },





             CreateNewcashcollection(){
      this.$Progress.start();
        this.form.post('api/makecashcollection')
        .then(()=>{

         
    $('#addnewcashcollection').modal('hide');
  //  Fire.$emit('AfterAction');
 axios.get("api/cashindetails").then(({ data }) => (this.admincashindatarecords = data));
  axios.get("api/fishcollections").then(({ data }) => (this.fishcollectionrecords = data));
  Toast.fire({
  icon: 'success',
  title: 'Component Feature Authorised'
});
        this.$Progress.finish();

        })
        .catch(()=>{
          
        })
         
    },

    

createNewexpensebranch(){
      this.$Progress.start();
        this.form.post('api/makeexpense')
        .then(()=>{

           this.form.reset();
    $('#addnewexpensebybranch').modal('show');
       axios.get("api/makeexpense").then(({ data }) => (this.datarecordsbranchexpensesrecords = data));
      axios.get("api/shopopenningpalance").then(({ data }) => (this.shopopenningpalance = data));
     axios.get("api/todayscashintotal").then(({ data }) => (this.todayscashintotal = data));
     axios.get("api/todayscashouttotal").then(({ data }) => (this.todayscashouttotal = data));
     axios.get("api/todaysexpensestotal").then(({ data }) => (this.todaysexpensestotal = data));
     axios.get("api/todayspayouttotal").then(({ data }) => (this.todayspayouttotal = data));

  Toast.fire({
  icon: 'success',
  title: 'Component Authorised'
});
        this.$Progress.finish();
//axios.get("api/authorisedcomponents").then(({ data }) => (this.allowedrolecomponentsObject = data));
        })
        .catch(()=>{
          
        })
         
    },
createNewpayout(){
      this.$Progress.start();
        this.form.post('api/payouts')
        .then(()=>{

         
    $('#addnewpayoutbranch').modal('hide');
    axios.get("api/payouts").then(({ data }) => (this.branchpayoutrecords = data));
      axios.get("api/shopopenningpalance").then(({ data }) => (this.shopopenningpalance = data));
     axios.get("api/todayscashintotal").then(({ data }) => (this.todayscashintotal = data));
     axios.get("api/todayscashouttotal").then(({ data }) => (this.todayscashouttotal = data));
     axios.get("api/todaysexpensestotal").then(({ data }) => (this.todaysexpensestotal = data));
     axios.get("api/todayspayouttotal").then(({ data }) => (this.todayspayouttotal = data));

  Toast.fire({
  icon: 'success',
  title: 'Component Authorised'
});
        this.$Progress.finish();
//axios.get("api/authorisedcomponents").then(({ data }) => (this.allowedrolecomponentsObject = data));
        })
        .catch(()=>{
          
        })
         
    },






createSubmenuaccess(){
      this.$Progress.start();
        this.form.post('api/savesubmenuaccess')
        .then(()=>{

         
    $('#addnewaccesstosubmenu').modal('show');
   axios.get("api/authorisedsubmenus").then(({ data }) => (this.datarecordsSubmenusauthorised = data));
  Toast.fire({
  icon: 'success',
  title: 'Component Authorised'
});
        this.$Progress.finish();
axios.get("api/authorisedcomponents").then(({ data }) => (this.allowedrolecomponentsObject = data));
        })
        .catch(()=>{
          
        })
         
    },
    
      createshopintermidiarybalancing(){
      this.$Progress.start();
        this.form.post('api/currentintermbalancingrecords')
        .then(()=>{

         
    $('#addnewintermidiarybalancing').modal('hide');
 //   Fire.$emit('AfterAction');
  Toast.fire({
  icon: 'success',
  title: 'Component Authorised'
});
        this.$Progress.finish();
axios.get("api/currentintermbalancingrecords").then(({ data }) => (this.intermshopbalancingdatarecords = data));
        })
        .catch(()=>{
          
        })
         
    },
    createBalancingrecord(){
      this.$Progress.start();
        this.form.post('api/currentbalancingrecords')
        .then(()=>{

         
    $('#addnewshopbalancingrecord').modal('hide');
 //   Fire.$emit('AfterAction');
  Toast.fire({
  icon: 'success',
  title: 'Component Authorised'
});
        this.$Progress.finish();
axios.get("api/currentbalancingrecords").then(({ data }) => (this.shopbalancingdatarecords = data));
        })
        .catch(()=>{
          
        })
         
    },
            // Revoke COmponent access


revokeroleComponentfeature(id){
   Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes'
}).then((result) => {

/// send request ti
if (result.isConfirmed) {
   this.form.delete('api/authorisedformcomponents/'+id).then(()=>{
  
                        Swal.fire(
                          'Right Revoked!',
                          'Transaction Done.',
                          'success'
                        )
         axios.get("api/authorisedformcomponents").then(({ data }) => (this.allowedrolecomponentfeaturesObject = data));
           
  

  }).catch(()=>{
     Swal.fire({  
         icon: 'error',
        title: 'Failed',
       text: "Transaction was Not successfull. Contact the Administrator for More Assistance",});

  });


}                  



})

            },





revokeMainmenuuaccess(id){
   Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes'
}).then((result) => {

/// send request ti
if (result.isConfirmed) {
   this.form.delete('api/savemainmenuaccess/'+id).then(()=>{
  
                        Swal.fire(
                          'Deleted!',
                          'Your file has been deleted.',
                          'success'
                        )
                   
     axios.get("api/payouts").then(({ data }) => (this.branchpayoutrecords = data));
  }).catch(()=>{
     Swal.fire({  
         icon: 'error',
        title: 'Failed',
       text: "Transaction was Not successfull. Contact the Administrator for More Assistance",});

  });


}                  



})

            },


revokeSubmenuaccess(id){
   Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes'
}).then((result) => {

/// send request ti
if (result.isConfirmed) {
   this.form.delete('api/savesubmenuaccess/'+id).then(()=>{
  
                        Swal.fire(
                          'Deleted!',
                          'Your file has been deleted.',
                          'success'
                        )
                   
     axios.get("api/authorisedsubmenus").then(({ data }) => (this.datarecordsSubmenusauthorised = data));
  }).catch(()=>{
     Swal.fire({  
         icon: 'error',
        title: 'Failed',
       text: "Transaction was Not successfull. Contact the Administrator for More Assistance",});

  });


}                  



})

            },
  ////////////////////






revokeroleComponent(id){
   Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes'
}).then((result) => {

/// send request ti
if (result.isConfirmed) {
   this.form.delete('api/saveaccesstovuecomponent/'+id).then(()=>{
  
                        Swal.fire(
                          'Deleted!',
                          'Your file has been deleted.',
                          'success'
                        )
                   
      axios.get("api/authorisedcomponents").then(({ data }) => (this.allowedrolecomponentsObject = data));

  }).catch(()=>{
     Swal.fire({  
         icon: 'error',
        title: 'Failed',
       text: "Transaction was Not successfull. Contact the Administrator for More Assistance",});

  });


}                  



})

            },
            /// end of revoke component






 checkBranchescomponentfeatures: function(){
              axios.get("api/getAddnewpayout").then(({ data }) => (this.allowedtoaddpauout = data));
              //axios.get("api/getviewbranch").then(({ data }) => (this.allowedtoviewbranch = data));
              
              axios.get("api/geteditbranchpayout").then(({ data }) => (this.allowedtoeditpayout = data));
              axios.get("api/deletebranchpayout").then(({ data }) => (this.allowedtodeletepayout = data));
           },


 checkMainmenuaccessfeatures: function(){
             
             axios.get("api/getRevokemainmenuaccess").then(({ data }) => (this.allowedtorevokemainmenuaccess = data));
              axios.get("api/getGrantmainmenuaccess").then(({ data }) => (this.allowedtoaddmainmenuaccess = data));
           },


 checkSubmenuaccessfeatures: function(){
             
             axios.get("api/getRevokesubmenuaccess").then(({ data }) => (this.allowedtorevokesubmenuaccess = data));
              axios.get("api/getGrantsubmenuaccess").then(({ data }) => (this.allowedtoaddsubmenuaccess = data));
           },

           checkComponentaccessfeatures: function(){
             
             axios.get("api/getRevokecomponentaccess").then(({ data }) => (this.allowedtorevokecomponentaccess = data));
              axios.get("api/getGrantcomponentaccess").then(({ data }) => (this.allowedtogivecomponentaccess = data));
              axios.get("api/allowedtoaddshopBalancingRecord").then(({ data }) => (this.allowedtoaddshopBalancingRecord = data));
              axios.get("api/allowedtodeleteshopBalancingRecord").then(({ data }) => (this.allowedtodeleteshopBalancingRecord = data));
              axios.get("api/allowedtoviewshopBalancingRecord").then(({ data }) => (this.allowedtoviewshopBalancingRecord = data));
              
           },



            

},// end of methods


///////////////////////////////////////////////////
        created() {
            axios.get("api/shopopenningpalance").then(({ data }) => (this.shopopenningpalance = data));
              axios.get("api/getbranchnamebalancing").then(({ data }) => (this.shopbalancngname = data));


            this.loadBranchcashouttransactions();
            axios.get("api/getAddnewpayout").then(({ data }) => (this.allowedtoaddpauout = data));
           
            Fire.$on('AfterAction', () =>{
            this.loadBranchcashouttransactions();
             axios.get("api/getcurrencydetails").then(({ data }) => (this.currencydetails = data));
      });
   setInterval(() =>this.balancescheck(),1000);
        }
    }
</script>
