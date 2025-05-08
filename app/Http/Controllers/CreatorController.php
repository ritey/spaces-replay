<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Browsershot\Browsershot;

class CreatorController extends Controller
{
    public function ogImageGeneral(Request $request)
    {
        $slug = $request->get('og_slug') ?? route('home');

        return response(
            // Browsershot::html($html)
            Browsershot::url($slug.'?local=1')
                // ->setNodeModulePath(config('app.node_path'))
                ->windowSize(1200, 630)
                ->waitUntilNetworkIdle()
                // ->setOption('customHeaders', [
                //    'User-Agent' => 'spacesdashboard',
                // ])
                ->emulateMedia('screen')
                ->ignoreHttpsErrors()
                ->noSandbox()
                ->setDelay(5000)
                ->setOption('newHeadless', true)
                ->setOption('ignoreHTTPSErrors', true)
                ->setOption('args', ['--no-sandbox']) // Important for some environments
                ->screenshot(),
            200,
            ['Content-Type' => 'image/png']
        );
    }
}
