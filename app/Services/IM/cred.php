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
include_once(app_path() . '/Services/IM/db.php');
function get_credentials($user) {
    //include('config.php');

    $db = new IMDB();
    $res = $db->direct_query("select rowid,* from credentials where imuser = '" . $user . "' order by ord");
    $db->close();
    return $res;
}

function get_credential($id) {
    include('config.php');

    $db = new IMDB();
    $res = $db->get_items_from_table("credentials", array("rowid" => $id));
    $db->close();
    if (count($res) > 0)
        return $res[0];
    else
        return NULL;
}

function insert_credential($imuser, $id, $type, $host, $username, $password, $token_type, $project, $proxy, $public_key, $private_key, $certificate, $tenant) {
    include('config.php');

    $res = "";
    $db = new IMDB();
    $fields = array();
    $fields[] = "'" . $db->escapeString($id) . "'";
    $fields[] = "'" . $imuser . "'";
    $fields[] = "'" . $type . "'";
    $fields[] = "'" . $db->escapeString($host) . "'";
    $fields[] = "'" . $db->escapeString($username) . "'";
    $fields[] = "'" . $db->escapeString($password) . "'";
    $fields[] = 1;

    $res = $db->direct_query("select max(ord) as max_ord from credentials where imuser = '" . $imuser . "'");
    $fields[] = $res[0]['max_ord']+1;
    
    $fields[] = "'" . $db->escapeString($proxy) . "'";
    $fields[] = "'" . $db->escapeString($token_type) . "'";
    $fields[] = "'" . $db->escapeString($project) . "'";
    $fields[] = "'" . $db->escapeString($public_key) . "'";
    $fields[] = "'" . $db->escapeString($private_key) . "'";
    $fields[] = "'" . $db->escapeString($certificate) . "'";
    $fields[] = "'" . $db->escapeString($tenant) . "'";

    $res = $db->insert_item_into_table("credentials",$fields);
    $db->close();

    return $res;
}

function edit_credential($rowid, $id, $type, $host, $username, $password, $token_type, $project, $proxy, $public_key, $private_key, $certificate, $tenant) {
    include('config.php');

    $res = "";
    $db = new IMDB();
    $fields = array();
    $fields["id"] = "'" . $db->escapeString($id) . "'";
    $fields["type"] = "'" . $type . "'";
    $fields["host"] = "'" . $db->escapeString($host) . "'";
    $fields["username"] = "'" . $db->escapeString($username) . "'";
    $fields["token_type"] = "'" . $db->escapeString($token_type) . "'";
    $fields["project"] = "'" . $db->escapeString($project) . "'";
    if (strlen(trim($password)) > 0) {
    	$fields["password"] = "'" . $db->escapeString($password) . "'";
    }
    if (strlen(trim($proxy)) > 0) {
    	$fields["proxy"] = "'" . $db->escapeString($proxy) . "'";
    }
    if (strlen(trim($public_key)) > 0) {
    	$fields["public_key"] = "'" . $db->escapeString($public_key) . "'";
    }
    if (strlen(trim($private_key)) > 0) {
    	$fields["private_key"] = "'" . $db->escapeString($private_key) . "'";
    }
    if (strlen(trim($certificate)) > 0) {
    	$fields["certificate"] = "'" . $db->escapeString($certificate) . "'";
    }
    if (strlen(trim($tenant)) > 0) {
    	$fields["tenant"] = "'" . $db->escapeString($tenant) . "'";
    }

    $where = array("rowid" => $rowid);
    $res = $db->edit_item_from_table("credentials",$fields,$where);
    $db->close();

    return $res;
}

function delete_credential($id) {
    include('config.php');

    $db = new IMDB();
    $res = $db->delete_item_from_table("credentials", array("rowid" => $id));
    $db->close();
    return $res;
}

function enable_credential($id, $enable) {
    include('config.php');

    $res = "";
    $db = new IMDB();
    $fields = array("enabled" => $enable);
    $where = array("rowid" => $id);
    $res = $db->edit_item_from_table("credentials",$fields,$where);
    $db->close();

    return $res;
}

function change_order($id, $user, $order, $new_order) {
    include('config.php');

    $res = "";
    $db = new IMDB();
    $fields = array("ord" => $order);
    $where = array("ord" => $new_order, "imuser" => "'" . $user . "'");
    $res = $db->edit_item_from_table("credentials",$fields,$where);

    if (strlen($res) == 0) {
        $fields = array("ord" => $new_order);
        $where = array("rowid" => $id);
        $res = $db->edit_item_from_table("credentials",$fields,$where);
    }

    $db->close();

    return $res;
}
?>
