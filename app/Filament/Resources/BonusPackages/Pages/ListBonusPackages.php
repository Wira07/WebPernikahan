<?php

namespace App\Filament\Resources\BonusPackages\Pages;

use App\Filament\Resources\BonusPackages\BonusPackageResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListBonusPackages extends ListRecords
{
    protected static string $resource = BonusPackageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
