<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agent;


class AgentController extends Controller
{
    function getAllAgents(){
        foreach (Agent::all() as $agent) {
        echo $agent->name;
}
    }

    function getAgentByName($name){
        $agents=Agent::where('name',$name)
        ->orderBy('id')
        ->limit(5)
        ->get();
    return $agents;
    }

    function rejectAgentByName($name){
        $agents=Agent::where('name',$name)->get();
        $agents=$agents->reject(function (Agent $agent){
            return $agents;
        });
    }

    function freshAgent($name){
        $agent=Agent::where('name',$name)->first();
        $freshAgent=$agent->fresh();
    return $freshAgent;
    }
    
    function RefreshAgent($name){
        $agent=Agent::where('name',$name)->first();
        $agent->name=$name;
        $agent->refresh();
        $agent->$name;
    return $agent;
    }

    function get
}
