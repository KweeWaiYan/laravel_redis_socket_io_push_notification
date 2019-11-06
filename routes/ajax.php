<?php

/*
|--------------------------------------------------------------------------
| AJAX Routes
|--------------------------------------------------------------------------
|
| Route file to local ajax requests, where they can benefit from
| session state and CSRF protection. Ajax routes are filtered to check if their
| request has seted to XMLHttpRequest through the AjaxRequests middleware and
| receive all the verifications, filtering and protection from the web mapping.
| Ajax routes, by its prefix already receive middleware interception through
| a configuration in the mapAjaxRoutes in the \App\Providers\RouteServiceProvider.
|
 */

/* dispatch transfer */
Route::post('/process-transfer', 'TransferController@processTransfer');
Route::get('/dropdown-notifs', 'TransferController@getDropDownNotifications');
