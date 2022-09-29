<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vcard;
use App\VCard as card;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class VcardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'])->except(['download' , 'show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->id();
        $vcards= User::find($user)->vcards;
        return view('profile',['vcards' =>$vcards]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = auth()->id();
        $limit = auth()->user()->limit;
        $stats ='create';
        $vcards= User::find($user)->vcards()->count();
        if($vcards < $limit){
            return view("vcard.create",['stats'=>$stats]);    
        }else{
        $stats ='limit';
            return view("vcard.create",['stats'=>$stats]);    
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = auth()->id();
        $limit = auth()->user()->limit;
        $count= User::find($user)->vcards()->count();
        if($count == $limit)
        {
            return redirect()->route('profile');
        }
        
        $this->validate($request ,[
            'image' => 'image|max:1024'
        ]);
        $info_all= $request->all();
        // phone 
        $phoneVal=1;
        $phoneCount=0;
        $phoneStats='yes';
        //email
        $emailVal=1;
        $emailCount=0;
        $emailStats='yes';
        //website
        $websiteVal=1;
        $websiteCount=0;
        $websiteStats='yes';
         //address
         $addressVal=1;
         $addressCount=0;
         $addressStats='yes';

        for ($i=0; $i < 10; $i++) {
            
            if (array_key_exists("phone".$phoneVal,$info_all)) {
                $phoneVal++;
                $phoneCount++;
            }else
                $phoneStats='no';

            if(array_key_exists("email".$emailVal,$info_all)){
                $emailCount++;
                $emailVal++;
            }else
                $emailStats='no';

            if(array_key_exists("website".$websiteVal,$info_all)){
                $websiteCount++;
                $websiteVal++;
            }else
                $websiteStats='no';
                
            if(array_key_exists("address".$addressVal,$info_all)){
                $addressCount++;
                $addressVal++;
            }else
                $addressStats='no';    

            if($phoneStats =='no' && $emailStats == 'no' && $websiteStats == 'no' && $addressStats == 'no') {
                break;
            }
        }

        $ph=1;
        $phones=[];
        for ($i=0; $i < $phoneCount; $i++) { 
            $ph_type = "ph_select".$ph;
            $ph_number = "phone".$ph;
            $phones[]= ['type' => $request->$ph_type,'number'=>$request->$ph_number];
            $ph++;
        }
        $phone_all=serialize($phones);
        //store email info
        $em=1;
        $emails=[];
        for ($i=0; $i < $emailCount; $i++) { 
            $em_type = "em_select".$em;
            $em_address = "email".$em;
            $emails[]= ['type' => $request->$em_type,'address'=>$request->$em_address];
            $em++;
        }
        $email_all=serialize($emails);
        //store website info
        $site=1;
        $websites=[];
        for ($i=0; $i < $websiteCount; $i++) { 
            $site_type = "site_select".$site;
            $site_url = "website".$site;
            $websites[]= ['type' => $request->$site_type,'url'=>$request->$site_url];
            $site++;
        }
        $website_all=serialize($websites);
        //store address info
        $ad=1;
        $address=[];
        for ($i=0; $i < $addressCount; $i++) { 
            $address_type = "ad_select".$ad;
            $address_name = "address".$ad;
            $address_street= "ad-street".$ad;
            $address_apt= "ad-apt".$ad;
            $address_city= "ad-city".$ad;
            $address_region= "ad-region".$ad;
            $address_country= "ad-country".$ad;
            $address_postal= "ad-postal".$ad;
            $address[]= ['type' => $request->$address_type,'name'=>$request->$address_name,
            'street'=>$request->$address_street,'apt'=>$request->$address_apt,'city'=>$request->$address_city,
            'region'=>$request->$address_region,'country'=>$request->$address_country,'postal'=>$request->$address_postal];
            $ad++;
        }
        $address_all=serialize($address);
        
        $newImageName = null;
        if ($request->image) {
            $newImageName = time().'-'.$request->name.'.'.$request->image->extension();
            $request->image->move(public_path('images/vcards') , $newImageName);
        }

        $link = time().'-'.rand();
        $qr_name =$request->name.rand().'.svg';

            Vcard::create([
                'id'=>rand(),
                'name'=>$request->name,
                'user_id'=>auth()->id(),
                'title'=>$request->title,
                'birthday'=>$request->birthday,
                'Organization_name'=>$request->organization_name,
                'phone'=>$phone_all,
                'email'=>$email_all,
                'website'=>$website_all,
                'address'=>$address_all,
                'image'=>$newImageName,
                'note'=>$request->note,
                'qr_name'=>$qr_name,
                'link'=>$link
            ]);

            QrCode::generate('https://anasmartcard.net/download/'.$link, public_path('/qrcode/'.$qr_name));
            
            $vcard = new card();

            if ($newImageName) {
                $vcard->addPhoto(public_path().'/images/vcards/'.$newImageName);
            }
            

            
            $lastName = '';
            $firstName = $request->name;
            $additional = '';
            $prefix = '';
            $suffix = '';
            $fullName = true;
            
            $vcard->addnames(
                    $lastName, 
                    $firstName, 
                    $additional, 
                    $prefix, 
                    $suffix,
                    $fullName
            );

            if($phones){
                for ($i=0; $i < count($phones); $i++) 
                { 
                    $vcard->addPhone($phones[$i]['number'], $phones[$i]['type']);
                }
            }

            if($emails){
                for ($i=0; $i < count($emails); $i++) 
                { 
                    $vcard->addEmail($emails[$i]['address'], $emails[$i]['type']);
                }
            }

            if($websites){
                for ($i=0; $i < count($websites); $i++) 
                { 
                    $vcard->addUrl($websites[$i]['url'], $websites[$i]['type']);
                }
            }

            if($address){
                for ($i=0; $i < count($address); $i++) 
                { 
                    $name = $address[$i]['name'];
                    $extended = '';
                    $street = $address[$i]['street'];
                    $city = $address[$i]['city'];
                    $region = $address[$i]['region'];
                    $zip = $address[$i]['postal'];
                    $country = $address[$i]['country'];
                    $type = $address[$i]['type'];
            
                    $vcard->addAddress
                    (
                        $name,
                        $extended,
                        $street,
                        $city,
                        $region,
                        $zip,
                        $country,
                        $type
                    );
                }
            }
            
            $vcard->addJobtitle($request->title);
                    
            $vcard->addCompany($request->organization_name);
            
            $vcard->addNote($request->note);
            
            $vcard->addBirthday($request->birthday);
                         
            // $vcard->addCustom('X-CUSTOM(CHARSET=UTF-8,ENCODING=QUOTED-PRINTABLE,Custom1)','1');
            
            $vcard->setSavePath(public_path('vcards'));
            
            $vcard->save($link);

            return redirect()->route('profile');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vcard  $vcard
     * @return \Illuminate\Http\Response
     */

    public function show(Vcard $vcard)
    {
        // if(auth()->id() != $vcard->user_id)
        // {
        //     return redirect()->route('profile');
        // }
        // dd('here');
        $color = $vcard->user->color;
        $text = $vcard->user->text;
        $phones = unserialize($vcard->phone);
        $emails = unserialize($vcard->email);
        $websites = unserialize($vcard->website);
        $state = false;
        foreach ($websites as $website) {
            if($website['type'] == 'Website' || $website['type'] == "Other")
            {
                $state = true;
            }
        }
        $address = unserialize($vcard->address);
        return view('vcard.view',['vcard'=>$vcard,'phones'=>$phones,'emails'=>$emails ,'websites'=>$websites,'address'=>$address ,'state'=>$state ,'color' =>$color,'text'=>$text]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vcard  $vcard
     * @return \Illuminate\Http\Response
     */
    public function edit(Vcard $vcard)
    {
        if(auth()->id() != $vcard->user_id)
        {
            return redirect()->route('profile');
        }
        $phones = unserialize($vcard->phone);
        $emails = unserialize($vcard->email);
        $websites = unserialize($vcard->website);
        $address = unserialize($vcard->address);
        return view('vcard.edit',['vcard'=>$vcard,'phones'=>$phones,'emails'=>$emails ,'websites'=>$websites,'address'=>$address]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vcard  $vcard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vcard $vcard)
    {
        $this->validate($request ,[
            'image' => 'image|max:1024'
        ]);
        $info_all= $request->all();
        // phone 
        $phoneVal=1;
        $phoneCount=0;
        $phoneStats='yes';
        //email
        $emailVal=1;
        $emailCount=0;
        $emailStats='yes';
        //website
        $websiteVal=1;
        $websiteCount=0;
        $websiteStats='yes';
         //address
         $addressVal=1;
         $addressCount=0;
         $addressStats='yes';

        for ($i=0; $i < 100; $i++) {
            
            if (array_key_exists("phone".$phoneVal,$info_all)) {
                $phoneVal++;
                $phoneCount++;
            }else
                $phoneStats='no';

            if(array_key_exists("email".$emailVal,$info_all)){
                $emailCount++;
                $emailVal++;
            }else
                $emailStats='no';

            if(array_key_exists("website".$websiteVal,$info_all)){
                $websiteCount++;
                $websiteVal++;
            }else
                $websiteStats='no';
                
            if(array_key_exists("address".$addressVal,$info_all)){
                $addressCount++;
                $addressVal++;
            }else
                $addressStats='no';    

            if($phoneStats =='no' && $emailStats == 'no' && $websiteStats == 'no' && $addressStats == 'no') {
                break;
            }
        }

        $ph=1;
        $phones=[];
        for ($i=0; $i < $phoneCount; $i++) { 
            $ph_type = "ph_select".$ph;
            $ph_number = "phone".$ph;
            $phones[]= ['type' => $request->$ph_type,'number'=>$request->$ph_number];
            $ph++;
        }
        $phone_all=serialize($phones);
        //store email info
        $em=1;
        $emails=[];
        for ($i=0; $i < $emailCount; $i++) { 
            $em_type = "em_select".$em;
            $em_address = "email".$em;
            $emails[]= ['type' => $request->$em_type,'address'=>$request->$em_address];
            $em++;
        }
        $email_all=serialize($emails);
        //store website info
        $site=1;
        $websites=[];
        for ($i=0; $i < $websiteCount; $i++) { 
            $site_type = "site_select".$site;
            $site_url = "website".$site;
            $websites[]= ['type' => $request->$site_type,'url'=>$request->$site_url];
            $site++;
        }
        $website_all=serialize($websites);
        //store address info
        $ad=1;
        $address=[];
        for ($i=0; $i < $addressCount; $i++) { 
            $address_type = "ad_select".$ad;
            $address_name = "address".$ad;
            $address_street= "ad-street".$ad;
            $address_apt= "ad-apt".$ad;
            $address_city= "ad-city".$ad;
            $address_region= "ad-region".$ad;
            $address_country= "ad-country".$ad;
            $address_postal= "ad-postal".$ad;
            $address[]= ['type' => $request->$address_type,'name'=>$request->$address_name,
            'street'=>$request->$address_street,'apt'=>$request->$address_apt,'city'=>$request->$address_city,
            'region'=>$request->$address_region,'country'=>$request->$address_country,'postal'=>$request->$address_postal];
            $ad++;
        }
        $address_all=serialize($address);
        
        if($request->image){
            $newImageName = time().'-'.$request->name.'.'.$request->image->extension();
            $request->image->move(public_path('images/vcards') , $newImageName);
            $image_path = public_path('images/vcards/'.$vcard->image);
            if($vcard->image){
                unlink($image_path);
            }
            Vcard::find($vcard->id)->update([
                'name'=>$request->name,
                'user_id'=>auth()->id(),
                'title'=>$request->title,
                'birthday'=>$request->birthday,
                'Organization_name'=>$request->organization_name,
                'phone'=>$phone_all,
                'email'=>$email_all,
                'website'=>$website_all,
                'address'=>$address_all,
                'image'=>$newImageName,
                'note'=>$request->note
            ]);
        }else{
            Vcard::find($vcard->id)->update([
                'name'=>$request->name,
                'user_id'=>auth()->id(),
                'title'=>$request->title,
                'birthday'=>$request->birthday,
                'Organization_name'=>$request->organization_name,
                'phone'=>$phone_all,
                'email'=>$email_all,
                'website'=>$website_all,
                'address'=>$address_all,
                'note'=>$request->note
            ]);
        }

        $v_image = $vcard->image;
        $v_link = $vcard->link;

        $vcard = new card();

            if($request->image){
                $vcard->addPhoto(public_path().'/images/vcards/'.$newImageName);
            }elseif($v_image){
                $vcard->addPhoto(public_path().'/images/vcards/'.$v_image);
            }
            
            $lastName = '';
            $firstName = $request->name;
            $additional = '';
            $prefix = '';
            $suffix = '';
            $fullName = true;
            
            $vcard->addnames(
                    $lastName, 
                    $firstName, 
                    $additional, 
                    $prefix, 
                    $suffix,
                    $fullName
            );

            if($phones){
                for ($i=0; $i < count($phones); $i++) 
                { 
                    $vcard->addPhone($phones[$i]['number'], $phones[$i]['type']);
                }
            }

            if($emails){
                for ($i=0; $i < count($emails); $i++) 
                { 
                    $vcard->addEmail($emails[$i]['address'], $emails[$i]['type']);
                }
            }

            if($websites){
                for ($i=0; $i < count($websites); $i++) 
                { 
                    $vcard->addUrl($websites[$i]['url'], $websites[$i]['type']);
                }
            }

            if($address){
                for ($i=0; $i < count($address); $i++) 
                { 
                    $name = $address[$i]['name'];
                    $extended = '';
                    $street = $address[$i]['street'];
                    $city = $address[$i]['city'];
                    $region = $address[$i]['region'];
                    $zip = $address[$i]['postal'];
                    $country = $address[$i]['country'];
                    $type = $address[$i]['type'];
            
                    $vcard->addAddress
                    (
                        $name,
                        $extended,
                        $street,
                        $city,
                        $region,
                        $zip,
                        $country,
                        $type
                    );
                }
            }
            
            $vcard->addJobtitle($request->title);
            
            $vcard->addCompany($request->organization_name);
            
            $vcard->addNote($request->note);
            
            $vcard->addBirthday($request->birthday); 
            
            
            $vcard->setSavePath(public_path('vcards'));
            
            $vcard->save($v_link);

        return redirect()->route('profile');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vcard  $vcard
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vcard $vcard)
    {
        if ($vcard->status) {
            Vcard::where("id", $vcard->id)->update(["status" => 0]);
        }else {
            Vcard::where("id", $vcard->id)->update(["status" => 1]);
        }
        $file_name = $vcard->link.'.vcf';
        $file_path = public_path('vcards/'.$file_name);
        unlink($file_path);
        Vcard::destroy($vcard->id);
        return redirect()->route('profile');
    }
    
    public function download($link)
    {   
        $vcard = Vcard::where('link','=',$link)->first();
        $vcard->increment('download_counter');
        $name = $vcard->name;
            return Response::download(public_path().'/vcards/'.$link.'.vcf',$name.'.vcf');        
    }
    
    public function deleteimage($id)
    {
        $vcard = Vcard::find($id);
        if ($vcard->image) {
            $image_path = public_path('images/vcards/'.$vcard->image);
            unlink($image_path);
            Vcard::where("id", $id)->update(["image" => '']);
        }   
        return redirect()->back();  
    }

    public function QrToAll()
    {
       $vcards = Vcard::all();
       $counter = 0;
        foreach($vcards as $vcard):
            if(!$vcard->qr_name):
                $counter++;
                $qr_name = $vcard->name.rand().'.svg';
                Vcard::where("id", $vcard->id)->update(["qr_name" => $qr_name]);
                QrCode::generate('https://anasmartcard.net/download/'.$vcard->link, public_path('/qrcode/'.$qr_name));
            endif;
        endforeach;
        dd($counter.' qrCode are Created'); 
    }
}
