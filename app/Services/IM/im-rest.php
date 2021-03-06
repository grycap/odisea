<?php
include_once(app_path() . '/Services/IM/http.php');

function get_auth_data($json) {

    $fields = array("id","type","host","username","password","proxy","token_type","project","public_key","private_key", "certificate");

    // Same values as defined in IM REST API
    // Combination of chars used to separate the lines in the AUTH header
    $AUTH_LINE_SEPARATOR = '\\n';
    // Combination of chars used to separate the lines inside the auth data (i.e. in a certificate)
    $credential = json_decode($json);
    $auth = "type = InfrastructureManager; username = admin; password = admin\\ntype = VMRC; host = http://servproject.i3m.upv.es:8080/vmrc/vmrc; username = micafer; password = ttt25\\n";
    $auth = $auth . "id = desplegador; ";
    $auth = $auth . "type = EC2; ";
    $auth = $auth . "username = ".$credential->username."; ";
    $auth = $auth . "password = ".$credential->password."; ";
    $auth = substr( $auth, 0, strlen($auth)-2 ) . $AUTH_LINE_SEPARATOR;
    return $auth;
}

function GetErrorMessage($output) {
    return $output;
}

function BasicRESTCall($verb, $host, $port, $path, $extra_headers=array(), $params=array(), $json) {
    $auth = get_auth_data($json);
    $headers = array("Authorization:" . $auth);
    $headers = array_merge($headers, $extra_headers);

    $protocol = 'http';

    try {
        $res = Http::connect($host, $port, $protocol)
            ->setHeaders($headers)
            ->exec($verb, $path, $params);

        $status = $res->getStatus();
        $output = $res->getOutput();
    } catch (Exception $e) {
        $status = 600;
        $output = "Exception: " . $e->getMessage();
    }

    $res = $output;
    if ($status != 200) {
        $res = 'Error: Code: ' . strval($status) . '. ' . GetErrorMessage($output);
    }

    return new Http_response($status, $res);

}

function GetInfrastructureList($host, $port, $json) {
    $headers = array('Accept: text/*');
    $res = $this->BasicRESTCall("GET", $host, $port, '/infrastructures', $headers, $json);

    if ($res->getStatus() != 200) {
        return $res->getOutput();
    } else {
        $inf_urls = split("\n", $res->getOutput());
        $inf_ids = array();
        foreach ($inf_urls as $inf_url) {
            $inf_id = trim(basename(parse_url($inf_url, PHP_URL_PATH)));
            if (strlen($inf_id) > 0) {
                $inf_ids[] = $inf_id;
            }
        }
        return $inf_ids;
    }
}

function GetInfrastructureInfo($host, $port, $id, $json) {
    $headers = array('Accept: text/*');
    $res = BasicRESTCall("GET", $host, $port, '/infrastructures/'.$id, $headers, $json);

    if ($res->getStatus() != 200) {
        return 'Error: Code: ' . strval($res->getStatus());
    } else {
        $vm_urls = split("\n", $res->getOutput());
        $vm_ids = array();
        foreach ($vm_urls as $vm_url) {
            $vm_id = trim(basename(parse_url($vm_url, PHP_URL_PATH)));
            if (strlen($vm_id) > 0) {
                $vm_ids[] = $vm_id;
            }
        }
        return $vm_ids;
    }
}

function GetInfrastructureState($host, $port, $id,$json) {
    $headers = array('Accept: application/json');
    $res = BasicRESTCall("GET", $host, $port, '/infrastructures/'.$id.'/state', $headers, $json);

    if ($res->getStatus() != 200) {
        return $res->getOutput();
    } else {
        return json_decode($res->getOutput())->state->state;
    }
}

function DestroyInfrastructure($host, $port, $id,$json) {
    $headers = array('Accept: text/*');
    $res = BasicRESTCall("DELETE", $host, $port, '/infrastructures/'.$id, $headers, $json);

    if ($res->getStatus() != 200) {
        return $res->getOutput();
    } else {
        return "";
    }
}

function GetVMInfo($host, $port, $inf_id, $vm_id, $json) {
    $headers = array('Accept: text/*');
    $res = BasicRESTCall("GET", $host, $port, '/infrastructures/' . $inf_id . '/vms/' . $vm_id, $headers, array(), $json);
    return $res->getOutput();
}


function GetInfrastructureContMsg($host, $port, $id,$json) {
    $headers = array('Accept: text/*');
    $res = BasicRESTCall("GET", $host, $port, '/infrastructures/'.$id.'/contmsg', $headers, array(),$json);
    return $res->getOutput();
}

function GetVMProperty($host, $port, $inf_id, $vm_id, $property,$json) {
    $headers = array('Accept: text/*');
    $res = BasicRESTCall("GET", $host, $port, '/infrastructures/' . $inf_id . '/vms/' . $vm_id . "/" . $property, $headers,$json);
    return $res->getOutput();
}

function GetVMContMsg($host, $port, $inf_id, $vm_id,$json) {
    $headers = array('Accept: text/*');
    $res = BasicRESTCall("GET", $host, $port, '/infrastructures/' . $inf_id . '/vms/' . $vm_id . "/contmsg", $headers,$json);
    return $res->getOutput();
}

function GetContentType($content) {
    if (strpos($content,"tosca_definitions_version") !== false) {
        return 'text/yaml';
    } elseif (substr(trim($content),0,1) == "[") {
        return 'application/json';
    } else {
        return 'text/plain';
    }
}

function CreateInfrastructure($host, $port, $radl, $json) {
    $headers = array('Accept: text/*', 'Content-Length: ' . strlen($radl), 'Content-Type: ' . GetContentType($radl));
    $res = BasicRESTCall("POST", $host, $port, '/infrastructures', $headers, $radl, $json);
    $res = $res->getOutput();
    $pos = strrpos($res, '/');
    $res = substr($res, $pos+1, (strlen($res)));
    return $res;
    //return $res->getOutput();
}

function StartVM($host, $port, $inf_id, $vm_id,$json) {
    $headers = array('Accept: text/*');
    $res = BasicRESTCall("PUT", $host, $port, '/infrastructures/' . $inf_id . '/vms/' . $vm_id . "/start", $headers,$json);
    return $res->getOutput();
}

function StopVM($host, $port, $inf_id, $vm_id,$json) {
    $headers = array('Accept: text/*');
    $res = BasicRESTCall("PUT", $host, $port, '/infrastructures/' . $inf_id . '/vms/' . $vm_id . "/stop", $headers,$json);
    return $res->getOutput();
}

function AddResource($host, $port, $inf_id, $radl,$json) {
    $headers = array('Accept: text/*', 'Content-Length: ' . strlen($radl), 'Content-Type: ' . GetContentType($radl));
    $res = BasicRESTCall("POST", $host, $port, '/infrastructures/' . $inf_id, $headers, $radl,$json);
    return $res->getOutput();
}

function RemoveResource($host, $port, $inf_id, $vm_id,$json) {
    $headers = array('Accept: text/*');
    $res = BasicRESTCall("DELETE", $host, $port, '/infrastructures/' . $inf_id . '/vms/' . $vm_id, $headers,$json);
    return $res->getOutput();
}

function Reconfigure($host, $port, $inf_id, $radl,$json) {
    $headers = array('Accept: text/*', 'Content-Type: text/plain', 'Content-Length: ' . strlen($radl));
    $res = BasicRESTCall("PUT", $host, $port, '/infrastructures/' . $inf_id . '/reconfigure', $headers, $radl,$json);
    return $res->getOutput();
}

function GetOutputs($host, $port, $inf_id,$json) {
    $headers = array('Accept: application/json');
    $res = BasicRESTCall("GET", $host, $port, '/infrastructures/' . $inf_id . '/outputs', $headers,$json);
    return json_decode($res->getOutput(), true)["outputs"];
}
?>