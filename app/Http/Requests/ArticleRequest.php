<?php


namespace App\Http\Requests;


class ArticleRequest extends BaseRequest
{
    public function rules()
    {
        switch ($this->method()) {
            case 'POST':
                return [
                    'title' => ['required', 'string', 'max:100'],
                    'pic' => ['required', 'string'],
                    'tags' => ['required', 'string'],
                    'url' => ['required', 'string'],
                    'desc' => ['required', 'string'],
                    'status' => ['required', 'int'],
                ];
                break;
            case 'PATCH':
                return [
                    'title' => ['string', 'max:100'],
                    'pic' => ['string'],
                    'tags' => ['string'],
                    'url' => ['string'],
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
            'url' => 'MD地址',
            'desc' => '描述',
            'status' => '状态',
        ];
    }
}
