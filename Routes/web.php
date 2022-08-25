<?php

use Modules\Bank\Http\Controllers\BankController;

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth', 'admin']], function () {
    Route::resource('banks', BankController::class);
});
