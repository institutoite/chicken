<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RecetaResource\Pages;
use App\Filament\Resources\RecetaResource\RelationManagers;
use App\Models\Receta;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RecetaResource extends Resource
{
    protected static ?string $model = Receta::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('plato_id')
                    ->label('Plato')
                    ->relationship('plato', 'nombre') // Relación con el modelo Plato, mostrando el campo 'nombre'
                    ->required()
                    //->searchable() // Habilita la búsqueda en el dropdown
                    ->placeholder('Selecciona un plato'),
    
                Forms\Components\Select::make('ingrediente_id')
                    ->label('Ingrediente')
                    ->relationship('ingrediente', 'nombre') // Relación con el modelo Ingrediente, mostrando el campo 'nombre'
                    ->required()
                    //->searchable() // Habilita la búsqueda en el dropdown
                    ->placeholder('Selecciona un ingrediente'),
    
                Forms\Components\TextInput::make('cantidad_usada')
                    ->required()
                    ->numeric(),
                Forms\Components\Select::make('unidad_id')
                    ->label('Unidad')
                    ->relationship('unidad', 'unidad') // Relación con el modelo Unidad (tabla units)
                    ->required()
                    ->placeholder('Selecciona una unidad'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('plato_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('ingrediente_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('cantidad_usada')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('unidad')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListRecetas::route('/'),
            'create' => Pages\CreateReceta::route('/create'),
            'edit' => Pages\EditReceta::route('/{record}/edit'),
        ];
    }
}
