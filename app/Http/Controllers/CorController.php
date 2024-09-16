<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cor;
use App\Models\Marca;
use App\Models\Modelo;
use App\Models\Estado;
use Dompdf\Dompdf;


class CorController extends Controller
{

    private $regras = [
            'name' => 'required|max:30|min:2|unique:cors',
        ];

        private $msgs = [
            "required" => "O preenchimento do campo [:attribute] é obrigatório!",
            "max" => "O campo [:attribute] possui tamanho máximo de [:max] caracteres!",
            "min" => "O campo [:attribute] possui tamanho mínimo de [:min] caracteres!",
        ];

    public function index()
    {
        $data = Cor::all();
        return view('cor.index', compact('data'));

        //return $data;

    }


    public function create()
    {
        return view('cor.create');

    }


    public function store(Request $request)
    {

        $request->validate($this->regras, $this->msgs);
        $cor = new Cor();
        $cor->name = $request->name;
        $cor->save();
        return redirect()->route('cor.index');
    }

    public function show($id)
    {
        $cor = Cor::find($id);

        if(isset($cor))
        {
            return view('cor.show', compact('cor'));
        }
        return "<h1>COR NÃO ENCONTRADA</h1>";
    }


    public function edit($id)
    {
        $cor = Cor::find($id);

        if(isset($cor))
        {
            return view('cor.edit', compact('cor'));
        }
       return "<h1>COR NÃO ENCONTRADA</h1>";
    }


    public function update(Request $request, $id)
    {
        $cor = Cor::find($id);

        if(isset($cor))
        {
            $cor->name = $request->name;
            $cor->save();
            return redirect()->route('cor.index');
        }
       return "<h1>COR NÃO ENCONTRADA</h1>";
    }


    public function destroy($id)
    {
        $cor = Cor::find($id);

        if(isset($cor))
        {
            $cor->delete();

            return redirect()->route('cor.index');
        }
        return "<h1>COR NÃO ENCONTRADA</h1>";

    }
    public function report($id){

        $carros = Carros::where('cor_id', $id)->get();

        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('cor.report', compact('carros')));
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream("relatorio-carros.pdf", array("Attachment" => false));
    }

    public function graph(){


        $cores = Cor::with('carros')->orderBy('name')->get();


        $data = [
            ["COR", "NÚMERO DE CARROS"]

        ];
        $cont = 1;
        foreach($cores as $item){
            $data[$cont] = [
                $item->name, count($item->carros)
            ];
            $cont++;
        }
        //dd($data);

        $data = json_encode($data);

            return view('cor.graph', compact(['data']));
    }
}
