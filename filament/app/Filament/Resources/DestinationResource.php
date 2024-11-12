<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DestinationResource\Pages;
use App\Filament\Resources\DestinationResource\RelationManagers;
use App\Models\Destination;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\TravelResource\Pages\ListTravel;

class DestinationResource extends Resource
{
    protected static ?string $model = Destination::class;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('location')->required(),
            Forms\Components\Select::make('travel_id')
                ->label('Travel')
                ->relationship('travel', 'name')
                ->required(),
        ]);
    }
    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('location')->sortable()->searchable(),
            TextColumn::make('travel.name')->label('Travel')->sortable(),
            TextColumn::make('created_at')->date(),
        ])->filters([]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDestinations::route('/'),
            'create' => Pages\CreateDestination::route('/create'),
            'edit' => Pages\EditDestination::route('/{record}/edit'),
        ];
    }
}