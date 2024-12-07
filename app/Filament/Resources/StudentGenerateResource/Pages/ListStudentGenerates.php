<?php

namespace App\Filament\Resources\StudentGenerateResource\Pages;

use App\Filament\Resources\StudentGenerateResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListStudentGenerates extends ListRecords
{
    protected static string $resource = StudentGenerateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
