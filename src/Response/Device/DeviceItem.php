<?php

namespace MobinetApi\Response\Device;

use MobinetApi\Response\DaysActivity;
use MobinetApi\Response\Geo;
use MobinetApi\Response\Isp;
use Spatie\DataTransferObject\DataTransferObject;

class DeviceItem extends DataTransferObject
{
	public int $id;
	public string $current_ip;
	public $rotating;
	public int $uniq_ip;
	public $ping;
	public int $status;
	public int $battery;
	public $balance;
	public string $device_model;
	public int $data_usage_in;
	public $dns;
	public $delay_air_mode;
	public int $traffic_type;
	public int $data_usage_out;
	public int $version_type;
	public int $created_at;
	public bool $root;
	public string $name;
	public int $traffic;
	public string $device_token;
	public bool $on_rotate;
	public $phone_number;
	public string $img;
	public int $count_proxy_on_device;
	public int $count_active_proxy_on_device;
	public Isp $isp;
	public bool $is_can_delete;
	public bool $has_sold_active_proxies;
	public Geo $geo;
	public string $location;
	public DaysActivity $days_activity;
	public int $uptime;
    public $enable_local_change_ip;

	/** @var \MobinetApi\Response\HourlyActivity[] $hourly_activity */
	public array $hourly_activity;
	public bool $rotate_allowed;
	public bool $is_rotate_blocked;
	public bool $is_non_root_device_configured;
	public bool $setting_status;
	public string $server;
	public bool $remote_available;
	public bool $remote_active;
	public bool $remote_proxy_and_sms_not_sold;
}
