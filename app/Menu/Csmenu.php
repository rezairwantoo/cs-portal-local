<?php 

namespace App\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;
use Firebase\JWT\JWT;
use Session;
use JeroenNoten\LaravelAdminLte\Menu\Filters\FilterInterface;
use Laratrust\Laratrust;

class Csmenu implements FilterInterface
{
    public function transform($item)
    {
        $dataSess = Session::get('_tousr');
        $dataSess = json_decode($dataSess, true);
        if (isset($dataSess)) {
            if ($item['can-access'] != $dataSess['data']['roles'][0]['role_name'] && $item['can-access'] != 'all' ) {
                $item['restricted'] = true;
            }
    
            return $item;
        } else {
            return $item;
        }
        
    }
}
