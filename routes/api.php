<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');





Route::get('/hello', [
    App\Http\Controllers\TestController::class,'test',]);

Route::get('/hi', [
    App\Http\Controllers\TestController::class,'test2',]);

//GET index/note
Route::get('/note', [
    App\Http\Controllers\NoteController::class,'index',]);
//GET show /note/{id}
Route::get('/note/{id}', [
    App\Http\Controllers\NoteController::class,'show',]);
//POST /note
Route::post('/note', [
    App\Http\Controllers\NoteController::class,'store',]);
//PUT /note/{id}
Route::put('/note/{id}', [
    App\Http\Controllers\NoteController::class,'update',]);
//DELETE /note/{id}
Route::delete('/note/{id}', [
    App\Http\Controllers\NoteController::class,'destroy',]);

Route::apiResource('users', App\Http\Controllers\UserController::class);

Route::get('/note/{note_id}/subnotes', [App\Http\Controllers\SubNoteController::class, 'index']);
Route::post('/subnote', [App\Http\Controllers\SubNoteController::class, 'store']);
Route::get('notes/{note_id}/comments',[App\Http\Controllers\CommentController::class,'index']);
Route::post('comments',[App\Http\Controllers\CommentController::class,'store']);
