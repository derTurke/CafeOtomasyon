<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Setting;
use App\Models\User;
use Hamcrest\Core\Set;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function register(Request $request){
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');

        if(empty($name)){
            return response()->json([
                'message' => 'Adınız ve soyadınız boş olamaz!'
            ],Response::HTTP_UNAUTHORIZED);
        }
        if (empty($email)){
            return response()->json([
                'message' => 'E-posta adresi boş olamaz!'
            ],Response::HTTP_UNAUTHORIZED);
        }
        if (empty($password)){
            return response()->json([
                'message' => 'Şifre boş olamaz!'
            ],Response::HTTP_UNAUTHORIZED);
        }
        if (strlen($password) < 6 || strlen($password) > 16) {
            return response()->json([
                'message' => 'Şifre en az 6 en fazla 16 karakterden oluşmalıdır!'
            ],Response::HTTP_UNAUTHORIZED);
        }

        $user = User::where("email",$email)->first();
        if (!empty($user)){
            return response()->json([
                'message' => 'Bu e-posta ile kayıtlı kullanıcı bulunmaktadır. Lütfen tekrar deneyiniz.'
            ],Response::HTTP_UNAUTHORIZED);
        }
        User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password)
        ]);

        if(Auth::attempt($request->only('email','password'))){
            $user = Auth::user();
            $token = $user->createToken('token')->plainTextToken;
            return response()->json([
                'token' => $token,
                'message' => 'Kayıt işlemi başarıyla gerçekleşti.'
            ],Response::HTTP_OK);
        } else {
            return response()->json([
                'message' => 'Kayıt işlemi gerçekleştirilemedi. Lütfen tekrar deneyiniz.'
            ],Response::HTTP_UNAUTHORIZED);
        }


    }

    public function login(Request $request){
        $email = $request->input('email');
        $password = $request->input('password');
        if (empty($email)){
            return response()->json([
                'message' => 'E-posta adresi boş olamaz!'
            ],Response::HTTP_UNAUTHORIZED);
        }

        if (empty($password)){
            return response()->json([
                'message' => 'Şifre boş olamaz!'
            ],Response::HTTP_UNAUTHORIZED);
        }


        if(!Auth::attempt($request->only('email','password'))){
            return response()->json([
                'message' => 'Bilgiler yanlış lütfen kontrol ediniz!'
            ],Response::HTTP_UNAUTHORIZED);
        }
        $user = Auth::user();
        $token = $user->createToken('token')->plainTextToken;
        return response()->json([
            'token' => $token,
            'message' => 'Giriş işlemi başarıyla gerçekleşti.'
        ],Response::HTTP_OK);
    }

    public function forgotPassword(Request $request){
        $email = $request->input('email');
        if (empty($email)){
            return response()->json('E-posta Adresi boş olamaz!');
        }
        $users = DB::table('users')->where('email',$email)->first();
        if (!empty($users->email)){
            return response()->json('success');
        } else {
            return response()->json('Girilmiş olan e-posta adresine kayıtlı üyelik bulunmamaktadır. Lütfen üye olunuz!');
        }
    }
    public function forgotPassword2(Request $request){
        $email = $request->input('email');
        $password = $request->input('password');
        $password_again = $request->input('password_again');
        if (empty($password)){
            return response()->json([
                'message' => 'Şifre boş olamaz!'
            ]);
        }
        if ($password != $password_again){
            return response()->json([
                'message' => 'Şifreler birbirleriyle eşleşmemektedir. Lütfen şifrenizi kontrol ediniz!'
            ]);
        }
        $update = DB::table('users')->where('email',$email)->update([
           'password' => Hash::make($password)
        ]);
        if (!empty($update)){
            if(!Auth::attempt($request->only('email','password'))){
                return response()->json([
                    'message' => 'Bilgiler yanlış lütfen kontrol ediniz!'
                ],Response::HTTP_UNAUTHORIZED);
            }
            $user = Auth::user();
            $token = $user->createToken('token')->plainTextToken;
            return response()->json([
                'token' => $token,
                'message' => 'Giriş işlemi başarıyla gerçekleşti.'
            ],Response::HTTP_OK);
        } else {
            return response()->json([
                'message' => 'Şifreniz güncellenirken bir sorunla karşılaşıldı. Lütfen tekrar deneyiniz!'
            ]);
        }
    }
    public function logout(){
        auth()->user()->tokens()->delete();
        return response(['message' => 'Başarıyla çıkış yaptınız!']);
    }
}
