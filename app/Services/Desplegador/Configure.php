<?php namespace App\Services\Desplegador;

/**
 * Class Configure - Métodos para configurar las recetas
 * @package App\Services\Desplegador
 */
class Configure
{
    /** Configura los puertos que se habilitaran en la receta
     * @param $objJson
     * @return string
     */

    public function puertosIp($objJson)
    {
        if (is_string($objJson->puertosNew)) {
            $objJson->puertosDefault .= "," . $objJson->puertosNew;
        }
        $objJson->ipPublica = ($objJson->ipPublica) ? "yes" : "no";
        $puertos = "network publica (
  outbound = '$objJson->ipPublica' and outports = '$objJson->puertosDefault'
)";

        return $puertos;
    }

    /** Caracteristicas de la maquina central y la de los alumnos que se desplegaran
     * @param $objJson
     * @param $request
     * @return string
     */
    public function configInstance($objJson, $request)
    {
        $countStudent = $request->input('studentMachine');
        $maquina = "system central (
  cpu.arch='$objJson->cpu' and
  cpu.count>=$objJson->count and
  memory.size>=$objJson->size and
  net_interface.0.connection = '$objJson->connection' and
  net_interface.1.connection = 'privada' and
  net_interface.0.dns_name = 'central-mv' and
  net_interface.1.dns_name = 'central-priv' and
  disk.0.image.url = '$objJson->image' and
  disk.0.os.name='$objJson->name' and
  disk.0.os.credentials.username='$objJson->userName' and
  disk.0.os.version='$objJson->version' and
  disk.0.applications contains (name='$objJson->region' and preinstalled='yes')
)\n";
        if ($countStudent != 0) {
            $maquina .= "system mv1 (
  cpu.arch='$objJson->cpu' and
  cpu.count>=$objJson->countStudent and
  memory.size>=$objJson->sizeStudent and
  net_interface.0.connection = 'publica' and
  net_interface.1.connection = 'privada' and
  disk.0.image.url = '$objJson->image' and
  disk.0.os.name='$objJson->name' and
  disk.0.os.credentials.username='$objJson->userName' and
  disk.0.os.version='$objJson->version' and
  disk.0.applications contains (name='$objJson->region' and preinstalled='yes')
)";
        }

        return $maquina;

    }

    /** Cuentas de Usuario para la maquina virtual linux
     * @param $request
     * @return string
     */
    public function account($request)
    {
        $lista = 'accounts:' . "\n";
        $countStudent = $request->input('countStudent');
        for ($i = 1; $i <= $countStudent; $i++) {
            $student = 'user' . $i;
            $student = $request->input($student);
            $cryptPassword = shell_exec('python -c \'import crypt; print crypt.crypt("' . $student['username'] . '", "' . $student['password'] . '")\'');
            if ($cryptPassword == null) {
                $cryptPassword = 'gu2KmqcJp0Yyo'; //guest123
            } else {
                $cryptPassword = substr($cryptPassword, 0, (strlen($cryptPassword)) - 1);
            }
            $lista .= '        - { name: "' . $student['username'] . '", pw: "' . $cryptPassword . '", pass: "' . $student['password'] . '"}' . "\n";
        }
        $lista .= '      admin:' . "\n";
        $cryptPassword = shell_exec('python -c \'import crypt; print crypt.crypt("' . $request->input('usernameCentral') . '", "' . $request->input('passwordCentral') . '")\'');
        if ($cryptPassword == null) {
            $cryptPassword = "gu2KmqcJp0Yyo"; //guest123
        } else {
            $cryptPassword = substr($cryptPassword, 0, (strlen($cryptPassword)) - 1);
        }
        $lista .= '        - { name: "' . $request->input('usernameCentral') . '", pw: "' . $cryptPassword . '", pass: "' . $request->input('passwordCentral') . '"}';
        return $lista;
    }

    /** Cuentas de usuario en las que se crearan las cuentas en gitlab para cada Alumno
     * @param $request
     * @return string
     */
    public function accountJson($request)
    {
        $lista = '{';
        $countStudent = $request->input('countStudent');
        for ($i = 1; $i <= $countStudent; $i++) {
            $cuenta = 'user' . $i;
            $student = $request->input($cuenta);
            $lista .= '"' . $cuenta . '":{"nombre":"' . $student['username'] . '","password":"' . $student['password'] . '"},';
        }

        $lista = substr($lista, 0, -1) . '}';
        return $lista;
    }

    /** Cuentas para git server con node.js ya no se usa por que cambiamos a gitlab
     * @param $request
     * @return string
     */
    /*public function cuentasRepositorios($request)
    {
        $lista = "var GitServer=require('git-server'),";
        $permission = "";
        $repositorio = "";
        $usernameCentral = $request->input('usernameCentral');
        $passwordCentral = $request->input('passwordCentral');
        $countStudent = $request->input('countStudent');
        for ($i=1;$i<=$countStudent;$i++){
            $student = "user".$i;
            $student = $request->input($student);
            $username = $student['username'];
            $password = $student['password'];
            $lista .= "$username={username:'$username',password:'$password'},";
            $permission .= $username . "Repo={name:'$username',anonRead:!1,users:[{user:" . $username . ",permissions:['R','W']},{user:central,permissions:['R','W']}]},";
            $repositorio .= $username . "Repo,";
        }
        $lista .= "central={username:'$usernameCentral',password:'$passwordCentral'},copia={username:'copia',password:'copia'},";
        $lista .= $permission;
        $lista .= "centralRepo={name:'central',anonRead:!1,users:[{user:central,permissions:['R','W']},{user:copia,permissions:['R']}]};";
        $lista .= "_g=new GitServer([";
        $lista .= $repositorio;
        $lista .= "centralRepo]);";
        return $lista;

        {"practice1":{"name":"numero-natural","practice":"https://master-class:master-password@bitbucket.org/phantro/base-java.git","central":"https://master-class:master-password@bitbucket.org/phantro/base-java.git"},"practice2":{"name":"fracciones","practice":"https://master-class:master-password@bitbucket.org/phantro/base-java.git","central":"https://master-class:master-password@bitbucket.org/phantro/base-java.git"}}

    }*/

    /** Cuentas de repositorios para crear en gitlab.
     * @param $request
     * @return string
     */
    public function accountRepository($request)
    {
        $lista = '{';
        $countProyect = $request->input('countProyect');
        for ($i = 1; $i <= $countProyect; $i++) {
            $proyect = 'proyect' . $i;
            $proyect = $request->input($proyect);
            $name = $this->nameUrl($proyect['name']);
            $practice = $proyect['practice'];
            $central = $proyect['central'];
            $lista .= '"practice' . $i . '":{"name":"' . $name . '","practice":"' . $practice . '","central":"' . $central . '"},';
        }
        $lista = substr($lista, 0, -1) . '}';
        return $lista;
    }

    /** Clone repositorios de gitlab local.
     * @param $request
     * @return string
     */
    public function accountRepositoryClone($request)
    {
        $countStudent = $request->input('studentMachine');
        if ($countStudent != 0) {
            $entorno = 'central-priv';
        }else{
            $entorno = 'localhost';
        }
        $lista = '#!/bin/bash\n ';
        $countProyect = $request->input('countProyect');
        for ($i = 1; $i <= $countProyect; $i++) {
            $proyect = 'proyect' . $i;
            $proyect = $request->input($proyect);
            $name = $this->nameUrl($proyect['name']);
            $lista .= 'git clone http://{{ item.name }}:{{ item.pass }}@' . $entorno . '/{{ item.name }}/' . $name . '.git /home/{{ item.name }}/'.$name.'\n ';
        }
        return $lista;
    }

    /** Crear un Json con las caracteristicas que a colocado en la web
     * @param $ip
     * @param $puertos
     * @param $newPuertos
     * @return mixed
     */
    public function parsePort($ip, $puertos, $newPuertos)
    {
        $data = '{}';
        $objJson = json_decode($data);
        $objJson->puertosDefault = $puertos;
        $objJson->puertosNew = (bool)$newPuertos;
        $objJson->ipPublica = $ip;
        return $objJson;
    }

    /**
     * @param $region
     * @param $type
     * @param $request
     * @return mixed
     */
    public function parseMachine($region, $type, $request)
    {

        $central = $this->machine($request->input('center'));
        $student = $this->machine($request->input('student'));

        $data = '{
            "cpu": "x86_64",
            "count": ' . $central['count'] . ',
            "size": "' . $central['size'] . '",
            "countStudent": ' . $student['count'] . ',
            "sizeStudent": "' . $student['size'] . '",
            "connection": "publica",
            "image": "aws://us-east-1/ami-c93a83de",
            "name": "linux",
            "userName": "ubuntu",
            "version": "14.04",
            "region": "aws.region.us-east-1"
        }';

        $objJson = json_decode($data);
        return $objJson;
    }

    public function machine($machine)
    {
        $result = array();

        switch ($machine) {
            case 'm1-small':
                $result['size'] = '1740m';
                $result['count'] = '1';
                break;
            case 't2-small':
                $result['size'] = '2048m';
                $result['count'] = '1';
                break;
            case 't1-micro':
                $result['size'] = '512m';
                $result['count'] = '1';
                break;
            case 't2-micro':
                $result['size'] = '1024m';
                $result['count'] = '1';
                break;
            default:
                $result['size'] = '512m';
                $result['count'] = '1';
        }
        return $result;
    }

    public function accountStudent($request)
    {
        $studentAll = array();
        $countStudent = $request->input('countStudent');
        for ($i = 1; $i <= $countStudent; $i++) {
            $name = "user" . $i;
            $student = $request->input($name);
            $username = $student['username'];
            $password = $student['password'];
            $studentAccount = array($name => array("username" => $username, "password" => $password));
            array_push($studentAll, $studentAccount);
        }
        return json_encode($studentAll);
    }

    public function countMachine($request)
    {
        $cod = 11;
        $countStudent = $request->input('studentMachine');
        $language = $request->input('language');

        if (strcmp($language, "java") == 0) {
            if ($countStudent != 0) {
                $cod = 12;
            } else {
                $cod = 11;
            }
        }
        if (strcmp($language, "c") == 0) {
            if ($countStudent != 0) {
                $cod = 15;
            } else {
                $cod = 14;
            }
        }

        return $cod;
    }

    public function accountCloud($request)
    {
        session(['username' => $request->input('usernameAccount'), 'password' => $request->input('passwordAccount'), 'zone' => $request->input('zone')]);
    }

    public function nameUrl($url)
    {
        // Tranformamos todo a minusculas

        $url = strtolower($url);
        $url = $this->quitar_espacios($url);

        //Rememplazamos caracteres especiales latinos

        $find = array('á', 'é', 'í', 'ó', 'ú', 'ñ');

        $repl = array('a', 'e', 'i', 'o', 'u', 'n');

        $url = str_replace($find, $repl, $url);

        // Añaadimos los guiones

        $find = array(' ', '&', '\r\n', '\n', '+');
        $url = str_replace($find, '-', $url);

        // Eliminamos y Reemplazamos demás caracteres especiales

        $find = array('/[^a-z0-9\-<>]/', '/[\-]+/', '/<[^>]*>/');

        $repl = array('', '-', '');

        $url = preg_replace($find, $repl, $url);

        return $url;

    }

    public function quitar_espacios($texto)
    {

        if ($texto && is_string($texto)) {

            //Convierte el string en un array
            $palabras = explode(' ', $texto);
            $palabras_ok = [];

            foreach ($palabras as $palabra) {
                if ($palabra)
                    $palabras_ok[] = $palabra;
            }

            //Devuelve un string a partir del array
            return implode(' ', $palabras_ok);
        }

        return False;

    }


    ///agregar al repositorio central codigo para el profesor y colocarlo en la carpeta dentro de ubuntu
}    
