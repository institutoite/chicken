<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VentaResource\Pages;
use App\Filament\Resources\VentaResource\RelationManagers;
use App\Models\Venta;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use App\Models\Plato;
use App\Models\Cliente;
use Filament\Actions\Action as ActionsAction;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Repeater;
use Filament\Actions\Action;
use Filament\Forms\Components\Grid;

// use Filament\Resources\Action;

class VentaResource extends Resource
{
    protected static ?string $model = Venta::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    
   
public static function form(Form $form): Form
{
    return $form
        ->schema([
            // **Información de la Venta**
            Grid::make(1) // Define la fila para el cliente
            ->schema([
                Select::make('cliente_id')
                    ->label('Cliente')
                    ->options(function () {
                        return Cliente::pluck('nombre', 'id');
                    })
                    ->searchable()
                    ->placeholder('Seleccionar o crear cliente')
                    ->required(false)
                    ->afterStateUpdated(function ($state, callable $set) {
                        if (!$state) {
                            $set('cliente_id', null); // Permitir nulo si es cliente anónimo
                        }
                    })
                    ->reactive()
                    ->afterStateUpdated(function ($state, callable $set) {
                        // Si el cliente no se encuentra, abrir el modal para crear uno nuevo
                        if (!$state) {
                            $set('cliente_id', null); // Limpiar el estado del cliente
                            $this->dispatchBrowserEvent('open-create-cliente-modal'); // Disparar el evento para abrir el modal
                        }
                    }),
            ])
            ->columns(1), // Solo una columna para el cliente


            // **Detalle de Venta (Productos)**
            Grid::make(1) // Define la fila para el cliente
                ->schema([
                    Repeater::make('detalleventas')
                    ->label('Detalles de Venta')
                    ->schema([
                        Grid::make(3) // Crear una fila con tres columnas
                            ->schema([
                                Select::make('plato_id')
                                    ->label('Plato')
                                    ->options(function () {
                                        return Plato::pluck('nombre', 'id');
                                    })
                                    ->searchable()
                                    ->reactive()
                                    ->afterStateUpdated(function ($state, callable $set) {
                                        $plato = Plato::find($state);
                                        if ($plato) {
                                            // Se llena el precio unitario del plato seleccionado
                                            $set('precio_unitario', $plato->precio);
                                            $set('cantidad', 1); // Cantidad por defecto es 1
                                        }
                                    }),

                                TextInput::make('cantidad')
                                    ->label('Cantidad')
                                    ->numeric()
                                    ->default(1),

                                TextInput::make('precio_unitario')
                                    ->label('Precio Unitario')
                                    ->numeric()
                                    ->disabled(), // Se llena automáticamente
                            ]),
                    ])
                ])
                ->columns(1), // Solo una columna para el repetidor (para tener el botón de agregar elemento)


            // **Total de la Venta**
            TextInput::make('total')
            ->label('Total')
            ->disabled()
            ->default(fn ($get) => collect($get('detalleventas'))->sum(function ($detalle) {
                return $detalle['cantidad'] * $detalle['precio_unitario'];
            }))
            
        
        ]);
}

// Definir acciones en el recurso (fuera del formulario)
public static function actions(): array
{
    return [
        Action::make('crear_cliente')
            ->label('Crear Cliente')
            ->action(function ($record) {
                // Lógica para abrir el formulario de creación de cliente
                $this->openCreateClienteModal();
            })
            ->color('primary')
            ->icon('heroicon-o-plus'),
    ];
}

// Función para abrir el modal de creación de cliente
protected function openCreateClienteModal()
{
    // Lógica para abrir el modal
    // Este ejemplo es solo una guía, deberías implementar un modal en Filament o usar un método personalizado
    $this->dispatchBrowserEvent('open-create-cliente-modal');
}

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ListVentas::route('/'),
            'create' => Pages\CreateVenta::route('/create'),
            'edit' => Pages\EditVenta::route('/{record}/edit'),
        ];
    }
}
