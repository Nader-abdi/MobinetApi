<?php

namespace MobinetApi\Response\Device;

use Spatie\DataTransferObject\DataTransferObject;

class Geo extends DataTransferObject
{
	public string $country;
	public string $city;
	public string $image;
}
