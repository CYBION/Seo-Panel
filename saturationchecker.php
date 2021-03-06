<?php

/***************************************************************************
 *   Copyright (C) 2009-2011 by Geo Varghese(www.seopanel.in)  	   *
 *   sendtogeo@gmail.com   												   *
 *                                                                         *
 *   This program is free software; you can redistribute it and/or modify  *
 *   it under the terms of the GNU General Public License as published by  *
 *   the Free Software Foundation; either version 2 of the License, or     *
 *   (at your option) any later version.                                   *
 *                                                                         *
 *   This program is distributed in the hope that it will be useful,       *
 *   but WITHOUT ANY WARRANTY; without even the implied warranty of        *
 *   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the         *
 *   GNU General Public License for more details.                          *
 *                                                                         *
 *   You should have received a copy of the GNU General Public License     *
 *   along with this program; if not, write to the                         *
 *   Free Software Foundation, Inc.,                                       *
 *   59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.             *
 ***************************************************************************/

include_once("includes/sp-load.php");
checkLoggedIn();
include_once(SP_CTRLPATH."/saturationchecker.ctrl.php");
$controller = New SaturationCheckerController();
$controller->view->menu = 'seotools';
$controller->layout = 'ajax';
$controller->set('spTextTools', $controller->getLanguageTexts('seotools', $_SESSION['lang_code']));
$controller->spTextSat = $controller->getLanguageTexts('saturation', $_SESSION['lang_code']);
$controller->set('spTextSat', $controller->spTextSat);

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	
	switch($_POST['sec']){		
			
		case "generate":
			$controller->generateReports($_POST);
			break;
			
		case "reports":
			$controller->showReports($_POST);
			break;
		
		case "saturation":
			$controller->printSearchEngineSaturation($_POST);
			break;
			
		case "graphical-reports":
			$controller->showGraphicalReports($_POST);
			break;
			
		default:
			$controller->findSearchEngineSaturation($_POST);
			break;
	}
	
}else{
	switch($_GET['sec']){
		
		case "saturation":
			$controller->printSearchEngineSaturation($_GET);
			break;		
			
		case "generate":
			$controller->showGenerateReports($_GET);
			break;
			
		case "reports":
			$controller->showReports($_GET);
			break;
			
		case "graphical-reports":
			$controller->showGraphicalReports($_GET);
			break;
		
		default:
			$controller->showSaturationChecker();
			break;
	}
}

?>