<?php
/***************************************************************
 *  Copyright notice
 *
 *  (c) 1999-2004 Kasper Skaarhoj (kasper@typo3.com)
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *  A copy is found in the textfile GPL.txt and important notices to the license
 *  from the author is found in LICENSE.txt distributed with these scripts.
 *
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/
/**
 * @author		Kasper Skårhøj <kasper@typo3.com>
 * @author  	Jan-Erik Revsbech <jer@moccompany.com>
 * @author		Ivan-Dharma Kartolo	<ivan.kartolo@dkd.de>
 */

// DEFAULT initialization of a module [BEGIN]
error_reporting (E_ALL ^ E_NOTICE);
unset($MCONF);
require ('conf.php');
require ($BACK_PATH.'init.php');
if (version_compare(TYPO3_version,'6.0.0','<')) {
	require ($BACK_PATH.'template.php');
}
$LANG->includeLLFile('EXT:direct_mail/locallang/locallang_mod2-6.xml');
//$LANG->includeLLFile('EXT:direct_mail/mod/locallang_csh_web_directmail.xml');
$LANG->includeLLFile('EXT:direct_mail/locallang/locallang_csh_sysdmail.xml');
$BE_USER->modAccess($MCONF,1);    // This checks permissions and exits if the users has no permission for entry.

// Make instance:
require_once(t3lib_extMgm::extPath('direct_mail').'mod3/class.tx_directmail_recipient_list.php');
$SOBE = t3lib_div::makeInstance('tx_directmail_recipient_list');
$SOBE->init();

// Include files?
foreach($SOBE->include_once as $INC_FILE) {
	include_once($INC_FILE);
}

$SOBE->main();
$SOBE->printContent();

?>
