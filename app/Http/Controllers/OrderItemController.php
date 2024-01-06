<?php

namespace App\Http\Controllers;

use App\Models\OrderItems;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderItemController extends Controller
{
    //
    public function getOrdenesItem(){
        return response()->json(OrderItems::all(),200);
        $users = DB::table('authorizations')->get();
        dd($users);
    }
    public function agregarOrdenItem($data){


        DB::table('order_items')->insert([
            "order_id"=> $data['order_id'],
            "id_detalle"=> $data['id_detalle'],
            "nombre_tabla"=> $data['nombre_tabla']
        ]);

        /* $orden = OrderItems::create($data->all());
        return response($orden,200);
 */
    }
    public function getOrdenItemBsq(Request $request){

        $registros = DB::table('order_items')
            ->where('order_id',$request->order_id)
            // ->where('id_detalle',$request->id_detalle)
            ->where('nombre_tabla',$request->nombre_tabla)
            ->get();
            // echo count($registros);
            return response()->json($registros,200);

    }
    public function getOrdenItemBsq2($id){

        $registros = DB::table('order_items')
            ->where('order_id',$id)
            ->get();
            // echo count($registros);
            return response()->json($registros,200);

    }
    public function getOrdenItemBsqxData($data){

        $registros = DB::table('order_items')
            ->where('order_id',$data['order_id'])
            ->where('nombre_tabla',$data['nombre_tabla'])
            ->get();
           return $registros;//response()->json($registros,200);
    }

    public function getOrdenItemBsqxDataCount($data){
        $registros = DB::table('order_items')
        ->where('order_id',$data['order_id'])
        // ->where('id_detalle',$data->id_detalle)
        ->where('nombre_tabla',$data['nombre_tabla'])
        ->count();

        /* echo '<pre>'; print_r($registros); echo '</pre>';
        echo $registros->count(); */
       return $registros;//response()->json($registros,200);
    }

    public function deleteOrderItems($orderId)
{
    OrderItems::where('order_id', $orderId)->delete();
}

public function duplicate($orderId, $lastInsertId)
{
    $original = OrderItems::where('order_id', $orderId)->get();

    foreach ($original as $item) {
        $duplicate = new OrderItems();
        $attributes = $item->getAttributes();
        if ($attributes['nombre_tabla'] == 'minors') {
            $attributes['id_detalle'] = 1;
        }
        unset($attributes['id']);
        $duplicate->order_id = $lastInsertId;  // Asigna el valor de $lastInsertId al campo order_id

        foreach ($attributes as $key => $value) {

            if ($key == 'order_id') {
                $duplicate->$key = $lastInsertId;
            }else{

                $duplicate->$key = $value;
            }
        }

        $duplicate->save();
    }
}


}
