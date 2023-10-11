<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use Illuminate\Validation\ValidationException;
use \stdClass;
use Illuminate\Support\Facades\Storage;

class ApiController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    // TYPE STRUCTURE
    public function map()
    {
        $serie = array();

        /************ REGIONS ********************************/
        // $geom = Storage::disk('public')->get('dataville/regions.json');
        $geom = Storage::disk('public')->get('dataville/district.geojson');


        // // JSON
        $json_regions = json_decode($geom, true);

        // // Regions
        // $regions = $json_regions[0]['row_to_json'];
        $regions = $json_regions;
        /************ END REGIONS ********************************/

        // VILLES
        // $ville = json_encode($tab, JSON_NUMERIC_CHECK);

        // REGIONS
        $region = json_encode($regions);

        $data = array('region' => $regions);

        return json_encode($data, JSON_NUMERIC_CHECK);
    }

    /**
    * Get the authenticated User
    *
    * @return [json] user object
    */
    public function user(Request $request)
    {
        $user = DB::table('users')
                    ->join('structures', 'users.structure_id', '=', 'structures.id')
                    ->select('users.*', 'structures.nom_structure as structure_name')
                    ->where('users.id', $request->user()->id)
                    ->first();

        unset($user->password);

        return response()->json($user);
    }

    /**
     * Login user and create token
    *
    * @param  [string] email
    * @param  [string] password
    * @param  [boolean] remember_me
    */
    public function login(Request $request)
    {
        $request->validate([
        'email' => 'required|string|email',
        'password' => 'required|string'
        ]);

        $credentials = request(['email','password']);
        if(!Auth::attempt($credentials))
        {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }

        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->plainTextToken;

        return response()->json([
        'accessToken' =>$token,
        'token_type' => 'Bearer',
        ]);
    }

    /**
    * Logout user (Revoke the token)
    *
    * @return [string] message
    */
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json([
        'message' => 'Successfully logged out'
        ]);

    }
}
