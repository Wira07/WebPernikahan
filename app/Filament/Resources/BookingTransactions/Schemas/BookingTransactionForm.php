<?php

namespace App\Filament\Resources\BookingTransactions\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Components\Wizard\Step;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use App\Models\WeddingPackage;
use Filament\Forms\Components\ToggleButtons;
use Filament\Schemas\Components\Grid as ComponentsGrid;
use Filament\Schemas\Components\Wizard as ComponentsWizard;
use Filament\Schemas\Components\Wizard\Step as WizardStep;

class BookingTransactionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                ComponentsWizard::make([
                    WizardStep::make('Product and Price')
                        ->schema([
                            ComponentsGrid::make(2)
                                ->schema([
                                    Select::make('wedding_package_id')
                                        ->relationship('weddingPackage', 'name')
                                        ->searchable()
                                        ->preload()
                                        ->required()
                                        ->live()
                                        ->afterStateUpdated(function ($state, callable $set) {
                                            $weddingPackage = WeddingPackage::find($state);
                                            $price = $weddingPackage ? $weddingPackage->price : 0;

                                            $set('price', $price);

                                            $tax = 0.11;
                                            $totalTaxAmount = $tax * $price;

                                            $totalAmount = $price + $totalTaxAmount;
                                            $set('total_amount', number_format($totalAmount, 0, '', ''));
                                            $set('total_tax_amount', number_format($totalTaxAmount, 0, '', ''));
                                        }),

                                    TextInput::make('price')
                                        ->required()
                                        ->readOnly()
                                        ->numeric()
                                        ->prefix('IDR'),

                                    TextInput::make('total_amount')
                                        ->required()
                                        ->readOnly()
                                        ->numeric()
                                        ->prefix('IDR'),

                                    TextInput::make('total_tax_amount')
                                        ->required()
                                        ->readOnly()
                                        ->numeric()
                                        ->prefix('IDR'),

                                    DatePicker::make('started_at')
                                        ->required(),
                                ]),
                        ]),

                    WizardStep::make('Customer Information')
                        ->schema([
                            ComponentsGrid::make(2) // ✅ Fixed: menggunakan ComponentsGrid
                                ->schema([
                                    TextInput::make('name')
                                        ->required()
                                        ->maxLength(255),

                                    TextInput::make('phone')
                                        ->required()
                                        ->maxLength(255),

                                    TextInput::make('email')
                                        ->required()
                                        ->maxLength(255),
                                ]),
                        ]),

                    WizardStep::make('Payment Information')
                        ->schema([
                            Forms\Components\TextInput::make('booking_trx_id')
                                ->required()
                                ->maxLength(255),
                            ToggleButtons::make('is_paid')
                                ->label('Apakah sudah membayar?')
                                ->boolean()
                                ->grouped()
                                ->icons([
                                    true => 'heroicon-o-pencil',
                                    false => 'heroicon-o-clock',
                                ])
                                ->required(),
                            Forms\Components\FileUpload::make('proof')
                                ->image()
                                ->required(),
                        ]),
                ])
                    ->columnSpan('full') // Use full width for the wizard
                    ->columns(1) // Make sure the form has a single column layout
                    ->skippable(),
            ]);
    }
}
