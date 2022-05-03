<?php

namespace MobinetApi\Response;

use Spatie\DataTransferObject\DataTransferObject;

class HourlyActivity extends DataTransferObject
{
	public string $date;

	/** @var int[] $hours */
	public array $hours;
}
