<?php


namespace App\Http\Requests;


class ArticleRequest extends BaseRequest
{
    public function rules()
    {
        switch ($this->method()) {
            case 'POST':
                return [
                    'type' => ['required', 'int'],
                    'title' => ['required', 'string', 'max:100'],
                    'pic' => ['required', 'string'],
                    'tags' => ['required'],
                    'content' => ['required'],
                    'desc' => ['required', 'string'],
                    'status' => ['required', 'int'],
                ];
                break;
            case 'PATCH':
                return [
                    'type' => ['int'],
                    'title' => ['string', 'max:100'],
                    'pic' => ['string'],
                    'tags' => [],
                    'content' => [],
                    'desc' => ['string'],
                    'status' => ['int'],
                ];
                break;
        }
    }

    public function attributes()
    {
        return [
            'type' => '类型',
            'title' => '标题',
            'pic' => '展示图',
            'tags' => '标签',
            'content' => '内容',
            'desc' => '描述',
            'status' => '状态',
        ];
    }
}
