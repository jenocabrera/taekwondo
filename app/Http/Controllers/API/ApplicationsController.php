<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;
use Validator;

use App\Application;

use App\Http\Resources\ApplicationsResource;
use App\Http\Resources\ApplicationResource;

class ApplicationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		$where = [
			['deprecated', '=', 0]
		];

		if ($request->input('first_name') AND $request->input('first_name') != null AND $request->input('first_name') != '') {
			$where[] = [
				'first_name', '=', $request->input('first_name')
			];
		}

		$order = 'asc';
		if ($request->input('order') AND $request->input('order') != null AND $request->input('order') != '') {
			if ($request->input('order') == 'asc' OR $request->input('order') == 'desc') {
				$order = $request->input('order');
			}
		}

        $applications = Application::where($where)->orderBy('id', $order)->paginate();

        return new ApplicationsResource($applications);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
			'first_name' => 'nullable',
			'last_name' => 'nullable'
        ];

        $_application = $request->input();

        $validator = Validator::make($_application, $rules);

        if ($validator->fails()) {
			$errors = $validator->errors()->toArray();

			$data = [
				'status' => 'Fail',
				'errors' => $errors
			];
        } else {
			DB::beginTransaction();

			$application = new Application($_application);
			$application->save();
			
			DB::commit();

			$application_resource = new ApplicationResource($application);

			$data = [
				'status' => 'Success',
				'data' => [
					'id' => $application->id,
					'application' => $application_resource
				]
			];
        }
		
		return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		$where = [
			['deprecated', '=', 0],
			['id', '=', $id]
		];
        $application = Application::where($where)->first();
		
		if ($application) {
			return new ApplicationResource($application);
		} else {
			$errors = [
				'Application does not exist!'
			];

			$data = [
				'status' => 'Fail',
				'errors' => $errors
			];				
			
			return response()->json($data);
		}
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
			'first_name' => 'nullable',
			'last_name' => 'nullable'
        ];

        $_application = $request->input();

        $validator = Validator::make($_application, $rules);

        if ($validator->fails()) {
			$errors = $validator->errors()->toArray();

			$data = [
				'status' => 'Fail',
				'errors' => $errors
			];
        } else {
            DB::beginTransaction();

			$where = [
				['deprecated', '=', 0],
				['id', '=', $id]
			];
			$application = Application::where($where)->first();
			
			if ($application) {
				$application->fill($_application);
				$application->save();

				DB::commit();
				
				$application_resource = new ApplicationResource($application);

				$data = [
					'status' => 'Success',
					'data' => [
						'id' => $application->id,
						'application' => $application_resource
					]
				];
			} else {
				DB::rollback();

				$errors = [
					'Application does not exist!'
				];

				$data = [
					'status' => 'Fail',
					'errors' => $errors
				];
			}
        }
		
		return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
