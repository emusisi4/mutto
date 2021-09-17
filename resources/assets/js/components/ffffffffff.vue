<div class="col-12 col-sm-12 col-lg-12">
            <div class="card card-primary card-outline card-tabs">
              <div class="card-header p-0 pt-1 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                  <li class="nav-item" v-if="usersccessSettings > 0 ">
                    <!--   -->
                    <a class="nav-link active" id="custom-tabs-two-home-tab"
                     data-toggle="pill" href="#custom-tabs-two-home" role="tab"
                     @click="loadUsers()" aria-controls="custom-tabs-two-home" aria-selected="true">users</a>
                  </li>
                
                
                

                  <li class="nav-item" > 
                    <!--  v-if="rolesaccessSettings > 0 " -->
                    <a class="nav-link" id="custom-tabs-two-profile-tab"
                     data-toggle="pill" href="#custom-tabs-two-profile" role="tab" aria-controls="custom-tabs-two-profile" aria-selected="false">Roles</a>
                  </li>

 

                  <li class="nav-item" v-if="mainmenuaccessSettings > 0 "  >
                    <!-- -->
                    <a class="nav-link" id="custom-tabs-two-messages-tab"
                    @click="loadMainmenuaccess()" data-toggle="pill" href="#custom-tabs-two-messages" role="tab" 
                    aria-controls="custom-tabs-two-messages" aria-selected="false">Main Menu settings</a>
                  </li>
                 
                  <li class="nav-item" v-if="submenuaccessSettings > 0 "  >
                    <!---->
                    <a class="nav-link" id="custom-tabs-two-settings-tab" data-toggle="pill"
                     href="#custom-tabs-two-settings" role="tab" @click="loadSubmenaccess()"
                     aria-controls="custom-tabs-two-settings" aria-selected="false">Sub-Menu Settings</a>
                  </li>

                   <li class="nav-item" >
                    <a class="nav-link" id="custom-tabs-two-three-tab" data-toggle="pill"
                     href="#custom-tabs-two-three" role="tab" @click="loadcomponentsAllowedfortherole()" 
                     aria-controls="custom-tabs-two-three" aria-selected="false">Component Access</a>
                     <!-- v-if="componentaccessSettings > 0 " -->
                  </li>


                    <li class="nav-item" >
                    <a class="nav-link" id="custom-tabs-two-four-tab" data-toggle="pill"
                     href="#custom-tabs-two-four" role="tab" @click="loadcomponentsAllowedcomponentfeatures()" 
                     aria-controls="custom-tabs-two-four" aria-selected="false">Component Features Access </a>
                     <!-- v-if="featuresaccessSettings > 0 " -->
                  </li>


                 <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-two-five-tab"
                    data-toggle="pill" href="#custom-tabs-two-five" role="tab" @click="loadMacines()"
                     aria-controls="custom-tabs-two-four" aria-selected="false">FISH MACHINES</a>
                  </li>


                    <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-two-six-tab" @click="loadBettingproducts()"
                    data-toggle="pill" href="#custom-tabs-two-six" role="tab" aria-controls="custom-tabs-two-six" 
                     aria-selected="false">COMPANY PRODUCTS</a>
                  </li>


                    <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-two-seven-tab"  @click="loadAuthorisedbranchproducts()"
                    data-toggle="pill" href="#custom-tabs-two-seven" role="tab" 
                    aria-controls="custom-tabs-two-seven" aria-selected="false">Branches && Products</a>
                  </li>


                    <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-two-eight-tab"  @click="loadAuthorisedbranchmachines()"
                    data-toggle="pill" href="#custom-tabs-two-eight" role="tab"
                     aria-controls="custom-tabs-two-eight" aria-selected="false">Branch && Machines</a>
                  </li>

                  
 <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-two-nine-tab"  @click="loadBranchesandusers()"
                    data-toggle="pill" href="#custom-tabs-two-nine" role="tab"
                     aria-controls="custom-tabs-two-nine" aria-selected="false">Branch && Users</a>
                  </li>

                 


                </ul>
              </div>
              <div class="card-body">



      <div class="tab-content" id="custom-tabs-two-tabContent"  >
                  
                  <!-- tab one start -->
                  <div class="tab-pane fade show active" v-if="usersccessSettings > 0 " id="custom-tabs-two-home" role="tabpanel" aria-labelledby="custom-tabs-two-home-tab">
                    <!--    -->
                 
                 <div class="bethapa-table-header">
                      User Details <button v-if="allowedtoadduser > 0 " type="button"  class="add-newm" @click="newUsermodal" >Add New </button>
                      <!-- -->
                     </div>



<!-- 

<Select2 v-model="myValue" :options="roleslist" class="form-control form-control-sm" /> -->

<!--  
               <Select2 v-model="form.rolename" :options= v-for="data in roleslist" v-bind:value='data.id'>{{ data.id }} - {{ data.rolename }} /> 
 -->

                    <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                   
                      <th > # </th>
                      <th > NAME </th>
                      <th > USER NAME </th>
                      <th > ROLE </th>
                      <th > BRANCH </th>
                      <th > CREATED </th>
                     <th >  </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>

                                       <tr v-for="usersdata in usersrecords.data" :key="usersdata.id">
                      
                 
                  
                
                      
                         
                                <td>{{usersdata.id}}</td>
                                 <td>{{usersdata.name | firstletterCapital }}</td>
 
                             
                                  <td>{{usersdata.email}}</td>

                                  <td>{{usersdata.mmaderole}}</td>
                                  <td>{{usersdata.branch}}</td>
                                 <td>{{usersdata.created_at | myDate }}</td>  
                                 <td> 
                                  
                              <button type="button" v-if="allowedtoedituser > 0 "   class="btn  bg-gradient-secondary btn-xs fas fa-edit"  @click="editUser(usersdata)">Edit</button>
                             


                            <button type="button" v-if="allowedtodeleteuser > 0 " class="btn  bg-gradient-danger btn-xs fas fa-trash-alt" @click="deleteUser(usersdata.id)"> DEl </button>




                             
                              </td>


               
                              
                               
                    </tr>
              
                     
                  </tbody>
              
 
                                   </table>
    <div class="card-footer">
                <ul class="pagination pagination-sm m-0 float-right">
                   <pagination :data="usersrecords" @pagination-change-page="paginationResultsUsers"></pagination>
                </ul>
              </div>
                     
                 
                    </div>
 
 <!-- tab one end -->


<!-- Modal add menu -->
<div class="modal fade" id="addnewUsermodal">
        <div class="modal-dialog modal-dialog-centered modal-xl">
        <div  class="modal-content">
            <div  class="modal-header">
                <h4  v-show="!editmode"    class="modal-title">ADD NEW RECORD</h4> 
                <h4  v-show="editmode" class="modal-title" >UPDATE RECORD</h4> 
                <button  type="button" data-dismiss="modal" aria-label="Close" class="close"><span  aria-hidden="true">×</span></button></div> 
                 <form class="form-horizontal" @submit.prevent="editmode ? updateUser():createUser()"> 

                    <div  class="modal-body">
                  <div class="form-group  row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Full Name</label>
                    <div class="col-sm-6">
                  <input v-model="form.name" type="text" name="name"
                      class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                    <has-error :form="form" field="name"></has-error>
                                  </div>
                   
      
                  </div>
                 
                  <div class="form-group  row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Username / Email </label>
                    <div class="col-sm-6">
                    <input v-model="form.email" type="text" name="email"
                    class="form-control" :class="{ 'is-invalid': form.errors.has('email') }">
                    <has-error :form="form" field="email"></has-error>
                                    </div>
                  </div>

                    
          

                           <div class="form-group row">

                            <label class="col-sm-2 col-form-label">User Type </label>
                              <div class="col-sm-6">
                            <select class='form-control' id="type" v-model="form.type">

                              <option value="" > </option>

                              <option v-for='data in typeslist' :value='data.id'>{{ data.typename }}</option>

                            </select>
                              </div>

                        </div>


                           <div class="form-group row">

                            <label class="col-sm-2 col-form-label">Branch </label>
                              <div class="col-sm-6">
                            <select name ="branch" v-model="form.branch" id ="branch"  class="form-control" :class="{'is-invalid': form.errors.has('branch')}">
                    <option value=" ">  </option>
                    <option v-for='data in brancheslist' v-bind:value='data.id'>{{ data.id }} - {{ data.branchname }}</option>

                    </select>
                   

                                <has-error :form="form" field="branch"></has-error>


                              </div>

                        </div>
                
                
                            <div class="form-group row">

                            <label class="col-sm-2 col-form-label">Role </label>
                              <div class="col-sm-6">
                            <select name ="rolename" class='form-control'  v-model="form.rolename">

                              <option value=" ">  </option>

                              <option v-for='data in roleslist' :value='data.id'>{{ data.rolename }}</option>

                            </select>
                            
                               <has-error :form="form" field="rolename"></has-error>
                              </div>
                 
                        </div>
               

                      
                      
                   <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Password </label>
                    <div class="col-sm-6">
                    <input v-model="form.password" type="password" name="password"
                    class="form-control" :class="{ 'is-invalid': form.errors.has('password') }">
                    <has-error :form="form" field="password"></has-error>
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
                      Roles Details <button type="button" class="add-newm" @click="newUsermodal" >Add New </button>
                     </div>



                  </div>






                  </div>
<!-- mmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm -->

                  <div class="tab-pane fade" id="custom-tabs-two-messages" role="tabpanel" aria-labelledby="custom-tabs-two-messages-tab">
             

 <form @submit.prevent="SaveRoletoaddmainmenu()">
                  
                  
                    <div class="form-group">
                  <label>Choose Role</label>
                    <select name ="mainmemurolerrtrrr" v-model="form.mainmemurolerrtrrr" id ="mainmemurolerrtrrr" v-on:change="myClickEventformainmenuas"  :class="{'is-invalid': form.errors.has('mainmemurolerrtrrr')}">
                    <option value=" ">  </option>
                    <option v-for='data in roleslist' v-bind:value='data.id'>{{ data.id }} - {{ data.rolename }}</option>

                    </select>
                       <input type="text" name="inone" value="forsubmenuazccess" hidden class="form-control">

                                <has-error :form="form" field="mainmemurolerrtrrr"></has-error>

                             
                             

                                
                                </div>
                                  <button type="submit" id="submit" hidden="hidden" name= "submit" ref="myBtnmainmen" class="btn btn-primary btn-sm">Saveit</button>
                                </form>

              <div class="bethapa-table-header">
                      AUTHORISED MAIN - MENUS <button v-if="allowedtoaddmainmenuaccess > 0" type="button"  class="add-newm" @click="newmainmenuaccess" >Add New </button>
                      <!--  -->
                     </div>
        
                    
                    
          <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                   
                      <th > # </th>
                      <th > MAIN MENU </th>
                   
                      <th > AUTHORISED </th>
                      <th >  </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>

                                       <tr v-for="allmainmenus in datarecordsMainmenuauthorised.data" :key="allmainmenus.id">
                      
                 
                  
                
                      
                         
                                <td>{{allmainmenus.id}}</td>
                                 
 
                                  <!-- <td>{{allmainmenus.component}}</td> -->
                             
                                <td>   <template v-if="allmainmenus.mainm_name">	{{allmainmenus.mainm_name.mainmenuname}}</template></td>
                

                                
                               
                                 <td>{{allmainmenus.created_at | myDate }}</td>  
                                 <td> 
                               
                           

                            <button type="button" v-if="allowedtorevokemainmenuaccess > 0 " class="btn  bg-gradient-danger btn-xs fas fa-trash-alt" @click="revokeMainmenuuaccess(allmainmenus.id)"> Revoke Menu Item </button>




                             
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
<div class="modal fade" id="addnewaccesstomainmenu">
        <div class="modal-dialog modal-dialog-top modal-lg">
        <div  class="modal-content">
            <div  class="modal-header">
                <h4  v-show="!editmode"    class="modal-title">Activate Main-Menu Access</h4> 
                <h4  v-show="editmode" class="modal-title" >UPDATE RECORD</h4> 
                <button  type="button" data-dismiss="modal" aria-label="Close" class="close"><span  aria-hidden="true">×</span></button></div> 
                 <form class="form-horizontal" @submit.prevent="editmode ? updateUser():createMainuaccess()"> 

                    <div  class="modal-body">
              
              
                 
                 <div class="form-group row">

                            <label class="col-sm-2 col-form-label">Role </label>
                              <div class="col-sm-6">
                            <select name ="roleformainmenuaccess" v-model="form.roleformainmenuaccess" 
                            id ="roleformainmenuaccess"  class="form-control" :class="{'is-invalid': form.errors.has('roleformainmenuaccess')}">
                    <option value=" ">  </option>
                    <option v-for='data in roleslist' v-bind:value='data.id'>{{ data.id }} - {{ data.rolename }}</option>

                    </select>
                   

                                <has-error :form="form" field="roleformainmenuaccess"></has-error>


                              </div>

                        </div>
                
                      
               
                    
          

                           <div class="form-group row">

                            <label class="col-sm-2 col-form-label">Main Menu </label>
                              <div class="col-sm-6">
                            <select name ="mainmenus" v-model="form.mainmenus" id ="mainmenus"  class="form-control" :class="{'is-invalid': form.errors.has('mainmenus')}">
                    <option value=" ">  </option>
                    <option v-for='data in mainmenulist' v-bind:value='data.id'>{{ data.id }} - {{ data.mainmenuname }}</option>

                    </select>
                   

                                <has-error :form="form" field="mainmenus"></has-error>


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
                    
                    
                     <form @submit.prevent="SaveRoletoaddsubment()">
                  
                  
                    <div class="form-group">
                  <label>Choose Role</label>
                    <select name ="mycpmponenttonnn" v-model="form.mycpmponenttonnn" id ="mycpmponenttonnn" v-on:change="myClickEventforsubmenus"  :class="{'is-invalid': form.errors.has('mycpmponenttonnn')}">
                    <option value=" ">  </option>
                    <option v-for='data in roleslist' v-bind:value='data.id'>{{ data.id }} - {{ data.rolename }}</option>

                    </select>
                       <input type="text" name="inone" value="forsubmenuazccess" hidden class="form-control">

                                <has-error :form="form" field="mycpmponenttonnn"></has-error>

                             
                             

                                
                                </div>
                                  <button type="submit" id="submit" hidden="hidden" name= "submit" ref="myBtnsubmenus" class="btn btn-primary btn-sm">Saveit</button>
                                </form>

              <div class="bethapa-table-header">
                      AUTHORISED SUB-MENUS <button  type="button" class="add-newm" @click="newsubmenuaccess" >Add New </button>
                      <!-- v-if="allowedtoaddsubmenuaccess > 0" -->
                     </div>
        
                    
                    
             <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                   
                      <th > # </th>
                      <th > COMPONENT </th>
                      <th > SUBMENU </th>
                      <th > AUTHORISED </th>
                      <th >  </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>

                                       <tr v-for="allsubmenus in datarecordsSubmenusauthorised.data" :key="allsubmenus.id">
                      
                 
                  
                
                      
                         
                                <td>{{allsubmenus.id}}</td>
                                 
 
                                  <td>{{allsubmenus.component}}</td>
                             
                               <td>   <template v-if="allsubmenus.subm_name">	{{allsubmenus.subm_name.submenuname}}</template></td>
                

                                
                               
                                 <td>{{allsubmenus.created_at | myDate }}</td>  
                                 <td> 
                                  
                           

                            <button type="button" v-if="allowedtorevokesubmenuaccess > 0" class="btn  bg-gradient-danger btn-xs fas fa-trash-alt" @click="revokeSubmenuaccess(allsubmenus.id)"> Revoke Sub Menu Item </button>




                             
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
<div class="modal fade" id="addnewaccesstosubmenu">
        <div class="modal-dialog modal-dialog-top modal-lg">
        <div  class="modal-content">
            <div  class="modal-header">
                <h4  v-show="!editmode"    class="modal-title">Activate Sub-Menu Access</h4> 
                <h4  v-show="editmode" class="modal-title" >UPDATE RECORD</h4> 
                <button  type="button" data-dismiss="modal" aria-label="Close" class="close"><span  aria-hidden="true">×</span></button></div> 
                 <form class="form-horizontal" @submit.prevent="editmode ? updateUser():createSubmenuaccess()"> 

                    <div  class="modal-body">
              
              
                 
                 <div class="form-group row">

                            <label class="col-sm-2 col-form-label">Role </label>
                              <div class="col-sm-6">
                            <select name ="roleforsubmenuaccess" v-model="form.roleforsubmenuaccess" id ="roleforsubmenuaccess"  class="form-control" :class="{'is-invalid': form.errors.has('roleforsubmenuaccess')}">
                    <option value=" ">  </option>
                    <option v-for='data in roleslist' v-bind:value='data.id'>{{ data.id }} - {{ data.rolename }}</option>

                    </select>
                   

                                <has-error :form="form" field="roleforsubmenuaccess"></has-error>


                              </div>

                        </div>
                
                      
               
                    
          

                           <div class="form-group row">

                            <label class="col-sm-2 col-form-label">Sub Menu </label>
                              <div class="col-sm-6">
                            <select name ="submenus" v-model="form.submenus" id ="submenus"  class="form-control" :class="{'is-invalid': form.errors.has('submenus')}">
                    <option value=" ">  </option>
                    <option v-for='data in submenulist' v-bind:value='data.id'>{{ data.id }} - {{ data.submenuname }}</option>

                    </select>
                   

                                <has-error :form="form" field="submenus"></has-error>


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
                   <div class="tab-pane fade" id="custom-tabs-two-three" role="tabpanel" aria-labelledby="custom-tabs-two-three-tab">
                  
                  
                   <form @submit.prevent="SaveRoletoaddcomponent()">
                  
                  
                    <div class="form-group">
                  <label>Rol nnnne</label>
                    <select name ="mycpmponentto" v-model="form.mycpmponentto" id ="mycpmponentto" v-on:change="myClickEventroletoaddcomponent"  :class="{'is-invalid': form.errors.has('mycpmponentto')}">
                    <option value=" ">  </option>
                    <option v-for='data in roleslist' v-bind:value='data.id'>{{ data.id }} - {{ data.rolename }}</option>

                    </select>
                       <input type="text" name="inone" value="roletoaddcomponent" hidden
                    class="form-control">

                                <has-error :form="form" field="mycpmponentto"></has-error>

                             
                             

                                
                                </div>
                                  <button type="submit" id="submit" hidden="hidden" name= "submit" ref="desbutton" class="btn btn-primary btn-sm">Saveit</button>
                                </form>

              <div class="bethapa-table-header">
                   
       
                      AUTHORISED COMPONENTS  <button type="button" class="add-newm" @click="newcomponentadd" >Add New </button>
                     </div>
<!--  v-if="allowedtogivecomponentaccess > 0" -->

            <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                   
                      <th > # </th>
                      <th >  </th>
                       <th > COMPONENT </th>
                      <th > AUTHORISED </th>
                     <th >  </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>

                                       <tr v-for="allcomponentsdata in allowedrolecomponentsObject.data" :key="allcomponentsdata.id">
                      
                 
                  
                
                      
                         
                                <td>{{allcomponentsdata.id}}</td>
                                 <td>
                                   
                                 </td>
 
                             
                                  <td>{{allcomponentsdata.componentto}}</td>

                                
                               
                                 <td>{{allcomponentsdata.created_at | myDate }}</td>  
                                 <td> 
                                  
                           

                            <button type="button" v-if="allowedtorevokecomponentaccess > 0" class="btn  bg-gradient-danger btn-xs fas fa-trash-alt" @click="revokeroleComponent(allcomponentsdata.id)"> Revoke </button>




                             
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
<div class="modal fade" id="addnewComponenttotheRole">
        <div class="modal-dialog modal-dialog-top modal-lg">
        <div  class="modal-content">
            <div  class="modal-header">
                <h4  v-show="!editmode"    class="modal-title">Activate ROLE- Component</h4> 
                <h4  v-show="editmode" class="modal-title" >UPDATE RECORD</h4> 
                <button  type="button" data-dismiss="modal" aria-label="Close" class="close"><span  aria-hidden="true">×</span></button></div> 
                 <form class="form-horizontal" @submit.prevent="editmode ? updateUser():createAuthorisedrole()"> 

                    <div  class="modal-body">
              
              
                 
                   <div class="form-group row">

                            <label class="col-sm-2 col-form-label">Role </label>
                              <div class="col-sm-6">
                            <select name ="roleyouareaddingtocomponent" class='form-control'  v-model="form.roleyouareaddingtocomponent">

                              <option value="">  </option>

                              <option v-for='data in roleslist' :value='data.id'>{{ data.rolename }}</option>

                            </select>
                            
                               <has-error :form="form" field="roleyouareaddingtocomponent"></has-error>
                              </div>
                 
                        </div>

                    
          

                           <div class="form-group row">

                            <label class="col-sm-2 col-form-label">Component </label>
                              <div class="col-sm-6">
                           <select name ="components" v-model="form.components" id ="components"  class="form-control" :class="{'is-invalid': form.errors.has('components')}">
                    <option value=" ">  </option>
                    <option v-for='data in componentslist' v-bind:value='data.sysname'>{{ data.sysname }} - {{ data.componentname }}</option>

                    </select>
                   

                                <has-error :form="form" field="components"></has-error>

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
<!-- End od pane -->
                    <div class="tab-pane fade" id="custom-tabs-two-four" role="tabpanel" aria-labelledby="custom-tabs-two-four-tab">
                                                     
            <form @submit.prevent="SaveRoletoaddformcomponent()">
                  
                  
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
                                </form>
                  
                       <div class="bethapa-table-header">
                      AUTHORISED COMPONENTS FEATURES <button type="button" class="add-newm" @click="newcomponentfeatureadd" >Add New </button>
                     </div>


                   <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                   
                      <th > # </th>
                      <th > COMPONENT </th>
                      <th > FEATURE </th>
                      
                      <th > ACTIVATED </th>
                     <th >  </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>

                              <tr v-for="allcompfetures in allowedrolecomponentfeaturesObject.data" :key="allcompfetures.id">
                      
                 
                  
                
                      
                         
                                <td>{{allcompfetures.id}}</td>
                               
                                <td>{{allcompfetures.component}}</td>
                             
                                <td>{{allcompfetures.formcomponent}}</td>

                                
                               
                                 <td>{{allcompfetures.created_at | myDate }}</td>  
                                 <td> 
                                  
                           

                            <button type="button" class="btn  bg-gradient-danger btn-xs fas fa-trash-alt" @click="revokeroleComponentfeature(allcompfetures.id)"> Revoke Feature</button>




                             
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
<div class="modal fade" id="addnewcomponentfeature">
        <div class="modal-dialog modal-dialog-top modal-lg">
        <div  class="modal-content">
            <div  class="modal-header">
                <h4  v-show="!editmode"    class="modal-title">Activate Component Feature</h4> 
                <h4  v-show="editmode" class="modal-title" >UPDATE RECORD</h4> 
                <button  type="button" data-dismiss="modal" aria-label="Close" class="close"><span  aria-hidden="true">×</span></button></div> 
                 <form class="form-horizontal" @submit.prevent="editmode ? updateUser():createAuthorisecomponentfeature()"> 

                    <div  class="modal-body">
              
              
                 
                   <div class="form-group row">

                            <label class="col-sm-2 col-form-label">Role </label>
                              <div class="col-sm-6">
                            <select name ="roleyouareaddingtocomponent" class='form-control'  v-model="form.roleyouareaddingtocomponent">

                              <option value=" ">  </option>

                              <option v-for='data in roleslist' :value='data.id'>{{ data.rolename }}</option>

                            </select>
                            
                               <has-error :form="form" field="roleyouareaddingtocomponent"></has-error>
                              </div>
                 
                        </div>

                    
             <div class="form-group row">

                            <label class="col-sm-2 col-form-label">Component </label>
                              <div class="col-sm-6">
                            <select name ="componentname" class='form-control'  v-model="form.componentname">

                              <option value="">  </option>

                              <option v-for='data in componentslist' :value='data.sysname'>{{ data.componentname }}</option>

                            </select>
                            
                               <has-error :form="form" field="componentname"></has-error>
                              </div>
                 
                        </div>


                           <div class="form-group row">

                            <label class="col-sm-2 col-form-label">Component </label>
                              <div class="col-sm-6">
                          <select name ="formfeatures" v-model="form.formfeatures" id ="formfeatures"  class="form-control" :class="{'is-invalid': form.errors.has('formfeatures')}">
                    <option value=" ">  </option>
                    <option v-for='data in formfeatures' v-bind:value='data.sysname'>{{ data.featurename }}</option>

                    </select>
                    

                                <has-error :form="form" field="formfeatures"></has-error>


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
<!-- kkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk -->
                <div class="tab-pane fade" id="custom-tabs-two-five" role="tabpanel" aria-labelledby="custom-tabs-two-five-tab">
                  

     <div class="bethapa-table-header">
                      FISH MACHINES <button  type="button" class="add-newm" @click="newFishmachine" >Add New </button>
                      <!-- v-if="allowedtoaddsubmenuaccess > 0" -->
                     </div>
        
                    
                    
          <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                   
                      <th > # </th>
                      <th > NAME </th>
                      <th > DESCRIPTION </th>
                      <th >  </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>

                                       <tr v-for="allmacs in fishmachinesdatarecords.data" :key="allmacs.id">
                      
                 
                  
                
                      
                         
                                <td>{{allmacs.id}}</td>
                                 
 
                                <td>{{allmacs.machinename}}</td>
                             
                                <td>{{allmacs.description}}</td>
                

                                
                               
                           
                                 <td> 
                                  
                           

                       


                             
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
<div class="modal fade" id="addnewfishtable">
        <div class="modal-dialog modal-dialog-top modal-lg">
        <div  class="modal-content">
            <div  class="modal-header">
                <h4  v-show="!editmode"    class="modal-title">Add New Fish Machine</h4> 
                <h4  v-show="editmode" class="modal-title" >UPDATE RECORD</h4> 
                <button  type="button" data-dismiss="modal" aria-label="Close" class="close"><span  aria-hidden="true">×</span></button></div> 
                 <form class="form-horizontal" @submit.prevent="editmode ? updateUser():createNewfishmachine()"> 

                    <div  class="modal-body">
              
              
                 
                 <div class="form-group row">

                            <label class="col-sm-2 col-form-label">Machine Name </label>
                              <div class="col-sm-6">
                             <input v-model="form.machinename" type="text" name="machinename"
                    class="form-control" :class="{ 'is-invalid': form.errors.has('machinename') }">
                    <has-error :form="form" field="machinename"></has-error>


                              </div>

                        </div>
                
                      
               
                    
          

                           <div class="form-group row">

                            <label class="col-sm-2 col-form-label">Description </label>
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


<!-- kkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk -->

  <div class="tab-pane fade" id="custom-tabs-two-six" role="tabpanel" aria-labelledby="custom-tabs-two-six-tab">
                        <div class="bethapa-table-header">
                      COMPANY PRODUCTS <button  type="button" class="add-newm" @click="newBettingproduct" >Add New </button>
                      <!-- v-if="allowedtoaddsubmenuaccess > 0" -->
                     </div>
        
                    
                    
           <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                   
                      <th > # </th>
                      <th > NAME </th>
                      <th > DESCRIPTION </th>
                      <th >  </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>

                                       <tr v-for="allmacs in companyproductsdatarecords.data" :key="allmacs.id">
                      
                 
                  
                
                      
                         
                                <td>{{allmacs.id}}</td>
                                 
 
                                <td>{{allmacs.productname}}</td>
                             
                                <td>{{allmacs.description}}</td>
                

                                
                               
                           
                                 <td> 
                                  
                           

                       


                             
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
<div class="modal fade" id="addnewbettingproduct">
        <div class="modal-dialog modal-dialog-top modal-lg">
        <div  class="modal-content">
            <div  class="modal-header">
                <h4  v-show="!editmode"    class="modal-title">Add New Product</h4> 
                <h4  v-show="editmode" class="modal-title" >UPDATE RECORD</h4> 
                <button  type="button" data-dismiss="modal" aria-label="Close" class="close"><span  aria-hidden="true">×</span></button></div> 
                 <form class="form-horizontal" @submit.prevent="editmode ? updateUser():createNewbettingproduct()"> 

                    <div  class="modal-body">
              
              
                 
                 <div class="form-group row">

                            <label class="col-sm-2 col-form-label">Machine Name </label>
                              <div class="col-sm-6">
                             <input v-model="form.productname" type="text" name="productname"
                    class="form-control" :class="{ 'is-invalid': form.errors.has('productname') }">
                    <has-error :form="form" field="productname"></has-error>


                              </div>

                        </div>
                
                      
               
                    
          

                           <div class="form-group row">

                            <label class="col-sm-2 col-form-label">Description </label>
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


                    <div class="tab-pane fade" id="custom-tabs-two-seven" role="tabpanel" aria-labelledby="custom-tabs-two-seven-tab">
                       
                   <form @submit.prevent="Savebranchtoproduct()">
                  
                  
                    <div class="form-group">
                  <label>Select a Branch</label>
                    <select name ="mycpmponentto" v-model="form.mycpmponentto" id ="mycpmponentto" v-on:change="myClickEventroletoaddcomponent"  :class="{'is-invalid': form.errors.has('mycpmponentto')}">
                    <option value=" ">  </option>
                    <option v-for='data in brancheslist' v-bind:value='data.id'>{{ data.id }} - {{ data.branchname }}</option>

                    </select>
                       <input type="text" name="inone" value="roletoaddcomponent" hidden
                    class="form-control">

                                <has-error :form="form" field="mycpmponentto"></has-error>

                             
                             

                                
                                </div>
                                  <button type="submit" id="submit" hidden="hidden" name= "submit" ref="myBtnroledd" class="btn btn-primary btn-sm">Saveit</button>
                                </form>

              <div class="bethapa-table-header">
                   
       
                      BRANCH PRODUCTS  <button type="button" class="add-newm" @click="newbranchproduct" >Add New </button>
                     </div>
<!--  v-if="allowedtogivecomponentaccess > 0" -->

          <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                   
                      <th > # </th>
                      <th >  </th>
                       <th > BRANCH </th>
                      <th > PRODUCT </th>
                     <th > STARTED </th>
                     <th >  </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>

                                       <tr v-for="allcomponentsdata in allowedbranchproductsdatarecords.data" :key="allcomponentsdata.id">
                      
                 
                  
                
                      
                         
                                <td>{{allcomponentsdata.id}}</td>
                                 <td>
                                   
                                 </td>
 
                             
                                  <td> <template v-if="allcomponentsdata.branch_namebettingproducts">	{{allcomponentsdata.branch_namebettingproducts.branchname}}</template></td>

                                  <td> <template v-if="allcomponentsdata.branch_productname">	{{allcomponentsdata.branch_productname.productname}}</template></td>

                               
                                 <td>{{allcomponentsdata.created_at | myDate }}</td>  
                                 <td> 
                                  
                           <!-- v-if="allowedtorevokecomponentaccess > 0" -->

                            <button type="button"  class="btn  bg-gradient-danger btn-xs fas fa-trash-alt" @click="revokebranchproduct(allcomponentsdata.id)"> Revoke </button>




                             
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
<div class="modal fade" id="addnewbranchproductmodal">
        <div class="modal-dialog modal-dialog-top modal-lg">
        <div  class="modal-content">
            <div  class="modal-header">
                <h4  v-show="!editmode"    class="modal-title">Add New branch Product</h4> 
                <h4  v-show="editmode" class="modal-title" >UPDATE RECORD</h4> 
                <button  type="button" data-dismiss="modal" aria-label="Close" class="close"><span  aria-hidden="true">×</span></button></div> 
                 <form class="form-horizontal" @submit.prevent="editmode ? updateUser():createnewBranchproduc()"> 

                    <div  class="modal-body">
              
              
                 
                   <div class="form-group row">

                            <label class="col-sm-2 col-form-label">Branch </label>
                              <div class="col-sm-6">
                            <select name ="branch" class='form-control'  v-model="form.branch">

                              <option value="">  </option>

                              <option v-for='data in brancheslist' :value='data.id'>{{ data.branchname }}</option>

                            </select>
                            
                               <has-error :form="form" field="branch"></has-error>
                              </div>
                 
                        </div>

                    
          

                           <div class="form-group row">

                            <label class="col-sm-2 col-form-label">Product </label>
                              <div class="col-sm-6">
                           <select name ="product" v-model="form.product" id ="product"  class="form-control" :class="{'is-invalid': form.errors.has('product')}">
                    <option value=" ">  </option>
                    <option v-for='data in bettingproductslist' v-bind:value='data.id'>{{ data.productname }}</option>

                    </select>
                   

                                <has-error :form="form" field="product"></has-error>

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
<!-- 9999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999 -->
  <div class="tab-pane fade" id="custom-tabs-two-eight" role="tabpanel" aria-labelledby="custom-tabs-two-eight-tab">
                   <form @submit.prevent="Savebranchtoproduct()">
                  
                  
                    <div class="form-group">
                  <label>Select a Branch</label>
                    <select name ="mycpmponentto" v-model="form.mycpmponentto" id ="mycpmponentto" v-on:change="myClickEventroletoaddcomponent"  :class="{'is-invalid': form.errors.has('mycpmponentto')}">
                    <option value=" ">  </option>
                    <option v-for='data in brancheslist' v-bind:value='data.id'>{{ data.id }} - {{ data.branchname }}</option>

                    </select>
                       <input type="text" name="inone" value="roletoaddcomponent" hidden
                    class="form-control">

                                <has-error :form="form" field="mycpmponentto"></has-error>

                             
                             

                                
                                </div>
                                  <button type="submit" id="submit" hidden="hidden" name= "submit" ref="myBtnroledd" class="btn btn-primary btn-sm">Saveit</button>
                                </form>

              <div class="bethapa-table-header">
                   
       
                      BRANCH MACHINES  <button type="button" class="add-newm" @click="newbranchmachine" >Add New </button>
                     </div>
<!--  v-if="allowedtogivecomponentaccess > 0" -->

               <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                   
                      <th > # </th>
                      <th >  </th>
                       <th > BRANCH </th>
                      <th > MACHINE </th>
                     <th > STARTED </th>
                     <th >  </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>

                                       <tr v-for="allbrmac in allowedbranchmachinesdatarecords.data" :key="allbrmac.id">
                      
                 
                  
                
                      
                         
                                <td>{{allbrmac.id}}</td>
                                 <td>
                                   
                                 </td>
 
                             
                                  <td> <template v-if="allbrmac.branchname_branchmachines">	{{allbrmac.branchname_branchmachines.branchname}}</template></td>

                                  <td> <template v-if="allbrmac.machinename_branchmachines">	{{allbrmac.machinename_branchmachines.machinename}}</template></td>

                               
                                 <td>{{allbrmac.created_at | myDate }}</td>  
                                 <td> 
                                  
                           <!-- v-if="allowedtorevokecomponentaccess > 0" -->

                            <button type="button"  class="btn  bg-gradient-danger btn-xs fas fa-trash-alt" @click="revokebranchproduct(allbrmac.id)"> Revoke </button>




                             
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
<div class="modal fade" id="addnewbranchmachine">
        <div class="modal-dialog modal-dialog-top modal-lg">
        <div  class="modal-content">
            <div  class="modal-header">
                <h4  v-show="!editmode"    class="modal-title">Add New Branch Machine</h4> 
                <h4  v-show="editmode" class="modal-title" >UPDATE RECORD</h4> 
                <button  type="button" data-dismiss="modal" aria-label="Close" class="close"><span  aria-hidden="true">×</span></button></div> 
                 <form class="form-horizontal" @submit.prevent="editmode ? updateUser():createnewBranchmachine()"> 

                    <div  class="modal-body">
              
              
                 
                   <div class="form-group row">

                            <label class="col-sm-2 col-form-label">Branch </label>
                              <div class="col-sm-6">
                            <select name ="branch" class='form-control'  v-model="form.branch">

                              <option value="">  </option>

                              <option v-for='data in brancheslist' :value='data.id'>{{ data.branchname }}</option>

                            </select>
                            
                               <has-error :form="form" field="branch"></has-error>
                              </div>
                 
                        </div>

                    
          

                           <div class="form-group row">

                            <label class="col-sm-2 col-form-label">Machine </label>
                              <div class="col-sm-6">
                           <select name ="product" v-model="form.product" id ="product"  class="form-control" :class="{'is-invalid': form.errors.has('product')}">
                    <option value=" ">  </option>
                    <option v-for='data in branchmachineslist' v-bind:value='data.id'>{{ data.machinename }}</option>

                    </select>
                   

                                <has-error :form="form" field="product"></has-error>

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



 <div class="tab-pane fade" id="custom-tabs-two-nine" role="tabpanel" aria-labelledby="custom-tabs-two-nine-tab">
                   <form @submit.prevent="Savebranchanduser()">
                  
                  
                    <div class="form-group">
                  <label>Select a User</label>
                    <select name ="mycpmponentto" v-model="form.mycpmponentto" id ="mycpmponentto" v-on:change="myClickEventusertoaddbranch"  :class="{'is-invalid': form.errors.has('mycpmponentto')}">
                    <option value=" ">  </option>
                    <option v-for='data in userslist' v-bind:value='data.id'>{{ data.id }} - {{ data.name }}</option>

                    </select>
                       <input type="text" name="inone" value="roletoaddcomponent" hidden
                    class="form-control">

                                <has-error :form="form" field="mycpmponentto"></has-error>

                             
                             

                                
                                </div>
                                  <button type="submit" id="submit" hidden="hidden" name= "submit" ref="myBtnroledd122" class="btn btn-primary btn-sm">Saveit</button>
                                </form>

              <div class="bethapa-table-header">
                   
       
                      BRANCH AND USERS  <button type="button" class="add-newm" @click="addmoreUserstobranch" >Add New </button>
                     </div>
<!--  v-if="allowedtogivecomponentaccess > 0" -->

          <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                   
                      <th > # </th>
                      <th >  </th>
                      <th > USER  </th>
                      <th > BRANCH ANME </th>
                   
                     <th >  </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>

                                       <tr v-for="branchnusere in allowedbranchanduserdatarecords.data" :key="branchnusere.id">
                      
                 
                  
                
                      
                         
                                <td>{{branchnusere.id}}</td>
                               
                             
                                  <td> <template v-if="branchnusere.branchand_username">	{{branchnusere.branchand_username.name}}</template></td>

                                  <td> <template v-if="branchnusere.branchanduser_branchname">	{{branchnusere.branchanduser_branchname.branchname}}</template></td>

                               
                                 <!-- <td>{{allbrmac.created_at | myDate }}</td>   -->
                                 <td> 
                                  
                           <!-- v-if="allowedtorevokecomponentaccess > 0" -->

                            <button type="button"  class="btn  bg-gradient-danger btn-xs fas fa-trash-alt" @click="revokebranchanduser(branchnusere.id)"> Revoke </button>




                             
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
<div class="modal fade" id="addusertobranch">
        <div class="modal-dialog modal-dialog-top modal-lg">
        <div  class="modal-content">
            <div  class="modal-header">
                <h4  v-show="!editmode"    class="modal-title">Add User to a Branch</h4> 
                <h4  v-show="editmode" class="modal-title" >UPDATE RECORD</h4> 
                <button  type="button" data-dismiss="modal" aria-label="Close" class="close"><span  aria-hidden="true">×</span></button></div> 
                 <form class="form-horizontal" @submit.prevent="editmode ? updateUser():createnewbranchanduser()"> 

                    <div  class="modal-body">
              
              
                 
                   <div class="form-group row">

                            <label class="col-sm-2 col-form-label">User </label>
                              <div class="col-sm-6">
                            <select name ="branch" class='form-control'  v-model="form.branch">

                              <option value="">  </option>

                              <option v-for='data in userslist' :value='data.id'>{{ data.name }}</option>

                            </select>
                            
                               <has-error :form="form" field="branch"></has-error>
                              </div>
                 
                        </div>

                    
          

                           <div class="form-group row">

                            <label class="col-sm-2 col-form-label">Branch </label>
                              <div class="col-sm-6">
                           <select name ="product" v-model="form.product" id ="product"  class="form-control" :class="{'is-invalid': form.errors.has('product')}">
                    <option value=" ">  </option>
                    <option v-for='data in brancheslist' v-bind:value='data.id'>{{ data.branchname }}</option>

                    </select>
                   

                                <has-error :form="form" field="product"></has-error>

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
                          <!-- klkkkkkkkkkkkkkkk -->
                  </div>
  <!-- klkkkkkkkkkkkkkkk -->



                </div>
              </div>
              <!-- /.card -->
            </div>
          </div>