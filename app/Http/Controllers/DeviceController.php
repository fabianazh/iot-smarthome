<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDeviceRequest;
use App\Http\Requests\UpdateDeviceRequest;
use App\Models\Device;
use App\Models\DeviceModel;
use App\Models\DeviceType;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.device.index', [
            'title' => 'Smarthome devices',
            'devices' => Device::where('user_id', auth()->id())->get(),
            'type' => DeviceType::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        if($request->id){
            return view('dashboard.device.add-device', [
                'title' => 'Smarthome add device',
                'type' => DeviceType::all(),
                'device' => DeviceModel::where('id', $request->id)->first(),
                'user' => auth()->user()
            ]); 
        }
        
        return view('dashboard.device.add-type', [
            'title' => 'Smarthome add device',
            'type' => DeviceType::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDeviceRequest $request)
    {
        $validatedData = $request->validated();

        Device::create([
            'user_id' => auth()->id(),
            'device_model_id' => $validatedData['device_model_id'],
            'slug' => str()->uuid(),
            'name' => $validatedData['name'],
            'room' => $validatedData['room']
        ]);

        return redirect('/device')->with('status','device-add');
    }

    /**
     * Display the specified resource.
     */
    public function show(Device $slug)
    {
        $device = $slug;
        return view('dashboard.device.show',[
            'title' => $device->name,
            'device' => $device,
            'type' => DeviceType::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDeviceRequest $request, Device $slug)
    {
        $device = $slug;
        $validatedData = $request->validated();

        Device::where('id', $device->id)->update($validatedData);

        return redirect()->back()->with('status', 'device-updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Device $slug)
    {
        Device::destroy($slug->id);

        return redirect('/device')->with('status', 'device-deleted');
    }

    public function turnOnDevice(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|integer|exists:devices',
            'status' => 'required'
        ]);

        Device::where('id', $request->input('id'))
                ->update($validatedData);

        return response()->json([
            'status' => 'device-on',
        ]);
    }

    public function turnOffDevice(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|integer|exists:devices',
            'status' => 'required'
        ]);

        Device::where('id', $request->input('id'))
                ->update($validatedData);

        return response()->json([
            'status' => 'device-off',
        ]);
    }
}
