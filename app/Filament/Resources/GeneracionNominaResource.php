<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GeneracionNominaResource\Pages;
use App\Filament\Resources\GeneracionNominaResource\RelationManagers;
use App\Models\GeneracionNomina;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GeneracionNominaResource extends Resource
{
    protected static ?string $model = GeneracionNomina::class;

    protected static ?string $navigationIcon = 'heroicon-o-envelope';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('periodo_nomina_id')
                    ->label('Periodo de Nómina')
                    ->relationship('periodoNomina', 'nombre')
                    ->required(),
                Forms\Components\Select::make('usuario_id')
                    ->label('Empleado')
                    ->relationship('usuario', 'name')
                    ->required(),
                Forms\Components\TextInput::make('total_percepciones')
                    ->label('Total Percepciones')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('total_deducciones')
                    ->label('Total Deducciones')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('impuesto_sobre_la_renta')
                    ->label('ISR')
                    ->numeric()
                    ->nullable(),
                Forms\Components\TextInput::make('seguridad_social')
                    ->label('Seguridad Social')
                    ->numeric()
                    ->nullable(),
                Forms\Components\TextInput::make('otros_impuestos')
                    ->label('Otros Impuestos')
                    ->numeric()
                    ->nullable(),
                Forms\Components\TextInput::make('neto_pagado')
                    ->label('Neto Pagado')
                    ->numeric()
                    ->required(),
                Forms\Components\DatePicker::make('fecha_pago')
                    ->label('Fecha de Pago'),
                Forms\Components\TextInput::make('metodo_pago')
                    ->label('Método de Pago'),
                Forms\Components\TextInput::make('referencia_pago')
                    ->label('Referencia de Pago'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            Tables\Columns\TextColumn::make('periodoNomina.nombre')->label('Periodo'),
            Tables\Columns\TextColumn::make('usuario.name')->label('Empleado'),
            Tables\Columns\TextColumn::make('total_percepciones')->label('Percepciones'),
            Tables\Columns\TextColumn::make('total_deducciones')->label('Deducciones'),
            Tables\Columns\TextColumn::make('neto_pagado')->label('Neto Pagado'),
            Tables\Columns\TextColumn::make('fecha_pago')
                   ->label('Fecha Pago')
                   ->date(),
            Tables\Columns\TextColumn::make('created_at')->dateTime(),
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
            'index' => Pages\ListGeneracionNominas::route('/'),
            'create' => Pages\CreateGeneracionNomina::route('/create'),
            'edit' => Pages\EditGeneracionNomina::route('/{record}/edit'),
        ];
    }
}
