<?php

namespace App\Filament\Resources\Products\Schemas;

use Dom\Text;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\IconEntry;


class ProductInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Product Info')
                    ->schema([
                        TextEntry::make('name')
                            ->label('Product Name')
                            ->weight('bold')
                            ->color('primary'),

                        TextEntry::make('id')
                            ->label('Product ID'),

                        TextEntry::make('sku')
                            ->label('Product SKU')
                            ->badge()
                            ->color('success'),

                        TextEntry::make('description')
                            ->label('Product Description'),

                        TextEntry::make('created_at')
                            ->label('Product Creation Date')
                            ->date('d M Y')
                            ->color('info'),
                    ])
                    ->columnSpanFull(),

                    Section::make('Pricing & Stock')
                    ->schema([
                        TextEntry::make('price')
                            ->label('Product Price')
                            ->icon('heroicon-o-currency-dollar'),

                        TextEntry::make('stock')
                            ->label('Product Stock'),
                    ]),

                    Section::make('Media')
                    ->schema([
                        ImageEntry::make('image')
                            ->label('Product Image')
                            ->getStateUsing(fn ($record) => asset('storage/' . $record->image)),
                        
                        IconEntry::make('is_active')
                            ->label('Is Active')
                            ->boolean(),

                        IconEntry::make('is_featured')
                            ->label('Is Featured')
                            ->boolean(),
                    ]),
            ]);
    }
}