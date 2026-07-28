<?php

namespace App\Exports;

use App\Models\Boq;
use App\Models\BoqQuantityDetail;
use App\Models\BoqQuantityDetails;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class BoqQuantityDetailExport implements FromArray, WithStyles
{
    /**
     * @return \Illuminate\Support\Collection
     */

    protected $boq;

    public function __construct(Boq $boq)
    {
        $this->boq = $boq;
    }



    public function array(): array
    {
        $rows = [];

        // Header
        $rows[] = ['BOQ No :', $this->boq->boq_no];
        $rows[] = ['Project Code :', $this->boq->project?->client?->project_code ?? ''];
        $rows[] = ['Client :', $this->boq->project?->client?->name ?? ''];
        $rows[] = ['Date :', now()->format('d-M-Y')];
        $rows[] = [];

        // Table Header
        $rows[] = ['Item No', 'Description', 'Unit', 'Quantity'];

        foreach ($this->boq->boqQuantityDetails as $detail) {

            $rows[] = [
                $detail->item_no,
                $detail->title,
                $detail->unit,
                $detail->quantity,
            ];
        }

        return $rows;
    }

    public function styles(Worksheet $sheet)
    {
        $styles = [

            1 => ['font' => ['bold' => true]],
            2 => ['font' => ['bold' => true]],
            3 => ['font' => ['bold' => true]],
            4 => ['font' => ['bold' => true]],
            6 => ['font' => ['bold' => true]],

        ];

        $rowNo = 7;

        foreach ($this->boq->boqQuantityDetails as $detail) {

            if ($detail->type == 'section') {

                $styles[$rowNo] = [
                    'font' => [
                        'bold' => true,
                        'size' => 12,
                    ],
                ];
            }

            $rowNo++;
        }

        return $styles;
    }
}


// public function collection()
    // {
    //     return BoqQuantityDetails::where(
    //         'boq_id',
    //         $this->boqId
    //     )->select(
    //         'item_no',
    //         'title',
    //         'unit',
    //         'quantity'
    //     )->get();
    // }
