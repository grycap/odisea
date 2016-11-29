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

include_once('db.php');
$im_use_rest=true;
$im_use_rest_ssl=false;
$im_host="servproject.i3m.upv.es";
$im_port=8811;
$im_db="im.db";
# To use that feature the IM recipes file must accesible to the web server
#$recipes_db="/usr/local/im/contextualization/recipes_ansible.db";
# If not set ""
$recipes_db="";
?>
