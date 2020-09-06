<?php

namespace App\Orchid\Screens;

use App\Posts;
use Illuminate\Http\Request;
use Orchid\Support\Facades\Alert;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Layout;
use Orchid\Screen\Screen;

class PostScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Yazılar';

    /**
     * Display header description.
     *
     * @var string
     */
    public $description = 'Yazılar Ekranı';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {
        return [];
    }

    /**
     * Button commands.
     *
     * @return Action[]
     */
    public function commandBar(): array
    {
        return [
            Button::make('Gönder')
              ->icon('icon-paper-plane')
              ->method('sendPost')
        ];
    }

    /**
     * Views.
     *
     * @return Layout[]
     */
    public function layout(): array
    {
        return [
            Layout::rows([
                Input::make('title')
                ->title('Başlık')
                ->required()
                ->placeholder('Başlık Gir')
                ->help('Postunuz İçin Başlık Girin'),
            ]),

            Layout::rows([
                TextArea::make('description')
                ->title('Detay')
                ->required()
                ->placeholder('Detay Gir')
                ->help('Postunuz İçin Detay Girin'),
            ]),

            Layout::rows([
                Input::make('image')
                ->title('Resim Url')
                ->required()
                ->placeholder('Resim Url Gir')
                ->help('Postunuz İçin Url Girin'),
            ]),
        ];
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendPost(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $post = new Posts();

        $post->title = $request->title;
        $post->description = $request->description;
        $post->image = $request->image;
        $post->save();

        Alert::success('Post Başarılı Bir Şekilde Yayınlandı');
        return back();
    }
}
