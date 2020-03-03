<?php


namespace App\Http\Requests;


class SheatsheetRequest extends BaseRequest
{
    public function rules()
    {
        switch ($this->method()) {
            case 'POST':
                return [
                    'title' => ['required', 'string', 'max:100'],
                    'pic' => ['required', 'string'],
                    'tags' => ['required'],
                    'desc' => ['required', 'string'],
                    'status' => ['required', 'int'],
                ];
                break;
            case 'PATCH':
                return [
                    'title' => ['string', 'max:100'],
                    'pic' => ['string'],
                    'tags' => [],
                    'desc' => ['string'],
                    'status' => ['int'],
                ];
                break;
        }
    }

    public function attributes()
    {
        return [
            'title' => '标题',
            'pic' => '展示图',
            'tags' => '标签',
            'desc' => '描述',
            'status' => '状态',
        ];
    }
}
