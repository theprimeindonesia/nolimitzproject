<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Members;
use App\User;
use App\Models\MemberBank;
use App\Models\MemberAddresses;
use App\Models\Addresses;
use App\Models\Referrals;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\Hash;

class MembersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Members::with('memberbank','memberaddresses')->get();
        return view('members.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('members.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'password' => 'required',
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required',
            'sex' => 'required',
            'photo' => 'required|image|mimes:jpg,jpeg,png',
        ]);

        $input = $request->all();
        $user = new User;
        $user->email = $request['email'];
        $user->password = Hash::make($request['password']);
        $user->name = $request['firstname'] . " " . $request['lastname'];
        $user->save();

        $member = new Members;
        $member->firstname = $request['firstname'];
        $member->lastname = $request['lastname'];
        $member->tanggal_lahir = $request['tanggal_lahir'];
        $member->tempat_lahir = $request['tempat_lahir'];
        $member->phone = $request['phone'];
        $member->email = $request['email'];
        $member->sex = $request['sex'];
        if(!is_null($request->file('photo'))){            
            $image_uuid = Uuid::Uuid4();
            $file       = $request->file('photo');
            $ext        = $file->getClientOriginalExtension();
            $fileName   = "photo-".$image_uuid.".$ext";
            $upload_path ='public/images/photo';
            $request->file('photo')->move($upload_path, $fileName);
            $member->photo = $fileName;
          }
        $user->members()->save($member);

        $memberx = Members::where('referral_code',$request['referral_code_2'])->first();
        $members_a_id = $memberx['members_id'];
        $referral = new Referrals;
        $referral->members_a_id = $members_a_id;
        $referral->membersb()->associate($member);
        $referral->save();


      //  $member_bank = new MemberBank;
       // $member_bank->owner = $request['owner'];
       // $member_bank->bank = $request['bank'];
       // $member_bank->cabang = $request['cabang'];
       // $member_bank->no_account = $request['no_account'];
       // $member->memberbank()->save($member_bank);

       // $address = Addresses::create($input);
       
       // $member_addresses = new MemberAddresses;
       // $member_addresses->members()->associate($member);
       // $member_addresses->addresses()->associate($address);
       // $member_addresses->save();

        return redirect()->route('members.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Members::with('memberbank','memberaddresses.addresses')->find($id);
        //return $data;
        return view('members.edit',compact('data'));
    }
    public function detail($id)
    {
        $data = Members::with('memberbank','memberaddresses.addresses','orders','referralsb','referralsa.membersb.orders')->find($id);
        //return $data;
        return view('members.detail',compact('data'));
    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'password' => 'required',
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required',
            'sex' => 'required',
            'photo' => 'required|image|mimes:jpg,jpeg,png',
        ]);
        $input = $request->all();
        $member = Members::find($id);
        $users_id = $member['users_id'];
        $photo = $member['photo'];
        if(!is_null($request->file('photo'))){            
            $image_uuid = Uuid::Uuid4();
            $file       = $request->file('photo');
            $ext        = $file->getClientOriginalExtension();
            $fileName   = $photo;
            $upload_path ='public/images/photo';
            $request->file('photo')->move($upload_path, $fileName);
          }
        $member->update($input);

        $user = Users::find($users_id);
        $user->email = $request['email'];
        $user->password = Hash::make($request['password']);
        $user->name = $request['firstname'] . " " . $request['lastname'];
        $user->update();

        return redirect()->route('members.detail',$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function bankadd(Request $request,$id)
    {
        $this->validate($request, [
            'bank' => 'required',
            'owner' => 'required',
            'no_account' => 'required',
            'cabang' => 'required',
        ]);
        $input = $request->all();
        $bank = MemberBank::create($input);
        return redirect()->route('members.detail',$id);
    } 
    public function bank($id)
    {
        $id = $id;
        return view('members.bank.create',compact('id'));
    }
    public function bankedit($id)
    {
        $data = MemberBank::find($id);
        return view('members.bank.edit',compact('data'));
    }
    public function bankupdate(Request $request, $id)
    {
        $this->validate($request, [
            'bank' => 'required',
            'owner' => 'required',
            'no_account' => 'required',
            'cabang' => 'required',
        ]);
        $input = $request->all();
        $bank = MemberBank::find($id);
        $members_id =$bank['members_id'];
        $bank->update($input);

        return redirect()->route('members.detail',$members_id);
    }
    public function bankdestroy(Request $request, $id)
    {
        $bank = MemberBank::find($id)->delete();
        return back();
    }
}
