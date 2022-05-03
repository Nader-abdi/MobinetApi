<?php

namespace MobinetApi\Response;

use Spatie\DataTransferObject\DataTransferObject;

class Meta extends DataTransferObject
{
	public int $totalCount;
	public int $pageCount;
	public int $currentPage;
	public int $perPage;
}
