<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get("/findAgent/{id?}", [AgentController::class, 'findAgent']);
Route::get("/allAgents", [AgentController::class, 'getAllAgents']);
Route::get("/findAgentbyName/{name?}", [AgentController::class , 'getAgentByName']);
Route::get("/regectAgent/{name?}", [AgentController::class , 'rejectAgentByName']);
Route::get("/freshAgent", [AgentController::class , 'freshAgent']); 
Route::get("/refreshAgent", [AgentController::class , 'RefreshAgent']); 
Route::get("/deleteAgent/{id?}", [AgentController::class, "deleteAgent"]);
Route::get("/destroyAgent/{ids?}", [AgentController::class, "destroyAgent"]);
Route::post("/copyAgent", [AgentController::class, "copyAgent"]);