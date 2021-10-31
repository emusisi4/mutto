<style scoped>
.hhn {
  position: absolute;
  right: 0px;
  width: 300px;
  border: 3px solid #73AD21;
  padding: 10px;
}
.invoice {
    background: #fff;
    padding: 20px;
    width: 1000px;

}
.musisireporttable-table td, th {
    border: 0.5px solid #c5c5c5;
    padding-left: 18px;
    text-align: left;
    font-size: 20px;
    /* background: #a99696; */
    color: black;
        vertical-align: bottom;
    border-bottom: 2px solid #dee2e6;
        padding: -0.25rem;
 
    /* border-top: 1px solid #822119 */
}
.musisialign{
     text-align: center;

}
.musisialignright{
     text-align: right;
         padding-right: 10px;

}
.musisialignleft{
     text-align: left;

}


    .table thead tr th {
    padding: 10px;
    border-bottom: 1px solid #eee;
    text-align: left;
    background-color: #ea5b319e;
    font-size: 20px;
    color: #030328;
}
.invoice-company {
    font-size: 20px
}

.invoice-header {
    margin: 0 -20px;
    background: #f0f3f4;
    padding: 20px
}

.invoice-date,
.invoice-from,
.invoice-to {
    display: table-cell;
    width: 1%
}

.invoice-from,
.invoice-to {
    padding-right: 20px
}

.invoice-date .date,
.invoice-from strong,
.invoice-to strong {
    font-size: 16px;
    font-weight: 600
}

.invoice-date {
    text-align: right;
    padding-left: 20px
}

.invoice-price {
    background: #f0f3f4;
    display: table;
    width: 100%
}

.invoice-price .invoice-price-left,
.invoice-price .invoice-price-right {
    display: table-cell;
    padding: 20px;
    font-size: 20px;
    font-weight: 600;
    width: 75%;
    position: relative;
    vertical-align: middle
}

.invoice-price .invoice-price-left .sub-price {
    display: table-cell;
    vertical-align: middle;
    padding: 0 20px
}

.invoice-price small {
    font-size: 12px;
    font-weight: 400;
    display: block
}

.invoice-price .invoice-price-row {
    display: table;
    float: left
}

.invoice-price .invoice-price-right {
    width: 25%;
    background: #2d353c;
    color: #fff;
    font-size: 28px;
    text-align: right;
    vertical-align: bottom;
    font-weight: 300
}

.invoice-price .invoice-price-right small {
    display: block;
    opacity: .6;
    position: absolute;
    top: 10px;
    left: 10px;
    font-size: 12px
}

.invoice-footer {
    border-top: 1px solid #ddd;
    padding-top: 10px;
    font-size: 10px
}

.invoice-note {
    color: #999;
    margin-top: 80px;
    font-size: 85%
}

.invoice>div:not(.invoice-footer) {
    margin-bottom: 20px;
        width: 844px;
}

.btn.btn-white, .btn.btn-white.disabled, .btn.btn-white.disabled:focus, .btn.btn-white.disabled:hover, .btn.btn-white[disabled], .btn.btn-white[disabled]:focus, .btn.btn-white[disabled]:hover {
    color: #2d353c;
    background: #fff;
    border-color: #d9dfe3;
}


.tresed {
   border:none;
border-top:2px dotted black;

border-top:2px dotted black;



}

.tabletextalign{
    text-align: center;
}
.book-title {
  color: black;
  display: block;
  text-align: center;
background-color: white;
border-top:2px dotted black;

}
.text-offset {
  color: black;
  font-size: 16px;
  background-color: white;
      font-weight: bold;
      border-top:1px dotted black;
}
.item-stock,
.item-qty {
  text-align: center;
     border-top:2px dotted black;
background-color: white;

}
.item-price {

color: black;
display: block;
text-align: right;
background-color: white;
/* font-weight: bold; */
   border-top:2px dotted black;
}
.item-multiple {
  display: block;
}
tfoot {
  text-align: right;
  color: black;
  background-color: white;
  border-top:2px dotted black;

border-top:2px dotted black;

}
tfoot tr:last-child {
  background: #f0f0f2;
  color: black;
  font-weight: bold;
  border-top:2px dotted black;

border-top:2px dotted black;
}
tfoot tr:last-child td:first-child {
  border-top-left-radius: 5px;
  border-top:2px dotted black;

border-top:2px dotted black;
}
tfoot tr:last-child td:last-child {
  border-top-right-radius: 5px;
  border-top:2px dotted black;

border-top:2px dotted black;
}
#musisi {
  margin-top: 50px;
}

pre {
  margin-top: 20px;
}
</style>

<template>

    <div>




<!-- general component access -->
<div v-if="generalProductscomponentAccess > 0 " > 


        <!-- Start of the -->



            <div class="row clearfix">
<!-- <div  class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-indigo">
                        <div class="icon">
                            <i class="material-icons"></i>
                        </div>
                        <div class="content">
                            <div class="text"><b>GROSS SALES  </b></div>
                            <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20">
                              <b>{{currencydetails}}  {{formatPrice(salesdetailsgrossprofittotalrange)}}</b></div>
                        </div>
                    </div>
                </div> -->
             
 <!-- <div  class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-indigo">
                        <div class="icon">
                            <i class="material-icons"></i>
                        </div>
                        <div class="content">
                            <div class="text"><b>TAX COLLECTED (VAT INPUT)  </b></div>
                            <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20">
                              <b>{{currencydetails}}  {{formatPrice(dailyvatcollectedforselection)}}</b></div>
                        </div>
                    </div>
                </div> -->

               <!-- <div  class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-indigo">
                        <div class="icon">
                            <i class="material-icons"></i>
                        </div>
                        <div class="content">
                            <div class="text"><b>NET SALES (AFTER VAT)  </b></div>
                            <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20">
                              <b>{{currencydetails}}  {{formatPrice(dailytotalsalesforselection - dailyvatcollectedforselection)}}</b></div>
                        </div>
                    </div>
                </div> -->

       <!-- <div v-if="outputcomponentaccess > 0 " class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-indigo">
                        <div class="icon">
                            <i class="material-icons"></i>
                        </div>
                        <div class="content">
                            <div class="text"><b>OUTPUT VAT (On Sales) </b></div>
                            <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20"
                            >   <b>{{currencydetails}}  {{formatPrice(outputvatamount) }}</b></div>
                        </div>
                    </div>
                </div> -->

                <!-- <div v-if="netvatvatcomponentcomponentaccess > 0" class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-indigo">
                        <div class="icon">
                            <i class="material-icons"></i>
                        </div>
                        <div class="content">
                            <div class="text"><b>NET VAT </b></div>
                            <div class="number count-to" data-from="0" data-to="257" data-speed="1000"
                             data-fresh-interval="20"><b>{{currencydetails}}</b></div>
                        </div>
                    </div>
                </div> -->
</div>
  
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                        CUSTOMER STATEMENTS
                            </h2>
                            
                        </div>
                        <div class="body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                               
                                <li role="presentation" class="active" >
                                    <a href="#home_with_icon_title" @click="loadContactdetailscustomers()" data-toggle="tab">
                                        <i class="material-icons"></i> Contact details
                                    </a>
                                </li>
                               
                              





                                <!-- v-if="brandsComponentaccess > 0" -->
                                <li role="presentation">
                                    <a href="#profile_with_icon_title"  @click="loadDailysalesreportdetails()" data-toggle="tab">
                                        <i class="material-icons"></i> Statement Transactions
                                    </a>
                                </li>
                                <!-- v-if="unitsofmeasureComponentaccess > 0" -->
                                <!-- <li role="presentation">
                                    <a href="#messages_with_icon_title"  @click="loadSalesdetailsreportdetailed()" data-toggle="tab">
                                        <i class="material-icons"></i> Sales Report Details
                                    </a>
                                </li> -->
                                <!-- <li role="presentation">
                                    <a href="#settings_with_icon_title" v-if="companyproductsComponentaccess > 0" @click="laodProductdetails()" data-toggle="tab">
                                        <i class="material-icons"></i> ITEMS / PRODUCTS
                                    </a>
                                </li> -->

                                    <!-- <li role="presentation">
                                    <a href="#one_with_icon_title" v-if="purchasesComponentaccess > 0" @click="loadPurchaseInvoicessummary()" data-toggle="tab">
                                        <i class="material-icons"></i> PURCHASES
                                    </a>
                                </li> -->
                                    
                                    <!-- <li role="presentation">
                                    <a href="#two_with_icon_title" v-if="purchaserecordsComponentaccess > 0" @click="loadPurchaserecords()" data-toggle="tab">
                                        <i class="material-icons"></i> PURCHASES RECORDS
                                    </a>
                                </li>
                                 <li role="presentation">
                                    <a href="#two_with_icon_title" v-if="salessummaryComponentaccess > 0" @click="loadsalesSummary()" data-toggle="tab">
                                        <i class="material-icons"></i> SALES RECEIPTS
                                    </a>
                                </li> -->
                                 
                                 <!-- <li role="presentation">
                                    <a href="#three_with_icon_title" v-if="salesdetailsComponentaccess > 0" @click="loadactiveProductsonSale()" data-toggle="tab">
                                        <i class="material-icons"></i> PRODUCT SALES DETAILS
                                    </a>
                                </li> -->

                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
<div role="tabpanel" class="tab-pane fade in active" id="home_with_icon_title"  v-if="categoriesComponentaccess > 0">
                                         
                    
              


 <div class="bethapa-reports-header"  >
   
List of Ledger Accounts
</div>

<!-- <div class="mysalessect">  -->
    <!-- <div> 

      
           <div class="mysalessect"> 
                <form @submit.prevent="savecustomerstatementFilter()">
                 
                      <div class="form-group">
       
                                        <label>Start Date</label>
  <input v-model="form.startdate" type="date" name="startdate" id="startdate" v-on:change="tosubmitProductdetailfilter" >

      <label>End Date</label>
  <input v-model="form.enddate" type="date" name="enddate" id="enddate" v-on:change="tosubmitProductdetailfilter" > 
<label><b>Customer : </b></label>
                    <select style="min-width:300px;" name ="customername" v-model="form.customername" id ="customername"  data-live-search="true"  v-on:change="tosubmitProductdetailfilter"  :class="{'is-invalid': form.errors.has('customername')}">
                    <option>   </option>
                    <option v-for='data in customerslist' v-bind:value='data.id'>{{ data.customername }}</option>

                    </select>
                                <has-error :form="form" field="customername"></has-error>         
                              
             <button type="submit" style="display:none" id="submit" hidden="hidden" name= "submit" ref="buttontosubmitProductdetailFilter" class="btn btn-primary btn-sm">Saveit</button>         

                                
            
       
                   
          </div>
   

                </form>
 
           </div>
        
               
</div>
      -->

                   <table  class="musisireporttable" width="100%" border="1">

<tr>
       <th>#</th>
                      <th>Ledger Name</th>
                         <!-- <th>Account Balance </th> -->
                           <th>Debit Balance </th>
                             <th>Credit Balance </th>
                               <th>Ledger Type </th>
                     
                        
                     
                        
                        <th ></th>
</tr>
<tr>
  




                      
  
          <tr v-for="prodcates in customerdetailsrecords.data" :key="prodcates.id">
          
       <td>{{prodcates.id }}</td>
      <td>{{prodcates.customername  }}</td>
       <!-- <td class="musisialignright">{{formatPrice(prodcates.bal)}}</td> -->
       <td class="musisialignright">
         <div v-if="(prodcates.customertype == '1' && prodcates.bal >= 0)"> {{formatPrice(prodcates.bal)}} </div>
       <div v-if="(prodcates.customertype == '1' && prodcates.bal < 0)"> 0 </div>


  <div v-if="(prodcates.customertype == '2' && prodcates.bal >= 0)"> 0 </div>
       <div v-if="(prodcates.customertype == '2' && prodcates.bal < 0)"> {{formatPrice((prodcates.bal)*-1)}}  </div>

       </td>
         <td class="musisialignright">
            <div v-if="(prodcates.customertype == '1' && prodcates.bal < 0)"> {{formatPrice((prodcates.bal)*-1)}} </div>
             <div v-if="(prodcates.customertype == '1' && prodcates.bal >= 0)"> 0 </div>



              <div v-if="(prodcates.customertype == '2' && prodcates.bal >= 0)">  {{formatPrice((prodcates.bal))}} </div>
       <div v-if="(prodcates.customertype == '2' && prodcates.bal < 0)"> 0  </div>
            </td>
 
     
   <td><div style="color:green" v-if="prodcates.customertype == '1'"> Customer </div>
   <div style="color:maroon" v-if="prodcates.customertype == '2'"> Supplier </div> </td>
 
      

                               <td>
                            <div  class="musisialign">
       <button type="button"   class="btn btn-success btn-xs waves-effect"  @click="recievecustomerpayment(prodcates)">Recieve Payment</button>
      
      <button type="button"   class="btn bg-primary btn-xs waves-effect"  @click="viewcustomerstatement(prodcates)">View Statement</button>  
       <button type="button"   class="btn bg-brown btn-xs waves-effect"  @click="editProductdetails(prodcates)">Customer Deposit</button>

              <!-- <button type="button"    class="btn  bg-gradient-danger btn-xs fas fa-trash-alt" @click="deleteexpensecategory(prodcates.id)"> DEl </button> -->
 </div>
</td>
  
                  
                    
                                     

                           
                                
                                
                                
                               
                            
                                 <!-- <td style="background-color:#eeeeee "><div class="musisialign"> {{formatPrice(prodcates.netinvoiceincome)}} </div></td>
                                 -->
     
</tr>
<tr>



    </tr>
</table>



             
    <!-- <div class="card-footer">
                <ul class="pagination pagination-sm m-0 float-right">
                   <pagination :data="salesreportsummaryrecords" @pagination-change-page="paginationResultsProductcategories"></pagination>
                </ul>
    </div> -->
          
 



<div class="modal fade" id="customerpaymentModal">
   
         <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3  v-show="!editmode"    class="modal-title"><img src="images/logo.png" class="profile-user-img img-fluid img-circle" style="height: 80px; width: 80px;">New Product Registration</h3> 
                <h4  v-show="editmode" class="modal-title" ><img src="images/logo.png" class="profile-user-img img-fluid img-circle" 
                style="height: 80px; width: 80px;">Customer Cash receipt </h4> 
                        </div>
                  <form class="form-horizontal" @submit.prevent="editmode ? recieveCustomercash():recieveCustomercash()"> 

 
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Customer Name :</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                  <input v-model="form.customername" type="text" name="customername" readonly
                      class="form-control" :class="{ 'is-invalid': form.errors.has('customername') }">


                      
                    <has-error :form="form" field="customername"></has-error>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                    <input v-model="form.id" style="display:none" type="text" name="id" readonly>

                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Current Balance : </label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                 <input v-model="form.bal" readonly type="number" name="bal"
                      class="form-control" :class="{ 'is-invalid': form.errors.has('bal') }">
                    <has-error :form="form" field="bal"></has-error>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                


  <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Date of Payment :</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                         <has-error :form="form" field="dop"></has-error>
                                                  <input v-model="form.dop" type="date" name="dop"
                      class="form-control" :class="{ 'is-invalid': form.errors.has('dop') }">
                   
                                            </div>
                                        </div>
                                    </div>
                                </div>

 <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Amount Paid : </label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                     <has-error :form="form" field="amountpaid"></has-error>
                                                  <input v-model="form.amountpaid" type="number" name="amountpaid"
                      class="form-control" :class="{ 'is-invalid': form.errors.has('amountpaid') }">
                   
                                            </div>
                                        </div>
                                    </div>
                                </div>

 <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Recieving Account: </label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                              <has-error :form="form" field="recievingwallet"></has-error>
                                                <select name ="recievingwallet" v-model="form.recievingwallet" id ="recievingwallet" v-on:click="loadDatarecords()" class="form-control" :class="{'is-invalid': form.errors.has('expensecategory')}">
<option value="">  </option>
<option v-for='data in walletstorecievemoney' v-bind:value='data.id'>{{ data.walletname }}</option>

</select>
                    
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                 <div v-show="editmode" class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Mode of Payment : </label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                               <has-error :form="form" field="mop"></has-error>
              <select name ="mop" v-model="form.mop" id ="mop" class="form-control"  :class="{'is-invalid': form.errors.has('mop')}">
                    
                    <option></option>
                      <option value="1"> Cash</option>
                        <option value="2"> Mobile Money</option>
                         <option value="3"> Bank</option>


                    </select>
                   
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                 <div v-show="editmode" class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Narration :</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
             <textarea v-model="form.narration" type="text" name="narration"
                      class="form-control no-resize" :class="{ 'is-invalid': form.errors.has('narration') }"></textarea>
                    <has-error :form="form" field="narration"></has-error>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                

                             
   
                              
<br>

                  <div  class="modal-footer">
                    <button  v-show="!editmode" type="submit" class="btn btn-primary btn-sm">Create</button> 
                      <button v-show="editmode" type="submit" class="btn btn-success btn-sm" >Update</button>
                        <button  type="button" data-dismiss="modal" class="btn btn-danger btn-sm">Close</button >
                        </div>
                 </form>
                       </div>
                          </div>
                </div>


<div class="modal fade" id="customerstatementModal">
   
         <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3  v-show="!editmode"    class="modal-title"><img src="images/logo.png"
                             class="profile-user-img img-fluid img-circle" style="height: 80px; width: 80px;">New Product Registration</h3> 
                <h4  v-show="editmode" class="modal-title" ><img src="images/logo.png" class="profile-user-img img-fluid img-circle" 
                style="height: 80px; width: 80px;">Customer Statement </h4> 
                        </div>
                
                      
 <div class="bethapa-reports-header"  >
   
Customer Statement Report  : From  {{salesreportsatartingdate}} to {{salesreportendingdate}}
</div>

<!-- <div class="mysalessect">  -->
    <div> 

      
           <div class="mysalessect"> 
                <form @submit.prevent="savecustomerstatementFilter()">
                 
                      <div class="form-group">
       
                                        <label>Start Date</label>
  <input v-model="form.startdate" type="date" name="startdate" id="startdate" v-on:change="tosubmitProductdetailfilter" >

      <label>End Date</label>
  <input v-model="form.enddate" type="date" name="enddate" id="enddate" v-on:change="tosubmitProductdetailfilter" > 
<label><b>Customer : </b></label>
                    <select style="min-width:300px;" name ="customername" v-model="form.customername" id ="customername"  data-live-search="true"  v-on:change="tosubmitProductdetailfilter"  :class="{'is-invalid': form.errors.has('customername')}">
                    <option>   </option>
                    <option v-for='data in customerslist' v-bind:value='data.id'>{{ data.customername }}</option>

                    </select>
                                <has-error :form="form" field="customername"></has-error>         
                              
             <button type="submit" style="display:none" id="submit" hidden="hidden" name= "submit" ref="buttontosubmitProductdetailFilter" class="btn btn-primary btn-sm">Saveit</button>         

                                
            
       
                   
          </div>
   

                </form>
 
           </div>
        
               
</div>

<div class="mysalessect2"> 
  Client Id : <p>
    Client Name: 
    </p>

</div>
     
<div class="hh">
<table  class="musisireporttable" width="100%" border="1">

      <tr>
           

              <th colspan="1"  style="font-size: 18px; text-align:left;   
                border-bottom: 4px solid rgb(124 102 102); 
                  background-color: rgb(29 31 34 / 37%); color: #131378;"> Date</th>
          
          
          
                  
        
              <th colspan="1"  style="font-size: 18px; text-align:left;   
                border-bottom: 4px solid rgb(124 102 102); 
                  background-color: rgb(29 31 34 / 37%); color: #131378;"> Transaction </th>
          
              
           
              <th colspan="1"  style="font-size: 18px; text-align:left;   
                border-bottom: 4px solid rgb(124 102 102); 
                  background-color: rgb(29 31 34 / 37%); color: #131378;"> Debit</th>


              <th colspan="1"  style="font-size: 18px; text-align:left;   
                border-bottom: 4px solid rgb(124 102 102); 
                  background-color: rgb(29 31 34 / 37%); color: #131378;"> Credit</th>

                <th colspan="1"  style="font-size: 18px; text-align:left;   
                border-bottom: 4px solid rgb(124 102 102); 
                  background-color: rgb(29 31 34 / 37%); color: #131378;"> Running Balance</th>


              <th colspan="1"  style="font-size: 18px; text-align:left;   
                border-bottom: 4px solid rgb(124 102 102); 
                  background-color: rgb(29 31 34 / 37%); color: #131378;"> </th>



        </tr>
  <!-- <tr>
             <th></th>
             <th></th>
             <th></th>
             <th></th>
             <th></th>
             <th></th>
             <th>Openning Amount ({{currencydetails}})</th>
             <th>Credit Amount ({{currencydetails}})</th>
                <th>Debit Amount ({{currencydetails}})</th>
                 <th>BALANCE ({{currencydetails}})</th>
                   <th></th>
  </tr> -->
<tr>
          <tr v-for="prodcates in customerstatementrecords.data" :key="prodcates.id">
              <!-- <td>{{prodcates.id }}</td> -->
                                 <td>{{prodcates.transactiondate  }}</td>
            <!-- <td>{{prodcates.customername }}</td> -->
                     <!-- <td>  <template v-if="prodcates.customer_name">	{{prodcates.customer_name.customername}}</template></td>  
                             -->
 
                    <!-- <td>
                    <div style="color:maroon"  v-if="prodcates.transactiontype == 1"> Credit transaction </div>
                    <div style="color:green"  v-if="prodcates.transactiontype == 2"> Debit Transaction </div>
                    </td> -->
                    
                          <td><div>   {{(prodcates.description)}} </div></td>
                          
                            <td><div class="musisialignright">   {{formatPrice(prodcates.openningbal)}} </div></td>
   
                          <!-- <td><div class="musisialignright">   {{formatPrice(prodcates.amount)}} </div></td> -->
                         <td><div class="musisialignright">   {{formatPrice(prodcates.debitamount)}} </div></td>
 <td><div class="musisialignright"> {{formatPrice(prodcates.resultatantbalance)}} </div></td>

  <td>    <button type="button"   class="btn bg-primary btn-xs waves-effect"  @click="viewcustomerstatement(prodcates)">View</button>  </td> 

</tr>
  <tr>



<th style="font-size: 18px; text-align:center;    
               border-top: 4px solid rgb(124 102 102);    
                background-color: rgb(211 211 211); color: #131378;" >
<div class="musisialignright">  </div>
</th>






<th style="font-size: 18px; text-align:center;    
               border-top: 4px solid rgb(124 102 102);    
                background-color: rgb(211 211 211); color: #131378;" >
<div class="musisialignright"> 
     </div>
</th>

<th style="font-size: 18px; text-align:center;    
               border-top: 4px solid rgb(124 102 102);    
                background-color: rgb(211 211 211); color: #131378;" >
<div class="musisialignright">  </div>
</th>


<th style="font-size: 18px; text-align:center;    
               border-top: 4px solid rgb(124 102 102);    
                background-color: rgb(211 211 211); color: #131378;" >
                <!-- {{currencydetails}} {{formatPrice(totaldailygrossprofitrangereports)}} -->
<div class="musisialignright">  </div>
</th>



<th style="font-size: 18px; text-align:center;    
               border-top: 4px solid rgb(124 102 102);    
                background-color: rgb(211 211 211); color: #131378;" >
                <!--  {{currencydetails}} {{formatPrice(totaldailytotalvatrangereports)}} -->
<div class="musisialignright"> </div>
</th>
<th style="font-size: 18px; text-align:center;    
               border-top: 4px solid rgb(124 102 102);    
                background-color: rgb(211 211 211); color: #131378;" >
                <!-- {{currencydetails}} {{formatPrice(totaldailysaleswithouttaxgrossrangereports)}} -->
<div class="musisialignright">  </div>
</th>



</tr>
</table>
</div>

   
                              
<br>

                  <div  class="modal-footer">
                    <!-- <button  v-show="!editmode" type="submit" class="btn btn-primary btn-sm">Create</button> 
                      <button v-show="editmode" type="submit" class="btn btn-success btn-sm" >Update</button> -->
                        <button  type="button" data-dismiss="modal" class="btn btn-danger btn-sm">Close</button >
                        </div>
                
                       </div>
                          </div>
                </div>




                                </div>












                                <div role="tabpanel" class="tab-pane fade" id="profile_with_icon_title" v-if="brandsComponentaccess > 0">

              


 <div class="bethapa-reports-header"  >
   
Customer Statement Report  : From  {{salesreportsatartingdate}} to {{salesreportendingdate}}
</div>

<!-- <div class="mysalessect">  -->
    <div> 

      
           <div class="mysalessect"> 
                <form @submit.prevent="savecustomerstatementFilter()">
                 
                      <div class="form-group">
       
                                        <label>Start Date</label>
  <input v-model="form.startdate" type="date" name="startdate" id="startdate" v-on:change="tosubmitProductdetailfilter" >

      <label>End Date</label>
  <input v-model="form.enddate" type="date" name="enddate" id="enddate" v-on:change="tosubmitProductdetailfilter" > 
<label><b>Customer : </b></label>
                    <select style="min-width:300px;" name ="customername" v-model="form.customername" id ="customername"  data-live-search="true"  v-on:change="tosubmitProductdetailfilter"  :class="{'is-invalid': form.errors.has('customername')}">
                    <option>   </option>
                    <option v-for='data in customerslist' v-bind:value='data.id'>{{ data.customername }}</option>

                    </select>
                                <has-error :form="form" field="customername"></has-error>         
                              
             <button type="submit" style="display:none" id="submit" hidden="hidden" name= "submit" ref="buttontosubmitProductdetailFilter" class="btn btn-primary btn-sm">Saveit</button>         

                                
            
       
                   
          </div>
   

                </form>
 
           </div>
        
               
</div>
     

<table  class="musisireporttable" width="100%" border="1">

      <tr>
             <!-- <th colspan="1"  style="font-size: 18px;     border-bottom: 4px solid rgb(124 102 102);    
              background-color: rgb(29 31 34 / 37%); color: #131378;"> #</th> -->


              <th colspan="1"  style="font-size: 18px; text-align:center;   
                border-bottom: 4px solid rgb(124 102 102); 
                  background-color: rgb(29 31 34 / 37%); color: #131378;"> DATE</th>
             <!-- <th colspan="1"  style="font-size: 18px;     border-bottom: 4px solid rgb(124 102 102); 
                
              background-color: rgb(29 31 34 / 37%); color: #131378;"> CUSTOMER ID</th>
           
          
              <th colspan="1"  style="font-size: 18px; text-align:center;   
                border-bottom: 4px solid rgb(124 102 102); 
                  background-color: rgb(29 31 34 / 37%); color: #131378;"> CUSTOMER NAME</th> -->

                  
        
              <!-- <th colspan="1"  style="font-size: 18px; text-align:center;   
                border-bottom: 4px solid rgb(124 102 102); 
                  background-color: rgb(29 31 34 / 37%); color: #131378;"> TRANSACTION </th> -->
          
              
           
              <th colspan="1"  style="font-size: 18px; text-align:center;   
                border-bottom: 4px solid rgb(124 102 102); 
                  background-color: rgb(29 31 34 / 37%); color: #131378;"> TRANSACTION DETAILS</th>


              <th colspan="1"  style="font-size: 18px; text-align:center;   
                border-bottom: 4px solid rgb(124 102 102); 
                  background-color: rgb(29 31 34 / 37%); color: #131378;"> Openning Balance</th>

                 <th colspan="1"  style="font-size: 18px; text-align:center;   
                border-bottom: 4px solid rgb(124 102 102); 
                  background-color: rgb(29 31 34 / 37%); color: #131378;"> Debit</th>

                    <th colspan="1"  style="font-size: 18px; text-align:center;   
                border-bottom: 4px solid rgb(124 102 102); 
                  background-color: rgb(29 31 34 / 37%); color: #131378;"> Credit</th>

                    <th colspan="1"  style="font-size: 18px; text-align:center;   
                border-bottom: 4px solid rgb(124 102 102); 
                  background-color: rgb(29 31 34 / 37%); color: #131378;"> Running Balance</th>

              <th colspan="1"  style="font-size: 18px; text-align:center;   
                border-bottom: 4px solid rgb(124 102 102); 
                  background-color: rgb(29 31 34 / 37%); color: #131378;"> </th>



        </tr>
  <!-- <tr>
             <th></th>
             <th></th>
             <th></th>
             <th></th>
             <th></th>
             <th></th>
             <th>Openning Amount ({{currencydetails}})</th>
                 <th>Debit Amount ({{currencydetails}})</th>
             <th>Credit Amount ({{currencydetails}})</th>
            
                 <th>BALANCE ({{currencydetails}})</th>
                   <th></th>
  </tr> -->
<tr>
          <tr v-for="prodcates in customerstatementrecords.data" :key="prodcates.id">
              <!-- <td>{{prodcates.id }}</td> -->
                                 <td>{{prodcates.transactiondate  }}</td>
            <!-- <td>{{prodcates.customername }}</td>
                     <td>  <template v-if="prodcates.customer_name">	{{prodcates.customer_name.customername}}</template></td>  
                             -->
 
                    <!-- <td>
                    <div style="color:maroon"  v-if="prodcates.transactiontype == 1"> Credit transaction </div>
                    <div style="color:green"  v-if="prodcates.transactiontype == 2"> Debit Transaction </div>
                    </td> -->
                    
                          <td><div>   {{(prodcates.description)}} </div></td>
                          
                            <td><div class="musisialignright">   {{formatPrice(prodcates.openningbal)}} </div></td>
   
                          <td><div class="musisialignright">   {{formatPrice(prodcates.amount)}} </div></td>
                         <td><div class="musisialignright">   {{formatPrice(prodcates.debitamount)}} </div></td>
 <td><div class="musisialignright"> {{formatPrice(prodcates.resultatantbalance)}} </div></td>

 <td>  </td>  

</tr>
  <tr>


<th style="font-size: 18px; text-align:center;    
               border-top: 4px solid rgb(124 102 102);    
                background-color: rgb(211 211 211); color: #131378;" >
<div class="musisialignright">  </div>
</th>
<th style="font-size: 18px; text-align:center;    
               border-top: 4px solid rgb(124 102 102);    
                background-color: rgb(211 211 211); color: #131378;" >
<div class="musisialignright">  </div>
</th>









<th style="font-size: 18px; text-align:center;    
               border-top: 4px solid rgb(124 102 102);    
                background-color: rgb(211 211 211); color: #131378;" >
<div class="musisialignright">  </div>
</th>


<th style="font-size: 18px; text-align:center;    
               border-top: 4px solid rgb(124 102 102);    
                background-color: rgb(211 211 211); color: #131378;" >
                <!-- {{currencydetails}} {{formatPrice(totaldailygrossprofitrangereports)}} -->
<div class="musisialignright">  </div>
</th>



<th style="font-size: 18px; text-align:center;    
               border-top: 4px solid rgb(124 102 102);    
                background-color: rgb(211 211 211); color: #131378;" >
                <!--  {{currencydetails}} {{formatPrice(totaldailytotalvatrangereports)}} -->
<div class="musisialignright"> </div>
</th>
<th style="font-size: 18px; text-align:center;    
               border-top: 4px solid rgb(124 102 102);    
                background-color: rgb(211 211 211); color: #131378;" >
                <!-- {{currencydetails}} {{formatPrice(totaldailysaleswithouttaxgrossrangereports)}} -->
<div class="musisialignright">  </div>
</th>

<th style="font-size: 18px; text-align:center;    
               border-top: 4px solid rgb(124 102 102);    
                background-color: rgb(211 211 211); color: #131378;" >
                <!--  {{currencydetails}} {{formatPrice(totaldailytotalcostrangereports)}} -->
<div class="musisialignright"> </div>
</th>


</tr>
</table>



             
    <!-- <div class="card-footer">
                <ul class="pagination pagination-sm m-0 float-right">
                   <pagination :data="salesreportsummaryrecords" @pagination-change-page="paginationResultsProductcategories"></pagination>
                </ul>
    </div> -->
          
 

<div class="modal fade" id="addproductcategoryModal">
         <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3  v-show="!editmode"    class="modal-title"><img src="images/logo.png" class="profile-user-img img-fluid img-circle" style="height: 80px; width: 80px;">ADD NEW RECORD</h3> 
                <h4  v-show="editmode" class="modal-title" >UPDATE RECORD</h4> 
                        </div>
                  <form class="form-horizontal" @submit.prevent="editmode ? updateproductCategory():createProductcategory()"> 

                
<div class ="bethapa-table-sectionheader">Product Category</div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Category Name</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                  <input v-model="form.catname" type="text" name="catname"
                      class="form-control" :class="{ 'is-invalid': form.errors.has('catname') }">
                    <has-error :form="form" field="catname"></has-error>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Description</label>
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
                  <!--  -->
                                <div role="tabpanel" class="tab-pane fade" id="messages_with_icon_title" v-if="unitsofmeasureComponentaccess > 0">





  <div class="bethapa-reports-header">
            Product Sales details  : Rangingin from  {{salesreportsatartingdate}} to {{salesreportendingdate}}
                   
                     </div>
     <div class="mysalessect2"> 
 <form @submit.prevent="savedatestoVieedailyreport()">
                 
                      <div class="form-group">w

                                        <label>Start Date</label>
  <input v-model="form.startdate" type="date" name="startdate" id="startdate" v-on:change="tosubmitProductcategoryfilter" >

      <label>End Date</label>
  <input v-model="form.enddate" type="date" name="enddate" id="enddate" v-on:change="tosubmitProductcategoryfilter" > 
                              
             <button type="submit" style="display:none" id="submit" hidden="hidden" name= "submit" ref="buttontosubmitProductcategoryFilter" class="btn btn-primary btn-sm">Saveit</button>         

                                
            
       
                   
          </div>
      

                </form>
                  </div> 











                       <table  class="table" width="100%" border="1">
                   <tr>
             <th colspan="1"  style="font-size: 18px;     border-bottom: 4px solid rgb(124 102 102);     background-color: rgb(29 31 34 / 37%); color: #131378;"> RECEIPT NUMBER</th>
             <th colspan="1"  style="font-size: 18px;     border-bottom: 4px solid rgb(124 102 102);     background-color: rgb(29 31 34 / 37%); color: #131378;"> DATE</th>
           
          
              <th colspan="1"  style="font-size: 18px; text-align:center;   
                border-bottom: 4px solid rgb(124 102 102); 
                  background-color: rgb(29 31 34 / 37%); color: #131378;"> BRANCH</th>


<th colspan="1"  style="font-size: 18px; text-align:center;   
                border-bottom: 4px solid rgb(124 102 102); 
                  background-color: rgb(29 31 34 / 37%); color: #131378;"> CASHIER</th>


                     <th colspan="1"  style="font-size: 18px; text-align:center;   
                border-bottom: 4px solid rgb(124 102 102); 
                  background-color: rgb(29 31 34 / 37%); color: #131378;"> ITEM</th>
        
              <th colspan="3"  style="font-size: 18px; text-align:center;    
               border-bottom: 4px solid rgb(124 102 102);     background-color: rgb(29 31 34 / 37%); color: #131378;"> COST SETTINGS </th>
              
  <th colspan="6"  style="font-size: 18px; text-align:center;    
               border-bottom: 4px solid rgb(124 102 102);     background-color: rgb(29 31 34 / 37%); color: #131378;"> SALES DETAILS  </th>
              
          
              
            <!-- <th colspan="3"  style="font-size: 18px; text-align:center;    
               border-bottom: 4px solid rgb(124 102 102);     background-color: rgb(29 31 34 / 37%); color: #131378;"> PROFIT WITHOUT VAT </th> -->
              
             
              
        </tr>
<tr>
<th></th>
<th></th>
<th></th>
<th></th>
<th></th>
<th>Unit Cost ( {{currencydetails}} )</th>
<th>Qty</th>
<th>Total Cost ( {{currencydetails}} )</th>


<th>Unit Price ( {{currencydetails}} )</th>
<th>Qty</th>
<th>Total ( {{currencydetails}} ) </th>
<th>Unit VAT ( {{currencydetails}} ) </th>
<th>Total VAT  ( {{currencydetails}} )</th>
<th>Gross Profit ( {{currencydetails}} )</th>
<!-- <th>Line Profit ( {{currencydetails}} ) </th> -->



</tr>

<tr>
          <tr v-for="prodcates in salesdetailsreportdetailedrecords.data" :key="prodcates.id">
               <td>{{prodcates.invoiceno}}</td>
                                 <td>{{prodcates.datesold | myDate2 }}</td>
 
                             
                          <td> <template v-if="prodcates.branch_name">	{{prodcates.branch_name.branchname}}</template></td>  
                          <td> <template v-if="prodcates.product_saleuser">	{{prodcates.product_saleuser.name}}</template></td>  
                          <td> <template v-if="prodcates.product_name">	{{prodcates.product_name.productname}}</template></td>  

                          <td><div class="musisialignright"> {{formatPrice(prodcates.unitcost)}} </div></td>
                          <td><div class="musisialign"> {{formatPrice(prodcates.quantity)}} </div></td>
                          <td><div class="musisialignright"> {{formatPrice(prodcates.totalcost)}} </div></td>
                              
                              
                              
                              
                              
                              
                              
                               <td><div class="musisialignright"> {{formatPrice(prodcates.unitprice)}} </div></td>
                               <!-- style="background-color:#eeeeee " -->
                                 <td >
                                   <div class="musisialignright"> {{formatPrice(prodcates.quantity)}} </div></td>
                                 <td >
                                   <div class="musisialignright"> {{formatPrice(prodcates.linetotal)}} </div></td>

                                   <td >
                                   <div class="musisialignright"> {{formatPrice(prodcates.linevat)}} </div></td>

                                      <td >
                                   <div class="musisialignright"> {{formatPrice(prodcates.vatamount)}} </div></td>
                                      <td >
                                   <div class="musisialignright"> {{formatPrice(prodcates.lineprofit)}} </div></td>
                                    <!-- <td >
                                   
                                   <div class="musisialignright"> {{formatPrice(prodcates.netsalewithoutvat)}} </div></td>
                                    -->
                                
                                
                                  


 <tr>


<th style="font-size: 18px; text-align:center;    
               border-top: 4px solid rgb(124 102 102);    
                background-color: rgb(211 211 211); color: #131378;" >
<div class="musisialignright">  </div>
</th>
<th style="font-size: 18px; text-align:center;    
               border-top: 4px solid rgb(124 102 102);    
                background-color: rgb(211 211 211); color: #131378;" >
<div class="musisialignright">  </div>
</th>
<th style="font-size: 18px; text-align:center;    
               border-top: 4px solid rgb(124 102 102);    
                background-color: rgb(211 211 211); color: #131378;" >
<div class="musisialignright">  </div>
</th>

<th style="font-size: 18px; text-align:center;    
               border-top: 4px solid rgb(124 102 102);    
                background-color: rgb(211 211 211); color: #131378;" >
<div class="musisialignright">  </div>
</th>


<th style="font-size: 18px; text-align:center;    
               border-top: 4px solid rgb(124 102 102);    
                background-color: rgb(211 211 211); color: #131378;" >
<div class="musisialignright">  </div>
</th>


<th style="font-size: 18px; text-align:center;    
               border-top: 4px solid rgb(124 102 102);    
                background-color: rgb(211 211 211); color: #131378;" >
<div class="musisialignright"></div>
</th>


<th style="font-size: 18px; text-align:center;    
               border-top: 4px solid rgb(124 102 102);    
                background-color: rgb(211 211 211); color: #131378;" >
<div class="musisialignright">  </div>
</th>


<th style="font-size: 18px; text-align:center;    
               border-top: 4px solid rgb(124 102 102);    
                background-color: rgb(211 211 211); color: #131378;" >
<div class="musisialignright"> {{currencydetails}} {{formatPrice(salesdetailscostofthesalesmadetotalrange)}} </div>
</th>
<th style="font-size: 18px; text-align:center;    
               border-top: 4px solid rgb(124 102 102);    
                background-color: rgb(211 211 211); color: #131378;" >
<div class="musisialignright">  </div>
</th>

<th style="font-size: 18px; text-align:center;    
               border-top: 4px solid rgb(124 102 102);    
                background-color: rgb(211 211 211); color: #131378;" >
<div class="musisialignright">  </div>
</th>

<th style="font-size: 18px; text-align:center;    
               border-top: 4px solid rgb(124 102 102);    
                background-color: rgb(211 211 211); color: #131378;" >
<div class="musisialignright"> {{currencydetails}} {{formatPrice(salesdetailsalesmadetotalrange)}} </div>
</th>
    
<th style="font-size: 18px; text-align:center;    
               border-top: 4px solid rgb(124 102 102);    
                background-color: rgb(211 211 211); color: #131378;" >
<div class="musisialignright"></div>
</th>

<th style="font-size: 18px; text-align:center;    
               border-top: 4px solid rgb(124 102 102);    
                background-color: rgb(211 211 211); color: #131378;" >
<div class="musisialignright"> {{currencydetails}} {{formatPrice(salesdetailvatcollectedtotalrange)}} </div>
</th>
    <th style="font-size: 18px; text-align:center;    
               border-top: 4px solid rgb(124 102 102);    
                background-color: rgb(211 211 211); color: #131378;" >
<div class="musisialignright"> {{currencydetails}} {{formatPrice(salesdetailsgrossprofittotalrange)}} </div>
</th>
  
    
</tr>


</table>      
      
      

                 
                     <div class="card-footer">
                <ul class="pagination pagination-sm m-0 float-right">
                   <pagination :data="salesreportsummaryrecords" @pagination-change-page="paginationResultsProductcategories"></pagination>
                </ul>
    </div>



          
 

<div class="modal fade" id="unitofmeasureModal">
         <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3  v-show="!editmode"    class="modal-title"><img src="images/logo.png" class="profile-user-img img-fluid img-circle" style="height: 80px; width: 80px;">ADD NEW UNIT</h3> 
                <h4  v-show="editmode" class="modal-title" ><img src="images/logo.png" class="profile-user-img img-fluid img-circle" style="height: 80px; width: 80px;">Update Record</h3> </h4> 
                        </div>
                  <form class="form-horizontal" @submit.prevent="editmode ? updateUnitofmeasure():createUnitofmeasure()"> 


                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Brand Name</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                  <input v-model="form.unitname" type="text" name="unitname"
                      class="form-control" :class="{ 'is-invalid': form.errors.has('unitname') }">
                    <has-error :form="form" field="unitname"></has-error>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                
                                 <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Code</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                  <input v-model="form.shotcode" type="text" name="shotcode"
                      class="form-control" :class="{ 'is-invalid': form.errors.has('shotcode') }">
                    <has-error :form="form" field="shotcode"></has-error>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                 <!-- <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Description</label>
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
                               -->

   

                              


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

                                <!--  -->
  <div role="tabpanel" class="tab-pane fade" id="settings_with_icon_title" v-if="companyproductsComponentaccess > 0" >
                                 
                                 
   <div class="bethapa-table-header">
                  COMPANY PRODUCT DETAILS
                  <!-- v-if="allowedtoaddbranch > 0 " -->
                      <button type="button"  class="add-newm" @click="newproductModal" >Add New </button> 
                     </div>

           <div class="bethapa-table-header"></div>
   <div class="mysalessect"> 
  <input type="text" placeholder="Enter Item Name " v-model="search" v-on:keyup="searchit" @keyup="searchit" class="formcont2">

  </div>
                       <table class="table">
                  <thead>
                    <tr>
                   
                      <th > # </th>
                      
                          <th > CATEGORY</th>
                            <th > CODE</th>
                      <th > PRODUCT NAME </th>
                     
                      <th > UNIT OF MEASURE </th>
                    
                    
                    
                         <th > QTY AVAILABLE</th>
                      <th > RE-STOCK QTY</th>
                     
                     <th >  </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>


 
       
     
          

                                 <tr v-for="probrands in productdetailsrecords.data" :key="probrands.id">
                      
                               
                
                      
                         
                                <td>{{probrands.id}}</td>
                              
                                <td> ({{probrands.category}}) <template v-if="probrands.product_category">	{{probrands.product_category.catname}}</template></td>  
                                      <td>   	{{probrands.uracode}}</td>                
                               
   <td>   {{probrands.productname | firstletterCapital }}</td>
   <td> <template v-if="probrands.unit_measure">	{{probrands.unit_measure.shotcode}}</template> -  <template v-if="probrands.unit_measure">	{{probrands.unit_measure.unitname}}</template></td>
    <td><div class="tabletextalign"> {{probrands.qty}} - <template v-if="probrands.unit_measure">	{{probrands.unit_measure.unitname}}<sub>(s)</sub></template> </div></td> 
  
   
    
 
                   
   
                             
                               
                                  <td><div class="tabletextalign"> {{probrands.rol}} </div></td>
                                
                               
                                 <td> 
                                  <!-- v-if="allowedtoeditbranch > 0 "  -->
                              <button type="button"   class="btn  bg-gradient-secondary btn-xs fas fa-edit"  @click="editProductdetails(probrands)">Edit Record</button>
                             


                            <button type="button"  class="btn  bg-gradient-danger btn-xs fas fa-trash-alt" @click="deleteUnitofmeasure(probrands.id)"> Delete Record </button>




                             
                              </td>


               
                              
                               
                    </tr>
              
                     
                  </tbody>
              
 
                                   </table>
    <div class="card-footer">
      
                <ul class="pagination pagination-sm m-0 float-right">
                   <pagination :data="productdetailsrecords" @pagination-change-page="paginationResultsProductdetailsrecords"></pagination>
                </ul>
    </div>



                  
          
 

<div class="modal fade" id="pruductdetailModal">
         <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3  v-show="!editmode"    class="modal-title"><img src="images/logo.png" class="profile-user-img img-fluid img-circle" style="height: 80px; width: 80px;">New Product Registration</h3> 
                <h4  v-show="editmode" class="modal-title" ><img src="images/logo.png" class="profile-user-img img-fluid img-circle" style="height: 80px; width: 80px;">Update Record</h3> </h4> 
                        </div>
                  <form class="form-horizontal" @submit.prevent="editmode ? updateProductdetails():createProductdetails()"> 


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

 <div role="tabpanel" class="tab-pane fade" id="one_with_icon_title" v-if="purchasesComponentaccess > 0">
                                
                                

   <div class="bethapa-table-header">
                  PURCHASES  / INVOICES SUMMARY
                  <!-- v-if="allowedtoaddbranch > 0 " -->
                      <button type="button"  class="add-newm" @click="newpurchaseInvoice" >Generate Invoice </button> 
                       <button type="button"  class="add-newm" @click="updateinvoiceproductsModal" @mouseover="laodProductdetails" >View  Invoice Details </button> 
                     </div>


                       <table class="table">
                  <thead>
                      <tr>
          <th rowspan="1" style="font-size: 25px; background-color:#c5c5c5; "></th>
            <th rowspan="1" style="font-size: 25px; background-color:#c5c5c5; "></th>
            <th rowspan="1" style="font-size: 25px; background-color:#c5c5c5;"></th>
             <th rowspan="1" style="font-size: 25px; background-color:#c5c5c5; "></th>
              <th colspan="3"  style="font-size: 25px;     background-color: rgb(29 31 34 / 37%); color: #131378;"> PURCHASE ORDER DETAILS</th>
            <th colspan="3" style="font-size: 25px; background-color: rgb(29 31 34 / 37%); color: #131378; " >  DELIVERY DETAILS</th>
            <th colspan="3"  style="font-size: 25px; background-color: rgb(29 31 34 / 37%);color: #131378; ">PAYMENT DETAILS </th>
          <th rowspan="1" style="font-size: 25px; background-color:#c5c5c5; "></th>
          
        </tr>
                    <tr>
                   
                      <th># </th>
                      <th> ORDER DATE</th>
                          <th> SUPPLIER INVOICE No. </th>
                      <th> SUPPLIER NAME </th>
                      <th>  AMOUNT ({{currencydetails}} ) </th>
                      <th>  VAT ({{currencydetails}} )</th>
                      <th> STATUS</th>
                      <th>  AMOUNT ({{currencydetails}} ) </th>
                      <th>  VAT ({{currencydetails}} )</th>
                       <th>  STATUS </th>
                     

                          <th> PAID ( {{currencydetails}} )</th>
                          <th> BALANCE ( {{currencydetails}} )</th>
                          <th> STATUS ( {{currencydetails}} )</th>
                     <th >  </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>


 
       
     
          

                                 <tr v-for="probrands in purchaseincoicesummaryrecords.data" :key="probrands.id">
                      
                 
                  
                
                      
                         
                                <td>{{probrands.purchaseno}}</td>
                                 <td>{{probrands.invoicedate | myDate2 }}</td>
                                    <td>{{probrands.supplierinvoiceno}}</td>
                                   <td>   <template v-if="probrands.supplier_name">	{{probrands.supplier_name.suppname}}</template></td> 
                              
                               
                                  <td>{{formatPrice(probrands.tendercost)}}</td>
                                <td>{{formatPrice(probrands.expectedvat)}}</td>
                                 <td><div v-if="probrands.invoicelockstatus == '1' " >
                                 <span class="label bg-red">Locked</span>
                                 </div>
                                 <div v-if="probrands.invoicelockstatus == '0' " >
                                 <span class="label bg-green">Open</span>
                                 </div>

                                 </td>
                                 <td>{{formatPrice(probrands.finalcost)}}</td>
                                  <td>{{formatPrice(probrands.totalvat)}}</td>
                                      
                                    <td><div v-if="probrands.status == '1' " >
                                 <span class="label bg-orange">Partialy Delivered</span>
                                 </div>
                                 <div v-if="probrands.status == '0' " >
                                 <span class="label bg-deep-orange">Not Delivered</span>
                                 </div>
                                  <div v-if="probrands.status == '2' " >
                                 <span class="label bg-green">Delivered</span>
                                 </div>

                                 </td>
                               
                                      <td>{{formatPrice(probrands.amountpaid)}}</td>
                                      <td>{{formatPrice(probrands.finalcost-probrands.amountpaid)}}</td>
                                  
                                  <td><div v-if="((probrands.finalcost-probrands.amountpaid) != 0) && ((probrands.finalcost-probrands.amountpaid) <  (probrands.finalcost)) " >
                                 <span class="label bg-orange">Partialy Paid</span>
                                 </div>
                                 <div v-if="(probrands.finalcost-probrands.amountpaid) == (probrands.finalcost)" >
                                 <span class="label bg-red">Not Paid</span>
                                 </div>
                                  <div v-if="(probrands.finalcost-probrands.amountpaid) == 0 " >
                                 <span class="label bg-green">Fully Paid</span>
                                 </div>

                                 </td>
                               
                                 <td> 
                                  
                            <div v-if="probrands.finalcost > 0 ">
                             <button type="button"  @click="paypurchaseInvoice(probrands)" class="btn bg-brown waves-effect">Pay Invoice</button>
                            
                            </div>
                             <div v-if="probrands.invoicelockstatus == 0 ">
  <button type="button"  class="btn bg-deep-orange waves-effect" @click="deleteUnitofmeasure(probrands.id)"> Delete  Invoice</button>
                           
                             </div>



                             
                              </td>


               
                              
                               
                    </tr>
              
                     
                  </tbody>
              
 
                                   </table>
    <div class="card-footer">
                <ul class="pagination pagination-sm m-0 float-right">
                   <pagination :data="salesreportsummaryrecords" @pagination-change-page="paginationResultsProductcategories"></pagination>
                </ul>
    </div>


   
<div class="modal fade" id="paypurchaseinvoiceModal">
         <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3  v-show="!editmode"    class="modal-title"><img src="images/logo.png" class="profile-user-img img-fluid img-circle" style="height: 80px; width: 80px;">ADD NEW UNIT</h3> 
                <h4  v-show="editmode" class="modal-title" ><img src="images/logo.png" class="profile-user-img img-fluid img-circle" style="height: 80px; width: 80px;">Make Invoice Payment</h3> </h4> 
                        </div>
                  <form class="form-horizontal" @submit.prevent="editmode ? createInvoicePayment():createUnitofmeasure()"> 

<div class ="bethapa-table-sectionheader">ORDER DETAILS</div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Invoice Number</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                              <b>    <input v-model="form.supplierinvoiceno" readonly type="text" name="supplierinvoiceno"
                      class="form-control" :class="{ 'is-invalid': form.errors.has('supplierinvoiceno') }"> </b>
                    <has-error :form="form" field="supplierinvoiceno"></has-error>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                
                                 <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Invoice Amount</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                 <input v-model="form.finalcost" readonly type="text" name="finalcost"
                      class="form-control" :class="{ 'is-invalid': form.errors.has('finalcost') }">
                    <has-error :form="form" field="finalcost"></has-error>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                 <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Amount Paid</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                  <input v-model="form.amountpaid" readonly type="text" name="amountpaid"
                      class="form-control" :class="{ 'is-invalid': form.errors.has('amountpaid') }">
                    <has-error :form="form" field="amountpaid"></has-error>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                     <div class ="bethapa-table-sectionheader">PAYMENT DETAILS</div>          


       <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Payment Mode</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">

                                                               

  
                     <select name ="paymentmode"  v-model="form.paymentmode" id ="paymentmode" 
                      class="show-tick" data-live-search="true"   :class="{'is-invalid': form.errors.has('paymentmode')}">
                    <option value="">   </option>
                    <option value="1"> Cash </option>
                    <option value="2"> Mobile Money  </option>
                    <option value="3"> Bank </option>
                  

                    </select>
                    <has-error :form="form" field="paymentmode"></has-error>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                             <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Wallet of Payment</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">

                                                               

  
                    <select name ="walletofexpense"  v-model="form.walletofexpense" id ="walletofexpense" 
                      class="show-tick" data-live-search="true"   :class="{'is-invalid': form.errors.has('walletofexpense')}">
                    <option value="">   </option>
                    <option v-for='data in walletsofeapenselist' v-bind:value='data.walletno'>{{ data.walletno}} - {{ data.name }}</option>
                  

                    </select>
                    <has-error :form="form" field="walletofexpense"></has-error>
                                            </div>
                                        </div>
                                    </div>
                                </div>

  <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Payment Date</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                  <input v-model="form.dateofpayment" type="date" name="dateofpayment"
                      class="form-control" :class="{ 'is-invalid': form.errors.has('dateofpayment') }">
                    <has-error :form="form" field="dateofpayment"></has-error>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                              
                          <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Amount Issued</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                  <input v-model="form.amountbeingpaid"  @keyup="updateremaininginvoicebalance" @keypress="updateremaininginvoicebalance" type="number" name="amountbeingpaid"
                      class="form-control" :class="{ 'is-invalid': form.errors.has('amountbeingpaid') }">
                    <has-error :form="form" field="amountbeingpaid"></has-error>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                          <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Balance</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                  <input v-model="form.invoicebalance" readonly type="text" name="invoicebalance"
                      class="form-control" :class="{ 'is-invalid': form.errors.has('invoicebalance') }">
                    <has-error :form="form" field="invoicebalance"></has-error>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                              


                  <div  class="modal-footer">
                    <button  v-show="!editmode" type="submit" class="btn btn-primary btn-sm">Create</button> 
                      <button v-show="editmode" type="submit" class="btn btn-success btn-sm" >Confirm Payment</button>
                        <button  type="button" data-dismiss="modal" class="btn btn-danger btn-sm">Close</button >
                        </div>
                 </form>
                       </div>
                          </div>
                </div>
               

<div class="modal fade" id="updateinvoiceproductsModal" style="position:left" >
         <div class="modal-dialog modal-lg">
           <div class="modal-content" >
                    <!-- <div class="modal-content" style="width:1500px"> -->
                        <div class="modal-header">
                            <h3  v-show="!editmode"    class="modal-title"><img src="images/logo.png" class="profile-user-img img-fluid img-circle" style="height: 80px; width: 80px;">INVOICE PRODUCT UPDATE</h3> 
                <h4  v-show="editmode" class="modal-title" ><img src="images/logo.png" class="profile-user-img img-fluid img-circle" style="height: 80px; width: 80px;">Update Record</h3> </h4> 
                        </div>
                 
                                 
                            
                                <form @submit.prevent="saveinvoiceInaction()">     
                          <div class ="bethapa-table-sectionheader">Invoice Selection</div>       
                                 
                                 
                                 <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Select Invoice</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">

                                                               

  
                                                <select name ="invoiceinaction"  v-model="form.invoiceinaction" id ="invoiceinaction"  class="show-tick" data-live-search="true" v-on:change="tosubmitInvoivenumbertoview"  :class="{'is-invalid': form.errors.has('invoiceinaction')}">
                    <option value="">   </option>
                    <option v-for='data in invoiceslist' v-bind:value='data.supplierinvoiceno'>{{ data.supplierinvoiceno }}</option>

                    </select>
                    <has-error :form="form" field="invoiceinaction"></has-error>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" style="display:none" id="submit" hidden="hidden" name= "submit" ref="buttontosubmitinvoicenumbertoview" class="btn btn-primary btn-sm">Saveit</button>   
                            </form>

              
                                <div class ="bethapa-table-sectionheader">Product Details to add to invoice</div>  
  <div class="mysalessect"> 
  <input type="text" placeholder="Enter Item Name " v-model="search" v-on:keyup="searchit" @keyup="searchit" class="formcont2">

  </div>
<table class="table">
                  <thead>
                    <tr>
                   
                      <th > # </th>
                      
                          <th > CATEGORY</th>
                           
                      <th > PRODUCT NAME </th>
                     
                      <th > UNIT OF MEASURE </th>
                    
                    
                    
                      
                     
                     <th >  </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>


 
       
     
          

                                 <tr v-for="probrands in productstoaddtoinvoicerecords.data" :key="probrands.id">
                      
                               
                
                      
                         
                                <td>{{probrands.id}}</td>
                              
                                <td> ({{probrands.category}}) <template v-if="probrands.product_category">	{{probrands.product_category.catname}}</template></td>  
                                             
                               
   <td>   {{probrands.productname | firstletterCapital }}</td>
   <td> <template v-if="probrands.unit_measure">	{{probrands.unit_measure.shotcode}}</template> -  <template v-if="probrands.unit_measure">	{{probrands.unit_measure.unitname}}</template></td>
  
    
 
                   
   
                             
                               
                                 
                                
                               
                                 <td> 
                                  <!-- v-if="allowedtoeditbranch > 0 "  -->
                              <button type="button"   class="btn  bg-secondary btn-xs"  @click="addmyselectedProducttoPurcase(probrands)">Purchase</button>
                             


                          


                             
                              </td>


               
                              
                               
                    </tr>
              
                     
                  </tbody>
              
 
                                   </table>

                      <div class ="bethapa-table-sectionheader"></div> 
<!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->



  


















<div class="col-md-6">
          <div class="card card-secondary">
            <div class="card-header">
                 <div class="col-lg-6">
                        <!-- col-lg-6 start here -->
                           
                        <div class="invoice-from">
                            
                            <ul class="list-unstyled text-right">
                               <!-- <div class="invoice-logo"><img width="100" src="images/invoice.png" alt="Invoice logo"></div> -->
                                <li><b>SENA Hardware Ltd </b></li>
                                <li>Jogo</li>
                                <li>0775294763</li>
                                <li>VAT Number : EU826113958</li>
                            </ul>
                        </div>
                    </div>

                     <div class="invoice-details mt25">
                            <div class="well">
                                <ul class="list-unstyled mb0">
                                   <li><strong>Document No : </strong> #{{getthinvoicedocumentno}}</li>
                                    <li><strong>Supplier Invoice Number : </strong>{{getthinvoicenumberactive}}</li>
                                     <li><strong>Invoice Date  :</strong> {{gettheinvoicedate|myDate2}}</li>
                                   <li><strong>Supplier Name:</strong> {{getthinvoicesuppliername}}</li>
                                 
                                 
                                     <li v-if="gettheinvoicedeliverystatus == '0'"><strong>Delivery : </strong> <span class="label label-danger">Pending</span></li>
                                     <li v-if="gettheinvoicedeliverystatus == '1'"><strong>Delivery : </strong> <span class="label label-info">Partial</span></li>
                                     <li v-if="gettheinvoicedeliverystatus == '2'"><strong>Delivery : </strong> <span class="label label-success">DONE</span></li>
                                     
                                   <li v-if="getinvoicepaymentstatus == '0'"><strong>Payment : </strong> <span class="label label-warning">Not Paid</span></li>
                                     <li v-if="getinvoicepaymentstatus == '1'"><strong>Payment : </strong> <span class="label label-info">Partial</span></li>
                                     <li v-if="getinvoicepaymentstatus == '2'"><strong>Payment : </strong> <span class="label label-success">Paid</span></li>
                                     
                                </ul>
                            </div>
                        </div>
           

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">
     <table style="width:100%">
  <thead>
    <tr>
         <th class="tresed">#</th>
      <th class="tresed"> ITEM</th>
      <!-- <th class="tresed"> DESCRIPTION</th> -->
       <th class="tresed">UNIT COST</th>
       <th class="tresed">UNIT VAT</th>
      <th class="tresed">QTY</th>
       
      <th class="tresed">TOTAL COST</th>
      <th class="tresed">TOTAL VAT</th>
       <th class="tresed">INVOICE TOTAL</th>
      <th class="tresed"></th>
    </tr>
  </thead>
  <tbody>
      <tr v-for="shobalrecs in activeinvoicetoupdaterecords.data" :key="shobalrecs.id">
         <td>
        
        <span class="book-title"> {{shobalrecs.id}} </span>
        
      </td>
      <td class="four">
        
      <span class="book-title"> <template v-if="shobalrecs.product_name">	{{shobalrecs.product_name.productname}}</template></span>
       
      </td>
         <!-- <td class="four">
        
      

      <span class="book-title"> 
        <div  v-if="shobalrecs.vatstatus == '2' "> 
        VAT is included in the Cost Price
        </div>
        <div  v-if="shobalrecs.vatstatus == '3' "> 
      VAT is separate from Cost price
        </div>
     <div  v-if="shobalrecs.vatstatus == '1' "> 
        No VAT on this item
        </div>
      </span>

     
      </td> -->
                                <!-- <td>   <template v-if="shobalrecs.supplier_name">	{{shobalrecs.supplier_name.suppname}}</template></td>  -->
         <td>
          
        <span class="book-title">{{formatPrice(shobalrecs.unitprice)}}</span>
        
      </td>
       <td> <span class="book-title">  {{formatPrice(shobalrecs.unitvat)}}</span></td>
      <td>   <span class="book-title">{{shobalrecs.quantity}}</span></td>
      <td> <span class="book-title">  {{formatPrice(shobalrecs.linetotal)}}</span></td>
       <td> <span class="book-title">   {{formatPrice(shobalrecs.vattotal)}}</span></td>
        
         <td> <span class="item-price">   {{formatPrice(shobalrecs.grandtotal)}}</span></td>
           <td> 
              
                    <span class="book-title"> 
                   
               
                  <button  v-if="shobalrecs.invoicelockstatus == '0' " type="button" class="btn bg-deep-orange btn-xs waves-effect" 
                  
                  @click="deleteproductfromPurcases(shobalrecs.id)">Remove item</button>
                
                                         
                </span></td>
    
    
    </tr>
   

  </tbody>
  <tfoot>
    <tr class="text-offset">
      <td colspan="7">SUB TOTAL : </td>
      <td>{{currencydetails}}  {{formatPrice(gettheinvoicetotalwithoutvat)}}</td>
    </tr>
    <tr class="text-offset">
      <td colspan="7">VAT (18%) : </td>
     <td>{{currencydetails}}  {{formatPrice(gettheinvoicevatamount)}}</td>
    </tr>
    <tr class="text-offset">
      <td colspan="7">GRAND TOTAL :</td>
     <td>{{currencydetails}}  {{formatPrice(gettheinvoicegrandtotal)}}</td>
    </tr>
    
  </tfoot>
</table>

<!-- <button type="button" v-if="invoicelockstatus  == '0'" class="btn btn-danger btn-xs" >Remove all Items from the List </button> -->

 
<button type="button" v-if="invoicelockstatus  == '0'" class="btn btn-success btn-xs  waves-effect" @click="lockthepurchaseInvoice">
                                    <i class="material-icons">lock</i>
                                    <span>CLOSE INVOICE</span>
                                </button>







            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>






<div class="container bootdey">

</div>            <div  class="modal-footer">
                    
                 
                        <button  type="button" data-dismiss="modal" class="btn btn-danger btn-sm">Close</button >
                        </div>
                
                       </div>
                          </div>
                </div>

<div class="modal fade" id="newpurchaseinvoiceModal">
         <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3  v-show="!editmode"    class="modal-title">
                              <img src="images/logo.png" class="profile-user-img img-fluid img-circle" style="height: 80px; width: 80px;">NEW INVOICE GENERATION</h3> 
                <h4  v-show="editmode" class="modal-title" ><img src="images/logo.png" class="profile-user-img img-fluid img-circle" style="height: 80px; width: 80px;">Update Record</h3> </h4> 
                        </div>
                  <form class="form-horizontal" @submit.prevent="editmode ? updateUnitofmeasure():createnewInvoice()"> 


                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">INVOICE No.</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                  <input v-model="form.invoicenumber" type="text" name="invoicenumber"
                      class="form-control" :class="{ 'is-invalid': form.errors.has('invoicenumber') }">
                    <has-error :form="form" field="invoicenumber"></has-error>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">INVOICE DATE</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                  <input v-model="form.invoicedate" type="date" name="invoicedate"
                      class="form-control" :class="{ 'is-invalid': form.errors.has('invoicedate') }">
                    <has-error :form="form" field="invoicedate"></has-error>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                
                                 <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Supplier</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select name ="suppliername"  v-model="form.suppliername" id ="suppliername"  class="show-tick" data-live-search="true"  :class="{'is-invalid': form.errors.has('suppliername')}">
                    <option value="">   </option>
                    <option v-for='data in supplierslist' v-bind:value='data.id'>{{ data.suppname }}</option>

                    </select>
                    <has-error :form="form" field="suppliername"></has-error>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                 <!-- <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Description</label>
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
                               -->

   

                              


                  <div  class="modal-footer">
                    <button  v-show="!editmode" type="submit" class="btn btn-primary btn-sm">Create</button> 
                        <button  type="button" data-dismiss="modal" class="btn btn-danger btn-sm">Close</button >
                        </div>
                 </form>
                       </div>
                          </div>
                </div>








                                
                                </div>
<!-- ---------------------------------------------------------------------------------------------------------------------- -->
 <div role="tabpanel" class="tab-pane fade" id="two_with_icon_title" v-if="purchaserecordsComponentaccess > 0">
                                
                                

   <div class="bethapa-table-header">
                  PURCHASE / ORDER  DETAILS 
                  <!-- v-if="allowedtoaddbranch > 0 " -->
                 
                     </div>
 
                         
    <form @submit.prevent="saveinvoiceInaction()">
                 
                      <div class="form-group">

<label>Select the invoice :</label>
                   <select name ="invoiceinaction"  v-model="form.invoiceinaction" id ="invoiceinaction"  class="show-tick" data-live-search="true" v-on:change="tosubmitInvoivenumbertoview"  :class="{'is-invalid': form.errors.has('invoiceinaction')}">
                    <option value="">   </option>
                    <option v-for='data in invoiceslist' v-bind:value='data.supplierinvoiceno'>{{ data.supplierinvoiceno }}</option>

                    </select>

                    <button type="submit" style="display:none" id="submit" hidden="hidden" name= "submit" ref="buttontosubmitinvoicenumbertoview" class="btn btn-primary btn-sm">Saveit</button>                 
            
       
                   
          </div>
      

                </form>        
                             <!-- <div class="bethapa-table-header">
                                <form @submit.prevent="saveinvoiceInaction()">     
                               
                                 
                                 
                                 <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Select Invoice</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">

                                                               

  
                                                <select name ="invoiceinaction"  v-model="form.invoiceinaction" id ="invoiceinaction"  class="show-tick" data-live-search="true" v-on:change="tosubmitInvoivenumbertoview"  :class="{'is-invalid': form.errors.has('invoiceinaction')}">
                    <option value="">   </option>
                    <option v-for='data in invoiceslist' v-bind:value='data.supplierinvoiceno'>{{ data.supplierinvoiceno }}</option>

                    </select>
                    <has-error :form="form" field="invoiceinaction"></has-error>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                              
                            </form>
                             </div> -->
                       <table class="table">
                  <thead>
                    <tr>
                   
                      <th > # </th>
                       <th > DATE</th>
                      <th > SUPPLIER INVOICE</th>
                        <th >SUPPLIER</th>
                      <th > ITEM / PRODUCT </th>
                       <th > UNITCOST({{currencydetails}})</th>
                       <th >QTY</th>
                       <th >TOTAL</th>
                       <th >VAT</th>
                       <th >GRANT TOTAL</th>
                       <th >STATUS</th>
                                         
                    
                     <th >  </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>


 
       
    
                                 <tr v-for="purcdet in productpurchasesdetailrecords.data" :key="purcdet.id">
                      
                 
                  
                
                      
                         
                                <td>{{purcdet.invoiceno}}</td>
                                   <td>{{purcdet.dateordered}}</td>
                                  <td>{{purcdet.supplierinvoiceno}}</td>
                                      <td><template v-if="purcdet.supplier_name">	{{purcdet.supplier_name.suppname}}</template></td>
                                 <td><template v-if="purcdet.product_name">	{{purcdet.product_name.productname}}</template></td>
                                <td> {{formatPrice(purcdet.unitprice)  }}</td>
                                <td> {{(purcdet.quantity)  }}</td>
                                    <td> {{formatPrice(purcdet.linetotal)  }}</td>
     <td> {{formatPrice(purcdet.vattotal)  }}</td>
     <td> {{formatPrice(purcdet.grandtotal)  }}</td>
                             
                               
                                 
                                
                                 <td> 
                                   <div v-if="purcdet.status == '0' "> Pending </div>
                                 <div v-if="purcdet.status == '1' "> Confirmed </div>
                                 </td>
                                 <td> 
                                  
                          
                  <button v-if="purcdet.status == '0'" type="button" class="btn bg-teal waves-effect" @click="confirmItempurchaseddelivery(purcdet)">Confirm Delivery</button>           
                




                             
                              </td>


               
                              
                               
                    </tr>
              
                     
                  </tbody>
              
 
                                   </table>
    <div class="card-footer">
                <ul class="pagination pagination-sm m-0 float-right">
                   <pagination :data="salesreportsummaryrecords" @pagination-change-page="paginationResultsProductcategories"></pagination>
                </ul>
    </div>



<div class="modal fade" id="confirmitemonpurchase" >
         <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content" style="width:800px">
                        <div class="modal-header">
                            <h3  v-show="!editmode"    class="modal-title">
                              <img src="images/logo.png" class="profile-user-img img-fluid img-circle" style="height: 80px; width: 80px;">CONFIRM PURCHASE</h3> 
                <h4  v-show="editmode" class="modal-title" ><img src="images/logo.png" class="profile-user-img img-fluid img-circle" style="height: 80px; width: 80px;">CONFIRM PURCHASE</h3> </h4> 
                        </div>
                  <form class="form-horizontal" @submit.prevent="editmode ? updatecreateOrderconfirmation():createnewInvoice()"> 

<div class ="bethapa-table-sectionheader">Purchase Details</div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Invoice Number</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                  <input v-model="form.supplierinvoiceno" readonly type="text" name="supplierinvoiceno"
                      class="form-control" :class="{ 'is-invalid': form.errors.has('supplierinvoiceno') }">
                    <has-error :form="form" field="supplierinvoiceno"></has-error>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                             

                                       <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Qty Ordered</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                  <input v-model="form.quantity" type="number" readonly name="quantity"
                      class="form-control" :class="{ 'is-invalid': form.errors.has('quantity') }">
                    <has-error :form="form" field="quantity"></has-error>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                       <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Unit Cost</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                  <input v-model="form.unitprice" readonly type="text" name="unitprice"
                      class="form-control" :class="{ 'is-invalid': form.errors.has('unitprice') }">
                    <has-error :form="form" field="unitprice"></has-error>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                      <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Unit Vat</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                  <input v-model="form.unitvat" readonly type="text" name="unitvat"
                      class="form-control" :class="{ 'is-invalid': form.errors.has('unitvat') }">
                    <has-error :form="form" field="unitvat"></has-error>
                                            </div>
                                        </div>
                                    </div>
                                </div>


  <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Total Unit Cost</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                  <input v-model="form.lineproductcost" readonly type="text" name="lineproductcost"
                      class="form-control" :class="{ 'is-invalid': form.errors.has('lineproductcost') }">
                    <has-error :form="form" field="lineproductcost"></has-error>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               

<div class ="bethapa-table-sectionheader">Delivery  Details</div>
<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Date Delivered</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                  <input v-model="form.deliverydate" type="date"  name="deliverydate"
                      class="form-control" :class="{ 'is-invalid': form.errors.has('deliverydate') }">
                    <has-error :form="form" field="deliverydate"></has-error>
                                            </div>
                                        </div>
                                    </div>
                                </div>

     <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Qty Delivered</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                  <input v-model="form.qtydelivered" type="text"  name="qtydelivered"
                      class="form-control" :class="{ 'is-invalid': form.errors.has('qtydelivered') }">
                    <has-error :form="form" field="qtydelivered"></has-error>
                                            </div>
                                        </div>
                                    </div>
                                </div>
<div class ="bethapa-table-sectionheader">PRICE SETTINGS</div>
                                       <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">SELLING PRICE</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                  <input v-model="form.unitsellingprice" type="text" name="unitsellingprice" @keypress="updateunitsellingprice" @keydown="updateunitsellingprice" @keyup="updateunitsellingprice"
                      class="form-control" :class="{ 'is-invalid': form.errors.has('unitsellingprice') }" placeholder="Note that this selling price includes Vat of 18%">
                      
                    <has-error :form="form" field="unitsellingprice"></has-error>
                                            </div>
                                        </div>
                                    </div>
                                </div>

   <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">OUTPUT VAT</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                  <input v-model="form.unitoutputvat" type="text" name="unitoutputvat" readonly
                      class="form-control" :class="{ 'is-invalid': form.errors.has('unitoutputvat') }" placeholder="">
                      
                    <has-error :form="form" field="unitoutputvat"></has-error>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                  <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">LINE PROFIT</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                  <input v-model="form.netprofit" type="text" name="netprofit" readonly
                      class="form-control" :class="{ 'is-invalid': form.errors.has('netprofit') }" placeholder="">
                      
                    <has-error :form="form" field="netprofit"></has-error>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                  <div  class="modal-footer">
                    <button  v-show="!editmode" type="submit" class="btn btn-primary btn-sm">Create</button> 
                      <button v-show="editmode" type="submit" class="btn btn-success btn-sm" >Confirm Delivery</button>
                        <button  type="button" data-dismiss="modal" class="btn btn-danger btn-sm">Close</button >
                        </div>
                 </form>
                       </div>
                          </div>
                </div>

                  
          
 

<div class="modal fade" id="unitofmeasureModal">
         <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3  v-show="!editmode"    class="modal-title"><img src="images/logo.png" class="profile-user-img img-fluid img-circle" style="height: 80px; width: 80px;">ADD NEW UNIT</h3> 
                <h4  v-show="editmode" class="modal-title" ><img src="images/logo.png" class="profile-user-img img-fluid img-circle" style="height: 80px; width: 80px;">Update Record</h4> 
                        </div>
                  <form class="form-horizontal" @submit.prevent="editmode ? updateUnitofmeasure():createUnitofmeasure()"> 


                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Brand Name</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                  <input v-model="form.unitname" type="text" name="unitname"
                      class="form-control" :class="{ 'is-invalid': form.errors.has('unitname') }">
                    <has-error :form="form" field="unitname"></has-error>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                
                                 <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Code</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                  <input v-model="form.shotcode" type="text" name="shotcode"
                      class="form-control" :class="{ 'is-invalid': form.errors.has('shotcode') }">
                    <has-error :form="form" field="shotcode"></has-error>
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
                       </div>
                          </div>
                </div>









                                
                                </div>
<!-- ---------------------------------------------------------------------------------------------------------------- -->
 <div role="tabpanel" class="tab-pane fade" id="three_with_icon_title" v-if="salessummaryComponentaccess > 0"> 
                                
                                

   








                                
                                </div>
<!-- -------------------------------------------------------------------------------------------------- -->

                                <!-- end of products -->
                            </div>
                        </div>
                    </div>
                </div>



<div class="modal fade" id="ccfnewpurchaseinvoiceModal">
         <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3  v-show="!editmode"    class="modal-title">
                              <img src="images/logo.png" class="profile-user-img img-fluid img-circle" style="height: 80px; width: 80px;">Add Item to Purchase Invoice</h3> 
                <h4  v-show="editmode" class="modal-title" ><img src="images/logo.png" class="profile-user-img img-fluid img-circle" style="height: 80px; width: 80px;">Add Item to Purchase Invoice
                </h3> </h4> 
                        </div>
                 <form class="form-horizontal" @submit.prevent="editmode ? createnewInvoiceproducts():createnewInvoiceproducts()"> 







                                 <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">ITEM NAME </label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                              
                                                 <input v-model="form.id" readonly id="id" type="hidden" name="productonpurchase"
                      class="form-control" :class="{ 'is-invalid': form.errors.has('productname') }">
                                                  <input v-model="form.productname" readonly id="productname" type="text" name="productname"
                      class="form-control" :class="{ 'is-invalid': form.errors.has('productname') }">
                    <has-error :form="form" field="productname"></has-error>
                                            </div>
                                        </div>
                                    </div>
                                </div>



  <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">VAT CHARGE</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            Product Sales details<div class="form-line">
                                                <select style="width:20px" name ="vatinclussive"  v-model="form.vatinclussive" 
                                            id ="vatinclussive"  class="orm-control show-tick"
                                             data-live-search="true"  
                                             :class="{'is-invalid': form.errors.has('vatinclussive')}">
                    <option value="">   </option>
                    <option value="1">No  -   This product has no VAT</option>
                    <option value="2">Yes - VAT is included in the cost Price</option>
                     <option value="3">Yes - VAT is NOT IN cost Price</option>

                    </select>
                    <has-error :form="form" field="vatinclussive"></has-error>
                                            </div>
                                        </div>
                                    </div>
                                </div>





  <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">UNIT COST</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input :value="form.unitcost" type="text"  id="unitcost"   @keyup="updateunitcost" @keypress="updateunitcost" name="unitcost" class="form-control" :class="{ 'is-invalid': form.errors.has('unitcost') }">
                                           <has-error :form="form" field="unitcost"></has-error>
      
                                            </div>
                                        </div>
                                    </div>
                                </div>




  <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">QUANTITY TO PURCHASE</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                            <input type="number" :value="form.quantity" id="quantity" @keyup="updatequantity" @keypress="updatequantity" name="quantity" class="form-control" :class="{ 'is-invalid': form.errors.has('quantity') }">
                                            <has-error :form="form" field="quantity"></has-error>
 
                                            </div>
                                        </div>
                                    </div>
                                </div>




  <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">TOTAL COST</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                          <input type="text" :value="form.totalcost"  name="totalcost" readonly class="form-control"  :class="{ 'is-invalid': form.errors.has('totalcost') }" >

                                             <has-error :form="form" field="totalcost"></has-error>
                                            </div>
                                        </div>
                                    </div>
                                </div>





<br>






 <div  class="modal-footer">
   <button v-if="invoicelockstatus  == '0'"  type="submit"   class="btn btn-primary btn-sm"> Add to invoice</button>
                
                      <button  v-if="this.form.newqty >= 0"  type="submit" class="btn btn-success btn-sm" >Add</button>
                        <button  type="button" data-dismiss="modal" class="btn btn-danger btn-sm">Cancel</button >
                        </div>
  


                             
      
                             
</form>
                       </div>
                          </div>
                </div>
<!-- 
<div id="emm" style="width:70%;">
    <h1 style="padding-left:80px;">Visual Display</h1>
    <GChart
      type="BarChart"
      :data="chartData"
     
    />    
  </div> -->



          <!-- end of the body -->
 </div>

<!-- closure of allowed -->
<!--   if not authorised -->



</div>
<!----   End of not Authorised --->








          

    </div>
</template>

<script>
import { GChart } from "vue-google-charts";
    export default {
       name: "emm",
  components: {
    GChart
  },
         data(){
           
        return {

           chartData: [
        ["Language", "Blog"],
        ["PHP", 180],
        ["Laravel", 200],
        ["Html", 300],
        ["vue.js", 150],
      ],
      chartOptions: {
        chart: {
          title: "Company Performance",
          subtitle: "blog in total: languages"
        }
      },
             country: 0,
        

                countries: [],
                roleslist: [],
                typeslist:[],
supplierslist:[],
invoiceslist:[],
productslist:[],
walletsofeapenselist:[],
productsandpriceslist:[],
            ///////////////////////////////////
          brancheslist: [],
          productcategorieslist:[],
          customerslist:[],
          productbrandslist:[],
        unitmeasurelist:[],
         ///// Access authorities
         generalProductscomponentAccess:'',
         categoriesComponentaccess:'',
brandsComponentaccess:'',
unitsofmeasureComponentaccess:'',
companyproductsComponentaccess:'',
purchasesComponentaccess:'',
purchaserecordsComponentaccess:'',
salessummaryComponentaccess:'',
         branchesccessSettings:'',
           
         rolesaccessSettings:'',
         mainmenuaccessSettings:'',
         submenuaccessSettings:'',
         componentaccessSettings:'',
         featuresaccessSettings:'',

       
       ////////////////////////////////////////////////////////////////////////////////////
          myValue: '',
          myOptions: [], // or [{id: key, text: value}, {id: key, text: value}]
          editmode: false,
           shopingcartdetails:{},
           walletstorecievemoney:{},
            customerdetailsrecords : {},
          salesreportsummaryrecords : {},
          salesdetailsreportdetailedrecords:{},
          customerstatementrecords:{},
          totalsalesdailysalesreports:{},

          salesdetailscostofthesalesmadetotalrange:{},
salesdetailsalesmadetotalrange:{},
salesdetailvatcollectedtotalrange:{},
salesdetailsgrossprofittotalrange:{},

totaldailysalesvatinclusiverangereports:{},
totaldailytotalcostrangereports:{},
totaldailygrossprofitrangereports:{},
totaldailytotalvatrangereports:{},
totaldailysaleswithouttaxgrossrangereports:{},
totaldailylineprofitrangereports:{},


salesreportsatartingdate:{},
salesreportendingdate :{},

salesreportdetailstotalsales:{},
salesreportdetailstotalcost:{},
salesreportdetailstotalprofit:{},
salesreportdetailstotalvat:{},

salesreportdetailsgrosssales:{},
salesreportdetailslineprofit:{},


          totalvatdailysalesreports:{},
totalnetinvoicedailysalesreports:{},
          activeinvoicetoupdaterecords:{},
          getthinvoicenumberactive:{},
          getthinvoicedocumentno:{},
          gettheinvoicevatamount:{},
gettheinvoicegrandtotal:{},
gettheinvoicetotalwithoutvat:{},
          getthinvoicesuppliername:{},
          gettheinvoicedate:{},
          getinvoicepaymentstatus:{},
gettheinvoicedeliverystatus:{},
          productbrandsrecords:{},
          productunitofmeasurerecords:{},
          productpurchasesdetailrecords:{},
          purchaseincoicesummaryrecords:{},
          salessummaryrecords:{},
          activeproductsonsalerecords:{},

          productdetailsrecords:{},
          productstoaddtoinvoicerecords:{},
          datarecordsSubmenusauthorised:{},
          allowedrolecomponentsObject :{},
          datarecordsMainmenuauthorised:{},
          allowedrolecomponentfeaturesObject : {},
          allowedtoaddmainmenuaccess:{},
          allowedtoaddsubmenuaccess:{},
          allowedtorevokesubmenuaccess:{},
          allowedtorevokecomponentaccess:{},
          allowedtogivecomponentaccess:{},

          allowedtodeleteProductCategory:{},
          allowedtoeditbranch:{},
          inputvatamount:{},
          shopcashbalance:{},
          dailytotalsalesforselection:{},
             dailyvatcollectedforselection:{},
          outputvatamount:{},
          invoicelockstatus:{},


         // brancheslist:{},
          componentslist:{},
          submenulist:{},
          mainmenulist:{},
          formfeatures:{},
          form: new Form({
                /// Users Form
totalcost:1,
unitcost :1,
quantity: 1,
finalcost:'',
amountpaid:'',
unitoutputvat: 1,
netprofit:1,
unitsellingprice:1,
customername:'',
bal:'',
dop:'',
                id: '',
                name:'',
                email:'',
                supplierinvoiceno:'',
                productcode:'',
                unitprice:'',
                quantity:'',
                
                rolename:'',
                type:'',
                catname:'',
                brandname:'',
                 unitname:'',
                  shotcode:'',
                    productname:'',
                  category:'',


////////////////////////////////////////////////////////Branches
grandtotal:'',
invoicebalance:'',
amountbeingpaid:'',
lineproductcost:'',
unitvat:'',
branchname: '',
openningbalance:'',
contact:'', 
location:'',
/////id, suppname, description, created_at, updated_at, ucret, contact, location, company, contactofcontact, companycontactperson, del

         suppname: '',
description:'',
contact:'', 
location:'',     
company:'',
contactofcontact:'', 
companycontactperson:'',       


            })
            }
         },

methods:{

   searchit: _.debounce(() => {
        Fire.$emit('searching');
      },1000),

      printme(){
        window.print();
      },

  printuuy() {
      var prtContent = document.getElementById("print");
      var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
      WinPrint.document.write(prtContent.innerHTML);
      WinPrint.document.close();
      WinPrint.focus();
      WinPrint.print();
      WinPrint.close();
    },
//  SENA HARDWARE
updateunitsellingprice(event) {
        this.form.unitsellingprice = event.target.value
        this.form.unitoutputvat = this.form.unitsellingprice * 0.18
        this.form.netprofit = (this.form.unitsellingprice)- (this.form.unitprice) - (this.form.unitsellingprice * 0.18)
      },





updateunitcost(event) {
        this.form.unitcost = event.target.value
        this.form.totalcost = this.form.unitcost * this.form.quantity
      },
      updatequantity(event) {
        this.form.quantity = event.target.value
        this.form.totalcost = this.form.unitcost * this.form.quantity
      },
        updateremaininginvoicebalance(event) {
        this.form.amountbeingpaid = event.target.value
        this.form.invoicebalance = (this.form.finalcost)-(this.form.amountpaid)-(this.form.amountbeingpaid)
      },




savecustomerstatementFilter(){

                                this.loading = true;
                                this.form.post('api/customerstatementdetailsFilter')
                                .then(()=>{
  
  axios.get("api/customerstatementrecords").then(({ data }) => (this.customerstatementrecords = data));
 
//axios.get("api/makeexpenseofficeuser").then(({ data }) => (this.officemadeexpensesrecords = data));
                                // Toast.fire({
                                // icon: 'success',
                                // title: 'Record Added Successfully'
                                // });

                                                              this.loading = false;

                                  this.form.clear();
        this.form.reset();
                                })
                                .catch(()=>{

                                })

}, 














  viewcustomerstatement(customerdetailsrecords){
                this.editmode = true;
                 this.form.clear();
        this.form.reset();
        this.form.fill(customerdetailsrecords);

$('#customerstatementModal').modal('show');
            },   


  recievecustomerpayment(customerdetailsrecords){
                this.editmode = true;
                 this.form.clear();
        this.form.reset();
        this.form.fill(customerdetailsrecords);

$('#customerpaymentModal').modal('show');
            },   


recieveCustomercash(){
      this.$Progress.start();
        this.form.post('api/recievethecustomerPayment')
        .then(()=>{

         
    $('#customerpaymentModal').modal('hide');
    this.form.reset();
       axios.get("api/customerdetailsrecords").then(({ data }) => (this.customerdetailsrecords = data));
   

  Toast.fire({
  icon: 'success',
  title: 'Customer Payment Recieved'
});
        this.$Progress.finish();
//axios.get("api/authorisedcomponents").then(({ data }) => (this.allowedrolecomponentsObject = data));
        })
        .catch(()=>{
          
        })
         
    },





 saveproductdetailsFilter(){

                                this.loading = true;
                                this.form.post('api/productdetailsFiltertoview')
                                .then(()=>{
  
  axios.get("api/productdetailsrecords").then(({ data }) => (this.productdetailsrecords = data));
 
//axios.get("api/makeexpenseofficeuser").then(({ data }) => (this.officemadeexpensesrecords = data));
                                // Toast.fire({
                                // icon: 'success',
                                // title: 'Record Added Successfully'
                                // });

                                                              this.loading = false;

                                  this.form.clear();
        this.form.reset();
                                })
                                .catch(()=>{

                                })

}, 



saveinvoiceInaction(){

                                this.loading = true;
                                this.form.post('api/invoicenumbertocheck')
                                .then(()=>{
    axios.get("api/invoicelockstatus").then(({ data }) => (this.invoicelockstatus = data));
    axios.get("api/activeinvoicetoupdaterecords").then(({ data }) => (this.activeinvoicetoupdaterecords = data));
  axios.get("api/getthinvoicenumberactive").then(({ data }) => (this.getthinvoicenumberactive = data));
 axios.get("api/getthinvoicesuppliername").then(({ data }) => (this.getthinvoicesuppliername = data));
    axios.get("api/productpurchasesdetailrecords").then(({ data }) => (this.productpurchasesdetailrecords = data));
axios.get("api/getthinvoicedocumentno").then(({ data }) => (this.getthinvoicedocumentno = data));
axios.get("api/gettheinvoicedeliverystatus").then(({ data }) => (this.gettheinvoicedeliverystatus = data));
axios.get("api/getinvoicepaymentstatus").then(({ data }) => (this.getinvoicepaymentstatus = data));
axios.get("api/gettheinvoicedate").then(({ data }) => (this.gettheinvoicedate = data));
  
axios.get("api/gettheinvoicevatamount").then(({ data }) => (this.gettheinvoicevatamount = data));
axios.get("api/gettheinvoicegrandtotal").then(({ data }) => (this.gettheinvoicegrandtotal = data));
axios.get("api/gettheinvoicetotalwithoutvat").then(({ data }) => (this.gettheinvoicetotalwithoutvat = data));
  
 axios.get("api/getcurrencydetails").then(({ data }) => (this.currencydetails = data));




// getthinvoicesuppliername
// gettheinvoicedate

  
  // Toast.fire({
                                // icon: 'success',
                                // title: 'Record Added Successfully'
                                // });

                                                              this.loading = false;

                                  this.form.clear();
        this.form.reset();
                                })
                                .catch(()=>{

                                })

}, 











  savedatesforcustomerstatement(){

                                this.loading = true;
                                this.form.post('api/satecustomerstatementtoview')
                                .then(()=>{


//////////////////

axios.get("api/customerstatementrecords").then(({ data }) => (this.customerstatementrecords = data));
 axios.get("api/salesdetailscostofthesalesmadetotalrange").then(({ data }) => (this.salesdetailscostofthesalesmadetotalrange = data));
          axios.get("api/salesdetailsalesmadetotalrange").then(({ data }) => (this.salesdetailsalesmadetotalrange = data));
           axios.get("api/salesdetailvatcollectedtotalrange").then(({ data }) => (this.salesdetailvatcollectedtotalrange = data));
            axios.get("api/salesdetailsgrossprofittotalrange").then(({ data }) => (this.salesdetailsgrossprofittotalrange = data));
/////
axios.get("api/salesreportsatartingdate").then(({ data }) => (this.salesreportsatartingdate = data));
        axios.get("api/salesreportendingdate").then(({ data }) => (this.salesreportendingdate = data));
        axios.get("api/salesreportdetailstotalsales").then(({ data }) => (this.salesreportdetailstotalsales = data));
          axios.get("api/salesreportdetailstotalcost").then(({ data }) => (this.salesreportdetailstotalcost = data));
        axios.get("api/salesreportdetailstotalprofit").then(({ data }) => (this.salesreportdetailstotalprofit = data));
        axios.get("api/salesreportdetailstotalvat").then(({ data }) => (this.salesreportdetailstotalvat = data));
          axios.get("api/salesreportdetailsgrosssales").then(({ data }) => (this.salesreportdetailsgrosssales = data));
        axios.get("api/salesreportdetailslineprofit").then(({ data }) => (this.salesreportdetailslineprofit = data));
       axios.get("api/productbrandsrecords").then(({ data }) => (this.productbrandsrecords = data));
    /////
// axios.get("api/salesdetailsreportdetailedrecords").then(({ data }) => (this.salesdetailsreportdetailedrecords = data));
// axios.get("api/customerstatementrecords").then(({ data }) => (this.customerstatementrecords = data));
// axios.get('/api/dailyvatcollectedforselection').then(function (response) { this.dailyvatcollectedforselection = response.data;}.bind(this));
// axios.get('/api/dailytotalsalesforselection').then(function (response) { this.dailytotalsalesforselection = response.data;}.bind(this));
// axios.get('/api/salesreportsummaryrecords').then(function (response) { this.salesreportsummaryrecords = response.data;}.bind(this));
// //////////////////////
//  axios.get("api/totaldailysalesvatinclusiverangereports").then(({ data }) => (this.totaldailysalesvatinclusiverangereports = data));
//         axios.get("api/totaldailytotalcostrangereports").then(({ data }) => (this.totaldailytotalcostrangereports = data));
//         axios.get("api/totaldailygrossprofitrangereports").then(({ data }) => (this.totaldailygrossprofitrangereports = data));
//           axios.get("api/totaldailytotalvatrangereports").then(({ data }) => (this.totaldailytotalvatrangereports = data));
//         axios.get("api/totaldailysaleswithouttaxgrossrangereports").then(({ data }) => (this.totaldailysaleswithouttaxgrossrangereports = data));
//         axios.get("api/totaldailylineprofitrangereports").then(({ data }) => (this.totaldailylineprofitrangereports = data));
// ///////////////

  // axios.get("api/salesreportsatartingdate").then(({ data }) => (this.salesreportsatartingdate = data));
  //       axios.get("api/salesreportendingdate").then(({ data }) => (this.salesreportendingdate = data));
  //       axios.get("api/salesreportdetailstotalsales").then(({ data }) => (this.salesreportdetailstotalsales = data));
  //         axios.get("api/salesreportdetailstotalcost").then(({ data }) => (this.salesreportdetailstotalcost = data));
  //       axios.get("api/salesreportdetailstotalprofit").then(({ data }) => (this.salesreportdetailstotalprofit = data));
  //       axios.get("api/salesreportdetailstotalvat").then(({ data }) => (this.salesreportdetailstotalvat = data));
  //         axios.get("api/salesreportdetailsgrosssales").then(({ data }) => (this.salesreportdetailsgrosssales = data));
  //       axios.get("api/salesreportdetailslineprofit").then(({ data }) => (this.salesreportdetailslineprofit = data));
  //      axios.get("api/productbrandsrecords").then(({ data }) => (this.productbrandsrecords = data));
//  axios.get("api/fishcollections").then(({ data }) => (this.fishcollectionrecords = data));
//axios.get("api/makeexpenseofficeuser").then(({ data }) => (this.officemadeexpensesrecords = data));
                                // Toast.fire({
                                // icon: 'success',
                                // title: 'Record Added Successfully'
                                // });

                                                              this.loading = false;

                                  this.form.clear();
        this.form.reset();
                                })
                                .catch(()=>{

                                })

}, 














// 
getRoles: function(){ axios.get('/api/getRoles').then(function (response) { this.roleslist = response.data;}.bind(this));},
getUsertypes: function(){ axios.get('/api/getUsertypes').then(function (response) { this.typeslist = response.data;}.bind(this));},


    formatPrice(value) {
        let val = (value/1).toFixed(0).replace('.', ',')
        return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")
    },

   
                              
tosubmitProductcategoryfilter($event) { const elem = this.$refs.buttontosubmitProductcategoryFilter
            elem.click()
        },
tosubmitInvoivenumbertoview($event) { const elem = this.$refs.buttontosubmitinvoicenumbertoview
            elem.click()
        },

tosubmitProductdetailfilter($event) { const elem = this.$refs.buttontosubmitProductdetailFilter
            elem.click()
        },




















    /// submiting the balancing record date and branch
myClickEventroletoaddcomponent($event) { const elem = this.$refs.myBtnroledd
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
     axios.get("api/authorisedmainmenus").then(({ data }) => (this.datarecordsMainmenuauthorised = data));
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
                            this.datarecordsMainmenuauthorised = response.data;
                          });
                      },



paginationroleAuthorisedcomponents(page = 1) {
                        axios.get('api/authorisedcomponents?page=' + page)
                          .then(response => {
                            this.allowedrolecomponentsObject = response.data;
                          });
                      },


paginationroleAuthorisedcomponentsfeature(page = 1) {
                        axios.get('api/authorisedformcomponents?page=' + page)
                          .then(response => {
                            this.allowedrolecomponentfeaturesObject = response.data;
                          });
                      },


      

paginationResultsProductdetailsrecords(page = 1) {
                        axios.get('api/productdetailsrecords?page=' + page)
                          .then(response => {
                            this.productdetailsrecords = response.data;
                          });
                      },


   paginationResultsProductcategories(page = 1) {
                        axios.get('api/salesreportsummaryrecords?page=' + page)
                          .then(response => {
                            this.salesreportsummaryrecords = response.data;
                          });
                      },
  /// users
  

    laodProductdetails(){
       axios.get("api/productdetailsrecords").then(({ data }) => (this.productdetailsrecords = data));
     axios.get("api/productstoaddtoinvoicerecords").then(({ data }) => (this.productstoaddtoinvoicerecords = data));
        axios.get("api/generalProductscomponentAccess").then(({ data }) => (this.generalProductscomponentAccess = data));
        axios.get("api/branchesccessSettings").then(({ data }) => (this.branchesccessSettings = data));
        axios.get("api/rolesaccessSettings").then(({ data }) => (this.rolesaccessSettings = data));
        axios.get("api/submenuaccessSettings").then(({ data }) => (this.submenuaccessSettings = data));
        axios.get("api/componentaccessSettings").then(({ data }) => (this.componentaccessSettings = data));
        axios.get("api/mainmenuaccessSettings").then(({ data }) => (this.mainmenuaccessSettings = data));
        axios.get("api/featuresaccessSettings").then(({ data }) => (this.featuresaccessSettings = data));
axios.get('/api/unitmeasurelist').then(function (response) { this.unitmeasurelist = response.data;}.bind(this));
axios.get('/api/productbrandslist').then(function (response) { this.productbrandslist = response.data;}.bind(this));


        //  axios.get('/api/branchDetails').then(function (response) { this.brancheslist = response.data;}.bind(this));
        axios.get("api/brandsComponentaccess").then(({ data }) => (this.brandsComponentaccess = data));
axios.get("api/categoriesComponentaccess").then(({ data }) => (this.categoriesComponentaccess = data));
axios.get("api/unitsofmeasureComponentaccess").then(({ data }) => (this.unitsofmeasureComponentaccess = data));
axios.get("api/companyproductsComponentaccess").then(({ data }) => (this.companyproductsComponentaccess = data));
axios.get("api/purchasesComponentaccess").then(({ data }) => (this.purchasesComponentaccess = data));
axios.get("api/purchaserecordsComponentaccess").then(({ data }) => (this.purchaserecordsComponentaccess = data));
// axios.get("api/salessummaryComponentaccess").then(({ data }) => (this.salessummaryComponentaccess = data));

  },
    loadSalesdetailsreportdetailed(){

               



  axios.get("api/salesreportsatartingdate").then(({ data }) => (this.salesreportsatartingdate = data));
        axios.get("api/salesreportendingdate").then(({ data }) => (this.salesreportendingdate = data));
        axios.get("api/salesreportdetailstotalsales").then(({ data }) => (this.salesreportdetailstotalsales = data));
          axios.get("api/salesreportdetailstotalcost").then(({ data }) => (this.salesreportdetailstotalcost = data));
        axios.get("api/salesreportdetailstotalprofit").then(({ data }) => (this.salesreportdetailstotalprofit = data));
        axios.get("api/salesreportdetailstotalvat").then(({ data }) => (this.salesreportdetailstotalvat = data));
          axios.get("api/salesreportdetailsgrosssales").then(({ data }) => (this.salesreportdetailsgrosssales = data));
        axios.get("api/salesreportdetailslineprofit").then(({ data }) => (this.salesreportdetailslineprofit = data));
















        axios.get("api/salesdetailsreportdetailedrecords").then(({ data }) => (this.salesdetailsreportdetailedrecords = data));
        axios.get("api/generalProductscomponentAccess").then(({ data }) => (this.generalProductscomponentAccess = data));
        axios.get("api/branchesccessSettings").then(({ data }) => (this.branchesccessSettings = data));
        axios.get("api/rolesaccessSettings").then(({ data }) => (this.rolesaccessSettings = data));
        axios.get("api/submenuaccessSettings").then(({ data }) => (this.submenuaccessSettings = data));
        axios.get("api/componentaccessSettings").then(({ data }) => (this.componentaccessSettings = data));
        axios.get("api/mainmenuaccessSettings").then(({ data }) => (this.mainmenuaccessSettings = data));
        axios.get("api/featuresaccessSettings").then(({ data }) => (this.featuresaccessSettings = data));
        axios.get('/api/unitmeasurelist').then(function (response) { this.unitmeasurelist = response.data;}.bind(this));
        axios.get('/api/productbrandslist').then(function (response) { this.productbrandslist = response.data;}.bind(this));
        //  axios.get('/api/branchDetails').then(function (response) { this.brancheslist = response.data;}.bind(this));

         axios.get("api/salesdetailscostofthesalesmadetotalrange").then(({ data }) => (this.salesdetailscostofthesalesmadetotalrange = data));
          axios.get("api/salesdetailsalesmadetotalrange").then(({ data }) => (this.salesdetailsalesmadetotalrange = data));
           axios.get("api/salesdetailvatcollectedtotalrange").then(({ data }) => (this.salesdetailvatcollectedtotalrange = data));
            axios.get("api/salesdetailsgrossprofittotalrange").then(({ data }) => (this.salesdetailsgrossprofittotalrange = data));



  },
// ----------------------------------------------------------------------------------------


loadPurchaseInvoicessummary(){
        axios.get("api/purchaseincoicesummaryrecords").then(({ data }) => (this.purchaseincoicesummaryrecords = data));
        axios.get('/api/invoiceslist').then(function (response) { this.invoiceslist = response.data;}.bind(this));
      

  },

  

loadPurchaserecords(){
        axios.get("api/productpurchasesdetailrecords").then(({ data }) => (this.productpurchasesdetailrecords = data));
        axios.get('/api/invoiceslist').then(function (response) { this.invoiceslist = response.data;}.bind(this));
      

  },
loadsalesSummary(){
        axios.get("api/salessummaryrecords").then(({ data }) => (this.salessummaryrecords = data));
       

  },

  



loadactiveProductsonSale(){
        axios.get("api/activeproductsonsalerecords").then(({ data }) => (this.activeproductsonsalerecords = data));
      

  },



////------------------------------------------------------------------------------------------------------------------
  loadSalesreportsummary(){

                     



  axios.get("api/salesreportsatartingdate").then(({ data }) => (this.salesreportsatartingdate = data));
        axios.get("api/salesreportendingdate").then(({ data }) => (this.salesreportendingdate = data));
        axios.get("api/salesreportdetailstotalsales").then(({ data }) => (this.salesreportdetailstotalsales = data));
          axios.get("api/salesreportdetailstotalcost").then(({ data }) => (this.salesreportdetailstotalcost = data));
        axios.get("api/salesreportdetailstotalprofit").then(({ data }) => (this.salesreportdetailstotalprofit = data));
        axios.get("api/salesreportdetailstotalvat").then(({ data }) => (this.salesreportdetailstotalvat = data));
          axios.get("api/salesreportdetailsgrosssales").then(({ data }) => (this.salesreportdetailsgrosssales = data));
        axios.get("api/salesreportdetailslineprofit").then(({ data }) => (this.salesreportdetailslineprofit = data));
       axios.get("api/productbrandsrecords").then(({ data }) => (this.productbrandsrecords = data));
     
        axios.get("api/generalProductscomponentAccess").then(({ data }) => (this.generalProductscomponentAccess = data));
        axios.get("api/branchesccessSettings").then(({ data }) => (this.branchesccessSettings = data));
        axios.get("api/rolesaccessSettings").then(({ data }) => (this.rolesaccessSettings = data));
        axios.get("api/submenuaccessSettings").then(({ data }) => (this.submenuaccessSettings = data));
        axios.get("api/componentaccessSettings").then(({ data }) => (this.componentaccessSettings = data));
        axios.get("api/mainmenuaccessSettings").then(({ data }) => (this.mainmenuaccessSettings = data));
        axios.get("api/featuresaccessSettings").then(({ data }) => (this.featuresaccessSettings = data));

axios.get('/api/productbrandslist').then(function (response) { this.productbrandslist = response.data;}.bind(this));
        //  axios.get('/api/branchDetails').then(function (response) { this.brancheslist = response.data;}.bind(this));
        axios.get("api/brandsComponentaccess").then(({ data }) => (this.brandsComponentaccess = data));
axios.get("api/categoriesComponentaccess").then(({ data }) => (this.categoriesComponentaccess = data));
axios.get("api/unitsofmeasureComponentaccess").then(({ data }) => (this.unitsofmeasureComponentaccess = data));
axios.get("api/companyproductsComponentaccess").then(({ data }) => (this.companyproductsComponentaccess = data));
axios.get("api/purchasesComponentaccess").then(({ data }) => (this.purchasesComponentaccess = data));
axios.get("api/purchaserecordsComponentaccess").then(({ data }) => (this.purchaserecordsComponentaccess = data));
axios.get("api/salessummaryComponentaccess").then(({ data }) => (this.salessummaryComponentaccess = data));

  },
  loadContactdetailscustomers(){
    axios.get("api/customerdetailsrecords").then(({ data }) => (this.customerdetailsrecords = data));
     
  },
  loadDailysalesreportdetails(){

    
    axios.get("api/totaldailysalesvatinclusiverangereports").then(({ data }) => (this.totaldailysalesvatinclusiverangereports = data));
        axios.get("api/totaldailytotalcostrangereports").then(({ data }) => (this.totaldailytotalcostrangereports = data));
        axios.get("api/totaldailygrossprofitrangereports").then(({ data }) => (this.totaldailygrossprofitrangereports = data));
          axios.get("api/totaldailytotalvatrangereports").then(({ data }) => (this.totaldailytotalvatrangereports = data));
        axios.get("api/totaldailysaleswithouttaxgrossrangereports").then(({ data }) => (this.totaldailysaleswithouttaxgrossrangereports = data));
        axios.get("api/totaldailylineprofitrangereports").then(({ data }) => (this.totaldailylineprofitrangereports = data));

////////////////////

  axios.get("api/salesreportsatartingdate").then(({ data }) => (this.salesreportsatartingdate = data));
        axios.get("api/salesreportendingdate").then(({ data }) => (this.salesreportendingdate = data));
        axios.get("api/salesreportdetailstotalsales").then(({ data }) => (this.salesreportdetailstotalsales = data));
          axios.get("api/salesreportdetailstotalcost").then(({ data }) => (this.salesreportdetailstotalcost = data));
        axios.get("api/salesreportdetailstotalprofit").then(({ data }) => (this.salesreportdetailstotalprofit = data));
        axios.get("api/salesreportdetailstotalvat").then(({ data }) => (this.salesreportdetailstotalvat = data));
          axios.get("api/salesreportdetailsgrosssales").then(({ data }) => (this.salesreportdetailsgrosssales = data));
        axios.get("api/salesreportdetailslineprofit").then(({ data }) => (this.salesreportdetailslineprofit = data));




              


///////////////////


        axios.get("api/totalnetinvoicedailysalesreports").then(({ data }) => (this.totalnetinvoicedailysalesreports = data));
        axios.get("api/totalvatdailysalesreports").then(({ data }) => (this.totalvatdailysalesreports = data));
        axios.get("api/totalsalesdailysalesreports").then(({ data }) => (this.totalsalesdailysalesreports = data));

       
       axios.get("api/salesreportsummaryrecords").then(({ data }) => (this.salesreportsummaryrecords = data));
        axios.get("api/customerstatementrecords").then(({ data }) => (this.customerstatementrecords = data));
         axios.get("api/salesdetailsreportdetailedrecords").then(({ data }) => (this.salesdetailsreportdetailedrecords = data));

       axios.get('/api/productcategorieslist').then(function (response) { this.productcategorieslist = response.data;}.bind(this));
     //  this.getRoles();
     //  this.getUsertypes();
        this.checkBranchescomponentfeatures();

axios.get("api/brandsComponentaccess").then(({ data }) => (this.brandsComponentaccess = data));
axios.get("api/categoriesComponentaccess").then(({ data }) => (this.categoriesComponentaccess = data));
axios.get("api/unitsofmeasureComponentaccess").then(({ data }) => (this.unitsofmeasureComponentaccess = data));
axios.get("api/companyproductsComponentaccess").then(({ data }) => (this.companyproductsComponentaccess = data));
axios.get("api/purchasesComponentaccess").then(({ data }) => (this.purchasesComponentaccess = data));
axios.get("api/purchaserecordsComponentaccess").then(({ data }) => (this.purchaserecordsComponentaccess = data));
axios.get("api/salessummaryComponentaccess").then(({ data }) => (this.salessummaryComponentaccess = data));












        axios.get("api/generalProductscomponentAccess").then(({ data }) => (this.generalProductscomponentAccess = data));
        axios.get("api/branchesccessSettings").then(({ data }) => (this.branchesccessSettings = data));
        axios.get("api/rolesaccessSettings").then(({ data }) => (this.rolesaccessSettings = data));
        axios.get("api/submenuaccessSettings").then(({ data }) => (this.submenuaccessSettings = data));
        axios.get("api/componentaccessSettings").then(({ data }) => (this.componentaccessSettings = data));
        axios.get("api/mainmenuaccessSettings").then(({ data }) => (this.mainmenuaccessSettings = data));
        axios.get("api/featuresaccessSettings").then(({ data }) => (this.featuresaccessSettings = data));

         axios.get('/api/branchDetails').then(function (response) { this.brancheslist = response.data;}.bind(this));

  },

loadSubmenaccess(){
        axios.get("api/authorisedsubmenus").then(({ data }) => (this.datarecordsSubmenusauthorised = data));
          
        axios.get("api/getSubmenues").then(({ data }) => (this.submenulist = data));
      //  this.getRoles();
      //  this.getUsertypes();
     axios.get("api/brandsComponentaccess").then(({ data }) => (this.brandsComponentaccess = data));
axios.get("api/categoriesComponentaccess").then(({ data }) => (this.categoriesComponentaccess = data));
axios.get("api/unitsofmeasureComponentaccess").then(({ data }) => (this.unitsofmeasureComponentaccess = data));
axios.get("api/companyproductsComponentaccess").then(({ data }) => (this.companyproductsComponentaccess = data));
axios.get("api/purchasesComponentaccess").then(({ data }) => (this.purchasesComponentaccess = data));
axios.get("api/purchaserecordsComponentaccess").then(({ data }) => (this.purchaserecordsComponentaccess = data));
axios.get("api/salessummaryComponentaccess").then(({ data }) => (this.salessummaryComponentaccess = data));
    axios.get("api/generalProductscomponentAccess").then(({ data }) => (this.generalProductscomponentAccess = data));
        axios.get("api/branchesccessSettings").then(({ data }) => (this.branchesccessSettings = data));
        axios.get("api/rolesaccessSettings").then(({ data }) => (this.rolesaccessSettings = data));
        axios.get("api/submenuaccessSettings").then(({ data }) => (this.submenuaccessSettings = data));
        axios.get("api/componentaccessSettings").then(({ data }) => (this.componentaccessSettings = data));
        axios.get("api/mainmenuaccessSettings").then(({ data }) => (this.mainmenuaccessSettings = data));
        axios.get("api/featuresaccessSettings").then(({ data }) => (this.featuresaccessSettings = data));
  
this.checkSubmenuaccessfeatures();
  },

loadMainmenuaccess(){
     this.checkMainmenuaccessfeatures();
axios.get("api/authorisedmainmenus").then(({ data }) => (this.datarecordsMainmenuauthorised = data));
          
        axios.get("api/getMainmenues").then(({ data }) => (this.mainmenulist = data));
axios.get("api/brandsComponentaccess").then(({ data }) => (this.brandsComponentaccess = data));
axios.get("api/categoriesComponentaccess").then(({ data }) => (this.categoriesComponentaccess = data));
axios.get("api/unitsofmeasureComponentaccess").then(({ data }) => (this.unitsofmeasureComponentaccess = data));
axios.get("api/companyproductsComponentaccess").then(({ data }) => (this.companyproductsComponentaccess = data));
axios.get("api/purchasesComponentaccess").then(({ data }) => (this.purchasesComponentaccess = data));
axios.get("api/purchaserecordsComponentaccess").then(({ data }) => (this.purchaserecordsComponentaccess = data));
axios.get("api/salessummaryComponentaccess").then(({ data }) => (this.salessummaryComponentaccess = data));
      axios.get("api/generalProductscomponentAccess").then(({ data }) => (this.generalProductscomponentAccess = data));
        axios.get("api/branchesccessSettings").then(({ data }) => (this.branchesccessSettings = data));
        
        axios.get("api/rolesaccessSettings").then(({ data }) => (this.rolesaccessSettings = data));
        axios.get("api/submenuaccessSettings").then(({ data }) => (this.submenuaccessSettings = data));
        axios.get("api/componentaccessSettings").then(({ data }) => (this.componentaccessSettings = data));
        axios.get("api/mainmenuaccessSettings").then(({ data }) => (this.mainmenuaccessSettings = data));
        axios.get("api/featuresaccessSettings").then(({ data }) => (this.featuresaccessSettings = data));


  },
  loadcomponentsAllowedfortherole(){
        axios.get("api/authorisedcomponents").then(({ data }) => (this.allowedrolecomponentsObject = data));
        
        axios.get("api/getlistofcomponents").then(({ data }) => (this.componentslist = data));
      //  this.getRoles();
      //  this.getUsertypes();
      axios.get("api/brandsComponentaccess").then(({ data }) => (this.brandsComponentaccess = data));
axios.get("api/categoriesComponentaccess").then(({ data }) => (this.categoriesComponentaccess = data));
axios.get("api/unitsofmeasureComponentaccess").then(({ data }) => (this.unitsofmeasureComponentaccess = data));
axios.get("api/companyproductsComponentaccess").then(({ data }) => (this.companyproductsComponentaccess = data));
axios.get("api/purchasesComponentaccess").then(({ data }) => (this.purchasesComponentaccess = data));
axios.get("api/purchaserecordsComponentaccess").then(({ data }) => (this.purchaserecordsComponentaccess = data));
axios.get("api/salessummaryComponentaccess").then(({ data }) => (this.salessummaryComponentaccess = data));
    axios.get("api/generalProductscomponentAccess").then(({ data }) => (this.generalProductscomponentAccess = data));
        axios.get("api/branchesccessSettings").then(({ data }) => (this.branchesccessSettings = data));
        axios.get("api/rolesaccessSettings").then(({ data }) => (this.rolesaccessSettings = data));
        axios.get("api/submenuaccessSettings").then(({ data }) => (this.submenuaccessSettings = data));
        axios.get("api/componentaccessSettings").then(({ data }) => (this.componentaccessSettings = data));
        axios.get("api/mainmenuaccessSettings").then(({ data }) => (this.mainmenuaccessSettings = data));
        axios.get("api/featuresaccessSettings").then(({ data }) => (this.featuresaccessSettings = data));
     this.checkComponentaccessfeatures();
  

  },



   loadcomponentsAllowedcomponentfeatures(){
      axios.get("api/authorisedformcomponents").then(({ data }) => (this.allowedrolecomponentfeaturesObject = data));
        axios.get("api/getformfeatures").then(({ data }) => (this.formfeatures = data));

        axios.get("api/getlistofcomponents").then(({ data }) => (this.componentslist = data));
       this.getRoles();
       
     
  

  },

newmainmenuaccess(){
        this.editmode = false;
        this.form.clear();
        this.form.reset();
     
     $('#addnewaccesstomainmenu').modal('show');
            },
newsubmenuaccess(){
        this.editmode = false;
        this.form.clear();
        this.form.reset();
     
     $('#addnewaccesstosubmenu').modal('show');
            },
                    


 newcomponentadd(){
        this.editmode = false;
        this.form.clear();
        this.form.reset();
     
     $('#addnewComponenttotheRole').modal('show');
            },

newcomponentfeatureadd(){
        this.editmode = false;
        this.form.clear();
        this.form.reset();
     
     $('#addnewcomponentfeature').modal('show');
            },
        
     newproductModal(){
        this.editmode = false;
        this.form.clear();
        this.form.reset();
     
     $('#pruductdetailModal').modal('show');
            },
            
             updateinvoiceproductsModal(){
        this.editmode = false;
        this.form.clear();
        this.form.reset();
     
     $('#updateinvoiceproductsModal').modal('show');
            },
            newpurchaseInvoice(){
        this.editmode = false;
        this.form.clear();
        this.form.reset();
     
     $('#newpurchaseinvoiceModal').modal('show');
            },
newproductunitofmeasureModal(){
        this.editmode = false;
        this.form.clear();
        this.form.reset();
     
     $('#unitofmeasureModal').modal('show');
            },

 newproductbrandModal(){
        this.editmode = false;
        this.form.clear();
        this.form.reset();
     
     $('#addnewproductbrandsModal').modal('show');
            },


addmyselectedProducttoPurcase(productstoaddtoinvoicerecords){
                this.editmode = true;
                 this.form.clear();
        this.form.reset();
        this.form.fill(productstoaddtoinvoicerecords);
$('#ccfnewpurchaseinvoiceModal').modal('show');
            },
  editProductdetails(productdetailsrecords){
                this.editmode = true;
                 this.form.clear();
        this.form.reset();
        this.form.fill(productdetailsrecords);
$('#pruductdetailModal').modal('show');
            },





  paypurchaseInvoice(productunitofmeasurerecords){
                this.editmode = true;
                 this.form.clear();
        this.form.reset();
        this.form.fill(productunitofmeasurerecords);
$('#paypurchaseinvoiceModal').modal('show');
            },
  editUnitofmeasure(productunitofmeasurerecords){
                this.editmode = true;
                 this.form.clear();
        this.form.reset();
        this.form.fill(productunitofmeasurerecords);
$('#unitofmeasureModal').modal('show');
            },


  editProductbrand(productbrandsrecords){
                this.editmode = true;
                 this.form.clear();
        this.form.reset();
        this.form.fill(productbrandsrecords);
$('#addnewproductbrandsModal').modal('show');
            },


     newBranchmodal(){
        this.editmode = false;
        this.form.clear();
        this.form.reset();
     
     $('#addproductcategoryModal').modal('show');
            },






   confirmItempurchaseddelivery(activeinvoicetoupdaterecords){
                this.editmode = true;
                 this.form.clear();
        this.form.reset();
        this.form.fill(activeinvoicetoupdaterecords);
       // $('#updateinvoiceproductsModal').modal('hide');
$('#confirmitemonpurchase').modal('show');
            },

   editProductcategory(salesreportsummaryrecords){
                this.editmode = true;
                 this.form.clear();
        this.form.reset();
        this.form.fill(salesreportsummaryrecords);
$('#addproductcategoryModal').modal('show');
            },

            
            createProductdetails(){
      this.$Progress.start();
        this.form.post('api/productdetailsrecords')
        .then(()=>{

         
    $('#pruductdetailModal').modal('show');
     this.form.clear();
        this.form.reset();
    axios.get("api/productdetailsrecords").then(({ data }) => (this.productdetailsrecords = data));
    axios.get("api/productstoaddtoinvoicerecords").then(({ data }) => (this.productstoaddtoinvoicerecords = data));
  Toast.fire({
  icon: 'success',
  title: 'Record added successfully'
});
        this.$Progress.finish();
 this.form.reset();
        })
        .catch(()=>{
          
        })
         
    }, // end of create
          

  createnewInvoiceproducts(){
      this.$Progress.start();
        this.form.post('api/appenditemtotheinvoice')
        .then(()=>{

         
    // $('#newpurchaseinvoiceModal').modal('hide');
    //  $('#updateinvoiceproductsModal').modal('show');
     this.form.clear();
        this.form.reset();
          $('#ccfnewpurchaseinvoiceModal').modal('hide');
               
                  $('#updateinvoiceproductsModal').modal('show');

    axios.get("api/productunitofmeasurerecords").then(({ data }) => (this.productunitofmeasurerecords = data));
     axios.get("api/activeinvoicetoupdaterecords").then(({ data }) => (this.activeinvoicetoupdaterecords = data));

     axios.get("api/gettheinvoicevatamount").then(({ data }) => (this.gettheinvoicevatamount = data));
axios.get("api/gettheinvoicegrandtotal").then(({ data }) => (this.gettheinvoicegrandtotal = data));
axios.get("api/gettheinvoicetotalwithoutvat").then(({ data }) => (this.gettheinvoicetotalwithoutvat = data));
  
 axios.get("api/getcurrencydetails").then(({ data }) => (this.currencydetails = data));
  Toast.fire({
  icon: 'success',
  title: 'Record added successfully'
});

        this.$Progress.finish();

        })
        .catch(()=>{
          
        })
         
    }, // end of create


  createnewInvoice(){
      this.$Progress.start();
        this.form.post('api/newinvoicegeneration')
        .then(()=>{

         
    $('#newpurchaseinvoiceModal').modal('hide');
    //  $('#updateinvoiceproductsModal').modal('show');
     this.form.clear();
        this.form.reset();
    axios.get("api/productunitofmeasurerecords").then(({ data }) => (this.productunitofmeasurerecords = data));
  Toast.fire({
  icon: 'success',
  title: 'Record added successfully'
});
        this.$Progress.finish();

        })
        .catch(()=>{
          
        })
         
    }, // end of create


            createUnitofmeasure(){
      this.$Progress.start();
        this.form.post('api/productdetailsrecords')
        .then(()=>{

         
    $('#unitofmeasureModal').modal('show');
     this.form.clear();
        this.form.reset();
    axios.get("api/productunitofmeasurerecords").then(({ data }) => (this.productunitofmeasurerecords = data));
  Toast.fire({
  icon: 'success',
  title: 'Record added successfully'
});
        this.$Progress.finish();

        })
        .catch(()=>{
          
        })
         
    }, // end of create
       createProductbrand(){
      this.$Progress.start();
        this.form.post('api/productbrandsrecords')
        .then(()=>{

         
    $('#addnewproductbrandsModal').modal('show');
     this.form.clear();
        this.form.reset();
    axios.get("api/productbrandsrecords").then(({ data }) => (this.productbrandsrecords = data));
  Toast.fire({
  icon: 'success',
  title: 'Record added successfully'
});
        this.$Progress.finish();

        })
        .catch(()=>{
          
        })
         
    }, // end of create
    
    updateProductdetails(){
    this.$Progress.start();
          
this.form.put('api/productdetailsrecords/'+this.form.id)
  .then(()=> {
    // on success
   $('#unitofmeasureModal').modal('hide');
    Swal.fire(
        'Update!',
        'Record has been updated.',
        'success'
      )
      this.$Progress.finish();
    // Fire.$emit('AfterAction');
    axios.get("api/productdetailsrecords").then(({ data }) => (this.productdetailsrecords = data));
    axios.get("api/productstoaddtoinvoicerecords").then(({ data }) => (this.productstoaddtoinvoicerecords = data));

  })


  .catch(()=>{
 this.$Progress.fail();
   Swal.fire({  
         icon: 'error',
        title: 'Failed',
       text: "Transaction was Not successfull. Contact the Administrator for More Assistance",});
  
  
  });
   },// end of update


updatecreateOrderconfirmation(){
    this.$Progress.start();
          
this.form.put('api/purcaseorderconfirmation/'+this.form.id)
  .then(()=> {
    // on success
   $('#confirmitemonpurchase').modal('hide');
    Swal.fire(
        'Confirmed!',
        'Record has been updated.',
        'success'
      )
      this.$Progress.finish();
    // Fire.$emit('AfterAction');
    axios.get("api/productpurchasesdetailrecords").then(({ data }) => (this.productpurchasesdetailrecords = data));

  })


  .catch(()=>{
 this.$Progress.fail();
   Swal.fire({  
         icon: 'error',
        title: 'Failed',
       text: "Transaction was Not successfull. Contact the Administrator for More Assistance",});
  
  
  });
   },// end of update















createInvoicePayment(){
    this.$Progress.start();
          
this.form.put('api/makeinvoicepayment/'+this.form.id)
  .then(()=> {
    // on success
   $('#paypurchaseinvoiceModal').modal('hide');
    Swal.fire(
        'Payment Made!',
        'The payment Has been Confirmed to the Supplier.',
        'success'
      )
      this.$Progress.finish();
    // Fire.$emit('AfterAction');
    axios.get("api/purchaseincoicesummaryrecords").then(({ data }) => (this.purchaseincoicesummaryrecords = data));

  })


  .catch(()=>{
 this.$Progress.fail();
   Swal.fire({  
         icon: 'error',
        title: 'Failed',
       text: "Transaction was Not successfull. Contact the Administrator for More Assistance",});
  
  
  });
   },// end of update
    updateUnitofmeasure(){
    this.$Progress.start();
          
this.form.put('api/productunitofmeasurerecords/'+this.form.id)
  .then(()=> {
    // on success
   $('#unitofmeasureModal').modal('hide');
    Swal.fire(
        'Update!',
        'Record has been updated.',
        'success'
      )
      this.$Progress.finish();
    // Fire.$emit('AfterAction');
    axios.get("api/productunitofmeasurerecords").then(({ data }) => (this.productunitofmeasurerecords = data));

  })


  .catch(()=>{
 this.$Progress.fail();
   Swal.fire({  
         icon: 'error',
        title: 'Failed',
       text: "Transaction was Not successfull. Contact the Administrator for More Assistance",});
  
  
  });
   },// end of update


   updateProductbrand(){
    this.$Progress.start();
          
this.form.put('api/productbrandsrecords/'+this.form.id)
  .then(()=> {
    // on success
   $('#addnewproductbrandsModal').modal('hide');
    Swal.fire(
        'Update!',
        'Record has been updated.',
        'success'
      )
      this.$Progress.finish();
    // Fire.$emit('AfterAction');
    axios.get("api/productbrandsrecords").then(({ data }) => (this.productbrandsrecords = data));

  })


  .catch(()=>{
 this.$Progress.fail();
   Swal.fire({  
         icon: 'error',
        title: 'Failed',
       text: "Transaction was Not successfull. Contact the Administrator for More Assistance",});
  
  
  });
   },// end of update

lockthepurchaseInvoice(id){
   Swal.fire({
  title: 'CLOSE INVOICE',
  text: "By closing this invoice You wont be able to add or Edit any item on the Invoice!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes'
}).then((result) => {

/// send request ti
if (result.isConfirmed) {
  this.form.delete('api/closeofftheinvoiceinaction/'+id).then(()=>{
  
                        Swal.fire(
                          'Order Confirmed!',
                          'Order closed. cant add more Items.',
                          'success'
                        )
                   
  axios.get("api/activeinvoicetoupdaterecords").then(({ data }) => (this.activeinvoicetoupdaterecords = data));
axios.get("api/invoicelockstatus").then(({ data }) => (this.invoicelockstatus = data));
   axios.get("api/purchaseincoicesummaryrecords").then(({ data }) => (this.purchaseincoicesummaryrecords = data));
        axios.get('/api/invoiceslist').then(function (response) { this.invoiceslist = response.data;}.bind(this));
  }).catch(()=>{
     Swal.fire({  
         icon: 'error',
        title: 'Failed',
       text: "Transaction was Not successfull. Contact the Administrator for More Assistance",});

  });


}                  



})

            },// End of delrte function
deleteproductfromPurcases(id){
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
  this.form.delete('api/deleterecordfrompurchases/'+id).then(()=>{
  
                        Swal.fire(
                          'Removed!',
                          'Record Deleted.',
                          'success'
                        )
                   
 axios.get("api/activeinvoicetoupdaterecords").then(({ data }) => (this.activeinvoicetoupdaterecords = data));

  }).catch(()=>{
     Swal.fire({  
         icon: 'error',
        title: 'Failed',
       text: "Transaction was Not successfull. Contact the Administrator for More Assistance",});

  });


}                  



})

            },// End of delrte function
deleteUnitofmeasure(id){
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
  this.form.delete('api/productunitofmeasurerecords/'+id).then(()=>{
  
                        Swal.fire(
                          'Deleted!',
                          'Your file has been deleted.',
                          'success'
                        )
                   
 axios.get("api/productunitofmeasurerecords").then(({ data }) => (this.productunitofmeasurerecords = data));

  }).catch(()=>{
     Swal.fire({  
         icon: 'error',
        title: 'Failed',
       text: "Transaction was Not successfull. Contact the Administrator for More Assistance",});

  });


}                  



})

            },// End of delrte function
deleteProductbrand(id){
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
  this.form.delete('api/productbrandsrecords/'+id).then(()=>{
  
                        Swal.fire(
                          'Deleted!',
                          'Your file has been deleted.',
                          'success'
                        )
                   
 axios.get("api/productbrandsrecords").then(({ data }) => (this.productbrandsrecords = data));

  }).catch(()=>{
     Swal.fire({  
         icon: 'error',
        title: 'Failed',
       text: "Transaction was Not successfull. Contact the Administrator for More Assistance",});

  });


}                  



})

            },// End of delrte function
deleteProductCategory(id){
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
  this.form.delete('api/salesreportsummaryrecords/'+id).then(()=>{
  
                        Swal.fire(
                          'Deleted!',
                          'Your file has been deleted.',
                          'success'
                        )
                   
 axios.get("api/salesreportsummaryrecords").then(({ data }) => (this.salesreportsummaryrecords = data));

  }).catch(()=>{
     Swal.fire({  
         icon: 'error',
        title: 'Failed',
       text: "Transaction was Not successfull. Contact the Administrator for More Assistance",});

  });


}                  



})

            },// End of delrte function
      


      /////////////////////////////////////////////////////////

    createProductcategory(){
      this.$Progress.start();
        this.form.post('api/salesreportsummaryrecords')
        .then(()=>{

         
    $('#addproductcategoryModal').modal('hide');
   axios.get("api/salesreportsummaryrecords").then(({ data }) => (this.salesreportsummaryrecords = data));
  Toast.fire({
  icon: 'success',
  title: 'Record added successfully'
});
        this.$Progress.finish();

        })
        .catch(()=>{
          
        })
         
    }, // end of create
   updateproductCategory(){
    this.$Progress.start();
          
this.form.put('api/salesreportsummaryrecords/'+this.form.id)
  .then(()=> {
    // on success
   $('#addproductcategoryModal').modal('hide');
    Swal.fire(
        'Update!',
        'Record has been updated.',
        'success'
      )
      this.$Progress.finish();
    // Fire.$emit('AfterAction');
    axios.get("api/salesreportsummaryrecords").then(({ data }) => (this.salesreportsummaryrecords = data));

  })


  .catch(()=>{
 this.$Progress.fail();
   Swal.fire({  
         icon: 'error',
        title: 'Failed',
       text: "Transaction was Not successfull. Contact the Administrator for More Assistance",});
  
  
  });
   },// end of update


////////////////////////////////////////////////////////
         
             createAuthorisecomponentfeature(){
      this.$Progress.start();
        this.form.post('api/saveformcomponentaccess')
        .then(()=>{

         
    $('#addproductcategoryModal').modal('hide');
  //  Fire.$emit('AfterAction');
  axios.get("api/authorisedformcomponents").then(({ data }) => (this.allowedrolecomponentfeaturesObject = data));
  Toast.fire({
  icon: 'success',
  title: 'Component Feature Authorised'
});
        this.$Progress.finish();
 axios.get("api/authorisedformcomponents").then(({ data }) => (this.allowedrolecomponentfeaturesObject = data));
        })
        .catch(()=>{
          
        })
         
    },

    

createMainuaccess(){
      this.$Progress.start();
        this.form.post('api/savemainmenuaccess')
        .then(()=>{

         
    $('#addnewaccesstomainmenu').modal('hide');
   axios.get("api/authorisedmainmenus").then(({ data }) => (this.datarecordsMainmenuauthorised = data));

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
    createAuthorisedrole(){
      this.$Progress.start();
        this.form.post('api/saveaccesstovuecomponent')
        .then(()=>{

         
    $('#addproductcategoryModal').modal('hide');
    Fire.$emit('AfterAction');
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
                   
    axios.get("api/authorisedmainmenus").then(({ data }) => (this.datarecordsMainmenuauthorised = data));
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
              axios.get("api/getAddnewbranch").then(({ data }) => (this.allowedtoaddbranch = data));
              axios.get("api/getviewbranch").then(({ data }) => (this.allowedtoviewbranch = data));
              axios.get("api/geteditBrabcg").then(({ data }) => (this.allowedtoeditbranch = data));

 

              axios.get("api/getdeleteProductCategory").then(({ data }) => (this.allowedtodeleteProductCategory = data));
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
           },

loadvatvalues(){
//   axios.get('/api/shopcashbalance').then(function (response) { this.shopcashbalance = response.data;}.bind(this));

//    axios.get('/api/inputvatamount').then(function (response) { this.inputvatamount = response.data;}.bind(this));

//  axios.get('/api/outputvatamount').then(function (response) { this.outputvatamount = response.data;}.bind(this));


axios.get('/api/dailyvatcollectedforselection').then(function (response) { this.dailyvatcollectedforselection = response.data;}.bind(this));

 axios.get('/api/dailytotalsalesforselection').then(function (response) { this.dailytotalsalesforselection = response.data;}.bind(this));

},

            

},// end of methods


///////////////////////////////////////////////////
        created() {



 axios.get("api/walletstorecievemoney").then(({ data }) => (this.walletstorecievemoney = data));


   Fire.$on('searching', ()=>{
            // let query = this.$parent.search;
            let query = this.search;
          //   axios.get("api/productpriceslist").then(({ data }) => (this.productpriceslist = data));
 axios.get('api/findUser?q='+ query)
 .then((data)=> {
this.productstoaddtoinvoicerecords = data.data;
 })
 .catch(()=>{

 })
          })




axios.get("api/customerdetailsrecords").then(({ data }) => (this.customerdetailsrecords = data));
     

axios.get('/api/customerslist').then(function (response) { this.customerslist = response.data;}.bind(this));

//    axios.get('/api/inputvatamount').then(function (response) { this.inputvatamount = response.data;}.bind(this));

//  axios.get('/api/outputvatamount').then(function (response) { this.outputvatamount = response.data;}.bind(this));







            this.loadDailysalesreportdetails();
            axios.get("api/getcurrencydetails").then(({ data }) => (this.currencydetails = data));
          //      axios.get('/api/productcategorieslist').then(function (response) { this.productcategorieslist = response.data;}.bind(this));
          //      axios.get('/api/productbrandslist').then(function (response) { this.productbrandslist = response.data;}.bind(this));
            
          // axios.get('/api/unitmeasurelist').then(function (response) { this.unitmeasurelist = response.data;}.bind(this));
           axios.get('/api/supplierslist').then(function (response) { this.supplierslist = response.data;}.bind(this));
                // axios.get('/api/invoiceslist').then(function (response) { this.invoiceslist = response.data;}.bind(this));
                // axios.get('/api/productslist').then(function (response) { this.productslist = response.data;}.bind(this));
                //    axios.get('/api/walletsofeapenselist').then(function (response) { this.walletsofeapenselist = response.data;}.bind(this));
          

              // axios.get("api/inputvatamount").then(({ data }) => (this.inputvatamount = data));
              // axios.get("api/outputvatamount").then(({ data }) => (this.outputvatamount = data));
           //this.checkBranchescomponentfeatures();
            Fire.$on('AfterAction', () =>{
this.loadDailysalesreportdetails();
      });
  // setInterval(() =>this.loadvatvalues(),3000);
        }
    }
</script>
