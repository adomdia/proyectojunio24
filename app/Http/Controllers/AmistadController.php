<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Facade\Ignition\QueryRecorder\Query;

use App\Models\SolicitudesContent;
use App\Models\AmistadContent;
use Illuminate\Database\QueryException;

class AmistadController extends Controller
{
    public function index(){
        $usuariosConSolicitudesAceptadas = SolicitudesContent::where('user_2', Auth::user()->id)
        ->where('status', 'Aceptada')
        ->pluck('user_1')
        ->toArray();
        
        $usuariosConSolicitudesRechazadas = SolicitudesContent::where('user_2', Auth::user()->id)
        ->where('status', 'Rechazada')
        ->pluck('user_1')
        ->toArray();

        $usuariosConSolicitudesAceptadas1 = SolicitudesContent::where('user_1', Auth::user()->id)
        ->where('status', 'Aceptada')
        ->pluck('user_2')
        ->toArray();
        
        $usuariosConSolicitudesRechazadas1 = SolicitudesContent::where('user_1', Auth::user()->id)
        ->where('status', 'Rechazada')
        ->pluck('user_2')
        ->toArray();

        $usuarios = User::where('role_id', '2')
        ->where('id', '!=', Auth::user()->id)
        ->whereNotIn('id', $usuariosConSolicitudesAceptadas)
        ->whereNotIn('id', $usuariosConSolicitudesAceptadas1)
        ->whereNotIn('id', $usuariosConSolicitudesRechazadas)
        ->whereNotIn('id', $usuariosConSolicitudesRechazadas1)
        ->get();

        return view('usuarios', compact('usuarios'));
    }

    public function sendSolicitude(Request $request)
    {

        try {
            $userId = $request->input('query');
            $user_2 = User::find($userId);

    
            if ($user_2) {
                $solicitud = new SolicitudesContent([
                    'user_1' => Auth::user()->id,
                    'user_2' => $userId,
                    'status' => "Pendiente",
                ]);
                $solicitud->save();
            }
    
            return response()->json(['success' => true, 'message' => 'Solicitud de amistad enviada con éxito', 'userId' => $userId]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error interno del servidor: ' . $e->getMessage()]);
        } 
    }

    public function cancelSolicitude(Request $request)
    {
        $userId = $request->input('query');

        $existingRequest = SolicitudesContent::where('user_1', Auth::user()->id)
            ->where('user_2', $userId)
            ->first();

        if ($existingRequest) {
            $existingRequest->delete();
            return response()->json(['success' => true, 'message' => 'Solicitud de amistad cancelada con éxito', 'userId' => $userId]);
        }

        return response()->json(['success' => false, 'message' => 'La solicitud no existe']);
    }
    

    public function blockUser(Request $request)
    {
        $userIdToBlock = $request->input('query');

        $currentUser = User::get()->where('id', Auth::user()->id)->first();

        
        $blockedUsers = json_decode($currentUser->bloqued_users, true) ?: [];
        
        AmistadContent::where(function ($query) use ( $userIdToBlock) {
            $query->where('user_id_1', auth()->user()->id)
                ->where('user_id_2',  $userIdToBlock);
        })->orWhere(function ($query) use ( $userIdToBlock) {
            $query->where('user_id_1',  $userIdToBlock)
                ->where('user_id_2', auth()->user()->id);
        })->delete();
        
        if (!in_array($userIdToBlock, $blockedUsers)) {
            $blockedUsers[] = $userIdToBlock;
            $currentUser->bloqued_users = $blockedUsers;
            $currentUser->save();

            return response()->json(['success' => true, 'message' => 'Usuario bloqueado con éxito']);
        }

        return response()->json(['success' => false, 'message' => 'El usuario ya está bloqueado']);
    }

    public function unblockUser(Request $request)
    {
        $userIdToUnblock = $request->input('query');
        $currentUser = User::get()->where('id', Auth::user()->id)->first();

      
        $blockedUsers = json_decode($currentUser->bloqued_users, true) ?: [];

        if (in_array($userIdToUnblock, $blockedUsers)) {
            $blockedUsers = array_diff($blockedUsers, [$userIdToUnblock]);
            $currentUser->bloqued_users = $blockedUsers;
            $currentUser->save();

            return response()->json(['success' => true, 'message' => 'Usuario desbloqueado con éxito']);
        }

        return response()->json(['success' => false, 'message' => 'El usuario no está bloqueado']);
    }



    public function getFriendshipStatus($userId)
    {
        $currentUser = Auth::user();
        $friendshipStatus = SolicitudesContent::where(function ($query) use ($currentUser, $userId) {
            $query->where('user_1', $currentUser->id)
                ->where('user_2', $userId)
                ->where('status', 'Pendiente');
        })->first();


        $blockedStatus = in_array($userId, json_decode($currentUser->bloqued_users, true));

        return response()->json(['friendshipStatus' => $friendshipStatus, 'blockedStatus' => $blockedStatus]);
    }

    public function getSolicitud(){
        $currentUser = Auth::user();

        $solicitudesPendientes = SolicitudesContent::where('user_2', $currentUser->id)
        ->where('status', 'Pendiente')
        ->get();

        $usuariosSolicitantes = [];
        foreach ($solicitudesPendientes as $solicitud) {
            $usuarioSolicitante = User::find($solicitud->user_1);
            if ($usuarioSolicitante) {
                $usuariosSolicitantes[] = $usuarioSolicitante;
            }
        }

        return view('solicitudes', compact('usuariosSolicitantes'));
    }


    public function aceptarSolicitud(Request $request){
        try {
            $userId = $request->input('query');
            $currentUser = Auth::user();
        
            SolicitudesContent::where('user_1', $userId)
                ->where('user_2', $currentUser->id)
                ->update(['status' => 'Aceptada']);
    
            $amistad = new AmistadContent([
                'user_id_1' => $currentUser->id,
                'user_id_2' => $userId,
            ]);
            $amistad->save();
    
            return response()->json(['success' => true, 'message' => 'Solicitud aceptada con éxito', 'userid' => $userId, 'currentUser' => $currentUser,]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error al aceptar la solicitud', 'error' => $e->getMessage()]);
        }
    }

    public function rechazarSolicitud(Request $request)
    {
        $userId = $request->input('userId');
        $currentUser = Auth::user();

        // Eliminar la solicitud de la base de datos
        SolicitudesContent::where('user_1', $userId)
            ->where('user_2', $currentUser->id)
            ->update(['status' => 'Rechazada']);

        return response()->json(['success' => true, 'message' => 'Solicitud rechazada con éxito']);
    }

    public function areFriends($userId)
    {
        $areFriends = AmistadContent::where(function ($query) use ($userId) {
            $query->where('user_id_1', auth()->user()->id)
                ->where('user_id_2', $userId);
        })->orWhere(function ($query) use ($userId) {
            $query->where('user_id_1', $userId)
                ->where('user_id_2', auth()->user()->id);
        })->exists();

        return response()->json(['areFriends' => $areFriends]);
    }

    public function removeFriend(Request $request)
    {

            $userId = $request->input('query');
            AmistadContent::where(function ($query) use ($userId) {
                $query->where('user_id_1', auth()->user()->id)
                    ->where('user_id_2', $userId);
            })->orWhere(function ($query) use ($userId) {
                $query->where('user_id_1', $userId)
                    ->where('user_id_2', auth()->user()->id);
            })->delete();
        
            return response()->json(['success' => true]);
    }


    public function show()
    {
        $userId = auth()->id();


        $usuariosAmistad = AmistadContent::where(function ($query) use ($userId) {
            $query->where('user_id_1', $userId)
                ->orWhere('user_id_2', $userId);
        })->get();

        $idsUsuariosAmistad = $usuariosAmistad->pluck('user_id_1')->merge($usuariosAmistad->pluck('user_id_2'))->unique();

        $usuarios = User::whereNotIn('id', [$userId])->whereIn('id', $idsUsuariosAmistad)->get();


        return view('amigos', compact('usuarios'));
    }
}
