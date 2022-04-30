<?php
namespace MobinetApi\Response;

use Spatie\DataTransferObject\DataTransferObject;

class LoginResponse extends DataTransferObject
{

    public string $token;
}