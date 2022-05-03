<?php

namespace MobinetApi\Response;

use Spatie\DataTransferObject\DataTransferObject;

class Geo extends DataTransferObject
{
	public string $country;
	public string $city;
	public string $image;
}
