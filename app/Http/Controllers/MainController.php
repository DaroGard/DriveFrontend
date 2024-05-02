<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Exception\RequestException;


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
        $responseGenero = $client->request('GET', '/drive/usuario/genero/todos');
        $responseLugar = $client->request('GET', 'drive/lugares/todos');
        $responsePreferencia = $client->request('GET', 'drive/usuarios/preferencia/todas');
        $responseCarpeta = $client->request('GET', '/drive/carpetas/todas');

        $tiposArchivos = json_decode($responseTipoArchivo->getBody()->getContents());
        $usuarios = json_decode($responseUsuarios->getBody()->getContents());
        $archivos = json_decode($responseArchivo->getBody()->getContents());
        $generos = json_decode($responseGenero->getBody()->getContents());
        $lugares = json_decode($responseLugar->getBody()->getContents());
        $preferencias = json_decode(($responsePreferencia->getBody()->getContents()));
        $carpetas = json_decode(($responseCarpeta->getBody()->getContents()));

        return view('main', compact('tiposArchivos', 'usuarios', 'archivos', 'generos', 'lugares', 'preferencias', 'carpetas'));
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

    public function actualizarUsuario(Request $request)
    {
        $idUsuario = Session::get('cuentaAct')['idUsuario'];
        $client = new Client();

        $usuarioActual = [
            'nombre' => Session::get('cuentaAct')['nombre'],
            'apellido' => Session::get('cuentaAct')['apellido'],
            'contrasena' => Session::get('cuentaAct')['contrasena'],
            'imagen' => Session::get('cuentaAct')['imagen'],
            'telefono' => Session::get('cuentaAct')['telefono'],
            'genero' => [
                'idGenero' => Session::get('cuentaAct')['genero']['idGenero']
            ],
            'lugar' => [
                'idLugar' => Session::get('cuentaAct')['lugar']['idLugar']
            ],
            'preferencia' => [
                'idPreferencia' => Session::get('cuentaAct')['preferencia']['idPreferencia']
            ]
        ];

        $data = [
            'nombre' => $request->input('usuarioNombre', $usuarioActual['nombre']),
            'apellido' => $request->input('usuarioApellido', $usuarioActual['apellido']),
            'contrasena' => $request->input('usuarioContrasena', $usuarioActual['contrasena']),
            'imagen' => $request->input('usuarioImg', $usuarioActual['imagen']),
            'telefono' => $request->input('usuarioTelefono', $usuarioActual['telefono']),
            'genero' => [
                'idGenero' => $request->input('genero', $usuarioActual['genero']['idGenero'])
            ],
            'lugar' => [
                'idLugar' => $request->input('lugar', $usuarioActual['lugar']['idLugar'])
            ],
            'preferencia' => [
                'idPreferencia' => $request->input('preferencia', $usuarioActual['preferencia']['idPreferencia'])
            ]
        ];

        try {
            $response = $client->request('PUT', 'http://localhost:8080/drive/usuarios/actualizar/' . $idUsuario, [
                'json' => $data,
                'headers' => [
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                ]
            ]);

            return redirect()->route('main-page');

        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function actualizarArchivo(Request $request)
    {

        $idArchivo = $request->input('archivoEditId');

        $client = new Client([
            'base_uri' => 'http://localhost:8080/',
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ],
        ]);

        $nombre = $request->input('archivoEditNombre');
        $descripcion = $request->input('archivoEditDescripcion');

        $data = [
            'nombre' => $nombre,
            'descripcion' => $descripcion,
        ];

        try {
            $response = $client->request('PUT', 'drive/archivos/actualizar/'. $idArchivo, [
                'json' => $data,
            ]);

            if ($response->getStatusCode() === 200) {
                return redirect()->route('main-page');
            } else {
                return response()->json([
                    'error' => 'Error al actualizar el archivo',
                ], $response->getStatusCode());
            }
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ], 500);
        }
    }


}