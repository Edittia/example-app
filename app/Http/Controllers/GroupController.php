<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get groups
        $groups = Group::latest()->paginate(5);

        //render view with groups
        return view('groups.index', compact('groups'));
    }
}
