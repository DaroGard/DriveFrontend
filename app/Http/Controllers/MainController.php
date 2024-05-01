<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MainController extends Controller
{
    public function main()
    {
        $client = new Client([
            'base_uri' => 'http://localhost:8080',
            'timeout' => 2.0,
            'verify' => false,
        ]);

        $idUsuario = Session::get('cuentaAct')['idUsuario'];
        $url = '/drive/archivos/usuario/' . $idUsuario;

        $responseTipoArchivo = $client->request('GET', '/drive/tiposarchivo/todos');
        $responseUsuarios = $client->request('GET', '/drive/usuarios/todos');
        $responseArchivo = $client->request('GET', $url);

        $tiposArchivos = json_decode($responseTipoArchivo->getBody()->getContents());
        $usuarios = json_decode($responseUsuarios->getBody()->getContents());
        $archivos = json_decode($responseArchivo->getBody()->getContents());

        return view('main', compact('tiposArchivos', 'usuarios', 'archivos'));
    }

    public function guardarArchivo(Request $request)
    {
        $client = new Client();

        $idUsuario = Session::get('cuentaAct')['idUsuario'];
        $nombre = $request->input('nombre');
        $descripcion = $request->input('descripcion');
        $tamano = $request->input('tamano');
        $tipoArchivo = intval($request->input('tipoarchivo'));

        if (!is_numeric($tipoArchivo)) {
            throw new \InvalidArgumentException("El tipo de archivo no es un entero válido.");
        }
        
        // Construye el cuerpo de la solicitud JSON
        $body = [
            'usuario' => [
                'idUsuario' => $idUsuario
            ],
            'tipoArchivo' => [
                'idTipoArchivo' => $tipoArchivo
            ],
            'tamano' => $tamano,
            'nombre' => $nombre,
            'descripcion' => $descripcion
        ];

        $response = $client->post('http://localhost:8080/drive/archivos/guardar', [
            'json' => $body
        ]);
        
        return redirect()->route('main-page');
    }
}