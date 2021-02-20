<?php


namespace Binomedev\Portfolio\Nova;

use Ebess\AdvancedNovaMediaLibrary\Fields\Images;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Code;
use Laravel\Nova\Fields\Markdown;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Panel;
use Laravel\Nova\Resource;

class Project extends Resource
{
    public static $group = 'Portfolio';

    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \Binomedev\Portfolio\Models\Project::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'name', 'slug', 'summary', 'content', 'tags',
    ];

    public function fields(Request $request)
    {
        return [
            Text::make('Name')->required(),
            BelongsTo::make('Category')->nullable(),
            Text::make('Icon')->nullable()->hideFromIndex(),
            new Panel('SEO', [
                Textarea::make('Summary')->rows(2)->nullable(),
                Textarea::make('Tags')->rows(2)->nullable(),
            ]),
            Markdown::make('Content')->nullable(),
            new Panel('Images', $this->getGalleryField()),
            new Panel('Other', [
                Code::make('Meta')->json(),
            ]),
        ];
    }

    private function getGalleryField()
    {
        return [
            Images::make('Banner', 'banner')
                ->enableExistingMedia()
                ->setFileName(function ($originalFilename, $extension, $model) {
                return md5(now()->toDateTimeString()) . '.' . $extension;
            }),

            Images::make('Gallery', 'gallery') // second parameter is the media collection name
            ->conversionOnIndexView('thumb') // conversion used to display the image
                ->enableExistingMedia()
                ->setFileName(function ($originalFilename, $extension, $model) {
                    return md5(now()->toDateTimeString()) . '.' . $extension;
                })
                ->customPropertiesFields([
                    Text::make('Title'),
                    Textarea::make('Description'),
                ]),
        ];
    }
}
