<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class BannersExport implements WithColumnFormatting, FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    private $bannersDownload;


    public function headings(): array
    {
        return [
            'Espacio procedencia',
            'Nombre cuerpo académico, red o grupo',
            'Área temática',
            'Descripción',
            'Lider',
            'Integrantes',
            'Colaboradores',
            'Telefono',
            'Correo electrónico',
            'x',
            'Facebook',
            'Youtube',
            'Otra red social'
        ];
    }
    public function __construct($bannersDownload)
    {
        $this->bannersDownload = $bannersDownload;
    }

    public function collection()
    {
        return $this->bannersDownload;
    }


    public function columnFormats(): array
    {
        return [
            'H' => NumberFormat::FORMAT_NUMBER,

        ];
    }
}

