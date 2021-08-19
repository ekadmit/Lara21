<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FormTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_export_form_show()
    {
        $response = $this->get(route('export'));
        $response->assertStatus(200);
    }

    public function test_export_form_is_view()
    {
        $response = $this->get(route('export'));
        $response->assertViewIs('export');
    }

    //проверяю, что при отправке срабатывает редирект на сохранение инфо в файл
    public function test_sending_status(){
        $response = $this->get(route('export.store'));
        $response->assertStatus(302);

    }

}
