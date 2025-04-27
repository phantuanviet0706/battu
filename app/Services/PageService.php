<?php
	namespace App\Services;

	use App\Shared\Calculator;
use App\Shared\Helper;
use Illuminate\Http\Request;

	class PageService
	{
	    public function calculate($date_time)
	    {
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
			
			$res_heavenly_stem_month = Calculator::calculateHeavenlyStemMonth($date_time);
			if (!$res_heavenly_stem_month->code) {
				return Helper::release('Invalid Heavenly Stem by month data, please check and try again.');
			}
			$heavenly_stem_month = $res_heavenly_stem_month->data;
			
			$res_earthly_branch_month = Calculator::calculateEarthlyBranchMonth($date_time);
			if (!$res_earthly_branch_month->code) {
				return Helper::release('Invalid Earthly Branch by month data, please check and try again.');
			}
			$earthly_branch_month = $res_earthly_branch_month->data;
			
			$res_heavenly_stem_day = Calculator::calculateHeavenlyStemDay($date_time);
			if (!$res_heavenly_stem_day->code) {
				return Helper::release('Invalid Heavenly Stem by day data, please check and try again.');
			}
			$heavenly_stem_day = $res_heavenly_stem_day->data;
			
			$earthly_branch_day = Calculator::calculateEarthlyBranchDay($date_time);
			$jdn_day = Calculator::gregorianToJDN($date_time);

			return (object) [
				'message' => 'Get data successfully',
				'code' => 1,
				'data' => (object) [
					'input' => (object) [
						'day' => date('d', strtotime($date_time)),
						'month' => date('m', strtotime($date_time)),
						'year' => date('Y', strtotime($date_time)),
						'hour' => date('H', strtotime($date_time)),
						'minute' => date('i', strtotime($date_time)),
					],
					'agricultural' => $agricultural,
					'heavenly_stem' => $heavenly_stem,
					'earthly_branch' => $earthly_branch,
					'heavenly_stem_month' => $heavenly_stem_month,
					'earthly_branch_month' => $earthly_branch_month,
					'heavenly_stem_day' => $heavenly_stem_day,
					'earthly_branch_day' => $earthly_branch_day,
					'jdn' => $jdn_day,
				]
			];
		}
	}
?>