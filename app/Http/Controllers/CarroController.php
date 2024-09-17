<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cor;
use App\Models\Marca;
use App\Models\Modelo;
use App\Models\Estado;
use App\Models\Carro;
use Dompdf\Dompdf;


class CarroController extends Controller
{

    private $regras = [
            'placa' => 'required|max:8|min:8|unique:carros',
        ];

        private $msgs = [
            "required" => "O preenchimento do campo [:attribute] é obrigatório!",
            "max" => "O campo [:attribute] possui tamanho máximo de [:max] caracteres!",
            "min" => "O campo [:attribute] possui tamanho mínimo de [:min] caracteres!",
        ];

    public function index()
    {

        $data = Carro::with('modelo')->get();
        return view('carro.index', compact('data'));

        $data = Carro::with('estado')->get();
        return view('carro.index', compact('data'));

        $data = Carro::with('cor')->get();
        return view('carro.index', compact('data'));


    }


    public function create()
    {
        $estados = Estado::all();
        $cors = Cor::all();
        $modelos = Modelo::all();
        return view('carro.create', compact('modelos', 'cors', 'estados'));

    }


    public function store(Request $request)
    {
        $request->validate($this->regras, $this->msgs);
        $carro = new Carro();
        $carro->placa = $request->placa;
        $carro->modelo_id = $request->modelo_id;
        $carro->estado_id = $request->estado_id;
        $carro->cor_id = $request->cor_id;
        $carro->save();

        return redirect()->route('carro.index');
    }

    public function show($id)
    {
        $carro = Carro::find($id);

        if(isset($carro))
        {
            return view('carro.show', compact('carro'));
        }
        return "<h1>CARRO NÃO ENCONTRADO</h1>";

    }


    public function edit($id)
    {
        $carro = Carro::find($id);

        $modelos = Modelo::all();
        $estados = Estado::all();
        $cors = Cor::all();

        if(isset($carro))
        {
            return view('carro.edit', compact('carro', 'modelos', 'estados', 'cors'));
        }
       return "<h1>CARRO NÃO ENCONTRADO</h1>";
    }


    public function update(Request $request, $id)
    {
        $carro = Carro::find($id);


        if(isset($carro))
        {
            $carro->placa = $request->placa;
            $carro->modelo_id = $request->modelo_id;
            $carro->estado_id = $request->estado_id;
            $carro->cor_id = $request->cor_id;
            $carro->save();
            return redirect()->route('carro.index');
        }
       return "<h1>CARRO NÃO ENCONTRADO</h1>";
    }


    public function destroy($id)
    {
        $carro = Carro::find($id);

        if(isset($carro))
        {
            $carro->delete();

            return redirect()->route('carro.index');
        }
        return "<h1>CARRO NÃO ENCONTRADO</h1>";

    }
    public function report($id){

        $carros = Carros::where('carro_id', $id)->get();

        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('carro.report', compact('carros')));
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream("relatorio-carros.pdf", array("Attachment" => false));
    }

    public function graph(){


        $carros = Carros::with('carro')->orderBy('name')->get();


        $data = [
            ["CARRO", "NÚMERO DE CARROS"]

        ];
        $cont = 1;
        foreach($carros as $item){
            $data[$cont] = [
                $item->name, count($item->carro)
            ];
            $cont++;
        }
        //dd($data);

        $data = json_encode($data);

            return view('carros.graph', compact(['data']));
    }
}
