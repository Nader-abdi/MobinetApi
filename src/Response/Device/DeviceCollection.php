<?php

namespace MobinetApi\Response\Device;

use Spatie\DataTransferObject\DataTransferObject;

class DeviceCollection extends DataTransferObject
{
	/** @var \MobinetApi\Response\Device\DeviceItem[] $items */
	public array $items;
    /**
     * @var \MobinetApi\Response\Links
     */
	public \MobinetApi\Response\Links $_links;
    /**
     * @var \MobinetApi\Response\Meta
     */
	public \MobinetApi\Response\Meta $_meta;
}
