<?php

namespace App\Models;

use App\Exports\ResidentExport;
use App\Exports\ResidentInternoExport;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Maatwebsite\Excel\Facades\Excel;

class Resident extends Model
{
    use HasFactory;



    static function query_monthly_withoutf(){
        $residents = Resident::all();
        return $residents;
    }

    public function instrument_status()
    {
    	return $this->hasOne(ResidentInstrumentStatus::class, 'resident_id' , 'id');
    }

    static function generate_report_monthly_excel($result_query)
    {
        
         (new ResidentExport($result_query))->store('reportes-mensuals.csv');
         $filename = 'reportes-mensuals.csv';
         $filepath = storage_path('app/reportes-mensuals.csv');
         header('Content-Description: File Transfer');
         header('Content-Type: application/octet-stream');
         header('Content-Disposition: attachment; filename="'.$filename.'"');
         header('Expires: 0');
         header('Cache-Control: must-revalidate');
         header('Pragma: public');
         header('Content-Length: ' . filesize($filepath));
         flush(); // Flush system output buffer
         readfile($filepath);
         exit;
    }
    static function generate_report_internal_excel($result_query)
    {
        
         (new ResidentInternoExport($result_query))->store('reportes-interno.csv');
         $filename = 'reportes-interno.csv';
         $filepath = storage_path('app/reportes-interno.csv');
         header('Content-Description: File Transfer');
         header('Content-Type: application/octet-stream');
         header('Content-Disposition: attachment; filename="'.$filename.'"');
         header('Expires: 0');
         header('Cache-Control: must-revalidate');
         header('Pragma: public');
         header('Content-Length: ' . filesize($filepath));
         flush(); // Flush system output buffer
         readfile($filepath);
         exit;
    }

    public function scopeSexo($query,$sexo)
    {   
        if ($sexo != null)
        {
            $query->where('genre','=', $sexo);
                
        }
         return $query;
    }

    public function scopeDateIngreso($query,$fecha_ingreso)
    {
        if ($fecha_ingreso != null)
         {
            $query->whereDate('admission_date','>=', $fecha_ingreso);
         }

         return $query;
    }
    public function scopeDateEgreso($query,$fecha_egreso)
    {
        if ($fecha_egreso != null)
         {
            $query->whereDate('egress_date','<=', $fecha_egreso);
         }

         return $query;
    }
    public function scopeOrigin($query,$origen)
    {
        if ($origen != null)
         {
            $query->where('origin','=', $origen);
         }

         return $query;
    }
    public function scopeNacion($query,$nacion)
    {
        if ($nacion != null)
         {
            $query->where('nationality','=', $nacion);
         }

         return $query;
    }
}
