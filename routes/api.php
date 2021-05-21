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
|
*/ 

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResources(['user' => 'API\UserController']); 
Route::apiResources(['machines' => 'API\MachinesController']); 
Route::apiResources(['newfishcurrentcodes' => 'API\CurrentmacinecodesController']); 



Route::apiResources(['branchesandmachinesadd' => 'API\AuthorisedbranchandmachineController']); 
Route::apiResources(['branchesandmachines' => 'API\BranchesandmachinesController']); 
Route::apiResources(['companybettingproducta' => 'API\BettingcompanyproductsController']); 
Route::get('getCountries', 'APIController@getCountries');
Route::get('getStates', 'APIController@getStates');
Route::get('getRoles', 'APIController@getRoles');
Route::get('getRoles', 'APIController@getRoles');
Route::get('userslist', 'APIController@userslist');
Route::apiResources(['roletobalance' => 'API\RoletoaddcomponentsController']);

Route::apiResources(['branchtoworkon' => 'API\BranchtoworkonController']);
Route::apiResources(['authorisedbranchproducts' => 'API\AuthorisedbranchproductsController']);
Route::apiResources(['saleareportsview' => 'API\SalesreporttoviewController']);
Route::apiResources(['monthlyreportstoview' => 'API\MonthlyreportsController']);

Route::apiResources(['monthlyreportstoviewallbranches' => 'API\MonthlyreportsallbranchesController']);
Route::apiResources(['allowedbranchanduserdatarecords' => 'API\AuthorisedbranchanduserController']);

Route::apiResources(['authorisedbranchmachines' => 'API\AuthorisedbranchandmachineController']);
Route::apiResources(['roletoaddsumenu' => 'API\RoletoaddsubmenuController']);
Route::apiResources(['roletoaddmainmenu' => 'API\RoletoaddmainmenuController']);
Route::apiResources(['expensecategories' => 'API\ExpensecategoriesController']);
Route::apiResources(['expensetypes' => 'API\ExpensetypesController']);
Route::apiResources(['expenses' => 'API\ExpensesController']);
Route::apiResources(['authorisedcomponents' => 'API\AuthorisedcomponentsController']);
Route::apiResources(['saveaccesstovuecomponent' => 'API\GiveaccesstovuecomponentController']);
Route::get('getlistofcomponents', 'APIController@getcomponentslist');
Route::get('branchDetails', 'APIController@branchDetails');


Route::get('montheslist', 'APIController@montheslist');
Route::get('yearslist', 'APIController@yearslist');
Route::get('monthreportslist2', 'APIController@monthreportslist2');

Route::get('monthreportslist', 'APIController@monthreportslist');

Route::get('bettingproducts', 'APIController@bettingproducts');
Route::get('branchmachineslist', 'APIController@branchmachineslist');

Route::get('mybranch', 'APIController@mybranch');
Route::apiResources(['authorisedformcomponents' => 'API\AuthorisedformcomponentsController']);
Route::get('getformfeatures', 'APIController@getformfeatures');
Route::apiResources(['saveformcomponentaccess' => 'API\GiveaccesstoformcomponentController']);
Route::apiResources(['saveroleformcomponent' => 'API\RoleandformcomponentController']);
Route::apiResources(['authorisedsubmenus' => 'API\AuthorisedsubmenuController']);
Route::apiResources(['savesubmenuaccess' => 'API\GiveaccesstosubmenuController']);
Route::apiResources(['savemainmenuaccess' => 'API\GiveaccesstomainmenuController']);

Route::get('orderlistfordatesalesreport', 'APIController@orderlistfordatesalesreport');
Route::get('getMainmenues', 'APIController@getMainmenues');
Route::get('getSubmenues', 'APIController@getSubmenues');
Route::apiResources(['cashoutfromoffice' => 'API\CashCreditController']);
Route::apiResources(['authorisedmainmenus' => 'API\AuthorisedmainmenuController']);
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('contactscomponentaccess', 'APIController@acccesscontactscomponentaccesscomponent');

Route::apiResources(['mainmenucomponents' => 'API\MainmenucomponentController']);
Route::apiResources(['submenus' => 'API\SubmenusController']);
Route::apiResources(['salesrecs' => 'API\FishreporttoviewController']);

Route::apiResources(['vuecomponents' => 'API\VuecomponentsController']);
Route::apiResources(['componentfeatures' => 'API\ComponentfeaturesController']);
Route::apiResources(['shopcashoutdetails' => 'API\ShopcasoutdetailsController']);
Route::apiResources(['approvecashin' => 'API\ApproveCashinController']);
Route::apiResources(['approvefishcashin' => 'API\Approvefishcashin']);
Route::get('generalcomponentaccessSettings', 'APIController@generalcomponentaccessSettings');
Route::get('dailyfishreportAccessComponent', 'APIController@dailyfishreportAccessComponent');
Route::get('genrealfishreportsAccess', 'APIController@genrealfishreportsAccess');

Route::get('mainmenuaccessComponent', 'APIController@mainmenuaccessComponent');
Route::get('submenuaccessComponent', 'APIController@submenuaccessComponent');
Route::get('formfeaturesaccessComponent', 'APIController@formfeaturesaccessComponent');
Route::get('vuedetailsaccessComponent', 'APIController@vuedetailsaccessComponent');
Route::get('gencomponentaccessHrms', 'APIController@gencomponentaccessHrms');

Route::get('gencomponentaccessCahtransactions', 'APIController@gencomponentaccessCahtransactions');
Route::get('gencomponentaccessExpenses', 'APIController@gencomponentaccessExpenses');
Route::get('generalcomponentaccessComponentfeatures', 'APIController@generalcomponentaccessComponentfeatures');
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


Route::get('totalmonthlycollectionsselectedreport', 'APIController@totalmonthlycollectionsselectedreport'); 
Route::get('totalmonthlyprofitselectedreport', 'APIController@totalmonthlyprofitselectedreport'); 
Route::get('totalmonthlypayoutselectedreport', 'APIController@totalmonthlypayoutselectedreport'); 
Route::get('totalmonthlysalesselectedreport', 'APIController@totalmonthlysalesselectedreport'); 


Route::get('mothlyreportmonth', 'APIController@mothlyreportmonth'); 
Route::get('mothlyreportyear', 'APIController@mothlyreportyear'); 






Route::get('selectedreporttype', 'APIController@selectedreporttype'); 






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
Route::get('shopbalancingaccessSettings', 'APIController@shopbalancingaccessSettings');
Route::apiResources(['currentbalancingrecords' => 'API\CurrentShopbalancingContoller']);
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
Route::apiResources(['dailycodesreportdata' => 'API\DaillyfishcodesreportController']);

Route::apiResources(['allbranchesmreports' => 'API\MonthlyreportsallbranchesController']);
Route::apiResources(['monthrlreporyrecords' => 'API\MonthlyreportsController']);
/////////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('getaddnewexpensecategory', 'APIController@getaddnewexpensecategory');
Route::get('geteditexpensecategory', 'APIController@geteditexpensecategory');
Route::get('getdeleteexpensecategory', 'APIController@getdeleteexpensecategory');


Route::get('getaddnewexpensetype', 'APIController@getaddnewexpensetype');
Route::get('geteditexpensetype', 'APIController@geteditexpensetype');
Route::get('getdeleteexpensetype', 'APIController@getdeleteexpensetype');



Route::get('getaddnewexpensetype', 'APIController@getaddnewexpensetype');
Route::get('geteditexpensetype', 'APIController@geteditexpensetype');
Route::get('getdeleteexpensetype', 'APIController@getdeleteexpensetype');

///////////////////////////////////////////////////////////////////////////////////////////////////////////////

























Route::get('fishcreditaccessSetting', 'APIController@fishcreditaccessSetting');
Route::get('fishdebitaccessSetting', 'APIController@fishdebitaccessSetting');
Route::get('getWalletlist', 'APIController@getWallets');
Route::get('cashcreditaccessSetting', 'APIController@cashcreditaccessSetting');
Route::get('cashcollectionaccessSetting', 'APIController@cashcollectionaccessSetting');
Route::get('geteditcashcollection', 'APIController@geteditcashcollection');

Route::get('getdeletecashcollection', 'APIController@getdeletecashcollection');
Route::get('getaddnewcashcollection', 'APIController@getaddnewcashcollection');
Route::get('getaddnewcashcollection', 'APIController@getaddnewcashcollection');
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
Route::apiResources(['cashindetails' => 'API\CashCollectionController']);
Route::get('allowedtoaddshopBalancingRecord', 'APIController@allowedtoaddshopBalancingRecord');
Route::get('allowedtodeleteshopBalancingRecord', 'APIController@allowedtodeleteshopBalancingRecord');
Route::get('allowedtoviewshopBalancingRecord', 'APIController@allowedtoviewshopBalancingRecord');
