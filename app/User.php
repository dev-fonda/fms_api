<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Foundation\Auth\User as Authenticatable;
use Validator;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public static $loginRules = [
        'name' => 'required',
        'password' => 'required',
    ];

    public static $registerRules = [
        'name' => 'name',
        'password' => 'password',
    ];

    public function roles() {
        return $this->belongsToMany(Role::class);
    }

    public function checkRoles($roles) 
    {
        if ( ! is_array($roles)) {
            $roles = [$roles];    
        }

        if ( ! $this->hasAnyRole($roles)) {
            auth()->logout();
            abort(404);
        }
    }

    public function hasAnyRole($roles): bool
    {
        return (bool) $this->roles()->whereIn('code', $roles)->first();
    }

    public function hasRole($role): bool
    {
        return (bool) $this->roles()->where('code', $role)->first();
    }

    public static function login($request) {
        if(Auth::attempt(['name' => $request->name, 'password' => $request->password])){ 
            $user = Auth::user(); 
            $success['token'] =  $user->createToken('FMS_APIPassport')->accessToken; 
            $role = '';
            
            if ($request->user()->hasRole('USR')) {
                $role = 'User';
            }
    
            if ($request->user()->hasRole('ADM')){
                $role = 'Admin';
            }

            return response()->json([
                'status' => 'success',
                'data' => $success,
                'role' => $role
            ]); 
        } else { 
            return response()->json([
                'status' => 'error',
                'data' => 'Unauthorized Access'
            ]); 
        }
    }

    public static function register($request) {        
        $postArray = $request->all(); 
        $postArray['password'] = bcrypt($postArray['password']); 
        $user = User::create($postArray); 
        $success['token'] =  $user->createToken('FMS_APIPassport')->accessToken; 
        $success['name'] =  $user->name;

        return response()->json([
            'status' => 'success',
            'data' => $success,
        ]); 
    }
}
