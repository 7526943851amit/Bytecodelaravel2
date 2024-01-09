<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Auth;
use Session;

class VehicleController extends Controller
{
    public function login(){
        return view('ebdb_login');
    }
   
 public function logincheck(Request $request){
    $request->validate([
        'email' => 'required',
        'password' => 'required',
    ]);

    $credentials = $request->only('email', 'password');
    if (Auth::attempt($credentials)) {
        $jsonFile = public_path('evdb_data.json');
        $jsonData = json_decode(file_get_contents($jsonFile), true);

        foreach ($jsonData as $data) {
    
            $vehicleId = $data['Vehicle_ID'];

    
            $existingRecord = Vehicle::where('vehicle_id', $vehicleId)->first();

            if ($existingRecord) {
                continue;
            }

     
            //unset($data['Vehicle_ID']);

      
            $evdbDataJson = json_encode($data);

            
            Vehicle::create([
                'vehicle_id' => $vehicleId,
                'evdb_data' => $evdbDataJson,
            ]);
        }

        // return response()->json(['message' => 'Data inserted successfully']);
        Session::flush();
        Auth::logout();
        return redirect('/fetch-data');
    }

    return redirect("/insert-data")->witherror('Oppes! You have entered invalid credentials');
 }


    
    //    public function inserdata(){
    //         $jsonFile = public_path('evdb_data.json');
    //         $jsonData = json_decode(file_get_contents($jsonFile), true);
    
    //         foreach ($jsonData as $data) {
        
    //             $vehicleId = $data['Vehicle_ID'];
    
        
    //             $existingRecord = Vehicle::where('vehicle_id', $vehicleId)->first();
    
    //             if ($existingRecord) {
    //                 continue;
    //             }
    
         
    //             //unset($data['Vehicle_ID']);
    
          
    //             $evdbDataJson = json_encode($data);
    
                
    //             Vehicle::create([
    //                 'vehicle_id' => $vehicleId,
    //                 'evdb_data' => $evdbDataJson,
    //             ]);
    //         }
    
    //         return response()->json(['message' => 'Data inserted successfully']);
       
        
    // }

    public function fetchData()
    {
        $vehicles = Vehicle::all();
        $responseData = [];
    
        foreach ($vehicles as $vehicle) {
            $vehicleData = json_decode($vehicle->evdb_data, true);
            $vehicleData['vehicle_id'] = $vehicle->vehicle_id;
            $responseData[] = $vehicleData;
        }
    
        return response()->json(['vehicles' => $responseData]);
    }
    

}
