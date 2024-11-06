<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class TrashController extends Controller
{
   public function index(){
    // $users = User::onlyTrashed()->orderBy('id', 'updated_at')->paginate(10);
    $users = User::onlyTrashed()
                    ->orderByDesc('updated_at')
                    ->paginate(10);
    return view('Dashboard.admin.trash.index', compact('users'));
   }
   public function undo($id){
    $user = User::withTrashed()->find($id);
    if ($user) {
        $user->restore(); // Restore the user
    }
    return redirect()->route('admin.trash.index')->with('success', 'User Reverted successfully!');

}

public function search(Request $request)
{
    // Retrieve the search value from the request
    $searchValue = $request->input('search');

    // Search the soft-deleted users table for matching values in name, email, phone, city, etc.
    $query = User::onlyTrashed()
        ->where(function ($q) use ($searchValue) {
            $q->where('name', 'LIKE', '%' . $searchValue . '%')
                ->orWhere('email', 'LIKE', '%' . $searchValue . '%')
                ->orWhere('phone', 'LIKE', '%' . $searchValue . '%')
                ->orWhere('city', 'LIKE', '%' . $searchValue . '%')
                ->orWhere('country', 'LIKE', '%' . $searchValue . '%')
                ->orWhere('state', 'LIKE', '%' . $searchValue . '%')
                ->orWhere('postal_code', 'LIKE', '%' . $searchValue . '%')
                ->orWhereDate('date_of_birth', $searchValue);
        });

    // Paginate the results
    $users = $query->orderBy('id', 'DESC')->paginate(10);

    // Return view with search results
    return view('Dashboard.admin.trash.index', compact('users'));
}

}
