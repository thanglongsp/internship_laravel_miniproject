<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Slide;
use App\Matches; 
use App\Users;
use Session;
use Hash;
use App\Bills;
use Illuminate\Support\Facades\DB; 
//  
class PageController extends Controller 
{
// Signup ...
    public function getSignup(){
        $slide = Slide::all();
        return view('page.signup',compact('slide'));
    }

    public function postSignup(Request $req){
        // todo
        $req->validate(
            [
            'email'=>'required|email|unique:users,email',
            'name'=>'required|unique:users,name',
            'password'=>'required|min:6|max:20',
            're_password'=>'required|same:password'
            ],
            [
            'email.required'=>'Please enter email',
            'email.email'=>'Email not default',
            'email.unique'=>'Email existed',
            'name.unique'=>'Name existed',
            'name.require'=>'Please enter name',
            'password.required'=>'Please enter password',
            're_password.same'=>'Password not same',
            'password.min'=>'password min 6 letters'
            ]);
        $user = new Users();
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->role = 1;
        $user->apc = 5000;
        $user->save();
        return redirect('login')->with('thanhcong','Success ! You login to continue ... ');
    }
// Login ... 

    public function getLogin(){
        $slide = Slide::all();
        return view('page.login',compact('slide'));
    }

    public function postLogin(Request $req){
        // todo
        $req->validate(
            [
            'email'=>'required|email',
            'password'=>'required|min:6|max:20'
            ],
            [
            'email.required'=>'Please enter email, try again! ',
            'email.email'=>'Email not default',
            'password.required'=>'Please enter password, try again!',
            'password.min'=>'Password min 6 letter',
            'password.max'=>'password max 20 letter'
            ]
            );
        if(Auth::attempt(['email' => $req->email,'password'=>$req->password])){
            $user = Auth::user();
            if($user->role == 1) return redirect('user\home');  
            else return redirect('admin\home');    
        }else return redirect()->back()->with('thatbai','failure ! invalid password !?');
    }
// Logout 
    public function logout(){
        Auth::logout();
        return redirect('guest\home');
    }
// Guest ...
    public function getGuestHome(){
        $slide = Slide::all();
        $match = Matches::where('real_result',null)->paginate(1);

        //var_dump($percent);
        return view('page.guests.guest_home',compact('slide','match'));	
    }

// User ...
    public function getUserHome(){
        $slide = Slide::all();
        $match = Matches::where('status',1)->paginate(1);
        $user_login = Auth::user();
        // $countBet = Bills::where('status',1)->count('id');
        // var_dump($countBet);

        if(isset($user_login)){
            $id = $user_login->id;
            $user = users::where('id',$id)->get();
            //var_dump($user_login);
            return view('page.users.home',compact('slide','match','user_login','user'));
        }else return redirect('guest/home');
    }

    public function postBetting(Request $req){

        $mUser = Auth::user();
        $mId = $mUser->id;
        $mMoney = $mUser->apc;

        $bill = new Bills();
        $bill->match_id = $req->code;
        $bill->user_id = $mId;
        $bill->bets = $req->amount;
        $bill->result = $req->ratio;
        $bill->status = 1;   
        $bill->save();

        $user = Users::find($mId);
        $user->apc = $mMoney - $req->amount;
        $user->save();
        //var_dump($mId);
        return redirect('user\home')->with('thanhcong','Success ! Your betting success ... ');

    }
    public function getUserSchedule(){
        // todo
    }

    public function getUserProfile(){
        // todo
        $slide = Slide::all();
        $user_login = Auth::user();
        $id = $user_login->id; 
        $user = users::where('id',$id)->get();
        //var_dump($user);
        return view('page.users.profile',compact('slide','user_login','user'));
    }

    public function postUserProfile(Request $req){
        // TODO
        $req->validate(
            [
            'email'=>'unique:users,email',
            'name'=>'unique:users,name'
            ],
            [
            'email.unique'=>'Email existed',
            'name.unique'=>'Name existed'
            ]);

        $mUser = Auth::user();
        $mId = $mUser->id;

        $user = Users::find($mId);

        if($req->name != null){
            $user->name = $req->name;
            $user->save();
        }

        if($req->email != null){
            $user->email = $req->email;
            $user->save();
        }

        if($req->password != null){
            $user->password = Hash::make($req->password);
            $user->save();
            Auth::logout();
            return redirect('login');
        }

        //var_dump($mId);
        return redirect('user\profile')->with('thanhcong','Success ! You updated success ... ');
    }

    public function getUserCart(){
        // todo
    }

    public function postUserCart(){
        //TODO
    }

    public function getUserBill(){
        // todo
    }

    public function getUserFollowMatch(){
        // todo

        $slide = Slide::all();
        $user_login = Auth::user();
        $id = $user_login->id; 
        $user = users::where('id',$id)->get();
        $cuBill = Bills::where('status',1)->Where('user_id',$id)->get(); 
        $reTotal = null;
        $tamp = Bills::where('result','<>',null)->Where('user_id',$id)->orderBy('id','desc')->skip(1)->take(1)->get()->toJson();
        $olBill = DB::table('matches')->join('bills', 'bills.match_id', '=', 'matches.id')->where('bills.status',2)->where('bills.user_id',$id)->get();

        //$olBill = Bills::where('real_result','<>',null)->Where('user_id',$id)->get(); 

        //var_dump($tamp);
        return view('page.users.follow_match',compact('slide','user_login','user','cuBill','olBill','tamp'));
    }

    public function getUserHistoryBetting(){
        // todo
    }

    public function getUserDetailMatch(){
        // todo
    }

    public function getCount($count){
        //TODO
        $countBet = Bills::where('match_id',$count)->where('status',1)->count('id');
        //var_dump($countBet);
    }
// Admin ...
    public function getAdminHome(){
        $slide = Slide::all();

        $user_login = Auth::user();
        $id = $user_login->id;
        $user = users::where('id',$id)->get();
        $match = Matches::where('status','>=',0)->paginate(1);

        return view('page.admins.home',compact('slide','user_login','user','match'));

    }

    public function getAdminMatches(){
        // todo
        $slide = Slide::all();
        $user_login = Auth::user();
        $id = $user_login->id; 
        $user = Users::where('id',$id)->get();
        $match = Matches::all();

        return view('page.admins.matches',compact('slide','user_login','user','match'));
    }

    public function postAdminMatch(Request $req){
        // TODO
        if($req->u_id_match != null){
            $update = Matches::find($req->u_id_match);
            $olBill = DB::table('matches')->join('bills', 'bills.match_id', '=', 'matches.id')->get();

            if($update->status == 2) {return redirect('admin\matches')->with('thatbai','failure ! You can not update ... ');}
            elseif($update->status == 1){
                if($req->u_result != null){
                    $update->real_result = $req->u_result;
                    $update->status = 2;
                    $update->save();

                    $countId = Bills::all()->where('status',1)->count('id');

                    for($x = 0; $x < $countId; $x++ )
                    {   
                        $upApc = DB::table('matches')->join('bills', 'bills.match_id', '=', 'matches.id')->where('bills.status',1)->first();

                        if($upApc->result == $upApc->real_result){
                            $user = Users::find($upApc->user_id);

                            if($upApc->result == 3){
                                $user->apc = $user->apc + $upApc->bets + $upApc->bets*$upApc->ratio_equal;
                                $user->save();  
                            }
                            if($upApc->result == 1){
                                $user->apc = $user->apc + $upApc->bets + $upApc->bets*$upApc->ratio_1_win; 
                                $user->save();   
                            }
                            if($upApc->result == 2){
                                $user->apc = $user->apc + $upApc->bets + $upApc->bets*$upApc->ratio_1_lose;   
                                $user->save(); 
                            }     
                        } 
                        $comBill = Bills::find($upApc->id);
                        $comBill->status = 2;
                        $comBill->save();
                    }

                }

                if($req->u_status == 3){
                    $upBill = Bills::find($req->u_id_match);

                    if($upBill == null){
                        $update->status = $req->u_status;
                        $update->save();               
                    }
                }
            }elseif($update->status == 3){

                if($req->u_team1 != null){
                    $update->team1 = $req->u_team1;
                    $update->save();
                }

                if($req->u_team2 != null){
                    $update->team2 = $req->u_team2;
                    $update->save();
                }

                if($req->u_time_start != null){
                    $update->start_time = $req->u_time_start;
                    $update->save();
                }

                if($req->u_end_start != null){
                    $update->end_time = $req->u_time_end;
                    $update->save();
                }

                if($req->u_time_play != null){
                    $update->play_time = $req->u_time_play;
                    $update->save();
                }

                if($req->u_1win != null){
                    $update->ratio_1_win = $req->u_1win;
                    $update->save();
                }

                if($req->u_2win != null){
                    $update->ratio_1_lose = $req->u_2win;
                    $update->save();
                }

                if($req->u_draw != null){
                    $update->ratio_equal = $req->u_draw;
                    $update->save();
                }

                if($req->u_status != null){
                    $update->status = $req->u_status;
                    $update->save();
                }
            }
            return redirect('admin\matches')->with('thanhcong','Success ! You updated success ... ');
        }elseif($req->a_id_match != null){
            $add = new Matches();
            $add->team1 = $req->a_team1;
            $add->team2 = $req->a_team2;
            $add->start_time = $req->a_time_start;
            $add->end_time = $req->a_time_end;
            $add->time_play = $req->a_time_play;
            $add->ratio_1_win = $req->a_1win;
            $add->ratio_1_lose = $req->a_1lose;
            $add->ratio_equal = $req->a_draw;
            $add->status = $req->a_status;
            $add->save();
            return redirect('admin\matches')->with('thanhcong','Success ! You created matche ...');
        }else return redirect('admin\matches')->with('thatbai','failure !');
    }

    public function getAdminProfile(){
        // todo
        $slide = Slide::all();
        $user_login = Auth::user();
        $id = $user_login->id; 
        $user = users::where('id',$id)->get();
        //var_dump($user);
        return view('page.admins.profile',compact('slide','user_login','user'));
    }

    public function postAdminProfile(Request $req){
        // TODO
       $req->validate(
        [
        'email'=>'unique:users,email',
        'name'=>'unique:users,name'
        ],
        [
        'email.unique'=>'Email existed',
        'name.unique'=>'Name existed'
        ]);

       $mUser = Auth::user();
       $mId = $mUser->id;

       $user = Users::find($mId);

       if($req->name != null){
        $user->name = $req->name;
        $user->save();
    }

    if($req->email != null){
        $user->email = $req->email;
        $user->save();
    }

    if($req->password != null){
        $user->password = Hash::make($req->password);
        $user->save();
        Auth::logout();
        return redirect('login');
    }

        //var_dump($mId);
    return redirect('admin\profile')->with('thanhcong','Success ! You updated success ... ');
}

public function getAdminCreateMatch(){
        // todo
}

public function postAdminCreateMatch(){
        // todo
}

public function updateAdminMatch(){
        // todo
}

public function postAdminUpdateMatch(){
        //TODO
}

public function getAdminListUser(){
        // todo
    $slide = Slide::all();
    $user = Users::all();
    $user_login = Auth::user();

    return view('page.admins.list_user',compact('slide','user','user_login'));
}

public function getAdminListMatch(){
        // todo
}

public function getAdminSummary(){
        // todo
    $slide = Slide::all();
    $user_login = Auth::user();
    $id = $user_login->id; 
    $user = users::where('id',$id)->get();
    $olBill = DB::table('matches')->join('bills', 'bills.match_id', '=', 'matches.id')->where('matches.status',2)->get();

    return view('page.admins.summary',compact('slide','user_login','user','olBill'));
}

public function getAdminFollowMatch(){
        // TODO
}
}







