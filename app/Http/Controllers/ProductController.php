<?php

namespace App\Http\Controllers;

use App\Jobs\ProductOperator;
use App\Models\Product;
use Facebook\WebDriver\Chrome\ChromeOptions;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Laravel\Dusk\Browser;
use Laravel\Dusk\Chrome\ChromeProcess;
use Laravel\Dusk\ElementResolver;

class ProductController extends Controller
{
    public function __construct(Request $request)
    {
    }
    public function test(Request $request)
    {
        // foreach (['snapp', 'basalam'] as $driver) {
        //     ProductOperator::dispatch($driver);
        // }
        try {
        $process = (new ChromeProcess)->toProcess();
        if ($process->isStarted()) {
            $process->stop();
        }
        $process->start();

        $options = (new ChromeOptions)->addArguments(['–disable-gpu', '–headless', '–no-sandbox']);
        $capabilities = DesiredCapabilities::chrome()
            ->setCapability(ChromeOptions::CAPABILITY, $options)
            ->setPlatform('Linux');
        $driver = retry(5, function () use ($capabilities) {
            return RemoteWebDriver::create('http://localhost:9515', DesiredCapabilities::chrome(), 60000, 60000);
        }, 50);

        $browser = new Browser($driver, new ElementResolver($driver, ''));
        $browser->resize(375, 840);
        $browser->visit('https://basalam.com/accounts/login?prev=https%3A%2F%2Fvendor.basalam.com%2F');
        $browser->waitFor('.auth-modal__bold-text', 5);
        $browser->press('.auth-modal__bold-text');
        $browser->waitFor('#bs_input__135',5);
        $browser->type('#bs_input__135', "09913378001");
        $browser->type('#bs_input__136', "@Mp11player");
        $browser->press(".auth-modal__submit");
        
        $browser->waitForLocation("https://vendor.basalam.com/", 5000);

        $browser->visit("https://vendor.basalam.com/create-product");
        $browser->waitForLocation("https://vendor.basalam.com/create-product", 5000);

        $browser->waitFor(".category", 5);
        $browser->press(".category");
        $browser->waitFor(".bs-input__input");
        $browser->type(".bs-input__input", "محصول تستی من");
        $browser->waitForText("انتخاب از بین دسته‌های دیگر",50);
        $browser->pressAndWaitFor(".select-category__title", 5);
        $browser->clickAtXPath("//div[text()='کالای دیجیتال']");

        $browser->waitForReload(null, 50);
        $browser->driver->takeScreenshot(base_path('tests/Browser/screenshots/logged.png'));
        } catch (\Exception $e) {
            echo $e->getMessage();
            Log::error($e->getMessage());
        }
        finally{
        $browser->quit();
        $process->stop();
        }
    }
}
