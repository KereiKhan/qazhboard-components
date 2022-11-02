<?php

function template()
{
    $data = \Illuminate\Support\Collection::make([
        'en' => 'English',
        'ru' => 'Russian',
        'kk' => 'Kazakh'
    ])->toJson();

    return '<x-qazhboard-components-select :items="' .
        $data .
        '" name="languages" />';
}

test('it can be rendered', function () {
    $this->blade(template())
        ->assertSee('name="languages"', false)
        ->assertSeeInOrder(['en' => 'English']);
});
