<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cor;
use App\Models\Marca;
use App\Models\Modelo;
use App\Models\Estado;
use App\Models\Carro;
use Dompdf\Dompdf;


class MarcaController extends Controller
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
        $data = Marca::all();
        return view('marca.index', compact(['data']));

    }


    public function create()
    {
        return view('marca.create');

    }


    public function store(Request $request)
    {
        $request->validate($this->regras, $this->msgs);
        $marca = new Marca();
        $marca->name = $request->name;
        $marca->save();

        return redirect()->route('marca.index');
    }

    public function show($id)
    {
        $marca = Marca::find($id);

        if(isset($marca))
        {
            return view('marca.show', compact('marca'));
        }
        return "<h1>MARCA NÃO ENCONTRADA</h1>";
    }


    public function edit($id)
    {
        $marca = Marca::find($id);

        if(isset($marca))
        {
            return view('marca.edit', compact('marca'));
        }
       return "<h1>MARCA NÃO ENCONTRADA</h1>";
    }


    public function update(Request $request, $id)
    {
        $marca = Marca::find($id);

        if(isset($marca))
        {
            $marca->name = $request->name;
            $marca->save();
            return redirect()->route('marca.index');
        }
       return "<h1>MARCA NÃO ENCONTRADA</h1>";
    }


    public function destroy($id)
    {
        $marca = Marca::find($id);

        if(isset($marca))
        {
            $marca->delete();

            return redirect()->route('marca.index');
        }
        return "<h1>MARCA NÃO ENCONTRADA</h1>";

    }
    public function report($id){

        $carros = Carro::where('marca_id', $id)->get();

        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('marca.report', compact('carros')));
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream("relatorio-carros.pdf", array("Attachment" => false));
    }

    public function graph(){


        $marcas = Marca::with('carro')->orderBy('name')->get();


        $data = [
            ["MARCA", "NÚMERO DE CARROS"]

        ];
        $cont = 1;
        foreach($marcas as $item){
            $data[$cont] = [
                $item->name, count($item->curso)
            ];
            $cont++;
        }
        //dd($data);

        $data = json_encode($data);

            return view('marca.graph', compact(['data']));
    }
}