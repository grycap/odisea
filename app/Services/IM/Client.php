<?php namespace App\Services\IM;
use Illuminate\Support\Facades\Log;
include_once(app_path() . '/Services/IM/im-rest.php');
include_once(app_path() . '/Services/IM/format.php');
class Client
{

    /** Permite verificar las llaves .pem y las ip de las MVs desplegadas
     * @param $id
     * @param $vmid
     * @param $json
     * @return array
     */
    public function detailIM($id, $vmid, $json)
    {
        $response = array();
        $response['error'] = true;
        $res = GetVMInfo(env('IM_HOST'), env('IM_PORT'), $id, $vmid, $json);
        $radl_tokens = parseRADL($res);
        $llave = formatRADL($radl_tokens);
        $ip = formatIPs($radl_tokens);
        $llave = str_replace("\n", "<br>", $llave);
        $response['ip'] = $ip;
        $response['llave'] = $llave;
        return $response;
    }

    /** Listar el avance del despliegue
     * @param $id
     * @param $json
     * @return array
     */
    public function resumeIM($id, $json)
    {
        $response = array();
        $response['error'] = true;
        $res = GetInfrastructureContMsg(env('IM_HOST'), env('IM_PORT'), $id, $json);
        $res = str_replace("\n", "<br>", $res);
        $response['data'] = $res;
        return $response;
    }

    /** Lanzar la infraestructura usando la receta RADL y la autorización en formato Json
     * @param $radl
     * @param $json
     * @return array
     */
    public function create($radl, $json)
    {
        $response = array();
        $response['error'] = true;

        //para realizar pruebas de interfaz
        /*$response['resId'] = "dfd3a988-906f-11e6-a466-300000000002";
        $response['error'] = false;
        $response['status'] = 200;*/

        $res = CreateInfrastructure(env('IM_HOST'), env('IM_PORT'), $radl, $json);
        Log::info("Inicio de Lanzamiento");
        Log::info("Respuesta de lanzamiento de maquina : ".$res);

        if (strpos($res, "Error") === False) {
            $response['resId'] = $res;
            $response['error'] = false;
            $response['status'] = 200;
        }
        return $response;
    }
}    
