<?php

namespace App\Http\Controllers\Hrm;

use Carbon\Carbon;
use App\Models\hrm\Duty;
use Rats\Zkteco\Lib\ZKTeco;
use App\Models\Hrm\Employee;
use App\Models\Hrm\WorkSite;
use Illuminate\Http\Request;
use App\Helpers\FingerHelper;
use Illuminate\Support\Facades\DB;
use App\Concerns\FilterMultiFields;
use App\Models\hrm\BiometricDevice;
use App\Http\Controllers\Controller;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;
use App\Http\Requests\Hrm\StoreBiometricDeviceRequest;
use App\Http\Requests\Hrm\UpdateBiometricDeviceRequest;
use App\Models\hrm\AttendanceLog;

class BiometricDeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $fields= ['biometric_devices.name','biometric_devices.ip','work_sites.name'];
        
        $allowedfilters =[
            AllowedFilter::custom('query', new FilterMultiFields($fields))
        ];
        
        $devices = QueryBuilder::for(BiometricDevice::with('worksite'))
        
        ->defaultSort('biometric_devices.name')
        ->allowedFilters($allowedfilters)
        ->paginate(10)
        ->appends(request()->query());
        $request->flash();

        
        return view('hrm.biometricdevices.index', compact('devices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $worksites = WorkSite::all();
        return view('hrm.biometricdevices.create', compact('worksites'))->withDevice(new BiometricDevice());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $helper = new FingerHelper();

        $device = $helper->init($request->input('ip'));

        if ($device->connect()) {
            $serial = $helper->getSerial($device);
        } else {
            $serial = null;
        }
        
        $request->merge([
            'serial' => $serial
        ]);

        $data = $request->validate([
            'name' => 'required|string',
            'ip' => 'required|ipv4',            
            'work_site_id' => 'required|string|exists:work_sites,id',
            'serial' => 'nullable|string|unique:biometric_devices'
        ]);

        

        $bdevice = new BiometricDevice();
        $bdevice->name = $data['name'];
        $bdevice->ip = $data['ip'];
        $bdevice->serial = $data['serial'];
        $bdevice->work_site_id = $data['work_site_id'];
        $bdevice->save();

        return redirect()->route('hrm.biometricdevices.index')->withSuccess('Device created successfully.');

    }

    /**
     * Show the form for creating a new resource.
     * @param  \App\Models\hrm\BiometricDevice  $biometricdevice
     * @return \Illuminate\Http\Response
     */
    public function download(BiometricDevice $biometricdevice)
    {
        
        $device = new ZKTeco($biometricdevice->ip, 4370);

        $device->connect();
        
        $data = $device->getAttendance();
        //dd($data);
        foreach($data as $log){
            $time = Carbon::createFromFormat('Y-m-d H:i:s', $log['timestamp'])->format('H:i:s');
            $date = Carbon::createFromFormat('Y-m-d H:i:s', $log['timestamp'])->format('Y-m-d');
            
            AttendanceLog::create([
            'biometric_device_id' => $biometricdevice->id,
            'uid' => $log['uid'],
            'date' => $date,
            'time' => $time,
            'staff_id' => $log['id'],
            'state' => $log['state'],
            'type' => $log['type']
           ]);
            
            
        }

        return redirect()->route('hrm.biometricdevices.index')->withSuccess('Logs downloaded successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\hrm\BiometricDevice  $biometricdevice
     * @return \Illuminate\Http\Response
     */
    public function show(BiometricDevice $biometricdevice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\hrm\BiometricDevice  $biometricdevice
     * @return \Illuminate\Http\Response
     */
    public function edit(BiometricDevice $biometricdevice)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBiometricDeviceRequest  $request
     * @param  \App\Models\hrm\BiometricDevice  $biometricdevice
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBiometricDeviceRequest $request, BiometricDevice $biometricdevice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\hrm\BiometricDevice  $biometricdevice
     * @return \Illuminate\Http\Response
     */
    public function destroy(BiometricDevice $biometricdevice)
    {
        
        $biometricdevice->delete();
        return redirect()->route('hrm.biometricdevices.index')->withSuccess('Device deleted successfully.');
    }
}
