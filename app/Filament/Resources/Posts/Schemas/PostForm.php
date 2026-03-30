<?php

namespace App\Filament\Resources\Posts\Schemas;

use Dom\Text;
use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Schemas\Components\Section;
use Filament\Support\Icons\Heroicon;
use Filament\Forms\Components\Group;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                //section 1 - post details
                Section::make('Post Details')
                -> Description('Fill in the details of the post')
                //->icon(Heroicon::RocketLaunch)
                -> icon('heroicon-o-document-text')
                ->schema([
                TextInput::make('title'),
                    // ->required()
                    // ->minLength(5),
                TextInput::make('slug'),
                    // ->required()
                    // ->unique(ignoreRecord: true),
                Select::make('category_id')
                    ->relationship('category', 'name')
                    ->preload()
                    ->searchable(),
                ColorPicker::make('color'),
                MarkdownEditor::make('content'),
                ])->ColumnSpanFull(),
                
                //section 2 - image
                Section::make('Image Upload')
                ->schema([
                    FileUpload::make('image')
                        ->disk('public')
                        ->directory('posts'),
                ]),
                //section 3 - meta
                Section::make('Meta Information')
                ->schema([
                    TagsInput::make('tags'),
                    Checkbox::make('published'),
                    DateTimePicker::make('published_at'),
                ]),
            //     //RichEditor::make('content'),
            //     FileUpload::make('image')
            //         ->disk('public')
            //         ->directory('posts'),
            //     TagsInput::make('tags'),
            //     Checkbox::make('published'),
            //     DateTimePicker::make('published_at'),

            ])->columns(2);
    }
}
