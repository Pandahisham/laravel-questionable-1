<?php

namespace Tshafer\Questionable\Contracts;

use Illuminate\Database\Eloquent\Model;

    /**
     * Interface Questionable.
     */
    interface Questionable
    {
        /**
         * @return \Illuminate\Database\Eloquent\Relations\MorphMany
         */
        public function questions();

        /**
         * @param       $data
         * @param Model $author
         *
         * @return mixed
         */
        public function createQuestion($data, Model $author);

        /**
         * @param $id
         * @param $data
         *
         * @return mixed
         */
        public function updateQuestion($id, $data);

        /**
         * @param $id
         *
         * @return mixed
         */
        public function deleteQuestion($id);

        /**
         * @param $answerId
         *
         * @return mixed
         */
        public function markAsSolved($answerId);
    }
