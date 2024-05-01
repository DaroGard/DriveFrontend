<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class SignController extends Controller
{
    public function createUser(Request $request)
    {
        $client = new Client([
            'base_uri' => 'http://localhost:8080/drive/',
            'timeout'  => 2.0,
        ]);
    
        try {
            $response = $client->post('usuarios/crear', [
                'json' => [
                    'nombre' => $request->input('cajaNombre'),
                    'apellido' => $request->input('cajaApellido'),
                    'correo' => $request->input('cajaCorreo'),
                    'contrasena' => $request->input('inputPassword5'),
                ]
            ]);
    
            if ($response->getStatusCode() >= 200 && $response->getStatusCode() < 300) {
                return redirect()->route('inicio_sesion')->with('success', 'Usuario creado exitosamente.');
            } else {
                $responseData = json_decode($response->getBody(), true);
                return back()->withInput()->with('error', $responseData['mensaje']);
            }
        } catch (RequestException $e) {
            return back()->withInput()->with('error', 'ERROR: Correo existente, espacios en blanco o problemas de servidor. Intente de nuevo.');
        }
    }
}