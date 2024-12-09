<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Sanctum\HasApiTokens;

class AuthController extends Controller
{    /**
     * Create User
     * @param Request $request
     * @return User 
     */
    public function createUser(Request $request)
    {

        try {
            //Aqui se valida que los campos requeridos no esten vacios
            $validateUser = Validator::make($request->all(), 
            [
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required'
                
            ]);

            if($validateUser->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'Llene los campos requeridos correctamente',
                    'errors' => $validateUser->errors()
                ], 401);
            }

            //Aqui se crea el usuario y se encripta la contraseña
             $user = User::create([
                 'name' => $request->name,
                 'email' => $request->email,
                 'password' => Hash::make($request->password),
                 'role' => 'user',
                 'status' => 'activo'
             ]);
            //Aqui se retorna un mensaje de exito y se crea el token de autenticacion
            //EL token asignara el rol de usuario a la persona que se registre 
            return response()->json([
                'status' => true,
                'message' => 'Usuario creado exitosamente',
                'token' => $user->createToken("API TOKEN", ['user'])->plainTextToken
            ], 200);
                    
            // return response()->json([
            //     'status' => true,
            //     'message' => 'User Created Successfully',
            //     'token' => $user->createToken("API TOKEN")->plainTextToken
            // ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    //create admin
    public function createAdmin(Request $request)
    {
        try {
            $validateUser = Validator::make($request->all(), 
            [
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required'
                
            ]);

            if($validateUser->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'admin',
                'status' => 'activo'
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Admin Created Successfully',
                'token' => $user->createToken("API TOKEN", ['admin'])->plainTextToken
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
    //create master
    public function createMaster(Request $request)
    {
        try {
            $validateUser = Validator::make($request->all(), 
            [
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required'
                
            ]);

            if($validateUser->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'master',
                'status' => 'activo'
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Master Created Successfully',
                'token' => $user->createToken("API TOKEN", ['master'])->plainTextToken
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    } 
    //Login the user
    public function loginUser(Request $request)
    {
        try {
            $validateUser = Validator::make($request->all(), 
            [
                'email' => 'required|email',
                'password' => 'required'
                
            ]);

            if($validateUser->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }

            if(!Auth::attempt($request->only(['email', 'password']))){
                return response()->json([
                    'status' => false,
                    'message' => 'Email & Password does not match with our record.',
                ], 401);
            }
            
            $user = User::where('email', $request->email)->first();
            //si el usuario esta inactivo no se le permite iniciar sesion
            if($user->status == 'inactivo'){
                return response()->json([
                    'status' => false,
                    'message' => 'User is inactive',
                ], 200);
            }
            
            return response()->json([
                'status' => true,
                'user' => $user,
                'message' => 'User Logged In Successfully',
                'role' => $user->role,
                'token' => $user->createToken("API TOKEN")->plainTextToken,
                'status' => $user->state,
                'created' => $user->created_at,
                'numberOfFavorites' => $user->numberOfFavorites,
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
    //Logout the user
    public function logoutUser(Request $request)
    {
        $user = $request->user(); // Obtiene el usuario autenticado automáticamente
        if ($user) {
            // Revoke all tokens del usuario autenticado
            $user->tokens()->delete();
        }else{
            return response()->json([
                'status' => false,
                'message' => 'User not found'
            ], 404);
        }
        // Opcional: invalida sesión
        $request->session()->invalidate();
        // Responde con éxito
        return response()->json(['message' => 'Logout successful'], 200);
    }

    //Get the user
    public function getUser(Request $request)
    {
        // con el id del usuario autenticado, se obtiene el usuario
        $id=$request->user()->id;
        $user = User::find($id);
        return response()->json([
            'status' => true,
            'user' => $user,
        ], 200);
    }

    //get all the users with role admin except the id passed
    public function getAdmins($id){
        return User::where('role', 'admin')->where('id', '!=', $id)->get();
    }

    // public function getAdmins($id){
    //     return User::where('role', 'admin')->orWhere('role', 'master')->where('id', '!=', $id)->get();
    // }
    //get all the users with role user except the id passed and are not the admin or master
    public function getUsers($id){
        return User::where('role', 'user')->where('id', '!=', $id)->get();
    }

    //change the status of the user
    public function changeStatus($id){
        $user = User::find($id);
        if($user->status == 'activo'){
            $user->status = 'inactivo';
        }else{
            $user->status = 'activo';
        }
        $user->save();
        return response()->json([
            'status' => true,
            'message' => 'Status changed successfully'
        ], 200);
    }

    //delete the user and his favorites
    public function deleteUser($id){
        $user = User::find($id);
        //borrar los favoritos del usuario
        $user->partituras()->delete();
        //borrar el usuario
        $user->delete();
        return response()->json([
            'status' => true,
            'message' => 'User deleted successfully'
        ], 200);
    }

    

}
