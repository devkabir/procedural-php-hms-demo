<?php
sscanf($request_uri, "/patient/%s", $patient_uri);
var_dump($patient_uri);