<?php

namespace App\Http\Controllers;

use Http;
use App\Models\Indicadores;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    public function index() {
        return view('show');
    }

    public function getIndicadores() {

       $indicadores = Indicadores::all();

        if ( count($indicadores) == 0 ) {
            $this->getData();
        }

        return view('indicadoresLista', ['lista' => $indicadores]);
    }

    public function getToken () {

        $response = Http::post('https://postulaciones.solutoria.cl/api/acceso', [
            'userName' => 'nicolasmiravenah6usp_z48@indeedemail.com',
            'flagJson' => true
        ]);

        $token = $response->json();       
        return $token['token'];
    }

    public function getData() {

        $token = $this->getToken();
        
        $response = Http::withToken($token)->get('https://postulaciones.solutoria.cl/api/indicadores');

        $datos = $response->json();

        foreach ( $datos as $dato ) {
            DB::insert('insert into indicadores (nombreIndicador, codigoIndicador, unidadMedidaIndicador, valorIndicador, fechaIndicador, tiempoIndicador, origenIndicador) values (?, ?, ?, ?, ?, ?, ?)', 
                        [$dato['nombreIndicador'], $dato['codigoIndicador'], $dato['unidadMedidaIndicador'], $dato['valorIndicador'], $dato['fechaIndicador'], $dato['tiempoIndicador'], $dato['origenIndicador']]);
        }
        
    }

    public function saveIndicador(Request $request) {
        if($request->ajax()){
            $indicador = new Indicadores;
            $indicador->nombreIndicador = $request->input('nombreIndicador');
            $indicador->codigoIndicador = $request->input('codigoIndicador');
            $indicador->unidadMedidaIndicador = $request->input('unidadMedidaIndicador');
            $indicador->valorIndicador = $request->input('valorIndicador');

            $fecha = strtotime($request->input('fechaIndicador'));
            $indicador->fechaIndicador = $newformat = date('Y-m-d',$fecha );

            $indicador->origenIndicador = $request->input('origenIndicador');
            $indicador->save();

            return response($indicador);
        }
    }

    public function updateIndicador(Request $request) {
        if($request->ajax()){
            
            $indicador = Indicadores::find($request->indicadorId);
            $indicador->nombreIndicador = $request->input('editnombreIndicador');
            $indicador->codigoIndicador = $request->input('editcodigoIndicador');
            $indicador->unidadMedidaIndicador = $request->input('editunidadMedidaIndicador');
            $indicador->valorIndicador = $request->input('editvalorIndicador');

            $fecha = strtotime($request->input('editfechaIndicador'));
            $indicador->fechaIndicador = $newformat = date('Y-m-d',$fecha );

            $indicador->origenIndicador = $request->input('editorigenIndicador');
            $indicador->update();

            return response($indicador);
        }
    }

    public function deleteIndicador(Request $request) {
        if ($request->ajax()) {
            Indicadores::destroy($request->id);
        }
    }

    public function showGrafico(){

        $fechaActual = strtotime(date('d-m-Y'));
        
        $fecha_inicio = $newformat = date('Y-m-d',$fechaActual );
        $fecha_fin = $newformat = date('Y-m-d',$fechaActual );

        $datos = DB::select("SELECT nombreindicador, MAX(valorindicador) AS maxvalorindicador, MIN(valorindicador) AS minvalorindicador
                            FROM indicadores WHERE fechaindicador BETWEEN '$fecha_inicio' AND '$fecha_fin' GROUP BY nombreindicador");
        $info = [];
        foreach ($datos as $dato) {
            $variacion = ( $dato->maxvalorindicador - $dato->minvalorindicador ) * 100 / $dato->minvalorindicador;
            $info[] = ['name' => $dato->nombreindicador, 'y' => round($variacion, 2)];
        }
        return view('grafico', ["data" => json_encode($info), 'fecha_inicio' => $fecha_inicio, 'fecha_fin' => $fecha_fin]);
    }

    public function filtroGrafico( Request $request){

        $fecha1 = strtotime($request->input('fecha_inicio'));
        $fecha_inicio= $newformat = date('Y-m-d',$fecha1 );

        $fecha2 = strtotime($request->input('fecha_fin'));
        $fecha_fin= $newformat = date('Y-m-d',$fecha2 );
        
        
        $datos = DB::select("SELECT nombreindicador, MAX(valorindicador) AS maxvalorindicador, MIN(valorindicador) AS minvalorindicador
                            FROM indicadores WHERE fechaindicador BETWEEN '$fecha_inicio' AND '$fecha_fin' GROUP BY nombreindicador");
        $info = [];
        foreach ($datos as $dato) {
            $variacion = ( $dato->maxvalorindicador - $dato->minvalorindicador ) * 100 / $dato->minvalorindicador;
            $info[] = ['name' => $dato->nombreindicador, 'y' => round($variacion, 2)];
        }
        return view('grafico', ["data" => json_encode($info), 'fecha_inicio' => $fecha_inicio, 'fecha_fin' => $fecha_fin]);
    }
}
