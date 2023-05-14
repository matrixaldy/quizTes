<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Session;

class QuestionImport implements ToModel, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        $data = array(
            'question' => $row['question'],
            'score' => $row['score'],
            'jawaban' => $row['jawaban'],
            'pilihan_1' => $row['pilihan_1'],
            'pilihan_2' => $row['pilihan_2'],
            'pilihan_3' => $row['pilihan_3'],
            'pilihan_4' => $row['pilihan_4'],
        );

        return Session::push('questions', $data);
    }
}
