<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|0784705551
*/ 

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResources(['user' => 'API\UserController']); 
Route::apiResources(['machines' => 'API\MachinesController']); 
Route::apiResources(['newfishcurrentcodes' => 'API\CurrentmacinecodesController']); 

// Sena Hardware Start
Route::apiResources(['customerdetailsrecords' => 'API\CustomersController']);
Route::apiResources(['recievethecustomerPayment' => 'API\CustomerpaymentsController']);
Route::apiResources(['deletesaleconfirmationrrt' => 'API\NewdeletesaleconfController']);
Route::apiResources(['makethecustomerPayment' => 'API\CompanypaycustomerController']);
Route::get('customerstatementrecords', 'API\CustomersController@customerstatementrecords');
Route::get('supplierstatementrecords', 'API\CustomersController@supplierstatementrecords');


Route::get('postypes', 'APIController@postypes');
Route::get('detetethetransaction', 'API\CashtransfersConroller@detetethetransaction');
//axios.get("api/cashsalesproductlist").then(({ data }) => (this.cashsalesproductlist = data));
Route::get('cashsalesproductlist', 'APIController@cashsalesproductlist');

Route::get('customerstamento', 'API\CustomersController@customerstamento');
Route::apiResources(['addnewcustomerrecord' => 'API\CustomersController']);



Route::apiResources(['products' => 'API\ExpensesController']);
Route::apiResources(['inserintocart' => 'API\InserintocartController']);

Route::apiResources(['insertintoproformacart' => 'API\insertintoproformacartController']);

Route::apiResources(['creditsalescartdetails' => 'API\insertintoproformacartController']);
Route::apiResources(['productcategoriesrecords' => 'API\ProductcategoriesController']);
Route::apiResources(['shopingcartdetails' => 'API\InserintocartController']);
Route::get('getordertotal', 'APIController@Ordertotal');
Route::get('existanceofitemsoncart', 'APIController@existanceofitemsoncart');


Route::get('getcattotal', 'APIController@Carttotal');
Route::get('salesreturnsrecords', 'API\ProductreturnsController@salesreturnsrecords');

Route::get('receipttotal', 'API\ReceiptprintingController@receipttotal');
Route::get('receiptcashier', 'API\ReceiptprintingController@receiptcashier');
Route::get('getreceiptdate', 'API\ReceiptprintingController@getreceiptdate');
Route::get('getreceiptno', 'API\ReceiptprintingController@getreceiptno');
;

Route::get('productstopurchaselist', 'APIController@productstopurchaselist');
Route::get('thereexistsaninvoice', 'APIController@thereexistsaninvoice');
Route::get('myexistinginvoice', 'APIController@myexistinginvoice');


Route::apiResources(['confirmsaleoncredit' => 'API\ConfirmcreditsaleController']);

Route::apiResources(['confirmthediscounted' => 'API\ChangediscountsettingsController']);
Route::apiResources(['makesalepur' => 'API\ConfirmpositemsController']);
Route::apiResources(['appenditemtotheinvoice' => 'API\AppenditemstoinvoiceController']);
Route::apiResources(['newinvoicegeneration' => 'API\NewinvoicegenerationController']);
Route::apiResources(['productdetailsrecords' => 'API\CompanyproductsController']);
Route::apiResources(['saveproducttotransist' => 'API\ProducttransferController']);
Route::apiResources(['confirmationtransferdetails' => 'API\ConfirmstocktransferController']);
Route::get('gettransferexistanceforuser', 'API\ProducttransferController@gettransferexistanceforuser');
//Route::apiResources(['salesreportsummaryrecords' => 'API\CompanyReportsController@dailysalesreports']);

//Route::apiResources(['productstoaddtoinvoicerecords' => 'API\CompanyproductsController@purchaseproducts']);
Route::get('salesreportsummaryrecords', 'API\CompanyReportsController@dailysalesreports');
 Route::get('salesdetailsreportdetailedrecords', 'API\CompanyReportsController@salesdetailsreportdetailedrecords');
 Route::get('salesdetailsreportdetailedrecords2', 'API\CompanyReportsController@salesdetailsreportdetailedrecords2');
 Route::get('todayssalesdetailttyu', 'API\CompanyReportsController@todayssalesdetailttyu');

 Route::get('customerpaymentsrecords', 'API\CustomerpaymentsController@customerpaymentsrecords');
Route::get('salesdetailscostofthesalesmadetotalrange', 'API\CompanyReportsController@salesdetailscostofthesalesmadetotalrange');
Route::get('salesdetailsalesmadetotalrange', 'API\CompanyReportsController@salesdetailsalesmadetotalrange');
Route::get('salesdetailvatcollectedtotalrange', 'API\CompanyReportsController@salesdetailvatcollectedtotalrange');
Route::get('salesdetailsgrossprofittotalrange', 'API\CompanyReportsController@salesdetailsgrossprofittotalrange');
// /////////////////////////////////////////////////////////////
Route::get('salesdetailscostofthesalesmadetotalrange2', 'API\CompanyReportsController@salesdetailscostofthesalesmadetotalrange2');
Route::get('salesdetailsalesmadetotalrange2', 'API\CompanyReportsController@salesdetailsalesmadetotalrange2');
Route::get('salesdetailvatcollectedtotalrange2', 'API\CompanyReportsController@salesdetailvatcollectedtotalrange2');
Route::get('salesdetailsgrossprofittotalrange2', 'API\CompanyReportsController@salesdetailsgrossprofittotalrange2');






























Route::get('unitfromname', 'API\ProducttransferController@unitfromname');
Route::get('unittoname', 'API\ProducttransferController@unittoname');
Route::get('producttoname', 'API\ProducttransferController@producttoname');

Route::get('producttocode', 'API\ProducttransferController@producttocode');
Route::get('qtyintransit', 'API\ProducttransferController@qtyintransit');
Route::get('transferdadt', 'API\ProducttransferController@transferdadt');
Route::get('productfromcode', 'API\ProducttransferController@productfromcode');
Route::get('productfromname', 'API\ProducttransferController@productfromname');



Route::get('salesreportdetailslineprofit', 'API\CompanyReportsController@salesreportdetailslineprofit');
Route::get('salesreportdetailsgrosssales', 'API\CompanyReportsController@salesreportdetailsgrosssales');
Route::get('salesreportdetailstotalvat', 'API\CompanyReportsController@salesreportdetailstotalvat');
Route::get('salesreportdetailstotalprofit', 'API\CompanyReportsController@salesreportdetailstotalprofit');
Route::get('salesreportdetailstotalcost', 'API\CompanyReportsController@salesreportdetailstotalcost');
Route::get('salesreportdetailstotalsales', 'API\CompanyReportsController@salesreportdetailstotalsales');
Route::get('salesreportendingdate', 'API\CompanyReportsController@salesreportendingdate');
Route::get('salesreportsatartingdate', 'API\CompanyReportsController@salesreportsatartingdate');










Route::get('totaldailylineprofitrangereports', 'API\CompanyReportsController@totaldailylineprofitrangereports');
Route::get('totaldailysaleswithouttaxgrossrangereports', 'API\CompanyReportsController@totaldailysaleswithouttaxgrossrangereports');
Route::get('totaldailysalesvatinclusiverangereports', 'API\CompanyReportsController@totaldailysalesvatinclusiverangereports');
Route::get('totalexpensesinselectionfilters', 'API\CompanyReportsController@totalexpensesinselectionfilters');

Route::get('totalexpensesinselectiond', 'API\CompanyReportsController@totalexpensesinselectiond');
Route::get('totaldailytotalcostrangereports', 'API\CompanyReportsController@totaldailytotalcostrangereports');
Route::get('totaldailygrossprofitrangereports', 'API\CompanyReportsController@totaldailygrossprofitrangereports');
Route::get('totaldailytotalvatrangereports', 'API\CompanyReportsController@totaldailytotalvatrangereports');




















Route::get('dailysalessummaryrecords', 'API\CompanyReportsController@dailysalessummaryrecords');






Route::get('totalsalesforincomestatement', 'API\CompanyReportsController@totalsalesforincomestatement');
Route::get('totalcostforincomestatement', 'API\CompanyReportsController@totalcostforincomestatement');
Route::get('totalgrossprofitincomestatement', 'API\CompanyReportsController@totalgrossprofitincomestatement');
Route::get('totalotherincomesforincomestatement', 'API\CompanyReportsController@totalotherincomesforincomestatement');
Route::get('totalexpensesforincomestatement', 'API\CompanyReportsController@totalexpensesforincomestatement');
Route::get('totalnetprofitbeforothertaxesforincomestatements', 'API\CompanyReportsController@totalnetprofitbeforothertaxesforincomestatements');


Route::get('totaldailypurchasesordersrangereports', 'API\CompanyReportsController@totaldailypurchasesordersrangereports');
Route::get('totaldailypurchasesvatsrangereports', 'API\CompanyReportsController@totaldailypurchasesvatsrangereports');
Route::get('totaldailypurchaseswithouttaxrangereports', 'API\CompanyReportsController@totaldailypurchaseswithouttaxrangereports');
Route::get('totaldailydeliverieswithouttaxrangereports', 'API\CompanyReportsController@totaldailydeliverieswithouttaxrangereports');
Route::get('totaldailypurchasesdeliveriesamountrangereports', 'API\CompanyReportsController@totaldailypurchasesdeliveriesamountrangereports');
Route::get('totaldailypurchasesdeliveriesvatsrangereports', 'API\CompanyReportsController@totaldailypurchasesdeliveriesvatsrangereports');

Route::get('totaldailypurchasespaymentsamountrangereports', 'API\CompanyReportsController@totaldailypurchasespaymentsamountrangereports');
Route::get('totaldailypurchasespaymentsbalancerangereports', 'API\CompanyReportsController@totaldailypurchasespaymentsbalancerangereports');













Route::get('incomestatementtransactionsrecords', 'API\CompanyReportsController@incomestatementtransactionsrecords');






Route::get('incomestatementreportrecords', 'API\CompanyReportsController@incomestatementreportrecords');
Route::get('dailypurchasesreportsummaryrecords', 'API\CompanyReportsController@dailypurchasesreportsummaryrecords');
Route::get('dailypurchasesreportdetailedrecords', 'API\CompanyReportsController@dailypurchasesreportdetailedrecords');















Route::get('totalsalesdailysalesreports', 'API\CompanyReportsController@totalsalesdailysalesreports');
Route::get('totalvatdailysalesreports', 'API\CompanyReportsController@totalvatdailysalesreports');
Route::get('totalnetinvoicedailysalesreports', 'API\CompanyReportsController@totalnetinvoicedailysalesreports');

Route::get('productstoaddtoinvoicerecords', 'API\CompanyproductsController@purchaseproducts');
Route::apiResources(['productunitofmeasurerecords' => 'API\ProductunitmeasuresController']);
Route::apiResources(['productsellingrecords' => 'API\ProductssellingdetailsController']);
Route::apiResources(['makeinvoicepayment' => 'API\MakeinvoicepaymentController']);


Route::apiResources(['deletethissale' => 'API\SalesactionsController']);
Route::apiResources(['deleterecordfrompurchases' => 'API\ProductpurchaseconfirmationController']);
Route::apiResources(['purcaseorderconfirmation' => 'API\ProductpurchaseconfirmationController']);
Route::apiResources(['productbrandsrecords' => 'API\ProductbrandsController']);

Route::apiResources(['activeinvoicetoupdaterecords' => 'API\InvoicenumberinactionController']);
Route::apiResources(['invoicenumbertocheck' => 'API\InvoicenumberinactionController']);
Route::apiResources(['statementrecordtoview' => 'API\StatementrecordtoviewController']);

Route::apiResources(['statementrecordtoviewtwo' => 'API\MystatementtoviewController']);
Route::get('transtoviewtype', 'API\StatementrecordtoviewController@transtoviewtype');

Route::apiResources(['closeofftheinvoiceinaction' => 'API\InvoicenumberinactionController']);
Route::apiResources(['purchaseincoicesummaryrecords' => 'API\PurchasessumaryrecordsController']);
Route::apiResources(['productpurchasesdetailrecords' => 'API\PurchasesrecordsController']);

Route::apiResources(['invoicepurchaseddetailsrecords' => 'API\PurchasesrecordsspecificinvoiceController']);

Route::apiResources(['productpriceslist' => 'API\ProductpricesController']);
Route::get('getstatementtransactions', 'API\StatementrecordtoviewController@getstatementtransactions');

Route::get('findUser', 'API\CompanyproductsController@search');

Route::get('findReceipt', 'API\CompanyReportsController@findReceipt');
Route::get('findtheProdctinlist', 'API\CompanyproductsController@searchproductinproductlist');
Route::get('findcustomerlegeraccount', 'API\CustomersController@findcustomerlegeraccount');
Route::get('returnreceiptdetails', 'API\ReturnsalesitemsController@returnreceiptdetails');

Route::get('satecustomerstatementtoview', 'API\CustomersController@satecustomerstatementtoview');
Route::get('findExpensefromexpenseslist', 'API\ExpensesController@findExpensefromexpenseslist');

Route::apiResources(['productcategoryFiltertoview' => 'API\ProductrecordsFilterController']);
Route::apiResources(['productdetailsFiltertoview' => 'API\ProductdetailsFilterController']);


Route::apiResources(['customerstatementdetailsFilter' => 'API\CustomerstatementtoviewController']);

Route::apiResources(['setdatestoviewdailyreport' => 'API\ReportstoviewController']);

Route::apiResources(['saveexpensereportdetailstoView' => 'API\ExpensereportstoviewController']);








Route::apiResources(['setthereceiptintoreturnitems' => 'API\ReturnsalesitemsController']);

/// end of filters

Route::get('productsavailableforsalelist', 'APIController@productsavailableforsalelist');

Route::get('inputvatcomponentaccess', 'APIController@inputvatcomponentaccess');
Route::get('outputcomponentaccess', 'APIController@outputcomponentaccess');
Route::get('branchwalletcomponentaccess', 'APIController@branchwalletcomponentaccess');
Route::get('administratorcomponentaccess', 'APIController@administratorcomponentaccess');
Route::get('netvatvatcomponentcomponentaccess', 'APIController@netvatvatcomponentcomponentaccess');
Route::get('bankwalletcomponentaccess', 'APIController@bankwalletcomponentaccess');
// Route::get('setdatestoviewdailyreport', 'API\ReportstoviewController@setdatestoviewdailyreport');



Route::get('administratoraccountbalance', 'APIController@administratoraccountbalance');
Route::get('bankaccountbalance', 'APIController@bankaccountbalance');


Route::get('shopcashbalance', 'APIController@shopcashbalance');
Route::get('inputvatamount', 'APIController@inputvatamount');
Route::get('outputvatamount', 'APIController@outputvatamount');
Route::get('todaystotalsales', 'APIController@todaystotalsales');   
//axios.get('/api/todaystotalsales').then(function (response) { this.todaystotalsales = response.data;}.bind(this));
Route::get('todaystotalcreditsales', 'APIController@todaystotalcreditsales');
Route::get('todaystotalcashsales', 'APIController@todaystotalcashsales');

             Route::get('dailytotalsalesforselection', 'API\CompanyReportsController@dailytotalsalesforselection');
             Route::get('dailyvatcollectedforselection', 'API\CompanyReportsController@dailyvatcollectedforselection');




Route::get('invoicelockstatus', 'APIController@invoicelockstatus');
Route::get('getthinvoicenumberactive', 'APIController@getthinvoicenumberactive');
Route::get('getthinvoicesuppliername', 'APIController@getthinvoicesuppliername');
Route::get('gettheinvoicedate', 'APIController@gettheinvoicedate');

Route::get('getthinvoicedocumentno', 'APIController@getthinvoicedocumentno');
Route::get('gettheinvoicedeliverystatus', 'APIController@gettheinvoicedeliverystatus');
Route::get('getinvoicepaymentstatus', 'APIController@getinvoicepaymentstatus');


Route::get('gettheinvoicevatamount', 'APIController@gettheinvoicevatamount');
Route::get('gettheinvoicegrandtotal', 'APIController@gettheinvoicegrandtotal');
Route::get('gettheinvoicetotalwithoutvat', 'APIController@gettheinvoicetotalwithoutvat');

Route::get('totaldebtorsbalance', 'APIController@totaldebtorsbalance');
Route::get('totalcreditorsbalance', 'APIController@totalcreditorsbalance');













Route::get('productcategorieslist', 'APIController@productcategorieslist');
Route::get('productbrandslist', 'APIController@productbrandslist');
Route::get('unitmeasurelist', 'APIController@unitmeasurelist');
Route::get('productslist', 'APIController@productslist');
Route::get('walletsofeapenselist', 'APIController@walletsofeapenselist');
Route::get('walletstorecievemoney', 'APIController@walletstorecievemoney');
// Sena Hardware End

Route::apiResources(['branchesandmachinesadd' => 'API\AuthorisedbranchandmachineController']); 
Route::apiResources(['branchesandmachines' => 'API\BranchesandmachinesController']); 
Route::apiResources(['companybettingproducta' => 'API\BettingcompanyproductsController']); 
Route::get('getCountries', 'APIController@getCountries');
Route::get('getStates', 'APIController@getStates');
Route::get('getFloatcodes', 'APIController@getFloatcodes');

Route::get('invoiceslist', 'APIController@invoiceslist');
Route::get('supplierslist', 'APIController@supplierslist');
Route::get('customerslist', 'APIController@customerslist');

Route::get('getRoles', 'APIController@getRoles');
Route::get('userslist', 'APIController@userslist');
Route::get('getBranches', 'APIController@getBranches');



Route::apiResources(['roletobalance' => 'API\RoletoaddcomponentsController']);

Route::apiResources(['branchtoworkon' => 'API\BranchtoworkonController']);
Route::apiResources(['authorisedbranchproducts' => 'API\AuthorisedbranchproductsController']);

Route::apiResources(['saleareportsview' => 'API\SalesreporttoviewController']);
Route::apiResources(['castransactionstoview' => 'API\Cashtransactionstoview']);


Route::apiResources(['newbranchfloatcodes' => 'API\BranchesfloatcodesController']);

Route::apiResources(['monthlyreportstoview' => 'API\MonthlyreportsController']);

Route::apiResources(['monthlyexpensesreportforallbra' => 'API\ExpensesreporttoviewdetailController']);
Route::apiResources(['monthlyexpensesreportcat' => 'API\ExpensesreporttoviewdetailcategoryController']);
Route::apiResources(['monthlyexpensesreporttype' => 'API\ExpensesreporttoviewdetailtypeController']);
Route::apiResources(['monthlyexpensesreportwallet' => 'API\ExpensesreporttoviewdetailwalletController']);

Route::apiResources(['dailyexpensesrecordsexpwallet' => 'API\ExpensesreporttoviewdetailwalletController']);







Route::apiResources(['correctshobalancingrecord' => 'API\AutocorrectShopbalancingController']);

Route::apiResources(['expenseslisttoviewtrio' => 'API\ExpensesrecordstoviewtrioController']);
Route::apiResources(['balancingrecordstoview' => 'API\BalancingrecordsforuserController']);

Route::apiResources(['monthlyreportstoviewallbranches' => 'API\MonthlyreportsallbranchesController']);
Route::apiResources(['allowedbranchanduserdatarecords' => 'API\AuthorisedbranchanduserController']);

Route::apiResources(['correctmydaterecordsexpenses' => 'API\AutocorrectdatedetailsexpensesreportController']);
Route::apiResources(['correctmydaterecords' => 'API\AutocorrectdatedetailsController']);
Route::apiResources(['companywalletdetails' => 'API\WalletdetailsController']);


Route::apiResources(['authorisedbranchmachines' => 'API\AuthorisedbranchandmachineController']);
Route::apiResources(['roletoaddsumenu' => 'API\RoletoaddsubmenuController']);
Route::apiResources(['roletoaddmainmenu' => 'API\RoletoaddmainmenuController']);
Route::apiResources(['expensecategories' => 'API\ExpensecategoriesController']);
Route::apiResources(['officemadeexpensesrecords' => 'API\CompanymadeexpensesController']);

Route::apiResources(['cashtransferrecords' => 'API\CashtransfersConroller']);

Route::apiResources(['incomesourcerecords' => 'API\MyincomsourcesController']);
Route::apiResources(['latestreceiptdetails' => 'API\ReceiptprintingController']);

Route::apiResources(['latestcreditsalesreceipt' => 'API\ReceiptcreditsalesController']);

Route::apiResources(['expensetypes' => 'API\ExpensetypesController']);
Route::apiResources(['expenses' => 'API\ExpensesController']);
Route::apiResources(['authorisedcomponents' => 'API\AuthorisedcomponentsController']);
Route::apiResources(['saveaccesstovuecomponent' => 'API\GiveaccesstovuecomponentController']);
Route::get('getlistofcomponents', 'APIController@getcomponentslist');

Route::get('generalreportselectedstartdate', 'APIController@generalreportselectedstartdate');
Route::get('generalreportselectedenddate', 'APIController@generalreportselectedenddate');



Route::get('cashierslist', 'APIController@cashierslist');
Route::get('branchDetails', 'APIController@branchDetails');
Route::get('loggedinuserid', 'APIController@loggedinuserid');
Route::get('loggedinuserrole', 'APIController@loggedinuserrole');
Route::get('loggedinuserbranch', 'APIController@loggedinuserbranch');
Route::get('momowallet', 'APIController@momowallet');





Route::get('expensetypeslist', 'APIController@expensetypeslist');
Route::get('expensewalletslist', 'APIController@expensewalletslist');
Route::get('expensecategorieslist', 'APIController@expensecategorieslist');








































Route::get('montheslist', 'APIController@montheslist');

Route::get('currentlyselecteddebitcollectionsreport', 'APIController@currentlyselecteddebitcollectionsreport');
Route::get('yearslist', 'APIController@yearslist');
Route::get('monthreportslist2', 'APIController@monthreportslist2');

Route::get('monthlyexpenseorderby', 'APIController@monthlyexpenseorderby');
Route::get('monthreportslist', 'APIController@monthreportslist');

Route::get('bettingproducts', 'APIController@bettingproducts');
Route::get('branchmachineslist', 'APIController@branchmachineslist');
Route::get('mybranch', 'APIController@mybranch');
Route::get('incomesourceslist', 'APIController@incomesourceslist');
Route::get('transactiontypeslist', 'APIController@transactiontypeslist');

Route::apiResources(['authorisedformcomponents' => 'API\AuthorisedformcomponentsController']);
Route::get('getformfeatures', 'APIController@getformfeatures');
Route::apiResources(['saveformcomponentaccess' => 'API\GiveaccesstoformcomponentController']);
Route::apiResources(['saveroleformcomponent' => 'API\RoleandformcomponentController']);
Route::apiResources(['authorisedsubmenus' => 'API\AuthorisedsubmenuController']);
Route::apiResources(['savesubmenuaccess' => 'API\GiveaccesstosubmenuController']);
Route::apiResources(['savemainmenuaccess' => 'API\GiveaccesstomainmenuController']);
//axios.get("api/mainmenulist").then(({ data }) => (this.mainmenulist = data));
Route::get('orderlistfordatesalesreport', 'APIController@orderlistfordatesalesreport');
Route::get('mainmenulist', 'APIController@mainmenulist');
Route::get('getSubmenues', 'APIController@getSubmenues');
Route::apiResources(['cashoutfromoffice' => 'API\CashCreditController']);
Route::apiResources(['authorisedmainmenus' => 'API\AuthorisedmainmenuController']);
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('contactscomponentaccess', 'APIController@acccesscontactscomponentaccesscomponent');

Route::apiResources(['mainmenucomponents' => 'API\MainmenucomponentController']);
Route::apiResources(['submenus' => 'API\SubmenusController']);
Route::apiResources(['dailyexpensesreportsummary' => 'API\DailyexpensesreportsummaryController']);
Route::apiResources(['dailyexpensesrecords' => 'API\ExpensereportsdailyController']);
Route::apiResources(['dailyexpensesrecordsexpcat' => 'API\ExpensesreporttoviewdetailcategoryController']);

Route::apiResources(['salesrecs' => 'API\FishreporttoviewController']);
Route::apiResources(['currencydetailsrecords' => 'API\CompanycurrencyController']);
Route::apiResources(['vuecomponents' => 'API\VuecomponentsController']);
Route::apiResources(['componentfeatures' => 'API\ComponentfeaturesController']);
Route::apiResources(['shopcashoutdetails' => 'API\ShopcasoutdetailsController']);
Route::apiResources(['approvecashin' => 'API\ApproveCashinController']);
Route::apiResources(['approvecashcollection' => 'API\ApprovecashcollectionController']);
Route::get('generalcomponentaccessSettings', 'APIController@generalcomponentaccessSettings');
Route::get('dailyfishreportAccessComponent', 'APIController@dailyfishreportAccessComponent');
Route::get('genrealfishreportsAccess', 'APIController@genrealfishreportsAccess');
Route::get('getallowedtomanageadate', 'APIController@getallowedtomanageadate');
//axios.get("api/currentlyselecteddebitcollectionsreport").then(({ data }) => (this.currentlyselecteddebitcollectionsreport = data));//

Route::get('mainmenuaccessComponent', 'APIController@mainmenuaccessComponent');
Route::get('submenuaccessComponent', 'APIController@submenuaccessComponent');
Route::get('formfeaturesaccessComponent', 'APIController@formfeaturesaccessComponent');
Route::get('vuedetailsaccessComponent', 'APIController@vuedetailsaccessComponent');

Route::get('gencomponentaccessHrms', 'APIController@gencomponentaccessHrms');



Route::get('categoriesComponentaccess', 'APIController@categoriesComponentaccess');
Route::get('brandsComponentaccess', 'APIController@brandsComponentaccess');
Route::get('unitsofmeasureComponentaccess', 'APIController@unitsofmeasureComponentaccess');
Route::get('companyproductsComponentaccess', 'APIController@companyproductsComponentaccess');
Route::get('purchasesComponentaccess', 'APIController@purchasesComponentaccess');
Route::get('purchaserecordsComponentaccess', 'APIController@purchaserecordsComponentaccess');
Route::get('salessummaryComponentaccess', 'APIController@salessummaryComponentaccess');



Route::apiResources(['generatenewcreditsale' => 'API\SalesoncreditController']);


        

Route::get('customerinvoicecontact', 'APIController@customerinvoicecontact');
Route::get('creditinvoicenumbertoprint', 'APIController@creditinvoicenumbertoprint');
Route::get('creditinvoicecustomername', 'APIController@creditinvoicecustomername');
         Route::get('gettheinvoiceinactiondate', 'APIController@gettheinvoiceinactiondate');
         Route::get('customercontact', 'APIController@customercontact');
         Route::get('customeraddress', 'APIController@customeraddress');
         Route::get('salesorderdateinaction', 'APIController@salesorderdateinaction');
         Route::get('customerordernoinaction', 'APIController@customerordernoinaction');
         Route::get('creditcustomerinaction', 'APIController@creditcustomerinaction');















Route::get('generalProductscomponentAccess', 'APIController@generalProductscomponentAccess');
Route::get('gencomponentaccessCahtransactions', 'APIController@gencomponentaccessCahtransactions');

Route::get('existsausercreditcustomer', 'APIController@existsausercreditcustomer');

Route::get('gencomponentaccessCompanyincomes', 'APIController@gencomponentaccessCompanyincomes');
Route::get('gencomponentaccessExpenses', 'APIController@gencomponentaccessExpenses');
Route::get('generalcomponentaccessComponentfeatures', 'APIController@generalcomponentaccessComponentfeatures');
Route::get('generalPointofsalecomponentaccess', 'APIController@generalPointofsalecomponentaccess');
Route::get('usersccessSettings', 'APIController@usersccessSettings');
Route::get('branchesccessSettings', 'APIController@branchesccessSettings');

Route::get('useraccountbalancesSettings', 'APIController@useraccountbalancesSettings');
Route::get('branchraccountbalancesSettings', 'APIController@branchraccountbalancesSettings');
Route::get('selectedmonthlyreport', 'APIController@selectedmonthlyreport'); 
Route::get('selecteddatetotalsales', 'APIController@selecteddatetotalsales'); 
Route::get('payoutmonthly', 'APIController@payoutmonthly'); 
Route::get('salestotalmonthly', 'APIController@salestotalmonthly'); 
Route::get('collectionsmonthly', 'APIController@collectionsmonthly'); 

Route::get('dailytotalsales', 'APIController@dailytotalsales'); 
Route::get('dailytotalpayout', 'APIController@dailytotalpayout'); 
Route::get('dailycollection', 'APIController@dailycollection'); 
Route::get('totalrangecollections', 'APIController@totalrangecollections'); 
Route::get('tatalgeneratedbythecode', 'APIController@tatalgeneratedbythecode');

Route::get('totalrangecredits', 'APIController@totalrangecredits'); 

Route::get('totalcodecredits', 'APIController@totalcodecredits'); 
Route::get('totalrangeincome', 'APIController@totalrangeincome'); 

Route::get('totalnumberofdaysforcode', 'APIController@totalnumberofdaysforcode'); 

Route::get('capitalaccountcurrentbalance', 'APIController@capitalaccountcurrentbalance'); 
Route::get('pettycashaccountcurrentbalance', 'APIController@pettycashaccountcurrentbalance'); 
Route::get('bankaccountcurrentbalance', 'APIController@bankaccountcurrentbalance'); 
Route::get('collectionsaccountcurrentbalance', 'APIController@collectionsaccountcurrentbalance'); 

























Route::get('totalmonthlycollectionsselectedreport', 'APIController@totalmonthlycollectionsselectedreport'); 
Route::get('totalmonthlyprofitselectedreport', 'APIController@totalmonthlyprofitselectedreport'); 
Route::get('totalmonthlypayoutselectedreport', 'APIController@totalmonthlypayoutselectedreport'); 
Route::get('totalmonthlysalesselectedreport', 'APIController@totalmonthlysalesselectedreport'); 
Route::get('expensefrominvestmentmonth', 'APIController@expensefrominvestmentmonth'); 
Route::get('expensefromcollectionmonth', 'APIController@expensefromcollectionmonth'); 

//
Route::get('branchmonthexpensefrominvestmentmonth', 'APIController@branchmonthexpensefrominvestmentmonth'); 
Route::get('branchmonthexpensefromcollectionmonth', 'APIController@branchmonthexpensefromcollectionmonth'); 

Route::get('rangeexpensesinvestment', 'APIController@rangeexpensesinvestment'); 
Route::get('rangeexpensescollections', 'APIController@rangeexpensescollections'); 


// axios.get("api/branchandmonthreport").then(({ data }) => (this.branchandmonthreport = data));
// axios.get("api/branchandyearreport").then(({ data }) => (this.branchandyearreport = data));
Route::get('branchandmonthreport', 'APIController@branchandmonthreport'); 
Route::get('branchandyearreport', 'APIController@branchandyearreport'); 
Route::get('mothlyreportyearexpenses', 'APIController@mothlyreportyearexpenses'); 
Route::get('mothlyreportmonthexpenses', 'APIController@mothlyreportmonthexpenses'); 
Route::get('mothlyreportmonth', 'APIController@mothlyreportmonth'); 
Route::get('mothlyreportyear', 'APIController@mothlyreportyear'); 

Route::get('selectedbranchreportmonth', 'APIController@selectedbranchreportmonth'); 
Route::get('seleceteddatefordailyreport', 'APIController@seleceteddatefordailyreport'); 

Route::get('seleceteddatefordailyreportenddate', 'APIController@seleceteddatefordailyreportenddate'); 
Route::get('mothlyreportmonthallbrnchmonth', 'APIController@mothlyreportmonthallbrnchmonth'); 
Route::get('mothlyreportmonthallbrnchyear', 'APIController@mothlyreportmonthallbrnchyear'); 
Route::get('selecteddailyexpensesreport', 'APIController@selecteddailyexpensesreport'); 

Route::get('selecteddailyexpensesreport2', 'APIController@selecteddailyexpensesreport2'); 
Route::get('selectedreporttype', 'APIController@selectedreporttype'); 

//////////////////////////////////////////////////////////////////////////////////////

Route::get('cashtransferSettings', 'APIController@cashtransferSettings');
Route::get('collectionsaccountSetting', 'APIController@collectionsaccountSetting');
Route::get('petycashaccountSetting', 'APIController@petycashaccountSetting');
Route::get('bankaccountSettings', 'APIController@bankaccountSettings');
Route::get('incomeaccessSetting', 'APIController@incomeaccessSetting');
Route::get('capitalaccountSetting', 'APIController@capitalaccountSetting');
//

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('expensecategoriesaccessSettings', 'APIController@expensecategoriesaccessSettings');
Route::get('expensetypesaccessSettings', 'APIController@expensetypesaccessSettings');
Route::get('allcompanyexpensesaccessSettings', 'APIController@allcompanyexpensesaccessSettings');
Route::get('makeofficeexpenseaccessSettings', 'APIController@makeofficeexpenseaccessSettings');


Route::get('branchcashOutSettings', 'APIController@branchcashOutSettings');
Route::apiResources(['approvecashout' => 'API\ApproveCashoutController']);

Route::apiResources(['approvecashtransfre' => 'API\ApproveCashtransferController']);
Route::get('shopopenningpalance', 'APIController@shopopenningpalance'); 

Route::get('todayscashintotal', 'APIController@todayscashintotal'); 
Route::get('todayscashouttotal', 'APIController@todayscashouttotal'); 
Route::get('todaysexpensestotal', 'APIController@todaysexpensestotal'); 
Route::get('todayspayouttotal', 'APIController@todayspayouttotal'); 

Route::apiResources(['deletecashcreditcollection' => 'API\DeletecashcreditConroller']);
Route::apiResources(['deletecashincollection' => 'API\DeletecashcollectionConroller']);
Route::apiResources(['makeexpense' => 'API\MadeexpensesConroller']);
Route::get('getExpensestomake', 'APIController@getExpensestomake');
Route::get('getauthorisedtransferlist', 'APIController@getauthorisedtransferlist');

Route::get('allowedtomakecashtransfer', 'APIController@allowedtomakecashtransfer');
Route::get('allowedtodeletecashouttransferrecord', 'APIController@allowedtodeletecashouttransferrecord');
Route::get('allowedtoeditcashouttransferrecord', 'APIController@allowedtoeditcashouttransferrecord');


Route::get('machineoneopenningcode', 'APIController@machineoneopenningcode');
Route::apiResources(['payouts' => 'API\BranchpayoutsController']);

Route::get('shopcashinaccessSettings', 'APIController@shopcashinaccessSettings');
Route::apiResources(['cashindetails' => 'API\CashCollectionController']);
Route::apiResources(['fishcollections' => 'API\CashCollectionController']);
// Route::apiResources(['fishcredits' => 'API\cashoutfromofficeforfish']);
Route::apiResources(['cashoutfromofficeforfish' => 'API\CashCreditController']);

Route::get('branchcashInSettings', 'APIController@branchcashInSettings');
Route::get('rolesaccessSettings', 'APIController@rolesaccessSettings');
Route::get('mainmenuaccessSettings', 'APIController@mainmenuaccessSettings');
Route::get('submenuaccessSettings', 'APIController@submenuaccessSettings');
Route::apiResources(['branchtobalance' => 'API\BranchbalacingController']);

Route::apiResources(['branchintermidiarybalance' => 'API\BranchintermbalacingController']);
Route::get('shopbalancingaccessSettings', 'APIController@shopbalancingaccessSettings');
Route::apiResources(['currentbalancingrecords' => 'API\CurrentShopbalancingContoller']);
Route::apiResources(['branchexpensesrecords' => 'API\BranchmonthlyexpensesContoller']);
Route::apiResources(['currentintermbalancingrecords' => 'API\CurrentShopintermbalancingContoller']);

Route::get('branchpayoutaccessSettings', 'APIController@branchpayoutaccessSettings');
Route::get('branchexpensesaccessSetting', 'APIController@branchexpensesaccessSetting');

Route::get('componentaccessSettings', 'APIController@componentaccessSettings');
Route::get('featuresaccessSettings', 'APIController@featuresaccessSettings');
Route::get('getbranchnamebalancing', 'APIController@Branchnametobalancefunction'); 
Route::get('getAddnewpayout', 'APIController@getAddnewpayout');
Route::get('geteditbranchpayout', 'APIController@editbranchpayout');
Route::apiResources(['thuusersaccountbalance' => 'API\UseraccountbalanceController']);
Route::apiResources(['branchcashbalance' => 'API\BranchaccountbalanceController']);
Route::apiResources(['mycashindetails' => 'API\UsercashindetailsController']);
Route::apiResources(['maycashoutdetails' => 'API\UsercashoutdetailsController']);
Route::apiResources(['expensesreportbybranch' => 'API\ExpensereportstoviewController']);
Route::apiResources(['dailyfishrep' => 'API\FishreporttoviewController']);
Route::apiResources(['dailycollectionsreport' => 'API\CollectionsreporttoviewController']);

Route::apiResources(['dailybranchfloatcodesperformance' => 'API\DaillydailybranchfloatcodesperformancereportController']);
Route::apiResources(['dailycodesreportdata' => 'API\DailysalessummaryreportController']);

Route::apiResources(['codedetails' => 'API\DaillydailybranchfloatcodesperformancereportController']);

Route::apiResources(['collectiondetails' => 'API\CollectionsreporttoviewController']);
Route::apiResources(['monthlybranchexpensedetails' => 'API\MonthlyrexpesesreportabchbController']);
Route::apiResources(['allbranchesexpenserept' => 'API\MonthlyrexpesesreportallbController']);
Route::apiResources(['allbranchesmreports' => 'API\MonthlyreportsallbranchesController']);
Route::apiResources(['monthrlreporyrecords' => 'API\MonthlyreportsController']);
/////////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('getaddnewexpensecategory', 'APIController@getaddnewexpensecategory');
Route::get('allowedtodeletecollection', 'APIController@allowedtodeletecollection');
Route::get('allowedtodeletecredit', 'APIController@allowedtodeletecredit');
Route::get('getaddnewincome', 'APIController@getaddnewincome');
Route::get('geteditexpensecategory', 'APIController@geteditexpensecategory');
Route::get('getdeleteexpensecategory', 'APIController@getdeleteexpensecategory');

Route::get('allowedtoviewcapitalaccount', 'APIController@allowedtoviewcapitalaccount');
Route::get('allowedtoviewpettycashaccount', 'APIController@allowedtoviewpettycashaccount');
Route::get('allowedtoviewbankaccount', 'APIController@allowedtoviewbankaccount');
Route::get('allowedtoviewcollectionsccount', 'APIController@allowedtoviewcollectionsccount');
// Route::get('allowedtoviewcapitalaccount', 'APIController@allowedtoviewcapitalaccount');
// Route::get('allowedtoviewpettycashaccount', 'APIController@allowedtoviewpettycashaccount');
// Route::get('allowedtoviewbankaccount', 'APIController@allowedtoviewbankaccount');



Route::get('getaddnewexpensetype', 'APIController@getaddnewexpensetype');
Route::get('geteditexpensetype', 'APIController@geteditexpensetype');
Route::get('getdeleteexpensetype', 'APIController@getdeleteexpensetype');

///////////////////////////////////////////////////////////////////////////////////////////////////////////////

























Route::get('fishcreditaccessSetting', 'APIController@fishcreditaccessSetting');
Route::get('fishdebitaccessSetting', 'APIController@fishdebitaccessSetting');
Route::get('getWalletlist', 'APIController@getWallets');
Route::get('expensablewallets', 'APIController@expensablewallets');

Route::get('cashcreditaccessSetting', 'APIController@cashcreditaccessSetting');
Route::get('cashcollectionaccessSetting', 'APIController@cashcollectionaccessSetting');
Route::get('geteditcashcollection', 'APIController@geteditcashcollection');

Route::get('getdeletecashcollection', 'APIController@getdeletecashcollection');
Route::get('getaddnewcashcollection', 'APIController@getaddnewcashcollection');
Route::get('getaddnewcashcollection', 'APIController@getaddnewcashcollection');

Route::apiResources(['registernewincome' => 'API\BankstatementsConroller']);

Route::apiResources(['registernewincomesource' => 'API\MyincomsourcesController']);
Route::apiResources(['makecashtransferfromaccountto' => 'API\CashtransfersConroller']);

Route::apiResources(['makecashtransfercredit' => 'API\CashtransferscrediConroller']);

Route::apiResources(['makeexpenseofficeuser' => 'API\MadeexpensesofficeConroller']);
////////////////////////////////////////////////////////////////////////////////
Route::get('geteditcashcredit', 'APIController@geteditcashcredit');
Route::get('getdeletecashcredit', 'APIController@getdeletecashcredit');
Route::get('getExpensetypes', 'APIController@getexpensetypes');
Route::get('getExpensecategories', 'APIController@getexpensecategoriesdy');
//////////////////////////////////////////////////////////////////////////////////////
Route::get('deletebranchpayout', 'APIController@deletebranchpayout');
Route::get('branchalreadybalanced', 'APIController@getIfthebranchisalreadybalanced');
Route::get('geteditbranchexpenserecord', 'APIController@geteditbranchexpenserecord');
Route::get('deletebranchexpenserecord', 'APIController@deletebranchexpenserecord');
Route::get('getAddnewexpenserecord', 'APIController@getAddnewexpenserecord');
Route::get('getbranchopenningbalancefortoday', 'APIController@Bopenningbalancetoday');
Route::get('getbranchopenningb', 'APIController@Bopenningbalance');
//////////////////

Route::get('getaddnewcashcredit', 'APIController@getaddnewcashcredit');
Route::get('getaddnewofficeexpense', 'APIController@getaddnewofficeexpense');

Route::get('geteditofficeexpense', 'APIController@geteditofficeexpense');
Route::get('getdeleteofficeexpense', 'APIController@getdeleteofficeexpense');
Route::get('getaddCompanyexpense', 'APIController@getaddCompanyexpense');
Route::get('geteditCompanyexpense', 'APIController@geteditCompanyexpense');
Route::get('deleteCompanyexpense', 'APIController@deleteCompanyexpense');

/////////////
Route::get('getAddnewuser', 'APIController@getAddnewuser');
Route::get('getviewuser', 'APIController@getviewuser');
Route::get('getedituser', 'APIController@getedituser');
Route::get('getdeleteuser', 'APIController@getdeleteuser');


Route::get('getviewBranch',     'APIController@getviewBranch');
Route::get('geteditBrabcg',     'APIController@geteditBrabcg');
Route::get('getdeletebranch',   'APIController@getdeletebranch');

/////////
Route::get('getdaycashoutbranch', 'APIController@Branchtobalancedayscashout'); 
Route::get('getdayexpensesbranch', 'APIController@Branchtobalancedayexpenses'); 
Route::get('getdaypayoutbranch', 'APIController@Branchtobalancedaypayout'); 
Route::get('getdaycashinbranch', 'APIController@Branchtobalancedayscashin'); 
Route::apiResources(['brachtocollectorcredit' => 'API\BranchtocollectfromController']);

Route::apiResources(['makecashcollection' => 'API\CashCollectionController']);
Route::apiResources(['makecashcredit' => 'API\CashCreditController']);

Route::apiResources(['cashoutfromofficeforfish' => 'API\CashCreditController']);
Route::get('gettodayscashout', 'APIController@Branchtodayscashout'); 
Route::get('gettodayexpenses', 'APIController@Branchtodaysexpenses'); 
Route::get('gettodayspayout', 'APIController@Branchtodayspayout'); 
Route::get('gettodaycashin', 'APIController@Branchtodayscashin'); 
Route::get('getbranchnametocollectfrom', 'APIController@Branchnametocollectfrom'); 











































/////////////////////////////////////////////////////////////////////////
Route::apiResources(['branches' => 'API\BranchesController']);
Route::apiResources(['suppliersrecord' => 'API\SuppliersController']);






Route::get('getAddnewbranch', 'APIController@getAddnewbranch');

Route::get('getviewbranch', 'APIController@getviewBranch');
Route::get('geteditbranch', 'APIController@geteditbranch');
Route::get('getdeletbranch', 'APIController@getdeletbranch');




Route::get('getAddnewmainmenu', 'APIController@getAddnewmainmenu');




Route::get('fishmachinestotal', 'APIController@fishmachinestotal');
Route::get('fishgameproduct', 'APIController@fishgameproduct');
Route::get('virtualgameproduct', 'APIController@virtualgameproduct');
Route::get('soccergameproduct', 'APIController@soccergameproduct');



/// main men access rights settings
Route::get('getGrantmainmenuaccess', 'APIController@getGrantmainmenuaccess');
Route::get('getRevokemainmenuaccess', 'APIController@getRevokemainmenuaccess');

Route::get('getRevokesubmenuaccess', 'APIController@getRevokesubmenuaccess');
Route::get('getGrantsubmenuaccess', 'APIController@getGrantsubmenuaccess');
Route::get('getGrantcomponentaccess', 'APIController@getGrantcomponentaccess');
Route::get('getRevokecomponentaccess', 'APIController@getRevokecomponentaccess');
Route::get('getcurrencydetails', 'APIController@Currencysymbol'); 
/// cash transactions

Route::apiResources(['incomesources' => 'API\IncomesourcesConroller']);
Route::apiResources(['theincomedetails' => 'API\CompanyincomesConroller']);
Route::apiResources(['cashindetails' => 'API\CashCollectionController']);
Route::get('allowedtoaddshopBalancingRecord', 'APIController@allowedtoaddshopBalancingRecord');
Route::get('allowedtodeleteshopBalancingRecord', 'APIController@allowedtodeleteshopBalancingRecord');
Route::get('allowedtoviewshopBalancingRecord', 'APIController@allowedtoviewshopBalancingRecord');
