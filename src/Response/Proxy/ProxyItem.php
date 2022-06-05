<?php

namespace MobinetApi\Response\Proxy;

use MobinetApi\Response\DaysActivity;
use MobinetApi\Response\Geo;
use MobinetApi\Response\Isp;
use Spatie\DataTransferObject\FlexibleDataTransferObject;

class ProxyItem extends FlexibleDataTransferObject
{
	public int $id;
	public $contact_name;
	public $price;
	public $contact_type;
	public int $sharing_type;
	public string $name;
	public int $device_id;
	public string $device_name;
	public int $version_type;
	public int $type;
	public int $status;
	public int $status_device;
	public int $data_usage_in;
	public int $data_usage_out;
	public int $traffic;
	public int $data_usage_day_out;
	public int $data_usage_day_in;
	public Geo $geo;
	public string $location;
	public Isp $isp;
	public  $rotating;
	public bool $on_rotate;
	public int $internet_type;
	public $proxy_limit_time;
	public $proxy_limit_day;
	public $proxy_limit_total;
	public $time_left;
	public int $count_proxy_on_device;
	public int $count_active_proxy_on_device;
	public int $created_at;
	public bool $can_delete;
	public string $device_token;
	public $comment;
	public int $access_type;
	public string $auth_login;
	public string $auth_pass;
	public $auth_ips;
	public string $current_ip;
	public string $ip_port;
	public DaysActivity $days_activity;
	public int $uptime;
	public $is_owner;

	/** @var \MobinetApi\Response\HourlyActivity[] $hourly_activity */
	public array $hourly_activity;
	public string $sharing_link;
}
