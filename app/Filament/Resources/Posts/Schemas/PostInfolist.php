<?php

namespace App\Filament\Resources\Posts\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;
use Filament\Forms\Components\DateTimePicker;
use Kirschbaum\Commentions\Filament\Infolists\Components\CommentsEntry;

class PostInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                TextEntry::make('title'),
                TextEntry::make('content')->html(),
                \Filament\Schemas\Components\Section::make('Comments')
                ->components([
                CommentsEntry::make('comments'),
                ]),
            ]);
    }
}
