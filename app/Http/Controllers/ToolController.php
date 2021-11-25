<?php

namespace App\Http\Controllers;

use App\Models\Tool;
use App\Models\User;
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
        $tools = Tool::all();
        $authUser = auth()->user()->id;
//        return $tools;
        return view('pages.toolList.index', compact(['tools', 'authUser']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.toolList.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image_name = null;
        $dest = 'storage/toolsImage/'; //Image Directory
        if (($file = $request->file('image')) != null) {
            $image_name = uniqid() . "." . $request->image->getClientOriginalExtension();
            //Upload file
            $move = $file->move(public_path($dest), $image_name);
        }

        auth()->user()->tools()->create([
            'user_id' => auth()->user()->id,
            'tool_name' => $request->tool_name,
            'location' => $request->location,
            'picture' => $image_name
        ]);
        return redirect(route('tools.index'))->with('message', 'Tool saved successfully!');


//        auth()->user()->tools()->create([
//            'user_id' => auth()->user()->id,
//            'tool_name' => $request->tool_name,
//            'location' => $request->location,
//            'availability' => $request->availability,
//            'picture'=> null,
//            'borrowed_user_id' => $request->borrowed_user_id,
//            'end_of_borrowed' => $request->end_of_borrowed
//        ]);
//
//        return 'Tool saved successfully.';
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
        $this->abortUnless($tool);

        return view('pages.toolList.edit');
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
        if ($tool) {
            $tool->update([
                'user_id' => auth()->user()->id,
                'tool_name' => $request->tool_name,
                'location' => $request->location,
                'availability' => $request->availability,
                'borrowed_user_id' => $request->borrowed_user_id,
                'end_of_borrowed' => $request->end_of_borrowed
            ]);
            return redirect(route('tools.index'))->with('message', 'Tool updated successfully!');
        }
        return redirect(route('events.index'))->with('message', 'Event not found!');

//        $tool = Tool::findOrFail($id);
//        $this->abortUnless($tool);
//        if($tool){
//            $tool->update([
//                'user_id' => auth()->user()->id,
//                'tool_name' => $request->tool_name,
//                'location' => $request->location,
//                'availability' => $request->availability,
//                'borrowed_user_id' => $request->borrowed_user_id,
//                'end_of_borrowed' => $request->end_of_borrowed
//            ]);
//            return "Tool updated successfully!";
//        }
//
//        return "Tool not found!";
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
        if ($tool) {
            $tool->delete();
            return redirect()->back()->with('message', 'Tool deleted successfully.');
        }
        return redirect()->back()->with('message', 'Tool deleted successfully.');

//        $tool = Tool::findOrFail($id);
//        $this->abortUnless($tool);
//        if($tool){
//            $tool->delete();
//            return "Tool deleted successfully!";
//        }
//        return "Tool not found!";
    }

    public function abortUnless($tool)
    {
        abort_unless(auth()->user()->owns($tool), 403);
    }

    public function endborrow($id){
        $tool = Tool::findOrFail($id);
        $tool->update([
            'availability' => true,
            'borrowed_user_id' => null,
            'end_of_borrowed' => null
        ]);
        return redirect()->back();
//        return "End borrowed";
    }

    public function borrow($id, Request $request){
        $tool = Tool::findOrFail($id);
        $tool->update([
            'availability' => false,
            'borrowed_user_id' => auth()->user()->id,
            'end_of_borrowed' => $request->date
        ]);
        return redirect()->back();
//        return 'You borrow this tool!';
    }
}
