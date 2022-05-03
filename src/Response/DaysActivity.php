<?php

namespace MobinetApi\Response;

use Spatie\DataTransferObject\DataTransferObject;

class DaysActivity extends DataTransferObject
{
	public int $average;

	/** @var int[] $per_day */
	public array $per_day;
}
