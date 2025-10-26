<?php


test('dapat menampilkan homepage', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});


