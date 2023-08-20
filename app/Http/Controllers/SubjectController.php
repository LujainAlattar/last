<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;


class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subjects = Subject::all()->paginate(10);
        return view('admin.subjects.index', compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.subjects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $subject = new Subject();
        $subject->subject_name = $request->input('name');


        $subject->save();

        return redirect()->route('subject-dashboard.index')->with('flash_message', 'Subject added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $subject = Subject::find($id);
        // return view('admin.subjects.show')->with('subject', $subject);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $subject = Subject::find($id);
        return view('admin.subjects.edit')->with('subject', $subject);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $subject = Subject::find($id);
        $subject->subject_name = $request->input('name');

        $subject->save();

        return redirect()->route('subject-dashboard.index')->with('flash_message', 'Subject updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $subject = Subject::find($id);
        $subject->delete();

        return redirect()->route('subject-dashboard.index')->with('flash_message', 'Subject deleted successfully.');
    }


    public function search(Request $request)
    {
        $output = "";
        $searchTerm = $request->input('search');
        $subjects = Subject::where(function ($query) use ($searchTerm) {
                $query->where('subject_name', 'like', '%' . $searchTerm . '%');
            })
            ->get();


        foreach ($subjects as $index => $subject) {
            $output .= '
                <tr>
                    <td>' . ($index + 1) . '</td>
                    <td>' . $subject->subject_name . '</td>
                    <td>
                        <a href="' . route('subject-dashboard.edit', $subject->id) . '" class="btn" style="border: none; color: rgba(53, 211, 21, 0.814); padding: 8px 16px; text-align: center; text-decoration: none; display: inline-block; font-size: 14px; transition-duration: 0.4s; cursor: pointer; border-radius: 4px;">
                            <i class="fa fa-edit"></i>
                        </a>
                        <form action="' . route('subject-dashboard.destroy', $subject->id) . '" method="POST" style="display: inline">
                            ' . csrf_field() . '
                            ' . method_field('DELETE') . '
                            <button type="submit" class="btn" onclick="return confirm(\'Are you sure you want to delete this subject?\');" style="border: none; color: rgba(246, 16, 16, 0.7); padding: 8px 16px; text-align: center; text-decoration: none; display: inline-block; font-size: 14px; transition-duration: 0.4s; cursor: pointer; border-radius: 4px;">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>';
        }

        return $output;
    }
}
