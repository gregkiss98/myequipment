<?php

namespace App\Http\Controllers;

use App\Models\Tool;
use Illuminate\Http\Request;

class ToolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tools = auth()->user()->tools()->get();
        return $tools;
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        auth()->user()->tools()->create([
            'user_id' => auth()->user()->id,
            'tool_name' => $request->tool['tool_name'],
            'location' => $request->tool['location'],
            'availability' => $request->tool['availability'],
            'borrowed_user_id' => $request->tool['borrowed_user_id'],
            'end_of_borrowed' => $request->tool['end_of_borrowed']
        ]);

        return 'Tool saved successfully.';
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Tool $tool
     * @return \Illuminate\Http\Response
     */
    public function show(Tool $tool)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Tool $tool
     * @return \Illuminate\Http\Response
     */
    public function edit(Tool $tool)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Tool $tool
     * @return \Illuminate\Http\Response
     */
//    public function update(Request $request, Tool $tool)
    public function update(Request $request, $id)
    {
        $tool = Tool::findOrFail($id);
        $this->abortUnless($tool);
        if($tool){
            $tool->update([
                'user_id' => auth()->user()->id,
                'tool_name' => $request->tool['tool_name'],
                'location' => $request->tool['location'],
                'availability' => $request->tool['availability'],
                'borrowed_user_id' => $request->tool['borrowed_user_id'],
                'end_of_borrowed' => $request->tool['end_of_borrowed']
            ]);
            return "Tool updated successfully!";
        }

        return "Tool not found!";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Tool $tool
     * @return \Illuminate\Http\Response
     */
//    public function destroy(Tool $tool)
    public function destroy($id)
    {
        $tool = Tool::findOrFail($id);
        $this->abortUnless($tool);
        if($tool){
            $tool->delete();
            return "Tool deleted successfully!";
        }
        return "Tool not found!";
    }

    public function abortUnless($tool)
    {
        abort_unless(auth()->user()->owns($tool), 403);
    }
}
