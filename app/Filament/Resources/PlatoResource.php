<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PlatoResource\Pages;
use App\Filament\Resources\PlatoResource\RelationManagers;
use App\Models\Plato;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PlatoResource extends Resource
{
    protected static ?string $model = Plato::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nombre')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('precio')
                    ->required()
                    ->numeric(),
                Forms\Components\Select::make('category_id') // Cambiar a Select para elegir categorías
                    ->label('Categoría')
                    ->options(\App\Models\Category::all()->pluck('category', 'id')) // Cambié a 'category' como nombre del campo
                    ->required(),
                Forms\Components\RichEditor::make('descripcion') // Cambiar Textarea a RichEditor
                    ->label('Descripción')
                    ->toolbarButtons([
                        'bold', 'italic', 'underline', 'strike', 
                        'link', 'orderedList', 'unorderedList', 
                        'heading', 'blockquote', 'codeBlock',
                    ])
                    ->columnSpanFull(),
                Forms\Components\FileUpload::make('imagen') // Campo de carga de imagen
                    ->image() // Especifica que es un archivo de imagen
                    ->directory('platos') // Carpeta donde se guardarán las imágenes
                    ->maxSize(1024) // Tamaño máximo del archivo en KB
                    ->nullable(), // Permitir que sea opcional,
                Forms\Components\Toggle::make('disponible')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombre')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable(),
                Tables\Columns\TextColumn::make('precio')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('category_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('imagen')
                    ->searchable(),
                Tables\Columns\IconColumn::make('disponible')
                    ->boolean(),
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
            'index' => Pages\ListPlatos::route('/'),
            'create' => Pages\CreatePlato::route('/create'),
            'edit' => Pages\EditPlato::route('/{record}/edit'),
        ];
    }
}
