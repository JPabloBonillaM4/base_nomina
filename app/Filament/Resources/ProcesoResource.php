<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProcesoResource\Pages;
use App\Filament\Resources\ProcesoResource\RelationManagers;
use App\Models\Proceso;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProcesoResource extends Resource
{
    protected static ?string $model = Proceso::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('nombre')
                ->label('Nombre')
                ->options([
                    'bordadora' => 'Bordadora',
                    'mesa de corte' => 'Mesa de corte',
                    'ensamblado' => 'Ensamblado',
                    'manual' => 'Manual',
                ])
                ->required(),
                Forms\Components\Textarea::make('descripcion')
                    ->nullable()
                    ->maxLength(65535),
                    Forms\Components\Select::make('unidad_medida')
                    ->label('Unidad de Medida')
                    ->options([
                        'pieza' => 'Pieza',
                        'metro' => 'Metro',
                        'prenda' => 'Prenda',
                        'hora' => 'Hora',
                        'unidad' => 'Unidad', // Opción genérica para número
                    ]),
                Forms\Components\TextInput::make('tarifa_por_unidad')
    ->numeric()
    ->nullable()
    ->rules('nullable|numeric|between:0,9999999999.9999999999') // Ajusta el valor máximo según sea necesario
    ->step(0.0000000001),
                Forms\Components\Checkbox::make('activo')
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            Tables\Columns\TextColumn::make('nombre')
                ->label('Nombre')
                ->searchable()
                ->sortable(),
            Tables\Columns\TextColumn::make('unidad_medida')
                ->label('Tipo de Unidad')
                ->searchable()
                ->sortable(),
            Tables\Columns\TextColumn::make('tarifa_por_unidad')
                ->label('Tarifa por unidad')
                ->sortable(),
            Tables\Columns\IconColumn::make('activo')
                ->boolean(),
            Tables\Columns\TextColumn::make('created_at')
                ->sortable()
                ->dateTime('Y-m-d H:i:s'), // Formato de fecha y hora
            Tables\Columns\TextColumn::make('updated_at')
                ->sortable()
                ->dateTime('Y-m-d H:i:s'), // Formato de fecha y hora
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
            'index' => Pages\ListProcesos::route('/'),
            'create' => Pages\CreateProceso::route('/create'),
            'edit' => Pages\EditProceso::route('/{record}/edit'),
        ];
    }
}
