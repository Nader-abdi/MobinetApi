<?php

namespace MobinetApi\Response\Device;

use Spatie\DataTransferObject\DataTransferObject;

class Isp extends DataTransferObject
{
	public string $name_default;
	public string $name_ru;
	public string $name_en;
	public string $image;
}
