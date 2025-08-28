<?php

namespace App\Filament\Resources\WeddingPackages\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use App\Models\BonusPackage;
use Filament\Schemas\Components\Fieldset as ComponentsFieldset;

class WeddingPackageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                ComponentsFieldset::make('Details')
                    ->columns(2)
                    ->schema([
                        TextInput::make('name')
                            ->required()
                            ->maxLength(255),

                        FileUpload::make('thumbnail')
                            ->image()
                            ->required(),

                        Repeater::make('photos')
                            ->relationship('photos')
                            ->schema([
                                FileUpload::make('photo')
                                    ->required(),
                            ]),

                        Repeater::make('weddingBonusPackages')
                            ->relationship('weddingBonusPackages')
                            ->schema([
                                Select::make('bonus_package_id')
                                    ->label('Bonus Package')
                                    ->options(BonusPackage::all()->pluck('name', 'id'))
                                    ->searchable()
                                    ->required(),
                            ]),
                    ]),


                ComponentsFieldset::make('Additional')
                    ->schema([
                        Textarea::make('about')
                            ->required(),

                        TextInput::make('price')
                            ->required()
                            ->numeric()
                            ->prefix('IDR'),

                        Select::make('is_popular')
                            ->options([
                                true => 'Popular',
                                false => 'Not Popular',
                            ])
                            ->required(),

                        Select::make('city_id')
                            ->relationship('city', 'name')
                            ->searchable()
                            ->preload()
                            ->required(),

                        Select::make('wedding_organizer_id')
                            ->relationship('weddingOrganizer', 'name')
                            ->searchable()
                            ->preload()
                            ->required(),
                    ]),
            ]);
    }
}
