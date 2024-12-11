<?php namespace Ixudra\Curl;


use Illuminate\Support\ServiceProvider;

class CurlServiceProvider extends ServiceProvider {

    /**
     * @var bool
     */
    protected $defer = false;


    /**
     * @return void
     */
    public function register()
    {
        $this->app->singleton('Curl', function () {
                return new CurlService();
            }
        );
    }

    /**
     * @return void
     */
    public function boot()
    {
        if (!$this->app->runningInConsole()) {
            app(Builder::class)->enableStart();
        }
    }

    /**
     * @return array
     */
    public function provides()
    {
        return array('Curl');
    }

}
