<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cor;
use App\Models\Marca;
use App\Models\Modelo;
use App\Models\Estado;
use App\Models\Carro;
use Dompdf\Dompdf;


class ModeloController extends Controller
{

    private $regras = [
            'name' => 'required|max:30|min:2',
        ];

        private $msgs = [
            "required" => "O preenchimento do campo [:attribute] é obrigatório!",
            "max" => "O campo [:attribute] possui tamanho máximo de [:max] caracteres!",
            "min" => "O campo [:attribute] possui tamanho mínimo de [:min] caracteres!",
        ];

    public function index()
    {
        $data = Modelo::with('marca')->get();
        return view('modelo.index', compact('data'));

    }


    public function create()
    {
        $marcas = Marca::all();
        return view('modelo.create', compact('marcas'));

    }


    public function store(Request $request)
    {
        $request->validate($this->regras, $this->msgs);

        $modelo = new Modelo();
        $modelo->name = $request->name;
        $modelo->marca_id = $request->marca_id;
        $modelo->save();

        return redirect()->route('modelo.index');
    }

    public function show($id)
    {
        $modelo = Modelo::find($id);

        if(isset($modelo))
        {
            return view('modelo.show', compact('modelo'));
        }
        return "<h1>MODELO NÃO ENCONTRADO</h1>";
    }


    public function edit($id)
    {
        $modelo = Modelo::find($id);
        $marcas = Marca::orderBy('name')->get();

        if(isset($modelo))
        {
            return view('modelo.edit', compact(['modelo', 'marcas']));
        }
       return "<h1>MODELO NÃO ENCONTRADO</h1>";
    }


    public function update(Request $request, $id)
    {
        $modelo = Modelo::find($id);

        if(isset($modelo))
        {
            $modelo->name = $request->name;
            $modelo->save();
            return redirect()->route('modelo.index');
        }
       return "<h1>MODELO NÃO ENCONTRADO</h1>";
    }


    public function destroy($id)
    {
        $modelo = Modelo::find($id);

        if(isset($modelo))
        {
            $modelo->delete();

            return redirect()->route('modelo.index');
        }
        return "<h1>MODELO NÃO ENCONTRADO</h1>";

    }
    public function report($id){

        $carros = Carro::where('modelo_id', $id)->get();

        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('modelo.report', compact('carros')));
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream("relatorio-carros.pdf", array("Attachment" => false));
    }

    public function graph(){


        $modelos = Modelo::with('carro')->orderBy('name')->get();


        $data = [
            ["MODELO", "NÚMERO DE CARROS"]

        ];
        $cont = 1;
        foreach($modelos as $item){
            $data[$cont] = [
                $item->name, count($item->carros)
            ];
            $cont++;
        }
        //dd($data);

        $data = json_encode($data);

            return view('modelo.graph', compact(['data']));
    }
}