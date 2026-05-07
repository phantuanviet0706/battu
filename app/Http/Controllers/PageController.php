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

            $result = $this->page_service->calculate($request->all());
            if (!$result->code) {
                return redirect()->back()->withErrors($result->message);
            }
            $result = $result->data;

            return view('page.result', compact('result'));
        }

        public function calculateApi(PageRequest $request)
        {
            $data = $request->validated();

            $result = $this->page_service->calculate($request->all());
            if (!$result->code) {
                return response()->json([
                    'status' => 'error',
                    'message' => $result->message
                ], 400);
            }

            return response()->json([
                'status' => 'success',
                'data' => $result->data
            ], 200);
        }
    }

?>