<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Admin;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

class AdminTest extends TestCase
{
    /**
     * 測試註冊頁面
     */
    public function Admin()
    {
        $response = $this->get('/admin/admin');

        $response->assertOk();
    }
    /**
     * 測試註冊表單
     */
    public function Post_Admin()
    {
        $response = $this->post('/admin/admin', [
            'acc' => 'test',
            'pw' => 'password',
            'pw2' => 'password'
        ]);

        $response->assertRedirect('/admin/admin');
    }
    /**
     * 測試登入頁面
     */
    public function Login()
    {
        $response = $this->get('/login');

        $response->assertSuccessful();
    }
    /**
     * 測試提交登入表單
     */
    public function Post_Login()
    {
        $Admin = Admin::where('acc', 'test')->first();
        $response = $this->post('/login', [
            'acc' => $Admin->acc,
            'pw' => 'password',
        ]);

        $response->assertRedirect('/admin');
    }
    /**
     * 測試 /image 圖片上傳
     */
    public function Image()
    {
        Storage::fake('photos');  // 偽造目錄
        $photo = UploadedFile::fake()->image('picture.jpg');  // 偽造上傳圖片

        $this->post('/admin/image', [
            'img' => $photo,
            // 'style'=>'width:100px;header:68px'
        ]);

        Storage::disk('photos')->assertMissing('picture.jpg');   // 斷言文件是否上傳成功
    }

}
