<?php

namespace MobinetApi\Response\Proxy;

use Spatie\DataTransferObject\DataTransferObject;

class ProxyCollection extends DataTransferObject
{
	/** @var \MobinetApi\Response\Proxy\ProxyItem[] $items */
	public array $items;
	public array $_links;
	public array $_meta;
}
