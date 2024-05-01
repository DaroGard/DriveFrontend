<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function main(){
        $client = new Client([
            'base_uri' => 'http://localhost:8080',
            'timeout' => 2.0,
            'verify' => false,
        ]);

        $responseTipoArchivo = $client->request('GET', '/drive/tiposarchivo/todos');
        $responseUsuarios = $client->request('GET', '/drive/usuarios/todos');
        
        $tiposArchivos = json_decode($responseTipoArchivo->getBody()->getContents());
        $usuarios = json_decode($responseUsuarios->getBody()->getContents());

        // Pasar los productos y categorías a la vista
        return view('main', compact('tiposArchivos', 'usuarios'));
    }

    public function guardarArchivo(Request $request)
    {
        $idUsuario = $request->input('idUsuario');
        $nombre = $request->input('nombre');
        $descripcion = $request->input('descripcion');
        $tamano = $request->input('tamano');
        $idTipoArchivo = $request->input('tipoarchivo');
    
        dd($idTipoArchivo);
    
        $client = new Client([
            'base_uri' => 'http://localhost:8080/drive/',
            'timeout'  => 2.0,
        ]);
    
        try {
            $response = $client->post('archivos/guardar', [
                'json' => [
                    'usuario' => [
                        'idUsuario' => $idUsuario
                    ],
                    'tipoArchivo' => [
                        'idTipoArchivo' => $idTipoArchivo
                    ],
                    'tamano' => $tamano,
                    'nombre' => $nombre,
                    'descripcion' => $descripcion
                ]
            ]);
    
            if ($response->getStatusCode() == 200) {
                return response()->json(['success' => true]);
            } else {
                return response()->json(['success' => false]);
            }
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }
    
}

