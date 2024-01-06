<?php

namespace App\Http\Controllers;

use App\Models\AccreditationLink;
use App\Models\Authorizations;
use App\Models\AuthorizingRelative;
use App\Models\IssuerDocument;
use App\Models\Minor;
use App\Models\Nationality;
use App\Models\Notary;
use App\Models\Order;
use App\Models\OtherParents;
use App\Models\Persons;
use App\Models\Sex;
use App\Models\TypeDocument;
use DOMDocument;
use Illuminate\Http\Request;
use SoapClient;

class probandoSoap extends Controller
{
    public function solicitar(Request $request){
        // echo $request->id;
        /* aca tenemos que formar la data para hacer el pedido en index */
         probandoSoap::index($request->id);
    }

    public function index($id_solicitud)
    {
        /* iniciando array data[] */
        $data = [];
        /* agregando url a data */
        /* prueba */
        /* $data_url = [
            'location' => 'https://www.dnmservices.gob.ar/wsAutorizacionViajeTest/wsAutorizacionViaje.php?wsdl',
        ]; */
        /* produccion */
        $data_url = [
            'location' =>'https://www.dnmservices.gob.ar/wsAutorizacionViaje/wsAutorizacionViaje.php?wsdl',
        ];
        $data = array_merge($data, $data_url);

        $solicitud = Order::find($id_solicitud);
        /* busco al escribano */
        $escribano = Notary::find($solicitud->notary_id);
        /* busco al menor */
        $menor = Minor::find($solicitud->minor_id);
        $nacionalidad = Nationality::find($menor->nationality_id);
        $tipoDocumento = TypeDocument::find($menor->type_document_id);
        $emisorDni = IssuerDocument::find($menor->issuer_document_id);
        $sexo = Sex::find($menor->sex_id);
        $fecha_nacimiento_menor = _conversionFecha($menor->fecha_de_nacimiento);
        /* agregar al menor al array data[] */
         /* menor */
        $data_menor = [
            'apellidoMenor' => $menor->apellido,
            'segundoApellidoMenor' => $menor->segundo_apellido,
            'nombreMenor' => $menor->nombre,
            'otrosNombresMenor' => $menor->otros_nombres,
            'nacionalidadMenor' => $nacionalidad->codigo,
            'tipoDocumentoMenor' => $tipoDocumento->codigo,
            'emisorDocumentoMenor' => $emisorDni->codigo,
            'numeroDocumentoMenor' => $menor->numero_de_documento,
            'fechaNacimientoMenor' => $fecha_nacimiento_menor,
            'sexoMenor' => $sexo->codigo, //"M",
            'domicilioMenor' => $menor->domicilio
        ];
        $data = array_merge($data, $data_menor);

        /* autorizaciones */
        $data1 = [];
        $data2 = [];
        /* - busqueda en la tabla items - */
        $bsqItem = array(
            "order_id" => $id_solicitud,
            "nombre_tabla" => "authorizations"
        );
        $acomp = app(OrderItemController::class)->getOrdenItemBsqxData($bsqItem);
        foreach ($acomp as $key => $item) {
            // Código a ejecutar en cada iteración del ciclo
            $data2 = [
                "apellidoAutorizante" =>'',
                "apellidoSegundoAutorizante" =>'',
                'nombreAutorizante' =>'',
                'nombreOtrosAutorizante' =>'',
                'nacionalidadAutorizante' =>'',
                'tipoDocumentoAutorizante' =>'',
                'emisorDocumentoAutorizante' =>'',
                'numeroDocumentoAutorizante' =>'',
                'fechaNacimientoAutorizante' =>'',
                'sexoAutorizante' =>'',
                'domicilioAutorizante' =>'',
                'caracterPrimerAutorizante' =>'',
                'acreditaVinculoConAutorizante' =>'',
                'telefonoAutorizante' =>'',
                'requiereAutorizacionAdicional' =>''
            ];
            if ($key === 0) {
               // Estamos en la posición 0
               $acompaniante = Authorizations::find($item->id_detalle);
               $nacionalidadAcompaniante = Nationality::find($acompaniante->nationality_id);
               $tipoDocumentoAcompaniante = TypeDocument::find($acompaniante->type_document_id);
               $emisorDniAcompaniante = IssuerDocument::find($acompaniante->issuer_document_id);
               $fecha_nacimiento_Acompaniante = _conversionFecha($acompaniante->fecha_de_nacimiento);
               $sexoAcompaniante = Sex::find($acompaniante->sex_id);
               $caracterPrimerAuth = AuthorizingRelative::find($acompaniante->authorizing_relatives_id);
               $vinculoAuthorizante = AccreditationLink::find($acompaniante->accreditation_links_id);
               $data1 = [
                   "apellidoAutorizante" => $acompaniante->apellido,
                   "apellidoSegundoAutorizante" => $acompaniante->segundo_apellido,
                   'nombreAutorizante' => $acompaniante->nombre,
                   'nombreOtrosAutorizante' => $acompaniante->otros_nombres, // '',
                   'nacionalidadAutorizante' => $nacionalidadAcompaniante->codigo, // 'ARG',
                   'tipoDocumentoAutorizante' => $tipoDocumentoAcompaniante->codigo, // 'ID',
                   'emisorDocumentoAutorizante' => $emisorDniAcompaniante->codigo, // 'ARG',
                   'numeroDocumentoAutorizante' => $acompaniante->numero_de_documento, // '30531170',
                   'fechaNacimientoAutorizante' => $fecha_nacimiento_Acompaniante, // '26101983',
                   'sexoAutorizante' => $sexoAcompaniante->codigo, // 'F',
                   'domicilioAutorizante' => $acompaniante->domicilio, // 'LAS HERAS 111',
                   'caracterPrimerAutorizante' => $caracterPrimerAuth->codigo, //'2',
                   'acreditaVinculoConAutorizante' => $vinculoAuthorizante->codigo, // '5',
                   'telefonoAutorizante' => $acompaniante->telefono,
                   'requiereAutorizacionAdicional' => 'N'
               ];
            } else {
                // Estamos en la segunda o en alguna posición posterior del array
                $acompaniante = Authorizations::find($item->id_detalle);
                $nacionalidadAcompaniante = Nationality::find($acompaniante->nationality_id);
                $tipoDocumentoAcompaniante = TypeDocument::find($acompaniante->type_document_id);
                $emisorDniAcompaniante = IssuerDocument::find($acompaniante->issuer_document_id);
                $fecha_nacimiento_Acompaniante = _conversionFecha($acompaniante->fecha_de_nacimiento);
                $sexoAcompaniante = Sex::find($acompaniante->sex_id);
                $caracterPrimerAuth = AuthorizingRelative::find($acompaniante->authorizing_relatives_id);
                $vinculoAuthorizante = AccreditationLink::find($acompaniante->accreditation_links_id);
                $data2 = [
                    "apellidoAutorizante" => $acompaniante->apellido,
                    "apellidoSegundoAutorizante" => $acompaniante->segundo_apellido,
                    'nombreAutorizante' => $acompaniante->nombre,
                    'nombreOtrosAutorizante' => $acompaniante->otros_nombres, // '',
                    'nacionalidadAutorizante' => $nacionalidadAcompaniante->codigo, // 'ARG',
                    'tipoDocumentoAutorizante' => $tipoDocumentoAcompaniante->codigo, // 'ID',
                    'emisorDocumentoAutorizante' => $emisorDniAcompaniante->codigo, // 'ARG',
                    'numeroDocumentoAutorizante' => $acompaniante->numero_de_documento, // '30531170',
                    'fechaNacimientoAutorizante' => $fecha_nacimiento_Acompaniante, // '26101983',
                    'sexoAutorizante' => $sexoAcompaniante->codigo, // 'F',
                    'domicilioAutorizante' => $acompaniante->domicilio, // 'LAS HERAS 111',
                    'caracterPrimerAutorizante' => $caracterPrimerAuth->codigo, //'2',
                    'acreditaVinculoConAutorizante' => $vinculoAuthorizante->codigo, // '5',
                    'telefonoAutorizante' => $acompaniante->telefono,
                    'requiereAutorizacionAdicional' => 'N'
                ];
            }
        }
        /* agreganod el array autorizantes */
        $data = array_merge($data, ['autorizantes' => [$data1, $data2]]);



        /* Other Parents */
        /* - busqueda en la tabla items - */
        $bsqItem = array(
            "order_id" => $id_solicitud,
            "nombre_tabla" => "other_parents"
        );

        $arrayProgenitores = app(OrderItemController::class)->getOrdenItemBsqxData($bsqItem);

        $otrosProgenitores = [];
        foreach ($arrayProgenitores as $item) {
           $progenitores = OtherParents::find($item->id_detalle);
           $otrosProgenitores[] = [
            "apellido" => $progenitores->apellido,
            "segundo_apellido" => $progenitores->segundo_apellido,
            "nombre" => $progenitores->nombre,
            "otros_nombres" => $progenitores->otros_nombres,
            "tipo_de_documento" => $progenitores->tipo_de_documento,
            "numero_de_documento" => $progenitores->numero_de_documento
          ];
        }
        /* agregando el array progenitores */
        $data = array_merge($data, ['progenitores' => $otrosProgenitores]);

        /* Personas */
        /* - busqueda en la tabla items - */
        $bsqItem = array(
            "order_id" => $id_solicitud,
            "nombre_tabla" => "persons"
        );

        $arrayPersonas = app(OrderItemController::class)->getOrdenItemBsqxData($bsqItem);
        $otrasPersonas = [];

        foreach ($arrayPersonas as $item) {

            $personas = Persons::find($item->id_detalle);

            $otrasPersonas[] = [
                "apellido" => $personas->apellido,
                "segundo_apellido" => $personas->segundo_apellido,
                "nombre" => $personas->nombre,
                "otros_nombres" => $personas->otros_nombres,
                "tipo_de_documento" => $personas->tipo_de_documento,
                "numero_de_documento" => $personas->numero_de_documento
           ];
        }


        /* agregando el array progenitores */
        $data = array_merge($data, ['personas' => $otrasPersonas]);
            /* Order  */
            $tramite = Order::find($id_solicitud);
            $fecha_del_instrumento_tramite = _conversionFecha($tramite->fecha_del_instrumento);
            $fecha_vigencia_desde_tramite = _conversionFecha($tramite->fecha_vigencia_desde);
            $fecha_vigencia_hasta_tramite = _conversionFecha($tramite->fecha_vigencia_hasta);

            // dd($tramite);
            //  dd($sexoAcompaniante);
            // dd( $acompaniante2->accreditation_links_id );

            $data2 = [

                'viajaSolo' => 'y',
                'distrito' => '3600',
                'matricula' => $escribano->matricula,
                'nombreEscribano' => $escribano->nombre,
                'apellidoEscribano' => $escribano->apellido,

                'numeroActuacionNotarialCertFirma' => $tramite->numero_actuacion_notarial_cert_firma,
                'fechaInstrumento' => $fecha_del_instrumento_tramite, //'22092022',
                'cualquierPais' => $tramite->cualquier_pais, //'y',
                'serieFoja' => $tramite->serie_foja, //'0645065046',
                'tipoFoja' => $tramite->tipo_foja, //'4064654',
                'vigenciaEdad' => $tramite->vigencia_hasta_mayoria_edad, //'y',
                'fechaDesde' => $fecha_vigencia_desde_tramite, //'29092022',
                'fechaHasta' => $fecha_vigencia_hasta_tramite, //'01012024',
                'instrumento' => $tramite->instrumento, //'t',
                'numeroFoja' => $tramite->nro_foja, //'046404',
                'paises' => $tramite->paises_desc, //'brasil, uruguay, europa',

            ];


            $data = array_merge($data, $data2);

            $request = "
    <soapenv:Envelope xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\" xmlns:xsd=\"http://www.w3.org/2001/XMLSchema\" xmlns:soapenv=\"http://schemas.xmlsoap.org/soap/envelope/\" xmlns:urn=\"urn:wsAutorizacionViaje\" xmlns:soapenc=\"http://schemas.xmlsoap.org/soap/encoding/\">
    <soapenv:Header/>
    <soapenv:Body>
       <urn:grabar soapenv:encodingStyle=\"http://schemas.xmlsoap.org/soap/encoding/\">
          <pedido xsi:type=\"urn:Tpedido\">
             <usuario xsi:type=\"xsd:string\">CEFORMOSA</usuario>
             <clave xsi:type=\"xsd:string\">df5b6dd475b3a3cabca16a76e449b5a9</clave>
             <menor xsi:type=\"urn:rmenor\">
                <apellido xsi:type=\"xsd:string\">" . $data['apellidoMenor'] . "</apellido>
                <segundo_apellido xsi:type=\"xsd:string\">" . $data['segundoApellidoMenor'] . "</segundo_apellido>
                <nombre xsi:type=\"xsd:string\">" . $data['nombreMenor'] . "</nombre>
                <otros_nombres xsi:type=\"xsd:string\">" . $data['otrosNombresMenor'] . "</otros_nombres>
                <nacionalidad xsi:type=\"xsd:string\">" . $data['nacionalidadMenor'] . "</nacionalidad>
                <tipo_de_documento xsi:type=\"xsd:string\">" . $data['tipoDocumentoMenor'] . "</tipo_de_documento>
                <emisor_documento xsi:type=\"xsd:string\">" . $data['emisorDocumentoMenor'] . "</emisor_documento>
                <numero_de_documento xsi:type=\"xsd:string\">" . $data['numeroDocumentoMenor'] . "</numero_de_documento>
                <fecha_de_nacimiento xsi:type=\"xsd:string\">" . $data['fechaNacimientoMenor'] . "</fecha_de_nacimiento>
                <Sexo xsi:type=\"xsd:string\">" . $data['sexoMenor'] . "</Sexo>
                <Domicilio xsi:type=\"xsd:string\">" . $data['domicilioMenor'] . "</Domicilio>
             </menor>
             <autorizante_1 xsi:type=\"urn:rautorizante\">
                <apellido xsi:type=\"xsd:string\">" . $data['autorizantes'][0]['apellidoAutorizante'] . "</apellido>
                <segundo_apellido xsi:type=\"xsd:string\">" . $data['autorizantes'][0]['apellidoSegundoAutorizante'] . "</segundo_apellido>
                <nombre xsi:type=\"xsd:string\">" . $data['autorizantes'][0]['nombreAutorizante'] . "</nombre>
                <otros_nombres xsi:type=\"xsd:string\">" . $data['autorizantes'][0]['nombreOtrosAutorizante'] . "</otros_nombres>
                <nacionalidad xsi:type=\"xsd:string\">" . $data['autorizantes'][0]['nacionalidadAutorizante'] . "</nacionalidad>
                <tipo_de_documento xsi:type=\"xsd:string\">" . $data['autorizantes'][0]['tipoDocumentoAutorizante'] . "</tipo_de_documento>
                <emisor_documento xsi:type=\"xsd:string\">" . $data['autorizantes'][0]['emisorDocumentoAutorizante'] . "</emisor_documento>
                <numero_de_documento xsi:type=\"xsd:string\">" . $data['autorizantes'][0]['numeroDocumentoAutorizante'] . "</numero_de_documento>
                <fecha_de_nacimiento xsi:type=\"xsd:string\">" . $data['autorizantes'][0]['fechaNacimientoAutorizante'] . "</fecha_de_nacimiento>
                <sexo xsi:type=\"xsd:string\">" . $data['autorizantes'][0]['sexoAutorizante'] . "</sexo>
                <domicilio xsi:type=\"xsd:string\">" . $data['autorizantes'][0]['domicilioAutorizante'] . "</domicilio>
                <caracter_primer_autorizante xsi:type=\"xsd:string\">" . $data['autorizantes'][0]['caracterPrimerAutorizante'] . "</caracter_primer_autorizante>
                <acredita_vinculo_con xsi:type=\"xsd:string\">" . $data['autorizantes'][0]['acreditaVinculoConAutorizante'] . "</acredita_vinculo_con>
                <telefono xsi:type=\"xsd:string\">" . $data['autorizantes'][0]['telefonoAutorizante'] . "</telefono>
                <requiere_aut_adicional_de xsi:type=\"xsd:string\">" . $data['autorizantes'][0]['requiereAutorizacionAdicional'] . "</requiere_aut_adicional_de>
                </autorizante_1>
                <autorizante_2 xsi:type=\"urn:rautorizante\">
                <apellido xsi:type=\"xsd:string\">" . $data['autorizantes'][1]['apellidoAutorizante'] . "</apellido>
                <segundo_apellido xsi:type=\"xsd:string\">" . $data['autorizantes'][1]['apellidoSegundoAutorizante'] . "</segundo_apellido>
                <nombre xsi:type=\"xsd:string\">" . $data['autorizantes'][1]['nombreAutorizante'] . "</nombre>
                <otros_nombres xsi:type=\"xsd:string\">" . $data['autorizantes'][1]['nombreOtrosAutorizante'] . "</otros_nombres>
                <nacionalidad xsi:type=\"xsd:string\">" . $data['autorizantes'][1]['nacionalidadAutorizante'] . "</nacionalidad>
                <tipo_de_documento xsi:type=\"xsd:string\">" . $data['autorizantes'][1]['tipoDocumentoAutorizante'] . "</tipo_de_documento>
                <emisor_documento xsi:type=\"xsd:string\">" . $data['autorizantes'][1]['emisorDocumentoAutorizante'] . "</emisor_documento>
                <numero_de_documento xsi:type=\"xsd:string\">" . $data['autorizantes'][1]['numeroDocumentoAutorizante'] . "</numero_de_documento>
                <fecha_de_nacimiento xsi:type=\"xsd:string\">" . $data['autorizantes'][1]['fechaNacimientoAutorizante'] . "</fecha_de_nacimiento>
                <sexo xsi:type=\"xsd:string\">" . $data['autorizantes'][1]['sexoAutorizante'] . "</sexo>
                <domicilio xsi:type=\"xsd:string\">" . $data['autorizantes'][1]['domicilioAutorizante'] . "</domicilio>
                <caracter_primer_autorizante xsi:type=\"xsd:string\">" . $data['autorizantes'][1]['caracterPrimerAutorizante'] . "</caracter_primer_autorizante>
                <acredita_vinculo_con xsi:type=\"xsd:string\">" . $data['autorizantes'][1]['acreditaVinculoConAutorizante'] . "</acredita_vinculo_con>
                <telefono xsi:type=\"xsd:string\">" . $data['autorizantes'][1]['telefonoAutorizante'] . "</telefono>
                <requiere_aut_adicional_de xsi:type=\"xsd:string\">" . $data['autorizantes'][1]['requiereAutorizacionAdicional'] . "</requiere_aut_adicional_de>
             </autorizante_2>
             <acompanante xsi:type=\"urn:racompanante\">
                <otros_progenitores xsi:type=\"urn:personas_varias\" soapenc:arrayType=\"urn:rpersonas[" . count($data['progenitores']) . "]\">";
                foreach ($data['progenitores'] as $progenitor) {
                $request .= "
                    <item>
                        <apellido xsi:type=\"xsd:string\">" . $progenitor['apellido'] . "</apellido>
                        <segundo_apellido xsi:type=\"xsd:string\">" . $progenitor['segundo_apellido'] . "</segundo_apellido>
                        <nombre xsi:type=\"xsd:string\">" . $progenitor['nombre'] . "</nombre>
                        <otros_nombres xsi:type=\"xsd:string\">" . $progenitor['otros_nombres'] . "</otros_nombres>
                        <tipo_de_documento xsi:type=\"xsd:string\">" . $progenitor['tipo_de_documento'] . "</tipo_de_documento>
                        <numero_de_documento xsi:type=\"xsd:string\">" . $progenitor['numero_de_documento'] . "</numero_de_documento>
                    </item>";
              }
              $request .= "
                </otros_progenitores>
                <terceros xsi:type=\"urn:personas_varias\" soapenc:arrayType=\"urn:rpersonas[" . count($data['progenitores']) . "]\">";
                foreach ($data['personas'] as $personas) {
                    $request .= "
                        <item>
                            <apellido xsi:type=\"xsd:string\">" . $personas['apellido'] . "</apellido>
                            <segundo_apellido xsi:type=\"xsd:string\">" . $personas['segundo_apellido'] . "</segundo_apellido>
                            <nombre xsi:type=\"xsd:string\">" . $personas['nombre'] . "</nombre>
                            <otros_nombres xsi:type=\"xsd:string\">" . $personas['otros_nombres'] . "</otros_nombres>
                            <tipo_de_documento xsi:type=\"xsd:string\">" . $personas['tipo_de_documento'] . "</tipo_de_documento>
                            <numero_de_documento xsi:type=\"xsd:string\">" . $personas['numero_de_documento'] . "</numero_de_documento>
                        </item>";
                  }
                $request .= "
                </terceros>
                <viaja_solo xsi:type=\"xsd:boolean\">" . $data['viajaSolo'] . "</viaja_solo>

             </acompanante>

             <datos_tramite xsi:type=\"urn:rdatos_tramite\">
                <distrito xsi:type=\"xsd:string\">" . $data['distrito'] . "</distrito>
                <matricula xsi:type=\"xsd:string\">" . $data['matricula'] . "</matricula>
                <nombres_escribano xsi:type=\"xsd:string\">" . $data['nombreEscribano'] . "</nombres_escribano>
                <apellidos_escribano xsi:type=\"xsd:string\">" . $data['apellidoEscribano'] . "</apellidos_escribano>
                <numero_actuacion_notarial_cert_firma xsi:type=\"xsd:string\">" . $data['numeroActuacionNotarialCertFirma'] . "</numero_actuacion_notarial_cert_firma>
                <fecha_del_instrumento xsi:type=\"xsd:string\">" . $data['fechaInstrumento'] . "</fecha_del_instrumento>
                <cualquier_pais xsi:type=\"xsd:boolean\">" . $data['cualquierPais'] . "</cualquier_pais>
                <serie_foja xsi:type=\"xsd:string\">" . $data['serieFoja'] . "</serie_foja>
                <tipo_foja xsi:type=\"xsd:string\">" . $data['tipoFoja'] . "</tipo_foja>
                <vigencia_hasta_mayoria_edad xsi:type=\"xsd:boolean\">" . $data['vigenciaEdad'] . "</vigencia_hasta_mayoria_edad>
                <fecha_vigencia_desde xsi:type=\"xsd:string\">" . $data['fechaDesde'] . "</fecha_vigencia_desde>
                <fecha_vigencia_hasta xsi:type=\"xsd:string\">" . $data['fechaHasta'] . "</fecha_vigencia_hasta>
                <instrumento xsi:type=\"xsd:string\">" . $data['instrumento'] . "</instrumento>
                <nro_foja xsi:type=\"xsd:string\">" . $data['numeroFoja'] . "</nro_foja>
                <paises_desc xsi:type=\"xsd:string\">" . $data['paises'] . "</paises_desc>
             </datos_tramite>

          </pedido>
       </urn:grabar>
    </soapenv:Body>
 </soapenv:Envelope>
";
            // print("REQUES: <br>");
// print("<pre>".htmlentities($request)."<pre>");

            $action = "InsertCategoriaService";
            $headers = [
                'Method: POST',
                'Connection: Keep-Alive',
                'User-Agent: PHP-SOAP-CURL',
                'Content-Type: text/xml; charset=utf-8',
                'SOAPAction: InsertCategoriaService',
            ];

            //Segun Documentacion

            //SEGUN dOCUMENTACIÓN
            $ch = curl_init($data['location']);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
            curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect:'));
            $response = curl_exec($ch);
            $err_status = curl_errno($ch);

            libxml_use_internal_errors(true);
            // print("RESPUESTA: <br>");

            //  print("<pre>".htmlentities($response)."<pre>");
            $doc = new DOMDocument();
            $doc->loadXML($response);



            // echo $doc->getElementsByTagName('numero_autorizacion');
/* aqui esta la respuesta que debe dar */

            //  falseDatos del menor invalidos-1
//true108077


            if (substr($doc->textContent, 4) == true) {


                $data = array(
                    "id" => $id_solicitud,
                    "aprobacion" => substr($doc->textContent, 4)
                );
                app(OrderController::class)->actualizarOrdenAprobacion($data);
                return "ok";
            } else {
                return "error " + $doc->textContent;
            }

            // dd($response);

            // $controlador = new OrderItemController();


            /* $data = array(
            "id"=> 1,
            "order_id"=> 1,
            "id_detalle"=> 1,
            "nombre_tabla"=> "authorizations",
            "aprobacion"=> substr($doc->textContent,4)
            ); */
            // app(OrderItemController::class)->agregarOrdenItem($data );

        }

    public function modificar($id_solicitud)
    {

        $solicitud = Order::find($id_solicitud);

        $escribano = Notary::find($solicitud->notary_id);
        $menor = Minor::find($solicitud->minor_id);

        $nacionalidad  = Nationality::find($menor->nationality_id);
        $tipoDocumento = TypeDocument::find($menor->type_document_id);
        $emisorDni = IssuerDocument::find($menor->issuer_document_id);
        $sexo = Sex::find($menor->sex_id);
        $fecha_nacimiento_menor = _conversionFecha($menor->fecha_de_nacimiento);

        /* - busqueda en la tabla items - */
        $bsqItem = array(
            "order_id"=> $id_solicitud,
            "id_detalle"=> 2,
            "nombre_tabla"=> "authorizations"
        );

        $acomp =  app(OrderItemController::class)->getOrdenItemBsqxData($bsqItem);

        $acompaniante1 = Authorizations::find($acomp->first()->id_detalle);
        $nacionalidadAcompaniante1  = Nationality::find($acompaniante1->nationality_id);
        $tipoDocumentoAcompaniante1 = TypeDocument::find($acompaniante1->type_document_id);
        $emisorDniAcompaniante1 = IssuerDocument::find($acompaniante1->issuer_document_id);

        $fecha_nacimiento_Acompaniante1 = _conversionFecha($acompaniante1->fecha_de_nacimiento);
        $sexoAcompaniante1 = Sex::find($acompaniante1->sex_id);
        $caracterPrimerAuth1 = AuthorizingRelative::find($acompaniante1->authorizing_relatives_id);
        $vinculoAuthorizante1 = AccreditationLink::find($acompaniante1->accreditation_links_id);
        if($acomp->last()->id == $acomp->first()->id){

            $acompaniante2 = Authorizations::find($acomp->last()->id_detalle);
             $nacionalidadAcompaniante2  = Nationality::find($acompaniante2->nationality_id);
             $tipoDocumentoAcompaniante2 = TypeDocument::find($acompaniante2->type_document_id);
             $emisorDniAcompaniante2 = IssuerDocument::find($acompaniante2->issuer_document_id);
             $fecha_nacimiento_Acompaniante2 = _conversionFecha($acompaniante2->fecha_de_nacimiento);
             $sexoAcompaniante2 = Sex::find($acompaniante2->sex_id);
             $caracterPrimerAuth2 = AuthorizingRelative::find($acompaniante2->authorizing_relatives_id);
             $vinculoAuthorizante2 = AccreditationLink::find($acompaniante2->accreditation_links_id);

        }else{
             $acompaniante2 = Authorizations::find($acomp->last()->id_detalle);
             $nacionalidadAcompaniante2  = Nationality::find($acompaniante2->nationality_id);
             $tipoDocumentoAcompaniante2 = TypeDocument::find($acompaniante2->type_document_id);
             $emisorDniAcompaniante2 = IssuerDocument::find($acompaniante2->issuer_document_id);
             $fecha_nacimiento_Acompaniante2 = _conversionFecha($acompaniante2->fecha_de_nacimiento);
             $sexoAcompaniante2 = Sex::find($acompaniante2->sex_id);
             $caracterPrimerAuth2 = AuthorizingRelative::find($acompaniante2->authorizing_relatives_id);
             $vinculoAuthorizante2 = AccreditationLink::find($acompaniante2->accreditation_links_id);
        }





        /* Other Parents */
         /* - busqueda en la tabla items - */
         $bsqItem = array(
            "order_id"=> $id_solicitud,
            "id_detalle"=> 2,
            "nombre_tabla"=> "other_parents"
        );

        $otrosParientes =  app(OrderItemController::class)->getOrdenItemBsqxData($bsqItem);
        $progenitores = OtherParents::find($otrosParientes->first()->id_detalle);
        $type_document_id_progenitor=TypeDocument::find($progenitores->type_document_id);
        /* Order  */
        $tramite = Order::find($id_solicitud);
        $fecha_del_instrumento_tramite = _conversionFecha($tramite->fecha_del_instrumento);
        $fecha_vigencia_desde_tramite = _conversionFecha($tramite->fecha_vigencia_desde);
        $fecha_vigencia_hasta_tramite = _conversionFecha($tramite->fecha_vigencia_hasta);

        // dd($tramite);
        //  dd($sexoAcompaniante);
        // dd( $acompaniante2->accreditation_links_id );
        $data = [
            'location'=>'https://www.dnmservices.gob.ar/wsAutorizacionViajeTest/wsAutorizacionViaje.php?wsdl',
            /* menor */
            'apellidoMenor' =>$menor->apellido, // 'BAEZ',
            'segundoApellidoMenor'=>$menor->segundo_apellido,//''
            'nombreMenor'=>$menor->nombre,//'MISAEL',
            'otrosNombresMenor'=>$menor->otros_nombres,//'SAMUEL',
            'nacionalidadMenor'=>$nacionalidad->codigo,//'ARG',
            'tipoDocumentoMenor'=>$tipoDocumento->codigo,//'ID',
            'emisorDocumentoMenor'=>$emisorDni->codigo,//'ARG',
            'numeroDocumentoMenor'=>$menor->numero_de_documento,//'45662132',
            'fechaNacimientoMenor'=> $fecha_nacimiento_menor ,//'22062016',
            'sexoMenor' =>  $sexo->codigo,//"M",
            'domicilioMenor' => $menor->domicilio,//"Parque urbano 1 mz 82 c2",
            /* AUTORIZANTE 1 */
            'apellidoAutorizante1'=>$acompaniante1->apellido,//'GONZALEZ',
            'apellidoSegundoAutorizante1'=>$acompaniante1->segundo_apellido,
            'nombreAutorizante1'=>$acompaniante1->nombre,// 'NOELIA',
            'nombreOtrosAutorizante1'=>$acompaniante1->otros_nombres,// '',
            'nacionalidadAutorizante1' =>$nacionalidadAcompaniante1->codigo,// 'ARG',
            'tipoDocumentoAutorizante1' =>$tipoDocumentoAcompaniante1->codigo,// 'ID',
            'emisorDocumentoAutorizante1' =>$emisorDniAcompaniante1->codigo,// 'ARG',
            'numeroDocumentoAutorizante1' =>$acompaniante1->numero_de_documento,// '30531170',
            'fechaNacimientoAutorizante1' =>$fecha_nacimiento_Acompaniante1,// '26101983',
            'sexoAutorizante1' =>$sexoAcompaniante1->codigo,// 'F',
            'domicilioAutorizante1' =>$acompaniante1->domicilio,// 'LAS HERAS 111',
            'caracterPrimerAutorizante1' => $caracterPrimerAuth1->codigo,//'2',
            'acreditaVinculoConAutorizante1' =>$vinculoAuthorizante1->codigo,// '5',
            'telefonoAutorizante1' => $acompaniante1->telefono,//'543704660160',
            'requiereAutorizacionAdicional1' => 'N',
             /* AUTORIZANTE 2 */
            'apellidoAutorizante2' => $acompaniante2->apellido,//'BERNARDO',
            'apellidoSegundoAutorizante2' => $acompaniante2->segundo_apellido,//'',
            'nombreAutorizante2' => $acompaniante2->nombre,//'ARIEL',
            'nombreOtrosAutorizante2' => $acompaniante2->otros_nombres,//'',
            'nacionalidadAutorizante2' => $nacionalidadAcompaniante2->codigo,//'ARG',
            'tipoDocumentoAutorizante2' => $tipoDocumentoAcompaniante2->codigo,//'ID',
            'emisorDocumentoAutorizante2' => $emisorDniAcompaniante2->codigo,//'ARG',
            'numeroDocumentoAutorizante2' =>$acompaniante2->numero_de_documento,// '24159131',
            'fechaNacimientoAutorizante2' =>$fecha_nacimiento_Acompaniante2,// '26081974',
            'sexoAutorizante2' => $sexoAcompaniante2->codigo,//'M',
            'domicilioAutorizante2' => $acompaniante2->domicilio,//'COLONIAS UNIDAD',
            'caracterPrimerAutorizante2' => $caracterPrimerAuth2->codigo,//'3',
            'acreditaVinculoConAutorizante2' => $vinculoAuthorizante2->codigo,//'4',
            'telefonoAutorizante2' =>$acompaniante2->telefono,// '3704299434',
            'requiereAutorizacionAdicional2' => 'N',
            /*  */
            'viajaSolo' =>'y',
            'distrito' =>'3600',
            'matricula' =>$escribano->matricula,
            'nombreEscribano' =>$escribano->nombre,
            'apellidoEscribano' =>$escribano->apellido,

            'numeroActuacionNotarialCertFirma' =>$tramite->numero_actuacion_notarial_cert_firma,
            'fechaInstrumento' =>$fecha_del_instrumento_tramite,//'22092022',
            'cualquierPais' =>$tramite->cualquier_pais,//'y',
            'serieFoja' =>$tramite->serie_foja,//'0645065046',
            'tipoFoja' =>$tramite->tipo_foja,//'4064654',
            'vigenciaEdad' =>$tramite->vigencia_hasta_mayoria_edad,//'y',
            'fechaDesde' =>$fecha_vigencia_desde_tramite,//'29092022',
            'fechaHasta' =>$fecha_vigencia_hasta_tramite,//'01012024',
            'instrumento' =>$tramite->instrumento,//'t',
            'numeroFoja' =>$tramite->nro_foja,//'046404',
            'paises' =>$tramite->paises_desc,//'brasil, uruguay, europa',
            'apellidoOtroProgenidor' =>$progenitores->apellido,//'juarez',
            'segundoOtroProgenidor' =>$progenitores->segundo_apellido,//'',
            'nombreOtroProgenidor' =>$progenitores->nombre,//'gabriel',
            'otrosNombreOtroProgenidor' =>$progenitores->otros_nombres,//'leonardo',
            'tipoDocumentoOtroProgenidor' =>$type_document_id_progenitor->codigo,//'ID',
            'numeroDocumentoOtroProgenidor' =>$progenitores->numero_de_documento,//'30155131',
        ];




    $request ="
    <soapenv:Envelope xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\"
    xmlns:xsd=\"http://www.w3.org/2001/XMLSchema\"
    xmlns:soapenv=\"http://schemas.xmlsoap.org/soap/envelope/\"
    xmlns:urn=\"urn:wsAutorizacionViaje\"
     xmlns:soapenc=\"http://schemas.xmlsoap.org/soap/encoding/\">
    <soapenv:Header/>
    <soapenv:Body>
       <urn:grabar soapenv:encodingStyle=\"http://schemas.xmlsoap.org/soap/encoding/\">
          <pedido xsi:type=\"urn:Tpedido\">
             <usuario xsi:type=\"xsd:string\">CEFORMOSA</usuario>
             <clave xsi:type=\"xsd:string\">df5b6dd475b3a3cabca16a76e449b5a9</clave>
             <menor xsi:type=\"urn:rmenor\">
                <apellido xsi:type=\"xsd:string\">".$data['apellidoMenor']."</apellido>
                <segundo_apellido xsi:type=\"xsd:string\">".$data['segundoApellidoMenor']."</segundo_apellido>
                <nombre xsi:type=\"xsd:string\">".$data['nombreMenor']."</nombre>
                <otros_nombres xsi:type=\"xsd:string\">".$data['otrosNombresMenor']."</otros_nombres>
                <nacionalidad xsi:type=\"xsd:string\">".$data['nacionalidadMenor']."</nacionalidad>
                <tipo_de_documento xsi:type=\"xsd:string\">".$data['tipoDocumentoMenor']."</tipo_de_documento>
                <emisor_documento xsi:type=\"xsd:string\">".$data['emisorDocumentoMenor']."</emisor_documento>
                <numero_de_documento xsi:type=\"xsd:string\">".$data['numeroDocumentoMenor']."</numero_de_documento>
                <fecha_de_nacimiento xsi:type=\"xsd:string\">".$data['fechaNacimientoMenor']."</fecha_de_nacimiento>
                <Sexo xsi:type=\"xsd:string\">".$data['sexoMenor']."</Sexo>
                <Domicilio xsi:type=\"xsd:string\">".$data['domicilioMenor']."</Domicilio>
             </menor>
             <autorizante_1 xsi:type=\"urn:rautorizante\">
                <apellido xsi:type=\"xsd:string\">".$data['apellidoAutorizante1']."</apellido>
                <segundo_apellido xsi:type=\"xsd:string\">".$data['apellidoSegundoAutorizante1']."</segundo_apellido>
                <nombre xsi:type=\"xsd:string\">".$data['nombreAutorizante1']."</nombre>
                <otros_nombres xsi:type=\"xsd:string\">".$data['nombreOtrosAutorizante1']."</otros_nombres>
                <nacionalidad xsi:type=\"xsd:string\">".$data['nacionalidadAutorizante1']."</nacionalidad>
                <tipo_de_documento xsi:type=\"xsd:string\">".$data['tipoDocumentoAutorizante1']."</tipo_de_documento>
                <emisor_documento xsi:type=\"xsd:string\">".$data['emisorDocumentoAutorizante1']."</emisor_documento>
                <numero_de_documento xsi:type=\"xsd:string\">".$data['numeroDocumentoAutorizante1']."</numero_de_documento>
                <fecha_de_nacimiento xsi:type=\"xsd:string\">".$data['fechaNacimientoAutorizante1']."</fecha_de_nacimiento>
                <sexo xsi:type=\"xsd:string\">".$data['sexoAutorizante1']."</sexo>
                <domicilio xsi:type=\"xsd:string\">".$data['domicilioAutorizante1']."</domicilio>
                <caracter_primer_autorizante xsi:type=\"xsd:string\">".$data['caracterPrimerAutorizante1']."</caracter_primer_autorizante>
                <acredita_vinculo_con xsi:type=\"xsd:string\">".$data['acreditaVinculoConAutorizante1']."</acredita_vinculo_con>
                <telefono xsi:type=\"xsd:string\">".$data['telefonoAutorizante1']."</telefono>
                <requiere_aut_adicional_de xsi:type=\"xsd:string\">".$data['requiereAutorizacionAdicional1']."</requiere_aut_adicional_de>
                </autorizante_1>
                <autorizante_2 xsi:type=\"urn:rautorizante\">
                <apellido xsi:type=\"xsd:string\">".$data['apellidoAutorizante2']."</apellido>
                <segundo_apellido xsi:type=\"xsd:string\">".$data['apellidoSegundoAutorizante2']."</segundo_apellido>
                <nombre xsi:type=\"xsd:string\">".$data['nombreAutorizante2']."</nombre>
                <otros_nombres xsi:type=\"xsd:string\">".$data['nombreOtrosAutorizante2']."</otros_nombres>
                <nacionalidad xsi:type=\"xsd:string\">".$data['nacionalidadAutorizante2']."</nacionalidad>
                <tipo_de_documento xsi:type=\"xsd:string\">".$data['tipoDocumentoAutorizante2']."</tipo_de_documento>
                <emisor_documento xsi:type=\"xsd:string\">".$data['emisorDocumentoAutorizante2']."</emisor_documento>
                <numero_de_documento xsi:type=\"xsd:string\">".$data['numeroDocumentoAutorizante2']."</numero_de_documento>
                <fecha_de_nacimiento xsi:type=\"xsd:string\">".$data['fechaNacimientoAutorizante2']."</fecha_de_nacimiento>
                <sexo xsi:type=\"xsd:string\">".$data['sexoAutorizante2']."</sexo>
                <domicilio xsi:type=\"xsd:string\">".$data['domicilioAutorizante2']."</domicilio>
                <caracter_primer_autorizante xsi:type=\"xsd:string\">".$data['caracterPrimerAutorizante2']."</caracter_primer_autorizante>
                <acredita_vinculo_con xsi:type=\"xsd:string\">".$data['acreditaVinculoConAutorizante2']."</acredita_vinculo_con>
                <telefono xsi:type=\"xsd:string\">".$data['telefonoAutorizante2']."</telefono>
                <requiere_aut_adicional_de xsi:type=\"xsd:string\">".$data['requiereAutorizacionAdicional2']."</requiere_aut_adicional_de>
             </autorizante_2>
             <acompanante xsi:type=\"urn:racompanante\">

               <otros_progenitores xsi:type=\"urn:personas_varias\" soapenc:arrayType=\"urn:rpersonas[]\">
                  <item>
                     <apellido xsi:type=\"xsd:string\">".$data['apellidoOtroProgenidor']."</apellido>
                     <segundo_apellido xsi:type=\"xsd:string\">".$data['segundoOtroProgenidor']."</segundo_apellido>
                     <nombre xsi:type=\"xsd:string\">".$data['nombreOtroProgenidor']."</nombre>
                     <otros_nombres xsi:type=\"xsd:string\">".$data['otrosNombreOtroProgenidor']."</otros_nombres>
                     <tipo_de_documento xsi:type=\"xsd:string\">".$data['tipoDocumentoOtroProgenidor']."</tipo_de_documento>
                     <numero_de_documento xsi:type=\"xsd:string\">".$data['numeroDocumentoOtroProgenidor']."</numero_de_documento>
                  </item>

                </otros_progenitores>

                <terceros xsi:type=\"urn:personas_varias\" soapenc:arrayType=\"urn:rpersonas[]\">

                </terceros>
                <viaja_solo xsi:type=\"xsd:boolean\">".$data['viajaSolo']."</viaja_solo>

             </acompanante>

             <datos_tramite xsi:type=\"urn:rdatos_tramite\">
                <distrito xsi:type=\"xsd:string\">".$data['distrito']."</distrito>
                <matricula xsi:type=\"xsd:string\">".$data['matricula']."</matricula>
                <nombres_escribano xsi:type=\"xsd:string\">".$data['nombreEscribano']."</nombres_escribano>
                <apellidos_escribano xsi:type=\"xsd:string\">".$data['apellidoEscribano']."</apellidos_escribano>
                <numero_actuacion_notarial_cert_firma xsi:type=\"xsd:string\">".$data['numeroActuacionNotarialCertFirma']."</numero_actuacion_notarial_cert_firma>
                <fecha_del_instrumento xsi:type=\"xsd:string\">".$data['fechaInstrumento']."</fecha_del_instrumento>
                <cualquier_pais xsi:type=\"xsd:boolean\">".$data['cualquierPais']."</cualquier_pais>
                <serie_foja xsi:type=\"xsd:string\">".$data['serieFoja']."</serie_foja>
                <tipo_foja xsi:type=\"xsd:string\">".$data['tipoFoja']."</tipo_foja>
                <vigencia_hasta_mayoria_edad xsi:type=\"xsd:boolean\">".$data['vigenciaEdad']."</vigencia_hasta_mayoria_edad>
                <fecha_vigencia_desde xsi:type=\"xsd:string\">".$data['fechaDesde']."</fecha_vigencia_desde>
                <fecha_vigencia_hasta xsi:type=\"xsd:string\">".$data['fechaHasta']."</fecha_vigencia_hasta>
                <instrumento xsi:type=\"xsd:string\">".$data['instrumento']."</instrumento>
                <nro_foja xsi:type=\"xsd:string\">".$data['numeroFoja']."</nro_foja>
                <paises_desc xsi:type=\"xsd:string\">".$data['paises']."</paises_desc>
             </datos_tramite>
             <solicitud xsi:type=\"urn:TNumeroSolicitud\">
                <numero_solicitud xsi:type=\"xsd:int\">".$solicitud->aprobacion."</numero_solicitud>
             </solicitud>

          </pedido>
       </urn:grabar>
    </soapenv:Body>
 </soapenv:Envelope>
";
// print("REQUES: <br>");
// print("<pre>".htmlentities($request)."<pre>");

$action = "InsertCategoriaService";
$headers = [
    'Method: POST',
    'Connection: Keep-Alive',
    'User-Agent: PHP-SOAP-CURL',
    'Content-Type: text/xml; charset=utf-8',
    'SOAPAction: InsertCategoriaService',
];

//Segun Documentacion

//SEGUN dOCUMENTACIÓN
$ch = curl_init($data['location']);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);

$response = curl_exec($ch);
$err_status= curl_errno($ch);

libxml_use_internal_errors(true);
// print("RESPUESTA: <br>");

//  print("<pre>".htmlentities($response)."<pre>");
 $doc = new DOMDocument();
 $doc->loadXML($response);
//  echo '<pre>'; print_r(substr($doc->textContent,4)); echo '</pre>';


// echo $doc->getElementsByTagName('numero_autorizacion');
/* aqui esta la respuesta que debe dar */

//  falseDatos del menor invalidos-1
//true108077
if(substr($doc->textContent,4)==true){
    $data = array(
        "id"=> $id_solicitud,
        "aprobacion"=> substr($doc->textContent,4)
    );
    app(OrderController::class)->actualizarOrdenAprobacion($data);
    return "ok";
}else{
    return "error "+$doc->textContent;
}

// dd($response);

    // $controlador = new OrderItemController();


    /* $data = array(
        "id"=> 1,
        "order_id"=> 1,
        "id_detalle"=> 1,
        "nombre_tabla"=> "authorizations",
        "aprobacion"=> substr($doc->textContent,4)
    ); */
    // app(OrderItemController::class)->agregarOrdenItem($data );

    }
}

