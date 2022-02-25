<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Spatie\Analytics\Analytics;
use Spatie\Analytics\Period;

class ChartController extends Controller
{
    //
    public function traffic(Analytics $analytics)
    {
        // $data = $analytics->performQuery(
        //     Period::days(7),
        //     'ga:sessions',
        //     [
        //         'metrics' => 'ga:sessions, ga:pageviews',
        //         'dimensions' => 'ga:yearMonth'
        //     ]
        // );
        $data = $analytics->fetchVisitorsAndPageViews(Period::days(6));
        return $data;
    }
    public function activeUser(Analytics $analytics)
    {
        $data = $analytics->getAnalyticsService()->data_realtime->get('ga:'.env('ANALYTICS_VIEW_ID'), 'rt:activeVisitors')->totalsForAllResults['rt:activeVisitors'];
        return $data;
    }

    public function newUserYear()
    {
        $x= [];
        $y = [];
        $day = 0;
        for ($i = 11; $i >= 0; $i--) {
            $monthname = Carbon::today()->startOfMonth()->subMonth($i);
            $month = Carbon::today()->startOfMonth()->subMonth($i)->format('Y-m-d');
            $users = User::whereYear('created_at', date("Y", strtotime($month)))->whereMonth('created_at', date("m", strtotime($month)))->get();
            array_push($x, $monthname->shortMonthName);
            array_push($y, count($users));
        }
        $users = User::whereMonth('created_at', date("m", strtotime(Carbon::now())))->whereYear('created_at',date("Y", strtotime(Carbon::now())))->whereDate('created_at',date("d", strtotime(Carbon::now())))->get();
        $day = count($users);
        return response()->json([
            'x' => $x,
            'y' => $y, 
            'day' => $day,
        ]);
    }
    public function orderStatus()
    {
        $y = [];
        $date = Carbon::now();
        $y[0] = Order::whereYear('created_at', date("Y", strtotime($date)))->where('status', 'delivered')->count();
        $y[1] = Order::whereYear('created_at', date("Y", strtotime($date)))->where('status', 'denied')->count();
        $y[2] = Order::whereYear('created_at', date("Y", strtotime($date)))->where('status', 'cancelled')->count();
        $y[3] = Order::whereYear('created_at', date("Y", strtotime($date)))->where('status', 'returned')->count();
        
        return $y;
    }

    public function ordersAll()
    {
        $x= [];
        $y = [];
        for($i = 0; $i <= 20; $i++)
        {

            $date = date("Y-m-d", strtotime("-$i days"));   
            $orders = Order::whereMonth('created_at', date("m", strtotime($date)))->whereYear('created_at', date("Y", strtotime($date)))->whereDay('created_at', date("d", strtotime($date)))->get();
            $no = count($orders);
           
            array_push($x,date("M j", strtotime("-$i days")));
            array_push($y, $no);
        }
        
        return response()->json([
            'x' => $x,
            'y' => $y, 
        ]);
    }

    public function orderDataMonth()
    {
        $x= [];
        $y = [];
        for ($i = 11; $i >= 0; $i--) {
            $monthname = Carbon::today()->startOfMonth()->subMonth($i);
            $month = Carbon::today()->startOfMonth()->subMonth($i)->format('Y-m-d');
            $orders = Order::whereYear('created_at', date("Y", strtotime($month)))->whereMonth('created_at', date("m", strtotime($month)))->where('status', 'delivered')->get();
            array_push($x, $monthname->shortMonthName);
            $no = 0;
            $no = $no + count($orders);
            array_push($y, $no);
        }

        return response()->json([
            'x' => $x,
            'y' => $y, 
        ]);
    }
    public function orderDataDay(Request $request)
    {
        $x= [];
        $y = [];
        for($i = 18; $i >= 0; $i--)
        {

            $date = date("Y-m-d", strtotime("-$i days"));   
            $orders = Order::whereYear('created_at', date("Y", strtotime($date)))->whereMonth('created_at', date("m", strtotime($date)))->whereDay('created_at', date("d", strtotime($date)))->where('status', 'delivered')->get();
            $no = 0;
            $no = $no + count($orders);
            array_push($x,date("M j", strtotime("-$i days")));
            array_push($y, $no);
        }
        
        return response()->json([
            'x' => $x,
            'y' => $y, 
        ]);
    }
    public function orderDataYear(Request $request)
    {
        $x= [];
        $y = [];
        $data = array();
        for($i = 12; $i >= 0; --$i)
        {

            $date = date("Y-m-d", strtotime("-$i years"));
            $orders = Order::whereYear('created_at', date("Y", strtotime($date)))->where('status', 'delivered')->get();
            $no = 0;
            $no = $no + count($orders);
            array_push($x,date("Y", strtotime("-$i years")));
            array_push($y, $no);
        }
        
        return response()->json([
            'x' => $x,
            'y' => $y, 
        ]);
    }
}
