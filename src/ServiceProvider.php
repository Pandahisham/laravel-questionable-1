<?php

namespace Tshafer\Questionable;

use Tshafer\ServiceProvider\ServiceProvider as BaseProvider;

    /**
     * Class ServiceProvider.
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
            $this->setup(__DIR__)
                 ->publishMigrations();
        }
    }
