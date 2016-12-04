<?php
namespace App\Http\Controllers\Desplegador;

use App\Http\Controllers\Controller;
use App\Models\Radls;
use App\Models\Recipes;
use App\Services\Desplegador\Configure;
use App\Services\IM\Client;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Redirect;
use Input;
use Validator;
use Auth;
use Session;

class DespliegueController extends Controller
{
    /** Vista Index
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        return view('desplegador.index');
    }

    /** Vista configuración para el despliegue
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function configuration(Request $request)
    {
        return view('desplegador.configuration');
    }

    /** Vista para ver como se organizan los directorios de los proyectos
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function jenkins(Request $request)
    {
        return view('desplegador.jenkins');
    }

    /** Genera receta y lanza la infraestructura
     * @param Request $request
     * @return array
     */
    public function deploy(Request $request)
    {
        $configure = new Configure();
        $radl = Recipes::where('id', $configure->countMachine($request))->first();
        $recipe = $radl->radl;

        $configure->accountCloud($request);
        $dataPuertos  = $configure->parsePort($request->input('ipPublica'),"22,80,8089,3389,9000",$request->input('puertosNew'));
        $port = $configure->puertosIp($dataPuertos);

        $dataInstance = $configure->parseMachine($request->input('zone'),$request->input('center'),$request);
        $instance = $configure->configInstance($dataInstance,$request);

        $account = $configure->account($request);
        $accountJson = $configure->accountJson($request);
        $repository = $configure->accountRepository($request);

        $accountStudent = $configure->accountStudent($request);
        $accountProyectStudent = $configure->accountRepositoryClone($request);

        $replace = str_replace('@puertos@', $port, $recipe);
        $replace = str_replace('@configuracion@', $instance, $replace);
        $replace = str_replace('@cuentas@', $account, $replace);
        $replace = str_replace('@cuentasGit@', $repository, $replace);
        $replace = str_replace('@cuentasUsuarioJson@', $accountJson, $replace);
        $replace = str_replace('@countStudent@', $request->input('studentMachine'), $replace);
        $replace = str_replace('@cuentasUsuarioProyect@', $accountProyectStudent, $replace);

        $clientIM = new Client();
        $account = json_encode(array("username"=>Session::get('username'), "password"=>Session::get('password')));
        $res = $clientIM->create($replace,$account);

        $response = array();
        $response['error'] = false;
        $response['status'] = $res['status'];
        $response['id'] = $res['resId'];

        $newRadl = new Radls();
        $newRadl->imuser = "website";
        $newRadl->id_recipe = $radl->id;
        $newRadl->name = $radl->name;
        $newRadl->description = $radl->description;
        $newRadl->radl = $replace;
        $newRadl->central = json_encode(array("username"=>$request->input('usernameCentral'), "password"=>$request->input('passwordCentral')));
        $newRadl->student = $accountStudent;
        $newRadl->id_deploy = $response['id'];
        $newRadl->response = serialize($res);
        $newRadl->type = 0;
        $newRadl->language = $request->input('language');
        $newRadl->count_central = 1;
        $newRadl->count_student = $request->input('studentMachine');

        if (!$newRadl->save()) {
            Log::info("Fallo al guardar la receta en mysql");
        }
        return $response;
    }

    /** Petición Ajax del seguimiento del despliegue
     * @param Request $request
     * @param $id
     * @return array
     */
    public function message(Request $request, $id)
    {
        $response = array();
        $response['error'] = true;

        $clientIM = new Client();
        $account = json_encode(array("username"=>Session::get('username'), "password"=>Session::get('password')));
        $res = $clientIM->resumeIM($id,$account);

        if(isset($res) && $res['error']!=false){
            $response['error'] = false;
            $response['mensaje'] = $res['data'];
            $resultError = strpos($res['data'], "ERROR executing playbook");
            if($resultError !== FALSE){
                $radl = Radls::where('id_deploy', $id)->first();
                $radl->type = 1;
                $radl->msg_error = $res['data'];
                $radl->save();
            }
            $resultFinish = strpos($res['data'], "0f412483458");
            if($resultFinish !== FALSE){
                $radl = Radls::where('id_deploy', $id)->first();
                $radl->validate = "true";
                $radl->msg = $res['data'];
                $radl->finish = 1;
                $radl->finish_date = Carbon::now();
                $radl->save();
            }
        }

        return $response;
    }

    /** Seguimiento del despliegue
     * @param Request $request
     * @param $language
     * @param $id
     * @return $this
     */
    public function resume(Request $request, $language, $id)
    {
        $radl = Radls::where('id_deploy', $id)->first();
        $message = "";
        if(!isset($radl)){
            abort(404);
        }
        if($radl->validate == "true"){
            $message = $radl->msg;
        }
        $radlText = $radl->radl;
        $central = $radl->count_central;
        $student = $radl->count_student;
        return view('desplegador.resume')->with(['id' => $id,'message' => $message, 'central'=> $central,
            'student' => $student, 'radlText'=>$radlText, 'language' => $language]);
    }

    /** Detalle del despliegue cuentas y servicios
     * @param Request $request
     * @param $id
     * @return $this
     */
    public function detail(Request $request, $id)
    {
        $radl = Radls::where('id_deploy', $id)->first();
        if(!isset($radl)){
            abort(404);
        }
        $error = true;
        $central = json_decode($radl->central);
        $student = json_decode($radl->student);
        $accountStudent = $radl->count_student;
        $accountCentral = $radl->count_central;
        $created = Carbon::parse($radl->created_at)->toDateString();

        $dataIP = array();

        $countMachine = $accountStudent + $accountCentral;

        $clientIM = new Client();
        $account = json_encode(array("username"=>Session::get('username'), "password"=>Session::get('password')));
        for ($i=0; $i<$countMachine;$i++) {
            $res = $clientIM->detailIM($id, $i, $account);
            $llave = $res['llave'];
            $llave = str_replace("<br>","\n",$llave);
            $ip = $res['ip'];
            $pos = stripos($ip, ',');
            $ipPublic = substr($ip, 0, $pos);
            $ipPrivate = substr($ip, $pos+1 , (count($ip)-2));
            $newDataIP = array('llave'=>$llave,'ipPublic'=>$ipPublic,'ipPrivate'=>$ipPrivate);
            array_push($dataIP, $newDataIP);
        }
        if($radl->validate == "true"){
            $error = false;
        }else{
            $res = $clientIM->resumeIM($id,$account);
            if(isset($res) && $res['error']!=false){
                $response['error'] = false;
                $response['mensaje'] = $res['data'];
                $data = $res['data'];
                $resultado = strpos($data, "0f412483458");
                if($resultado !== FALSE){
                    $radl->validate = "true";
                    $radl->msg = $data;
                    $radl->save();
                    $error = false;
                }else{
                    abort(404);
                }
            }else{
                abort(404);
            }
        }

        return view('desplegador.detail')->with(['error' => $error,'central'=>$central,
            'student'=>$student,'created'=>$created,'accountStudent' =>$accountStudent,
            'accountCentral'=>$accountCentral, 'dataIP' =>$dataIP]);
    }

}