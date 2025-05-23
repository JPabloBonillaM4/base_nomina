<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('password')
                    ->password()
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('numero_tarjeta')
                    ->label('Número de Tarjeta') // Added label for clarity
                    ->maxLength(20), //  Set appropriate max length
                Forms\Components\TextInput::make('edad')
                    ->label('Edad')
                    ->numeric()
                    ->minValue(0),
                Forms\Components\TextInput::make('turno')
                    ->label('Turno')
                    ->maxLength(50), // Set appropriate max length
                Forms\Components\Select::make('rol')
                    ->options(User::ROLES) // Ensure User::ROLES is defined in your User model!
                    ->required()
                    ->label('Rol'),
                Forms\Components\TextInput::make('telefono')
                    ->label('Teléfono')
                    ->maxLength(20), // Set appropriate max length
                Forms\Components\TextInput::make('area')
                    ->label('Área')
                    ->maxLength(100), // Set appropriate max length
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('numero_tarjeta')
                    ->label('Número de Tarjeta') // Added label for consistency
                    ->searchable(),
                Tables\Columns\TextColumn::make('edad')
                    ->label('Edad')
                    ->sortable(),
                Tables\Columns\TextColumn::make('turno')
                    ->label('Turno')
                    ->searchable(),
                Tables\Columns\TextColumn::make('rol')
                   // ->badge()
                    //->color(function (string $state): string {
                     //   return 'info';
                   // })
                    ->sortable()
                    ->searchable()
                    ->label('Rol'), // Added label for consistency
                Tables\Columns\TextColumn::make('telefono')
                    ->label('Teléfono')
                    ->searchable(),
                Tables\Columns\TextColumn::make('area')
                    ->label('Área')
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}

