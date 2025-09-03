<?php

namespace App\Http\Controllers;

use App\Models\JobPortal;
use Illuminate\Http\Request;

class JobPortalDeleteController extends Controller
{
    public function destroy($id)
    {
        $jobPortal = JobPortal::find($id);
        if (!$jobPortal) {
            return response()->json(['success' => false, 'message' => 'Job portal not found.']);
        }
        $jobPortal->delete();
        return response()->json(['success' => true, 'message' => 'Job portal deleted successfully.']);
    }
}
