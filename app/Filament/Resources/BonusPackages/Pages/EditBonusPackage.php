<?php

namespace App\Filament\Resources\BonusPackages\Pages;

use App\Filament\Resources\BonusPackages\BonusPackageResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditBonusPackage extends EditRecord
{
    protected static string $resource = BonusPackageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
