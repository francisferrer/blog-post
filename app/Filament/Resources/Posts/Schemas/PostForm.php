<?php

namespace App\Filament\Resources\Posts\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\RichEditor;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label('Title')
                    ->required()
                    ->maxLength(300),
                // TextArea::make('content')
                //     ->label('Content')
                //     ->required()
                //     ->maxLength(3000)
                //     ->rows(5),
                RichEditor::make('content')
                ->required()
                ->maxLength(3000)
                ->fileAttachmentDisk('public')
                ->fileAttachmentDirectory('posts/content')
                ->fileAttachmentVisibility('public'),

            ])
            ->columns(1);
    }
}
