<?php

namespace MobinetApi\Response\Device;

use Spatie\DataTransferObject\DataTransferObject;

class AvailableDevice extends DataTransferObject
{
	/** @var \MobinetApi\Response\Device\Items[] $items */
	public array $items;
    /**
     * @var \MobinetApi\Response\Device\Links
     */
	public  $_links;
    /**
     * @var \MobinetApi\Response\Device\Meta
     */
	public  $_meta;
}
