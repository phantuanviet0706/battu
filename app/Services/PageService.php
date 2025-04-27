<?php
	namespace App\Services;

	use App\Shared\Calculator;
	use Illuminate\Http\Request;

	class PageService
	{
	    public function calculate($date_time)
	    {
			$agricultural = Calculator::calculateAgricultural($date_time);
			$heavenly_stem = Calculator::calculateHeavenlyStem($date_time);
			$earthly_branch = Calculator::calculateEarthlyBranch($date_time);
			$heavenly_stem_month = Calculator::calculateHeavenlyStemMonth($date_time);
			$earthly_branch_month = Calculator::calculateEarthlyBranchMonth($date_time);
			$heavenly_stem_day = Calculator::calculateHeavenlyStemDay($date_time);
			$earthly_branch_day = Calculator::calculateEarthlyBranchDay($date_time);
		
			return (object) [
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
				'jdn' => Calculator::gregorianToJDN($date_time),
			];
		}
	}
?>