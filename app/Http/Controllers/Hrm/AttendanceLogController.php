<?php

namespace App\Http\Controllers\Hrm;

use Rats\Zkteco\Lib\ZKTeco;
use App\Helpers\FingerHelper;
use App\Models\hrm\AttendanceLog;
use App\Http\Controllers\Controller;
use App\Http\Requests\Hrm\StoreAttendanceLogRequest;
use App\Http\Requests\Hrm\UpdateAttendanceLogRequest;

class AttendanceLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $device = new ZKTeco('192.168.8.101', 4370);

        $device->connect();
        
        $data = $device->getAttendance();

        dd($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAttendanceLogRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAttendanceLogRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\hrm\AttendanceLog  $attendanceLog
     * @return \Illuminate\Http\Response
     */
    public function show(AttendanceLog $attendanceLog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\hrm\AttendanceLog  $attendanceLog
     * @return \Illuminate\Http\Response
     */
    public function edit(AttendanceLog $attendanceLog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAttendanceLogRequest  $request
     * @param  \App\Models\hrm\AttendanceLog  $attendanceLog
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAttendanceLogRequest $request, AttendanceLog $attendanceLog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\hrm\AttendanceLog  $attendanceLog
     * @return \Illuminate\Http\Response
     */
    public function destroy(AttendanceLog $attendanceLog)
    {
        //
    }
}
