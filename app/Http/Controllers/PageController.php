<?php

    namespace App\Http\Controllers;

use App\Http\Requests\PageRequest;
use App\Services\PageService;
    use Illuminate\Http\Request;

    class PageController extends Controller
    {

        protected $page_service;

        public function __construct(PageService $page_service)
        {
            $this->page_service = $page_service;
        }

        public function showForm()
        {
            return view('page.form');
        }

        public function calculate(PageRequest $request)
        {
            $data = $request->validated();
            $datetime = $request->input('datetime');

            $result = $this->page_service->calculate($datetime);
            if (!$result->code) {
                return redirect()->back()->withErrors($result->message);
            }
            $result = $result->data;

            return view('page.result', compact('result'));
        }
    }

?>