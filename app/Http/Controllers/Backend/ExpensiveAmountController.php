<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ExpensiveType;
use App\Models\ExpensiveAmount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Log;

class ExpensiveAmountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expensiveTypes = ExpensiveType::all();
        $expensiveAmounts = ExpensiveAmount::all();
        return view('backend.expensive_amount.manage', compact('expensiveTypes', 'expensiveAmounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'expensive'         => 'required',
            'expensive_amount'  => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages()
            ]);
        } else {
            # code...
            $expensiveAmount = new ExpensiveAmount;

            $expensiveAmount->name  = $request->expensive;
            $expensiveAmount->amount  = $request->expensive_amount;

            $expensiveAmount->save();
            return response()->json([
                'status' => 200,
                'message' => "Added Successfully"
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $id = $request['id'];
        $expensiveAmount = ExpensiveAmount::find($id);
        // log::info($user);
        return response()->json($expensiveAmount);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // Log::info($id);
        $validator = Validator::make($request->all(), [
            'expensive'              => 'required',
            'expensive_amount'       => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages()
            ]);
        } else {
            # code...
            $expensiveAmount = ExpensiveAmount::find($request->expensiveType_id);
            Log::info($expensiveAmount);

            $expensiveAmount->name       = $request->expensive;
            $expensiveAmount->amount       = $request->expensive_amount;
            $expensiveAmount->save();
            return response()->json([
                'status' => 200,
                'message' => "Updated Successfully"
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        // log::info($id);
		$expensiveAmount = ExpensiveAmount::find($id);

		ExpensiveAmount::destroy($id);
        return response()->json([
            'status' => 200,
            'messages' => 'Deleted Successfully'
        ]);
    }
}
