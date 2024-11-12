<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TravelResource\Pages;
use App\Filament\Resources\TravelResource\RelationManagers;
use App\Models\Travel;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use App\Filament\Resources\TravelResource\Pages\ListTravel;


class TravelResource extends Resource
{
    protected static ?string $model = Travel::class;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('name')->required(),
            Forms\Components\Textarea::make('description')->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('name')->sortable()->searchable(),
            TextColumn::make('description')->limit(50),
            TextColumn::make('created_at')->date(),
        ])->filters([]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTravel::route('/'),
            'create' => Pages\CreateTravel::route('/create'),
            'edit' => Pages\EditTravel::route('/{record}/edit'),
        ];
    }
}
