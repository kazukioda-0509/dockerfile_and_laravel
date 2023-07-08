<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
// Route::get('/test1', function () {

    \Log::debug(123);
    \Log::debug(456);
    \Log::debug(456);
    \Log::debug(789);

    return 'test1__time__' . mt_rand() . '__' . time();
});

Route::get('/migrate1', function () {

    Schema::create('test_table', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->timestamps();
    });

    \DB::table('test_table')->insert([
        ['name' => 'Sample 1', 'created_at' => now(), 'updated_at' => now()],
        ['name' => 'Sample 2', 'created_at' => now(), 'updated_at' => now()],
    ]);

    return 'migrate OK';
});

Route::get('/get1', function () {

    $records = \DB::table('test_table')->get();

    $result = "";
    foreach ($records as $record) {
        $result .= "ID: " . $record->id . ", Name: " . $record->name . ", Created At: " . $record->created_at . ", Updated At: " . $record->updated_at . "\n";
    }

    return $result;
});