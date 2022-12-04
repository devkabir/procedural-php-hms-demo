<?php
sscanf($request_uri, "/doctor/%s", $doctor_uri);
var_dump($doctor_uri);