<?php

namespace App\Http\Requests;

use App\Models\HostelRoom;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyHostelRoomRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('hostel_room_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:hostel_rooms,id',
        ];
    }
}
