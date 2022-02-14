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
        $users = User::whereMonth('created_at',Carbon::now())->whereYear('created_at',Carbon::now())->whereDate('created_at', Carbon::now())->get();
        $day = count($users);
        return response()->json([
            'x' => $x,
            'y' => $y, 
            'day' => $day,
        ]);
    }

    public function orders(Request $request)
    {
        $x= [];
        $y = [];
        for($i = 30; $i >= 0; $i--)
        {

            $date = date("Y-m-d", strtotime("+$i days"));   
            $orders = Order::whereMonth('created_at',Carbon::parse($date))->whereYear('created_at',Carbon::parse($date))->get();
            $no = 0;
            foreach($orders as $order)
            {
                $no = $no + count($order->slots);
            }
                array_push($x,date("M j", strtotime("+$i days")));
                array_push($y, $no);
        }
        
        return response()->json([
            'x' => $x,
            'y' => $y, 
        ]);
    }

    public function sales(Request $request)
    {
        $x= [];
        $y = [];
        for($i = 30; $i >= 0; $i--)
        {

            $date = date("Y-m-d", strtotime("+$i days"));   
            $orders = Order::whereMonth('created_at',Carbon::parse($date))->whereYear('created_at',Carbon::parse($date))->where('status', 'delivered')->get();
            $no = 0;
            foreach($orders as $order)
            {
                $no = $no + count($order->slots);
            }
            if($no){
                array_push($x,date("M j", strtotime("+$i days")));
                array_push($y, $no);
            }
        }
        
        return response()->json([
            'x' => $x,
            'y' => $y, 
        ]);
    }
}
