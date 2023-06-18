<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Auto;

class AutoController extends Controller
{
    public function Listar(Request $request)
    {
        return Auto::all();
    }
    public function Guardar(Request $request)
    {
        $auto = new Auto;
        $auto->marca = $request->post("marca");
        $auto->modelo = $request->post("modelo");
        $auto->color = $request->post("color");
        $auto->puertas = $request->post("puertas");
        $auto->cilindrado = $request->post("cilindrado");
        $auto->automatico = $request->post("automatico");
        $auto->electrico = $request->post("electrico");
        $auto->save();
        return $auto;
    }
    public function ListarUno(Request $request, $idAuto)
    {
        return Auto::findOrFail($idAuto);
    }
    public function Modificar(Request $request, $idAuto)
    {
        $auto = Auto::findOrFail($idAuto);
        $auto->marca = $request->post("marca");
        $auto->modelo = $request->post("modelo");
        $auto->color = $request->post("color");
        $auto->puertas = $request->post("puertas");
        $auto->cilindrado = $request->post("cilindrado");
        $auto->automatico = $request->post("automatico");
        $auto->electrico = $request->post("electrico");
        $auto->save();
        return $auto;
    }
    public function Eliminar(Request $request, $idAuto)
    {
        $auto = Auto::findOrFail($idAuto);
        $auto->delete();
        return ["mensaje" => "Auto $idAuto eliminado."];
    }
}
