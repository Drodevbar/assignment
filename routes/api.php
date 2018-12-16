<?php

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

Route::get("/repository/{owner}/{repo}", "RepositoryController@repository");

Route::get("/repository/{owner}/{repo}/primary", "RepositoryController@primary");

Route::get("/repository/{owner}/{repo}/latest_release", "RepositoryController@latestRelease");

Route::get("/repository/{owner}/{repo}/pull_rq_number/{state?}", "RepositoryController@pullRequestsNumber");