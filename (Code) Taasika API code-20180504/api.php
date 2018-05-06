<?php
// This file is part of Taasika - a timetabling software for 
// schools, colleges/universities.
//
// Taasika is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Taasika is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Taasika.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Taasika frontpage.
 *
 * Copyright 2017 Abhijit A. M.(abhijit13@gmail.com)
 */


if(!file_exists('../db.php'))
	header("Location: install.php");
if(!file_exists('../config.php'))
	header("Location: install.php");
require_once('../db.php');
require_once('../common.php');
$reqType = getArgument("reqType");
switch($reqType) {
	case "getDataTables":
	case "getTimetable":
	case "getOneTable":
	case "exportSQL":
		/* call the function which has same name as reqType */
		echo $reqType();
		break;
	default:
		echo "NO DATA";
		break;
}
