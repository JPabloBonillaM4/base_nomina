<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProduccionDiariaResource\Pages;
use App\Filament\Resources\ProduccionDiariaResource\RelationManagers;
use App\Models\ProduccionDiaria;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProduccionDiariaResource extends Resource
{
    protected static ?string $model = ProduccionDiaria::class;
    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('usuario_id')
                    ->relationship('usuario', 'name')
                    ->required(),
                Forms\Components\Select::make('proceso_id')
                    ->relationship('proceso', 'nombre')
                    ->required(),
                Forms\Components\DatePicker::make('fecha_produccion')->required(),
                Forms\Components\TextInput::make('cantidad_producida')->numeric()->required(),
                Forms\Components\Textarea::make('observaciones')->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('usuario.name')->label('Empleado'),
                Tables\Columns\TextColumn::make('proceso.nombre')->label('Proceso'),
                Tables\Columns\TextColumn::make('fecha_produccion'),
                Tables\Columns\TextColumn::make('cantidad_producida'),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProduccionDiarias::route('/'),
            'create' => Pages\CreateProduccionDiaria::route('/create'),
            'edit' => Pages\EditProduccionDiaria::route('/{record}/edit'),
        ];
    }
}
