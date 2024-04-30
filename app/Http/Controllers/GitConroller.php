<?php

namespace App\Http\Controllers;

use GrahamCampbell\GitHub\Facades\GitHub;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GitConroller extends Controller
{
    public function allRepositories()
    {
        return GitHub::me()->repositories(['affiliation' => 'owner,organization']);
    }
    
}
