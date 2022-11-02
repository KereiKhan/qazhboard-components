<?php

test('it can be rendered', function () {
    $this->withViewErrors(['first_name' => 'Invalid first name.'])
        ->blade('<x-qazhboard-components-error field="first_name" />')
        ->assertSee('Invalid first name.');
});
