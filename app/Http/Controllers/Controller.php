<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use DateTime;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    // protected function getDateToString($dateTime)
    // {
        
    //     $datetime1=new DateTime("now");
    //     $datetime2=new DateTime($dateTime);
    //     // $diff=date_diff($datetime1, $datetime2);
    //     $diff = $datetime1->diff($datetime2);
    //     $timemsg='';
    //     if($diff->y > 0){
    //         $timemsg = $dateTime;

    //     }
    //     else if($diff->m > 0){
    //     $timemsg = $dateTime;
    //     }
    //     else if($diff->d > 0){
    //         if($diff->d==1)
    //         {
    //             $timemsg = 'Yesterday';

    //         }
    //         else{

    //             $timemsg = $dateTime;
    //         }
    //     }
    //     else if($diff->h > 0){
    //     $timemsg = $diff->h .' hour'.($diff->h > 1 ? "s":'').' ago';
    //     }
    //     else if($diff->i > 0){
    //     $timemsg = $diff->i .' minute'. ($diff->i > 1?"s":'').' ago';
    //     }
    //     else if($diff->s > 0){
    //     $timemsg = $diff->s .' second'. ($diff->s > 1?"s":'').' ago';
    //     }
    //     else{
    //         $timemsg = "Just Now";  
    //     }

    //     $timemsg = $timemsg;
    //     return $timemsg;
    // }
}
