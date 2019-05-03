<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TableInfo;

class TableController extends Controller
{
    function getData(Request $request){
        $data = TableInfo::orderBy('id', 'desc')->paginate(10);
        return response()->json([
            'data'    => $data,
        ], 200);
    }
    function addInfo(Request $request){
    	 $this->validate($request, [
            'first_name'        => 'required|max:100',
            'last_name' => 'required|max:100',
            'age' => 'required|integer|max:100',
            'city' => 'required|max:100',
            'country' => 'required|max:100'
        ]);
        
        $first_name=$request->first_name;
        $last_name=$request->last_name;
        $age=$request->age;
        $city=$request->city;
        $country=$request->country;
    
        $data = TableInfo::create(['first_name'=>$first_name,'last_name'=>$last_name,'age'=>$age,'city'=>$city,'country'=>$country]);
        
        return response()->json([
            'data'    => $data,
            'message' => 'Success'
        ], 200);
    }
    public function getEditData($id){
        $data = TableInfo::where('id',$id)->get();
        return response()->json([
            'data'    => $data,
            'message' => 'Success'
        ], 200);

    }
    public function update(Request $request,$id)
    {
        $this->validate($request, [
            'first_name'        => 'required|max:100',
            'last_name' => 'required|max:100',
            'age' => 'required|integer|max:100',
            'city' => 'required|max:100',
            'country' => 'required|max:100'
        ]);

        $first_name=$request->first_name;
        $last_name=$request->last_name;
        $age=$request->age;
        $city=$request->city;
        $country=$request->country;
        $data = TableInfo::where('id',$id)->update(['first_name'=>$first_name,'last_name'=>$last_name,'age'=>$age,'city'=>$city,'country'=>$country]);
        
        return response()->json([
            'data'    => $data,
            'message' => 'Success'
        ], 200);
    }
    public function destroy($id)
    {   
       
        $data = TableInfo::find($id)->delete();
        return response()->json([
            'data'    => $data,
            'message' => 'Success'
        ], 200);
    }
}
