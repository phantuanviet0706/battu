<?php

namespace App\Services;

use App\Shared\Calculator;
use App\Shared\Date;
use App\Shared\Helper;
use Illuminate\Http\Request;

class PageService
{
	public function calculate($request)
	{
		$name = $request['name'];
		$gender = $request['gender'];
		$birth_date = $request['birth_date'];
		$birth_time = $request['birth_time'];
		$date_time = strtotime("$birth_date $birth_time");
		$res_agricultural = Calculator::calculateAgricultural($date_time);
		if (!$res_agricultural->code) {
			return Helper::release('Invalid Agricultural data, please check and try again.');
		}
		$agricultural = $res_agricultural->data;

		$res_heavenly_stem = Calculator::calculateHeavenlyStem($date_time);
		if (!$res_heavenly_stem->code) {
			return Helper::release('Invalid Heavenly Stem data, please check and try again.');
		}
		$heavenly_stem = $res_heavenly_stem->data;

		$res_earthly_branch = Calculator::calculateEarthlyBranch($date_time);
		if (!$res_earthly_branch->code) {
			return Helper::release('Invalid Earthly Branch data, please check and try again.');
		}
		$earthly_branch = $res_earthly_branch->data;

		$heavenly_stem_month = null;
		$res_heavenly_stem_month = Calculator::calculateHeavenlyStemMonth($date_time);
		if (!$res_heavenly_stem_month->code) {
			return Helper::release('Invalid Heavenly Stem by month data, please check and try again.');
		}
		$heavenly_stem_month = $res_heavenly_stem_month->data;

		$earthly_branch_month = null;
		$res_earthly_branch_month = Calculator::calculateEarthlyBranchMonth($date_time);
		if (!$res_earthly_branch_month->code) {
			return Helper::release('Invalid Earthly Branch by month data, please check and try again.');
		}
		$earthly_branch_month = $res_earthly_branch_month->data;

		$res_heavenly_stem_day = Calculator::calculateHeavenlyStemDay($date_time);
		\Log::channel('custom')->info('Heavenly Stem Day', ['data' => $res_heavenly_stem_day]);
		if (!$res_heavenly_stem_day->code) {
			return Helper::release('Invalid Heavenly Stem by day data, please check and try again.');
		}
		$heavenly_stem_day = $res_heavenly_stem_day->data;

		$res_earthly_branch_day = Calculator::calculateEarthlyBranchDay($date_time);
		if (!$res_earthly_branch_day->code) {
			return Helper::release('Invalid Earthly Branch by day data, please check and try again.');
		}
		$earthly_branch_day = $res_earthly_branch_day->data;

		$is_input_time = $request['is_input_time'];
		$res_heavenly_stem_hour = Calculator::calculateHeavenlyStemHour($date_time, $is_input_time);
		$heavenly_stem_hour = isset($res_heavenly_stem_hour->data) ? $res_heavenly_stem_hour->data : null;

		$res_earthly_branch_hour = Calculator::calculateEarthlyBranchHour($date_time, $is_input_time);
		$earthly_branch_hour = isset($res_earthly_branch_hour->data) ? $res_earthly_branch_hour->data : null;

		$res_hidden_stem = Calculator::calculateHiddenStems((object) [
			'heavenly_stem' => $heavenly_stem,
			'earthly_branch' => $earthly_branch,
			'heavenly_stem_month' => $heavenly_stem_month,
			'earthly_branch_month' => $earthly_branch_month,
			'heavenly_stem_day' => $heavenly_stem_day,
			'earthly_branch_day' => $earthly_branch_day,
			'heavenly_stem_hour' => $heavenly_stem_hour,
			'earthly_branch_hour' => $earthly_branch_hour,
		]);
		$res_hidden_stem = $res_hidden_stem->data;
		
		$heavenly_stem->hidden_stem_by_year = $res_hidden_stem->hidden_stem_by_year;
		$heavenly_stem->hidden_hs_in_eb_by_year = $res_hidden_stem->hidden_hs_in_eb_by_year;

		$heavenly_stem_month->hidden_stem_by_month = $res_hidden_stem->hidden_stem_by_month;
		$heavenly_stem_month->hidden_hs_in_eb_by_month = $res_hidden_stem->hidden_hs_in_eb_by_month;
		
		$heavenly_stem_day->hidden_stem_by_day = $res_hidden_stem->hidden_stem_by_day;
		$heavenly_stem_day->hidden_hs_in_eb_by_day = $res_hidden_stem->hidden_hs_in_eb_by_day;

		if ($heavenly_stem_hour) {
			$heavenly_stem_hour->hidden_stem_by_hour = $res_hidden_stem->hidden_stem_by_hour;
			$heavenly_stem_hour->hidden_hs_in_eb_by_hour = $res_hidden_stem->hidden_hs_in_eb_by_hour;
		}

		$jdn_day = Calculator::gregorianToJDN($date_time);

		list($lDay, $lMonth, $lYear, $isLeap) = Date::convertSolar2Lunar(
			date('d', $date_time),
			date('m', $date_time),
			date('Y', $date_time)
		);

		$res_elemental_sound = Calculator::calculateElementalSound((object) [
			'heavenly_stem' => $heavenly_stem,
			'earthly_branch' => $earthly_branch,
			'heavenly_stem_month' => $heavenly_stem_month,
			'earthly_branch_month' => $earthly_branch_month,
			'heavenly_stem_day' => $heavenly_stem_day,
			'earthly_branch_day' => $earthly_branch_day,
			'heavenly_stem_hour' => $heavenly_stem_hour,
			'earthly_branch_hour' => $earthly_branch_hour,
		]);
		$elemental_sound = null;
		if ($res_elemental_sound) {
			$elemental_sound = $res_elemental_sound->data;
		}

		$res_growth_stage = Calculator::calculateGrowthStage((object) [
			'heavenly_stem' => $heavenly_stem,
			'earthly_branch' => $earthly_branch,
			'heavenly_stem_month' => $heavenly_stem_month,
			'earthly_branch_month' => $earthly_branch_month,
			'heavenly_stem_day' => $heavenly_stem_day,
			'earthly_branch_day' => $earthly_branch_day,
			'heavenly_stem_hour' => $heavenly_stem_hour,
			'earthly_branch_hour' => $earthly_branch_hour,
		]);

		$growth_stage = null;
		if ($res_growth_stage) {
			$growth_stage = $res_growth_stage->data;
		}

		// $res_shensha = Calculator::calculateShenshaSystem((object) [
		// 	'heavenly_stem' => $heavenly_stem,
		// 	'earthly_branch' => $earthly_branch,
		// 	'heavenly_stem_month' => $heavenly_stem_month,
		// 	'earthly_branch_month' => $earthly_branch_month,
		// 	'heavenly_stem_day' => $heavenly_stem_day,
		// 	'earthly_branch_day' => $earthly_branch_day,
		// 	'heavenly_stem_hour' => $heavenly_stem_hour,
		// 	'earthly_branch_hour' => $earthly_branch_hour,
		// ]);
		// if (!$res_shensha->code) {
		// 	return Helper::release('Invalid Shensha data, please check and try again.');
		// }

		return (object) [
			'message' => 'Get data successfully',
			'code' => 1,
			'data' => (object) [
				'name' => $name,
				'gender' => $gender,
				'input' => (object) [
					'day' => date('d', $date_time),
					'month' => date('m', $date_time),
					'year' => date('Y', $date_time),
					'hour' => date('H', $date_time),
					'minute' => date('i', $date_time),
					'lunar_day' => $lDay,
					'lunar_month' => $lMonth,
					'lunar_year' => $lYear,
					'lunar_isLeap' => $isLeap,
				],
				'agricultural' => $agricultural,
				'heavenly_stem' => $heavenly_stem,
				'earthly_branch' => $earthly_branch,
				'heavenly_stem_month' => $heavenly_stem_month,
				'earthly_branch_month' => $earthly_branch_month,
				'heavenly_stem_day' => $heavenly_stem_day,
				'earthly_branch_day' => $earthly_branch_day,
				'heavenly_stem_hour' => $heavenly_stem_hour,
				'earthly_branch_hour' => $earthly_branch_hour,
				'jdn' => $jdn_day,
				'data_sound' => $elemental_sound,
				'data_growth_stage' => $growth_stage
			]
		];
	}
}
