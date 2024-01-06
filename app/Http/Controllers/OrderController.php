<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItems;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\PersonalAccessToken;

class OrderController extends Controller
{
    public function getOrdenes(Request $request){

        $token = $request->header('Authorization');

        $personalAccessToken = PersonalAccessToken::where('token', $token)->first();

        $currentTime = time();
        $createdTime = strtotime($personalAccessToken->created_at);

        if ($personalAccessToken && $currentTime - $createdTime < 3600) {
            // Si el token existe, verificamos si ha expirado

                return response()->json(Order::all(), 200);

            } else {

                // El token ya ha expirado, debes devolver un mensaje de error
                return response()->json([
                    'error' => 'Invalid token'
                ], 401);

            }

    }

    public function getOrdenId($id){

        $ordenes = Order::find($id);

        if(is_null($ordenes)){
            return response()->json(['Mensaje'=>'Registro no encontrado'],404);
        }

        return response()->json($ordenes::find($id),200);
    }

    public function agregarOrden(Request $request){

        /* Cargo una nueva solicitud con el menor y el notario */
        $orden = Order::create($request->all());//aca lo creo

        /* realizo la carga de los items */
        /* ============================= */
        //Escribano ->>
        $data = array(
            "order_id"=> Order::latest()->first()->id,
            "id_detalle"=> Order::latest()->first()->notary_id,
            "nombre_tabla"=> "notaries",
        );
        app(OrderItemController::class)->agregarOrdenItem($data);

        //Menor ->
        $data = array(
            "order_id"=> Order::latest()->first()->id,
            "id_detalle"=> Order::latest()->first()->minor_id,
            "nombre_tabla"=> "minors",
        );
        app(OrderItemController::class)->agregarOrdenItem($data);

        //Acompañante 1 ->>
        if($request->acompaneante1_id){
            $data = array(
                "order_id"=> Order::latest()->first()->id,
                "id_detalle"=> $request->acompaneante1_id,
                "nombre_tabla"=> "authorizations",
            );
            // $controlador = new OrderItemController();
            app(OrderItemController::class)->agregarOrdenItem($data);
        }

        //Acompañante 2 ->>
        if($request->acompaneante2_id){
            $data = array(
                "order_id"=> Order::latest()->first()->id,
                "id_detalle"=> $request->acompaneante2_id,
                "nombre_tabla"=> "authorizations",
            );
            // $controlador = new OrderItemController();
            app(OrderItemController::class)->agregarOrdenItem($data);
        }

        foreach ($request->progenitores as $progenitor) {
            $data = [
            'order_id' => Order::latest()->first()->id,
            'id_detalle' => $progenitor,
            'nombre_tabla' => 'other_parents',
            ];
            app(OrderItemController::class)->agregarOrdenItem($data);
        }
        foreach ($request->acompaneantes as $acompaneante) {
            $data = [
            'order_id' => Order::latest()->first()->id,
            'id_detalle' => $acompaneante,
            'nombre_tabla' => 'persons',
            ];
            app(OrderItemController::class)->agregarOrdenItem($data);
        }
       return response($orden,200);

    }
    public function actualizarOrden(Request $request, $id){

        $orden = Order::find($id);

        if(is_null($orden)){

            return response()->json(['Mensaje'=>'Registro no encontrado'],404);

        }
        $orden->update($request->all());
        $orderItemController = app()->make(OrderItemController::class);
        $orderItemController->deleteOrderItems($id);

        /* realizo la carga de los items */
        /* ============================= */
        //Escribano ->>
        $data = array(
            "order_id"=> $orden->id,
            "id_detalle"=> $orden->notary_id,
            "nombre_tabla"=> "notaries",
        );
        app(OrderItemController::class)->agregarOrdenItem($data);

        //Menor ->
        $data = array(
            "order_id"=> $orden->id,
            "id_detalle"=> $orden->minor_id,
            "nombre_tabla"=> "minors",
        );
        app(OrderItemController::class)->agregarOrdenItem($data);

        //Acompañante 1 ->>
        if($request->acompaneante1_id){
            $data = array(
                "order_id"=> $orden->id,
                "id_detalle"=> $request->acompaneante1_id,
                "nombre_tabla"=> "authorizations",
            );
            // $controlador = new OrderItemController();
            app(OrderItemController::class)->agregarOrdenItem($data);
        }

        //Acompañante 2 ->>
        if($request->acompaneante2_id){
            $data = array(
                "order_id"=> $orden->id,
                "id_detalle"=> $request->acompaneante2_id,
                "nombre_tabla"=> "authorizations",
            );
            // $controlador = new OrderItemController();
            app(OrderItemController::class)->agregarOrdenItem($data);
        }

        foreach ($request->progenitores as $progenitor) {
            $data = [
            'order_id' => $orden->id,
            'id_detalle' => $progenitor,
            'nombre_tabla' => 'other_parents',
            ];
            app(OrderItemController::class)->agregarOrdenItem($data);
        }
        foreach ($request->acompaneantes as $acompaneante) {
            $data = [
            'order_id' => $orden->id,
            'id_detalle' => $acompaneante,
            'nombre_tabla' => 'persons',
            ];
            app(OrderItemController::class)->agregarOrdenItem($data);
        }
       return response($orden,200);

    }

    public function eliminarOrden($id){

        $orden = Order::find($id);

        if(is_null($orden)){
            return response()->json(['Mensaje'=>'Registro no encontrado'],404);
        }

        $orden->delete();
        $orderItemController = app()->make(OrderItemController::class);
        $orderItemController->deleteOrderItems($id);
        return response()->json(['mensaje'=>'registro eliminado'],200);
    }

    public function actualizarOrdenAprobacion($data){
        $actualizacion = DB::table('orders')
        ->where('id', $data['id'])
        ->update(['aprobacion' => $data['aprobacion']]);
        if($actualizacion){

            return "ok";
        }
        return "es false";
    }

    public function getOrdenesTodos(Request $request){


                $ordenes = DB::table('orders')
                    ->join('minors',   'orders.minor_id', '=', 'minors.id')
                    ->join('notaries',   'orders.notary_id', '=', 'notaries.id')
                    ->select('orders.*','minors.apellido as apellido','minors.segundo_apellido as segundo_apellido' ,
                    'minors.nombre as nombre','minors.otros_nombres as otros_nombres','minors.numero_de_documento as documento',
                    'notaries.apellido as apellidoescribano','notaries.nombre as nombreescribano' )
                    ->orderBy('id','DESC')
                    ->get();
                return $ordenes;

    }

    public function duplicate($id)
    {
        $original = Order::find($id);

        $duplicate = new Order();
        $attributes = $original->getAttributes();
        unset($attributes['id']);
        $attributes['minor_id'] = 1;
        foreach ($attributes as $key => $value) {
            $duplicate->$key = $value;
        }
        $duplicate->save();
        $lastInsertId = $duplicate->id;  // Obtiene el último ID generado
        $orderItemController = app()->make(OrderItemController::class);
        $orderItemController->duplicate($id,$lastInsertId);
    }
}
