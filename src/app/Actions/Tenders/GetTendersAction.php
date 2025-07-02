<?php

namespace App\Actions\Tenders;

use Carbon\Carbon;
use App\Models\Tender;
use App\Http\Resources\Tenders\TenderCollection;

class GetTendersAction{
    public function __invoke($request)
    {
        $request->validate([
            'name' => 'string',
            'date' => 'date'
        ]);
        $tenders = Tender::orderBy('updated_at', 'desc');
        if($request->has('name')){
            $tenders = $tenders->where('name', $request->name);
        }
        if($request->has('date')){
            $date = Carbon::parse($request->date)->toDateString();
            $tenders = $tenders->whereDate('updated_at', $date);
        }
        $tenders = $tenders->simplePaginate(100);
        return response()->json(new TenderCollection($tenders));
    }
}