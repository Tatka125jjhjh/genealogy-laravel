<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NewMediaObjectResource\Pages;
use App\Filament\Resources\NewMediaObjectResource\RelationManagers;
use App\Models\NewMediaObject;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class NewMediaObjectResource extends Resource
{
    protected static ?string $model = NewMediaObject::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Media Objects';

    protected static ?string $navigationGroup = 'Media Objects';
    

    public static function form(Form $form): Form
    {
        return $form
                ->schema([
                    Forms\Components\TextInput::make('gid')
                        ->numeric(),
                    Forms\Components\TextInput::make('group')
                        ->maxLength(255),
                    Forms\Components\TextInput::make('titl')
                        ->maxLength(255),
                    Forms\Components\TextInput::make('obje_id')
                        ->maxLength(255),
                    Forms\Components\TextInput::make('rin')
                        ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('gid')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('group')
                    ->searchable(),
                Tables\Columns\TextColumn::make('titl')
                    ->searchable(),
                Tables\Columns\TextColumn::make('obje_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('rin')
                    ->searchable(),
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
            'index' => Pages\ListNewMediaObjects::route('/'),
            'create' => Pages\CreateNewMediaObject::route('/create'),
            'edit' => Pages\EditNewMediaObject::route('/{record}/edit'),
        ];
    }
}
