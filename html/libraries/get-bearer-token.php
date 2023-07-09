<?php

function getBearerToken() {
    $headers = apache_request_headers();
    $token = isset($headers['Authorization']) ? $headers['Authorization'] : null;
    return $token;
}