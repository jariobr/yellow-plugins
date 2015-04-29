<?php
// Copyright (c) 2013-2015 Datenstrom, http://datenstrom.se
// This file may be used and distributed under the terms of the public license.

// User permissions plugin
class YellowUserpermissions
{
	const Version = "0.5.1";
	var $yellow;			//access to API
	
	// Handle initialisation
	function onLoad($yellow)
	{
		$this->yellow = $yellow;
	}
	
	// Handle permission to modify page
	function onUserPermission($location, $fileName, $users)
	{
		$home = $users->getHome();
		return substru($location, 0, strlenu($home)) == $home;
	}
}

$yellow->plugins->register("userpermissions", "YellowUserpermissions", YellowUserpermissions::Version);
?>