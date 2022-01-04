<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Faq;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;
use Symfony\Component\HttpFoundation\Response;

class PersonelController extends Controller
{
    //ADDRESS
    public function addAddress(Request $request){
        $header = $request->input('header');
        $address = $request->input('address');
        $building_no = $request->input('building_no');
        $floor = $request->input('floor');
        $apartment_no = $request->input('apartment_no');
        $specification = $request->input('specification');
        $phone = $request->input('phone');


        if(empty($header)){
            return response()->json('Adres tanımı boş olamaz!');
        }
        if(empty($address)){
            return response()->json('Adres boş olamaz!');
        }
        if(empty($building_no)){
            return response()->json('Bina no boş olamaz!');
        }
        if(empty($phone)){
            return response()->json('Telefon numarası boş olamaz!');
        }

        $addAddress = DB::table('addresses')->insert([
            'user_id' => Auth::user()->id,
            'header' => $header,
            'address' => $address,
            'building_no' => $building_no,
            'floor' => $floor,
            'apartment_no' => $apartment_no,
            'specification' => $specification,
            'phone' => $phone
        ]);
        if ($addAddress){
            return response()->json('success');
        } else {
            return response()->json('Adres eklenirken bir sorunla karşılaşıldı. Lütfen tekrar deneyiniz!');
        }




    }
    public function getAddress(Request $request){
        return response()->json(Address::select('id','header','address','building_no','floor','apartment_no','specification','phone')->where('user_id',Auth::user()->id)->get());
    }

    public function getSingleAddress(Request $request){
        $id = $request->input('id');
        return response()->json(Address::select('id','header','address','building_no','floor','apartment_no','specification','phone')->where('id',$id)->where('user_id',Auth::user()->id)->first());
    }
    public function deleteAddress(Request $request){
        $id = $request->input('id');
        $data = Address::where("id",$id)->where("user_id",Auth::user()->id)->first();
        $data->delete();
        return response()->json(Address::select('id','header','address','building_no','floor','apartment_no','specification','phone')->where('user_id',Auth::user()->id)->get());
        //return response()->json("Adres başarıyla silindi!");
    }

    public function editAddress(Request $request){
        $id = $request->input('id');
        $header = $request->input('header');
        $address = $request->input('address');
        $building_no = $request->input('building_no');
        $floor = $request->input('floor');
        $apartment_no = $request->input('apartment_no');
        $specification = $request->input('specification');
        $phone = $request->input('phone');

        if(empty($header)){
            return response()->json('Adres tanımı boş olamaz!');
        }
        if(empty($address)){
            return response()->json('Adres boş olamaz!');
        }
        if(empty($building_no)){
            return response()->json('Bina no boş olamaz!');
        }
        if(empty($phone)){
            return response()->json('Telefon numarası boş olamaz!');
        }

        $editAddress = DB::table('addresses')->where('id',$id)->update([
            'header' => $header,
            'address' => $address,
            'building_no' => $building_no,
            'floor' => $floor,
            'apartment_no' => $apartment_no,
            'specification' => $specification,
            'phone' => $phone
        ]);
        return response()->json('success');



    }

    //PERSONEL INFORMATION
    public function personelInformation(){
        return response()->json([
            'name' => Auth::user()->name,
            'email' => Auth::user()->email,
            'birthdate' => Auth::user()->birthdate,
            'sex' => Auth::user()->sex
        ]);
    }

    public function updatePersonelInformation(Request $request){

        if(empty($request->input('email'))){
            return response()->json('E-posta Adresi boş olamaz!');
        }

        if($request->input('email') != Auth::user()->email){
            $email = DB::table('users')->where('email','=',$request->input('email'))->first();
            if(!empty($email)){
                return response()->json('Bu E-posta Adresi başka bir kişi tarafından kullanılmaktadır!');
            }
        }
        $user = DB::table('users')->where('id',Auth::user()->id)->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'birthdate' => $request->input('birthdate'),
            'sex' => $request->input('sex')
        ]);
        return response()->json('Kişisel bilgileriniz başarıyla güncellendi.');

    }

    public function editPassword(Request $request){
        $password = $request->input('password');
        $newPassword = $request->input('newPassword');
        $reNewPassword = $request->input('reNewPassword');
        if(empty($password)){
            return response()->json('Mevcut Şifre boş olamaz!');
        }
        if(empty($newPassword)){
            return response()->json('Yeni Şifre boş olamaz!');
        }
        if (strlen($newPassword) < 6 || strlen($newPassword) > 16) {
            return response()->json('Yeni Şifre en az 6 en fazla 16 karakterden oluşmalıdır!');
        }
        if($newPassword != $reNewPassword){
            return response()->json('Yeni Şifreler eşleşmiyor. Lütfen kontrol ediniz!');
        }

        $user_pass = Auth::user()->getAuthPassword();
        if(!Hash::check($password,$user_pass)){
            return response()->json('Mevcut Şifre yanlış. Lütfen mevcut şifrenizi kontrol ediniz!');
        }

        $editPassword = DB::table('users')->where('id',Auth::user()->id)->update([
            'password' => Hash::make($newPassword)
        ]);
        if ($editPassword){
            return response()->json('success');
        } else {
            return response()->json('Şifre güncellenirken bir sorunla karşılaşıldı. Lütfen tekrar deneyiniz!');
        }

    }

    public function faq(){
        $faqs = Faq::select('id','question','answer')->where('status',1)->get();
        $array = array();
        foreach ($faqs as $value){
            array_push($array,[
               'id' => $value["id"],
                'question' => $value["question"],
                'answer' => strip_tags($value["answer"])
            ]);
        }
        return $array;
    }

    public function privacyInformation(){
        $setting = Setting::select('kvkk')->first();
        return response()->json(html_entity_decode(strip_tags($setting['kvkk'])),200,['Content-type'=>'application/json;charset=UTF-8','charset' => 'UTF-8'],JSON_UNESCAPED_UNICODE);
    }

    public function aboutUs(){
        $setting = Setting::select('company_name','brand_name','sicil_no','vergi_no','vergi_dairesi','mersis_no','address','phone','fax','email','facebook','twitter','instagram','linkedin')->first();
        return $setting;
    }
}
