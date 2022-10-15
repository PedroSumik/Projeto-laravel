<?php

namespace App\Http\Controllers;

use App\Models\Arquivo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArquivoController extends Controller
{
    public function index($id)
    {
        $arqui = DB::table('arquivos')->where('id', $id)->first();
        $caminho = $arqui->caminho;

        $contador = -1;
        $list_value = [];
        if (($open = fopen(public_path() . '/storage/arquivos/' . $caminho, 'r')) != false) {
            while (($data = fgetcsv($open, null, ',')) != false) {
                $valores[] = $data;
            }
            fclose($open);
        }

        $result = [];
        $result_p = [];
        foreach ($valores as $key => $value) {
            foreach ($value as $k => $v) {
                if ($key == 0) {
                    $list_value[$k] = $v;
                } else {
                    $result_p[$list_value[$k]] = $v;
                }
            }
            $result[] = $result_p;
        }
        // array_splice($result, 0, 1);
        $result[0] = $list_value;

        // foreach ($result as $key => $value) {
        //     echo "<pre>";
        //     print_r($value);    
        // }

        return view('arquivo', ['rows' => $result]);
    }
}
