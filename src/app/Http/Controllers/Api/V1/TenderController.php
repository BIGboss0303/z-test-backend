<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Tender;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Actions\Tenders\UploadCsvAction;
use App\Actions\Tenders\GetTendersAction;
use App\Http\Requests\Tender\UploadCsvRequest;
use App\Http\Resources\Tenders\TenderResource;
use App\Http\Requests\Tender\StoreTenderRequest;

class TenderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, GetTendersAction $action)
    {
        return $action($request);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTenderRequest $request)
    {
        $data = $request->validated();
        $tender = Tender::create($data);
        return response()->json(new TenderResource($tender), 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Tender $tender)
    {
        return response()->json(new TenderResource($tender));
    }

    /**
     * Upload Csv.
     */
    public function uploadCsv(UploadCsvRequest $request, UploadCsvAction $action){
        return $action($request);
    }
}
