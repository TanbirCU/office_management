<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\attendance;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cookie;
use Jenssegers\Agent\Facades\Agent;

use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $attendances = User::join('attendances','attendances.user_id','=','users.id')
        ->where('users.id',$user->id)
        ->select('users.name','attendances.*')
        ->get();
        return view('admin.attendance.show_attendance',compact('attendances'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        $today = Carbon::today();

         if ($today->isFriday()) {
        $friday = 'Today is an off day.';
        return view('admin.attendance.attendance', compact('friday'));
         }

        $attendanceIn = attendance::where('user_id', $user->id)
        ->whereDate('attendance_date', $today)
        ->where('status', 1)
        ->first();

        $attendanceOut = attendance::where('user_id', $user->id)
        ->whereDate('attendance_date', $today)
        ->where('status', 2)
        ->first();

        return view('admin.attendance.attendance',compact('today','attendanceIn','attendanceOut'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        // $date = date('Y-m-d');
        // $macAddress = Agent::mac();
        $ipAddress = $request->ip();
        $date = Carbon::today();
        $action = $request->input('action');
        // dd($request->ip());


        // $clientIP = $_SERVER['REMOTE_ADDR'];
        // if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        //     $proxyIPs = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
        //     $clientIP = trim(end($proxyIPs));
        // }



        $attendanceIn = attendance::where('user_id', $user->id)
        ->whereDate('attendance_date', $date)
        ->where('status', 1)
        ->first();

        $attendanceOut = attendance::where('user_id', $user->id)
        ->whereDate('attendance_date', $date)
        ->where('status', 2)
        ->first();

        if($action === 'in'){
            if(!$attendanceIn){
                $ips = $request->getClientIps();
                $ip = null;

                foreach ($ips as $clientIp) {
                    // Convert IPv6 to IPv4 format if necessary
                    if (filter_var($clientIp, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
                        $ipv4 = inet_ntop(inet_pton($clientIp));
                        if (filter_var($ipv4, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
                            $ip = $ipv4;
                            break;
                        }
                    } else {
                        // IPv4 address
                        $ip = $clientIp;
                        break;
                    }
                }

                $clientIp = \Request::getClientIp();
                $attendanceIn = new attendance();
                $attendanceIn->user_id = $user->id;
                $attendanceIn->attendance_date = $date;
                $attendanceIn->in_time = Carbon::now();
                $attendanceIn->out_time = 0;
                $attendanceIn->status = 1;
                // $ips = $request->getClientIps();
                // $ip = !empty($ips) ? $ips[0] :
                $attendanceIn->ip_address = implode(', ', $ips);
                // dd($attendanceIn->ip_address);
                $attendanceIn->mac_address = 0;
                $attendanceIn->save();

                return redirect('/attendance-user')->with('message1', 'Attendance marked in successfully.');
            }
        }elseif ($action === 'out') {
            if ($attendanceIn && !$attendanceOut) {
                $ips = $request->getClientIps();
                $ip = null;

                foreach ($ips as $clientIp) {
                    // Convert IPv6 to IPv4 format if necessary
                    if (filter_var($clientIp, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
                        $ipv4 = inet_ntop(inet_pton($clientIp));
                        if (filter_var($ipv4, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
                            $ip = $ipv4;
                            break;
                        }
                    } else {
                        // IPv4 address
                        $ip = $clientIp;
                        break;
                    }
                }
                $attendanceOut = new attendance();
                $attendanceOut->user_id = $user->id;
                $attendanceOut->attendance_date = $date;
                $attendanceOut->in_time = 0;
                $attendanceOut->out_time = Carbon::now();
                $attendanceOut->status = 2;
                $attendanceOut->ip_address = implode(', ', $ips);
                $attendanceOut->mac_address = 0;
                $attendanceOut->save();

                return redirect('/attendance-user')->with('message2', 'Attendance marked out successfully.');
            }
        }

        return redirect('/attendance-user')->with('error', 'Unable to mark attendance.');
    }






    /**
     * Display the specified resource.
     */
    // public function show()
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit()
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, attendance $attendance)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(attendance $attendance)
    // {
    //     //
    // }
}
