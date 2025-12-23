<?php
use App\Models\GeneralSetting;
use App\Models\User;
use App\Models\Income;
use App\Models\Investment;
use App\Models\UserExtra;
use App\Models\BvLog;
use Illuminate\Support\Facades\Mail;
use App\Mail\Sendmail;
use Illuminate\Support\Facades\DB;
$downline="";

function siteName()
{
    $general = GeneralSetting::first();
    return $general->sitename;
}

function currency()
{
    $general = GeneralSetting::first();
    return $general->cur_sym;
}

function generalDetail()
{
    $general = GeneralSetting::first();
    return $general;
}

function paginationLimit()
{
    $general = GeneralSetting::first();
    return $general->PaginationLimit;
}


function sendEmail($user, $type = null, $shortCodes = [])
{

  $mail_data=array('subject'=>$type,'MailDetail'=>$shortCodes);
  \Mail::to($user)->send(new Sendmail($mail_data));  
}

function isUserExists($id)
{
    $user = User::find($id);
    if ($user) {
        return true;
    } else {
        return false;
    }
}
function getPositionId($id)
{
    $user = User::find($id);
    if ($user) {
        return $user->ParentId;
    } else {
        return 0;
    }
}


function getPositionUser($id, $position,$table)
{
    return DB::table($table)->where('ParentId', $id)->where('position', $position)->first();
}


function showTreePage($id,$table)
{
    $res = array_fill_keys(array('b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o'), null);
    $res['a'] = DB::table($table)->where('user_id_fk',$id)->first();

    $res['b'] = getPositionUser($id, 'Left',$table);
    if ($res['b']) {
        $res['d'] = getPositionUser($res['b']->user_id_fk, 'Left',$table);
        $res['e'] = getPositionUser($res['b']->user_id_fk, 'Right',$table);
    }
    if ($res['d']) {
        $res['h'] = getPositionUser($res['d']->user_id_fk, 'Left',$table);
        $res['i'] = getPositionUser($res['d']->user_id_fk, 'Right',$table);
    }
    if ($res['e']) {
        $res['j'] = getPositionUser($res['e']->user_id_fk, 'Left',$table);
        $res['k'] = getPositionUser($res['e']->user_id_fk, 'Right',$table);
    }
    $res['c'] = getPositionUser($id, 'Right',$table);
    if ($res['c']) {
        $res['f'] = getPositionUser($res['c']->user_id_fk, 'Left',$table);
        $res['g'] = getPositionUser($res['c']->user_id_fk, 'Right',$table);
    }
    if ($res['f']) {
        $res['l'] = getPositionUser($res['f']->user_id_fk, 'Left',$table);
        $res['m'] = getPositionUser($res['f']->user_id_fk, 'Right',$table);
    }
    if ($res['g']) {
        $res['n'] = getPositionUser($res['g']->user_id_fk, 'Left',$table);
        $res['o'] = getPositionUser($res['g']->user_id_fk, 'Right',$table);
    }
    return $res;
}

function getImage($image,$size = null)
{
    $clean = '';
    $size = $size ? $size : 'undefined';
    if (file_exists($image) && is_file($image)) {
        return asset($image) . $clean;
    }else{
        return route('placeholderImage',$size);
    }
}



function showSingleUserinTree($user)
{
    $res = '';
    if ($user) {
            
            $userType = "paid-user";
            $stShow = "Paid";


        $img = "/upnl/images/avatar.png";
      
       
       
        $res .= "<div class=\"user showDetails\" type=\"button\">";
        $res .= "<img src=\"$img\" alt=\"*\"  class=\"$userType\">";
        $res .= "<p class=\"user-name\">$user->user_id_fk</p>";

    } else {
        $img = "https://traderayz.com/placeholder-image/120x120";

        $res .= "<div class=\"user\" type=\"button\">";
        $res .= "<img src=\"$img\" alt=\"*\"  class=\"no-user\">";
        $res .= "<p class=\"user-name\">No user</p>";
    }

    $res .= " </div>";
    $res .= " <span class=\"line\"></span>";

    return $res;

}





 function findFirstActiveUpline($userId, $minAmount)
{
    $current = User::select('id', 'sponsor')->where('id', $userId)->first();

    while ($current && $current->sponsor) {
        $sponsor = User::select('id', 'sponsor')->where('id', $current->sponsor)->first();

        if ($sponsor) {
            $active = Investment::where('user_id', $sponsor->id)
                ->where('status', 'Active')
                ->where('amount', $minAmount)
                ->first();

            if ($active) {
                // Return sponsor ID and amount if match found
                return [
                    'id' => $sponsor->username,
                ];
            }

            $current = $sponsor;
        } else {
            break;
        }
    }

    return null; // No matching active sponsor found
}


function findAvailablePlacement_new($table,$parentId)
{
    // Fetch all children ordered by ID to ensure Left → Right
    $children = \DB::table($table)->where('ParentId', $parentId)->orderBy('id')->get();

    if ($children->count() < 2) {
        // Determine position: if no child → Left, if 1 child → Right
        $position = $children->count() === 0 ? 'Left' : 'Right';
        return [
            'placement_id' => $parentId,
            'position' => $position
        ];
    }

    // Recursively check children
    foreach ($children as $child) {
        $placement = findAvailablePlacement($child->id);
        if ($placement !== null) {
            return $placement;
        }
    }

    // No placement found
    return null;
}



function autoFillFakeUsers($parentUsername, $round = 'round1') {
    $insertFake = function ($parentUsername, $pos, $lvl) use ($round) {
        $fakeUsername = substr(rand(), -2) . substr(time(), -2) . substr(mt_rand(), -3);
        $fakeId = substr(rand(), -2) . substr(time(), -2) . substr(mt_rand(), -3);

      
        // Insert into round table using username as ParentId and sponsor
        DB::table($round)->insert([
            'ParentId' => $parentUsername,
            'sponsor' => $parentUsername,
            'level' => $lvl,
            'user_id' => $fakeId, // also username here
            'user_id_fk' => $fakeUsername,
            'position' => $pos,
        ]);

        return $fakeUsername;
    };

    // Level 1 under real user
    $fake1 = $insertFake($parentUsername, 'Left', 1);
    $fake2 = $insertFake($parentUsername, 'Right', 1);

    // Level 2 under fake1
    $insertFake($fake1, 'Left', 2);
    $insertFake($fake1, 'Right', 2);

    // Level 2 under fake2
    $insertFake($fake2, 'Left', 2);
    $insertFake($fake2, 'Right', 2);
}

function findAvailablePlacement($table,$startId)
{
    $queue = [$startId];

    while (!empty($queue)) {
        $currentId = array_shift($queue); // dequeue the first node

        // Fetch children of current node
        $children = \DB::table($table)->where('ParentId',$currentId)->orderBy('id')->get();

        if ($children->count() < 2) {
            // Determine position: 0 → Left, 1 → Right
            $position = $children->count() === 0 ? 'Left' : 'Right';
            return [
                'placement_id' => $currentId,
                'position' => $position
            ];
        }

        // Enqueue children to continue traversal
        foreach ($children as $child) {
            $queue[] = $child->user_id_fk;
        }
    }

    // If no spot found (shouldn’t happen unless tree is full)
    return null;
}


function updateFreeCount($id)
{
    while ($id != "" || $id != "0") {
        if (isUserExists($id)) {
            $posid = getPositionId($id);

            if ($posid == "0") {
                break;
            }

            $position = getPositionLocation($id);

            $extra = UserExtra::where('user_id', $posid)->first();
            if($extra)
            {
             if ($position == "Left") {
                $extra->free_left += 1;
            } else {
                $extra->free_right += 1;
            }
            $extra->save();
    
            }
           
            $id = $posid;

        } else {
            break;
        }
    }

}

function getPositionLocation($id)
{
    $user = User::find($id);
    if ($user) {
        return $user->position;
    } else {
        return 0;
    }
}


function updatePaidCount($id)
{
    while ($id != "" || $id != "0") {
        if (isUserExists($id)) {
            $posid = getPositionId($id);
            if ($posid == "0") {
                break;
            }
            $position = getPositionLocation($id);

            $extra = UserExtra::where('user_id', $posid)->first();

            if ($position == "Left") {
                $extra->free_left -= 1;
                $extra->paid_left += 1;
            } else {
                $extra->free_right -= 1;
                $extra->paid_right += 1;
            }
            $extra->save();
            $id = $posid;
        } else {
            break;
        }
    }

}


function updateBV($id, $bv, $details)
{
    while ($id != "" || $id != "0") {
        if (isUserExists($id)) {
            $posid = getPositionId($id);
            if ($posid == "0") {
                break;
            }
            $posUser = User::find($posid);
                $position = getPositionLocation($id);
                $extra = UserExtra::where('user_id', $posid)->first();
                
                $bvlog = new BvLog();
                $bvlog->user_id = $posid;

                if ($position == "Left") {
                    $extra->bv_left += $bv;
                    $bvlog->position = 'Left';
                } else {
                    $extra->bv_right += $bv;
                    $bvlog->position = 'Right';
                }
                $extra->save();
                
                $bvlog->amount = $bv;
                $bvlog->trx_type = '+';
                $bvlog->details = $details;
                $bvlog->save();
          
            $id = $posid;
        } else {
            break;
        }
    }

}





//moveable
function getIpInfo()
{
    $ip = null;
    $deep_detect = TRUE;

    if (filter_var($ip, FILTER_VALIDATE_IP) === FALSE) {
        $ip = $_SERVER["REMOTE_ADDR"];
        if ($deep_detect) {
            if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP))
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP))
                $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
    }


    $xml = @simplexml_load_file("http://www.geoplugin.net/xml.gp?ip=" . $ip);


    $country = @$xml->geoplugin_countryName;
    $city = @$xml->geoplugin_city;
    $area = @$xml->geoplugin_areaCode;
    $code = @$xml->geoplugin_countryCode;
    $long = @$xml->geoplugin_longitude;
    $lat = @$xml->geoplugin_latitude;

    $data['country'] = $country;
    $data['city'] = $city;
    $data['area'] = $area;
    $data['code'] = $code;
    $data['long'] = $long;
    $data['lat'] = $lat;
    $data['ip'] = request()->ip();
    $data['time'] = date('d-m-Y h:i:s A');


    return $data;
}

function osBrowser(){
    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    $os_platform = "Unknown OS Platform";
    $os_array = array(
        '/windows nt 10/i' => 'Windows 10',
        '/windows nt 6.3/i' => 'Windows 8.1',
        '/windows nt 6.2/i' => 'Windows 8',
        '/windows nt 6.1/i' => 'Windows 7',
        '/windows nt 6.0/i' => 'Windows Vista',
        '/windows nt 5.2/i' => 'Windows Server 2003/XP x64',
        '/windows nt 5.1/i' => 'Windows XP',
        '/windows xp/i' => 'Windows XP',
        '/windows nt 5.0/i' => 'Windows 2000',
        '/windows me/i' => 'Windows ME',
        '/win98/i' => 'Windows 98',
        '/win95/i' => 'Windows 95',
        '/win16/i' => 'Windows 3.11',
        '/macintosh|mac os x/i' => 'Mac OS X',
        '/mac_powerpc/i' => 'Mac OS 9',
        '/linux/i' => 'Linux',
        '/ubuntu/i' => 'Ubuntu',
        '/iphone/i' => 'iPhone',
        '/ipod/i' => 'iPod',
        '/ipad/i' => 'iPad',
        '/android/i' => 'Android',
        '/blackberry/i' => 'BlackBerry',
        '/webos/i' => 'Mobile'
    );
    foreach ($os_array as $regex => $value) {
        if (preg_match($regex, $user_agent)) {
            $os_platform = $value;
        }
    }
    $browser = "Unknown Browser";
    $browser_array = array(
        '/msie/i' => 'Internet Explorer',
        '/firefox/i' => 'Firefox',
        '/safari/i' => 'Safari',
        '/chrome/i' => 'Chrome',
        '/edge/i' => 'Edge',
        '/opera/i' => 'Opera',
        '/netscape/i' => 'Netscape',
        '/maxthon/i' => 'Maxthon',
        '/konqueror/i' => 'Konqueror',
        '/mobile/i' => 'Handheld Browser'
    );
    foreach ($browser_array as $regex => $value) {
        if (preg_match($regex, $user_agent)) {
            $browser = $value;
        }
    }

    $data['os_platform'] = $os_platform;
    $data['browser'] = $browser;

    return $data;
}


function verificationCode($length)
{
    if ($length == 0) return 0;
    $min = pow(10, $length - 1);
    $max = 0;
    while ($length > 0 && $length--) {
        $max = ($max * 10) + 9;
    }
    return random_int($min, $max);
}



 function add_level_income($id,$amt)
        {

          //$user_id =$this->session->userdata('user_id_session')
      $data = User::where('id',$id)->orderBy('id','desc')->first();
      
        $user_id = $data->username;
        $fullname=$data->name;
       
        $rname = $data->username;
        $user_mid = $data->id;
          
     
              $cnt = 1;

              $amount = $amt/100;
                
                while ($user_mid!="" && $user_mid!="1"){
  
                      $Sposnor_id = User::where('id',$user_mid)->orderBy('id','desc')->first();
                      $sponsor=$Sposnor_id->sponsor;
                      if (!empty($sponsor))
                       {
                        $Sposnor_status = User::where('id',$sponsor)->orderBy('id','desc')->first();
                        $Sposnor_cnt = User::where('sponsor',$sponsor)->where('active_status','Active')->count("id");
                      $sp_status=$Sposnor_status->active_status;
                      $total_get = $Sposnor_status->package*5;
                      $total_profit= Income::where('user_id',$Sposnor_status->id)->sum("comm");
                      }
                      else
                      {
                        $Sposnor_status =array();
                        $sp_status="Pending";
                        $Sposnor_cnt=0;
                        $total_get =0;
                        $total_profit= 0;
                      }
                     
                      $pp=0;
                       if($sp_status=="Active")
                       { 
                        
                        
                        if ($cnt == 1) {
                            $pp = 5;
                       } elseif ($cnt == 2) {
                         $pp = 4;
                       } elseif ($cnt == 3) {
                         $pp = 3;
                      } elseif ($cnt == 4) {
                          $pp = 2;
                      } elseif ($cnt == 5) {
                      $pp = 1;
                     } elseif ($cnt >= 6 && $cnt <= 10) {
                      $pp = 0.75;
                      } elseif ($cnt >= 11 && $cnt <= 20) {
                      $pp = 0.50;
                      } elseif ($cnt >= 21 && $cnt <= 30) {
                       $pp = 0.25;   
                        } 


                        }
                        
                          
                     
                      
                      $user_mid = @$Sposnor_status->id;

                      $spid = @$Sposnor_status->id;

                      $max_income=$total_get;
                      $n_m_t = $max_income - $total_profit;
                      // dd($total_received);
                        if($pp >= $n_m_t)
                        {
                            $pp = $n_m_t;
                        }  

                        
                      $idate = date("Y-m-d");             
                      $user_id_fk=$sponsor;
                      if($spid>0 && $cnt<=3){
                        if($pp>0){
                         
                         $data = [
                        'user_id' => $user_mid,
                        'user_id_fk' =>$Sposnor_status->username,
                        'amt' => $amt,
                        'comm' => $pp,
                        'remarks' =>'Level Income',
                        'level' => $cnt,
                        'rname' => $rname,
                        'fullname' => $fullname,
                        'ttime' => Date("Y-m-d"),
                        
                    ];
                     $user_data =  Income::create($data);
                   
                    
                }
               }
               
                $cnt++;
     }

     return true;
  }



  function add_direct_income($id,$amt)
  {

    //$user_id =$this->session->userdata('user_id_session')
$data = User::where('id',$id)->orderBy('id','desc')->first();

  $user_id = $data->username;
  $fullname=$data->name;
 
  $rname = $data->username;
  $user_mid = $data->id;
    

        $cnt = 1;

        $amount = $amt/100;
          
  
          while ($user_mid!="" && $user_mid!="1"){
                $Sposnor_id = User::where('id',$user_mid)->orderBy('id','desc')->first();
                $sponsor=$Sposnor_id->ParentId;
                if (!empty($sponsor))
                 {
                  $Sposnor_status = User::where('id',$sponsor)->orderBy('id','desc')->first();
                  $Sposnor_cnt = User::where('ParentId',$sponsor)->where('active_status','Active')->count("id");
                $sp_status=$Sposnor_status->active_status;
                }
                else
                {
                  $Sposnor_status =array();
                  $sp_status="Pending";
                  $Sposnor_cnt=0;
                }
               
                $pp=0;
                 if($sp_status=="Active")
                 {  
                      if ($cnt == 1) 
                        
                        {
                     $pp = $amount * 3;         
                    }

                  elseif 
                  ($cnt==2)
                   {
                   $pp = $amount * 2;        
              } 
             elseif

                 ($cnt==3) {
             $pp = $amount * 1;       
                 }

else {
    $pp = 0;
}


                 
                  }
                  
                    
               
                
                $user_mid = @$Sposnor_status->id;

                $spid = @$Sposnor_status->id;

              //   echo $user_mid."<br>";
              //   echo $spid."<br>";
              //   echo $cnt."<br>";
              //   echo $pp."<br>";
              //   echo $sp_status."<br>";
              //  die;
                $idate = date("Y-m-d");
          
               
              
             
               
                $user_id_fk=$sponsor;
                if($spid>0 && $cnt<=50){
                  if($pp>0){
                   
                   $data = [
                  'user_id' => $user_mid,
                  'user_id_fk' =>$Sposnor_status->username,
                  'amt' => $amt,
                  'comm' => $pp,
                  'remarks' =>'Direct Bonus',
                  'level' => $cnt,
                  'rname' => $rname,
                  'fullname' => $fullname,
                  'ttime' => Date("Y-m-d"),
                  
              ];
               $user_data =  Income::create($data);
             
              
          }
         }
         
          $cnt++;
}

return true;
}



function add__super_direct_income($id,$amt)
{

  //$user_id =$this->session->userdata('user_id_session')
$data = User::where('id',$id)->orderBy('id','desc')->first();

$user_id = $data->username;
$fullname=$data->name;

$rname = $data->username;
$user_mid = $data->id;
  

      $cnt = 1;

        $amount = $amt/100;

              $Sposnor_id = User::where('id',$user_mid)->orderBy('id','desc')->first();
              $sponsor=$Sposnor_id->sponsor;
              if (!empty($sponsor) && $sponsor!=0)
               {
                $Sposnor_status = User::where('id',$sponsor)->orderBy('id','desc')->first();
                $sp_status=$Sposnor_status->active_status;
              $Sposnor_cnt = User::where('sponsor',$sponsor)->where('active_status','Active')->count("id");
               $joining_amt=Investment::where('user_id',$Sposnor_status->id)->where('status','Active')->sum("amount");
               $total_get = $joining_amt*3;
               $total_profit= Income::where('user_id',$Sposnor_status->id)->sum("comm");
              }
              else
              {
                $Sposnor_status =array();
                $sp_status="Pending";
                $Sposnor_cnt =0;
                $total_get =0;
                $total_profit= 0;
              }
             $percent = 5;
           
             if($sp_status=="Active")
               {  
            
                $pp = $amount*$percent;
              
              
              }else
              {
                $pp=0;
              }               
             
              
              $user_mid = ($Sposnor_status)?$Sposnor_status->id:0;
              //echo $user_id;
             //die;
              $idate = date("Y-m-d");
        
             
              $spid = $Sposnor_status?$Sposnor_status->id:0;
           
             
              $user_id_fk=$sponsor;
              //print_r($user_id_fk);die;
             // echo $cnt." ".$spid." ".$pp."<br>";

             $max_income=$total_get;
             $n_m_t = $max_income - $total_profit;
             // dd($total_received);
               if($pp >= $n_m_t)
               {
                   $pp = $n_m_t;
                   
                  User::where('id',$Sposnor_status?$Sposnor_status->id:0)->update(['active_status' => "Inactive"]);      
                  Investment::where('user_id',$Sposnor_status?$Sposnor_status->id:0)->update(['roiCandition' => 1]);  
              
               }  


              if($spid>0 && $pp>0){               
                 $data = [
                'user_id' => $user_mid,
                'user_id_fk' =>$Sposnor_status->username,
                'amt' => $amt,
                'comm' => $pp,
                'remarks' => 'Super Referral Income',
                'level' => $cnt,
                'rname' => $rname,
                'fullname' => $fullname,
                'ttime' => Date("Y-m-d"),
                
            ];
            $user_data =  Income::Create($data);
            add__super_direct_income($user_mid,$pp);
       }


return true;
}



?>
