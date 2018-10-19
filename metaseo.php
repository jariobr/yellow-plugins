<?php
// MetaSeo plugin, https://github.com/datenstrom/yellow-plugins/tree/master/metaseo
// Copyright (c) 2013-2017 Datenstrom, https://datenstrom.se
// This file may be used and distributed under the terms of the public license.

class YellowMetaSeo
{
	const VERSION = "0.7.4";
	var $yellow;			//access to API	
	// Handle initialisation
	function onLoad($yellow)
	{
		$this->yellow = $yellow;		
		$this->yellow->config->setDefault("metaMsn", "");
		$this->yellow->config->setDefault("metaGoogle", "");
		$this->yellow->config->setDefault("metaYandex", "");
		$this->yellow->config->setDefault("facebookId", "");	
		$this->yellow->config->setDefault("facebook", "");
		$this->yellow->config->setDefault("googlePage", "");
		$this->yellow->config->setDefault("googlePlus", "");
		$this->yellow->config->setDefault("facebook", "");		
	}	
	// Handle page extra HTML data
	function onExtra($name)
	{
		$output = NULL;
		if($name=="header")
		{			
			$msnId = $this->yellow->config->get("metaMsn");
			$output .= "<meta name=\"msvalidate.01\" content=\"".strencode($msnId)."\" />\n";
			$googId = $this->yellow->config->get("metaGoogle");
			$output .= "<meta name=\"google-site-verification\" content=\"".strencode($googId)."\" />\n";
			$yanId = $this->yellow->config->get("metayandex");
			$output .= "<meta name=\"yandex-verification\" content=\"".strencode($yanId)."\" />\n";
			$fbId = $this->yellow->config->get("facebookId");
			$output .= "<meta property=\"fb:app_id\" content=\"".strencode($fbId)."\" />\n";
			$fbadminId = $this->yellow->config->get("facebook");
			$output .= "<meta property=\"fb:admins\" content=\"".strencode($fbadminId)."\" />\n";
			$gPage = $this->yellow->config->get("googlePage");
			$output .= "<link rel=\"publisher\" href=\"https://plus.google.com/".strencode($gPage)."\" />\n";
			$gPlus = $this->yellow->config->get("googlePlus");
			$output .= "<link rel=\"author\" href=\"https://plus.google.com/".strencode($gPlus)."\" />\n";
		}
		return $output;		
	}
}
$yellow->plugins->register("metaseo", "YellowMetaSeo", YellowMetaSeo::VERSION);
?>