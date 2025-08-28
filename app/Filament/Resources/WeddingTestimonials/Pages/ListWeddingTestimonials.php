<?php

namespace App\Filament\Resources\WeddingTestimonials\Pages;

use App\Filament\Resources\WeddingTestimonials\WeddingTestimonialResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListWeddingTestimonials extends ListRecords
{
    protected static string $resource = WeddingTestimonialResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
