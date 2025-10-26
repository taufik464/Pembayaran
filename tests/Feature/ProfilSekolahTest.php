<?php

test('Tampil halaman tentang kami', function () {
    $response = $this->get('/tentang');

    $response->assertStatus(200);
});

test('Tampil halaman visi misi', function () {
    $response = $this->get('/profile-sekolah/visi-misi');

    $response->assertStatus(200);
});
