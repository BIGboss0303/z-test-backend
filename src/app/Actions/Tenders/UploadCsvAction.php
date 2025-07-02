<?php
namespace App\Actions\Tenders;

use Carbon\Carbon;
use App\Models\Tender;
use Illuminate\Support\Facades\DB;

class UploadCsvAction{
    public function __invoke($request){
        $path = $request->file('csv_file')->getRealPath();
        $file = fopen($path, 'r');
        $columns = [
            'external_code', 'number', 'status', 'name', 'updated_at'
        ];
        try{
            fgetcsv($file); // пропускаем первую строку
            DB::beginTransaction();
            while (($row = fgetcsv($file)) !== false) {
                $data = array_combine($columns, $row);
                $data['updated_at'] = Carbon::createFromFormat('d.m.Y H:i:s', $data['updated_at'])->format('Y-m-d H:i:s');
                Tender::create($data);
            }
            DB::commit();
            return response()->json('CSV uploaded successfully.');

        }
        catch(\Exception $e){
            DB::rollback();
            fclose($file);
            return response()->json($e);
        }
    }
}