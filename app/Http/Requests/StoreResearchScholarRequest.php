<?php

namespace App\Http\Requests;

use App\Models\ResearchScholar;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreResearchScholarRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('research_scholar_create');
    }

    public function rules()
    {
        return [
            'registration_id' => [
                'required',
                'integer',
            ],
            'status' => [
                'required',
            ],
            'admission_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'supervisor_id' => [
                'required',
                'integer',
            ],
            'supervisor_name' => [
                'string',
                'nullable',
            ],
            'co_supervisor_name' => [
                'string',
                'nullable',
            ],
            'research_topic' => [
                'string',
                'required',
            ],
            'bos_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'casr_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'paper_2' => [
                'string',
                'nullable',
            ],
            'paper_3' => [
                'string',
                'nullable',
            ],
            'paper_4' => [
                'string',
                'nullable',
            ],
            'pre_submission_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'submission_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
