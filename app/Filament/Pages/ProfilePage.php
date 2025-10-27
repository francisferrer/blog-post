<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Auth\Pages\EditProfile;
use Illuminate\Support\Facades\Password;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Schema;

class ProfilePage extends EditProfile
{
    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([

                FileUpload::make('avatar')
                    ->avatar()
                    ->image()
                    ->imageeditor(),
                
                $this->getNameFormComponent(),
                $this->getEmailFormComponent(),
                $this->getPasswordFormComponent(),
                $this->getPasswordConfirmationFormComponent(),
                $this->getCurrentPasswordFormComponent(),
            ]);
    }
}
