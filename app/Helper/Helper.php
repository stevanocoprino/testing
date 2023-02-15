<?php

namespace App\Helper;
use DateTime;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use App\Models\NewsTypes;

class Helper
{
    public static function getDateToString($dateTime)
    {
        
        $datetime1=new DateTime("now");
        $datetime2=new DateTime($dateTime);
        // $diff=date_diff($datetime1, $datetime2);
        $diff = $datetime1->diff($datetime2);
        $timemsg='';
        if($diff->y > 0){
            $timemsg = date("Y-m-d" ,strtotime($dateTime));

        }
        else if($diff->m > 0){
        $timemsg = date("Y-m-d" ,strtotime($dateTime));
        }
        else if($diff->d > 0){
            if($diff->d==1)
            {
                $timemsg = 'Yesterday';

            }
            else{

                $timemsg = date("Y-m-d" ,strtotime($dateTime));
            }
        }
        else if($diff->h > 0){
        $timemsg = $diff->h .' hour'.($diff->h > 1 ? "s":'').' ago';
        }
        else if($diff->i > 0){
        $timemsg = $diff->i .' minute'. ($diff->i > 1?"s":'').' ago';
        }
        else if($diff->s > 0){
        $timemsg = $diff->s .' second'. ($diff->s > 1?"s":'').' ago';
        }
        else{
            $timemsg = "Just Now";  
        }

        $timemsg = $timemsg;
        return $timemsg;
    }

    public static function header_menu(){
        $newsTypes   = NewsTypes::with(['newsSubTypes','newsSubTypes.newsSubSubTypes'])
        ->where('aktif','1')
        ->orderBy('urutan','ASC')
        // ->limit("4")
        ->get();

        return $newsTypes;
    }
}