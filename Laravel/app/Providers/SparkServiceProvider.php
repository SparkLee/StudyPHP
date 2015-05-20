<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class SparkServiceProvider extends ServiceProvider {

    /**
     * 指定是否延缓提供者加载。
     *
     * @var bool
     */
    protected $defer = true;
    
	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		//
	}

	/**
     * 注册服务提供者。
     *
     * @return void
     */
	public function register()
	{
		//
	}
	
	/**
	 * 取得提供者所提供的服务。
	 *
	 * @return array
	 */
	public function provides()
	{
	    return ['Riak\Contracts\Connection'];
	}

}
