<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PeriodoNominaResource\Pages;
use App\Filament\Resources\PeriodoNominaResource\RelationManagers;
use App\Models\PeriodoNomina;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PeriodoNominaResource extends Resource
{
    protected static ?string $model = PeriodoNomina::class;

    protected static ?string $navigationIcon = 'heroicon-o-calculator';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nombre')
                    ->label('Nombre del Periodo'),
                Forms\Components\Select::make('tipo_periodo')
                    ->label('Tipo de Periodo')
                    ->options([
                        'semanal' => 'Semanal',
                        'quincenal' => 'Quincenal',
                        'mensual' => 'Mensual',
                    ])
                    ->required(),
                Forms\Components\DatePicker::make('fecha_inicio')
                    ->label('Fecha de Inicio')
                    ->required(),
                Forms\Components\DatePicker::make('fecha_fin')
                    ->label('Fecha de Fin')
                    ->required()
                    ->after('fecha_inicio'), // Asegura que la fecha fin sea posterior a la fecha inicio
                Forms\Components\Select::make('estado')
                    ->label('Estado')
                    ->options([
                        'abierto' => 'Abierto',
                        'cerrado' => 'Cerrado',
                        'procesado' => 'Procesado',
                    ])
                    ->required()
                    ->default('abierto'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            Tables\Columns\TextColumn::make('nombre')->label('Nombre'),
            Tables\Columns\TextColumn::make('tipo_periodo')->label('Tipo'),
            Tables\Columns\TextColumn::make('fecha_inicio')->label('Inicio')->date(),
            Tables\Columns\TextColumn::make('fecha_fin')->label('Fin')->date(),
            Tables\Columns\SelectColumn::make('estado')
                ->label('Estado')
                ->options([
                    'abierto' => 'Abierto',
                    'cerrado' => 'Cerrado',
                    'procesado' => 'Procesado',
                ]),
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
            'index' => Pages\ListPeriodoNominas::route('/'),
            'create' => Pages\CreatePeriodoNomina::route('/create'),
            'edit' => Pages\EditPeriodoNomina::route('/{record}/edit'),
        ];
    }
}
