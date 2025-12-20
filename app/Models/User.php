<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name', 'email', 'password','phone','username','sponsor','ParentId','position','active_status','jdate','level','tpassword','adate','PSR','TPSR','country','usdtBep20'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'sponsor');
    } 


    public function sponsor_detail()
    {
        return $this->belongsTo('App\Models\User', 'sponsor');
    } 


     public function fund_balance()
    {
    $balance = (Auth::user()->buy_fund()) - (Auth::user()->buy_packageAmt());
    return $balance;
    } 

      public function buy_fund()
    {
        return  BuyFund::where('user_id',Auth::user()->id)->sum('amount');
    } 
     public function buy_packageAmt(){
        $amt= Investment::where('active_from',Auth::user()->username)->where('walletType',1)->sum('amount');
        return $amt;
    }

   

    public function franchise_bonus()
    {
        return $this->hasMany('App\Models\Income','user_id','id')->where('remarks','Franchise Model');
    } 

    public function binary_bonus()
    {
        return $this->hasMany('App\Models\Income','user_id','id')->where('remarks','Reward Income');
    } 

    
    public function sponsor_bonus()
    {
        return $this->hasMany('App\Models\Income','user_id','id')->where('remarks','Direct Income');
    } 
        
    public function level_bonus()
    {
        return $this->hasMany('App\Models\Income','user_id','id')->where('remarks','Level Income');
    } 

    public function weekly_bonus()
    {
        return $this->hasMany('App\Models\Income','user_id','id')->where('remarks','Weekly Bonus');
    } 

    
    public function payout()
    {
       return $this->hasMany('App\Models\Payout','user_id','id');
   } 
          
    public function reward_bonus()
    {
        return $this->hasMany('App\Models\Income','user_id','id')->where('remarks','Monthly Royalty');
    } 

    public function gap_margin_bonus()
    {
        return $this->hasMany('App\Models\Income','user_id','id')->where('remarks','Gap Margin Bonus');
    } 
    
          public function fundTransferCredit()
    {
        return $this->hasMany('App\Models\Debitfund','user_id','id')->where('credit_type',1);
    }
    
    
        public function fundTransferDebit()
    {
     
        return $this->hasMany('App\Models\Debitfund','user_id','id')->where('credit_type',0);
    }
    
    public function available_balance()
    {
    $balance = Auth::user()->users_incomes->sum('comm')- (Auth::user()->withdraw()+Auth::user()->buy_packageAmt2());
    return $balance;
    } 
    
       public function buy_packageAmt2(){
        $amt= Investment::where('active_from',Auth::user()->username)->where('walletType',2)->sum('amount');
        return $amt;
    }

    public function users_incomes()
    {
        return $this->hasMany('App\Models\Income','user_id','id');
    } 
    

    public function withdraw()
    {
        return  Withdraw::where('user_id',Auth::user()->id)->where('status','!=','Failed')->sum('amount');
    } 


    public function investment(){
        return $this->hasMany('App\Models\Investment','user_id','id')->where('status','Active');
    }

    
}
