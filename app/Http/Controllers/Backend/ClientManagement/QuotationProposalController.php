<?php

namespace App\Http\Controllers\Backend\ClientManagement;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\ProjectCategory;
use App\Models\WorkScope;
use Illuminate\Http\Request;

class QuotationProposalController extends Controller
{
    public function index()
    {
        return view('admin.backend.clientmanage.quotation-proposal.index');
    }

    public function create()
    {
        $clients = Client::all();
        // $project_categories = ProjectCategory::all();
        $workscopes = WorkScope::all();
        return view('admin.backend.clientmanage.quotation-proposal.create', compact('clients','workscopes'));
    }
}
