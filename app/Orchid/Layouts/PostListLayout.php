<?php

namespace App\Orchid\Layouts;

use App\Posts;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\Repository;
use Orchid\Screen\TD;

class PostListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'posts';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): array
    {
        return [
            TD::set('title', 'Başlık'),
            TD::set('description', 'Description'),
            TD::set('image', 'Resim Url')
            ->width('150')
            ->render(function (Posts $model) {
                // Please use view('path')
                return "<img src='{$model->image}'
                      alt='sample'
                      class='mw-100 d-block img-fluid'>";
            }),

        ];
    }
}
