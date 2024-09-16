<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cor;
use Dompdf\Dompdf;


class CorController extends Controller
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
        $data = Cor::all();
        return view('cor.index', compact(['data']));
        
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
