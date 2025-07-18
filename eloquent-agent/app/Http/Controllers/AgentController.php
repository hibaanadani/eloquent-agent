<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agent;
use Illuminate\Database\Eloquent\Collection;

class AgentController extends Controller
{
    function getAllAgents(){
        foreach (Agent::all() as $agent) {
        echo $agent->name;
}
    }
    function getAgentByID($id){
        $agents=Agent::where('id',$id)
        ->orderBy('name')
        ->limit(5)
        ->get();
    return $agents;
    }
    function getAgentByName($name){
        $agents=Agent::where('name',$name)
        ->orderBy('id')
        ->limit(5)
        ->get();
    return $agents;
    }

    function rejectAgentByID($id){
        $agents=Agent::where('id',$id)->get();
        $agents=$agents->reject(function (Agent $agent){
            return $agents;
        });
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

    function getAgentsByChunk(){
        Agent::chunk(20, function (Collection $agents) {
            foreach ($agents as $agent) 
                return $agent;
    
    });
 }
     function updateAgentsByName($oldname, $newname){
                Agent::where('name',$oldname)
                ->lazyById(20, column: 'id')
                ->each->update(['name'=>$newname]);
    }

    
    function deleteAgent($id){
        $agent=Agent::find($id);
        $agent->delete();
    }

    function destroyAgent($ids){
        $id=explode(',',$ids);
        Agent::destroy($ids);
    }
}
