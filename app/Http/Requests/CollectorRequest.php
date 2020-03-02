<?php


namespace App\Http\Requests;


class CollectorRequest extends BaseRequest
{
    public function rules()
    {
        switch ($this->method()) {
            case 'POST':
                return [
                    'title' => ['required', 'string', 'max:100'],
                    'pic' => ['required', 'string'],
                    'tags' => ['required'],
                    'url' => ['required', 'string'],
                    'desc' => ['required', 'string'],
                    'github' => ['string'],
                    'website' => ['string'],
                    'example' => ['string'],
                    'status' => ['required', 'int'],
                ];
                break;
            case 'PATCH':
                return [
                    'title' => ['string', 'max:100'],
                    'pic' => ['string'],
                    'tags' => [],
                    'url' => ['string'],
                    'desc' => ['string'],
                    'github' => ['string'],
                    'website' => ['string'],
                    'example' => ['string'],
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
            'url' => 'MD地址',
            'desc' => '描述',
            'github' => 'GitHub',
            'website' => '官网',
            'example' => '用例',
            'status' => '状态',
        ];
    }
}
