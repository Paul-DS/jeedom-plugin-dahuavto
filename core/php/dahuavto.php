<?php

/* This file is part of Jeedom.
*
* Jeedom is free software: you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation, either version 3 of the License, or
* (at your option) any later version.
*
* Jeedom is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
* GNU General Public License for more details.
*
* You should have received a copy of the GNU General Public License
* along with Jeedom. If not, see <http://www.gnu.org/licenses/>.
*/

require_once __DIR__  . '/../../../../core/php/core.inc.php';

if (!jeedom::apiAccess(init('apikey'), 'dahuavto')) {
	echo 'Clef API non valide, vous n\'etes pas autorisé à effectuer cette action';
	die();
}

if (init('test') != '') {
	echo 'OK';
	die();
}

$result = json_decode(file_get_contents("php://input"), true);
if (!is_array($result)) {
	die();
}

if (isset($result['devices'])) {
    log::add('dahuavto','debug','Message received from the daemon: ' . json_encode($result));
	foreach ($result['devices'] as $id => $data) {
		$dahuavto = dahuavto::byId($id, 'dahuavto');
		if (!is_object($dahuavto)) {
            log::add('dahuavto', 'debug', __('Aucun équipement trouvé pour : ', __FILE__) . secureXSS($id));
			event::add('jeedom::alert', array(
				'level' => 'warning',
				'page' => 'dahuavto',
				'message' => '',
			));
		}

        foreach ($dahuavto->getCmd('info') as $cmd) {
            $logicalId = $cmd->getLogicalId();
			if ($logicalId != '' && array_key_exists($logicalId, $data)) {
                log::add('dahuavto', 'debug', 'Update the command ' . $logicalId . ' with value ' . $data[$logicalId]);
				$dahuavto->checkAndUpdateCmd($cmd, $data[$logicalId]);
			}
        }
	}
}