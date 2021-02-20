<?php


namespace Binomedev\Portfolio\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Code;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Resource;

class Category extends Resource
{
    public static $group = 'Portfolio';

    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \Binomedev\Portfolio\Models\Category::class;

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
        'id', 'name', 'slug', 'summary', 'tags',
    ];

    public function fields(Request $request)
    {
        return [
            Text::make('Name')->sortable()->required(),
            BelongsTo::make('Parent', 'parent', Category::class)->nullable(),
            Text::make('Icon')->nullable()->hideFromIndex(),
            Image::make('Thumbnail', 'image')->nullable(),
            Textarea::make('Tags')->rows(2)->nullable()->hideFromIndex(),
            Textarea::make('Summary')->rows(2)->nullable(),
            Number::make('Order')->sortable()->rules('min:0')->default(0),
            Code::make('Meta')->json(),

            HasMany::make('Projects'),
            //HasMany::make('Children', 'children', Category::class, 'parent_id'),
        ];
    }
}
