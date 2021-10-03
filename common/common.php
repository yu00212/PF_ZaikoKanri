<?php

function err_common($e, $smarty)
{
	$err['exception'] = $e->getMessage();
	$smarty->assign('err', $err);

	if (isset($err['exception'])) {
		$smarty->display('../smarty/templates/err.tpl');
	}
	return;
}
