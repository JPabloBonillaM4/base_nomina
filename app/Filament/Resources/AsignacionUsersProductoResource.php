<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AsignacionUsersProductoResource\Pages;
use App\Filament\Resources\AsignacionUsersProductoResource\RelationManagers;
use App\Models\AsignacionUsersProducto;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\IconColumn;


class AsignacionUsersProductoResource extends Resource
{
    protected static ?string $model = AsignacionUsersProducto::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-group';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('usuario_id')
                    ->label('Usuario')
                    ->relationship('usuario', 'name')
                    ->required(),
                Forms\Components\Select::make('proceso_id')
                    ->label('Proceso')
                    ->relationship('proceso', 'nombre')
                    ->required(),
                Forms\Components\DatePicker::make('fecha_inicio')
                    ->label('Fecha de Inicio')
                    ->required(),
                Forms\Components\DatePicker::make('fecha_fin')
                    ->label('Fecha de Fin'),
                Forms\Components\TextInput::make('tarifa_asignada')
                    ->label('Tarifa Asignada')
                    ->numeric()
                    ->nullable(),
                Forms\Components\Checkbox::make('activo')
                    ->label('Activo')
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id_asignacion')->label('ID'),
                Tables\Columns\TextColumn::make('usuario.name')->label('Usuario'),
                Tables\Columns\TextColumn::make('proceso.nombre')->label('Proceso'),
                Tables\Columns\TextColumn::make('tarifa_asignada')->label('Tarifa'),
                Tables\Columns\TextColumn::make('fecha_inicio')->label('Inicio')->date(),
                Tables\Columns\TextColumn::make('fecha_fin')
                ->label('Fin')
                ->date(),
                IconColumn::make('activo')   // <-- cambio aquí
                ->boolean()
                ->label('Activo'),
                Tables\Columns\TextColumn::make('created_at')->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListAsignacionUsersProductos::route('/'),
            'create' => Pages\CreateAsignacionUsersProducto::route('/create'),
            'edit' => Pages\EditAsignacionUsersProducto::route('/{record}/edit'),
        ];
    }
}
