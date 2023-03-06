<?php

namespace Ibnnajjaar\Graphify\Support;

interface HasGraphify
{
    public function generateGraphify(): void;

    public function getGraphifyFields(): array;

    public function getOpenGraphImageUrlField(): string;
}
