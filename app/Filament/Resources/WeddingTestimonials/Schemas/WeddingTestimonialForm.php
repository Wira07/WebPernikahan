<?php

namespace App\Filament\Resources\WeddingTestimonials\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms;

class WeddingTestimonialForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('occupation')
                    ->required()
                    ->maxLength(255),

                Forms\Components\FileUpload::make('photo')
                    ->image()
                    ->required(),

                Forms\Components\Select::make('wedding_package_id')
                    ->relationship('weddingpackage', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),

                Forms\Components\Textarea::make('message')
                    ->required(),
            ]);
    }
}
