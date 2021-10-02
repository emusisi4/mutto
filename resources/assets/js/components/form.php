   <form class="form-horizontal" @submit.prevent="editmode ? updateProductdetails():createProductdetails()"> 

  <div class ="bethapa-table-sectionheader">Product Details</div>    
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Product Name</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                  <input v-model="form.productname" type="text" name="productname"
                      class="form-control" :class="{ 'is-invalid': form.errors.has('productname') }">
                    <has-error :form="form" field="productname"></has-error>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                  <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Description</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                   <textarea v-model="form.description" type="text" name="description"
                      class="form-control no-resize" :class="{ 'is-invalid': form.errors.has('description') }"></textarea>
                    <has-error :form="form" field="description"></has-error>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Category</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                     <select name ="category" v-model="form.category" id ="category" class="form-control-sm show-tick" data-live-search="true"  :class="{'is-invalid': form.errors.has('category')}">
                    <option value="">   </option>
                    <option v-for='data in productcategorieslist' v-bind:value='data.id'>{{ data.catname }}</option>

                    </select>
                    <has-error :form="form" field="category"></has-error>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                   <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Brand</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                     <select name ="brand" v-model="form.brand" id ="brand" class="form-control-sm show-tick" data-live-search="true"  :class="{'is-invalid': form.errors.has('brand')}">
                    <option value="">   </option>
                    <option v-for='data in productbrandslist' v-bind:value='data.id'>{{ data.brandname }}</option>

                    </select>
                    <has-error :form="form" field="category"></has-error>
                                            </div>
                                        </div>
                                    </div>
                                </div>





   <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Unit of Measure</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                     <select name ="unitmeasure" v-model="form.unitmeasure" id ="unitmeasure" class="form-control-sm show-tick" data-live-search="true"  :class="{'is-invalid': form.errors.has('unitmeasure')}">
                    <option value="">   </option>
                    <option v-for='data in unitmeasurelist' v-bind:value='data.id'>{{ data.unitname }}</option>

                    </select>
                    <has-error :form="form" field="category"></has-error>
                                            </div>
                                        </div>
                                    </div>
                                </div>
 <div class ="bethapa-table-sectionheader">Stock Settings</div> 
  <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Re-Stock Qty</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                  <input v-model="form.rol" type="number" name="rol"
                      class="form-control" :class="{ 'is-invalid': form.errors.has('rol') }">
                    <has-error :form="form" field="rol"></has-error>
                                            </div>
                                        </div>
                                    </div>
                                </div>

 <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Quantity Available</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                  <input v-model="form.qty" type="number" name="rol"
                      class="form-control" :class="{ 'is-invalid': form.errors.has('rol') }">
                    <has-error :form="form" field="rol"></has-error>
                                            </div>
                                        </div>
                                    </div>
                                </div>


  <div class ="bethapa-table-sectionheader">Price Settings</div>    

 <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Unit Cost Price</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                  <input v-model="form.unitcost" type="number" name="unitcost"
                      class="form-control" :class="{ 'is-invalid': form.errors.has('unitcost') }">
                    <has-error :form="form" field="unitcost"></has-error>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Unit Selling Price</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                  <input v-model="form.unitprice" type="number" name="unitprice"
                      class="form-control" :class="{ 'is-invalid': form.errors.has('unitprice') }">
                    <has-error :form="form" field="unitprice"></has-error>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                
   
                              


                  <div  class="modal-footer">
                    <button  v-show="!editmode" type="submit" class="btn btn-primary btn-sm">Create</button> 
                      <button v-show="editmode" type="submit" class="btn btn-success btn-sm" >Update</button>
                        <button  type="button" data-dismiss="modal" class="btn btn-danger btn-sm">Close</button >
                        </div>
                 </form>