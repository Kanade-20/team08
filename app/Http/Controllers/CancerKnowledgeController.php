<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CancerKnowledgeController extends Controller
{
    //
    public function index() {
        return view("cancer-knowledge.index");
    }
}
