<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marca;
use Dompdf\Dompdf;


class MarcaController extends Controller
{

    private $regras = [
            'name' => 'required|max:30|min:2|unique:cores',
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
    /*public function report($id){

        $cursos = Curso::where('eixo_id', $id)->get();

        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('eixo.report', compact('cursos')));
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream("relatorio-horas-turma.pdf", array("Attachment" => false));
    }

    public function graph(){


        $eixos = Eixo::with('curso')->orderBy('name')->get();


        $data = [
            ["EIXO", "NÚMERO DE CURSOS"]
            
        ];
        $cont = 1;
        foreach($eixos as $item){
            $data[$cont] = [
                $item->name, count($item->curso)
            ];
            $cont++;
        }
        //dd($data);

        $data = json_encode($data);
            
            return view('eixo.graph', compact(['data']));
    }*/
}
