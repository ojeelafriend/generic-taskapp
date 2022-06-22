<?php

require_once(__DIR__ . '../../Shared/domain/Session.php');

echo json_encode(Session::getValue());
