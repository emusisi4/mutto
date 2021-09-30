 <div class="bethapa-component-header" >EXPENSES </div>        





 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                ALIGNMENTS
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);" class=" waves-effect waves-block">Action</a></li>
                                        <li><a href="javascript:void(0);" class=" waves-effect waves-block">Another action</a></li>
                                        <li><a href="javascript:void(0);" class=" waves-effect waves-block">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="font-bold">Align Left</div>
                            <ol class="breadcrumb breadcrumb-bg-pink">
                                <li><a href="javascript:void(0);"><i class="material-icons">home</i> Home</a></li>
                                <li class="active"><i class="material-icons">library_books</i> Library</li>
                            </ol>

                            <div class="align-center m-t-15 font-bold">Align Center</div>
                            <ol class="breadcrumb breadcrumb-bg-cyan align-center">
                                <li><a href="javascript:void(0);"><i class="material-icons">home</i> Home</a></li>
                                <li><a href="javascript:void(0);"><i class="material-icons">library_books</i> Library</a></li>
                                <li class="active"><i class="material-icons">archive</i> Data</li>
                            </ol>

                            <div class="align-right m-t-15 font-bold">Align Right</div>
                            <ol class="breadcrumb breadcrumb-bg-teal align-right">
                                <li><a href="javascript:void(0);"><i class="material-icons">home</i> Home</a></li>
                                <li><a href="javascript:void(0);"><i class="material-icons">library_books</i> Library</a></li>
                                <li><a href="javascript:void(0);"><i class="material-icons">archive</i> Data</a></li>
                                <li class="active"><i class="material-icons">attachment</i> File</li>
                            </ol>
                        </div>
                    </div>
                </div>
































<div class="col-12 col-sm-12 col-lg-12">
            <div class="card card-primary card-outline card-tabs">
              <div class="card-header p-0 pt-1 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                    <!--  -->
                  <li class="nav-item"  v-if="expensecategoriesaccessSettings > 0 " >
                    <a class="nav-link active" id="custom-tabs-two-home-tab"
                     data-toggle="pill" href="#custom-tabs-two-home" role="tab"
                     @click="loadExpensecategories()" aria-controls="custom-tabs-two-home" aria-selected="true">EXPENSE CATEGORIES</a>
                  </li>
<!--   v-if="branchcashInSettings > 0 " -->


                  <li class="nav-item"  v-if="expensetypesaccessSettings > 0 " > 
                    <a class="nav-link" id="custom-tabs-two-profile-tab"
                     data-toggle="pill" href="#custom-tabs-two-profile" role="tab"
                     @click="loadExpensetypes()" aria-controls="custom-tabs-two-profile" aria-selected="false">EXPENSE TYPES</a>
                  </li>

 <!-- v-if="branchpayoutaccessSettings > 0 " -->
 <li class="nav-item"  v-if="allcompanyexpensesaccessSettings > 0 " >
                    <a class="nav-link" id="custom-tabs-two-settings-tab" data-toggle="pill"
                     href="#custom-tabs-two-settings" role="tab" @click="loadGeneralExpenses()"
                     aria-controls="custom-tabs-two-settings" aria-selected="false">General Expenses</a>
                  </li>


                  <li class="nav-item"  v-if="makeofficeexpenseaccessSettings > 0 "  >
                    <a class="nav-link" id="custom-tabs-two-messages-tab"
                    @click="loadExpensesmadebyoffice()" data-toggle="pill" href="#custom-tabs-two-messages" role="tab" 
                    aria-controls="custom-tabs-two-messages" aria-selected="false">Expense Requests</a>
                  </li>
                 
                 
<!--  -->
                   <li class="nav-item ">
                    <a class="nav-link" id="custom-tabs-two-three-tab" data-toggle="pill"
                     href="#custom-tabs-two-three" role="tab" @click="loadShopbalancingrecords()" 
                     aria-controls="custom-tabs-two-three" aria-selected="false">MONTHLY EXPENSES</a>
                  </li>
                  

                  

                </ul>
              </div>
              <div class="card-body">



      <div class="tab-content" id="custom-tabs-two-tabContent"  >
                  
                  <!-- tab one start -->
                  <!-- v-if="branchcashOutSettings > 0 " -->
                 <div class="tab-pane fade show active" id="custom-tabs-two-home" v-if="expensecategoriesaccessSettings > 0 "  role="tabpanel"  aria-labelledby="custom-tabs-two-home-tab"> 
               
                 <div class="bethapa-table-header">
                      EXPENSE CATEGORIES 
                      <!-- -->
                      <button type="button"  v-if="allowedtoaddexpensecategory > 0 "  class="add-newm" @click="newExpensecategorymodal" >Add New </button> 
                     </div>





                      <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                        <th>#</th>
                      <th>NAME</th>
                      <th>DESCRIPTION</th>
                      <th>CREATED</th>
                       
                     
                     
                        <th ></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>

                    <tr v-for="expcat in expensecategorydetails.data" :key="expcat.id">
                      
                    <td>{{expcat.id}}</td>
                       <td>{{(expcat.expcatcatname)}}</td>
                      <td>{{(expcat.description)}}</td>
                      <td>{{(expcat.created_at)}}</td>
                       <td>
                      <!-- allowedtoaddexpensecategory

 -->
   <button type="button" v-if="allowedtoeditexpensecategory > 0 "   class="btn  bg-gradient-secondary btn-xs fas fa-edit"  @click="editexpensecategory(expcat)">Edit</button>
                             


                            <button type="button" v-if="allowedtodeleteexpensecategory > 0 " class="btn  bg-gradient-danger btn-xs fas fa-trash-alt" @click="deleteexpensecategory(expcat.id)"> DEl </button>




                       </td>
                  
                
                      
                         
                                


               
                              
                               
                    </tr>
              
                     
                  </tbody>
              
 
                                   </table>
    <div class="card-footer">
                <ul class="pagination pagination-sm m-0 float-right">
                   <pagination :data="expensecategorydetails" @pagination-change-page="paginationResultsExpensecategories"></pagination>
                </ul>
              </div>
                     
                 
                    </div>
 
 <!-- tab one end -->


<!-- Modal add menu -->
<div class="modal fade" id="addnewExpensecategorymodal">
        <div class="modal-dialog modal-dialog-centered modal-xl">
        <div  class="modal-content">
            <div  class="modal-header">
                <h4  v-show="!editmode"    class="modal-title">ADD NEW RECORD</h4> 
                <h4  v-show="editmode" class="modal-title" >UPDATE RECORD</h4> 
                <button  type="button" data-dismiss="modal" aria-label="Close" class="close"><span  aria-hidden="true">×</span></button></div> 
                 <form class="form-horizontal" @submit.prevent="editmode ? updateexpensecategory():createNewcategory()"> 

                    <div  class="modal-body">
                  <div class="form-group  row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">CAT. NAME</label>
                    <div class="col-sm-6">
                  <input v-model="form.expcatcatname" type="text" name="expcatcatname"
                      class="form-control" :class="{ 'is-invalid': form.errors.has('expcatcatname') }">
                    <has-error :form="form" field="expcatcatname"></has-error>
                                  </div>
                   
      
                
                  </div>


           
                
                
                
                 <div class="form-group  row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">DESCRIPTION</label>
                    <div class="col-sm-6">
                  <input v-model="form.description" type="text" name="description"
                      class="form-control" :class="{ 'is-invalid': form.errors.has('description') }">
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
                

      <!-- End of Modal for -->
<!--  -->
                  <div class="tab-pane fade" id="custom-tabs-two-profile" role="tabpanel" aria-labelledby="custom-tabs-two-profile-tab">
                   
                   
    <!-- tab one start -->
                  <div class="tab-pane fade show active" id="custom-tabs-two-home" v-if="expensetypesaccessSettings > 0 " role="tabpanel" aria-labelledby="custom-tabs-two-home-tab">
                 
                  <div class="bethapa-table-header">
                      EXPENSE TYPES 
                      <!-- <button type="button" v-if="allowedtomakeofficeexpense > 0 " class="add-newm" @click="newBranchmodal" >Add New </button>  -->
                     </div>





                      <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                       <th>#</th>
                      
                      <th>NAME</th>
                     
                      <th>DESCRIPTION </th>
                      
                
                
                         <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>

                   <tr v-for="cinshopt in expensetypesrecords.data" :key="cinshopt.id">
                       <td>{{cinshopt.id}}</td>
                       <td>{{(cinshopt.typename)}}</td>
                          <td>{{(cinshopt.description)}}</td>
                     <td>
                       <button v-show="cinshopt.status < 1" type="button"   class="btn  bg-gradient-secondary btn-xs"  @click="confirmCashouttransfer(cinshopt.id)"> Confirm  </button>
                       <button v-show="cinshopt.status === 1" type="button"   class="btn  bg-gradient-success btn-xs"  > Confirmed  </button>
                   

                       </td>
                  
                     
                    </tr>
              
                     
                  </tbody>
              
 
                                   </table>
    <div class="card-footer">
                <ul class="pagination pagination-sm m-0 float-right">
                   <pagination :data="expensecategorydetails" @pagination-change-page="paginationResultsExpensecategories"></pagination>
                </ul>
              </div>
                     
                 
                    </div>
 
 <!-- tab one end -->


<!-- Modal add menu -->
<!-- <div class="modal fade" id="addnewBranchmodal">
        <div class="modal-dialog modal-dialog-centered modal-xl">
        <div  class="modal-content">
            <div  class="modal-header">
                <h4  v-show="!editmode"    class="modal-title">ADD NEW RECORD</h4> 
                <h4  v-show="editmode" class="modal-title" >UPDATE RECORD</h4> 
                <button  type="button" data-dismiss="modal" aria-label="Close" class="close"><span  aria-hidden="true">×</span></button></div> 
                 <form class="form-horizontal" @submit.prevent="editmode ? updateBranch():createNewcategory()"> 

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
                </div> -->
                  </div>
<!-- mmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm -->

  

                  <!-- mmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm -->



<!-- mmmmmmmmmmmmmmmmmmmmmmmmmmm -->
                  <div class="tab-pane fade" v-if="allcompanyexpensesaccessSettings > 0 " id="custom-tabs-two-settings" role="tabpanel" aria-labelledby="custom-tabs-two-settings-tab">
                    
                    
              
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
                        COMPANY EXPENSES                    
              <button type="button" v-if="allowedtoaddnewexpensereccord > 0" class="add-newm" @click="newCompanyexpense" >ADD EXPENSE</button>
                     </div>
        
                    
                    
             <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>EXPENSE NAME</th>
                      <th>CATEGORY</th>
                      <th>TYPE</th>
                      <th>DESCRIPTION</th>
                    
                      <th>CREATED</th>
                        <th>COLLECTION</th>
                       <th></th>
                    </tr>
                  </thead>
                  <tbody>
           
                    <tr>

                    <tr v-for="compexps in datarecordscompanyexpenses.data" :key="compexps.id">
                    
                    <td>{{compexps.id}}</td>
                    <td>{{compexps.expensename}}</td>
                
                           <td>    <template v-if="compexps.expense_category">	{{compexps.expense_category.expcatcatname}}</template></td>
                           <td>    <template v-if="compexps.expense_typeconnect">	{{compexps.expense_typeconnect.typename}}</template></td>
                       
                               <td>{{compexps.description}}</td>
                               <td>{{compexps.created_at}}</td>
                               <td>
                                 

<div class="form-group clearfix">
                      <div class="icheck-primary d-inline">
                        <input type="checkbox" id="checkboxPrimary1" checked="">
                        <label for="checkboxPrimary1">
                        </label>
                      </div>
                     
                     
                   
                    </div>                               </td>
                          <td>     
                              <!-- v-if="allowedtoedituser > 0 "  -->
                            <button type="button" v-if="allowedtoeditCompanyexpense > 0 "   class="btn  bg-gradient-secondary btn-xs fas fa-edit"  @click="editCompanyexp(compexps)">Edit</button>
                             <!--  -->


                            <button type="button" v-if="allowedtodeleteCompanyexpense > 0 "  class="btn  bg-gradient-danger btn-xs fas fa-trash-alt" @click="deleteCompanyexp(compexps.id)"> DEl </button>






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
  <!-- <button type="button"   class="btn  bg-gradient-info btn-xs fas fa-eye" @focus="checkAccess()"  @click="editModal(shobalrecs)"> View jjj </button>
                            <button type="button" v-if="allowedtodeleteshopBalancingRecord > 0" class="btn  bg-gradient-danger btn-xs fas fa-trash-alt"  @click="deleteRecord(shobalrecs.id)"> Delete </button>
                 <div v-if="allowedtodeleteshopBalancingRecord > 0" @cl>  -->
 <!-- tab one end -->
<div class="modal fade" id="bringupthemodal">
        <div class="modal-dialog modal-dialog-top modal-lg">
        <div  class="modal-content">
            <div  class="modal-header">
                <h4  v-show="!editmode"    class="modal-title">ADD NEW EXPENSE</h4> 
                <h4  v-show="editmode" class="modal-title" >UPDATE RECORD</h4> 
                <button  type="button" data-dismiss="modal" aria-label="Close" class="close"><span  aria-hidden="true">×</span></button></div> 
                 <form class="form-horizontal" @submit.prevent="editmode ? updateexpenserecord():createNewcompanyexpense()"> 

                    <div  class="modal-body">
              
              
           
               
                    
          

                          
                
                      
               
                
                 
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

<!-- Modal add menu -->
<div class="modal fade" id="addnewcompanyexpensemodal">
        <div class="modal-dialog modal-dialog-top modal-lg">
        <div  class="modal-content">
            <div  class="modal-header">
                <h4  v-show="!editmode"    class="modal-title">ADD NEW EXPENSE</h4> 
                <h4  v-show="editmode" class="modal-title" >UPDATE RECORD</h4> 
                <button  type="button" data-dismiss="modal" aria-label="Close" class="close"><span  aria-hidden="true">×</span></button></div> 
                 <form class="form-horizontal" @submit.prevent="editmode ? updateexpenserecord():createNewcompanyexpense()"> 

                    <div  class="modal-body">
              
              
                 
                 <div class="form-group row">

                            <label class="col-sm-2 col-form-label">Expense Name   </label>
                              <div class="col-sm-6">
                         <input v-model="form.expensename" type="text" name="expensename"
        class="form-control form-control-sm" :class="{ 'is-invalid': form.errors.has('expensename') }">
      <has-error :form="form" field="expensename"></has-error>

                              </div>

                        </div>
                
                      
               
                    
          

                           <div class="form-group row">

                            <label class="col-sm-2 col-form-label">Category </label>
                              <div class="col-sm-6">
                           <select name ="expensecategory" v-model="form.expensecategory" id ="expensecategory" v-on:click="loadDatarecords()" class="form-control" :class="{'is-invalid': form.errors.has('expensecategory')}">
<option value=" "> Select Category </option>
<option v-for='data in expensecategory' v-bind:value='data.id'>{{ data.expcatcatname }}</option>

</select>
            <has-error :form="form" field="expensecategory"></has-error>
                              </div>

                        </div>
                
                      
               
   <div class="form-group row">

                            <label class="col-sm-2 col-form-label">Expense Type </label>
                              <div class="col-sm-6">
                             <select name ="expensetype" v-model="form.expensetype" id ="expensetype" v-on:click="loadUsers()" class="form-control" :class="{'is-invalid': form.errors.has('expensetype')}">
<option value=""> Select Expense type </option>
<option v-for='data in expensetypes' v-bind:value='data.id'>{{ data.typename }}</option>

</select>
            <has-error :form="form" field="expensetype"></has-error>
                              </div>

                        </div>
                
                        <div class="form-group row">

                            <label class="col-sm-2 col-form-label">Description </label>
                              <div class="col-sm-6">
                               <textarea v-model="form.description" name="description" rows="5" cols="30" class="form-control" :class="{ 'is-invalid': form.errors.has('description') }"></textarea>
                 
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


<!-- mmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm -->


  <div class="tab-pane fade" v-if="makeofficeexpenseaccessSettings > 0 "  id="custom-tabs-two-messages" role="tabpanel" aria-labelledby="custom-tabs-two-messages-tab">
             

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
   <form @submit.prevent="savethemonthlyreportforallbranches()">
                 
                      <div class="form-group">
                
                   
  <label>Branch :</label>
                    <select name ="branchname" v-model="form.branchname" id ="branchname"  class="form-control-sm" v-on:change="myClickEventtosavemonthlyreportallbranches"  :class="{'is-invalid': form.errors.has('branchname')}">
                    <option value="900"> All  </option>
                    <option v-for='data in mybrancheslist' v-bind:value='data.branchno'>{{ data.branchname }}</option>

                    </select>
                    

                                <has-error :form="form" field="branchname"></has-error>

<label>Expense :</label>
                    <select name ="expensename" v-model="form.expensename" id ="expensename" class="form-control-sm"  v-on:change="myClickEventtosavemonthlyreportallbranches"  :class="{'is-invalid': form.errors.has('expensename')}">
                    <option value="900"> All  </option>
                    <option v-for='data in expenseslist' v-bind:value='data.id'>{{ data.expensename }}</option>

                    </select>
                                <has-error :form="form" field="expensename"></has-error>

<label>Records Per page :</label>
                    <select name ="displaynumber" v-model="form.displaynumber" id ="displaynumber" class="form-control-sm"  v-on:change="myClickEventtosavemonthlyreportallbranches"  :class="{'is-invalid': form.errors.has('expensename')}">
                    
                    
                      <option value="5"> 5  </option>
                      <option value="10"> 10  </option>
                       <option value="20"> 20  </option>
                      <option value="30"> 30  </option>
                    
                      <option value="50"> 50  </option>
                       <option value="100"> 100  </option>
                      <option value="150"> 150  </option>
                       <option value="200"> 200  </option>
                      <option value="300"> 300  </option>
                    <option value="900"> All  </option>
                  
                    </select>
                                <has-error :form="form" field="displaynumber"></has-error>


                              
             <button type="submit" id="submit" hidden="hidden" name= "submit" ref="theButtontotosalesreportmonthly" class="btn btn-primary btn-sm">Saveit</button>         

                                
               <select2 :options="options" v-model="selected"></select2>
       
                   
          </div>
      

                </form>





























                  <div class="bethapa-table-header"></div>
              <div class="bethapa-table-header">
                    COMPANY EXPENDITURES
                      <!-- <button type="button"  class="add-newm" @click="newBranchpayoutbranch" >Add New </button> -->
                        <button type="button" v-if="allowedtomakeofficeexpense > 0" class="add-newm" @click="newofficeexpenditure" >Make Expense</button>
                     </div>
        
                    
       
              <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th> DATE</th>
                      <th>BRANCH</th>
                      <th>EXPENSE</th>
                       <th>DESCRIPTION</th>
                      <th>AMOUNT ( {{currencydetails}} ) </th>
                     
                    <th> STATION </th>
                       <th> EXPENSE WALLET </th>
                        <th> STATUS </th>
                   
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                       <tr v-for="offcmadeexp in officemadeexpensesrecords.data" :key="offcmadeexp.id">
                    <td>{{offcmadeexp.id}}</td>
                  
                    <td>{{offcmadeexp.datemade}}</td>
                           <td>    <template v-if="offcmadeexp.branch_name">	{{offcmadeexp.branch_name.branchname}}</template></td>
                           <td>    <template v-if="offcmadeexp.expense_name">	{{offcmadeexp.expense_name.expensename}}</template></td>
                          <td>{{offcmadeexp.description}}</td>
                       
                               <td> {{formatPrice((offcmadeexp.amount))}}</td>
                               <td>   <div v-if="((offcmadeexp.explevel)) == 1">
                                <span class="cell" style="color:#dc3545 ;">  
   
                    <span style="font-size:1.0em;" center >  Branch </span></span>
                              </div>
                               <div v-if="((offcmadeexp.explevel)) == 2">
                                <span class="cell" style="color:#1591a5 ;">  
   
                    <span style="font-size:1.0em;" center >  Office </span></span>
                              </div> 
                              
                              </td>

   <td>   <div v-if="((offcmadeexp.walletexpense)) == 1">
                                <span class="cell" style="color:green ;">  
   
                    <span style="font-size:1.0em;" center >  Collections </span></span>
                              </div>
                               <div v-if="((offcmadeexp.walletexpense)) == 2">
                                <span class="cell" style="color:#1591a5 ;">  
   
                    <span style="font-size:1.0em;" center >  Investment </span></span>
                              </div>
                                  <div v-if="((offcmadeexp.walletexpense)) == 3">
                                <span class="cell" style="color:#maroon ;">  
   
                    <span style="font-size:1.0em;" center >  Petty Cash </span></span>
                              </div>
                              
                                 <div v-if="((offcmadeexp.walletexpense)) == 4">
                                <span class="cell" style="color:#1378a5 ;">  
   
                    <span style="font-size:1.0em;" center >  Branch </span></span>
                              </div>
                              
                               </td>




                                <td> <div v-if="((offcmadeexp.approvalstate))== 0">
                                <span class="cell" style="color:maroon ;">  
   
                    <span style="font-size:1.0em;" center >  Pending </span></span>
                              </div>
                              <div v-if="((offcmadeexp.approvalstate))== 1">
                                <span class="cell" style="color:green ;">  
   
                    <span style="font-size:1.0em;" center >  Approved </span></span>
                              </div>
                              
                              </td>

                               
                          <td> 
                                <!-- div  >       -->
        <div >                         
       <button v-show="offcmadeexp.approvalstate < 1" type="button"   class="btn  bg-gradient-success btn-xs fas fa-eye"  @click="confirmexpense(offcmadeexp.id)"> Approve  </button>
      <button type="button" v-if="offcmadeexp.approvalstate < 1" class="btn  bg-gradient-secondary btn-xs fas fa-edit"  @click="editOfficemadeexpense(offcmadeexp)">Edit</button>
       </div>
      <button type="button"  class="btn  bg-gradient-danger btn-xs fas fa-trash-alt" @click="deletemadeexpense(offcmadeexp.id)"> Delete Expense </button>
       
<!-- v-if="allowedtodeleteadmincashcollection > 0 " -->
                      </td>
                    </tr>
              
                    
                  </tbody>
                                   </table>

   
   
                      <div class="card-footer">
                <ul class="pagination pagination-sm m-0 float-right">
                   <pagination :data="officemadeexpensesrecords" @pagination-change-page="paginationroleAuthorisedsubmenues"></pagination>
                </ul>
              </div>
                     
                 
                    </div>
 
 <!-- tab one end -->


<!-- Modal add menu -->
<div class="modal fade" id="makeofficeexpensemodal">
        <div class="modal-dialog modal-dialog-top modal-lg">
        <div  class="modal-content">
            <div  class="modal-header">
                <h4  v-show="!editmode"    class="modal-title">Office Expenses</h4> 
                <h4  v-show="editmode" class="modal-title" >UPDATE RECORD</h4> 
                <button  type="button" data-dismiss="modal" aria-label="Close" class="close"><span  aria-hidden="true">×</span></button></div> 
                 <form class="form-horizontal" @submit.prevent="editmode ? updadeexpenseforofficeuse():createNewofficeexpense()"> 

                    <div  class="modal-body">
              
                      <div class="form-group row">

                            <label class="col-sm-2 col-form-label">Branch </label>
                              <div class="col-sm-6">
                            <select name ="branch" v-model="form.branch" id ="branch" v-on:click="loadDatarecords()" class="form-control" :class="{'is-invalid': form.errors.has('branch')}">
<option value=" ">  </option>
<option v-for='data in brancheslist' v-bind:value='data.branchno'>{{ data.branchno }} - {{ data.branchname }}</option>

</select>
            <has-error :form="form" field="branch"></has-error>
                              </div>

                        </div>
                 
               
                
                      
               
                    
          

                           <div class="form-group row">

                            <label class="col-sm-2 col-form-label">Expense </label>
                              <div class="col-sm-6">
                            <select name ="expense" v-model="form.expense" id ="expense"  class="form-control" :class="{'is-invalid': form.errors.has('expense')}">
<option value=" ">  </option>
<option v-for='data in expenseslist' v-bind:value='data.id'>{{ data.expensename }}</option>

</select>
            <has-error :form="form" field="expense"></has-error>
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

                            <label class="col-sm-2 col-form-label">Expense Date </label>
                              <div class="col-sm-6">
                                <input v-model="form.datemade" type="date" name="datemade"
       class="form-control form-control-sm" :class="{ 'is-invalid': form.errors.has('datemade') }">
      <has-error :form="form" field="datemade"></has-error>
                              </div>

                        </div>
                        <!--  -->
                         <div class="form-group row">

                            <label class="col-sm-2 col-form-label">Wallet </label>
                              <div class="col-sm-6">
                              <select name ="walletexpense" v-model="form.walletexpense" id ="walletexpense" v-on:click="loadDatarecords()" class="form-control" :class="{'is-invalid': form.errors.has('walletexpense')}">
                  <option value=" ">  </option>
                  <option v-for='data in walletlist' v-bind:value='data.id'>{{ data.id }} - {{ data.name }}</option>

                  </select>
            <has-error :form="form" field="walletexpense"></has-error>
                              </div>

                        </div>
                
                 <div class="form-group row">

                            <label class="col-sm-2 col-form-label">Description </label>
                              <div class="col-sm-6">
                                    <textarea v-model="form.description" name="description" rows="5" cols="30" class="form-control" :class="{ 'is-invalid': form.errors.has('description') }"></textarea>
                 
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

















<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
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
   <form @submit.prevent="savethemonthlyreportforallbranches()">
                 
                      <div class="form-group">
                
                   
  <label>Branch :</label>
                    <select name ="branchname" v-model="form.branchname" id ="branchname"  class="form-control-sm" v-on:change="myClickEventtosavemonthlyreportallbranches"  :class="{'is-invalid': form.errors.has('branchname')}">
                    <option value="900"> All  </option>
                    <option v-for='data in mybrancheslist' v-bind:value='data.branchno'>{{ data.branchname }}</option>

                    </select>
                    

                                <has-error :form="form" field="branchname"></has-error>


<label>Records Per page :</label>
                    <select name ="displaynumber" v-model="form.displaynumber" id ="displaynumber" class="form-control-sm"  v-on:change="myClickEventtosavemonthlyreportallbranches"  :class="{'is-invalid': form.errors.has('expensename')}">
                    
                    
                      <option value="5"> 5  </option>
                      <option value="10"> 10  </option>
                       <option value="20"> 20  </option>
                      <option value="30"> 30  </option>
                    
                      <option value="50"> 50  </option>
                       <option value="100"> 100  </option>
                      <option value="150"> 150  </option>
                       <option value="200"> 200  </option>
                      <option value="300"> 300  </option>
                    <option value="900"> All  </option>
                  
                    </select>
                                <has-error :form="form" field="displaynumber"></has-error>


                              
             <button type="submit" id="submit" hidden="hidden" name= "submit" ref="theButtontotosalesreportmonthly" class="btn btn-primary btn-sm">Saveit</button>         

                                
             
                   
          </div>
      

                </form>


              <div class="bethapa-table-header">
                   
       
                     Branch Monthly Expenses   
                     <!-- v-if="allowedtoaddshopBalancingRecord > 0" -->
                     <button type="button"   class="add-newm" @click="newshopbal" >Add Monthly Expense </button>
                     </div>


             <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                   
                    <th>#</th>
                      
                      <th>BRANCH</th>
                     
                      <th>EXPENSE</th>
                      <th>AMOUNT</th>
                      <th>DESCRIPTION</th>
                    
                     <th >  </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>

                  <tr v-for="shobalrecs in branchexpensesrecords.data" :key="shobalrecs.id">
                      
                  <td>{{shobalrecs.id}}</td>
                  
                      <td>   <template v-if="shobalrecs.userbalancing_branch">	{{shobalrecs.userbalancing_branch.name}}</template></td>
                    
                       <td>    <template v-if="shobalrecs.branchin_balance">	{{shobalrecs.branchin_balance.branchname}}</template></td>
                         
                          <td>   <template v-if="shobalrecs.userbalancing_branch">	{{shobalrecs.userbalancing_branch.name}}</template></td>
                    
                       <td>    <template v-if="shobalrecs.branchin_balance">	{{shobalrecs.branchin_balance.branchname}}</template></td>
                         
                         
                         
                    
                       <td>
                             <button type="button"   class="btn  bg-gradient-info btn-xs fas fa-eye" @focus="checkAccess()"  @click="editModal(shobalrecs)"> View jjj </button>
                            <button type="button" v-if="allowedtodeleteshopBalancingRecord > 0" class="btn  bg-gradient-danger btn-xs fas fa-trash-alt"  @click="deleteRecord(shobalrecs.id)"> Delete </button>
                 
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
                    <option v-for='data in mybrancheslist' v-bind:value='data.branchno'>{{ data.branchno }} - {{ data.branchname }}</option>

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
                     six  is. 
                  </div>


                    <div class="tab-pane fade" id="custom-tabs-two-seven" role="tabpanel" aria-labelledby="custom-tabs-two-seven-tab">
                     seven  is. 
                  </div>

  <div class="tab-pane fade" id="custom-tabs-two-eight" role="tabpanel" aria-labelledby="custom-tabs-two-eight-tab">
                     Eight  is. 
                  </div>








                </div>
              </div>
              <!-- /.card -->
            </div>
          </div>