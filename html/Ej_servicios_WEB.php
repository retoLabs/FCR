<?php
  
require_once "Alfresco/Service/Repository.php";
require_once "Alfresco/Service/Session.php";
require_once "Alfresco/Service/SpacesStore.php";
require_once "Alfresco/Service/Node.php";
require_once "Alfresco/config.php";
require_once('include/database/PearDatabase.php'); //conexion a bbdd
function UpdateDMSContent(){
   global $repositoryUrl;
   global $userName;
   global $password;
   global $adb;
   $repository = new Repository($repositoryUrl);
   $repository = new Repository($repositoryUrl);
   $ticket = null;
   if (isset($_SESSION["ticket"]) == false)
   {
      $ticket = $repository->authenticate($userName, $password);
      $_SESSION["ticket"] = $ticket;	
   }   
   else
   {
     $ticket = $_SESSION["ticket"]; 	
   }
	try{
			$session = $repository->createSession($ticket);
			$store = new SpacesStore($session);
			$currentNode = $store->companyHome;
			$path = 'Company Home';
			$listOfContents = array();
			$listOfContentIds = '';
			foreach ($currentNode->Children as $child){
				if($child->child->type == '{http://www.alfresco.org/model/content/1.0}content'){
					$listOfContents[] = array('Content Name' => $child->child->cm_name, 'Content ID' => $child->child->id, 'Content Path' => getURL($child->child) );
					$listOfContentIds .= "'{$child->child->id}', ";
					$sql = "select count(*) from vtiger_icswidgets where sourceid = '{$child->child->id}'";
					if($row = $adb->fetch_array($adb->query($sql))){
						if($row[0] == 0){
							$sql = "insert into vtiger_icswidgets(id, widgetname, source, sourceid, visibletoagent, deleted) values (null, '{$child->child->cm_name}', 'DMS', '{$child->child->id}', 1, 1)";
							$adb->query($sql);
						}
					}
				
				}
			}
	}catch (Exception $e) {
			var_dump($e);
			echo '<div align="center"><font color="red">Alfresco DMS se enfrenta a un error en la sincronizacion de los contenidos. Por favor vuelva a logarse para evitar el problema.</font></div>.';
			echo '<div align="center">Exception: '.$e->getMessage().'</div>';
	}
	$listOfContentIds = substr($listOfContentIds, 0, -2);
	$adb->query("delete from vtiger_icswidgets where sourceid not in ($listOfContentIds)");
	unset($_SESSION["ticket"]);
	return $listOfContents;
}
function getURL($node){
	global $path;
	$result = null;
	if ($node->type == "{http://www.alfresco.org/model/content/1.0}content")
	{
	$contentData = $node->cm_content;
	if ($contentData != null)
	{
	$result = $contentData->getUrl();
	}
	}
	else
	{
	$result = "index.php?".
	"&uuid=".$node->id.
	"&name=".$node->cm_name.
	"&path=".$path;
	}
	return $result;
}
function pullDMSContent($uuid, $contentName, $cleanHTML = 'No'){
   global $repositoryUrl;
   global $userName;
   global $password;
   $file = '';
   global $adb;
   $cool = $cleanHTML;
   //if($row = $adb->fetch_array($adb->query("select * from vtiger_icsadminpreferences"))) $cool = $row['cleanhtml'];
   if (isset($_SESSION) == false) session_start();
   
   $repository = new Repository($repositoryUrl);
   $ticket = null;
   if (isset($_SESSION["ticket"]) == false){
      $ticket = $repository->authenticate($userName, $password);
      $_SESSION["ticket"] = $ticket;	
   }else{
     $ticket = $_SESSION["ticket"]; 	
   }
   $session = $repository->createSession($ticket);
   
   $store = new SpacesStore($session);
	$currentNode = null;
	try {
		$currentNode = $session->getNode($store, $uuid);
		$contentData = $currentNode->cm_content;
		$file = $contentData->getUrl();
	} catch (Exception $e) {
		sendAlert(4, "Contenido con nombre - $contentName ha desaparecido");
		return '';
	}
	$fp = fopen($file, 'r');
	$DMSContent = stream_get_contents($fp);
	fclose($fp);
	if($cool == 'Yes') $DMSContent = strip_tags($DMSContent,'<p><b><i><u><strong><br><span><center><h1><h2><h3><h4><h5><h6>');
	return $DMSContent;
}