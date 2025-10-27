<?php

namespace App\Filament\Resources\Users\Schemas;

use Dom\Text;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Password;
use Filament\Forms\Components\TextInput;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Full Name')
                    ->required()
                    ->maxLength(255),
                TextInput::make('email')
                    ->label('Email Address')
                    ->required()
                    ->email()
                    ->maxLength(255),
                TextInput::make('password')
                    ->label('Password')
                    ->password()
                    ->confirmed(),
                TextInput::make('password_confirmation')
                ->password(),
            ]);
    }
}
