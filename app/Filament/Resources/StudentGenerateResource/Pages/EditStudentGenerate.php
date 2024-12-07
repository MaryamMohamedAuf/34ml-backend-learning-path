<?php

namespace App\Filament\Resources\StudentGenerateResource\Pages;

use App\Filament\Resources\StudentGenerateResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditStudentGenerate extends EditRecord
{
    protected static string $resource = StudentGenerateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
