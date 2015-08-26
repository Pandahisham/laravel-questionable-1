<?php

    namespace Tshafer\Questionable;

    use Tshafer\ServiceProvider\ServiceProvider as BaseProvider;

    /**
     * Class ServiceProvider
     *
     * @package Tshafer\Questionable
     */
    class ServiceProvider extends BaseProvider
    {

        /**
         * @var string
         */
        protected $packageName = 'questionable';

        /**
         *
         */
        public function boot()
        {
            $this->setup( __DIR__ )
                 ->publishMigrations();
        }
    }
