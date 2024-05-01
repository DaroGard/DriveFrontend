<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\RequestException;

class LoginController extends Controller
{
    public function inicioSesion()
    {
        return view('login');
    }
    
    public function verificarUsuario(Request $request)
    {
        try {
            $client = new Client();
            $response = $client->post('http://localhost:8080/drive/usuarios/login', [
                'form_params' => [
                    'correo' => $request->input('correo'),
                    'contrasena' => $request->input('contrasena'),
                ]
            ]);
    
            if ($response->getStatusCode() == 200) {
                $cuentaAct = json_decode($response->getBody()->getContents(), true);
        
                Session::put('cuentaAct', $cuentaAct);
        
                return redirect()->route('main-page');
            } else {
                return back()->withInput()->with('error', 'Credenciales incorrectas.');
            }
        } catch (RequestException $e) {
            return back()->withInput()->with('error', 'ERROR: Credenciales incorrectas o problemas de servidor. Intente de nuevo.');
        }
    }

}
