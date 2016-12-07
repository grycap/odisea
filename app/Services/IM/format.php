<?php
/*
 IM - Infrastructure Manager
 Copyright (C) 2011 - GRyCAP - Universitat Politecnica de Valencia

 This program is free software: you can redistribute it and/or modify
 it under the terms of the GNU General Public License as published by
 the Free Software Foundation, either version 3 of the License, or
 (at your option) any later version.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License
 along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/


    function formatCloud($tokens) {
        $res = "";
        $public_clouds = array("EC2", "GCE", "Azure");
        if (in_array($tokens["provider.type"], $public_clouds)) {
			return $tokens["provider.type"];
		} else {
		        $res = $res . $tokens["provider.type"] . "<br>";
	        	$res = $res . $tokens["provider.host"] . ":" . $tokens["provider.port"] . "<br>";
		        return $res;
		}
    }

function formatIPs($tokens)
{
	$res = "";
	for ($i = 0; $i < 10; $i++) {
		if (in_array('net_interface.' . $i . '.ip', array_keys($tokens))) {
			$res = $res . str_replace("'", "", $tokens['net_interface.' . $i . '.ip']) . ',';
		}
	}

	return $res;
}
    
    function formatAplication($app) {
    	$parts = explode("and", trim($app,"()"));    	
    	$values = array(
    			"name" => "",
    			"version" => "",
    			"path" => ""
    	);

    	foreach ($parts as $part) {
    		$tok = explode(" = ", $part);
    		$values[trim($tok[0])] = trim(trim($tok[1]),"'");
    	}
    	
    	$res = $values['name'];
    	if (strlen($values['version']) > 0) {
    		$res = $res . " v. " . $values['version'];
    	}
    	if (strlen($values['path']) > 0) {
    		$res = $res . " (" . $values['path'] . ")";
    	}
    	
    	return $res;
    }
    
function formatRADL($tokens)
{
	$res = "";

	foreach ($tokens as $key => $value) {
		if ($key != "state" && strpos($key, "net_interface") === false && strpos($key, "provider.") === false) {

			if (strpos($key, "private_key") !== false) {
				$res = $value;
			}
		}
	}
	return $res;
}


function getOutPorts($radl) {
    	$pos = 0;
    	$res = array();
    	while ($pos !== false) {
	    	$ini = strpos($radl, "network", $pos);
	    	$ini = strpos($radl, "(", $ini)+1;
	    	$fin = strpos($radl, ")", $ini+1);
	    	
	    	$parts = explode(" and", substr($radl, $ini, $fin-$ini));
	    	
	    	$i = 0;
	    	$public = false;
	    	$ports = "";
	    	foreach ($parts as $comp)
	        {
                $tok = explode(" = ", $comp);
                $key = trim($tok[0]);
                $value = "";

                if (count($tok) > 1) {
                	$value = str_replace("'","",trim($tok[1]));
                }
                
                if ($key == 'outbound')
                	$public = true;
                else if ($key == 'outports')
                	$ports = $value;
	        }
	    	
	        if ($public and strlen($ports) > 0) {
	        	$port_parts = explode(",", $ports);
	        	foreach ($port_parts as $port_pair) {
	        		$port_pair_parts = explode("-", $port_pair);
	        		if (count($port_pair_parts)>1 and $port_pair_parts[0] != $port_pair_parts[1]) {
	        			$res[$port_pair_parts[0]] = $port_pair_parts[1];
	        		}
	        	}
	        }
	    	
	    	$pos = strpos($radl, "network", $pos+1);
    	}
    	
    	return $res;
    }
    
    function formatOutPorts($outports){
    	$res = "";
    	foreach ($outports as $src => $dest) {
    		$res = $res . $src . " => " . $dest . "<br>\n";
    	}
    	return $res;
    }
    
    function parseRADL($radl) {
        $ini = strpos($radl, "system");
        $ini = strpos($radl, "(", $ini)+1;
        $fin = strpos($radl, ")\n\n");

        $parts = explode(" and", substr($radl, $ini, $fin-$ini));
        
        $i = 0;
        $res = array();
        while ($i < count($parts))
        {
            $comp = $part = $parts[$i];
            if (strpos($part, "contains")) {
                while ($i < count($parts) and !strpos($part, ")")) {
                    $i++;
                    $part = $parts[$i];
                    $comp = $comp . "and" . $part;
                }
            }

            if (strpos($comp, "contains")) {
                $tok = explode("contains", $comp);
                $res[trim($tok[0])] = trim($tok[1]);
            } else {
                $tok = explode(" = ", $comp);
				if (count($tok) > 1) {
			                $res[trim($tok[0])] = str_replace("'","",trim($tok[1]));
				} else {
			                $res[trim($tok[0])] = "";
				}
            }

            $i++;
        }
        
        return $res;
    }
?>
